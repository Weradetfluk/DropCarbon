<?php
/*
* M_dcs_pro_reject
* get data company reject
* @author Nantasiri Saiwaew 62160093
* @Create Date 2564-08-02
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once 'Da_dcs_pro_reject.php';
class M_dcs_pro_reject extends Da_dcs_pro_reject
{
    /*
    * @author Nantasiri Saiwaew 62160093
    */
    public function __construct()
    {
        parent::__construct();
    }

    /*
    * get_data_pro_rejected_by_id
    * get data that rejected from promotions id
    * @input pro_id
    * @output -
    * @author Nantasiri Saiwaew 62160093
    * @Create Date 2564-08-02
    * @Update -
    */
    function get_data_pro_rejected_by_id($pro_id){

        $sql = "SELECT dcs_promotion_reject.prr_admin_reason, dcs_admin.adm_name FROM  dcs_promotion_reject 
        LEFT JOIN dcs_admin ON dcs_promotion_reject.prr_adm_id = dcs_admin.adm_id  
        WHERE dcs_promotion_reject.prr_pro_id = '$pro_id'";

        $query = $this->db->query($sql);

        return $query;
    }
}