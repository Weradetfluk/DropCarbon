<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';

    /*
    * @author Suwapat Saowarod 62160340
    */

class Company_add extends DCS_controller{
    /*
    * show_add_company
    * show form add company
    * @input 
    * @output -
    * @author Suwapat Saowarod
    * @Create Date 2021-07-18
    * @Update Date -
    */
    public function show_add_company(){
        $this->load->view('template/Entrepreneur/header_entrepreneur');
        $this->load->view('template/Entrepreneur/javascript_entrepreneur');
        $this->load->view('template/Entrepreneur/topbar_entrepreneur');
        $this->load->view('entrepreneur/manage_company/v_add_company');
        $this->load->view('template/Entrepreneur/footer');
    }

    /*
    * add_company
    * add company to database
    * @input 
    * @output -
    * @author Suwapat Saowarod
    * @Create Date 2021-07-18
    * @Update Date -
    */
    public function add_company(){
        $this->load->model('Company/M_dcs_company', 'mcom');
        $this->mcom->com_name=$this->input->post('com_name');
        $this->mcom->com_lat=0;
        $this->mcom->com_lon=0;
        $this->mcom->com_description=$this->input->post('com_description');
        $this->mcom->com_ent_id=$this->session->userdata("Entrepreneur_id");
        $this->mcom->add_company();
        redirect('Entrepreneur/Manage_company/Company_list/show_list_company');
    }
    
    /*
    * show_google_map
    * show_google_map 
    * @input 
    * @output -
    * @author Suwapat Saowarod
    * @Create Date 2021-07-31
    * @Update Date -
    */
    public function show_google_map(){
        $this->load->view('entrepreneur/manage_copany/v_map_company');
    }
}