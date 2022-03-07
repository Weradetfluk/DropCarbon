<?php
/*
* Register_entrepreneur
* Manage register for entrepreneur
* @author Priyarat Bumrungkit 62160156
* @Create Date 2564-07-18
*/
defined('BASEPATH') OR exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';

class Register_entrepreneur extends DCS_controller {
    /*
    * @author Priyarat Bumrungkit 62160156
    */
    public function __construct() {
        parent::__construct();
    }
    
    /*
    * show_regis_ent
    * show form register entrepreneur
    * @input -
    * @output -
    * @author Priyarat Bumrungkit 62160156
    * @Create Date 2564-07-18
    * @Update Date 2564-08-05
    */
    public function show_regis_ent() {
        $this->session->unset_userdata("doc_path");
        date_default_timezone_set('Asia/Bangkok');
        $data['year_now'] = date("Y");
        $this->load->model('Entrepreneur/M_dcs_entrepreneur', 'ment');
        $data['arr_prefix'] = $this->ment->get_entrepreneur_prefix()->result();
        $this->output_tourist('entrepreneur/auth/v_regis_entrepreneur', $data, 'template/Tourist/topbar_tourist');
    }

    /*
    * insert_ent
    * insert entrepreneur to database
    * @input ent_pre_id, ent_firstname, ent_lastname, ent_tel, ent_id_card, ent_email, ent_username, ent_password, ent_birth_year, ent_birth_month, ent_birth_date, new_img, name_new_image, del_new_img
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-07-18
    * @Update Date 2564-08-05
    */
	public function insert_ent() {
        $this->load->model('Entrepreneur/M_dcs_entrepreneur', 'ment');
        $this->load->model('Document/M_dcs_document', 'mdoc');
        $this->ment->ent_pre_id = intval($this->input->post('ent_pre_id'));
        $this->ment->ent_firstname = $this->input->post('ent_firstname');
        $this->ment->ent_lastname = $this->input->post('ent_lastname');
        $this->ment->ent_tel = $this->input->post('ent_tel');
        $this->ment->ent_id_card = $this->input->post('ent_id_card');
        $this->ment->ent_email = $this->input->post('ent_email');
        $this->ment->ent_username = $this->input->post('ent_username');
        $this->ment->ent_password = md5($this->input->post('ent_password'));
        $this->ment->ent_status = 1;

        $this->ment->ent_birthdate = $this->input->post('ent_birth_year').'-'.$this->input->post('ent_birth_month').'-'.$this->input->post('ent_birth_date');

        $this->ment->insert_entrepreneur();
        $this->session->set_userdata("error_register_entrepreneur", "success");
        $result = $this->ment->check_username()->row();
        
        
        // save data image to database
        $arr_img_add = array();
        $arr_name_name = array();
        $arr_img_add = $this->input->post('new_img');
        $arr_name_name = $this->input->post('name_new_image');
        $this->mdoc->doc_ent_id = $result->ent_id;
        for ($i = 0; $i < count($arr_img_add); $i++) {
            $this->mdoc->doc_path = $arr_img_add[$i];
            $this->mdoc->doc_name = $arr_name_name[$i];
            $this->mdoc->insert_document();
        }

        // delete data image to database
        $arr_img_delete = array();
        $arr_img_delete= $this->input->post('del_new_img');
        if($arr_img_delete != ''){
            for ($i = 0; $i < count($arr_img_delete); $i++) {
                $this->mdoc->doc_path = $arr_img_delete[$i];
                unlink('./document_file_entrepreneur/' . $arr_img_delete[$i]);
                $this->mdoc->delete_document();
            }
        }
        redirect('DCS_controller');
    }

    /*
    * check_username_entrepreneur_ajax
    * check username entrepreneur in database
    * @input ent_username
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-08-18
    * @Update Date -
    */
    public function check_username_entrepreneur_ajax(){
        $this->load->model('Entrepreneur/M_dcs_entrepreneur', 'ment');
        $this->ment->ent_username = $this->input->post('ent_username');
        $result = $this->ment->check_username()->row(); //function in model
        if ($result) {
            echo 1;
        } else{
            echo 2;
        }
    }

