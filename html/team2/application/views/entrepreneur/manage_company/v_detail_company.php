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
                    <div class="card-header" style="background-color: #8fbacb; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2)">
                        <center><h4 class="card-title text-white" style="font-family: 'Prompt', sans-serif !important;"><?php echo $obj_company->com_name;?></h4></center>
                    </div>
                    <br>
                    <div class="card-body">

                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <?php for($i = 0; $i < count($arr_image); $i++){?>
                                    <?php if($i == 0){?>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i;?>" class="active"></li>
                                    <?php }?>
                                    <?php if($i != 0){?>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i;?>"></li>
                                    <?php }?>
                                <?php }?>
                            </ol>   
                            <div class="carousel-inner">
                                <hr width="100%" size="5" color="#cccccc">
                                <?php for($i = 0; $i < count($arr_image); $i++){?>
                                    <?php if($i == 0){?>
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src="<?php echo base_url() . 'image_company/' . $arr_image[$i]->com_img_path;?>">
                                        </div>
                                    <?php }?>
                                    <?php if($i != 0){?>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="<?php echo base_url() . 'image_company/' . $arr_image[$i]->com_img_path;?>">
                                        </div>
                                    <?php }?>
                                <?php }?>
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
                    <h5 style="font-family: 'Prompt', sans-serif !important;">รายละเอียด</h5>
                    <hr width="100%" size="10" color="#cccccc">
                    <h5 class="text" style="font-family: 'Prompt', sans-serif !important; font-size: 15px; text-indent: 50px;"><?php echo $obj_company->com_description;?></h5>

                    <img src="<?php echo base_url() . 'assets/templete/picture/location.png' ?>" width="3%">
                    <h5 style="font-family: 'Prompt', sans-serif !important;">ตำแหน่งสถานที่</h5>
                    <hr width="100%" size="5" color="#cccccc">

                    <table class="table table-responsive" >
                        <tr>
                            <td><div id="Map" style="width: 1050px; height: 400px;"></div></td> 
                        </tr>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="http://www.openlayers.org/api/OpenLayers.js"></script>

<script>
   var lat = '<?=$obj_company->com_lat?>';       //มีการส่งค่าตัวแปร $com_lat php ที่มีการเก็บค่า field lati จากฐานข้อมูลมาเก็บไว้ในตัวแปร lat ของ javascript
   var long = '<?=$obj_company->com_lon?>';    //มีการส่งค่าตัวแปร $com_lon php ที่มีการเก็บค่า field longti จากฐานข้อมูลมาเก็บไว้ในตัวแปร long ของ javascript
   var zoom = 16;          //มีการกำหนดค่าตัวแปร zoom ให้เป็น 14 , เพื่อทำการขยายภาพตอนเริ่มต้นแสดงแผนที่

    var fromProjection = new OpenLayers.Projection("EPSG:4326");   // Transform from WGS 1984
    var toProjection   = new OpenLayers.Projection("EPSG:900913"); // to Spherical Mercator Projection
    var position       = new OpenLayers.LonLat(long, lat).transform( fromProjection, toProjection); //ทำการเก็บค่าตัวแปร lat,long ไว้ในตัวแปร position , เพื่อไว้แสดงค่าพิกัดบนแผนที่ OpenStreetMap ตอนเริ่มต้น


    map = new OpenLayers.Map("Map"); //ใช้ Function OpenLayer.Map() ในการแสดงแผนที่

    var mapnik = new OpenLayers.Layer.OSM();
    map.addLayer(mapnik);

    var markers = new OpenLayers.Layer.Markers( "Markers" ); //แสดงสัญลักษณ์ Marker ปักหมุดโดยใช้ Function Markers , แต่ต้องมีเรียกใช้งาน Openlayers.js ไม่งั้นจะไม่แสดงสัญลักษณ์ออกมา

    map.addLayer(markers);
    markers.addMarker(new OpenLayers.Marker(position)); 

    map.setCenter(position, zoom);
</script>