<?php
defined('BASEPATH') or exit('No direct script access allowed');
require dirname(__FILE__) . '/../../DCS_controller.php';

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
        $this->output_login_entrepreneur('entrepreneur/auth/v_login_entrepreneur', $data);
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

        $this->load->model('Entrepreneur/M_dcs_entrepreneur', 'mlog');  //load database

        $this->mlog->ent_username = $username;
        $this->mlog->ent_password = $password;

        $result = $this->mlog->login(); //function in model
        
        if ($result) {
        $ent_username =  $result->ent_username;
        $ent_name = $result->ent_name;
        $ent_id= $result->ent_id;
        $ent_password = $result->ent_password;
        $ent_tel = $result->ent_tel;
        $ent_id_card = $result->ent_id_card;
        $ent_email = $result->ent_email;
        $ent_pre_id = $result->ent_pre_id;
        $this->set_session($ent_username, $ent_name, $ent_id, $ent_password, $ent_tel, $ent_id_card, $ent_email, $ent_pre_id);

        redirect("Entrepreneur/Manage_company/Company_list/show_list_company");

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
    public function set_session($username, $name, $id, $password, $tel, $card, $email, $pre_id)
    {
        $this->session->set_userdata("username", $username);
        $this->session->set_userdata("Entrepreneur_name", $name);
        $this->session->set_userdata("Entrepreneur_id", $id);
        $this->session->set_userdata("password", $password);
        $this->session->set_userdata("tel", $tel);
        $this->session->set_userdata("card", $card);
        $this->session->set_userdata("email", $email);
        $this->session->set_userdata("pre_id", $pre_id);
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