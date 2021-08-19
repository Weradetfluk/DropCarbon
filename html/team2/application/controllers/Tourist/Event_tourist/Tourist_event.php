<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';

class Tourist_event extends DCS_controller
{
    public function show_tourist_eventlist()
    {
        $this->output_event('tourist/event_tourist/v_list_event_tourist','template/Tourist/topbar_tourist');
    }

    public function show_detailevent_tourist()
    {
        $this->output_event('tourist/event_tourist/v_detail_event_tourist','template/Tourist/topbar_tourist');
    }

    public function show_tourist_eventlist_login()
    {
        $this->output_event('tourist/event_tourist/v_list_event_tourist','template/Tourist/topbar_tourist_login');
    }

    public function show_detailevent_tourist_login()
    {
        $this->output_event('tourist/event_tourist/v_detail_event_tourist','template/Tourist/topbar_tourist_login');
    }
}
