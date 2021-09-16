<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once dirname(__FILE__) . "/../DCS_model.php";
/*
* Da_dcs_event
* Manage event
* @author Naaka Punparich 62160082
* @Create Date 2564-09-16
*/
class Da_dcs_event extends DCS_model
{

    public $eve_id;
    public $eve_name;
    public $eve_point;
    public $eve_num_visitor;
    public $eve_description;
    public $eve_com_id;
    public $eve_cat_id;
    public $eve_status;

    /*
    * @author  Naaka Punparich 62160082
    */
    public function __construct()
    {
        parent::__construct();
    }
}
