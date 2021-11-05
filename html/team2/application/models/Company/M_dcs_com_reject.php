<?php
/*
* M_dcs_com_reject
* get data company reject
* @author Nantasiri Saiwaew 62160093
* @Create Date 2564-08-02
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once 'Da_dcs_com_reject.php';
class M_dcs_com_reject extends Da_dcs_com_reject
{
    /*
    * @author Nantasiri Saiwaew 62160093
    */
    public function __construct()
    {
        parent::__construct();
    }

    /*
    * get_data_rejected_by_id_com
    * get data that rejected from company id
    * @input com_id
    * @output -
    * @author Nantasiri Saiwaew 62160093
    * @Create Date 2564-08-02
    * @Update -
    */
    function get_data_rejected_by_id_com($com_id){

        $sql = "SELECT dcs_company_reject.cor_admin_reason, dcs_admin.adm_name FROM  dcs_company_reject LEFT JOIN dcs_admin 
        ON dcs_company_reject.cor_adm_id = dcs_admin.adm_id  WHERE dcs_company_reject.cor_com_id = '$com_id'";

        $query = $this->db->query($sql);

        return $query;
    }
}