<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';

/*
* Admin_list_tourist
* Manage list tourist
* @author Nantasiri Saiwaew 62160093
* @Create Date 2564-08-01
*/
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
    * config_pagination
    * config page
    * @input $page, $all_count, $limit
    * @output -
    * @author Nantasiri Saiwaew 62160093
    * @Create Date 2564-09-16
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
    * show_data_tourist
    * get all data tourist not block and show table
    * @input
    * @output -
    * @author Nantasiri Saiwaew 62160093
    * @Create Date 2564-09-16
    * @Update Date -
    */

    public function show_data_tourist()
    {
      $_SESSION['tab_number'] = 6; //set tab number in topbar_admin.php
      $this->output_admin('admin/manage_tourist/v_list_tourist',null);
    }

    /*
    * show_data_block
    * get all data tourist block and show table
    * @input
    * @output -
    * @author Nantasiri Saiwaew 62160093
    * @Create Date 2564-09-16
    * @Update Date -
    */

    public function show_data_block()
    {
        $this->output_admin('admin/manage_tourist/v_list_tourist_block',null);
    }
  /*
    * show_data_ajax_tourist
    * show table all tourist user
    * @input 
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
                '<td>'
                . $row->tus_firstname . " " . $row->tus_lastname .
                '</td>';
    
    
                // '<td>'
                // . $row->ent_tel .
                // '</td>' .
    
    
                // '<td>' .
                // $row->ent_email .
                // '</td>'; 



                  if($number_status == 1){
                    // ต่อสตริง
                    $output .= '<td style=text-align: center;>' .
                      '<button class="btn btn-danger" id="accept"style="font-size:10px; padding:12px;" onclick="confirm_block( \'' . $row->tus_id . '\',\'' . $row->tus_email . '\',\'' . $row->tus_firstname . " " . $row->tus_lastname . '\' )">
                      <i class="material-icons"><span class="material-icons-outlined">
                              block
                          </span></i>
                  </button>' ;
                  }else if($number_status == 4){
                    $output .='<td style="text-align: center;">
                    <button class="btn btn-warning custom-btn-table" id="accept" onclick="confirm_unblock(\'' . $row->tus_id . '\')">
                        <i class="material-icons"><span class="material-icons-outlined">
                                cached
                            </span></i>
                    </button>';
                  }
                  $output .='</td></tr>';

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
                  '<td>'
                  . $row->tus_firstname . " " . $row->tus_lastname .
                  '</td>';
                  // '<td>'
                  // . $row->ent_tel .
                  // '</td>' .
                  // '<td>' .
                  // $row->ent_email .
                  // '</td>';
                  if($number_status == 1){
                    // ต่อสตริง
                    $output .= '<td style=text-align: center;>' .
                      '<button class="btn btn-danger" id="accept"style="font-size:10px; padding:12px;" onclick="confirm_block(  \'' . $row->tus_id . '\',\'' . $row->tus_email . '\',\'' . $row->tus_firstname . " " . $row->tus_lastname . '\')">
                      <i class="material-icons"><span class="material-icons-outlined">
                              block
                          </span></i>
                  </button>' ;
                  }else if($number_status == 4){
                    $output .='<td style="text-align: center;">
                    <button class="btn btn-warning custom-btn-table" id="accept" onclick="confirm_unblock(\'' . $row->tus_id . '\')">
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
    * chage status unblock to database
    * @input 
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
