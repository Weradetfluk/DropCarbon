<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once "Da_dcs_com_image.php";
class M_dcs_com_image extends Da_dcs_com_image{
    public function __construct()
    {
        parent::__construct();
    }
    public function get_by_com_id(){
        $sql = "SELECT * FROM dcs_com_image
                WHERE com_img_com_id = ?";
        return $this->db->query($sql, array($this->com_img_com_id));
    }
}