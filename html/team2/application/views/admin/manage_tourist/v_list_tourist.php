 <!-- 
/*
* v_list_tourist_block
* Display list tourist table
* @input -
* @output tourist list
* @author Nantasiri Saiwaew 62160093
* @Create Date 2561-08-01
*/ 
-->
 <!-- main content -->

 <div class="content">
     <div class="container-fluid" >
         <div class="card card-nav-tabs" style="border-radius: 25px;">
             <div class="card-header" style="background-color: #5F9EA0;  border-radius: 10px;">
                 <div class="nav-tabs-navigation">
                     <div class="nav-tabs-wrapper">
                         <ul class="nav nav-tabs" data-tabs="tabs">
                             <li class="nav-item">
                                 <a class="nav-link active" href=" <?php echo base_url().'Admin/Manage_tourist/Admin_list_tourist/show_data_tourist' ?> ">บัญชีนักท่องเที่ยว</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href="<?php echo base_url().'Admin/Manage_tourist/Admin_block_tourist/show_data_block_tourist' ?> ">บัญชีนักท่องเที่ยวที่ถูกบล็อค</a>
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
                         <div class="card" style="border-radius: 25px;">
                             <div class="card-header" style="background-color: #60839f; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); border-radius: 10px;">
                                 
                               <div class="row">
                                     <div class="col py-2">
                                         <h4 class="card-title text-white ">ตารางแสดงข้อมูลบัญชีของนักท่องเที่ยว</h4>
                                     </div>
                                     <div class="col">
                                     <form class="form-inline custom-form-search" action="#">

                                             <div class="input-group ">

                                             <input type="text" value="" name="value_search" class="form-control custom-search" placeholder="  ค้นหาชื่อได้ที่นี่...">
                                                 <button type="submit" name="search" class="btn btn-white btn-round btn-just-icon" value=""  style="margin-left: 3px;">
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
                                                 <thead class="text-white" style="background-color: #d8b7a8; text-align: center;">
                                                     <tr>
                                                         <th style="text-align: center;font-size: 16px;">ลำดับ</th>
                                                         <th style="text-align: center;font-size: 16px;">ชื่อ-นามสกุล</th>
                                                         <!-- <th style="text-align: center;font-size: 16px;">เบอร์โทร</th>
                                                         <th style="text-align: center;font-size: 16px;">อีเมล</th> -->
                                                         <th style="text-align: center;font-size: 16px;">ดำเนินการ</th>
                                                     </tr>
                                                 </thead>
                                                 <tbody class="list">

                                                     <?php

                                                        if (sizeof($arr_tourist) == 0) {
                                                            echo "<td colspan = '5'>";
                                                            echo "ไม่มีข้อมูลในตารางนี้";
                                                            echo "</td>";
                                                        } else {

                                                            for ($i = 0; $i < count($arr_tourist); $i++) { ?>
                                                             <tr>
                                                                 <!-- column ลำดับ -->
                                                                 <td style='text-align: center;'>
                                                                     <?php echo ($i + 1); ?>
                                                                 </td>

                                                                 <!-- column ชื่อ-สกุล -->
                                                                 <td>
                                                                     <?php echo $arr_tourist[$i]->tus_firstname . ' ' . $arr_tourist[$i]->tus_lastname; ?>
                                                                 </td>

                                                                 <!-- column ดำเนินการ -->
                                                                 <td style='text-align: center;'>
                                                                     <button class="btn btn-danger" id="accept"style="font-size:10px; padding:12px;" onclick="confirm_block(  <?php echo $arr_tourist[$i]->tus_id; ?>)">
                                                                         <i class="material-icons"><span class="material-icons-outlined">
                                                                                 block
                                                                             </span></i>
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


         <!-- /*
              * block modal
              * open blockmodal 
              * @input 
              * @output modal to confirm block user 
              * @author Nantasiri Saiwaew 62160093
              * @Create Date 2564-08-02
              * @Update -
        */ -->
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
                         <p>คุณต้องการบล็อคนักท่องเที่ยวคนนี้ใช่หรือไม่ ?</p>
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
              * @author Nantasiri Saiwaew 62160093
              * @Create Date 2564-08-02
              * @Update -
              */

             function confirm_block(tus_id) {
                 $('#blockmodal').modal();

                 $('#blocked').click(function() {
                     console.log("check");
                     block_user(tus_id);

                 });

             }


             /*
              * block_user
              * send ajax into block_user controller
              * @input tus_id
              * @output sweet alert
              * @author Nantasiri Saiwaew 62160093
              * @Create Date 2564-08-02
              * @Update -
              */

             function block_user(tus_id) {
                 $.ajax({
                     type: "POST",
                     data: {
                         tus_id: tus_id
                     },
                     url: '<?php echo base_url('Admin/Manage_tourist/Admin_block_tourist/block_user_ajax'); ?>',
                     success: function() {
                         //sweet alert
                         swal({
                             title: "บล็อคผู้ใช้งานสำเร็จ",
                             text: "บล็อคนักท่องเที่ยวสำเร็จ",
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