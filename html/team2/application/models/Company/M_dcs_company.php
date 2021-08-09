<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once "Da_dcs_company.php";
class M_dcs_company extends Da_dcs_company{
    public function get_all(){
        $sql = "SELECT * FROM dcs_company 
                WHERE com_status != 3 AND com_status != 4 AND com_ent_id = ?";
        return $this->db->query($sql,array($this->com_ent_id));
    }

    public function get_by_id(){
        $sql = "SELECT * FROM dcs_company 
                WHERE com_status = 1 AND com_id = ?";
        return $this->db->query($sql, array($this->com_id));
    }

    
    function get_count_all($num_status){
        $this->db->select('*');
        $this->db->from('dcs_company ');
        $this->db->where("com_status = '$num_status'");
        $num_results = $this->db->count_all_results();
        return $num_results;
    }
    function get_all_data($limit, $start, $number_status)
    {

        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('dcs_company');
        $this->db->join('dcs_entrepreneur', 'dcs_entrepreneur.ent_id = dcs_company.com_ent_id', 'left');
        $this->db->where("com_status = '$number_status'");
        $query = $this->db->get();
        //$query = $this->db->get('dcs_entrepreneur');
        return $query->result();
    }
    function get_search($search, $number_status)
    {  
        $sql = "SELECT * FROM {$this->db_name}.dcs_company where com_name =  '$search'  And com_status = '$number_status' ";

        $query = $this->db->query($sql);
        return $query;

    }
    
}