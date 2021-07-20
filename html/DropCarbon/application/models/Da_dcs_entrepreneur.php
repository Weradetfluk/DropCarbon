<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once 'DCS_model.php';
class Da_dcs_entrepreneur extends DCS_model
{
    public $ent_id;
    public $ent_pre_id;
    public $ent_name;
    public $ent_tel;
    public $ent_id_card;
    public $ent_email;
    public $ent_username;
    public $ent_password;
    public $ent_status;

    public function __construct(){
        parent::__construct();
    }

    public function insert() {
        $sql = "INSERT INTO {$this->db_name}.dcs_entrepreneur VALUES(?, ?, ?, ?, ?, ?, ?)";
        $this->db->query($sql, array($this->ent_pre_id, $this->ent_name, $this->ent_tel, $this->ent_id_card, $this->ent_email, $this->ent_username, $this->ent_password));
    }

    public function update_approve($status_number){
        $sql = "UPDATE {$this->db_name}.dcs_entrepreneur SET ent_status = ?
        Where ent_id = ?";
     
         $this->db->query($sql, array($status_number, $this->ent_id));

    }
}
?>