<?php
defined('BASEPATH') or exit('No direct script access allowed');
require dirname(__FILE__) . '/../DCS_controller.php';

   /*
    * @author Suwapat Saowarod 62160340
    */
class Company_edit extends DCS_controller{
   /*
    * delete_company
    * update com_status = 4 in database
    * @input 
    * @output -
    * @author Suwapat Saowarod
    * @Create Date 2021-07-19
    * @Update Date -
    */
     public function delete_company(){
        $this->load->model('M_dcs_company', 'mcom');
        $this->mcom->com_id=$this->input->post('com_id'); 
        echo $this->mcom->com_id;
        $this->mcom->delete_company();
        echo json_encode('Entrepreneur/Company_list/show_list_company');
     }

   /*
    * show_edit_company
    * update show form edit company
    * @input 
    * @output -
    * @author Suwapat Saowarod
    * @Create Date 2021-07-19
    * @Update Date -
    */
     public function show_edit_company($com_id){
        $this->load->model('M_dcs_company', 'mcom');
        $this->mcom->com_id=$com_id;
        $data['arr_company']=$this->mcom->get_by_id()->result();
        $this->load->view('template/Entrepreneur/header_entrepreneur');
        $this->load->view('template/Entrepreneur/javascript_entrepreneur');
        $this->load->view('template/Entrepreneur/topbar_entrepreneur');
        $this->load->view('entrepreneur/v_edit_company', $data);
        $this->load->view('template/Entrepreneur/footer');
     }

   /*
    * edit_company
    * edit company to database
    * @input 
    * @output -
    * @author Suwapat Saowarod
    * @Create Date 2021-07-19
    * @Update Date -
    */
     public function edit_company(){
        $this->load->model('M_dcs_company', 'mcom');
        $this->mcom->com_name=$this->input->post('com_name');
        $this->mcom->com_description=$this->input->post('com_description');
        $this->mcom->com_id=$this->input->post('com_id');
        $this->mcom->edit_company();
        redirect('Entrepreneur/Company_list/show_list_company');
     }
}