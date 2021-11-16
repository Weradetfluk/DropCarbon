<!-- 
/*
* v_list_tourist_block
* Display list block tourist table
* @input -
* @output tourist block list
* @author Nantasiri Saiwaew 62160093
* @Create Date 2561-08-01
*/ 
-->

<!-- main content -->
<div class="content">
 <div class="container-fluid">
 <div>
 <h3 class="text-dark custom-h4-card-table" style="padding-bottom: 15px; margin : 0 auto; ">บัญชีที่ถูกระงับ</h3>
 </div>
 <div class="card card-nav-tabs custom-card-tab">
     <div class="card-header custom-header-tab">
         <div class="row">
             <div class="col-sm-6">
                 <div class="nav-tabs-navigation">
                     <div class="nav-tabs-wrapper">
                         <ul class="nav nav-tabs" data-tabs="tabs">
                             <li class="nav-item">
                                 <a class="nav-link" href=" <?php echo base_url().'Admin/Manage_tourist/Admin_list_tourist/show_data_tourist' ?> "><h5 class="h5-card-header">บัญชีนักท่องเที่ยว</h5></a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link active" href="<?php echo base_url().'Admin/Manage_tourist/Admin_list_tourist/show_data_block' ?>  "><h5 class="h5-card-header">บัญชีที่ถูกระงับ</h5></a>
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
                 <form class="form-inline custom-form-search " action="<?php echo base_url() . 'Admin/Manage_tourist/Admin_list_tourist/show_data_tourist'; ?>" method="POST">
                     <div class="input-group ">
                         <input type="text" value="" id="search_box" name="value_search" class="form-control custom-search" placeholder="  ค้นหาชื่อได้ที่นี่...">
                     </div>
                 </form>
             </div>
         </div>
     </div>


     <!-- Tab1 -->
     <div class="card-body">
         <div class="table-responsive" id="data_entre_block">
         </div>
     </div>
 </div>
 </div>
 </div>

         <!-- /*
              * unblock modal
              * open unblockmodal 
              * @input 
              * @output modal to confirm unblock user 
              * @author Nantasiri Saiwaew 62160093
              * @Create Date 2564-08-02
              * @Update -
        */ -->
        <!-- warnning unblock Modal  -->
        <div class="modal" tabindex="-1" role="dialog" id="unblockmodal">
             <div class="modal-dialog" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title">คุณต้องการปลดบล็อค ?</h5>
                         <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button> -->
                     </div>
                     <div class="modal-body">
                         <p>คุณต้องการปลดบล็อคนักท่องเที่ยวคนนี้ใช่หรือไม่ ?</p>
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-success" id="unblock" data-dismiss="modal">ยืนยัน</button>
                         <button type="button" class="btn btn-secondary" style="color: white; background-color: #777777;" data-dismiss="modal">ยกเลิก</button>
                     </div>
                 </div>
             </div>
         </div>


         <script>

             $(document).ready(function() {

                load_data(1);

                function load_data(page, query = '') {
                    console.log(query);
                    $.ajax({
                        url: '<?php echo base_url('Admin/Manage_tourist/Admin_list_tourist/show_data_ajax_tourist/'); ?>'+4,
                        method: "POST",
                        data: {
                            page:page,
                            query: query
                    },
                        success: function(data) {
                        $('#data_entre_block').html(data);
                    }
                });
            }

            $('#search_box').keyup(function() {
                var query = $('#search_box').val();
                load_data(1,query);
                // console.log(query);

            });

            $(document).on('click', '.page-link', function() {
                 var page = $(this).data('page_number');
             var query = $('#search_box').val();
                 load_data(page, query);
            });

        });             
             /*
              * confirm_block
              * open modal id = blockmodal 
              * @input 
              * @output modal to confirm block user 
              * @author Nantasiri Saiwaew 62160093
              * @Create Date 2564-08-02
              * @Update -
              */

             function confirm_block(tus_id) {
                 $('#blockmodal').modal();

                 $('#blocked').click(function() {
                     console.log("check");
                     block_user(tus_id);

                 });

             }

             /*
              * confirm_unblock
              * open modal id = unblockmodal 
              * @input 
              * @output modal to confirm unblock user 
              * @author Nantasirir Saiwaew 62160093
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
              * @author Nantasiri Saiwaew 62160093
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
                             title: "ปลดการระงับบัญชีผู้ใช้งานสำเร็จ",
                             text: "ปลดการระงับบัญชีนักท่องเที่ยวสำเร็จ",
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