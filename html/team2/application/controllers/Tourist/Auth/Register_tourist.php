<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';
class Register_tourist extends DCS_controller {
    public function __construct() {
        parent::__construct();
    }
    /*
    * insert_tourist
    * @author Thanisorn thumsawanit 62160088
    * @Create Date 2564-07-31
    */

    public function show_regis_tourist() {
        $this->output_regis('tourist/auth/v_regis_tourist');
    }


	public function insert_tourist() {
        $this->load->model('Tourist/M_dcs_tourist', 'tr');
        $this->tr->tus_pre_id = intval($this->input->post('tus_pre_id'));
        $this->tr->tus_firstname = $this->input->post('tus_firstname');
        $this->tr->tus_lastname = $this->input->post('tus_lastname');
        $this->tr->tus_tel = $this->input->post('tus_tel');
        $this->tr->tus_birthdate = $this->input->post('tus_birthdate');
        $this->tr->tus_email = $this->input->post('tus_email');
        $this->tr->tus_username = $this->input->post('tus_username');
        $this->tr->tus_password = $this->input->post('tus_password');
        $this->tr->insert_tourist();
        redirect('Landing_page/Landing_page');
    }
}