<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once "Da_dcs_event.php";

/*
* M_dcs_event
* get data event
* @author Naaka punparich 62160082
* @Create Date 2564-09-16
*/
class M_dcs_event extends Da_dcs_event
{
    /*
    * @author Naaka Punparich 62160082
    */
    public function __construct()
    {
        parent::__construct();
    }

    /*
    * get_all
    * get data form dcs event
    * @input -
    * @output -
    * @author Naaka punparich 62160082
    * @Create Date 2564-09-16
    */
    function get_all()
    {
        $sql = "SELECT * 
              from dcs_event";
        $query = $this->db->query($sql);
        return $query;
    }

    /*
    *get_event_by_ent_id
    *get event by entrepreneur id
    *@input ent_id
    *@output -
    *@author Suwapat Saowarod
    *@Create Date 2564-09-16
    */
    function get_event_by_ent_id($ent_id)
    {
        $sql = "SELECT eve_id, eve_name, eve_point, eve_description, eve_cat_id, eve_status, com_name FROM `dcs_event` 
                LEFT JOIN dcs_company
                ON dcs_event.eve_com_id = dcs_company.com_id
                WHERE dcs_company.com_ent_id = $ent_id";
        return $this->db->query($sql);
    }

    /*
    *get_by_detail
    *get data form database
    *@input eve_id
    *@output -
    *@author Naaka punparich 62160082
    *@Create Date 2564-09-23
    */
    public function get_by_detail()
    {
        $sql = "SELECT * 
       FROM {$this->db_name}.dcs_event AS detail
       LEFT JOIN {$this->db_name}.dcs_eve_image AS eve ON eve.eve_img_eve_id 
       LEFT JOIN {$this->db_name}.dcs_company AS com ON com.com_id
       LEFT JOIN {$this->db_name}.dcs_eve_category AS cat ON cat.eve_cat_id
       WHERE detail.eve_id=?";

        $query = $this->db->query($sql, array($this->eve_id));
        return $query;
    }

    /*
    *get_event_and_img
    *get data form database
    *@input number_status
    *@output -
    *@author Naaka punparich 62160082
    *@Create Date 2564-09-23
    */
    public function get_event_and_img($number_status, $post)
    {
        $and = "";
        if (isset($post["value_search"]) && $post["value_search"] !== "") {
            $and .= " AND dcs_event.eve_name LIKE '%" . $post["value_search"] . "%'";
        }

        if (isset($post["eve_cat_id"]) && $post["eve_cat_id"] !== "") {
            $and .= " AND dcs_event.eve_cat_id = " . $post["eve_cat_id"] . "";
        }

        $sql = "SELECT dcs_event.eve_id, dcs_event.eve_name,dcs_event.eve_description,dcs_eve_image.eve_img_path 
        from dcs_event
        RIGHT JOIN dcs_eve_image
        ON  dcs_event.eve_id = dcs_eve_image.eve_img_eve_id
        WHERE eve_status = '" . $number_status . "'
        $and
        GROUP BY dcs_event.eve_id";
        $query = $this->db->query($sql);
        return $query;
    }
    /*
    *get_count_all
    *get data count event by form database
    *@input num_status
    *@output -
    *@author Kasama Donwong 62160074
    *@Create Date 2564-09-24
    */
    function get_count_all($num_status)
    {
        $this->db->select('*');
        $this->db->from('dcs_event ');
        $this->db->where("eve_status = '$num_status'");
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
        $this->db->from('dcs_event');
        $this->db->join('dcs_company', 'dcs_company.com_id = dcs_event.eve_com_id', 'left');
        $this->db->join('dcs_entrepreneur', 'dcs_entrepreneur.ent_id = dcs_company.com_ent_id', 'left');
        $this->db->where("eve_status = '$number_status'");
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
    function get_data_card_event()
    {
        $sql = "SELECT sum(case when eve_status = 1 then 1 else 0 end ) as eve_consider, 
        sum(case when eve_status = 2 then 1 else 0 end) as eve_approve , 
        sum(case when eve_status = 3 then 1 else 0 end ) as eve_reject 
        
        FROM dcs_event;";

        $query = $this->db->query($sql);
        return $query;
    }
    /*
    *get_search
    *get data with search
    *@input number_status, search
    *@output -
    *@author Kasama Donwong 62160074
    *@Create Date 2564-09-26
    *@Update Date -
    */
    function get_search($search, $number_status)
    {

        $this->db->select('*');
        $this->db->from('dcs_event');
        $this->db->join('dcs_company', 'dcs_company.com_id = dcs_event.eve_com_id', 'left');
        $this->db->join('dcs_entrepreneur', 'dcs_entrepreneur.ent_id = dcs_company.com_ent_id', 'left');
        $this->db->group_start();
        $this->db->like('eve_name', $search);
        $this->db->or_like('eve_description', $search);
        $this->db->or_like('ent_firstname', $search);
        $this->db->or_like('ent_lastname', $search);
        $this->db->or_like('com_name', $search);
        $this->db->group_end();
        $this->db->where("eve_status = '$number_status'");
        $query = $this->db->get();
        return $query;
    }
}
