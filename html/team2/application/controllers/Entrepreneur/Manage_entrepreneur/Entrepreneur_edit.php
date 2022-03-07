<?php
/*
* Entrepreneur_edit
* edit data Entrepreneur
* @author Thanchanok Thongjumroon 62160089
* @Create Date 2564-07-24
* @Update Date 2564-09-19
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';

class Entrepreneur_edit extends DCS_controller
{
   /*
    * show_edit_entrepreneur
    * show edit entrepreneur list page by id in database
    * @input -
    * @output -
    * @author Naaka Punparich 62160082
    * @Create Date 2564-07-24
   */
  public function show_edit_entrepreneur()
  {
     $_SESSION['tab_number_entrepreneur'] = 4;
     $this->load->model('Entrepreneur/M_dcs_entrepreneur','ment');
     $this->ment->ent_id=$this->session->userdata("entrepreneur_id");
     $data['arr_ent']=$this->ment->get_entrepreneur_by_id()->result();
     $data['arr_prefix'] = $this->ment->get_entrepreneur_prefix()->result();
     date_default_timezone_set('Asia/Bangkok');
      $data['year_now'] = date("Y");
     $view = 'entrepreneur/manage_entrepreneur/v_edit_entrepreneur';
     $this->output_entrepreneur($view, $data);
  }

  /*
   * update_entrepreneur
   * Update information for Entrepreneur by id in database
   * @input ent_pre_id, ent_firstname, ent_lastname, ent_tel, ent_email, ent_password, ent_birth_year, ent_birth_month, ent_birth_date
   * @output -
   * @author Thanchanok Thongjumroon 62160089
   * @Create Date 2564-07-24
   * @Update Date 2564-08-05
   * @Update Date 2564-09-19
  */
 public function update_entrepreneur()
 {

     // print_r($this->input->post('ent_birthdate'));
     $this->load->model('Entrepreneur/M_dcs_entrepreneur', 'ment');

     $this->ment->ent_pre_id = intval($this->input->post('ent_pre_id'));
     $this->ment->ent_firstname = $this->input->post('ent_firstname');
     $this->ment->ent_lastname = $this->input->post('ent_lastname');
     $this->ment->ent_tel = $this->input->post('ent_tel');
     $this->ment->ent_email = $this->input->post('ent_email');
     $this->ment->ent_id = $this->session->userdata('entrepreneur_id');
     if($this->input->post('ent_password') != $this->session->userdata('password')){
         $this->ment->ent_password = md5($this->input->post('ent_password'));
     }else{
         $this->ment->ent_password = $this->session->userdata('password');
     }
     $this->ment->ent_birthdate = $this->input->post('ent_birth_year').'-'.$this->input->post('ent_birth_month').'-'.$this->input->post('ent_birth_date');
      
     $this->ment->update_entrepreneur();
     $ent_pre_id = $this->ment->ent_pre_id;
     $ent_name = $this->ment->ent_firstname.' '. $this->ment->ent_lastname;
     $ent_tel = $this->ment->ent_tel;
     $ent_email = $this->ment->ent_email;
     $ent_password = $this->ment->ent_password;
     $this->set_session($ent_name, $ent_tel, $ent_email, $ent_pre_id);
     $this->session->set_userdata("error_edit_entrepreneur", 'success');
    //redirect("Entrepreneur/Manage_Entrepreneur/Entrepreneur_edit/show_edit_entrepreneur");
     $this->show_edit_entrepreneur();
 }

  /*
   * set_session
   * set session entrepreneur_name, pre_id, tel, email
   * @input $username, $name, $password, $tel, $card, $email, $pre_id
   * @output -
   * @author Naaka Punparich 62160082
   * @Create Date 2564-07-24
  */
  public function set_session($name, $tel, $email, $pre_id)
  {
     $this->session->set_userdata("entrepreneur_name", $name);
     $this->session->set_userdata("pre_id", $pre_id);
     $this->session->set_userdata("tel", $tel);
     $this->session->set_userdata("email", $email);
  }
}