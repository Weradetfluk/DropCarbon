 <!-- 
/*
* v_list_banner
* Display table Banner approve
* @input -
* @output list table entrepreneur approve
* @author weradet nopsombun 62160110
* @Create Date 2564-09-14
*/ 
-->
 <div class="content">
     <!-- main content -->
     <div class="row">
         <div class="col">
             <h3 class="text-dark custom-h4-card-table" style="margin-top : 0 auto;">แบนเนอร์</h3>
         </div>
         <div class="col">
             <button class="btn btn-info" style="float: right; float:right; border-radius: 5px; margin-top : 20px;" id="add_banner">เพิ่มแบนเนอร์</button>
         </div>
     </div>
     <!-- warnning block Modal  -->
     <div class="card">
         <div class="card-header custom-header-tab" style="height: 50px;">

         </div>
         <!-- Tab1 -->
         <div class="card-body">
             <div class="card-body">

                 <div class="table-responsive" id="data_banner">
                     <!-- table approve ajax  -->

                 </div>

             </div>
         </div>
     </div>
 </div>
 <!-- Modal -->
 <div class="modal fade bd-example-modal-lg" id="add_banner_modal" tabindex="-1" role="dialog" aria-labelledby="banner_label" aria-hidden="true">
     <div class="modal-dialog" role="document" style="max-width: 1200px;">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="banner_label">เพิ่มแบนเนอร์</h5>
                 </button>
             </div>
             <div class="modal-body">
                 <div class="card-header custom-header-tab" style="height: 50px;">

                 </div>
                 <!-- Tab1 -->
                 <div class="card-body">
                     <div class="card-body">
                         <div class="banner-pic-div" onclick="document.getElementById('file').click();">
                             <form method="post" action="" id="banner_form">
                                 <img src="https://via.placeholder.com/1920x678" id="photo" width="100%"  style="object-fit: cover;" height="100%">
                                 <input type="file" class="d-none" id="file" name="banner_img" accept="image/*">
                                 <!-- <label for="file" id="uploadBtn">Choose Photo</label> -->
                         </div>
                         <span style="color: red;">***ขนาดภาพไม่เกิน 3000 KB</span>
                         <span style="color: red;">***หากเลือกผิดรูป ให้คลิกที่รูปเพื่อเปลี่ยนอีกครั้ง</span>
                         <span id="err_banner" style="display: none; color:red;">กรุณาเพิ่มภาพ</span>
                         </form>
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-success" id="add_banner_confirm">ยืนยัน</button>
                         <button class="btn btn-secondary" id="cancle_banner_add" style="color: white; background-color: #777777;" data-dismiss="modal">ยกเลิก</button>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <div class="modal" tabindex="-1" role="dialog" id="delete_banner_modal">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">แจ้งเตือน</h5>
             </div>
             <div class="modal-body">
                 <p>คุณต้องการลบแบนเนอร์ใช่หรือไม่ ?</p>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-success" id="delete_banner_confirm" data-dismiss="modal">ยืนยัน</button>
                 <button class="btn btn-secondary" style="color: white; background-color: #777777;" data-dismiss="modal">ยกเลิก</button>
             </div>
         </div>
     </div>
 </div>
 <script>
     $(document).ready(function() {
         $(document).on('click', '#add_banner', function() {
             $('#add_banner_modal').modal();
         });
         get_data_banner(); // get data banner in table
         //add banner
         $('#add_banner_confirm').click(function() {

             // กรณีคลิกเพิ่ม banner
             var form_data = new FormData();
             var images = $('#file')[0].files;
             var row_count = document.getElementById('banner_table').rows.length; // นับแถว ตาราง


             if (images.length > 0 && row_count < 5) {
                 // กรณี มีภาพ และจำนวนภาพน้อยกว่า 5
                 var name = images[0].name; 
                 form_data.append('file', images[0]); 

                 $.ajax({
                     url: "<?php echo site_url() . "Admin/Manage_banner/Admin_manage_banner/insert_banner_ajax" ?>",
                     method: "POST",
                     dataType: "JSON",
                     data: form_data,
                     contentType: false,
                     cache: false,
                     processData: false,
                     success: function(data) {
                         // console.log(data);
                         if (data == 1) {
                             swal({
                                 title: "เพิ่มแบนเนอร์สำเร็จ",
                                 type: "success",
                             });
                             $('#add_banner_modal').modal('toggle');
                             img.setAttribute('src', "https://via.placeholder.com/1920x678");
                             document.getElementById("file").value = '';
                             get_data_banner();// ดึงข้อมูล แบนเนอร์
                             err_banner.style.display = 'none';
                             // เพิ่มภาพสำเร็จ
                         } else {
                             //ภาพใหญ่
                             $('#add_banner_modal').modal('toggle');
                             swal('เพิ่มรูปไม่สำเร็จ', 'ไฟล์ ' + name + ' มีขนาดใหญ่เกินไป', 'error');
                             img.setAttribute('src', "https://via.placeholder.com/1920x678");
                             document.getElementById("file").value = '';
                         }
                     },
                     error: function() {
                         console.log('fail');
                         swal('มีบางอย่างทำงานผิดพลาด', 'error');
                         //  $('#com_file').val('');
                     }
                 });
             } else if( row_count == 5 && images.length > 0) {
                 //มีภาพเกินจำนวน
                 swal('ไม่สามารถเพิ่มภาพได้', 'ไม่สามารถเพิ่มภาพได้เนื่องจากภาพมีจำนวนเกิน', 'error');
                 $('#add_banner_modal').modal('toggle');
                 document.getElementById("file").value = '';
                 err_banner.style.display = 'none';
                 img.setAttribute('src', "https://via.placeholder.com/1920x678");
             }else if(images.length == 0){
                err_banner.style.display = 'block';
              
             }
         });
     });
     
     const img = document.querySelector('#photo');
     const file = document.querySelector('#file');
     file.addEventListener('change', function() {
         //เมื่อมีการอัพไฟล์
         const choosedFile = this.files[0];
         if (choosedFile) {
             const reader = new FileReader();
             reader.addEventListener('load', function() {
                 img.setAttribute('src', reader.result);
                 img.style.objectFit = "contain";
             });
             $('#cancle_banner_add').click(function() {
                 img.setAttribute('src', "https://via.placeholder.com/1920x678");
                 document.getElementById("file").value = '';
             });
             reader.readAsDataURL(choosedFile);
         }
     });


     /*
     * get_data_banner
     * get_data_banner
     * @input 
     * @output -
     * @author Weradet Nopsombun 62160110 
     * @Create Date 2564-09-28
     * @Update -
     */
     function get_data_banner() {
         $.ajax({
             method: "POST",
             url: '<?php echo site_url() . "Admin/Manage_banner/Admin_manage_banner/get_banner_list_ajax" ?>',
             dataType: 'JSON',
             success: function(json_data) {

                 create_table_banner(json_data['data_banner_json']);

             },
             error: function() {
                 alert('ajax Not working');
             }
         });
     }


      /*
     * create_table_banner
     * create_table_banner
     * @input 
     * @output -
     * @author Weradet Nopsombun 62160110 
     * @Create Date 2564-09-28
     * @Update -
     */
     function create_table_banner(arr_banner) {
         let html_code = '';

         html_code += ' <table class="table" style="text-align: center;" id="banner_table">';
         html_code += '<thead class="thead-light">';
         html_code += '<thead class="text-white">'
         html_code += '<tr>';
         html_code += '<td>ลำดับ</td>'
         html_code += '<td>ภาพ</td>'
         html_code += '<td>ผู้เพิ่ม</td>'
         html_code += '<td>ดำเนินการ</td>'
         html_code += '</tr>'
         html_code += '</thead>'
         html_code += ' <tbody class="list">';



         if (arr_banner.length != 0) {
             let i = 1;
             arr_banner.forEach((row_ban, index_ban) => {

                 html_code += '<tr>';
                 html_code += '<td>' + i + '</td>';
                 html_code += '<td>' + ' <img src="' + ' <?php echo base_url() . 'banner/' ?>' + (row_ban['ban_path']) + '" style="object-fit: cover;"  alt="Image" width="200px" height="100px">' + '</td>';
                 html_code += '<td>' + (row_ban['adm_name']) + '</td>';
                 html_code += '<td>' + '<button class="btn btn-danger custom-btn-table" id="delete_banner" onclick="confirm_delete_banner(\'' + row_ban['ban_path'] + '\')" title="ลบแบรนเนอร์">' + '<i class="material-icons">clear</i>' + '</td>';
                 html_code += '</tr>';

                 i++;
             });

         } else {
             html_code += '<tr>';
             html_code += '<td colspan="4">' + 'ไม่มีข้อมูลในตารางนี้' + '</td>';
             html_code += '</tr>';
         }
         html_code += '</tbody>';
         html_code += ' </table>';

         $('#data_banner').html(html_code);
     }



      /*
     * confirm_delete_banner
     * confirm_delete_banner
     * @input 
     * @output -
     * @author Weradet Nopsombun 62160110 
     * @Create Date 2564-09-28
     * @Update -
     */
     function confirm_delete_banner(img_path) {
         $('#delete_banner_modal').modal();
         $('#delete_banner_confirm').click(function() {
             console.log(img_path)
             $.ajax({
                 url: "<?php echo site_url() . "Admin/Manage_banner/Admin_manage_banner/delete_banner_ajax" ?>",
                 method: "POST",
                 data: {
                     img_path: img_path
                 },
                 success: function() {
                     swal({
                         title: "ลบแบนเนอร์สำเร็จ",
                         type: "success",
                     });
                     get_data_banner()

                 },
                 error: function() {
                     swal('ไม่สามารถใช้งานได้', 'มีบางอย่างทำงานผิดพลาด', 'error');
                     //  $('#com_file').val('');
                 }
             });

         });
     }
 </script>