 <!-- 
/*
* v_list_entrepreneur_approve
* Display table entrepreneur approve
* @input -
* @output list table entrepreneur approve
* @author weradet nopsombun 62160110
* @Create Date 2564-08-08
*/ 
-->

 <!-- main content -->
 <div class="row">
     <div class="col">
         <h3 class="text-dark custom-h4-card-table" style="padding-bottom: 15px; margin : 0 auto;">
             ผู้ประกอบการที่อนุมัติแล้ว</h3>
     </div>
 </div>
 <!-- tab แสดงหน้่า -->
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
                                 <a class="nav-link active"
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
                                 <a class="nav-link"
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
     <div class="card-body">
         <div class="card-body">

             <div class="table-responsive" id="data_ent">
                 <!-- table approve ajax  -->

             </div>

         </div>
     </div>
 </div>
 <!-- warnning block Modal  -->
 <div class="modal" tabindex="-1" role="dialog" id="block_modal">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">แจ้งเตือน</h5>
             </div>
             <div class="modal-body">
                 <p>คุณต้องการระงับ <span id="ent_block_name_confirm"></span> ?</p>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-success" id="blocked" data-dismiss="modal">ยืนยัน</button>
                 <button class="btn btn-secondary" style="color: white; background-color: #777777;"
                     data-dismiss="modal">ยกเลิก</button>
             </div>
         </div>
     </div>
 </div>

 <!-- มอดอลแสดงรายละเอียด -->
 <div class="modal fade" role="dialog" id="data_modal">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">รายละเอียด</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true" style="font-size: 30px;">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form>
                     <div class="form-group">
                         <div class="row">
                             <div class="col-md-6">
                                 <label> ชื่อ-นามสกุล</label>
                                 <input type="text" id="ent_name" class="form-control" disabled>
                                 <input type="hidden" id="ent_id" class="form-control" disabled>
                             </div>
                             <div class="col-md-6">
                                 <label>เบอร์โทร</label>
                                 <input type="text" id="ent_tel" class="form-control" disabled>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col">
                                 <label for="">หมายเลขบัตรประชาชน</label>
                                 <input type="text" id="ent_id_card" class="form-control" disabled>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col">
                                 <label>อีเมล</label>
                                 <input type="text" class="form-control" id="ent_email" disabled>
                             </div>
                             <div class="col">
                                 <label>วันเกิด</label>
                                 <input type="text" class="form-control" id="ent_birthdate" disabled>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col">
                                 <label>วันที่่สมัคร</label>
                                 <input type="text" class="form-control" id="ent_regis_date" disabled>
                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col">
                             <label>เอกสารที่เกี่ยวข้อง</label>
                             <div id="file_dowload">
                             </div>
                         </div>
                     </div>
                 </form>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-danger" onclick="confirm_block_view_data_madal()"
                     data-dismiss="modal">ระงับ</button>
             </div>
         </div>
     </div>
 </div>



 <script>
$(document).ready(function() {

    load_data(2, 1); // function in template/v_javascript_admin
    $('#search_box').keyup(function() {
        var query = $('#search_box').val();
        load_data(2,1, query); 
        // console.log(query);
    });
    $(document).on('click', '.page-link', function() {
        var page = $(this).data('page_number');
        var query = $('#search_box').val();
        load_data(2, page, query);
    });
});

/*
 * confirm_block
 * open modal id = blockmodal 
 * @input 
 * @output modal to confirm block user 
 * @author Weradet Nopsombun
 * @Create Date 2564-07-27
 * @Update -
 */

function confirm_block(ent_id, ent_name, ent_email) {
    $('#block_modal').modal();
    $('#ent_block_name_confirm').text(ent_name);
    $('#blocked').click(function() {
        console.log("check");
        block_user(ent_id, ent_email);
    });
}
/*
 * confirm_block
 * open modal id = blockmodal 
 * @input 
 * @output modal to confirm block user 
 * @author Weradet Nopsombun
 * @Create Date 2564-07-27
 * @Update -
 */
function confirm_block_view_data_madal() {
    $('#block_modal').modal();
    let ent_id = $('#ent_id').val();
    console.log(ent_id)
    let ent_name = $('#ent_name').val();
    $('#ent_block_name_confirm').text(ent_name);
    $('#blocked').click(function() {
        console.log("check");
        block_user(ent_id, ent_email);
    });
}

/*
 * block_user
 * send ajax into block_user controller
 * @input ent_id
 * @output sweet alert
 * @author Weradet Nopsombun
 * @Create Date 2564-07-27
 * @Update -
 */

function block_user(ent_id, ent_email) {
    $.ajax({
        type: "POST",
        data: {
            ent_id: ent_id
        },
        url: '<?php echo base_url('Admin/Manage_entrepreneur/Admin_block_user/block_user_ajax'); ?>',
        success: function() {
            //sweet alert
            swal({
                title: "ระงับผู้ใช้งานสำเร็จ",
                text: "ระงับผู้ประกอบการสำเร็จ",
                type: "success",
                showConfirmButton: false,
                timer: 2000
            }, function() {
                location.reload();
            })

            // สำหรับ ส่งเมล
            var content = "บัญชีของคุณถูกบล็อคเนื่องจากผู้ใช้งานได้ละเมิดกฎของเว็บไซต์ Drop Carbon System";
            var content_h1 = "คุณถูกระงับบัญชีการใช้งาน";
            var subject = "Admin has blocked your account.";
            send_mail_ajax(content, ent_email, subject, content_h1); // in dcs_controller
        },
        error: function() {
            alert('ajax block user error working');
        }
    });
}
 </script>