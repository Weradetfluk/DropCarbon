<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';

/*
* Register_entrepreneur
* Manage register for entrepreneur
* @author Priyarat Bumrungkit 62160156
* @Create Date 2564-07-18
*/

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
    * @input 
    * @output -
    * @author Priyarat Bumrungkit 62160156
    * @Create Date 2564-07-18
    * @Update Date 2564-08-05
    */
    public function show_regis_ent() {
        $this->output_regis('entrepreneur/auth/v_regis_entrepreneur');
    }

    /*
    * insert_ent
    * insert entrepreneur to database
    * @input ent_pre_id, ent_firstname, ent_lastname, ent_tel, ent_id_card, ent_email, ent_username, ent_password
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
        $this->ment->ent_password = $this->input->post('ent_password');
        $this->ment->ent_status = 1;

        // Create file storage variables
        $file_name = array();
        $file_tmp_name = array();
        $file_size = array();
        $file_error = array();
        $file_ext = array();
        $file_actaul_ext = array();
        $error_file='';

        // Configure file storage
        $file = $_FILES['document_ent'] ?? '';
        $file_name = $_FILES['document_ent']['name'] ?? '';
        $file_tmp_name = $_FILES['document_ent']['tmp_name'] ?? '';
        $file_size = $_FILES['document_ent']['size'] ?? ''; 
        $file_error = $_FILES['document_ent']['error'] ?? '';

        if($file != ''){
            for($i = 0; $i < count($file_name); $i++){
                $file_ext[$i] = explode('.', $file_name[$i]);
                $file_actaul_ext[$i] = strtolower(end($file_ext[$i]));

                // Check if there is a problem with the image file. or the file size exceeds 1000000?
                if($file_error[$i] != 0 || $file_size[$i] >= 1000000){
                    $error_file = 'false';
                    break;
                }
            }
        }else{
            $error_file = 'false';
        }
        
        if($error_file != 'false'){
            $this->ment->insert_entrepreneur();
            $result = $this->ment->get_by_username_password();
            $this->mdoc->doc_ent_id = $result->ent_id;

            // Loop to upload files
            for($i = 0; $i < count($file_name); $i++){
                $file_new_name[$i] = uniqid('', true);
                $file_destination[$i] = './document_file_entrepreneur/'.$file_new_name[$i].'.'.$file_actaul_ext[$i];
                move_uploaded_file($file_tmp_name[$i], $file_destination[$i]);
                $this->mdoc->doc_path = $file_new_name[$i].'.'.$file_actaul_ext[$i];
                $this->mdoc->insert_document();
            }
            $this->session->set_userdata("error_register_entrepreneur", "success");
            redirect('Landing_page/Register/Landing_page');
        }else{
            $this->session->set_userdata("error_register_entrepreneur", "fail");
            redirect("Entrepreneur/Auth/Register_entrepreneur/show_regis_ent");
        }
    }
    /*
    * check_username_entrepreneur_ajax
    * check username entrepreneur
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
}