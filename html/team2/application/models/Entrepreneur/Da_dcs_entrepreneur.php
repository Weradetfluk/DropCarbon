<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . "/../DCS_model.php";

/*
* Da_dcs_entrepreneur
* Manage entrepreneur
* @author Thanisorn thumsawanit 62160088
* @Create Date 2564-07-15
*/
class Da_dcs_entrepreneur extends DCS_model
{
    public $ent_id;
    public $ent_pre_id;
    public $ent_firstname;
    public $ent_lastname;
    public $ent_tel;
    public $ent_id_card;
    public $ent_email;
    public $ent_username;
    public $ent_password;
    public $ent_status;

    /*
    * @author Weradet Nopsombun 62160110
    */
    public function __construct()
    {
        parent::__construct();
    }

    /*
    * insert_entrepreneur
    * insert entrepreneur
    * @input ent_pre_id, ent_name, ent_tel, ent_id_card, ent_email, ent_username, ent_password
    * @output -
    * @author Thanisorn thumsawanit 62160088
    * @Create Date 2564-07-15
    * @Update Date -
    */
    public function insert_entrepreneur()
    {
        $sql = "INSERT INTO dcs_entrepreneur(ent_pre_id, ent_firstname, ent_lastname, ent_tel, ent_id_card, ent_email, ent_username, ent_password) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
        $this->db->query($sql, array($this->ent_pre_id, $this->ent_firstname, $this->ent_lastname, $this->ent_tel, $this->ent_id_card, $this->ent_email, $this->ent_username, $this->ent_password));
    }

    /*
    * update_status
    * update status entrepreneur
    * @input parameter 1, 2, ex. 1 = consider, 2 = approve, 3 = rejected 
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-07-15
    * @Update Date -
    */

    public function update_status($status_number)
    {
        $sql = "UPDATE {$this->db_name}.dcs_entrepreneur SET ent_status = ?
        Where ent_id = ?";

        $this->db->query($sql, array($status_number, $this->ent_id));
    }

    /*
    * update_entrepreneur
    * update data entrepreneur by ent_id
    * @input $ent_pre_id, $ent_name, $ent_tel, $ent_id_card, $ent_email, $ent_username, $ent_password 
    * @output -
    * @author Naaka Punparich 62160082
    * @Create Date 2564-07-15
    * @Update Date 2564-08-02
    */
    public function update_entrepreneur()
    {
        $sql = "UPDATE {$this->db_name}.dcs_entrepreneur 
                SET ent_pre_id = ?, ent_firstname = ?, ent_lastname = ?, ent_tel = ?,  ent_email = ?
                WHERE ent_id = ?";
        $this->db->query($sql, array($this->ent_pre_id, $this->ent_firstname, $this->ent_lastname, $this->ent_tel, $this->ent_email, $this->ent_id));
    }
}