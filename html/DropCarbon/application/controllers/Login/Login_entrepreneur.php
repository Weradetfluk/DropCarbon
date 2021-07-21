<?php
defined('BASEPATH') or exit('No direct script access allowed');
require dirname(__FILE__) . '/../DCS_controller.php';

    /*
    * @author Suwapat Saowarod 62160340
    */
class Login_entrepreneur extends DCS_controller
{
    /*
    * index
    * show form login entrepreneur 
    * @input 
    * @output -
    * @author Suwapat Saowarod
    * @Create Date 2021-07-19
    * @Update Date -
    */
    public function index($data = NULL)
    {
        $this->output_login_entrepreneur('entrepreneur/v_login_entrepreneur', $data);
    }

    /*
    * input_login_form
    * Login admin and get data  
    * @input 
    * @output -
    * @author Suwapat Saowarod
    * @Create Date 2021-07-19
    * @Update Date -
    */
    function input_login_form()
    {

        $username = $this->input->post('username');
        $password = $this->input->post('password'); //รับค่า username & password

        $this->load->model('M_dcs_login_entrepreneur', 'mlog');  //load database

        $this->mlog->ent_username = $username;
        $this->mlog->ent_password = $password;

        $result = $this->mlog->login(); //function in model
        
        if ($result) {
        $ent_username =  $result->ent_username;
        $ent_name = $result->ent_name;
        $ent_id= $result->ent_id;
        $this->set_session($ent_username, $ent_name, $ent_id);

        redirect("Entrepreneur/Company_list/show_list_company");

        } else {
        $data_warning = array();
        $data_warning['warning'] = "Username or password incorrect";

        $this->index($data_warning);
        }

    }

    /*
    * logout
    * remove session and back to login  
    * @input 
    * @output -
    * @author Suwapat Saowarod
    * @Create Date 2021-07-19
    * @Update Date -
    */
    public function logout()
    {
        $this->remove_session();
        $this->index(); //back to login
    }

    /*
    * set_session
    * set_session username and Entrepreneur_name
    * @input 
    * @output -
    * @author Suwapat Saowarod
    * @Create Date 2021-07-19
    * @Update Date -
    */
    public function set_session($username, $name, $id)
    {
        $this->session->set_userdata("username", $username);
        $this->session->set_userdata("Entrepreneur_name", $name);
        $this->session->set_userdata("Entrepreneur_id", $id);
    }

    /*
    * remove_session
    * unset session username and Entrepreneur_name
    * @input 
    * @output -
    * @author Suwapat Saowarod
    * @Create Date 2021-07-19
    * @Update Date -
    */
    public function remove_session()
    {
        $this->session->unset_userdata("username");
        $this->session->unset_userdata("Entrepreneur_name");
        $this->session->unset_userdata("Entrepreneur_id");
    }
}