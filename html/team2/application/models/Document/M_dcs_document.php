<?php
/*
* M_dcs_document
* get data document entrepreneur
* @author Suwapat Saowarod 62160340
* @Create Date 2564-08-05
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once 'Da_dcs_document.php';

class M_dcs_document extends Da_dcs_document{
    /*
    * get_by_ent_id
    * get data document entrepreneur by id
    * @input 
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-08-05
    * @Update Date -
    */
    public function get_by_ent_id(){
        $sql = "SELECT * FROM dcs_document WHERE doc_ent_id = ?";
        return $this->db->query($sql, array($this->doc_ent_id));
    }
}