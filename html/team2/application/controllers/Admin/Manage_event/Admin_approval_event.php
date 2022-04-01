<?php
/*
* Admin_approval_event
* Manage page event
* @author weradet nopsombun 62160110
* @Create Date 2564-07-17
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';
class Admin_approval_event extends DCS_controller
{
  /*
    * @author Nantasiri Saiwaew 62160093
  */
  public function __construct()
  {
    parent::__construct();
    $this->load->library('email');
    $this->load->library('pagination');
    $this->load->helper('mydate_helper.php');
    $this->load->model('Event/M_dcs_event', 'mdce');
  }

  /*
    * show_data_consider
    * get all data entrepreneur not approve and show table
    * @input -
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-07-17
    * @Update Date 2564-09-13
  */
  public function show_data_consider()
  {
    $_SESSION['tab_number'] = 4; //set tab number in topbar_admin.php
    $this->output_admin('admin/manage_event/v_list_event_consider', null, 'admin/manage_event/v_data_card_event');
  }

  /*
    * show_data_reject
    * get all data entrepreneur approve  and show table
    * @input
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-08-1
    * @Update Date -
  */
  public function show_data_reject()
  {
    $this->output_admin('admin/manage_event/v_list_event_reject', null, 'admin/manage_event/v_data_card_event');
  }

  /*
    * show_data_event_not_over
    * get all data event not over and show table
    * @input -
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-08-01
    * @Update Date -
  */
  public function show_data_event_not_over()
  {
    $this->output_admin('admin/manage_event/v_list_event_not_over', null, 'admin/manage_event/v_data_card_event');
  }

  /*
    * show_data_event_over
    * get all data event over and show table
    * @input -
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-08-01
    * @Update Date -
  */
  public function show_data_event_over()
  {
    $this->output_admin('admin/manage_event/v_list_event_over', null, 'admin/manage_event/v_data_card_event');
  }

  /*
    * get_event_by_id_ajax
    * get data event by id
    * @input
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-08-03
    * @Update Date
  */
  public function get_event_by_id_ajax()
  {
    $this->mdce->eve_id = $this->input->post('eve_id');
    $data['arr_data'] = $this->mdce->get_event_by_id()->result();
    echo json_encode($data);
  }

  /*
    * get_eve_reject_by_id_ajax
    * get all data event reject by id
    * @input
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-08-01
    * @Update Date
  */
  public function get_eve_reject_by_id_ajax()
  {
    $this->load->model('Event/M_dcs_eve_reject', 'mdere');
    $eve_id = $this->input->post('eve_id');
    $data['arr_data'] = $this->mdere->get_data_eve_rejected_by_id($eve_id)->result();

    echo json_encode($data['arr_data']);
  }

  /*
    * approval_event
    * change ent_status
    * @input eve_id, eve_point
    * @output -
    * @author Kasama Donwong 62160074
    * @Create Date 2564-09-26
    * @Update Date -
  */
  public function approval_event()
  {
    //update point
    $this->mdce->eve_id = $this->input->post('eve_id');
    $this->mdce->eve_point = $this->input->post('eve_point');
    $this->mdce->update_point();
    //update status
    $status_number = 2;
    $this->mdce->update_status($status_number);
  }

  /*
    * reject_event
    * change ent_status
    * @input eve_id, admin_reason, email
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-07-17
    * @Update Date -
  */
  public function reject_event()
  {
    // set value from font end
    $this->mdce->eve_id = $this->input->post('eve_id');
    // set data for send mail
    $reson_admin = $this->input->post('admin_reason');
    $user_email = $this->input->post('email');
    $mail_subject = 'Admin has rejected your event';
    $evr_eve_id = $this->input->post('eve_id');
    $mail_content_header = "คุณถูกปฎิเสธการเพิ่มกิจกรรม";
    $admin_id =  $this->session->userdata("admin_id");
    //load model for save rejected data
    $this->load->model('Event/M_dcs_eve_reject', 'mdere');
    //save data reject to data base
    $this->mdere->evr_admin_reason = $reson_admin;
    $this->mdere->evr_eve_id =  $evr_eve_id;
    $this->mdere->evr_adm_id = $admin_id;
    $this->mdere->insert();
    //update status entrepreneur
    $status_number = 3;
    $this->mdce->update_status($status_number);
    $this->email_send($reson_admin, $user_email, $mail_subject, $mail_content_header);
  }
  
  /*
    * get_data_card_event_ajax
    * get data consider, approve, rejected, block <- number of event
    * @input - 
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-07-17
    * @Update Date -
  */
  public function get_data_card_event_ajax()
  {
    $data['arr_data'] = $this->mdce->get_data_card_event()->result();

    $this->output->set_content_type('application/json')->set_output(json_encode($data['arr_data']));
  }

  /*
    * show_data_ajax
    * get all data event and show table
    * @input query
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-09-14
    * @Update Date -
  */
  public function show_data_ajax($number_status)
  {
    //$number_status = 1;
    $value_search = $this->input->post('query');

    $output = '';
    $output = '
              <table class="table" style="text-align: center;" id="entre_tale">
              <thead class="text-white custom-thead">
                  <tr class="custom-tr-header-table">
                      <th class="th-custom res-hide">ลำดับ</th>
                      <th class="th-custom ">ชื่อกิจกรรม</th>
                      <th class="th-custom ">เวลาดำเนินการ</th>
                      <th class="th-custom res-hide">ชื่อผู้ประกอบการ</th>
                      <th class="th-custom ">ดำเนินการ</th>
                  </tr>
              </thead>
              <tbody class="list">
        ';

    if ($value_search  != '') {
      //กรณีค้นหา
      $data['arr_event'] = $this->mdce->get_search($value_search, $number_status)->result();

      // var_dump($value_search);
      // var_dump( $data['arr_event']);
      // มีข้อมูลไหม
      if ($data['arr_event']) {
        $i = 1;
        //สร้างตาราง
        foreach ($data['arr_event'] as $row) {
          $output .= '<tr>' .
            '<td class="res-hide">' . $i . '</td>' .
            '<td style="text-align: left;">'
            . $row->eve_name .
            '</td>' .
            '<td style="text-align: left;">'
            . to_format_abbreviation($row->eve_start_date) . " - " . to_format_abbreviation($row->eve_end_date). 
            '</td>' .
            '<td class="res-hide" style="text-align: left;">' .
            $row->ent_firstname . " " . $row->ent_lastname .
            '</td>';
          if ($number_status == 1) {
            // ต่อสตริง
            $output .= '<td style="text-align: center;">' .
              '<a class="btn btn-info custom-a" style="font-size:10px; padding:12px;" href="' .  site_url() . 'Admin/Manage_event/Admin_approval_event/show_detail_event/' . $row->eve_id . '" title = "ดูรายละเอียดกิจกรรม">
                <span class="material-icons">search</span>
              </a>' .
              '<button class="btn btn-success custom-btn-table" id="accept" onclick="confirm_approve(\'' . $row->eve_id . '\',\'' . $row->eve_name .  '\',\'' . $row->ent_email . '\',\'' . $row->eve_cat_id . '\',\'' . $row->eve_cat_name . '\')" title = "อนุมัติกิจกรรม">
                            <i class="material-icons">
                              done
                            </i>
                        </button>' .
              '<button class="btn btn-danger custom-btn-table" id="reject" onclick="confirm_reject(\'' . $row->eve_id . '\',\'' . $row->eve_name . '\',\'' . $row->ent_email .  '\')" title = "ปฏิเสธกิจกรรม">
                            <i class="material-icons">
                              clear
                            </i>
                        </button>';
          } else if ($number_status == 2) {
            $output .= '<td style="text-align: center;">' .
              '<a class="btn btn-info custom-a" style="font-size:10px; padding:12px;" href="' .  site_url() . 'Admin/Manage_event/Admin_approval_event/show_detail_event/' . $row->eve_id . '" title = "ดูรายละเอียดกิจกรรม">
                <span class="material-icons">search</span>
              </a>';
          } else if ($number_status == 3) {
            $output .= '</td>' .
              '<td style="text-align: center;">
                    <button class="btn btn-info" id="accept" style="font-size:10px; padding:12px;" onclick="view_data_detail_reject(\'' . $row->eve_id . '\')" title = "ดูรายละเอียดเหตุผลที่ถูกปฏิเสธ">
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
      $all_count = $this->mdce->get_count_all($number_status);                               //get all count consider
      $data['arr_event'] = $this->mdce->get_all_data($limit, $start, $number_status); // query แบบแบ่งหน้า
      $i = 1;
      if ($data['arr_event']) {
        foreach ($data['arr_event'] as $row) {
          $output .= '<tr>' .
            '<td class="res-hide">' . $i . '</td>' .
            '<td style="text-align: left;">'
            . $row->eve_name .
            '</td>' .
            '<td style="text-align: left;">'
            .  to_format_abbreviation($row->eve_start_date)   . " - "   . to_format_abbreviation($row->eve_end_date). 
            '</td>' .
            '<td class="res-hide" style="text-align: left;">' .
            $row->ent_firstname . " " . $row->ent_lastname .
            '</td>';
          if ($number_status == 1) {
            // ต่อสตริง
            $output .= '<td style="text-align: center;">' .
              '<a class="btn btn-info custom-a" style="font-size:10px; padding:12px;" href="' .  site_url() . 'Admin/Manage_event/Admin_approval_event/show_detail_event/' . $row->eve_id . '" title = "ดูรายละเอียดกิจกรรม">
                          <span class="material-icons">search</span>
              </a>' .
              '<button class="btn btn-success custom-btn-table" id="accept" onclick="confirm_approve(\'' . $row->eve_id . '\',\'' . $row->eve_name .  '\',\'' . $row->ent_email . '\',\'' . $row->eve_cat_id . '\',\'' . $row->eve_cat_name . '\',\'' . $row->eve_min_score . '\',\'' . $row->eve_max_score . '\')" title = "อนุมัติกิจกรรม">
                          <i class="material-icons">
                            done
                          </i>
                        </button>' .

              '<button class="btn btn-danger custom-btn-table" id="reject" onclick="confirm_reject(\'' . $row->eve_id . '\',\'' . $row->eve_name . '\',\'' . $row->ent_email .  '\')" title = "ปฏิเสธกิจกรรม">
                          <i class="material-icons">
                            clear
                          </i>
                      </button>';
          } else if ($number_status == 2) {
            $output .= '<td style="text-align: center;">' .
              '<a class="btn btn-info custom-a" style="font-size:10px; padding:12px;" href="' .  site_url() . 'Admin/Manage_event/Admin_approval_event/show_detail_event/' . $row->eve_id . '" title = "ดูรายละเอียดกิจกรรม">
                    <span class="material-icons">search</span>
                    </a>';
          } else if ($number_status == 3) {
            $output .= '</td>' .
              '<td style="text-align: center;">
                  <button class="btn btn-info" id="accept" style="font-size:10px; padding:12px;" onclick="view_data_detail_reject(\'' . $row->eve_id . '\')" title = "ดูรายละเอียดเหตุผลที่ถูกปฏิเสธ">
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
                <tr rowspan="6">
                <td colspan = "5">
                ไม่มีข้อมูลในตารางนี้
              </td><tr>';
      }
    } // else  search 
    echo  $output; // to view
  }

  /*
    * show_detail_event
    * show detail
    * @input eve_id
    * @output -
    * @author weradet nopsombun 62160110 
    * @Create Date 2021-08-20
    * @Update Date -
  */
  public function show_detail_event($eve_id)
  {

    $this->load->model('Event/M_dcs_event', 'meve');
    $this->meve->eve_id = $eve_id;
    $data["arr_event"] = $this->meve->get_by_detail()->result();
    $this->output_admin('admin/manage_event/v_detail_event_admin', $data, null);
  }

  /*
    * get_event_data_not_over_ajax
    * show data event not over show in table
    * @input number_status, query
    * @output -
    * @author weradet nopsombun 62160110 
    * @Create Date 2021-08-20
    * @Update Date -
    */
  public function get_event_data_not_over_ajax($number_status)
  {
    $value_search = $this->input->post('query');
    //กรณีค้นหา
    if ($value_search != '') {

      $data['arr_event'] = $this->mdce->get_search_not_over($value_search, $number_status)->result();
      echo json_encode($data);
    } else {
      //ไม่ได้ค้นหา
      $limit = '6';
      $page = 1; // หน้า
      $post_page = $this->input->post("page");

      // page 
      if ($post_page > 1) {
        $start = (($post_page - 1) * $limit);
        $page = $post_page;
      } else {
        $start = 0;
      }
      $all_count = $this->mdce->get_count_all_not_over($number_status);                               //get all count consider
      $data['arr_event'] = $this->mdce->get_all_data_not_over($limit, $start, $number_status); // query แบบแบ่งหน้า
      $i = 1;

      if ($data['arr_event']) {
        $data['paganition'] = $this->config_pagination($page, $all_count, $limit);
      }
      echo json_encode($data);
    }
  }


  //เพราะ database คิวรี่ข้อมูลไม่เหมือนกัน เลยต้องแยกฟังกชัน
  /*
    * get_event_data_over_ajax
    * show data event over show in table
    * @input number_status, query
    * @output -
    * @author weradet nopsombun 62160110 
    * @Create Date 2021-08-20
    * @Update Date -
    */
  public function get_event_data_over_ajax($number_status)
  {
    $value_search = $this->input->post('query');
    //กรณีค้นหา
    if ($value_search != '') {

      $data['arr_event'] = $this->mdce->get_search_over($value_search, $number_status)->result();
      echo json_encode($data);
    } else {
      //ไม่ได้ค้นหา
      $limit = '6';
      $page = 1; // หน้า
      $post_page = $this->input->post("page");

      // page 
      if ($post_page > 1) {
        $start = (($post_page - 1) * $limit);
        $page = $post_page;
      } else {
        $start = 0;
      }
      $all_count = $this->mdce->get_count_all_over($number_status);                               //get all count consider
      $data['arr_event'] = $this->mdce->get_all_data_over($limit, $start, $number_status); // query แบบแบ่งหน้า

      if ($data['arr_event']) {
        $data['paganition'] = $this->config_pagination($page, $all_count, $limit);
      }
      echo json_encode($data);
    }
  }

  /*
    * get_data_category
    * get data eve_cat
    * @input -
    * @output -
    * @author weradet nopsombun 62160110 
    * @Create Date 2021-11-06
    * @Update Date -
  */
  public function get_data_category()
  {
    $this->load->model('Event/M_dcs_eve_category', 'meca');
    $data['data_eve_cat'] = $this->meca->get_all()->result();
    echo json_encode($data);
  }
}