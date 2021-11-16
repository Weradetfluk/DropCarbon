<?php
/*
* Da_dcs_eve_reject
* Manage reject event
* @author Nantasiri Saiwaew 62160093
* @Create Date 2564-09-25
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . "/../DCS_model.php";
class Da_dcs_pro_reject extends DCS_model
{

    public $prr_id;
    public $prr_admin_reason;
    public $prr_rej_date;
    public $prr_pro_id;
    public $prr_adm_id;

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
    * @Create Date 2564-10-03
    * @Update -
    */
    public function insert(){
        $sql = "INSERT INTO dcs_promotion_reject(prr_admin_reason, prr_pro_id, prr_adm_id) VALUES(?, ?, ?)";
        $this->db->query($sql, array( $this->prr_admin_reason, $this->prr_pro_id, $this->prr_adm_id));
    }
}
