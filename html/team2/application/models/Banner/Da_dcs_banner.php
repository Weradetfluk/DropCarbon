<?php
/*
* Da_dcs_banner
* Manage image banner
* @author weradet sopsombun 62160110
* @Create Date 2564-09-23
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) ."/../DCS_model.php";
class Da_dcs_banner extends DCS_model{
	
	public $ban_path;
	public $ban_name;
    public $ban_adm_id;
	/*
    * @author Weradet Nopsombun 62160110
    */
    public function __construct()
	{
		parent::__construct();
	}
	/*
    * insert_banner
    * insert image banner
    * @input ban_path, ban_name, ban_adm_id
    * @output -
    * @author weradet nopsombun 62160110
    * @Create Date 2564-09-23
    * @Update Date -
    */
	public function insert_banner(){
		$sql = "INSERT INTO `dcs_banner`(`ban_path`, `ban_name`, `ban_adm_id`)
				VALUES (?, ?, ?)";
		$this->db->query($sql, array($this->ban_path, $this->ban_name, $this->ban_adm_id));
	}

	/*
    * delete_banner
    * delete image banner
    * @input ban_path
    * @output -
    * @author weradet nopsombun 62160110
    * @Create Date 2564-09-23
    * @Update Date -
    */
	public function delete_banner(){
		$sql = "DELETE FROM `dcs_banner` WHERE ban_path = ?";
		$this->db->query($sql, array($this->ban_path));
	}
}