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
        $sql = "SELECT (SELECT COUNT(tus_id) FROM dcs_tourist) AS tou , (SELECT COUNT(ent_id) FROM dcs_entrepreneur WHERE ent_status = 2) As ent,
        (SELECT COUNT(com_id) FROM dcs_company WHERE com_status = 2) as com, (SELECT COUNT(eve_id) FROM dcs_event WHERE eve_status = 2) as eve, 
        (SELECT COUNT(pro_id) FROM dcs_promotions WHERE pro_status = 2) as pro
        FROM dcs_admin WHERE 1 GROUP BY tou;";

        $query = $this->db->query($sql);

        return $query;
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
    public function get_data_dashboard_event_cat_admin()
    {
        $sql = "SELECT dcs_eve_category.eve_cat_id, dcs_eve_category.eve_cat_name,count(case when dcs_checkin.che_status = 1 then 1  end) as chekin_number
        FROM dcs_eve_category 
        LEFT JOIN dcs_event 
        on dcs_eve_category.eve_cat_id = dcs_event.eve_id
        LEFT JOIN dcs_checkin 
        ON dcs_event.eve_id = dcs_checkin.che_eve_id
        WHERE 1
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
    public function get_data_dashboard_event_per_admin()
    {
        $sql = "SELECT dcs_eve_category.eve_cat_id, dcs_eve_category.eve_cat_name,count(che_id) as chekin_number, (SELECT COUNT(che_id) FROM dcs_checkin) as total_checkin, count(che_id) / (SELECT COUNT(che_id) FROM dcs_checkin) * 100 as per
        FROM dcs_eve_category 
        LEFT JOIN dcs_event 
        on dcs_eve_category.eve_cat_id = dcs_event.eve_id
        LEFT JOIN dcs_checkin 
        ON dcs_event.eve_id = dcs_checkin.che_eve_id
        GROUP BY dcs_eve_category.eve_cat_id";

        $query = $this->db->query($sql);

        return $query->result();
    }
}
