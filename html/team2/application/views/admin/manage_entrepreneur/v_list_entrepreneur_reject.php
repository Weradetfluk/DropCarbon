<div class="card card-nav-tabs" style="border-radius: 25px;">
     <div class="card-header" style="background-color: #5F9EA0; border-radius: 10px;"">
         <div class="nav-tabs-navigation">
             <div class="nav-tabs-wrapper">
                 <ul class="nav nav-tabs" data-tabs="tabs">
                     <li class="nav-item">
                         <a class="nav-link " href=" <?php echo base_url() . 'Admin/Manage_entrepreneur/Admin_approval_entrepreneur/show_data_consider' ?> " style="font-size: 16px;">ยังไม่ได้รับอนุมัติ</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href=" <?php echo base_url() . 'Admin/Manage_entrepreneur/Admin_approval_entrepreneur/show_data_approve' ?> " style="font-size: 16px;">อนุมัติแล้ว</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link active" href="<?php echo base_url() . 'Admin/Manage_entrepreneur/Admin_approval_entrepreneur/show_data_reject'; ?>" style="font-size: 16px;">ผู้ใช้ที่ถูกปฏิเสธ</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="<?php echo base_url() . 'Admin/Manage_entrepreneur/Admin_approval_entrepreneur/show_data_block'; ?>" style="font-size: 16px;">ผู้ใช้ที่ถูกบล็อค</a>
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
                                         <h4 class="card-title text-white ">ตารางแสดงข้อมูลผู้ประกอบการที่ถูกปฏิเสธ</h4>
                                     </div>
                                     <div class="col">
                                         <form class="form-inline" action="<?php echo base_url() . 'Admin/Manage_entrepreneur/Admin_approval_entrepreneur/show_data_reject'; ?>" method="POST" style="width: 250px; float:right;">

                                             <div class="input-group ">

                                                 <input type="text" value="" name="value_search" class="form-control" placeholder="  ค้นหาชื่อได้ที่นี่..." style="background-color:white; border-radius: 10px; width: 200px;">
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

                                     <!-- table approve ajax  -->
                                     <table class="table" style="text-align: center;" id="entre_tale_approve">
                                         <thead class="text-white" style="background-color: #e4a487; text-align: center;">
                                             <tr>
                                                 <th style="font-weight:700;">ลำดับ</th>
                                                 <th style="font-weight:700;"">ชื่อ-นามสกุล</th>
                                                 <th style="font-weight:700;">เบอร์โทร</th>
                                                 <th style="font-weight:700;">อีเมล</th>
                                                 <th style="font-weight:700;">ดำเนินการ</th>
                                             </tr>
                                         </thead>
                                         <tbody class="list">
                                             <?php
                                                if (sizeof($arr_entrepreneur_reject) == 0) {
                                                    echo "<td colspan = '5'>";
                                                    echo "ไม่มีข้อมูลในตารางนี้";
                                                    echo "</td>";
                                                } else {

                                                    for ($i = 0; $i < count($arr_entrepreneur_reject); $i++) { ?>
                                                     <tr>
                                                         <!-- column ลำดับ -->
                                                         <td style='text-align: center;'>
                                                             <?php echo ($i + 1); ?>
                                                         </td>

                                                         <!-- column ชื่อ-สกุล -->
                                                         <td>
                                                             <?php echo $arr_entrepreneur_reject[$i]->ent_firstname . " " . $arr_entrepreneur_reject[$i]->ent_lastname; ?>
                                                         </td>


                                                         <!-- column เบอร์โทร -->
                                                         <td>
                                                             <?php echo $arr_entrepreneur_reject[$i]->ent_tel; ?>
                                                         </td>

                                                         <!-- column Email -->
                                                         <td>
                                                             <?php echo $arr_entrepreneur_reject[$i]->ent_email; ?>
                                                         </td>


                                                         <!-- column ดำเนินการ -->
                                                         <td style='text-align: center;'>
                                                             <button class="btn btn-info" id="accept"style="font-size:10px; padding:12px;" onclick="view_data_detail_reject(  <?php echo $arr_entrepreneur_reject[$i]->ent_id; ?>)">
                                                                 <i class="material-icons"><span class="material-icons-outlined">
                                                                         search
                                                                     </span></i>
                                                             </button>

                                                         </td>

                                                     </tr>

                                                 <?php } ?>
                                             <?php } ?>

                                         </tbody>
                                     </table>
                                 </div>

                                 <p><?php echo $link_block; ?></p>

                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>


 <div class="modal fade" role="dialog"  id="datamodal">
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
                       
                             <div class="form-group">
                                 <label>เหตุผลที่ปฏิเสธ</label>
                                 <input type="text" id="enr_admin_reason" class="form-control" disabled>
                             </div>
                                
                        
                             <div class="form-group">
                                     <label>ผู้ปฏิเสธ</label>
                                     <input type="text" class="form-control" id="adm_name" disabled>
                                 </div>  

                            
                            

                             </div>
                            

                         </form>


                     </div>
                 </div>
             </div>



 <script>
      /*
      * view_data_detail_reject
      * open modal id = Aprovemodal 
      * @input 
      * @output modal to confirm approve modal
      * @author Weradet Nopsombun
      * @Create Date 2564-07-27
      * @Update -
      */
     function view_data_detail_reject(ent_id) {

         $.ajax({
             type: "POST",
             dataType: 'JSON',
             data: {
                 ent_id: ent_id
             },
             url: '<?php echo base_url('Admin/Manage_entrepreneur/Admin_approval_entrepreneur/get_entrepreneur_reject_by_id_ajax'); ?>',
             success: function(data_detail) {
                 $('#datamodal').modal();
                 console.log(data_detail);
                 $('#enr_admin_reason').val(data_detail[0]['enr_admin_reason']);
                 $('#adm_name').val(data_detail[0]['adm_name']);
             },
             error: function() {
                 alert('ajax error working');
             }
         });
     }
 </script>