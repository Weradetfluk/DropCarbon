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
 <div class="vr-line">
 <h3 class="text-dark custom-h4-card-table" style="padding-bottom: 15px; margin : 0 auto;">ตารางแสดงข้อมูลผู้ประกอบการที่ได้รับอนุมัติแล้ว</h3>
 </div>
 <div class="card card-nav-tabs custom-card-tab">
     <div class="card-header custom-header-tab">
         <div class="row">
             <div class="col-sm-6">
                 <div class="nav-tabs-navigation">
                     <div class="nav-tabs-wrapper">
                         <ul class="nav nav-tabs" data-tabs="tabs">
                             <li class="nav-item">
                                 <a class="nav-link" href=" <?php echo base_url() . 'Admin/Manage_entrepreneur/Admin_approval_entrepreneur/show_data_consider' ?> ">ยังไม่ได้รับอนุมัติ</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link active" href=" <?php echo base_url() . 'Admin/Manage_entrepreneur/Admin_approval_entrepreneur/show_data_approve' ?> ">อนุมัติแล้ว</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href="<?php echo base_url() . 'Admin/Manage_entrepreneur/Admin_approval_entrepreneur/show_data_reject'; ?>">ผู้ใช้ที่ถูกปฏิเสธ</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href="<?php echo base_url() . 'Admin/Manage_entrepreneur/Admin_approval_entrepreneur/show_data_block'; ?>">ผู้ใช้ที่ถูกบล็อค</a>
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
                 <form class="form-inline custom-form-search" action="<?php echo base_url() . 'Admin/Manage_entrepreneur/Admin_approval_entrepreneur/show_data_consider'; ?>" method="POST">

                     <div class="input-group ">
                         <input type="text" value="" id="search_box" name="value_search" class="form-control custom-search" placeholder="  ค้นหาชื่อได้ที่นี่...">
                     </div>
                 </form>
             </div>
         </div>
     </div>
     <!-- Tab1 -->
     <div class="card-body">
         <div class="card-body">

             <div class="table-responsive" id="data_entre_approve">
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
                 <h5 class="modal-title">คุณต้องการบล็อค ?</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <p>คุณต้องการบล็อคผู้ประกอบการคนนี้ใช่หรือไม่ ?</p>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-success" id="blocked" data-dismiss="modal">ยืนยัน</button>
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


 <script>
     $(document).ready(function() {

         load_data(1);

         function load_data(page, query = '') {
             console.log(query);
             $.ajax({
                 url: '<?php echo base_url('Admin/Manage_entrepreneur/Admin_approval_entrepreneur/show_data_ajax/'); ?>'+2,
                 method: "POST",
                 data: {
                     page: page,
                     query: query
                 },
                 success: function(data) {
                     $('#data_entre_approve').html(data);
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
      * confirm_block
      * open modal id = blockmodal 
      * @input 
      * @output modal to confirm block user 
      * @author Weradet Nopsombun
      * @Create Date 2564-07-27
      * @Update -
      */

     function confirm_block(ent_id) {
         $('#block_modal').modal();

         $('#blocked').click(function() {
             console.log("check");
             block_user(ent_id);

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

     function block_user(ent_id) {
         $.ajax({
             type: "POST",
             data: {
                 ent_id: ent_id
             },
             url: '<?php echo base_url('Admin/Manage_entrepreneur/Admin_block_user/block_user_ajax'); ?>',
             success: function() {
                 //sweet alert
                 swal({
                     title: "บล็อคผู้ใช้งานสำเร็จ",
                     text: "บล็อคผู้ประกอบการสำเร็จ",
                     type: "success",
                     showConfirmButton: false,
                     timer: 3000,
                 }, function() {
                     location.reload();

                 })
             },
             error: function() {
                 alert('ajax block user error working');
             }
         });

     }
 </script>