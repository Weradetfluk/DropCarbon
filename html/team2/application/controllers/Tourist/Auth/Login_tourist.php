<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';
/*
* Login_tourist
* login tourist controller system
* @author Chutipon Thermsirisuksin 62160081
* @Create Date 2564-08-05
*/
class Login_tourist extends DCS_controller
{
    /*
    * @author Chutipon Thermsirisuksin 62160081
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
    * @author Chutipon Thermsirisuksin 62160081
    * @Create Date 2564-08-05
    * @Update -
    */


    public function index()
    {
        $this->output_login_tourist('tourist/auth/v_login_tourist');
    }



    /*
    * warnning 
    * show warnning 
    * @input 
    * @output -
    * @author Chutipon Thermsirisuksin 62160081
    * @Create Date 2564-08-05
    * @Update -
    */

    public function warnning($data)
    {
        $this->output_login_tourist('tourist/auth/v_login_tourist', $data);
        //echo $data['warning'];
    }


    /*
    * input_login_form
    * Login admin and get data 
    * @input 
    * @output -
    * @author Chutipon Thermsirisuksin 62160081
    * @Create Date 2564-08-05
    * @Update -
    */

    function input_login_form()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password'); //รับค่า username & password

        //$password = md5($password);

        $this->load->model('Tourist/M_dcs_login_tourist', 'mlog');  //load database
        $this->load->model('Tourist/M_dcs_tourist_image', 'mpic');

        $this->mlog->tus_username =  $username;
        $this->mlog->tus_password = $password;

        $result = $this->mlog->login(); //function in model

        if ($result) {
            $this->mpic->tus_img_tus_id = $result->tus_id;
            $result_img = $this->mpic->get_by_tourist_id()->row();
            $tus_username =  $result->tus_username;
            $tus_name = $result->tus_firstname . ' ' . $result->tus_lastname;
            $tus_id = $result->tus_id;
            if ($result_img != null) {
                $tus_img_path = $result_img->tus_img_path;
                $this->set_session($tus_username, $tus_name, $tus_id, $tus_img_path);
            }else {
                $this->set_session($tus_username, $tus_name, $tus_id, '');
            }
            //echo $tus_name; test name
            // echo $tus_img_path; test path
            redirect("Tourist/Auth/Landing_page_tourist");
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
    * @author Chutipon Thermsirisuksin 62160081
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
    * @author Chutipon Thermsirisuksin 62160081
    * @Create Date 2564-08-05
    * @Update -
    */

    public function set_session($username, $name, $id, $tus_img_path)
    {
        $this->session->set_userdata("username", "$username");
        $this->session->set_userdata("Tourist_name", "$name");
        $this->session->set_userdata("Tourist_id", "$id");
        $this->session->set_userdata("tus_img_path", $tus_img_path);
    }


    /*
    * remove_session
    * remove session data
    * @input 
    * @output -
    * @author Chutipon Thermsirisuksin 62160081
    * @Create Date 2564-08-05
    * @Update -
    */

    public function remove_session()
    {
        $this->session->unset_userdata("username");
        $this->session->unset_userdata("Tourist_name");
    }
}
