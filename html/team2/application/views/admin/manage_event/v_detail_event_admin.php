<!-- 
/*
* v_detail_event
* Display data detail event by admin
* @input arr_event, arr_image
* @output detail data event
* @author Kasama Donwong 62160074
* @Create Date 2564-09-25
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
        <li><a href="<?php echo site_url() . 'Admin/Manage_event/Admin_approval_event/show_data_consider'; ?>"
                style="color: green;">จัดการกิจกรรม</a></li>
        <li>ดูรายละเอียด</li>
    </ul>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"
                        style="background-color: #8fbacb; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2)">
                        <center>
                            <h2 class="card-title text-white" style="font-family: 'Prompt', sans-serif !important;">
                                <?php echo $arr_event[0]->eve_name; ?></h2>
                        </center>
                    </div>
                    <br>
                    <div class="card-body">
                        <div id="carousel_example_indicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators" style="bottom: 30px !important;">
                                <?php for ($i = 0; $i < count($arr_event); $i++) { ?>
                                <?php if ($i == 0) { ?>
                                <li data-target="#carousel_example_indicators" data-slide-to="<?php echo $i; ?>"
                                    class="active"></li>
                                <?php } ?>
                                <?php if ($i != 0) { ?>
                                <li data-target="#carousel_example_indicators" data-slide-to="<?php echo $i; ?>"></li>
                                <?php } ?>
                                <?php } ?>
                            </ol>
                            <div class="carousel-inner">
                                <hr width="100%" size="5" color="#cccccc">
                                <?php for ($i = 0; $i < count($arr_event); $i++) { ?>
                                <?php if ($i == 0) { ?>
                                <div class="carousel-item image-detail active">
                                    <img class="d-block w-100 image_banner"
                                        src="<?php echo base_url() . 'image_event/' . $arr_event[0]->eve_img_path; ?>">
                                </div>
                                <?php } ?>
                                <?php if ($i != 0) { ?>
                                <div class="carousel-item image-detail">
                                    <img class="d-block w-100 image_banner"
                                        src="<?php echo base_url() . 'image_event/' . $arr_event[0]->eve_img_path; ?>">
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

                        <div class="container">
                            <h3 style="font-family: 'Prompt', sans-serif;"><img
                                    src="<?php echo base_url() . 'assets/templete/picture/description.png' ?>"
                                    width="40px"> รายละเอียดกิจกรรม</h3>
                            <hr width="100%" size="10" color="#cccccc">
                            <p style="font-size: 18px; text-indent: 50px;"><?php echo $arr_event[0]->eve_description; ?>
                            </p>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-5">
                                    <h3><img src="<?php echo base_url() . 'assets/templete/picture/point.png' ?>"
                                            width="40px"> คะแนนกิจกรรม</h3>
                                    <hr width="100%" size="10" color="#cccccc">
                                    <p style="font-size: 18px; text-indent: 50px;">คะแนนที่จะได้รับหลังทำกิจกรรม:
                                        <?php echo $arr_event[0]->eve_point; ?> คะเเนน</p>
                                </div>
                                <div class="col-2"></div>
                                <div class="col-5">
                                    <h3><img src="<?php echo base_url() . 'assets/templete/picture/category.png' ?>"
                                            width="40px"> ประเภท</h3>
                                    <hr width="100%" size="10" color="#cccccc">
                                    <p style="font-size: 18px; text-indent: 50px;">
                                        <?php echo $arr_event[0]->eve_cat_name; ?></p>
                                </div>
                            </div>
                        </div><br><br>
                        <div class="container">
                            <div class="row">
                                <div class="col-5">
                                    <h3><img src="<?php echo base_url() . 'assets/templete/picture/promotion_icon.png' ?>"
                                            width="40px"> ระยะเวลากิจกรรม</h3>
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
                                    <p style="font-size: 18px; text-indent: 50px;">วันที่
                                        <?php echo full_date_convert($arr_event[0]->eve_start_date) ?> -
                                        <?php echo full_date_convert($arr_event[0]->eve_end_date) ?></p>
                                </div>
                            
                                <div class="col-2"></div>
                                <div class="col-5">
                                    <h3><img src="<?php echo base_url() . 'assets/templete/picture/carbon-dioxide.png' ?>"
                                            width="40px"> ลดคาร์บอนไดออกไซด์</h3>
                                    <hr width="100%" size="10" color="#cccccc">
                                    <p style="font-size: 18px; text-indent: 50px;">
                                        ลดคาร์บอนไดออกไซด์ <?php echo $arr_event[0]->eve_drop_carbon; ?> กิโลกรัม/ปี</p>
                                </div>
                            </div>    
                            </div><br><br>
                        <div class="container">
                            <h3><img src="<?php echo base_url() . 'assets/templete/picture/company_icon.png' ?>"
                                    width="40px"> <?php echo $arr_event[0]->com_name; ?></h3>
                            <hr width="100%" size="10" color="#cccccc">

                            <!-- เบอร์โทรศัพท์ -->
                            <h4><img src="<?php echo base_url() . 'assets/templete/picture/phone.png' ?>" width="28px">
                                เบอร์โทรศัพท์</h4>
                            <p style="font-size: 18px; text-indent: 50px;"><?php echo $arr_event[0]->com_tel; ?></p>

                            <!-- รายละเอียดที่อยู่กิจกรรม -->
                            <h4><img src="<?php echo base_url() . 'assets/templete/picture/information-point.png' ?>"
                                style="width:34px;"> รายละเอียดที่อยู่</h4>
                            <p style="font-size: 18px; text-indent:50px;"><?php echo  $arr_event[0]->eve_location." ตำบล.".$arr_event[0]->par_name_th." อำเภอ.".$arr_event[0]->dis_name_th." จังหวัด.".$arr_event[0]->prv_name_th." รหัสไปรษณีย์ ".$arr_event[0]->par_code ?></p>
                            <br>
                            <h4><img src="<?php echo base_url() . 'assets/templete/picture/location.png' ?>"
                                    width="40px"> ตำแหน่งกิจกรรม</h4>
                            <table class="table table-responsive">
                                <tr>
                                    <td style="border: 2px solid black;">
                                        <div id="Map" style="width: 900px; height: 400px;"></div>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <?php if ($arr_event[0]->eve_status == 1) { ?>
                        <div class="container">
                            <!-- Submit button -->
                            <form>
                                <input type="hidden" name="com_id" id="com_id"
                                    value="<?php echo $arr_event[0]->eve_id; ?>">
                                <div style="text-align: right;">
                                    <button type="button" class="btn btn-success" id="accept"
                                        onclick='confirm_approve("<?php echo $arr_event[0]->eve_id ?>" ,"<?php echo $arr_event[0]->eve_name ?>", "<?php echo $arr_event[0]->ent_email  ?>",  "<?php echo $arr_event[0]->eve_cat_id ?>", "<?php echo $arr_event[0]->eve_cat_name ?>",  "<?php echo $arr_event[0]->eve_min_score ?>", "<?php echo $arr_event[0]->eve_max_score ?>" )'
                                        data-dismiss="modal">อนุมัติ</button>
                                    <button type="button" class="btn btn-danger" id="reject"
                                        onclick='confirm_reject("<?php echo $arr_event[0]->eve_id ?>", "<?php echo $arr_event[0]->eve_name ?>", "<?php echo $arr_event[0]->ent_email  ?>")'
                                        data-dismiss="modal">ปฏิเสธ</button>
                                </div>
                            </form>
                        </div>
                        <?php } ?>
                        <!-- <?php var_dump($arr_event) ?> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- warnning aprove Modal  -->
<div class="modal" tabindex="-1" role="dialog" id="aprove_modal">
    <div class="modal-dialog" role="document" style="max-width: 600px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">คุณกำลังอนุมัติกิจกรรม<span id="eve_name_confirm"></span></h5>
            </div>
            <div class="modal-body">
                <p>เพิ่มคะแนนให้กับ <span id="eve_point_name_confirm"></span> ?</p>
                <p style="font-size: 16px;">กิจกรรมนี้อยู่ในประเภท : <span id="eve_cat_name"></span></p>
                <p style="font-size: 16px;">แต้มที่ใช้ : <span id="eve_score"></span></p>
                <input type="number" id="eve_point" name="eve_point" placeholder="กรุณาระบุคะแนน">
                <input type="hidden" id="eve_id_form" name="eve_id">
                <input type="hidden" id="eve_cat_id" name="eve_cat_id">
                <input type="hidden" id="eve_cat_name" name="eve_cat_name">
                <input type="hidden" id="eve_id_name_form" name="eve_name"><br>
                <p id="err_message_point" style="color: red;font-size: 16px"></p>
                <p id="help_information" class="text-success" style="cursor: pointer;"><u>ช่วยเหลือ</u></p>
                <div style="display: none;" id="infor_eve_cat">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="approves">ยืนยัน</button>
                <button class="btn btn-secondary" style="color: white; background-color: #777777;"
                    data-dismiss="modal">ยกเลิก</button>
            </div>
        </div>
    </div>
</div>

<!-- warnning reject  -->
<div class="modal" tabindex="-1" role="dialog" id="rejected_eve">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">แจ้งเตือน</h5>
            </div>
            <div class="modal-body">
                <p class="modal-title">คุณต้องการที่จะปฏิเสธ <span id="eve_reject_name_confirm"></span> ?</p>
                <p>กรุณาระบุเหตุผล</p>
                <form method="POST"
                    action="<?php echo base_url() . 'Admin/Manage_event/Admin_approval_event/reject_event'; ?>"
                    id="reject_form">
                    <input type="hidden" id="email" name="email">
                    <input type="hidden" id="eve_id_form" name="eve_id">
                    <input type="hidden" id="evr_eve_id" name="eve_id">
                    <textarea class="form-control" style="min-width: 100%" id="admin_reason" name="admin_reason"
                        placeholder="กรุณาระบุเหตุผลในการปฏิเสธ..."></textarea>
                    <span id="err_message" style="display: none; color: red;">กรุณาระบุเหตุผลในการปฏิเสธไม่ต่ำกว่า 6
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
'<?= $arr_event[0]->com_lat ?>'; //มีการส่งค่าตัวแปร $com_lat php ที่มีการเก็บค่า field lati จากฐานข้อมูลมาเก็บไว้ในตัวแปร lat ของ javascript
var long =
'<?= $arr_event[0]->com_lon ?>'; //มีการส่งค่าตัวแปร $com_lon php ที่มีการเก็บค่า field longti จากฐานข้อมูลมาเก็บไว้ในตัวแปร long ของ javascript
var zoom = 16; //มีการกำหนดค่าตัวแปร zoom ให้เป็น 14 , เพื่อทำการขยายภาพตอนเริ่มต้นแสดงแผนที่

var from_projection = new OpenLayers.Projection("EPSG:4326"); // Transform from WGS 1984
var to_projection = new OpenLayers.Projection("EPSG:900913"); // to Spherical Mercator Projection
var position = new OpenLayers.LonLat(long, lat).transform(from_projection,
to_projection); //ทำการเก็บค่าตัวแปร lat,long ไว้ในตัวแปร position , เพื่อไว้แสดงค่าพิกัดบนแผนที่ OpenStreetMap ตอนเริ่มต้น


map = new OpenLayers.Map("Map"); //ใช้ Function OpenLayer.Map() ในการแสดงแผนที่

var map_link = new OpenLayers.Layer.OSM();
map.addLayer(map_link);

var markers = new OpenLayers.Layer.Markers(
"Markers"); //แสดงสัญลักษณ์ Marker ปักหมุดโดยใช้ Function Markers , แต่ต้องมีเรียกใช้งาน Openlayers.js ไม่งั้นจะไม่แสดงสัญลักษณ์ออกมา

map.addLayer(markers);
markers.addMarker(new OpenLayers.Marker(position));

map.setCenter(position, zoom);
/*
 * confirm_approve
 * open modal id = Aprovemodal 
 * @input 
 * @output modal to confirm approve modal
 * @author Weradet Nopsombun 62160110
 * @Create Date 2564-07-17
 * @Update 2564-09-18
 */
