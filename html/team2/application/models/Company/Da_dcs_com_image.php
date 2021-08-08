<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once dirname(__FILE__) ."/../DCS_model.php";
class Da_dcs_com_image extends DCS_model{
	
	public $com_img_path;
	public $com_img_com_id;

    public function __construct()
	{
		parent::__construct();
	}

	public function insert_image_company(){
		$sql = "INSERT INTO `dcs_com_image`(`com_img_path`, `com_img_com_id`) 
				VALUES (?, ?)";
		$this->db->query($sql, array($this->com_img_path, $this->com_img_com_id));
	}
}