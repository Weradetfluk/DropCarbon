 <!-- 
/*
* v_list_company_consider
* Display consider company table
* @input -
* @output consider company list
* @author Kasama Donwong 62160074
* @Create Date 2564-08-08
*/ 
-->
 <!-- main content -->
 <div>
     <h3 class="text-dark custom-h4-card-table" style="padding-bottom: 15px; margin : 0 auto; ">สถานที่ที่รออนุมัติ</h3>
 </div>

 <div class="card card-nav-tabs custom-card-tab">
     <div class="card-header custom-header-tab">
         <div class="row">
             <div class="col-sm-6">
                 <div class="nav-tabs-navigation">
                     <div class="nav-tabs-wrapper">
                         <ul class="nav nav-tabs" data-tabs="tabs">
                         <li class="nav-item">
                                 <a class="nav-link active" href=" <?php echo base_url() . 'Admin/Manage_company/Admin_approval_company/show_data_consider' ?> "><h5 class="h5-card-header">รออนุมัติ</h5></a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href="<?php echo base_url() . 'Admin/Manage_company/Admin_approval_company/show_data_approve' ?> "><h5 class="h5-card-header">อนุมัติแล้ว</h5></a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href="<?php echo base_url() . 'Admin/Manage_company/Admin_approval_company/show_data_reject' ?>"><h5 class="h5-card-header">ถูกปฏิเสธ</h5></a>
                             </li>
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
         <div class="table-responsive" id="data_com_consider">
         </div>
     </div>
 </div>




 <!-- warnning aprove Modal  -->
 <div class="modal" tabindex="-1" role="dialog" id="aprove_modal">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" style="font-family: 'Prompt', sans-serif;">แจ้งเตือน</h5>
             </div>
             <div class="modal-body">
                 <p>คุณต้องการอนุมัติ <span id="com_name_confirm"></span> ?</p>
             </div>
             <div class="modal-footer">
                 <button class="btn btn-success" id="approves" data-dismiss="modal">ยืนยัน</button>
                 <button class="btn btn-secondary" style="color: white; background-color: #777777;" data-dismiss="modal">ยกเลิก</button>
             </div>
         </div>
     </div>
 </div>

<!-- warnning reject  -->
<div class="modal" tabindex="-1" role="dialog" id="rejected_com">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" style="font-family: 'Prompt', sans-serif;">แจ้งเตือน</h5>
             </div>
             <div class="modal-body">
                 <p class="modal-title">คุณต้องการที่จะปฏิเสธ <span id="com_reject_name_confirm"></span> ?</p>
                 <p>กรุณาระบุเหตุผล</p>
                 <form method="POST" action="<?php echo base_url() . 'Admin/Manage_company/Admin_approval_company/reject_company'; ?>" id="reject_form">
                     <input type="hidden" id="email" name="email">
                     <input type="hidden" id="com_id_form" name="com_id">
                     <input type="hidden" id="com_ent_id" name="com_ent_id">
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

         function load_data(page, query = '') {
             console.log(query);
             $.ajax({
                 url: '<?php echo base_url('Admin/Manage_company/Admin_approval_company/show_data_ajax/'); ?>' + 1,
                 method: "POST",
                 data: {
                     page: page,
                     query: query
                 },
                 success: function(data) {
                     $('#data_com_consider').html(data);
                 }
             });
         }
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
     /*
      * confirm_approve
      * open modal id = aprove_modal 
      * @input click button approve
      * @output modal to confirm approve modal
      * @author Kasama Donwong 62160074
      * @Create Date 2564-08-08
      * @Update -
      */

      function confirm_approve(com_id, com_name, ent_email) {
         $('#com_name_confirm').text(com_name);
         console.log(ent_email)
         $('#aprove_modal').modal({
             backdrop: 'static',
             keyboard: false
         });
         $('#approves').click(function() {
             approve_company(com_id, ent_email) //function 
         });
     }

     /*
      * confirm_reject
      * open modal id = Rejectent
      * @input com_id, ent_email
      * @output modal to reject  modal 
      * @author Nantasiri Saiwaew 62160093
      * @Create Date 2564-08-10
      * @Update -
      */

     function confirm_reject(com_id, ent_email,com_name,com_ent_id) {
        let form = document.querySelector('#reject_form');
         $('#com_reject_name_confirm').text(com_name);
         $('#rejected_com').modal();
         $('#email').val(ent_email);
         $('#com_id_form').val(com_id);
         $('#com_ent_id').val(com_ent_id);
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
                 $('#rejected_com').modal('toggle');
                 err_message.style.display = 'none';
                 swal({
                     title: "ปฏิเสธสำเร็จ",
                     text: "ปฏิเสธสถานที่สำเร็จ กำลังจัดส่งอีเมล...",
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
      * approve_company
      * change status to approve 
      * @input click button approve
      * @output change status to 2
      * @author Kasama Donwong 62160074
      * @Create Date 2564-08-08
      * @Update -
      */
      function approve_company(com_id, ent_email) {
         $.ajax({
             type: "POST",
             data: {
                 com_id: com_id
             },
             url: '<?php echo base_url('Admin/Manage_company/Admin_approval_company/approval_company'); ?>',
             success: function() {
                 //sweet alert
                 swal({
                     title: "อนุมัติสำเร็จ",
                     text: "อนุมัติสถานที่สำเร็จ กำลังจัดส่งอีเมล...",
                     type: "success",
                     showConfirmButton: false,
                     timer: 3000,
                 }, function() {
                     location.reload();
                 })
                 var content = "สถานที่ของคุณได้รับการอนุมัติจากผู้ดูแลระบบแล้ว";
                 var content_h1 = "ผู้ดูแลระบบอนุมัติการเพิ่มสถานที่แล้ว";
                 var subject = "Approval";
                 send_mail_ajax(content, ent_email, subject, content_h1);
             },
             error: function() {
                 alert('ajax error working');
             }
         });
     }
 </script>