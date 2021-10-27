<style>
.card-custom {
    border-radius: 20px;
}

.card-img-top {
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
}
</style>

<style>
.i {
    position: relative;
    display: block;
    width: 1410px;
    height: 500px;
    overflow: hidden;
    border-radius: 5px;
}

.i:before,
.i:after {
    content: '←';
    position: absolute;
    top: 50%;
    left: 1rem;
    z-index: 2;
    width: 2rem;
    height: 2rem;
    background: dodgerblue;
    color: white;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    pointer-events: none;
}

.i:after {
    content: '→';
    left: auto;
    right: 1rem;
}

/* I haven't found a way for IE and Edge to let me style inputs that way */
input {
    appearance: none;
    -ms-appearance: none;
    -webkit-appearance: none;
    display: block;
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    border-radius: 5px;
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    transform: translateX(100%);
    transition: transform ease-in-out 400ms;
    z-index: 1;
}

input:focus {
    outline: none;
}

input:after {
    content: attr(title);
    position: absolute;
    top: 1rem;
    left: 1rem;
    background-color: rgba(0, 0, 0, 0.4);
    color: white;
    padding: .5rem;
    font-size: 1rem;
    border-radius: 5px;
}

input:not(checked):before {
    content: '';
    position: absolute;
    width: 2rem;
    height: 2rem;
    border-radius: 50%;
    top: 50%;
    left: calc(-100% + 1rem);
}

input:checked:before {
    display: none;
    left: 1rem;
}

input:checked {
    transform: translateX(0);
    z-index: 0;
    box-shadow: -5px 10px 20px -15px rgba(0, 0, 0, 1);
}

input:checked+input:before {
    left: -3rem;
}

input:checked+input~input:before {
    display: none;
}

@media all and (min-width: 340px) {
    .i {
        width: 300px;
    }
}

@media all and (min-width: 370px) {
    .i {
        width: 330px;
    }
}

@media all and (min-width: 500px) {
    .i {
        width: 468px;
    }
}

@media all and (min-width: 768px) {
    .i {
        width: 700px;
    }
}

@media all and (min-width: 1000px) {
    .i {
        width: 930px;
    }
}

@media all and (min-width: 1200px) {
    .i {
        width: 1170px;
    }
}

@media all and (min-width: 1200px) {
    .i {
        width: 1170px;
    }
}

@media all and (min-width: 1400px) {
    .i {
        width: 1410px;
    }
}

@media all and (min-width: 1920px) {
    .i {
        width: 1410px;
    }
}
</style>


<style>
#moreText {
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

.read-more-style:hover {
    background-image: linear-gradient(to bottom, rgba(255, 0, 0, 0), rgba(0, 0, 0, 20%));
    font-weight: bold;
}
</style>

<script>
function readMore() {
    $("#moreDot").hide();
    $("#moreText").show(200);
    $("#btnReadMore").hide();
}
</script>

