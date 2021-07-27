<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';
class Admin_approval_entrepreneur extends DCS_controller
{
  /*
    * @author Weradet Nopsombun 62160110
    */

  public function __construct()
  {
    parent::__construct();
    $this->load->library('email');
  }


  /*
    * index
    * call function in Dcs_controller
    * @input 
    * @output -
    * @author Weradet Nopsombun
    * @Create Date 2564-07-17
    * @Update Date -
    */

  public function index()
  {
    $this->output_admin('admin/manage_entrepreneur/v_list_entrepreneur');
  }


  /*
    * show_data_ajax
    * get all data entrepreneur not approve and show table by ajax
    * @input 
    * @output -
    * @author Weradet Nopsombun
    * @Create Date 2564-07-17
    * @Update Date -
    */

  public function show_data_consider_ajax()
  {
    $this->load->model('Entrepreneur/M_dcs_entrepreneur', 'mdce');

    $data['arr_json_entre'] = $this->mdce->get_all_consider()->result();

    $data['json_message'] = 'success: get_all_data';

    echo json_encode($data['arr_json_entre']);
  }




  /*
    * show_data_approve_ajax
    * get all data entrepreneur approve  and show table by ajax
    * @input 
    * @output -
    * @author Weradet Nopsombun
    * @Create Date 2564-07-17
    * @Update Date -
    */
  public function show_data_approve_ajax()
  {
    $this->load->model('Entrepreneur/M_dcs_entrepreneur', 'mdce');

    $data['arr_json_entre'] = $this->mdce->get_all_approve()->result();

    $data['json_message'] = 'success: get_all_data';

    echo json_encode($data['arr_json_entre']);
  }


  /*
    * Approval
    * change ent_status 
    * @input 
    * @output -
    * @author Weradet Nopsombun
    * @Create Date 2564-07-17
    * @Update Date -
    */
  public function approval_entrepreneur()
  {
    $this->load->model('Entrepreneur/M_dcs_entrepreneur', 'mdce');

    $this->mdce->ent_id = $this->input->post('ent_id');

    $status_number = 2;

    $this->mdce->update_status($status_number);
  }


  /*
    * reject_entrepreneur
    * change ent_status 
    * @input 
    * @output -
    * @author Weradet Nopsombun
    * @Create Date 2564-07-17
    * @Update Date -
    */
  public function reject_entrepreneur()
  {
    $this->load->model('Entrepreneur/M_dcs_entrepreneur', 'mdce');

    $this->mdce->ent_id = $this->input->post('ent_id');
    $reson_admin = $this->input->post('admin_reason');
    $user_email = $this->input->post('email');

    $status_number = 3;
    $this->mdce->update_status($status_number);
    $this->email_send($reson_admin,$user_email);
  }





  /*
    * email_send
    * send email to user
    * @input 
    * @output -
    * @author Weradet Nopsombun
    * @Create Date 2564-07-17
    * @Update Date -
    */

  function email_send($reason, $user_email)
  {
    // Load PHPMailer library
    $this->load->library('phpmailer_lib');

    // PHPMailer object
    $mail = $this->phpmailer_lib->load();

    // SMTP configuration
    $mail->isSMTP();
    $mail->Host     = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'dropcarbonsystem@gmail.com';
    $mail->Password = 'dropcarbon1234';
    $mail->SMTPSecure = 'tls';
    $mail->Port     = 587;
    $mail->charSet = "UTF-8";

    $mail->setFrom('dropcarbonsystem@gmail.com', 'Dropcarbonsystem');


    // Add a recipient
    $mail->addAddress( $user_email);

    $mail->addCC('fluk.weradet@gmail.com');

    // Email subject
    $mail->Subject = 'Admin has been rejected ';

    // Set email format to HTML
    $mail->isHTML(true);

    // Email body content
    $mailContent = "<h1>คุณถูกปฏิเสธการลงทะเบียน</h1>" . "<p>.$reason.</p>";
    $mail->Body = $mailContent;

    // Send email
    if (!$mail->send()) {
      echo 'Message could not be sent.';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
      redirect("Admin/Manage_entrepreneur/Admin_approval_entrepreneur");
    }
  }
}
