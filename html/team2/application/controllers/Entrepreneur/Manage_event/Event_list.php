<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';

/*
* Event_list
* Manage list event by entrepreneur
* @author Suwapat Saowarod 62160340
* @Create Date 2564-09-16
*/
class Event_list extends DCS_controller
{
    /*
    * show_list_company
    * show list company by id in database
    * @input entrepreneur_id
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-09-16
    * @Update Date -
    */
    public function show_list_event(){
        $this->load->model('Event/M_dcs_event', 'meve');
        $data['arr_event'] = $this->meve->get_event_by_ent_id($this->session->userdata("entrepreneur_id"))->result();
        $view = 'entrepreneur/manage_event/v_list_event';
        $_SESSION['tab_number_entrepreneur'] = 2;
        $this->output_entrepreneur($view, $data);
    }
}