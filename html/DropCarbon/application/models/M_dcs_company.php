<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once "Da_dcs_company.php";
class M_dcs_company extends Da_dcs_company{
    public function get_all(){
        $sql = "SELECT * FROM dcs_company 
                WHERE com_status != 3 AND com_status != 4 AND com_ent_id = ?";
        return $this->db->query($sql,array($this->com_ent_id));
    }

    public function get_by_id(){
        $sql = "SELECT * FROM dcs_company 
                WHERE com_status = 1 AND com_id = ?";
        return $this->db->query($sql, array($this->com_id));
    }
}