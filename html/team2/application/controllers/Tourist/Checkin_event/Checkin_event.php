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
      $this->Set_Time_Zone();
   }
   /*
    * check_login_before_check_in
    * show page banner
    * @input 
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-10-12
    * @Update Date -
    */
   function check_login_before_check_in($eve_id)
   {
      //เก็บ seesion ไอดี
      $_SESSION['number_event']     = $eve_id;

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

   function load_checkin_or_checkout_page()
   {
      $this->output_tourist('tourist/manage_event/v_checkin_event', NULL, 'template/Tourist/topbar_tourist_login');
   }



   function load_data_checkin_ajax($eve_id)
   {
      $this->meve->eve_id = $eve_id;
      $data["arr_event"] = $this->meve->get_event_by_id()->result();
      echo json_encode($data);
   }



   function checkin_or_checkout_event()
   {
      $che_eve_id = $this->input->post('eve_id');
      $eve_point = $this->input->post('eve_point');
      $this->mcin->che_eve_id =  $che_eve_id;
    
      $this->mcin->che_tus_id = $this->session->userdata("tourist_id");

      $data_checkin_row = $this->mcin->get_status_by_tus_id()->row();
      //ตั้งค่าเวลา
      $data['date_now'] = $this->get_date_today();
      $data['time_now'] =  $this->get_time_now();

      if ($data_checkin_row) {
         //มีข้อมูลเช็คอินหรือไม่ ดูจากข้อมูลล่าสุด
         if($data_checkin_row->che_status == '1'){
            // ถ้ากรณีข้อมูลล่าสุดมีสถานะ 1 = เช็คอิน
            $status = 2;
            $data['json_message'] = "check-out";

            $this->mdct->tus_score =  $eve_point;
            $this->mdct->tus_id = $this->session->userdata("tourist_id");

            $this->mcin->che_date_time_out =   $data['date_now'] . " " .  $data['time_now'];
            $this->mcin->che_id =  $data_checkin_row->che_id;

            $this->mcin->update_checkout($status);
            $this->mdct->update_score();

         }elseif($data_checkin_row->che_status == '2'){
             // ถ้ากรณีข้อมูลล่าสุดมีสถานะ 2 = เช็คเอาท์
            $status = 1;
            $this->mcin->insert_checkin($status);
            $data['json_message'] = "check-in";
         }
      } else {
          // ถ้ากรณีไม่มีข้อมูล
         $status = 1;
         $this->mcin->insert_checkin($status);
         $data['json_message'] = "check-in";
      }
      unset($_SESSION['number_event']);
      echo json_encode($data);
   }


   function Set_Time_Zone()
   {
      date_default_timezone_set('Asia/Bangkok');
   }

   function get_date_today()
   {
      return date("Y-m-d");
   }

   function get_time_now()
   {
      return date("H:i");
   }

   function get_date_mouth()
   {
      return date("Y-m");
   }
}
