<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';

class Tourist_edit extends DCS_controller
{
   /*
    * show_edit_tourist
    * show edit tusrepreneurlist page by id in database
    * @input -
    * @output -
    * @author Naaka Punparich 62160082
    * @Create Date 2564-07-24
   */
   public function show_edit_tourist()
   {
      $this->load->model('Tourist/M_dcs_tourist', 'mtus');
      $this->mtus->tus_id = $this->session->userdata("Tourist_id");
      $data['arr_tus'] = $this->mtus->get_tourist_by_id()->result();
      $this->output_edit_tourist($data);
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
      $this->load->model('Tourist/M_dcs_tourist', 'tus');

      $this->tus->tus_pre_id = intval($this->input->post('tus_pre_id'));
      $this->tus->tus_firstname = $this->input->post('tus_firstname');
      $this->tus->tus_lastname = $this->input->post('tus_lastname');
      $this->tus->tus_tel = $this->input->post('tus_tel');
      $this->tus->tus_birthdate = $this->input->post('tus_birthdate');
      $this->tus->tus_email = $this->input->post('tus_email');
      $this->tus->tus_id = $this->session->userdata('Tourist_id');
      $this->tus->update_tourist();

      $tus_pre_id = $this->tus->tus_pre_id;
      $tus_name = $this->tus->tus_firstname . ' ' . $this->tus->tus_lastname;
      $tus_tel = $this->tus->tus_tel;
      $tus_birthdate = $this->tus->tus_birthdate;
      $tus_email = $this->tus->tus_email;
      $this->set_session($tus_name, $tus_tel, $tus_email, $tus_birthdate, $tus_pre_id);

      redirect("Landing_page_tourist/Landing_page_tourist");
   }

   /*
    * set_session
    * set session 
    * @input -$username, $name, $password, $tel, $card, $email, $pre_id
    * @output -
    * @author Naaka Punparich 62160082
    * @Create Date 2564-07-24
   */
   public function set_session($name, $tel, $email,$birthdate, $pre_id)
   {
      $this->session->set_userdata("Tourist_name", $name);
      $this->session->set_userdata("pre_id", $pre_id);
      $this->session->set_userdata("tel", $tel);
      $this->session->set_userdata("birthdate", $birthdate);
      $this->session->set_userdata("email", $email);
   }
}
