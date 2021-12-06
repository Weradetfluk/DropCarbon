<?php
/*
* Admin_view_dashboard
* Admin_view_dashboard show and get data and fiter data
* @author weradet nopsombun 62160110
* @Create Date 2564-11-27
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';
class Admin_view_dashboard extends DCS_controller
{
    /*
    * @author Weradet Nopsombun 62160110
    */

    public function __construct()
    {
        parent::__construct();
    }

    /*
    * index
    * show page dashboard
    * @input
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-11-27
    * @Update Date -
    */
    public function index()
    {
        $_SESSION['tab_number'] = 1; //set tab number in topbar_admin.php
        $this->output_admin('admin/manage_dashboard/v_dashboard', null, null);
    }
}
