<!-- main content -->

<div class="content">
     <div class="container-fluid">

         <div class="card card-nav-tabs">
             <div class="card-header" style="background-color: #60839f">
                 <div class="nav-tabs-navigation">
                     <div class="nav-tabs-wrapper">
                         <ul class="nav nav-tabs" data-tabs="tabs">
                             <li class="nav-item">
                                 <a class="nav-link " href=" <?php echo base_url().'Admin/Manage_tourist/Admin_list_tourist/show_data_tourist' ?> ">บัญชีนักท่องเที่ยว</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link active" href="<?php echo base_url().'Admin/Manage_tourist/Admin_block_tourist/show_data_block_tourist' ?> ">บัญชีนักท่องเที่ยวที่ถูกบล็อค</a>
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
                                             <h4 class="card-title text-white">ตารางแสดงข้อมูลบัญชีของนักท่องเที่ยว
                                                 </h4>
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

                                             <!-- table consider ajax  -->
                                             <table class="table" style="text-align: center;" id="entre_tale">
                                                 <thead class="text-white" style="background-color: #d8b7a8; text-align: center;">
                                                     <tr>
                                                         <th style="text-align: center;font-size: 16px;">ลำดับ</th>
                                                         <th style="text-align: center;font-size: 16px;">ชื่อ-นามสกุล</th>
                                                         <th style="text-align: center;font-size: 16px;">สถานะ</th>
                                                         <!-- <th style="text-align: center;font-size: 16px;">อีเมล</th> -->
                                                         <th style="text-align: center;font-size: 16px;">ดำเนินการ</th>
                                                     </tr>
                                                 </thead>
                                                 <tbody class="list">

                                                     <?php

                                                        if (sizeof($arr_tourist_block) == 0) {
                                                            echo "<td colspan = '5'>";
                                                            echo "ไม่มีข้อมูลในตารางนี้";
                                                            echo "</td>";
                                                        } else {

                                                            for ($i = 0; $i < count($arr_tourist_block); $i++) { ?>
                                                             <tr>
                                                                 <!-- column ลำดับ -->
                                                                 <td style='text-align: center;'>
                                                                     <?php echo ($i + 1); ?>
                                                                 </td>

                                                                 <!-- column ชื่อ-สกุล -->
                                                                 <td>
                                                                     <?php echo $arr_tourist_block[$i]->tus_firstname . ' ' . $arr_tourist_block[$i]->tus_lastname; ?>
                                                                 </td>

                                                                 <!-- column สถานะ -->
                                                                 <td style="text-align: center;font-size: 16px;color:red">
                                                                    <?php if($arr_tourist_block[$i]->tus_status == '4') ?>
                                                                    ถูกบล็อค
                                                                 </td>

                                                                 <!-- column ดำเนินการ -->
                                                                 <td style='text-align: center;'>
                                                                     <button class="btn btn-success" id="accept" style="font-size:10px;" onclick="confirm_unblock(  <?php echo $arr_tourist_block[$i]->tus_id; ?>)">
                                                                         <i class="material-icons"><span class="material-icons-outlined">
                                                                         check
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
<!-- warnning block Modal  -->
<div class="modal" tabindex="-1" role="dialog" id="unblockmodal">
             <div class="modal-dialog" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title">คุณต้องการปลดบล็อค ?</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <div class="modal-body">
                         <p>คุณต้องการปลดบล็อคนักท่องเที่ยวคนนี้ใช่หรือไม่ ?</p>
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-success" id="unblock" data-dismiss="modal">ยืนยัน</button>
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                     </div>
                 </div>
             </div>
         </div>


         <script>
             /*
              * confirm_unblock
              * open modal id = unblockmodal 
              * @input 
              * @output modal to confirm unblock user 
              * @author Nantasirir Saiwaew
              * @Create Date 2564-08-02
              * @Update -
              */

             function confirm_unblock(tus_id) {
                 $('#unblockmodal').modal();

                 $('#unblock').click(function() {
                     console.log("check");
                     unblock_user(tus_id);

                 });

             }


             /*
              * unblock_user
              * send ajax into unblock_user controller
              * @input tus_id
              * @output sweet alert
              * @author Nantasiri Saiwaew
              * @Create Date 2564-08-02
              * @Update -
              */

             function unblock_user(tus_id) {
                 $.ajax({
                     type: "POST",
                     data: {
                         tus_id: tus_id
                     },
                     url: '<?php echo base_url('Admin/Manage_tourist/Admin_list_tourist/unblock_user_ajax'); ?>',
                     success: function() {
                         //sweet alert
                         swal({
                             title: "ปลดบล็อคผู้ใช้งานสำเร็จ",
                             text: "ปลดบล็อคนักท่องเที่ยวสำเร็จ",
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