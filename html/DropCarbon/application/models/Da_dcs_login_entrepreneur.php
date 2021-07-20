<?php

defined('BASEPATH') or exit('No direct script access allowed');
include_once 'Dcs_model.php';
class Da_dcs_login_entrepreneur extends Dcs_model
{
    public $ent_username;
    public $ent_password;

    public function __construct(){
       parent::__construct();
    }
}

?>