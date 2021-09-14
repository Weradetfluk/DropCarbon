<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';
/*
* Admin_block_user
* Manage block entrepreneur
* @author weradet nopsombun 62160110
* @Create Date 2564-07-17
*/
class Admin_manage_banner extends DCS_controller
{
    /*
    * @author Weradet Nopsombun 62160110
    */

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->banner_list();
    }

    public function banner_list(){

    }
    
    
}
