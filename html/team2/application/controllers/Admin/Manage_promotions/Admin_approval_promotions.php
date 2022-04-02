<?php
/*
* Admin_approval_promotions
* Manage Approve reject entrepreneur
* @author Nantasiri Saiwaew 62160093
* @Create Date 2564-07-17
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';
class Admin_approval_promotions extends DCS_controller
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
    $this->load->model('Promotions/M_dcs_promotions', 'mdcp');
  }

  /*
    * show_data_consider
    * get all data promotions not approve and show table
    * @input -
    * @output -
    * @author Nantasiri Saiwaew 62160093
    * @Create Date 2564-07-17
    * @Update Date 2564-09-13
  */
  public function show_data_consider()
  {
    $_SESSION['tab_number'] = 7; //set tab number in topbar_admin.php
    $this->output_admin('admin/manage_promotions/v_list_promo_consider', null, 'admin/manage_promotions/v_data_card_promo');
  }

  /*
    * show_data_approve
    * get all data data promotions approve and show table
    * @input - 
    * @output -
    * @author Nantasiri Saiwaew 62160093
    * @Create Date 2564-07-17
    * @Update Date -
  */
  public function show_data_approve()
  {
    $this->output_admin('admin/manage_promotions/v_list_promo_approve', null, 'admin/manage_promotions/v_data_card_promo');
  }

  /*
    * show_data_reject
    * get all data promotions reject and show table
    * @input -
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-08-1
    * @Update Date -
  */
  public function show_data_reject()
  {
    $this->output_admin('admin/manage_promotions/v_list_promo_reject', null, 'admin/manage_promotions/v_data_card_promo');
  }

  /*
    * show_data_pro_not_over
    * get all data promotions not over and show table
    * @input -
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-10-04
    * @Update Date -
  */
  public function show_data_pro_not_over()
  {
    $this->output_admin('admin/manage_promotions/v_list_promo_not_over', null, 'admin/manage_promotions/v_data_card_promo');
  }
   
  /*
    * show_data_pro_over
    * get all data promotions over and show table
    * @input - 
    * @output -
    * @author Nantasiri Saiwaew 62160093
    * @Create Date 2564-10-04
    * @Update Date -
  */
  public function show_data_pro_over()
  {
    $this->output_admin('admin/manage_promotions/v_list_promo_over', null, 'admin/manage_promotions/v_data_card_promo');
  }

  /*
    * get_promo_by_id_ajax
    * get all data promotions by id
    * @input promo_id
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-08-03
    * @Update Date -
  */
  public function get_promo_by_id_ajax()
  {
    $this->mdcp->promo_id = $this->input->post('promo_id');
    $data['arr_data'] = $this->mdcp->get_promo_by_id()->result();
    echo json_encode($data);
  }

  /*
    * get_pro_reject_by_id_ajax
    * get all data promotions reject by id
    * @input pro_id
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-08-01
    * @Update Date -
  */
  public function get_pro_reject_by_id_ajax()
  {
    $this->load->model('Promotions/M_dcs_pro_reject', 'mdpre');
    $pro_id = $this->input->post('pro_id');
    $data['arr_data'] = $this->mdpre->get_data_pro_rejected_by_id($pro_id)->result();
    echo json_encode($data['arr_data']);
  }
   
  /*
    * approval_promotions
    * change pro_status
    * @input pro_id
    * @output -
    * @author Kasama Donwong 62160074
    * @Create Date 2564-09-26
    * @Update Date -
  */
  public function approval_promotions()
  {
    $this->mdcp->pro_id = $this->input->post('pro_id');
    $status_number = 2;
    $this->mdcp->update_status($status_number);
  }

  /*
    * reject_pro
    * change pro_status
    * @input pro_id, admin_reason, email
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-07-17
    * @Update Date -
  */
  public function reject_pro()
  {
    // set value from font end
    $this->mdcp->pro_id = $this->input->post('pro_id');
    // set data for send mail
    $reson_admin = $this->input->post('admin_reason');
    $user_email = $this->input->post('email');
    $mail_subject = 'Admin has rejected your promotion';
    $prr_pro_id = $this->input->post('pro_id');
    $mail_content_header = "คุณถูกปฎิเสธการเพิ่มโปรโมชัน";
    $admin_id =  $this->session->userdata("admin_id");
    //load model for save rejected data
    $this->load->model('Promotions/M_dcs_pro_reject', 'mdpre');
    //save data reject to data base
    $this->mdpre->prr_admin_reason = $reson_admin;
    $this->mdpre->prr_pro_id =  $prr_pro_id;
    $this->mdpre->prr_adm_id = $admin_id;
    $this->mdpre->insert();
    //update status entrepreneur
    $status_number = 3;
    $this->mdcp->update_status($status_number);
    $this->email_send($reson_admin, $user_email, $mail_subject, $mail_content_header);
  }

  /*
    * get_data_card_promo_ajax
    * get data consider, approve, rejected, block <- number of promotions
    * @input -
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-07-17
    * @Update Date -
  */
  public function get_data_card_promo_ajax()
  {
    $data['arr_data'] = $this->mdcp->get_data_card_promo()->result();

    $this->output->set_content_type('application/json')->set_output(json_encode($data['arr_data']));
  }
  
  /*
    * show_data_ajax
    * get all data promotions not approve and show table
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
                      <th class="th-custom ">ชื่อโปรโมชัน</th>
                      <th class="th-custom ">เวลาดำเนินการ</th>
                      <th class="th-custom ">ชื่อผู้ประกอบการ</th>
                      <th class="th-custom ">ดำเนินการ</th>
                  </tr>
              </thead>
              <tbody class="list">
        ';

    if ($value_search  != '') {
      //กรณีค้นหา
      $data['arr_promo'] = $this->mdcp->get_search($value_search, $number_status)->result();

      // var_dump($value_search);
      // var_dump( $data['arr_event']);
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
            . to_format_abbreviation($row->pro_start_date) . " - " . to_format_abbreviation($row->pro_end_date) .
            '</td>' .
            '<td class="res-hide" style="text-align: left;">' .
            $row->ent_firstname . " " . $row->ent_lastname .
            '</td>';
          if ($number_status == 1) {
            // ต่อสตริง
            $output .= '<td style="text-align: center;">' .
              '<a class="btn btn-info custom-a" style="font-size:10px; padding:12px;" href="' .  site_url() . 'Admin/Manage_promotions/Admin_approval_promotions/show_detail_pro/' . $row->pro_id . '" title = "ดูรายละเอียดโปรโมชัน">
                <span class="material-icons">search</span>
              </a>' .
              '<button class="btn btn-success custom-btn-table" id="accept" onclick="confirm_approve(\'' . $row->pro_id . '\',\'' . $row->pro_name .  '\',\'' . $row->ent_email . '\')">
                            <i class="material-icons">
                              done
                            </i>
                        </button>' .
              '<button class="btn btn-danger custom-btn-table" id="reject" onclick="confirm_reject(\'' . $row->pro_id . '\',\'' . $row->pro_name . '\',\'' . $row->ent_email .  '\')">
                            <i class="material-icons">
                              clear
                            </i>
                        </button>';
          } else if ($number_status == 2) {
            $output .= '<td style="text-align: center;">' .
              '<a class="btn btn-info custom-a" style="font-size:10px; padding:12px;" href="' .  site_url() . 'Admin/Manage_promotions/Admin_approval_promotions/show_detail_pro/' . $row->pro_id . '" title = "ดูรายละเอียดโปรโมชัน">
              <span class="material-icons">search</span>
              </a>';
          } else if ($number_status == 3) {
            $output .= '</td>' .
              '<td style="text-align: center;">
                    <button class="btn btn-info" id="accept" style="font-size:10px; padding:12px;" onclick="view_data_detail_reject(\'' . $row->pro_id . '\')" title = "ดูเหตุผลโปรโมชันที่ถูกปฏิเสธ">
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
      $all_count = $this->mdcp->get_count_all($number_status);                               //get all count consider
      $data['arr_promo'] = $this->mdcp->get_all_data($limit, $start, $number_status); // query แบบแบ่งหน้า
      $i = 1;
      if ($data['arr_promo']) {
        foreach ($data['arr_promo'] as $row) {
          $output .= '<tr>' .
            '<td class="res-hide">' . $i . '</td>' .
            '<td style="text-align: left;">'
            . $row->pro_name .
            '</td>' .
            '<td style="text-align: left;">'
            . to_format_abbreviation($row->pro_start_date) . " - " . to_format_abbreviation($row->pro_end_date) .
            '</td>' .
            '<td class="res-hide" style="text-align: left;">' .
            $row->ent_firstname . " " . $row->ent_lastname .
            '</td>';
          if ($number_status == 1) {
            // ต่อสตริง
            $output .= '<td style="text-align: center;">' .
              '<a class="btn btn-info custom-a" style="font-size:10px; padding:12px;" href="' .  site_url() . 'Admin/Manage_promotions/Admin_approval_promotions/show_detail_pro/' . $row->pro_id . '" title = "ดูรายละเอียดโปรโมชัน">
            <span class="material-icons">search</span>
            </a>' .
              '<button class="btn btn-success custom-btn-table" id="accept" onclick="confirm_approve(\'' . $row->pro_id . '\',\'' . $row->pro_name .  '\',\'' . $row->ent_email . '\')" title = "อนุมัติโปรโมชัน">
                          <i class="material-icons">
                            done
                          </i>
                        </button>' .

              '<button class="btn btn-danger custom-btn-table" id="reject" onclick="confirm_reject(\'' . $row->pro_id . '\',\'' . $row->pro_name . '\',\'' . $row->ent_email .  '\')" title = "ปฏิเสธโปรโมชัน">
                          <i class="material-icons">
                            clear
                          </i>
                      </button>';
          } else if ($number_status == 2) {
            $output .= '<td style="text-align: center;">' .
              '<a class="btn btn-info custom-a" style="font-size:10px; padding:12px;" href="' .  site_url() . 'Admin/Manage_promotions/Admin_approval_promotions/show_detail_pro/' . $row->pro_id . '" title = "ดูรายละเอียดโปรโมชัน">
            <span class="material-icons">search</span>
          </a>' .
              '<button class="btn btn-success custom-btn-table" id="accept" onclick="confirm_add_score_eve(\'' . $row->pro_id . '\',\'' . $row->pro_name .  '\',\'' . $row->ent_email . '\')">
                    <i class="material-icons">
                      add
                    </i>
                </button>';
          } else if ($number_status == 3) {
            $output .= '</td>' .
              '<td style="text-align: center;">
                  <button class="btn btn-info" id="accept" style="font-size:10px; padding:12px;" onclick="view_data_detail_reject(\'' . $row->pro_id . '\')" title = "ดูเหตุผลโปรโมชันที่ถูกปฏิเสธ"> 
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
    * show_detail_pro
    * show detail promotion
    * @input pro_id
    * @output -
    * @author Nantasiri Saiwaew 62160093
    * @Create Date 2021-10-02
    * @Update Date -
  */
  public function show_detail_pro($pro_id)
  {

    $this->load->model('Promotions/M_dcs_promotions', 'mdpe');
    $this->mdpe->pro_id = $pro_id;
    $data["arr_pro"] = $this->mdpe->get_by_detail()->result();
    $this->output_admin('admin/manage_promotions/v_detail_promotions_admin', $data, null);
  }

  /*
    * get_promo_data_not_over_ajax
    * get all data promotions not over and show table
    * @input number_status, query
    * @output -
    * @author weradet nopsombun 62160110 
    * @Create Date 2021-08-20
    * @Update Date -
    */
  public function get_promo_data_not_over_ajax($number_status)
  {
    $value_search = $this->input->post('query');
    //กรณีค้นหา
    if ($value_search != '') {

      $data['arr_promo'] = $this->mdcp->get_search_not_over($value_search, $number_status)->result();
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
      $all_count = $this->mdcp->get_count_all_not_over($number_status);                               //get all count consider
      $data['arr_promo'] = $this->mdcp->get_all_data_not_over($limit, $start, $number_status); // query แบบแบ่งหน้า
      $i = 1;

      if ($data['arr_promo']) {
        $data['paganition'] = $this->config_pagination($page, $all_count, $limit);
      }
      echo json_encode($data);
    }
  }

  /*
    * get_pro_data_over_ajax
    * get all data promotions over and show table
    * @input number_status, query
    * @output -
    * @author weradet nopsombun 62160110 
    * @Create Date 2021-08-20
    * @Update Date -
  */
  public function get_pro_data_over_ajax($number_status)
  {
    $value_search = $this->input->post('query');
    //กรณีค้นหา
    if ($value_search != '') {

      $data['arr_promo'] = $this->mdcp->get_search_over($value_search, $number_status)->result();
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
      $all_count = $this->mdcp->get_count_all_over($number_status);                               //get all count consider
      $data['arr_promo'] = $this->mdcp->get_all_data_over($limit, $start, $number_status); // query แบบแบ่งหน้า

      if ($data['arr_promo']) {
        $data['paganition'] = $this->config_pagination($page, $all_count, $limit);
      }
      echo json_encode($data);
    }
  }
}