<?php
/*
* M_dcs_parish
* get data parish
* @author Suwapat Saowarod 62160340
* @Create Date 2564-12-18
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once "Da_dcs_parish.php";

class M_dcs_parish extends Da_dcs_parish
{
    /*
    * get_parish_by_dis_id
    * get data parish by dis_id
    * @input dis_id
    * @output parish
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-12-18
    * @Update Date -
   */
    function get_parish_by_dis_id()
    {
        $sql = "SELECT * FROM dcs_parish
                WHERE par_dis_id = ?";
        return $this->db->query($sql, array($this->par_dis_id));
    }
}