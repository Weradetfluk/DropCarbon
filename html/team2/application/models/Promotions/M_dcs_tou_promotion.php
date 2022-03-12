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
                WHERE tou_pro.tou_tus_id = '$tou_id' AND tou_pro_status != 2";
        return $this->db->query($sql, array($this->tou_id));
    }
    /*
    * get_promotion_by_tou_status
    * get promotions by tou status
    * @input $tou_id
    * @output promotions tourist
    * @author Chutipon Thermsirisuksin 62160081
    * @Create Date 2564-10-05
    * @Update Date -
   */
    function get_promotion_by_tou_status($tou_id)
    {
        $sql = "SELECT * FROM dcs_tou_promotion AS tou_pro
                LEFT JOIN dcs_promotions ON tou_pro.tou_pro_id = dcs_promotions.pro_id
                LEFT JOIN dcs_pro_image ON dcs_pro_image.pro_img_pro_id = dcs_promotions.pro_id
                WHERE tou_pro.tou_tus_id = '$tou_id' AND tou_pro_status = 2";
        return $this->db->query($sql, array($this->tou_id));
    }
    /*
    *get_reward_by_id
    *get data reward by id
    *@input tou_id
    *@output -
    *@author Thanisron thumsawanit 62160088
    *@Create Date 2564-01-04
    */
    function get_reward_by_id()
    {
        $sql = "SELECT * FROM {$this->db_name}.dcs_tou_promotion
                WHERE tou_pro_status != 2";
        return $this->db->query($sql);
    }
}