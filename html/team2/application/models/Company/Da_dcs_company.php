<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once dirname(__FILE__) ."/../DCS_model.php";
class Da_dcs_company extends DCS_model{
	
	public $com_id;
	public $com_name;
	public $com_lat; 
	public $com_lon; 
	public $com_description;
	public $com_status;
	public $com_num_visitor;
	public $com_ent_id;

    public function __construct()
	{
		parent::__construct();
	}
    
	public function add_company(){
		$sql = "INSERT INTO `dcs_company`(`com_name`, `com_lat`, `com_lon`, `com_description`, `com_ent_id`, `com_tel`) 
				VALUES (?,?,?,?,?,?)";
        $this->db->query($sql, array($this->com_name, $this->com_lat, $this->com_lon, $this->com_description, $this->com_ent_id, $this->com_tel));
	}

	public function delete_company(){
		$sql = "UPDATE `dcs_company` 
				SET `com_status`=4
				WHERE com_id=?";
		$this->db->query($sql, array($this->com_id));
	}

	public function edit_company(){
		$sql = "UPDATE `dcs_company` 
				SET `com_name`=?,
					`com_lat`=?,
					`com_lon`=?,
					`com_tel`=?,
					`com_description`=?
				WHERE com_id=?";
		$this->db->query($sql, array($this->com_name, $this->com_lat, $this->com_lon, $this->com_tel, $this->com_description, $this->com_id));
	}
	/*
    *update_status
    * update status company
    *@input parameter 1, 2, ex. 1 = consider, 2 = approve, 3 = rejected 
    *@insert -
    *@author Kasama Donwong 62160074
    *@Create Date 2564-08-08
    */
	public function update_status($status_number)
    {
        $sql = "UPDATE {$this->db_name}.dcs_company SET com_status = ?
        Where com_id = ?";

        $this->db->query($sql, array($status_number, $this->com_id));
    }
}