<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';
class Select_register extends DCS_controller {
    public function index() {
        $this->output_regis('landing_page/register/v_regis');
    }
}