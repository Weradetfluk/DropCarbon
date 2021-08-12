<?php

defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) ."/../DCS_model.php";
class Da_dcs_admin extends Dcs_model
{
    public $adm_username;
    public $adm_password;
    public $adm_email;

    public function __construct(){
       parent::__construct();
    }



    public function update_pass_token($token){

        $sql = "UPDATE dcs_admin
        SET   adm_password = '$token'
        WHERE adm_email = ?";

        $query = $this->db->query($sql, array($this->adm_email));
    }


    public function update_pass($token){

        $sql = "UPDATE dcs_admin
        SET   adm_password = ?
        WHERE adm_password = '$token'";

        $query = $this->db->query($sql, array($this->adm_password));
    }

}
