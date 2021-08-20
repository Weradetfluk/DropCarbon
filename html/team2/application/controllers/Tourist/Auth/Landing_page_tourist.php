<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';

   /*
    * Landing_page_tourist
    * Manage Landing page tourist 
    * @author Jutamas Thaptong 62160079
    * @Create Date 2564-08-02
    */

class Landing_page_tourist extends DCS_controller
{

     /*
    * output_Landing_page
    * show Landing page tourist for every one
    * @input $view
    * @output -
    * @author Jutamas Thaptong 62160079
    * @Create Date 2564-08-02
    */

    public function index()
    {
        $this->output_Landing_page_tourist();
    }

    
}