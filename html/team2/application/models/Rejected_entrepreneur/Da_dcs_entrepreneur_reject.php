<?php
/*
* Da_dcs_entrepreneur_reject
* Manage entrepreneur reject
* @author Weradet Nopsombun 62160110
* @Create Date 2564-08-12
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) ."/../DCS_model.php";
class Da_dcs_entrepreneur_reject extends Dcs_model
{
    public $enr_id;
    public $enr_admin_reason;
    public $enr_ent_id;
    public $enr_adm_id;

    /*
    * @author Weradet Nopsombun 62160110
    */
    public function __construct(){
       parent::__construct();
    }


    /*
    * insert
    * insert to table dcs_entrepreneur_reject
    * @input 
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-08-12
    * @Update Date -
    */
    public function insert(){
        $sql = "INSERT INTO dcs_entrepreneur_reject(enr_admin_reason, enr_ent_id, enr_adm_id) VALUES(?, ?, ?)";
        $this->db->query($sql, array( $this->mdre->enr_admin_reason, $this->enr_ent_id, $this->enr_adm_id));
    }

}

?>