<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once 'Da_dcs_tourist_image.php';
class M_dcs_tourist_image extends Da_dcs_tourist_image{

    /*
    * Function : get_by_tourist_id
    *@input -
     *@author Thanisorn thumsawanit 62160088
    *@Create Date 2564-08-10
    */

    public function get_by_tourist_id(){
        $sql = "SELECT * FROM dcs_tourist_image WHERE tus_img_tus_id = ?";
        return $this->db->query($sql, array($this->tus_img_tus_id));
    }
}