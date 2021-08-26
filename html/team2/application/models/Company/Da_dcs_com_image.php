<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once dirname(__FILE__) ."/../DCS_model.php";
/*
* Da_dcs_com_image
* Manage image company
* @author Suwapat Saowarod 62160340
* @Create Date 2564-08-05
*/
class Da_dcs_com_image extends DCS_model{
	
	public $com_img_path;
	public $com_img_com_id;

	/*
    * @author Suwapat Saowarod 62160340
    */
    public function __construct()
	{
		parent::__construct();
	}

	/*
    * update_pass_token
    * update password with number ramdom
    * @input com_img_path, com_img_com_id
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-08-05
    * @Update Date -
    */
	public function insert_image_company(){
		$sql = "INSERT INTO `dcs_com_image`(`com_img_path`, `com_img_com_id`) 
				VALUES (?, ?)";
		$this->db->query($sql, array($this->com_img_path, $this->com_img_com_id));
	}
}