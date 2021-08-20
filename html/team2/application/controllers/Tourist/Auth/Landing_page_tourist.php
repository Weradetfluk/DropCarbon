<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';
class Landing_page_tourist extends DCS_controller
{
    public function index()
    {
        $this->output_Landing_page_tourist();
    }
}