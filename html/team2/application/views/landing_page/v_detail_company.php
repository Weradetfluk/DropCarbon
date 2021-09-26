<style>
    .fa {
        text-align: center;
        text-decoration: none;
        margin: 5px 2px;
        position: relative;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        line-height: 36px;
    }

    .fa:hover {
        opacity: 0.7;
    }

    .fa-fa-facebook {
        background: #3B5998;
        color: white;
    }

    .fa-fa-twitter {
        background: #55ACEE;
        color: white;
    }

    .fa-fa-instagram {
        background: radial-gradient(circle at 33% 100%, #fed373 4%, #f15245 30%, #d92e7f 62%, #9b36b7 85%, #515ecf);
        color: white;
    }

    #card1 {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
    }

    #card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
    }

    .card-horizontal {
        display: flex;
        flex: 1 1 auto;
    }

    .carousel-item {
        position: relative;
    }

    .carousel-item img {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
    }

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
<title>Detail Company</title>
<div class="bg-white">
    <section>
        <div class="container py-5">
            <ul class="breadcrumb">
                <?php if ($this->session->userdata("tourist_id")) { ?>
                    <li><a href="<?php echo base_url() . 'Tourist/Auth/Landing_page_tourist' ?>" style="color: green;">หน้าหลัก</a></li>
                <?php } ?>
                <?php if (!$this->session->userdata("tourist_id")) { ?>
                    <li><a href="<?php echo base_url() ?>" style="color: green;">หน้าหลัก</a></li>
                <?php } ?>
                <li><a href="<?php echo site_url() . 'Landing_page/Landing_page/show_company_list' ?>" style="color: green;">รายการสถานที่</a></li>
                <li><?php echo $company->com_name ?></li>
            </ul>
            <div class="row text-left py-3">
                <div class="col-m-auto">
                    <h1 class="h1" style="padding-bottom: 2%"><?php echo $company->com_name ?></h1>
                    <span class="material-icons">hiking</span> สถานที่ท่องเที่ยว
                </div>
            </div>
            <!-- ชื่อกิจกรรม -->
            <div class="row">
                แชร์
                        <div data-href="<?php echo site_url() . 'Landing_page/Landing_page/show_company_detail/3' ?>" data-layout="button" data-size="large">
                        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?" class="fb-xfbml-parse-ignore" class="fa fa-fa-facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a></div> 
                <hr>
            </div>
            <!-- แชร์ -->
            <div class="row">
                <div class="col-12">
                    <div class="container">
                        
                    </div>
                    <!-- รูป -->


                </div>
                <div class="row" style="padding-top: 5%;">
                    <div class="col">
                        <h4>&#9679; รายละเอียด</h4>
                        <hr>
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
                <div class="row" style="padding-top: 5%;">
                    <div class="col">
                        <h3>ตำแหน่งสถานที่</h3>
                        <div class="card" style="padding-left: 2%; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                            <h3 style="padding-top: 2%; "> <?php echo $company->com_name ?></h3>
                            <!-- ชื่อสถานที่ -->
                            <hr>
                            <div class="row">
                                <div class="col">
                                    <h5>&#9679; ที่อยู่</h5>
                                    <hr>
                                    <div class="row" style="padding-left: 2%; padding-bottom: 5%;">
                                        การท่องเที่ยวแห่งประเทศไทย 1600 ถ.เพชรบุรีตัดใหม่ แขวงมักกะสัน เขตราชเทวี กรุงเทพฯ 10400
                                    </div>
                                    <div class="row" style="padding-left: 2%; padding-bottom: 3%;">
                                        <div class="col">
                                            <i class="fa fa-phone"></i><span><?php echo $company->com_tel ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col" style="padding-right: 2%; padding-bottom: 1%;">
                                    <table class="table table-responsive">
                                        <tr>
                                            <td style="border: 2px solid black;">
                                                <div id="Map" style="width: 500px; height: 400px;"></div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- ข้อมูลของสถานที่ -->

                        </div>
                        <!-- ตำแหน่ง -->

                    </div>
                </div>
            </div>
        </div>
        <script src="https://www.openlayers.org/api/OpenLayers.js"></script>

        <script>
            var lat = '<?= $company->com_lat ?>'; //มีการส่งค่าตัวแปร $com_lat php ที่มีการเก็บค่า field lati จากฐานข้อมูลมาเก็บไว้ในตัวแปร lat ของ javascript
            var long = '<?= $company->com_lon ?>'; //มีการส่งค่าตัวแปร $com_lon php ที่มีการเก็บค่า field longti จากฐานข้อมูลมาเก็บไว้ในตัวแปร long ของ javascript
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
                $('.img-com-for').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    fade: true,
                    asNavFor: '.img-com-nav'
                });
                $('.img-com-nav').slick({
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    asNavFor: '.img-com-for',
                    dots: true,
                    focusOnSelect: true
                });
            });
        </script>