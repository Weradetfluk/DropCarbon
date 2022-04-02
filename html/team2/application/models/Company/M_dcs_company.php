<?php
/*
* M_dcs_company
* get data company
* @author Suwapat Saowarod 62160340
* @Create Date 2564-07-19
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once "Da_dcs_company.php";
class M_dcs_company extends Da_dcs_company
{
    /*
    * get_all
    * get data company
    * @input com_ent_id
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-07-19
    * @Update 2564-09-16
    */
    public function get_all()
    {
        $sql = "
            SELECT * 
            FROM dcs_company
            WHERE 1
        ";

        $query = $this->db->query($sql);
        return $query;
    }


    /*
    * get_company_and_img
    * get data company
    * @input com_ent_id, number_status, post, com_cat_id
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-07-19
    * @Update 2564-09-16
    */
    public function get_company_and_img($number_status, $post)
    {

        $and = "";
        if (isset($post["value_search"]) && $post["value_search"] !== "") {
            $and .= " AND dcs_company.com_name LIKE '%" . $post["value_search"] . "%'";
        }

        if (isset($post["com_cat_id"]) && $post["com_cat_id"] !== "") {
            $and .= " AND dcs_company.com_cat_id = " . $post["com_cat_id"] . "";
        }

        $sql = "SELECT dcs_company.com_id, dcs_company.com_name,dcs_company.com_description,dcs_com_image.com_img_path 
        from dcs_company 
        LEFT JOIN dcs_com_image
        ON  dcs_company.com_id = dcs_com_image.com_img_com_id
        WHERE com_status = '" . $number_status . "'
        $and
        GROUP BY dcs_company.com_id";
        $query = $this->db->query($sql);
        return $query;
    }



     /*
    * get_company_landing_page
    * get data company Landing page
    * @input com_ent_id
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-07-19
    * @Update 2564-09-16
    */
    public function get_company_landing_page(){
        $sql = "SELECT dcs_company.com_id, dcs_company.com_name,dcs_company.com_description,dcs_com_image.com_img_path 
        from dcs_company 
        LEFT JOIN dcs_com_image
        ON  dcs_company.com_id = dcs_com_image.com_img_com_id
        WHERE com_status = 2
        GROUP BY dcs_company.com_id
        ORDER by com_num_visitor DESC 
        LIMIT 5 ";

        $query = $this->db->query($sql);
        return $query;
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
        $sql = "SELECT com.com_id, com.com_name, com.com_lat, com.com_lon, com.com_description, com.com_num_visitor, com.com_cat_id, com.com_par_id, com.com_tel, com.com_location, dis.dis_id, prv.prv_id  FROM dcs_company AS com
                LEFT JOIN dcs_parish AS par
                ON com.com_par_id = par.par_id
                LEFT JOIN dcs_district AS dis
                ON par.par_dis_id = dis.dis_id
                LEFT JOIN dcs_province AS prv
                ON dis.dis_prv_id = prv.prv_id
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
    *@Update Date 2564-09-19
    */
    function get_search($search, $number_status)
    {

        $this->db->select('*');
        $this->db->from('dcs_company');
        $this->db->join('dcs_entrepreneur', 'dcs_entrepreneur.ent_id = dcs_company.com_ent_id', 'left');
        $this->db->group_start();
        $this->db->like('ent_firstname', $search);
        $this->db->or_like('ent_lastname', $search);
        $this->db->or_like('ent_email', $search);
        $this->db->or_like('com_name', $search);
        $this->db->group_end();
        $this->db->where("com_status = '$number_status'");
        $query = $this->db->get();
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
        $sql = "SELECT * FROM {$this->db_name}.dcs_company where com_name =  ?";
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
        LEFT JOIN {$this->db_name}.dcs_com_category 
        ON detail.com_cat_id = dcs_com_category.com_cat_id
        LEFT JOIN {$this->db_name}.dcs_entrepreneur AS ent 
        ON detail.com_ent_id = ent.ent_id
        LEFT JOIN {$this->db_name}.dcs_company_reject AS rej 
        ON detail.com_id = rej.cor_com_id
        LEFT JOIN {$this->db_name}.dcs_parish AS par
        ON detail.com_par_id = par.par_id
        LEFT JOIN {$this->db_name}.dcs_district AS dis
        ON par.par_dis_id = dis.dis_id
        LEFT JOIN {$this->db_name}.dcs_province AS prv
        ON dis.dis_prv_id = prv.prv_id
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

    /*
    * get_by_ent_id
    * get data company by entrepreneur id
    * @input com_ent_id
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-09-16
    * @Update -
    */
    public function get_by_ent_id()
    {
        $sql = "SELECT * FROM dcs_company 
                WHERE  com_status != 4 AND com_ent_id = ?";
        return $this->db->query($sql, array($this->com_ent_id));
    }

    /*
    * get_by_ent_id_approve
    * get data company approved by entrepreneur id
    * @input com_ent_id
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-09-29
    * @Update -
    */
    public function get_by_ent_id_approve()
    {
        $sql = "SELECT * FROM dcs_company 
                WHERE  com_status = 2 AND com_ent_id = ?";
        return $this->db->query($sql, array($this->com_ent_id));
    }

     /*
    * get_by_com_approve
    * get data company approved by entrepreneur id
    * @input com_ent_id
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-09-29
    * @Update -
    */
    public function get_by_com_approve()
    {
        $sql = "SELECT * FROM dcs_company 
                WHERE  com_status = 2";
        return $this->db->query($sql);
    }
    
    /*
    * get_company_mobile
    * get_company_mobile
    * @input -
    * @output -
    * @author Thanisorn thumsawanit 62160088
    * @Create Date 2564-03-13
    */
    public function get_company_mobile($and = null)
    {

        if($and != null){
            $and = " AND com.com_name LIKE '%" . $and . "%'";
        }else{
            $and = "";
        }
        $sql = "SELECT com.com_id, com.com_name, dcs_com_image.com_img_path, com.com_lat, com.com_lon, com.com_description, com.com_cat_id, com.com_cat_name ,com.com_par_id, com.com_tel, com.com_location, dis.dis_id, prv.prv_id FROM dcs_company AS com
        LEFT JOIN dcs_com_image
        ON  dcs_company.com_id = dcs_com_image.com_img_com_id
        LEFT JOIN dcs_parish AS par
        ON dcs_company.com_par_id = par.par_id
        LEFT JOIN dcs_district AS dis
        ON par.par_dis_id = dis.dis_id
        LEFT JOIN dcs_province AS prv
        ON dis.dis_prv_id = prv.prv_id
        WHERE com_status = 2 $and
        GROUP BY dcs_company.com_id";

        $query = $this->db->query($sql);
        return $query;
    }
}