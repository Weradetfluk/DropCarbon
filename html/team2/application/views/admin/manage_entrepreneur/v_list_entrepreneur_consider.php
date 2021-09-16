 <!-- 
/*
* v_list_entrepreneur_consider
* table show list entrepreneur consider
* @input -
* @output table data entrepreneur consider
* @author weradet nopsombun 62160110
* @Create Date 2564-07-17
*/ 
-->
 <!-- main content -->
 <div class="vr-line">
 <h3 class="text-dark custom-h4-card-table" style="padding-bottom: 15px; margin : 0 auto; ">ผู้ประกอบการที่รออนุมัติ</h3>
 </div>
 <div class="card card-nav-tabs custom-card-tab">
     <div class="card-header custom-header-tab">
         <div class="row">
             <div class="col-sm-6">
                 <div class="nav-tabs-navigation">
                     <div class="nav-tabs-wrapper">
                         <ul class="nav nav-tabs" data-tabs="tabs">
                             <li class="nav-item">
                                 <a class="nav-link active" href=" <?php echo base_url() . 'Admin/Manage_entrepreneur/Admin_approval_entrepreneur/show_data_consider' ?> ">ยังไม่ได้รับอนุมัติ</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href=" <?php echo base_url() . 'Admin/Manage_entrepreneur/Admin_approval_entrepreneur/show_data_approve' ?> ">อนุมัติแล้ว</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href="<?php echo base_url() . 'Admin/Manage_entrepreneur/Admin_approval_entrepreneur/show_data_reject'; ?>">ถูกปฏิเสธ</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href="<?php echo base_url() . 'Admin/Manage_entrepreneur/Admin_approval_entrepreneur/show_data_block'; ?>">ถูกบล็อค</a>
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
                 <form class="form-inline custom-form-search " action="<?php echo base_url() . 'Admin/Manage_entrepreneur/Admin_approval_entrepreneur/show_data_consider'; ?>" method="POST">
                     <div class="input-group ">
                         <input type="text" value="" id="search_box" name="value_search" class="form-control custom-search" placeholder="  ค้นหาชื่อได้ที่นี่...">
                     </div>
                 </form>
             </div>
         </div>
     </div>


     <!-- Tab1 -->
     <div class="card-body">
         <div class="table-responsive" id="data_entre_consider">


         </div>



     </div>
 </div>


 <!-- warnning aprove Modal  -->
 <div class="modal" tabindex="-1" role="dialog" id="aprove_modal">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">คุณต้องการอนุมัติ ?</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <p>คุณต้องการอนุมัติผู้ประกอบการคนนี้ใช่หรือไม่ ?</p>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-success" id="approves" data-dismiss="modal">ยืนยัน</button>
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
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
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form>
                     <div class="form-row">
                         <div class="form-group col-md-6">
                             <label>ชื่อ-นามสกุล</label>
                             <input type="text" id="ent_name" class="form-control" disabled>
                         </div>
                         <div class="form-group col-md-6">
                             <label>เบอร์โทร</label>
                             <input type="text" id="ent_tel" class="form-control" disabled>
                         </div>
                     </div>

                     <div class="form-group">
                         <label for="inputAddress">รหัสประจำตัวประชาชน</label>
                         <input type="text" id="ent_id_card" class="form-control" disabled>
                     </div>

                     <div class="form-row">
                         <div class="form-group col-md-6">
                             <label>อีเมล</label>
                             <input type="text" class="form-control" id="ent_email" disabled>
                         </div>

                         <div class="form-group col-md-6">
                             <label>วันเกิด</label>
                             <input type="text" class="form-control" id="ent_birthdate" disabled>
                         </div>
                     </div>

                     <label>เอกสารที่เกี่ยวข้อง</label>
                     <div id="file_dowload">

                     </div>
                 </form>

             </div>
         </div>
     </div>
 </div>




 <!-- warnning reject  -->
 <div class="modal" tabindex="-1" role="dialog" id="rejected_ent">
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
                 <form method="POST" action="<?php echo base_url() . 'Admin/Manage_entrepreneur/Admin_approval_entrepreneur/reject_entrepreneur'; ?>" id="reject_form">
                     <input type="hidden" id="email" name="email">
                     <input type="hidden" id="ent_id" name="ent_id">
                     <textarea class="form-control" style="min-width: 100%" id="admin_reason" name="admin_reason" placeholder="กรุณาระบุเหตุผลในการปฏิเสธ..."></textarea>
                     <span id="err_message" style="display: none; color: red;">กรุณาระบุเหตุผลในการปฏิเสธไม่ต่ำกว่า 6 ตัวอักษร</span>
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
                 url: '<?php echo base_url('Admin/Manage_entrepreneur/Admin_approval_entrepreneur/show_data_ajax/'); ?>'+1,
                 method: "POST",
                 data: {
                     page:page,
                     query: query
                 },
                 success: function(data) {
                     $('#data_entre_consider').html(data);
                 }
             });
         }

         $('#search_box').keyup(function() {
             var query = $('#search_box').val();
             load_data(1,query);
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
      * @input 
      * @output modal to confirm approve modal
      * @author Weradet Nopsombun 62160110
      * @Create Date 2564-07-17
      * @Update -
      */

     function confirm_approve(ent_id) {
         $('#aprove_modal').modal({
             backdrop: 'static',
             keyboard: false
         });

         $('#approves').click(function() {
             approve_entrepreneur(ent_id) //function 

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

     function confirm_reject(ent_id, ent_email) {

         let form = document.querySelector('#reject_form');


         $('#rejected_ent').modal();

         $('#email').val(ent_email);
         $('#ent_id').val(ent_id);

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
      * approve_entrepreneur
      * change status to approve 
      * @input 
      * @output table approve and consider
      * @author Weradet Nopsombun 62160110
      * @Create Date 2564-07-17
      * @Update -
      */
     function approve_entrepreneur(ent_id) {
         $.ajax({
             type: "POST",
             data: {
                 ent_id: ent_id
             },
             url: '<?php echo base_url('Admin/Manage_entrepreneur/Admin_approval_entrepreneur/approval_entrepreneur'); ?>',
             success: function() {
                 //sweet alert
                 swal({
                     title: "อนุมัติสำเร็จ",
                     text: "อนุมัติผู้ประกอบการสำเร็จ",
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