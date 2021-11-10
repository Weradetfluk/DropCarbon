<?php
/*
* M_dcs_reward
* get data reward
* @author Chutipon Thermsirisuksin 62160081
* @Create Date 2564-10-05
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once "Da_dcs_reward_tourist.php";

class M_dcs_reward_tourist extends Da_dcs_reward_tourist
{
    /*
    * @author Chutipon Thermsirisuksin 62160081
    */
    public function __construct()
    {
        parent::__construct();
    }

    /*
    * get_reward_by_tus_id
    * get reward by tus_id
    * @input $data , $tus_img_tus_id
    * @output reward tourist
    * @author Chutipon Thermsirisuksin 62160081
    * @Create Date 2564-10-05
    * @Update Date -
   */
    function get_reward_by_tus_id($tus_id)
    {
        $sql = "SELECT * FROM dcs_reward_tourist AS rw_tus
                LEFT JOIN dcs_tourist ON rw_tus.ret_tus_id = dcs_tourist.tus_id
                LEFT JOIN dcs_reward ON rw_tus.ret_rew_id = dcs_reward.rew_id
                WHERE rw_tus.ret_tus_id = '$tus_id'";
        return $this->db->query($sql, array($this->tus_id));
    }
}