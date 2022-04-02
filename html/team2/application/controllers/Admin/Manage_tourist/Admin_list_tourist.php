<?php
/*
* Admin_list_tourist
* Manage list tourist
* @author Nantasiri Saiwaew 62160093
* @Create Date 2564-08-01
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';
class Admin_list_tourist extends DCS_controller
{
  /*
    * @author Nantasiri Saiwaew 62160093
  */
  public function __construct()
  {
    parent::__construct();
    $this->load->library('pagination');
    $this->load->library('email');
    $this->load->model('Tourist/M_dcs_tourist', 'mdct');
  }

  /*
    * show_data_tourist
    * get all data tourist not block and show table
    * @input -
    * @output -
    * @author Nantasiri Saiwaew 62160093
    * @Create Date 2564-09-16
    * @Update Date -
    */

  public function show_data_tourist()
  {
    $_SESSION['tab_number'] = 6; //set tab number in topbar_admin.php
    $this->output_admin('admin/manage_tourist/v_list_tourist', null);
  }

  /*
    * show_data_block
    * get all data tourist block and show table
    * @input -
    * @output -
    * @author Nantasiri Saiwaew 62160093
    * @Create Date 2564-09-16
    * @Update Date -
    */

  public function show_data_block()
  {
    $this->output_admin('admin/manage_tourist/v_list_tourist_block', null);
  }

  /*
    * show_data_ajax_tourist
    * show table all tourist 
    * @input number_status, query
    * @output -
    * @author Nantasiri Saiwaew 62160093
    * @Create Date 2564-08-01
    * @Update Date -
    */

  public function show_data_ajax_tourist($number_status)
  {

    //$number_status = 1;
    $value_search = $this->input->post('query');

    $output = '';
    $output = '
        <table class="table" style="text-align: center;" id="entre_tale">
        <thead class="text-white" style="background-color: #d8b7a8; text-align: center;">
            <tr>
                <th style="text-align: center;font-size: 16px;">ลำดับ</th>
                <th style="text-align: center;font-size: 16px;">ชื่อ-นามสกุล</th>
                <th style="text-align: center;font-size: 16px;">เบอร์โทรศัพท์</th>
                <th style="text-align: center;font-size: 16px;">อีเมล</th>
                <th style="text-align: center;font-size: 16px;">ดำเนินการ</th>
            </tr>
        </thead>
        <tbody class="list">
        ';

    if ($value_search  != '') {
      //กรณีค้นหา
      $data['arr_tourist'] = $this->mdct->get_search($value_search, $number_status)->result();
      // var_dump($val);
      // var_dump( $data['arr_entrepreneur']);

      // มีข้อมูลไหม
      if ($data['arr_tourist']) {
        $i = 1;

        //สร้างตาราง
        foreach ($data['arr_tourist'] as $row) {
          $output .= '<tr>' .
            '<td>' . $i . '</td>' .
            '<td style="text-align: left;">'
            . $row->tus_firstname . " " . $row->tus_lastname .
            '</td>' .
            '<td>'
            . $row->tus_tel .
            '</td>' .
            '<td style="text-align: left;">' .
            $row->tus_email .
            '</td>';
          if ($number_status == 1) {
            // ต่อสตริง
            $output .= '<td style=text-align: center;>' .
              '<button class="btn btn-danger" id="accept"style="font-size:10px; padding:12px;" onclick="confirm_block( \'' . $row->tus_id . '\',\'' . $row->tus_firstname . " " .  $row->tus_lastname . '\',\'' . $row->tus_email . '\' )" title = "ระงับบัญชี">
                      <i class="material-icons"><span class="material-icons-outlined">
                              block
                          </span></i>
                  </button>';
          } else if ($number_status == 4) {
            $output .= '<td style="text-align: center;">
                    <button class="btn btn-warning custom-btn-table" id="accept" onclick="confirm_unblock(\'' . $row->tus_id . '\')" title = "ปลดการระงับบัญชี">
                        <i class="material-icons"><span class="material-icons-outlined">
                                cached
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

      $all_count = $this->mdct->get_count_all_tourist($number_status); //get all count tourist
      $data['arr_tourist'] = $this->mdct->get_all_data_tourist($limit, $start, $number_status); // query แบบแบ่งหน้า

      $i = 1;


      if ($data['arr_tourist']) {
        foreach ($data['arr_tourist'] as $row) {
          $output .= '<tr>' .
            '<td>' . $i . '</td>' .
            '<td style="text-align: left;">'
            . $row->tus_firstname . " " . $row->tus_lastname .
            '</td>' .
            '<td>'
            . $row->tus_tel .
            '</td>' .
            '<td style="text-align: left;">' .
            $row->tus_email .
            '</td>';
          if ($number_status == 1) {
            // ต่อสตริง
            $output .= '<td style=text-align: center;>' .
              '<button class="btn btn-danger" id="accept"style="font-size:10px; padding:12px;" onclick="confirm_block(  \'' . $row->tus_id . '\',\'' . $row->tus_firstname . " " .  $row->tus_lastname . '\',\'' .  $row->tus_email . '\')" title = "ระงับบัญชีผู้ใช้งาน">
                      <i class="material-icons"><span class="material-icons-outlined">
                              block
                          </span></i>
                  </button>';
          } else if ($number_status == 4) {
            $output .= '<td style="text-align: center;">
                    <button class="btn btn-warning custom-btn-table" id="accept" onclick="confirm_unblock(\'' . $row->tus_id . '\')" title = "ปลดการระงับบัญชี">
                        <i class="material-icons"><span class="material-icons-outlined">
                                cached
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


  /*
    * unblock_user_ajax
    * change status unblock to database
    * @input tus_id
    * @output -
    * @author Nantasiri Saiwaew 62160093
    * @Create Date 2564-08-01
    * @Update Date -
    */
  public function unblock_user_ajax()
  {
    $this->load->model('Tourist/M_dcs_tourist', 'mdct');

    $this->mdct->tus_id = $this->input->post('tus_id');

    $status_number = 1;

    $this->mdct->update_unblock_status($status_number);
  }
}