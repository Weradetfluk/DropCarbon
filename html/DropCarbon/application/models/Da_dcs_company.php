<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once "DCS_model.php";
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
		$sql = "INSERT INTO `dcs_company`(`com_name`, `com_lat`, `com_lon`, `com_description`, `com_ent_id`) 
				VALUES (?,?,?,?,?)";
        $this->db->query($sql, array($this->com_name, $this->com_lat, $this->com_lon, $this->com_description, $this->com_ent_id));
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
					`com_description`=?
				WHERE com_id=?";
		$this->db->query($sql, array($this->com_name, $this->com_description, $this->com_id));
	}
}