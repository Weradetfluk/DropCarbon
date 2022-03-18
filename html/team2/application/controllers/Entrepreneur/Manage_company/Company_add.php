<?php
/*
* Company_add
* Manage add company by entrepreneur
* @author Suwapat Saowarod 62160340
* @Create Date 2564-07-18
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';

class Company_add extends DCS_controller
{
    /*
    * show_add_company
    * show form add company
    * @input -
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-07-18
    * @Update Date -
    */
    public function show_add_company()
    {
        $this->load->model('Company/M_dcs_com_category', 'mcat');
        $this->load->model('Province/M_dcs_province', 'mprv');
        $data['arr_com_cat'] = $this->mcat->get_all()->result(); // ดึงข้อมูลประเภทของสถานที่ ใน database จากตาราง dcs_com_category
        $data['arr_province'] = $this->mprv->get_all()->result(); // ดึงข้อมูลจังหวัด ใน database จากตาราง dcs_province
        $view = 'entrepreneur/manage_company/v_add_company'; // กำหนดไปหน้า view ที่ชื่อว่า v_add_company.php
        $this->output_entrepreneur($view, $data); // เรียกใช้ฟังก์ชัน output_entrepreneur ในไฟล์ DCS_controller.php
    }

    /*
    * add_company
    * add company to database
    * @input com_name, com_lat, com_lon, com_description, entrepreneur_id, com_tel, com_cat_id, com_location, par_id, new_img, name_new_image, del_new_img
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-07-18
    * @Update Date 2564-09-13
    */
    public function add_company()
    {
        $this->load->model('Company/M_dcs_company', 'mcom');
        $this->load->model('Company/M_dcs_com_image', 'mimg');
        $this->mcom->com_name = $this->input->post('com_name');
        $this->mcom->com_lat = $this->input->post('com_lat');
        $this->mcom->com_lon = $this->input->post('com_lon');
        $this->mcom->com_description = $this->input->post('com_description');
        $this->mcom->com_ent_id = $this->session->userdata("entrepreneur_id");
        $this->mcom->com_tel = $this->input->post('com_tel');
        $this->mcom->com_cat_id = $this->input->post('com_cat_id');
        $this->mcom->com_location = $this->input->post('com_location');
        $this->mcom->com_par_id = $this->input->post('par_id');
        $this->mcom->insert_company(); // เพิ่มสถานที่ลง database ในตาราง dcs_company
        $this->set_session_add_company('success'); // set session ว่า เพิ่มสำเร็จ
        $result = $this->mcom->get_by_name()->row();// ค้นหาสถานที่ด้วยชื่อ เพราะต้องการ id ของสถานที่ที่เพิ่มเข้า database
        
        
        // save data image to database
        $arr_img_add = array();
        $arr_name_name = array();
        $arr_img_add = $this->input->post('new_img'); // รับค่าจาก view คือ path รูปที่เพิ่มขึ้นมา
        $arr_name_name = $this->input->post('name_new_image'); // รับค่าจาก view ชื่อรูป
        $this->mimg->com_img_com_id = $result->com_id;
        // วน loop เพือที่จะเอารูปลง database
        for ($i = 0; $i < count($arr_img_add); $i++) {
            $this->mimg->com_img_path = $arr_img_add[$i];
            $this->mimg->com_img_name = $arr_name_name[$i];
            $this->mimg->insert_image_company(); // เพิ่มรูปภาพของสถานที่ ลง database ในตาราง dcs_com_image
        }

        // delete data image to database
        $arr_img_delete = array();
        $arr_img_delete= $this->input->post('del_new_img'); // รับค่าจาก view คือ path รูปที่ต้องการจะลบ
        if($arr_img_delete != ''){
            for ($i = 0; $i < count($arr_img_delete); $i++) {
                $this->mimg->com_img_path = $arr_img_delete[$i];
                unlink('./image_company/' . $arr_img_delete[$i]); // ลบรูปออกจาก Floder ชื่อ image_company
                $this->mimg->delete_image_company(); // ลบรูปภาพของสถานที่จาก database ในตาราง dcs_com_image
            }
        }
          
        redirect('Entrepreneur/Manage_company/Company_list/show_list_company');
    }

    /*
    * set_session_add_company
    * add session error_add_company
    * @input data
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-08-23
    * @Update Date -
    */
    public function set_session_add_company($data){
        $this->session->set_userdata("error_add_company", $data);
    }

    /*
    * upload_image_ajax
    * upload image to floder name image_company
    * @input com_file
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-08-26
    * @Update Date 2564-08-28
    */
    public function upload_image_ajax(){

        // สร้างตัวแปรเพื่อรับค่าจาก view
        $file_name = array(); 
        $file_tmp_name = array();
        $file_size = array();
        $file_error = array();
        $file_ext = array();
        $file_actaul_ext = array();
        $error_file = '';

        // นำค่าที่ได้จาก view มาใส่ในตัวแปรที่เตรียม
        $file = $_FILES['com_file'] ?? '';
        $file_name = $_FILES['com_file']['name'] ?? '';
        $file_tmp_name = $_FILES['com_file']['tmp_name'] ?? '';
        $file_size = $_FILES['com_file']['size'] ?? '';
        $file_error = $_FILES['com_file']['error'] ?? '';
    
        if($file != ''){
            // วน loop เพื่อแปลงนามสกุลไฟล์ให้เป็นตัวเล็ก
            for ($i = 0; $i < count($file_name); $i++) {
                $file_ext[$i] = explode('.', $file_name[$i]); // เเยก string ให้เป็น array โดยใช้ ' . ' ในการแยก

                // end() จะดึงค่าสุดท้ายของ array จากนั้นนำมาทำเป็นตัวอักษรพิมพ์เล็ก ด้วยคำสั่ง strtolower()
                $file_actaul_ext[$i] = strtolower(end($file_ext[$i])); 

                // เช็คว่าไฟล์นั้นมีปัญหาหรือไม่ และรูปขนาดเกิน 30000000 KB หรือไม่
                if ($file_error[$i] != 0 || $file_size[$i] >= 3000000) {
                    $error_file = 'false';
                    break;
                }
            } // end loop for
        }else { 
            $error_file = 'false';
        }

        $output_image = ''; // สร้างตัวแปรเพื่อเก็บ string 
        // ถ้าไม่มีค่าเป็น false จะทำการเข้า if แต่ถ้ามีค่า false จะเข้า else
        if ($error_file != 'false') {
            // วน loop เพื่อ upload file ลง floder ที่ชื่อว่า image_company
            for ($i = 0; $i < count($file_name); $i++) {
                $file_new_name[$i] = uniqid('', true); // uniqid เอาไว้สร้าง id แบบสุ่ม 23 ตัวอักษร

                // ใส่ directory ที่จะเก็บ ลงในตัวแปร file_destination
                $file_destination[$i] = './image_company/' . $file_new_name[$i] . '.' . $file_actaul_ext[$i]; 
                move_uploaded_file($file_tmp_name[$i], $file_destination[$i]); // เก็บไฟล์ลง floder ที่ชื่อว่า image_company
                
                // สร้าง path รูปภาพเพื่อเข้าถึงภาพที่พึ่งเก็บ
                $path = base_url() . 'image_company/' . $file_new_name[$i] . '.' . $file_actaul_ext[$i];

                //  สร้าง div ที่แสดงรูปภาพเพื่อที่จะไปโชว์หน้า view 
                $output_image .= '<div id="' . $file_new_name[$i] . '">
                                        <div class="image_container d-flex justify-content-center position-relative" style="border-radius: 7px; width: 200px; height:200px">
                                        <img src="' . $path . '" alt="Image"><span class="position-absolute" style="font-size: 25px;" 
                                        onclick="unlink_new_image(\'' . $file_new_name[$i] . '.' . $file_actaul_ext[$i] . '\')">&times;
                                        </span><input type="text" value="' . $file_new_name[$i] . '.' . $file_actaul_ext[$i] . '" name="new_img[]" 
                                        id="' . $file_new_name[$i] . '_img" hidden><input type="text" value="' . $file_name[$i] . '" name="name_new_image[]" hidden></div>
                                  </div>';
            }
        } else {
            $output_image .= 'error';
        }
        echo json_encode($output_image);// คืนค่ากับไปเป็นข้อมูลแบบ json
    }

    /*
    * unlink_image_ajax
    * unlink image when cancel add company
    * @input arr_image
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-08-28
    * @Update Date -
    */
    public function unlink_image_ajax(){
        // ทำฟังก์ชันนี้ในกรณีที่ผู้ใช้งานเพิ่ม file แล้วกดยกเลิกการเพิ่มสถานที่
        $data = ""; 
        // เช็คค่า arr_image จากหน้า view ว่า ถ้าไม่เท่ากับ NULL จะเข้า if เเต่ ถ้าเท่ากับ NULL เข้า else
        if($this->input->post('arr_image') != NULL){
            $arr_image = $this->input->post('arr_image');
            for($i = 0; $i < count($arr_image); $i++){
                unlink('./image_company/' . $arr_image[$i]); // ลบ file ใน floder ที่ชื่อว่า image_company
            }
            $data = "success";
        }else{
            $data = "no image";
        }
        echo json_encode($data);// คืนค่ากับไปเป็นข้อมูลแบบ json
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
    function check_name_company_ajax(){
        // ฟังก์ชันนี้เช็คว่ามีชื่อสถานที่ใน database หรือยัง
        $this->load->model('Company/M_dcs_company', 'mcom');
        $this->mcom->com_name = $this->input->post('com_name');
        $company = $this->mcom->get_by_name()->row();
        if($company){
            // have name company
            echo 1;
        }else{
            echo 2;
        }
    }

    /* 
     * get_district_by_prv_id_ajax
     * get district by prv_id for ajax
     * @input prv_id
     * @output -
     * @author Suwapat Saowarod 62160340
     * @Create Date 2564-12-18
     * @Update -
     */
    function get_district_by_prv_id_ajax(){

        $this->load->model('District/M_dcs_district', 'mdis');
        $this->mdis->dis_prv_id = $this->input->post('prv_id');
        $data = $this->mdis->get_district_by_prv_id()->result(); // ดึงค่าอำเภอ ใน database จากตาราง dcs_district
        echo json_encode($data);// คืนค่ากับไปเป็นข้อมูลแบบ json
    }

    /* 
     * get_parish_by_dis_id_ajax
     * get parish by dis_id for ajax
     * @input dis_id
     * @output -
     * @author Suwapat Saowarod 62160340
     * @Create Date 2564-12-18
     * @Update -
     */
    function get_parish_by_dis_id_ajax(){
        $this->load->model('Parish/M_dcs_parish', 'mpar');
        $this->mpar->par_dis_id = $this->input->post('dis_id');
        $data = $this->mpar->get_parish_by_dis_id()->result();// ดึงค่าตำบล ใน database จากตาราง dcs_parish
        echo json_encode($data);// คืนค่ากับไปเป็นข้อมูลแบบ json
    }

}

