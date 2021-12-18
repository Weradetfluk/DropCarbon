<?php
/*
* Da_dcs_district
* Manage district
* @author Suwapat Saowarod 62160340
* @Create Date 2564-12-18
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . "/../DCS_model.php";
class Da_dcs_district extends DCS_model
{

    public $dis_id;
    public $dis_name_th;
    public $dis_name_en;
    public $dis_code;
    public $dis_prv_id;

    /*
    * @author Suwapat Saowarod 62160340
    */
    public function __construct()
    {
        parent::__construct();
    }
}