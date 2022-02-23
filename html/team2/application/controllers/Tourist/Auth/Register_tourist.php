<?php
/*
* Register_tourist
* register new tourist user
* @author Thanisorn thumsawanit 62160088
* @Create Date 2564-07-31
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';
class Register_tourist extends DCS_controller
{
    /*
    * @author Thanisorn thumsawanit 62160088
    */
    public function __construct()
    {
        parent::__construct();
    }
    /*
    * show_regis_tourist
    * output register tourist page
    * @input - 
    * @output -
    * @author Thanisorn thumsawanit 62160088
    * @Create Date 2564-07-31
    * @Update by Naaka Punparich 62160082
    * @Update 2564-10-15
    */
    public function show_regis_tourist()
    {
        date_default_timezone_set('Asia/Bangkok');
        $data['year_now'] = date("Y");
        $this->session->unset_userdata("tus_img_path");
        $this->load->model('Tourist/M_dcs_tourist', 'mtou');
        $data['arr_prefix'] = $this->mtou->get_all_prefix()->result();
        $this->output_tourist('tourist/auth/v_regis_tourist', $data, 'template/Tourist/topbar_tourist');
    }

    /*
    * insert_tourist
    * output register new tourist
    * @input tourist, data
    * @output -
    * @author Thanisorn thumsawanit 62160088
    * @Create Date 2564-07-31
    * @Update Date 2564-08-11
    */
    public function insert_tourist()
    {
        $this->load->model('Tourist/M_dcs_tourist', 'mtou');
        $this->load->model('Tourist/M_dcs_tourist_image', 'mpic');
        $this->mtou->tus_pre_id = intval($this->input->post('tus_pre_id'));
        $this->mtou->tus_firstname = $this->input->post('tus_firstname');
        $this->mtou->tus_lastname = $this->input->post('tus_lastname');
        $this->mtou->tus_tel = $this->input->post('tus_tel');
        $this->mtou->tus_email = $this->input->post('tus_email');
        $this->mtou->tus_username = $this->input->post('tus_username');
        $this->mtou->tus_password = md5($this->input->post('tus_password'));
        $this->mtou->tus_status = 1;
        $this->mtou->tus_birthdate = $this->input->post('tus_birth_year').'-'.$this->input->post('tus_birth_month').'-'.$this->input->post('tus_birth_date');
        

        // Create file storage variables
        $file_name = array();
        $file_tmp_name = array();
        $file_size = array();
        $file_error = array();
        $file_ext = array();
        $file_actaul_ext = array();
        $error_file = '';

        // Configure file storage
        $file = $_FILES['tourist_img'] ?? '';
        $file_name = $_FILES['tourist_img']['name'] ?? '';
        $file_tmp_name = $_FILES['tourist_img']['tmp_name'] ?? '';
        $file_size = $_FILES['tourist_img']['size'] ?? '';
        $file_error = $_FILES['tourist_img']['error'] ?? '';

        if ($file != '') {
            $file_ext = explode('.', $file_name);
            $file_actaul_ext = strtolower(end($file_ext));

            if ($file_error != 0 || $file_size >= 3000000) {
                $error_file = 'false';
            }
        } else {
            $error_file = 'false';
        }
        // Check if there is a problem with the image file. or the file size exceeds 1000000?

        if ($error_file != 'false') {
            $this->mtou->insert_tourist();
            $result = $this->mtou->get_by_username_password();
            $this->mpic->tus_img_tus_id = $result->tus_id;

            // Loop to upload files
            $file_new_name = uniqid('', true);
            $file_destination = './profilepicture_tourist/' . $file_new_name . '.' . $file_actaul_ext;
            move_uploaded_file($file_tmp_name, $file_destination);
            $this->mpic->tus_img_path = $file_new_name . '.' . $file_actaul_ext;
            $this->mpic->insert_img();
            $this->set_session_regis_tourist('success');
            redirect(''); //redirect ไปที่หน้าหลัก

        } else if (isset($_FILES["tourist_img"]) && empty($_FILES["tourist_img"]["name"])) {
            $this->set_session_regis_tourist('success');
            $this->mtou->insert_tourist();
            redirect('');
        } else {
            $this->set_session_regis_tourist('fail');
            redirect('Tourist/Auth/Register_tourist/show_regis_tourist');
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
    public function check_username_tourist_ajax()
    {
        $this->load->model('Tourist/M_dcs_tourist', 'mtou');
        $this->mtou->tus_username = $this->input->post('tus_username');

        $result = $this->mtou->check_username()->row(); //function in model

        if ($result) {
            echo 1;
        } else {
            echo 2;
        }
    }
    /*
    * set_session_regis_tourist
    * set session 
    * @input $data
    * @output -
    * @author Thanisorn thumsawanit 62160088
    * @Create Date 2564-08-23
    * @Update Date -
    */
    public function set_session_regis_tourist($data)
    {
        $this->session->set_userdata("error_register_tourist", $data);
    }

    /*
    * check_email_tourist_ajax
    * output check username
    * @input tourist username
    * @output -
    * @author Thanisorn thumsawanit 62160088
    * @Create Date 2564-09-13
    * @Update Date 2564-09-13
    */
    public function check_email_tourist_ajax()
    {
        $this->load->model('Tourist/M_dcs_tourist', 'mtou');
        $this->mtou->tus_email = $this->input->post('tus_email');

        $result = $this->mtou->check_email()->row(); //function in model

        if ($result) {
            echo 1;
        } else {
            echo 2;
        }
    }
    /*
    * check_phone_number_tourist_ajax
    * output check phone number
    * @input tourist phone number
    * @output -
    * @author Thanisorn thumsawanit 62160088
    * @Create Date 2564-09-20
    * @Update Date 2564-09-20
    */
    public function check_phone_number_tourist_ajax()
    {
        $this->load->model('Tourist/M_dcs_tourist', 'mtou');
        $this->mtou->tus_tel = $this->input->post('tus_tel');

        $result = $this->mtou->check_phone_number()->row(); //function in model

        if ($result) {
            echo 1;
        } else {
            echo 2;
        }
    }
}