function confirm_approve(eve_id, eve_name, ent_email, eve_cat_id, eve_cat_name, min, max) {
         let form = document.querySelector('#aprove_modal');
         console.log(eve_cat_name);
         $('#eve_name_confirm').text(eve_name);
         $('#aprove_modal').modal({
             backdrop: 'static',
             keyboard: false
         });
         $('#eve_point_name_confirm').text(eve_name);
         $('#eve_score').text(min + '-' + max);
         $('#eve_cat_name').text(eve_cat_name);
         $('#eve_id_form').val(eve_id);
         $('#eve_cat_id').val(eve_cat_id);
         $('#eve_cat_name').val(eve_cat_name);
         $('#approves').click(function() {
             let point = document.getElementById('eve_point').value;
             console.log(check_point(point, min, max));
             if (check_point(point, min, max) == true) {
                 $('#err_message_point').html('กรุณาระบุคะแนนใหม่');
             } else {
                 let eve_point = $('#eve_point').val();
                 console.log(eve_point)
                 $('#aprove_modal').modal('toggle');
                 approve_event(eve_id, eve_name, ent_email, eve_point) //function 
             }
         });
     }
/*
 * check_point
 * check point inevent
 * @input point
 * @output err_message
 * @author Nantasiri Saiwaew 62160093
 * @Create Date 2564-10-11
 * @Update -
 */

