<?php
/*
* DCS_model
* Main Model CI 
* @author Weradet Nopsombun 62160110
* @Create Date 2564-07-17
*/
defined('BASEPATH') or exit('No direct script access allowed');

class DCS_model extends CI_Model
{
    public $db;
    public $db_name;
    /*
    * @author Weradet Nopsombun 62160110
    */
    public function __construct()
    {
        $this->db = $this->load->database('DCS', true);
        $this->db_name = $this->db->database;
    }


    /*
    * get_data_dashboard_admin
    * get data card dashboard and return data JSON
    * @input
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-12-09
    * @Update Date -
    */
    public function get_data_dashboard_admin()
    {
        $sql = "SELECT (SELECT COUNT(tus_id) FROM dcs_tourist) AS tou , 
        (SELECT COUNT(ent_id) FROM dcs_entrepreneur WHERE ent_status = 2) As ent,
        (SELECT COUNT(com_id) FROM dcs_company WHERE com_status = 2) as com, 
        (SELECT COUNT(eve_id) FROM dcs_event WHERE eve_status = 2) as eve, 
        (SELECT COUNT(pro_id) FROM dcs_promotions WHERE pro_status = 2) as pro
        FROM dcs_admin WHERE 1 GROUP BY tou;";

        $query = $this->db->query($sql);

        return $query;
    }
    /*
    * get_data_dashboard_event_cat_admin
    * get data card dashboard and return data JSON
    * @input
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-12-09
    * @Update Date -
    */
    public function get_data_dashboard_event_cat_admin($date_sql)
    {
        $sql = "SELECT dcs_eve_category.eve_cat_id, dcs_eve_category.eve_cat_name,COUNT(dcs_checkin.che_id) as chekin_number
        FROM dcs_eve_category 
        CROSS JOIN dcs_event 
        ON dcs_eve_category.eve_cat_id = dcs_event.eve_cat_id
        LEFT JOIN dcs_checkin 
        ON dcs_event.eve_id = dcs_checkin.che_eve_id
        where $date_sql
        GROUP BY dcs_eve_category.eve_cat_id";
        $query = $this->db->query($sql);

        return $query->result();
    }

    /*
    * get_data_dashboard_event_per_admin
    * get data card dashboard and return data JSON
    * @input
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-12-09
    * @Update Date -
    */
    public function get_data_dashboard_event_per_admin($date_sql)
    {
        $sql = "SELECT dcs_eve_category.eve_cat_id, dcs_eve_category.eve_cat_name,count(che_id) as chekin_number, (SELECT COUNT(che_id) FROM dcs_checkin) as total_checkin, count(che_id) / (SELECT COUNT(che_id) FROM dcs_checkin) * 100 as per
        FROM dcs_eve_category 
        LEFT JOIN dcs_event 
        on dcs_eve_category.eve_cat_id = dcs_event.eve_cat_id
        LEFT JOIN dcs_checkin 
        ON dcs_event.eve_id = dcs_checkin.che_eve_id
        where $date_sql
        GROUP BY dcs_eve_category.eve_cat_id";

        $query = $this->db->query($sql);

        return $query->result();
    }

    /*
    * get_data_dashboard_event_admin
    * get data card dashboard and return data JSON
    * @input
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-12-09
    * @Update Date -
    */
    public function get_data_dashboard_event_admin($date_sql, $eve_cat_id)
    {
        $sql = "SELECT  dcs_event.eve_name, count(che_id) AS checkin
        FROM dcs_event      
        LEFT JOIN dcs_checkin 
        ON dcs_event.eve_id = dcs_checkin.che_eve_id
        WHERE  $date_sql AND  dcs_event.eve_cat_id = '$eve_cat_id'
        GROUP BY dcs_event.eve_id";

        $query = $this->db->query($sql);

        return $query->result();
    }

    /*
    * get_data_event_name_cat
    * get data card dashboard and return data JSON
    * @input
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-12-09
    * @Update Date -
    */
    public function get_data_event_name_cat($date_sql)
    {
        $sql = "SELECT dcs_eve_category.eve_cat_id, dcs_eve_category.eve_cat_name
        FROM dcs_eve_category 
        LEFT JOIN dcs_event 
        on dcs_eve_category.eve_cat_id = dcs_event.eve_cat_id
        LEFT JOIN dcs_checkin 
        ON dcs_event.eve_id = dcs_checkin.che_eve_id
        where $date_sql
        GROUP BY dcs_eve_category.eve_cat_id";

        $query = $this->db->query($sql);

        return $query->result();
    }

    /*
    * get_data_ckeckin
    * get data card dashboard and return data JSON
    * @input
    * @output -
    * @author Naaka Punparich 62160082
    * @Create Date 2564-12-25
    * @Update Date -
    */
    public function get_data_checkin($date_sql)
    {
        $sql = "SELECT 
        COUNT(DATE_FORMAT(`che_date_time_in`, '%Y-%m-%d')) AS count_checkin , 
        DATE_FORMAT(`che_date_time_in`, '%d %M %Y') AS date_checkin 
        FROM dcs_checkin WHERE $date_sql
        GROUP BY DATE_FORMAT(`che_date_time_in`, '%Y-%m-%d')";

        $query = $this->db->query($sql);

        return $query->result();
    }


    /*
    * get_data_pros
    * get data card dashboard and return data JSON
    * @input
    * @output -
    * @author Naaka Punparich 62160082
    * @Create Date 2564-12-27
    * @Update Date -
    */
    public function get_data_pros()
    {
        $sql = "SELECT (SELECT COUNT(tus_id) FROM dcs_tourist) AS tou , 
        (SELECT COUNT(ent_id) FROM dcs_entrepreneur WHERE ent_status = 2) As ent,
        (SELECT COUNT(com_id) FROM dcs_company WHERE com_status = 2) as com, 
        (SELECT COUNT(eve_id) FROM dcs_event WHERE eve_status = 2) as eve
        FROM dcs_admin WHERE 1 GROUP BY tou";

        $query = $this->db->query($sql);

        return $query->result();
    }
}