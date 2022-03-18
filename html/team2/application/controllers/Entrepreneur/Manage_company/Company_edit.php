<?php
/*
* Company_edit
* Manage edit company by entrepreneur
* @author Suwapat Saowarod 62160340
* @Create Date 2564-07-19
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';

class Company_edit extends DCS_controller
{
   /*
    * delete_company
    * update com_status = 4 in database
    * @input com_id
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-07-19
    * @Update Date -
    */
   public function delete_company()
   {
      $this->load->model('Company/M_dcs_company', 'mcom');
      $this->mcom->com_id = $this->input->post('com_id');
      $this->mcom->delete_company();// ลบสถานที่ ใน database ตาราง dcs_company ด้วย com_id
   }

   /*
    * show_edit_company
    * update show form edit company
    * @input com_id
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-07-19
    * @Update Date 2564-09-13
    */
   public function show_edit_company($com_id)
   {
      $this->load->model('Company/M_dcs_company', 'mcom');
      $this->load->model('Company/M_dcs_com_image', 'mimg');
      $this->load->model('Company/M_dcs_com_category', 'mcat');
      $this->load->model('Province/M_dcs_province', 'mprv');
      $this->mcom->com_id = $com_id;
      $this->mimg->com_img_com_id = $com_id;
      $data['arr_company'] = $this->mcom->get_by_id()->result(); // ดึงสถานที่ด้วย com_id ใน database จากตาราง dcs_company
      $data['arr_image'] = $this->mimg->get_by_com_id()->result(); // ดึงรูปภาพสถานที่ด้วย com_id ใน database จากตาราง dcs_com_image
      $data['arr_com_cat'] = $this->mcat->get_all()->result(); // ดึงประเภทสถานที่ใน database จากตาราง dcs_com_category
      $data['arr_province'] = $this->mprv->get_all()->result(); // ดึงจังหวัดใน database จากตาราง dcs_province
      $view = 'entrepreneur/manage_company/v_edit_company'; // กำหนดไปหน้า view ที่ชื่อว่า v_edit_company.php
      $this->output_entrepreneur($view, $data); // เรียกใช้ฟังก์ชัน output_entrepreneur ในไฟล์ DCS_controller.php
   }

   /*
    * edit_company
    * edit company to database
    * @input com_name, com_description, com_id, com_lat, com_lon, com_tel, com_file, com_cat_id, com_location, par_id, new_img, name_new_image, del_old_img, del_new_img
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-07-19
    * @Update Date 2564-09-13
    */
   public function edit_company()
   {
      $this->load->model('Company/M_dcs_company', 'mcom');
      $this->load->model('Company/M_dcs_com_image', 'mimg');
      $this->mcom->com_name = $this->input->post('com_name');
      $this->mcom->com_description = $this->input->post('com_description');
      $this->mcom->com_id = $this->input->post('com_id');
      $this->mcom->com_lat = $this->input->post('com_lat');
      $this->mcom->com_lon = $this->input->post('com_lon');
      $this->mcom->com_tel = $this->input->post('com_tel');
      $this->mcom->com_cat_id = $this->input->post('com_cat_id');
      $this->mcom->com_location = $this->input->post('com_location');
      $this->mcom->com_par_id = $this->input->post('par_id');
      $this->mcom->com_status = 1;
      // save data company to database
      $this->mcom->update_company();// แก้ไขสถานที่ใน database ตาราง dcs_company
      $this->set_session_edit_company('success'); // set session ว่า เพิ่มสำเร็จ
      $this->mimg->com_img_com_id = $this->input->post('com_id');

      // save data image to database
      $arr_img_add = array();
      $arr_name_name = array();
      $arr_img_add = $this->input->post('new_img'); // รับค่าจาก view คือ path รูปที่เพิ่มขึ้นมา
      $arr_name_name = $this->input->post('name_new_image'); // รับค่าจาก view ชื่อรูป
      $this->mimg->com_img_com_id = $this->input->post('com_id');
      // ถ้ามีรูปที่ต้องการเพิ่มจะเข้า if
      if ($arr_img_add != '') {
         for ($i = 0; $i < count($arr_img_add); $i++) {
            $this->mimg->com_img_path = $arr_img_add[$i];
            $this->mimg->com_img_name = $arr_name_name[$i];
            $this->mimg->insert_image_company(); // เพิ่มรูปภาพของสถานที่ ลง database ในตาราง dcs_com_image
         }
      }

      // delete data image to database
      $arr_img_delete_old = array();
      $arr_img_delete_old = $this->input->post('del_old_img'); // รับค่าจาก view คือ path รูปเก่าที่ต้องการจะลบ
      // ถ้ามีรูปเก่าที่ต้องการลบจะเข้า if เเต่ถ้าไม่มีเข้า else
      if ($arr_img_delete_old != '') {
         $arr_img_delete = $this->input->post('del_new_img'); // รับค่าจาก view คือ path รูปใหม่ที่ต้องการจะลบ
         if ($arr_img_delete != '') {
            for ($i = 0; $i < count($arr_img_delete); $i++) {
               array_push($arr_img_delete_old, $arr_img_delete[$i]); // นำรูปใหม่มาต่อ array กับรูปเก่า
            }// loop for
         }
      } else {
         $arr_img_delete_old = $this->input->post('del_new_img');
      }

      // ถ้ามีรูปต้องการลบจะเข้า if
      if ($arr_img_delete_old != '') {
         // วน loop เพื่อลบรูป
         for ($i = 0; $i < count($arr_img_delete_old); $i++) {
            $this->mimg->com_img_path = $arr_img_delete_old[$i];
            unlink('./image_company/' . $arr_img_delete_old[$i]);// ลบรูปออกจาก Floder ชื่อ image_company
            $this->mimg->delete_image_company();// ลบรูปภาพของสถานที่จาก database ในตาราง dcs_com_image
         }
      }

      redirect('Entrepreneur/Manage_company/Company_list/show_list_company');
   }

   /*
    * set_session_edit_company
    * edit session error_edit_company
    * @input data
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-08-23
    * @Update Date -
    */
   public function set_session_edit_company($data)
   {
      $this->session->set_userdata("error_edit_company", $data);
   }

   /*
    * check_name_company_ajax
    * check name company by ajax
    * @input com_name
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-09-03
    * @Update -
   */
   function check_name_company_ajax()
   {
      // ฟังก์ชันนี้เช็คว่ามีชื่อสถานที่ใน database หรือยังโดยไม่นับชื่อตัวมันเอง
      $this->load->model('Company/M_dcs_company', 'mcom');
      $this->mcom->com_name = $this->input->post('com_name');
      $company = $this->mcom->get_by_name()->row();
      if ($company) {
         if ($company->com_id != $this->input->post('com_id')) {
            // have name company
            echo 1;
         } else {
            // have name company but is old name           
            echo 2;
         }
      } else {
         // don't have name company
         echo 2;
      }
   }
}