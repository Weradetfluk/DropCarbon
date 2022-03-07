<?php
/*
* Promotion_detail
* Manage detail promotion by entrepreneur
* @author Priyarat Bumrungkit 62160156
* @Create Date 2564-10-01
*/

defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';

class Promotion_detail extends DCS_controller
{

    /*
    * show_detail_promotion
    * show detail promotion
    * @input pro_id
    * @output -
    * @author Priyarat Bumrungkit 62160156
    * @Create Date 2564-10-01
    * @Update Date -
    */
    public function show_detail_promotion($pro_id){

        $this->load->model('Promotions/M_dcs_promotions', 'mpro');
        $this->mpro->pro_id = $pro_id;
        $data["arr_promotion"] = $this->mpro->get_by_detail()->result();
        $view = 'entrepreneur/manage_promotion/v_detail_promotion';
        $this->output_entrepreneur($view, $data);
    }
}
