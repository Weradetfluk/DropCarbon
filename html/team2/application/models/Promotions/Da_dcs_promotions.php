<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once dirname(__FILE__) . "/../DCS_model.php";
/*
* Da_dcs_promotions
* Manage promotions
* @author Nantasiri Saiwaew 62160093
* @Create Date 2564-09-
*/
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
}