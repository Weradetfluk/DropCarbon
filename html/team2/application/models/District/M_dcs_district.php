<?php
/*
* M_dcs_district
* get data district
* @author Suwapat Saowarod 62160340
* @Create Date 2564-12-18
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once "Da_dcs_district.php";

class M_dcs_district extends Da_dcs_district
{

    /*
    * get_district_by_prv_id
    * get data district by prv_id
    * @input prv_id
    * @output districts
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-12-18
    * @Update Date -
   */
    function get_district_by_prv_id()
    {
        $sql = "SELECT * FROM dcs_district
                WHERE dis_prv_id = ?";
        return $this->db->query($sql, array($this->dis_prv_id));
    }
}