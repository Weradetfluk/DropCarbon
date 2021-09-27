<!-- 
/*
* v_detail_event
* Display data detail event by entrepreneur
* @input obj_event, arr_image
* @output detail data event
* @author Suwapat Saowarod 62160340
* @Create Date 2564-09-25
*/ 
-->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background-color: #8fbacb; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2)">
                        <center>
                            <h2 class="card-title text-white" style="font-family: 'Prompt', sans-serif !important;"><?php echo $arr_event[0]->eve_name; ?></h2>
                        </center>
                    </div>
                    <br>
                    <div class="card-body">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators" style="bottom: 30px !important;">
                                <?php for ($i = 0; $i < count($arr_event); $i++) { ?>
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
                                <?php for ($i = 0; $i < count($arr_event); $i++) { ?>
                                    <?php if ($i == 0) { ?>
                                        <div class="carousel-item image-detail active">
                                            <img class="d-block w-100 image_banner" src="<?php echo base_url() . 'image_event/' . $arr_event[$i]->eve_img_path; ?>">
                                        </div>
                                    <?php } ?>
                                    <?php if ($i != 0) { ?>
                                        <div class="carousel-item image-detail">
                                            <img class="d-block w-100 image_banner" src="<?php echo base_url() . 'image_event/' . $arr_event[$i]->eve_img_path; ?>">
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

                        <div class="container">
                            <h3><span class="material-icons" style="font-size: 30px;">description</span>  รายละเอียดกิจกรรม</h3>
                            <hr width="100%" size="10" color="#cccccc">
                            <p style="font-size: 18px; text-indent: 50px;"><?php echo $arr_event[0]->eve_description;?></p>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-5">
                                    <h3><span class="material-icons" style="font-size: 30px;">credit_score</span>  คะแนนกิจกรรม</h3>
                                    <hr width="100%" size="10" color="#cccccc">
                                    <p style="font-size: 18px; text-indent: 50px;">คะแนนที่จะได้รับหลังทำกิจกรรม: <?php echo $arr_event[0]->eve_point;?> คะเเนน</p>
                                </div>
                                <div class="col-2"></div>
                                <div class="col-5">
                                    <h3><span class="material-icons" style="font-size: 30px;">category</span>  ประเภท</h3>
                                    <hr width="100%" size="10" color="#cccccc">
                                    <p style="font-size: 18px; text-indent: 50px;">กิจกรรมนี้จัดอยู่ในประเภท: <?php echo $arr_event[0]->eve_cat_name;?></p>
                                </div>
                            </div>
                        </div><br><br>
                        <div class="container">
                            <h3><span class="material-icons" style="font-size: 30px;">location_city</span>  <?php echo $arr_event[0]->com_name;?></h3>
                            <hr width="100%" size="10" color="#cccccc">
                            <ul>
                                <li><h4>สถานที่ตั้ง: </h4></li>
                                <p style="font-size: 18px; text-indent: 50px;"><?php echo $arr_event[0]->com_location;?></p>
                                <li><h4>เบอร์โทรศัพท์: </h4></li>
                                <p style="font-size: 18px; text-indent: 50px;"><?php echo $arr_event[0]->com_tel;?></p><br>
                                <h4><img src="<?php echo base_url() . 'assets/templete/picture/location.png' ?>" width="3%">  ตำแหน่งสถานที่</h4>
                                <table class="table table-responsive">
                                    <tr>
                                        <td style="border: 2px solid black;">
                                            <div id="Map" style="width: 900px; height: 400px;"></div>
                                        </td>
                                    </tr>
                                </table>
                            </ul>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://www.openlayers.org/api/OpenLayers.js"></script>

<script>
    var lat = '<?= $arr_event[0]->com_lat ?>'; //มีการส่งค่าตัวแปร $com_lat php ที่มีการเก็บค่า field lati จากฐานข้อมูลมาเก็บไว้ในตัวแปร lat ของ javascript
    var long = '<?= $arr_event[0]->com_lon ?>'; //มีการส่งค่าตัวแปร $com_lon php ที่มีการเก็บค่า field longti จากฐานข้อมูลมาเก็บไว้ในตัวแปร long ของ javascript
    var zoom = 16; //มีการกำหนดค่าตัวแปร zoom ให้เป็น 14 , เพื่อทำการขยายภาพตอนเริ่มต้นแสดงแผนที่

    var from_projection = new OpenLayers.Projection("EPSG:4326"); // Transform from WGS 1984
    var to_projection = new OpenLayers.Projection("EPSG:900913"); // to Spherical Mercator Projection
    var position = new OpenLayers.LonLat(long, lat).transform(from_projection, to_projection); //ทำการเก็บค่าตัวแปร lat,long ไว้ในตัวแปร position , เพื่อไว้แสดงค่าพิกัดบนแผนที่ OpenStreetMap ตอนเริ่มต้น


    map = new OpenLayers.Map("Map"); //ใช้ Function OpenLayer.Map() ในการแสดงแผนที่

    var map_link = new OpenLayers.Layer.OSM();
    map.addLayer(map_link);

    var markers = new OpenLayers.Layer.Markers("Markers"); //แสดงสัญลักษณ์ Marker ปักหมุดโดยใช้ Function Markers , แต่ต้องมีเรียกใช้งาน Openlayers.js ไม่งั้นจะไม่แสดงสัญลักษณ์ออกมา

    map.addLayer(markers);
    markers.addMarker(new OpenLayers.Marker(position));

    map.setCenter(position, zoom);
</script>