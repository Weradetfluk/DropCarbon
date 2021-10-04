 <!-- 
/*
* v_list_event_consider
* table show list event consider
* @input -
* @output table data entrepreneur consider
* @author Nantasiri 62160093
* @Create Date 2564-09-23
*/ 
-->
 <!-- main content -->
 <div class="row">
     <div class="col">
         <h3 class=" text-dark custom-h4-card-table" style="padding-bottom: 15px; margin : 0 auto;">โปรโมชันที่ถูกปฏิเสธ</h3>
     </div>
 </div>
 <div class="card card-nav-tabs custom-card-tab">
     <div class="card-header custom-header-tab">
         <div class="row">
             <div class="col-sm-6">
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
                                 <a class="nav-link" href="<?php echo base_url() . 'Admin/Manage_promotions/Admin_approval_promotions/show_data_pro_over'; ?>">
                                     <h5 class="h5-card-header">โปรโมชันที่สิ้นสุด</h5>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link active" href="<?php echo base_url() . 'Admin/Manage_promotions/Admin_approval_promotions/show_data_reject'; ?>">
                                     <h5 class="h5-card-header">ถูกปฏิเสธ</h5>
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </div>
             </div>

             <!-- <div class="col">
                 <h4 class="text-white custom-h4-card-table text-center">ข้อมูลผู้ประกอบการที่ยังไม่ได้รับอนุมัติ</h4>
                 </div>
                 -->
             <div class="col">
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
         <div class="table-responsive" id="data_promo_reject">
         </div>
     </div>
 </div>


 <!-- warnning data Modal  -->
 <div class="modal fade" role="dialog" id="data_modal">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">รายละเอียด</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true" style="font-size: 35px;">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form>
                     <div class="form-group">
                         <label>เหตุผลที่ปฏิเสธ</label>
                         <input type="text" id="prr_admin_reason" class="form-control" disabled>
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
                 url: '<?php echo base_url('Admin/Manage_promotions/Admin_approval_promotions/show_data_ajax/'); ?>' + 3,
                 method: "POST",
                 data: {
                     page: page,
                     query: query
                 },
                 success: function(data) {
                     $('#data_promo_reject').html(data);
                 }
             });
         }
 /*
      * view_data_detail_reject
      * open modal id = reject modal 
      * @input 
      * @output modal to view reject company detail
      * @author Nantasiri Saiwaew
      * @Create Date 2564-10-03
      * @Update -
      */
    function view_data_detail_reject(pro_id) {

    $.ajax({
        type: "POST",
        dataType: 'JSON',
        data: {
            pro_id: pro_id
        },
        url: '<?php echo base_url('Admin/Manage_promotions/Admin_approval_promotions/get_pro_reject_by_id_ajax'); ?>',
        success: function(data_detail) {
            $('#data_modal').modal();
            console.log(data_detail);
            $('#prr_admin_reason').val(data_detail[0]['prr_admin_reason']);
            $('#adm_name').val(data_detail[0]['adm_name']);
        },
        error: function() {
            alert('ajax error working');
        }
    });
    }
 </script>