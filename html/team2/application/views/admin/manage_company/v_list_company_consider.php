 <!-- 
/*
* v_list_company_consider
* Display consider company table
* @input -
* @output consider company list
* @author Kasama Donwong 62160074
* @Create Date 2561-08-08
*/ 
-->
 <!-- main content -->

 <div class="content">
     <div class="container-fluid">

         <div class="card card-nav-tabs" style="border-radius: 25px;">
             <div class="card-header" style="background-color: #5F9EA0; border-radius: 10px;">
                 <div class="nav-tabs-navigation">
                     <div class="nav-tabs-wrapper">
                         <ul class="nav nav-tabs" data-tabs="tabs">
                             <li class="nav-item">
                                 <a class="nav-link active" href=" <?php echo base_url() . 'Admin/Manage_company/Admin_approval_company/show_data_consider' ?> "  style="font-size: 16px;">ยังไม่ได้รับอนุมัติ</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href="<?php echo base_url() . 'Admin/Manage_company/Admin_approval_company/show_data_approve' ?> " style="font-size: 16px;">อนุมัติแล้ว</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href="<?php echo base_url() . 'Admin/Manage_company/Admin_approval_company/show_data_reject' ?>"  style="font-size: 16px;">สถานที่ที่ถูกปฏิเสธ</a>
                             </li>
                         </ul>
                     </div>
                 </div>
             </div>


             <!-- Tab1 -->
             <div class="card-body ">
                 <div class="tab-content">
                     <div class="tab-pane active" id="consider">
                         <div class="row">
                             <div class="col-md-12">
                                 <div class="card" style="border-radius: 25px;">
                                     <div class="card-header" style="background-color: #60839f; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); border-radius: 10px;">
                                         <div class="row">
                                             <div class="col py-2">
                                                 <h4 class="card-title text-white " style="font-family: 'Prompt', sans-serif;">ตารางแสดงข้อมูลสถานที่ที่ยังไม่ได้รับอนุมัติ</h4>
                                             </div>
                                             <div class="col">
                                                 <form class="form-inline" action="<?php echo base_url() . 'Admin/Manage_entrepreneur/Admin_approval_entrepreneur/show_data_consider'; ?>" method="POST" style="width: 200px; float:right;">

                                                     <div class="input-group ">

                                                         <input type="text" value="" name="value_search" class="form-control" placeholder="  ค้นหาชื่อได้ที่นี่..." style="background-color:white; border-radius: 10px;">
                                                         <button type="submit" name="search" class="btn btn-white btn-round btn-just-icon" value="">
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
                                                 <thead class="text-white" style="background-color: #e4a487; text-align: center;">
                                                     <tr>
                                                         <th style="font-weight:500;">ลำดับ</th>
                                                         <th style="font-weight:500;">ชื่อสถานที่</th>
                                                         <th style="font-weight:500;">ชื่อผู้ประกอบการ</th>
                                                         <th style="font-weight:500;">อีเมล</th>
                                                         <th style="font-weight:500;">ดำเนินการ</th>
                                                     </tr>
                                                 </thead>
                                                 <tbody class="list">

                                                     <?php

                                                        if (sizeof($arr_company) == 0) {
                                                            echo "<td colspan = '5'>";
                                                            echo "ไม่มีข้อมูลในตารางนี้";
                                                            echo "</td>";
                                                        } else {

                                                            for ($i = 0; $i < count($arr_company); $i++) { ?>
                                                             <tr>
                                                                 <!-- column ลำดับ -->
                                                                 <td style='text-align: center;'>
                                                                     <?php echo ($i + 1); ?>
                                                                 </td>

                                                                 <!-- column ชื่อสถานที่ -->
                                                                 <td>
                                                                     <?php echo $arr_company[$i]->com_name; ?>
                                                                 </td>


                                                                 <!-- column ชื่อผู้ประกอบการ -->
                                                                 <td>
                                                                     <?php echo $arr_company[$i]->ent_firstname . " " . $arr_company[$i]->ent_lastname; ?>
                                                                 </td>

                                                                 <!-- column Email -->
                                                                 <td>
                                                                     <?php echo $arr_company[$i]->ent_email; ?>
                                                                 </td>


                                                                 <!-- column ดำเนินการ -->
                                                                 <td style='text-align: center;'>


                                                                     <button class="btn btn-success" id="accept" style="font-size:10px; padding:12px;" onclick="confirm_approve(  <?php echo $arr_company[$i]->com_id; ?>)">
                                                                         <i class="material-icons">done</i>
                                                                     </button>


                                                                     <button class="btn btn-danger" id="reject" style="font-size:10px; padding:12px;" onclick='confirm_reject("<?php echo $arr_company[$i]->com_id; ?>" , "<?php echo $arr_company[$i]->ent_email; ?>")'>
                                                                         <i class="material-icons">
                                                                             clear
                                                                         </i>
                                                                     </button>


                                                                     <button class="btn btn-info" style="font-size:10px; padding:12px;">
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

                                         <p><?php echo $links; ?></p>

                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>



                 </div>
             </div>
         </div>



         <!-- warnning aprove Modal  -->
         <div class="modal" tabindex="-1" role="dialog" id="Aprovemodal">
             <div class="modal-dialog" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title">คุณต้องการอนุมัติ ?</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <div class="modal-body">
                         <p>คุณต้องการอนุมัติสถานที่นี้ใช่หรือไม่ ?</p>
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-success" id="approves" data-dismiss="modal">ยืนยัน</button>
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                     </div>
                 </div>
             </div>
         </div>



         <!-- warnning data Modal  -->
         <div class="modal fade" role="dialog" id="datamodal">
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
                                     <input type="text" id="com_name" class="form-control" disabled>
                                 </div>
                                 <div class="form-group col-md-6">
                                     <label>เบอร์โทร</label>
                                     <input type="text" id="com_tel" class="form-control" disabled>
                                 </div>
                             </div>

                             <div class="form-group">
                                 <label for="inputAddress">รหัสประจำตัวประชาชน</label>
                                 <input type="text" id="com_id_card" class="form-control" disabled>
                             </div>

                             <div class="form-row">
                                 <div class="form-group col-md-6">
                                     <label>อีเมล</label>
                                     <input type="text" class="form-control" id="com_email" disabled>
                                 </div>

                                 <div class="form-group col-md-6">
                                     <label>วันเกิด</label>
                                     <input type="text" class="form-control" id="com_birthdate" disabled>
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
              * approve_entrepreneur
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