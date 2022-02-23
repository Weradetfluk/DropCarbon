<?php
/*
* Admin_manage_banner
* Admin_manage_banner
* @author weradet nopsombun 62160110
* @Create Date 2564-09-23
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';
class Admin_manage_banner extends DCS_controller
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
    * show page banner list
    * @input -
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-09-14
    * @Update Date -
    */
    public function index()
    {
        $this->show_banner_list();
    }

    /*
    * show_banner_list
    * show page manage banner
    * @input -
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-09-14
    * @Update Date -
    */
    public function show_banner_list()
    {
        $_SESSION['tab_number'] = 2; //set tab number in topbar_admin.php
        $this->output_admin('admin/manage_banner/v_list_banner', null, null);
    }
    /*
    * get_banner_list_ajax
    * get banner
    * @input -
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-09-14
    * @Update Date -
    */
    public function get_banner_list_ajax(){
        $this->load->model('Banner/M_dcs_banner', 'mmbn');
        $data['data_banner_json'] = $this->mmbn->get_all()->result();
        $data['json_message'] = 'success: get_banner_list_ajax';

        echo json_encode($data);
    }

    /*
    * insert_banner_ajax
    * insert data banner
    * @input file, file_name, file_tmp_name, file_size, file_error
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-09-14
    * @Update Date -
    */

    public function insert_banner_ajax()
    {
        $this->load->model('Banner/M_dcs_banner', 'mmbn');
        // Create file storage variables
        $error_file = '';

        // Configure file storage
        $file = $_FILES['file'] ?? '';
        $file_name = $_FILES['file']['name'] ?? '';
        $file_tmp_name = $_FILES['file']['tmp_name'] ?? '';
        $file_size = $_FILES['file']['size'] ?? '';
        $file_error = $_FILES['file']['error'] ?? '';

        if ($file != '') {
            $file_ext = explode('.', $file_name);
            $file_actaul_ext = strtolower(end($file_ext));

            if ($file_error != 0 || $file_size >= 3000000) {
                $error_file = 'false';
            }
        } else {
            $error_file = 'false';
        }
        // Check if there is a problem with the image file. or the file size exceeds 1000000?

        if ($error_file != 'false') {

            $file_new_name = uniqid('', true);
            $file_destination = './banner/' . $file_new_name . '.' . $file_actaul_ext;
            move_uploaded_file($file_tmp_name, $file_destination);
            $this->mmbn->ban_path = $file_new_name . '.' . $file_actaul_ext;
            $this->mmbn->ban_name = $file_name;
            $this->mmbn->ban_adm_id =  $this->session->userdata("admin_id");
            $this->mmbn->insert_banner();
            echo 1;
        } else if ($error_file == 'false') {
            echo 2;
        }
    }

    /*
    * delete_banner_ajax
    * delete banner
    * @input img_path
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-09-14
    * @Update Date -
    */

    public function delete_banner_ajax()
    {
        $this->load->model('Banner/M_dcs_banner', 'mmbn');
        $this->mmbn->ban_path = $this->input->post("img_path");
        $this->mmbn->delete_banner();
        unlink('./banner/' . $this->mmbn->ban_path );
    }

}
