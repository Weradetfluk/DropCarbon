<!-- 
/*
* v_list_company_approve
* Display approved company table
* @input -
* @output approved company list
* @author Kasama Donwong 62160074
* @Create Date 2564-08-08
*/ 
-->


 <!-- main content -->
 <div>
     <h3 class="text-dark custom-h4-card-table" style="padding-bottom: 15px; margin : 0 auto; ">สถานที่ที่อนุมัติแล้ว</h3>
 </div>

 <div class="card card-nav-tabs custom-card-tab">
     <div class="card-header custom-header-tab">
         <div class="row">
             <div class="col-sm-6">
                 <div class="nav-tabs-navigation">
                     <div class="nav-tabs-wrapper">
                         <ul class="nav nav-tabs" data-tabs="tabs">
                             <li class="nav-item">
                                 <a class="nav-link" href=" <?php echo base_url() . 'Admin/Manage_company/Admin_approval_company/show_data_consider' ?> "><h5 class="h5-card-header">รออนุมัติ</h5></a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link active" href="<?php echo base_url() . 'Admin/Manage_company/Admin_approval_company/show_data_approve' ?> "><h5 class="h5-card-header">อนุมัติแล้ว</h5></a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href="<?php echo base_url() . 'Admin/Manage_company/Admin_approval_company/show_data_reject' ?>"><h5 class="h5-card-header">ถูกปฏิเสธ</h5></a>
                             </li>
                         </ul>
                     </div>
                 </div>
             </div>
             <div class="col">
                 <form class="form-inline custom-form-search " action="<?php echo base_url() . 'Admin/Manage_company/Admin_approval_company/show_data_approve'; ?>" method="POST">
                     <div class="input-group ">
                         <input type="text" value="" id="search_box" name="value_search" class="form-control custom-search" placeholder="  ค้นหาชื่อได้ที่นี่...">
                     </div>
                 </form>
             </div>
         </div>
     </div>
     <!-- Tab1 -->
     <div class="card-body ">
         <div class="table-responsive" id="data_com_approve">
         </div>
     </div>
 </div>

<script>
    $(document).ready(function() {
         load_data(1);

         function load_data(page, query = '') {
             console.log(query);
             $.ajax({
                 url: '<?php echo base_url('Admin/Manage_company/Admin_approval_company/show_data_ajax/'); ?>' + 2,
                 method: "POST",
                 data: {
                     page: page,
                     query: query
                 },
                 success: function(data) {
                     $('#data_com_approve').html(data);
                 }
             });
         }
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
</script>