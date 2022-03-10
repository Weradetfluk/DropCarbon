<?php
/*
* Admin_block_user
* Manage block user
* @author weradet nopsombun 62160110
* @Create Date 2564-07-17
*/

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
    * block_user_ajax
    * change status block to database
    * @input ent_id
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-07-17
    * @Update Date -
    */    
    public function block_user_ajax()
    {
        $this->load->model('Entrepreneur/M_dcs_entrepreneur', 'mdce');

        $this->mdce->ent_id = $this->input->post('ent_id');

        $status_number = 4;

        $this->mdce->update_status($status_number);
    }

    /*
    * unblock_user_ajax
    * change status approve to database
    * @input ent_id
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-07-17
    * @Update Date -
    */
    public function unblock_user_ajax()
    {
        $this->load->model('Entrepreneur/M_dcs_entrepreneur', 'mdce');

        $this->mdce->ent_id = $this->input->post('ent_id');

        $status_number = 2;

        $this->mdce->update_status($status_number);
    }
}
