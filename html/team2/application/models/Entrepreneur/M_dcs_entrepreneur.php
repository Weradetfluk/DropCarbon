<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once 'Da_dcs_entrepreneur.php';
class M_dcs_entrepreneur extends Da_dcs_entrepreneur
{
    public function __construct()
    {
        parent::__construct();
    }

    function get_all_consider($limit, $start)
    {

        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('dcs_entrepreneur');
        $this->db->where('ent_status = 1');
        $query = $this->db->get();
       
        //$query = $this->db->get('dcs_entrepreneur');
        return $query->result();
    }


    
    function get_all_data_approve($limit, $start)
    {

        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('dcs_entrepreneur');
        $this->db->where('ent_status = 2');
        $query = $this->db->get();
       
        //$query = $this->db->get('dcs_entrepreneur');
        return $query->result();
    }

    function get_count_all_consider()
    {
        $this->db->select('*');
        $this->db->from('dcs_entrepreneur ');
        $this->db->where('ent_status = 1');
        $num_results = $this->db->count_all_results();
        return $num_results;
    }

    function get_count_all_approve()
    {
        $this->db->select('*');
        $this->db->from('dcs_entrepreneur ');
        $this->db->where('ent_status = 2');
        $num_results = $this->db->count_all_results();
        return $num_results;
    }



    function get_all_approve()
    {
        $sql = "SELECT *  from  {$this->db_name}.dcs_entrepreneur  where ent_status = 2";
        $query = $this->db->query($sql);
        return $query;
    }




    /*
    *get_ent
    *get data entrepreneur form database
    *@input -
    *@insert -
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
    *login
    *get data entrepreneur form database
    *@input -
    *@insert -
    *@author Suwapat Saowarod 
    *@Create Date 2564-07-19
    */
    function login()
    {
        $sql = "SELECT * 
                from dcs_entrepreneur 
                where ent_username = ? AND  ent_password = ? AND ent_status = 2";

        $query = $this->db->query($sql, array($this->ent_username, $this->ent_password));

        $query_row = $query->num_rows();

        if ($query_row) {
            return $query->row();
        } else {
            return false;
        }
    }
}
