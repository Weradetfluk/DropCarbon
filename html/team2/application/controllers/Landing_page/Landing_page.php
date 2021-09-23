<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../DCS_controller.php';
/*
* Landing_page
* Landing page controller system
* @author Naaka punparich 62160082
* @Create Date 2564-07-24
*/
class Landing_page extends DCS_controller
{

    /*
    * show_tourist_companylist
    * show list company tourist page 
    * @input -
    * @output -
    * @author Jutamas Thaptong 62160079
    * @Create Date 2564-09-14
    */
    public function show_company_list()
    {
        $this->load->model('Company/M_dcs_company', 'mcom');
        $nunber_status = 2;
        $data["company"] = $this->mcom->get_company_and_img($nunber_status)->result();
        if ($this->session->userdata("tourist_id")) {
            $topbar = 'template/Tourist/topbar_tourist_login';
        } else {
            $topbar = 'template/Tourist/topbar_tourist';
        }
        $this->output_tourist('landing_page/v_list_company', $data, $topbar, 'footer');
    }

    /*
    * show_detaicompany_tourist
    * show detail company tourist page 
    * @input -
    * @output -
    * @author Jutamas Thaptong 62160079
    * @Create Date 2564-09-14
    */
    public function show_company_detail($com_id)
    {
        $this->load->model('Company/M_dcs_company', 'mcom');
        $this->load->model('Company/M_dcs_com_image', 'mimg');
        $this->mimg->com_img_com_id = $com_id;
        $this->mcom->com_id = $com_id;
        $data["image"] = $this->mimg->get_by_com_id()->row();
        $data["company"] = $this->mcom->get_by_detail()->row();
        if ($this->session->userdata("tourist_id")) {
            $topbar = 'template/Tourist/topbar_tourist_login';
        } else {
            $topbar = 'template/Tourist/topbar_tourist';
        }
        $this->output_tourist('landing_page/v_detail_company', $data, $topbar, 'footer');
    }

    /*
    * show_event_list
    * show list event page 
    * @input -
    * @output -
    * @author Naaka punparich 62160082
    * @Create Date 2564-09-23
    */
    public function show_event_list()
    {
        $this->load->model('Event/M_dcs_event', 'mde');
        $nunber_status = 2;
        $data["event"] = $this->mde->get_event_and_img($nunber_status)->result();
        if ($this->session->userdata("tourist_id")) {
            $topbar = 'template/Tourist/topbar_tourist_login';
        } else {
            $topbar = 'template/Tourist/topbar_tourist';
        }
        $this->output_tourist('landing_page/v_list_event', $data, $topbar, 'footer');
    }

    /*
    * show_event_detail
    * show detail event  page 
    * @input -
    * @output -
    * @author Naaka punparich 62160082
    * @Create Date 2564-09-23
    */
    public function show_event_detail($eve_id)
    {
        $this->load->model('Event/M_dcs_event', 'mde');
        $this->load->model('Event/M_dcs_eve_image', 'mdei');
        $this->mdei->eve_img_eve_id = $eve_id;
        $this->mde->eve_id = $eve_id;
        $data["image_event"] = $this->mdei->get_by_eve_id()->row();
        $data["event"] = $this->mde->get_by_detail()->row();
        if ($this->session->userdata("tourist_id")) {
            $topbar = 'template/Tourist/topbar_tourist_login';
        } else {
            $topbar = 'template/Tourist/topbar_tourist';
        }
        $this->output_tourist('landing_page/v_detail_event', $data, $topbar, 'footer');
    }
}
