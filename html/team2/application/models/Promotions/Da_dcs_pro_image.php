<?php
/*
* Da_dcs_eve_image
* Manage image event
* @author Chutipon Thermsirisuksin 62160081
* @Create Date 2564-10-02
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . "/../DCS_model.php";
class Da_dcs_pro_image extends DCS_model
{

    public $pro_img_path;
    public $pro_img_name;
    public $pro_img_pro_id;

    /*
    * @author Chutipon Thermsirisuksin 62160081
    */
    public function __construct()
    {
        parent::__construct();
    }
    /*
    * insert_image_promotions
    * insert image promotions
    * @input pro_img_path, pro_img_pro_id, pro_img_name
    * @output -
    * @author Chutipon Thermsirisuksin 62160081
    * @Create Date 2564-10-02
    * @Update Date -
    */
    public function insert_image_promotions()
    {
        $sql = "INSERT INTO `dcs_pro_image`(`pro_img_path`, `pro_img_name`, `pro_img_pro_id`) 
				VALUES (?, ?, ?)";
        $this->db->query($sql, array($this->pro_img_path, $this->pro_img_name, $this->pro_img_pro_id));
    }

    /*
    * delete_image_promotions
    * delete image promotions
    * @input pro_img_path
    * @output -
    * @author Chutipon Thermsirisuksin 62160081
    * @Create Date 2564-10-02
    * @Update Date -
    */
    public function delete_image_promotions()
    {
        $sql = "DELETE FROM `dcs_pro_image` WHERE pro_img_path = ?";
        $this->db->query($sql, array($this->pro_img_path));
    }
}