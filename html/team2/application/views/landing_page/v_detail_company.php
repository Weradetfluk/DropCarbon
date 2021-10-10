<div class="container py-5 section-com">
    <ul class="breadcrumb">
        <?php if ($this->session->userdata("tourist_id")) { ?>
        <li><a href="<?php echo base_url() . 'Tourist/Auth/Landing_page_tourist' ?>" style="color: green;">หน้าหลัก</a>
        </li>
        <?php } ?>
        <?php if (!$this->session->userdata("tourist_id")) { ?>
        <li><a href="<?php echo base_url() ?>" style="color: green;">หน้าหลัก</a></li>
        <?php } ?>
        <li><a href="<?php echo site_url() . 'Landing_page/Landing_page/show_company_list' ?>"
                style="color: green;">รายการสถานที่</a></li>
        <li class="colorchange"><?php echo $company->com_name ?></li>
    </ul>
    <div class="row text-left py-3">
        <div class="col-m-auto">
            <h1 class="h1" style="padding-bottom: 2%"><?php echo $company->com_name ?></h1>
        </div>
    </div>
    <!-- ชื่อกิจกรรม -->
    <div class="row">
        <div class="fb-share-button" data-href="" data-layout="button" data-size="large">
            <a target="_blank" href="" class="fb-xfbml-parse-ignore">แชร์</a>
        </div>
    </div>
    <br>
    <!-- แชร์ -->
    <div class="row">
        <div class="col-12">
            <div class="container">
                <?php if (count($image) == 1) { ?>
                <img src="<?php echo base_url() . 'image_company/' . $image[0]->com_img_path; ?>"
                    style="object-fit: cover; width: 500px; height: 300px;" id="img_01">
                <?php } elseif (count($image) == 2) { ?>
                <div class="row">
                    <div class="col">
                        <img src="<?php echo base_url() . 'image_company/' . $image[0]->com_img_path; ?>"
                            style="object-fit: cover;  height: 300px;" id="img_01">
                    </div>
                    <div class="col">
                        <img src="<?php echo base_url() . 'image_company/' . $image[1]->com_img_path; ?>"
                            style="object-fit: cover; height: 300px;" id="img_02">
                    </div>
                </div>
                <?php } else { ?>
                <div class="responsive">
                    <?php for ($i = 0; $i < count($image); $i++) { ?>
                    <div class="">
                        <img src="<?php echo base_url() . 'image_company/' . $image[$i]->com_img_path; ?>"
                            style="object-fit: cover; width: 100%; height: 300px;" id=" <?php 'img' . $i  ?> ">
                    </div>
                    <?php } ?>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="row" style="padding-top: 5%;">
        <div class="col">
            <h3><span class="material-icons" style="font-size: 30px;">description</span> รายละเอียด</h3>
            <hr width="100%" size="10" color="#cccccc">
            <div class="col" style="padding-left: 2%">
                <div class="container">
                    <div style="padding-left: 2%;padding-top: 2%;padding-bottom: 2%">
                        <p style="text-indent: 50px;"><?php echo $company->com_description ?>
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
                <h3><span class="material-icons" style="font-size: 30px;">category</span> ประเภท</h3>
                <hr width="100%" size="10" color="#cccccc">
                <p style="font-size: 18px; text-indent: 50px;">กิจกรรมนี้จัดอยู่ในประเภท:
                    <?php echo $company->com_cat_name; ?></p>
            </div>
            <div class="col-2"></div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-4">
                <h3>กิจกรรมของ <?php echo $company->com_name ?> </h3>
                <hr width="100%" size="10" color="#cccccc">
            </div>
        </div>

        <div class="row">
            <?php for ($i = 0; $i < count($event); $i++) { ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                <a
                    href="<?php echo base_url() . 'Landing_page/Landing_page/show_event_detail/' . $event[$i]->eve_id; ?>">
                    <div class="card" id="card" style="max-height: 30rem;">
                        <img src="<?php echo base_url() . 'image_event/' . $event[$i]->eve_img_path; ?>"
                            class="card-img-top" style="max-height: 300px;" alt="...">
                        <!-- รูปที่ 1 -->
                        <div class="card-body" align="center">
                            <h3 class="text-decoration-none text-dark"><?php echo $event[$i]->eve_name ?></h3>
                            <p class="card-tex text-dark">
                                <?php echo iconv_substr($event[$i]->eve_description, 0, 60, "UTF-8") . "..."; ?>
                            </p>
                        </div>
                        <!-- ชื่อของรูปที่ 1 -->
                    </div>
                </a>
            </div>
            <!-- กิจกรรมที่ 1 -->
            <?php } ?>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-4">
                <h3>โปรโมชันของ <?php echo $company->com_name ?> </h3>
                <hr width="100%" size="10" color="#cccccc">
            </div>
        </div>

        <div class="row">
            <?php for ($i = 0; $i < count($promotions); $i++) { ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                <a
                    href="<?php echo base_url() . 'Landing_page/Landing_page/show_promotions_detail/' . $promotions[$i]->pro_id; ?>">
                    <div class="card" id="card" style="max-height: 30rem;">
                        <img src="<?php echo base_url() . 'image_promotions/' . $promotions[$i]->pro_img_path; ?>"
                            class="card-img-top" style="max-height: 300px;" alt="...">
                        <!-- รูปที่ 1 -->
                        <div class="card-body" align="center">
                            <h3 class="text-decoration-none text-dark"><?php echo $promotions[$i]->pro_name ?></h3>
                            <p class="card-tex text-dark">
                                <?php echo iconv_substr($promotions[$i]->pro_description, 0, 60, "UTF-8") . "..."; ?>
                            </p>
                            <button class="btn btn-success" style="margin: 0px 30px;">แลก</button>
                        </div>
                        <!-- ชื่อของรูปที่ 1 -->
                    </div>
                </a>
            </div>
            <!-- กิจกรรมที่ 1 -->
            <?php } ?>
        </div>
    </div>

    <div class="row" style="padding-top: 5%;">
        <div class="col">
            <h3>ตำแหน่งสถานที่</h3>
            <div class="card" style="padding-left: 2%; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                <h3 style="padding-top: 2%; "> <?php echo $company->com_name ?></h3>
                <!-- ชื่อสถานที่ -->
                <hr>
                <div class="row">
                    <div class="col">
                        <h4>ที่อยู่</h4>
                        <hr>
                        <div class="row" style="padding-left: 2%; padding-bottom: 5%;">
                            <span class="material-icons">
                                location_on
                            </span> <?php echo $company->com_location ?>
                        </div>
                        <div class="row">
                            <div class="col">

                                <span class="material-icons">contact_phone</span>
                                <?php echo $company->com_tel ?>
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
var lat =
    '<?= $company->com_lat ?>'; //มีการส่งค่าตัวแปร $com_lat php ที่มีการเก็บค่า field lati จากฐานข้อมูลมาเก็บไว้ในตัวแปร lat ของ javascript
var long =
    '<?= $company->com_lon ?>'; //มีการส่งค่าตัวแปร $com_lon php ที่มีการเก็บค่า field longti จากฐานข้อมูลมาเก็บไว้ในตัวแปร long ของ javascript
var zoom = 16; //มีการกำหนดค่าตัวแปร zoom ให้เป็น 14 , เพื่อทำการขยายภาพตอนเริ่มต้นแสดงแผนที่

var fromProjection = new OpenLayers.Projection("EPSG:4326"); // Transform from WGS 1984
var toProjection = new OpenLayers.Projection("EPSG:900913"); // to Spherical Mercator Projection
var position = new OpenLayers.LonLat(long, lat).transform(fromProjection,
    toProjection
    ); //ทำการเก็บค่าตัวแปร lat,long ไว้ในตัวแปร position , เพื่อไว้แสดงค่าพิกัดบนแผนที่ OpenStreetMap ตอนเริ่มต้น


map = new OpenLayers.Map("Map"); //ใช้ Function OpenLayer.Map() ในการแสดงแผนที่

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
</script>
<script>
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s);
    js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>