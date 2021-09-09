<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';

/*
* Company_add
* Manage add company by entrepreneur
* @author Suwapat Saowarod 62160340
* @Create Date 2564-07-18
*/
class Company_add extends DCS_controller
{
    /*
    * show_add_company
    * show form add company
    * @input 
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-07-18
    * @Update Date -
    */
    public function show_add_company()
    {
        $this->load->view('template/Entrepreneur/header_entrepreneur');
        $this->load->view('template/Entrepreneur/javascript_entrepreneur');
        $this->load->view('template/Entrepreneur/topbar_entrepreneur');
        $this->load->view('entrepreneur/manage_company/v_add_company');
        $this->load->view('template/Entrepreneur/footer');
    }

    /*
    * add_company
    * add company to database
    * @input com_name, com_lat, com_lon, com_description, entrepreneur_id, com_tel
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-07-18
    * @Update Date 2564-08-05
    */
    public function add_company()
    {
        $this->load->model('Company/M_dcs_company', 'mcom');
        $this->load->model('Company/M_dcs_com_image', 'mimg');
        $this->mcom->com_name = $this->input->post('com_name');
        $this->mcom->com_lat = $this->input->post('com_lat');
        $this->mcom->com_lon = $this->input->post('com_lon');
        $this->mcom->com_description = $this->input->post('com_description');
        $this->mcom->com_ent_id = $this->session->userdata("entrepreneur_id");
        $this->mcom->com_tel = $this->input->post('com_tel');
    
        $this->mcom->insert_company();
        $this->set_session_add_company('success');
        $result = $this->mcom->get_by_name()->row();
        
        
        // save data image to database
        $arr_img_add = array();
        $arr_img_add = $this->input->post('new_img');
        $this->mimg->com_img_com_id = $result->com_id;
        for ($i = 0; $i < count($arr_img_add); $i++) {
            $this->mimg->com_img_path = $arr_img_add[$i];
            $this->mimg->insert_image_company();
        }

        // delete data image to database
        $arr_img_delete = array();
        $arr_img_delete= $this->input->post('del_new_img');
        if($arr_img_delete != ''){
            for ($i = 0; $i < count($arr_img_delete); $i++) {
                $this->mimg->com_img_path = $arr_img_delete[$i];
                unlink('./image_company/' . $arr_img_delete[$i]);
                $this->mimg->delete_image_company();
            }
        }
          
        redirect('Entrepreneur/Manage_company/Company_list/show_list_company');
    }

    /*
    * set_session_add_company
    * add session 
    * @input $data
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-08-23
    * @Update Date -
    */
    public function set_session_add_company($data){
        $this->session->set_userdata("error_add_company", $data);
    }

    /*
    * upload_image_ajax
    * upload image
    * @input com_file
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-08-26
    * @Update Date 2564-08-28
    */
    public function upload_image_ajax(){
        $file_name = array();
        $file_tmp_name = array();
        $file_size = array();
        $file_error = array();
        $file_ext = array();
        $file_actaul_ext = array();
        $error_file = '';

        // Configure file storage

        $file = $_FILES['com_file'] ?? '';
        $file_name = $_FILES['com_file']['name'] ?? '';
        $file_tmp_name = $_FILES['com_file']['tmp_name'] ?? '';
        $file_size = $_FILES['com_file']['size'] ?? '';
        $file_error = $_FILES['com_file']['error'] ?? '';
    
        if($file != ''){
            for ($i = 0; $i < count($file_name); $i++) {
                $file_ext[$i] = explode('.', $file_name[$i]);
                $file_actaul_ext[$i] = strtolower(end($file_ext[$i]));

                // Check if there is a problem with the image file. or the file size exceeds 1000000?
                if ($file_error[$i] != 0 || $file_size[$i] >= 3000000) {
                    $error_file = 'false';
                    break;
                }
            }
        }else { 
            $error_file = 'false';
        }

        $output_image = '';
        if ($error_file != 'false') {
            // Loop to upload files
            for ($i = 0; $i < count($file_name); $i++) {
                $file_new_name[$i] = uniqid('', true);
                $file_destination[$i] = './image_company/' . $file_new_name[$i] . '.' . $file_actaul_ext[$i];
                move_uploaded_file($file_tmp_name[$i], $file_destination[$i]);
                // $this->mimg->com_img_path = $file_new_name[$i] . '.' . $file_actaul_ext[$i];
                $path = base_url() . 'image_company/' . $file_new_name[$i] . '.' . $file_actaul_ext[$i];
                $output_image .= '<div id="' . $file_new_name[$i] . '">
                                        <div class="image_container d-flex justify-content-center position-relative" style="border-radius: 7px; width: 200px; height:200px">
                                        <img src="' . $path . '" alt="Image"><span class="position-absolute" style="font-size: 25px;" 
                                        onclick="unlink_new_image(\'' . $file_new_name[$i] . '.' . $file_actaul_ext[$i] . '\')">&times;
                                        </span><input type="text" value="' . $file_new_name[$i] . '.' . $file_actaul_ext[$i] . '" name="new_img[]" 
                                        id="' . $file_new_name[$i] . '_img" hidden></div>
                                  </div>';
            }
        } else {
            $output_image .= 'error';
        }
        echo json_encode($output_image);
    }

    /*
    * uplink_image_ajax
    * uplink image when cancel add company
    * @input arr_img
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-08-28
    * @Update Date -
    */
    public function uplink_image_ajax(){
        // print_r($this->input->post('arr_image'));
        $data = "";
        if($this->input->post('arr_image') != NULL){
            $arr_image = $this->input->post('arr_image');
            for($i = 0; $i < count($arr_image); $i++){
                unlink('./image_company/' . $arr_image[$i]);
            }
            $data = "success";
        }else{
            $data = "no image";
        }
        echo json_encode($data);
    }

    /*
     * check_name_company_ajax
     * check name company by ajax
     * @input com_name
     * @output -
     * @author Suwapat Saowarod 62160340
     * @Create Date 2564-09-03
     * @Update -
     */
    function check_name_company_ajax(){
        $this->load->model('Company/M_dcs_company', 'mcom');
        $this->mcom->com_name = $this->input->post('com_name');
        $company = $this->mcom->get_by_name()->row();
        if($company){
            // have name company
            echo 1;
        }else{
            echo 2;
        }
    }
}

