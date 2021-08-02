 <!-- main content -->


         <div class="card card-nav-tabs">
             <div class="card-header" style="background-color: #60839f">
                 <div class="nav-tabs-navigation">
                     <div class="nav-tabs-wrapper">
                         <ul class="nav nav-tabs" data-tabs="tabs">
                             <li class="nav-item">
                                 <a class="nav-link" href="<?php echo base_url().'Admin/Manage_entrepreneur/Admin_approval_entrepreneur/show_data_consider' ?> "">ยังไม่ได้รับอนุมัติ</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link  active" href=" <?php echo base_url() . 'Admin/Manage_entrepreneur/Admin_approval_entrepreneur/show_data_approve' ?> ">อนุมัติแล้ว</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href="<?php echo base_url() . 'Admin/Manage_entrepreneur/Admin_approval_entrepreneur/show_data_reject'; ?>">ผู้ใช้ที่ถูกปฏิเสธ</a>
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
                                 <div class="card">
                                     <div class="card-header" style="background-color: #8fbacb; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2)">
                                         <center>
                                             <h4 class="card-title text-white">ตารางแสดงข้อมูลผู้ประกอบการที่ได้รับอนุมัติแล้ว</h4>
                                         </center>
                                     </div>
                                     <div class="card-body">

                                         <div class="row">
                                             <div class="col-sm-3">
                                                 <form class="navbar-form">
                                                     <div class="input-group no-border has-success">
                                                         <input type="text" value="" class="form-control" placeholder="ค้นหาชื่อได้ที่นี่...">
                                                         <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                                             <i class="material-icons">search</i>

                                                         </button>
                                                     </div>
                                                 </form>
                                             </div>
                                         </div>

                                         <div class="table-responsive" id="data_entre_consider">

                                             <!-- table approve ajax  -->
                                             <table class="table" style="text-align: center;" id="entre_tale_approve">
                                                 <thead class="text-white" style="background-color: #d8b7a8; text-align: center;">
                                                     <tr>
                                                         <th style="text-align: center;font-size: 16px;">ลำดับ</th>
                                                         <th style="text-align: center;font-size: 16px;">ชื่อ-นามสกุล</th>
                                                         <th style="text-align: center;font-size: 16px;">เบอร์โทร</th>
                                                         <th style="text-align: center;font-size: 16px;">อีเมล</th>
                                                         <th style="text-align: center;font-size: 16px;">ดำเนินการ</th>
                                                     </tr>
                                                 </thead>
                                                 <tbody class="list">
                                                     <?php
                                                        if (sizeof($arr_entrepreneur_approve) == 0) {
                                                            echo "<td colspan = '5'>";
                                                            echo "ไม่มีข้อมูลในตารางนี้";
                                                            echo "</td>";
                                                        } else {

                                                            for ($i = 0; $i < count($arr_entrepreneur_approve); $i++) { ?>
                                                             <tr>
                                                                 <!-- column ลำดับ -->
                                                                 <td style='text-align: center;'>
                                                                     <?php echo ($i + 1); ?>
                                                                 </td>

                                                                 <!-- column ชื่อ-สกุล -->
                                                                 <td>
                                                                     <?php echo $arr_entrepreneur_approve[$i]->ent_name; ?>
                                                                 </td>


                                                                 <!-- column เบอร์โทร -->
                                                                 <td>
                                                                     <?php echo $arr_entrepreneur_approve[$i]->ent_tel; ?>
                                                                 </td>

                                                                 <!-- column Email -->
                                                                 <td>
                                                                     <?php echo $arr_entrepreneur_approve[$i]->ent_email; ?>
                                                                 </td>


                                                                 <!-- column ดำเนินการ -->
                                                                 <td style='text-align: center;'>
                                                                     <button class="btn btn-danger" id="accept" style="font-size:10px;" onclick="confirm_block(  <?php echo $arr_entrepreneur_approve[$i]->ent_id; ?>)">
                                                                         <i class="material-icons"><span class="material-icons-outlined">
                                                                                 highlight_off
                                                                             </span></i>
                                                                     </button>

                                                                 </td>



                                                             </tr>

                                                         <?php } ?>
                                                     <?php } ?>

                                                 </tbody>
                                             </table>
                                         </div>

                                         <p><?php echo $link_approve; ?></p>

                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>


         <!-- warnning block Modal  -->
         <div class="modal" tabindex="-1" role="dialog" id="blockmodal">
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


         <script>
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
                 $('#blockmodal').modal();

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