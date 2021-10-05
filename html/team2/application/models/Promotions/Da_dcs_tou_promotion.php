<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once dirname(__FILE__) . "/../DCS_model.php";
/*
* Da_dcs_tou_promotion
* 
* @author Chutipon Thermsirisuksin 62160081
* @Create Date 2564-10-05
*/
class Da_dcs_tou_promotion extends DCS_model
{

    public $tou_id;
    public $tou_pro_status;
    public $tou_pro_id;
    public $tou_tus_id;

    /*
    * @author Chutipon Thermsirisuksin 62160081
    */
    public function __construct()
    {
        parent::__construct();
    }
}