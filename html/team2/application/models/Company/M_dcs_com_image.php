<?php
/*
* M_dcs_com_image
* get data image company
* @author Suwapat Saowarod 62160340
* @Create Date 2564-08-05
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once "Da_dcs_com_image.php";
class M_dcs_com_image extends Da_dcs_com_image
{

    /*
    * @author Suwapat Saowarod 62160340
    */
    public function __construct()
    {
        parent::__construct();
    }

    /*
    * get_by_com_id
    * get data company by id
    * @input com_img_com_id
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-08-05
    * @Update -
    */
    public function get_by_com_id()
    {
        $sql = "SELECT * FROM dcs_com_image
                WHERE com_img_com_id = ?";
        return $this->db->query($sql, array($this->com_img_com_id));
    }


    /*
    * get_all
    * get data form dcs company image
    * @input -
    * @output -
    * @author Naaka punparich 62160082
    * @Create Date 2564-09-14
    */
    function get_all()
    {
        $sql = "SELECT * 
               from dcs_com_image";
        $query = $this->db->query($sql);
        return $query;
    }
}
