<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once 'Da_dcs_login_entrepreneur.php';

class M_dcs_login_entrepreneur extends Da_dcs_login_entrepreneur
{
    public function __construct(){
        parent::__construct();
    }

 function login(){
        $sql = "SELECT * 
                from dcs_entrepreneur 
                where ent_username = ? AND  ent_password = ? AND ent_status = 2";

        $query = $this->db->query($sql, array($this->ent_username, $this->ent_password));

        $query_row = $query->num_rows();
        
        if($query_row){
            return $query->row();
        }else{
            return false;
        }
    }
 
}