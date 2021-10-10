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
        $this->load->model('Company/M_dcs_com_category', 'mcat');
        $number_status = 2;
        $data['arr_com_cat'] = $this->mcom->get_com_cat()->result();
        $data['com_cat'] = $this->mcat->get_all()->result();

        if (isset($_POST)) {
            $data["company"] = $this->mcom->get_company_and_img($number_status, $_POST)->result();
        } else {
            $data["company"] = $this->mcom->get_company_and_img($number_status)->result();
        }

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
        $this->load->model('Event/M_dcs_event', 'mde');
        $this->load->model('Event/M_dcs_eve_category', 'mcat');
        $this->load->model('Promotions/M_dcs_promotions', 'mpt');
        $this->mimg->com_img_com_id = $com_id;
        $this->mcom->com_id = $com_id;

        $data["image"] = $this->mimg->get_by_com_id()->result();
        $data["company"] = $this->mcom->get_by_detail()->row();

        $data["event"] = $this->mde->get_event_by_com_id($com_id)->result();
        $data["promotions"] = $this->mpt->get_promotion_by_com_id($com_id)->result();

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
        $this->load->model('Event/M_dcs_eve_category', 'mcat');
        $number_status = 2;
        $data['arr_eve_cat'] = $this->mde->get_eve_cat()->result();
        $data['eve_cat'] = $this->mcat->get_all()->result();

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

        $this->load->model('Company/M_dcs_company', 'mcom');
        $this->load->model('Company/M_dcs_com_image', 'mimg');
        $this->mimg->com_img_com_id = $eve_id;
        $this->mcom->com_id = $eve_id;
        $data["image"] = $this->mimg->get_by_com_id()->result();
        $data["company"] = $this->mcom->get_by_detail()->row();

        $this->load->model('Event/M_dcs_event', 'mde');
        $this->load->model('Event/M_dcs_eve_image', 'mdei');
        $this->mdei->eve_img_eve_id = $eve_id;
        $this->mde->eve_id = $eve_id;
        $data["image_event"] = $this->mdei->get_by_eve_id()->result();
        $data["event"] = $this->mde->get_by_detail()->row();
        if ($this->session->userdata("tourist_id")) {
            $topbar = 'template/Tourist/topbar_tourist_login';
        } else {
            $topbar = 'template/Tourist/topbar_tourist';
        }
        $this->output_tourist('landing_page/v_detail_event', $data, $topbar, 'footer');
    }

    /*
    * show_promotion_list
    * show list promotion page 
    * @input -
    * @output -
    * @author Chutipon Thermsirisuksin 62160081
    * @Create Date 2564-10-02
    */
    public function show_promotions_list()
    {
        $this->load->model('Promotions/M_dcs_promotions', 'mpt');
        $this->load->model('Promotions/M_dcs_pro_category', 'mcat');
        $number_status = 2;
        $data['arr_pro_cat'] = $this->mpt->get_pro_cat()->result();
        $data['pro_cat'] = $this->mcat->get_all()->result();

        if (isset($_POST)) {
            $data["promotions"] = $this->mpt->get_promotions_and_img($number_status, $_POST)->result();
        } else {
            $data["promotions"] = $this->mpt->get_promotions_and_img($number_status)->result();
        }

        if ($this->session->userdata("tourist_id")) {
            $topbar = 'template/Tourist/topbar_tourist_login';
        } else {
            $topbar = 'template/Tourist/topbar_tourist';
        }
        $this->output_tourist('landing_page/v_list_promotion', $data, $topbar, 'footer');
    }

    /*
    * show_promotion_detail
    * show detail promotion page 
    * @input -
    * @output -
    * @author Chutipon Thermsirisuksin 62160081
    * @Create Date 2564-10-02
    */
    public function show_promotions_detail($pro_id)
    {
        $this->load->model('Promotions/M_dcs_promotions', 'mpro');
        $this->mpro->pro_id = $pro_id;
        $data["promotions"] = $this->mpro->get_by_detail()->result();
        if ($this->session->userdata("tourist_id")) {
            $topbar = 'template/Tourist/topbar_tourist_login';
        } else {
            $topbar = 'template/Tourist/topbar_tourist';
        }

        $this->output_tourist('landing_page/v_detail_promotions', $data, $topbar, 'footer');
    }
}