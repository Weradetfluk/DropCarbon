 <!-- 
/*
* v_list_tourist
* Display list tourist table
* @input -
* @output tourist list
* @author Nantasiri Saiwaew 62160093
* @Create Date 2561-08-01
* @Update Date 2561-09-16
*/ 
-->

 <!-- main content -->
 <div class="content">
 <div class="container-fluid">
 <div>
 <h3 class="text-dark custom-h4-card-table" style="padding-bottom: 15px; margin : 0 auto; ">บัญชีนักท่องเที่ยว</h3>
 </div>
 <div class="card card-nav-tabs custom-card-tab">
     <div class="card-header custom-header-tab">
         <div class="row">
             <div class="col-sm-6">
                 <div class="nav-tabs-navigation">
                     <div class="nav-tabs-wrapper">
                         <ul class="nav nav-tabs" data-tabs="tabs">
                         <li class="nav-item">
                                 <a class="nav-link active" href=" <?php echo base_url().'Admin/Manage_tourist/Admin_list_tourist/show_data_tourist' ?> "><h5 class="h5-card-header">บัญชีนักท่องเที่ยว</h5></a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href="<?php echo base_url().'Admin/Manage_tourist/Admin_list_tourist/show_data_block' ?>  "><h5 class="h5-card-header">บัญชีที่ถูกระงับ</h5></a>
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
         <div class="table-responsive" id="data_entre_consider">
             <!-- table list tourist ajax  -->
         </div>
     </div>
 </div>
 </div>
 </div>

         <!-- /*
              * block modal
              * open blockmodal 
              * @input 
              * @output modal to confirm block user 
              * @author Nantasiri Saiwaew 62160093
              * @Create Date 2564-08-02
              * @Update Date 2564-09-21
        */ -->
         <!-- warnning block Modal  -->
         <div class="modal" tabindex="-1" role="dialog" id="block_modal">
         <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">แจ้งเตือน</h5>
             </div>
             <div class="modal-body">
                 <p>คุณต้องการระงับบัญชีของ <span id="tus_block_name_confirm"></span> ?</p>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-success" id="blocked" data-dismiss="modal">ยืนยัน</button>
                 <button class="btn btn-secondary" style="color: white; background-color: #777777;" data-dismiss="modal">ยกเลิก</button>
             </div>
         </div>
     </div>
 </div>
         <script>
             /*
              * load data
              * load data in Admin controller
              * @input 
              * @output table list tourist
              * @author Nantasiri Saiwaew 62160093
              * @Create Date 2564-09-17
              * @Update -
              */
            $(document).ready(function() {

                load_data(1);

                function load_data(page, query = '') {
                    console.log(query);
                    $.ajax({
                        url: '<?php echo base_url('Admin/Manage_tourist/Admin_list_tourist/show_data_ajax_tourist/'); ?>'+1,
                        method: "POST",
                        data: {
                            page:page,
                            query: query
                    },
                        success: function(data) {
                        $('#data_entre_consider').html(data);
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

             function confirm_block(tus_id,tus_name,tus_email) {
                 $('#block_modal').modal();
                 $('#tus_block_name_confirm').text(tus_name);
                 $('#blocked').click(function() {
                     console.log("check");
                     block_user(tus_id,tus_email);
                 });

             }
      /*
      * block_user
      * send ajax into block_user controller
      * @input tus_id
      * @output sweet alert
      * @author Nantasiri Saiwaew 62160093
      * @Create Date 2564-09-21
      * @Update -
      */

     function block_user(tus_id, tus_email) {
         $.ajax({
             type: "POST",
             data: {
                 tus_id: tus_id
             },
             url: '<?php echo base_url('Admin/Manage_tourist/Admin_block_tourist/block_user_ajax'); ?>',
             success: function() {
                 //sweet alert
                 swal({
                     title: "ระงับบัญชีผู้ใช้งานสำเร็จ",
                     text: "ระงับบัญชีนักท่องเที่ยวสำเร็จ",
                     type: "success",
                     showConfirmButton: false,
                     timer: 2000
                 }, function() {
                    location.reload();
                 })
                 var content = "บัญชีของคุณถูกระงับการใช้งานเนื่องจากผู้ใช้งานได้ละเมิดกฎของเว็บไซต์ Drop Carbon System";
                 var content_h1 = "คุณถูกระงับบัญชีการใช้งาน";
                 var subject = "Admin has blocked your account.";
                 send_mail_ajax(content, tus_email, subject, content_h1);
             },
             error: function() {
                 alert('ajax block user error working');
             }
         });
     }
    </script>