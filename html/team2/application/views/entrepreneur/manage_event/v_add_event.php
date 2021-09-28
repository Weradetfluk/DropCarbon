<!-- 
/*
* v_add_event
* Display form add event by entrepreneur
* @input eve_name, eve_description, eve_tel, eve_file[]
* @output form add evepany
* @author Priyarat Bumrungkit 62160156
* @Create Date 2564-09-25
*/ 
-->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2)">
                    <div class="card-header" style="background-color: #8fbacb; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2)">
                        <center>
                            <h4 class="card-title text-white" style="font-family: 'Prompt', sans-serif !important;">เพิ่มกิจกรรมการท่องเที่ยว</h4>
                        </center>
                    </div>

                    <div class="card-body">
                        <form action="<?php echo site_url() . 'Entrepreneur/Manage_event/Event_add/add_event/' ?>" id="form_edit_eve" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="eve_name">ชื่อกิจกรรม</label>
                                    <input type="text" id="eve_name" name="eve_name" class="form-control" placeholder="กรอกชื่อกิจกรรม" onkeyup="check_name_event_ajax()" required>
                                    <span class="text-danger" id="error_eve_name"></span>
                                </div>

                                <div class="col-lg-3">
                                    <label for="eve_cat_id">หมวดหมู่</label>
                                    <select name="eve_cat_id" class="form-control" required>
                                        <?php for ($i = 0; $i < count($arr_category); $i++) { ?>
                                            <option value="<?php echo $i + 1 ?>"><?php echo $arr_category[$i]->eve_cat_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div><br>


                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="com_name">ชื่อสถานที่</label>
                                    <select name="eve_com_id" id="eve_com_id" class="form-control" required>
                                        <?php for ($i = 0; $i < count($arr_company); $i++) { ?>
                                            <?php if ($arr_company[$i]->com_id == $arr_event[0]->eve_com_id) { ?>
                                                <option value="<?php echo $arr_company[$i]->com_id ?>" selected="selected"><?php echo $arr_company[$i]->com_name; ?></option>
                                            <?php } ?>
                                            <?php if ($arr_company[$i]->com_id != $arr_event[0]->eve_com_id) { ?>
                                                <option value="<?php echo $arr_company[$i]->com_id ?>"><?php echo $arr_company[$i]->com_name; ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div><br>

                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="eve_description">รายละเอียดกิจกรรม</label>
                                    <textarea id="eve_description" name="eve_description" class="form-control" style="border:solid 0.2px #B3B3E9; text-indent: 10px; padding: 0px 10px 0px 10px;" rows="5" placeholder="กรอกรายละเอียดของกิจกรรม" required></textarea>
                                </div>
                            </div><br>

                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="eve_start_date">วันที่เริ่มกิจกรรม</label>
                                    <input type="date" id="eve_start_date" name="eve_start_date" required>
                                </div>
                                <div class="col-lg-6">
                                    <label for="eve_end_date">วันที่เสร็จสิ้นกิจกรรม</label>
                                    <input type="date" id="eve_end_date" name="eve_end_date" required>
                                </div>
                            </div><br>

                            <!-- เลือกรูปภาพกิจกรรม -->
                            <div class="form-group">
                                <label for="eve_file">รูปภาพประกอบกิจกรรม <br><span style="color: red; font-size: 13px;">(ต้องมีรูปภาพอย่างน้อย 1 ภาพ และขนาดรูปไม่เกิน 3000 KB)</span></label>
                            </div>
                            <input class="d-none" type="file" id="eve_file" name="eve_file[]" accept="image/*" onchange="upload_image_ajax()" multiple>
                            <button type="button" class="btn btn-info" onclick="document.getElementById('eve_file').click();">เพิ่มรูปภาพ</button>
                            <div class="card-body d-flex flex-wrap justify-content-start" id="card_image"></div>
                            <div id="arr_del_img_new"></div><br>
                            <!-- ส้นสุดเลือกรูปภาพกิจกรรม -->

                            <!-- Submit button -->
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

<script>

    var count_image = 0;

    /*
     * @author Suwapat Saowarod 62160340
     */
    $(document).ready(function() {
        // check_count_image_btn();
    });


    /*
     * upload_image_ajax
     * upload image for event
     * @input eve_file, card_image, data
     * @output -
     * @author Priyarat Bumrungkit 62160156
     * @Create Date 2564-09-26
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
            url: "<?php echo site_url() . "Entrepreneur/Manage_event/Event_add/upload_image_ajax" ?>",
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
                    // check_count_image_btn()
                    console.log(count_image);
                } else {
                    swal('เพิ่มรูปไม่สำเร็จ', 'ไฟล์ ' + name + ' มีขนาดใหญ่เกินไป', 'error');
                    $('#eve_file').val('');
                    count_image -= count_for_img;
                    // check_count_image_btn()
                }
            },
            error: function() {
                console.log('fail');
                swal('เพิ่มรูปไม่สำเร็จ', 'ไฟล์ ' + name + ' มีขนาดใหญ่เกินไป', 'error');
                $('#eve_file').val('');
                count_image -= count_for_img;
                // check_count_image_btn()
            }
        });
    }

    /*
     * unlink_new_image
     * unlink image
     * @input img_path
     * @output -
     * @author Priyarat Bumrungkit 62160156
     * @Create Date 2564-09-26
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
        // check_count_image_btn()
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
     * @author Priyarat Bumrungkit 62160156
     * @Create Date 2564-09-28
     * @Update 
     */
    function unlink_image_go_back() {
        // ดึงค่าของ input ที่มี name ชื่อ new_img[] มาใส่ตัวแปร arr_image
        var arr_image = $("input[name='new_img[]']").map(function() {
            return $(this).val();
        }).get();
        // console.log(arr_image);
        $.ajax({
            url: "<?php echo site_url() . "Entrepreneur/Manage_event/Event_add/uplink_image_ajax" ?>",
            method: "POST",
            data: {
                arr_image: arr_image
            },
            success: function(data) {
                // console.log(data);
                location.replace("<?php echo site_url() . "Entrepreneur/Manage_event/Event_list/show_list_event" ?>")
            }
        })
    }
</script>