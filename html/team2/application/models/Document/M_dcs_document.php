<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once 'Da_dcs_document.php';
class M_dcs_document extends Da_dcs_document{
    public function get_by_ent_id(){
        $sql = "SELECT * FROM dcs_document WHERE doc_ent_id = ?";
        return $this->db->query($sql, array($this->doc_ent_id));
    }
}