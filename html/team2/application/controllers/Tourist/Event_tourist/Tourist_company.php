<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';
/*
* Tourist_company
* Tourist company controller system
* @author Jutamas Thaptong 62160079
* @Create Date 2564-09-14
*/
class Tourist_company extends DCS_controller
{
    /*
    * show_tourist_companylist
    * show list company tourist page 
    * @input -
    * @output -
    * @author Jutamas Thaptong 62160079
    * @Create Date 2564-09-14
   */
    public function show_company_list()
    {
        $this->load->model('Company/M_dcs_company', 'mcom');
        $nunber_status = 2;
        $data["company"] = $this->mcom->get_company_and_img($nunber_status)->result();
        $this->output_company('tourist/company_tourist/v_list_company_tourist', 'template/Tourist/topbar_tourist',$data);
    }

    /*
    * show_detaicompany_tourist
    * show detail company tourist page 
    * @input -
    * @output -
    * @author Jutamas Thaptong 62160079
    * @Create Date 2564-09-14
   */
    public function show_tourist_company_detail($com_id)
    {
        $this->load->model('Company/M_dcs_company', 'mcom');
        $this->load->model('Company/M_dcs_com_image', 'mimg');
        $this->mimg->com_img_com_id = $com_id;
        $this->mcom->com_id = $com_id;
        $data["image"] = $this->mimg->get_by_com_id()->row();
        $data["company"] = $this->mcom->get_by_detail()->row();
        $this->output_company('tourist/company_tourist/v_detail_company_tourist', 'template/Tourist/topbar_tourist',$data);

    }

 
 
}
