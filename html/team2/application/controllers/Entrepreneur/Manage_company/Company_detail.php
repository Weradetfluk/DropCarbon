<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';
class Company_detail extends DCS_controller
{
    public function show_detail_company($com_id)
    {
        $this->load->model('Company/M_dcs_company', 'mcom');
        $this->mcom->com_id = $com_id;
        $data["mhis"] = $this->mcom->get_by_detail()->row();
        $this->load->view('template/Entrepreneur/header_entrepreneur');
        $this->load->view('template/Entrepreneur/javascript_entrepreneur');
        $this->load->view('template/Entrepreneur/topbar_entrepreneur');
        $this->load->view('entrepreneur/manage_company/v_detail_company', $data);
        $this->load->view('template/Entrepreneur/footer');
    }
}