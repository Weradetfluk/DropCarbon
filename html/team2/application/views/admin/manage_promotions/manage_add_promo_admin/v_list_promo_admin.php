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
<!-- main content -->
<div class="content">
    <div class="row">
        <div class="col">
            <h3 class=" text-dark custom-h4-card-table" style="padding-bottom: 15px; margin : 0 auto;">โปรโมชันที่ยังไม่สิ้นสุด</h3>
        </div>
        <div class="col">
            <button class="btn btn-info" style="margin-top: 2px; float:right; border-radius: 5px;" onclick="location.href='<?php echo base_url() . 'Admin/Manage_promotions/Admin_add_promotions/show_add_promotion' ?>'">เพิ่มโปรโมชัน</button>
        </div>
    </div>

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
                                <!-- <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url() . 'Admin/Manage_company/Admin_approval_company/show_data_reject' ?>">
                                        <h5 class="h5-card-header">สิ้นสุดแล้ว</h5>
                                    </a>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <form class="form-inline custom-form-search " action="<?php echo base_url() . 'Admin/Manage_company/Admin_approval_company/show_data_consider'; ?>" method="POST">
                        <div class="input-group ">
                            <input type="text" value="" id="search_box" name="value_search" class="form-control custom-search" placeholder="  ค้นหาชื่อได้ที่นี่...">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Tab1 -->
        <div class="card-body ">
            <div class="table-responsive" id="data_promo_admin">
            </div>
        </div>
    </div>

    <!-- modal delete promotion  -->
    <div class="modal" tabindex="-1" role="dialog" id="modal_delete">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="font-family: 'Prompt', sans-serif !important;">แจ้งเตือน</h5>
                </div>
                <div class="modal-body">
                    <p>คุณต้องการที่จะลบ <span id="pro_name_confirm"></span> ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="delete_btn" data-dismiss="modal">ยืนยัน</button>
                    <button type="button" class="btn btn-secondary" style="color: white; background-color: #777777;" data-dismiss="modal">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>

    <!-- modal cancel promotion  -->
    <div class="modal" tabindex="-1" role="dialog" id="modal_cancel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="font-family: 'Prompt', sans-serif !important;">แจ้งเตือน</h5>
                </div>
                <div class="modal-body">
                    <p>คุณต้องการที่จะระงับ <span id="pro_name_confirm_cancel"></span> ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="cancel_btn" data-dismiss="modal">ยืนยัน</button>
                    <button type="button" class="btn btn-secondary" style="color: white; background-color: #777777;" data-dismiss="modal">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>

    <!-- modal dis cancel promotion  -->
    <div class="modal" tabindex="-1" role="dialog" id="modal_dis_cancel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="font-family: 'Prompt', sans-serif !important;">แจ้งเตือน</h5>
                </div>
                <div class="modal-body">
                    <p>คุณต้องการที่จะยกเลิกระงับ <span id="pro_name_confirm_dis_cancel"></span> ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="dis_cancel_btn" data-dismiss="modal">ยืนยัน</button>
                    <button type="button" class="btn btn-secondary" style="color: white; background-color: #777777;" data-dismiss="modal">ยกเลิก</button>
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
         * confirm_delete
         * confirm delete promotion
         * @input pro_name_con,pro_id_con
         * @output modal comfirm delete promotion
         * @author Thanchanok Thonhjumroon 62160089
         * @Create Date 2564-10-03
         */
        function confirm_delete(pro_name_con, pro_id_con) {
            $('#pro_name_confirm').text(pro_name_con);
            $('#modal_delete').modal();


            // button
            $('#delete_btn').click(function() {
                delete_promotion_ajax(pro_id_con)
            });
        }

        /*
         * delete_promotion_ajax
         * confirm delete promotion
         * @input pro_id_con
         * @output delete promotion
         * @author Thanchanok Thongjumroon 62160089
         * @Create Date 2564-10-03
         */
        function delete_promotion_ajax(pro_id_con) {
            $.ajax({
                type: "POST",
                data: {
                    pro_id: pro_id_con
                },
                url: '<?php echo site_url() . 'Entrepreneur/Manage_promotion/Promotion_edit/delete_promotion_ajax/' ?>',
                success: function() {
                    swal({
                            title: "ลบโปรโมชัน",
                            text: "คุณได้ทำการลบโปรโมชันเสร็จสิ้น",
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
                cancel_promotion_ajax(pro_id_con)
            });
        }

        /*
         * cancel_promotion_ajax
         * confirm cancel promotion
         * @input pro_id_con
         * @output cancel promotion
         * @author Suwapat Saowarod 62160340
         * @Create Date 2564-11-29
         */
        function cancel_promotion_ajax(pro_id_con) {
            $.ajax({
                type: "POST",
                data: {
                    pro_id: pro_id_con
                },
                url: '<?php echo site_url() . 'Entrepreneur/Manage_promotion/Promotion_edit/cancel_promotion_ajax/' ?>',
                success: function() {
                    swal({
                            title: "ระงับโปรโมชัน",
                            text: "คุณได้ทำการระงับโปรโมชันเสร็จสิ้น",
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

        /*
         * confirm_dis_cancel
         * confirm cancel promotion
         * @input pro_name_con,pro_id_con
         * @output modal comfirm cancel promotion
         * @author Suwapat Saowarod 62160340
         * @Create Date 2564-11-29
         */
        function confirm_dis_cancel(pro_name_con, pro_id_con) {
            $('#pro_name_confirm_dis_cancel').text(pro_name_con);
            $('#modal_dis_cancel').modal();


            // button
            $('#dis_cancel_btn').click(function() {
                dis_cancel_promotion_ajax(pro_id_con)
            });
        }

        /*
         * dis_cancel_promotion_ajax
         * confirm dis cancel promotion
         * @input pro_id_con
         * @output dis cancel promotion
         * @author Suwapat Saowarod 62160340
         * @Create Date 2564-11-29
         */
        function dis_cancel_promotion_ajax(pro_id_con) {
            $.ajax({
                type: "POST",
                data: {
                    pro_id: pro_id_con
                },
                url: '<?php echo site_url() . 'Entrepreneur/Manage_promotion/Promotion_edit/dis_cancel_promotion_ajax/' ?>',
                success: function() {
                    swal({
                            title: "ยกเลิกระงับโปรโมชัน",
                            text: "คุณได้ทำการยกเลิกระงับโปรโมชันเสร็จสิ้น",
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