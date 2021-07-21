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

    /*
    * Function : insert_entrepreneur
    *@input $ent_pre_id, $ent_name, $ent_tel, $ent_id_card, $ent_email, $ent_username, $ent_password
     *@author Thanisorn thumsawanit 62160088
    *@Create Date 2564-07-15
    */
    public function insert_entrepreneur() {
        $sql = "INSERT INTO dcs_entrepreneur(ent_pre_id, ent_name, ent_tel, ent_id_card, ent_email, ent_username, ent_password) VALUES(?, ?, ?, ?, ?, ?, ?)";
        $this->db->query($sql, array($this->ent_pre_id, $this->ent_name, $this->ent_tel, $this->ent_id_card, $this->ent_email, $this->ent_username, $this->ent_password));
    }

    public function update_approve($status_number){
        $sql = "UPDATE {$this->db_name}.dcs_entrepreneur SET ent_status = ?
        Where ent_id = ?";
     
         $this->db->query($sql, array($status_number, $this->ent_id));

    }
}
?>