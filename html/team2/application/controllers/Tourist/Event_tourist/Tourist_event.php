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
    * show_tourist_eventlist
    * show list event tourist page 
    * @input -
    * @output -
    * @author Naaka Punparich 62160082
    * @Create Date 2564-07-24
   */
    public function show_tourist_eventlist()
    {
        $this->output_event('tourist/event_tourist/v_list_event_tourist', 'template/Tourist/topbar_tourist');
    }

    /*
    * show_detailevent_tourist
    * show detail event tourist page 
    * @input -
    * @output -
    * @author Naaka Punparich 62160082
    * @Create Date 2564-07-24
   */
    public function show_detailevent_tourist()
    {
        $this->output_event('tourist/event_tourist/v_detail_event_tourist', 'template/Tourist/topbar_tourist');
    }

    /*
    * show_tourist_eventlist_login
    * show list event tourist page and change topbar
    * @input -
    * @output -
    * @author Naaka Punparich 62160082
    * @Create Date 2564-07-24
   */
    public function show_tourist_eventlist_login()
    {
        $this->output_event('tourist/event_tourist/v_list_event_tourist', 'template/Tourist/topbar_tourist_login');
    }

    /*
    * show_detailevent_tourist_login
    * show detail event tourist page and change topbar
    * @input -
    * @output -
    * @author Naaka Punparich 62160082
    * @Create Date 2564-07-24
   */
    public function show_detailevent_tourist_login()
    {
        $this->output_event('tourist/event_tourist/v_detail_event_tourist', 'template/Tourist/topbar_tourist_login');
    }
}
