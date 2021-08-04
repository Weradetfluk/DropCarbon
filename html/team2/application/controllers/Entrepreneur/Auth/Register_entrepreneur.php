<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';
class Register_entrepreneur extends DCS_controller {
    public function __construct() {
        parent::__construct();
    }
    /*
    * insert_ent
    * @author Thanisorn thumsawanit 62160088
    * @Create Date 2564-08-02
    */

    public function show_regis_ent() {
        $this->output_regis('entrepreneur/auth/v_regis_entrepreneur');
    }


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

        //สร้างตัวแปรเก็บข้อมูลไฟล์
        $fileName = array();
        $fileTmpName = array();
        $fileSize = array();
        $fileError = array();
        $fileExt = array();
        $fileActaulExt = array();
        $error_file='';

        //กำหนดค่าเก็บข้อมูลไฟล์
        $file = $_FILES['myfile'];
        $fileName = $_FILES['myfile']['name'];
        $fileTmpName = $_FILES['myfile']['tmp_name'];
        $fileSize = $_FILES['myfile']['size']; 
        $fileError = $_FILES['myfile']['error'];

        for($i = 0; $i < count($fileName); $i++){
            $fileExt[$i] = explode('.', $fileName[$i]);
            $fileActaulExt[$i] = strtolower(end($fileExt[$i]));

            if($fileError[$i] != 0 || $fileSize[$i] >= 1000000){
                $error_file = 'false';
                break;
            }
        }
        
        if($error_file != 'false'){
            $this->ment->insert_entrepreneur();
            $result = $this->ment->get_by_username_password();
            $this->mdoc->doc_ent_id = $result->ent_id;
            for($i = 0; $i < count($fileName); $i++){
                $fileNewName[$i] = uniqid('', true);
                $fileDestination[$i] = './document_file_entrepreneur/'.$fileNewName[$i].'.'.$fileActaulExt[$i];
                move_uploaded_file($fileTmpName[$i], $fileDestination[$i]);
                $this->mdoc->doc_path = $fileNewName[$i].'.'.$fileActaulExt[$i];
                $this->mdoc->insert_document();
            }
        }else{
            redirect("Entrepreneur/Auth/Register_entrepreneur/show_regis_ent");
        }
        redirect('Entrepreneur/Auth/Login_entrepreneur');
    }
}