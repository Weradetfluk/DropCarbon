<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';

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
      $this->output_edit_entrepreneur();
   }

   /*
    * update_entrepreneur
    * Update information for Entrepreneur by id in database
    * @input -
    * @output -
    * @author Naaka Punparich 62160082
    * @Create Date 2021-07-24
   */
   public function update_entrepreneur()
   {
      $this->load->model('Entrepreneur/M_dcs_entrepreneur', 'ent');

      $this->ent->ent_pre_id = intval($this->input->post('ent_pre_id'));
      $ent_fname = $this->input->post('ent_fname');
      $ent_lastname = $this->input->post('ent_lastname');
      $ent_name = $ent_fname . " " . $ent_lastname;
      $this->ent->ent_name = $ent_name;
      $this->ent->ent_tel = $this->input->post('ent_tel');
      $this->ent->ent_id_card = $this->input->post('ent_id_card');
      $this->ent->ent_email = $this->input->post('ent_email');
      $this->ent->ent_username = $this->input->post('ent_username');
      $this->ent->ent_password = $this->input->post('ent_password');
      $this->ent->update_entrepreneur($this->session->userdata('Entrepreneur_id'));

      $ent_pre_id = $this->ent->ent_pre_id;
      $ent_name = $this->ent->ent_name;
      $ent_tel = $this->ent->ent_tel;
      $ent_id_card = $this->ent->ent_id_card;
      $ent_email = $this->ent->ent_email;
      $ent_username =  $this->ent->ent_username;
      $ent_password = $this->ent->ent_password;
      $this->set_session($ent_username, $ent_name, $ent_password, $ent_tel, $ent_id_card, $ent_email, $ent_pre_id);

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
   public function set_session($username, $name, $password, $tel, $card, $email, $pre_id)
   {
      $this->session->set_userdata("Entrepreneur_name", $name);
      $this->session->set_userdata("pre_id", $pre_id);
      $this->session->set_userdata("tel", $tel);
      $this->session->set_userdata("card", $card);
      $this->session->set_userdata("email", $email);
      $this->session->set_userdata("username", $username);
      $this->session->set_userdata("password", $password);
   }
}
