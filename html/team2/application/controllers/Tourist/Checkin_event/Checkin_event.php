<?php
/*
* Checkin_event.php
* checkin and check out
* @author Weradet Nopsombun  62160110
* @Create Date 2564-10-14
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';
class Checkin_event extends DCS_controller
{
   /*
    * @author Weradet Nopsombun 62160110
    */
   public function __construct()
   {
      parent::__construct();
      $this->load->model('Event/M_dcs_event', 'meve');
      $this->load->model('Checkin/M_dcs_checkin', 'mcin');
      $this->load->model('Tourist/M_dcs_tourist', 'mdct');
      $this->load->helper('mydate_helper.php');
      set_time_zone();
   }
   /*
    * check_login_before_check_in
    * check login and set session id event
    * @input 
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-10-12
    * @Update Date -
    */
   function check_login_before_check_in($eve_id)
   {
      //เก็บ seesion ไอดี
      $_SESSION['eve_id'] = $eve_id;
      //เช็คว่ามีการ Login หรือยัง

      if (!$this->session->has_userdata("tourist_id")) {
         $path = site_url() . "Tourist/Auth/Login_tourist";
         header("Location: " . $path);
         exit();
      } else {
         //กรณีlogin แล้ว
         redirect("Tourist/Checkin_event/Checkin_event/load_checkin_or_checkout_page");
      }
   }
   /*
    * load_checkin_or_checkout_page
    * show page checkin
    * @input 
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-10-12
    * @Update Date -
    */
   function load_checkin_or_checkout_page()
   {
      $this->output_tourist('tourist/manage_event/v_checkin_event', NULL, 'template/Tourist/topbar_tourist_login');
   }
   /*
    * load_data_checkin_ajax
    * Load data for cal culate lat lon
    * @input 
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-10-12
    * @Update Date -
    */
   function load_data_checkin_ajax($eve_id)
   {
      $this->meve->eve_id = $eve_id;
      $data["arr_event"] = $this->meve->get_event_by_id()->result();
      echo json_encode($data);
   }
     /*
    * checkin_or_checkout_event
    * checkin and check out logic
    * @input 
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-10-12
    * @Update Date -
    */
    function checkin_or_checkout_event()
    {
       $che_eve_id = $this->input->post('eve_id');
       $eve_point = $this->input->post('eve_point');
       $this->mcin->che_eve_id =  $che_eve_id;
       $this->mcin->che_tus_id = $this->session->userdata("tourist_id");
       $data_checkin_row = $this->mcin->get_status_by_tus_id()->row();
       //ตั้งค่าเวลา
       $data['date_now'] = get_date_today();
       $data['time_now'] = get_time_now();
       if ($data_checkin_row) {
          //มีข้อมูลเช็คอินหรือไม่ ดูจากข้อมูลล่าสุด
          if ($data_checkin_row->che_status == '1') {
             // ถ้ากรณีข้อมูลล่าสุดมีสถานะ 1 = เช็คอิน
             $status = 2;
             $this->mdct->tus_score =  $eve_point;
             $this->mdct->tus_id = $this->session->userdata("tourist_id");
             $this->mcin->che_date_time_out =   $data['date_now'] . " " .  $data['time_now'];
             $this->mcin->che_id =  $data_checkin_row->che_id;
             $this->mcin->update_checkout($status);
             $this->mdct->update_score();
             $tus_score_new = $this->mdct->get_point_tourist_by_id()->row();
             $this->session->unset_userdata("tus_score");
             $this->session->set_userdata("tus_score", $tus_score_new->tus_score);
             $data['json_message'] = 'check-out';
          } elseif ($data_checkin_row->che_status == '2') {
             // ถ้ากรณีข้อมูลล่าสุดมีสถานะ 2 = เช็คเอาท์
             $status = 1;
             $this->mcin->insert_checkin($status);
             $data['json_message'] = 'check-in';
          }
       } else {
          // ถ้ากรณีไม่มีข้อมูล
          $status = 1;
          $this->mcin->insert_checkin($status);
          $data['json_message'] = 'check-in';
       }
       unset($_SESSION['eve_id']);
       unset($_SESSION['eve_point']);
       unset($_SESSION['eve_lat']);
       unset($_SESSION['eve_lon']);
       echo json_encode($data);
    }
   /*
    * show page checkin
    * show page checkin tourist
    * @input 
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-12-14
    * @Update Date -
    */
   function show_page_checkin()
   {
      $this->load->model('Event/M_dcs_event', 'mde');
      $this->load->model('Event/M_dcs_eve_category', 'mcat');
      $this->load->model('Checkin/M_dcs_checkin', 'mche');
      $data['arr_eve_cat'] = $this->mde->get_eve_cat()->result();
      $data['eve_cat'] = $this->mcat->get_all()->result();
      $tus_id = $this->session->userdata("tourist_id");
      if (isset($_POST)) {
         $data["checkin"] = $this->mche->get_checkin_by_eve_id($tus_id, $_POST)->result();
      } else {
         $data["checkin"] = $this->mche->get_checkin_by_eve_id($tus_id)->result();
      }
      for ($i = 0; $i < count($data['checkin']); $i++) {
         $data['time_format_checkin'][$i] = to_format($data['checkin'][$i]->che_date_time_in);
         $data['time_format_checkout'][$i] = to_format($data['checkin'][$i]->che_date_time_out);
      }
      if ($this->session->has_userdata("tourist_id")) {
         $topbar = 'template/Tourist/topbar_tourist_login';
      } else {
         $topbar = 'template/Tourist/topbar_tourist';
      }
      $this->output_tourist('tourist/manage_event/v_list_event_tourist', $data, $topbar, 'footer');
   }
}