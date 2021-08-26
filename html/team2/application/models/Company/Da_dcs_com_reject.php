<?php

defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) ."/../DCS_model.php";
/*
* Da_dcs_com_reject
* Manage reject company
* @author Nantasiri Saiwaew 62160093
* @Create Date 2564-08-02
*/
class Da_dcs_com_reject extends Dcs_model
{
    public $com_id;
    public $com_admin_reason;
    public $com_ent_id;
    public $com_adm_id;

    /*
    * @author Nantasiri Saiwaew 62160093
    */
    public function __construct(){
       parent::__construct();
    }

    /*
    * insert
    * insert email detail to database
    * @input com_admin_reason, com_ent_id, com_adm_id
    * @output -
    * @author Nantasiri Saiwaew 62160093
    * @Create Date 2564-08-02
    * @Update -
    */
    public function insert(){
        $sql = "INSERT INTO dcs_company_reject(com_admin_reason, com_ent_id, com_adm_id) VALUES(?, ?, ?)";
        $this->db->query($sql, array( $this->com_admin_reason, $this->com_ent_id, $this->com_adm_id));
    }
 
}

?>