<?php
/*
* Da_dcs_com_reject
* Manage reject company
* @author Nantasiri Saiwaew 62160093
* @Create Date 2564-08-02
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) ."/../DCS_model.php";
class Da_dcs_com_reject extends Dcs_model
{
    public $cor_id;
    public $cor_admin_reason;
    public $cor_com_id;
    public $cor_adm_id;

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
        $sql = "INSERT INTO dcs_company_reject(cor_admin_reason, cor_com_id, cor_adm_id) VALUES(?, ?, ?)";
        $this->db->query($sql, array( $this->cor_admin_reason, $this->cor_com_id, $this->cor_adm_id));
    }
 
}

?>