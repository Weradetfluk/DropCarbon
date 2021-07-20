<?php
defined('BASEPATH') or exit('No direct script access allowed');
require dirname(__FILE__) . '/../DCS_controller.php';

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
        $this->load->view('entrepreneur/v_add_company');
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
        $this->load->model('M_dcs_company', 'mcom');
        $this->mcom->com_name=$this->input->post('com_name');
        $this->mcom->com_lat=0;
        $this->mcom->com_lon=0;
        $this->mcom->com_description=$this->input->post('com_description');
        $this->mcom->add_company();
        redirect('Entrepreneur/Company_list/show_list_company');
    }
    
}