<?php
/*
* M_dcs_eve_category
* get data category event
* @author Naaka Punparich 62160082
* @Create Date 2564-09-16
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once "Da_dcs_eve_category.php";
class M_dcs_eve_category extends Da_dcs_eve_category
{

    /*
    * @author Naaka Punparich 62160082
    */
    public function __construct()
    {
        parent::__construct();
    }

    /*
    * get_all
    * get all data category event 
    * @input -
    * @output -
    * @author Naaka Punparich 62160082
    * @Create Date 2564-09-16
    * @Update -
    */
    public function get_all()
    {
        $sql = "SELECT * FROM dcs_eve_category";
        return $this->db->query($sql);
    }
}
