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
<!-- 
/*
* v_detail_promotions_admin
* Display data detail event by admin
* @input obj_event, arr_image
* @output detail data promotions
* @author Kasama Donwong 62160074
* @Create Date 2564-09-25
*/ 
-->
<div class="content">
    <ul class="breadcrumb">
        <li><a href="<?php echo site_url() . 'Admin/Manage_promotions/Admin_approval_promotions/show_data_consider'; ?>" style="color: green;">จัดการโปรโมชัน</a></li>
        <li>ดูรายละเอียด</li>
    </ul>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background-color: #8fbacb; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2)">
                        <center>
                            <h2 class="card-title text-white" style="font-family: 'Prompt', sans-serif !important;"><?php echo $arr_pro[0]->pro_name; ?></h2>
                        </center>
                    </div>
                    <br>
                    <div class="card-body">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators" style="bottom: 30px !important;">
                                <?php for ($i = 0; $i < count($arr_pro); $i++) { ?>
                                    <?php if ($i == 0) { ?>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>" class="active"></li>
                                    <?php } ?>
                                    <?php if ($i != 0) { ?>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>"></li>
                                    <?php } ?>
                                <?php } ?>
                            </ol>
                            <div class="carousel-inner">
                                <hr width="100%" size="5" color="#cccccc">
                                <?php for ($i = 0; $i < count($arr_pro); $i++) { ?>
                                    <?php if ($i == 0) { ?>
                                        <div class="carousel-item image-detail active">
                                            <img class="d-block w-100 image_banner" src="<?php echo base_url() . 'image_promotions/' . $arr_pro[$i]->pro_img_path; ?>">
                                        </div>
                                    <?php } ?>
                                    <?php if ($i != 0) { ?>
                                        <div class="carousel-item image-detail">
                                            <img class="d-block w-100 image_banner" src="<?php echo base_url() . 'image_promotions/' . $arr_pro[$i]->pro_img_path; ?>">
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                                <br>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>

                        <div class="container">
                            <h3 style="font-family: 'Prompt', sans-serif;"><img src="<?php echo base_url() . 'assets/templete/picture/description.png' ?>" width="40px"> รายละเอียดโปรโมชัน</h3>
                            <hr width="100%" size="10" color="#cccccc">
                            <p style="font-size: 18px; text-indent: 50px;"><?php echo $arr_pro[0]->pro_description; ?></p>

                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-5">
                                    <h3><img src="<?php echo base_url() . 'assets/templete/picture/point.png' ?>" width="40px"> คะแนนโปรโมชัน</h3>
                                    <hr width="100%" size="10" color="#cccccc">
                                    <p style="font-size: 18px; text-indent: 50px;">คะแนนที่จะต้องใช้แลกโปรโมชัน: <?php echo $arr_pro[0]->pro_point; ?> คะเเนน</p>
                                </div>
                                <div class="col-2"></div>
                                <div class="col-5">
                                    <h3><img src="<?php echo base_url() . 'assets/templete/picture/category.png' ?>" width="40px"> ประเภท</h3>
                                    <hr width="100%" size="10" color="#cccccc">
                                    <p style="font-size: 18px; text-indent: 50px;">โปรโมชันนี้จัดอยู่ในประเภท: <?php echo $arr_pro[0]->pro_cat_name; ?></p>
                                </div>
                            </div>
                        </div><br><br>

                        <div class="container">
                            <h3><img src="<?php echo base_url() . 'assets/templete/picture/promotion_icon.png' ?>" width="40px"> ระยะเวลาโปรโมชัน</h3>
                            <hr width="100%" size="10" color="#cccccc">
                            <?php
                            if (!function_exists('month_convert')) {
                                function month_convert($full_date = '')
                                {
                                    $m = substr($full_date, 5, 2);
                                    $m = intval($m);
                                    $arr_month = array('มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายยน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม');
                                    return $arr_month[$m - 1];
                                }
                            }
                            if (!function_exists('year_convert')) {
                                function year_convert($full_date = '')
                                {
                                    $y = substr($full_date, 0, 4);
                                    $y = intval($y);
                                    return $y + 543;
                                }
                            }
                            if (!function_exists('full_date_convert')) {
                                function full_date_convert($full_date = '')
                                {
                                    $d = substr($full_date, 8, 2);
                                    $d = intval($d);
                                    return $d . ' ' . month_convert($full_date) . ' ' . year_convert($full_date);
                                }
                            }
                            ?>
                            <p style="font-size: 18px; text-indent: 50px;">วันที่ <?php echo full_date_convert($arr_pro[0]->pro_start_date) ?> - <?php echo full_date_convert($arr_pro[0]->pro_end_date) ?></p>
                        </div><br><br>
                        <div class="container">
                            <h3><img src="<?php echo base_url() . 'assets/templete/picture/company_icon.png' ?>" width="40px"> <?php echo $arr_pro[0]->com_name; ?></h3>
                            <hr width="100%" size="10" color="#cccccc">
                            <ul>
                                <li>
                                    <h4>เบอร์โทรศัพท์: </h4>
                                </li>
                                <p style="font-size: 18px; text-indent: 50px;"><?php echo $arr_pro[0]->com_tel; ?></p>
                                </p><br>
                                <!-- รายละเอียดที่อยู่กิจกรรม -->
                                <h4><img src="<?php echo base_url() . 'assets/templete/picture/information-point.png' ?>" 
                                    style="width:34px;"> รายละเอียดที่อยู่</h4>
                                <p style="font-size: 18px; text-indent:50px;"><?php echo  $arr_pro[0]->com_location . " จังหวัด." . $arr_pro[0]->prv_name_th . " อำเภอ." . $arr_pro[0]->dis_name_th . " ตำบล." . $arr_pro[0]->par_name_th . " รหัสไปรษณีย์ " . $arr_pro[0]->par_code ?></p>
                                <br>
                                <h4><img src="<?php echo base_url() . 'assets/templete/picture/location.png' ?>" 
                                    width="40px"> ตำแหน่งสถานที่</h4>
                                <table class="table table-responsive">
                                    <tr>
                                        <td style="border: 2px solid black;">
                                            <div id="Map" style="width: 900px; height: 400px;"></div>
                                        </td>
                                    </tr>
                                </table>
                            </ul>
                        </div>
                        <!-- ตำแหน่ง -->
                        <?php if ($arr_pro[0]->pro_status == 1) { ?>
                            <div class="container">
                                <!-- Submit button -->
                                <form>
                                    <input type="hidden" name="pro_id" id="pro_id" value="<?php echo $arr_pro[0]->pro_id; ?>">
                                    <div style="text-align: right;">
                                        <button type="button" class="btn btn-success" id="accept" onclick='confirm_approve("<?php echo $arr_pro[0]->pro_id ?>" ,"<?php echo $arr_pro[0]->pro_name ?>", "<?php echo $arr_pro[0]->ent_email  ?>")' data-dismiss="modal">อนุมัติ</button>
                                        <button type="button" class="btn btn-danger" id="reject" onclick='confirm_reject("<?php echo $arr_pro[0]->pro_id ?>", "<?php echo $arr_pro[0]->pro_name ?>", "<?php echo $arr_pro[0]->ent_email  ?>")' data-dismiss="modal">ปฏิเสธ</button>
                                    </div>
                                </form>
                            </div>
                        <?php } ?>
                        <!-- <?php var_dump($arr_pro) ?> -->
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
                            <p>คุณต้องการอนุมัติ <span id="pro_name_confirm"></span> ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" id="approves" data-dismiss="modal">ยืนยัน</button>
                            <button class="btn btn-secondary" style="color: white; background-color: #777777;" data-dismiss="modal">ยกเลิก</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- warnning reject  -->
            <div class="modal" tabindex="-1" role="dialog" id="rejected_pro">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">แจ้งเตือน</h5>
                        </div>
                        <div class="modal-body">
                            <p>คุณต้องการที่จะปฏิเสธ<span id="pro_reject_name_confirm"></span> ?</p><br>
                            <p>กรุณาระบุเหตุผล</p>
                            <form method="POST" action="<?php echo base_url() . 'Admin/Manage_promotions/Admin_approval_promotions/reject_pro'; ?>" id="reject_form">
                                <input type="hidden" id="email" name="email">
                                <input type="hidden" id="pro_id_form" name="pro_id">
                                <input type="hidden" id="prr_pro_id" name="pro_id">
                                <textarea class="form-control" style="min-width: 100%" id="admin_reason" name="admin_reason" placeholder="กรุณาระบุเหตุผลในการปฏิเสธ..."></textarea>
                                <span id="err_message" style="display: none; color: red;">กรุณาระบุเหตุผลในการปฏิเสธไม่ต่ำกว่า 6 ตัวอักษร</span>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" id="rejected">ยืนยัน</button>
                            <button class="btn btn-secondary" style="color: white; background-color: #777777;" data-dismiss="modal">ยกเลิก</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://www.openlayers.org/api/OpenLayers.js"></script>

            <script>
                var lat = '<?= $arr_pro[0]->com_lat ?>'; //มีการส่งค่าตัวแปร $com_lat php ที่มีการเก็บค่า field lati จากฐานข้อมูลมาเก็บไว้ในตัวแปร lat ของ javascript
                var long = '<?= $arr_pro[0]->com_lon ?>'; //มีการส่งค่าตัวแปร $com_lon php ที่มีการเก็บค่า field longti จากฐานข้อมูลมาเก็บไว้ในตัวแปร long ของ javascript
                var zoom = 16; //มีการกำหนดค่าตัวแปร zoom ให้เป็น 14 , เพื่อทำการขยายภาพตอนเริ่มต้นแสดงแผนที่

                var from_projection = new OpenLayers.Projection("EPSG:4326"); // Transform from WGS 1984
                var to_projection = new OpenLayers.Projection("EPSG:900913"); // to Spherical Mercator Projection
                var position = new OpenLayers.LonLat(long, lat).transform(from_projection, to_projection); //ทำการเก็บค่าตัวแปร lat,long ไว้ในตัวแปร position , เพื่อไว้แสดงค่าพิกัดบนแผนที่ OpenStreetMap ตอนเริ่มต้น


                map = new OpenLayers.Map("Map"); //ใช้ Function OpenLayer.Map() ในการแสดงแผนที่

                var mapnik = new OpenLayers.Layer.OSM();
                map.addLayer(mapnik);

                var markers = new OpenLayers.Layer.Markers("Markers"); //แสดงสัญลักษณ์ Marker ปักหมุดโดยใช้ Function Markers , แต่ต้องมีเรียกใช้งาน Openlayers.js ไม่งั้นจะไม่แสดงสัญลักษณ์ออกมา

                map.addLayer(markers);
                markers.addMarker(new OpenLayers.Marker(position));

                map.setCenter(position, zoom);

                $(document).ready(function() {


                    $('.responsive').slick({

                        infinite: false,
                        speed: 300,
                        slidesToShow: 4,
                        slidesToScroll: 4,
                        responsive: [{
                                breakpoint: 1024,
                                settings: {
                                    slidesToShow: 3,
                                    slidesToScroll: 3,
                                    infinite: true,
                                }
                            },
                            {
                                breakpoint: 600,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 2
                                }
                            },
                            {
                                breakpoint: 480,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1
                                }
                            }
                            // You can unslick at a given breakpoint now by adding:
                            // settings: "unslick"
                            // instead of a settings object
                        ]
                    });



                });
            </script>
            <script>
                /*
                 * confirm_approve
                 * open modal id = Aprovemodal 
                 * @input 
                 * @output modal to confirm approve modal
                 * @author Weradet Nopsombun 62160110
                 * @Create Date 2564-07-17
                 * @Update 2564-09-18
                 */
                function confirm_approve(pro_id, pro_name, ent_email) {
                    $('#pro_name_confirm').text(pro_name);
                    console.log(ent_email)
                    $('#aprove_modal').modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                    $('#approves').click(function() {
                        approve_promotions(pro_id, pro_name, ent_email) //function 
                    });
                }
                /*
                 * confirm_reject
                 * open modal id = Aprovemodal 
                 * @input 
                 * @output modal to reject  modal 
                 * @author Weradet Nopsombun 62160110
                 * @Create Date 2564-07-17
                 * @Update -
                 */
                function confirm_reject(pro_id, pro_name, ent_email) {
                    let form = document.querySelector('#reject_form');
                    $('#pro_reject_name_confirm').text(pro_name);
                    $('#rejected_pro').modal();
                    $('#email').val(ent_email);
                    $('#pro_id_form').val(pro_id);
                    $('#prr_pro_id').val(pro_id);
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
                            $('#rejected_pro').modal('toggle');
                            err_message.style.display = 'none';
                            swal({
                                title: "ปฏิเสธสำเร็จ",
                                text: "ปฏิเสธการเพิ่มโปรโมชันสำเร็จ กำลังจัดส่งอีเมล...",
                                type: "success",
                                showConfirmButton: false,
                                timer: 3000,
                            }, function() {
                                window.location.href = '<?php echo base_url('Admin/Manage_promotions/Admin_approval_promotions/show_data_consider'); ?>'
                            });
                        }
                    });
                }
                /*
                 * approve_promotions
                 * change status to approve 
                 * @input 
                 * @output table approve and consider
                 * @author Kasama Donwong 62160074
                 * @Create Date 2564-09-26
                 * @Update -
                 */
                function approve_promotions(pro_id, pro_name, ent_email) {
                    $.ajax({
                        type: "POST",
                        data: {
                            pro_id: pro_id
                        },
                        url: '<?php echo base_url('Admin/Manage_promotions/Admin_approval_promotions/approval_promotions'); ?>',
                        success: function() {
                            //sweet alert
                            swal({
                                title: "อนุมัติสำเร็จ",
                                text: "อนุมัติโปรโมชันสำเร็จ กำลังจัดส่งอีเมล...",
                                type: "success",
                                showConfirmButton: false,
                                timer: 3000
                            }, function() {
                                window.location.href = '<?php echo base_url('Admin/Manage_promotions/Admin_approval_promotions/show_data_consider'); ?>'
                            })
                            var content = "ผู้ดูแลระบบได้ทำการอนุมัติโปรโมชัน " + pro_name + " ของคุณ";
                            var content_h1 = "คุณได้รับการอนุมัติโปรโมชัน " + pro_name;
                            var subject = "Approval";
                            send_mail_ajax(content, ent_email, subject, content_h1);
                        },
                        error: function() {
                            alert('ajax error working');
                        }
                    });
                }
            </script>