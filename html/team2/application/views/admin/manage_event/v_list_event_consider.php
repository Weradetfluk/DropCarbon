 <!-- 
/*
* v_list_event_consider
* table show list event consider
* @input -
* @output table data entrepreneur consider
* @author Nantasiri 62160093
* @Create Date 2564-09-23
*/ 
-->
 <!-- main content -->
 <div class="row">
     <div class="col">
         <h3 class=" text-dark custom-h4-card-table" style="padding-bottom: 15px; margin : 0 auto;">กิจกรรมที่รออนุมัติ</h3>
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
                                 <!-- หน้ากิจกรรมที่รอการอนุมัติ -->
                                 <a class="nav-link active" href=" <?php echo base_url() . 'Admin/Manage_event/Admin_approval_event/show_data_consider' ?> ">
                                     <h5 class="h5-card-header">รออนุมัติ</h5>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href="<?php echo base_url() . 'Admin/Manage_event/Admin_approval_event/show_data_event_not_over'; ?>">
                                     <h5 class="h5-card-header">ยังไม่สิ้นสุด</h5>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href="<?php echo base_url() . 'Admin/Manage_event/Admin_approval_event/show_data_event_over'; ?>">
                                     <h5 class="h5-card-header">สิ้นสุด</h5>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href="<?php echo base_url() . 'Admin/Manage_event/Admin_approval_event/show_data_reject'; ?>">
                                     <h5 class="h5-card-header">ถูกปฏิเสธ</h5>
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </div>
             </div>

             <div class="col-sm-4">
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
         <div class="table-responsive" id="data_event_consider">
         </div>
     </div>
 </div>


 <!-- warnning aprove Modal  -->
 <div class="modal" tabindex="-1" role="dialog" id="aprove_modal">
     <div class="modal-dialog" role="document" style="max-width: 600px;">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">คุณกำลังอนุมัติกิจกรรม<span id="eve_name_confirm"></span></h5>
             </div>
             <div class="modal-body">
                 <p>เพิ่มคะแนนให้กับ <span id="eve_point_name_confirm"></span> ?</p>
                 <p style="font-size: 16px;">กิจกรรมนี้อยู่ในประเภท : <span id="eve_cat_name"></span></p>
                 <p style="font-size: 16px;">แต้มที่ใช้ : <span id="eve_score"></span></p>
                 <input type="number" id="eve_point" name="eve_point" placeholder="กรุณาระบุคะแนน">
                 <input type="hidden" id="eve_id_form" name="eve_id">
                 <input type="hidden" id="eve_cat_id" name="eve_cat_id">
                 <input type="hidden" id="eve_cat_name" name="eve_cat_name">
                 <input type="hidden" id="eve_id_name_form" name="eve_name"><br>
                 <p id="err_message_point" style="color: red;font-size: 16px"></p>
                 <p id="help_information" class="text-success" style="cursor: pointer;"><u>ช่วยเหลือ</u></p>
                 <div style="display: none;" id="infor_eve_cat">

                 </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-success" id="approves">ยืนยัน</button>
                 <button class="btn btn-secondary" style="color: white; background-color: #777777;" data-dismiss="modal">ยกเลิก</button>
             </div>
         </div>
     </div>
 </div>

 <!-- warnning reject  -->
 <div class="modal" tabindex="-1" role="dialog" id="rejected_eve">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">แจ้งเตือน</h5>
             </div>
             <div class="modal-body">
                 <p class="modal-title">คุณต้องการที่จะปฏิเสธ <span id="eve_reject_name_confirm"></span> ?</p>
                 <p>กรุณาระบุเหตุผล</p>
                 <form method="POST" action="<?php echo base_url() . 'Admin/Manage_event/Admin_approval_event/reject_event'; ?>" id="reject_form">
                     <input type="hidden" id="email" name="email">
                     <input type="hidden" id="eve_id_form" name="eve_id">
                     <input type="hidden" id="evr_eve_id" name="eve_id">
                     <textarea class="form-control" style="min-width: 100%" id="admin_reason" name="admin_reason" placeholder="กรุณาระบุเหตุผลในการปฏิเสธ..."></textarea>
                     <span id="err_message" style="display: none; color: red;">กรุณาระบุเหตุผลในการปฏิเสธไม่ต่ำกว่า 6 ตัวอักษร</span>
             </div>
             <div class="modal-footer">
                 <button type="submit" class="btn btn-success" id="rejected">ยืนยัน</button>
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
             url: '<?php echo base_url('Admin/Manage_event/Admin_approval_event/show_data_ajax/'); ?>' + 1,
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
     /*
      * confirm_approve
      * open modal id = Aprovemodal 
      * @input 
      * @output modal to confirm approve modal
      * @author Weradet Nopsombun 62160110
      * @Create Date 2564-07-17
      * @Update 2564-09-18
      */
     function confirm_approve(eve_id, eve_name, ent_email, eve_cat_id, eve_cat_name, min, max) {
         let form = document.querySelector('#aprove_modal');
         console.log(eve_cat_name);
         $('#eve_name_confirm').text(eve_name);
         $('#aprove_modal').modal({
             backdrop: 'static',
             keyboard: false
         });
         $('#eve_point_name_confirm').text(eve_name);
         $('#eve_score').text(min + '-' + max);
         $('#eve_cat_name').text(eve_cat_name);
         $('#eve_id_form').val(eve_id);
         $('#eve_cat_id').val(eve_cat_id);
         $('#eve_cat_name').val(eve_cat_name);
         $('#approves').click(function() {
             let point = document.getElementById('eve_point').value;
             if (check_point(point, min, max) == true) {
                 $('#err_message_point').html('กรุณาระบุคะแนนใหม่');
             } else {
                 let eve_point = $('#eve_point').val();
                 console.log(eve_point)
                 $('#aprove_modal').modal('toggle');
                 approve_event(eve_id, eve_name, ent_email, eve_point) //function 
             }
         });
     }
     /*
      * check_point
      * check point inevent
      * @input point
      * @output err_message
      * @author Nantasiri Saiwaew 62160093
      * @Create Date 2564-10-11
      * @Update -
      */

      function check_point(point, min, max) {
    // let arr_min_point = [1, 20, 30, 40];
    // let arr_max_point = [19, 29, 39, 49];

    console.log(min + max);
    // console.log(arr_min_point[eve_cat_id - 1]);
    // console.log(arr_max_point[eve_cat_id - 1]);
    if (point < 1) {
        return true;
    } else if (point < min || point > max) {
        return true;
    } else {
        return false;
    }
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
     function confirm_reject(eve_id, eve_name, ent_email) {
         let form = document.querySelector('#reject_form');
         $('#eve_reject_name_confirm').text(eve_name);
         $('#rejected_eve').modal();
         $('#email').val(ent_email);
         $('#eve_id_form').val(eve_id);
         $('#evr_eve_id').val(eve_id);
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
                 $('#rejected_eve').modal('toggle');
                 err_message.style.display = 'none';
                 swal({
                     title: "ปฏิเสธสำเร็จ",
                     text: "ปฏิเสธการเพิ่มกิจกรรมสำเร็จ กำลังจัดส่งอีเมล...",
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
      * approve_event
      * change status to approve 
      * @input 
      * @output table approve and consider
      * @author Kasama Donwong 62160074
      * @Create Date 2564-09-26
      * @Update -
      */
     function approve_event(eve_id, eve_name, ent_email, eve_point) {
         $.ajax({
             type: "POST",
             data: {
                 eve_id: eve_id,
                 eve_point: eve_point
             },
             url: '<?php echo base_url('Admin/Manage_event/Admin_approval_event/approval_event'); ?>',
             success: function() {
                 //sweet alert
                 swal({
                     title: "อนุมัติสำเร็จ",
                     text: "อนุมัติกิจกรรมการสำเร็จ กำลังจัดส่งอีเมล...",
                     type: "success",
                     showConfirmButton: false,
                     timer: 3000
                 }, function() {
                     location.reload();
                 })
                 var content = "ผู้ดูแลระบบได้ทำการอนุมัติกิจกรรม " + eve_name + " ของคุณ";
                 var content_h1 = "คุณได้รับการอนุมัติกิจกรรม " + eve_name;
                 var subject = "Approval";
                 send_mail_ajax(content, ent_email, subject, content_h1);
             },
             error: function() {
                 alert('ajax error working');
             }
         });
     }
 </script>