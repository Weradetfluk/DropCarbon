<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';
/*
* Admin_approval_entrepreneur
* Manage Approve reject entrepreneur
* @author weradet nopsombun 62160110
* @Create Date 2564-07-17
*/
class Admin_approval_entrepreneur extends DCS_controller
{
    /*
      * @author Weradet Nopsombun 62160110
      */

    public function __construct()
    {
        parent::__construct();
        $this->load->library('email');
        $this->load->library('pagination');
        $this->load->model('Entrepreneur/M_dcs_entrepreneur', 'mdce');
    }


    /*
      * show_data_consider
      * get all data entrepreneur not approve and show table
      * @input
      * @output -
      * @author Weradet Nopsombun 62160110
      * @Create Date 2564-07-17
      * @Update Date 2564-07-31
      */

    public function show_data_consider()
    {
      $_SESSION['tab_number'] = 3; //set tab number in topbar_admin.php

        $number_status = 1;

        if (isset($_POST['search'])) {
            $value_search  = $this->input->post("value_search");
            $data['arr_entrepreneur'] = $this->mdce->get_search($value_search, $number_status)->result();
        } else {
            $all_count = $this->mdce->get_count_all($number_status); //get all count consider

            $config =  $this->get_config_pagination($all_count, 'Admin/Manage_entrepreneur/Admin_approval_entrepreneur/show_data_consider');
                
            $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;

            $config =  $this->get_config_pagination($all_count, 'Admin/Manage_entrepreneur/Admin_approval_entrepreneur/show_data_consider');

            $data['arr_entrepreneur'] = $this->mdce->get_all_data($config["per_page"], $page, $number_status);
            $this->pagination->initialize($config);
        }
        $data["links"] = $this->pagination->create_links();
        $this->output_admin('admin/manage_entrepreneur/v_list_entrepreneur_consider', $data, 'admin/manage_entrepreneur/v_data_card_entrepreneur');
    }


    /*
      * show_data_approve
      * get all data entrepreneur approve  and show table 
      * @input
      * @output -
      * @author Weradet Nopsombun 62160110
      * @Create Date 2564-07-17
      * @Update Date -
      */
    public function show_data_approve()
    {
        $number_status = 2;

        if (isset($_POST['search'])) {
            $value_search  = $this->input->post("value_search");
            $data['arr_entrepreneur'] = $this->mdce->get_search($value_search, $number_status)->result();
        } else {
            $all_count = $this->mdce->get_count_all($number_status); //get all count approve


            $page_aprove = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;

            $config =  $this->get_config_pagination($all_count, 'Admin/Manage_entrepreneur/Admin_approval_entrepreneur/show_data_approve');
            $data['arr_entrepreneur_approve'] = $this->mdce->get_all_data($config["per_page"], $page_aprove, $number_status);
            $this->pagination->initialize($config);
        }
        $data["link_approve"] = $this->pagination->create_links();
        $this->output_admin('admin/manage_entrepreneur/v_list_entrepreneur_approve', $data, 'admin/manage_entrepreneur/v_data_card_entrepreneur');
    }

    /*
      * show_data_reject
      * get all data entrepreneur approve  and show table
      * @input
      * @output -
      * @author Weradet Nopsombun 62160110
      * @Create Date 2564-08-1
      * @Update Date -
      */
    public function show_data_reject()
    {
        $number_status = 3;

        if (isset($_POST['search'])) {
            $value_search  = $this->input->post("value_search");
            $data['arr_entrepreneur_reject'] = $this->mdce->get_search($value_search, $number_status)->result();
        } else {
            $all_count = $this->mdce->get_count_all($number_status); //get all count approve
            $page_aprove = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
            $config =  $this->get_config_pagination($all_count, 'Admin/Manage_entrepreneur/Admin_approval_entrepreneur/show_data_reject"');
            $data['arr_entrepreneur_reject'] = $this->mdce->get_all_data($config["per_page"], $page_aprove, $number_status);
            $this->pagination->initialize($config);
        }
        $data["link_block"] = $this->pagination->create_links();
        $this->output_admin('admin/manage_entrepreneur/v_list_entrepreneur_reject', $data, 'admin/manage_entrepreneur/v_data_card_entrepreneur');
        
    }



