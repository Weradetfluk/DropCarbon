<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';

    /*
    * @author Priyarat Bumrungkit 62160156
    */

class Register_entrepreneur extends DCS_controller {
    public function __construct() {
        parent::__construct();
    }
    
    /*
    * show_regis_ent
    * show form register entrepreneur
    * @input 
    * @output -
    * @author Priyarat Bumrungkit 62160156
    * @Create Date 2021-07-18
    * @Update Date 2021-08-05
    */
    public function show_regis_ent() {
        $this->output_regis('entrepreneur/auth/v_regis_entrepreneur');
    }

    /*
    * insert_ent
    * insert entrepreneur to database
    * @input 
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2021-07-18
    * @Update Date 2021-08-05
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
        $fileName = array();
        $fileTmpName = array();
        $fileSize = array();
        $fileError = array();
        $fileExt = array();
        $fileActaulExt = array();
        $error_file='';

        // Configure file storage
        $file = $_FILES['myfile'];
        $fileName = $_FILES['myfile']['name'];
        $fileTmpName = $_FILES['myfile']['tmp_name'];
        $fileSize = $_FILES['myfile']['size']; 
        $fileError = $_FILES['myfile']['error'];

        for($i = 0; $i < count($fileName); $i++){
            $fileExt[$i] = explode('.', $fileName[$i]);
            $fileActaulExt[$i] = strtolower(end($fileExt[$i]));

            // Check if there is a problem with the image file. or the file size exceeds 1000000?
            if($fileError[$i] != 0 || $fileSize[$i] >= 1000000){
                $error_file = 'false';
                break;
            }
        }
        
        if($error_file != 'false'){
            $this->ment->insert_entrepreneur();
            $result = $this->ment->get_by_username_password();
            $this->mdoc->doc_ent_id = $result->ent_id;

            // Loop to upload files
            for($i = 0; $i < count($fileName); $i++){
                $fileNewName[$i] = uniqid('', true);
                $fileDestination[$i] = './document_file_entrepreneur/'.$fileNewName[$i].'.'.$fileActaulExt[$i];
                move_uploaded_file($fileTmpName[$i], $fileDestination[$i]);
                $this->mdoc->doc_path = $fileNewName[$i].'.'.$fileActaulExt[$i];
                $this->mdoc->insert_document();
            }
            redirect('Landing_page/Register/Landing_page');
        }else{
            redirect("Entrepreneur/Auth/Register_entrepreneur/show_regis_ent");
        }
    }
}