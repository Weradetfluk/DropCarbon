 <!-- main content -->

 <div class="content">
     <div class="container-fluid">

         <!-- warnning  -->
         <!-- read me -->
         <!-- do not indent code auto in tab-->

         <div class="card card-nav-tabs">
             <div class="card-header" style="background-color: #60839f">
                 <div class="nav-tabs-navigation">
                     <div class="nav-tabs-wrapper">
                         <ul class="nav nav-tabs" data-tabs="tabs">
                             <li class="nav-item">
                                 <a class="nav-link active" href="#consider" data-toggle="tab">ยังไม่ได้รับอนุมัติ</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href="#approve" data-toggle="tab">อนุมัติแล้ว</a>
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
                                                        for ($i = 0; $i < count($arr_entrepreneur); $i++) { ?>
                                                         <tr>
                                                             <!-- column ลำดับ -->
                                                             <td style='text-align: center;'>
                                                                 <?php echo ($i + 1); ?>
                                                             </td>

                                                             <!-- column ชื่อ-สกุล -->
                                                             <td>
                                                                 <?php echo $arr_entrepreneur[$i]->ent_name; ?>
                                                             </td>


                                                             <td>
                                                                 <?php echo $arr_entrepreneur[$i]->ent_tel; ?>
                                                             </td>


                                                             <td>
                                                                 <?php echo $arr_entrepreneur[$i]->ent_email; ?>
                                                             </td>


                                                             <!-- column ดำเนินการ -->
                                                             <td style='text-align: center;'>

                                                                 <!-- ปุ่มแก้ไข -->

                                                                 <button class="btn btn-success" id="accept" style="font-size:10px;" onclick="confirm_approve(  <?php echo $arr_entrepreneur[$i]->ent_id; ?>)">
                                                                     <i class="material-icons">done</i>
                                                                 </button>


                                                                 <button class="btn btn-danger" id="reject" style="font-size:10px;" onclick='confirm_reject("<?php echo $arr_entrepreneur[$i]->ent_id; ?>" , "<?php echo $arr_entrepreneur[$i]->ent_email;  ?>")'>
                                                                     <i class="material-icons">
                                                                             clear
                                                                         </span></i>
                                                                 </button>


                                                                 <button class="btn " id="reject" style="font-size:10px;" onclick='confirm_reject("<?php echo $arr_entrepreneur[$i]->ent_id; ?>")'>
                                                                     <i class="material-icons">   
                                                                                 search
                                                                     </i>
                                                                 </button>


                                                             </td>
                                                         </tr>
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


                     <!-- Tab 2  -->
                     <div class="tab-pane" id="approve">
                         <div class="row">
                             <div class="col-md-12">
                                 <div class="card">
                                     <div class="card-header" style="background-color: #8fbacb; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                                         <center>
                                             <h4 class="card-title text-white">ตารางแสดงข้อมูลผู้ประกอบการที่ได้รับอนุมัติแล้ว</h4>
                                         </center>
                                     </div>
                                     <div class="card-body">
                                         <div class="table-responsive" id="data_entre_approve">

                                             <!-- table approve ajax  -->

                                         </div>
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


         
         <!-- warnning reject  -->
         <div class="modal" tabindex="-1" role="dialog" id="Rejectmodal">
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
             // jquery start

             $(document).ready(function() {



                 get_data_entrepreneur_approve();

             }); // Jqurey





             /*
              * get_data_entrepreneur_approve
              * get data entrepreneur in Admin/Admin_approval/show_data_approve_ajax
              * using by ajax
              * @input 
              * @output -
              * @author Weradet Nopsombun
              * @Create Date 2564-07-17
              * @Update -
              */

             function get_data_entrepreneur_approve() {
                 $.ajax({
                     type: "GET",
                     dataType: "JSON",
                     url: '<?php echo base_url('Admin/Manage_entrepreneur/Admin_approval_entrepreneur/show_data_approve_ajax'); ?>',
                     success: function(json_data_approve_ente) {
                         create_table_approve(json_data_approve_ente);
                     },
                     error: function() {
                         alert('ajax Not working');
                     }
                 });
             }


             /*
              * create_table_consider
              * create table consider data
              * @input 
              * @output table in data  html id = data_entre_consider
              * @author Weradet Nopsombun
              * @Create Date 2564-07-17
              * @Update -
              */

             function create_table_consider(arr_en, sno) {

                 sno = Number(sno);
                 $('#data_entre_consider').empty();
                 let html_code = '';
                 html_code += '<table class="table" style="text-align: center;" id="entre_tale">';
                 html_code += '<thead class="text-white" style="background-color: #d8b7a8; text-align: center;">';
                 html_code += '<tr>';
                 html_code += '<th   style="text-align: center;font-size: 16px;" >ลำดับ</th>';
                 html_code += '<th   style="text-align: center;font-size: 16px;" >ชื่อ-นามสกุล</th>';
                 html_code += '<th   style="text-align: center;font-size: 16px;" >เบอร์โทร</th>';
                 html_code += '<th   style="text-align: center;font-size: 16px;"  >อีเมล</th>';
                 html_code += '<th   style="text-align: center;font-size: 16px;"  >ดำเนินการ</th>';
                 html_code += '</tr>';
                 html_code += ' </thead>';
                 html_code += ' <tbody class="list">';



                 //check array of lentgh
                 if (arr_en.length == 0) {
                     html_code += '<tr style="text-align: center;">';
                     html_code += '<td colspan = "5">ไม่พบข้อมูลในตาราง</td>';
                     html_code += '</tr">';
                 } else {
                     //loop fetch data

                     arr_en.forEach((row_tsm, index_tsm) => {
                         let i = index_tsm + 1;
                         html_code += '<tr style="text-align: center;">';
                         html_code += '<td >' + i + '</td>';
                         html_code += '<td >' + row_tsm['ent_name'] + '</td>';
                         html_code += '<td >' + row_tsm['ent_tel'] + '</td>';
                         html_code += '<td >' + row_tsm['ent_email'] + '</td>';
                         html_code += '<td >' + '<button class="btn btn-success" id = "accept" onclick = "confirm_approve(' + row_tsm['ent_id'] + ' )">อนุมัติ</button>';
                         html_code += '<button class="btn btn-danger" id = "reject"  onclick = "confirm_reject(\'' + row_tsm['ent_id'] + '\',\'' + row_tsm['ent_email'] + '\' )" >ปฏิเสธ</button>' + '</td>';
                         html_code += '</tr>';

                     });
                 }
                 html_code += '</tbody>';
                 html_code += ' </table>';

                 $('#data_entre_consider').html(html_code);
             }




             /*
              * create_table_approve
              * 
              * using by ajax
              * @input 
              * @output table in data  html id = entre_tale_approve
              * @author Weradet Nopsombun
              * @Create Date 2564-07-17
              * @Update -
              */

             function create_table_approve(arr_en) {
                 let html_code = '';
                 html_code += '<table class="table" style="text-align: center;"  id="entre_tale_approve">';
                 html_code += '<thead class="text-white" style="background-color: #d8b7a8; text-align: center;">';
                 html_code += '<tr>';
                 html_code += '<th   style="text-align: center;font-size: 16px;" >ลำดับ</th>';
                 html_code += '<th   style="text-align: center;font-size: 16px;" >ชื่อ-นามสกุล</th>';
                 html_code += '<th   style="text-align: center;font-size: 16px;" >เบอร์โทร</th>';
                 html_code += '<th   style="text-align: center;font-size: 16px;"  >อีเมล</th>';
                 html_code += '<th   style="text-align: center;font-size: 16px;"  >ดำเนินการ</th>';
                 html_code += '</tr>';
                 html_code += ' </thead>';
                 html_code += ' <tbody class="list">';

                 if (arr_en.length == 0) {
                     html_code += '<tr style="text-align: center;">';
                     html_code += '<td colspan = "5">ไม่พบข้อมูลในตาราง</td>';
                     html_code += '</tr">';
                 } else {
                     arr_en.forEach((row_tsm, index_tsm) => {
                         //loop fetch data
                         let i = index_tsm + 1;
                         html_code += '<tr style="text-align: center;">';
                         html_code += '<td >' + i + '</td>';
                         html_code += '<td >' + row_tsm['ent_name'] + '</td>';
                         html_code += '<td >' + row_tsm['ent_tel'] + '</td>';
                         html_code += '<td >' + row_tsm['ent_email'] + '</td>';
                         html_code += '<td >' + '<button class="btn btn-danger" onclick = "confirm_block(' + row_tsm['ent_id'] + ' )">บล็อค</button>' + '</td>';
                         html_code += '</tr>';

                     });
                 }
                 html_code += '</tbody>';
                 html_code += ' </table>';

                 $('#data_entre_approve').html(html_code);


             }




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
                         })

                         get_data_entrepreneur_consider(); // get data in table
                         get_data_entrepreneur_approve();

                     },
                     error: function() {
                         alert('ajax block user error working');
                     }
                 });

             }




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
                 $('#Rejectmodal').modal();

                 $('#email').val(ent_email);
                 $('#ent_id').val(ent_id);

                 $('#rejected').click(function() {
                     $('#Rejectmodal').modal('toggle');
                     swal({
                         title: "ปฏิเสธสำเร็จ",
                         text: "ปฏิเสธผู้ประกอบการสำเร็จ",
                         type: "success",
                     })


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
                         })

                         get_data_entrepreneur_consider(); // get data in table
                         get_data_entrepreneur_approve();

                     },
                     error: function() {
                         alert('ajax error working');
                     }
                 });
             }
         </script>