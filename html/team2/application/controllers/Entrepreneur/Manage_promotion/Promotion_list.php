<?php
/*
* Promotion_list
* Manage list promotion by entrepreneur
* @author Suwapat Saowarod 62160340
* @Create Date 2564-10-02
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';
class Promotion_list extends DCS_controller
{
    /*
    * show_list_promotion
    * show list promotion by id in database
    * @input -
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-10-02
    * @Update Date -
    */
    public function show_list_promotion(){
        if (!isset($_SESSION['tab_number_promotion'])) {
            $_SESSION['tab_number_promotion'] = 1;
        }
        $this->load->helper('mydate_helper.php');
        $this->load->model('Promotions/M_dcs_promotions', 'mpro');
        $data['arr_promotion'] = $this->mpro->get_promotion_by_ent_id($this->session->userdata("entrepreneur_id"))->result();
        date_default_timezone_set('Asia/Bangkok');
        $data['date_now'] = date("Y-m-d");
        $view = 'entrepreneur/manage_promotion/v_list_promotion';
        $_SESSION['tab_number_entrepreneur'] = 3;
        $this->output_entrepreneur($view, $data);
    }

    /*
    * change_tab_promotion_ajax
    * change tab session tab_number_promotion
    * @input tab_promotion
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-09-17
    * @Update Date -
    */
    public function change_tab_promotion_ajax()
    {
        $_SESSION['tab_number_promotion'] = $this->input->post('tab_promotion');
        echo $this->input->post('tab_promotion');
    }
}