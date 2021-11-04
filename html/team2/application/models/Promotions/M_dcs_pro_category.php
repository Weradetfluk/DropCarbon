<?php
/*
* M_dcs_pro_category
* get data category promotion
* @author Chutipon Thermsirisuksin 62160081
* @Create Date 2564-10-02
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once "Da_dcs_pro_category.php";
class M_dcs_pro_category extends Da_dcs_pro_category
{

    /*
    * @author Chutipon Thermsirisuksin 62160081
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
    * @author Chutipon Thermsirisuksin 62160081
    * @Create Date 2564-10-02
    * @Update -
    */
    public function get_all()
    {
        $sql = "SELECT * FROM dcs_pro_category";
        return $this->db->query($sql);
    }
}