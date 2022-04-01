<?php
/*
* Admin_list_event
* manage list event admin class
* @author weradet nopsombun 62160110
* @Create Date 2564-12-06
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';
class Admin_list_event extends DCS_controller
{
  /*
    * @author Nantasiri Saiwaew 62160093
  */
  public function __construct()
  {
    parent::__construct();
    $this->load->library('email');
    $this->load->helper('mydate_helper.php');
    $this->load->model('Event/M_dcs_event', 'mdce');
  }

  /*
    * show_data_event_list
    * get all data event 
    * @input -
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-07-17
    * @Update Date 2564-09-13
  */
  public function show_data_event_list()
  {
    $_SESSION['tab_number'] = 8; //set tab number in topbar_admin.php
    $this->output_admin('admin/manage_event/manage_add_event_admin/v_list_event_admin', null, null);
  }

  /*
    * show_data_event_over
    * get all data event over
    * @input -
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-07-17
    * @Update Date 2564-09-13
  */
  public function show_data_event_over()
  {
    $this->output_admin('admin/manage_event/manage_add_event_admin/v_list_event_over_admin', null, null);
  }

  /*
    * show_data_ajax
    * get all data event not approve and show table
    * @input number_status, query
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
                        <th class="th-custom ">ดำเนินการ</th>
                    </tr>
                </thead>
                <tbody class="list">
          ';

    if ($value_search  != '') {
      //กรณีค้นหา
      $data['arr_event'] = $this->mdce->get_search_event_admin($value_search, $number_status)->result();

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
            . to_format_abbreviation($row->eve_start_date) . ' - ' . to_format_abbreviation($row->eve_end_date). 
            '</td>' .
            '<td class="res-hide" style="text-align: left;">' .
            $row->ent_firstname . " " . $row->ent_lastname .
            '</td>';
          if ($number_status == 2) {
            // ต่อสตริง
            $output .= '<td style="text-align: center;">' .
              //ปุ่มดูรายละเอียดกิจกรรม
              '<a class="btn btn-info custom-a" style="font-size:10px; padding:12px;" href="' .  site_url() . 'Admin/Manage_event/Admin_approval_event/show_detail_event/' . $row->eve_id . '" title = "ดูรายละเอียดกิจกรรม">
                  <span class="material-icons">search</span>
                </a>' .
              //ปุ่มแก้ไขกิจกรรม
              '<a class="btn btn-warning custom-a" style="font-size:10px; padding:12px;" href="' .  site_url() . 'Admin/Manage_event/Admin_edit_event/show_edit_event_by_admin/' . $row->eve_id . '" title = "แก้ไขกิจกรรม">
                  <span class="material-icons">edit</span>
                </a>' .
              //ปุ่มลบกิจกรรม
              '<button class="btn btn-danger custom-btn-table" onclick="confirm_delete(\'' . $row->eve_name . '\',\'' . $row->eve_id .  '\')" title = "ลบกิจกรรม">
                              <i class="material-icons">
                                delete
                              </i>
                          </button>' .
              //ปุ่ม qr_code
              '<button class="btn btn-success" style="font-size:10px; padding:12px;" onclick="make_qr_code(\'' . $row->eve_id . '\',\'' . $row->eve_name . '\',\'' . $row->eve_start_date .'\',\'' . $row->eve_end_date .'\')" title = "QR Code กิจกรรม">
                    <span class="material-icons">
                              qr_code
                              </span>
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
      $all_count = $this->mdce->get_count_all_event_admin($number_status);                               //get all count consider
      $data['arr_event'] = $this->mdce->get_all_data_event_admin($limit, $start, $number_status); // query แบบแบ่งหน้า
      $i = 1;
      if ($data['arr_event']) {
        foreach ($data['arr_event'] as $row) {
          $output .= '<tr>' .
            '<td class="res-hide">' . $i . '</td>' .
            '<td style="text-align: left;">'
            . $row->eve_name .
            '</td>' .
            '<td style="text-align: left;">'
            . to_format_abbreviation($row->eve_start_date) . ' - ' . to_format_abbreviation($row->eve_end_date). 
            '</td>';
          if ($number_status == 2) {
            // ต่อสตริง
            $output .= '<td style="text-align: center;">' .
              //ปุ่มดูรายละเอียดกิจกรรม
              '<a class="btn btn-info custom-a" style="font-size:10px; padding:12px;" href="' .  site_url() . 'Admin/Manage_event/Admin_approval_event/show_detail_event/' . $row->eve_id . '" title = "ดูรายละเอียดกิจกรรม">
                            <span class="material-icons">search</span>
                </a>' .
              //ปุ่มแก้ไขกิจกรรม
              '<a class="btn btn-warning custom-a" style="font-size:10px; padding:12px;" href="' .  site_url() . 'Admin/Manage_event/Admin_edit_event/show_edit_event_by_admin/' . $row->eve_id . '" title = "แก้ไขกิจกรรม">
                  <span class="material-icons">edit</span>
                </a>' .
              //ปุ่มลบกิจกรรม
              '<button class="btn btn-danger custom-btn-table" id="accept" onclick="confirm_delete(\'' . $row->eve_name . '\',\'' . $row->eve_id .  '\')" title = "ลบกิจกรรม">
                            <i class="material-icons">
                            delete
                            </i>
                          </button>' .
              //ปุ่ม qr_code
              '<button class="btn btn-success" style="font-size:10px; padding:12px;" onclick="make_qr_code(\'' . $row->eve_id . '\',\'' . $row->eve_name . '\',\'' . $row->eve_start_date .'\',\'' . $row->eve_end_date .'\')" title = "QR Code กิจกรรม">
                          <span class="material-icons">
                            qr_code
                          </span>
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

  //เพราะ database คิวรี่ข้อมูลไม่เหมือนกัน เลยต้องแยกฟังกฺชัน
  /*
    * get_event_over_admin_ajax
    * show data event over
    * @input number_status, query
    * @output -
    * @author Nantasiri saiwaew 62160093
    * @Create Date 2021-12-18
    * @Update Date -
    */
  public function get_event_over_admin_ajax($number_status)
  {
    $value_search = $this->input->post('query');
    //กรณีค้นหา
    if ($value_search != '') {

      $data['arr_event'] = $this->mdce->get_search_over_admin($value_search, $number_status)->result();
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
      $all_count = $this->mdce->get_count_all_event_over_admin($number_status);                               //get all count consider
      $data['arr_event'] = $this->mdce->get_all_data_event_over_admin($limit, $start, $number_status); // query แบบแบ่งหน้า

      if ($data['arr_event']) {
        $data['paganition'] = $this->config_pagination($page, $all_count, $limit);
      }
      echo json_encode($data);
    }
  }
}