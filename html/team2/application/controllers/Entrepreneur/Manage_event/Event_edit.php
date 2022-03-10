<?php
/*
* Event_list
* Manage list event by entrepreneur
* @author Acharaporn pornpattansap
* @Create Date 2564-09-16
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';
class Event_edit extends DCS_controller
{
    /*
    * show_edit_event
    * show display edit event
    * @input eve_id
    * @output -
    * @author Acaharaporn pornpattanasap 62160344 
    * @Create Date 2564-09-25
    * @Update Date -
    */
    public function show_edit_event($eve_id)
    {
        $this->load->model('Event/M_dcs_event', 'meve');
        $this->load->model('Event/M_dcs_eve_category', 'mcat');
        $this->load->model('Company/M_dcs_company', 'mcom');
        $this->load->model('Province/M_dcs_province', 'mprv');
        $this->meve->eve_id = $eve_id;
        $this->mcat->eve_cat_id = $eve_id;
        $this->mcom->com_ent_id = $this->session->userdata("entrepreneur_id");
        $data['arr_event'] = $this->meve->get_by_detail()->result();
        $data['arr_category'] = $this->mcat->get_all()->result();
        $data['arr_company'] = $this->mcom->get_by_ent_id_approve()->result();
        $data['arr_province'] = $this->mprv->get_all()->result();
        date_default_timezone_set('Asia/Bangkok');
        $data['date_now'] = date("Y-m-d");
        $view = 'entrepreneur/manage_event/v_edit_event';
        $this->output_entrepreneur($view, $data);
    }

    /*
    * edit_event
    * edit event
    * @input eve_name, eve_description, eve_com_id, eve_id, new_img, com_id, del_old_img, del_new_img, eve_start_date, eve_end_date, eve_location, eve_lat, eve_lon, par_id
    * @output -
    * @author Acaharaporn pornpattanasap 62160344 
    * @Create Date 2564-09-25
    * @Update Date -
    */
    public function edit_event()
    {
        // print_r($this->input->post());
        $this->load->model('Event/M_dcs_eve_image', 'mimg');
        $this->load->model('Event/M_dcs_event', 'meve');

        $this->meve->eve_name = $this->input->post('eve_name');
        $this->meve->eve_description = $this->input->post('eve_description');
        $this->meve->eve_com_id = $this->input->post('eve_com_id');
        $this->meve->eve_cat_id = $this->input->post('eve_cat_id');

        $this->meve->eve_start_date = $this->input->post('eve_start_date');
        $this->meve->eve_end_date = $this->input->post('eve_end_date');
        $this->meve->eve_location = $this->input->post('eve_location');

        $this->meve->eve_id = $this->input->post('eve_id');

        $this->meve->eve_lat = $this->input->post('eve_lat');
        $this->meve->eve_lon = $this->input->post('eve_lon');
        $this->meve->eve_par_id = $this->input->post('par_id');
        $this->meve->eve_status = 1;

        // save data company to database
        $this->meve->update_event();
        $this->set_session_edit_event('success');
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

        redirect('Entrepreneur/Manage_event/Event_list/show_list_event');
    }

    /*
    * set_session_edit_event
    * edit session error_edit_event
    * @input $data
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
    * delete_event
    * update eve_status = 4 in database
    * @input eve_id
    * @output -
    * @author Thanchanok Thongjumroon 62160089
    * @Create Date 2564-09-25
    */
    public function delete_event()
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
}