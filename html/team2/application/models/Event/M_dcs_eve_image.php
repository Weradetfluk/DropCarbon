<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once "Da_dcs_eve_image.php";

/*
* M_dcs_eve_image
* get data image event
* @author Naaka Punparich 62160082
* @Create Date 2564-09-16
*/
class M_dcs_eve_image extends Da_dcs_eve_image
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
    * get data form dcs event image
    * @input -
    * @output -
    * @author Naaka punparich 62160082
    * @Create Date 2564-09-16
    */
    function get_all()
    {
        $sql = "SELECT * 
               from dcs_eve_image";
        $query = $this->db->query($sql);
        return $query;
    }
}
