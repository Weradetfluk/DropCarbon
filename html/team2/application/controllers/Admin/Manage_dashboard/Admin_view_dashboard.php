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
    * @input
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
    * get_data_card_dashboard
    * get data card dashboard and return data JSON
    * @input
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-12-09
    * @Update Date -
    */
    function get_data_card_dashboard()
    {
        $this->load->model('DCS_model', 'dcmd');
        $data['arr_datacard_dashboard'] = $this->dcmd->get_data_dashboard_admin()->result();

        $this->output->set_content_type('application/json')->set_output(json_encode($data['arr_datacard_dashboard']));
    }

    /*
    * get_data_chart_event_cat
    * get data chart dashboard and return data JSON
    * @input
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-12-10
    * @Update Date -
    */
    function get_data_chart_event_cat()
    {
        $this->load->model('DCS_model', 'dcmd');

        $date_start = $this->input->post('date_first'); // รับค่าที่userกรอกไป input
        $date_end = $this->input->post('date_secon');

        if ($date_start != '' &&  $date_end != '') {
            $date_sql = "dcs_checkin.che_date_time_in between '" . $date_start . "' AND '" . $date_end . "'";
        } else {
            $date_sql = true;
        }

        $data['arr_data_dashboard'] = $this->dcmd->get_data_dashboard_event_cat_admin($date_sql);
        $data['arr_data_dashboard'] = $this->dcmd->get_data_dashboard_event_cat_admin($date_sql);

        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    /* get_data_chrt_event_cat
    * get data chart dashboard and return data JSON 
    * @input
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-12-10
    * @Update Date -
    */
    function get_data_chart_event_per()
    {
        $this->load->model('DCS_model', 'dcmd');

        $date_start = $this->input->post('date_first'); // รับค่าที่userกรอกไป input
        $date_end = $this->input->post('date_secon');

        if ($date_start != '' &&  $date_end != '') {
            $date_sql = "dcs_checkin.che_date_time_in between '" . $date_start . "' AND '" . $date_end . "'";
        } else {
            $date_sql = true;
        }

        $data['arr_data_dashboard'] = $this->dcmd->get_data_dashboard_event_per_admin($date_sql);

        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }


    /*
    * get_data_chart_event_cat
    * get data chart dashboard and return data JSON
    * @input
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-12-10
    * @Update Date -
    */
    function get_data_chart_event()
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

        $data['name_cat'] =  $this->dcmd->get_data_event_name_cat($date_sql);

        for ($i = 0; $i < count($data['name_cat']); $i++) {
            // var_dump( $data['name_cat'][$i]->eve_cat_name);
            $data_json[$i]['name'] =  $data['name_cat'][$i]->eve_cat_name;
            $data_json[$i]['id'] =  $data['name_cat'][$i]->eve_cat_id;
            $data_json[$i]['data'] =  $this->dcmd->get_data_dashboard_event_admin($date_sql, $data['name_cat'][$i]->eve_cat_id);

            //  var_dump($data_json);
        }


        //var_dump($data_json);
        echo json_encode($data_json);
    }
}