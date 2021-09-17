<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';
/*
* Admin_approval_entrepreneur
* Manage Approve reject entrepreneur
* @author weradet nopsombun 62160110
* @Create Date 2564-07-17
*/
class Admin_approval_entrepreneur extends DCS_controller
{
    /*
        * @author Weradet Nopsombun 62160110
        */

    public function __construct()
    {
        parent::__construct();
        $this->load->library('email');
        $this->load->library('pagination');
        $this->load->model('Entrepreneur/M_dcs_entrepreneur', 'mdce');
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
        * show_data_consider
        * get all data entrepreneur not approve and show table
        * @input
        * @output -
        * @author Weradet Nopsombun 62160110
        * @Create Date 2564-07-17
        * @Update Date 2564-09-13
        */
        public function show_data_consider()
        {
            $_SESSION['tab_number'] = 5; //set tab number in topbar_admin.php
            $this->output_admin('admin/manage_entrepreneur/v_list_entrepreneur_consider', null, 'admin/manage_entrepreneur/v_data_card_entrepreneur');
        }
    /*
        * show_data_approve
        * get all data entrepreneur approve  and show table
        * @input
        * @output -
        * @author Weradet Nopsombun 62160110
        * @Create Date 2564-07-17
        * @Update Date -
        */
    public function show_data_approve()
    {
        $this->output_admin('admin/manage_entrepreneur/v_list_entrepreneur_approve', null, 'admin/manage_entrepreneur/v_data_card_entrepreneur');
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
        $this->output_admin('admin/manage_entrepreneur/v_list_entrepreneur_reject', null, 'admin/manage_entrepreneur/v_data_card_entrepreneur');
    }
    /*
        * show_data_block
        * get all data entrepreneur approve  and show table
        * @input
        * @output -
        * @author Weradet Nopsombun 62160110
        * @Create Date 2564-08-1
        * @Update Date -
        */
    public function show_data_block()
    {
        $this->output_admin('admin/manage_entrepreneur/v_list_entrepreneur_block', null, 'admin/manage_entrepreneur/v_data_card_entrepreneur');
    }
    /*
        * get_entrepreneur_by_id_ajax
        * get all data entrepreneur by id
        * @input
        * @output -
        * @author Weradet Nopsombun 62160110
        * @Create Date 2564-08-03
        * @Update Date
        */
    public function get_entrepreneur_by_id_ajax()
    {
        $this->load->model('Document/M_dcs_document', 'mdoc');
        $this->mdoc->doc_ent_id = $this->input->post('ent_id');
        $data['arr_file'] = $this->mdoc->get_by_ent_id()->result();
        $this->mdce->ent_id = $this->input->post('ent_id');
        $data['arr_data'] = $this->mdce->get_entrepreneur_by_id()->result();
        echo json_encode($data);
    }
    /*
        * get_entrepreneur_reject_by_id_ajax
        * get all data entrepreneur by id
        * @input
        * @output -
        * @author Weradet Nopsombun 62160110
        * @Create Date 2564-08-01
        * @Update Date
        */
    public function get_entrepreneur_reject_by_id_ajax()
    {
        $this->load->model('Rejected_entrepreneur/M_dcs_entrepreneur_reject', 'mdre');
        $ent_id = $this->input->post('ent_id');
        $data['arr_data'] = $this->mdre->get_data_rejected_by_id($ent_id)->result();

        echo json_encode($data['arr_data']);
    }
    /*
        * Approval
        * change ent_status
        * @input
        * @output -
        * @author Weradet Nopsombun 62160110
        * @Create Date 2564-07-17
        * @Update Date -
        */
    public function approval_entrepreneur()
    {
        $this->mdce->ent_id = $this->input->post('ent_id');

        $status_number = 2;

        $this->mdce->update_status($status_number);
    }
    /*
        * reject_entrepreneur
        * change ent_status
        * @input
        * @output -
        * @author Weradet Nopsombun 62160110
        * @Create Date 2564-07-17
        * @Update Date -
        */
    public function reject_entrepreneur()
    {
    // set value from font end
        $this->mdce->ent_id = $this->input->post('ent_id');
        // set data for send mail
        $reson_admin = $this->input->post('admin_reason');
        $user_email = $this->input->post('email');
        $mail_subject = 'Admin has been rejected';
        $mail_content_header = "คุณถูกปฎิเสธการลงทะเบียนของผู้ประกอบการ";
        $admin_id =  $this->session->userdata("Admin_id");
        //load model for save rejected data
        $this->load->model('Rejected_entrepreneur/M_dcs_entrepreneur_reject', 'mdre');
        //save data reject to data base
        $this->mdre->enr_admin_reason = $reson_admin;
        $this->mdre->enr_ent_id =  $this->mdce->ent_id;
        $this->mdre->enr_adm_id = $admin_id;
        $this->mdre->insert();
        //update status entrepreneur
        $status_number = 3;
        $this->mdce->update_status($status_number);
        $this->email_send($reson_admin, $user_email, $mail_subject, $mail_content_header);
    }
    /*
        * get_data_card_entrepreneur_ajax
        * get data consider, approve, rejected, block <- number of people
        * @input
        * @output -
        * @author Weradet Nopsombun 62160110
        * @Create Date 2564-07-17
        * @Update Date -
        */
    public function get_data_card_entrepreneur_ajax()
    {
        $data['arr_data'] = $this->mdce->get_data_card_entrepreneur()->result();

        $this->output->set_content_type('application/json')->set_output(json_encode($data['arr_data']));
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
    
        $output = '';
        $output = '
              <table class="table" style="text-align: center;" id="entre_tale">
              <thead class="text-white custom-thead">
                  <tr class="custom-tr-header-table">
                      <th class="th-custom res-hide">ลำดับ</th>
                      <th class="th-custom ">ชื่อ-นามสกุล</th>
                      <th class="th-custom ">เบอร์โทร</th>
                      <th class="th-custom res-hide">อีเมล</th>
                      <th class="th-custom ">ดำเนินการ</th>
                  </tr>
              </thead>
              <tbody class="list">
        ';
    
        if ($value_search  != '') {
            //กรณีค้นหา
            $data['arr_entrepreneur'] = $this->mdce->get_search($value_search, $number_status)->result();
         
            // var_dump($val);
            // var_dump( $data['arr_entrepreneur']);
            // มีข้อมูลไหม
            if ($data['arr_entrepreneur']) {
                $i = 1;
                //สร้างตาราง
                foreach ($data['arr_entrepreneur'] as $row) {
                    $output .= '<tr>' .
                '<td class="res-hide">' . $i . '</td>' .
                '<td>'
                . $row->ent_firstname . " " . $row->ent_lastname .
                '</td>' .
                '<td>'
                . $row->ent_tel .
                '</td>' .
                '<td class="res-hide">' .
                $row->ent_email .
                '</td>'; 
                  if($number_status == 1){
                    // ต่อสตริง
                    $output .= '<td style="text-align: center;">' .
                      '<button class="btn btn-info custom-btn-table" onclick="view_data(\'' . $row->ent_id . '\')">
                          <i class="material-icons">
                            search
                          </i>
                       </button>'.
                      '<button class="btn btn-success custom-btn-table" id="accept" onclick="confirm_approve(\'' . $row->ent_id . '\',\'' . $row->ent_firstname . " " . $row->ent_lastname . '\')">
                            <i class="material-icons">
                              done
                            </i>
                        </button>' .
                      '<button class="btn btn-danger custom-btn-table" id="reject" onclick="confirm_reject(\'' . $row->ent_id . '\',\'' . $row->ent_email . '\',\'' . $row->ent_firstname . " " . $row->ent_lastname . '\')">
                            <i class="material-icons">
                              clear
                            </i>
                        </button>';
                  }else if($number_status == 2){
                      $output .='<td style="text-align: center;">' .
                      '<button class="btn btn-danger custom-btn-table" id="accept" onclick="confirm_block(\'' . $row->ent_id . '\',\'' . $row->ent_firstname . " " . $row->ent_lastname . '\')">
                            <i class="material-icons"><span class="material-icons-outlined">
                                  highlight_off
                            </span></i>
                        </button>' .
                      '<button class="btn btn-info custom-btn-table" onclick="view_data(\'' . $row->ent_id . '\')">
                            <i class="material-icons">
                              search
                            </i>
                          </button>';
                  }else if($number_status == 3){
                    $output .='</td>' .
                    '<td style="text-align: center;">
                    <button class="btn btn-info" id="accept" style="font-size:10px; padding:12px;" onclick="view_data_detail_reject(\'' . $row->ent_id . '\')">
                        <i class="material-icons"><span class="material-icons-outlined">
                                search
                            </span></i>
                    </button>';
                  }else if($number_status == 4){
                    $output .='<td style="text-align: center;">
                    <button class="btn btn-warning custom-btn-table" id="accept" onclick="confirm_unblock(\'' . $row->ent_id . '\',\'' . $row->ent_firstname . " " . $row->ent_lastname . '\')">
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
          $all_count = $this->mdce->get_count_all($number_status);                               //get all count consider
          $data['arr_entrepreneur'] = $this->mdce->get_all_data($limit, $start, $number_status); // query แบบแบ่งหน้า
          $i = 1;
            if ($data['arr_entrepreneur']) {
                  foreach ($data['arr_entrepreneur'] as $row) {
                      $output .= '<tr>' .
                  '<td class="res-hide">' . $i . '</td>' .
                  '<td>'
                  . $row->ent_firstname . " " . $row->ent_lastname .
                  '</td>' .
                  '<td>'
                  . $row->ent_tel .
                  '</td>' .
                  '<td class="res-hide">' .
                  $row->ent_email .
                  '</td>';
                  if($number_status == 1){
                  // ต่อสตริง
                  $output .= '<td style="text-align: center;">' .
                  '<button class="btn btn-info custom-btn-table" onclick="view_data(\'' . $row->ent_id . '\')">
                          <i class="material-icons">
                            search
                          </i>
                        </button>'.
                    '<button class="btn btn-success custom-btn-table" id="accept" onclick="confirm_approve(\'' . $row->ent_id . '\',\'' . $row->ent_firstname . " " . $row->ent_lastname . '\')">
                          <i class="material-icons">
                            done
                          </i>
                        </button>' .
        
                    '<button class="btn btn-danger custom-btn-table" id="reject" onclick="confirm_reject(\'' . $row->ent_id . '\',\'' . $row->ent_email . '\',\'' . $row->ent_firstname . " " . $row->ent_lastname . '\')">
                          <i class="material-icons">
                            clear
                          </i>
                      </button>';
                }else if($number_status == 2){
                    $output .='<td style="text-align: center;">' .
                    '<button class="btn btn-danger custom-btn-table" id="accept" onclick="confirm_block(\'' . $row->ent_id . '\',\'' . $row->ent_firstname . " " . $row->ent_lastname . '\')">
                          <i class="material-icons"><span class="material-icons-outlined">
                                highlight_off
                          </span></i>
                      </button>' .
      
                    '<button class="btn btn-info custom-btn-table" onclick="view_data(\'' . $row->ent_id . '\')">
                          <i class="material-icons">
                            search
                          </i>
                        </button>';
                }else if($number_status == 3){
                  $output .='</td>' .
                  '<td style="text-align: center;">
                  <button class="btn btn-info" id="accept" style="font-size:10px; padding:12px;" onclick="view_data_detail_reject(\'' . $row->ent_id . '\')">
                      <i class="material-icons"><span class="material-icons-outlined">
                              search
                          </span></i>
                  </button>';
                }else if($number_status == 4){
                  $output .='<td style="text-align: center;">
                  <button class="btn btn-warning custom-btn-table" id="accept" onclick="confirm_unblock(\'' . $row->ent_id . '\',\'' . $row->ent_firstname . " " . $row->ent_lastname . '\')">
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
}