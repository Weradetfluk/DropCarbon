<!-- 
/*
* v_edit_company
* Display form edit company by entrepreneur
* @input com_name, com_description, com_tel, com_file[], com_lat, com_lon
* @output form edit company
* @author Suwapat Saowarod 62160340
* @Create Date 2564-07-19
*/ 
-->

<style>
    #map {
        height: 100%;
        width: 100%;
    }
</style>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2)">
                    <div class="card-header" style="background-color: #8fbacb; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2)">
                        <center>
                            <h4 class="card-title text-white" style="font-family: 'Prompt', sans-serif !important;">แก้ไขสถานที่</h4>
                        </center>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo site_url() . 'Entrepreneur/Manage_company/Company_edit/edit_company/' ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="com_name">ชื่อสถานที่</label>
                                        <input type="text" id="com_name" name="com_name" class="form-control" style="width: 300px" placeholder="ใส่ชื่อสถานที่" value="<?php echo $arr_company[0]->com_name; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="com_description">รายละเอียดสถานที่</label>
                                        <input type="text" id="com_description" name="com_description" class="form-control" style="width: 900px" placeholder="ใส่รายละเอียดของสถานที่" value="<?php echo $arr_company[0]->com_description; ?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="com_description">เบอร์ติดต่อสถานที่</label>
                                        <input type="text" id="com_tel" name="com_tel" class="form-control" placeholder="ใส่เบอร์ติดต่อสถานที่" value="<?php echo $arr_company[0]->com_tel; ?>" required>
                                    </div>
                                </div>
                            </div>

                            <!-- เลือกรูปภาพสถานที่ -->
                            <div class="form-group">
                                <label for="com_file">รูปภาพประกอบสถานที่</label>
                            </div>
                            <input type="file" id="com_file" name="com_file[]" accept="image/*" multiple><br><br>
                            <!-- ส้นสุดเลือกรูปภาพสถานที่ -->

                            <!-- lat lon map -->
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="com_lat">Latitude</label>
                                        <input type="text" id="com_lat" name="com_lat" class="form-control" value="<?php echo $arr_company[0]->com_lat; ?>">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="com_lon">Longitude</label>
                                        <input type="text" id="com_lon" name="com_lon" class="form-control" value="<?php echo $arr_company[0]->com_lon; ?>">
                                    </div>
                                    <a class="btn btn-success text-white" style="border-radius: 100%;" onclick="show_maker(document.getElementById('com_lat').value, document.getElementById('com_lon').value)">
                                        <i class="material-icons">done</i>
                                    </a>
                                </div>
                            </div>

                            <div class="container-fluid">
                                <p style="font-size: 26px;">เลือกสถานที่ตั้ง</p>
                                <table class="table table-responsive">
                                    <tr>
                                        <td>
                                            <div id="map" style="width: 1050px; height: 400px;"></div>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <!-- id ของ company -->
                            <input type="hidden" name="com_id" value="<?php echo $arr_company[0]->com_id; ?>">
                            <a class="btn btn-secondary" href="<?php echo site_url() . 'Entrepreneur/Manage_company/Company_list/show_list_company'; ?>">ยกเลิก</a>
                            <button type="submit" class="btn btn-success">ยืนยัน</button>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script src="http://www.openlayers.org/api/OpenLayers.js"></script>
<script>
    $(document).ready(function() {
        init($('#com_lat').val(), $('#com_lon').val());
        let error = "<?php echo $this->session->userdata("error_edit_company"); ?>";
        if (error == 'fail') {
            swal("ล้มเหลว", "คุณทำการแก้ไขสถานที่ล้มเหลวเนื่องจากขนาดรูปภาพใหญ่เกินไป", "error");
            <?php echo $this->session->unset_userdata("error_edit_company"); ?>
        }
    });
    var map, vectorLayer, selectedFeature;
    var lat = <?= $arr_company[0]->com_lat ?>;
    var lon = <?= $arr_company[0]->com_lon ?>;
    // console.log(lat + ' ' + lon);
    var zoom = 16;
    var curpos = new Array();
    var markers = new OpenLayers.Layer.Markers("Markers");
    var position;

    var fromProjection = new OpenLayers.Projection("EPSG:4326"); // Transform from WGS 1984
    var toProjection = new OpenLayers.Projection("EPSG:900913"); // to Spherical Mercator Projection
    var cntrposition = new OpenLayers.LonLat(lon, lat).transform(fromProjection, toProjection);

    OpenLayers.Layer.OSM.HikeMap = OpenLayers.Class(OpenLayers.Layer.OSM, {
        initialize: function(name, options) {
            var url = [
                "http://a.tile.thunderforest.com/outdoors/${z}/${x}/${y}.png?apikey=698be2e6da1a43b191eb6265f1c002aa",
                "http://b.tile.thunderforest.com/outdoors/${z}/${x}/${y}.png?apikey=698be2e6da1a43b191eb6265f1c002aa",
                "http://c.tile.thunderforest.com/outdoors/${z}/${x}/${y}.png?apikey=698be2e6da1a43b191eb6265f1c002aa",
            ];
            var newArguments = [name, url, options];
            OpenLayers.Layer.OSM.prototype.initialize.apply(this, newArguments);
        },
    });

    /*
     * init
     * show map location company
     * @input lat, lon
     * @output open street map
     * @author Suwapat Saowarod 62160340
     * @Create Date 2564-08-07
     * @Update 2564-08-10
     */
    function init(lat, lon) {
        console.log(lat + ' ' + lon);
        $('#com_lat').val(lat);
        $('#com_lon').val(lon);
        map = new OpenLayers.Map("map");
        var cycleLayer = new OpenLayers.Layer.OSM.HikeMap("Hiking Map");
        map.addLayer(cycleLayer);
        map.setCenter(cntrposition, zoom);
        var click = new OpenLayers.Control.Click();
        map.addControl(click);
        click.activate();
        show_maker(lat, lon);
    };

    OpenLayers.Control.Click = OpenLayers.Class(OpenLayers.Control, {
        defaultHandlerOptions: {
            'single': true,
            'double': false,
            'pixelTolerance': 0,
            'stopSingle': false,
            'stopDouble': false
        },

        initialize: function(options) {
            this.handlerOptions = OpenLayers.Util.extend({}, this.defaultHandlerOptions);
            OpenLayers.Control.prototype.initialize.apply(this, arguments);
            this.handler = new OpenLayers.Handler.Click(this, {
                'click': this.trigger
            }, this.handlerOptions);
        },

        trigger: function(e) {
            var lonlat = map.getLonLatFromPixel(e.xy);
            lonlat1 = new OpenLayers.LonLat(lonlat.lon, lonlat.lat).transform(toProjection, fromProjection);

            markers.clearMarkers();
            $('#com_lat').val(lonlat1.lat);
            $('#com_lon').val(lonlat1.lon);
            show_maker(lonlat1.lat, lonlat1.lon);


        },
    });

    /*
     * show_maker
     * show marker in open street map
     * @input lat, lon
     * @output marker in open street map
     * @author Suwapat Saowarod 62160340
     * @Create Date 2564-08-07
     * @Update 2564-08-10
     */
    function show_maker(lon, lat) {
        console.log(lon + " " + lat);
        markers.clearMarkers();
        var lonLat = new OpenLayers.LonLat(lat, lon)
            .transform(
                new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
                map.getProjectionObject() // to Spherical Mercator Projection
            );

        var zoom = 16;

        map.addLayer(markers);

        markers.addMarker(new OpenLayers.Marker(lonLat));

        map.setCenter(lonLat, zoom);
    }
</script>