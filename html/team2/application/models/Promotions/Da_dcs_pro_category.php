<?php
/*
* Da_dcs_pro_category
* Manage category promotion
* @author Chutipon Thermsirisuksin
* @Create Date 2564-10-02
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . "/../DCS_model.php";
class Da_dcs_pro_category extends DCS_model
{

    public $pro_cat_id;
    public $pro_cat_name;

    /*
    * @author Chutipon Thermsirisuksin 62160081
    */
    public function __construct()
    {
        parent::__construct();
    }
}