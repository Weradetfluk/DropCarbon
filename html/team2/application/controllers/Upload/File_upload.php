<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../DCS_controller.php';
class File_upload extends DCS_controller{
    public function index(){
        $this->load->view('upload/v_form_upload');
    }
    public function save_file(){
        $fileName = array();
        $fileTmpName = array();
        $fileSize = array();
        $fileError = array();
        $fileExt = array();
        $fileActaulExt = array();
        $error_file='';


        $file = $_FILES['file'];
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size']; 
        $fileError = $_FILES['file']['error'];
        
        for($i = 0; $i < count($fileName); $i++){
            $fileExt[$i] = explode('.', $fileName[$i]);
            $fileActaulExt[$i] = strtolower(end($fileExt[$i]));

            if($fileError[$i] != 0 || $fileSize[$i] >= 1000000){
                $error_file = 'false';
                break;
            }
        }

        if($error_file != 'false'){
            for($i = 0; $i < count($fileName); $i++){
                $fileNewName[$i] = uniqid('', true).'.'.$fileActaulExt[$i];
                $fileDestination[$i] = './upload_file/'.$fileNewName[$i];
                move_uploaded_file($fileTmpName[$i], $fileDestination[$i]);
                header("Location: index?UploadSuccess");
            }
            // echo '<pre>';
            //     print_r($fileActaulExt);
            // echo '</pre>';
        }else{
            echo "upload file fail !!!";
        }
    }
}