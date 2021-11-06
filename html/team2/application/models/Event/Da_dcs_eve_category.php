<?php
/*
* Da_dcs_eve_category
* Manage category event
* @author Naaka Punparich 62160082
* @Create Date 2564-09-16
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) ."/../DCS_model.php";
class Da_dcs_eve_category extends DCS_model{
	
	public $eve_cat_id;
	public $eve_cat_name;

	/*
    * @author Naaka Punparich 62160082
    */
    public function __construct()
	{
		parent::__construct();
	}
}