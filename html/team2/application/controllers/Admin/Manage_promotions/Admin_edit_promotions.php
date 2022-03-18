<?php
/*
* Admin_edit_promotions
* edit promotion admin class
* @author Kasama Donwong 62160074
* @Create Date 2564-12-23
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';
class Admin_edit_promotions extends DCS_controller
{
    /*
    * show_edit_promotion
    * show form edit promotion
    * @input pro_id
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-12-23
    * @Update Date -
    */
    public function show_edit_promotion($pro_id)
    {
        $this->load->model('Promotions/M_dcs_pro_category', 'mcat');
        $this->load->model('Company/M_dcs_company', 'mcom');
        $this->load->model('Promotions/M_dcs_promotions', 'mpro');
        $this->mcom->com_ent_id = $this->session->userdata("entrepreneur_id");
        $this->mpro->pro_id = $pro_id;
        $data['arr_category'] = $this->mcat->get_all()->result();
        $data['arr_company'] = $this->mcom->get_by_com_approve()->result();
        $data['arr_promotion'] = $this->mpro->get_by_detail()->result();
        $data['arr_admin'] = $this->session->userdata("admin_name");
        date_default_timezone_set('Asia/Bangkok');
        $data['date_now'] = date("Y-m-d");
        $view = 'admin/manage_promotions/manage_add_promo_admin/v_edit_promo_admin';
        $this->output_admin($view, $data, null);
    }

    /*
    * edit_promotion
    * edit promotion by admin 
    * @input pro_name, pro_description, pro_com_id, pro_id, new_img, com_id, del_old_img, del_new_img, pro_start_date, pro_end_date, pro_cat_id
    * @output -
    * @author Kasama Donwong 62160074
    * @Create Date 2564-12-23
    * @Update Date -
    */
    public function edit_promotion()
    {

        $this->load->model('Promotions/M_dcs_pro_image', 'mimg');
        $this->load->model('Promotions/M_dcs_promotions', 'mpro');
        $this->mpro->pro_name = $this->input->post('pro_name');
        $this->mpro->pro_description = $this->input->post('pro_description');
        $this->mpro->pro_status = 2;
        $this->mpro->pro_start_date = $this->input->post('pro_start_date');
        $this->mpro->pro_end_date = $this->input->post('pro_end_date');
        $this->mpro->pro_com_id = $this->input->post('pro_com_id');
        $this->mpro->pro_cat_id = $this->input->post('pro_cat_id');
        $this->mpro->pro_adm_id = $this->session->userdata("admin_id");
        if ($this->input->post('pro_cat_id') == 1) {
            $this->mpro->pro_point = 0;
        } else {
            $this->mpro->pro_point = $this->input->post('pro_point');
        }
        $this->mpro->pro_id = $this->input->post('pro_id');

        // save data company to database
        $this->mpro->update_promo_admin();
        $this->set_session_edit_promotion('success');
        $this->mimg->pro_img_pro_id = $this->input->post('pro_id');

        // save data image to database
        $arr_img_add = array();
        $arr_img_add = $this->input->post('new_img');
        $arr_name_name = $this->input->post('name_new_image');
        $this->mimg->pro_img_pro_id = $this->input->post('pro_id');
        if ($arr_img_add != '') {
            for ($i = 0; $i < count($arr_img_add); $i++) {
                $this->mimg->pro_img_path = $arr_img_add[$i];
                $this->mimg->pro_img_name = $arr_name_name[$i];
                $this->mimg->insert_image_promotions();
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
                $this->mimg->pro_img_path = $arr_img_delete_old[$i];
                unlink('./image_promotions/' . $arr_img_delete_old[$i]);
                $this->mimg->delete_image_promotions();
            }
        }
        redirect('Admin/Manage_promotions/Admin_list_promotions/show_data_promotions_list');
    }

    /*
    * set_session_edit_promotion
    * edit session error_edit_promotion_admin 
    * @input data
    * @output -
    * @author Kasama Donwong 62160074
    * @Create Date 2564-10-03
    * @Update Date -
    */
    public function set_session_edit_promotion($data)
    {
        $this->session->set_userdata("error_edit_promotion_admin", $data);
    }
}
