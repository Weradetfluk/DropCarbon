<!-- 
/*
* v_list_promo_admin
* Display data promotion by admin
* @input arr_promo
* @output data promo
* @author Kasama Donwong 62160074
* @Create Date 2564-12-24
*/ 
-->
<!-- ส่วนการทำงานหลัก -->
<div class="content">
    <div class="row">
        <div class="col">
            <h3 class=" text-dark custom-h4-card-table" style="padding-bottom: 15px; margin : 0 auto;">
                โปรโมชันที่ยังไม่สิ้นสุด</h3>
        </div>
        <!-- ปุ่มเพิ่มโปรโมชัน -->
        <div class="col">
            <button class="btn btn-info" style="margin-top: 2px; float:right; border-radius: 5px;" onclick="location.href='<?php echo base_url() . 'Admin/Manage_promotions/Admin_add_promotions/show_add_promotion' ?>'">เพิ่มโปรโมชัน</button>
        </div>
    </div>
    <!-- แถบนำทางผู้ใช้งาน -->
    <div class="card card-nav-tabs custom-card-tab">
        <div class="card-header custom-header-tab">
            <div class="row">
                <div class="col-sm-6">
                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                            <ul class="nav nav-tabs" data-tabs="tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" href=" <?php echo base_url() . 'Admin/Manage_promotions/Admin_list_promotions/show_data_promotions_list' ?> ">
                                        <h5 class="h5-card-header">ยังไม่สิ้นสุด</h5>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url() . 'Admin/Manage_promotions/Admin_list_promotions/show_data_promo_over' ?> ">
                                        <h5 class="h5-card-header">สิ้นสุดแล้ว</h5>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url() . 'Admin/Manage_promotions/Admin_list_promotions/show_data_promo_cancle' ?>">
                                        <h5 class="h5-card-header">หยุดการใช้งาน</h5>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ส่วนการค้นหา -->
                <div class="col">
                    <form class="form-inline custom-form-search " action="<?php echo base_url() . 'Admin/Manage_company/Admin_approval_company/show_data_consider'; ?>" method="POST">
                        <div class="input-group ">
                            <input type="text" value="" id="search_box" name="value_search" class="form-control custom-search" placeholder="  ค้นหาชื่อได้ที่นี่...">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- ตารางรายการโปรโมชัน -->
        <div class="card-body ">
            <div class="table-responsive" id="data_promo_admin">
            </div>
        </div>
    </div>


    <!--  หน้าต่างแสดงผลซ้อนยืนยันการหยุดการใช้งานโปรโมชัน  -->
    <div class="modal" tabindex="-1" role="dialog" id="modal_cancel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="font-family: 'Prompt', sans-serif !important;">แจ้งเตือน</h5>
                </div>
                <div class="modal-body">
                    <p>คุณต้องการที่จะหยุดการใช้งาน <span id="pro_name_confirm_cancel"></span> ?</p>
                </div>
                <div class="modal-footer">
                    <!-- ปุมยืนยันการหยุดใช้งาน -->
                    <button type="button" class="btn btn-danger" id="cancel_btn" data-dismiss="modal">ยืนยัน</button>
                    <!-- ปุ่มยกเลิกการหยุดใช้งาน -->
                    <button type="button" class="btn btn-secondary" style="color: white; background-color: #777777;" data-dismiss="modal">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var success_add = '<?php echo $this->session->userdata("error_add_promotion_admin"); ?>';
            if (success_add == 'success') {
                swal("เพิ่มโปรโมชันสำเร็จ", "เพิ่มโปรโมชันสำเร็จ", "success");
                <?php echo $this->session->unset_userdata("error_add_promotion_admin"); ?>;
            }
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
                url: '<?php echo base_url('Admin/Manage_promotions/Admin_list_promotions/show_data_ajax/'); ?>' + 2,
                method: "POST",
                data: {
                    page: page,
                    query: query
                },
                success: function(data) {
                    $('#data_promo_admin').html(data);
                }
            });
        }

        /*
         * confirm_cancel
         * confirm cancel promotion
         * @input pro_name_con,pro_id_con
         * @output modal comfirm cancel promotion
         * @author Suwapat Saowarod 62160340
         * @Create Date 2564-11-29
         */
        function confirm_cancel(pro_name_con, pro_id_con) {
            $('#pro_name_confirm_cancel').text(pro_name_con);
            $('#modal_cancel').modal();


            // button
            $('#cancel_btn').click(function() {
                edit_status_promotion_ajax(pro_id_con, 5)
            });
        }


        /*
         * edit_status_promotion_ajax
         * edit status promotion 
         * @input pro_id_con, pro_status_edit
         * @output -
         * @author Suwapat Saowarod 62160340
         * @Create Date 2565-02-24
         */
        function edit_status_promotion_ajax(pro_id_con, pro_status_edit) {
            $.ajax({
                type: "POST",
                data: {
                    pro_id: pro_id_con,
                    pro_status: pro_status_edit
                },
                url: '<?php echo site_url() . 'Entrepreneur/Manage_promotion/Promotion_edit/edit_status_promotion_ajax/' ?>',
                success: function() {
                    var title = '';
                    var detail = '';
                    if (pro_status_edit == 5) {
                        title = 'หยุดการใช้งานโปรโมชัน';
                        detail = 'คุณได้ทำการหยุดการใช้งานโปรโมชันเสร็จสิ้น';
                    }
                    swal({
                            title: title,
                            text: detail,
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