<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once dirname(__FILE__) ."/../DCS_model.php";
/*
* Da_dcs_company
* Manage company
* @author Suwapat Saowarod 62160340
* @Create Date 2564-07-19
*/
class Da_dcs_company_tourist extends DCS_model{
	
	public $com_id;
	public $com_name;
	public $com_lat; 
	public $com_lon; 
	public $com_description;
	public $com_status;
	public $com_num_visitor;
	public $com_ent_id;
    public $com_cat_id;

	/*
    * @author Suwapat Saowarod 62160340
    */
    public function __construct()
	{
		parent::__construct();
	}
}