<?php
/*
* Select_login
* show login page
* @author Naaka page 62160082
* @Create Date 2564-09-10
*/
defined('BASEPATH') OR exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../DCS_controller.php';
class Select_login extends DCS_controller {
    /*
    * index
    * output Select_login page
    * @input
    * @output -
    * @author Naaka page 62160082
    * @Create Date 2564-09-10
    * @Update -
    */
    public function index() {
        $this->output_tourist('landing_page/v_select_login', null, 'template/Tourist/topbar_tourist');
    }
}