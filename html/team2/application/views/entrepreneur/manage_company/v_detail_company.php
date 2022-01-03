<!-- 
/*
* v_detail_company
* Display detail company by entrepreneur
* @input -
* @output detail company
* @author Acharaporn pornpattanasap 62160344
* @Create Date 2564-08-05
*/ 
-->

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"
                        style="background-color: #8fbacb; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2)">
                        <center>
                            <h2 class="card-title text-white" style="font-family: 'Prompt', sans-serif !important;">
                                <?php echo $obj_company->com_name; ?></h2>
                        </center>
                    </div>
                    <br>
                    <div class="card-body">

                        <div id="carousel_indicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <?php for ($i = 0; $i < count($arr_image); $i++) { ?>
                                <?php if ($i == 0) { ?>
                                <li data-target="#carousel_indicators" data-slide-to="<?php echo $i; ?>" class="active">
                                </li>
                                <?php } ?>
                                <?php if ($i != 0) { ?>
                                <li data-target="#carousel_indicators" data-slide-to="<?php echo $i; ?>"></li>
                                <?php } ?>
                                <?php } ?>
                            </ol>
                            <div class="carousel-inner">
                                <?php for ($i = 0; $i < count($arr_image); $i++) { ?>
                                <?php if ($i == 0) { ?>
                                <div class="carousel-item image-detail active">
                                    <img class="d-block w-100 image_banner"
                                        src="<?php echo base_url() . 'image_company/' . $arr_image[$i]->com_img_path; ?>">
                                </div>
                                <?php } ?>
                                <?php if ($i != 0) { ?>
                                <div class="carousel-item image-detail">
                                    <img class="d-block w-100 image_banner"
                                        src="<?php echo base_url() . 'image_company/' . $arr_image[$i]->com_img_path; ?>">
                                </div>
                                <?php } ?>
                                <?php } ?>
                                <br>
                            </div>
                            <a class="carousel-control-prev" href="#carousel_indicators" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel_indicators" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>


                        <br>
                        <div class="container">
                            <h3 style="font-family: 'Prompt', sans-serif !important;"><img
                                    src="<?php echo base_url() . 'assets/templete/picture/description.png' ?>"
                                    width="40px"> รายละเอียด</h3>
                            <hr width="100%" size="10" color="#cccccc">
                            <p style="font-size: 18px; text-indent: 50px;"><?php echo $obj_company->com_description; ?>
                            </p>
                        </div><br>

                        <div class="container">
                            <div class="row">
                                <div class="col-5">
                                    <h3><img src="<?php echo base_url() . 'assets/templete/picture/category.png' ?>"
                                            width="40px"> ประเภท</h3>
                                    <hr width="100%" size="10" color="#cccccc">
                                    <p style="font-size: 18px; text-indent: 50px;">
                                        <?php echo $obj_company->com_name; ?></p>
                                </div>
                                <div class="col-2"></div>
                                <div class="col-5">
                                    <h3><img src="<?php echo base_url() . 'assets/templete/picture/phone.png' ?>"
                                            width="34px"> ข้อมูลติดต่อ</h3>
                                    <hr width="100%" size="10" color="#cccccc">
                                    <p style="font-size: 18px; text-indent: 50px;">เบอร์โทรศัพท์:
                                        <?php echo $obj_company->com_tel; ?></p>
                                </div>
                            </div>
                        </div><br><br>

                        <!-- ที่ตั้งของ สถานที่-->
                        <div class="row py-3">
                            <div class="col">
                                <h3>
                                    <!-- <span class="material-icons" style="font-size: 30px;">place</span> -->
                                    <img src="<?php echo base_url() . 'assets/templete/picture/location.png' ?>"
                                        style="width:30px;margin-top:-5px;">
                                    ตำแหน่งสถานที่
                                </h3>
                                <div class="card" style="padding-left: 2%; transform: unset;">
                                    <h3 style="padding-top: 2%; ">
                                        <img src="<?php echo base_url() . 'assets/templete/picture/company_icon.png' ?>"
                                            style="width:30px;margin-top:-5px;">
                                        <?php echo $obj_company->com_name ?>
                                    </h3>
                                    <!-- ชื่อสถานที่ -->
                                    <hr>
                                    <div class="row">
                                        <div class="col">
                                            <h3>ที่อยู่</h3>
                                            <hr>
                                            <div class="row py-3">
                                                <div class="col-1">
                                                    <img src="<?php echo base_url() . 'assets/templete/picture/information-point.png' ?>"
                                                        style="width:34px;margin-top:-5px;">
                                                </div>
                                                <div class="col">
                                                    <p style="font-size: 18px; text-indent:20px;">
                                                        <?php echo $obj_company->com_location." จังหวัด.".$obj_company->prv_name_th." อำเภอ.".$obj_company->dis_name_th." ตำบล.".$obj_company->par_name_th." รหัสไปรษณีย์ ".$obj_company->par_code ?></p>
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
                                    <!---->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
var lat =
    '<?= $obj_company->com_lat ?>'; //มีการส่งค่าตัวแปร $com_lat php ที่มีการเก็บค่า field lati จากฐานข้อมูลมาเก็บไว้ในตัวแปร lat ของ javascript
var long =
    '<?= $obj_company->com_lon ?>'; //มีการส่งค่าตัวแปร $com_lon php ที่มีการเก็บค่า field longti จากฐานข้อมูลมาเก็บไว้ในตัวแปร long ของ javascript
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
</script>