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
    $this->load->library('pagination');
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

  public function index($data = NULL)
  {
    $this->output_admin('admin/manage_entrepreneur/v_list_entrepreneur', $data);
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

  public function show_data_consider()
  {
    $this->load->model('Entrepreneur/M_dcs_entrepreneur', 'mdce');

    $all_count = $this->mdce->get_count_all_consider(); //get all count consider

    $config = array();
    $config['base_url'] = base_url() . "Admin/Manage_entrepreneur/Admin_approval_entrepreneur/show_data_consider";
    $config['total_rows'] = $all_count;
    $config['per_page'] = 5;
    $config["uri_segment"] = 5;

    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';
    $config['first_tag_open'] = '<li class="page-item disabled"><span class="page-link">';
    $config['first_tag_close'] = '</span></li>';
    $config['prev_link'] = '&laquo';
    $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
    $config['prev_tag_close'] = '</span></li>';
    $config['next_link'] = '&raquo';
    $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
    $config['next_tag_close'] = '</span></li>';
    $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
    $config['last_tag_close'] = '</span></li>';
    $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
    $config['num_tag_close'] = '</span></li>';


    $this->pagination->initialize($config);

    $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;

    $data['arr_entrepreneur'] = $this->mdce->get_all_consider($config["per_page"], $page);

    $data["links"] = $this->pagination->create_links();

  


    $this->output_admin('admin/manage_entrepreneur/v_list_entrepreneur', $data);

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
  public function show_data_approve()
  {


    $this->load->model('Entrepreneur/M_dcs_entrepreneur', 'mdce');

    $all_count_approve = $this->mdce->get_count_all_approve(); //get all count approve
  

    $config_approve = array();
    $config_approve['base_url'] = base_url() . "Admin/Manage_entrepreneur/Admin_approval_entrepreneur/get_data_approve";
    $config_approve['total_rows'] = $all_count_approve;
    $config_approve['per_page'] = 5;
    $config_approve["uri_segment"] = 5;

    $config_approve['full_tag_open'] = '<ul class="pagination">';
    $config_approve['full_tag_close'] = '</ul>';
    $config_approve['first_tag_open'] = '<li class="page-item disabled"><span class="page-link">';
    $config_approve['first_tag_close'] = '</span></li>';
    $config_approve['prev_link'] = '&laquo';
    $config_approve['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
    $config_approve['prev_tag_close'] = '</span></li>';
    $config_approve['next_link'] = '&raquo';
    $config_approve['next_tag_open'] = '<li class="page-item"><span class="page-link">';
    $config_approve['next_tag_close'] = '</span></li>';
    $config_approve['last_tag_open'] = '<li class="page-item"><span class="page-link">';
    $config_approve['last_tag_close'] = '</span></li>';
    $config_approve['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
    $config_approve['cur_tag_close'] = '</a></li>';
    $config_approve['num_tag_open'] = '<li class="page-item"><span class="page-link">';
    $config_approve['num_tag_close'] = '</span></li>';


    $this->pagination->initialize($config_approve);

    $page_aprove = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;

    $data['arr_entrepreneur_approve'] = $this->mdce->get_all_data_approve($config_approve["per_page"], $page_aprove);

    $data["link_approve"] = $this->pagination->create_links();
    $this->output_admin('admin/manage_entrepreneur/v_list_entrepreneur_approve', $data);


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
    $this->email_send($reson_admin, $user_email);
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
    $mail->Username = 'weradet2543@gmail.com';
    $mail->Password = 'fluk@1234';
    $mail->SMTPSecure = 'tls';
    $mail->Port     = 587;
    $mail->charSet = "UTF-8";

    $mail->setFrom('dropcarbonsystem@gmail.com', 'Dropcarbonsystem');


    // Add a recipient
    $mail->addAddress($user_email);

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
      redirect("Admin/Manage_entrepreneur/Admin_approval_entrepreneur/show_data_consider");
    }
  }
}
