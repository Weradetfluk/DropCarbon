<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';
/*
* Admin_block_tourist
* Manage block tourist
* @author Nantasiri Saiwaew 62160093
* @Create Date 2564-08-01
*/
class Admin_block_tourist extends DCS_controller
{
    /*
    * @author Nantasiri Saiwaew 62160093
    */

    public function __construct()
    {
        parent::__construct();
        $this->load->library('email');
        $this->load->library('pagination');
        $this->load->model('Tourist/M_dcs_tourist', 'mdct');
    }


    /*
    * index
    * call function in Dcs_controller
    * @input 
    * @output -
    * @author Nantasirir Saiwaew 62160093
    * @Create Date 2564-08-01
    * @Update Date -
    */

    public function index()
    {
        $this->output_admin('admin/manage_tourist/v_list_tourist');
    }
    
    /*
    * block_user_ajax
    * For block tourist user with ajax
    * @input 
    * @output -
    * @author Nantasirir Saiwaew 62160093
    * @Create Date 2564-08-01
    * @Update Date -
    */
    public function block_user_ajax()
    {
        // set value from font end
        $this->mdct->tus_id = $this->input->post('tus_id');
        // set data for send mail
        $user_email = $this->input->post('email');
        $mail_subject = 'Admin has blocked your account.';
        $mail_content_header = "คุณถูกบล็อคบัญชีการใช้งาน";
        $mail_content = "บัญชีนักท่องเที่ยวนี้ถูกบล็อคเนื่องจากผู้ใช้งานได้ละเมิดกฎของเว็บไซต์ Drop Carbon System";
        $admin_id =  $this->session->userdata("Admin_id");
        $status_number = 4;
        $this->mdct->update_status($status_number);
        $this->email_send($mail_content, $user_email, $mail_subject, $mail_content_header);
    }
}
