<?php
/*
* Event_add
* Manage add event by entrepreneur
* @author Priyarat Bumrungkit 62160156
* @Create Date 2564-09-25
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';

class Event_add extends DCS_controller
{
    /*
    * show_add_event
    * show form add event
    * @input -
    * @output -
    * @author Priyarat Bumrungkit 62160156
    * @Create Date 2564-09-25
    * @Update Date -
    */
    public function show_add_event()
    {
        $this->load->model('Event/M_dcs_eve_category', 'mcat');
        $this->load->model('Company/M_dcs_company', 'mcom');
        $this->load->model('Province/M_dcs_province', 'mprv');
        $this->mcom->com_ent_id = $this->session->userdata("entrepreneur_id");
        $data['arr_category'] = $this->mcat->get_all()->result();
        $data['arr_company']=$this->mcom->get_by_ent_id_approve()->result();
        $data['arr_province'] = $this->mprv->get_all()->result();
        date_default_timezone_set('Asia/Bangkok');
        $data['date_now'] = date("Y-m-d");
        $view = 'entrepreneur/manage_event/v_add_event';
        $this->output_entrepreneur($view, $data);
    }

    /*
    * add_event
    * add event to database
    * @input eve_name, eve_description, eve_status, eve_start_date, eve_end_date, eve_lat, eve_lon, par_id, new_img, name_new_image, del_new_img
    * @output -
    * @author Priyarat Bumrungkit 62160156
    * @Create Date 2564-09-26
    * @Update Date 
    */
    public function add_event()
    {
        $this->load->model('Event/M_dcs_event', 'meve');
        $this->load->model('Event/M_dcs_eve_image', 'mimg');
        $this->meve->eve_name = $this->input->post('eve_name');
        $this->meve->eve_description = $this->input->post('eve_description');
        $this->meve->eve_com_id = $this->input->post('eve_com_id');
        $this->meve->eve_cat_id = $this->input->post('eve_cat_id'); 
        $this->meve->eve_location = $this->input->post('eve_location');
        $this->meve->eve_add_date = $this->input->post('eve_add_date');
        $this->meve->eve_start_date = $this->input->post('eve_start_date');
        $this->meve->eve_end_date = $this->input->post('eve_end_date');
        $this->meve->eve_lat = $this->input->post('eve_lat');
        $this->meve->eve_lon = $this->input->post('eve_lon');
        $this->meve->eve_par_id = $this->input->post('par_id');
    
        $this->meve->insert_event();
        $this->set_session_add_event('success');
        $result = $this->meve->get_by_name()->row();
        
        
        // save data image to database
        $arr_img_add = array();
        $arr_name_name = array();
        $arr_img_add = $this->input->post('new_img');
        $arr_name_name = $this->input->post('name_new_image');
        $this->mimg->eve_img_eve_id = $result->eve_id;
        for ($i = 0; $i < count($arr_img_add); $i++) {
            $this->mimg->eve_img_path = $arr_img_add[$i];
            $this->mimg->eve_img_name = $arr_name_name[$i];
            $this->mimg->insert_image_event();
        }

        // delete data image to database
        $arr_img_delete = array();
        $arr_img_delete= $this->input->post('del_new_img');
        if($arr_img_delete != ''){
            for ($i = 0; $i < count($arr_img_delete); $i++) {
                $this->mimg->eve_img_path = $arr_img_delete[$i];
                unlink('./image_event/' . $arr_img_delete[$i]);
                $this->mimg->delete_image_event();
            }
        }
          
        redirect('Entrepreneur/Manage_event/Event_list/show_list_event');
    }

    /*
    * set_session_add_event
    * add session error_add_event
    * @input data
    * @output -
    * @author Priyarat Bumrungkit 62160156
    * @Create Date 2564-09-25
    * @Update Date -
    */
    public function set_session_add_event($data){
        $this->session->set_userdata("error_add_event", $data);
    }

    /*
    * upload_image_ajax
    * upload image
    * @input eve_file
    * @output -
    * @author Acaharaporn pornpattanasap 62160344
    * @Create Date 2564-09-25
    * @Update Date 2564-09-26
    */
    public function upload_image_ajax()
    {
        $file_name = array();
        $file_tmp_name = array();
        $file_size = array();
        $file_error = array();
        $file_ext = array();
        $file_actaul_ext = array();
        $error_file = '';

        // Configure file storage

        $file = $_FILES['eve_file'] ?? '';
        $file_name = $_FILES['eve_file']['name'] ?? '';
        $file_tmp_name = $_FILES['eve_file']['tmp_name'] ?? '';
        $file_size = $_FILES['eve_file']['size'] ?? '';
        $file_error = $_FILES['eve_file']['error'] ?? '';

        if ($file != '') {
            for ($i = 0; $i < count($file_name); $i++) {
                $file_ext[$i] = explode('.', $file_name[$i]);
                $file_actaul_ext[$i] = strtolower(end($file_ext[$i]));

                // Check if there is a problem with the image file. or the file size exceeds 1000000?
                if ($file_error[$i] != 0 || $file_size[$i] >= 3000000) {
                    $error_file = 'false';
                    break;
                }
            }
        } else {
            $error_file = 'false';
        }

        $output_image = '';
        if ($error_file != 'false') {
            // Loop to upload files
            for ($i = 0; $i < count($file_name); $i++) {
                $file_new_name[$i] = uniqid('', true);
                $file_destination[$i] = './image_event/' . $file_new_name[$i] . '.' . $file_actaul_ext[$i];
                move_uploaded_file($file_tmp_name[$i], $file_destination[$i]);
                // $this->mimg->com_img_path = $file_new_name[$i] . '.' . $file_actaul_ext[$i];
                $path = base_url() . 'image_event/' . $file_new_name[$i] . '.' . $file_actaul_ext[$i];
                $output_image .= '<div id="' . $file_new_name[$i] . '">
                                        <div class="image_container d-flex justify-content-center position-relative" style="border-radius: 7px; width: 200px; height:200px">
                                        <img src="' . $path . '" alt="Image"><span class="position-absolute" style="font-size: 25px;" 
                                        onclick="unlink_new_image(\'' . $file_new_name[$i] . '.' . $file_actaul_ext[$i] . '\')">&times;
                                        </span><input type="text" value="' . $file_new_name[$i] . '.' . $file_actaul_ext[$i] . '" name="new_img[]" 
                                        id="' . $file_new_name[$i] . '_img" hidden><input type="text" value="' . $file_name[$i] . '" name="name_new_image[]" hidden></div>
                                  </div>';
            }
        } else {
            $output_image .= 'error';
        }
        echo json_encode($output_image);
    }

    /*
    * uplink_image_ajax
    * uplink image when cancel edit and add event
    * @input arr_image
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-09-29
    * @Update Date -
    */
    public function uplink_image_ajax()
    {
        // print_r($this->input->post('arr_image'));
        $data = "";
        if ($this->input->post('arr_image') != NULL) {
            $arr_image = $this->input->post('arr_image');
            for ($i = 0; $i < count($arr_image); $i++) {
                unlink('./image_event/' . $arr_image[$i]);
            }
            $data = "success";
        } else {
            $data = "no image";
        }
        echo json_encode($data);
    }

    /*
     * check_name_event_ajax
     * check name event by ajax
     * @input eve_name
     * @output -
     * @author Suwapat Saowarod 62160340
     * @Create Date 2564-10-12
     * @Update -
     */
    function check_name_event_ajax(){
        $this->load->model('Event/M_dcs_event', 'meve');
        $this->meve->eve_name = $this->input->post('eve_name');
        $event = $this->meve->get_by_name()->row();
        if($event){
            // have name company
            echo 1;
        }else{
            echo 2;
        }
    }
}