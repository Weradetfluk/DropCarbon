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

<div class="container py-5">
    <ul class="breadcrumb">
        <?php if ($this->session->userdata("tourist_id")) { ?>
            <li><a href="<?php echo base_url() . 'Tourist/Auth/Landing_page_tourist' ?>" style="color: green;">หน้าหลัก</a></li>
        <?php } ?>
        <?php if (!$this->session->userdata("tourist_id")) { ?>
            <li><a href="<?php echo base_url() ?>" style="color: green;">หน้าหลัก</a></li>
        <?php } ?>
        <li><a href="<?php echo site_url() . 'Landing_page/Landing_page/show_event_list' ?>" style="color: green;">รายการกิจกรรม</a></li>
        <li class="colorchange"><?php echo $event->eve_name ?></li>
    </ul>
    <!-- nav bar -->

    <div class="row py-3">
        <div class="col">
            <h1 class="h1"><?php echo $event->eve_name ?></h1>
        </div>
    </div>
    <!-- ชื่อกิจกรรม -->

    <div class="row">
        <div class="col fb-share-button" data-href="" data-layout="button" data-size="large">
            <a target="_blank" href="" class="fb-xfbml-parse-ignore">แชร์</a>
        </div>
    </div>
    <br>
    <!-- แชร์ -->

    <i class="i">
        <?php for ($i = 0; $i < count($image_event); $i++) { ?>
            <?php if ($i == 0) { ?>
                <input checked type="radio" name="s" style="background-image: url('<?php echo base_url() . 'image_event/' . $image_event[$i]->eve_img_path; ?>');" title="รูปที่ <?php echo $i+1 ?>">
            <?php } else { ?>
                <input type="radio" name="s" style="background-image: url('<?php echo base_url() . 'image_event/' . $image_event[$i]->eve_img_path; ?>');" title="รูปที่ <?php echo $i+1 ?>">
            <?php } ?>
        <?php } ?>
    </i>
    <!-- banner img -->

    <div class="row py-3">
        <div class="col">
            <h3><span class="material-icons" style="font-size: 30px;">description</span> รายละเอียด</h3>
            <hr color="#cccccc">
            <p style="text-indent: 50px;"><?php echo $event->eve_description ?></p>

        </div>
    </div>
    <!-- รายละเอียด -->

    <div class="row py-3">
        <div class="col">
            <h3><span class="material-icons" style="font-size: 30px;">category</span> ประเภท</h3>
            <hr width="100%" size="10" color="#cccccc">
            <p style="text-indent: 50px;">ประเภทของกิจกรรม: <?php echo $event->eve_cat_name; ?></p>
        </div>
    </div>
    <!-- ประเภท -->

    <div class="row py-3">
        <div class="col">
            <h3><span class="material-icons" style="font-size: 30px;">place</span> ตำแหน่งสถานที่</h3>
            <div class="card" style="padding-left: 2%; transform: unset;">
                <h2 style="padding-top: 2%; "> <?php echo $event->eve_name ?></h2>
                <hr>
                <div class="row">
                    <div class="col">
                        <h3>ที่อยู่</h3>
                        <hr>
                        <div class="row py-3" style="padding-left: 2%;">
                            <span class="material-icons">info</span>
                            <div class="col">
                                <p>158/1 หมู่.9 ตำบล.หนองอิรุณ อำเภอ.บ้านบึง จังหวัด.ชลบุรี 20170</pe=>
                            </div>
                        </div>
                        <div class="row py-3" style="padding-left: 2%;">
                            <span class="material-icons">contact_phone</span>
                            <div class="col">
                                <p>0905530622</pe=>
                            </div>
                        </div>
                    </div>
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
    <!-- ตำแหน่ง -->
</div>
<script src="https://www.openlayers.org/api/OpenLayers.js"></script>

<script>
    var lat = '<?= $event->eve_lat ?>'; //มีการส่งค่าตัวแปร $com_lat php ที่มีการเก็บค่า field lati จากฐานข้อมูลมาเก็บไว้ในตัวแปร lat ของ javascript
    var long = '<?= $event->eve_lon ?>'; //มีการส่งค่าตัวแปร $com_lon php ที่มีการเก็บค่า field longti จากฐานข้อมูลมาเก็บไว้ในตัวแปร long ของ javascript
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