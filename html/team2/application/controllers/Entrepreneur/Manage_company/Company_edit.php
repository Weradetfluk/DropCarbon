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
    * @input 
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
    * @input 
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-07-19
    * @Update Date 2564-08-12
    */
   public function show_edit_company($com_id)
   {
      $this->load->model('Company/M_dcs_company', 'mcom');
      $this->mcom->com_id = $com_id;
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
    * @input 
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-07-19
    * @Update Date -
    */
   public function edit_company()
   {
      $this->load->model('Company/M_dcs_company', 'mcom');
      $this->mcom->com_name = $this->input->post('com_name');
      $this->mcom->com_description = $this->input->post('com_description');
      $this->mcom->com_id = $this->input->post('com_id');
      $this->mcom->com_lat = $this->input->post('com_lat');
      $this->mcom->com_lon = $this->input->post('com_lon');
      $this->mcom->com_tel = $this->input->post('com_tel');

      if (isset($_FILES['com_file'])) {
         // Create file storage variables
         $fileName = array();
         $fileTmpName = array();
         $fileSize = array();
         $fileError = array();
         $fileExt = array();
         $fileActaulExt = array();
         $error_file = '';

         // Configure file storage
         $file = $_FILES['com_file'];
         $fileName = $_FILES['com_file']['name'];
         $fileTmpName = $_FILES['com_file']['tmp_name'];
         $fileSize = $_FILES['com_file']['size'];
         $fileError = $_FILES['com_file']['error'];

         for ($i = 0; $i < count($fileName); $i++) {
            $fileExt[$i] = explode('.', $fileName[$i]);
            $fileActaulExt[$i] = strtolower(end($fileExt[$i]));

            // Check if there is a problem with the image file. or the file size exceeds 1000000?
            if ($fileError[$i] != 0 || $fileSize[$i] >= 1000000) {
               $error_file = 'false';
               break;
            }
         }

         if ($error_file != 'false') {
            $this->mcom->update_company();
            $this->mimg->com_img_com_id = $this->input->post('com_id');

            // Loop to upload files
            for ($i = 0; $i < count($fileName); $i++) {
               $fileNewName[$i] = uniqid('', true);
               $fileDestination[$i] = './image_company/' . $fileNewName[$i] . '.' . $fileActaulExt[$i];
               move_uploaded_file($fileTmpName[$i], $fileDestination[$i]);
               $this->mimg->com_img_path = $fileNewName[$i] . '.' . $fileActaulExt[$i];
               $this->mimg->insert_image_company();
            }
         } else {
            redirect("Entrepreneur/Manage_company/Company_add/show_edit_company");
         }
      } else {
         $this->mcom->update_company();
      }
      redirect('Entrepreneur/Manage_company/Company_list/show_list_company');
   }
}
