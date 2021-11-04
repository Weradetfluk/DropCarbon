<?php
/*
* Da_dcs_com_category
* Manage category company
* @author Suwapat Saowarod 62160340
* @Create Date 2564-09-13
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) ."/../DCS_model.php";
class Da_dcs_com_category extends DCS_model{
	
	public $com_cat_id;
	public $com_cat_name;

	/*
    * @author Suwapat Saowarod 62160340
    */
    public function __construct()
	{
		parent::__construct();
	}
}