<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';
/*
* Select_register
* @author Thanisorn thumsawanit 62160088
* @Create Date 2564-07-19
*/
class Select_register extends DCS_controller {
    /*
    * index
<<<<<<< HEAD
    * output Select_register page
    * @input
    * @output -
    * @author Thanisorn thumsawanit 62160088
    * @Create Date 2564-07-19
    * @Update -
=======
    * show select register
    * @input
    * @output -
    * @author Thanisorn thumsawanit 62160088
    * @Create Date 2021-07-15
    * @Update Date -
>>>>>>> 1127f8426e7bcd9f5aa93365c1d1f61bfd393928
    */
    public function index() {
        $this->output_regis('landing_page/register/v_regis');
    }
}