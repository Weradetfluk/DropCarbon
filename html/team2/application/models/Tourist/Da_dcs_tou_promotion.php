<?php
/*
* Da_dcs_tou_promotion
* Manage tourist
* @author Thanisorn thumsawanit 62160088
* @Create Date 2564-12-24
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . "/../DCS_model.php";
class Da_dcs_tou_promotion extends DCS_model
{
    public $tou_id;
    public $tou_pro_status;
    public $tou_pro_id;
    public $tou_tus_id;

    /*
    * @author Thanisorn thumsawanit 62160088
    */
    public function __construct()
    {
        parent::__construct();
    }
    /*
    * insert
    * insert 
    * @input 
    * @output -
    * @author Thanisorn thumsawanit 62160088
    * @Create Date 2564-12-24
    * @Update Date -
    */
    public function insert()
    {
        $sql = "INSERT INTO dcs_tou_promotion(tou_pro_status, tou_pro_id, tou_tus_id) VALUES(?, ?, ?)";
        $this->db->query($sql, array($this->tou_pro_status, $this->tou_pro_id, $this->tou_tus_id));
    }

}
