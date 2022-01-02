<?php
/*
* Landing_page_tourist
* Manage Landing page tourist 
* @author Jutamas Thaptong 62160079
* @Create Date 2564-08-02
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';

/*
    * Landing_page_tourist
    * Manage Landing page tourist 
    * @author Jutamas Thaptong 62160079
    * @Create Date 2564-08-02
    */

class Landing_page_tourist extends DCS_controller
{

    /*
    * output_landing_page
    * show Landing page tourist for every one
    * @input $view
    * @output -
    * @author Jutamas Thaptong 62160079
    * @Create Date 2564-08-02
    */

    public function index()
    {
        $this->load->model('Company/M_dcs_company', 'mdc');

        $this->load->model('Event/M_dcs_event', 'mde');
        $this->load->model('Promotions/M_dcs_promotions', 'mdp');

        // $data['arr_image_com'] = $this->mdci->get_all()->result();
        // $data['arr_com'] = $this->mdc->get_all()->result();
        // $data['arr_image_eve'] = $this->mdei->get_all()->result();
        // $data['arr_eve'] = $this->mde->get_all()->result();
        $data['arr_pro'] = $this->mdp->get_promotions_landing_page()->result();
        $data['arr_com'] = $this->mdc->get_company_landing_page()->result();
        $data['arr_eve'] = $this->mde->get_event_landing_page()->result();

        // $this->output_tourist('tourist/auth/v_landing_page_tourist', $data, 'template/Tourist/topbar_tourist_login', 'footer');
        $this->output_tourist('landing_page/v_landing_page', $data, 'template/Tourist/topbar_tourist_login', 'footer');
    }
}