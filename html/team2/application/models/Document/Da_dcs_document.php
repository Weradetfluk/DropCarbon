<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once dirname(__FILE__) ."/../DCS_model.php";
/*
* Da_dcs_document
* Manage document entrepreneur
* @author Suwapat Saowarod 62160340
* @Create Date 2564-08-05
*/
class Da_dcs_document extends DCS_model{
    public $doc_path;
    public $doc_ent_id;

    /*
    * insert_document
    * insert document entrepreneur
    * @input 
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-08-05
    * @Update Date -
    */
    public function insert_document(){
        $sql = "INSERT INTO `dcs_document`(`doc_path`, `doc_ent_id`) 
                VALUES (?,?)";
        $this->db->query($sql, array($this->doc_path, $this->doc_ent_id));
    }
}