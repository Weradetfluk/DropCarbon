<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';
class Admin_block_tourist extends DCS_controller
{
    /*
    * @author Weradet Nopsombun 62160110
    */

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
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
        $this->output_admin('admin/manage_tourist/v_list_tourist_block',$data);
    }

    /*
    * show_data_block_tourist
    * For show table the block user
    * @input 
    * @output -
    * @author Nantasirir Saiwaew 62160093
    * @Create Date 2564-08-01
    * @Update Date -
    */
    public function show_data_block_tourist()
    {
  
  
        $this->load->model('Tourist/M_dcs_tourist', 'mdct');

        $all_count = $this->mdct->get_count_all_block();
   
   
        $config = array();
        $config['base_url'] = base_url()."Admin/Manage_tourist/Admin_list_tourist/show_data_block_tourist";
        $config['total_rows'] = $all_count;
        $config['per_page'] = 5;
        $config["uri_segment"] = 5;
   
        $config['full_tag_open'] = '<ul class="pagination">';        
        $config['full_tag_close'] = '</ul>';                
        $config['first_tag_open'] = '<li class="page-item disabled"><span class="page-link">';        
        $config['first_tag_close'] = '</span></li>';        
        $config['prev_link'] = '&laquo';        
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';        
        $config['prev_tag_close'] = '</span></li>';        
        $config['next_link'] = '&raquo';        
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';        
        $config['next_tag_close'] = '</span></li>';        
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';        
        $config['last_tag_close'] = '</span></li>';        
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';        
        $config['cur_tag_close'] = '</a></li>';        
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';        
        $config['num_tag_close'] = '</span></li>';
   
        $this->pagination->initialize($config);
   
       $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
   
       $data['arr_tourist_block'] = $this->mdct->get_all_data_block($config["per_page"], $page);
   
       $data["links"] = $this->pagination->create_links();
   
       $this->output_admin('admin/manage_tourist/v_list_tourist_block',$data);
   
  
  
    }
    
    public function block_user_ajax()
    {
        $this->load->model('Tourist/M_dcs_tourist', 'mdct');

        $this->mdct->tus_id = $this->input->post('tus_id');

        $status_number = 4;

        $this->mdct->update_status($status_number);
    }
}
