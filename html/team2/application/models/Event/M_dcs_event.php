<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once "Da_dcs_event.php";

/*
* M_dcs_event
* get data event
* @author Naaka punparich 62160082
* @Create Date 2564-09-16
*/
class M_dcs_event extends Da_dcs_event
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
    * get data form dcs event
    * @input -
    * @output -
    * @author Naaka punparich 62160082
    * @Create Date 2564-09-16
    */
    function get_all()
    {
        $sql = "SELECT * 
              from dcs_event";
        $query = $this->db->query($sql);
        return $query;
    }

    /*
    *get_event_by_ent_id
    *get event by entrepreneur id
    *@input ent_id
    *@output -
    *@author Suwapat Saowarod
    *@Create Date 2564-09-16
    */
    function get_event_by_ent_id($ent_id)
    {
        $sql = "SELECT eve_id, eve_name, eve_point, eve_description, eve_cat_id, eve_status, com_name FROM `dcs_event` 
                LEFT JOIN dcs_company
                ON dcs_event.eve_com_id = dcs_company.com_id
                WHERE dcs_company.com_ent_id = $ent_id";
        return $this->db->query($sql);
    }

    /*
    *get_by_detail
    *get data form database
    *@input eve_id
    *@output -
    *@author Naaka punparich 62160082
    *@Create Date 2564-09-23
    */
    public function get_by_detail()
    {
        $sql = "SELECT * 
       FROM {$this->db_name}.dcs_event AS detail
       LEFT JOIN {$this->db_name}.dcs_eve_image AS eve ON eve.eve_img_eve_id 
       WHERE detail.eve_id=?";

        $query = $this->db->query($sql, array($this->eve_id));
        return $query;
    }

    /*
    *get_event_and_img
    *get data form database
    *@input number_status
    *@output -
    *@author Naaka punparich 62160082
    *@Create Date 2564-09-23
    */
    public function get_event_and_img($number_status)
    {
        $sql = "SELECT dcs_event.eve_id, dcs_event.eve_name,dcs_event.eve_description,dcs_eve_image.eve_img_path 
        from dcs_event 
        RIGHT JOIN dcs_eve_image
        ON  dcs_event.eve_id = dcs_eve_image.eve_img_eve_id
        WHERE eve_status = '$number_status'
        GROUP BY dcs_event.eve_id";
        $query = $this->db->query($sql);
        return $query;
    }
}
