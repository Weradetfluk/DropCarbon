<?php
/*
* Company_detail
* Manage detail company by entrepreneur
* @author Acharaporn pornpattanasap 62160344
* @Create Date 2564-07-18
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';

class Company_detail extends DCS_controller
{

    /*
    * show_detail_company
    * show detail company by entrepreneur
    * @input com_id
    * @output -
    * @author Acharaporn pornpattanasap 62160344
    * @Create Date 2564-08-05
    * @Update Date -
    */
    public function show_detail_company($com_id)
    {
        $this->load->model('Company/M_dcs_company', 'mcom');
        $this->load->model('Company/M_dcs_com_image', 'mimg');
        $this->mcom->com_id = $com_id;
        $this->mimg->com_img_com_id = $com_id;
        $data["obj_company"] = $this->mcom->get_by_detail()->row();
        $data["arr_image"] = $this->mimg->get_by_com_id()->result();
        $view = 'entrepreneur/manage_company/v_detail_company';
        $this->output_entrepreneur($view, $data);
    }
}
