<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class DCS_controller extends CI_Controller
{


	  /*
    * index main 
    * index Main Drop carbon Systems
    * @input 
    * @output -
    * @author Weradet Nopsombun
    * @Create Date 2564-07-17
    * @Update -
    */

	public function index()
	{
        $this->output_login_admin('/Admin/v_login_admin'); //path
	}


	/*
    * output_admin
    * output admin page
    * @input 
    * @output -
    * @author Weradet Nopsombun
    * @Create Date 2564-07-17
    * @Update -
    */

    public function output_admin($view, $data=null){
        $this->load->view('template/Admin/header_admin'); // path
        $this->load->view('template/Admin/topbar_admin');
        $this->load->view('template/Admin/javascript_admin');
        $this->load->view($view,$data);
        $this->load->view('template/Admin/footer');
    }


	/*
    * output_login_admin
    * output admin login  page
    * @input 
    * @output -
    * @author Weradet Nopsombun
    * @Create Date 2564-07-17
    * @Update -
    */

    public function output_login_admin(){
        $this->load->view('template/Admin/header_admin'); //path
        $this->load->view('template/Admin/javascript_admin'); 
        $this->load->view('Admin/v_login_admin');
        $this->load->view('template/Admin/footer');
    }

}

