<?php
/*
* Da_dcs_eve_reject
* Manage reject event
* @author Nantasiri Saiwaew 62160093
* @Create Date 2564-09-25
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . "/../DCS_model.php";
class Da_dcs_eve_reject extends DCS_model
{

    public $eve_id;
    public $evr_admin_reason;
    public $evr_rej_date;
    public $evr_eve_id;
    public $evr_adm_id;

    /*
    * @author  Nantasiri Saiwaew 62160093
    */
    public function __construct()
    {
        parent::__construct();
    }

    /*
    * insert
    * insert email detail to database
    * @input ever_admin_reason, evr_eve_id, evr_adm_id
    * @output -
    * @author Nantasiri Saiwaew 62160093
    * @Create Date 2564-09-25
    * @Update -
    */
    public function insert(){
        $sql = "INSERT INTO dcs_event_reject(evr_admin_reason, evr_eve_id, evr_adm_id) VALUES(?, ?, ?)";
        $this->db->query($sql, array( $this->evr_admin_reason, $this->evr_eve_id, $this->evr_adm_id));
    }
}
