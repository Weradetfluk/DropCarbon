 <!-- 
/*
* v_list_entrepreneur_reject
* table show list entrepreneur rejected
* @input -
* @output table data entrepreneur rejected
* @author weradet nopsombun 62160110
* @Create Date 2564-07-17
*/ 
-->
 <!-- main content -->
 <div class="row">
     <div class="col">
         <h3 class="text-dark custom-h4-card-table" style="padding-bottom: 15px; margin : 0 auto;">
             ผู้ประกอบการที่ถูกปฏิเสธ</h3>
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
                                 <a class="nav-link"
                                     href=" <?php echo base_url() . 'Admin/Manage_entrepreneur/Admin_approval_entrepreneur/show_data_consider' ?> ">
                                     <h5 class="h5-card-header">รออนุมัติ</h5>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link"
                                     href=" <?php echo base_url() . 'Admin/Manage_entrepreneur/Admin_approval_entrepreneur/show_data_approve' ?> ">
                                     <h5 class="h5-card-header">อนุมัติแล้ว</h5>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link active"
                                     href="<?php echo base_url() . 'Admin/Manage_entrepreneur/Admin_approval_entrepreneur/show_data_reject'; ?>">
                                     <h5 class="h5-card-header">ถูกปฏิเสธ</h5>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link"
                                     href="<?php echo base_url() . 'Admin/Manage_entrepreneur/Admin_approval_entrepreneur/show_data_block'; ?>">
                                     <h5 class="h5-card-header">ถูกระงับ</h5>
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </div>
             </div>
             <div class="col">
                 <form class="form-inline custom-form-search"
                     action="<?php echo base_url() . 'Admin/Manage_entrepreneur/Admin_approval_entrepreneur/show_data_consider'; ?>"
                     method="POST">

                     <div class="input-group ">
                         <input type="text" value="" id="search_box" name="value_search"
                             class="form-control custom-search" placeholder="  ค้นหาชื่อได้ที่นี่...">
                     </div>
                 </form>
             </div>
         </div>
     </div>
     <!-- Tab1 -->
     <div class="card-body ">

         <div class="card-body">
             <div class="table-responsive" id="data_ent">
                 <!-- data entrepreneur reject -->
             </div>
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
$(document).ready(function() {
    load_data(3, 1);
    $('#search_box').keyup(function() {
        var query = $('#search_box').val();
        load_data(3,1, query);
        // console.log(query);
    });
    $(document).on('click', '.page-link', function() {
        var page = $(this).data('page_number');
        var query = $('#search_box').val();
        load_data(3, page, query);
    });
});
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
            $('#data_modal').modal();
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