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

        <!-- เข้าสู่ระบบแล้ว -->
        <?php if ($this->session->userdata("tourist_id")) { ?>
            <li><a href="<?php echo base_url() . 'Tourist/Auth/Landing_page_tourist' ?>" style="color: green;">หน้าหลัก</a></li>
        <?php } ?>

        <!-- ยังไม่ได้เข้าสู่ระบบ -->
        <?php if (!$this->session->userdata("tourist_id")) { ?>
            <li><a href="<?php echo base_url() ?>" style="color: green;">หน้าหลัก</a></li>
        <?php } ?>

        <li><a href="<?php echo site_url() . 'Landing_page/Landing_page/show_event_list' ?>" style="color: green;">รายการกิจกรรม</a></li>
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
        <div class="col fb-share-button" data-href="" data-layout="button" data-size="large">
            <a target="_blank" href="" class="fb-xfbml-parse-ignore">แชร์</a>
        </div>
    </div><br>

    <!-- banner img -->
    <i class="i">
        <?php for ($i = 0; $i < count($image_event); $i++) { ?>
            <?php if ($i == 0) { ?>
                <input class="input" checked type="radio" name="s" style="background-image: url('<?php echo base_url() . 'image_event/' . $image_event[$i]->eve_img_path; ?>');" title="รูปที่ <?php echo $i + 1 ?>">
            <?php } else { ?>
                <input class="input" type="radio" name="s" style="background-image: url('<?php echo base_url() . 'image_event/' . $image_event[$i]->eve_img_path; ?>');" title="รูปที่ <?php echo $i + 1 ?>">
            <?php } ?>
        <?php } ?>
    </i>

    <!-- รายละเอียด -->
    <div class="row py-3">
        <div class="col">
            <h3><img src="<?php echo base_url() . 'assets/templete/picture/description.png' ?>" width="40px"> รายละเอียด</h3>
            <hr color="#cccccc">
            <p style="text-indent: 50px;"><?php echo $event->eve_description ?></p>
        </div>
    </div>

    <!-- ประเภท -->
    <div class="row py-3">
        <div class="col">
            <h3><img src="<?php echo base_url() . 'assets/templete/picture/category.png' ?>" width="40px"> ประเภท</h3>
            <hr width="100%" size="10" color="#cccccc">
            <p style="text-indent: 50px;">ประเภทของกิจกรรม: <?php echo $event->eve_cat_name; ?></p>
        </div>
    </div>

    <!-- ตำแหน่ง -->
    <div class="row py-3">
        <div class="col">
            <h3><img src="<?php echo base_url() . 'assets/templete/picture/location.png' ?>" width="40px"> ตำแหน่งสถานที่</h3>
            <div class="card" style="padding-left: 2%; transform: unset;">
                <h2 style="padding-top: 2%; "> <?php echo $event->eve_name ?></h2>
                <hr>
                <div class="row">

                    <!-- รายละเอียดที่อยู่ -->
                    <div class="col">
                        <h3>ที่อยู่</h3>
                        <hr>
                        <ul>
                            <li class="li-padding">158/1 หมู่.9 ตำบล.หนองอิรุณ อำเภอ.บ้านบึง จังหวัด.ชลบุรี 20170</li>
                            <li class="li-padding">0905530622</li>
                        </ul>
                    </div>

                    <!-- แผนที่ -->
                    <div class="col" style="padding-right: 2%; padding-bottom: 1%;">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td style="border: 2px solid black;">
                                        <div id="Map" style="width: 700px; height: 300px;"></div>
                                        <? $event->eve_lat ?>
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

<script>
    var lat = '<?= $event->eve_lat ?>'; //มีการส่งค่าตัวแปร $com_lat php ที่มีการเก็บค่า field lati จากฐานข้อมูลมาเก็บไว้ในตัวแปร lat ของ javascript
    var long = '<?= $event->eve_lon ?>'; //มีการส่งค่าตัวแปร $com_lon php ที่มีการเก็บค่า field longti จากฐานข้อมูลมาเก็บไว้ในตัวแปร long ของ javascript
    var zoom = 16; //มีการกำหนดค่าตัวแปร zoom ให้เป็น 14 , เพื่อทำการขยายภาพตอนเริ่มต้นแสดงแผนที่

    var from_projection = new OpenLayers.Projection("EPSG:4326"); // Transform from WGS 1984
    var to_projection = new OpenLayers.Projection("EPSG:900913"); // to Spherical Mercator Projection
    var position = new OpenLayers.LonLat(long, lat).transform(from_projection, to_projection); //ทำการเก็บค่าตัวแปร lat,long ไว้ในตัวแปร position , เพื่อไว้แสดงค่าพิกัดบนแผนที่ OpenStreetMap ตอนเริ่มต้น

    map = new OpenLayers.Map("Map"); //ใช้ Function OpenLayer.Map() ในการแสดงแผนที่

    var map_nik = new OpenLayers.Layer.OSM();
    map.addLayer(map_nik);

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
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>