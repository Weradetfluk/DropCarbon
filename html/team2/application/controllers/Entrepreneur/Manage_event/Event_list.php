<?php
/*
* Event_list
* Manage list event by entrepreneur
* @author Suwapat Saowarod 62160340
* @Create Date 2564-09-16
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';
class Event_list extends DCS_controller
{
    /*
    * show_list_event
    * show list event by id in database
    * @input -
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-09-16
    * @Update Date -
    */
    public function show_list_event(){
        if (!isset($_SESSION['tab_number_event'])) {
            $_SESSION['tab_number_event'] = 1;
        }
        $this->load->helper('mydate_helper.php');
        $this->load->model('Event/M_dcs_event', 'meve');
        $data['arr_event'] = $this->meve->get_event_by_ent_id($this->session->userdata("entrepreneur_id"))->result();
        date_default_timezone_set('Asia/Bangkok');
        $data['date_now'] = date("Y-m-d");
        $view = 'entrepreneur/manage_event/v_list_event';
        $_SESSION['tab_number_entrepreneur'] = 2;
        $this->output_entrepreneur($view, $data);
    }

    /*
    * change_tab_event_ajax
    * change tab session tab_number_event
    * @input tab_event
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-09-17
    * @Update Date -
    */
    public function change_tab_event_ajax()
    {
        $_SESSION['tab_number_event'] = $this->input->post('tab_event');
        echo $this->input->post('tab_event');
    }
    

}