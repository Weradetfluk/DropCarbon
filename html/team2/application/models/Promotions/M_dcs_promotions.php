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
    *get_count_all_admin
    *get data count promotions by form database
    *@input num_status
    *@output -
    *@author Kasama Donwong 62160074
    *@Create Date 2564-12-28
    */
    function get_count_all_admin($num_status)
    {
        $this->db->select('*');
        $this->db->from('dcs_promotions ');
        $this->db->where("pro_status = '$num_status' AND pro_adm_id != 'NULL' AND pro_end_date > CURDATE()");
        $num_results = $this->db->count_all_results();
        return $num_results;
    }
    /*
    *get_count_all_over_admin
    *get data count promotions by form database
    *@input num_status
    *@output -
    *@author Kasama Donwong 62160074
    *@Create Date 2564-12-28
    */
    function get_count_all_over_admin($num_status)
    {
        $this->db->select('*');
        $this->db->from('dcs_promotions ');
        $this->db->where("pro_status = '$num_status' AND pro_adm_id != 'NULL' AND pro_end_date < CURDATE()");
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
    *get_all_data_admin
    *get data event&entrepreneur&company form database
    *@input $limit, $start, $number_status
    *@output entrepreneur data & company data & event data
    *@author Kasama Donwong 62160074
    *@Create Date 2565-01-04
    */
    function get_all_data_admin($limit, $start, $number_status)
    {

        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('dcs_promotions');
        $this->db->join('dcs_company', 'dcs_company.com_id = dcs_promotions.pro_com_id', 'left');
        $this->db->join('dcs_entrepreneur', 'dcs_entrepreneur.ent_id = dcs_company.com_ent_id', 'left');
        $this->db->where("pro_status = '$number_status' AND pro_adm_id != 'NULL' AND pro_end_date > CURDATE()");
        $query = $this->db->get();
        return $query->result();
    }
    /*
    *get_all_data_over_admin
    *get data event&entrepreneur&company form database
    *@input $limit, $start, $number_status
    *@output entrepreneur data & company data & event data
    *@author Kasama Donwong 62160074
    *@Create Date 2565-01-04
    */
    function get_all_data_over_admin($limit, $start, $number_status)
    {

        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('dcs_promotions');
        $this->db->join('dcs_company', 'dcs_company.com_id = dcs_promotions.pro_com_id', 'left');
        $this->db->join('dcs_entrepreneur', 'dcs_entrepreneur.ent_id = dcs_company.com_ent_id', 'left');
        $this->db->where("pro_status = '$number_status' AND pro_adm_id != 'NULL' AND pro_end_date < CURDATE()");
        $query = $this->db->get();
        return $query->result();
    }

    /*
    *get_all_data_not_over
    *get data promotions&entrepreneur&company form database
    *@input $limit, $start, $number_status
    *@output entrepreneur data & company data & promotions data
    *@author Nantasiri Saiwaew 62160093
    *@Create Date 2564-10-04
    */
    function get_all_data_not_over($limit, $start, $number_status)
    {
        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('dcs_promotions');
        $this->db->join('dcs_company', 'dcs_company.com_id = dcs_promotions.pro_com_id', 'left');
        $this->db->join('dcs_entrepreneur', 'dcs_entrepreneur.ent_id = dcs_company.com_ent_id', 'left');
        $this->db->where("pro_status = '$number_status' AND pro_end_date > CURDATE()");
        $query = $this->db->get();
        return $query->result();
    }

    /*
    *get_count_all_not_over
    *get data count promotion by form database
    *@input num_status
    *@output -
    *@author Kasama Donwong 62160074
    *@Create Date 2564-09-24
    */
    function get_count_all_not_over($num_status)
    {
        $this->db->select('*');
        $this->db->from('dcs_promotions ');
        $this->db->where("pro_status = '$num_status'  AND pro_end_date > CURDATE()");
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
        $this->db->from('dcs_promotions');
        $this->db->join('dcs_company', 'dcs_company.com_id = dcs_promotions.pro_com_id', 'left');
        $this->db->join('dcs_entrepreneur', 'dcs_entrepreneur.ent_id = dcs_company.com_ent_id', 'left');
        $this->db->group_start();
        $this->db->like('pro_name', $search);
        $this->db->or_like('ent_firstname', $search);
        $this->db->or_like('ent_lastname', $search);
        $this->db->or_like('com_name', $search);
        $this->db->group_end();
        $this->db->where("pro_status = '$number_status' AND pro_end_date > CURDATE()");
        $query = $this->db->get();
        return $query;
    }

    /*get_all_data_over
       *get data event&entrepreneur&promotion form database
       *@input $limit, $start, $number_status
       *@output entrepreneur data & promotion data & event data
       *@author Kasama Donwong 62160074
       *@Create Date 2564-09-24
       */
    function get_all_data_over($limit, $start, $number_status)
    {
        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('dcs_promotions');
        $this->db->join('dcs_company', 'dcs_company.com_id = dcs_promotions.pro_com_id', 'left');
        $this->db->join('dcs_entrepreneur', 'dcs_entrepreneur.ent_id = dcs_company.com_ent_id', 'left');
        $this->db->where("pro_status = '$number_status' AND pro_end_date < CURDATE()");
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
        $this->db->from('dcs_promotions ');
        $this->db->where("pro_status = '$num_status'  AND pro_end_date < CURDATE()");
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
        $this->db->from('dcs_promotions');
        $this->db->join('dcs_company', 'dcs_company.com_id = dcs_promotionst.pro_com_id', 'left');
        $this->db->join('dcs_entrepreneur', 'dcs_entrepreneur.ent_id = dcs_company.com_ent_id', 'left');
        $this->db->group_start();
        $this->db->like('pro_name', $search);
        $this->db->or_like('ent_firstname', $search);
        $this->db->or_like('ent_lastname', $search);
        $this->db->or_like('com_name', $search);
        $this->db->group_end();
        $this->db->where("pro_status = '$number_status'    AND pro_end_date < CURDATE()");
        $query = $this->db->get();
        return $query;
    }

    /*
    *get_data_card_promo
    *get data card promotions form database sum row
    *@input -
    *@output -
    *@author Kasama Donwong 62160074
    *@Create Date 2564-08-25
    */
    function get_data_card_promo()
    {
        $sql = "SELECT count(case when pro_status = 1 then 1 end ) as pro_consider, 
        count(case when pro_status = 2  and pro_end_date > CURDATE() then 1  end) as pro_not_over , 
        count(case when pro_status = 2  and pro_end_date < CURDATE() then 1  end) as pro_over , 
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
    *get_search_admin
    *get data with search
    *@input number_status, search
    *@output -
    *@author Kasama Donwong 62160074
    *@Create Date 2565-01-04
    *@Update Date -
    */
    function get_search_admin($search, $number_status)
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
        $this->db->where("pro_status = '$number_status' AND pro_end_date > CURDATE() AND pro_adm_id != 'NULL'");
        $query = $this->db->get();
        return $query;
    }
    /*
    *get_search_over_admin
    *get data with search
    *@input number_status, search
    *@output -
    *@author Kasama Donwong 62160074
    *@Create Date 2565-01-04
    *@Update Date -
    */
    function get_search_over_admin($search, $number_status)
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
        $this->db->where("pro_status = '$number_status' AND pro_end_date < CURDATE() AND pro_adm_id != 'NULL'");
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
    *get_promotions_and_img
    *get data form database
    *@input number_status
    *@output -
    *@author Chutipon Thermsirisuksin 62160081
    *@Create Date 2564-10-02
    */
    public function get_promotions_and_img($number_status, $post, $date_now)
    {
        $and = "";
        if (isset($post["value_search"]) && $post["value_search"] !== "") {
            $and .= " AND dcs_promotions.pro_name LIKE '%" . $post["value_search"] . "%'";
        }

        if (isset($post["pro_cat_id"]) && $post["pro_cat_id"] !== "") {
            $and .= " AND dcs_promotions.pro_cat_id = " . $post["pro_cat_id"] . "";
        }

        $sql = "SELECT dcs_promotions.pro_point,dcs_promotions.pro_id, dcs_promotions.pro_name,dcs_promotions.pro_description,dcs_promotions.pro_cat_id,dcs_pro_image.pro_img_path 
        from dcs_promotions
        RIGHT JOIN dcs_pro_image
        ON  dcs_promotions.pro_id = dcs_pro_image.pro_img_pro_id
        WHERE pro_status = '$number_status' AND ('$date_now' BETWEEN dcs_promotions.pro_start_date AND dcs_promotions.pro_end_date)
        $and
        GROUP BY dcs_promotions.pro_id";
        $query = $this->db->query($sql);
        return $query;
    }

    /*
    * get_promotions_landing_page
    * get data promotions Landing page
    * @input pro_id
    * @output -
    * @author Weradet Nopsombun
    * @Create Date 2564-10-26
    * @Update 2564-10-26
    */
    public function get_promotions_landing_page($date_now)
    {
        $sql = "SELECT dcs_promotions.pro_point,dcs_promotions.pro_id, dcs_promotions.pro_name,dcs_promotions.pro_description,dcs_promotions.pro_cat_id,dcs_pro_image.pro_img_path 
        from dcs_promotions
        RIGHT JOIN dcs_pro_image
        ON  dcs_promotions.pro_id = dcs_pro_image.pro_img_pro_id
        WHERE pro_status = 2 AND ('$date_now' BETWEEN dcs_promotions.pro_start_date AND dcs_promotions.pro_end_date)
        GROUP BY dcs_promotions.pro_id
        LIMIT 4  ";

        $query = $this->db->query($sql);
        return $query;
    }


    /*
    * get_promotion_by_com_id
    * get data promotions by com_id
    * @input com_id
    * @output -
    * @author Jutamas Thaptong 62160079
    * @Create Date 2564-09-14
    */
    public function get_promotion_by_com_id($com_id)
    {
        $sql = "SELECT dcs_promotions.pro_id, dcs_promotions.pro_name,dcs_promotions.pro_description,dcs_pro_image.pro_img_path 
        from dcs_promotions
        LEFT JOIN dcs_pro_image
        ON  dcs_promotions.pro_id = dcs_pro_image.pro_img_pro_id
        WHERE pro_status = '2'
        AND dcs_promotions.pro_com_id = '" . $com_id . "'
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
        LEFT JOIN {$this->db_name}.dcs_parish AS par
        ON com.com_par_id = par.par_id
        LEFT JOIN {$this->db_name}.dcs_district AS dis
        ON par.par_dis_id = dis.dis_id
        LEFT JOIN {$this->db_name}.dcs_province AS prv
        ON dis.dis_prv_id = prv.prv_id
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
    function get_promotion_by_ent_id($ent_id)
    {
        $sql = "SELECT * FROM {$this->db_name}.dcs_promotions 
                LEFT JOIN dcs_company
                ON dcs_promotions.pro_com_id = dcs_company.com_id
                WHERE pro_status != 4 AND dcs_company.com_ent_id = $ent_id AND dcs_promotions.pro_adm_id IS NULL
                ORDER BY dcs_promotions.pro_add_date DESC";
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
    function get_by_name()
    {
        $sql = "SELECT * FROM {$this->db_name}.dcs_promotions 
                WHERE pro_status != 4 AND pro_name = ?";
        return $this->db->query($sql, array($this->pro_name));
    }

    /*
    *get_count_pro_ent_all
    *get data count from promotions entrepreneur all
    *@input -
    *@output -
    *@author Chutipon Thermsirisuksin 62160081
    *@Create Date 2565-03-08
    */
    function get_count_pro_ent_all($date_sql)
    {
        $sql = "SELECT CONCAT(dcs_entrepreneur.ent_firstname, ' ' , dcs_entrepreneur.ent_lastname) as name , COUNT(dcs_promotions.pro_name) / (SELECT COUNT(*) FROM dcs_entrepreneur)* 100 as per
                FROM dcs_entrepreneur
                LEFT JOIN dcs_company ON dcs_company.com_ent_id = dcs_entrepreneur.ent_id
                LEFT JOIN dcs_promotions ON dcs_promotions.pro_com_id = dcs_company.com_id
                WHERE $date_sql AND dcs_entrepreneur.ent_status = 2
                GROUP BY dcs_entrepreneur.ent_id";
        $result = $this->db->query($sql);
        return $result;
    }

    /*
    *get_count_pro_adm_all
    *get data count from promotions admin all pie chart
    *@input -
    *@output -
    *@author Chutipon Thermsirisuksin 62160081
    *@Create Date 2565-03-08
    */
    function get_count_pro_adm_all($date_sql)
    {
        $sql = "SELECT COUNT(dcs_promotions.pro_adm_id) * 100 / (SELECT COUNT(*) FROM dcs_promotions) as per
                FROM dcs_promotions 
                WHERE $date_sql AND pro_status != 4";
        return $this->db->query($sql);
    }

    /*
    *get_result_pro_ent_all
    *get result promotion entrepreneur
    *@input -
    *@output -
    *@author Chutipon Thermsirisuksin 62160081
    *@Create Date 2565-03-08
    */
    function get_result_pro_ent_all($date_sql)
    {
        $sql = "SELECT ( ((SELECT COUNT(*) FROM dcs_promotions) - COUNT(dcs_promotions.pro_adm_id)) * 100 ) / (SELECT COUNT(*) FROM dcs_promotions) as per
                FROM dcs_promotions 
                WHERE $date_sql";
        return $this->db->query($sql);
    }

    /*
    *get_count_pro_end_ent
    *get count promotion end entrepreneur 
    *@input -
    *@output -
    *@author Chutipon Thermsirisuksin 62160081
    *@Create Date 2565-03-17
    */
    function get_count_pro_end_ent($date_sql, $date_end)
    {
        $sql = "SELECT DATE_FORMAT(dcs_promotions.pro_end_date, '%d %M %Y') as end_date, COUNT(*) as count_pro_end 
        FROM dcs_promotions
        WHERE $date_sql
        AND dcs_promotions.pro_end_date 
        AND (dcs_promotions.pro_status = 2 
        AND dcs_promotions.pro_adm_id IS NULL
        AND $date_end)
        GROUP BY end_date";
        return $this->db->query($sql);
    }

    /*
    *get_count_pro_end_adm
    *get count promotion end admin pie chart
    *@input -
    *@output -
    *@author Chutipon Thermsirisuksin 62160081
    *@Create Date 2565-03-17
    */
    function get_count_pro_end_adm($date_sql, $date_end)
    {
        $sql = "SELECT DATE_FORMAT(dcs_promotions.pro_end_date, '%d %M %Y') as end_date, COUNT(*) as count_pro_end 
        FROM dcs_promotions
        WHERE $date_sql
        AND dcs_promotions.pro_end_date 
        AND (dcs_promotions.pro_status = 2 
        AND dcs_promotions.pro_adm_id IS NOT NULL
        AND $date_end)
        GROUP BY end_date";
        return $this->db->query($sql);
    }

    /*
    * get_pro_mobile
    * get_pro_mobile
    * @input -
    * @output -
    * @author Chutipon Thermsirisuksin 62160081
    * @Create Date 2564-03-13
    */
    public function get_pro_mobile($and = null)
    {

        if($and != null){
            $and = " AND dcs_promotions.pro_name LIKE '%" . $and . "%'";
        }else{
            $and = "";
        }
        $sql = "SELECT dcs_promotions.pro_id,dcs_promotions.pro_name,dcs_promotions.pro_description,dcs_promotions.pro_add_date,dcs_promotions.pro_start_date,
        dcs_promotions.pro_end_date,dcs_pro_category.pro_cat_name,dcs_pro_image.pro_img_path,dcs_pro_image.pro_img_name
        FROM dcs_promotions
        LEFT JOIN dcs_pro_category
        ON dcs_promotions.pro_cat_id = dcs_pro_category.pro_cat_id
        LEFT JOIN dcs_pro_image 
        ON dcs_promotions.pro_id = dcs_pro_image.pro_img_pro_id
        WHERE dcs_promotions.pro_status = 2 $and
        GROUP BY dcs_promotions.pro_id";

        $query = $this->db->query($sql);
        return $query;
    }
}
