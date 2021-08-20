<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';
   
/*
* Entrepreneur_edit
* edit data Entrepreneur
* @author Thanchanok Thongjumroon 62160089
* @Create Date 2564-07-24
*/

class Entrepreneur_edit extends DCS_controller
{
   /*
    * show_edit_entrepreneur
    * show edit entrepreneurlist page by id in database
    * @input -
    * @output -
    * @author Naaka Punparich 62160082
    * @Create Date 2021-07-24
   */
  public function show_edit_entrepreneur()
  {
     $this->load->model('Entrepreneur/M_dcs_entrepreneur','ment');
     $this->ment->ent_id=$this->session->userdata("Entrepreneur_id");
     $data['arr_ent']=$this->ment->get_entrepreneur_by_id()->result();
     $this->output_edit_entrepreneur($data);
  }

   /*
    * update_entrepreneur
    * Update information for Entrepreneur by id in database
    * @input -
    * @output -
    * @author Thanchanok Thongjumroon 62160089
    * @Create Date 2021-07-24
    * @Update Date 2021-08-05
   */
  public function update_entrepreneur()
  {
     $this->load->model('Entrepreneur/M_dcs_entrepreneur', 'ent');

     $this->ent->ent_pre_id = intval($this->input->post('ent_pre_id'));
     $this->ent->ent_firstname = $this->input->post('ent_firstname');
     $this->ent->ent_lastname = $this->input->post('ent_lastname');
     $this->ent->ent_tel = $this->input->post('ent_tel');
     $this->ent->ent_email = $this->input->post('ent_email');
     $this->ent->ent_id = $this->session->userdata('Entrepreneur_id');
     $this->ent->update_entrepreneur();
     $ent_pre_id = $this->ent->ent_pre_id;
     $ent_name = $this->ent->ent_firstname.' '. $this->ent->ent_lastname;
     $ent_tel = $this->ent->ent_tel;
     $ent_email = $this->ent->ent_email;
     $this->set_session($ent_name, $ent_tel, $ent_email, $ent_pre_id);

     redirect("Entrepreneur/Manage_company/Company_list/show_list_company");
  }

   /*
    * set_session
    * set session 
    * @input -$username, $name, $password, $tel, $card, $email, $pre_id
    * @output -
    * @author Naaka Punparich 62160082
    * @Create Date 2021-07-24
   */
   public function set_session($name, $tel, $email, $pre_id)
   {
      $this->session->set_userdata("Entrepreneur_name", $name);
      $this->session->set_userdata("pre_id", $pre_id);
      $this->session->set_userdata("tel", $tel);
      $this->session->set_userdata("email", $email);
   }
}