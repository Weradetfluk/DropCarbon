<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dcb_controller extends CI_Controller
{
  public function index()
	{
		// test push commit 
		$this->load->view('welcome_message');
	}
}

