<?php

defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) ."/../DCS_model.php";
/*
* Da_dcs_login_tourist
* Manage login tourist
* @author Chutipon Thermsirisuksin 62160081
* @Create Date 2564-08-05
*/
class Da_dcs_login_tourist extends Dcs_model
{
    public $tus_username;
    public $tus_password;

    /*
    * @author Chutipon Thermsirisuksin 62160081
    */
    public function __construct(){
       parent::__construct();
    }
}