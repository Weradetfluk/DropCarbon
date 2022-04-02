<!-- 
/*
* v_list_promo_over_admin
* Display data promotion over by admin
* @input arr_promo
* @output data promo over
* @author Kasama Donwong 62160074
* @Create Date 2564-12-24
*/ 
-->
<!-- ส่วนการทำงานหลัก -->
<div class="content">
    <div class="row">
        <div class="col">
            <h3 class=" text-dark custom-h4-card-table" style="padding-bottom: 15px; margin : 0 auto;">โปรโมชันที่สิ้นสุดแล้ว</h3>
        </div>
        <!-- ปุ่มเพิ่มโปรโมชัน -->
        <div class="col">
            <button class="btn btn-info" style="margin-top: 2px; float:right; border-radius: 5px;" onclick="location.href='<?php echo base_url() . 'Admin/Manage_promotions/Admin_add_promotions/show_add_promotion' ?>'">เพิ่มโปรโมชัน</button>
        </div>
    </div>
    <!-- แถบนำทางผู้ใช้งาน -->
    <div class="card card-nav-tabs custom-card-tab">
        <div class="card-header custom-header-tab">
            <div class="row">
                <div class="col-sm-6">
                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                            <ul class="nav nav-tabs" data-tabs="tabs">
                                <li class="nav-item">
                                    <a class="nav-link" href=" <?php echo base_url() . 'Admin/Manage_promotions/Admin_list_promotions/show_data_promotions_list' ?> ">
                                        <h5 class="h5-card-header">ยังไม่สิ้นสุด</h5>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="<?php echo base_url() . 'Admin/Manage_promotions/Admin_list_promotions/show_data_promo_over' ?> ">
                                        <h5 class="h5-card-header">สิ้นสุดแล้ว</h5>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url() . 'Admin/Manage_promotions/Admin_list_promotions/show_data_promo_cancle' ?>">
                                        <h5 class="h5-card-header">หยุดการใช้งาน</h5>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ส่วนการค้นหา -->
                <div class="col">
                    <form class="form-inline custom-form-search " action="<?php echo base_url() . 'Admin/Manage_company/Admin_approval_company/show_data_consider'; ?>" method="POST">
                        <div class="input-group ">
                            <input type="text" value="" id="search_box" name="value_search" class="form-control custom-search" placeholder="  ค้นหาชื่อได้ที่นี่...">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- ตารางโปรโมชันที่สิ้นสุดแล้ว -->
        <div class="card-body ">
            <div class="table-responsive" id="data_promo_over_admin">
            </div>
        </div>
    </div>

<!--  หน้าต่างแสดงผลซ้อนยืนยันการลบโปรโมชัน  -->
<div class="modal" tabindex="-1" role="dialog" id="modal_delete">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="font-family: 'Prompt', sans-serif !important;">แจ้งเตือน</h5>
                </div>
                <div class="modal-body">
                    <p>คุณต้องการที่จะลบ <span id="pro_name_confirm"></span> ?</p>
                </div>
                <div class="modal-footer">
                    <!-- ปุมยืนยันการเปิดใช้งาน -->
                    <button type="button" class="btn btn-danger" id="delete_btn" data-dismiss="modal">ยืนยัน</button>
                    <!-- ปุ่มยกเลิกการเปิดใช้งาน -->
                    <button type="button" class="btn btn-secondary" style="color: white; background-color: #777777;" data-dismiss="modal">ยกเลิก</button>
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
             url: '<?php echo base_url('Admin/Manage_promotions/Admin_list_promotions/get_promo_over_admin_ajax/'); ?>' + 2,
             method: "POST",
             dataType: "Json",
             data: {
                 page: page,
                 query: query
             },
             success: function(data) {
                 create_table(data['arr_promo'], data['paganition']);

             }
         });
     }
     
     function create_table(data, pagation) 
     {
         console.log(data);
         let html_code = '';
         html_code += '<table class="table" style="text-align: center;">';
         html_code += '<thead class="text-white custom-thead">';
         html_code += '<tr class="custom-tr-header-table">';
         html_code += '<th class="th-custom res-hide">ลำดับ</th>';
         html_code += '<th class="th-custom ">ชื่อโปรโมชัน</th>';
         html_code += '<th class="th-custom ">เวลาดำเนินการ</th>';
         html_code += '<th class="th-custom ">สถานะโปรโมชัน</th>';
         html_code += '<th class="th-custom ">ดำเนินการ</th>';
         html_code += '</tr>';
         html_code += '</thead>';
         html_code += '<tbody class="list">';

         data.forEach((row, index) => {

             html_code += '<tr>';
             html_code += '<td class ="res-hide">' + (index+1) + '</td>';
             html_code += '<td style="text-align: left;">' + (row['pro_name']) + '</td>';
             html_code += '<td style="text-align: left;">' + format_date_to_abbreviation(row['pro_start_date']) + ' - '+format_date_to_abbreviation(row['pro_end_date']) + '</td>';
             html_code += '<td style="color: red;">สิ้นสุด</td>';
             html_code += '<td style="text-align: center;">';
             html_code += '<a class="btn btn-info custom-a" style="font-size:10px; padding:12px;" href=" <?php echo site_url() . 'Admin/Manage_promotions/Admin_approval_promotions/show_detail_pro/' ?>'  + (row['pro_id'])  + '" title = "ดูรายละเอียดโปรโมชัน">'         
             html_code +='<i class="material-icons">'
             html_code +='search'
             html_code +='</i>';
             html_code += '</a>'
             html_code += '</a>'
             html_code += '<button class="btn btn-danger custom-a" style="font-size:10px; padding:12px;" onclick="confirm_delete(\'' + (row['pro_name']) +'\',\'' + (row['pro_id']) +  '\')" title = "ลบโปรโมชัน">'         
             html_code +='<i class="material-icons">'
             html_code +='delete'
             html_code +='</i>';
             html_code += '</button>'
             html_code += '</tr>';
             html_code += '</tbody>'
     });
             html_code += '</table><br>';
             html_code += '<div class="container-fluid" style="align: center;   position: relative;">';
             html_code += '<ul class="pagination w-50" id="pagination">';

            if(pagation){
                html_code += pagation;
            }
             $('#data_promo_over_admin').html(html_code);

     }
     
        /*
         * confirm_delete
         * confirm delete promotion
         * @input pro_name_con,pro_id_con
         * @output modal comfirm delete promotion
         * @author Thanchanok Thonhjumroon 62160089
         * @Create Date 2564-10-03
         */
        function confirm_delete(pro_name_con, pro_id_con) {
            $('#pro_name_confirm').text(pro_name_con);
            $('#modal_delete').modal();


            // button
            $('#delete_btn').click(function() {
                delete_promotion_ajax(pro_id_con)
            });
        }

        /*
         * delete_promotion_ajax
         * confirm delete promotion
         * @input pro_id_con
         * @output delete promotion
         * @author Thanchanok Thongjumroon 62160089
         * @Create Date 2564-10-03
         */
        function delete_promotion_ajax(pro_id_con) {
            $.ajax({
                type: "POST",
                data: {
                    pro_id: pro_id_con,
                    pro_status: 4
                },
                url: '<?php echo site_url() . 'Entrepreneur/Manage_promotion/Promotion_edit/edit_status_promotion_ajax/' ?>',
                success: function() {
                    swal({
                            title: "ลบโปรโมชัน",
                            text: "คุณได้ทำการลบโปรโมชันเสร็จสิ้น",
                            type: "success"
                        },
                        function() {
                            location.reload();
                        })

                },
                error: function() {
                    alert('ajax error working');
                }
            });

        }
</script>