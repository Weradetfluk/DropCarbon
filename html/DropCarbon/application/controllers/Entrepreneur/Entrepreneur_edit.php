<?php
defined('BASEPATH') or exit('No direct script access allowed');
require dirname(__FILE__) . '/../DCS_controller.php';

class Entrepreneur_edit extends DCS_controller
{
   public function show_edit_entrepreneur()
   {
      $this->load->view('templete/header_admin');
      $this->load->view('templete/javascript_admin');
      $this->load->view('templete/topbar_entrepreneur');
      $this->load->view('entrepreneur/v_edit_entrepreneur');
      $this->load->view('templete/footer');
   }
}
