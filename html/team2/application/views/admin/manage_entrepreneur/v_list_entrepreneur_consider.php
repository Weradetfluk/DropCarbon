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
 <div class="card card-nav-tabs custom-card-tab">
     <div class="card-header custom-header-tab">
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
                         <a class="nav-link" href="<?php echo base_url() . 'Admin/Manage_entrepreneur/Admin_approval_entrepreneur/show_data_reject'; ?>">ผู้ใช้ที่ถูกปฏิเสธ</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="<?php echo base_url() . 'Admin/Manage_entrepreneur/Admin_approval_entrepreneur/show_data_block'; ?>">ผู้ใช้ที่ถูกบล็อค</a>
                     </li>
                 </ul>
             </div>
         </div>
     </div>


     <!-- Tab1 -->
     <div class="card-body">

         <div class="tab-content">
             <div class="tab-pane active" id="consider">
                 <div class="row">
                     <div class="col-md-12">
                         <div class="card custom-card-head-search">
                             <div class="card-header custom-header">

                                 <div class="row">
                                     <div class="col py-2">
                                         <h4 class="card-title text-white custom-h4-card-table">ตารางแสดงข้อมูลผู้ประกอบการที่ยังไม่ได้รับอนุมัติ</h4>
                                     </div>
                                     <div class="col-sm">
                                         <form class="form-inline custom-form-search" action="<?php echo base_url() . 'Admin/Manage_entrepreneur/Admin_approval_entrepreneur/show_data_consider'; ?>" method="POST">

                                             <div class="input-group ">

                                                 <input type="text" value="" name="value_search" class="form-control custom-search" placeholder="  ค้นหาชื่อได้ที่นี่...">
                                                 <button type="submit" name="search" class="btn btn-white btn-round btn-just-icon" value="" style="margin-left: 3px;">
                                                     <i class="material-icons">search</i>
                                                 </button>

                                             </div>
                                         </form>
                                     </div>
                                 </div>


                             </div>
                             <div class="card-body">
                                 <div class="table-responsive" id="data_entre_consider">

                                     <!-- table consider ajax  -->
                                     <table class="table" style="text-align: center;" id="entre_tale">
                                         <thead class="text-white custom-thead">
                                             <tr class="custom-tr-header-table">
                                                 <th class="th-custom ">ลำดับ</th>
                                                 <th class="th-custom ">ชื่อ-นามสกุล</th>
                                                 <th class="th-custom ">เบอร์โทร</th>
                                                 <th class="th-custom ">อีเมล</th>
                                                 <th class="th-custom ">ดำเนินการ</th>
                                             </tr>
                                         </thead>
                                         <tbody class="list">

                                             <?php

                                                if (sizeof($arr_entrepreneur) == 0) {
                                                    echo "<td colspan = '5'>";
                                                    echo "ไม่มีข้อมูลในตารางนี้";
                                                    echo "</td>";
                                                } else {

                                                    for ($i = 0; $i < count($arr_entrepreneur); $i++) { ?>
                                                     <tr>
                                                         <!-- column ลำดับ -->
                                                         <td style='text-align: center;'>
                                                             <?php echo ($i + 1); ?>
                                                         </td>

                                                         <!-- column ชื่อ-สกุล -->
                                                         <td>
                                                             <?php echo $arr_entrepreneur[$i]->ent_firstname . " " . $arr_entrepreneur[$i]->ent_lastname; ?>
                                                         </td>


                                                         <!-- column เบอร์โทร -->
                                                         <td>
                                                             <?php echo $arr_entrepreneur[$i]->ent_tel; ?>
                                                         </td>

                                                         <!-- column Email -->
                                                         <td>
                                                             <?php echo $arr_entrepreneur[$i]->ent_email; ?>
                                                         </td>


                                                         <!-- column ดำเนินการ -->
                                                         <td style='text-align: center;'>


                                                             <button class="btn btn-success custom-btn-table" id="accept" onclick="confirm_approve(  <?php echo $arr_entrepreneur[$i]->ent_id; ?>)">
                                                                 <i class="material-icons">done</i>
                                                             </button>


                                                             <button class="btn btn-danger custom-btn-table" id="reject" onclick='confirm_reject("<?php echo $arr_entrepreneur[$i]->ent_id; ?>" , "<?php echo $arr_entrepreneur[$i]->ent_email;  ?>")'>
                                                                 <i class="material-icons">
                                                                     clear
                                                                 </i>
                                                             </button>


                                                             <button class="btn btn-info custom-btn-table" onclick='view_data( <?php echo $arr_entrepreneur[$i]->ent_id; ?>)'>
                                                                 <i class="material-icons">
                                                                     search
                                                                 </i>
                                                             </button>
                                                         </td>



                                                     </tr>

                                                 <?php } ?>
                                             <?php } ?>


                                         </tbody>
                                     </table>
                                 </div>

                                 <div><?php echo $links; ?></div>

                             </div>
                         </div>
                     </div>
                 </div>
             </div>



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
                     <textarea class="form-control" style="min-width: 100%" id="admin_reason" name="admin_reason"  placeholder="กรุณาระบุเหตุผลในการปฏิเสธ..."></textarea>
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

         let admin_reson  = document.querySelectorAll('#admin_reason');
         let err_message = document.querySelector('#err_message');

         console.log(admin_reson);
         $('#rejected').click(function() {


             let tooshort = false;

             admin_reson.forEach((reson) => {
                 if (reson.value.length < 16) {
                     tooshort = true;
                 }
             });

             if (tooshort) {
                 event.preventDefault();
                 err_message.style.display = 'block';
             }else{
                $('#rejected_ent').modal('toggle');
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