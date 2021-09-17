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
    function get_event_by_ent_id($ent_id){
        $sql = "SELECT eve_id, eve_name, eve_point, eve_description, eve_cat_id, com_name FROM `dcs_event` 
                LEFT JOIN dcs_company
                ON dcs_event.eve_com_id = dcs_company.com_id
                WHERE dcs_company.com_ent_id = $ent_id";
        return $this->db->query($sql);
    }
}
