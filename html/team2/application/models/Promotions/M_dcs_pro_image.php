<?php
/*
* M_dcs_pro_image
* get data image event
* @author Chutipon Thermsirisuksin 62160081
* @Create Date 2564-10-02
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once "Da_dcs_pro_image.php";
class M_dcs_pro_image extends Da_dcs_pro_image
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
    * get data form dcs event promotions
    * @input -
    * @output -
    * @author Chutipon Thermsirisuksin 62160081
    * @Create Date 2564-10-02
    */
    function get_all()
    {
        $sql = "SELECT * 
               from dcs_pro_image";
        $query = $this->db->query($sql);
        return $query;
    }

    /*
    * get_by_pro_id
    * get data event by id
    * @input eve_img_eve_id
    * @output -
    * @author Naaka Punparich 62160082
    * @Create Date 2564-09-23
    * @Update -
    */
    public function get_by_pro_id()
    {
        $sql = "SELECT * FROM dcs_pro_image
               WHERE pro_img_pro_id = ?";
        return $this->db->query($sql, array($this->pro_img_pro_id));
    }
}