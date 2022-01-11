<!-- 
/*
* v_detail_company
* Display data detail company by admin
* @input arr_company, arr_image
* @output detail data company
* @author Kasama Donwong 62160074
* @Create Date 2564-08-20
*/ 
-->
<style>
ul.breadcrumb {
    padding: 10px 16px;
    list-style: none;
}

ul.breadcrumb li {
    display: inline;
    font-size: 18px;
}

ul.breadcrumb li+li:before {
    padding: 8px;
    color: black;
    content: ">";
}

ul.breadcrumb li a {
    color: #0275d8;
    text-decoration: none;
}

ul.breadcrumb li a:hover {
    color: #01447e;
    text-decoration: underline;
}
</style>
<div class="content">
    <ul class="breadcrumb">
        <li><a href="<?php echo site_url() . 'Admin/Manage_company/Admin_approval_company/show_data_consider'; ?>"
                style="color: green;">จัดการสถานที่</a></li>
        <li>ดูรายละเอียด</li>
    </ul>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"
                            style="background-color: #8fbacb; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2)">
                            <center>
                                <h2 class="card-title text-white" style="font-family: 'Prompt', sans-serif !important;">
                                    <?php echo $arr_company->com_name; ?></h2>
                            </center>
                        </div>
                        <br>
                        <div class="card-body">

                            <div id="carousel_example_indicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <?php for ($i = 0; $i < count($arr_image); $i++) { ?>
                                    <?php if ($i == 0) { ?>
                                    <li data-target="#carousel_example_indicators" data-slide-to="<?php echo $i; ?>"
                                        class="active"></li>
                                    <?php } ?>
                                    <?php if ($i != 0) { ?>
                                    <li data-target="#carousel_example_indicators" data-slide-to="<?php echo $i; ?>">
                                    </li>
                                    <?php } ?>
                                    <?php } ?>
                                </ol>
                                <div class="carousel-inner">
                                    <hr width="100%" size="5" color="#cccccc">
                                    <?php for ($i = 0; $i < count($arr_image); $i++) { ?>
                                    <?php if ($i == 0) { ?>
                                    <div class="carousel-item image-detail active">
                                        <img class="d-block w-100 image_banner"
                                            src="<?php echo base_url() . 'image_company/' . $arr_image[$i]->com_img_path; ?>">
                                    </div>
                                    <?php } ?>
                                    <?php if ($i != 0) { ?>
                                    <div class="carousel-item image-detail">
                                        <img class="d-block w-100 image_banner"
                                            src="<?php echo base_url() . 'image_company/' . $arr_image[$i]->com_img_path; ?>">
                                    </div>
                                    <?php } ?>
                                    <?php } ?>
                                    <br>
                                </div>
                                <a class="carousel-control-prev" href="#carousel_example_indicators" role="button"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carousel_example_indicators" role="button"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>


                            <br>
                            <div class="container">
                                <h3 style="font-family: 'Prompt', sans-serif !important;"><img
                                        src="<?php echo base_url() . 'assets/templete/picture/description.png' ?>"
                                        width="40px"> รายละเอียด</h3>
                                <hr width="100%" size="10" color="#cccccc">
                                <p style="font-size: 18px; text-indent: 50px;">
                                    <?php echo $arr_company->com_description; ?></p>
                            </div><br>

                            <div class="container">
                                <div class="row">
                                    <div class="col-5">
                                        <h3><img src="<?php echo base_url() . 'assets/templete/picture/category.png' ?>"
                                                width="40px"> ประเภท</h3>
                                        <hr width="100%" size="10" color="#cccccc">
                                        <p style="font-size: 18px; text-indent: 50px;">กิจกรรมนี้จัดอยู่ในประเภท:
                                            <?php echo $arr_company->com_cat_name; ?></p>
                                    </div>
                                    <div class="col-2"></div>
                                    <div class="col-5">
                                        <h3><img src="<?php echo base_url() . 'assets/templete/picture/phone.png' ?>"
                                                width="34px"> ข้อมูลติดต่อ</h3>
                                        <hr width="100%" size="10" color="#cccccc">
                                        <p style="font-size: 18px; text-indent: 50px;">เบอร์โทรศัพท์:
                                            <?php echo $arr_company->com_tel; ?></p>
                                    </div>
                                </div>
                            </div><br><br>

                            <!-- ที่ตั้งของ สถานที่-->
                            <div class="row py-3">
                                <div class="col">
                                    <h3>
                                        <!-- <span class="material-icons" style="font-size: 30px;">place</span> -->
                                        <img src="<?php echo base_url() . 'assets/templete/picture/location.png' ?>"
                                            style="width:30px;margin-top:-5px;">
                                        ตำแหน่งสถานที่
                                    </h3>
                                    <div class="card" style="padding-left: 2%; transform: unset;">
                                        <h3 style="padding-top: 2%; ">
                                            <img src="<?php echo base_url() . 'assets/templete/picture/company_icon.png' ?>"
                                                style="width:30px;margin-top:-5px;">
                                            <?php echo $arr_company->com_name ?>
                                        </h3>
                                        <!-- ชื่อสถานที่ -->
                                        <hr>
                                        <div class="row">
                                            <div class="col">
                                                <h3>ที่อยู่</h3>
                                                <hr>
                                                <div class="row py-3">
                                                    <div class="col-1">
                                                        <img src="<?php echo base_url() . 'assets/templete/picture/information-point.png' ?>"
                                                            style="width:34px;margin-top:-5px;">
                                                    </div>
                                                    <div class="col">
                                                        <p style="font-size: 18px; text-indent:20px;">
                                                            <?php echo $arr_company->com_location . " จังหวัด." . $arr_company->prv_name_th . " อำเภอ." . $arr_company->dis_name_th . " ตำบล." . $arr_company->par_name_th . " รหัสไปรษณีย์ " . $arr_company->par_code ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col" style="padding-right: 2%; padding-bottom: 1%;">
                                                <div class="table-responsive">
                                                    <table class="table ">
                                                        <tr>
                                                            <td style="border: 2px solid black;">
                                                                <div id="Map" style="width: 700px; height: 300px;">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!---->
                                    </div>
                                </div>
                            </div>

                            <?php if ($arr_company->com_status == 1) { ?>
                            <div class="container">
                                <!-- Submit button -->
                                <form>
                                    <input type="hidden" name="com_id" id="com_id"
                                        value="<?php echo $arr_company->com_id; ?>">
                                    <div style="text-align: right;">
                                        <button type="button" class="btn btn-success" id="accept"
                                            onclick='confirm_approve("<?php echo $arr_company->com_id ?>" ,"<?php echo $arr_company->com_name ?>", "<?php echo $arr_company->ent_email  ?>")'
                                            data-dismiss="modal">อนุมัติ</button>
                                        <button type="button" class="btn btn-danger" id="reject"
                                            onclick='confirm_reject("<?php echo $arr_company->com_id ?>", "<?php echo $arr_company->com_name ?>", "<?php echo $arr_company->ent_email  ?>")'
                                            data-dismiss="modal">ปฏิเสธ</button>
                                    </div>
                                </form>
                            </div>
                            <?php } ?>
                            <!-- <?php var_dump($arr_company) ?> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- warnning aprove Modal  -->
        <div class="modal" tabindex="-1" role="dialog" id="aprove_modal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="font-family: 'Prompt', sans-serif;">แจ้งเตือน</h5>
                    </div>
                    <div class="modal-body">
                        <p>คุณต้องการอนุมัติ <span id="com_name_confirm"></span> ?</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success" id="approves" data-dismiss="modal">ยืนยัน</button>
                        <button class="btn btn-secondary" style="color: white; background-color: #777777;"
                            data-dismiss="modal">ยกเลิก</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- warnning reject  -->
        <div class="modal" tabindex="-1" role="dialog" id="rejected_com">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="font-family: 'Prompt', sans-serif;">แจ้งเตือน</h5>
                    </div>
                    <div class="modal-body">
                        <p class="modal-title">คุณต้องการที่จะปฏิเสธ <span id="com_reject_name_confirm"></span> ?</p>
                        <p>กรุณาระบุเหตุผล</p>
                        <form method="POST"
                            action="<?php echo base_url() . 'Admin/Manage_company/Admin_approval_company/reject_company'; ?>"
                            id="reject_form">
                            <input type="hidden" id="email" name="email">
                            <input type="hidden" id="com_id_form" name="com_id">
                            <input type="hidden" id="cor_com_id" name="com_id">
                            <textarea class="form-control" style="min-width: 100%" id="admin_reason" name="admin_reason"
                                placeholder="กรุณาระบุเหตุผลในการปฏิเสธ..."></textarea>
                            <span id="err_message"
                                style="display: none; color: red;">กรุณาระบุเหตุผลในการปฏิเสธไม่ต่ำกว่า 6
                                ตัวอักษร</span>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" id="rejected">ยืนยัน</button>
                        <button class="btn btn-secondary" style="color: white; background-color: #777777;"
                            data-dismiss="modal">ยกเลิก</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <script>
        var lat =
            '<?= $arr_company->com_lat ?>'; //มีการส่งค่าตัวแปร $com_lat php ที่มีการเก็บค่า field lati จากฐานข้อมูลมาเก็บไว้ในตัวแปร lat ของ javascript
        var long =
            '<?= $arr_company->com_lon ?>'; //มีการส่งค่าตัวแปร $com_lon php ที่มีการเก็บค่า field longti จากฐานข้อมูลมาเก็บไว้ในตัวแปร long ของ javascript
        var zoom = 16; //มีการกำหนดค่าตัวแปร zoom ให้เป็น 14 , เพื่อทำการขยายภาพตอนเริ่มต้นแสดงแผนที่

        var from_projection = new OpenLayers.Projection("EPSG:4326"); // Transform from WGS 1984
        var to_projection = new OpenLayers.Projection("EPSG:900913"); // to Spherical Mercator Projection
        var position = new OpenLayers.LonLat(long, lat).transform(from_projection,
            to_projection
            ); //ทำการเก็บค่าตัวแปร lat,long ไว้ในตัวแปร position , เพื่อไว้แสดงค่าพิกัดบนแผนที่ OpenStreetMap ตอนเริ่มต้น


        map = new OpenLayers.Map("Map"); //ใช้ Function OpenLayer.Map() ในการแสดงแผนที่

        var map_link = new OpenLayers.Layer.OSM();
        map.addLayer(map_link);

        var markers = new OpenLayers.Layer.Markers(
            "Markers"
            ); //แสดงสัญลักษณ์ Marker ปักหมุดโดยใช้ Function Markers , แต่ต้องมีเรียกใช้งาน Openlayers.js ไม่งั้นจะไม่แสดงสัญลักษณ์ออกมา

        map.addLayer(markers);
        markers.addMarker(new OpenLayers.Marker(position));

        map.setCenter(position, zoom);
        </script>
        <script>
        /*
         * confirm_approve
         * open modal id = aprove_modal 
         * @input click button approve
         * @output modal to confirm approve modal
         * @author Kasama Donwong 62160074
         * @Create Date 2564-08-08
         * @Update -
         */

        function confirm_approve(com_id, com_name, ent_email) {
            $('#com_name_confirm').text(com_name);
            console.log(ent_email)
            $('#aprove_modal').modal({
                backdrop: 'static',
                keyboard: false
            });
            $('#approves').click(function() {
                approve_company(com_id, com_name, ent_email) //function 
            });
        }

        /*
         * confirm_reject
         * open modal id = Rejectent
         * @input com_id, ent_email
         * @output modal to reject  modal 
         * @author Nantasiri Saiwaew 62160093
         * @Create Date 2564-08-10
         * @Update -
         */

        function confirm_reject(com_id, com_name, ent_email) {
            let form = document.querySelector('#reject_form');
            $('#com_reject_name_confirm').text(com_name);
            $('#rejected_com').modal();
            $('#email').val(ent_email);
            $('#com_id_form').val(com_id);
            $('#cor_com_id').val(com_id);
            console.log(ent_email);

            let admin_reson = document.querySelectorAll('#admin_reason');
            let err_message = document.querySelector('#err_message');

            console.log(admin_reson);
            $('#rejected').click(function() {
                let tooshort = false;
                admin_reson.forEach((reson) => {
                    if (reson.value.length < 6) {
                        tooshort = true;
                    }
                });
                if (tooshort) {
                    event.preventDefault();
                    err_message.style.display = 'block';
                } else {
                    $('#rejected_com').modal('toggle');
                    err_message.style.display = 'none';
                    swal({
                        title: "ปฏิเสธสำเร็จ",
                        text: "ปฏิเสธสถานที่สำเร็จ กำลังจัดส่งอีเมล...",
                        type: "success",
                        showConfirmButton: false,
                        timer: 3000,
                    }, function() {
                        window.location.href =
                            '<?php echo base_url('Admin/Manage_company/Admin_approval_company/show_data_reject'); ?>'
                    });
                }
            });
        }


        /*
         * approve_company
         * change status to approve 
         * @input click button approve
         * @output change status to 2
         * @author Kasama Donwong 62160074
         * @Create Date 2564-08-08
         * @Update -
         */
        function approve_company(com_id, com_name, ent_email) {
            $.ajax({
                type: "POST",
                data: {
                    com_id: com_id
                },
                url: '<?php echo base_url('Admin/Manage_company/Admin_approval_company/approval_company'); ?>',
                success: function() {
                    //sweet alert
                    swal({
                        title: "อนุมัติสำเร็จ",
                        text: "อนุมัติสถานที่สำเร็จ กำลังจัดส่งอีเมล...",
                        type: "success",
                        showConfirmButton: false,
                        timer: 3000,
                    }, function() {
                        window.location.href =
                            '<?php echo base_url('Admin/Manage_company/Admin_approval_company/show_data_approve'); ?>'
                    })
                    var content = "ผู้ดูแลระบบได้ทำการอนุมัติสถานที่ " + com_name + " ของคุณ";
                    var content_h1 = "คุณได้รับการอนุมัติสถานที่ " + com_name;
                    var subject = "Approval";
                    send_mail_ajax(content, ent_email, subject, content_h1);
                },
                error: function() {
                    alert('ajax error working');
                }
            });
        }
        </script>