<?php
/*
* M_dcs_promotions
* get data event
* @author Naaka punparich 62160082
* @Create Date 2564-09-16
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once "Da_dcs_promotions.php";

class M_dcs_promotions extends Da_dcs_promotions
{
    /*
    * @author Nantasiri Saiwaew 62160093
    */
    public function __construct()
    {
        parent::__construct();
    }

    /*
    *get_count_all
    *get data count promotions by form database
    *@input num_status
    *@output -
    *@author Kasama Donwong 62160074
    *@Create Date 2564-09-24
    */
    function get_count_all($num_status)
    {
        $this->db->select('*');
        $this->db->from('dcs_promotions ');
        $this->db->where("pro_status = '$num_status'");
        $num_results = $this->db->count_all_results();
        return $num_results;
    }

    /*
    *get_all_data
    *get data event&entrepreneur&company form database
    *@input $limit, $start, $number_status
    *@output entrepreneur data & company data & event data
    *@author Kasama Donwong 62160074
    *@Create Date 2564-09-24
    */
    function get_all_data($limit, $start, $number_status)
    {

        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('dcs_promotions');
        $this->db->join('dcs_company', 'dcs_company.com_id = dcs_promotions.pro_com_id', 'left');
        $this->db->join('dcs_entrepreneur', 'dcs_entrepreneur.ent_id = dcs_company.com_ent_id', 'left');
        $this->db->where("pro_status = '$number_status'");
        $query = $this->db->get();
        return $query->result();
    }

    /*
    * get_eve_cat
    * get data event 
    * @input -
    * @output -
    * @author Naaka punparich 62160082
    * @Create Date 2564-09-25
    * @Update -
    */
    public function get_eve_cat()
    {
        $sql = "SELECT * FROM dcs_event AS eve
        LEFT JOIN {$this->db_name}.dcs_eve_category AS cat 
        ON eve.eve_cat_id = cat.eve_cat_id";

        return $this->db->query($sql);
    }

    /*
    *get_data_card_event
    *get data card event form database sum row
    *@input -
    *@output -
    *@author Kasama Donwong 62160074
    *@Create Date 2564-08-25
    */
    function get_data_card_promo()
    {
        $sql = "SELECT count(case when pro_status = 1 then 1 end ) as pro_consider, 
        count(case when pro_status = 2 then 1  end) as pro_approve , 
        count(case when pro_status = 3 then 1  end ) as pro_reject 
        
        FROM dcs_promotions;";

        $query = $this->db->query($sql);
        return $query;
    }
    /*
    *get_search
    *get data with search
    *@input number_status, search
    *@output -
    *@author Nantasiri Saiwaew 62160093
    *@Create Date 2564-09-26
    *@Update Date -
    */
    function get_search($search, $number_status)
    {

        $this->db->select('*');
        $this->db->from('dcs_promotions');
        $this->db->join('dcs_company', 'dcs_company.com_id = dcs_promotions.pro_com_id', 'left');
        $this->db->join('dcs_entrepreneur', 'dcs_entrepreneur.ent_id = dcs_company.com_ent_id', 'left');
        $this->db->group_start();
        $this->db->like('pro_name', $search);
        $this->db->or_like('pro_description', $search);
        $this->db->or_like('ent_firstname', $search);
        $this->db->or_like('ent_lastname', $search);
        $this->db->or_like('com_name', $search);
        $this->db->group_end();
        $this->db->where("pro_status = '$number_status'");
        $query = $this->db->get();
        return $query;
    }
     /*
    *get_by_name
    *get data event by com_name
    *@input com_name
    *@output -
    *@author Priyarat Bumrungkit 62160156
    *@Create Date 2564-09-26
    */
    function get_by_name()
    {
        $sql = "SELECT * FROM {$this->db_name}.dcs_event WHERE eve_name = ? AND eve_status = 1";
        $query = $this->db->query($sql, array($this->eve_name));
        return $query;
    }
}
