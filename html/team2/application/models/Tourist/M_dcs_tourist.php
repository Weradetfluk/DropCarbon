<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once 'Da_dcs_tourist.php';
class M_dcs_tourist extends Da_dcs_tourist
{
    public function __construct()
    {
        parent::__construct();
    }

    /*
    *get_tourist
    *get data entrepreneur form database
    *@input -
    *@insert -
    *@author Thanisron thumsawanit 62160088
    *@Create Date 2564-08-02
    */
    function get_tourist()
    {
        $sql = "SELECT * FROM {$this->db_name}.dcs_tourist ";
        $query = $this->db->query($sql);
        return $query;
    }
}
