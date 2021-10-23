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
    public function __construct(){
        $this->db = $this->load->database('DCS',true);
        $this->db_name = $this->db->database;
    }
}


