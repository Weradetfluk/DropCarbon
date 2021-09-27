<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once dirname(__FILE__) . "/../DCS_model.php";
/*
* Da_dcs_checkin
* Manage tourist checkin
* @author Chutipon Thermsirisuksin 62160081
* @Create Date 2564-09-25
*/
class Da_dcs_checkin extends DCS_model
{

    public $che_id;
    public $che_status;
    public $che_date_time_in;
    public $che_date_time_out;
    public $che_tus_id;
    public $che_eve_id;

    /*
    * @author  Chutipon Thermsirisuksin 62160081
    */
    public function __construct()
    {
        parent::__construct();
    }
}