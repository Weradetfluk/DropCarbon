<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once "Da_dcs_company.php";
class M_dcs_company extends Da_dcs_company{
    public function get_all(){
        $sql = "SELECT * FROM dcs_company 
                WHERE com_status = 1";
        return $this->db->query($sql);
    }

    public function get_by_id(){
        $sql = "SELECT * FROM dcs_company 
                WHERE com_status = 1 && com_id = ?";
        return $this->db->query($sql, array($this->com_id));
    }
}