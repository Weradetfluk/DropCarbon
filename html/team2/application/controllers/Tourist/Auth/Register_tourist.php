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
        $this->load->model('Tourist/M_dcs_tourist', 'mtou');
        $this->load->model('Tourist/M_dcs_tourist_image', 'mpic');
        $this->mtou->tus_pre_id = intval($this->input->post('tus_pre_id'));
        $this->mtou->tus_firstname = $this->input->post('tus_firstname');
        $this->mtou->tus_lastname = $this->input->post('tus_lastname');
        $this->mtou->tus_tel = $this->input->post('tus_tel');
        $this->mtou->tus_birthdate = $this->input->post('tus_birthdate');
        $this->mtou->tus_email = $this->input->post('tus_email');
        $this->mtou->tus_username = $this->input->post('tus_username');
        $this->mtou->tus_password = $this->input->post('tus_password');
        $this->mtou->tus_status = 1;
        
        // Create file storage variables
        $fileName = array();
        $fileTmpName = array();
        $fileSize = array();
        $fileError = array();
        $fileExt = array();
        $fileActaulExt = array();
        $error_file = '';

        // Configure file storage
        $file = $_FILES['tourist_img'];
        $fileName = $_FILES['tourist_img']['name'];
        $fileTmpName = $_FILES['tourist_img']['tmp_name'];
        $fileSize = $_FILES['tourist_img']['size'];
        $fileError = $_FILES['tourist_img']['error'];

            $fileExt = explode('.', $fileName);
            $fileActaulExt = strtolower(end($fileExt));

            // Check if there is a problem with the image file. or the file size exceeds 1000000?
            if ($fileError != 0 || $fileSize >= 1000000) {
                $error_file = 'false';
            }   

        if ($error_file != 'false') {
            $this->mtou->insert_tourist();
            $result = $this->mtou->get_by_username_password();
            $this->mpic->tus_img_tus_id = $result->tus_id;
            // Loop to upload files
                $fileNewName = uniqid('', true);
                $fileDestination = './profilepicture_tourist/' . $fileNewName . '.' . $fileActaulExt;
                move_uploaded_file($fileTmpName, $fileDestination);
                $this->mpic->tus_img_path = $fileNewName . '.' . $fileActaulExt;
                $this->mpic->insert_img();
            $this->set_session_regis_tourist('success');  
            redirect('Landing_page/Register/Select_register');//redirect ไปที่หน้าหลัก
        } else {
            $this->set_session_regis_tourist('fail');
            redirect("Tourist/Auth/Register_tourist/show_regis_tourist");//redirect ไปที่หน้าฟอร์มกรอกข้อมูล
        }
        
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
        $this->load->model('Tourist/M_dcs_tourist', 'mtou');
        $this->mtou->tus_username = $this->input->post('tus_username');

        $result = $this->mtou->check_username()->row(); //function in model


        if ($result) {
            echo 1;
        } else{
            echo 2;
        }
    }
    /*
    * set_session_add_tourist
    * add session 
    * @input $data
    * @output -
    * @author Thanisorn thumsawanit 62160088
    * @Create Date 2564-08-23
    * @Update Date -
    */
    public function set_session_regis_tourist($data){
        $this->session->set_userdata("error_register_tourist", $data);
    }
}