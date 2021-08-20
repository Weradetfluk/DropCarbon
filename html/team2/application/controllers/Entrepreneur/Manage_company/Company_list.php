<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';

/*
* Company_list
* Manage list company by entrepreneur
* @author Suwapat Saowarod 62160340
* @Create Date 2021-07-18
*/
class Company_list extends DCS_controller
{

    /*
    * show_list_company
    * show list company by id in database
    * @input 
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2021-07-18
    * @Update Date -
    */
    public function show_list_company()
    {
        $this->load->model('Company/M_dcs_company', 'mcom');
        $this->mcom->com_ent_id = $this->session->userdata("Entrepreneur_id");
        $data['arr_company'] = $this->mcom->get_all()->result();
        $this->output_company($data);
    }
}
