<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once 'Da_dcs_entrepreneur.php';

/*
* M_dcs_entrepreneur
* get data entrepreneur
* @author Weradet Nopsombun 62160110
* @Create Date 2564-07-31
*/
class M_dcs_entrepreneur extends Da_dcs_entrepreneur
{
    /*
    * @author Weradet Nopsombun 62160110
    */
    public function __construct()
    {
        parent::__construct();
    }

    /*
    *get_all_data
    *get all data  entrepreneur by form database
    *@input limit, start, number_status
    *@output -
    *@author Weradet Nopsombun 62160110
    *@Create Date 2564-07-31
    *@Update Date 2564-08-26
    */
    function get_all_data($limit, $start, $number_status)
    {

        $this->db->limit($limit, $start);

        $this->db->select('*');
        $this->db->from('dcs_entrepreneur');
        $this->db->where("ent_status = '$number_status'");

        $query = $this->db->get();

        //$query = $this->db->get('dcs_entrepreneur');
        return $query->result();
    }


    /*
    *get_search
    *get serarch entrepreneur by form database
    *@input limit, start, number_status
    *@output -
    *@author Weradet Nopsombun 62160110
    *@Create Date 2564-07-31
    *@Update Date 2564-08-26
    */
    function get_search($search, $number_status)
    {
        $this->db->select('*');
        $this->db->from('dcs_entrepreneur');
        $this->db->group_start();
        $this->db->like('ent_firstname', $search);
        $this->db->or_like('ent_lastname', $search);
        $this->db->or_like('ent_email', $search);
        $this->db->or_like('ent_tel', $search);
        $this->db->group_end();
        $this->db->where("ent_status = '$number_status'");
        $query = $this->db->get();
        return $query;
    }

    /*
    *get_count_all
    *get data count entrepreneur by form database
    *@input -
    *@output -
    *@author Weradet Nopsombun 62160110
    *@Create Date 2564-07-31
    *@Update Date 2564-08-26
    */
    function get_count_all($num_status)
    {
        $this->db->select('*');
        $this->db->from('dcs_entrepreneur ');
        $this->db->where("ent_status = '$num_status'");
        $num_results = $this->db->count_all_results();
        return $num_results;
    }

    /*
    *get_entrepreneur_by_id
    *get data card entrepreneur by form database
    *@input ent_id
    *@output -
    *@author Weradet Nopsombun 62160110
    *@Create Date 2564-07-31
    *@Update Date 2564-08-26
    */
    function get_entrepreneur_by_id()
    {
        $sql = "SELECT * FROM {$this->db_name}.dcs_entrepreneur where ent_id = ? ";
        $query = $this->db->query($sql, array($this->ent_id));

        return $query;
    }

    /*
    *get_data_card_entrepreneur
    *get data card entrepreneur form database sum row
    *@input -
    *@output -
    *@author Weradet Nopsombun 62160110
    *@Create Date 2564-07-31
    */
    function get_data_card_entrepreneur()
    {
        $sql = "SELECT sum(case when ent_status = 1 then 1 else 0 end ) as ent_consider, 
        sum(case when ent_status = 2 then 1 else 0 end) as ent_approve , 
        sum(case when ent_status = 3 then 1 else 0 end ) as ent_reject ,
        sum(case when ent_status = 4 then 1 else 0 end ) as ent_blocked 
        
        FROM dcs_entrepreneur;";

        $query = $this->db->query($sql);
        return $query;
    }

    /*
    *get_ent
    *get data entrepreneur form database
    *@input -
    *@output -
    *@author Thanisron thumsawanit 62160088
    *@Create Date 2564-07-15
    */
    function get_ent()
    {
        $sql = "SELECT * FROM {$this->db_name}.dcs_entrepreneur ";
        $query = $this->db->query($sql);
        return $query;
    }

    /*
    *get_by_username_password
    *get data entrepreneur form database
    *@input ent_username, ent_password, ent_status
    *@output -
    *@author Suwapat Saowarod 62160340
    *@Create Date 2564-08-03
    */
    function get_by_username_password()
    {
        $sql = "SELECT * 
                from dcs_entrepreneur 
                where ent_username = ? AND  ent_password = ? AND ent_status = ?";

        $query = $this->db->query($sql, array($this->ent_username, $this->ent_password, $this->ent_status));

        $query_row = $query->num_rows();

        if ($query_row) {
            return $query->row();
        } else {
            return false;
        }
    }

    /*
    *check_username
    *check username in database
    *@input ent_username
    *@output -
    *@author Suwapat Saowarod 62160340
    *@Create Date 2564-08-18
    */
    public function check_username()
    {
        $sql = "SELECT ent_id FROM {$this->db_name}.dcs_entrepreneur
        WHERE ent_username = ?";
        $query = $this->db->query($sql, array($this->ent_username));
        return $query;
    }
    /*
    *get_entrepreneur_prefix
    *get entrepreneur prefix in database
    *@input ent_username
    *@output -
    *@author Thanisorn thumsawanit 62160088
    *@Create Date 2564-09-09
    */
    function get_entrepreneur_prefix()
    {
        $sql = "SELECT * 
                from dcs_prefix";
        $query = $this->db->query($sql);
        return $query;
    }

    /*
    * check_email
    * check email user
    * @input 
    * @output -
    * @author Chutipon Thermsirisuksin 62160081
    * @Create Date 2564-09-23
    * @Update Date -
    */
    function check_email()
    {
        $sql = "SELECT * 
            from dcs_entrepreneur
            where ent_email = ?";

        $query = $this->db->query($sql, array($this->ent_email));

        $query_row = $query->num_rows();

        if ($query_row) {
            return $query->row();
        } else {
            return false;
        }
    }
}