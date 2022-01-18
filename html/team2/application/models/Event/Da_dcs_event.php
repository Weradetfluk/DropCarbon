<?php
/*
* Da_dcs_event
* Manage event
* @author Naaka Punparich 62160082
* @Create Date 2564-09-16
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . "/../DCS_model.php";
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
    public $eve_location;
    public $eve_lat;
    public $eve_lon;
    public $eve_par_id;

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
    public function insert_event()
    {
        $sql = "INSERT INTO `dcs_event`(`eve_name`, `eve_description`, `eve_com_id`, `eve_cat_id`, `eve_start_date`, `eve_end_date`, `eve_location`,`eve_lat`, `eve_lon`, `eve_par_id`) 
				VALUES (?,?,?,?,?,?,?,?,?,?)";
        $this->db->query($sql, array($this->eve_name,  $this->eve_description, $this->eve_com_id, $this->eve_cat_id, $this->eve_start_date, $this->eve_end_date, $this->eve_location, $this->eve_lat, $this->eve_lon, $this->eve_par_id));
    }

    /*
    * insert_event_by_admin
    * insert event by admin
    * @input eve_name
    * @output -
    * @author Nantasiri Saiwaew 62160093
    * @Create Date 2564-12-20
    * @Update -
    */
    public function insert_event_by_admin()
    {
        $sql = "INSERT INTO `dcs_event`(`eve_name`,`eve_point`, `eve_description`, `eve_status`,
                `eve_com_id`, `eve_cat_id`, `eve_start_date`, `eve_end_date`, 
                `eve_location`,`eve_lat`, `eve_lon`, `eve_par_id`,`eve_adm_id`) 
				VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $this->db->query($sql, array(
            $this->eve_name, $this->eve_point,  $this->eve_description, $this->eve_status,
            $this->eve_com_id, $this->eve_cat_id, $this->eve_start_date,
            $this->eve_end_date, $this->eve_location,
            $this->eve_lat, $this->eve_lon, $this->eve_par_id, $this->eve_adm_id
        ));
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
    * update_point
    * update point event
    * @input -
    * @output -
    * @author Nantasiri Saiwaew 62160093
    * @Create Date 2564-08-08
	* @Update -
    */
    public function update_point()
    {
        $sql = "UPDATE {$this->db_name}.dcs_event SET eve_point = ?
        Where eve_id = ?";

        $this->db->query($sql, array($this->eve_point, $this->eve_id));
    }


    /*
    *update_event
    *Update data event
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
                    `eve_end_date`=?,
                    `eve_location`=?,
                    `eve_lat`=?,
                    `eve_lon`=?,
                    `eve_par_id`=?
				WHERE eve_id=?";
        $this->db->query($sql, array(
            $this->eve_name, $this->eve_description, $this->eve_com_id, $this->eve_cat_id, $this->eve_status,
            $this->eve_start_date, $this->eve_end_date, $this->eve_location, $this->eve_lat, $this->eve_lon, $this->eve_par_id, $this->eve_id
        ));
    }

    /*
    *update_event_by_admin
    *update event by admin
    *@input 
    *@output -
    *@author Nantasiri Saiwaew 62160093
    *@Create Date 2564-12-21
    */
    public function update_event_by_admin()
    {
        $sql = "UPDATE `dcs_event` 
				SET `eve_name`=?,
                    `eve_point`=?,
					`eve_description`=?,
                    `eve_com_id`=?,
                    `eve_cat_id`=?,
                    `eve_status`=?,
                    `eve_start_date`=?,
                    `eve_end_date`=?,
                    `eve_location`=?,
                    `eve_lat`=?,
                    `eve_lon`=?,
                    `eve_par_id`=?,
                    `eve_adm_id`=?
				WHERE eve_id=?";
        $this->db->query($sql, array(
            $this->eve_name, $this->eve_point, $this->eve_description, $this->eve_com_id, $this->eve_cat_id, $this->eve_status,
            $this->eve_start_date, $this->eve_end_date, $this->eve_location, $this->eve_lat, $this->eve_lon, $this->eve_par_id, $this->eve_adm_id, $this->eve_id
        ));
    }
}