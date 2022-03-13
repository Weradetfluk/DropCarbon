<?php
/*
* Admin_add_event
* add event admin class
* @author weradet nopsombun 62160110
* @Create Date 2564-12-06
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';
class Admin_add_event extends DCS_controller
{
    /*
      * @author Nantasiri Saiwaew 62160093
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->library('email');
    }

    /*
    * show_add_event_admin
    * show form add event
    * @input -
    * @output -
    * @author Nantasiri Saiwaew 62160093
    * @Create Date 2564-12-14
    * @Update Date -
    */
    public function show_add_event_admin()
    {
        $this->load->model('Event/M_dcs_eve_category', 'mcat');
        $this->load->model('Company/M_dcs_company', 'mcom');
        $this->load->model('Province/M_dcs_province', 'mprv');
        $data['arr_admin'] = $this->session->userdata("admin_name"); //เช็คชื่อของผู้ดูแลระบบ
        $data['arr_category'] = $this->mcat->get_all()->result();
        $data['arr_company'] = $this->mcom->get_by_com_approve()->result();
        $data['arr_province'] = $this->mprv->get_all()->result();
        date_default_timezone_set('Asia/Bangkok'); //กำหนดไทม์โซน
        $data['date_now'] = date("Y-m-d");
        $view = 'admin/manage_event/manage_add_event_admin/v_add_event_admin'; //path แสดงหน้าจอเพิ่มกิจกรรมของผู้ดูแลระบบ
        $this->output_admin($view, $data, null);
    }

    /*
    * add_event_admin
    * add event by admin
    * @input eve_name, eve_point, eve_description, eve_com_id, eve_cat_id, eve_location, eve_add_date, eve_start_date, eve_end_date, eve_lat, eve_lon, par_id, new_img, name_new_image, del_new_img
    * @output -
    * @author Nantasiri Saiwaew 62160093
    * @Create Date 2564-12-14
    * @Update Date -
    */
    public function add_event_admin()
    {
        $this->load->model('Event/M_dcs_event', 'meve');
        $this->load->model('Event/M_dcs_eve_image', 'mimg');
        $this->meve->eve_name = $this->input->post('eve_name');
        $this->meve->eve_point = $this->input->post('eve_point');
        $this->meve->eve_description = $this->input->post('eve_description');
        $this->meve->eve_com_id = $this->input->post('eve_com_id');
        $this->meve->eve_cat_id = $this->input->post('eve_cat_id');
        $this->meve->eve_status = 2;
        $this->meve->eve_location = $this->input->post('eve_location');
        $this->meve->eve_add_date = $this->input->post('eve_add_date');
        $this->meve->eve_start_date = $this->input->post('eve_start_date');
        $this->meve->eve_end_date = $this->input->post('eve_end_date');
        $this->meve->eve_lat = $this->input->post('eve_lat');
        $this->meve->eve_lon = $this->input->post('eve_lon');
        $this->meve->eve_par_id = $this->input->post('par_id');
        $this->meve->eve_adm_id = $this->session->userdata("admin_id");

        $this->meve->insert_event_by_admin(); 
        $this->set_session_add_event('success');
        $result = $this->meve->get_by_name_by_admin()->row();


        // save data image to database
        $arr_img_add = array();
        $arr_name_name = array();
        $arr_img_add = $this->input->post('new_img');
        $arr_name_name = $this->input->post('name_new_image');
        $this->mimg->eve_img_eve_id = $result->eve_id;
        for ($i = 0; $i < count($arr_img_add); $i++) {
            $this->mimg->eve_img_path = $arr_img_add[$i];
            $this->mimg->eve_img_name = $arr_name_name[$i];
            $this->mimg->insert_image_event();
        }

        // delete data image to database
        $arr_img_delete = array();
        $arr_img_delete = $this->input->post('del_new_img');
        if ($arr_img_delete != '') {
            for ($i = 0; $i < count($arr_img_delete); $i++) {
                $this->mimg->eve_img_path = $arr_img_delete[$i];
                unlink('./image_event/' . $arr_img_delete[$i]);
                $this->mimg->delete_image_event();
            }
        }

        redirect('Admin/Manage_event/Admin_list_event/show_data_event_list');
    }

    /*
    * set_session_add_event
    * add session error_add_event_admin
    * @input data
    * @output -
    * @author Priyarat Bumrungkit 62160156
    * @Create Date 2564-09-25
    * @Update Date -
    */
    public function set_session_add_event($data)
    {
        $this->session->set_userdata("error_add_event_admin", $data);
    }

    /*
    * upload_image_ajax
    * upload image
    * @input eve_file
    * @output -
    * @author Acaharaporn pornpattanasap 62160344
    * @Create Date 2564-09-25
    * @Update Date 2564-09-26
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

        $file = $_FILES['eve_file'] ?? '';
        $file_name = $_FILES['eve_file']['name'] ?? '';
        $file_tmp_name = $_FILES['eve_file']['tmp_name'] ?? '';
        $file_size = $_FILES['eve_file']['size'] ?? '';
        $file_error = $_FILES['eve_file']['error'] ?? '';

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
                $file_destination[$i] = './image_event/' . $file_new_name[$i] . '.' . $file_actaul_ext[$i];
                move_uploaded_file($file_tmp_name[$i], $file_destination[$i]);
                // $this->mimg->com_img_path = $file_new_name[$i] . '.' . $file_actaul_ext[$i];
                $path = base_url() . 'image_event/' . $file_new_name[$i] . '.' . $file_actaul_ext[$i];
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
    * uplink image when cancel edit and add event
    * @input arr_img
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-09-29
    * @Update Date -
    */
    public function uplink_image_ajax()
    {
        // print_r($this->input->post('arr_image'));
        $data = "";
        if ($this->input->post('arr_image') != NULL) {
            $arr_image = $this->input->post('arr_image');
            for ($i = 0; $i < count($arr_image); $i++) {
                unlink('./image_event/' . $arr_image[$i]);
            }
            $data = "success";
        } else {
            $data = "no image";
        }
        echo json_encode($data);
    }

    /*
     * check_name_event_ajax
     * check name event by ajax
     * @input eve_name
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
            // have name company
            echo 1;
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

    /*
    * get_data_category
    * get data event category
    * @input -
    * @output -
    * @author weradet nopsombun 62160110 
    * @Create Date 2021-11-06
    * @Update Date -
    */
    public function get_data_category()
    {
        $this->load->model('Event/M_dcs_eve_category', 'meca');
        $data['data_eve_cat'] = $this->meca->get_all()->result();
        echo json_encode($data);
    }
}
