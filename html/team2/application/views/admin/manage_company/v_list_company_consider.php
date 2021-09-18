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
 <div class="vr-line">
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
                                 <a class="nav-link active" href=" <?php echo base_url() . 'Admin/Manage_company/Admin_approval_company/show_data_consider' ?> ">รออนุมัติ</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href="<?php echo base_url() . 'Admin/Manage_company/Admin_approval_company/show_data_approve' ?> ">อนุมัติแล้ว</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href="<?php echo base_url() . 'Admin/Manage_company/Admin_approval_company/show_data_reject' ?>">ถูกปฏิเสธ</a>
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
 <div class="modal" tabindex="-1" role="dialog" id="Aprovemodal">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" style="font-family: 'Prompt', sans-serif;">คุณต้องการอนุมัติ ?</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <p>คุณต้องการอนุมัติสถานที่นี้ใช่หรือไม่?</p>
             </div>
             <div class="modal-footer">
                 <button class="btn btn-success" id="approves" data-dismiss="modal">ยืนยัน</button>
                 <button class="btn btn-secondary" style="color: white; background-color: #777777;" data-dismiss="modal">ยกเลิก</button>
             </div>
         </div>
     </div>
 </div>



 <!-- warnning reject  -->
 <div class="modal" tabindex="-1" role="dialog" id="Rejectent">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">คุณต้องการปฏิเสธ ?</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <p>กรุณาระบุเหตุผล</p>
                 <form method="POST" action="<?php echo base_url() . 'Admin/Manage_company/Admin_approval_company/reject_company'; ?>">
                     <input type="hidden" id="email" name="email">
                     <input type="hidden" id="com_id" name="com_id">
                     <textarea class="form-control" style="min-width: 100%" id="admin_reason" name="admin_reason"></textarea>
             </div>
             <div class="modal-footer">
                 <button type="submit" class="btn btn-success" id="rejected">ยืนยัน</button>
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
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
      * open modal id = Aprovemodal 
      * @input click button approve
      * @output modal to confirm approve modal
      * @author Kasama Donwong 62160074
      * @Create Date 2564-08-08
      * @Update -
      */

     function confirm_approve(com_id) {
         $('#Aprovemodal').modal();

         $('#approves').click(function() {
             approve_company(com_id) //function 

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

     function confirm_reject(com_id, ent_email) {
         $('#Rejectent').modal();

         $('#email').val(ent_email);
         $('#com_id').val(com_id);

         $('#rejected').click(function() {
             $('#Rejectent').modal('toggle');
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
      * approve_company
      * change status to approve 
      * @input click button approve
      * @output change status to 2
      * @author Kasama Donwong 62160074
      * @Create Date 2564-08-08
      * @Update -
      */
     function approve_company(com_id) {
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
                     text: "อนุมัติสถานที่สำเร็จ",
                     type: "success",
                     showConfirmButton: false,
                     timer: 3000,
                 }, function() {
                     location.reload();
                 })
             },
             error: function() {
                 alert('ajax error working');
             }
         });
     }
 </script>