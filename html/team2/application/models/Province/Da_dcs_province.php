<?php
/*
* Da_dcs_province
* Manage province
* @author Suwapat Saowarod 62160340
* @Create Date 2564-12-18
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . "/../DCS_model.php";
class Da_dcs_province extends DCS_model
{

    public $prv_id;
    public $prv_name_th;
    public $prv_name_en;
    public $prv_code;
    public $prv_sec_id;

    /*
    * @author Suwapat Saowarod 62160340
    */
    public function __construct()
    {
        parent::__construct();
    }
}