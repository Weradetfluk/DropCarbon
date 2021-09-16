<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once dirname(__FILE__) ."/../DCS_model.php";
/*
* Da_dcs_eve_image
* Manage image event
* @author Naaka Punparich 62160082
* @Create Date 2564-09-16
*/
class Da_dcs_eve_image extends DCS_model{
	
	public $eve_img_path;
	public $eve_img_eve_id;

	/*
    * @author Naaka Punparich 62160082
    */
    public function __construct()
	{
		parent::__construct();
	}
}