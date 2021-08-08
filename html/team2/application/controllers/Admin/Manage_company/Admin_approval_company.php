<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';
class Admin_approval_company extends DCS_controller
{
  /*
    * @author Kasama Donwong 62160074
    */

  public function __construct()
  {
    parent::__construct();
    $this->load->library('email');
    $this->load->library('pagination');
    $this->load->model('Company/M_dcs_company', 'mdcc');
  }


  /*
    * index
    * call function in Dcs_controller
    * @input 
    * @output -
    * @author Kasama Donwong
    * @Create Date 2564-08-06
    * @Update Date -
    */

  public function index($data = NULL)
  {
    $this->output_company_card('admin/manage_company/v_list_company_consider', $data);
  }






  /*
    * show_data_consider
    * get all data company not approve and show table
    * @input 
    * @output -
    * @author Weradet Nopsombun
    * @Create Date 2564-07-17
    * @Update Date 2564-07-31
    */

  public function show_data_consider()
  {


    $number_status = 1;

    if (isset($_POST['search'])) {

      $value_search  = $this->input->post("value_search");
      $data['arr_company'] = $this->mdcc->get_search($value_search,  $number_status)->result();
    } else {
      $all_count = $this->mdcc->get_count_all($number_status); //get all count consider

      $config =  $this->get_config_pagination($all_count, 'Admin/Manage_company/Admin_approval_company/show_data_consider');
      $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
      $config =  $this->get_config_pagination($all_count, 'Admin/Manage_company/Admin_approval_company/show_data_consider');
      $data['arr_company'] = $this->mdcc->get_all_data($config["per_page"], $page,  $number_status);
      $this->pagination->initialize($config);
    }
    $data["links"] = $this->pagination->create_links();
    $this->output_admin('admin/manage_company/v_list_company_consider', $data);
  }


  /*
    * show_data_approve_ajax
    * get all data company approve  and show table by ajax
    * @input 
    * @output -
    * @author Weradet Nopsombun
    * @Create Date 2564-07-17
    * @Update Date -
    */
  public function show_data_approve()
  {

    $number_status = 2;

    if (isset($_POST['search'])) {

      $value_search  = $this->input->post("value_search");
      $data['arr_company'] = $this->mdcc->get_search($value_search,  $number_status)->result();
    } else {


      $all_count = $this->mdcc->get_count_all($number_status); //get all count approve

      $config =  $this->get_config_pagination($all_count, 'Admin/Manage_company/Admin_approval_company/get_data_approve"');


      $this->pagination->initialize($config);

      $page_aprove = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;

      $data['arr_company_approve'] = $this->mdcc->get_all_data($config["per_page"], $page_aprove, $number_status);
    }
    $data["link_approve"] = $this->pagination->create_links();
    $this->output_admin('admin/manage_company/v_list_company_approve', $data);
  }



  /*
    * get_company_by_id_ajax
    * get all data company by id 
    * @input 
    * @output -
    * @author Weradet Nopsombun
    * @Create Date 2564-08-03
    * @Update Date
    */
  public function get_company_by_id_ajax()
  {
    $this->load->model('Document/M_dcs_document', 'mdoc');
    $this->mdoc->doc_ent_id = $this->input->post('ent_id');
    $data['arr_file'] = $this->mdoc->get_by_ent_id()->result();

    $this->mdcc->ent_id = $this->input->post('ent_id');


    $data['arr_data'] = $this->mdcc->get_company_by_id()->result();

    echo json_encode($data);
  }


  /*
    * get_config_pagination
    * get_config_pagination codeigniter "1 2 3 4..." page
    * @input 
    * @output -
    * @author Weradet Nopsombun
    * @Create Date 2564-08-01
    * @Update Date
    */


  public function get_config_pagination($all_count, $view)
  {

    $config = array();
    $config['base_url'] = base_url() .  $view;
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

    return $config;
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
  public function approval_company()
  {

    $this->mdcc->com_id = $this->input->post('com_id');

    $status_number = 2;

    $this->mdcc->update_status($status_number);
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
    $mail->Password = 'sykildxigujdlfnz';
    $mail->SMTPSecure = 'tls';
    $mail->Port     = 587;
    $mail->charSet = "UTF-8";

    $mail->setFrom('dropcarbonsystem@gmail.com', 'Dropcarbonsystem');


    // Add a recipient
    $mail->addAddress($user_email);

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
      redirect("Admin/Manage_company/Admin_approval_company/show_data_consider");
    }
  }
}