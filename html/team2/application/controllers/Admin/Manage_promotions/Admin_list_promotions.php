<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';
/*
* Admin_list_promotions
* list promotion admin class
* @author weradet nopsombun 62160110
* @Create Date 2564-12-06
*/
class Admin_list_promotions extends DCS_controller
{
    /*
        * @author Nantasiri Saiwaew 62160093
        */

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('Promotions/M_dcs_promotions', 'mdcp');
    }

    /*
        * show_data_event_list
        * get all data event 
        * @input
        * @output -
        * @author Weradet Nopsombun 62160110
        * @Create Date 2564-07-17
        * @Update Date 2564-09-13
        */
    public function show_data_promotions_list()
    {
        $_SESSION['tab_number'] = 9; //set tab number in topbar_admin.php
        $this->output_admin('admin/manage_promotions/manage_add_promo_admin/v_list_promo_admin', null, null);
    }
    /*
        * show_data_promo_over
        * get all data event 
        * @input
        * @output -
        * @author Kasama Donwong 62160074
        * @Create Date 2565-01-04
        * @Update Date 2565-01-04
        */
        public function show_data_promo_over()
        {
            $this->output_admin('admin/manage_promotions/manage_add_promo_admin/v_list_promo_over_admin', null, null);
        }
    /*
    * show_data_consider_ajax
    * get all data entrepreneur not approve and show table
    * @input
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-09-14
    * @Update Date -
    */
    public function config_pagination($page, $all_count, $limit)
    {
        $total_links = ceil($all_count / $limit);  // จำนวนแถว หารด้วย จำนวน limit ในทีนี้คือ 5 (ปัดเศษขึ้น)
        $previous_link = ''; // ตัวแปร
        $next_link = ''; //ตัวแปร
        $page_link = ''; // ตัวแปร
        for ($count = 1; $count <= $total_links; $count++) {
            $page_array[] = $count;
        }
        for ($count = 0; $count < count($page_array); $count++) {
            if ($page == $page_array[$count]) {
                $page_link .= '
          <li class="page-item active">
            <a class="page-link" href="#">' . $page_array[$count] . ' <span class="sr-only">(current)</span></a>
          </li>
          ';
                $previous_id = $page_array[$count] - 1;
                if ($previous_id > 0) {
                    $previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $previous_id . '">Previous</a></li>';
                } else {
                    $previous_link = '
                  <li class="page-item disabled">
                    <a class="page-link" href="#">Previous</a>
                  </li>
                  ';
                }
                $next_id = $page_array[$count] + 1;
                if ($next_id >= $total_links) {
                    $next_link = '
                    <li class="page-item disabled">
                      <a class="page-link" href="#">Next</a>
                    </li>
                      ';
                } else {
                    $next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $next_id . '">Next</a></li>';
                }
            } else {
                if ($page_array[$count] == '...') {
                    $page_link .= '
            <li class="page-item disabled">
                <a class="page-link" href="#">...</a>
            </li>
            ';
                } else {
                    $page_link .= '
                      <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $page_array[$count] . '">' . $page_array[$count] . '</a></li>';
                }
            }
        } //for
        return $previous_link . $page_link . $next_link;
    }
    /*
         * show_data_consider_ajax
         * get all data entrepreneur not approve and show table
         * @input
         * @output -
         * @author Weradet Nopsombun 62160110
         * @Create Date 2564-09-14
         * @Update Date -
         */
    public function show_data_ajax($number_status)
    {
        //$number_status = 1;
        $value_search = $this->input->post('query');
        date_default_timezone_set('Asia/Bangkok');
        $date_now = date("Y-m-d");

        $output = '';
        $output = '
              <table class="table" style="text-align: center;" id="entre_tale">
              <thead class="text-white custom-thead">
                  <tr class="custom-tr-header-table">
                      <th class="th-custom res-hide">ลำดับ</th>
                      <th class="th-custom ">ชื่อโปรโมชัน</th>
                      <th class="th-custom ">ชื่อสถานที่</th>
                      <th class="th-custom ">ดำเนินการ</th>
                  </tr>
              </thead>
              <tbody class="list">
        ';

        if ($value_search  != '') {
            //กรณีค้นหา
            $data['arr_promo'] = $this->mdcp->get_search_admin($value_search, $number_status)->result();

            // var_dump($value_search);
            // var_dump( $data['arr_promo']);
            // มีข้อมูลไหม
            if ($data['arr_promo']) {
                $i = 1;
                //สร้างตาราง
                foreach ($data['arr_promo'] as $row) {
                    $output .= '<tr>' .
                        '<td class="res-hide">' . $i . '</td>' .
                        '<td style="text-align: left;">'
                        . $row->pro_name .
                        '</td>' .
                        '<td style="text-align: left;">'
                        . $row->com_name .
                        '</td>';
                    if ($number_status == 2) {
                        $output .= '<td style="text-align: center;">' .
                            '<a class="btn btn-info custom-a" style="font-size:10px; padding:12px;" href="' .  site_url() . 'Admin/Manage_promotions/Admin_approval_promotions/show_detail_pro/' . $row->pro_id . '">
                            <span class="material-icons">search</span>
                             </a>' .
                            '<a class="btn btn-warning custom-a"
                            style="font-size:10px; padding:12px;"
                            href="' . site_url() . 'Admin/Manage_promotions/Admin_edit_promotions/show_edit_promotion/' . $row->pro_id . '">
                            <span class="material-icons">edit</span>
                            </a>'.
                            '<button class="btn btn-danger" style="font-size:10px; padding:12px;"
                            onclick="confirm_delete(\'' . $row->pro_name. '\',\'' .$row->pro_id. '\')">
                            <span class="material-icons">delete</span>
                            </button>';
                            // if($row->pro_end_date > $date_now && $row->pro_start_date <= $date_now){
                            //     $output .= '<button class="btn btn-danger" style="font-size:10px; padding:12px;"
                            //     onclick="confirm_cancel(\'' . $row->pro_name . '\' , \'' . $row->pro_id . '\')">
                            //     <span class="material-icons" style="font-size: 1.6rem;">toggle_off</span>
                            //     </button>';                                                               
                            // }
                    }
                    '</td></tr>';
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
            $all_count = $this->mdcp->get_count_all_admin($number_status);                               //get all count consider
            $data['arr_promo'] = $this->mdcp->get_all_data_admin($limit, $start, $number_status); // query แบบแบ่งหน้า
            $i = 1;
            if ($data['arr_promo']) {
                foreach ($data['arr_promo'] as $row) {
                    $output .= '<tr>' .
                        '<td class="res-hide">' . $i . '</td>' .
                        '<td style="text-align: left;">'
                        . $row->pro_name .
                        '</td>' .
                        '<td style="text-align: left;">'
                        . $row->com_name .
                        '</td>';
                    if ($number_status == 2) {
                        $output .= '<td style="text-align: center;">' .
                            '<a class="btn btn-info custom-a" style="font-size:10px; padding:12px;" href="' .  site_url() . 'Admin/Manage_promotions/Admin_approval_promotions/show_detail_pro/' . $row->pro_id . '">
                            <span class="material-icons">search</span>
                             </a>' .
                            '<a class="btn btn-warning custom-a"
                            style="font-size:10px; padding:12px;"
                            href="' . site_url() . 'Admin/Manage_promotions/Admin_edit_promotions/show_edit_promotion/' . $row->pro_id . '">
                            <span class="material-icons">edit</span>
                            </a>';
                            if($row->pro_end_date > $date_now && $row->pro_start_date <= $date_now){
                                $output .= '<button class="btn btn-danger" style="font-size:10px; padding:12px;"
                                onclick="confirm_cancel(\'' . $row->pro_name . '\' , \'' . $row->pro_id . '\')">
                                <span class="material-icons" style="font-size: 1.6rem;">toggle_off</span>
                                </button>';                                                               
                            }
                            elseif($row->pro_end_date <= $date_now && $row->pro_start_date <= $date_now){
                                $output .= '<button class="btn btn-danger" style="font-size:10px; padding:12px;"
                                onclick="confirm_delete(\'' . $row->pro_name. '\',\'' .$row->pro_id. '\')">
                                <span class="material-icons">delete</span>
                                </button>';
                            }
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
    * get_promo_over_admin_ajax
    * show detail
    * @input number_status
    * @output -
    * @author Kasama Donwong 62160074
    * @Create Date 2021-12-18
    * @Update Date -
    */
  public function get_promo_over_admin_ajax($number_status)
  {
    $value_search = $this->input->post('query');
    //กรณีค้นหา
    if ($value_search != '') {

      $data['arr_promo'] = $this->mdcp->get_search_over_admin($value_search, $number_status)->result();
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
      $all_count = $this->mdcp->get_count_all_over_admin($number_status);                               //get all count consider
      $data['arr_promo'] = $this->mdcp->get_all_data_over_admin($limit, $start, $number_status); // query แบบแบ่งหน้า

      if ($data['arr_promo']) {
        $data['paganition'] = $this->config_pagination($page, $all_count, $limit);
      }
      echo json_encode($data);
    }
  }
}
