<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';

    /*
    * @author Suwapat Saowarod 62160340
    */

class Company_add extends DCS_controller{
    /*
    * show_add_company
    * show form add company
    * @input 
    * @output -
    * @author Suwapat Saowarod
    * @Create Date 2021-07-18
    * @Update Date -
    */
    public function show_add_company(){
        $this->load->view('template/Entrepreneur/header_entrepreneur');
        $this->load->view('template/Entrepreneur/javascript_entrepreneur');
        $this->load->view('template/Entrepreneur/topbar_entrepreneur');
        $this->load->view('entrepreneur/manage_company/v_add_company');
        $this->load->view('template/Entrepreneur/footer');
    }

     /*
    * add_company
    * add company to database
    * @input 
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2021-07-18
    * @Update Date 2021-08-05
    */
    public function add_company(){
        $this->load->model('Company/M_dcs_company', 'mcom');
        $this->load->model('Company/M_dcs_com_image', 'mimg');
        $this->mcom->com_name=$this->input->post('com_name');
        $this->mcom->com_lat=0;
        $this->mcom->com_lon=0;
        $this->mcom->com_description=$this->input->post('com_description');
        $this->mcom->com_ent_id=$this->session->userdata("Entrepreneur_id");
        $this->mcom->com_tel = $this->input->post('com_tel');

        //สร้างตัวแปรเก็บข้อมูลไฟล์
        $fileName = array();
        $fileTmpName = array();
        $fileSize = array();
        $fileError = array();
        $fileExt = array();
        $fileActaulExt = array();
        $error_file='';

        //กำหนดค่าเก็บข้อมูลไฟล์
        $file = $_FILES['com_file'];
        $fileName = $_FILES['com_file']['name'];
        $fileTmpName = $_FILES['com_file']['tmp_name'];
        $fileSize = $_FILES['com_file']['size']; 
        $fileError = $_FILES['com_file']['error'];

        for($i = 0; $i < count($fileName); $i++){
            $fileExt[$i] = explode('.', $fileName[$i]);
            $fileActaulExt[$i] = strtolower(end($fileExt[$i]));

            if($fileError[$i] != 0 || $fileSize[$i] >= 1000000){
                $error_file = 'false';
                break;
            }
        }

        if($error_file != 'false'){
            $this->mcom->add_company();
            $result = $this->mcom->get_by_name()->row();
            $this->mimg->com_img_com_id = $result->com_id;
            for($i = 0; $i < count($fileName); $i++){
                $fileNewName[$i] = uniqid('', true);
                $fileDestination[$i] = './image_company/'.$fileNewName[$i].'.'.$fileActaulExt[$i];
                move_uploaded_file($fileTmpName[$i], $fileDestination[$i]);
                $this->mimg->com_img_path = $fileNewName[$i].'.'.$fileActaulExt[$i];
                $this->mimg->insert_image_company();
            }
        }else{
            redirect("Entrepreneur/Manage_company/Company_add/show_add_company");
        }
            redirect('Entrepreneur/Manage_company/Company_list/show_list_company');
    }
    
    /*
    * show_google_map
    * show_google_map 
    * @input 
    * @output -
    * @author Suwapat Saowarod
    * @Create Date 2021-07-31
    * @Update Date -
    */
    public function show_google_map(){
        $this->load->view('entrepreneur/manage_company/v_map_company');
    }
}