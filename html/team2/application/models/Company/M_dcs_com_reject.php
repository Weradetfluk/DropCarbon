<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once 'Da_dcs_com_reject.php';
class M_dcs_com_reject extends Da_dcs_com_reject
{
    public function __construct()
    {
        parent::__construct();
    }

    function get_data_rejected_by_id_com($ent_id){

        $sql = "SELECT dcs_company_reject.com_admin_reason, dcs_admin.adm_name FROM  dcs_company_reject LEFT JOIN dcs_admin 
        ON dcs_company_reject.com_adm_id = dcs_admin.adm_id  WHERE dcs_company_reject.com_ent_id = '$com_id'";

        $query = $this->db->query($sql);

        return $query;
    }
}