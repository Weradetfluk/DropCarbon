<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';

/*
* Admin_approval_company
* Manage Approve reject company
* @author Kasama Donwong 62160074
* @Create Date 2564-08-08
*/
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
    * @author Kasama Donwong 62160074
    * @Create Date 2564-08-08
    * @Update Date -
    */

  public function index($data = NULL)
  {
    redirect('Admin/Manage_company/Admin_approval_company/show_data_consider');
  }


  /*
    * show_data_consider
    * get all data company consider and show table
    * @input 
    * @output -
    * @author Kasama Donwong 62160074
    * @Create Date 2564-08-08
    * @Update Date -
    */

  public function show_data_consider()
  {

    $_SESSION['tab_number'] = 3; 

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
    $this->output_admin('admin/manage_company/v_list_company_consider', $data, 'admin/manage_company/v_data_card_company');
  }


  /*
    * show_data_approve
    * get all data company approve  and show table by ajax
    * @input -
    * @output -
    * @author Kasama Donwong 62160074
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
    $this->output_admin('admin/manage_company/v_list_company_approve', $data, 'admin/manage_company/v_data_card_company');
  }

   /*
    * show_data_reject
    * get all data company reject  and show table by ajax
    * @input 
    * @output -
    * @author Nantasiri Saiwaew 62160093
    * @Create Date 2564-08-10
    * @Update Date -
    */
  public function show_data_reject()
  {

    $number_status = 3;

    if (isset($_POST['search'])) {

      $value_search  = $this->input->post("value_search");
      $data['arr_company_reject'] = $this->mdcc->get_search($value_search,  $number_status)->result();
    } else {

      $all_count = $this->mdcc->get_count_all($number_status); //get all count 

      $config =  $this->get_config_pagination($all_count, 'Admin/Manage_company/Admin_approval_company/get_data_reject"');


      $this->pagination->initialize($config);

      $page_aprove = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;

      $data['arr_company_reject'] = $this->mdcc->get_all_data($config["per_page"], $page_aprove, $number_status);
    }
    $data["link_reject"] = $this->pagination->create_links();
    $this->output_admin('admin/manage_company/v_list_company_reject', $data, 'admin/manage_company/v_data_card_company');
  }


  /*
    * get_company_by_id_ajax
    * get all data company by id 
    * @input 
    * @output -
    * @author Kasama Donwong 62160074
    * @Create Date 2564-08-08
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
    * @author Kasama Donwong 62160074
    * @Create Date 2564-08-08
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
    * approval_company
    * change com_status 
    * @input 
    * @output -
    * @author Kasama Donwong 62160074
    * @Create Date 2564-08-08
    * @Update Date -
    */
  public function approval_company()
  {

    $this->mdcc->com_id = $this->input->post('com_id');

    $status_number = 2;

    $this->mdcc->update_status($status_number);
  }

   /*
    * reject_company
    * change com_status and send email to entrepreneur 
    * @input 
    * @output -
    * @author Nantasiri Saiwaew 62160093
    * @Create Date 2564-08-10
    * @Update Date -
    */
  public function reject_company()
  {

  // set value from font end
      $this->mdcc->com_id = $this->input->post('com_id');



      // set data for send mail
      $reson_admin = $this->input->post('admin_reason');
      $user_email = $this->input->post('email');
      $mail_subject = 'Admin has been rejected';
      $mail_content_header = "คุณถูกปฎิเสธการลงทะเบียนของผู้ประกอบการ";
  
      $admin_id =  $this->session->userdata("Admin_id");



      //load model for save rejected data
      $this->load->model('Company/M_dcs_com_reject', 'mdcre');


      //save data reject to data base
      $this->mdcre->com_admin_reason = $reson_admin;
      $this->mdcre->com_ent_id =  $this->mdcc->com_id;
      $this->mdcre->com_adm_id = $admin_id;

      $this->mdcre->insert();


      //update status entrepreneur
      $status_number = 3;
      $this->mdcc->update_status($status_number);
  
   

       $this->email_send($reson_admin, $user_email, $mail_subject, $mail_content_header);
  }

    /*
    * show_detail_company
    * show detail
    * @input 
    * @output -
    * @author weradet nopsombun 62160110 
    * @Create Date 2021-08-20
    * @Update Date -
    */
    public function show_detail_company($com_id)
    {
      
        $this->load->model('Company/M_dcs_company', 'mcom');
        $this->load->model('Company/M_dcs_com_image', 'mimg');
        $this->mcom->com_id = $com_id;
        $this->mimg->com_img_com_id = $com_id;
        $data["arr_company"] = $this->mcom->get_by_detail()->row();
        $data["arr_image"] = $this->mimg->get_by_com_id()->result();
         
        $this->output_admin('admin/manage_company/v_detail_company_admin',$data); 
    }

    /*
      * get_data_card_company_ajax
      * get data consider, approve, rejected <- number of people
      * @input
      * @output -
      * @author Kasama Donwong 62160074
      * @Create Date 2564-08-25
      * @Update Date -
      */
      public function get_data_card_company_ajax()
      {
          $data['arr_data'] = $this->mdcc->get_data_card_company()->result();
  

          $this->output->set_content_type('application/json')->set_output(json_encode($data['arr_data']));
      }
}