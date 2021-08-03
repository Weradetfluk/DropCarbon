<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';
class Login_admin extends DCS_controller
{
  /*
    * @author Weradet Nopsombun 62160110
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
    * @author Weradet Nopsombun
    * @Create Date 2564-07-17
    * @Update -
    */


  public function index(){
    $this->output_login_admin('admin/auth/v_login_admin');
  }



   /*
    * warnning 
    * show warnning 
    * @input 
    * @output -
    * @author Weradet Nopsombun
    * @Create Date 2564-07-17
    * @Update -
    */

  public function warnning($data)
  {
     $this->output_login_admin('admin/auth/v_login_admin', $data);
    //echo $data['warning'];
  }


   /*
    * input_login_form
    * Login admin and get data 
    * @input 
    * @output -
    * @author Weradet Nopsombun
    * @Create Date 2564-07-17
    * @Update -
    */

  function input_login_form()
  {

    $username = $this->input->post('username');
    $password = $this->input->post('password'); //รับค่า username & password


    //$password = md5($password);

    $this->load->model('Admin/M_dcs_login_admin', 'login');  //load database

    $this->login->adm_username =  $username;
    $this->login->adm_password = $password;

    $result = $this->login->login(); //function in model
     
    if ($result) {
      $adm_username =  $result->adm_username;
      $adm_name = $result->adm_name;
      $adm_id = $result->adm_id;

       $this->set_session($adm_username, $adm_name, $adm_id);

       redirect("Admin/Manage_entrepreneur/Admin_approval_entrepreneur/show_data_consider");

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
    * @author Weradet Nopsombun
    * @Create Date 2564-07-17
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
    * @author Weradet Nopsombun
    * @Create Date 2564-07-17
    * @Update -
    */

  public function set_session($username, $name, $id)
  {
    $this->session->set_userdata("username", "$username");
    $this->session->set_userdata("Admin_name", "$name");
    $this->session->set_userdata("Admin_id", "$id");

  }

 
    /*
    * remove_session
    * remove session data
    * @input 
    * @output -
    * @author Weradet Nopsombun
    * @Create Date 2564-07-17
    * @Update -
    */

  public function remove_session()
  {
    $this->session->unset_userdata("username");
    $this->session->unset_userdata("Admin_name");
  }
}
