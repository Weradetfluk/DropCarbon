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
      $this->load->model('Company/M_dcs_com_image', 'mimg');
      // $this->load->model('Company/dcs_com_image', 'mimg');
      $this->mcom->com_id = $com_id;
      $this->mimg->com_img_com_id = $com_id;
      // $this->mimg->dcs_com_image = $com_id;
      $data['arr_company'] = $this->mcom->get_by_id()->result();
      $data['arr_image'] = $this->mimg->get_by_com_id()->result();
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
      // save data company to database
      $this->mcom->update_company();
      $this->set_session_edit_company('success'); 
      $this->mimg->com_img_com_id = $this->input->post('com_id');

      // save data image to database
      $arr_img_add = array();
      $arr_img_add = $this->input->post('new_img');
      $this->mimg->com_img_com_id = $this->input->post('com_id');
      if($arr_img_add != ''){
         for ($i = 0; $i < count($arr_img_add); $i++) {
            $this->mimg->com_img_path = $arr_img_add[$i];
            $this->mimg->insert_image_company();
         }
      }

      // delete data image to database
      $arr_img_delete_old = array();
      $arr_img_delete_old = $this->input->post('del_old_img');
      if($arr_img_delete_old != ''){
         $arr_img_delete = $this->input->post('del_new_img');
         if($arr_img_delete != ''){
            for($i = 0; $i < count($arr_img_delete); $i++){
               array_push ($arr_img_delete, $arr_img_delete[$i]);
            }
         }
      }else{
         $arr_img_delete_old = $this->input->post('del_new_img');
      }
     
      // print_r($arr_img_delete);
      if($arr_img_delete_old != ''){
          for ($i = 0; $i < count($arr_img_delete_old); $i++) {
              $this->mimg->com_img_path = $arr_img_delete_old[$i];
              unlink('./image_company/' . $arr_img_delete_old[$i]);
              $this->mimg->delete_image_company();
          }
      }

      redirect('Entrepreneur/Manage_company/Company_list/show_list_company');

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

  /*
     * check_name_company_ajax
     * check name company by ajax
     * @input com_name
     * @output -
     * @author Suwapat Saowarod 62160340
     * @Create Date 2564-09-03
     * @Update -
     */
    function check_name_company_ajax(){
      $this->load->model('Company/M_dcs_company', 'mcom');
      $this->mcom->com_name = $this->input->post('com_name');
      $company = $this->mcom->get_by_name()->row();
      if($company){
         if($company->com_id != $this->input->post('com_id')){
            // have name company
            echo 1;
         }else{
            // have name company but is old name           
            echo 2;
         }
      }else{
         // don't have name company
          echo 2;
      }
  }
}
