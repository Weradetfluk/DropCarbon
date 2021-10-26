<div class="container py-5" style="margin-top: 5%;">
    <ul class="breadcrumb">
        <?php if ($this->session->userdata("tourist_id")) { ?>
        <li><a href="<?php echo base_url() . 'Tourist/Auth/Landing_page_tourist' ?>" style="color: green;">หน้าหลัก</a></li>
        <?php } ?>
        <?php if (!$this->session->userdata("tourist_id")) { ?>
        <li><a href="<?php echo base_url() ?>" style="color: green;">หน้าหลัก</a></li>
        <?php } ?>
        <li><a href="<?php echo site_url() . 'Landing_page/Landing_page/show_promotions_list' ?>" style="color: green;">รายการโปรโมชัน</a></li>
        <li class="colorchange"><?php echo $promotions[0]->pro_name ?></li>
    </ul>
    <div class="row text-left py-3">
        <div class="col-m-auto">
            <h1 class="h1" style="padding-bottom: 2%"><?php echo $promotions[0]->pro_name ?></h1>
        </div>
    </div>
    <!-- ชื่อกิจกรรม -->
    <div class="row">
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v12.0&appId=1199702907173830&autoLogAppEvents=1" nonce="YLQSWYS9"></script>
        <div class="fb-share-button" data-href="https://www.informatics.buu.ac.th/team2/" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.informatics.buu.ac.th%2Fteam2%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">แชร์</a></div>
    </div>
    <br>
    <!-- แชร์ -->
    <div class="row">
        <div class="col-12">
            <div class="container">
                <?php if (count($promotions) == 1) { ?>
                <img src="<?php echo base_url() . 'image_promotions/' . $promotions[0]->pro_img_path; ?>" style="object-fit: cover; width: 500px; height: 300px;" id="img_01">
                <?php } elseif (count($promotions) == 2) { ?>
                <div class="row">
                    <div class="col">
                        <img src="<?php echo base_url() . 'image_promotions/' . $promotions[0]->pro_img_path; ?>" style="object-fit: cover;  height: 300px;" id="img_01">
                    </div>
                    <div class="col">
                        <img src="<?php echo base_url() . 'image_promotions/' . $promotions[1]->pro_img_path; ?>" style="object-fit: cover; height: 300px;" id="img_02">
                    </div>
                </div>
                <?php } else { ?>
                <div class="responsive">
                    <?php for ($i = 0; $i < count($promotions); $i++) { ?>
                    <div class="">
                        <img src="<?php echo base_url() . 'image_promotions/' . $promotions[$i]->pro_img_path; ?>" style="object-fit: cover; width: 100%; height: 300px;" id=" <?php 'img' . $i  ?> ">
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
    if ($start_year == date("Y")) {
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
    if ($end_year == date("Y")) {
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
    <div class="row" style="padding-top: 5%;">
        <div class="col">
            <h3 style="font-family: 'Prompt', sans-serif;"><img src="<?php echo base_url() . 'assets/templete/picture/description.png' ?>" width="40px"> รายละเอียดโปรโมชัน</h3>
            <hr width="100%" size="10" color="#cccccc">
            <div class="col" style="padding-left: 2%">
                <div class="container">
                    <div style="padding-left: 2%;padding-top: 2%;padding-bottom: 2%">
                        <p style="text-indent: 50px;"><?php echo $promotions[0]->pro_description ?>
                        </p>
                        <p style="text-indent: 50px;"><?php echo "เริ่มตั้งแต่วันที่ " . $start_day . " " . $convert_start_month . " " . $start_year . " - " . $end_day . " " . $convert_end_month . " " . $end_year ?>
                            <!-- <br><?php echo "Today is " . date("Y") . "<br>"; ?> -->
                        </p>
                    </div>
                </div>
            </div>
            <!-- รายละเอียด -->
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-5">
                <h3><img src="<?php echo base_url() . 'assets/templete/picture/category.png' ?>" width="40px"> ประเภท</h3>
                <hr width="100%" size="10" color="#cccccc">
                <p style="font-size: 18px; text-indent: 50px;">โปรโมชันนี้จัดอยู่ในประเภท: <?php echo $promotions[0]->pro_cat_name; ?></p>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
    <div class="row" style="padding-top: 5%;">
        <div class="col">
            <h4><img src="<?php echo base_url() . 'assets/templete/picture/location.png' ?>" width="40px"> ตำแหน่งสถานที่</h4>
            <div class="card" style="padding-left: 2%; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">

                <h3 style="padding-top: 2%; "><img src="<?php echo base_url() . 'assets/templete/picture/company_icon.png' ?>" width="40px"> <?php echo $promotions[0]->com_name ?></h3>
                <!-- ชื่อสถานที่ -->
                <hr>
                <div class="row">
                    <div class="col">
                        <h4>ที่อยู่</h4>
                        <hr>
                        <div class="row" style="padding-left: 2%; padding-bottom: 5%;">
                            <span class="material-icons">
                                location_on
                            </span> <?php echo $promotions[0]->com_location ?>
                        </div>
                        <div class="row">
                            <div class="col">

                                <span class="material-icons">contact_phone</span>
                                <?php echo $promotions[0]->com_tel ?>
                            </div>
                        </div>
                    </div>
                    <div class="col" style="padding-right: 2%; padding-bottom: 1%;">
                        <div class="table-responsive">
                            <table class="table ">
                                <tr>
                                    <td style="border: 2px solid black;">
                                        <div id="Map" style="width: 500px; height: 400px;"></div>
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
<script src="https://www.openlayers.org/api/OpenLayers.js"></script>

<script>
var lat = '<?= $promotions[0]->com_lat ?>'; //มีการส่งค่าตัวแปร $com_lat php ที่มีการเก็บค่า field lati จากฐานข้อมูลมาเก็บไว้ในตัวแปร lat ของ javascript
var long = '<?= $promotions[0]->com_lon ?>'; //มีการส่งค่าตัวแปร $com_lon php ที่มีการเก็บค่า field longti จากฐานข้อมูลมาเก็บไว้ในตัวแปร long ของ javascript
var zoom = 16; //มีการกำหนดค่าตัวแปร zoom ให้เป็น 14 , เพื่อทำการขยายภาพตอนเริ่มต้นแสดงแผนที่

var fromProjection = new OpenLayers.Projection("EPSG:4326"); // Transform from WGS 1984
var toProjection = new OpenLayers.Projection("EPSG:900913"); // to Spherical Mercator Projection
var position = new OpenLayers.LonLat(long, lat).transform(fromProjection, toProjection); //ทำการเก็บค่าตัวแปร lat,long ไว้ในตัวแปร position , เพื่อไว้แสดงค่าพิกัดบนแผนที่ OpenStreetMap ตอนเริ่มต้น


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