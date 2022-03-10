<?php
/*
* Admin_edit_event
* Manage list edit event by admin
* @author Nantasiri Saiwaew 62160093
* @Create Date 2564-12-19
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';
class Admin_edit_event extends DCS_controller
{
    /*
    * show_edit_event_by_admin
    * show display edit event
    * @input eve_id
    * @output -
    * @author Nantasiri Saiwaew 62160093
    * @Create Date 2564-12-21
    * @Update Date -
    */
    public function show_edit_event_by_admin($eve_id)
    {
        $this->load->model('Event/M_dcs_event', 'meve');
        $this->load->model('Event/M_dcs_eve_category', 'mcat');
        $this->load->model('Company/M_dcs_company', 'mcom');
        $this->load->model('Province/M_dcs_province', 'mprv');
        $this->meve->eve_id = $eve_id;
        $this->mcat->eve_cat_id = $eve_id;
        $data['arr_admin'] = $this->session->userdata("admin_name");
        $data['arr_event'] = $this->meve->get_by_detail()->result();
        $data['arr_category'] = $this->mcat->get_all()->result();
        $data['arr_company'] = $this->mcom->get_by_com_approve()->result();
        $data['arr_province'] = $this->mprv->get_all()->result();
        date_default_timezone_set('Asia/Bangkok');
        $data['date_now'] = date("Y-m-d");
        $view = 'admin/manage_event/manage_add_event_admin/v_edit_event_admin';
        $this->output_admin($view, $data, null);
    }

    /*
    * edit_event_by_admin
    * edit event by admin
    * @input eve_id, eve_name, eve_point, eve_description, eve_com_id, eve_cat_id, eve_start_date, eve_end_date, eve_location, eve_lat, eve_lon, par_id, new_img, com_id, del_old_img, del_new_img
    * @output -
    * @author Nantasiri Saiwaew 62160093 
    * @Create Date 2564-12-21
    * @Update Date -
    */
    public function edit_event_by_admin()
    {

        $this->load->model('Event/M_dcs_eve_image', 'mimg');
        $this->load->model('Event/M_dcs_event', 'meve');

        $this->meve->eve_name = $this->input->post('eve_name');
        $this->meve->eve_point = $this->input->post('eve_point');
        $this->meve->eve_description = $this->input->post('eve_description');
        $this->meve->eve_com_id = $this->input->post('eve_com_id');
        $this->meve->eve_cat_id = $this->input->post('eve_cat_id');

        $this->meve->eve_start_date = $this->input->post('eve_start_date');
        $this->meve->eve_end_date = $this->input->post('eve_end_date');
        $this->meve->eve_location = $this->input->post('eve_location');

        $this->meve->eve_id = $this->input->post('eve_id');

        $this->meve->eve_lat = $this->input->post('eve_lat');
        $this->meve->eve_lon = $this->input->post('eve_lon');
        $this->meve->eve_status = 2;
        $this->meve->eve_par_id = $this->input->post('par_id');
        $this->meve->eve_adm_id = $this->session->userdata("admin_id");

        // save data company to database
        $this->meve->update_event_by_admin();
        $this->set_session_edit_event('success_edit_admin');
        $this->mimg->eve_img_eve_id = $this->input->post('eve_id');

        // save data image to database
        $arr_img_add = array();
        $arr_img_add = $this->input->post('new_img');
        $arr_name_name = $this->input->post('name_new_image');
        $this->mimg->eve_img_eve_id = $this->input->post('eve_id');
        if ($arr_img_add != '') {
            for ($i = 0; $i < count($arr_img_add); $i++) {
                $this->mimg->eve_img_path = $arr_img_add[$i];
                $this->mimg->eve_img_name = $arr_name_name[$i];
                $this->mimg->insert_image_event();
            }
        }

        // delete data image to database
        $arr_img_delete_old = array();
        $arr_img_delete_old = $this->input->post('del_old_img');
        if ($arr_img_delete_old != '') {
            $arr_img_delete = $this->input->post('del_new_img');
            if ($arr_img_delete != '') {
                for ($i = 0; $i < count($arr_img_delete); $i++) {
                    array_push($arr_img_delete_old, $arr_img_delete[$i]);
                }
            }
        } else {
            $arr_img_delete_old = $this->input->post('del_new_img');
        }

        // print_r($arr_img_delete);
        if ($arr_img_delete_old != '') {
            for ($i = 0; $i < count($arr_img_delete_old); $i++) {
                $this->mimg->eve_img_path = $arr_img_delete_old[$i];
                unlink('./image_event/' . $arr_img_delete_old[$i]);
                $this->mimg->delete_image_event();
            }
        }

        redirect('Admin/Manage_event/Admin_list_event/show_data_event_list');
    }

    /*
    * set_session_edit_event
    * edit session error_edit_event
    * @input data
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-08-23
    * @Update Date -
    */
    public function set_session_edit_event($data)
    {
        $this->session->set_userdata("error_edit_event", $data);
    }

    /*
    * delete_event_by_admin
    * update eve_status = 4 in database
    * @input eve_id
    * @output -
    * @author Thanchanok Thongjumroon 62160089
    * @Create Date 2564-09-25
    */
    public function delete_event_by_admin()
    {
        $this->load->model('Event/M_dcs_event', 'meve');
        $this->meve->eve_id = $this->input->post('eve_id');
        $this->meve->delete_event();
    }

    /*
     * check_name_event_ajax
     * check name event by ajax
     * @input eve_name, eve_id
     * @output -
     * @author Suwapat Saowarod 62160340
     * @Create Date 2564-10-12
     * @Update -
     */
    function check_name_event_ajax()
    {
        $this->load->model('Event/M_dcs_event', 'meve');
        $this->meve->eve_name = $this->input->post('eve_name');
        $event = $this->meve->get_by_name()->row();
        if ($event) {
            if ($event->eve_id != $this->input->post('eve_id')) {
                // have name event
                echo 1;
            } else {
                // have name event but is old name           
                echo 2;
            }
        } else {
            echo 2;
        }
    }
    
    /* 
     * get_district_by_prv_id_ajax
     * get district by prv_id for ajax
     * @input prv_id
     * @output -
     * @author Suwapat Saowarod 62160340
     * @Create Date 2564-12-18
     * @Update -
     */
    function get_district_by_prv_id_ajax()
    {
        $this->load->model('District/M_dcs_district', 'mdis');
        $this->mdis->dis_prv_id = $this->input->post('prv_id');
        $data = $this->mdis->get_district_by_prv_id()->result();
        echo json_encode($data);
    }

    /* 
     * get_parish_by_dis_id_ajax
     * get parish by dis_id for ajax
     * @input dis_id
     * @output -
     * @author Suwapat Saowarod 62160340
     * @Create Date 2564-12-18
     * @Update -
     */
    function get_parish_by_dis_id_ajax()
    {
        $this->load->model('Parish/M_dcs_parish', 'mpar');
        $this->mpar->par_dis_id = $this->input->post('dis_id');
        $data = $this->mpar->get_parish_by_dis_id()->result();
        echo json_encode($data);
    }
}
