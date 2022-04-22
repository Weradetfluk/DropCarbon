<?php
/*
* Admin_view_dashboard
* Admin_view_dashboard show and get data and fiter data
* @author weradet nopsombun 62160110
* @Create Date 2564-11-27
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';
class Admin_view_dashboard extends DCS_controller
{
    /*
    * @author Weradet Nopsombun 62160110
    */
    public function __construct()
    {
        parent::__construct();
    }

    /*
    * index
    * show page dashboard
    * @input -
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-11-27
    * @Update Date -
    */
    public function index()
    {
        $_SESSION['tab_number'] = 1; //set tab number in topbar_admin.php
        $this->load->helper('mydate_helper.php');
        $this->output_admin('admin/manage_dashboard/v_dashboard', null, null);
        set_time_zone();
    }

    /*
    * get_data_card_dashboard_ajax
    * get data card dashboard and return data JSON
    * @input -
    * @output data
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-12-09
    * @Update Date -
    */
    function get_data_card_dashboard_ajax()
    {
        $this->load->model('DCS_model', 'dcmd');
        $data['arr_data_card_dashboard'] = $this->dcmd->get_data_dashboard_admin()->result();

        $this->output->set_content_type('application/json')->set_output(json_encode($data['arr_data_card_dashboard']));
    }

    /*
    * get_data_chart_event_cat_ajax
    * get data event cat to create bar chart dashboard and return data JSON
    * @input date_first, date_secon
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-12-10
    * @Update Date -
    */
    function get_data_chart_event_cat_ajax()
    {
        /*
            สำหรับทำกราฟแท่ง จำนวนการเช็คอินของ ประเภทกิจกรรม
        */
        $this->load->model('DCS_model', 'dcmd');

        $date_start = $this->input->post('date_first'); // รับค่าที่userกรอกไป input
        $date_end = $this->input->post('date_secon');

        if ($date_start != '' &&  $date_end != '') {
            $date_sql = "dcs_checkin.che_date_time_in between '" . $date_start . "' AND '" . $date_end . "'";
        } else {
            $date_sql = true;
        }

        $data['arr_data_dashboard'] = $this->dcmd->get_data_dashboard_event_cat_admin($date_sql);

        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    /* get_data_chart_event_per_ajax
    * get data chart event catgory percent to create pie chart to dashboard and return data JSON 
    * @input date_first, date_secon
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-12-10
    * @Update Date -
    */
    function get_data_chart_event_per_ajax()
    {

        /*
            สำหรับทำกราฟวงกลม จำนวนการเช็คอินของ ประเภทกิจกรรม คิดเป็น percent
        */
        $this->load->model('DCS_model', 'dcmd');

        $date_start = $this->input->post('date_first'); // รับค่าที่userกรอกไป input
        $date_end = $this->input->post('date_secon');

        if ($date_start != '' &&  $date_end != '') {
            //สำหรับ เช็ค การ filter วันที่
            $date_sql = "dcs_checkin.che_date_time_in between '" . $date_start . "' AND '" . $date_end . "'";
        } else {
            $date_sql = true;
        }

        $data['arr_data_dashboard'] = $this->dcmd->get_data_dashboard_event_per_admin($date_sql);

        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    /*
    * get_data_chart_event_ajax
    * get data bar chart drill down 
    * @input date_first, date_secon
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-12-10
    * @Update Date -
    */
    function get_data_chart_event_ajax()
    {
        $this->load->model('DCS_model', 'dcmd');

        $date_start = $this->input->post('date_first'); // รับค่าที่userกรอกไป input
        $date_end = $this->input->post('date_secon');

        if ($date_start != '' &&  $date_end != '') {
            $date_sql = "dcs_checkin.che_date_time_in between '" . $date_start . "' AND '" . $date_end . "'";
        } else {
            $date_sql = true;
        }

        $data = array();

        $data_json = array();

        $data['arr_name_cat'] =  $this->dcmd->get_data_event_name_cat($date_sql);

        for ($i = 0; $i < count($data['arr_name_cat']); $i++) {
            //สร้างรูปแบบ json และดึงข้อมูลกิจกรรมของทุกประเภท
            /*
               name "จัดการน้ำ และไฟฟ้า"
               id "1"
               data  "{
                          name : "พักโรงแรมสีเขียว"
                          number_checkin : "10"
               }"
          */
            $data_json[$i]['name'] =  $data['arr_name_cat'][$i]->eve_cat_name;
            $data_json[$i]['id'] =  $data['arr_name_cat'][$i]->eve_cat_id;
            $data_json[$i]['data'] =  $this->dcmd->get_data_dashboard_event_admin($date_sql, $data['arr_name_cat'][$i]->eve_cat_id);
        }
        //var_dump($data_json);
        echo json_encode($data_json);
    }

    /*
    * get_data_chart_checkin_ajax
    * get data chart dashboard and return data JSON
    * @input date_first, date_secon
    * @output -
    * @author Naaka Punparich 62160082
    * @Create Date 2564-12-25
    * @Update Date -
    */
    function get_data_chart_checkin_ajax()
    {
        $this->load->model('DCS_model', 'dcmd');

        $date_start = $this->input->post('date_first'); // รับค่าที่userกรอกไป input
        $date_end = $this->input->post('date_secon');

        if ($date_start != '' &&  $date_end != '') {
            $date_sql = "dcs_checkin.che_date_time_in between '" . $date_start . "' AND '" . $date_end . "'";
        } else {
            $date_sql = true;
        }

        $data['arr_data_checkin'] = $this->dcmd->get_data_checkin($date_sql);

        // $this->output->set_content_type('application/json')->set_output(json_encode($data));
        echo json_encode($data);
    }

    /*
    * get_data_chart_register_ajax
    * get data chart dashboard and return data JSON
    * @input date_first, date_secon
    * @output -
    * @author Naaka Punparich 62160082
    * @Create Date 2564-12-25
    * @Update Date -
    */
    function get_data_chart_register_ajax()
    {
        $this->load->model('Tourist/M_dcs_tourist', 'mtou');
        $this->load->model('Entrepreneur/M_dcs_entrepreneur', 'ment');

        $date_start = $this->input->post('date_first'); // รับค่าที่userกรอกไป input
        $date_end = $this->input->post('date_secon');

        if ($date_start != '' &&  $date_end != '') {
            $date_sql_tour = "dcs_tourist.tus_regis_date between '" . $date_start . "' AND '" . $date_end . "'";
            $date_sql_ent = "dcs_entrepreneur.ent_regis_date between '" . $date_start . "' AND '" . $date_end . "'";
        } else {
            $date_sql_tour = true;
            $date_sql_ent = true;
        }

        $data['arr_data_register_tour'] = $this->mtou->get_data_register_tour($date_sql_tour);
        $data['arr_data_register_ent'] = $this->ment->get_data_register_ent($date_sql_ent);

        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    /*
    * get_data_chart_promotion_add
    * get data chart dashboard and return data JSON Pie chart
    * @input date_first, date_secon 
    * @output -
    * @author Chutipon Thermsirisuksin 62160081
    * @Create Date 2565-03-08
    * @Update Date -
    */
    function get_data_chart_promotion_add_ajax()
    {
        $this->load->model('Promotions/M_dcs_promotions', 'mpro');

        $date_start = $this->input->post('date_first'); // รับค่าที่userกรอกไป input
        $date_end = $this->input->post('date_secon');

        if ($date_start != '' &&  $date_end != '') {
            $date_sql = "dcs_promotions.pro_add_date between '" . $date_start . "' AND '" . $date_end . "'";
        } else {
            $date_sql = true;
        }

        $data['arr_data_promotion_ent'] = $this->mpro->get_count_pro_ent_all($date_sql)->result();
        $data['arr_data_promotion_adm'] = $this->mpro->get_count_pro_adm_all($date_sql)->result();
        $data['arr_data_result_promotion_ent'] = $this->mpro->get_result_pro_ent_all($date_sql)->result();

        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }


    /*
    * get_data_chart_promotion_end
    * get data chart dashboard and return data JSON
    * @input date_first, date_secon
    * @output -
    * @author Chutipon Thermsirisuksin 62160081
    * @Create Date 2565-03-17
    * @Update Date -
    */
    function get_data_chart_promotion_end_ajax()
    {
        $this->load->model('Promotions/M_dcs_promotions', 'mpro');

        $date_start = $this->input->post('date_first'); // รับค่าที่userกรอกไป input
        $date_end = $this->input->post('date_secon');
        $now_date=date("Y-m-d");
        
        if ($date_start != '' &&  $date_end != '') {
            $date_sql = "dcs_promotions.pro_end_date between '" . $date_start . "' AND '" . $date_end . "'";
            $date_pro_end = "dcs_promotions.pro_end_date  < '" . $now_date . "'";
        } else {
            $date_sql = true;
            $date_pro_end = true;
        }


        

        $data['arr_data_promotion_end_ent'] = $this->mpro->get_count_pro_end_ent($date_sql,$date_pro_end)->result();
        $data['arr_data_promotion_end_adm'] = $this->mpro->get_count_pro_end_adm($date_sql,$date_pro_end)->result();

        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
}