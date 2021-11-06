<?php
/*
* Da_dcs_reward
* Manage reward tourist
* @author Chutipon Thermsirisuksin 62160081
* @Create Date 2564-10-05
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . "/../DCS_model.php";
class Da_dcs_reward_tourist extends DCS_model
{

    public $ret_id;
    public $ret_rew_id;
    public $ret_tus_id;

    /*
    * @author Chutipon Thermsirisuksin 62160081
    */
    public function __construct()
    {
        parent::__construct();
    }
}