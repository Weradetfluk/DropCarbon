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
     function checkin_or_checkout_event($eve_id){
      
      
        echo json_encode($eve_id);
     }
}
