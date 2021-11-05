<?php
/*
* Select_register
* show register page
* @author Thanisorn thumsawanit 62160088
* @Create Date 2564-07-19
*/
defined('BASEPATH') OR exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../DCS_controller.php';
class Select_register extends DCS_controller {
    /*
    * index
    * output Select_register page
    * @input
    * @output -
    * @author Thanisorn thumsawanit 62160088
    * @Create Date 2564-07-19
    * @Update -
    */
    public function index() {
        $this->output_tourist('landing_page/v_regis', null, 'template/Tourist/topbar_tourist');
    }
}