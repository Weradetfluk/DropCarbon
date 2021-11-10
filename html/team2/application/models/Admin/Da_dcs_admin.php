<?php

defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . "/../DCS_model.php";
/*
* Da_dcs_admin
* Manage admin
* @author Weradet Nopsombun 62160110
* @Create Date 2564-08-12
*/
class Da_dcs_admin extends Dcs_model
{
    public $adm_username;
    public $adm_password;
    public $adm_email;

    /*
    * @author Weradet Nopsombun 62160110
    */
    public function __construct()
    {
        parent::__construct();
    }

    /*
    * update_pass_token
    * update password with number ramdom
    * @input $token
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-08-12
    * @Update Date -
    */
    public function update_pass_token($token)
    {

        $sql = "UPDATE dcs_admin
        SET   adm_password = '$token'
        WHERE adm_email = ?";

        $query = $this->db->query($sql, array($this->adm_email));
    }

    /*
    * update_pass
    * update password with email user
    * @input token
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-08-12
    * @Update Date -
    */
    public function update_pass($token)
    {

        $sql = "UPDATE dcs_admin
        SET   adm_password = ?
        WHERE adm_password = '$token'";

        $query = $this->db->query($sql, array($this->adm_password));
    }
}
