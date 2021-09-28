<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once dirname(__FILE__) . "/../DCS_model.php";
/*
* Da_dcs_event
* Manage event
* @author Naaka Punparich 62160082
* @Create Date 2564-09-16
*/
class Da_dcs_event extends DCS_model
{

    public $eve_id;
    public $eve_name;
    public $eve_point;
    public $eve_num_visitor;
    public $eve_description;
    public $eve_com_id;
    public $eve_cat_id;
    public $eve_status;
    public $eve_start_date;
    public $eve_end_date;

    /*
    * @author  Naaka Punparich 62160082
    */
    public function __construct()
    {
        parent::__construct();
    }
    /*
    * insert_event
    * insert event by entrepreneur
    * @input eve_name
    * @output -
    * @author Priyarat Bumrungkit 62160156
    * @Create Date 2564-09-26
    * @Update -
    */
	public function insert_event(){
		$sql = "INSERT INTO `dcs_event`(`eve_name`, `eve_description`, `eve_com_id`, `eve_cat_id`, `eve_start_date`, `eve_end_date`) 
				VALUES (?,?,?,?,?,?)";
        $this->db->query($sql, array($this->eve_name,  $this->eve_description, $this->eve_com_id, $this->eve_cat_id, $this->eve_start_date, $this->eve_end_date));
	}
    /*
    * update_status
    * update status event
    * @input parameter 1, 2, ex. 1 = consider, 2 = approve, 3 = rejected 
    * @output -
    * @author Nantasiri Saiwaew 62160093
    * @Create Date 2564-08-08
	* @Update -
    */
    public function update_status($status_number)
    {
        $sql = "UPDATE {$this->db_name}.dcs_event SET eve_status = ?
        Where eve_id = ?";

        $this->db->query($sql, array($status_number, $this->eve_id));
    }

    /*
    * delete_event
    * update eve_status == 4
    * @input eve_id
    * @output -
    * @author Thanchanok Thongjumroon 62160089
    * @Create Date 2564-09-25
    */
    public function delete_event()
    {
        $sql = "UPDATE `dcs_event` 
				SET `eve_status`=4
				WHERE eve_id=?";
        $this->db->query($sql, array($this->eve_id));
    }
    /*
    * insert_point
    * insert point event
    * @input -
    * @output -
    * @author Nantasiri Saiwaew 62160093
    * @Create Date 2564-08-08
	* @Update -
    */
    public function insert_point()
    {
        $sql = "UPDATE {$this->db_name}.dcs_event SET eve_point = ?
        Where eve_id = ?";

        $this->db->query($sql, array($this->eve_point, $this->eve_id));
    }


    /*
    *update_event
    *get data form database
    *@input 
    *@output -
    *@author Acharaporn pornpattanasap
    *@Create Date 2564-09-25
    */
    public function update_event()
    {
        $sql = "UPDATE `dcs_event` 
				SET `eve_name`=?,
					`eve_description`=?,
                    `eve_com_id`=?,
                    `eve_cat_id`=?,
                    `eve_status`=?,
                    `eve_start_date`=?,
                    `eve_end_date`=?
				WHERE eve_id=?";
        $this->db->query($sql, array($this->eve_name, $this->eve_description, $this->eve_com_id, $this->eve_cat_id, $this->eve_status, $this->eve_start_date, $this->eve_end_date, $this->eve_id));
    }
}