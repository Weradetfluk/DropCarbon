<?php
/*
* Da_dcs_company
* Manage company
* @author Suwapat Saowarod 62160340
* @Create Date 2564-07-19
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) ."/../DCS_model.php";
class Da_dcs_company extends DCS_model{
	
	public $com_id;
	public $com_name;
	public $com_lat; 
	public $com_lon; 
	public $com_description;
    public $com_tel;
	public $com_status;
	public $com_num_visitor;
	public $com_ent_id;
    public $com_cat_id;
    public $com_adm_id;
    public $com_par_id;

	/*
    * @author Suwapat Saowarod 62160340
    */
    public function __construct()
	{
		parent::__construct();
	}
    
	/*
    * insert_company
    * insert company by entrepreneur
    * @input com_name, com_lat, com_lon, com_description, com_ent_id, com_tel
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-07-18
    * @Update -
    */
	public function insert_company(){
		$sql = "INSERT INTO `dcs_company`(`com_name`, `com_lat`, `com_lon`, `com_description`, `com_ent_id`, `com_tel`, `com_cat_id`, `com_location`, `com_par_id`) 
				VALUES (?,?,?,?,?,?,?,?,?)";
        $this->db->query($sql, array($this->com_name, $this->com_lat, $this->com_lon, $this->com_description, $this->com_ent_id, $this->com_tel, $this->com_cat_id, $this->com_location, $this->com_par_id));
	}

	/*
    * delete_company
    * update com_status == 4
    * @input com_id
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-07-19
    * @Update -
    */
	public function delete_company(){
		$sql = "UPDATE `dcs_company` 
				SET `com_status`=4
				WHERE com_id=?";
		$this->db->query($sql, array($this->com_id));
	}

	/*
    * update_company
    * update company by entrepreneur
    * @input com_name, com_lon, com_tel, com_description, com_id
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-07-19
    * @Update -
    */
	public function update_company(){
		$sql = "UPDATE `dcs_company` 
				SET `com_name`=?,
					`com_lat`=?,
					`com_lon`=?,
					`com_tel`=?,
					`com_description`=?,
                    `com_cat_id`=?,
                    `com_status`=?,
                    `com_location`=?,
                    `com_par_id`=?
				WHERE com_id=?";
		$this->db->query($sql, array($this->com_name, $this->com_lat, $this->com_lon, $this->com_tel, $this->com_description, $this->com_cat_id, $this->com_status, $this->com_location, $this->com_par_id, $this->com_id));
	}

	/*
    * update_status
    * update status company
    * @input parameter 1, 2, ex. 1 = consider, 2 = approve, 3 = rejected 
    * @output -
    * @author Kasama Donwong 62160074
    * @Create Date 2564-08-08
	* @Update -
    */
	public function update_status($status_number)
    {
        $sql = "UPDATE {$this->db_name}.dcs_company SET com_status = ?
        Where com_id = ?";

        $this->db->query($sql, array($status_number, $this->com_id));
    }
}