<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';

class Entrepreneur_edit extends DCS_controller
{
   public function show_by_edit_entrepreneur($ent_id)
   {
      $this->load->model('Da_dcs_entrepreneur', 'Dde');
      $data['arr_entrepreneur'] = $this->Dde->get_by_id($ent_id)->row();

      $this->load->view('template/Entrepreneur/header_entrepreneur');
      $this->load->view('template/Entrepreneur/javascript_entrepreneur');
      $this->load->view('template/Entrepreneur/topbar_entrepreneur');
      $this->load->view('entrepreneur/manage_entrepreneur/v_edit_entrepreneur', $data);
      $this->load->view('template/Entrepreneur/footer');
   }

   public function show_edit_entrepreneur()
   {
      $this->load->view('template/Entrepreneur/header_entrepreneur');
      $this->load->view('template/Entrepreneur/javascript_entrepreneur');
      $this->load->view('template/Entrepreneur/topbar_entrepreneur');
      $this->load->view('entrepreneur/manage_entrepreneur/v_edit_entrepreneur');
      $this->load->view('template/Entrepreneur/footer');
   }
}
