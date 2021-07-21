<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require dirname(__FILE__) . '/../DCS_controller.php';
class Etp_input extends DCS_controller {
    public function __construct() {
        parent::__construct();
    }
    /*
    * insert_ent
    * @author Thanisorn thumsawanit 62160088
    * @Create Date 2564-07-15
    */
    public function show_regis_option() {
        $this->output_regis('register/v_regis');
    }
    public function show_regis_ent() {
        $this->output_regis('register/v_ent_regis');
    }
	public function insert_ent() {
        $this->load->model('M_dcs_entrepreneur', 'ent');
        $this->ent->ent_pre_id = intval($this->input->post('ent_pre_id'));
        $ent_fname = $this->input->post('ent_fname');
        $ent_lastname = $this->input->post('ent_lastname');
        $ent_name = $ent_fname." ".$ent_lastname;
        $this->ent->ent_name = $ent_name;
        $this->ent->ent_tel = $this->input->post('ent_tel');
        $this->ent->ent_id_card = $this->input->post('ent_id_card');
        $this->ent->ent_email = $this->input->post('ent_email');
        $this->ent->ent_username = $this->input->post('ent_username');
        $this->ent->ent_password = $this->input->post('ent_password');
        $this->ent->insert_entrepreneur();
        redirect('Login/Login_entrepreneur');
    }
}