<?php
/*
* Landing_page
* Landing page controller system
* @author Naaka punparich 62160082
* @Create Date 2564-07-24
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../DCS_controller.php';
class Landing_page extends DCS_controller
{

    /*
    * show_company_list
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
    * show_company_detail
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
        if (isset($_POST)) {
            $data["event"] = $this->mde->get_event_and_img($number_status, $_POST)->result();
        } else {
            $data["event"] = $this->mde->get_event_and_img($number_status)->result();
        }
        $data['eve_cat'] = $this->mcat->get_all()->result();
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
    * show_promotions_list
    * show list promotions page 
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
        $data['pro_cat'] = $this->mcat->get_all()->result();
        date_default_timezone_set('Asia/Bangkok');
        $date_now = date("Y-m-d");
        if (isset($_POST)) {
            $data["promotions"] = $this->mpt->get_promotions_and_img($number_status, $_POST, $date_now)->result();
        } else {
            $data["promotions"] = $this->mpt->get_promotions_and_img($number_status, NULL, $date_now)->result();
        }



        if ($this->session->userdata("tourist_id")) {
            $topbar = 'template/Tourist/topbar_tourist_login';
        } else {
            $topbar = 'template/Tourist/topbar_tourist';
        }
        $this->output_tourist('landing_page/v_list_promotion', $data, $topbar, 'footer');
    }

    /*
    * get_event_list_ajax
    * get event list
    * @input -
    * @output data
    * @author Suwapat Saowarod 62160340
    * @Create Date 2565-03-12
    */
    public function get_event_list_ajax($search = null)
    {
        $this->load->model('Event/M_dcs_event', 'meve');
        if($search != null){
            $result_search = urldecode($search);
            $data["arr_event"] = $this->meve->get_event_mobile($result_search)->result();
            // echo $search;
        }else{
            $data["arr_event"] = $this->meve->get_event_mobile()->result();
        }
        echo json_encode($data);
    }

    /*
    * show_promotions_detail
    * show detail promotions page 
    * @input -
    * @output -
    * @author Chutipon Thermsirisuksin 62160081
    * @Create Date 2564-10-02
    */
    public function show_promotions_detail($pro_id)
    {
        $this->load->model('Promotions/M_dcs_promotions', 'mpro');
        $this->load->model('Tourist/M_dcs_tourist', 'mdct');
        $this->mpro->pro_id = $pro_id;
        $data["promotions"] = $this->mpro->get_by_detail()->result();
        if ($this->session->userdata("tourist_id")) {
            $topbar = 'template/Tourist/topbar_tourist_login';
            $this->mdct->tus_id = $this->session->userdata("tourist_id");
            $tus_score_new = $this->mdct->get_point_tourist_by_id()->row();
            $this->session->unset_userdata("tus_score");
            $this->session->set_userdata("tus_score", $tus_score_new->tus_score);
        } else {
            $topbar = 'template/Tourist/topbar_tourist';
        }

        $this->output_tourist('landing_page/v_detail_promotions', $data, $topbar, 'footer');
    }
    /*
    * exchange_reward_ajax
    * exchange_reward tourist 
    * @input -
    * @output -
    * @author Thanisorn thumsawanit 62160088
    * @Create Date 2564-12-24
    */
    public function exchange_reward_ajax()
    {
        if ($this->input->post('tus_score') >= $this->input->post('pro_point')) {
            $this->load->model('Promotions/M_dcs_tou_promotion', 'mtoup');
            $this->load->model('Tourist/M_dcs_tourist', 'mtou');
            $this->mtou->tus_id = $this->session->userdata("tourist_id");
            $this->mtoup->tou_pro_id = $this->input->post('pro_id');
            $this->mtoup->tou_pro_status = 1;
            $this->mtoup->tou_tus_id = $this->session->userdata("tourist_id");
            $this->mtoup->insert();
            $this->mtou->tus_score = $this->input->post('tus_score') - $this->input->post('pro_point');
            $this->mtou->update_score_exchange_reward();
            $this->session->set_userdata("exchange_promotion", "exchange_success");
            echo 1;
        } else {
            echo 2;
        }
    }

    /*
    * show_reward_list
    * show_reward_list page 
    * @input -
    * @output -
    * @author Thanisorn thumsawanit 62160088
    * @Create Date 2564-01-03
    */
    public function show_reward_list()
    {
        $this->load->model('Promotions/M_dcs_tou_promotion', 'mpro');
        $data["tou_pro"] = $this->mpro->get_promotion_by_tou_id($this->session->userdata("tourist_id"))->result();
        if ($this->session->userdata("tourist_id")) {
            $topbar = 'template/Tourist/topbar_tourist_login';
        } else {
            $topbar = 'template/Tourist/topbar_tourist';
        }
        $this->output_tourist('landing_page/v_list_reward', $data, $topbar);
    }
    /*
    * show_reward_history
    * show reward using history page 
    * @input -
    * @output -
    * @author Thanisorn thumsawanit 62160088
    * @Create Date 2564-03-10
    */
    public function show_reward_history()
    {
        $this->load->model('Promotions/M_dcs_tou_promotion', 'mpro');
        $data["tou_pro"] = $this->mpro->get_promotion_by_tou_status($this->session->userdata("tourist_id"))->result();
       
        if ($this->session->userdata("tourist_id")) {
            $topbar = 'template/Tourist/topbar_tourist_login';
        } else {
            $topbar = 'template/Tourist/topbar_tourist';
        } 
        $this->output_tourist('landing_page/v_reward_history', $data, $topbar);
    }

    /*
    * get_event_list_landingpage
    * get event list
    * @input -
    * @output data
    * @author Weradet Nopsombun 62160110
    * @Create Date 2565-03-12
    */
    public function get_event_list_landingpage()
    {
        $this->load->model('Event/M_dcs_event', 'mde');
        $data["arr_event"] = $this->mde->get_event_landing_page()->result();
        echo json_encode($data);
    }

    /*
    * get_event_list_ajax
    * get event list
    * @input -
    * @output data
    * @author Weradet Nopsombun 62160110
    * @Create Date 2565-03-12
    */
    public function get_company_list_landingpage()
    {
        $this->load->model('Company/M_dcs_company', 'mde');
        $data["arr_com"] = $this->mde->get_company_landing_page()->result();
        echo json_encode($data);
    }

    /*
    * get_company_list_ajax
    * get event list
    * @input -
    * @output data
    * @author Thanisorn thumsawanit 62160088
    * @Create Date 2565-03-23
    */
    public function get_company_list_ajax($search = null)
    {
        $this->load->model('Company/M_dcs_company', 'mde');
        if($search != null){
            $result_search = urldecode($search);
            $data["company"] = $this->mde->get_company_mobile($result_search)->result();
            // echo $search;
        }else{
            $data["company"] = $this->mde->get_company_mobile()->result();
        }
        echo json_encode($data);
    }

    /*
    * get_pro_list_ajax
    * get pro list ajax
    * @input -
    * @output data
    * @author Chutipon Thermsirisuksin 62160081 & Naaka Punparich 62160082
    * @Create Date 2565-03-23
    */
    public function get_pro_list_ajax($search = null)
    {
        $this->load->model('Promotions/M_dcs_promotions', 'mpro');
        if($search != null){
            $result_search = urldecode($search);
            $data["arr_pro"] = $this->mpro->get_pro_mobile($result_search)->result();
            // echo $search;
        }else{
            $data["arr_pro"] = $this->mpro->get_pro_mobile()->result();
        }
        echo json_encode($data);
    }
}