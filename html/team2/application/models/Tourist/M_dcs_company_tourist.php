<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once "Da_dcs_company_tourist.php";

/*
* M_dcs_company
* get data company
* @author Suwapat Saowarod 62160340
* @Create Date 2564-07-19
*/
class M_dcs_company_tourist extends Da_dcs_company_tourist
{
/*
    *get_by_detail
    *get data entrepreneur form database
    *@input com_id
    *@output -
    *@author Acharaporn pornpattanasap 62160344
    *@Create Date 2564-08-07
    */
    public function get_by_detail($id)
    {
        $sql = "SELECT * 
        FROM {$this->db_name}.dcs_company 
        LEFT JOIN {$this->db_name}.dcs_com_image AS com ON com.com_img_com_id 
        WHERE com_id=$id";

        $query = $this->db->query($sql);
        return $query;
    }
}