<div class="container py-5">
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
    <div class="row py-3">
        <div class="col">
            <h1 class="h1"><?php echo $company->com_name ?></h1>
        </div>
    </div>
    <!-- ชื่อกิจกรรม -->
    <div class="row">
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous"
            src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v12.0&appId=1199702907173830&autoLogAppEvents=1"
            nonce="YLQSWYS9"></script>
        <div class="fb-share-button" data-href="https://www.informatics.buu.ac.th/team2/" data-layout="button"
            data-size="small"><a target="_blank"
                href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.informatics.buu.ac.th%2Fteam2%2F&amp;src=sdkpreparse"
                class="fb-xfbml-parse-ignore">แชร์</a></div>
    </div>
    <br>
    <!-- แชร์ -->

    <i class="i">
        <?php for ($i = 0; $i < count($image); $i++) { ?>
        <?php if ($i == 0) { ?>
        <input checked type="radio" name="s"
            style="background-image: url('<?php echo base_url() . 'image_company/' . $image[$i]->com_img_path; ?>');"
            title="รูปที่ <?php echo $i + 1 ?>">
        <?php } else { ?>
        <input type="radio" name="s"
            style="background-image: url('<?php echo base_url() . 'image_company/' . $image[$i]->com_img_path; ?>');"
            title="รูปที่ <?php echo $i + 1 ?>">
        <?php } ?>
        <?php } ?>
    </i>
    <!-- banner img -->

    <div class="row py-3">
        <div class="col">
            <h3>
                <!-- <span class="material-icons" style="font-size: 30px;">description</span>  -->
                <img src="<?php echo base_url() . 'assets/templete/picture/description.png' ?>"
                    style="width:30px;margin-top:-5px;">
                รายละเอียด
            </h3>
            <hr width="100%" size="10" color="#cccccc">
            <div style="padding-top: 2%;padding-bottom: 3%">
                <?php
                $getString = $company->com_description . $company->com_description . $company->com_description . $company->com_description . $company->com_description;
                $getLength = strlen($getString);
                $maxLength = 3000;
                $subStringFirst = $getString;
                $subStringLast = "";
                $readMore = "";
                if ($getLength > $maxLength) {
                    $readMore = '<div onclick="readMore()" class="read-more-style" id="btnReadMore">Read more</div>';
                    $subStringFirst = substr($getString, 0, strrpos($getString, ' ', $maxLength - $getLength)) . " <span id='moreDot'> ... </span>";
                    $subStringLast = substr($getString, strrpos($getString, ' ', $maxLength - $getLength));
                }
                ?>
                <p style="text-indent: 50px;text-align: justify;text-justify: inter-word;">
                    <?php echo $subStringFirst ?><span id="moreText"><?php echo $subStringLast ?></span>
                </p>
            </div>

            <? //= $readMore 
            ?>
            <div onclick="readMore()" class="read-more-style" id="btnReadMore">อ่านต่อ>> </div>
            <!-- รายละเอียด -->
        </div>
    </div>

    <div class="row py-3">
        <div class="col">
            <h3>
                <!-- <span class="material-icons" style="font-size: 30px;">category</span>  -->
                <img src="<?php echo base_url() . 'assets/templete/picture/category.png' ?>"
                    style="width:30px;margin-top:-5px;">
                ประเภท
            </h3>
            <hr width="100%" size="10" color="#cccccc">
            <p style="font-size: 18px; text-indent: 50px;">กิจกรรมนี้จัดอยู่ในประเภท:
                <?php echo $company->com_cat_name; ?></p>
        </div>
    </div>

    <!-- กิจกรรมของสถานที่นี้ -->
    <div class="row py-3">
        <div class="col">
            <h3>
                <img src="<?php echo base_url() . 'assets/templete/picture/point.png' ?>"
                    style="width:30px;margin-top:-5px;">
                กิจกรรมของ <?php echo $company->com_name ?>
            </h3>
            <hr width="100%" size="10" color="#cccccc">
        </div>
    </div>

    <div class="row py-3">
        <?php for ($i = 0; $i < (count($event)); $i++) { ?>
        <div class="col-12 col-sm-6 col-md-3 col-lg-3">
            <a href="<?php echo base_url() . 'Landing_page/Landing_page/show_event_detail/' . $event[$i]->eve_id; ?>">
                <div class="card card-custom" id="card" style="max-height: 30rem;">
                    <img src="<?php echo base_url() . 'image_event/' . $event[$i]->eve_img_path; ?>"
                        class="card-img-top" style="max-height: 300px;" alt="...">
                    <!-- รูปที่ 1 -->
                    <div class="card-body" style="text-align: left;">
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

    <!-- โปรโมชั่นของสถานที่นี้ -->
    <div class="row py-3">
        <div class="col">
            <h3>
                <img src="<?php echo base_url() . 'assets/templete/picture/promotion_icon.png' ?>"
                    style="width:30px;margin-top:-5px;">
                โปรโมชั่นของ <?php echo $company->com_name ?>
            </h3>
            <hr width="100%" size="10" color="#cccccc">
        </div>
    </div>

    <div class="row py-3">
        <?php for ($i = 0; $i < count($promotions); $i++) { ?>
        <div class="col-12 col-sm-6 col-md-3 col-lg-3">
            <a
                href="<?php echo base_url() . 'Landing_page/Landing_page/show_promotions_detail/' . $promotions[$i]->pro_id; ?>">
                <div class="card card-custom" id="card" style="max-height: 30rem;">
                    <img src="<?php echo base_url() . 'image_promotions/' . $promotions[$i]->pro_img_path; ?>"
                        class="card-img-top" style="max-height: 300px;" alt="...">
                    <!-- รูปที่ 1 -->
                    <div class="card-body" style="text-align: left;">
                        <h3 class="text-decoration-none text-dark"><?php echo $promotions[$i]->pro_name ?></h3>
                        <p class="card-tex text-dark">
                            <?php echo iconv_substr($promotions[$i]->pro_description, 0, 60, "UTF-8") . "..."; ?>
                        </p>
                        <button class="btn btn-sm btn-success" style="float:right;">แลก</button>
                    </div>
                    <!-- ชื่อของรูปที่ 1 -->
                </div>
            </a>
        </div>
        <!-- กิจกรรมที่ 1 -->
        <?php } ?>
    </div>

    <div class="row py-3">
        <div class="col">
            <h3>
                <!-- <span class="material-icons" style="font-size: 30px;">place</span> -->
                <img src="<?php echo base_url() . 'assets/templete/picture/location.png' ?>"
                    style="width:30px;margin-top:-5px;">
                ตำแหน่งสถานที่
            </h3>
            <div class="card" style="padding-left: 2%; transform: unset;">
                <h2 style="padding-top: 2%; ">
                    <img src="<?php echo base_url() . 'assets/templete/picture/company_icon.png' ?>"
                        style="width:30px;margin-top:-5px;">
                    <?php echo $company->com_name ?>
                </h2>
                <!-- ชื่อสถานที่ -->
                <hr>
                <div class="row">
                    <div class="col">
                        <h3>ที่อยู่</h3>
                        <hr>
                        <div class="row py-3">
                            <div class="col-1">
                                <!-- <span class="material-icons">info</span> -->
                                <img src="<?php echo base_url() . 'assets/templete/picture/company_icon.png' ?>"
                                    style="width:30px;margin-top:-5px;">
                            </div>
                            <div class="col">
                                <p><?php echo $company->com_location ?></p>
                            </div>
                        </div>
                        <div class="row py-3">
                            <div class="col-1">
                                <!-- <span class="material-icons">contact_phone</span> -->
                                <img src="<?php echo base_url() . 'assets/templete/picture/phone.png' ?>"
                                    style="width:30px;margin-top:-5px;">
                            </div>
                            <div class="col">
                                <p><?php echo $company->com_tel ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col" style="padding-right: 2%; padding-bottom: 1%;">
                        <div class="table-responsive">
                            <table class="table ">
                                <tr>
                                    <td style="border: 2px solid black;">
                                        <div id="Map" style="width: 700px; height: 300px;"></div>
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