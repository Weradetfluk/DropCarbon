<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once 'Da_dcs_tourist.php';

/*
* M_dcs_tourist
* get data tourist
* @author Thanisron thumsawanit 62160088
* @Create Date 2564-08-02
*/
class M_dcs_tourist extends Da_dcs_tourist
{
    public function __construct()
    {
        parent::__construct();
    }

    /*
    * get_tourist
    * get data entrepreneur form database
    * @input -
    * @output -
    * @author Thanisron thumsawanit 62160088
    * @Create Date 2564-08-02
    */
    function get_tourist()
    {
        $sql = "SELECT * FROM {$this->db_name}.dcs_tourist ";
        $query = $this->db->query($sql);
        return $query;
    }

    /*
    * get_all_list_tourist
    * get all data tourist
    * @input -
    * @output -
    * @author Thanisron thumsawanit 62160088
    * @Create Date 2564-08-02
    */
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

    /*
    * get_all_list_tourist
    * get all count tourist status = 1
    * @input -
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-08-02
    */
    function get_count_all_tourist()
    {
        $this->db->select('*');
        $this->db->from('dcs_tourist');
        $this->db->where('tus_status = 1');
        $num_results = $this->db->count_all_results();
        return $num_results;
    }

    /*
    * get_count_all_block
    * get all count tourist status = 4
    * @input -
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-08-02
    */
    function get_count_all_block()
    {
        $this->db->select('*');
        $this->db->from('dcs_tourist ');
        $this->db->where('tus_status = 4');
        $num_results = $this->db->count_all_results();
        return $num_results;
    }

    /*
    * get_all_data_block
    * get all data tourist status = 4
    * @input -
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-08-02
    */
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

    /*
    * check_username
    * get data tourist by username
    * @input -
    * @output -
    * @author Thanisron thumsawanit 62160088
    * @Create Date 2564-08-02
    */
    public function check_username()
    {
        $sql = "SELECT tus_id FROM {$this->db_name}.dcs_tourist
        WHERE tus_username = ?";
        $query = $this->db->query($sql, array($this->tus_username));
        return $query;
    }

    /*
    * check_username
    * get data tourist by username and password
    * @input -
    * @output -
    * @author Thanisron thumsawanit 62160088
    * @Create Date 2564-08-02
    */
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

    /*
    * get_tourist_by_id
    * get data tourist form database by ID
    * @input -
    * @output -
    * @author Naaka punparich 62160082
    * @Create Date 2564-08-02
    */
    function get_tourist_by_id()
    {
        $sql = "SELECT * FROM {$this->db_name}.dcs_tourist  where tus_id = ? ";
        $query = $this->db->query($sql, array($this->tus_id));

        return $query;
    }

    function get_all_prefix()
    {
        $sql = "SELECT * 
                from dcs_prefix";
        $query = $this->db->query($sql);       
        return $query;
    }
}
