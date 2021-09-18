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
 <div class="vr-line">
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
                                 <a class="nav-link active" href=" <?php echo base_url().'Admin/Manage_tourist/Admin_list_tourist/show_data_tourist' ?> ">บัญชีนักท่องเที่ยว</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href=" <?php echo base_url().'Admin/Manage_tourist/Admin_list_tourist/show_data_block' ?>">บัญชีที่ถูกบล็อค</a>
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
              * @Update -
        */ -->
         <!-- warnning block Modal  -->
         <div class="modal" tabindex="-1" role="dialog" id="blockmodal">
             <div class="modal-dialog" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title">คุณต้องการบล็อค <span id="tus_block_name_confirm"></span>?</h5>
                         <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button> -->
                     </div>
                     <div class="modal-body">
                         <p>คุณต้องการบล็อคนักท่องเที่ยวคนนี้ใช่หรือไม่ ?</p>
                     </div>
                    <form method="POST"  id="block_form">
                        <input type="hidden" id="email" name="email">
                        <input type="hidden" id="tus_id_form" name="tus_id">
                        <div class="modal-footer">
                         <button type="button" class="btn btn-success" id="blocked" data-dismiss="modal">ยืนยัน</button>
                         <button type="button" class="btn btn-secondary" style="color: white; background-color: #777777;" data-dismiss="modal">ยกเลิก</button>
                    </form>
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

            //  function confirm_block(tus_id) {
            //      $('#blockmodal').modal();

            //      $('#blocked').click(function() {
            //          console.log("check");
            //          block_user(tus_id);

            //      });

            //  }


        /*
        * show_loading
        * show loading page for wait send email
        * @input -
        * @output -
        * @author Nantasiri Saiwaew 62160093
        * @Create Date 2564-09-18
        * @Update -
        */
        function show_loding() {
            $(document).on("click", "button", function(){
            $.get(function(data){
            $("body").html(data);
            });       
        });
 
        // Add remove loading class on body element based on Ajax request status
            $(document).on({
            ajaxStart: function(){
                $("body").addClass("loading"); 
            },
            ajaxStop: function(){ 
                $("body").removeClass("loading"); 
                }    
            });
        }
            
       /*      
      * confirm_block
      * open modal id = block 
      * @input 
      * @output modal to reject  modal 
      * @author Nantasiri Saiwaew 62160093
      * @Create Date 2564-09-18
      * @Update -
      */
     function confirm_block(tus_id, tus_email, tus_name) {
         let form = document.querySelector('#block_form');
         $('#tus_block_name_confirm').text(tus_name);
         $('#blockmodal').modal();
         $('#email').val(tus_email);
         $('#tus_id_form').val(tus_id);
         console.log(tus_email);
         $('#blocked').click(function() {
                 $('#blockmodal').modal('toggle');
                 $.ajax({
                      type: "POST",
                      data: {
                          tus_id: tus_id,
                          email: tus_email,
                      },
                      url: ' <?php echo base_url() . 'Admin/Manage_tourist/Admin_block_tourist/block_user_ajax'; ?>',
                     success: function() {
                 swal({
                     title: "บล็อคบัญชีสำเร็จ",
                     text: "บล็อคบัญชีนักท่องเที่ยวสำเร็จ กำลังจัดส่งอีเมล...",
                     type: "success",
                     showConfirmButton: false,
                     timer: 3000,
                 }, function() {
                     location.reload();
                 });
                     }
             });
         });
     }     
    </script>
         <style>
        .overlay{
            display: none;
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 999;
            background: rgba(255,255,255,0.8) url("/examples/images/loader.gif") center no-repeat;
        }
        body{
         text-align: center;
        }
        /* Turn off scrollbar when body element has the loading class */
             body.loading{
            overflow: hidden;   
        }
        /* Make spinner image visible when body element has the loading class */
         body.loading .overlay{
            display: block;
        }
    </style>