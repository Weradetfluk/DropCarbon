<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';
/*
* Landing_page
* Landing page controller system
* @author Naaka punparich 62160082
* @Create Date 2564-07-24
*/
class Landing_page extends DCS_controller
{
    /*
     * index
     * show Landing page
     * @input -
     * @output -
     * @author Naaka Punparich 62160082
     * @Create Date 2564-07-24
    */
    public function index()
    {
        $this->output_Landing_page();
    }
}
