<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once "Da_dcs_checkin.php";

/*
* M_dcs_checkin
* Manage tourist checkin
* @author Chutipon Thermsirisuksin 62160081
* @Create Date 2564-09-25
*/
class M_dcs_checkin extends Da_dcs_checkin
{

    /*
    * @author Chutipon Thermsirisuksin 62160081
    */
    public function __construct()
    {
        parent::__construct();
    }

    /*
    * get_by_id
    * get data checkin by id
    * @input -
    * @output -
    * @author Chutipon Thermsirisuksin 62160081
    * @Create Date 2564-09-25
    * @Update -
    */
    function get_checkin_by_eve_id($tus_id)
    {
        $sql = "SELECT * FROM dcs_checkin  AS checkin
                LEFT JOIN dcs_event ON checkin.che_eve_id = dcs_event.eve_id
                LEFT JOIN dcs_eve_image ON dcs_eve_image.eve_img_eve_id = dcs_event.eve_id
                WHERE checkin.che_tus_id = '$tus_id' 
                GROUP BY dcs_event.eve_id";
        $query = $this->db->query($sql, array($this->che_id));
        return $query;
    }

    /*
    * get_all
    * get data checkin all
    * @output -
    * @author Chutipon Thermsirisuksin 62160081
    * @Create Date 2564-09-25
    * @Update 2564-09-16
    */
    public function get_all()
    {
        $sql = "SELECT * 
                FROM dcs_checkin";
        $query = $this->db->query($sql);
        return $query;
    }
}