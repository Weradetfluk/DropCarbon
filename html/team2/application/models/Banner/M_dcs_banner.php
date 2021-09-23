<?php
/*
* M_dcs_banner
* get data image  banner
* @author weradet nopsombun 62160110
* @Create Date 2564-08-05
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once "Da_dcs_banner.php";
class M_dcs_banner extends Da_dcs_banner
{
    /*
    * @author weradet nopsombun 62160110
    */
    public function __construct()
    {
        parent::__construct();
    }
  

    /*
    * get_all
    * get all  image banner and admin data
    * @input ban_path, ban_name, ban_adm_id
    * @output -
    * @author weradet nopsombun 62160110
    * @Create Date 2564-09-23
    * @Update Date -
    */
    function get_all()
    {
        $sql = "SELECT * from dcs_banner
        LEFT JOIN dcs_admin ON
        ban_adm_id = adm_id ";
        $query = $this->db->query($sql);
        return $query;
    }
}