    /*
      * show_data_block
      * get all data entrepreneur approve  and show table
      * @input
      * @output -
      * @author Weradet Nopsombun 62160110
      * @Create Date 2564-08-1
      * @Update Date -
      */
    public function show_data_block()
    {
        $number_status = 4;

        if (isset($_POST['search'])) {
            $value_search  = $this->input->post("value_search");
            $data['arr_entrepreneur_block'] = $this->mdce->get_search($value_search, $number_status)->result();
        } else {
            $all_count = $this->mdce->get_count_all($number_status); //get all count approve

            $page_aprove = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
            $config =  $this->get_config_pagination($all_count, 'Admin/Manage_entrepreneur/Admin_approval_entrepreneur/show_data_block"');

            $data['arr_entrepreneur_block'] = $this->mdce->get_all_data($config["per_page"], $page_aprove, $number_status);
            $this->pagination->initialize($config);
        }
        $data["link_block"] = $this->pagination->create_links();
        $this->output_admin('admin/manage_entrepreneur/v_list_entrepreneur_block', $data, 'admin/manage_entrepreneur/v_data_card_entrepreneur');
        
    }

    /*
      * get_entrepreneur_by_id_ajax
      * get all data entrepreneur by id
      * @input
      * @output -
      * @author Weradet Nopsombun 62160110
      * @Create Date 2564-08-03
      * @Update Date
      */
    public function get_entrepreneur_by_id_ajax()
    {
        $this->load->model('Document/M_dcs_document', 'mdoc');
        $this->mdoc->doc_ent_id = $this->input->post('ent_id');
        $data['arr_file'] = $this->mdoc->get_by_ent_id()->result();

        $this->mdce->ent_id = $this->input->post('ent_id');


        $data['arr_data'] = $this->mdce->get_entrepreneur_by_id()->result();

        echo json_encode($data);
    }


    /*
      * get_entrepreneur_reject_by_id_ajax
      * get all data entrepreneur by id
      * @input
      * @output -
      * @author Weradet Nopsombun 62160110
      * @Create Date 2564-08-01
      * @Update Date
      */
    public function get_entrepreneur_reject_by_id_ajax()
    {
        $this->load->model('Rejected_entrepreneur/M_dcs_entrepreneur_reject', 'mdre');

        $ent_id = $this->input->post('ent_id');


        $data['arr_data'] = $this->mdre->get_data_rejected_by_id($ent_id)->result();

        echo json_encode($data['arr_data']);
    }


    /*
      * get_config_pagination
      * get_config_pagination codeigniter "1 2 3 4..." page
      * @input
      * @output -
      * @author Weradet Nopsombun 62160110
      * @Create Date 2564-08-01
      * @Update Date
      */


    public function get_config_pagination($all_count, $view)
    {
        $config = array();
        $config['base_url'] = base_url() .  $view;
        $config['total_rows'] = $all_count;
        $config['per_page'] = 5;
        $config["uri_segment"] = 5;

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['attributes'] = ['class' => 'page-link'];
        $config['first_link'] = true;
        $config['last_link'] = true;
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        return $config;
    }


    /*
      * Approval
      * change ent_status
      * @input
      * @output -
      * @author Weradet Nopsombun 62160110
      * @Create Date 2564-07-17
      * @Update Date -
      */
    public function approval_entrepreneur()
    {
        $this->mdce->ent_id = $this->input->post('ent_id');

        $status_number = 2;

        $this->mdce->update_status($status_number);
    }


    /*
      * reject_entrepreneur
      * change ent_status
      * @input
      * @output -
      * @author Weradet Nopsombun 62160110
      * @Create Date 2564-07-17
      * @Update Date -
      */
    public function reject_entrepreneur()
    {

    // set value from font end
        $this->mdce->ent_id = $this->input->post('ent_id');



        // set data for send mail
        $reson_admin = $this->input->post('admin_reason');
        $user_email = $this->input->post('email');
        $mail_subject = 'Admin has been rejected';
        $mail_content_header = "คุณถูกปฎิเสธการลงทะเบียนของผู้ประกอบการ";
    
        $admin_id =  $this->session->userdata("Admin_id");



        //load model for save rejected data
        $this->load->model('Rejected_entrepreneur/M_dcs_entrepreneur_reject', 'mdre');




        //save data reject to data base
        $this->mdre->enr_admin_reason = $reson_admin;
        $this->mdre->enr_ent_id =  $this->mdce->ent_id;
        $this->mdre->enr_adm_id = $admin_id;

        $this->mdre->insert();


        //update status entrepreneur
        $status_number = 3;
        $this->mdce->update_status($status_number);
    
     

        $this->email_send($reson_admin, $user_email, $mail_subject, $mail_content_header);
    }




    /*
      * get_data_card_entrepreneur_ajax
      * get data consider, approve, rejected, block <- number of people
      * @input
      * @output -
      * @author Weradet Nopsombun 62160110
      * @Create Date 2564-07-17
      * @Update Date -
      */


    public function get_data_card_entrepreneur_ajax()
    {
        $data['arr_data'] = $this->mdce->get_data_card_entrepreneur()->result();

        $this->output->set_content_type('application/json')->set_output(json_encode($data['arr_data']));
    }
}
