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
}
