<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once 'Da_dcs_admin.php';
/*
* M_dcs_admin
* get data admin
* @author Weradet Nopsombun 62160110
* @Create Date 2564-08-12
*/
class M_dcs_admin extends Da_dcs_admin
{
    public function __construct()
    {
        parent::__construct();
    }

    /*
    * login
    * check username and password
    * @input adm_username, adm_password
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-08-12
    * @Update Date -
    */
    function login()
    {
        $sql = "SELECT * 
                from dcs_admin 
                where adm_username = ? AND  adm_password = ? AND adm_status != 0";

        $query = $this->db->query($sql, array($this->adm_username, $this->adm_password));

        $query_row = $query->num_rows();

        if ($query_row) {
            return $query->row();
        } else {
            return false;
        }
    }

    /*
    * check_email
    * check email user
    * @input 
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-08-12
    * @Update Date -
    */
    function check_email()
    {
        $sql = "SELECT * 
            from dcs_admin 
            where adm_email = ?";

        $query = $this->db->query($sql, array($this->adm_email));

        $query_row = $query->num_rows();

        if ($query_row) {
            return $query->row();
        } else {
            return false;
        }
    }
}
