<!-- 
/*
* v_detail_promotions
* Display detail promotions
* @input - 
* @output detail promotion
* @author Chutipon Thermsirisuksin 62160081
* @Create Date 2564-09-14
*/ 
-->

<style>
#more_text {
    display: none;
}

.read-more-style {
    position: relative;
    top: -60px;
    cursor: pointer;
    width: 100%;
    height: 50px;
    color: inherit;
    background-color: transparent;
    border-radius: 10px;
    background-image: linear-gradient(to bottom, rgba(255, 0, 0, 0), rgba(0, 0, 0, 10%));
    text-align: center;
    padding-top: 15px;

}

/* .modal {
    position: absolute;
    float: left;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
} */

.read-more-style:hover {
    background-image: linear-gradient(to bottom, rgba(255, 0, 0, 0), rgba(0, 0, 0, 20%));
    font-weight: bold;
}

.card-img-wrapper {
    display: block;
    width: 100%;
    height: 250px;
}
</style>
<div class="container py-5">
    <ul class="breadcrumb">
        <li><a href="<?php echo base_url() ?>" style="color: green;">หน้าหลัก</a></li>
        <li><a href="<?php echo site_url() . 'Landing_page/Landing_page/show_promotions_list' ?>"
                style="color: green;">รายการโปรโมชันและรางวัล</a></li>
        <li class="colorchange"><?php echo $promotions[0]->pro_name ?></li>
    </ul>
    <div class="row text-left py-3">
        <div class="col-m-auto">
            <h1 class="h1" style="padding-bottom: 2%"><?php echo $promotions[0]->pro_name ?></h1>
        </div>
    </div>
    <!-- ชื่อกิจกรรม -->
    <div class="row">
        <?php $share_link_promotion = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        // echo $share_link_promotion; 
        //https://www.informatics.buu.ac.th/team2/
        ?>
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous"
            src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v12.0&appId=1199702907173830&autoLogAppEvents=1"
            nonce="YLQSWYS9">

        </script>
        <div class="fb-share-button" data-href=" <?php $share_link_promotion ?> " data-layout="button"
            data-size="small"><a target="_blank"
                href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.informatics.buu.ac.th%2Fteam2%2F&amp;src=sdkpreparse"
                class="fb-xfbml-parse-ignore">แชร์</a></div>
    </div>
    <!-- แชร์ -->
    <br>
    <div class="row">
        <div class="col-12">
            <div class="container">
                <?php if (count($promotions) == 1) { ?>
                <img src="<?php echo base_url() . 'image_promotions/' . $promotions[0]->pro_img_path; ?>"
                    style="object-fit: cover; width: 500px; height: 300px;" id="img_01">
                <?php } elseif (count($promotions) == 2) { ?>
                <div class="row">
                    <div class="col">
                        <img src="<?php echo base_url() . 'image_promotions/' . $promotions[0]->pro_img_path; ?>"
                            style="object-fit: cover;  height: 300px;" id="img_01">
                    </div>
                    <div class="col">
                        <img src="<?php echo base_url() . 'image_promotions/' . $promotions[1]->pro_img_path; ?>"
                            style="object-fit: cover; height: 300px;" id="img_02">
                    </div>
                </div>
                <?php } else { ?>
                <div class="responsive">
                    <?php for ($i = 0; $i < count($promotions); $i++) { ?>
                    <div class="">
                        <img src="<?php echo base_url() . 'image_promotions/' . $promotions[$i]->pro_img_path; ?>"
                            style="object-fit: cover; width: 100%; height: 300px;" id=" <?php 'img' . $i  ?> ">
                    </div>
                    <?php } ?>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php
    $start_date = date_create($promotions[0]->pro_start_date);
    $month_en = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
    $month_th = array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤษจิกายน", "ธันวาคม");
    $convert_start_month = "";
    $start_day = date("d", strtotime($promotions[0]->pro_start_date));
    $start_month = date("F", strtotime($promotions[0]->pro_start_date));
    $start_year = date("Y", strtotime($promotions[0]->pro_start_date));
    if ($start_year == date("Y") || $start_year > date("Y")) {
        $start_year = (int)$start_year + 543;
    }

    // echo $day . " " . $month . " " . $year;
    if ($start_day[0] == 0) {
        $start_day = $start_day[1];
    }
    for ($i = 0; $i < count($month_en); $i++) {
        if ($start_month == $month_en[$i]) {
            $convert_start_month = $month_th[$i];
        }
    }
    // echo $convert_month;

    $end_date = date_create($promotions[0]->pro_end_date);
    $convert_end_month = "";
    $end_day = date("d", strtotime($promotions[0]->pro_end_date));
    $end_month = date("F", strtotime($promotions[0]->pro_end_date));
    $end_year = date("Y", strtotime($promotions[0]->pro_end_date));
    if ($end_year == date("Y") || $end_year > date("Y")) {
        $end_year = (int)$end_year + 543;
    }
    // echo $day . " " . $month . " " . $year;
    if ($end_day[0] == 0) {
        $end_day = $end_day[1];
    }
    for ($i = 0; $i < count($month_en); $i++) {
        if ($end_month == $month_en[$i]) {
            $convert_end_month = $month_th[$i];
        }
    }
    ?>

    <div class="row py-3">
        <div class="col">
            <h3>
                <!-- <span class="material-icons" style="font-size: 30px;">description</span>  -->
                <img src="<?php echo base_url() . 'assets/templete/picture/description.png' ?>"
                    style="width:40px;margin-top:-5px;">
                รายละเอียด
            </h3>
            <hr width="100%" size="10" color="#cccccc">
            <div style="padding-top: 2%;padding-bottom: 3%">
                <?php
                $get_string = $promotions[0]->pro_description;
                $get_length = strlen($get_string);
                $max_length = 4000;
                $sub_string_first = $get_string;
                $sub_string_last = "";
                $readMore = "";
                if ($get_length > $max_length) {
                    $sub_string_first = substr($get_string, 0, strrpos($get_string, ' ', $max_length - $get_length)) . " <span id='more_dot'> ... </span>";
                    $sub_string_last = substr($get_string, strrpos($get_string, ' ', $max_length - $get_length));
                }
                ?>
                <p style="text-indent: 50px;text-align: justify;text-justify: inter-word;">
                    <?php echo $sub_string_first ?><span id="more_text"><?php echo $sub_string_last ?></span>
                </p>
                <p><?php echo "เริ่มตั้งแต่วันที่ " . $start_day . " " . $convert_start_month . " " . $start_year . " - " . $end_day . " " . $convert_end_month . " " . $end_year ?>
            </div>

            <?php if ($get_length > $max_length) { ?>
            <div onclick="read_more()" class="read-more-style" id="btn_read_more">อ่านต่อ>> </div>
            <div onclick="read_more()" class="read-more-style" id="btn_hide_more" style="display: none;">ซ่อน << </div>
                    <?php } ?>
                    <!-- รายละเอียด -->
            </div>
        </div>


        <!-- ประเภท -->
        <div class="row py-3">
            <div class="col">
                <h3>
                    <!-- <span class="material-icons" style="font-size: 30px;">category</span>  -->
                    <img src="<?php echo base_url() . 'assets/templete/picture/category.png' ?>"
                        style="width:40px;margin-top:-5px;">
                    ประเภท
                </h3>
                <hr width="100%" size="10" color="#cccccc">
                <p style="font-size: 18px; text-indent: 50px;">
                    <?php echo $promotions[0]->pro_cat_name; ?></p>
            </div>
            <div class="col">
                <h3><?php if ($promotions[0]->pro_cat_id == 2) {  ?>
                    <img src="<?php echo base_url() . 'assets/templete/picture/exchange_point.png' ?>"
                        style="width:45px; margin-top:-5px;"> คะแนน
                </h3>
                <hr width="100%" size="10" color="#cccccc">

                <p style="margin-left:-45px;font-size: 18px; text-indent: 50px;">
                    คะเเนนที่ใช้แลก <?php echo $promotions[0]->pro_point ?> คะแนน </p>
                <?php } ?>
            </div>
        </div>

        <div class="row py-3">
            <div class="col">
                <h3>
                    <?php if ($this->session->has_userdata("tus_score")) {
                        $tus_score = $this->session->userdata("tus_score"); ?>
                    <?php
                        if ($tus_score >= $promotions[0]->pro_point && $promotions[0]->pro_cat_id == 2) { ?>
                    <button class="btn btn-custom"
                        onclick="confirm_exchange_reward(<?php echo $promotions[0]->pro_id ?>, <?php echo $promotions[0]->pro_point ?> ,<?php echo $tus_score ?>, '<?php echo $promotions[0]->pro_name ?>')">แลกของรางวัล</button>
                    <?php } ?>
                </h3>
                <h3>
                    <?php
                        if ($tus_score < $promotions[0]->pro_point) { ?>
                    <button type="submit" class="btn btn-danger">ไม่สามารถแลกของรางวัล</button>
                    <?php } ?>
                    <?php } ?>
                </h3>
            </div>
        </div>

        <div class="row py-3">
            <div class="col">
                <h3>
                    <!-- <span class="material-icons" style="font-size: 30px;">place</span> -->
                    <img src="<?php echo base_url() . 'assets/templete/picture/location.png' ?>"
                        style="width:40px;margin-top:-5px;">
                    ตำแหน่งสถานที่
                </h3>
                <div class="card" style="padding-left: 2%; transform: unset;">
                    <h2 style="padding-top: 2%; ">

                        <?php echo $promotions[0]->com_name ?>
                    </h2>
                    <!-- ชื่อสถานที่ -->
                    <hr>
                    <div class="row">

                        <div class="col">
                            <!-- เบอร์โทรศัพท์ -->
                            <h4><img src="<?php echo base_url() . 'assets/templete/picture/phone.png' ?>" width="28px">
                                เบอร์โทรศัพท์</h4>
                            <p style="font-size: 18px; text-indent: 50px;"><?php echo $promotions[0]->com_tel; ?></p>

                            <!-- รายละเอียดที่อยู่กิจกรรม -->
                            <h4><img src="<?php echo base_url() . 'assets/templete/picture/information-point.png' ?>"
                                    style="width:34px;"> รายละเอียดที่อยู่</h4>
                            <p style="font-size: 18px; text-indent:50px;">
                                <?php echo  $promotions[0]->com_location . " จังหวัด." . $promotions[0]->prv_name_th . " อำเภอ." . $promotions[0]->dis_name_th . " ตำบล." . $promotions[0]->par_name_th . " รหัสไปรษณีย์ " . $promotions[0]->par_code ?>
                            </p>
                            <br>
                        </div>

                        <div class="col" style="padding-right: 2%; padding-bottom: 1%;">
                            <div class="table-responsive">
                                <table class="table ">
                                    <tr>
                                        <td style="border: 2px solid black;">
                                            <div id="map" style="width: 700px; height: 300px;"></div>
                                        </td>
                                    </tr>
                                </table>

                            </div>
                        </div>
                    </div>
                    <!-- ข้อมูลของสถานที่ -->

                </div>
                <!-- ตำแหน่ง -->

            </div>

        </div>
    </div>
    <!-- modal exchange promotion  -->
    <div class="modal" tabindex="-1" role="dialog" id="reward_modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="font-family: 'Prompt', sans-serif !important;">แจ้งเตือน</h5>
                </div>
                <div class="modal-body">
                    <p>คุณต้องการแลกของรางวัลนี้หรือไม่ <span id="confirm"></span> ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-custom" id="get_reward" data-dismiss="modal">ยืนยัน</button>
                    <button type="button" class="btn btn-default" style="color: white; background-color: #777777;"
                        data-dismiss="modal">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>

    <script>

    /* read_more
     * read more text if text over 7 line
     * @input -
     * @output -
     * @author Chutipon Thermsirisuksin
     * @Create Date 2565-03-05
     * @Update -
     */   
    function read_more() {
        $("#more_dot").toggle();
        $("#more_text").toggle(200);
        $("#btn_read_more").toggle();
        $("#btn_hide_more").toggle();
    }

    var lat =
    '<?= $promotions[0]->com_lat ?>'; //มีการส่งค่าตัวแปร $com_lat php ที่มีการเก็บค่า field lati จากฐานข้อมูลมาเก็บไว้ในตัวแปร lat ของ javascript
    var long =
    '<?= $promotions[0]->com_lon ?>'; //มีการส่งค่าตัวแปร $com_lon php ที่มีการเก็บค่า field longti จากฐานข้อมูลมาเก็บไว้ในตัวแปร long ของ javascript
    var zoom = 16; //มีการกำหนดค่าตัวแปร zoom ให้เป็น 14 , เพื่อทำการขยายภาพตอนเริ่มต้นแสดงแผนที่

    var fromProjection = new OpenLayers.Projection("EPSG:4326"); // Transform from WGS 1984
    var toProjection = new OpenLayers.Projection("EPSG:900913"); // to Spherical Mercator Projection
    var position = new OpenLayers.LonLat(long, lat).transform(fromProjection,
        toProjection
        ); //ทำการเก็บค่าตัวแปร lat,long ไว้ในตัวแปร position , เพื่อไว้แสดงค่าพิกัดบนแผนที่ OpenStreetMap ตอนเริ่มต้น


    map = new OpenLayers.Map("map"); //ใช้ Function OpenLayer.Map() ในการแสดงแผนที่

    var mapnik = new OpenLayers.Layer.OSM();
    map.addLayer(mapnik);

    var markers = new OpenLayers.Layer.Markers(
        "Markers"
        ); //แสดงสัญลักษณ์ Marker ปักหมุดโดยใช้ Function Markers , แต่ต้องมีเรียกใช้งาน Openlayers.js ไม่งั้นจะไม่แสดงสัญลักษณ์ออกมา

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

    /* exchange_reward
     * exchange reward
     * @input pro_id,pro_point,tus_score
     * @output -
     * @author Thanisorn Thumsawanit 62160088
     * @Create Date 2564-12-25
     * @Update -
     */
    function exchange_reward(pro_id, pro_point, tus_score) {
        $.ajax({
            type: "POST",
            data: {
                pro_id: pro_id,
                pro_point: pro_point,
                tus_score: tus_score
            },
            url: '<?php echo site_url('Landing_page/Landing_page/exchange_reward_ajax') ?>',
            success: function(data) {
                if (data == 1) {
                    get_point_and_show();
                    window.location.href =
                        "<?php echo site_url('Tourist/Manage_tourist/Tourist_manage/show_information_tourist') ?>"
                } else {
                    swal({
                        title: "แลกของรางวัล",
                        text: "แต้มของคุณมีไม่พอ",
                        type: "error"
                    })
                }
            },
            error: function() {
                alert('ajax error working');
            }
        });
    }

    /* confirm_exchange_reward
     * confirm exchange reward
     * @input pro_id,pro_point,tus_score, pro_name
     * @output modal confirm_exchange_reward
     * @author Thanisorn Thumsawanit 62160088
     * @Create Date 2564-12-25
     * @Update -
     */
    function confirm_exchange_reward(pro_id, pro_point, tus_score, pro_name) {
        console.log(tus_score);
        $('#confirm').text(pro_name);
        $('#reward_modal').modal();
        $('#get_reward').click(function() {
            exchange_reward(pro_id, pro_point, tus_score)
        });
    }
    </script>