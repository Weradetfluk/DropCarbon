<?php
/*
* Da_dcs_parish
* Manage parish
* @author Suwapat Saowarod 62160340
* @Create Date 2564-12-18
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . "/../DCS_model.php";
class Da_dcs_parish extends DCS_model
{

    public $par_id;
    public $par_name_th;
    public $par_name_en;
    public $par_code;
    public $par_dis_id;

    /*
    * @author Suwapat Saowarod 62160340
    */
    public function __construct()
    {
        parent::__construct();
    }
}