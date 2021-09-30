 <!-- 
/*
* v_list_event_approve
* table show list event approve
* @input -
* @output table data event approve
* @author Nantasiri 62160093
* @Create Date 2564-09-23
*/ 
-->
 <!-- main content -->
 <div class="row">
     <div class="col">
         <h3 class="text-dark custom-h4-card-table" style="padding-bottom: 15px; margin : 0 auto;">กิจกรรมที่อนุมัติแล้ว</h3>
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
                                 <a class="nav-link" href=" <?php echo base_url() . 'Admin/Manage_event/Admin_approval_event/show_data_consider' ?> "><h5 class="h5-card-header">รออนุมัติ</h5></a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link active" href=" <?php echo base_url() . 'Admin/Manage_event/Admin_approval_event/show_data_approve' ?> "><h5 class="h5-card-header">อนุมัติแล้ว</h5></a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href="<?php echo base_url() . 'Admin/Manage_event/Admin_approval_event/show_data_reject'; ?>"><h5 class="h5-card-header">ถูกปฏิเสธ</h5></a>
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
                 <form class="form-inline custom-form-search " action="<?php echo base_url() . 'Admin/Manage_event/Admin_approval_event/show_data_consider'; ?>" method="POST">
                     <div class="input-group ">
                         <input type="text" value="" id="search_box" name="value_search" class="form-control custom-search" placeholder="  ค้นหาชื่อได้ที่นี่...">
                     </div>
                 </form>
             </div>
         </div>
     </div>
     <!-- Tab1 -->
     <div class="card-body">
         <div class="table-responsive" id="data_event_approve">
         </div>
     </div>
 </div>


 <!-- warnning aprove Modal  -->
 <div class="modal" tabindex="-1" role="dialog" id="aprove_modal">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">คุณแน่ใจหรือไม่ ?</h5>
             </div>
             <div class="modal-body">
                 <p>คุณต้องการอนุมัติ <span id="ent_name_confirm"></span> ?</p>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-success" id="approves" data-dismiss="modal">ยืนยัน</button>
                 <button class="btn btn-secondary" style="color: white; background-color: #777777;" data-dismiss="modal">ยกเลิก</button>
             </div>
         </div>
     </div>
 </div>

 <div class="modal fade" role="dialog" id="data_modal">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">รายละเอียด</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true" style="font-size: 35px;">&times;</span>
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
                                 <label for="">รหัสประจำตัวประชาชน</label>
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
                 <button type="button" class="btn btn-success" onclick="confirm_approve_view_data_madal()" data-dismiss="modal">อนุมัติ</button>
                 <button type="button" class="btn btn-danger" onclick="confirm_reject_view_data_madal()" data-dismiss="modal">ปฏิเสธ</button>
             </div>
         </div>
     </div>
 </div>

 <!-- warnning add score  -->
 <div class="modal" tabindex="-1" role="dialog" id="add_score_eve">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">คุณต้องการเพิ่มคะแนนให้กิจกรรม <span id="eve_name_confirm"></span> ?</h5>
             </div>
             <div class="modal-body">
                 <p>กรุณาระบุคะแนน</p>
                 <form method="POST" action="<?php echo base_url() . 'Admin/Manage_event/Admin_approval_event/add_point_event'; ?>" id="add_point_form">
                     <input type="hidden" id="email" name="ent_email">
                     <input type="hidden" id="eve_id_form" name="eve_id">
                     <input type="number" id="eve_point" name="eve_point">
                     <!-- <textarea class="form-control" style="min-width: 100%" id="admin_reason" name="admin_reason" placeholder="กรุณาระบุเหตุผลในการปฏิเสธ..."></textarea> -->
                     <!-- <span id="err_message" style="display: none; color: red;">กรุณาระบุเหตุผลในการปฏิเสธไม่ต่ำกว่า 6 ตัวอักษร</span> -->
             </div>
             <div class="modal-footer">
                 <button type="submit" class="btn btn-success" id="add_score">ยืนยัน</button>
                 <button class="btn btn-secondary" style="color: white; background-color: #777777;" data-dismiss="modal">ยกเลิก</button>
                 </form>
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
                 url: '<?php echo base_url('Admin/Manage_event/Admin_approval_event/show_data_ajax/'); ?>' + 2,
                 method: "POST",
                 data: {
                     page: page,
                     query: query
                 },
                 success: function(data) {
                     $('#data_event_approve').html(data);
                 }
             });
         }
     /*
      * confirm_add_score_eve
      * open modal id = Aprovemodal 
      * @input 
      * @output modal to confirm approve modal
      * @author Weradet Nopsombun 62160110
      * @Create Date 2564-07-17
      * @Update 2564-09-18
      */
     function confirm_add_score_eve(eve_id, eve_name, ent_email){
        let form = document.querySelector('#add_point_form');
         $('#eve_name_confirm').text(eve_name);
         $('#add_score_eve').modal();
         $('#email').val(ent_email);
         $('#eve_id_form').val(eve_id);
         $('#eve_point').val(eve_point);
         console.log(ent_email)
         $('#add_score').click(function() {
            $('#add_score_event').modal('toggle');
                 swal({
                     title: "ปฏิเสธสำเร็จ",
                     text: "ปฏิเสธผู้ประกอบการสำเร็จ กำลังจัดส่งอีเมล...",
                     type: "success",
                     showConfirmButton: false,
                     timer: 3000,
                 }, function() {
                     location.reload();
                 });
         });
     }
        
     /*
      * confirm_approve_view_data_madal
      * open modal id = Aprovemodal 
      * @input 
      * @output modal to confirm approve modal
      * @author Weradet Nopsombun 62160110
      * @Create Date 2564-07-17
      * @Update 2564-09-18
      */

     function confirm_approve_view_data_madal() {
         let ent_id = $('#ent_id').val();
         let ent_name = $('#ent_name').val();
         let ent_email = $('#ent_email').val();
         $('#ent_name_confirm').text(ent_name);
         console.log(ent_name);
         $('#aprove_modal').modal({
             backdrop: 'static',
             keyboard: false
         });
         $('#approves').click(function() {
            
         });
     }
     /*
      * confirm_reject
      * open modal id = Aprovemodal 
      * @input 
      * @output modal to reject  modal 
      * @author Weradet Nopsombun 62160110
      * @Create Date 2564-07-17
      * @Update -
      */
     function confirm_reject(ent_id, ent_email, ent_name) {
         let form = document.querySelector('#reject_form');
         $('#ent_reject_name_confirm').text(ent_name);
         $('#rejected_ent').modal();
         $('#email').val(ent_email);
         $('#ent_id_form').val(ent_id);
         console.log(ent_email);

         let admin_reson = document.querySelectorAll('#admin_reason');
         let err_message = document.querySelector('#err_message');

         console.log(admin_reson);
         $('#rejected').click(function() {
             let tooshort = false;
             admin_reson.forEach((reson) => {
                 if (reson.value.length < 6) {
                     tooshort = true;
                 }
             });
             if (tooshort) {
                 event.preventDefault();
                 err_message.style.display = 'block';
             } else {
                 $('#rejected_ent').modal('toggle');
                 err_message.style.display = 'none';
                 swal({
                     title: "ปฏิเสธสำเร็จ",
                     text: "ปฏิเสธผู้ประกอบการสำเร็จ กำลังจัดส่งอีเมล...",
                     type: "success",
                     showConfirmButton: false,
                     timer: 3000,
                 }, function() {
                     location.reload();
                 });
             }
         });
     }
     /*
      * confirm_reject
      * open modal id = Aprovemodal 
      * @input 
      * @output modal to reject  modal 
      * @author Weradet Nopsombun 62160110
      * @Create Date 2564-07-17
      * @Update -
      */
     function confirm_reject_view_data_madal() {
         let ent_id = $('#ent_id').val();
         let ent_name = $('#ent_name').val();
         let ent_email = $('#ent_email').val();
         let form = document.querySelector('#reject_form');

         $('#ent_reject_name_confirm').text(ent_name);
         $('#rejected_ent').modal();
         $('#email').val(ent_email);
         $('#ent_id_form').val(ent_id);
         console.log(ent_id);
         let admin_reson = document.querySelectorAll('#admin_reason');
         let err_message = document.querySelector('#err_message');

         console.log(admin_reson);
         $('#rejected').click(function() {
             let tooshort = false;
             admin_reson.forEach((reson) => {
                 if (reson.value.length < 6) {
                     tooshort = true;
                 }
             });
             if (tooshort) {
                 event.preventDefault();
                 err_message.style.display = 'block';
             } else {
                 $('#rejected_ent').modal('toggle');
                 err_message.style.display = 'none';
                 swal({
                     title: "ปฏิเสธสำเร็จ",
                     text: "ปฏิเสธผู้ประกอบการสำเร็จ กำลังจัดส่งอีเมล...",
                     type: "success",
                     showConfirmButton: false,
                     timer: 3000,
                 }, function() {
                     location.reload();
                 });
             }
         });
     }
     /*
      * approve_entrepreneur
      * change status to approve 
      * @input 
      * @output table approve and consider
      * @author Weradet Nopsombun 62160110
      * @Create Date 2564-07-17
      * @Update -
      */
    //  function add_point(eve_id, ent_email,eve_point) {
    //      $.ajax({
    //          type: "POST",
    //          data: {
    //              eve_id: eve_id,
    //              eve_point: eve_point
    //          },
    //          url: '<?php echo base_url('Admin/Manage_event/Admin_approval_event/add_point_event'); ?>',
    //          success: function() {
    //              //sweet alert
    //              swal({
    //                  title: "เพิ่มคะแนนสำเร็จ",
    //                  text: "เพิ่มคะแนนกิจกรรมสำเร็จ",
    //                  type: "success",
    //                  showConfirmButton: false,
    //                  timer: 3000
    //              }, function() {
    //                 location.reload();
    //              })
    //             //  var content = "ผู้ใช้สามารถเข้าสู่ระบบโดยใช้ Account ของตนเองเท่าน้ัน หากไม่สามารถเข้าใช้านได้กรุณาติดต่อผู้ดูแลระบบเพื่อสอบถามข้อมูลเพิ่มเติม";
    //             //  var content_h1 = "คุณได้รับการอนุมัติการลงทะเบียนผู้ประกอบการ";
    //             //  var subject = "Approval";
    //             //  send_mail_ajax(content, ent_email, subject, content_h1);
    //          },
    //          error: function() {
    //              alert('ajax error working');
    //          }
    //      });
    //  }
 </script>