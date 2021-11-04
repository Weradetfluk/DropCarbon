<?php
/*
* M_dcs_tou_promotion
* get data tourist promotions
* @author Chutipon Thermsirisuksin 62160081
* @Create Date 2564-10-05
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once "Da_dcs_tou_promotion.php";

class M_dcs_tou_promotion extends Da_dcs_tou_promotion
{
    /*
    * @author Chutipon Thermsirisuksin 62160081
    */
    public function __construct()
    {
        parent::__construct();
    }

    /*
    * get_promotion_by_tou_id
    * get promotions by tus_id
    * @input $tou_id
    * @output promotions tourist
    * @author Chutipon Thermsirisuksin 62160081
    * @Create Date 2564-10-05
    * @Update Date -
   */
    function get_promotion_by_tou_id($tou_id)
    {
        $sql = "SELECT * FROM dcs_tou_promotion AS tou_pro
                LEFT JOIN dcs_promotions ON tou_pro.tou_pro_id = dcs_promotions.pro_id
                LEFT JOIN dcs_pro_image ON dcs_pro_image.pro_img_pro_id = dcs_promotions.pro_id
                WHERE tou_pro.tou_id = '$tou_id'";
        return $this->db->query($sql, array($this->tou_id));
    }
}