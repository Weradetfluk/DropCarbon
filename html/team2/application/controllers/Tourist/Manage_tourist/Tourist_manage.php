<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';
/*
* Tourist_manage
* Tourist edit controller system
* @author Naaka punparich 62160082
* @Create Date 2564-07-24
*/
class Tourist_manage extends DCS_controller
{
   /*
    * show_information_tourist
    * show edit tourist page
    * @input $data , $tus_img_tus_id
    * @output -
    * @author Naaka Punparich 62160082
    * @Create Date 2564-07-24
   */
   public function show_information_tourist()
   {
      $this->load->model('Tourist/M_dcs_tourist', 'mtou');
      $this->mtou->tus_id = $this->session->userdata("tourist_id");
      $data['arr_tus'] = $this->mtou->get_tourist_by_id()->result();
      $data['arr_prefix'] = $this->mtou->get_all_prefix()->result();
      $this->load->model('Tourist/M_dcs_tourist_image', 'mpic');
      $tus_img_tus_id = $this->mpic->tus_img_tus_id;
      $this->session->set_userdata("tus_img_tus_id", $tus_img_tus_id);
      $this->output_tourist('tourist/manage_tourist/v_information_tourist', $data, 'template/Tourist/topbar_tourist_login');
   }

   /*
    * show_edit_tourist
    * show edit tourist page
    * @input $data , $tus_img_tus_id
    * @output -
    * @author Naaka Punparich 62160082
    * @Create Date 2564-07-24
   */
  public function show_edit_tourist()
  {
     $this->load->model('Tourist/M_dcs_tourist', 'mtou');
     $this->mtou->tus_id = $this->session->userdata("tourist_id");
     $data['arr_tus'] = $this->mtou->get_tourist_by_id()->result();
     $data['arr_prefix'] = $this->mtou->get_all_prefix()->result();
     $this->load->model('Tourist/M_dcs_tourist_image', 'mpic');
     $tus_img_tus_id = $this->mpic->tus_img_tus_id;
     $this->session->set_userdata("tus_img_tus_id", $tus_img_tus_id);
     $this->output_tourist('tourist/manage_tourist/v_edit_tourist', $data, 'template/Tourist/topbar_tourist_login');
  }

   /*
    * update_tourist
    * Update information for tourist by id in database
    * @input $tus_pre_id , $tus_id , $tus_img_path , $file_tmp_name , $file_destination
    * @output -
    * @author Naaka Punparich 62160082
    * @Create Date 2564-07-24
   */
   public function update_tourist()
   {
      $this->load->model('Tourist/M_dcs_tourist', 'mtou');
      $this->load->model('Tourist/M_dcs_tourist_image', 'mpic');
      $this->mtou->tus_pre_id = intval($this->input->post('tus_pre_id'));
      $this->mtou->tus_firstname = $this->input->post('tus_firstname');
      $this->mtou->tus_lastname = $this->input->post('tus_lastname');
      $this->mtou->tus_tel = $this->input->post('tus_tel');
      $this->mtou->tus_birthdate = $this->input->post('tus_birthdate');
      $this->mtou->tus_email = $this->input->post('tus_email');
      $this->mtou->tus_id = $this->input->post('tus_id');

      // set session variable
      $tus_id = $this->mtou->tus_id;
      $tus_pre_id = $this->mtou->tus_pre_id;
      $this->session->set_userdata("pre_id", $tus_pre_id);


      // Create file storage variables
      $file_name = array();
      $file_tmp_name = array();
      $file_size = array();
      $file_error = array();
      $file_ext = array();
      $file_actaul_ext = array();
      $error_file = '';

      // Configure file storage
      $file = $_FILES['tourist_img'] ?? '';
      $file_name = $_FILES['tourist_img']['name'] ?? '';
      $file_tmp_name = $_FILES['tourist_img']['tmp_name'] ?? '';
      $file_size = $_FILES['tourist_img']['size'] ?? '';
      $file_error = $_FILES['tourist_img']['error'] ?? '';

      if ($file != '') {
         $file_ext = explode('.', $file_name);
         $file_actaul_ext = strtolower(end($file_ext));

         if ($file_error != 0 || $file_size >= 3000000) {
            $error_file = 'false';
         }
      } else {
         $error_file = 'false';
      }
      // Check if there is a problem with the image file. or the file size exceeds 1000000?

      if ($error_file != 'false') {
         $this->mtou->update_tourist();
         $this->set_session($this->mtou->tus_firstname . " " . $this->mtou->tus_lastname);
         $this->mpic->tus_img_tus_id = $tus_id;
         $this->mpic->delete_img_by_id($tus_id);

         // Loop to upload files
         $file_new_name = uniqid('', true);
         $file_destination = './profilepicture_tourist/' . $file_new_name . '.' . $file_actaul_ext;
         move_uploaded_file($file_tmp_name, $file_destination);
         $this->mpic->tus_img_path = $file_new_name . '.' . $file_actaul_ext;
         $tus_img_path = $this->mpic->tus_img_path;
         $this->session->set_userdata("tus_img_path", $tus_img_path);
         $this->mpic->insert_img();
         $this->set_session_regis_tourist('success');
         redirect("Tourist/Auth/Landing_page_tourist");
         // เลือกรูป
      } else if (isset($_FILES["tourist_img"]) && empty($_FILES["tourist_img"]["name"])) {
         $this->set_session_regis_tourist('success');
         $this->mtou->update_tourist();
         $this->set_session($this->mtou->tus_firstname . " " . $this->mtou->tus_lastname);
         redirect('Tourist/Auth/Landing_page_tourist');
         // ไม่ได้เลือกรูป
      } else {
         $this->set_session_regis_tourist('fail');
         // $this->show_edit_tourist();
         redirect('Tourist/Manage_tourist/Tourist_edit/show_edit_tourist');
      } // ไฟล์ใหญ่เกิน
   }
   /*
    * set_session_add_tourist
    * add session 
    * @input $data
    * @output -
    * @author Naaka Punparich 62160082
    * @Create Date 2564-09-03
    * @Update Date -
    */
   public function set_session_regis_tourist($data)
   {
      $this->session->set_userdata("error_register_tourist", $data);
   }

   /*
    * set_session
    * set session data
    * @input 
    * @output -
    * @author Naaka Punparich 62160082
    * @Create Date 2564-09-09
    * @Update -
    */

   public function set_session($name)
   {
      $this->session->set_userdata("Tourist_name", "$name");
   }
}
