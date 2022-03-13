<!-- 
/*
* v_edit_event
* Display data event by entrepreneur
* @input arr_event
* @output form add company
* @author Acharaporn pornpattanasap
* @Create Date 2564-09-24
*/ 
-->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2)">
                    <div class="card-header" style="background-color: #8fbacb; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2)">
                        <center>
                            <h4 class="card-title text-white" style="font-family: 'Prompt', sans-serif !important;">
                                แก้ไขกิจกรรมการท่องเที่ยว</h4>
                        </center>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo base_url() . 'Admin/Manage_event/Admin_edit_event/edit_event_by_admin/' ?>" id="form_edit_eve" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="eve_com_id" value="<?php echo $arr_event[0]->com_id; ?>">
                            <!-- ดึงข้อมูลชื่อกิจกรรมจากดาต้าเบส -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="eve_name">ชื่อกิจกรรม</label>
                                    <input type="text" id="eve_name" name="eve_name" class="form-control" style="width: 300px" placeholder="ใส่ชื่อกิจกรรม" value="<?php echo $arr_event[0]->eve_name; ?>" onkeyup="check_name_event_ajax()" required>
                                    <span class="text-danger" id="error_eve_name"></span>
                                </div>
                                <!-- ข้อมูลหมวดหมู่ -->
                                <div class="col-lg-3">
                                    <label for="eve_cat_id">หมวดหมู่</label>
                                    <select name="eve_cat_id" class="form-control">
                                        <?php for ($i = 0; $i < count($arr_category); $i++) { ?>
                                            <!-- เงื่อนไขที่แสดงข้อมูลหมวดหมู่เดิมของกิจกรรม -->
                                            <?php if ($arr_category[$i]->eve_cat_id == $arr_event[0]->eve_cat_id) { ?>
                                                <option value="<?php echo $arr_category[$i]->eve_cat_id ?>" selected="selected">
                                                    <?php echo $arr_category[$i]->eve_cat_name ?></option>
                                            <?php } ?>
                                            <?php if ($arr_category[$i]->eve_cat_id != $arr_event[0]->eve_cat_id) { ?>
                                                <option value="<?php echo $arr_category[$i]->eve_cat_id ?>">
                                                    <?php echo $arr_category[$i]->eve_cat_name ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div><br>

                            <!-- Text input -->
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="eve_com_id">ชื่อสถานที่</label><span style="color: red;">
                                        (จำเป็นต้องมีสถานที่ที่ได้รับการอนุมัติก่อน)</span>
                                    <select name="eve_com_id" id="eve_com_id" class="form-control" required>
                                        <?php for ($i = 0; $i < count($arr_company); $i++) { ?>
                                            <?php if ($arr_company[$i]->com_id == $arr_event[0]->eve_com_id) { ?>
                                                <option value="<?php echo $arr_company[$i]->com_id ?>" selected="selected">
                                                    <?php echo $arr_company[$i]->com_name; ?></option>
                                            <?php } ?>
                                            <?php if ($arr_company[$i]->com_id != $arr_event[0]->eve_com_id) { ?>
                                                <option value="<?php echo $arr_company[$i]->com_id ?>">
                                                    <?php echo $arr_company[$i]->com_name; ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <label for="eve_point">คะแนนกิจกรรม</label>
                                    <input type="number" id="eve_point" name="eve_point" class="form-control" onblur="add_point()" style="border:solid 0.2px #B3B3E9; text-indent: 10px; padding: 0px 10px 0px 10px;" rows="5" placeholder="กรอกคะแนนกิจกรรม" required value="<?php echo $arr_event[0]->eve_point; ?>">
                                    <p id="err_message_point" style="color: red;font-size: 16px"></p>
                                    <!-- <p id="help_information" class="text-success" style="cursor: pointer;"><u>ช่วยเหลือ</u></p> -->
                                </div>
                                <div class="col-lg-3">
                                    <span id="help_information" class="material-icons" style="margin-top: 40px; cursor: pointer">
                                        help
                                    </span>
                                </div>
                            </div><br>


                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="eve_description">รายละเอียดกิจกรรม</label>
                                    <textarea id="eve_description" name="eve_description" class="form-control" style="border:solid 0.2px #B3B3E9; text-indent: 10px; padding: 0px 10px 0px 10px;" rows="5" placeholder="กรอกรายละเอียดกิจกรรม" required><?php echo $arr_event[0]->eve_description; ?> </textarea>
                                </div>
                            </div><br>

                            <!-- ******** -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="eve_location">รายละเอียดที่อยู่สถานที่</label>
                                    <input type="text" id="eve_location" name="eve_location" class="form-control" placeholder="ใส่บ้านเลขที่ หมู่บ้าน ซอย หมู่ ถนน ตำบล อำเภอ จังหวัด ไปรษณีย์ ตามลำดับ" value="<?php echo $arr_event[0]->eve_location; ?>" required>
                                </div>
                            </div><br>

                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="eve_start_date">วันที่เริ่มกิจกรรม</label>
                                    <input type="date" id="eve_start_date" name="eve_start_date" value="<?php echo $arr_event[0]->eve_start_date; ?>" class="form-control" min="<?php echo $date_now ?>" required>
                                </div>
                                <div class="col-lg-2"></div>
                                <div class="col-lg-4">
                                    <label for="eve_end_date">วันที่เสร็จสิ้นกิจกรรม</label>
                                    <input type="date" id="eve_end_date" name="eve_end_date" value="<?php echo $arr_event[0]->eve_end_date; ?>" class="form-control" min="<?php echo $date_now ?>" required>
                                </div>
                            </div><br>
                            <!-- เลือกรายละเอียดที่อยู่ -->
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="prv_id">จังหวัด</label>
                                    <select name="prv_id" id="prv_id" class="form-control" onblur="check_dis_by_province()">
                                        <?php for ($i = 0; $i < count($arr_province); $i++) { ?>
                                            <?php if ($arr_event[0]->prv_id == $arr_province[$i]->prv_id) { ?>
                                                <option value="<?php echo $arr_province[$i]->prv_id ?>" selected="selected"><?php echo $arr_province[$i]->prv_name_th ?></option>
                                            <?php } ?>
                                            <?php if ($arr_event[0]->prv_id != $arr_province[$i]->prv_id) { ?>
                                                <option value="<?php echo $arr_province[$i]->prv_id ?>"><?php echo $arr_province[$i]->prv_name_th ?></option>
                                            <?php } ?>

                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-lg-1"></div>
                                <div class="col-lg-3" id="div_district"></div>
                                <div class="col-lg-1"></div>
                                <div class="col-lg-3" id="div_parish"></div>
                            </div><br>
                            <!-- สิ้นสุดเลือกรายละเอียดที่อยู่ -->

                            <!-- เลือกรูปภาพประกอบกิจกรรม -->
                            <div class="form-group">
                                <label for="eve_file">รูปภาพประกอบกิจกรรม <br><span style="color: red; font-size: 13px;">(ต้องมีรูปภาพอย่างน้อย 1 ภาพ
                                        และขนาดรูปไม่เกิน 3000 KB)</span></label>
                            </div>

                            <input class="d-none" type="file" id="eve_file" name="eve_file[]" accept="image/*" onchange="upload_image_ajax()" multiple>
                            <button type="button" class="btn btn-info" onclick="document.getElementById('eve_file').click();">เพิ่มรูปภาพ</button>

                            <div class="card-body d-flex flex-wrap justify-content-start" id="card_image">
                                <?php for ($i = 0; $i < count($arr_event); $i++) { ?>
                                    <?php $arr_path = explode('.', $arr_event[$i]->eve_img_path) ?>
                                    <div id="<?php echo $arr_path[0] . '.' . $arr_path[1] ?>">
                                        <div class="image_container d-flex justify-content-center position-relative" style="border-radius: 7px; width: 200px; height:200px">
                                            <img src="<?php echo base_url() . 'image_event/' . $arr_event[$i]->eve_img_path; ?>" alt="Image">
                                            <span class="position-absolute" style="font-size: 25px;" onclick="unlink_old_image('<?php echo $arr_event[$i]->eve_img_path ?>')">&times;</span>
                                            <input type="text" value="<?php echo $arr_event[$i]->eve_img_path ?>" name="old_img[]" hidden>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div id="arr_del_img_new"></div>
                            <div id="arr_del_img_old"></div><br>
                            <!-- ส้นสุดเลือกรูปภาพกิจกรรม -->

                            <!-- lat lon map -->
                            <div class="row">
                                <div class="col">
                                    <span>ถ้าหากท่านรู้ ละติจูด ลองจิจูด สามารถใส่ข้อมูลด้านล่างได้เลย</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="eve_lat">ละติจูด</label>
                                    <input type="text" id="eve_lat" name="eve_lat" class="form-control" value="<?php echo $arr_event[0]->eve_lat; ?>">
                                </div>
                                <div class="col-lg-3">
                                    <label for="eve_lon">ลองจิจูด</label>
                                    <input type="text" id="eve_lon" name="eve_lon" class="form-control" value="<?php echo $arr_event[0]->eve_lon; ?>">
                                </div>
                                <a class="btn btn-success text-white" style="font-size:16px; padding:14px; border-radius: 100%;" onclick="show_maker(document.getElementById('eve_lat').value, document.getElementById('eve_lon').value)">
                                    <i class="material-icons" style="font-size:30px;">add_location</i>
                                </a>
                            </div><br><br>

                            <div class="row">
                                <div class="col-md-12">
                                    <h3><img src="<?php echo base_url() . 'assets/templete/picture/location.png' ?>" width="40px"> เลือกสถานที่ตั้ง</h3>
                                    <table class="table table-responsive">
                                        <tr>
                                            <td style="border: 2px solid black;">
                                                <div id="map" style="width: 900px; height: 400px;"></div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col">
                                    <label>ผู้แก้ไขกิจกรรม</label>
                                    <input type="text" id="admin_id" value="<?php echo $arr_admin ?>" disabled>
                                </div>
                            </div>

                            <!-- Submit button -->
                            <input type="hidden" name="eve_id" id="eve_id" value="<?php echo $arr_event[0]->eve_id; ?>">
                            <div style="text-align: right;">
                                <button type="button" value="Submit" class="btn btn-success" id="btn_sub" onclick="confirm_edit('<?php echo $arr_event[0]->eve_name; ?>')">บันทึก</button>
                                <a class="btn btn-secondary custom-a" style="color: white; background-color: #777777;" onclick="unlink_image_go_back()">ยกเลิก
                                </a>
                            </div>

                            <!-- modal edit -->
                            <div class="modal fade" tabindex="-1" role="dialog" id="modal_edit">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" style="font-family: 'Prompt', sans-serif !important;">แจ้งเตือน
                                            </h5>
                                        </div>
                                        <div class="modal-body">
                                            <p>คุณต้องการที่แก้ไขข้อมูลกิจกรรม <span id="eve_name_confirm"></span> ?</p>
                                            <br>
                                        </div>
                                        <div class="modal-footer">
                                            <button id="submit" class="btn btn-success success">ยืนยัน</button>
                                            <button type="button" class="btn btn-secondary" style="color: white; background-color: #777777;" data-dismiss="modal">ยกเลิก</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal แสดงข้อมูลช่วยเหลือการกำหนดคะแนนกิจกรรม -->
<div class="modal fade" role="dialog" id="score_information_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">ข้อมูลเพิ่มเติม</h5>
            </div>
            <div class="modal-body">
                <div class="table table-responsive" id="infor_eve_cat_modal">

                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" data-dismiss="modal">ตกลง</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        // รับค่าของ eve_lat และ eve_lon
        init($('#eve_lat').val(), $('#eve_lon').val());
        // นับจำนวนรูปภาพ
        check_count_image_btn();
        // เช็คอำเภอโดยใช้ไอดีของจังหวัด
        check_dis_by_province(<?= $arr_event[0]->dis_id ?>);
        // console.log(count_image);
        /*
         * -
         * ตารางช่วยเหลือการกำหนดคะแนนกิจกรรมตามประเภทของกิจกรรม
         * @input dis_id
         * @output -
         * @author Nantasiri Saiwaew 62160093
         * @Create Date 2564-12-20
         * @Update -
         */
        //show innformation
        $("#help_information").click(function() {
            $("#score_information_modal").modal()
            // เรียกฟังก์ชัน get_score_show_information 
            get_score_show_information()
        });
    });
    var map, vectorLayer, selectedFeature;
    var lat = <?= $arr_event[0]->eve_lat ?>;
    var lon = <?= $arr_event[0]->eve_lon ?>;
    // console.log(lat + ' ' + lon);
    var zoom = 16;
    var curpos = new Array();
    var markers = new OpenLayers.Layer.Markers("Markers");
    var position;
    var count_image = `<?= count($arr_image) ?>`;
    var check_btn_name = 0;

    var from_projection = new OpenLayers.Projection("EPSG:4326"); // Transform from WGS 1984
    var to_projection = new OpenLayers.Projection("EPSG:900913"); // to Spherical Mercator Projection
    var cntr_position = new OpenLayers.LonLat(lon, lat).transform(from_projection, to_projection);

    OpenLayers.Layer.OSM.HikeMap = OpenLayers.Class(OpenLayers.Layer.OSM, {
        initialize: function(name, options) {
            var new_arguments = [name, options];
            OpenLayers.Layer.OSM.prototype.initialize.apply(this, new_arguments);
        },
    });

    /*
     * init
     * show map location company
     * @input lat, lon
     * @output open street map
     * @author Acharaporn pornpattanasap 62160344
     * @Create Date 2564-08-07
     * @Update 2564-10-3
     */
    function init(lat, lon) {
        console.log(lat + ' ' + lon);
        $('#eve_lat').val(lat);
        $('#eve_lon').val(lon);
        map = new OpenLayers.Map("map");
        var cycle_layer = new OpenLayers.Layer.OSM.HikeMap("Hiking Map");
        map.addLayer(cycle_layer);
        map.setCenter(cntr_position, zoom);
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
            lonlat1 = new OpenLayers.LonLat(lonlat.lon, lonlat.lat).transform(to_projection, from_projection);

            markers.clearMarkers();
            $('#eve_lat').val(lonlat1.lat);
            $('#eve_lon').val(lonlat1.lon);
            show_maker(lonlat1.lat, lonlat1.lon);


        },
    });

    /*
     * show_maker
     * show marker in open street map
     * @input lat, lon
     * @output marker in open street map
     * @author Acharaporn pornpattansap 62160344
     * @Create Date 2564-08-07
     * @Update 2564-08-10
     */
    function show_maker(lon, lat) {
        console.log(lon + " " + lat);
        markers.clearMarkers();
        var lonLat = new OpenLayers.LonLat(lat, lon)
            .transform(
                new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
                new OpenLayers.Projection("EPSG:900913"),
                map.getProjectionObject() // to Spherical Mercator Projection
            );

        var zoom = 16;

        map.addLayer(markers);

        markers.addMarker(new OpenLayers.Marker(lonLat));

        map.setCenter(lonLat, zoom);
    }



    var count_image = <?= count($arr_event) ?>;
    // var check_btn_name = 0;

    // $(document).ready(function() {
    //     check_count_image_btn();
    // })

    /*
     * upload_image_ajax
     * upload image
     * @input eve_file
     * @output -
     * @author Acharaporn pornpattanasap 62160344
     * @Create Date 2564-09-27
     * @Update -
     */
    function upload_image_ajax() {
        var images = $('#eve_file')[0].files;
        var form_data = new FormData();
        var count_for_img = 0;
        // console.log(count_image);
        for (let i = 0; i < images.length; i++) {
            var name = images[i].name;
            var extension = name.split('.').pop().toLowerCase();
            form_data.append("eve_file[]", images[i]);
            count_image += 1;
            count_for_img += 1;
        }
        // console.log(form_data);
        $.ajax({
            // เรียก path ที่ controller Admin_add_event
            url: "<?php echo base_url() . "Admin/Manage_event/Admin_add_event/upload_image_ajax" ?>",
            method: "POST",
            dataType: "JSON",
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                if (data.search("error") == -1) {
                    document.getElementById('card_image').innerHTML += data;
                    $('#eve_file').val('');
                    check_count_image_btn();
                    // console.log(count_image);
                } else {
                    swal('เพิ่มรูปไม่สำเร็จ', 'ไฟล์ ' + name + ' มีขนาดใหญ่เกินไป', 'error');
                    $('#eve_file').val('');
                    count_image -= count_for_img;
                    check_count_image_btn();
                }
            },
            error: function() {
                console.log('fail');
                swal('เพิ่มรูปไม่สำเร็จ', 'ไฟล์ ' + name + ' มีขนาดใหญ่เกินไป', 'error');
                $('#eve_file').val('');
                count_image -= count_for_img;
                check_count_image_btn();
            }
        });
    }

    /*
     * unlink_new_image
     * unlink image
     * @input eve_file, card_image, data
     * @output -
     * @author Acharaporn pornpattanasap 62160344
     * @Create Date 2564-09-27
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
        console.log(count_image);
        check_count_image_btn();
    }

    /*
     * unlink_old_image
     * unlink image
     * @input pro_file, card_image, data
     * @output -
     * @author Suwapat Saowarod 62160340
     * @Create Date 2564-10-03
     * @Update -
     */
    function unlink_old_image(img_path) {
        let html = '';
        html += '<input name="del_old_img[]" value="' + img_path + '" hidden>';
        document.getElementById('arr_del_img_old').innerHTML += html;

        let file_name = img_path.split('.');
        // console.log('#'+file_name[0]+'.'+file_name[1]);
        document.getElementById(file_name[0] + '.' + file_name[1]).style = "display:none";
        count_image -= 1;
        console.log(count_image);
        check_count_image_btn();
    }

    /*
     * unlink_image_go_back
     * uplink image when cancel edit_event
     * @input new_img
     * @output -
     * @author Suwapat Saowarod 62160340
     * @Create Date 2564-09-29
     * @Update -
     */
    function unlink_image_go_back() {
        // ดึงค่าของ input ที่มี name ชื่อ new_img[] มาใส่ตัวแปร arr_image
        var arr_image = $("input[name='new_img[]']").map(function() {
            return $(this).val();
        }).get();
        console.log(arr_image);
        $.ajax({
            url: "<?php echo base_url() . "Admin/Manage_event/Admin_add_event/uplink_image_ajax" ?>",
            method: "POST",
            data: {
                arr_image: arr_image
            },
            success: function(data) {
                console.log(data);
                location.replace(
                    "<?php echo base_url() . "Admin/Manage_event/Admin_list_event/show_data_event_list" ?>")
            }
        })
    }

    /*
     * confirm_edit
     * confirm delete company
     * @input com_name_con, com_id_con
     * @output modal comfirm delete comepany
     * @author Suwapat Saowarod 62160340
     * @Create Date 2564-09-18
     * @Update -
     */
    function confirm_edit(eve_name_con) {
        $('#eve_name_confirm').text(eve_name_con);
        // $('#eve_name_confirm2').text(eve_name_con);
        $('#modal_edit').modal();

        $('#submit').click(function() {
            $('#form_edit_eve').submit();
        });
    }

    /*
     * check_count_image
     * check count image to disable btn submit
     * @input -
     * @output -
     * @author Suwapat Saowarod 62160340
     * @Create Date 2564-09-28
     * @Update 
     */
    function check_count_image_btn() {
        // if (count_image == 0 || check_btn_name == 1) {
        if (count_image == 0) {
            $('#btn_sub').prop('disabled', true);
        } else {
            $('#btn_sub').prop('disabled', false);
        }
    }

    /*
     * check_name_event_ajax
     * check name event by ajax
     * @input eve_name
     * @output -
     * @author Nantasiri Saiwaew 62160093
     * @Create Date 2564-10-12
     * @Update -
     */
    function check_name_event_ajax() {
        var eve_name = $('#eve_name').val();
        var eve_id = $('#eve_id').val();
        console.log(eve_id);
        $.ajax({
            url: "<?php echo site_url() . "Admin/Manage_event/Admin_edit_event/check_name_event_ajax" ?>",
            method: "POST",
            dataType: "JSON",
            data: {
                eve_name: eve_name,
                eve_id: eve_id
            },
            success: function(data) {
                // console.log(data);
                if (data == 1) {
                    // console.log(1);
                    $('#error_eve_name').html('ชื่อสถานที่นี้ได้ถูกใช้งานเเล้ว');
                    check_btn_name = 1;
                    check_count_image_btn()
                    // $('#btn_sub').prop('disabled', true); 
                } else if (data == 2) {
                    console.log(2);
                    $('#error_eve_name').html('');
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
    function check_dis_by_province(dis_id = null) {
        let prv_id = $('#prv_id').val();
        $.ajax({
            url: "<?php echo site_url() . "Admin/Manage_event/Admin_edit_event/get_district_by_prv_id_ajax" ?>",
            method: "POST",
            dataType: "JSON",
            data: {
                prv_id: prv_id
            },
            success: function(arr_district) {
                if (dis_id == null) {
                    let html_code = "";
                    html_code += '<label for="dis_id">อำเภอ</label>';
                    html_code += '<select name="dis_id" id="dis_id" class="form-control" onblur="check_par_by_district()">'
                    for (let i = 0; i < arr_district.length; i++) {
                        html_code += '<option value="' + arr_district[i].dis_id + '">' + arr_district[i].dis_name_th + '</option>';
                    }
                    html_code += '</select>';
                    $('#div_district').html(html_code);
                    check_par_by_district();
                } else {
                    let html_code = "";
                    html_code += '<label for="dis_id">อำเภอ</label>';
                    html_code += '<select name="dis_id" id="dis_id" class="form-control" onblur="check_par_by_district()">'
                    for (let i = 0; i < arr_district.length; i++) {
                        if (dis_id == arr_district[i].dis_id) {
                            html_code += '<option value="' + arr_district[i].dis_id + '" selected="selected">' + arr_district[i].dis_name_th + '</option>';
                        } else {
                            html_code += '<option value="' + arr_district[i].dis_id + '">' + arr_district[i].dis_name_th + '</option>';
                        }
                    }
                    html_code += '</select>';
                    $('#div_district').html(html_code);
                    check_par_by_district(<?= $arr_event[0]->eve_par_id ?>);
                }
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
    function check_par_by_district(par_id = null) {
        let dis_id = $('#dis_id').val();
        $.ajax({
            url: "<?php echo site_url() . "Admin/Manage_event/Admin_edit_event/get_parish_by_dis_id_ajax" ?>",
            method: "POST",
            dataType: "JSON",
            data: {
                dis_id: dis_id
            },
            success: function(arr_parish) {
                if (par_id == null) {
                    let html_code = "";
                    html_code += '<label for="par_id">ตำบล</label>';
                    html_code += '<select name="par_id" id="par_id" class="form-control">'
                    for (let i = 0; i < arr_parish.length; i++) {
                        html_code += '<option value="' + arr_parish[i].par_id + '">' + arr_parish[i].par_name_th + '</option>';
                    }
                    html_code += '</select>';
                    $('#div_parish').html(html_code);
                } else {
                    let html_code = "";
                    html_code += '<label for="par_id">ตำบล</label>';
                    html_code += '<select name="par_id" id="par_id" class="form-control">'
                    for (let i = 0; i < arr_parish.length; i++) {
                        if (par_id == arr_parish[i].par_id) {
                            html_code += '<option value="' + arr_parish[i].par_id + '" selected="selected">' + arr_parish[i].par_name_th + '</option>';
                        } else {
                            html_code += '<option value="' + arr_parish[i].par_id + '">' + arr_parish[i].par_name_th + '</option>';
                        }
                    }
                    html_code += '</select>';
                    $('#div_parish').html(html_code);
                }

            }
        })
    }
    /*
     * add_point
     * check point that admin added
     * @input -
     * @output -
     * @author Nantasiri Saiwaew 62160093
     * @Create Date 2564-12-20
     * @Update -
     */
    function add_point() {
        let eve_cat_id = $('#eve_cat_id').val();
        let point = $('#eve_point').val();
        console.log('pass');
        console.log(point);
        if (check_point(point, eve_cat_id) == true) {
            event.preventDefault();
            $('#err_message_point').html('กรุณาระบุคะแนนใหม่');
        }
    }

    /*
     * check_point
     * เช็คคะแนนตามประเภทของกิจกรรม
     * @input point eve_cat_id
     * @output -
     * @author Nantasiri Saiwaew 62160093
     * @Create Date 2564-12-20
     * @Update -
     */
    function check_point(point, eve_cat_id) {
        let arr_min_point = [1, 20, 30, 40];
        let arr_max_point = [19, 29, 39, 49];

        console.log(eve_cat_id);
        console.log(arr_min_point[eve_cat_id - 1]);
        console.log(arr_max_point[eve_cat_id - 1]);
        if (point < 1) {
            return true;
        } else if (point < arr_min_point[eve_cat_id - 1] || point > arr_max_point[eve_cat_id - 1]) {
            return true;
        } else {
            return false;
        }

    }

    function get_score_show_information() {
        let arr_min_point = [1, 20, 30, 40];
        let arr_max_point = [19, 29, 39, 49];
        $.ajax({
            url: '<?php echo base_url('Admin/Manage_event/Admin_add_event/get_data_category'); ?>',
            method: "POST",
            dataType: "JSON",
            success: function(json_data) {
                html_code = '';
                html_code += '<table class="table">';
                html_code += '<thead class="text-white" style="text-align: center;">';
                html_code += '<tr>';
                html_code += '<th><p>ชื่อประเภท</p></th>';
                html_code += '<th><p>ลดคาร์บอน (ต่อปี)</p></th>';
                html_code += '<th><p>ช่วงคะแนน</p></th>';
                html_code += '</tr>';
                html_code += ' </thead>';
                html_code += ' <tbody>';
                json_data['data_eve_cat'].forEach((row_evecat, index_eve_cat) => {
                    html_code += '<tr>';
                    html_code += '<td>' + '<p>' + json_data['data_eve_cat'][
                        index_eve_cat
                    ]['eve_cat_name'] + '</p>' + '</td>';
                    html_code += '<td class="text-center">' + '<p>' + json_data[
                            'data_eve_cat'][index_eve_cat]['eve_drop_carbon'] +
                        'kg' + '</p>' + '</td>';
                    html_code += '<td class="text-center">' + '<p>' +
                        arr_min_point[index_eve_cat] + '-' + arr_max_point[
                            index_eve_cat] + '</p>' + '</td>';
                    html_code += '</tr>';
                });
                $('#infor_eve_cat_modal').html(html_code);
            }
        });

    }
</script>