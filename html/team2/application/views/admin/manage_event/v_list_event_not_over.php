 <!-- 
/*
* v_list_event_approve
* table show list event approve
* @input -
* @output table data event approve
* @author Nantasiri 62160093
* @Create Date 2564-09-23
*/ 
-->
 <!-- main content -->
 <div class="row">
     <div class="col">
         <h3 class="text-dark custom-h4-card-table" style="padding-bottom: 15px; margin : 0 auto;">กิจกรรมที่อนุมัติแล้ว</h3>
     </div>
 </div>
 <div class="card card-nav-tabs custom-card-tab">
     <div class="card-header custom-header-tab">
         <div class="row">
             <div class="col-sm-8">
                 <div class="nav-tabs-navigation">
                     <div class="nav-tabs-wrapper">
                         <ul class="nav nav-tabs" data-tabs="tabs">
                             <li class="nav-item">
                                 <a class="nav-link" href=" <?php echo base_url() . 'Admin/Manage_event/Admin_approval_event/show_data_consider' ?> ">
                                     <h5 class="h5-card-header">รออนุมัติ</h5>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href=" <?php echo base_url() . 'Admin/Manage_event/Admin_approval_event/show_data_approve_no_score' ?> ">
                                     <h5 class="h5-card-header">รอกำหนดคะแนน</h5>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link active" href="<?php echo base_url() . 'Admin/Manage_event/Admin_approval_event/show_data_event_not_over'; ?>"><h5 class="h5-card-header">กิจกรรมที่ยังไม่สิ้นสุด</h5></a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href="<?php echo base_url() . 'Admin/Manage_event/Admin_approval_event/show_data_event_over'; ?>">
                                     <h5 class="h5-card-header">กิจกรรมที่สิ้นสุด</h5>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href="<?php echo base_url() . 'Admin/Manage_event/Admin_approval_event/show_data_reject'; ?>">
                                     <h5 class="h5-card-header">ถูกปฏิเสธ</h5>
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </div>
             </div>

             <div class="col-sm-4">
                 <form class="form-inline custom-form-search " action="<?php echo base_url() . 'Admin/Manage_event/Admin_approval_event/show_data_consider'; ?>" method="POST">
                     <div class="input-group ">
                         <input type="text" value="" id="search_box" name="value_search" class="form-control custom-search" placeholder="  ค้นหาชื่อได้ที่นี่...">
                     </div>
                 </form>
             </div>
         </div>
     </div>
     <!-- Tab1 -->
     <div class="card-body">
         <div class="table-responsive" id="data_event_approve">
         </div>
     </div>
 </div>


 <!-- warnning aprove Modal  -->
 <div class="modal" tabindex="-1" role="dialog" id="aprove_modal">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">คุณแน่ใจหรือไม่ ?</h5>
             </div>
             <div class="modal-body">
                 <p>คุณต้องการอนุมัติ <span id="ent_name_confirm"></span> ?</p>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-success" id="approves" data-dismiss="modal">ยืนยัน</button>
                 <button class="btn btn-secondary" style="color: white; background-color: #777777;" data-dismiss="modal">ยกเลิก</button>
             </div>
         </div>
     </div>
 </div>

 <!-- warnning add score  -->
 <div class="modal" tabindex="-1" role="dialog" id="add_score_eve">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">คุณต้องการเพิ่มคะแนนให้กิจกรรม <span id="eve_name_confirm"></span> ?</h5>
             </div>
             <div class="modal-body">
                 <p>กรุณาระบุคะแนน</p>
                 <form method="POST" action="<?php echo base_url() . 'Admin/Manage_event/Admin_approval_event/add_point_event'; ?>" id="add_point_form">
                     <input type="hidden" id="email" name="ent_email">
                     <input type="hidden" id="eve_id_form" name="eve_id">
                     <input type="number" id="eve_point" name="eve_point">
                     <!-- <textarea class="form-control" style="min-width: 100%" id="admin_reason" name="admin_reason" placeholder="กรุณาระบุเหตุผลในการปฏิเสธ..."></textarea> -->
                     <!-- <span id="err_message" style="display: none; color: red;">กรุณาระบุเหตุผลในการปฏิเสธไม่ต่ำกว่า 6 ตัวอักษร</span> -->
             </div>
             <div class="modal-footer">
                 <button type="submit" class="btn btn-success" id="add_score">ยืนยัน</button>
                 <button class="btn btn-secondary" style="color: white; background-color: #777777;" data-dismiss="modal">ยกเลิก</button>
                 </form>
             </div>
         </div>
     </div>
 </div>
 <script>
     $(document).ready(function() {
         load_data(1);

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

     function load_data(page, query = '') {
         console.log(query);
         $.ajax({
             url: '<?php echo base_url('Admin/Manage_event/Admin_approval_event/get_event_data_not_over_ajax/'); ?>' + 2,
             method: "POST",
             dataType: "Json",
             data: {
                 page: page,
                 query: query
             },
             success: function(data) {
                 // console.log(data);
                 create_table(data['arr_event'], data['paganition']);

             }
         });
     }
    
     function create_table(data, pagation) 
     {
         console.log(data);
         let html_code = '';
         html_code += '<table class="table" style="text-align: center;" id="entre_tale">';
         html_code += '<thead class="text-white custom-thead">';
         html_code += '<tr class="custom-tr-header-table">';
         html_code += '<th class="th-custom res-hide">ลำดับ</th>';
         html_code += '<th class="th-custom ">ชื่อกิจกรรม</th>';
         html_code += '<th class="th-custom ">ชื่อสถานที่</th>';
         html_code += '<th class="th-custom ">ชื่อผู้ประกอบการ</th>';
         html_code += '<th class="th-custom ">ดำเนินการ</th>';
         html_code += '</tr>';
         html_code += '</thead>';
         html_code += '<tbody class="list">';

         data.forEach((row_eve, index_eve) => {

             html_code += '<tr>';
             html_code += '<td>' + (index_eve+1) + '</td>';
             html_code += '<td>' + (row_eve['eve_name']) + '</td>';
             html_code += '<td>' + (row_eve['com_name']) + '</td>';
             html_code += '<td>' + (row_eve['ent_firstname']) + (row_eve['ent_lastname']) + '</td>';
             html_code += '<td style="text-align: center;">';
             html_code += '<a class="btn btn-info" style="font-size:10px; padding:12px;" href=" <?php echo site_url() . 'Admin/Manage_event/Admin_approval_event/show_detail_event/' ?>'  + (row_eve['eve_id'])  + '">'         
             html_code +='<i class="material-icons">'
             html_code +='search'
             html_code +='</i>';
             html_code += '</a>'
             html_code += '</tr>';
             html_code += '</tbody>'
     });
             html_code += '</table><br>';
             html_code += '<div class="container-fluid" style="align: center;   position: relative;">';
             html_code += '<ul class="pagination w-50" id="pagination">';
            //  $('#pagination').html(pagation);

            if(pagation){
                html_code += pagation;
            }
            //  console.log(pagation);
             $('#data_event_approve').html(html_code);

     }
 </script>