<?php
/*
* M_dcs_entrepreneur_reject
* get data entrepreneur reject
* @author Weradet Nopsombun 62160110
* @Create Date 2564-08-12
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once 'Da_dcs_entrepreneur_reject.php';
class M_dcs_entrepreneur_reject extends Da_dcs_entrepreneur_reject
{

    /*
    * @author Weradet Nopsombun 62160110
    */
    public function __construct()
    {
        parent::__construct();
    }

    /*
    * get_data_rejected_by_id
    * get data rejected 
    * @input ent_id
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-08-12
    * @Update Date -
    */
    function get_data_rejected_by_id($ent_id){

        $sql = "SELECT dcs_entrepreneur_reject.enr_admin_reason, dcs_admin.adm_name FROM  dcs_entrepreneur_reject LEFT JOIN dcs_admin 
        ON dcs_entrepreneur_reject.enr_adm_id = dcs_admin.adm_id  WHERE dcs_entrepreneur_reject.enr_ent_id = '$ent_id'";

        $query = $this->db->query($sql);

        return $query;
    }
}
