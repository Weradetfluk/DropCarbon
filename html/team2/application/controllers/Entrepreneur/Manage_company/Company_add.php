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

        // Create file storage variables
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
                if ($file_error[$i] != 0 || $file_size[$i] >= 5000000) {
                    $error_file = 'false';
                    break;
                }
            }
        }else { 
            $error_file = 'false';
        }

        if ($error_file != 'false') {
            $this->mcom->insert_company();
            $result = $this->mcom->get_by_name()->row();
            $this->mimg->com_img_com_id = $result->com_id;

            // Loop to upload files
            for ($i = 0; $i < count($file_name); $i++) {
                $file_new_name[$i] = uniqid('', true);
                $file_destination[$i] = './image_company/' . $file_new_name[$i] . '.' . $file_actaul_ext[$i];
                move_uploaded_file($file_tmp_name[$i], $file_destination[$i]);
                $this->mimg->com_img_path = $file_new_name[$i] . '.' . $file_actaul_ext[$i];
                $this->mimg->insert_image_company();
            }
            $this->set_session_add_company('success');  
            redirect('Entrepreneur/Manage_company/Company_list/show_list_company');
        } else {
            $this->set_session_add_company('fail');
            redirect('Entrepreneur/Manage_company/Company_add/show_add_company');
        }
        
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
}

