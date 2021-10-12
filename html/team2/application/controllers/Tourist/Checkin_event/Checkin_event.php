<?php
/*
* Checkin_event.php
* checkin and check out
* @author Weradet Nopsombun  62160079
* @Create Date 2564-10-14
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';
class Checkin_event extends DCS_controller
{
    /*
    * @author Weradet Nopsombun 62160110
    */

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Event/M_dcs_event', 'meve');
    }
    /*
    * show_banner_list
    * show page banner
    * @input
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-10-12
    * @Update Date -
    */
     function check_login_before_check_in($eve_id){ 
            $_SESSION['number_event']     = $eve_id;       
            if (!$this->session->has_userdata("tus_score")) {
              $path = site_url() . "Tourist/Auth/Login_tourist";
              header("Location: " . $path);
              exit();
            }else{
                $path = site_url() . "Tourist/Manage_tourist/Tourist_manage/show_information_tourist";
                header("Location: " . $path);    
            }
         
        }

     function load_data_checkin_ajax($eve_id){
        $this->meve->eve_id = $eve_id;
        $data["arr_event"] = $this->meve->get_event_by_id()->result();

        echo json_encode($data);
     }

     function checkin_or_checkout_event(){

     }

}
