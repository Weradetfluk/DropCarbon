<?php

defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) ."/../DCS_model.php";
class Da_dcs_login_admin extends Dcs_model
{
    public $adm_username;
    public $adm_password;

    public function __construct(){
       parent::__construct();
    }
}

?>