function check_point(point, min, max) {
    // let arr_min_point = [1, 20, 30, 40];
    // let arr_max_point = [19, 29, 39, 49];

    console.log(min + max);
    // console.log(arr_min_point[eve_cat_id - 1]);
    // console.log(arr_max_point[eve_cat_id - 1]);
    if (point < 1) {
        return true;
    } else if (point < min || point > max) {
        return true;
    } else {
        return false;
    }
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
function confirm_reject(eve_id, eve_name, ent_email) {
    let form = document.querySelector('#reject_form');
    $('#eve_reject_name_confirm').text(eve_name);
    $('#rejected_eve').modal();
    $('#email').val(ent_email);
    $('#eve_id_form').val(eve_id);
    $('#evr_eve_id').val(eve_id);
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
            $('#rejected_eve').modal('toggle');
            err_message.style.display = 'none';
            swal({
                title: "ปฏิเสธสำเร็จ",
                text: "ปฏิเสธการเพิ่มกิจกรรมสำเร็จ กำลังจัดส่งอีเมล...",
                type: "success",
                showConfirmButton: false,
                timer: 3000,
            }, function() {
                window.location.href =
                    '<?php echo base_url('Admin/Manage_event/Admin_approval_event/show_data_consider'); ?>'
            });
        }
    });
}

/*
 * approve_event
 * change status to approve 
 * @input 
 * @output table approve and consider
 * @author Kasama Donwong 62160074
 * @Create Date 2564-09-26
 * @Update -
 */
function approve_event(eve_id, eve_name, ent_email, eve_point) {
    $.ajax({
        type: "POST",
        data: {
            eve_id: eve_id,
            eve_point: eve_point
        },
        url: '<?php echo base_url('Admin/Manage_event/Admin_approval_event/approval_event'); ?>',
        success: function() {
            //sweet alert
            swal({
                title: "อนุมัติสำเร็จ",
                text: "อนุมัติกิจกรรมการสำเร็จ กำลังจัดส่งอีเมล...",
                type: "success",
                showConfirmButton: false,
                timer: 3000
            }, function() {
                location.reload();
            })
            var content = "ผู้ดูแลระบบได้ทำการอนุมัติกิจกรรม " + eve_name + " ของคุณ";
            var content_h1 = "คุณได้รับการอนุมัติกิจกรรม " + eve_name;
            var subject = "Approval";
            send_mail_ajax(content, ent_email, subject, content_h1);
        },
        error: function() {
            alert('ajax error working');
        }
    });
}
</script>