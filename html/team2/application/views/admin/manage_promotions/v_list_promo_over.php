 <!-- 
/*
* v_list_promo_over
* table show list promotions approve and over
* @input -
* @output table data promotions approve and over
* @author Nantasiri 62160093
* @Create Date 2564-09-23
*/ 
-->
 <!-- main content -->
 <div class="row">
     <div class="col">
         <h3 class="text-dark custom-h4-card-table" style="padding-bottom: 15px; margin : 0 auto;">โปรโมชันที่อนุมัติแล้ว</h3>
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
                                 <a class="nav-link" href=" <?php echo base_url() . 'Admin/Manage_promotions/Admin_approval_promotions/show_data_consider' ?> ">
                                     <h5 class="h5-card-header">รออนุมัติ</h5>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href="<?php echo base_url() . 'Admin/Manage_promotions/Admin_approval_promotions/show_data_pro_not_over'; ?>">
                                    <h5 class="h5-card-header">โปรโมชันที่ยังไม่สิ้นสุด</h5></a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link active" href="<?php echo base_url() . 'Admin/Manage_promotions/Admin_approval_promotions/show_data_pro_over'; ?>">
                                     <h5 class="h5-card-header">โปรโมชันที่สิ้นสุด</h5>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href="<?php echo base_url() . 'Admin/Manage_promotions/Admin_approval_promotions/show_data_reject'; ?>">
                                     <h5 class="h5-card-header">ถูกปฏิเสธ</h5>
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </div>
             </div>

             <div class="col-sm-4">
                 <form class="form-inline custom-form-search " action="<?php echo base_url() . 'Admin/Manage_promotions/Admin_approval_promotions/show_data_consider'; ?>" method="POST">
                     <div class="input-group ">
                         <input type="text" value="" id="search_box" name="value_search" class="form-control custom-search" placeholder="  ค้นหาชื่อได้ที่นี่...">
                     </div>
                 </form>
             </div>
         </div>
     </div>
     <!-- Tab1 -->
     <div class="card-body">
         <div class="table-responsive" id="data_pro_approve">
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
             url: '<?php echo base_url('Admin/Manage_promotions/Admin_approval_promotions/get_pro_data_over_ajax/'); ?>' + 2,
             method: "POST",
             dataType: "Json",
             data: {
                 page: page,
                 query: query
             },
             success: function(data) {
                 // console.log(data);
                 create_table(data['arr_promo'], data['paganition']);

             }
         });
     }
    
     function create_table(data, pagation) 
     {
         console.log(data);
         let html_code = '';
         html_code += '<table class="table" style="text-align: left;" id="entre_tale">';
         html_code += '<thead class="text-white custom-thead">';
         html_code += '<tr class="custom-tr-header-table">';
         html_code += '<th class="th-custom res-hide">ลำดับ</th>';
         html_code += '<th class="th-custom ">ชื่อกิจกรรม</th>';
         html_code += '<th class="th-custom ">เวลาดำเนินการ</th>';
         html_code += '<th class="th-custom ">ชื่อผู้ประกอบการ</th>';
         html_code += '<th class="th-custom ">ดำเนินการ</th>';
         html_code += '</tr>';
         html_code += '</thead>';
         html_code += '<tbody class="list">';

         data.forEach((row_promo, index_promo) => {

             html_code += '<tr>';
             html_code += '<td>' + (index_promo+1) + '</td>';
             html_code += '<td style="text-align: left;">' + (row_promo['pro_name']) + '</td>';
             html_code += '<td style="text-align: left;">' + format_date_to_abbreviation(row_promo['pro_start_date']) + ' - '+format_date_to_abbreviation(row_promo['pro_end_date']) + '</td>';
             html_code += '<td style="text-align: left;">' + (row_promo['ent_firstname']) + (' ') + (row_promo['ent_lastname']) + '</td>';
             html_code += '<td style="text-align: center;">';
             html_code += '<a class="btn btn-info custom-a" style="font-size:10px; padding:12px;" href=" <?php echo site_url() . 'Admin/Manage_promotions/Admin_approval_promotions/show_detail_pro/' ?>'  + (row_promo['pro_id'])  + '" title = "ดูรายละเอียดโปรโมชัน">'         
             html_code +='<i class="material-icons">'
             html_code +='search'
             html_code +='</i>';
             html_code += '</a>'
             html_code += '</tr>';
             html_code += '</tbody>'
     });
             html_code += '</table><br>';
             html_code += '<div class="container-fluid" style="align: left;   position: relative;">';
             html_code += '<ul class="pagination w-50" id="pagination">';
            //  $('#pagination').html(pagation);

            if(pagation){
                html_code += pagation;
            } 
            //  console.log(pagation);
             $('#data_pro_approve').html(html_code);

     }
 </script>