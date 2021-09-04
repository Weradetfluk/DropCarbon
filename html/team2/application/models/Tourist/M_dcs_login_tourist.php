<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once 'Da_dcs_login_tourist.php';

/*
* M_dcs_login_tourist
* get data login tourist
* @author Chutipon Thermsirisuksin 62160081
* @Create Date 2564-08-05
*/
class M_dcs_login_tourist extends Da_dcs_login_tourist
{
    /*
    * @author Chutipon Thermsirisuksin 62160081
    */
    public function __construct()
    {
        parent::__construct();
    }

    /*
    * login
    * login by tourist
    * @input tus_username, tus_password
    * @output -
    * @author Chutipon Thermsirisuksin 62160081
    * @Create Date 2564-08-05
    * @Update Date -
    */
    function login()
    {
        $sql = "SELECT * 
                from dcs_tourist 
                where tus_username = ? AND  tus_password = ? AND tus_status != 0";

        $query = $this->db->query($sql, array($this->tus_username, $this->tus_password));

        $query_row = $query->num_rows();

        if ($query_row) {
            return $query->row();
        } else {
            return false;
        }
    }
}