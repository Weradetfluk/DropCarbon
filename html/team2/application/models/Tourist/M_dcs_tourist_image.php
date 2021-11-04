<?php
/*
* M_dcs_tourist_image
* get data image tourist
* @author Thanisorn thumsawanit 62160088
* @Create Date 2564-08-10
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once 'Da_dcs_tourist_image.php';
class M_dcs_tourist_image extends Da_dcs_tourist_image{

    /*
    * get_by_tourist_id
    * get data image tourist by id
    * @input tus_img_tus_id
    * @output data image tourist 
    * @author Thanisorn thumsawanit 62160088
    * @Create Date 2564-08-10
    * @Update Date -
    */
    public function get_by_tourist_id(){
        $sql = "SELECT * FROM dcs_tourist_image WHERE tus_img_tus_id = ?";
        return $this->db->query($sql, array($this->tus_img_tus_id));
    }
}