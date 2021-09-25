<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';
/*
* Tourist_event
* Tourist event controller system
* @author Naaka punparich 62160082
* @Create Date 2564-07-24
*/
class Tourist_event extends DCS_controller
{
    /*
    * show_event_list_tourist
    * show list event for tourist 
    * @input -
    * @output -
    * @author Naaka punparich 62160082
    * @Create Date 2564-09-23
    */
    public function show_event_list_tourist()
    {
        $this->load->model('Event/M_dcs_event', 'mde');
        $nunber_status = 2;
        $data["event"] = $this->mde->get_event_and_img($nunber_status)->result();
        if ($this->session->userdata("tourist_id")) {
            $topbar = 'template/Tourist/topbar_tourist_login';
        } else {
            $topbar = 'template/Tourist/topbar_tourist';
        }
        $this->output_tourist('tourist/manage_event/v_list_event_tourist', $data, $topbar, 'footer');
    }
}
