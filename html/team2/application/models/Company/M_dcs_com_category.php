<?php
/*
* M_dcs_com_category
* get data category company
* @author Suwapat Saowarod 62160340
* @Create Date 2564-09-13
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once "Da_dcs_com_category.php";
class M_dcs_com_category extends Da_dcs_com_category{

    /*
    * @author Suwapat Saowarod 62160340
    */
    public function __construct()
    {
        parent::__construct();
    }

    /*
    * get_all
    * get all data category company 
    * @input -
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-09-13
    * @Update -
    */
    public function get_all(){
        $sql = "SELECT * FROM dcs_com_category";
        return $this->db->query($sql);
    }
}