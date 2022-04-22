<?php
/*
* M_dcs_event
* get data event
* @author Naaka punparich 62160082
* @Create Date 2564-09-16
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once "Da_dcs_event.php";
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
        $sql = "SELECT eve_id, eve_name, eve_point, eve_description, eve_cat_id, eve_status, eve_end_date, eve_start_date, com_name, eve_lat, eve_lon, eve_point FROM `dcs_event` 
                LEFT JOIN dcs_company
                ON dcs_event.eve_com_id = dcs_company.com_id
                WHERE dcs_company.com_ent_id = $ent_id AND dcs_event.eve_status != 4 AND dcs_event.eve_adm_id IS NULL
                ORDER BY dcs_event.eve_add_date DESC";
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
        FROM {$this->db_name}.dcs_event AS eve
        LEFT JOIN {$this->db_name}.dcs_eve_image AS img 
        ON eve.eve_id = img.eve_img_eve_id 
        LEFT JOIN {$this->db_name}.dcs_company AS com 
        ON eve.eve_com_id = com.com_id
        LEFT JOIN {$this->db_name}.dcs_eve_category AS cat 
        ON eve.eve_cat_id = cat.eve_cat_id
        LEFT JOIN {$this->db_name}.dcs_entrepreneur AS ent 
        ON com.com_ent_id = ent.ent_id
        LEFT JOIN {$this->db_name}.dcs_event_reject AS rej 
        ON eve.eve_id = rej.evr_eve_id
        LEFT JOIN {$this->db_name}.dcs_parish AS par
        ON eve.eve_par_id = par.par_id
        LEFT JOIN {$this->db_name}.dcs_district AS dis
        ON par.par_dis_id = dis.dis_id
        LEFT JOIN {$this->db_name}.dcs_province AS prv
        ON dis.dis_prv_id = prv.prv_id
        WHERE eve.eve_id=?";
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
        date_default_timezone_set('Asia/Bangkok');
        $date_now = date("Y-m-d");
        $sql = "SELECT dcs_event.eve_id, dcs_event.eve_name,dcs_event.eve_description,dcs_eve_image.eve_img_path,dcs_event.eve_start_date,dcs_event.eve_end_date, dcs_eve_category.eve_drop_carbon
        from dcs_event
        LEFT JOIN dcs_eve_image
        ON  dcs_event.eve_id = dcs_eve_image.eve_img_eve_id
        LEFT JOIN dcs_eve_category 
        ON dcs_event.eve_cat_id = dcs_eve_category.eve_cat_id 
        WHERE eve_status = '" . $number_status . "' AND '$date_now' between dcs_event.eve_start_date AND dcs_event.eve_end_date
        $and
        GROUP BY dcs_event.eve_id";
        $query = $this->db->query($sql);
        return $query;
    }


    /*
    * get_event_by_com_id
    * get event by com_id
    * @input com_id
    * @output -
    * @author Jutamas Thaptong 62160079
    * @Create Date 2564-09-14
    */
    public function get_event_by_com_id($com_id)
    {
        $sql = "SELECT dcs_event.eve_name, dcs_event.eve_id, dcs_event.eve_start_date, 
        dcs_event.eve_end_date, dcs_eve_category.eve_cat_name, dcs_event.eve_description,
        dcs_eve_image.eve_img_path, dcs_eve_category.eve_drop_carbon
        from dcs_event
        LEFT JOIN dcs_eve_image ON dcs_event.eve_id = dcs_eve_image.eve_img_eve_id
        LEFT JOIN dcs_eve_category ON dcs_event.eve_cat_id = dcs_eve_category.eve_cat_id 
        WHERE eve_status = '2'
        AND dcs_event.eve_com_id = '" . $com_id . "'
        GROUP BY dcs_event.eve_id
        ";
        $query = $this->db->query($sql);
        return $query;
    }


    /*
    *get_event_landing_page
    *get data form database
    *@input number_status
    *@output -
    *@author Weradet Nopsombun 62160110
    *@Create Date 2564-10-26
    */
    public function get_event_landing_page()
    {
        date_default_timezone_set('Asia/Bangkok');
        $date_now = date("Y-m-d");
        
        $sql = "SELECT dcs_event.eve_name, dcs_event.eve_id, dcs_event.eve_start_date, 
        dcs_event.eve_end_date, dcs_eve_category.eve_cat_name, dcs_event.eve_description,
        dcs_eve_image.eve_img_path, dcs_eve_category.eve_drop_carbon
        from dcs_event
        LEFT JOIN dcs_eve_image
        ON  dcs_event.eve_id = dcs_eve_image.eve_img_eve_id
        LEFT JOIN dcs_eve_category 
        ON dcs_event.eve_cat_id = dcs_eve_category.eve_cat_id 
        WHERE eve_status = 2 AND '$date_now' between dcs_event.eve_start_date AND dcs_event.eve_end_date
        GROUP BY dcs_event.eve_id 
        ORDER BY eve_num_visitor DESC
        LIMIT 3 ";

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
        $this->db->join('dcs_eve_category', 'dcs_eve_category.eve_cat_id = dcs_event.eve_cat_id', 'left');
        $this->db->join('dcs_company', 'dcs_company.com_id = dcs_event.eve_com_id', 'left');
        $this->db->join('dcs_entrepreneur', 'dcs_entrepreneur.ent_id = dcs_company.com_ent_id', 'left');
        $this->db->where("eve_status = '$number_status'");
        $query = $this->db->get();
        return $query->result();
    }


    /*
    *get_all_data_not_over
    *get data event&entrepreneur&company form database
    *@input $limit, $start, $number_status
    *@output entrepreneur data & company data & event data
    *@author Kasama Donwong 62160074
    *@Create Date 2564-09-24
    */
    function get_all_data_not_over($limit, $start, $number_status)
    {
        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('dcs_event');
        $this->db->join('dcs_company', 'dcs_company.com_id = dcs_event.eve_com_id', 'left');
        $this->db->join('dcs_entrepreneur', 'dcs_entrepreneur.ent_id = dcs_company.com_ent_id', 'left');
        $this->db->where("eve_status = '$number_status' AND eve_point > 0 AND eve_end_date > CURDATE()");
        $query = $this->db->get();
        return $query->result();
    }

      /*
    *get_all_data_event_admin
    *get data event belonging to admin 
    *@input $limit, $start, $number_status
    *@output event data
    *@author Nantasiri Saiwaew 62160093
    *@Create Date 2564-12-14
    */
    function get_all_data_event_admin($limit, $start, $number_status)
    {
        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('dcs_event');
        $this->db->join('dcs_company', 'dcs_company.com_id = dcs_event.eve_com_id', 'left');
        $this->db->join('dcs_entrepreneur', 'dcs_entrepreneur.ent_id = dcs_company.com_ent_id', 'left');
        $this->db->where("eve_status = '$number_status' AND eve_point > 0 AND eve_end_date > CURDATE() AND eve_adm_id != 'NULL'");
        $query = $this->db->get();
        return $query->result();
    }

    /*
    *get_count_all_not_over
    *get data count event by form database
    *@input num_status
    *@output -
    *@author Kasama Donwong 62160074
    *@Create Date 2564-09-24
    */
    function get_count_all_not_over($num_status)
    {
        $this->db->select('*');
        $this->db->from('dcs_event ');
        $this->db->where("eve_status = '$num_status'   AND eve_point > 0 AND eve_end_date > CURDATE()");
        $num_results = $this->db->count_all_results();
        return $num_results;
    }

    /*
    *get_count_all_event_admin
    *get data count event belonging to admin form database
    *@input num_status
    *@output -
    *@author Nantasiri Saiwaew 62160093
    *@Create Date 2564-12-14
    */
    function get_count_all_event_admin($num_status)
    {
        $this->db->select('*');
        $this->db->from('dcs_event ');
        $this->db->where("eve_status = '$num_status'   AND eve_point > 0 AND eve_end_date > CURDATE() AND eve_adm_id != 'NULL'");
        $num_results = $this->db->count_all_results();
        return $num_results;
    }

    /*
    *get_search_not_over
    *get data with search
    *@input number_status, search
    *@output -
    *@author Kasama Donwong 62160074
    *@Create Date 2564-09-26
    *@Update Date -
    */
    function get_search_not_over($search, $number_status)
    {

        $this->db->select('*');
        $this->db->from('dcs_event');
        $this->db->join('dcs_company', 'dcs_company.com_id = dcs_event.eve_com_id', 'left');
        $this->db->join('dcs_entrepreneur', 'dcs_entrepreneur.ent_id = dcs_company.com_ent_id', 'left');
        $this->db->group_start();
        $this->db->like('eve_name', $search);
        $this->db->or_like('ent_firstname', $search);
        $this->db->or_like('ent_lastname', $search);
        $this->db->or_like('com_name', $search);
        $this->db->group_end();
        $this->db->where("eve_status = '$number_status'   AND eve_point > 0 AND eve_end_date > CURDATE()");
        $query = $this->db->get();
        return $query;
    }

    /*
    *get_search_event_admin
    *get data with search
    *@input number_status, search
    *@output -
    *@author Nantasiri Saiwaew 62160093
    *@Create Date 2564-09-26
    *@Update Date -
    */
    function get_search_event_admin($search, $number_status)
    {

        $this->db->select('*');
        $this->db->from('dcs_event');
        $this->db->join('dcs_company', 'dcs_company.com_id = dcs_event.eve_com_id', 'left');
        $this->db->join('dcs_entrepreneur', 'dcs_entrepreneur.ent_id = dcs_company.com_ent_id', 'left');
        $this->db->group_start();
        $this->db->like('eve_name', $search);
        $this->db->or_like('ent_firstname', $search);
        $this->db->or_like('ent_lastname', $search);
        $this->db->or_like('com_name', $search);
        $this->db->group_end();
        $this->db->where("eve_status = '$number_status'   AND eve_point > 0 AND eve_end_date > CURDATE() AND eve_adm_id != 'NULL'");
        $query = $this->db->get();
        return $query;
    }

    /*
    *get_all_data_over
    *get data event&entrepreneur&company form database
    *@input $limit, $start, $number_status
    *@output entrepreneur data & company data & event data
    *@author Kasama Donwong 62160074
    *@Create Date 2564-09-24
    */
    function get_all_data_over($limit, $start, $number_status)
    {
        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('dcs_event');
        $this->db->join('dcs_company', 'dcs_company.com_id = dcs_event.eve_com_id', 'left');
        $this->db->join('dcs_entrepreneur', 'dcs_entrepreneur.ent_id = dcs_company.com_ent_id', 'left');
        $this->db->where("eve_status = '$number_status' AND eve_end_date < CURDATE()");
        $query = $this->db->get();
        return $query->result();
    }

    /*
    *get_all_data_event_over_admin
    *get data event&entrepreneur&company form database
    *@input $limit, $start, $number_status
    *@output entrepreneur data & company data & event data
    *@author Nantasiri Saiwaew 62160093
    *@Create Date 2564-09-24
    */
    function get_all_data_event_over_admin($limit, $start, $number_status)
    {
        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('dcs_event');
        $this->db->join('dcs_company', 'dcs_company.com_id = dcs_event.eve_com_id', 'left');
        $this->db->join('dcs_entrepreneur', 'dcs_entrepreneur.ent_id = dcs_company.com_ent_id', 'left');
        $this->db->where("eve_status = '$number_status' AND eve_end_date < CURDATE() AND eve_adm_id != 'NULL'");
        $query = $this->db->get();
        return $query->result();
    }
    /*
    *get_count_all_over
    *get data count event by form database
    *@input num_status
    *@output -
    *@author Kasama Donwong 62160074
    *@Create Date 2564-09-24
    */
    function get_count_all_over($num_status)
    {
        $this->db->select('*');
        $this->db->from('dcs_event ');
        $this->db->where("eve_status = '$num_status'   AND eve_point > 0 AND eve_end_date < CURDATE()");
        $num_results = $this->db->count_all_results();
        return $num_results;
    }

    /*
    *get_count_all_over
    *get data count event by form database
    *@input num_status
    *@output -
    *@author Kasama Donwong 62160074
    *@Create Date 2564-09-24
    */
    function get_count_all_event_over_admin($num_status)
    {
        $this->db->select('*');
        $this->db->from('dcs_event ');
        $this->db->where("eve_status = '$num_status'   AND eve_point > 0 AND eve_end_date < CURDATE() AND eve_adm_id != 'NULL'");
        $num_results = $this->db->count_all_results();
        return $num_results;
    }

    /*
    *get_search_over
    *get data with search
    *@input number_status, search
    *@output -
    *@author Kasama Donwong 62160074
    *@Create Date 2564-09-26
    *@Update Date -
    */
    function get_search_over($search, $number_status)
    {

        $this->db->select('*');
        $this->db->from('dcs_event');
        $this->db->join('dcs_company', 'dcs_company.com_id = dcs_event.eve_com_id', 'left');
        $this->db->join('dcs_entrepreneur', 'dcs_entrepreneur.ent_id = dcs_company.com_ent_id', 'left');
        $this->db->group_start();
        $this->db->like('eve_name', $search);
        $this->db->or_like('ent_firstname', $search);
        $this->db->or_like('ent_lastname', $search);
        $this->db->or_like('com_name', $search);
        $this->db->group_end();
        $this->db->where("eve_status = '$number_status'   AND eve_point > 0 AND eve_end_date < CURDATE()");
        $query = $this->db->get();
        return $query;
    }
    /*
    *get_search_over_admin
    *get data with search
    *@input number_status, search
    *@output -
    *@author Nantasiri Saiwaew 62160093
    *@Create Date 2564-12-18
    *@Update Date -
    */
    function get_search_over_admin($search, $number_status)
    {

        $this->db->select('*');
        $this->db->from('dcs_event');
        $this->db->join('dcs_company', 'dcs_company.com_id = dcs_event.eve_com_id', 'left');
        $this->db->join('dcs_entrepreneur', 'dcs_entrepreneur.ent_id = dcs_company.com_ent_id', 'left');
        $this->db->group_start();
        $this->db->like('eve_name', $search);
        $this->db->or_like('ent_firstname', $search);
        $this->db->or_like('ent_lastname', $search);
        $this->db->or_like('com_name', $search);
        $this->db->group_end();
        $this->db->where("eve_status = '$number_status'   AND eve_point > 0 AND eve_end_date < CURDATE() AND eve_adm_id != 'NULL'");
        $query = $this->db->get();
        return $query;
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
        $sql = "SELECT count(case when eve_status = 1 then 1 end ) as eve_consider, 
        count(case when eve_status = 2 and eve_point > 0 and eve_end_date > CURDATE() then 1  end) as eve_not_over , 
        count(case when eve_status = 2 and eve_point = 0 and eve_end_date > CURDATE() then 1  end) as eve_no_score , 
        count(case when eve_status = 2 and eve_point > 0 and eve_end_date < CURDATE() then 1  end) as eve_over , 
        count(case when eve_status = 3 then 1  end ) as eve_reject 
        
        FROM dcs_event;";

        $query = $this->db->query($sql);
        return $query;
    }

    /*
    * get_event_mobile
    * get event mobile
    * @input -
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-03-13
    */
    public function get_event_mobile($and = null)
    {

        if($and != null){
            $and = " AND dcs_event.eve_name LIKE '%" . $and . "%'";
        }else{
            $and = "";
        }
        $sql = "SELECT dcs_event.eve_name, dcs_event.eve_id, dcs_eve_image.eve_img_path, dcs_event.eve_description, dcs_event.eve_lat, dcs_event.eve_lon, dcs_eve_category.eve_cat_name, dcs_eve_category.eve_drop_carbon, par.par_name_th, dis.dis_name_th, prv.prv_name_th
        from dcs_event
        LEFT JOIN dcs_eve_image
        ON  dcs_event.eve_id = dcs_eve_image.eve_img_eve_id
        LEFT JOIN dcs_eve_category 
        ON dcs_event.eve_cat_id = dcs_eve_category.eve_cat_id 
        LEFT JOIN dcs_parish AS par
        ON dcs_event.eve_par_id = par.par_id
        LEFT JOIN dcs_district AS dis
        ON par.par_dis_id = dis.dis_id
        LEFT JOIN dcs_province AS prv
        ON dis.dis_prv_id = prv.prv_id
        WHERE eve_status = 2 $and
        GROUP BY dcs_event.eve_id";

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
        $this->db->join('dcs_eve_category', 'dcs_eve_category.eve_cat_id = dcs_event.eve_cat_id', 'left');
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
  /*
    *get_by_name_by_admin
    *get data event by com_name that added by admin
    *@input com_name
    *@output -
    *@author Nantasiri Saiwaew 62160093
    *@Create Date 2564-09-26
    */
    function get_by_name_by_admin()
    {
        $sql = "SELECT * FROM {$this->db_name}.dcs_event WHERE eve_name = ? AND eve_status = 2";
        $query = $this->db->query($sql, array($this->eve_name));
        return $query;
    }

    /*
    *get_event_by_id
    *get data event by id
    *@input eve_id 
    *@output -
    *@author Weradet Nopsombun 62160110
    *@Create Date 2564-09-26
    */
    function get_event_by_id()
    {
        $sql = "SELECT eve_id, eve_name, eve_point, eve_description, eve_cat_id, eve_status, eve_end_date, eve_start_date, eve_lat, eve_lon FROM dcs_event 
        WHERE  eve_id = ?";
        return $this->db->query($sql, array($this->eve_id));
    }
}
