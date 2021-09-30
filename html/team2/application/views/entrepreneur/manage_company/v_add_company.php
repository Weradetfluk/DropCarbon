<!-- 
/*
* v_add_company
* Display form add company by entrepreneur
* @input com_name, com_description, com_tel, com_file[], com_lat, com_lon
* @output form add company
* @author Suwapat Saowarod 62160340
* @Create Date 2564-07-18
*/ 
-->

<style>
    #map {
        height: 100%;
        width: auto;
    }
</style>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2)">
                    <div class="card-header" style="background-color: #8fbacb; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2)">
                        <center>
                            <h4 class="card-title text-white" style="font-family: 'Prompt', sans-serif !important;">เพิ่มสถานที่</h4>
                        </center>
                    </div>

                    <div class="card-body">
                        <!-- form add company -->
                        <form action="<?php echo site_url() . 'Entrepreneur/Manage_company/Company_add/add_company/' ?>" method="POST">
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="com_name">ชื่อสถานที่</label>
                                    <input type="text" id="com_name" name="com_name" class="form-control" placeholder="ใส่ชื่อสถานที่" onkeyup="check_name_company_ajax()" required>
                                    <span class="text-danger" id="error_com_name"></span>
                                </div>
                                <div class="col-lg-3">
                                    <label for="com_cat_id">หมวดหมู่</label>
                                    <select name="com_cat_id" id="com_cat_id" class="form-control">
                                        <?php for ($i = 0; $i < count($arr_com_cat); $i++) { ?>
                                            <option value="<?php echo $i + 1 ?>"><?php echo $arr_com_cat[$i]->com_cat_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div><br>

                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="com_description">รายละเอียดสถานที่</label>
                                    <textarea id="com_description" name="com_description" class="form-control" style="border:solid 0.2px #B3B3E9; text-indent: 10px; padding: 0px 10px 0px 10px;" rows="5" placeholder="ใส่รายละเอียดของสถานที่" required></textarea>
                                </div>
                            </div><br>

                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="com_tel">เบอร์โทรศัพท์ติดต่อสถานที่</label>
                                    <input type="text" id="com_tel" name="com_tel" class="form-control" placeholder="000-000-0000" maxlength="12" required>
                                </div>
                                <div class="col-lg-1"></div>
                                <div class="col-lg-6">
                                    <label for="com_tel">รายละเอียดที่อยู่สถานที่</label>
                                    <input type="text" id="com_location" name="com_location" class="form-control" placeholder="ใส่บ้านเลขที่ หมู่บ้าน ซอย หมู่ ถนน ตำบล อำเภอ จังหวัด ไปรษณีย์ ตามลำดับ" required>
                                </div>
                            </div><br>

                            <!-- เลือกรูปภาพสถานที่ -->
                            <div class="form-group">
                                <label for="com_file">รูปภาพประกอบสถานที่ <br><span style="color: red; font-size: 13px;">(ต้องมีรูปภาพอย่างน้อย 1 ภาพ และขนาดรูปไม่เกิน 3000 KB)</span></label>
                            </div>
                            <input class="d-none" type="file" id="com_file" name="com_file[]" accept="image/*" onchange="upload_image_ajax()" multiple>
                            <button type="button" class="btn btn-info" onclick="document.getElementById('com_file').click();">เพิ่มรูปภาพ</button>
                            <div class="card-body d-flex flex-wrap justify-content-start" id="card_image"></div>
                            <div id="arr_del_img_new"></div><br>
                            <!-- ส้นสุดเลือกรูปภาพสถานที่ -->

                            <!-- lat lon map -->
                            <div class="row">
                                <div class="col">
                                    <span>ถ้าหากท่านรู้ ละติจูด ลองจิจูด สามารถใส่ข้อมูลด้านล่างได้เลย</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="com_lat">ละติจูด</label>
                                    <input type="text" id="com_lat" name="com_lat" class="form-control" value="" placeholder="ใส่ละติจูด">
                                </div>
                                <div class="col-lg-3">
                                    <label for="com_lon">ลองจิจูด</label>
                                    <input type="text" id="com_lon" name="com_lon" class="form-control" value="" placeholder="ใส่ลองจิจูด">
                                </div>
                                <a class="btn btn-success text-white" style="font-size:16px; padding:14px; border-radius: 100%;" onclick="show_maker(document.getElementById('com_lat').value, document.getElementById('com_lon').value)">
                                    <i class="material-icons" style="font-size:30px;">add_location</i>
                                </a>
                            </div><br><br>

                            <div class="container-fluid">
                                <h3><img src="<?php echo base_url() . 'assets/templete/picture/location.png' ?>" width="3%">  เลือกสถานที่ตั้ง</h3>
                                <table class="table table-responsive">
                                    <tr>
                                        <td style="border: 2px solid black;">
                                            <div id="map" style="width: 900px; height: 400px;"></div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div style="text-align: right;">
                                <button type="submit" id="btn_sub" class="btn btn-success">บันทึก</button>
                                <a class="btn btn-secondary" style="color: white; background-color: #777777;" onclick="unlink_image_go_back()">ยกเลิก</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script src="https://www.openlayers.org/api/OpenLayers.js"></script>

<script>
    /*
     * @author Suwapat Saowarod 62160340
     */
    $(document).ready(function() {
        set_lat_lon();
        let error = "<?php echo $this->session->userdata("error_add_company"); ?>";
        if (error == 'fail') {
            swal("ล้มเหลว", "คุณทำการเพิ่มสถานที่ล้มเหลวเนื่องจากขนาดรูปภาพใหญ่เกินไป", "error");
            <?php echo $this->session->unset_userdata("error_add_company"); ?>
        }
        check_count_image_btn();
    });

    // openstreet map
    var map, vectorLayer, selectedFeature;
    var zoom = 16;
    var curpos = new Array();
    var markers = new OpenLayers.Layer.Markers("Markers");
    var position;
    var fromProjection = new OpenLayers.Projection("EPSG:4326"); // Transform from WGS 1984
    var toProjection = new OpenLayers.Projection("EPSG:900913"); // to Spherical Mercator Projection
    var count_image = 0;
    var check_btn_name = 0;

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
     * show map and get location user
     * @input lat, lon
     * @output open street map
     * @author Suwapat Saowarod 62160340
     * @Create Date 2564-08-07
     * @Update 2564-08-10
     */
    function init(lat, lon) {
        var cntrposition = new OpenLayers.LonLat(lat, lon).transform(fromProjection, toProjection);
        console.log(lat, lon);

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
        // console.log(lon + " " + lat);
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

    /*
     * set_lat_lon
     * set lat and lon
     * @input -
     * @output -
     * @author Suwapat Saowarod 62160340
     * @Create Date 2564-08-10
     * @Update -
     */
    function set_lat_lon() {
        navigator.geolocation.getCurrentPosition((position) => {
            $('#com_lat').val(position.coords.latitude);
            $('#com_lon').val(position.coords.longitude);
            var lat = position.coords.latitude;
            var lon = position.coords.longitude;
            init(lat, lon);
        });
    }

    /*
     * upload_image_ajax
     * upload image for company
     * @input com_file, card_image, data
     * @output -
     * @author Suwapat Saowarod 62160340
     * @Create Date 2564-08-26
     * @Update -
     */
    function upload_image_ajax() {
        var images = $('#com_file')[0].files;
        var form_data = new FormData();
        var count_for_img = 0;
        console.log(count_image);
        for (let i = 0; i < images.length; i++) {
            var name = images[i].name;
            var extension = name.split('.').pop().toLowerCase();
            form_data.append("com_file[]", images[i]);
            count_image += 1;
            count_for_img += 1;
        }

        $.ajax({
            url: "<?php echo site_url() . "Entrepreneur/Manage_company/Company_add/upload_image_ajax" ?>",
            method: "POST",
            dataType: "JSON",
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                // console.log(data);
                if (data.search("error") == -1) {
                    // $('#card_image').before(data);
                    document.getElementById('card_image').innerHTML += data;
                    $('#com_file').val('');
                    check_count_image_btn()
                } else {
                    swal('เพิ่มรูปไม่สำเร็จ', 'ไฟล์ ' + name + ' มีขนาดใหญ่เกินไป', 'error');
                    $('#com_file').val('');
                    count_image -= count_for_img;
                    check_count_image_btn()
                }
            },
            error: function() {
                console.log('fail');
                swal('เพิ่มรูปไม่สำเร็จ', 'ไฟล์ ' + name + ' มีขนาดใหญ่เกินไป', 'error');
                $('#com_file').val('');
                count_image -= count_for_img;
                check_count_image_btn()
            }
        });
    }

    /*
     * unlink_new_image
     * unlink image
     * @input img_path
     * @output -
     * @author Suwapat Saowarod 62160340
     * @Create Date 2564-08-26
     * @Update -
     */
    function unlink_new_image(img_path) {
        let html = '';
        html += '<input name="del_new_img[]" value="' + img_path + '" hidden>';
        document.getElementById('arr_del_img_new').innerHTML += html;

        let file_name = img_path.split('.');
        // console.log('#'+file_name[0]+'.'+file_name[1]);
        document.getElementById(file_name[0] + '.' + file_name[1]).style = "display:none";
        count_image -= 1;
        check_count_image_btn()
    }

    /*
     * check_count_image
     * check count image to disable btn submit
     * @input -
     * @output -
     * @author Suwapat Saowarod 62160340
     * @Create Date 2564-08-28
     * @Update 2564-09-10
     */
    function check_count_image_btn() {
        if (count_image == 0 || check_btn_name == 1) {
            $('#btn_sub').prop('disabled', true);
        } else {
            $('#btn_sub').prop('disabled', false);
        }
    }

    /*
     * unlink_image_go_back
     * uplink image when cancel add company
     * @input new_img
     * @output -
     * @author Suwapat Saowarod 62160340
     * @Create Date 2564-08-28
     * @Update 2564-09-09
     */
    function unlink_image_go_back() {
        // ดึงค่าของ input ที่มี name ชื่อ new_img[] มาใส่ตัวแปร arr_image
        var arr_image = $("input[name='new_img[]']").map(function() {
            return $(this).val();
        }).get();
        // console.log(arr_image);
        $.ajax({
            url: "<?php echo site_url() . "Entrepreneur/Manage_company/Company_add/uplink_image_ajax" ?>",
            method: "POST",
            data: {
                arr_image: arr_image
            },
            success: function(data) {
                // console.log(data);
                location.replace("<?php echo site_url() . "Entrepreneur/Manage_company/Company_list/show_list_company" ?>")
            }
        })
    }

    /*
     * check_name_company_ajax
     * check name company by ajax
     * @input com_name
     * @output -
     * @author Suwapat Saowarod 62160340
     * @Create Date 2564-09-03
     * @Update -
     */
    function check_name_company_ajax() {
        var com_name = $('#com_name').val();
        // console.log(com_name);
        $.ajax({
            url: "<?php echo site_url() . "Entrepreneur/Manage_company/Company_add/check_name_company_ajax" ?>",
            method: "POST",
            dataType: "JSON",
            data: {
                com_name: com_name
            },
            success: function(data) {
                // console.log(data);
                if (data == 1) {
                    console.log(1);
                    $('#error_com_name').html('ชื่อสถานที่นี้ได้ถูกใช้งานเเล้ว');
                    check_btn_name = 1;
                    check_count_image_btn()
                    // $('#btn_sub').prop('disabled', true); 
                } else if (data == 2) {
                    console.log(2);
                    $('#error_com_name').html('');
                    check_btn_name = 0;
                    check_count_image_btn()
                    // $('#btn_sub').prop('disabled', false);
                }
            }
        })
    }
</script>