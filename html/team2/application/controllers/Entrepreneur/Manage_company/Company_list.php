<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';

/*
* Company_list
* Manage list company by entrepreneur
* @author Suwapat Saowarod 62160340
* @Create Date 2564-07-18
*/
class Company_list extends DCS_controller
{

    /*
    * show_list_company
    * show list company by id in database
    * @input 
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-07-18
    * @Update Date -
    */
    public function show_list_company()
    {
        $_SESSION['tab_number_entrepreneur'] = 1;
        if (!isset($_SESSION['tab_number_entrepreneur'])) {
            $_SESSION['tab_number_entrepreneur'] = 1;
        }
        $this->load->model('Company/M_dcs_company', 'mcom');
        $this->mcom->com_ent_id = $this->session->userdata("entrepreneur_id");
        $data['arr_company'] = $this->mcom->get_all()->result();
        $view = 'entrepreneur/manage_company/v_list_company';
        $this->output_entrepreneur($view, $data);
    }
}
