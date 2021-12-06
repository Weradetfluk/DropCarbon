<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';
/*
* Admin_add_event
* add event admin class
* @author weradet nopsombun 62160110
* @Create Date 2564-12-06
*/
class Admin_add_promotions extends DCS_controller
{
    /*
        * @author Nantasiri Saiwaew 62160093
        */

    public function __construct()
    {
        parent::__construct();
        $this->load->library('email');
        $this->load->model('Event/M_dcs_event', 'mdce');
    }

    /*
        * show_data_event_list
        * get all data event 
        * @input
        * @output -
        * @author Weradet Nopsombun 62160110
        * @Create Date 2564-07-17
        * @Update Date 2564-09-13
        */
    public function show_data_promosions_list()
    {
        $_SESSION['tab_number'] = 4; //set tab number in topbar_admin.php
        $this->output_admin('admin/manage_event/v_list_event_consider', null, 'admin/manage_event/v_data_card_event');
    }
}
