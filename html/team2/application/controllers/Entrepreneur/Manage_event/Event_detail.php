<?php
/*
* Event_detail
* Manage detail event by entrepreneur
* @author Acharaporn pornpattanasap 62160344
* @Create Date 2564-09-25
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';
class Event_detail extends DCS_controller
{

    /*
    * show_detail_event
    * show detail event
    * @input eve_id
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-08-05
    * @Update Date -
    */
    public function show_detail_event($eve_id)
    {
        $this->load->model('Event/M_dcs_event', 'meve');
        $this->meve->eve_id = $eve_id;
        $data["arr_event"] = $this->meve->get_by_detail()->result();
        $view = 'entrepreneur/manage_event/v_detail_event';
        $this->output_entrepreneur($view, $data);
    }
}
