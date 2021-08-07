 <!-- main content -->

 <div class="card card-nav-tabs">
     <div class="card-header" style="background-color: #60839f">
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
     <div class="card-body ">
         <div class="tab-content">
             <div class="tab-pane active" id="consider">
                 <div class="row">
                     <div class="col-md-12">
                         <div class="card">
                             <div class="card-header" style="background-color: #8fbacb; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2)">
                                 <center>
                                     <h4 class="card-title text-white">ตารางแสดงข้อมูลผู้ประกอบการที่ยังไม่ได้รับอนุมัติ</h4>
                                 </center>
                             </div>
                             <div class="card-body">

                                 <div class="row">
                                     <div class="col-sm-3">
                                         <form class="navbar-form" action="<?php echo base_url() . 'Admin/Manage_entrepreneur/Admin_approval_entrepreneur/show_data_consider'; ?>" method="POST">
                                             <div class="input-group no-border has-success">
                                                 <input type="text" value="" name="value_search" class="form-control" placeholder="ค้นหาชื่อได้ที่นี่...">
                                                 <button type="submit" name="search" class="btn btn-white btn-round btn-just-icon" value="">
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
                                                 <th style="text-align: center;font-size: 16px;">เบอร์โทร</th>
                                                 <th style="text-align: center;font-size: 16px;">อีเมล</th>
                                                 <th style="text-align: center;font-size: 16px;">ดำเนินการ</th>
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
                                                         <?php echo $arr_entrepreneur[$i]->ent_firstname." ".$arr_entrepreneur[$i]->ent_lastname; ?>
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


                                                             <button class="btn btn-success" id="accept" style="font-size:10px;" onclick="confirm_approve(  <?php echo $arr_entrepreneur[$i]->ent_id; ?>)">
                                                                 <i class="material-icons">done</i>
                                                             </button>


                                                             <button class="btn btn-danger" id="reject" style="font-size:10px;" onclick='confirm_reject("<?php echo $arr_entrepreneur[$i]->ent_id; ?>" , "<?php echo $arr_entrepreneur[$i]->ent_email;  ?>")'>
                                                                 <i class="material-icons">
                                                                     clear
                                                                   </i>
                                                             </button>


                                                             <button class="btn " style="font-size:10px;" onclick='view_data( <?php echo $arr_entrepreneur[$i]->ent_id; ?>)'>
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
                 <p>คุณต้องการอนุมัติผู้ประกอบการคนนี้ใช่หรือไม่ ?</p>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-success" id="approves" data-dismiss="modal">ยืนยัน</button>
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
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
                 <form method="POST" action="<?php echo base_url() . 'Admin/Manage_entrepreneur/Admin_approval_entrepreneur/reject_entrepreneur'; ?>">
                     <input type="hidden" id="email" name="email">
                     <input type="hidden" id="ent_id" name="ent_id">
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
      * @input 
      * @output modal to confirm approve modal
      * @author Weradet Nopsombun
      * @Create Date 2564-07-17
      * @Update -
      */

     function confirm_approve(ent_id) {
         $('#Aprovemodal').modal();

         $('#approves').click(function() {
             approve_entrepreneur(ent_id) //function 

         });

     }


     function view_data(ent_id) {
         $.ajax({
             type: "POST",
             dataType : 'JSON',
             data: {
                 ent_id: ent_id
             },
             url: '<?php echo base_url('Admin/Manage_entrepreneur/Admin_approval_entrepreneur/get_entrepreneur_by_id_ajax'); ?>',
             success: function(data_detail) {
                 $('#datamodal').modal();
                         $('#ent_name').val(data_detail['arr_data'][0]['ent_firstname']+" "+data_detail['arr_data'][0]['ent_lastname']);
                         $('#ent_tel').val(data_detail['arr_data'][0]['ent_tel']);
                         $('#ent_id_card').val(data_detail['arr_data'][0]['ent_id_card']);
                         $('#ent_email').val(data_detail['arr_data'][0]['ent_email']);      
                         $('#ent_birthdate').val(data_detail['arr_data'][0]['ent_birthdate']);


                console.log(data_detail['arr_file']);
                let html_code = '';
                let i = 1;

                data_detail['arr_file'].forEach((row_file, index_file) => {
                    let fileName = row_file['doc_path'];
                    html_code += '<button type="button" id="download' + i + '" class="btn btn-primary"'
                    html_code += 'onclick="doc_download(\'' + row_file['doc_path'] + '\')"' + 'value ="';
                    html_code += row_file['doc_path'] + '">download ' + i + '</button>';
                    i += 1;
                });
                
                // $(document).on("click", ".btn", function() {
                //     doc_download($(this).attr("value"));
                // });
                $('#file_dowload').html(html_code);
             },
             error: function() {
                 alert('ajax error working');
             }
         });
     }



     /*
      * confirm_approve
      * open modal id = Aprovemodal 
      * @input 
      * @output modal to reject  modal 
      * @author Weradet Nopsombun
      * @Create Date 2564-07-17
      * @Update -
      */

     function confirm_reject(ent_id, ent_email) {
         $('#Rejectent').modal();

         $('#email').val(ent_email);
         $('#ent_id').val(ent_id);

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
      * @input 
      * @output table approve and consider
      * @author Weradet Nopsombun
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

    /*
      * doc_download
      * link 
      * @input 
      * @output table approve and consider
      * @author Weradet Nopsombun
      * @Create Date 2564-07-17
      * @Update -
      */
    function doc_download(name_path) {
        var link = document.createElement("a");
        link.setAttribute('download', name_path);
        link.href = "<?php echo base_url()?>" + "./document_file_entrepreneur/" + name_path;
        document.body.appendChild(link);
        link.click();
        link.remove();
    }
 </script>