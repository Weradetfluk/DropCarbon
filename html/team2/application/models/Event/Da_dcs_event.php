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

    /*
    * @author  Naaka Punparich 62160082
    */
    public function __construct()
    {
        parent::__construct();
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
	public function delete_event(){
		$sql = "UPDATE `dcs_event` 
				SET `eve_status`=4
				WHERE eve_id=?";
		$this->db->query($sql, array($this->eve_id));
	}
}