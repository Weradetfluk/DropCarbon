<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';

/*
* Event_list
* Manage list event by entrepreneur
* @author Acharaporn pornpattansap
* @Create Date 2564-09-16
*/
class Event_edit extends DCS_controller
{
    /*
    * show_edit_event
    * show display edit event
    * @input eve_id
    * @output -
    * @author Acaharaporn pornpattanasap 62160344 
    * @Create Date 2564-09-25
    * @Update Date -
    */
    public function show_edit_event($eve_id)
    {
        $this->load->model('Event/M_dcs_event', 'meve');
        $this->load->model('Event/M_dcs_eve_category', 'mcat');
        $this->load->model('Company/M_dcs_company', 'mcom');
        $this->meve->eve_id = $eve_id;
        $this->mcat->eve_cat_id = $eve_id;
        $this->mcom->com_ent_id = $this->session->userdata("entrepreneur_id");
        $data['arr_event'] = $this->meve->get_by_detail()->result();
        $data['arr_category'] = $this->mcat->get_all()->result();
        $data['arr_company'] = $this->mcom->get_by_ent_id()->result();
        $view = 'entrepreneur/manage_event/v_edit_event';
        $this->output_entrepreneur($view, $data);
    }

    /*
    * edit_event
    * edit event
    * @input eve_name, eve_description, eve_com_id, eve_id, new_img, com_id, del_old_img, del_new_img
    * @output -
    * @author Acaharaporn pornpattanasap 62160344 
    * @Create Date 2564-09-25
    * @Update Date -
    */
    public function edit_event()
    {

        // $this->load->model('Event/M_dcs_eve_image', 'mimg');
        $this->load->model('Event/M_dcs_event', 'deve');
        $this->load->model('Event/Da_dcs_eve_image', 'mimg');


        $this->deve->eve_name = $this->input->post('eve_name');
        $this->deve->eve_description = $this->input->post('eve_description');
        $this->deve->eve_com_id = $this->input->post('eve_com_id');
        $this->deve->eve_status = 1;
        $this->deve->eve_id = $this->input->post('eve_id');

        // save data company to database
        $this->deve->update_event();
        $this->set_session_edit_event('success');
        $this->mimg->eve_img_eve_id = $this->input->post('eve_id');

        // save data image to database
        $arr_img_add = array();
        $arr_img_add = $this->input->post('new_img');
        $this->mimg->eve_img_eve_id = $this->input->post('eve_id');
        if ($arr_img_add != '') {
            for ($i = 0; $i < count($arr_img_add); $i++) {
                $this->mimg->eve_img_path = $arr_img_add[$i];
                $this->mimg->insert_image_event();
            }
        }

        // delete data image to database
        $arr_img_delete_old = array();
        $arr_img_delete_old = $this->input->post('del_old_img');
        if ($arr_img_delete_old != '') {
            $arr_img_delete = $this->input->post('del_new_img');
            if ($arr_img_delete != '') {
                for ($i = 0; $i < count($arr_img_delete); $i++) {
                    array_push($arr_img_delete, $arr_img_delete[$i]);
                }
            }
        } else {
            $arr_img_delete_old = $this->input->post('del_new_img');
        }

        // print_r($arr_img_delete);
        if ($arr_img_delete_old != '') {
            for ($i = 0; $i < count($arr_img_delete_old); $i++) {
                $this->mimg->eve_img_path = $arr_img_delete_old[$i];
                unlink('./image_event/' . $arr_img_delete_old[$i]);
                $this->mimg->delete_image_event();
            }
        }

        redirect('Entrepreneur/Manage_event/Event_list/show_list_event');
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
    * @input arr_img
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
    * delete_company
    * update com_status = 4 in database
    * @input com_id
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-07-19
    * @Update Date -
    */
    public function delete_event()
    {
        $this->load->model('Company/M_dcs_event', 'mdeve');
        $this->mdeve->eve_id = $this->input->post('eve_id');
        $this->mdeve->delete_event();
    }

    /*
    * set_session_edit_company
    * edit session 
    * @input $data
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-08-23
    * @Update Date -
    */
    public function set_session_edit_event($data)
    {
        $this->session->set_userdata("error_edit_event", $data);
    }
}