    /*
     * upload_file_ajax
     * upload file for entrepreneur
     * @input document_ent
     * @output -
     * @author Suwapat Saowarod 62160340
     * @Create Date 2564-09-23
     * @Update -
     */
    public function upload_file_ajax(){
        $file_name = array();
        $file_tmp_name = array();
        $file_size = array();
        $file_error = array();
        $file_ext = array();
        $file_actaul_ext = array();
        $error_file = '';

        // Configure file storage

        $file = $_FILES['document_ent'] ?? '';
        $file_name = $_FILES['document_ent']['name'] ?? '';
        $file_tmp_name = $_FILES['document_ent']['tmp_name'] ?? '';
        $file_size = $_FILES['document_ent']['size'] ?? '';
        $file_error = $_FILES['document_ent']['error'] ?? '';
        if($file != ''){
            for ($i = 0; $i < count($file_name); $i++) {
                $file_ext[$i] = explode('.', $file_name[$i]);
                $file_actaul_ext[$i] = strtolower(end($file_ext[$i]));

                // Check if there is a problem with the image file. or the file size exceeds 1000000?
                if ($file_error[$i] != 0 || $file_size[$i] >= 3000000) {
                    $error_file = 'false';
                    break;
                }
            }
        }else { 
            $error_file = 'false';
        }

        $output_image = '';
        if ($error_file != 'false') {
            // Loop to upload files
            for ($i = 0; $i < count($file_name); $i++) {
                $file_new_name[$i] = uniqid('', true);
                $file_destination[$i] = './document_file_entrepreneur/' . $file_new_name[$i] . '.' . $file_actaul_ext[$i];
                move_uploaded_file($file_tmp_name[$i], $file_destination[$i]);
                // $this->mdoc->com_img_path = $file_new_name[$i] . '.' . $file_actaul_ext[$i];
                if($file_actaul_ext[$i] != 'pdf'){
                    $path = base_url() . 'document_file_entrepreneur/' . $file_new_name[$i] . '.' . $file_actaul_ext[$i];
                    $output_image .= '<div id="' . $file_new_name[$i] . '">
                                        <div class="image_container d-flex justify-content-center position-relative" style="border-radius: 7px; width: 200px; height:200px">
                                        <img src="' . $path . '" alt="Image"><span class="position-absolute" style="font-size: 25px;" 
                                        onclick="unlink_new_image(\'' . $file_new_name[$i] . '.' . $file_actaul_ext[$i] . '\')">&times;
                                        </span><input type="text" value="' . $file_new_name[$i] . '.' . $file_actaul_ext[$i] . '" name="new_img[]" 
                                        id="' . $file_new_name[$i] . '_img" hidden><input type="text" value="' . $file_name[$i] . '" name="name_new_image[]" hidden></div>
                                    </div>';
                }else{
                    $path = base_url() . '/assets/templete/picture/pdf.png';
                    $output_image .= '<div id="' . $file_new_name[$i] . '">
                                            <div class="image_container d-flex justify-content-center position-relative" style="border-radius: 7px; width: 200px; height:200px">
                                            <img src="' . $path . '" alt="Image"><span class="position-absolute" style="font-size: 25px;" 
                                            onclick="unlink_new_image(\'' . $file_new_name[$i] . '.' . $file_actaul_ext[$i] . '\')">&times;
                                            </span><input type="text" value="' . $file_new_name[$i] . '.' . $file_actaul_ext[$i] . '" name="new_img[]" 
                                            id="' . $file_new_name[$i] . '_img" hidden><input type="text" value="' . $file_name[$i] . '" name="name_new_image[]" hidden></div><center>' . $file_name[$i] . '
                                    </center></div>';
                }
            }
        } else {
            $output_image .= 'error';
        }
        echo json_encode($output_image);
    }

     /*
    * uplink_image_ajax
    * uplink image when cancel register entrepreneur
    * @input arr_file
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-09-24
    * @Update Date -
    */
    public function uplink_image_ajax(){
        // print_r($this->input->post('arr_image'));
        $data = "";
        if($this->input->post('arr_file') != NULL){
            $arr_file = $this->input->post('arr_file');
            for($i = 0; $i < count($arr_file); $i++){
                unlink('./document_file_entrepreneur/' . $arr_file[$i]);
            }
            $data = "success";
        }else{
            $data = "no image";
        }
        echo json_encode($data);
    }

    /*
    * check_email_entrepreneur_ajax
    * output check email entrepreneur
    * @input ent_email
    * @output -
    * @author Priyarat Bumrungkit 62160156
    * @Create Date 2564-10-25
    * @Update Date 2564-10-26
    */
    public function check_email_entrepreneur_ajax()
    {
        $this->load->model('Entrepreneur/M_dcs_entrepreneur', 'ment');
        $this->ment->ent_email = $this->input->post('ent_email');
        $result = $this->ment->check_email()->row(); //function in model
        if ($result) {
            echo 1;
        } else{
            echo 2;
        }
    }

    /*
    * check_phone_number_entrepreneur_ajax
    * output check phone number entrepreneur
    * @input ent_tel
    * @output -
    * @author Priyarat Bumrungkit 62160156
    * @Create Date 2564-09-20
    * @Update Date 2564-09-20
    */
    public function check_phone_number_entrepreneur_ajax()
    {
        $this->load->model('Entrepreneur/M_dcs_entrepreneur', 'ment');
        $this->ment->ent_tel = $this->input->post('ent_tel');

        $result = $this->ment->check_phone_number()->row(); //function in model

        if ($result) {
            echo 1;
        } else {
            echo 2;
        }
    }

    /*
    * check_id_card_entrepreneur_ajax
    * output check id_card
    * @input ent_id_card
    * @output -
    * @author Priyarat Bumrungkit 62160156
    * @Create Date 2564-09-20
    * @Update Date 2564-09-20
    */
    public function check_id_card_entrepreneur_ajax()
    {
        $this->load->model('Entrepreneur/M_dcs_entrepreneur', 'ment');
        $this->ment->ent_id_card = $this->input->post('ent_id_card');

        $result = $this->ment->check_id_card()->row(); //function in model

        if ($result) {
            echo 1;
        } else {
            echo 2;
        }
    }
}