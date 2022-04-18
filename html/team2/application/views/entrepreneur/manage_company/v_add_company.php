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
                                <!-- ชื่อสถานที่ -->
                                <div class="col-lg-6">
                                    <label for="com_name">ชื่อสถานที่</label>
                                    <input type="text" id="com_name" name="com_name" class="form-control" placeholder="ใส่ชื่อสถานที่" onkeyup="check_name_company_ajax()" required>
                                    <span class="text-danger" id="error_com_name"></span>
                                </div>
                                <!-- หมวดหมู่สถานที่ -->
                                <div class="col-lg-3">
                                    <label for="com_cat_id">หมวดหมู่</label>
                                    <select name="com_cat_id" id="com_cat_id" class="form-control">
                                        <!-- วน loop เพื่อแสดงประเภทสถานที่ -->
                                        <?php for ($i = 0; $i < count($arr_com_cat); $i++) { ?>
                                            <option value="<?php echo $i + 1 ?>"><?php echo $arr_com_cat[$i]->com_cat_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div><br>

                            <div class="row">
                                <!-- รายละเอียดสถานที่ -->
                                <div class="col-lg-12">
                                    <label for="com_description">รายละเอียดสถานที่</label>
                                    <textarea id="com_description" name="com_description" class="form-control" style="border:solid 0.2px #B3B3E9; text-indent: 10px; padding: 0px 10px 0px 10px;" rows="5" placeholder="ใส่รายละเอียดของสถานที่" required></textarea>
                                </div>
                            </div><br>

                            <div class="row">
                                <!-- เบอร์โทรศัพท์ติดต่อสถานที่ -->
                                <div class="col-lg-4">
                                    <label for="com_tel">เบอร์โทรศัพท์ติดต่อสถานที่</label>
                                    <input type="text" id="com_tel" name="com_tel" class="form-control" placeholder="000-000-0000" maxlength="12" required>
                                </div>
                                <!-- เว้นวรรถ 1 col -->
                                <div class="col-lg-1"></div>
                                <!-- บ้านเลขที่ -->
                                <div class="col-lg-6">
                                    <label for="com_location">บ้านเลขที่</label>
                                    <input type="text" id="com_location" name="com_location" class="form-control" placeholder="ใส่บ้านเลขที่ หมู่บ้าน" required>
                                </div>
                            </div><br>

                            <!-- เลือกรายละเอียดที่อยู่ -->
                            <div class="row">
                                <!-- จังหวัด -->
                                <div class="col-lg-3">
                                    <label for="prv_id">จังหวัด</label>
                                    <select name="prv_id" id="prv_id" class="form-control" onblur="check_dis_by_province()">
                                        <?php for($i = 0; $i < count($arr_province); $i++){?>
                                            <option value="<?php echo $arr_province[$i]->prv_id?>"><?php echo $arr_province[$i]->prv_name_th?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                <!-- เว้นวรรถ 1 col -->
                                <div class="col-lg-1"></div>
                                <!-- อำเภอ -->
                                <div class="col-lg-3" id="div_district"></div>
                                <!-- เว้นวรรถ 1 col -->
                                <div class="col-lg-1"></div>
                                <!-- ตำบล -->
                                <div class="col-lg-3" id="div_parish"></div>
                            </div><br>
                            <!-- สิ้นสุดเลือกรายละเอียดที่อยู่ -->

                            <!-- เลือกรูปภาพสถานที่ -->
                            <div class="form-group">
                                <label for="com_file">รูปภาพประกอบสถานที่ <br><span style="color: red; font-size: 13px;">(ต้องมีรูปภาพอย่างน้อย 1 ภาพ และขนาดรูปไม่เกิน 3000 KB)</span></label>
                            </div>
                            <input class="d-none" type="file" id="com_file" name="com_file[]" accept="image/*" onchange="upload_image_ajax()" multiple>
                            <button type="button" class="btn btn-info" onclick="document.getElementById('com_file').click();">เพิ่มรูปภาพ</button>
                            <!-- รูปภาพสถานที่ -->
                            <div class="card-body d-flex flex-wrap justify-content-start" id="card_image"></div>
                            <!-- รูปที่ต้องการลบ ไม่แสดงในหน้า UI -->
                            <div id="arr_del_img_new"></div><br>
                            <!-- ส้นสุดเลือกรูปภาพสถานที่ -->

                            <!-- lat lon map -->
                            <div class="row">
                                <div class="col">
                                    <span>ถ้าหากท่านรู้ ละติจูด ลองจิจูด สามารถใส่ข้อมูลด้านล่างได้เลย</span>
                                </div>
                            </div>
                            <div class="row">
                                <!-- latitude -->
                                <div class="col-lg-3">
                                    <label for="com_lat">ละติจูด</label>
                                    <input type="text" id="com_lat" name="com_lat" class="form-control" value="" placeholder="ใส่ละติจูด">
                                </div>
                                <!-- longitude -->
                                <div class="col-lg-3">
                                    <label for="com_lon">ลองจิจูด</label>
                                    <input type="text" id="com_lon" name="com_lon" class="form-control" value="" placeholder="ใส่ลองจิจูด">
                                </div>
                                <a class="btn btn-success text-white" style="font-size:16px; padding:14px; border-radius: 100%;" onclick="show_maker(document.getElementById('com_lat').value, document.getElementById('com_lon').value)">
                                    <i class="material-icons" style="font-size:30px;">add_location</i>
                                </a>
                            </div><br><br>
                            
                            <!-- แมพ -->
                            <div class="container-fluid">
                                <h3><img src="<?php echo base_url() . 'assets/templete/picture/location.png' ?>" width="40px">  เลือกสถานที่ตั้ง</h3>
                                <table class="table table-responsive">
                                    <tr>
                                        <td style="border: 2px solid black;">
                                            <!-- แสดงแมพ -->
                                            <div id="map" style="width: 900px; height: 400px;"></div> 
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div style="text-align: right;">
                                <button type="submit" id="btn_sub" class="btn btn-success">บันทึก</button>
                                <a class="btn btn-secondary custom-a" style="color: white; background-color: #777777;" onclick="unlink_image_go_back()">ยกเลิก</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    /*
     * @author Suwapat Saowarod 62160340
     */
    $(document).ready(function() {
        set_lat_lon();
        let error = "<?php echo $this->session->userdata("error_add_company"); ?>";
        if (error == 'fail') { // ในกรณีที่เพิ่ม รูปไม่สำเร็จ
            swal("ล้มเหลว", "คุณทำการเพิ่มสถานที่ล้มเหลวเนื่องจากขนาดรูปภาพใหญ่เกินไป", "error");
            <?php echo $this->session->unset_userdata("error_add_company"); ?>
        }
        check_count_image_btn(); //เช็คเพื่อ จะสามารถให้กดปุ่มได้หรือปิดปุ่มได้
        check_dis_by_province(); //เช็คว่าจังหวัดอะไรเพื่อ ดึงอำเภอมาแสดง
    });

    // openstreet map
    var map, vector_layer, selected_feature;
    var zoom = 16; // set default zoom ap
    var curpos = new Array();
    var markers = new OpenLayers.Layer.Markers("Markers"); // marker หรือหมุดที่ปักบนแผนที่
    var position;
    var from_projection = new OpenLayers.Projection("EPSG:4326"); // Transform from WGS 1984
    var to_projection = new OpenLayers.Projection("EPSG:900913"); // to Spherical Mercator Projection
    var count_image = 0; // มีรูปหรือยัง
    var check_btn_name = 0; // มีชื่อซ้ำมั้ย

    OpenLayers.Layer.OSM.HikeMap = OpenLayers.Class(OpenLayers.Layer.OSM, {
        initialize: function(name, options) {
            var new_arguments = [name, options];
            OpenLayers.Layer.OSM.prototype.initialize.apply(this, new_arguments);
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
        var cntr_position = new OpenLayers.LonLat(lat, lon).transform(from_projection, to_projection);//กำหนดจุดตรงกลาง map ที่จะแสดง
        // console.log(lat, lon);
      
        map = new OpenLayers.Map("map");//สร้่าง map object สำหรับ openlayers
        var cycle_layer = new OpenLayers.Layer.OSM.HikeMap("Hiking Map");
        map.addLayer(cycle_layer);// เพิ่ม layer map
        map.setCenter(cntr_position, zoom); //กำหนดจุดตรงกลางและการ zoom ของ map ที่จะแสดง
        var click = new OpenLayers.Control.Click();
        // กำหนดประเภทของ map control bar
        map.addControl(click); 
        click.activate();
        show_maker(lat, lon); // แสดงหมุดบนแผนที่
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
            var lon_lat = map.getLonLatFromPixel(e.xy);
            lon_lat1 = new OpenLayers.LonLat(lon_lat.lon, lon_lat.lat).transform(to_projection, from_projection);
            
            // ลบ marker ตัวเก่าออก
            markers.clearMarkers();
            $('#com_lat').val(lon_lat1.lat); //นำค่า lat ไปใส่ใน input id='com_lat'
            $('#com_lon').val(lon_lat1.lon); //นำค่า lon ไปใส่ใน input id='com_lon'
            show_maker(lon_lat1.lat, lon_lat1.lon); // ปักหมุดโดยใช้ lat lon ใหม่
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
        markers.clearMarkers();// ลบ marker ตัวเก่าออก
        var lonLat = new OpenLayers.LonLat(lat, lon)
            .transform(
                new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
                new OpenLayers.Projection("EPSG:900913"), 
                map.getProjectionObject() // to Spherical Mercator Projection
            );

        var zoom = 16;

        map.addLayer(markers);// เพิ่ม layer map

        markers.addMarker(new OpenLayers.Marker(lonLat)); // marker หรือหมุดที่ปักบนแผนที่

        map.setCenter(lonLat, zoom); // ปรับตำแหน่งแผนที่
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
        // ดึง lat lon จากตำแหน่งของผู้ใช้
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
        // อัปโหลดรูปภาพ
        var images = $('#com_file')[0].files; 
        var form_data = new FormData();// สร้าง form
        var count_for_img = 0; // ตัวแปรที่เก็บไว้นับรูปในการอัปโหลด 1 ครั้ง

        // วน loop ตามจำนวนรูปภาพ
        for (let i = 0; i < images.length; i++) {
            var name = images[i].name
            form_data.append("com_file[]", images[i]);// เพิ่มค่าลงใน name ที่ชื่อ com_file[]
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
                if (data.search("error") == -1) {
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
            url: "<?php echo site_url() . "Entrepreneur/Manage_company/Company_add/unlink_image_ajax" ?>",
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

    /*
     * check_dis_by_province
     * check district by prv_id by ajax
     * @input prv_id
     * @output -
     * @author Suwapat Saowarod 62160340
     * @Create Date 2564-12-18
     * @Update -
     */
    function check_dis_by_province(){
        let prv_id = $('#prv_id').val();
        $.ajax({
            url: "<?php echo site_url() . "Entrepreneur/Manage_company/Company_add/get_district_by_prv_id_ajax"?>",
            method: "POST",
            dataType: "JSON",
            data: {
                prv_id: prv_id
            },
            success: function(arr_district){
                let html_code = "";
                html_code += '<label for="dis_id">อำเภอ</label>';
                html_code += '<select name="dis_id" id="dis_id" class="form-control" onblur="check_par_by_district()">'
                for (let i = 0; i < arr_district.length; i++) {
                    html_code += '<option value="' + arr_district[i].dis_id + '">'+ arr_district[i].dis_name_th +'</option>';
                }
                html_code += '</select>';
                $('#div_district').html(html_code);
                check_par_by_district();
            }
        })
    }

    /*
     * check_par_by_district
     * check parish by dis_id by ajax
     * @input dis_id
     * @output -
     * @author Suwapat Saowarod 62160340
     * @Create Date 2564-12-18
     * @Update -
     */
    function check_par_by_district(){
        let dis_id = $('#dis_id').val();
        $.ajax({
            url: "<?php echo site_url() . "Entrepreneur/Manage_company/Company_add/get_parish_by_dis_id_ajax"?>",
            method: "POST",
            dataType: "JSON",
            data: {
                dis_id: dis_id
            },
            success: function(arr_parish){
                let html_code = "";
                html_code += '<label for="par_id">ตำบล</label>';
                html_code += '<select name="par_id" id="par_id" class="form-control">'
                for (let i = 0; i < arr_parish.length; i++) {
                    html_code += '<option value="' + arr_parish[i].par_id + '">'+ arr_parish[i].par_name_th +'</option>';
                }
                html_code += '</select>';
                $('#div_parish').html(html_code);
            }
        })
    }

</script>