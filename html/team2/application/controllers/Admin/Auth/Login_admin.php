<?php
/*
* Login_admin
* Class for login
* @author weradet nopsombun 62160110
* @Create Date 2564-07-17
*/
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
    * @author Weradet Nopsombun 62160110 
    * @Create Date 2564-07-17
    * @Update -
  */
  public function index()
  {
    $this->output_login_admin('admin/auth/v_login_admin');
  }

  /*
    * warnning 
    * show warnning 
    * @input data
    * @output -
    * @author Weradet Nopsombun 62160110
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
    * @input username, password
    * @output -
    * @author Weradet Nopsombun 62160110 
    * @Create Date 2564-07-17
    * @Update -
    */
  function input_login_form()
  {

    $username = $this->input->post('username');
    $password = $this->input->post('password'); //รับค่า username & password


    //$password = md5($password);

    $this->load->model('Admin/M_dcs_admin', 'login');  //load database

    $this->login->adm_username = $username;
    $this->login->adm_password = md5($password);

    $result = $this->login->login(); //function in model

    if ($result) {
      $adm_username =  $result->adm_username;
      $adm_name = $result->adm_name;
      $adm_id = $result->adm_id;

      $this->set_session($adm_username, $adm_name, $adm_id);

      redirect("Admin/Manage_dashboard/Admin_view_dashboard");
    } else {
      $data_warning = array();
      $data_warning['warning'] = "ชื่อผู้ใช้หรือรหัสผ่านของคุณไม่ถูกต้อง";

      $this->warnning($data_warning);
    }
  }

  /*
    * logout
    * Logout and remove session
    * @input -
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-07-17
    * @Update -
    */
  public function logout()
  {
    $this->remove_session();
    unset($_SESSION['tab_number']);
    $this->index(); //back to login
  }

  /*
    * set_session
    * set session data
    * @input username, name, id
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-07-17
    * @Update -
    */
  public function set_session($username, $name, $id)
  {
    $this->session->set_userdata("username", "$username");
    $this->session->set_userdata("admin_name", "$name");
    $this->session->set_userdata("admin_id", "$id");
  }


  /*
    * remove_session
    * remove session data
    * @input -
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-07-17
    * @Update -
    */
  public function remove_session()
  {
    $this->session->unset_userdata("username");
    $this->session->unset_userdata("admin_name");
    $this->session->unset_userdata("admin_id");
  }


  /*
    * forgot_password_page
    * load view forgot pass
    * @input -
    * @output -
    * @author Weradet Nopsombun 62160110 
    * @Create Date 2564-08-12
    * @Update -
    */
  public function forgot_password_page()
  {
    $this->output_login_admin('admin/auth/v_forgot_password_admin');
  }

  /*
    * check_email_admin
    * check email in database
    * @input user_email
    * @output -
    * @author Weradet Nopsombun 62160110 
    * @Create Date 2564-08-12
    * @Update -
    */
  public function check_email_admin()
  {

    $email = $this->input->post('user_email');

    $this->load->model('Admin/M_dcs_admin', 'login');  //load database

    $this->login->adm_email = $email;

    $result =  $this->login->check_email();


    if ($result) {
      echo 1; //ture

      $this->send_mail_reset($email);
    } else {
      echo 2; //false
    }
  }

  /*
    * send_mail_reset
    * check email in database
    * @input email
    * @output -
    * @author Weradet Nopsombun 62160110 
    * @Create Date 2564-08-12
    * @Update -
    */

  public function send_mail_reset($email)
  {
    // set userpassword in token 
    $token = rand(1000, 9999);

    $this->load->model('Admin/M_dcs_admin', 'login');  //load database

    $this->login->adm_email = $email;

    $this->login->update_pass_token($token);

    // Load PHPMailer library
    $this->load->library('phpmailer_lib');

    // PHPMailer object
    $mail = $this->phpmailer_lib->load();

    // SMTP configuration
    $mail->isSMTP();
    $mail->Host     = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'weradet2543@gmail.com';
    $mail->Password = 'exwcdkscfpjaouei';
    $mail->SMTPSecure = 'tls';
    $mail->Port     = 587;
    $mail->charSet = "UTF-8";

    $mail->setFrom('dropcarbonsystem@gmail.com', 'Dropcarbonsystem');


    // Add a recipient
    $mail->addAddress($email);

    // Email subject
    $mail->Subject = "Reset Password";

    // Set email format to HTML
    $mail->isHTML(true);

    // Email body content
    $mail_content = "<h1>" . "กรุณาคลิกที่ลิ้งด้านล่างเพื่อเปลี่ยนรหัสผ่าน" . "</h1><br>" . "<a href='" . base_url('Admin/Auth/Login_admin/reset_password_page?token=') . $token . "'>Reset Password</a>";
    $mail->Body = $mail_content;
    if (!$mail->send()) {
      echo 'Message could not be sent.';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
  }

  /*
    * reset_password_page
    * check email in database
    * @input -
    * @output -
    * @author Weradet Nopsombun 62160110 
    * @Create Date 2564-08-12
    * @Update -
    */
  public function reset_password_page()
  {
    $data['token'] = $this->input->get('token');
    $this->output_login_admin('admin/auth/v_reset_password_admin', $data);
  }



  /*
    * update_password_ajax
    * update password admin
    * @input password, token
    * @output -
    * @author Weradet Nopsombun 62160110 
    * @Create Date 2564-08-12
    * @Update -
    */
  public function update_password_ajax()
  {
    $password = $this->input->post('password');

    $token = $this->input->post('token');

    $this->load->model('Admin/M_dcs_admin', 'login');  //load database

    $this->login->adm_password = $password;

    $this->login->update_pass($token);
  }
}