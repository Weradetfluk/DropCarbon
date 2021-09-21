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
    public function show_tourist_company_list()
    {
        $id=1;
        $this->load->model('Tourist/M_dcs_company_tourist', 'mcom');
        $this->load->model('Company/M_dcs_com_image', 'mimg');
        $data["company"] = $this->mcom->get_by_detail($id)->result();
        $data["image"] = $this->mimg->get_by_com_id($id)->result();
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
    public function show_tourist_company_detail()
    {
        $id=1;
        $this->load->model('Tourist/M_dcs_company_tourist', 'mcom');
        $this->load->model('Company/M_dcs_com_image', 'mimg');
        $data["company"] = $this->mcom->get_by_detail($id)->result();
        $data["image"] = $this->mimg->get_by_com_id()->result();
        $this->output_company('tourist/company_tourist/v_detail_company_tourist', 'template/Tourist/topbar_tourist',$data);

    }

    /*
    * show_tourist_eventlist_login
    * show list event tourist page and change topbar
    * @input -
    * @output -
    * @author Jutamas Thaptong 62160079
    * @Create Date 2564-09-14
   */
  public function show_tourist_company_list_login()
  {
      $this->output_company('tourist/company_tourist/v_list_company_tourist', 'template/Tourist/topbar_tourist_login');
  }
  
  /*
  * show_detailevent_tourist_login
  * show detail event tourist page and change topbar
  * @input -
  * @output -
  * @author Jutamas Thaptong 62160079
  * @Create Date 2564-09-14
 */
  public function show_tourist_company_detail_login()
  {
      $this->output_company('tourist/company_tourist/v_detail_company_tourist', 'template/Tourist/topbar_tourist_login');
  }
 
}
