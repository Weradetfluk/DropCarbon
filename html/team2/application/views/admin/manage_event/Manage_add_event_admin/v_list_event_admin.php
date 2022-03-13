<!-- 
/*
* v_list_event
* Display data event by admin
* @input arr_event
* @output data event
* @author Nantsiri Saiwaew
* @Create Date 2564-12-11
*/ 
-->
<script type="text/javascript" src="<?php echo base_url('assets/plugin/QRCODE/qrcode.js') ?>"></script>
<div class="content">
    <div class="row">
        <div class="col">
            <div class="col">
                <h3 class=" text-dark custom-h4-card-table" style="padding-bottom: 15px; margin : 0 auto;">
                    กิจกรรมที่ยังไม่สิ้นสุด</h3>
            </div>
        </div>
        <div class="col">
            <!-- ปุ่มไปหน้าเพิ่มกิจกรรมการท่องเที่ยวของผู้ดูแลระบบ -->
            <button class="btn btn-info" style="margin-top: 2px; float:right; border-radius: 5px;"
                onclick="location.href='<?php echo base_url() . 'Admin/Manage_event/Admin_add_event/show_add_event_admin' ?>'">เพิ่มกิจกรรม</button>
        </div>
    </div>
    <div class="card card-nav-tabs custom-card-tab">
        <div class="card-header custom-header-tab">
            <div class="row">
                <div class="col-sm-8">
                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                            <ul class="nav nav-tabs" data-tabs="tabs">
                                <li class="nav-item">
                                    <!-- Taps กิจกรรมที่ยังไม่สิ้นสุด -->
                                    <a class="nav-link active"
                                        href="<?php echo base_url() . 'Admin/Manage_event/Admin_list_event/show_data_event_list'; ?>">
                                        <h5 class="h5-card-header">ยังไม่สิ้นสุด</h5>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <!-- Taps กิจกรรมที่สิ้นสุดแล้ว-->
                                    <a class="nav-link"
                                        href="<?php echo base_url() . 'Admin/Manage_event/Admin_list_event/show_data_event_over'; ?>">
                                        <h5 class="h5-card-header">สิ้นสุด</h5>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ส่วนการค้นหาข้อมูล -->
                <div class="col-sm-4">
                    <form class="form-inline custom-form-search "
                        action="<?php echo base_url() . 'Admin/Manage_event/Admin_list_event/show_data_event_list'; ?>"
                        method="POST">
                        <div class="input-group ">
                            <input type="text" value="" id="search_box" name="value_search"
                                class="form-control custom-search" placeholder="  ค้นหาชื่อได้ที่นี่...">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Tab1 -->
        <div class="card-body">
            <div class="table-responsive" id="data_event_consider">
            </div>
        </div>
    </div>

    <!-- modal delete event  -->
    <div class="modal" tabindex="-1" role="dialog" id="modal_delete">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="font-family: 'Prompt', sans-serif !important;">แจ้งเตือน</h5>
                </div>
                <div class="modal-body">
                    <p>คุณต้องการที่จะลบ <span id="eve_name_confirm"></span> ?</p>
                </div>
                <div class="modal-footer">
                    <!-- ปุ่มยืนยันการลบข้อมูล -->
                    <button type="button" class="btn btn-danger" id="delete_btn" data-dismiss="modal">ยืนยัน</button>
                    <!-- ปุ่มยกเลิกการลบข้อมูล -->
                    <button type="button" class="btn btn-secondary" style="color: white; background-color: #777777;"
                        data-dismiss="modal">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>


    <!-- modal qr-code event  -->
    <div class="modal" tabindex="-1" role="dialog" id="modal_qrcode">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="col-12" style="text-align: center;"><span id="name_qr"></span></h3>
                </div>
                <div class="modal-body">
                    <center><div id="qr_code" style="width:100%; height:100%;"></div></center><br>
                    <h5><img src="<?php echo base_url() . 'assets/templete/picture/promotion_icon.png' ?>" width="30px"> ระยะเวลา : <span id="event_time"></h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" style="color: white;" data-dismiss="modal">เสร็จสิ้น</button>
                </div>
            </div>
        </div>
    </div>


    <script>
    $(document).ready(function() {
        load_data(1);

        $('#search_box').keyup(function() {
            var query = $('#search_box').val();
            load_data(1, query);
            // console.log(query);
        });
        $(document).on('click', '.page-link', function() {
            var page = $(this).data('page_number');
            var query = $('#search_box').val();
            load_data(page, query);
        });
        var error = '<?php echo $this->session->userdata("error_add_event_admin"); ?>';
        if (error == 'success') {
            // แจ้งเตือนเพิ่มกิจกรรมสำเร็จ
            swal("เพิ่มกิจกรรมสำเร็จ", "เพิ่มกิจกรรมสำเร็จแล้ว", "success");
            <?php echo $this->session->unset_userdata("error_add_event_admin"); ?>;
        }
        var error = '<?php echo $this->session->userdata("error_edit_event_admin"); ?>';
        if (error == 'success') {
            // แจ้งเตือนแก้ไขกิจกรรมสำเร็จ
            swal("แก้ไขกิจกรรมสำเร็จ", "กรุณารอการอนุมัติจากผู้ดูเเลระบบภายใน 1 วัน", "success");
            <?php echo $this->session->unset_userdata("error_edit_event_admin"); ?>;
        }
    });

    function load_data(page, query = '') {
        console.log(query);
        $.ajax({
            // เรียกข้อมูลจาก show_data_ajax
            url: '<?php echo base_url('Admin/Manage_event/Admin_list_event/show_data_ajax/'); ?>' + 2,
            method: "POST",
            data: {
                page: page,
                query: query
            },
            success: function(data) {
                $('#data_event_consider').html(data);
            }
        });
    }
    
    var qrcode = new QRCode(document.getElementById("qr_code"), {
        width: 250,
        height: 250
    });

    // สร้าง qr code
    function make_qr_code(eve_id, eve_name, eve_start, eve_end) {
        let url = "https://www.informatics.buu.ac.th/team2/Tourist/Checkin_event/Checkin_event/check_login_before_check_in/";
        qrcode.makeCode( url + eve_id);
        $('#name_qr').html(eve_name);
        $('#modal_qrcode').modal();
        event_time = format_date(eve_start);
        event_time += ' - ';
        event_time += format_date(eve_end);
        $('#event_time').html(event_time);
    }

    /*
     * confirm_delete
     * confirm delete event
     * @input eve_name_con,eve_id_con
     * @output modal comfirm delete event
     * @author Thanchanok Thonhjumroon 62160089
     * @Create Date 2564-09-25
     */
    function confirm_delete(eve_name_con, eve_id_con) {
        $('#eve_name_confirm').text(eve_name_con);
        $('#modal_delete').modal();

        // button
        $('#delete_btn').click(function() {
            delete_event(eve_id_con)
        });
    }

    /*
     * delete_event
     * confirm delete event
     * @input eve_id_con
     * @output delete event
     * @author Nantasiri Saiwaew 62160093
     * @Create Date 2564-12-14
     * @Update Date -
     */
    function delete_event(eve_id_con) {

        $.ajax({
            type: "POST",
            data: {
                eve_id: eve_id_con
            },
            // ลบข้อมูลโดยเรียกใช้ delete_event_by_admin จาก controller Admin_edit_event
            url: '<?php echo base_url() . 'Admin/Manage_event/Admin_edit_event/delete_event_by_admin' ?>',
            success: function() {
                swal({
                        title: "ลบกิจกรรม",
                        text: "คุณได้ทำการลบกิจกรรมเสร็จสิ้น",
                        type: "success"
                    },
                    function() {
                        location.reload();
                    })

            },
            error: function() {
                alert('ajax error working');
            }
        });

    }
    </script>