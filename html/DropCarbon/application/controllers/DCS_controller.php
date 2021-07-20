<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DCS_controller extends CI_Controller
{


	public function index()
	{
        $this->output_login_admin('/Admin/v_login_admin');
	}



    public function output_admin($view, $data=null){
        $this->load->view('template/Admin/header_admin');
        $this->load->view('template/Admin/topbar_admin');
        $this->load->view('template/Admin/javascript_admin');
        $this->load->view($view,$data);
        $this->load->view('template/Admin/footer');
    }



    public function output_login_admin(){
        $this->load->view('template/Admin/header_admin');
        $this->load->view('template/Admin/javascript_admin');
        $this->load->view('Admin/v_login_admin');
        $this->load->view('template/Admin/footer');
    }

}

