<?php
/*
* Da_dcs_eve_image
* Manage image event
* @author Naaka Punparich 62160082
* @Create Date 2564-09-16
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . "/../DCS_model.php";
class Da_dcs_eve_image extends DCS_model
{

	public $eve_img_path;
	public $eve_img_name;
	public $eve_img_eve_id;

	/*
    * @author Naaka Punparich 62160082
    */
	public function __construct()
	{
		parent::__construct();
	}
	/*
    * insert_image_event
    * insert image company
    * @input com_img_path, com_img_com_id, com_img_name
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-08-05
    * @Update Date -
    */
	public function insert_image_event()
	{
		$sql = "INSERT INTO `dcs_eve_image`(`eve_img_path`, `eve_img_name`, `eve_img_eve_id`) 
				VALUES (?, ?, ?)";
		$this->db->query($sql, array($this->eve_img_path, $this->eve_img_name, $this->eve_img_eve_id));
	}

	/*
    * delete_image_event
    * delete image company
    * @input com_img_path
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-08-28
    * @Update Date -
    */
	public function delete_image_event()
	{
		$sql = "DELETE FROM `dcs_eve_image` WHERE eve_img_path = ?";
		$this->db->query($sql, array($this->eve_img_path));
	}
}