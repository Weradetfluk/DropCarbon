<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';


/*
* Company_edit
* Manage edit company by entrepreneur
* @author Suwapat Saowarod 62160340
* @Create Date 2564-07-19
*/
class Company_edit extends DCS_controller
{
   /*
    * delete_company
    * update com_status = 4 in database
    * @input com_id
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-07-19
    * @Update Date -
    */
   public function delete_company()
   {
      $this->load->model('Company/M_dcs_company', 'mcom');
      $this->mcom->com_id = $this->input->post('com_id');
      $this->mcom->delete_company();
   }

   /*
    * show_edit_company
    * update show form edit company
    * @input com_id
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-07-19
    * @Update Date 2564-08-12
    */
   public function show_edit_company($com_id)
   {
      $this->load->model('Company/M_dcs_company', 'mcom');
      // $this->load->model('Company/dcs_com_image', 'mimg');
      $this->mcom->com_id = $com_id;
      // $this->mimg->dcs_com_image = $com_id;
      $data['arr_company'] = $this->mcom->get_by_id()->result();
      //   print_r($data['arr_company']);
      $this->load->view('template/Entrepreneur/header_entrepreneur');
      $this->load->view('template/Entrepreneur/javascript_entrepreneur');
      $this->load->view('template/Entrepreneur/topbar_entrepreneur');
      $this->load->view('entrepreneur/manage_company/v_edit_company', $data);
      $this->load->view('template/Entrepreneur/footer');
   }

   /*
    * edit_company
    * edit company to database
    * @input com_name, com_description, com_id, com_lat, com_lon, com_tel, com_file
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-07-19
    * @Update Date -
    */
   public function edit_company()
   {
      $this->load->model('Company/M_dcs_company', 'mcom');
      $this->load->model('Company/M_dcs_com_image', 'mimg');
      $this->mcom->com_name = $this->input->post('com_name');
      $this->mcom->com_description = $this->input->post('com_description');
      $this->mcom->com_id = $this->input->post('com_id');
      $this->mcom->com_lat = $this->input->post('com_lat');
      $this->mcom->com_lon = $this->input->post('com_lon');
      $this->mcom->com_tel = $this->input->post('com_tel');

      if (isset($_FILES["com_file"]) && !empty($_FILES["com_file"]["name"])) {
         // Create file storage variables
         $file_name = array();
         $file_tmp_name = array();
         $file_size = array();
         $file_error = array();
         $file_ext = array();
         $file_actaul_ext = array();
         $error_file = '';

         // Configure file storage
         $file = $_FILES['com_file'];
         $file_name = $_FILES['com_file']['name'];
         $file_tmp_name = $_FILES['com_file']['tmp_name'];
         $file_size = $_FILES['com_file']['size'];
         $file_error = $_FILES['com_file']['error'];

         for ($i = 0; $i < count($file_name); $i++) {
            $file_ext[$i] = explode('.', $file_name[$i]);
            $file_actaul_ext[$i] = strtolower(end($file_ext[$i]));

            // Check if there is a problem with the image file. or the file size exceeds 1000000?
            if ($file_error[$i] != 0 || $file_size[$i] >= 1000000) {
               $error_file = 'false';
               break;
            }
         }

         if ($error_file != 'false') {
            $this->mcom->update_company();
            $this->mimg->com_img_com_id = $this->input->post('com_id');

            // Loop to upload files
            for ($i = 0; $i < count($file_name); $i++) {
               $file_new_name[$i] = uniqid('', true);
               $file_destination[$i] = './image_company/' . $file_new_name[$i] . '.' . $file_actaul_ext[$i];
               move_uploaded_file($file_tmp_name[$i], $file_destination[$i]);
               $this->mimg->com_img_path = $file_new_name[$i] . '.' . $file_actaul_ext[$i];
               $this->mimg->insert_image_company();
            }
            $this->set_session_edit_company('success');  
            redirect('Entrepreneur/Manage_company/Company_list/show_list_company');
         } else {
            $this->set_session_edit_company('fail');  
            $view = "Entrepreneur/Manage_company/Company_edit/show_edit_company/".$this->input->post('com_id');
            redirect($view);
         }
      } else {
         $this->set_session_edit_company('success');  
         $this->mcom->update_company();
         redirect('Entrepreneur/Manage_company/Company_list/show_list_company');
      }
      
   }

   /*
    * set_session_edit_company
    * edit session 
    * @input $data
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-08-23
    * @Update Date -
    */
    public function set_session_edit_company($data){
      $this->session->set_userdata("error_edit_company", $data);
  }
}
