<?php
/*
* Admin_approval_entrepreneur
* Manage Approve reject entrepreneur
* @author weradet nopsombun 62160110
* @Create Date 2564-07-17
*/
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
    $this->load->model('Entrepreneur/M_dcs_entrepreneur', 'mdce');
  }
  /*
    * index
    * show page manage entrepreneur  
    * @input -
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-07-17
    * @Update Date -
    */
  public function index()
  {
    $this->show_data_consider();
  }
  /*
    * show_data_consider
    * get all data entrepreneur not approve and show table
    * @input - 
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-07-17
    * @Update Date 2564-09-13
    */
  public function show_data_consider()
  {
    // เรียกหน้า view รออนุมัติ
    $_SESSION['tab_number'] = 5; //set tab number in topbar_admin.php
    $this->output_admin('admin/manage_entrepreneur/v_list_entrepreneur_consider', null, 'admin/manage_entrepreneur/v_data_card_entrepreneur'); // function ใน dcs_controller
  }

  /*
    * show_data_approve
    * show table entrepreneur approve page
    * @input - 
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-07-17
    * @Update Date -
    */
  public function show_data_approve()
  {
    //โชว์หน้า view ที่อนุมัติ บน Tab บนหัวตตาราง
    $this->output_admin('admin/manage_entrepreneur/v_list_entrepreneur_approve', null, 'admin/manage_entrepreneur/v_data_card_entrepreneur'); // function ใน dcs_controller
  }

  /*
    * show_data_reject
    * show table entrepreneur rejected page
    * @input
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-08-01
    * @Update Date -
    */
  public function show_data_reject()
  {
      //โชว์หน้า view ที่ปฏิเสธ บน Tab บนหัวตตาราง
    $this->output_admin('admin/manage_entrepreneur/v_list_entrepreneur_reject', null, 'admin/manage_entrepreneur/v_data_card_entrepreneur');
  }

  /*
    * show_data_block
    * get all data entrepreneur block and show table
    * @input - 
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-08-01
    * @Update Date -
    */
  public function show_data_block()
  {
     //โชว์หน้า view ที่ถูกระงับ บน Tab บนหัวตตาราง
    $this->output_admin('admin/manage_entrepreneur/v_list_entrepreneur_block', null, 'admin/manage_entrepreneur/v_data_card_entrepreneur');
  }

  /*
    * get_entrepreneur_by_id_ajax
    * get all data entrepreneur by id and file 
    * @input ent_id
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-08-03
    * @Update Date -
    */
  public function get_entrepreneur_by_id_ajax()
  {

    //สำหรับเรียกค่า ข้อมูลส่วนตัว รวมถึงไฟล์ด้วย 
    $this->load->model('Document/M_dcs_document', 'mdoc'); // เรัยกใช้ Model 
    $this->mdoc->doc_ent_id = $this->input->post('ent_id'); //รับค่า Id จากภายนอก สำหรับ file 
    $data['arr_file'] = $this->mdoc->get_by_ent_id()->result(); // เรียกข้อมูลไฟล์ จากDatabase 
    $this->mdce->ent_id = $this->input->post('ent_id');  // รับค่าไอดีสำหรับ ดึงข้อมูล
    $data['arr_data'] = $this->mdce->get_entrepreneur_by_id()->result(); //เรียกข้อมูล ของผุ้ประกอบการ
    echo json_encode($data); // นำข้อมูลทำเป็น JSON 
  }

  /*
    * get_entrepreneur_reject_by_id_ajax
    * get all data reject entrepreneur by id
    * @input ent_id
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-08-01
    * @Update Date - 
    */
  public function get_entrepreneur_reject_by_id_ajax()
  {
    //สำหรับเรียกข้อมูลที่ปฎิเสธ
    $this->load->model('Rejected_entrepreneur/M_dcs_entrepreneur_reject', 'mdre'); // เรียก Moddel 
    $ent_id = $this->input->post('ent_id');  // ค่าที่รับ Post
    $data['arr_data'] = $this->mdre->get_data_rejected_by_id($ent_id)->result(); // เรียกค่าที่มีการ Reject

    echo json_encode($data['arr_data']); // ทำเป็น JSON 
  }

  /*
    * approval_entrepreneur
    * change ent_status 
    * @input ent_id
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-07-17
    * @Update Date -
    */
  public function approval_entrepreneur()
  {
    $this->mdce->ent_id = $this->input->post('ent_id'); //รับค่า Post
    $status_number = 2; // เซ็ตค่าสถานะ 2 = apperove จาก database 
    $this->mdce->update_status($status_number); // update status
  }

  /*
    * reject_entrepreneur
    * change ent_status
    * @input ent_id, admin_reason, email
    * @output - 
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-07-17
    * @Update Date -
    */
  public function reject_entrepreneur()
  {
    // set value from font end
    $this->mdce->ent_id = $this->input->post('ent_id');
    // set data for send mail
    $reson_admin = $this->input->post('admin_reason');
    $user_email = $this->input->post('email');
    $mail_subject = 'Admin has been rejected';
    $mail_content_header = "คุณถูกปฎิเสธการลงทะเบียนของผู้ประกอบการ";
    $admin_id =  $this->session->userdata("admin_id");
    //load model for save rejected data
    $this->load->model('Rejected_entrepreneur/M_dcs_entrepreneur_reject', 'mdre');
    //save data reject to data base
    $this->mdre->enr_admin_reason = $reson_admin;
    $this->mdre->enr_ent_id =  $this->mdce->ent_id;
    $this->mdre->enr_adm_id = $admin_id;
    $this->mdre->insert();
    //update status entrepreneur
    $status_number = 3; // status 3 = rejected
    $this->mdce->update_status($status_number);
    $this->email_send($reson_admin, $user_email, $mail_subject, $mail_content_header);
  }

  /*
    * get_data_card_entrepreneur_ajax
    * get data consider, approve, rejected, block <- number of people
    * @input -
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-07-17
    * @Update Date -
    */
  public function get_data_card_entrepreneur_ajax()
  {
    //card on top view 
    $data['arr_data'] = $this->mdce->get_data_card_entrepreneur()->result(); // get number of card
    $this->output->set_content_type('application/json')->set_output(json_encode($data['arr_data']));
  }

  /*
    * show_data_ajax
    * get all data entrepreneur not approve and show table
    * @input number_status, query
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-09-14
    * @Update Date -
    */
  public function show_data_ajax2($number_status)
  {
    //$number_status = 1;
    $value_search = $this->input->post('query');

    if ($value_search  != '') {
      //กรณีค้นหา
      $data['arr_entrepreneur'] = $this->mdce->get_search($value_search, $number_status)->result();
      echo json_encode($data);
    } else {
      //กรณีไม่ได้ค้นหา
      //define pagation
      $limit = '6'; // limit 6 tablew in table
      $page = 1; // หน้า
      $post_page = $this->input->post("page");
      if ($post_page > 1) {
        $start = (($post_page - 1) * $limit);
        $page = $post_page;
      } else {
        $start = 0;
      }
      $all_count = $this->mdce->get_count_all($number_status);                               //get all count consider
      $data['arr_entrepreneur'] = $this->mdce->get_all_data($limit, $start, $number_status); // query แบบแบ่งหน้า

      if ($data['arr_entrepreneur']) {
        $data['paganition'] = $this->config_pagination($page, $all_count, $limit); // in dddcs_controller
      }
      echo json_encode($data);
    } // else  search 
  }
}
