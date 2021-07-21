<?php
defined('BASEPATH') or exit('No direct script access allowed');
require dirname(__FILE__) . '/../Dcs_controller.php';
class Select_register extends Dcs_controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function show_select_register()
    {
        $this->load->view('register/v_regis');
    }
}
