<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';
/*
* Tourist_edit
* Tourist edit controller system
* @author Naaka punparich 62160082
* @Create Date 2564-07-24
*/
class Tourist_edit extends DCS_controller
{
   /*
    * show_edit_tourist
    * show edit tourist page
    * @input -
    * @output -
    * @author Naaka Punparich 62160082
    * @Create Date 2564-07-24
   */
   public function show_edit_tourist()
   {
      $this->load->model('Tourist/M_dcs_tourist', 'mtou');
      $this->mtou->tus_id = $this->session->userdata("Tourist_id");
      $data['arr_tus'] = $this->mtou->get_tourist_by_id()->result();
      $this->output_edit_tourist($data);

      $this->load->model('Tourist/M_dcs_tourist_image', 'mpic');
      $tus_img_tus_id = $this->mpic->tus_img_tus_id;
      $this->session->set_userdata("tus_img_tus_id", $tus_img_tus_id);
   }

   /*
    * update_tourist
    * Update information for tourist by id in database
    * @input -
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
      $file = $_FILES['tourist_img'];
      $file_name = $_FILES['tourist_img']['name'];
      $file_tmp_name = $_FILES['tourist_img']['tmp_name'];
      $file_size = $_FILES['tourist_img']['size'];
      $file_error = $_FILES['tourist_img']['error'];

      $file_ext = explode('.', $file_name);
      $file_actaul_ext = strtolower(end($file_ext));

      // Check if there is a problem with the image file. or the file size exceeds 1000000?
      if ($file_error != 0 || $file_size >= 3000000) {
         $error_file = 'false';
      }// ต้องมาแก้ขนาดอีกที  ปรึกษาเรื่องขนาดกับ PO

      if ($error_file != 'false') {
         $this->mtou->update_tourist();
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
         
         redirect("Tourist/Auth/Landing_page_tourist");
      }else {
         $this->show_edit_tourist();
      }
   }
}
