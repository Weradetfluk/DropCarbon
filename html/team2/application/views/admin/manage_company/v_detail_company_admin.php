<style>
    ul.breadcrumb {
        padding: 10px 16px;
        list-style: none;
        background-color: #eee;
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
        <li><a href="<?php echo site_url() . 'Admin/Manage_company/Admin_approval_company/show_data_consider'; ?>" style="color: green;">ยังไม่ได้รับอนุมัติ</a></li>
        <li>ดูรายละเอียด</li>
    </ul>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header custom-header">
                        <center>
                            <h4 class="card-title text-white"><?php echo $arr_company->com_name; ?></h4>
                        </center>
                    </div>
                    <br>
                    <div class="card-body">

                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <?php for ($i = 0; $i < count($arr_image); $i++) { ?>
                                    <?php if ($i == 0) { ?>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>" class="active"></li>
                                    <?php } ?>
                                    <?php if ($i != 0) { ?>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>"></li>
                                    <?php } ?>
                                <?php } ?>
                            </ol>
                            <div class="carousel-inner">
                                <hr width="100%" size="5" color="#cccccc">
                                <?php for ($i = 0; $i < count($arr_image); $i++) { ?>
                                    <?php if ($i == 0) { ?>
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src="<?php echo base_url() . 'image_company/' . $arr_image[$i]->com_img_path; ?>">
                                        </div>
                                    <?php } ?>
                                    <?php if ($i != 0) { ?>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="<?php echo base_url() . 'image_company/' . $arr_image[$i]->com_img_path; ?>">
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                                <br>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>


                        <br>

                        <img src="<?php echo base_url() . 'assets/templete/picture/detail.png' ?>" width="3%">
                        <h5 style="font-size: 20px; font-weight: bold">รายละเอียด</h5>
                        <hr width="100%" size="10" color="#cccccc">
                        <?php echo '<h5 class="text"style="font-size: 15px;  line-height: 18pt; font-family:Pridi;"><b>' . '<b>' . $arr_company->com_description . '</b>' . '</b>' . '</h5>'; ?>

                        <img src="<?php echo base_url() . 'assets/templete/picture/location.png' ?>" width="3%">
                        <h5 style="font-size: 20px; font-weight: bold">ตำแหน่งสถานที่</h5>
                        <hr width="100%" size="5" color="#cccccc">

                        <table class="table table-responsive">
                            <tr>
                                <td>
                                    <div id="Map" style="width: 1050px; height: 400px;"></div>
                                </td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var lat = '<?= $arr_company->com_lat ?>'; //มีการส่งค่าตัวแปร $com_lat php ที่มีการเก็บค่า field lati จากฐานข้อมูลมาเก็บไว้ในตัวแปร lat ของ javascript
        var long = '<?= $arr_company->com_lon ?>'; //มีการส่งค่าตัวแปร $com_lon php ที่มีการเก็บค่า field longti จากฐานข้อมูลมาเก็บไว้ในตัวแปร long ของ javascript
        var zoom = 16; //มีการกำหนดค่าตัวแปร zoom ให้เป็น 14 , เพื่อทำการขยายภาพตอนเริ่มต้นแสดงแผนที่

        var from_projection = new OpenLayers.Projection("EPSG:4326"); // Transform from WGS 1984
        var to_projection = new OpenLayers.Projection("EPSG:900913"); // to Spherical Mercator Projection
        var position = new OpenLayers.LonLat(long, lat).transform(from_projection, to_projection); //ทำการเก็บค่าตัวแปร lat,long ไว้ในตัวแปร position , เพื่อไว้แสดงค่าพิกัดบนแผนที่ OpenStreetMap ตอนเริ่มต้น


        map = new OpenLayers.Map("Map"); //ใช้ Function OpenLayer.Map() ในการแสดงแผนที่

        var mapnik = new OpenLayers.Layer.OSM();
        map.addLayer(mapnik);

        var markers = new OpenLayers.Layer.Markers("Markers"); //แสดงสัญลักษณ์ Marker ปักหมุดโดยใช้ Function Markers , แต่ต้องมีเรียกใช้งาน Openlayers.js ไม่งั้นจะไม่แสดงสัญลักษณ์ออกมา

        map.addLayer(markers);
        markers.addMarker(new OpenLayers.Marker(position));

        map.setCenter(position, zoom);
    </script>