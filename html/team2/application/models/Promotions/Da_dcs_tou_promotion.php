<?php
/*
* Da_dcs_tou_promotion
* Manage promotion for tourist
* @author Chutipon Thermsirisuksin 62160081
* @Create Date 2564-10-05
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
    * @author Chutipon Thermsirisuksin 62160081
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
    * @Create Date 2564-01-03
    * @Update Date -
    */
    public function insert()
    {
        $sql = "INSERT INTO dcs_tou_promotion(tou_pro_status, tou_pro_id, tou_tus_id) VALUES(?, ?, ?)";
        $this->db->query($sql, array($this->tou_pro_status, $this->tou_pro_id, $this->tou_tus_id));
    }

    /*
    * update_status_reward
    * update reward status 
    * @input tou_id
    * @output -
    * @author Thanisorn thumsawanit 62160088
    * @Create Date 2564-01-04
    */
    public function update_status_reward()
    {
        $sql = "UPDATE `dcs_tou_promotion` 
				SET `tou_pro_status`= ?
				WHERE tou_id=?";
        $this->db->query($sql, array($this->tou_pro_status, $this->tou_id));
    }
}