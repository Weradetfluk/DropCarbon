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
    * get_pro_cat
    * get data promotion 
    * @input -
    * @output -
    * @author Chutipon Thermsirisuksin 62160081
    * @Create Date 2564-10-02
    * @Update -
    */
    public function get_pro_cat()
    {
        $sql = "SELECT * FROM dcs_promotions AS pro
        LEFT JOIN {$this->db_name}.dcs_pro_category AS cat 
        ON pro.pro_cat_id = cat.pro_cat_id";
        return $this->db->query($sql);
    }

    /*
    *get_promotion_and_img
    *get data form database
    *@input number_status
    *@output -
    *@author Chutipon Thermsirisuksin 62160081
    *@Create Date 2564-10-02
    */
    public function get_promotions_and_img($number_status, $post)
    {
        $and = "";
        if (isset($post["value_search"]) && $post["value_search"] !== "") {
            $and .= " AND dcs_promotions.pro_name LIKE '%" . $post["value_search"] . "%'";
        }

        if (isset($post["pro_cat_id"]) && $post["pro_cat_id"] !== "") {
            $and .= " AND dcs_promotions.pro_cat_id = " . $post["pro_cat_id"] . "";
        }

        $sql = "SELECT dcs_promotions.pro_id, dcs_promotions.pro_name,dcs_promotions.pro_description,dcs_pro_image.pro_img_path 
        from dcs_promotions
        RIGHT JOIN dcs_pro_image
        ON  dcs_promotions.pro_id = dcs_pro_image.pro_img_adm_id
        WHERE pro_status = '" . $number_status . "'
        $and
        GROUP BY dcs_promotions.pro_id";
        $query = $this->db->query($sql);
        return $query;
    }

    /*
    *get_by_detail
    *get data form database
    *@input pro_id
    *@output -
    *@author Chutipon Thermsirisuksin 62160081
    *@Create Date 2564-10-02
    */
    public function get_by_detail()
    {
        $sql = "SELECT * 
        FROM {$this->db_name}.dcs_promotions AS pro
        LEFT JOIN {$this->db_name}.dcs_pro_image AS img ON pro.pro_id = img.pro_img_pro_id 
        LEFT JOIN {$this->db_name}.dcs_company AS com ON pro.pro_com_id = com.com_id
        LEFT JOIN {$this->db_name}.dcs_pro_category AS cat ON pro.pro_cat_id = cat.pro_cat_id
        LEFT JOIN {$this->db_name}.dcs_entrepreneur AS ent ON com.com_ent_id = ent.ent_id
        LEFT JOIN {$this->db_name}.dcs_promotion_reject AS rej ON pro.pro_id = rej.prr_pro_id
        WHERE pro.pro_id=?";
        $query = $this->db->query($sql, array($this->pro_id));
        return $query;
    }
    /*
    *get_all
    *get data form database
    *@input pro_id
    *@output -
    *@author Chutipon Thermsirisuksin 62160081
    *@Create Date 2564-10-02
    */
    public function get_all()
    {
        $sql = "SELECT * 
                FROM dcs_promotions";
        $query = $this->db->query($sql);
        return $query;
    }

    /*
    *get_promotion_by_ent_id
    *get data promotion by ent_id
    *@input ent_id
    *@output -
    *@author Suwapat Saowarod 62160340
    *@Create Date 2564-10-02
    */
    function get_promotion_by_ent_id($ent_id){
        $sql = "SELECT * FROM {$this->db_name}.dcs_promotions 
                LEFT JOIN dcs_company
                ON dcs_promotions.pro_com_id = dcs_company.com_id
                WHERE pro_status != 4 AND com_ent_id = $ent_id";
        return $this->db->query($sql);
    }

    /*
    *get_by_name
    *get get data by name
    *@input pro_name
    *@output -
    *@author Suwapat Saowarod 62160340
    *@Create Date 2564-10-02
    */
    function get_by_name(){
        $sql = "SELECT * FROM {$this->db_name}.dcs_promotions 
                WHERE pro_status != 4 AND pro_name = ?";
        return $this->db->query($sql, array($this->pro_name));
    }
}