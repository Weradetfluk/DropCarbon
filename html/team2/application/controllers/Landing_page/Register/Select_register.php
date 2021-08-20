<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';
class Select_register extends DCS_controller {
    /*
    * index
    * show select register
    * @input
    * @output -
    * @author Thanisorn thumsawanit 62160088
    * @Create Date 2021-07-15
    * @Update Date -
    */
    public function index() {
        $this->output_regis('landing_page/register/v_regis');
    }
}