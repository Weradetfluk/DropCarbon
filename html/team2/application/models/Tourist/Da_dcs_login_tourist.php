<?php

defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) ."/../DCS_model.php";
class Da_dcs_login_tourist extends Dcs_model
{
    public $tus_username;
    public $tus_password;

    public function __construct(){
       parent::__construct();
    }
}