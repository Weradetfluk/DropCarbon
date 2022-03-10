<!-- 
/*
* v_login_admin
* table show list entrepreneur blocked
* @input -
* @output table data entrepreneur block
* @author weradet nopsombun 62160110
* @Create Date 2564-07-21
*/ 
-->
<!-- main content -->
<div class="row">
    <div class="col">
        <h3 class="text-dark custom-h4-card-table" style="padding-bottom: 15px; margin : 0 auto;">
            ผู้ประกอบการที่ถูกระงับ</h3>
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
                                <a class="nav-link"
                                    href=" <?php echo base_url() . 'Admin/Manage_entrepreneur/Admin_approval_entrepreneur/show_data_consider' ?> ">
                                    <h5 class="h5-card-header">รออนุมัติ</h5>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"
                                    href=" <?php echo base_url() . 'Admin/Manage_entrepreneur/Admin_approval_entrepreneur/show_data_approve' ?> ">
                                    <h5 class="h5-card-header">อนุมัติแล้ว</h5>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="<?php echo base_url() . 'Admin/Manage_entrepreneur/Admin_approval_entrepreneur/show_data_reject'; ?>">
                                    <h5 class="h5-card-header">ถูกปฏิเสธ</h5>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active"
                                    href="<?php echo base_url() . 'Admin/Manage_entrepreneur/Admin_approval_entrepreneur/show_data_block'; ?>">
                                    <h5 class="h5-card-header">ถูกระงับ</h5>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- <div class="col">
                 <h4 class="text-white custom-h4-card-table text-center">ข้อมูลผู้ประกอบการที่ยังไม่ได้รับอนุมัติ</h4>
                 </div>
                 -->
            <div class="col">
                <form class="form-inline custom-form-search"
                    action="<?php echo base_url() . 'Admin/Manage_entrepreneur/Admin_approval_entrepreneur/show_data_consider'; ?>"
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

    <!-- Tab1 -->
    <div class="card-body">
        <div class="card-body">

            <div class="table-responsive" id="data_ent">
                <!-- table approve ajax  -->

            </div>

        </div>
    </div>
</div>
<!-- warnning aprove Modal  -->
<div class="modal" tabindex="-1" role="dialog" id="unblock_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">แจ้งเตือน</h5>
            </div>
            <div class="modal-body">
                <p>คุณต้องการปลดบล็อค <span id="ent_unblock_name_confirm"></span> ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="unblock" data-dismiss="modal">ยืนยัน</button>
                <button class="btn btn-secondary" style="color: white; background-color: #777777;"
                    data-dismiss="modal">ยกเลิก</button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
  
        $('#search_box').keyup(function() {
        var query = $('#search_box').val();
        load_data(4, 1, query);
        // console.log(query);
    });
    $(document).on('click', '.page-link', function() {
        var page = $(this).data('page_number');
        var query = $('#search_box').val();
        load_data(4, page, query);
    });
    load_data(4, 1);
});


function confirm_unblock(ent_id, ent_name, ent_email) {
    console.log(ent_name);
    $('#ent_unblock_name_confirm').text(ent_name);
    $('#unblock_modal').modal();

    $('#unblock').click(function() {
        unblock_user(ent_id, ent_email);
    });
}
/*
 * unblock_user
 * send ajax to unblock file Admin_block_user
 * @input ent_id
 * @output sweet alert
 * @author Weradet Nopsombun
 * @Create Date 2564-07-27
 * @Update -
 */
function unblock_user(ent_id, ent_email) {
    $.ajax({
        type: "POST",
        data: {
            ent_id: ent_id
        },
        url: '<?php echo base_url('Admin/Manage_entrepreneur/Admin_block_user/unblock_user_ajax'); ?>',
        success: function() {
            //sweet alert
            swal({
                title: "ปลดบล็อคผู้ใช้งานสำเร็จ",
                text: "ปลดบล็อคผู้ประกอบการสำเร็จ",
                type: "success",
                showConfirmButton: false,
                timer: 2000,
            }, function() {
                location.reload();
            })
            var content = "บัญชีของคุณถูกปลดบล็อคแล้ว สามารถเข้าใช้งานระบบได้ในทันที";
            var content_h1 = "คุณถูกปลดบล็อคบัญชีการใช้งาน";
            var subject = "Admin has unblocked your account.";
            send_mail_ajax(content, ent_email, subject, content_h1);
        },
        error: function() {
            alert('ajax block user error working');
        }
    });
}
</script>