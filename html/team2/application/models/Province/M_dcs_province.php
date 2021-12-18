<?php
/*
* M_dcs_province
* get data province
* @author Suwapat Saowarod 62160340
* @Create Date 2564-12-18
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once "Da_dcs_province.php";

class M_dcs_province extends Da_dcs_province
{
    /*
    * @author Suwapat Saowarod 62160340
    */
    public function __construct()
    {
        parent::__construct();
    }

    /*
    * get_all
    * get data all provinces
    * @input -
    * @output province
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-12-18
    * @Update Date -
   */
    function get_all()
    {
        $sql = "SELECT * FROM dcs_province";
        return $this->db->query($sql);
    }
}