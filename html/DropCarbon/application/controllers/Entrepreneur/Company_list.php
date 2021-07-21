<?php
defined('BASEPATH') or exit('No direct script access allowed');
require dirname(__FILE__) . '/../DCS_controller.php';

    /*
    * @author Suwapat Saowarod 62160340
    */
class Company_list extends DCS_controller{

    /*
    * show_list_company
    * show list company by id in database
    * @input 
    * @output -
    * @author Suwapat Saowarod
    * @Create Date 2021-07-18
    * @Update Date -
    */
    public function show_list_company(){
        $this->load->model('M_dcs_company', 'mcom');
        // echo $this->session->userdata("Entrepreneur_id");
        $this->mcom->com_ent_id=$this->session->userdata("Entrepreneur_id");
        $data['arr_company'] = $this->mcom->get_all()->result();
        $this->output_company($data);
    }
}