<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once 'Da_dcs_entrepreneur.php';
class M_dcs_entrepreneur extends Da_dcs_entrepreneur
{
    public function __construct()
    {
        parent::__construct();
    }

    function get_all_consider()
    {
        $sql = "SELECT *  from  {$this->db_name}.dcs_entrepreneur  where ent_status = 1";
        $query = $this->db->query($sql);
        return $query;
    }
    function get_all_approve()
    {
        $sql = "SELECT *  from  {$this->db_name}.dcs_entrepreneur  where ent_status = 2";
        $query = $this->db->query($sql);
        return $query;
    }

    public function get_by_id($ent_id)
    {
        $sql = "SELECT * FROM {$this->db_name}.dcs_entrepreneur
                WHERE ent_id = $ent_id";
        $query = $this->db->query($sql);
        return $query;
    }
}
