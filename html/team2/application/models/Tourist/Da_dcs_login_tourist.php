<?php
/*
* Da_dcs_login_tourist
* Manage login tourist
* @author Chutipon Thermsirisuksin 62160081
* @Create Date 2564-08-05
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . "/../DCS_model.php";
class Da_dcs_login_tourist extends Dcs_model
{
    public $tus_username;
    public $tus_password;

    /*
    * @author Chutipon Thermsirisuksin 62160081
    */
    public function __construct()
    {
        parent::__construct();
    }

    /*
    * update_pass_token
    * update password with number ramdom
    * @input token, tus_email
    * @output -
    * @author Chutipon Thermsirisuksin 62160081
    * @Create Date 2564-09-15
    * @Update Date -
    */
    public function update_pass_token($token)
    {

        $sql = "UPDATE dcs_tourist
        SET   tus_password = '$token'
        WHERE tus_email = ?";

        $query = $this->db->query($sql, array($this->tus_email));
    }

    /*
    * update_pass
    * update password with email user
    * @input token
    * @output -
    * @author Chutipon Thermsirisuksin 62160081
    * @Create Date 2564-09-15
    * @Update Date -
    */
    public function update_pass($token)
    {

        $sql = "UPDATE dcs_tourist
        SET   tus_password = ?
        WHERE tus_password = '$token'";

        $query = $this->db->query($sql, array($this->tus_password));
    }
}