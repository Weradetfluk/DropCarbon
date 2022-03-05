<!-- 
/*
* v_detail_event
* Display detail event
* @input - 
* @output detail event
* @author Chutipon Thermsirisuksin 62160081
* @Create Date 2564-09-14
*/ 
-->

<!-- รายละเอียดกิจกรรม -->
<div class="container py-5">

    <!-- nav bar -->
    <ul class="breadcrumb">
        <li><a href="<?php echo base_url() ?>" style="color: green;">หน้าหลัก</a></li>

        <li><a href="<?php echo site_url() . 'Landing_page/Landing_page/show_event_list' ?>"
                style="color: green;">รายการกิจกรรม</a></li>
        <li class="colorchange"><?php echo $event->eve_name ?></li>
    </ul>

    <!-- ชื่อกิจกรรม -->
    <div class="row py-3">
        <div class="col">
            <h1 class="h1"><?php echo $event->eve_name ?></h1>
        </div>
    </div>

    <!-- แชร์ -->
    <div class="row">
        <?php $share_link_event = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        // echo $share_link_event; 
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

    <!-- banner img -->
    <i class="i">
        <?php for ($i = 0; $i < count($image_event); $i++) { ?>
        <?php if ($i == 0) { ?>
        <input class="input" checked type="radio" name="s"
            style="background-image: url('<?php echo base_url() . 'image_event/' . $image_event[$i]->eve_img_path; ?>');"
            title="รูปที่ <?php echo $i + 1 ?>">
        <?php } else { ?>
        <input class="input" type="radio" name="s"
            style="background-image: url('<?php echo base_url() . 'image_event/' . $image_event[$i]->eve_img_path; ?>');"
            title="รูปที่ <?php echo $i + 1 ?>">
        <?php } ?>
        <?php } ?>
    </i>

    <!-- รายละเอียด -->
    <div class="row py-3">
        <div class="col">
            <h3><img src="<?php echo base_url() . 'assets/templete/picture/description.png' ?>" width="40px"> รายละเอียด
            </h3>
            <hr color="#cccccc">
            <div style="padding-top: 2%;padding-bottom: 3%">
                <?php
                $get_string = $event->eve_description;
                $get_length = strlen($get_string);
                $max_length = 4000;
                $sub_string_first = $get_string;
                $sub_string_last = "";
                $read_more = "";
                if ($get_length > $max_length) {
                    $sub_string_first = substr($get_string, 0, strrpos($get_string, ' ', $max_length - $get_length)) . " <span id='more_dot'> ... </span>";
                    $sub_string_last = substr($get_string, strrpos($get_string, ' ', $max_length - $get_length));
                }
                ?>
                <p style="text-indent: 50px;text-align: justify;text-justify: inter-word;">
                    <?php echo $sub_string_first ?><span id="more_text"><?php echo $sub_string_last ?></span>
                </p>
            </div>

            <?php if ($get_length > $max_length) { ?>
            <div onclick="read_more()" class="read-more-style" id="btn_read_more">อ่านต่อ>></div>
            <div onclick="read_more()" class="read-more-style" id="btn_hide_more" style="display: none;">ซ่อน << </div>
                    <?php } ?>
            </div>
        </div>

        <!-- ประเภท -->
        <div class="row py-3">
            <div class="col-md">
                <h3><img src="<?php echo base_url() . 'assets/templete/picture/category.png' ?>" width="40px"> ประเภท
                </h3>
                <hr width="100%" size="10" color="#cccccc">
                <p style="text-indent: 50px;"><?php echo $event->eve_cat_name; ?></p>
            </div>
            <div class="col-md">
                <h3><img src="<?php echo base_url() . 'assets/templete/picture/carbon-dioxide.png' ?>" width="40px">
                    ลดคาร์บอนไดออกไซด์</h3>
                <hr width="100%" size="10" color="#cccccc">
                <p style="font-size: 18px; text-indent: 50px;">
                    ลดคาร์บอนไดออกไซด์ <?php echo $event->eve_drop_carbon; ?> กิโลกรัม/ปี</p>
            </div>
        </div>

        <!-- ตำแหน่ง -->
        <div class="row py-3">
            <div class="col">
                <h3><img src="<?php echo base_url() . 'assets/templete/picture/location.png' ?>" width="40px">
                    ตำแหน่งสถานที่</h3>
                <div class="card" style="padding-left: 2%; transform: unset;">
                    <h2 style="padding-top: 2%; "> <?php echo $event->eve_name ?></h2>
                    <hr>
                    <div class="row">

                        <!-- รายละเอียดที่อยู่ -->
                        <div class="col-lg">
                            <!-- เบอร์โทรศัพท์ -->
                            <h4><img src="<?php echo base_url() . 'assets/templete/picture/phone.png' ?>" width="28px">
                                เบอร์โทรศัพท์</h4>
                            <p style="font-size: 18px; text-indent: 50px;"><?php echo $event->com_tel; ?></p>

                            <!-- รายละเอียดที่อยู่กิจกรรม -->
                            <h4><img src="<?php echo base_url() . 'assets/templete/picture/information-point.png' ?>"
                                    style="width:34px;"> รายละเอียดที่อยู่</h4>
                            <p style="font-size: 18px; text-indent:50px;">
                                <?php echo  $event->eve_location . " จังหวัด." . $event->prv_name_th . " อำเภอ." . $event->dis_name_th . " ตำบล." . $event->par_name_th . " รหัสไปรษณีย์ " . $event->par_code ?>
                            </p>
                            <br>
                        </div>

                        <!-- แผนที่ -->
                        <div class="col" style="padding-right: 2%; padding-bottom: 1%;">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <td style="border: 2px solid black;">
                                            <div id="Map" style="width: 700px; height: 300px;"></div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- script map -->
    <script>
    var lat =
        '<?= $event->eve_lat ?>'; //มีการส่งค่าตัวแปร $com_lat php ที่มีการเก็บค่า field lati จากฐานข้อมูลมาเก็บไว้ในตัวแปร lat ของ javascript
    var long =
        '<?= $event->eve_lon ?>'; //มีการส่งค่าตัวแปร $com_lon php ที่มีการเก็บค่า field longti จากฐานข้อมูลมาเก็บไว้ในตัวแปร long ของ javascript
    var zoom = 16; //มีการกำหนดค่าตัวแปร zoom ให้เป็น 14 , เพื่อทำการขยายภาพตอนเริ่มต้นแสดงแผนที่
    var from_projection = new OpenLayers.Projection("EPSG:4326"); // Transform from WGS 1984
    var to_projection = new OpenLayers.Projection("EPSG:900913"); // to Spherical Mercator Projection
    var position = new OpenLayers.LonLat(long, lat).transform(from_projection,
        to_projection
    ); //ทำการเก็บค่าตัวแปร lat,long ไว้ในตัวแปร position , เพื่อไว้แสดงค่าพิกัดบนแผนที่ OpenStreetMap ตอนเริ่มต้น
    map = new OpenLayers.Map("Map"); //ใช้ Function OpenLayer.Map() ในการแสดงแผนที่
    var map_nik = new OpenLayers.Layer.OSM();
    map.addLayer(map_nik);
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

    <!-- script read more -->
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
    </script>