<?php
/*
* Promotion_exchange
* update reward data
* @author Thanisorn Thumsawanit 62160088
* @Create Date 2564-12-21
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';
class Promotion_exchange extends DCS_controller
{
    /*
    * update_reward
    * update_reward 
    * @input 
    * @output -
    * @author Thanisorn Thumsawanit 62160088
    * @Create Date 2564-12-21
    * @Update Date -
    */
    public function update_reward()
    {

        $this->load->model('Promotions/M_dcs_pro_image', 'mimg');
        $this->load->model('Promotions/M_dcs_promotions', 'mpro');
        $this->mpro->pro_name = $this->input->post('pro_name');
        $this->mpro->pro_description = $this->input->post('pro_description');
        $this->mpro->pro_status = 1;
        $this->mpro->pro_start_date = $this->input->post('pro_start_date');
        $this->mpro->pro_end_date = $this->input->post('pro_end_date');
        $this->mpro->pro_com_id = $this->input->post('pro_com_id');
        $this->mpro->pro_cat_id = $this->input->post('pro_cat_id');
        if($this->input->post('pro_cat_id') == 1){
            $this->mpro->pro_point = 0;
        }else{
            $this->mpro->pro_point = $this->input->post('pro_point');
        }
        $this->mpro->pro_id = $this->input->post('pro_id');

        // save data company to database
        $this->mpro->update_promotions();
        $this->set_session_update_reward('success');
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
                    array_push($arr_img_delete, $arr_img_delete[$i]);
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

        //redirect('Entrepreneur/Manage_promotion/Promotion_list/show_list_promotion');
    }

    /*
    * set_session_update_reward
    * edit session 
    * @input $data
    * @output -
    * @author Thanisorn Thumsawanit 62160088
    * @Create Date 2564-12-21
    * @Update Date -
    */
    public function set_session_update_reward($data)
    {
        $this->session->set_userdata("error_edit_promotion", $data);
    }

}