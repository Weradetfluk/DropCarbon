<?php
/*
* Da_dcs_promotions
* Manage promotions
* @author Nantasiri Saiwaew 62160093
* @Create Date 2564-09-
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . "/../DCS_model.php";
class Da_dcs_promotions extends DCS_model
{

    public $pro_id;
    public $pro_name;
    public $pro_point;
    public $pro_description;
    public $pro_status;
    public $pro_add_date;
    public $pro_start_date;
    public $pro_end_date;
    public $pro_com_id;
    public $pro_cat_id;
    public $pro_adm_id;

    /*
    * @author Nantasiri Saiwaew 62160093
    */
    public function __construct()
    {
        parent::__construct();
    }

    /*
    * insert_promotions
    * insert promotions in database
    * @input pro_name, pro_point, pro_description, pro_status, pro_start_date, pro_end_date, pro_com_id, pro_cat_id
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-10-02
    * @Update Date -
    */
    public function insert_promotions()
    {
        $sql = "INSERT INTO `dcs_promotions`(`pro_name`, `pro_point`, `pro_description`, `pro_status`, `pro_start_date`, `pro_end_date`, `pro_com_id`, `pro_cat_id`) 
				VALUES (?,?,?,?,?,?,?,?)";
        $this->db->query($sql, array($this->pro_name, $this->pro_point, $this->pro_description, $this->pro_status, $this->pro_start_date, $this->pro_end_date, $this->pro_com_id, $this->pro_cat_id));
    }

    /*
    * update_promotions
    * update promotions in database
    * @input pro_name, pro_point, pro_description, pro_status, pro_start_date, pro_end_date, pro_com_id, pro_cat_id, pro_id
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-10-03
    * @Update Date -
    */
    public function update_promotions()
    {
        $sql = "UPDATE `dcs_promotions` 
                SET `pro_name`=?,
                    `pro_point`=?,
                    `pro_description`=?,
                    `pro_status`=?,
                    `pro_start_date`=?,
                    `pro_end_date`=?,
                    `pro_com_id`=?,
                    `pro_cat_id`=?
                WHERE pro_id=?";
        $this->db->query($sql, array($this->pro_name, $this->pro_point, $this->pro_description, $this->pro_status, $this->pro_start_date, $this->pro_end_date, $this->pro_com_id, $this->pro_cat_id, $this->pro_id));
    }

    /*
    * update_status
    * update status promotions
    * @input parameter 1, 2, ex. 1 = consider, 2 = approve, 3 = rejected 
    * @output -
    * @author Nantasiri Saiwaew 62160093
    * @Create Date 2564-10-01
	* @Update -
    */
    public function update_status($status_number)
    {
        $sql = "UPDATE {$this->db_name}.dcs_promotions SET pro_status = ?
        Where pro_id = ?";

        $this->db->query($sql, array($status_number, $this->pro_id));
    }

    /*
    * update_status_promotion
    * update pro_status 
    * @input pro_id
    * @output -
    * @author Thanchanok Thongjumroon 62160089
    * @Create Date 2564-10-03
    */
    public function update_status_promotion()
    {
        $sql = "UPDATE `dcs_promotions` 
				SET `pro_status`= ?
				WHERE pro_id=?";
        $this->db->query($sql, array($this->pro_status, $this->pro_id));
    }
/*
    * insert_promo_admin
    * insert promotions in database by admin
    * @input pro_name, pro_point, pro_description, pro_status, pro_start_date, pro_end_date, pro_com_id, pro_cat_id, pro_adm_id
    * @output -
    * @author Kasama Donwong 62160074
    * @Create Date 2564-12-24
    * @Update Date -
    */
    public function insert_promo_admin()
    {
        $sql = "INSERT INTO `dcs_promotions`(`pro_name`, `pro_point`, `pro_description`, `pro_status`, `pro_start_date`, `pro_end_date`, `pro_com_id`, `pro_cat_id`, `pro_adm_id`) 
				VALUES (?,?,?,?,?,?,?,?,?)";
        $this->db->query($sql, array($this->pro_name, $this->pro_point, $this->pro_description, $this->pro_status, $this->pro_start_date, $this->pro_end_date, $this->pro_com_id, $this->pro_cat_id, $this->pro_adm_id));
    }

    /*
    * update_promo_admin
    * update promotions in database
    * @input pro_name, pro_point, pro_description, pro_status, pro_start_date, pro_end_date, pro_com_id, pro_cat_id, pro_id
    * @output -
    * @author Kasama Donwong 62160074
    * @Create Date 2564-12-24
    * @Update Date -
    */
    public function update_promo_admin()
    {
        $sql = "UPDATE `dcs_promotions` 
                SET `pro_name`=?,
                    `pro_point`=?,
                    `pro_description`=?,
                    `pro_status`=?,
                    `pro_start_date`=?,
                    `pro_end_date`=?,
                    `pro_com_id`=?,
                    `pro_cat_id`=?,
                    `pro_adm_id`=?
                WHERE pro_id=?";
        $this->db->query($sql, array($this->pro_name, $this->pro_point, $this->pro_description, $this->pro_status, $this->pro_start_date, $this->pro_end_date, $this->pro_com_id, $this->pro_cat_id, $this->pro_adm_id, $this->pro_id));
    }
}