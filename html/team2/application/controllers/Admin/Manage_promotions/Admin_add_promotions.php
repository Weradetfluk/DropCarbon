<?php
/*
* Admin_add_promotions
* list promotions admin class
* @author Kasama Donwong 62160074
* @Create Date 2564-12-06
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';
class Admin_add_promotions extends DCS_controller
{
    /*
     * @author Kasama Donwong 62160074
    */
    public function __construct()
    {
        parent::__construct();
    }

    /*
    * show_add_promotion
    * show form add promotion
    * @input entrepreneur_id
    * @output -
    * @author Kasama Donwong 62160074
    * @Create Date 2564-12-14
    * @Update Date -
    */
    public function show_add_promotion()
    {
        $this->load->model('Promotions/M_dcs_pro_category', 'mcat');
        $this->load->model('Company/M_dcs_company', 'mcom');
        $this->mcom->com_ent_id = $this->session->userdata("entrepreneur_id");
        $data['arr_category'] = $this->mcat->get_all()->result();
        $data['arr_company'] = $this->mcom->get_by_com_approve()->result();
        $data['arr_admin'] = $this->session->userdata("admin_name");
        date_default_timezone_set('Asia/Bangkok');
        $data['date_now'] = date("Y-m-d");
        $view = 'admin/manage_promotions/manage_add_promo_admin/v_add_promo_admin';
        $this->output_admin($view, $data, null);
    }

    /*
    * add_promotion
    * add promotion to database
    * @input pro_name, pro_description, pro_status, pro_start_date, pro_end_date, pro_point, pro_adm_id, pro_com_id, pro_cat_id, new_img, name_new_image, del_new_img
    * @output -
    * @author Kasama Donwong 62160074
    * @Create Date 2564-12-14
    * @Update Date -
    */
    public function add_promotion()
    {
        $this->load->model('Promotions/M_dcs_promotions', 'mpro');
        $this->load->model('Promotions/M_dcs_pro_image', 'mimg');
        $this->mpro->pro_name = $this->input->post('pro_name');
        if ($this->input->post('pro_cat_id') == 1) {
            $this->mpro->pro_point = 0;
        } else {
            $this->mpro->pro_point = $this->input->post('pro_point');
        }
        $this->mpro->pro_description = $this->input->post('pro_description');
        $this->mpro->pro_status = 2;
        $this->mpro->pro_start_date = $this->input->post('pro_start_date');
        $this->mpro->pro_end_date = $this->input->post('pro_end_date');
        $this->mpro->pro_com_id = $this->input->post('pro_com_id');
        $this->mpro->pro_cat_id = $this->input->post('pro_cat_id');
        $this->mpro->pro_adm_id = $this->session->userdata("admin_id");

        $this->mpro->insert_promo_admin();
        $this->set_session_add_promotion('success');
        $result = $this->mpro->get_by_name()->row();

        // save data image to database
        $arr_img_add = array();
        $arr_name_name = array();
        $arr_img_add = $this->input->post('new_img');
        $arr_name_name = $this->input->post('name_new_image');
        $this->mimg->pro_img_pro_id = $result->pro_id;
        for ($i = 0; $i < count($arr_img_add); $i++) {
            $this->mimg->pro_img_path = $arr_img_add[$i];
            $this->mimg->pro_img_name = $arr_name_name[$i];
            $this->mimg->insert_image_promotions();
        }

        // delete data image to database
        $arr_img_delete = array();
        $arr_img_delete = $this->input->post('del_new_img');
        if ($arr_img_delete != '') {
            for ($i = 0; $i < count($arr_img_delete); $i++) {
                $this->mimg->pro_img_path = $arr_img_delete[$i];
                unlink('./image_promotions/' . $arr_img_delete[$i]);
                $this->mimg->delete_image_promotions();
            }
        }

        redirect('Admin/Manage_promotions/Admin_list_promotions/show_data_promotions_list');
    }

    /*
    * set_session_add_promotion
    * add sessio error_add_promotion_admin
    * @input data
    * @output -
    * @author Kasama Donwong 62160074
    * @Create Date 2564-12-14
    * @Update Date -
    */
    public function set_session_add_promotion($data)
    {
        $this->session->set_userdata("error_add_promotion_admin", $data);
    }

    /*
    * upload_image_ajax
    * upload image promotions
    * @input pro_file
    * @output -
    * @author Kasama Donwong 62160074
    * @Create Date 2564-12-14
    * @Update Date -
    */
    public function upload_image_ajax()
    {
        $file_name = array();
        $file_tmp_name = array();
        $file_size = array();
        $file_error = array();
        $file_ext = array();
        $file_actaul_ext = array();
        $error_file = '';

        // Configure file storage

        $file = $_FILES['pro_file'] ?? '';
        $file_name = $_FILES['pro_file']['name'] ?? '';
        $file_tmp_name = $_FILES['pro_file']['tmp_name'] ?? '';
        $file_size = $_FILES['pro_file']['size'] ?? '';
        $file_error = $_FILES['pro_file']['error'] ?? '';

        if ($file != '') {
            for ($i = 0; $i < count($file_name); $i++) {
                $file_ext[$i] = explode('.', $file_name[$i]);
                $file_actaul_ext[$i] = strtolower(end($file_ext[$i]));

                // Check if there is a problem with the image file. or the file size exceeds 1000000?
                if ($file_error[$i] != 0 || $file_size[$i] >= 3000000) {
                    $error_file = 'false';
                    break;
                }
            }
        } else {
            $error_file = 'false';
        }

        $output_image = '';
        if ($error_file != 'false') {
            // Loop to upload files
            for ($i = 0; $i < count($file_name); $i++) {
                $file_new_name[$i] = uniqid('', true);
                $file_destination[$i] = './image_promotions/' . $file_new_name[$i] . '.' . $file_actaul_ext[$i];
                move_uploaded_file($file_tmp_name[$i], $file_destination[$i]);
                // $this->mimg->com_img_path = $file_new_name[$i] . '.' . $file_actaul_ext[$i];
                $path = base_url() . 'image_promotions/' . $file_new_name[$i] . '.' . $file_actaul_ext[$i];
                $output_image .= '<div id="' . $file_new_name[$i] . '">
                                        <div class="image_container d-flex justify-content-center position-relative" style="border-radius: 7px; width: 200px; height:200px">
                                        <img src="' . $path . '" alt="Image"><span class="position-absolute" style="font-size: 25px;" 
                                        onclick="unlink_new_image(\'' . $file_new_name[$i] . '.' . $file_actaul_ext[$i] . '\')">&times;
                                        </span><input type="text" value="' . $file_new_name[$i] . '.' . $file_actaul_ext[$i] . '" name="new_img[]" 
                                        id="' . $file_new_name[$i] . '_img" hidden><input type="text" value="' . $file_name[$i] . '" name="name_new_image[]" hidden></div>
                                  </div>';
            }
        } else {
            $output_image .= 'error';
        }
        echo json_encode($output_image);
    }

    /*
    * uplink_image_ajax
    * uplink image when cancel edit and add promotion
    * @input arr_img
    * @output -
    * @author Kasama Donwong 62160074
    * @Create Date 2564-12-14
    * @Update Date -
    */
    public function uplink_image_ajax()
    {
        // print_r($this->input->post('arr_image'));
        $data = "";
        if ($this->input->post('arr_image') != NULL) {
            $arr_image = $this->input->post('arr_image');
            for ($i = 0; $i < count($arr_image); $i++) {
                unlink('./image_promotions/' . $arr_image[$i]);
            }
            $data = "success";
        } else {
            $data = "no image";
        }
        echo json_encode($data);
    }
}
