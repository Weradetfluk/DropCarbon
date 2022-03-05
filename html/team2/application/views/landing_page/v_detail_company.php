<!-- 
/*
* v_detail_company
* Display detail company
* @input - 
* @output detail company
* @author Jutamas Thaptong 62160079
* @Create Date 2564-09-14
*/ 
-->
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
</style>


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


/* read_more
* read more text if text over 7 line
* @input -
* @output -
* @author Jutamas Thaptong
* @Create Date 2565-03-05
* @Update -
*/
<script>
function read_more() {
    $("#more_dot").toggle();
    $("#more_text").toggle(200);
    $("#btn_read_more").toggle();
    $("#btn_hide_more").toggle();

}
</script>

<div class="container py-5">
    <ul class="breadcrumb">
        <li><a href="<?php echo base_url() ?>" style="color: green;">หน้าหลัก</a></li>
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
        <div class="col fb-share-button" data-href="" data-layout="button" data-size="large">
            <div class="fb-share-button" data-href="https://www.informatics.buu.ac.th/team2/" data-layout="button"
                data-size="small"><a target="_blank"
                    href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.informatics.buu.ac.th%2Fteam2%2F&amp;src=sdkpreparse"
                    class="fb-xfbml-parse-ignore">Share</a></div>
        </div>
    </div>
    <br>
    <!-- แชร์ -->

    <div class="container">
        <div class="i col-lg" style="width:100%">
            <?php for ($i = 0; $i < count($image); $i++) { ?>
            <?php if ($i == 0) { ?>
            <input checked type="radio" name="s"
                style="width:100%;background-image: url('<?php echo base_url() . 'image_company/' . $image[$i]->com_img_path; ?>');"
                title="รูปที่ <?php echo $i + 1 ?>">
            <?php } else { ?>
            <input type="radio" name="s"
                style="width:100%;ackground-image: url('<?php echo base_url() . 'image_company/' . $image[$i]->com_img_path; ?>');"
                title="รูปที่ <?php echo $i + 1 ?>">
            <?php } ?>
            <?php } ?>
        </div>
    </div>
    <!-- banner img -->

    <div class="row py-3">
        <div class="col">
            <h3>
                <!-- <span class="material-icons" style="font-size: 30px;">description</span>  -->
                <img src="<?php echo base_url() . 'assets/templete/picture/description.png' ?>"
                    style="width:40px;margin-top:-5px;">
                รายละเอียด
            </h3>
            <hr width="100%" size="10" color="#cccccc">
            <div style="padding-top: 2%;padding-bottom: 3%;line-height:2rem;">
                <?php
                $get_string = $company->com_description;
                $get_length = strlen($get_string);
                $max_length = 4000;
                $sub_string_first = $get_string;
                $sub_string_last = "";

                if ($get_length > $max_length) {
                    $sub_string_first = substr($get_string, 0, strrpos($get_string, ' ', $max_length - $get_length)) . " <span id='more_dot'> ... </span>";
                    $sub_string_last = substr($get_string, strrpos($get_string, ' ', $max_length - $get_length));
                }

                ?>
                <p style="text-indent: 50px;text-align: justify;font-size: 1.2rem;">
                    <?php echo $sub_string_first ?><span id="more_text"><?php echo $sub_string_last ?></span>
                </p>
            </div>

            <?php if ($get_length > $max_length) { ?>
            <div onclick="read_more()" class="read-more-style" id="btn_read_more">อ่านต่อ >> </div>
            <div onclick="read_more()" class="read-more-style" id="btn_hide_more" style="display: none;">ซ่อน << </div>
                    <?php } ?>

                    <!-- รายละเอียด -->
            </div>
        </div>

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
                    <?php echo $company->com_cat_name; ?></p>
            </div>
        </div>

        <!-- กิจกรรมของสถานที่นี้ -->
        <div class="row py-3">
            <div class="col">
                <h3>
                    <img src="<?php echo base_url() . 'assets/templete/picture/point.png' ?>"
                        style="width:40px;margin-top:-5px;">
                    กิจกรรมของ <?php echo $company->com_name ?>
                </h3>
                <hr width="100%" size="10" color="#cccccc">
            </div>
        </div>

        <?php
        error_reporting(0);
        ?>
        <div class="row py-3">
            <?php for ($i = 0; $i < (count($event)); $i++) { ?>


            <div class="col-md-4">
                <a
                    href="<?php echo base_url() . 'Landing_page/Landing_page/show_event_detail/' . $event[$i]->eve_id; ?>">
                    <div class="card card-custom" id="card">
                        <div class="card-img-wrapper">
                            <!-- รูปกิจกรรม -->
                            <img src="<?php echo base_url() . 'image_event/' . $event[$i]->eve_img_path; ?>"
                                class="card-img-top" style="object-fit: cover;">
                        </div>
                        <div class="card-body" style="margin-top: 50px;">

                            <!-- ชื่อกิจกรรม -->
                            <h2 class="text-decoration-none text-dark"><?php echo $event[$i]->eve_name ?></h2>

                            <p class="card-tex text-dark">
                                <!-- รายละเอียดกิจกรรม -->
                                <?php echo iconv_substr($event[$i]->eve_description, 0, 60, "UTF-8") . "..."; ?>

                            </p>

                            <!-- ลดคาร์บอน -->
                            <p style="display:inline; font-size: 16px; color: #008000"><b>ลดคาร์บอน
                                    <?php echo $event[$i]->eve_drop_carbon; ?> กก./ปี</b></p>

                            <!-- เวลาเริ่ม/จบกิจกรรม -->
                            <?php
                                if (substr($event[$i]->eve_start_date, 5, 2) == "01") {
                                    $start_month = "ม.ค.";
                                } else if (substr($event[$i]->eve_start_date, 5, 2) == "02") {
                                    $start_month = "ก.พ.";
                                } else if (substr($event[$i]->eve_start_date, 5, 2) == "03") {
                                    $start_month = "มี.ค.";
                                } else if (substr($event[$i]->eve_start_date, 5, 2) == "04") {
                                    $start_month = "เม.ย.";
                                } else if (substr($event[$i]->eve_start_date, 5, 2) == "05") {
                                    $start_month = "พ.ค.";
                                } else if (substr($event[$i]->eve_start_date, 5, 2) == "06") {
                                    $start_month = "มิ.ย.";
                                } else if (substr($event[$i]->eve_start_date, 5, 2) == "07") {
                                    $start_month = "ก.ค.";
                                } else if (substr($event[$i]->eve_start_date, 5, 2) == "08") {
                                    $start_month = "ส.ค.";
                                } else if (substr($event[$i]->eve_start_date, 5, 2) == "09") {
                                    $start_month = "ก.ย.";
                                } else if (substr($event[$i]->eve_start_date, 5, 2) == "10") {
                                    $start_month = "ต.ค.";
                                } else if (substr($event[$i]->eve_start_date, 5, 2) == "11") {
                                    $start_month = "พ.ย.";
                                } else if (substr($event[$i]->eve_start_date, 5, 2) == "12") {
                                    $start_month = "ธ.ค.";
                                }

                                if (substr($event[$i]->eve_end_date, 5, 2) == "01") {
                                    $end_month = "ม.ค.";
                                } else if (substr($event[$i]->eve_end_date, 5, 2) == "02") {
                                    $end_month = "ก.พ.";
                                } else if (substr($event[$i]->eve_end_date, 5, 2) == "03") {
                                    $end_month = "มี.ค.";
                                } else if (substr($event[$i]->eve_end_date, 5, 2) == "04") {
                                    $end_month = "เม.ย.";
                                } else if (substr($event[$i]->eve_end_date, 5, 2) == "05") {
                                    $end_month = "พ.ค.";
                                } else if (substr($event[$i]->eve_end_date, 5, 2) == "06") {
                                    $end_month = "มิ.ย.";
                                } else if (substr($event[$i]->eve_end_date, 5, 2) == "07") {
                                    $end_month = "ก.ค.";
                                } else if (substr($event[$i]->eve_end_date, 5, 2) == "08") {
                                    $end_month = "ส.ค.";
                                } else if (substr($event[$i]->eve_end_date, 5, 2) == "09") {
                                    $end_month = "ก.ย.";
                                } else if (substr($event[$i]->eve_end_date, 5, 2) == "10") {
                                    $end_month = "ต.ค.";
                                } else if (substr($event[$i]->eve_end_date, 5, 2) == "11") {
                                    $end_month = "พ.ย.";
                                } else if (substr($event[$i]->eve_end_date, 5, 2) == "12") {
                                    $end_month = "ธ.ค.";
                                }

                                $start_yesr = substr($event[$i]->eve_start_date, 0, 4);
                                $start_yesr = intval($start_yesr) + 543;
                                $end_yesr = substr($event[$i]->eve_end_date, 0, 4);
                                $end_yesr = intval($end_yesr) + 543;
                                ?>
                            <p style="display:inline; font-size: 16px; float: right;">
                                <?php echo substr($event[$i]->eve_start_date, 8, 2) . " " . $start_month . " " . $start_yesr; ?>
                                -
                                <?php echo substr($event[$i]->eve_end_date, 8, 2) . " " . $end_month . " " . $end_yesr; ?>
                            </p>

                        </div>
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
                        style="width:40px;margin-top:-5px;">
                    โปรโมชั่นของ <?php echo $company->com_name ?>
                </h3>
                <hr width="100%" size="10" color="#cccccc">
            </div>
        </div>

        <div class="row py-3">
            <?php for ($i = 0; $i < count($promotions); $i++) { ?>
            <!-- <div class="col-lg-3">
            <a
                href="<?php echo base_url() . 'Landing_page/Landing_page/show_promotions_detail/' . $promotions[$i]->pro_id; ?>">
                <div class="card card-custom" id="card" style="max-height: 30rem;">
                    <img src="<?php echo base_url() . 'image_promotions/' . $promotions[$i]->pro_img_path; ?>"
                        class="card-img-top" style="max-height: 220px;" alt="...">
                    <div class="card-body" style="text-align: left;">
                        <h3 class="text-decoration-none text-dark"><?php echo $promotions[$i]->pro_name ?></h3>
                        <p class="card-tex text-dark">
                            <?php echo iconv_substr($promotions[$i]->pro_description, 0, 60, "UTF-8") . "..."; ?>
                        </p>
                        <button class="btn btn-sm btn-success" style="float:right;">แลก</button>
                    </div>
                </div>
            </a>
        </div> -->

            <div class="col-md-3" align="center">
                <a
                    href="<?php echo base_url() . 'Landing_page/Landing_page/show_promotions_detail/' . $promotions[$i]->pro_id; ?>">
                    <div class="card card-custom" data-aos="fade-right" style="height: 23rem;">

                        <!-- รูป -->
                        <img src="<?php echo base_url() . 'image_promotions/' . $promotions[$i]->pro_img_path; ?>"
                            style="height: 200px; weight: 270; object-fit: cover;" class="card-img-top">

                        <div class="card-body">

                            <!-- ชื่อ -->
                            <h3><?php echo iconv_substr($promotions[$i]->pro_name, 0, 20, "UTF-8") . "..."; ?></h3>

                            <!-- รายละเอียด -->
                            <p class="card-text">
                                <?php echo iconv_substr($promotions[$i]->pro_description, 0, 35, "UTF-8") . "..."; ?>
                            </p>
                            <?php if ($promotions[$i]->pro_cat_id == 2) { ?>
                            <p class="text-decoration-none" style="display:inline; font-size: 16px; color: #008000">
                                <?php echo $promotions[$i]->pro_point ?> คะแนน</p>
                            <?php } ?>
                        </div>
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
                        style="width:40px;margin-top:-5px;">
                    ตำแหน่งสถานที่
                </h3>
                <div class="card" style="padding-left: 2%; transform: unset;">
                    <h2 style="padding-top: 2%; ">

                        <?php echo $company->com_name ?>
                    </h2>
                    <!-- ชื่อสถานที่ -->
                    <hr>
                    <!-- <div class="row">
                    <div class="col">
                        <h3>ที่อยู่</h3>
                        <hr>
                        <div class="row py-3">

                            <div class="col">
                                <p> &#9679 <?php echo $company->com_location ?></p>
                            </div>
                        </div>
                        <div class="row py-3">

                            <div class="col">
                                <p> &#9679 <?php echo $company->com_tel ?></p>
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
                </div> -->

                    <div class="row">

                        <div class="col">
                            <!-- เบอร์โทรศัพท์ -->
                            <h4><img src="<?php echo base_url() . 'assets/templete/picture/phone.png' ?>" width="28px">
                                เบอร์โทรศัพท์</h4>
                            <p style="font-size: 18px; text-indent: 50px;"><?php echo $company->com_tel; ?></p>

                            <!-- รายละเอียดที่อยู่กิจกรรม -->
                            <h4><img src="<?php echo base_url() . 'assets/templete/picture/information-point.png' ?>"
                                    style="width:34px;"> รายละเอียดที่อยู่</h4>
                            <p style="font-size: 18px; text-indent:50px;">
                                <?php echo  $company->com_location . " จังหวัด." . $company->prv_name_th . " อำเภอ." . $company->dis_name_th . " ตำบล." . $company->par_name_th . " รหัสไปรษณีย์ " . $company->par_code ?>
                            </p>
                            <br>
                        </div>

                        <!-- แผนที่ -->
                        <div class="col-lg" style="padding-right: 2%; padding-bottom: 1%;">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <td style="border: 2px solid black;">
                                            <div id="Map" style="width: 100%; height: 300px;"></div>
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
    <script>
    var lat =
        '<?= $company->com_lat ?>'; //มีการส่งค่าตัวแปร $com_lat php ที่มีการเก็บค่า field lati จากฐานข้อมูลมาเก็บไว้ในตัวแปร lat ของ javascript
    var long =
        '<?= $company->com_lon ?>'; //มีการส่งค่าตัวแปร $com_lon php ที่มีการเก็บค่า field longti จากฐานข้อมูลมาเก็บไว้ในตัวแปร long ของ javascript
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