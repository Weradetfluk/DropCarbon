<?php
/*
* Admin_approval_company
* Admin_approval_company
* @author Kasama Donwong 62160074
* @Create Date 2564-08-08
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';
class Admin_approval_company extends DCS_controller
{
  /*
  * @author Kasama Donwong 62160074
  */
  public function __construct()
  {
    parent::__construct();
    $this->load->library('email');
    $this->load->library('pagination');
    $this->load->model('Company/M_dcs_company', 'mdcc');
  }

  /*
  * index
  * call function in Dcs_controller
  * @input - 
  * @output -
  * @author Kasama Donwong 62160074
  * @Create Date 2564-08-08
  * @Update Date -
  */
  public function index()
  {
    $this->show_data_consider();
  }

  /*
  * show_data_consider
  * get all data company consider and show table
  * @input -
  * @output -
  * @author Kasama Donwong 62160074
  * @Create Date 2564-08-08
  * @Update Date -
  */
  public function show_data_consider()
  {
    $_SESSION['tab_number'] = 3; //set tab number in topbar_admin.php
    $this->output_admin('admin/manage_company/v_list_company_consider', null, 'admin/manage_company/v_data_card_company');
  }

  /*
  * show_data_approve
  * get all data company approve  and show table by ajax
  * @input -
  * @output -
  * @author Kasama Donwong 62160074
  * @Create Date 2564-07-17
  * @Update Date -
  */
  public function show_data_approve()
  {
    $this->output_admin('admin/manage_company/v_list_company_approve', null, 'admin/manage_company/v_data_card_company');
  }

  /*
  * show_data_reject
  * get all data company reject  and show table by ajax
  * @input -
  * @output -
  * @author Nantasiri Saiwaew 62160093
  * @Create Date 2564-08-10
  * @Update Date -
  */
  public function show_data_reject()
  {
    $this->output_admin('admin/manage_company/v_list_company_reject', null, 'admin/manage_company/v_data_card_company');
  }

  /*
  * get_company_by_id_ajax
  * get all data company by id 
  * @input com_id
  * @output data
  * @author Kasama Donwong 62160074
  * @Create Date 2564-08-08
  * @Update Date
  */
  public function get_company_by_id_ajax()
  {
    $this->load->model('Document/M_dcs_document', 'mdoc');
    $this->mdoc->doc_com_id = $this->input->post('com_id');
    $data['arr_file'] = $this->mdoc->get_by_com_id()->result();
    $this->mdcc->com_id = $this->input->post('com_id');
    $data['arr_data'] = $this->mdcc->get_company_by_id()->result();
    echo json_encode($data);
  }

  /*
  * get_com_reject_by_id_ajax
  * get all data reject company by id
  * @input com_id
  * @output -
  * @author Nantasiri Saiwaew 62160110
  * @Create Date 2564-09-21
  * @Update Date -
  */
  public function get_com_reject_by_id_ajax()
  {
    $this->load->model('Company/M_dcs_com_reject', 'mdrc');
    $com_id = $this->input->post('com_id');
    $data['arr_data'] = $this->mdrc->get_data_rejected_by_id_com($com_id)->result();

    echo json_encode($data['arr_data']);
  }

  /*
  * approval_company
  * change com_status 
  * @input com_id
  * @output -
  * @author Kasama Donwong 62160074
  * @Create Date 2564-08-08
  * @Update Date -
  */
  public function approval_company()
  {
    $this->mdcc->com_id = $this->input->post('com_id');
    $status_number = 2;
    $this->mdcc->update_status($status_number);
  }

  /*
  * reject_company
  * change com_status and send email to entrepreneur 
  * @input com_id, admin_reason, email, Admin_id
  * @output -
  * @author Nantasiri Saiwaew 62160093
  * @Create Date 2564-08-10
  * @Update Date -
  */
  public function reject_company()
  {

    // set value from font end
    $this->mdcc->com_id = $this->input->post('com_id');



    // set data for send mail
    $reson_admin = $this->input->post('admin_reason');
    $user_email = $this->input->post('email');
    $mail_subject = 'Admin has rejected your company';
    $mail_content_header = "คุณถูกปฎิเสธการเพิ่มสถานที่";
    $cor_com_id = $this->input->post('com_id');
    $admin_id =  $this->session->userdata("admin_id");



    //load model for save rejected data
    $this->load->model('Company/M_dcs_com_reject', 'mdcre');


    //save data reject to data base
    $this->mdcre->cor_admin_reason = $reson_admin;
    $this->mdcre->cor_com_id =  $cor_com_id;
    $this->mdcre->cor_adm_id = $admin_id;

    $this->mdcre->insert();


    //update status entrepreneur
    $status_number = 3;
    $this->mdcc->update_status($status_number);



    $this->email_send($reson_admin, $user_email, $mail_subject, $mail_content_header);
  }

  /*
    * show_detail_company
    * show detail company
    * @input com_id
    * @output -
    * @author weradet nopsombun 62160110 
    * @Create Date 2021-08-20
    * @Update Date -
    */
  public function show_detail_company($com_id)
  {
    $this->load->model('Company/M_dcs_company', 'mcom');
    $this->load->model('Company/M_dcs_com_image', 'mimg');
    $this->mcom->com_id = $com_id;
    $this->mimg->com_img_com_id = $com_id;
    $data["arr_company"] = $this->mcom->get_by_detail()->row();
    $data["arr_image"] = $this->mimg->get_by_com_id()->result();

    $this->output_admin('admin/manage_company/v_detail_company_admin', $data);
  }

  /*
      * get_data_card_company_ajax
      * get data consider, approve, rejected <- number of people
      * @input - 
      * @output -
      * @author Kasama Donwong 62160074
      * @Create Date 2564-08-25
      * @Update Date -
      */
  public function get_data_card_company_ajax()
  {
    $data['arr_data'] = $this->mdcc->get_data_card_company()->result();
    $this->output->set_content_type('application/json')->set_output(json_encode($data['arr_data']));
  }

  /*
    * show_data_ajax
    * get all data company and show table
    * @input
    * @output -
    * @author Kasama Donwong 62160074
    * @Create Date 2564-09-18
    * @Update Date -
    */
  public function show_data_ajax($number_status)
  {
    //$number_status = 1;
    $value_search = $this->input->post('query');

    $output = '';
    $output = '
                  <table class="table" style="text-align: center;" id="com_table">
                  <thead class="text-white custom-thead">
                      <tr class="custom-tr-header-table">
                          <th class="th-custom res-hide">ลำดับ</th>
                          <th class="th-custom ">ชื่อสถานที่</th>
                          <th class="th-custom ">ชื่อผู้ประกอบการ</th>
                          <th class="th-custom res-hide">อีเมล</th>
                          <th class="th-custom ">ดำเนินการ</th>
                      </tr>
                  </thead>
                  <tbody class="list">
            ';

    if ($value_search  != '') {
      //กรณีค้นหา
      $data['arr_company'] = $this->mdcc->get_search($value_search, $number_status)->result();

      // var_dump($val);
      // var_dump( $data['arr_company']);
      // มีข้อมูลไหม
      if ($data['arr_company']) {
        $i = 1;
        //สร้างตาราง
        foreach ($data['arr_company'] as $row) {
          $output .= '<tr>' .
            '<td class="res-hide">' . $i . '</td>' .
            '<td style="text-align: left;">'
            . $row->com_name .
            '</td>' .
            '<td style="text-align: left;">'
            . $row->ent_firstname . " " . $row->ent_lastname .
            '</td>' .
            '<td class="res-hide style="text-align: left;">' .
            $row->ent_email .
            '</td>';
          if ($number_status == 1) {
            // ต่อสตริง
            $output .= '<td style="text-align: center;">' .
              '<a class="btn btn-info" style="font-size:10px; padding:12px;" href="' .  site_url() . 'Admin/Manage_company/Admin_approval_company/show_detail_company/' . $row->com_id . '" title="ดูรายละเอียดสถานที่">
                  <span class="material-icons">search</span>
               </a>' .
              '<button class="btn btn-success custom-btn-table" id="accept" onclick="confirm_approve(\'' . $row->com_id . '\',\'' . $row->com_name . '\',\'' . $row->ent_email . '\')" title="อนุมัติสถานที่">
                                <i class="material-icons">
                                  done
                                </i>
                            </button>' .
              '<button class="btn btn-danger custom-btn-table" id="reject" onclick="confirm_reject(\'' . $row->com_id . '\',\'' . $row->ent_email . '\',\'' . $row->com_name . '\',\'' . $row->com_ent_id . '\')" title="ปฏิเสธสถานที่">
                                <i class="material-icons">
                                  clear
                                </i>
                            </button>';
          } else if ($number_status == 2) {
            $output .= '<td style="text-align: center;">' .
              '<a class="btn btn-info" style="font-size:10px; padding:12px;" href="' .  site_url() . 'Admin/Manage_company/Admin_approval_company/show_detail_company/' . $row->com_id . '" title="ดูรายละเอียดสถานที่">
                  <span class="material-icons">search</span>
               </a>';
          } else if ($number_status == 3) {
            $output .= '</td>' .
              '<td style="text-align: center;">
                        <button class="btn btn-info" id="accept" style="font-size:10px; padding:12px;" onclick="view_data_detail_reject(\'' . $row->com_id . '\')" title="ดูรายละเอียดสถานที่">
                            <i class="material-icons"><span class="material-icons-outlined">
                                    search
                                </span></i>
                        </button>';
          }
          $output .= '</td></tr>';
          $i++;
        }
        $output .=
          '</tbody>
                    </table>';
        // ถ้าไม่มีข้อมูล
      } else {
        $output .= '
                          <td colspan = "5">
                            ไม่มีข้อมูลในตารางนี้
                          </td>';
      }
      // not search
    } else {
      //กรณีไม่ได้ค้นหา
      //define pagation
      $limit = '6';
      $page = 1; // หน้า
      $post_page = $this->input->post("page");
      if ($post_page > 1) {
        $start = (($post_page - 1) * $limit);
        $page = $post_page;
      } else {
        $start = 0;
      }
      $all_count = $this->mdcc->get_count_all($number_status);                               //get all count consider
      $data['arr_company'] = $this->mdcc->get_all_data($limit, $start, $number_status); // query แบบแบ่งหน้า
      $i = 1;
      if ($data['arr_company']) {
        foreach ($data['arr_company'] as $row) {
          $output .= '<tr>' .
            '<td class="res-hide">' . $i . '</td>' .
            '<td style="text-align: left;">'
            . $row->com_name .
            '</td>' .
            '<td style="text-align: left;">'
            . $row->ent_firstname . " " . $row->ent_lastname .
            '</td>' .
            '<td class="res-hide" style="text-align: left;">' .
            $row->ent_email .
            '</td>';
          if ($number_status == 1) {
            // ต่อสตริง
            $output .= '<td style="text-align: center;">' .
              '<a class="btn btn-info custom-a" style="font-size:10px; padding:12px;" href="' .  site_url() . 'Admin/Manage_company/Admin_approval_company/show_detail_company/' . $row->com_id . '" title="ดูรายละเอียดสถานที่">
                 <span class="material-icons">search</span>
               </a>' .
              '<button class="btn btn-success custom-btn-table" id="accept" onclick="confirm_approve(\'' . $row->com_id . '\',\'' . $row->com_name . '\',\'' . $row->ent_email . '\')" title="อนุมัติสถานที่">
                              <i class="material-icons">
                                done
                              </i>
                            </button>' .

              '<button class="btn btn-danger custom-btn-table" id="reject" onclick="confirm_reject(\'' . $row->com_id . '\',\'' . $row->ent_email . '\',\'' . $row->com_name . '\',\'' . $row->com_ent_id . '\')" title="ปฏิเสธสถานที่">
                              <i class="material-icons">
                                clear
                              </i>
                          </button>';
          } else if ($number_status == 2) {
            $output .= '<td style="text-align: center;">' .
              '<a class="btn btn-info custom-a" style="font-size:10px; padding:12px;" href="' .  site_url() . 'Admin/Manage_company/Admin_approval_company/show_detail_company/' . $row->com_id . '" title="ดูรายละเอียดสถานที่">
                <span class="material-icons">search</span>
               </a>';
          } else if ($number_status == 3) {
            $output .= '</td>' .
              '<td style="text-align: center;">
                      <button class="btn btn-info" id="accept" style="font-size:10px; padding:12px;" onclick="view_data_detail_reject(\'' . $row->com_id . '\')" title="ดูรายละเอียดสถานที่">
                          <i class="material-icons"><span class="material-icons-outlined">
                                  search
                              </span></i>
                      </button>';
          }
          '</td></tr>';
          $i++;
        }
        // สร้าง pagination
        $output .= '</tbody>
                </table><br>
              <div class="container-fluid" style="align: center;   position: relative;">
              <ul class="pagination w-50">
        ';
        $output .= $this->config_pagination($page, $all_count, $limit);
        $output .= '
              </ul>
            </div>';
      } else {
        $output .= '
                <td colspan = "5">
                  ไม่มีข้อมูลในตารางนี้
                </td>';
      }
    } // else  search 
    echo  $output; // to view
  }
}