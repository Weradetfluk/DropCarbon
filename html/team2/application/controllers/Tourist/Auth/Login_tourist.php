<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';
class Login_tourist extends DCS_controller
{
    /*
    * @author Chutipon Thermsirisuksin
    */


    public function __construct()
    {
        parent::__construct();
    }

    /*
    * index
    * index 
    * @input 
    * @output -
    * @author Chutipon Thermsirisuksin
    * @Create Date 2564-08-05
    * @Update -
    */


    public function index()
    {
        $this->output_login_admin('tourist/auth/v_login_tourist');
    }



    /*
    * warnning 
    * show warnning 
    * @input 
    * @output -
    * @author Chutipon Thermsirisuksin
    * @Create Date 2564-08-05
    * @Update -
    */

    public function warnning($data)
    {
        $this->output_login_admin('tourist/auth/v_login_tourist', $data);
        //echo $data['warning'];
    }


    /*
    * input_login_form
    * Login admin and get data 
    * @input 
    * @output -
    * @author Chutipon Thermsirisuksin
    * @Create Date 2564-08-05
    * @Update -
    */

    function input_login_form()
    {

        $username = $this->input->post('username');
        $password = $this->input->post('password'); //รับค่า username & password


        //$password = md5($password);

        $this->load->model('Tourist/M_dcs_login_tourist', 'login');  //load database

        $this->login->tus_username =  $username;
        $this->login->tus_password = $password;

        $result = $this->login->login(); //function in model

        if ($result) {
            $tus_username =  $result->tus_username;
            $tus_name = $result->tus_firstname . ' ' . $result->tus_lastname;
            $tus_id = $result->tus_id;

            $this->set_session($tus_username, $tus_name, $tus_id);
            //echo $tus_name;
            redirect("Landing_page_tourist/Landing_page_tourist");
        } else {
            $data_warning = array();
            $data_warning['warning'] = "ชื่อผู้ใช้หรือรหัสผ่านของคุณไม่ถูกต้อง";

            $this->warnning($data_warning);
        }
    }

    /*
    * logout
    * Logout and remove session
    * @input 
    * @output -
    * @author Chutipon Thermsirisuksin
    * @Create Date 2564-08-05
    * @Update -
    */

    public function logout()
    {
        $this->remove_session();
        $this->index(); //back to login
    }

    /*
    * set_session
    * set session data
    * @input 
    * @output -
    * @author Chutipon Thermsirisuksin
    * @Create Date 2564-08-05
    * @Update -
    */

    public function set_session($username, $name, $id)
    {
        $this->session->set_userdata("username", "$username");
        $this->session->set_userdata("Tourist_name", "$name");
        $this->session->set_userdata("Tourist_id", "$id");
    }


    /*
    * remove_session
    * remove session data
    * @input 
    * @output -
    * @author Chutipon Thermsirisuksin
    * @Create Date 2564-08-05
    * @Update -
    */

    public function remove_session()
    {
        $this->session->unset_userdata("username");
        $this->session->unset_userdata("Tourist_name");
    }
}