<?php
/*
* Da_dcs_checkin
* Manage tourist checkin
* @author Chutipon Thermsirisuksin 62160081
* @Create Date 2564-09-25
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . "/../DCS_model.php";
class Da_dcs_checkin extends DCS_model
{

    public $che_id;
    public $che_status;
    public $che_date_time_in;
    public $che_date_time_out;
    public $che_tus_id;
    public $che_eve_id;

    /*
    * @author  Chutipon Thermsirisuksin 62160081
    */
    public function __construct()
    {
        parent::__construct();
    }
    /*
    *insert_checkin
    *insert data checkin 
    *@input status
    *@output -
    *@author Weradet Nopsombun 62160110
    *@Create Date 2564-10-19
    */
    function insert_checkin($status){
        $sql = "INSERT INTO `dcs_checkin` (che_status, `che_tus_id`, `che_eve_id`)
        VALUES ('$status' , ?, ?)";
        $query = $this->db->query($sql, array($this->mcin->che_tus_id, $this->mcin->che_eve_id));
    }
      /*
    *update_checkout
    *update data checkin 
    *@input status
    *@output -
    *@author Weradet Nopsombun 62160110
    *@Create Date 2564-10-19
    */
    function update_checkout($status){
        $sql = "UPDATE `dcs_checkin` SET `che_status`= '$status',`che_date_time_out`= ? WHERE che_id = ?";
        $query = $this->db->query($sql, array($this->mcin->che_date_time_out, $this->mcin->che_id));
    }
}