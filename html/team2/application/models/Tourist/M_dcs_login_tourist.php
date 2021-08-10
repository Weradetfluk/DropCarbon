<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once 'Da_dcs_login_tourist.php';
class M_dcs_login_tourist extends Da_dcs_login_tourist
{
    public function __construct()
    {
        parent::__construct();
    }

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