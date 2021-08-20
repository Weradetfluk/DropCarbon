<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';
    /*
    * Register_tourist
    * register new tourist user
    * @author Thanisorn thumsawanit 62160088
    * @Create Date 2564-07-31
    */
class Register_tourist extends DCS_controller {
    public function __construct() {
        parent::__construct();
    }
    /*
    * show_regis_tourist
    * output register tourist page
    * @input
    * @output -
    * @author Thanisorn thumsawanit 62160088
    * @Create Date 2564-07-31
    * @Update -
    */
    public function show_regis_tourist() {
        $this->output_regis('tourist/auth/v_regis_tourist');
    }

    /*
    * insert_tourist
    * output register new tourist
    * @input tourist data
    * @output -
    * @author Thanisorn thumsawanit 62160088
    * @Create Date 2564-07-31
    * @Update Date 2564-08-11
    */
	public function insert_tourist() {
        $this->load->model('Tourist/M_dcs_tourist', 'tr');
        $this->load->model('Tourist/M_dcs_tourist_image', 'mpic');
        $this->tr->tus_pre_id = intval($this->input->post('tus_pre_id'));
        $this->tr->tus_firstname = $this->input->post('tus_firstname');
        $this->tr->tus_lastname = $this->input->post('tus_lastname');
        $this->tr->tus_tel = $this->input->post('tus_tel');
        $this->tr->tus_birthdate = $this->input->post('tus_birthdate');
        $this->tr->tus_email = $this->input->post('tus_email');
        $this->tr->tus_username = $this->input->post('tus_username');
        $this->tr->tus_password = $this->input->post('tus_password');
        $this->tr->tus_status = 1;
        //$this->tr->insert_tourist();
        
        //สร้างตัวแปรเก็บข้อมูลไฟล์
        $error_file='';

        //กำหนดค่าเก็บข้อมูลไฟล์
        $file = $_FILES['myfile'];
        $fileName = $_FILES['myfile']['name'];
        $fileTmpName = $_FILES['myfile']['tmp_name'];
        $fileSize = $_FILES['myfile']['size']; 
        $fileError = $_FILES['myfile']['error'];

            $fileExt = explode('.', $fileName);
            $fileActaulExt = strtolower(end($fileExt));

            if($fileError != 0 || $fileSize >= 1000000){
                $error_file = 'false';
            }      
            if($error_file != 'false'){
            $this->tr->insert_tourist();
            $result = $this->tr->get_by_username_password();
            //print_r($result);
            $this->mpic->tus_img_tus_id = $result->tus_id;
                $fileNewName = uniqid('', true);
                $fileDestination = './profilepicture_tourist/'.$fileNewName.'.'.$fileActaulExt;
                move_uploaded_file($fileTmpName, $fileDestination);
                $this->mpic->tus_img_path = $fileNewName.'.'.$fileActaulExt;
                $this->mpic->insert_img();
            
        }else{
            redirect("Tourist/Auth/Register_tourist/show_regis_tourist");//redirect ไปที่หน้าฟอร์มกรอกข้อมูล
        }
        redirect('Landing_page/Register/Select_register');//redirect ไปที่หน้าหลัก
    }

    /*
    * check_username_tourist_ajax
    * output check username
    * @input tourist username
    * @output -
    * @author Thanisorn thumsawanit 62160088
    * @Create Date 2564-08-10
    * @Update Date 2564-08-10
    */
    public function check_username_tourist_ajax(){
        $this->load->model('Tourist/M_dcs_tourist', 'tr');
        $this->tr->tus_username = $this->input->post('tus_username');

        $result = $this->tr->check_username()->row(); //function in model


        if ($result) {
            echo 1;
        } else{
            echo 2;
        }
    }
}