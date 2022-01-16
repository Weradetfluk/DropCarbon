<?php
/*
* Da_dcs_tourist
* Manage tourist
* @author Thanisorn thumsawanit 62160088
* @Create Date 2564-07-15
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . "/../DCS_model.php";
class Da_dcs_tourist extends DCS_model
{
    public $tus_id;
    public $tus_pre_id;
    public $tus_firstname;
    public $tus_lastname;
    public $tus_tel;
    public $tus_birthdate;
    public $tus_email;
    public $tus_username;
    public $tus_password;
    public $tus_status;
    public $tus_score;
    public $tus_cur_score;

    /*
    * @author Thanisorn thumsawanit 62160088
    */
    public function __construct()
    {
        parent::__construct();
    }

    /*
    * insert_tourist
    * insert tourist 
    * @input 
    * @output -
    * @author Thanisorn thumsawanit 62160088
    * @Create Date 2564-07-15
    * @Update Date -
    */
    public function insert_tourist()
    {
        $sql = "INSERT INTO dcs_tourist(tus_pre_id, tus_firstname, tus_lastname, tus_tel, tus_birthdate, tus_email, tus_username, tus_password) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
        $this->db->query($sql, array($this->tus_pre_id, $this->tus_firstname, $this->tus_lastname, $this->tus_tel, $this->tus_birthdate, $this->tus_email, $this->tus_username, $this->tus_password));
    }

    /*
    * update_status
    * Update status for tourist when block user
    * @input tus_status
    * @output -
    * @author Nantasiri Saiwaew 62160093
    * @Create Date 2564-08-01
    * @Update Date -
    */
    public function update_status($status_number)
    {
        $sql = "UPDATE {$this->db_name}.dcs_tourist SET tus_status = ?
        Where tus_id = ?";

        $this->db->query($sql, array($status_number, $this->tus_id));
    }

    /*
    * update_unblock_status
    * Update status for tourist when unblock user
    * @input tus_status
    * @output -
    * @author Nantasiri Saiwaew 62160093
    * @Create Date 2564-08-02
    * @Update Date -
    */
    public function update_unblock_status($status_number)
    {
        $sql = "UPDATE {$this->db_name}.dcs_tourist SET tus_status = ?
        Where tus_id = ?";

        $this->db->query($sql, array($status_number, $this->tus_id));
    }

    /*
    * update_tourist
    * Update data for tourist
    * @input tus_pre_id, tus_firstname, tus_lastname, tus_tel, tus_birthdate, tus_email, tus_id
    * @output -
    * @author Naaka punparich 62160082
    * @Create Date 2564-08-02
    * @Update Date -
    */
    public function update_tourist()
    {
        $sql = "UPDATE {$this->db_name}.dcs_tourist 
                SET tus_pre_id = ?, tus_firstname = ?, tus_lastname = ?, tus_tel = ?, tus_birthdate = ?,  tus_email = ? , tus_password = ?
                WHERE tus_id = ?";
        $this->db->query($sql, array($this->tus_pre_id, $this->tus_firstname, $this->tus_lastname, $this->tus_tel, $this->tus_birthdate, $this->tus_email, $this->tus_password, $this->tus_id));
    }

    /*
    * update_score
    * Update data  score tourist
    * @input tus_id tus_score
    * @output -
    * @author weradet nopsomsbun 62160110
    * @Create Date 2564-10-16
    * @Update Date -
    */
    public function update_score()
    {
        $sql = "UPDATE {$this->db_name}.dcs_tourist 
               SET tus_score=tus_score + ?, tus_cur_score = tus_cur_score + ?  WHERE tus_id = ?";
        $this->db->query($sql, array($this->mdct->tus_score,   $this->mdct->tus_score, $this->mdct->tus_id));
    }
    /*
    * update_score_exchange_reward
    * update_score_exchange_reward
    * @input 
    * @output -
    * @author Thanisorn thumsawanit 62160088
    * @Create Date 2564-12-24
    * @Update Date -
    */
    public function update_score_exchange_reward()
    {
        $sql = "UPDATE {$this->db_name}.dcs_tourist 
               SET tus_score = ? WHERE tus_id = ?";
        $this->db->query($sql, array($this->tus_score, $this->tus_id));
    }
}