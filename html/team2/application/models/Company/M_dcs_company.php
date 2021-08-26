<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once "Da_dcs_company.php";

/*
* M_dcs_company
* get data company
* @author Suwapat Saowarod 62160340
* @Create Date 2564-07-19
*/
class M_dcs_company extends Da_dcs_company
{
    /*
    * get_all
    * get data company
    * @input com_ent_id
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-07-19
    * @Update -
    */
    public function get_all()
    {
        $sql = "SELECT * FROM dcs_company 
                WHERE  com_status != 4 AND com_ent_id = ?";
        return $this->db->query($sql, array($this->com_ent_id));
    }

    /*
    * get_by_id
    * get data company by id
    * @input com_id
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-07-19
    * @Update -
    */
    public function get_by_id()
    {
        $sql = "SELECT * FROM dcs_company 
                WHERE com_status != 4 AND com_id = ?";
        return $this->db->query($sql, array($this->com_id));
    }

    /*
    *get_count_all
    *get data count company by form database
    *@input num_status
    *@output -
    *@author Kasama Donwong 62160074
    *@Create Date 2564-07-31
    */
    function get_count_all($num_status)
    {
        $this->db->select('*');
        $this->db->from('dcs_company ');
        $this->db->where("com_status = '$num_status'");
        $num_results = $this->db->count_all_results();
        return $num_results;
    }

    /*
    *get_all_data
    *get data entrepreneur&company form database
    *@input $limit, $start, $number_status
    *@output entrepreneur data & company data
    *@author Kasama Donwong 62160074
    *@Create Date 2564-08-08
    */
    function get_all_data($limit, $start, $number_status)
    {

        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('dcs_company');
        $this->db->join('dcs_entrepreneur', 'dcs_entrepreneur.ent_id = dcs_company.com_ent_id', 'left');
        $this->db->where("com_status = '$number_status'");
        $query = $this->db->get();
        return $query->result();
    }

    /*
    *get_search
    *get data with search
    *@input number_status, search
    *@output -
    *@author Kasama Donwong 62160074
    *@Create Date 2564-08-08
    */
    function get_search($search, $number_status)
    {
        $sql = "SELECT * FROM {$this->db_name}.dcs_company where com_name =  '$search'  And com_status = '$number_status' ";

        $query = $this->db->query($sql);
        return $query;
    }

    /*
    *get_by_name
    *get data company by com_name
    *@input com_name
    *@output -
    *@author Suwapat Saowarod 62160340
    *@Create Date 2564-08-07
    */
    function get_by_name()
    {
        $sql = "SELECT * FROM {$this->db_name}.dcs_company where com_name =  ? AND com_status = 1";
        $query = $this->db->query($sql, array($this->com_name));
        return $query;
    }
    
    /*
    *get_by_detail
    *get data entrepreneur form database
    *@input com_id
    *@output -
    *@author Acharaporn pornpattanasap 62160344
    *@Create Date 2564-08-07
    */
    public function get_by_detail()
    {
        $sql = "SELECT * 
        FROM {$this->db_name}.dcs_company AS detail
        LEFT JOIN {$this->db_name}.dcs_com_image AS com ON com.com_img_com_id 
        WHERE detail.com_id=?";

        $query = $this->db->query($sql, array($this->com_id));
        return $query;
    }

    /*
    *get_data_card_company
    *get data card company form database sum row
    *@input -
    *@output -
    *@author Kasama Donwong 62160074
    *@Create Date 2564-08-25
    */
    function get_data_card_company()
    {
        $sql = "SELECT sum(case when com_status = 1 then 1 else 0 end ) as consider, 
        sum(case when com_status = 2 then 1 else 0 end) as approve , 
        sum(case when com_status = 3 then 1 else 0 end ) as reject
        
        FROM dcs_company;";

        $query = $this->db->query($sql);
        return $query;
    }
}