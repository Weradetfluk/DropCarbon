<!-- 
/*
* v_list_company_reject
* Display reject company table
* @input -
* @output reject company list
* @author Nantasiri Saiwaew 62160093
* @Create Date 2561-08-10
*/ 
-->

<!-- main content -->
<div >
     <h3 class="text-dark custom-h4-card-table" style="padding-bottom: 15px; margin : 0 auto; ">กิจกรรมที่ถูกปฏิเสธ</h3>
 </div>

 <div class="card card-nav-tabs custom-card-tab">
     <div class="card-header custom-header-tab">
     <div class="row">
             <div class="col-sm-8">
                 <div class="nav-tabs-navigation">
                     <div class="nav-tabs-wrapper">
                     <ul class="nav nav-tabs" data-tabs="tabs">
                            <li class="nav-item">
                                 <a class="nav-link" href=" <?php echo base_url() . 'Admin/Manage_event/Admin_approval_event/show_data_consider' ?> "><h5 class="h5-card-header">รออนุมัติ</h5></a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href="<?php echo base_url() . 'Admin/Manage_event/Admin_approval_event/show_data_event_not_over'; ?>"><h5 class="h5-card-header">ยังไม่สิ้นสุด</h5></a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href="<?php echo base_url() . 'Admin/Manage_event/Admin_approval_event/show_data_event_over'; ?>"><h5 class="h5-card-header">สิ้นสุด</h5></a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link active" href="<?php echo base_url() . 'Admin/Manage_event/Admin_approval_event/show_data_reject'; ?>"><h5 class="h5-card-header">ถูกปฏิเสธ</h5></a>
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
     <div class="card-body ">
         <div class="table-responsive" id="data_eve_reject">
             <!-- data company reject -->
         </div>
     </div>
 </div>


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
                         <input type="text" id="evr_admin_reason" class="form-control" disabled>
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
    * load data
    * load data in Admin controller
    * @input 
    * @output table list company
    * @author Nantasiri Saiwaew 62160093
    * @Create Date 2564-09-19
    * @Update -
    */
    $(document).ready(function() {
         load_data(1);

         function load_data(page, query = '') {
             console.log(query);
             $.ajax({
                 url: '<?php echo base_url('Admin/Manage_event/Admin_approval_event/show_data_ajax/'); ?>' + 3,
                 method: "POST",
                 data: {
                     page: page,
                     query: query
                 },
                 success: function(data) {
                     $('#data_eve_reject').html(data);
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
    /*
      * view_data_detail_reject
      * open modal id = reject modal 
      * @input 
      * @output modal to view reject company detail
      * @author Nantasiri Saiwaew
      * @Create Date 2564-09-19
      * @Update -
      */
    function view_data_detail_reject(eve_id) {

        $.ajax({
            type: "POST",
            dataType: 'JSON',
            data: {
                eve_id: eve_id
            },
            url: '<?php echo base_url('Admin/Manage_event/Admin_approval_event/get_eve_reject_by_id_ajax'); ?>',
            success: function(data_detail) {
                $('#data_modal').modal();
                console.log(data_detail);
                $('#evr_admin_reason').val(data_detail[0]['evr_admin_reason']);
                $('#adm_name').val(data_detail[0]['adm_name']);
            },
            error: function() {
                alert('ajax error working');
            }
        });
    }
</script>