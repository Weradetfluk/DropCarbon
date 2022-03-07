<?php
/*
* Da_dcs_document
* Manage document entrepreneur
* @author Suwapat Saowarod 62160340
* @Create Date 2564-08-05
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) ."/../DCS_model.php";
class Da_dcs_document extends DCS_model{
    public $doc_path;
    public $doc_ent_id;
    public $doc_name;

    /*
    * insert_document
    * insert document entrepreneur
    * @input doc_path, doc_name, doc_ent_id
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-08-05
    * @Update Date 2564-09-24
    */
    public function insert_document(){
        $sql = "INSERT INTO `dcs_document`(`doc_path`, `doc_name`, `doc_ent_id`) 
                VALUES (?,?,?)";
        $this->db->query($sql, array($this->doc_path, $this->doc_name, $this->doc_ent_id));
    }

    /*
    * delete_document
    * delete document entrepreneur
    * @input com_img_path
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-09-24
    * @Update Date -
    */
	public function delete_document(){
		$sql = "DELETE FROM `dcs_document` WHERE doc_path = ?";
		$this->db->query($sql, array($this->doc_path));
	}
}