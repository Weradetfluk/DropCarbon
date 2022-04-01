<!-- 
/*
* v_list_event_over_admin
* Display data event over by admin
* @input arr_event
* @output data event
* @author Suwapat Saowarod 62160340
* @Create Date 2564-09-16
*/ 
-->
<script type="text/javascript" src="<?php echo base_url('assets/plugin/QRCODE/qrcode.js') ?>"></script>
<div class="content">
    <div class="row">
        <div class="col">
            <div class="col">
                <h3 class=" text-dark custom-h4-card-table" style="padding-bottom: 15px; margin : 0 auto;">
                    กิจกรรมที่สิ้นสุดแล้ว</h3>
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
                                    <a class="nav-link"
                                        href="<?php echo base_url() . 'Admin/Manage_event/Admin_list_event/show_data_event_list'; ?>">
                                        <h5 class="h5-card-header">ยังไม่สิ้นสุด</h5>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <!-- Taps กิจกรรมที่สิ้นสุดแล้ว -->
                                    <a class="nav-link active"
                                        href="<?php echo base_url() . 'Admin/Manage_event/Admin_list_event/show_data_event_over'; ?>">
                                        <h5 class="h5-card-header">สิ้นสุด</h5>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ส่วนค้นหาข้อมูล -->
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
                    <h4 class="modal-title" style="font-family: 'Prompt', sans-serif !important;">QR Code</h4>
                </div>
                <div class="modal-body">
                    <p>กิจกรรม : <span id="name_qr"></span></p>
                    <!-- ส่วนแสดง qr code -->
                    <center>
                        <div id="qr_code" style="width:100%; height:100%;"></div>
                    </center>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" style="color: white;"
                        data-dismiss="modal">เสร็จสิ้น</button>
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
    });

    function load_data(page, query = '') {
        console.log(query);
        $.ajax({
            url: '<?php echo base_url('Admin/Manage_event/Admin_list_event/get_event_over_admin_ajax/'); ?>' +
                2,
            method: "POST",
            dataType: "Json",
            data: {
                page: page,
                query: query
            },
            success: function(data) {
                // console.log(data);
                create_table(data['arr_event'], data['paganition']);

            }
        });
    }

    // ตารางแสดงกิจกรรม
    function create_table(data, pagation) {
        console.log(data);
        let html_code = '';
        html_code += '<table class="table" style="text-align: left;">';
        html_code += '<thead class="text-white custom-thead">';
        html_code += '<tr class="custom-tr-header-table">';
        html_code += '<th class="th-custom res-hide">ลำดับ</th>';
        html_code += '<th class="th-custom ">ชื่อกิจกรรม</th>';
        html_code += '<th class="th-custom ">เวลาดำเนินการ</th>';
        html_code += '<th class="th-custom ">ดำเนินการ</th>';
        html_code += '</tr>';
        html_code += '</thead>';
        html_code += '<tbody class="list">';

        data.forEach((row_eve, index_eve) => {

            html_code += '<tr>';
            html_code += '<td class ="res-hide">' + (index_eve + 1) + '</td>';
            html_code += '<td>' + (row_eve['eve_name']) + '</td>';
            html_code += '<td>' + format_date_to_abbreviation(row_eve['eve_start_date']) + ' - '+format_date_to_abbreviation(row_eve['eve_end_date']) + '</td>';
            html_code += '<td style="text-align: center;">';
            // ปุ่มดูรายละเอียดกิจกรรม
            html_code +=
                '<a class="btn btn-info custom-a" style="font-size:10px; padding:12px;" href=" <?php echo site_url() . 'Admin/Manage_event/Admin_approval_event/show_detail_event/' ?>' +
                (row_eve['eve_id']) + '" title = "ดูรายละเอียดกิจกรรม">'
            html_code += '<i class="material-icons">'
            html_code += 'search'
            html_code += '</i>';
            html_code += '</a>'
            //ปุ่มแก้ไขกิจกรรม
            html_code +=
                '<a class="btn btn-warning custom-a" style="font-size:10px; padding:12px;" href=" <?php echo site_url() . 'Admin/Manage_event/Admin_edit_event/show_edit_event_by_admin/' ?>' +
                (row_eve['eve_id']) + '" title = "แก้ไขกิจกรรม">'
            html_code += '<i class="material-icons">'
            html_code += 'edit'
            html_code += '</i>';
            html_code += '</a>'
            //ปุ่มลบกิจกรรม
            html_code +=
                '<button class="btn btn-danger custom-a" style="font-size:10px; padding:12px;" onclick="confirm_delete(\'' +
                (row_eve['eve_name']) + '\',\'' + (row_eve['eve_id']) + '\')" title = "ลบกิจกรรม">'
            html_code += '<i class="material-icons">'
            html_code += 'delete'
            html_code += '</i>';
            html_code += '</button>'
            html_code += '</tr>';
            html_code += '</tbody>'
        });
        html_code += '</table><br>';
        html_code += '<div class="container-fluid" style="align: left;   position: relative;">';
        html_code += '<ul class="pagination w-50" id="pagination">';
        //  $('#pagination').html(pagation);

        if (pagation) {
            html_code += pagation;
        }
        //  console.log(pagation);
        $('#data_event_consider').html(html_code);

    }

    var qrcode = new QRCode(document.getElementById("qr_code"), {
        width: 250,
        height: 250
    });

    function make_qr_code(eve_id, eve_name) {
        qrcode.makeCode("<?php echo base_url('Tourist/Checkin_event/Checkin_event/check_login_before_check_in/') ?>" +
            eve_id);
        $('#name_qr').html(eve_name);
        $('#modal_qrcode').modal();
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
     * @author Nantasiri Saiwaew 62160089
     * @Create Date 2564-12-12
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