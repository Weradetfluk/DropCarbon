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
    * @Update 1 By Chutipon Thermsirisuksin 62160081
    * @Update Date 2564-09-27
    */
    public function show_event_list_tourist()
    {
        $this->load->model('Event/M_dcs_event', 'mde');
        $this->load->model('Event/M_dcs_eve_category', 'mcat');
        $this->load->model('Checkin/M_dcs_checkin', 'mche');
        $number_status = 2;
        $data['arr_eve_cat'] = $this->mde->get_eve_cat()->result();
        $data['eve_cat'] = $this->mcat->get_all()->result();
        $tus_id = $this->session->userdata("tourist_id");
        $data['checkin'] = $this->mche->get_checkin_by_eve_id($tus_id)->result();


        if (isset($_POST)) {
            $data["event"] = $this->mde->get_event_and_img($number_status, $_POST)->result();
        } else {
            $data["event"] = $this->mde->get_event_and_img($number_status)->result();
        }
        if ($this->session->userdata("tourist_id")) {
            $topbar = 'template/Tourist/topbar_tourist_login';
        } else {
            $topbar = 'template/Tourist/topbar_tourist';
        }
        $this->output_tourist('tourist/manage_event/v_list_event_tourist', $data, $topbar, 'footer');
    }

    /*
    * show_detaicompany_tourist
    * show detail company tourist page 
    * @input -
    * @output -
    * @author Chutipon Thermsirisuksin 62160081
    * @Create Date 2564-09-14
    */
    public function show_event_detail($eve_id)
    {
        $this->load->model('Event/M_dcs_event', 'meve');
        $this->load->model('Event/M_dcs_eve_image', 'mimg');
        $this->mimg->eve_img_eve_id = $eve_id;
        $this->meve->eve_id = $eve_id;
        $data["image"] = $this->mimg->get_by_com_id()->row();
        $data["event"] = $this->meve->get_by_detail()->row();
        if ($this->session->userdata("tourist_id")) {
            $topbar = 'template/Tourist/topbar_tourist_login';
        } else {
            $topbar = 'template/Tourist/topbar_tourist';
        }
        $this->output_tourist('landing_page/v_detail_event', $data, $topbar, 'footer');
    }
}