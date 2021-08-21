<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once dirname(__FILE__) ."/../DCS_model.php";
/*
* Da_dcs_tourist_image
* Manage image tourist
* @author Chutipon Thermsirisuksin 62160081
* @Create Date 2564-08-05
*/
class Da_dcs_tourist_image extends DCS_model{
    public $tus_img_path;
    public $tus_img_tus_id;

    /*
    * insert_img
    * insert image for tourist 
    * @input tus_img_path, tus_img_tus_id
    * @output -
    * @author Chutipon Thermsirisuksin 62160081
    * @Create Date 2564-08-05
    * @Update Date -
    */
    public function insert_img(){
        $sql = "INSERT INTO `dcs_tourist_image`(`tus_img_path`, `tus_img_tus_id`) 
                VALUES (?,?)";
        $this->db->query($sql, array($this->tus_img_path, $this->tus_img_tus_id));
    }
}