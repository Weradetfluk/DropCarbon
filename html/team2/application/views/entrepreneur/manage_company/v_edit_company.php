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
                        <form action="<?php echo site_url() . 'Entrepreneur/Manage_company/Company_edit/edit_company/' ?>" id="form_edit_com" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="com_name">ชื่อสถานที่</label>
                                    <input type="text" id="com_name" name="com_name" class="form-control" style="width: 300px" placeholder="ใส่ชื่อสถานที่" value="<?php echo $arr_company[0]->com_name; ?>" onkeyup="check_name_company_ajax()" required>
                                    <span class="text-danger" id="error_com_name"></span>
                                </div>
                                <div class="col-lg-3">
                                    <label for="com_cat_id">หมวดหมู่</label>
                                    <select name="com_cat_id" id="com_cat_id" class="form-control" required>
                                        <?php for ($i = 0; $i < count($arr_com_cat); $i++) { ?>
                                            <?php if ($arr_com_cat[$i]->com_cat_id == $arr_company[0]->com_cat_id) { ?>
                                                <option value="<?php echo $arr_com_cat[$i]->com_cat_id ?>" selected="selected"><?php echo $arr_com_cat[$i]->com_cat_name; ?></option>
                                            <?php } ?>
                                            <?php if ($arr_com_cat[$i]->com_cat_id != $arr_company[0]->com_cat_id) { ?>
                                                <option value="<?php echo $arr_com_cat[$i]->com_cat_id ?>"><?php echo $arr_com_cat[$i]->com_cat_name; ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div><br>

                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="com_description">รายละเอียดสถานที่</label>
                                    <textarea id="com_description" name="com_description" class="form-control" style="border:solid 0.2px #B3B3E9; text-indent: 10px; padding: 0px 10px 0px 10px;" placeholder="ใส่รายละเอียดของสถานที่" rows="5" required><?php echo $arr_company[0]->com_description; ?></textarea>
                                </div>
                            </div><br>

                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="com_description">เบอร์โทรศัพท์ติดต่อสถานที่</label>
                                    <input type="text" id="com_tel" name="com_tel" class="form-control" placeholder="08x-xxx-xxxx" value="<?php echo $arr_company[0]->com_tel; ?>" required>
                                </div>
                                <div class="col-lg-1"></div>
                                <div class="col-lg-6">
                                    <label for="com_location">บ้านเลขที่</label>
                                    <input type="text" id="com_location" name="com_location" class="form-control" placeholder="ใส่บ้านเลขที่ หมู่บ้าน" value="<?php echo $arr_company[0]->com_location; ?>" required>
                                </div>
                            </div><br>

                            <!-- เลือกรายละเอียดที่อยู่ -->
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="prv_id">จังหวัด</label>
                                    <select name="prv_id" id="prv_id" class="form-control" onblur="check_dis_by_province()">
                                        <?php for($i = 0; $i < count($arr_province); $i++){?>
                                            <?php if($arr_company[0]->prv_id == $arr_province[$i]->prv_id){?>
                                                <option value="<?php echo $arr_province[$i]->prv_id?>" selected="selected"><?php echo $arr_province[$i]->prv_name_th?></option>
                                            <?php }?>
                                            <?php if($arr_company[0]->prv_id != $arr_province[$i]->prv_id){?>
                                                <option value="<?php echo $arr_province[$i]->prv_id?>"><?php echo $arr_province[$i]->prv_name_th?></option>
                                            <?php }?>
                                            
                                        <?php }?>
                                    </select>
                                </div>
                                <div class="col-lg-1"></div>
                                <div class="col-lg-3" id="div_district"></div>
                                <div class="col-lg-1"></div>
                                <div class="col-lg-3" id="div_parish"></div>
                            </div><br>
                            <!-- สิ้นสุดเลือกรายละเอียดที่อยู่ -->

                            <!-- เลือกรูปภาพสถานที่ -->
                            <div class="form-group">
                                <label for="com_file">รูปภาพประกอบสถานที่ <br><span style="color: red; font-size: 13px;">(ต้องมีรูปภาพอย่างน้อย 1 ภาพ และขนาดรูปไม่เกิน 3000 KB)</span></label>
                            </div>
                            <input class="d-none" type="file" id="com_file" name="com_file[]" accept="image/*" onchange="upload_image_ajax()" multiple>
                            <button type="button" class="btn btn-info" onclick="document.getElementById('com_file').click();">เพิ่มรูปภาพ</button>
                            <div class="card-body d-flex flex-wrap justify-content-start" id="card_image">
                                <?php for ($i = 0; $i < count($arr_image); $i++) { ?>
                                    <?php $arr_path = explode('.', $arr_image[$i]->com_img_path) ?>
                                    <div id="<?php echo $arr_path[0] . '.' . $arr_path[1] ?>">
                                        <div class="image_container d-flex justify-content-center position-relative" style="border-radius: 7px; width: 200px; height:200px">
                                            <img src="<?php echo base_url() . 'image_company/' . $arr_image[$i]->com_img_path; ?>" alt="Image">
                                            <span class="position-absolute" style="font-size: 25px;" onclick="unlink_old_image('<?php echo $arr_image[$i]->com_img_path ?>')">&times;</span>
                                            <input type="text" value="<?php echo $arr_image[$i]->com_img_path ?>" name="old_img[]" hidden>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div id="arr_del_img_new"></div>
                            <div id="arr_del_img_old"></div><br>
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
                                    <input type="text" id="com_lat" name="com_lat" class="form-control" value="<?php echo $arr_company[0]->com_lat; ?>">
                                </div>
                                <div class="col-lg-3">
                                    <label for="com_lon">ลองจิจูด</label>
                                    <input type="text" id="com_lon" name="com_lon" class="form-control" value="<?php echo $arr_company[0]->com_lon; ?>">
                                </div>
                                <a class="btn btn-success text-white" style="font-size:16px; padding:14px; border-radius: 100%;" onclick="show_maker(document.getElementById('com_lat').value, document.getElementById('com_lon').value)">
                                    <i class="material-icons" style="font-size:30px;">add_location</i>
                                </a>
                            </div><br><br>

                            <div class="row">
                                <div class="col-md-12">
                                <h3><img src="<?php echo base_url() . 'assets/templete/picture/location.png' ?>" width="40px">  เลือกสถานที่ตั้ง</h3>
                                    <table class="table table-responsive">
                                        <tr>
                                            <td style="border: 2px solid black;">
                                                <div id="map" style="width: 900px; height: 400px;"></div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <!-- id ของ company -->
                            <input type="hidden" name="com_id" id="com_id" value="<?php echo $arr_company[0]->com_id; ?>">
                            <div style="text-align: right;">
                                <button type="button" value="Submit" class="btn btn-success" id="btn_sub" onclick="confirm_edit('<?php echo $arr_company[0]->com_name; ?>')">บันทึก</button>
                                <a class="btn btn-secondary custom-a" style="color: white; background-color: #777777;" onclick="unlink_image_go_back()">ยกเลิก</a>
                            </div>

                            <!-- modal edit -->
                            <div class="modal fade" tabindex="-1" role="dialog" id="modal_edit">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" style="font-family: 'Prompt', sans-serif !important;">แจ้งเตือน</h5>
                                        </div>
                                        <div class="modal-body">
                                            <p>คุณต้องการที่แก้ไขข้อมูลสถานที่ <span id="com_name_confirm"></span> ?</p><br>
                                            <p style="color: red;">***หากทำการแก้ไขข้อมูลสถานที่ <span id="com_name_confirm2"></span>  จะกลับสู่สถานะรออนุมัติ***</p>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="#" id="submit" class="btn btn-success success">ยืนยัน</a>
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

<script>
    $(document).ready(function() {
        init($('#com_lat').val(), $('#com_lon').val());
        check_count_image_btn();
        check_dis_by_province(<?= $arr_company[0]->dis_id?>);
        // console.log(count_image);
    });
    var map, vector_layer, selected_feature;
    var lat = <?= $arr_company[0]->com_lat ?>;
    var lon = <?= $arr_company[0]->com_lon ?>;
    // console.log(lat + ' ' + lon);
    var zoom = 16;
    var curpos = new Array();
    var markers = new OpenLayers.Layer.Markers("Markers");
    var position;
    var count_image = <?= count($arr_image) ?>;
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
     * @author Suwapat Saowarod 62160340
     * @Create Date 2564-08-07
     * @Update 2564-08-10
     */
    function init(lat, lon) {
        console.log(lat + ' ' + lon);
        $('#com_lat').val(lat);
        $('#com_lon').val(lon);
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
                new OpenLayers.Projection("EPSG:900913"), 
                map.getProjectionObject() // to Spherical Mercator Projection
            );

        var zoom = 16;

        map.addLayer(markers);

        markers.addMarker(new OpenLayers.Marker(lonLat));

        map.setCenter(lonLat, zoom);
    }

    /*
     * check_name_company_ajax
     * check name company by ajax
     * @input com_name
     * @output -
     * @author Suwapat Saowarod 62160340
     * @Create Date 2564-09-04
     * @Update -
     */
    function check_name_company_ajax() {
        var com_name = $('#com_name').val();
        var com_id = $('#com_id').val();
        $.ajax({
            url: "<?php echo site_url() . "Entrepreneur/Manage_company/Company_edit/check_name_company_ajax" ?>",
            method: "POST",
            dataType: "JSON",
            data: {
                com_name: com_name,
                com_id: com_id
            },
            success: function(data) {
                // console.log(data);
                if (data == 1) {
                    console.log(1);
                    $('#error_com_name').html('ชื่อสถานที่นี้ได้ถูกใช้งานเเล้ว');
                    check_btn_name = 1;
                    check_count_image_btn();
                    // $('#btn_sub').prop('disabled', true);
                } else if (data == 2) {
                    console.log(2);
                    $('#error_com_name').html('');
                    check_btn_name = 0;
                    check_count_image_btn();
                    // $('#btn_sub').prop('disabled', false);
                }
            }
        })
    }

    /*
     * upload_image_ajax
     * upload image
     * @input com_file
     * @output -
     * @author Suwapat Saowarod 62160340
     * @Create Date 2564-09-09
     * @Update -
     */
    function upload_image_ajax() {
        var images = $('#com_file')[0].files;
        var form_data = new FormData();
        var count_for_img = 0;
        // console.log(count_image);
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
                if (data.search("error") == -1) {
                    document.getElementById('card_image').innerHTML += data;
                    $('#com_file').val('');
                    check_count_image_btn();
                    console.log(count_image);
                } else {
                    swal('เพิ่มรูปไม่สำเร็จ', 'ไฟล์ ' + name + ' มีขนาดใหญ่เกินไป', 'error');
                    $('#com_file').val('');
                    count_image -= count_for_img;
                    check_count_image_btn();
                }
            },
            error: function() {
                console.log('fail');
                swal('เพิ่มรูปไม่สำเร็จ', 'ไฟล์ ' + name + ' มีขนาดใหญ่เกินไป', 'error');
                $('#com_file').val('');
                count_image -= count_for_img;
                check_count_image_btn();
            }
        });
    }

    /*
     * unlink_new_image
     * unlink image
     * @input com_file, card_image, data
     * @output -
     * @author Suwapat Saowarod 62160340
     * @Create Date 2564-09-09
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
     * @input com_file, card_image, data
     * @output -
     * @author Suwapat Saowarod 62160340
     * @Create Date 2564-09-09
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

        // for (var i = 0; i < $("input[name='del_new_img[]']").length; i++) {
        //     $("input[name='del_new_img[]']").attr('name', 'new_img[]');
        // }

        // ดึงค่าของ input ที่มี name ชื่อ new_img[] มาใส่ตัวแปร arr_image
        var arr_image = $("input[name='new_img[]']").map(function() {
            return $(this).val();
        }).get();
        console.log(arr_image);
        $.ajax({
            url: "<?php echo site_url() . "Entrepreneur/Manage_company/Company_add/unlink_image_ajax" ?>",
            method: "POST",
            data: {
                arr_image: arr_image
            },
            success: function(data) {
                location.replace("<?php echo site_url() . "Entrepreneur/Manage_company/Company_list/show_list_company" ?>")
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
    function confirm_edit(com_name_con) {
        $('#com_name_confirm').text(com_name_con);
        $('#com_name_confirm2').text(com_name_con);
        $('#modal_edit').modal();

        $('#submit').click(function() {
            $('#form_edit_com').submit();
        });
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
    function check_dis_by_province(dis_id = null){
        let prv_id = $('#prv_id').val();
        $.ajax({
            url: "<?php echo site_url() . "Entrepreneur/Manage_company/Company_add/get_district_by_prv_id_ajax"?>",
            method: "POST",
            dataType: "JSON",
            data: {
                prv_id: prv_id
            },
            success: function(arr_district){
                if(dis_id == null){
                    let html_code = "";
                    html_code += '<label for="dis_id">อำเภอ</label>';
                    html_code += '<select name="dis_id" id="dis_id" class="form-control" onblur="check_par_by_district()">'
                    for (let i = 0; i < arr_district.length; i++) {
                        html_code += '<option value="' + arr_district[i].dis_id + '">'+ arr_district[i].dis_name_th +'</option>';
                    }
                    html_code += '</select>';
                    $('#div_district').html(html_code);
                    check_par_by_district();
                }else{
                    let html_code = "";
                    html_code += '<label for="dis_id">อำเภอ</label>';
                    html_code += '<select name="dis_id" id="dis_id" class="form-control" onblur="check_par_by_district()">'
                    for (let i = 0; i < arr_district.length; i++) {
                        if(dis_id == arr_district[i].dis_id){
                            html_code += '<option value="' + arr_district[i].dis_id + '" selected="selected">'+ arr_district[i].dis_name_th +'</option>';
                        }else{
                            html_code += '<option value="' + arr_district[i].dis_id + '">'+ arr_district[i].dis_name_th +'</option>';
                        }
                    }
                    html_code += '</select>';
                    $('#div_district').html(html_code);
                    check_par_by_district(<?= $arr_company[0]->com_par_id?>);
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
    function check_par_by_district(par_id = null){
        let dis_id = $('#dis_id').val();
        $.ajax({
            url: "<?php echo site_url() . "Entrepreneur/Manage_company/Company_add/get_parish_by_dis_id_ajax"?>",
            method: "POST",
            dataType: "JSON",
            data: {
                dis_id: dis_id
            },
            success: function(arr_parish){
                if(par_id == null){
                    let html_code = "";
                    html_code += '<label for="par_id">ตำบล</label>';
                    html_code += '<select name="par_id" id="par_id" class="form-control">'
                    for (let i = 0; i < arr_parish.length; i++) {
                        html_code += '<option value="' + arr_parish[i].par_id + '">'+ arr_parish[i].par_name_th +'</option>';
                    }
                    html_code += '</select>';
                    $('#div_parish').html(html_code);
                }else{
                    let html_code = "";
                    html_code += '<label for="par_id">ตำบล</label>';
                    html_code += '<select name="par_id" id="par_id" class="form-control">'
                    for (let i = 0; i < arr_parish.length; i++) {
                        if(par_id == arr_parish[i].par_id){
                            html_code += '<option value="' + arr_parish[i].par_id + '" selected="selected">'+ arr_parish[i].par_name_th +'</option>';
                        }else{
                            html_code += '<option value="' + arr_parish[i].par_id + '">'+ arr_parish[i].par_name_th +'</option>';
                        }
                    }
                    html_code += '</select>';
                    $('#div_parish').html(html_code);
                }
                
            }
        })
    }
</script>