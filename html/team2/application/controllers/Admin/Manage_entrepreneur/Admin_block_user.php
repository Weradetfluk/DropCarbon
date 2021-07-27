<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';
class Admin_block_user extends DCS_controller
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
    * call function in Dcs_controller
    * @input 
    * @output -
    * @author Weradet Nopsombun
    * @Create Date 2564-07-17
    * @Update Date -
    */

    public function index()
    {
        $this->output_admin('admin/manage_entrepreneur/v_list_entrepreneur');
    }


    
    public function block_user_ajax()
    {
        $this->load->model('Entrepreneur/M_dcs_entrepreneur', 'mdce');

        $this->mdce->ent_id = $this->input->post('ent_id');

        $status_number = 4;

        $this->mdce->update_status($status_number);
    }
}
