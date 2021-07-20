<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once 'Da_dcs_login_admin.php';
class M_dcs_login_admin extends Da_dcs_login_admin
{
    public function __construct(){
        parent::__construct();
    }

 function login(){
        $sql = "SELECT * 
                from dcs_admin 
                where adm_username = ? AND  adm_password = ? AND adm_status != 0";

        $query = $this->db->query($sql, array($this->adm_username, $this->adm_password));

        $query_row = $query->num_rows();
        
        if($query_row){
            return $query->row();
        }else{
            return false;
        }
    }
 
}