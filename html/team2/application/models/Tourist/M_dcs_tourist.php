<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once 'Da_dcs_tourist.php';
class M_dcs_tourist extends Da_dcs_tourist
{
    public function __construct()
    {
        parent::__construct();
    }

    /*
    *get_tourist
    *get data entrepreneur form database
    *@input -
    *@insert -
    *@author Thanisron thumsawanit 62160088
    *@Create Date 2564-08-02
    */
    function get_tourist()
    {
        $sql = "SELECT * FROM {$this->db_name}.dcs_tourist ";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_all_list_tourist($limit, $start)
    {

        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('dcs_tourist');
        $this->db->where('tus_status = 1');
        $query = $this->db->get();

        //$query = $this->db->get('dcs_entrepreneur');
        return $query->result();
    }

    function get_count_all_tourist()
    {
        $this->db->select('*');
        $this->db->from('dcs_tourist');
        $this->db->where('tus_status = 1');
        $num_results = $this->db->count_all_results();
        return $num_results;
    }

    function get_count_all_block()
    {
        $this->db->select('*');
        $this->db->from('dcs_tourist ');
        $this->db->where('tus_status = 4');
        $num_results = $this->db->count_all_results();
        return $num_results;
    }

    function get_all_data_block($limit, $start)
    {

        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('dcs_tourist');
        $this->db->where('tus_status = 4');
        $query = $this->db->get();

        //$query = $this->db->get('dcs_entrepreneur');
        return $query->result();
    }

    public function check_username()
    {
        $sql = "SELECT tus_id FROM {$this->db_name}.dcs_tourist
        WHERE tus_username = ?";
        $query = $this->db->query($sql,array($this->tus_username)); 
        return $query;
    } 

    function get_by_username_password()
    {
        $sql = "SELECT * 
                from dcs_tourist 
                where tus_username = ? AND  tus_password = ? AND tus_status = ?";

        $query = $this->db->query($sql, array($this->tus_username, $this->tus_password, $this->tus_status));

        $query_row = $query->num_rows();

        if ($query_row) {
            return $query->row();
        } else {
            return false;
        }
    }
}
