<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once dirname(__FILE__) ."/../DCS_model.php";
class Da_dcs_document extends DCS_model{
    public $doc_path;
    public $doc_ent_id;

    public function insert_document(){
        $sql = "INSERT INTO `dcs_document`(`doc_path`, `doc_ent_id`) 
                VALUES (?,?)";
        $this->db->query($sql, array($this->doc_path, $this->doc_ent_id));
    }
}