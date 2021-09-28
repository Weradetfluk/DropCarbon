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


<style>
.image_container {
    height: 120px;
    width: 200px;
    border-radius: 6px;
    overflow: hidden;
    margin: 10px;
}

.image_container img {
    height: 100%;
    width: auto;
    object-fit: cover;
}

.image_container span {
    top: -6px;
    right: 8px;
    color: red;
    font-size: 28px;
    font-weight: normal;
    cursor: pointer;
}
</style>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2)">
                    <div class="card-header"
                        style="background-color: #8fbacb; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2)">
                        <center>
                            <h4 class="card-title text-white" style="font-family: 'Prompt', sans-serif !important;">
                                แก้ไขกิจกรรมการท่องเที่ยว</h4>
                        </center>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo site_url() . 'Entrepreneur/Manage_event/Event_edit/edit_event/' ?>"
                            id="form_edit_eve" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="eve_com_id" value="<?php echo $arr_event[0]->com_id; ?>">
                            <input type="hidden" name="eve_id" value="<?php echo $arr_event[0]->eve_id; ?>">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="eve_name">ชื่อกิจกรรม</label>
                                    <input type="text" id="eve_name" name="eve_name" class="form-control"
                                        style="width: 300px" placeholder="ใส่ชื่อกิจกรรม"
                                        value="<?php echo $arr_event[0]->eve_name; ?>" onkeyup="check_name_event_ajax()"
                                        required>
                                    <span class="text-danger" id="error_eve_name"></span>
                                </div>
                                <div class="col-lg-3">
                                    <label for="eve_cat_id">หมวดหมู่</label>
                                    <select name="eve_cat_id" class="form-control">
                                        <?php for ($i = 0; $i < count($arr_category); $i++) { ?>
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
                                    <label for="com_name">ชื่อสถานที่</label>
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
                            </div><br>

                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="eve_description" style="color:black">รายละเอียดกิจกรรม</label>
                                    <textarea id="eve_description" name="eve_description" class="form-control"
                                        style="border:solid 0.2px #B3B3E9; text-indent: 10px; padding: 0px 10px 0px 10px;"
                                        rows="5" placeholder="กรอกรายละเอียดกิจกรรม"
                                        required><?php echo $arr_event[0]->eve_description; ?> </textarea>
                                </div>
                            </div><br>


                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="eve_start" style="color:black">วันที่เริ่มกิจกรรม</label>
                                    <input type="date" name="eve_start_date"
                                        value="<?php echo $arr_event[0]->eve_start_date; ?>" required>
                                </div>
                            </div><br>

                            <div class="form-group">
                                <label for="eve_end" style="color:black">วันที่เสร็จสิ้นกิจกรรม</label>
                                <input type="date" name="eve_end_date"
                                    value="<?php echo $arr_event[0]->eve_end_date; ?>" required>
                            </div><br>

                            <!-- เลือกรูปภาพประกอบกิจกรรม -->
                            <div class="form-group">
                                <label for="eve_file" style="color:black">รูปภาพประกอบสถานที่ <br><span
                                        style="color: red; font-size: 13px;">(ต้องมีรูปภาพอย่างน้อย 1 ภาพ
                                        และขนาดรูปไม่เกิน 3000 KB)</span></label>
                            </div>

                            <input class="d-none" type="file" id="eve_file" name="eve_file[]" accept="image/*"
                                onchange="upload_image_ajax()" multiple>
                            <button type="button" class="btn btn-info"
                                onclick="document.getElementById('eve_file').click();">เพิ่มรูปภาพ</button>

                            <div class="card-body d-flex flex-wrap justify-content-start" id="card_image">
                                <!-- <?php if ($arr_event[0]->eve_img_path != null) { ?> -->
                                <?php for ($i = 0; $i < count($arr_event); $i++) { ?>
                                <?php $arr_path = explode('.', $arr_event[$i]->eve_img_path) ?>
                                <div id="<?php echo $arr_path[0] . '.' . $arr_path[1] ?>">
                                    <div class="image_container d-flex justify-content-center position-relative"
                                        style="border-radius: 7px; width: 200px; height:200px">
                                        <img src="<?php echo base_url() . 'image_event/' . $arr_event[$i]->eve_img_path; ?>"
                                            alt="Image">
                                        <span class="position-absolute" style="font-size: 25px;"
                                            onclick="unlink_old_image('<?php echo $arr_event[$i]->eve_img_path ?>')">&times;</span>
                                        <input type="text" value="<?php echo $arr_event[$i]->eve_img_path ?>"
                                            name="old_img[]" hidden>
                                    </div>
                                </div>
                                <?php } ?>
                                <?php } ?>
                            </div>
                            <div id="arr_del_img_new"></div>
                            <div id="arr_del_img_old"></div><br>
                            <!-- ส้นสุดเลือกรูปภาพกิจกรรม -->

                            <!-- Submit button -->
                            <input type="hidden" name="eve_id" id="eve_id" value="<?php echo $arr_event[0]->eve_id; ?>">
                            <div style="text-align: right;">
                                <button type="button" value="Submit" class="btn btn-success" id="btn_sub"
                                    onclick="confirm_edit('<?php echo $arr_event[0]->eve_name; ?>')">บันทึก</button>
                                <a class="btn btn-secondary" style="color: white; background-color: #777777;"
                                    onclick="unlink_image_go_back()">ยกเลิก
                                </a>
                            </div>

                            <!-- modal edit -->
                            <div class="modal fade" tabindex="-1" role="dialog" id="modal_edit">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"
                                                style="font-family: 'Prompt', sans-serif !important;">คุณเเน่ใจหรือไม่ ?
                                            </h5>
                                        </div>
                                        <div class="modal-body">
                                            <p>คุณต้องการที่แก้ไขข้อมูลกิจกรรม <span id="eve_name_confirm"></span> ?</p>
                                            <br>
                                            <p style="color: red;">***หากทำการแก้ไขข้อมูล กิจกรรม <span
                                                    id="eve_name_confirm"> จะกลับสู่สถานะรออนุมัติ</span>***</p>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="#" id="submit" class="btn btn-success success">ยืนยัน</a>
                                            <button type="button" class="btn btn-secondary"
                                                style="color: white; background-color: #777777;"
                                                data-dismiss="modal">ยกเลิก</button>
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
var count_image = <?= count($arr_event) ?>;
var check_btn_name = 0;

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
        url: "<?php echo site_url() . "Entrepreneur/Manage_event/Event_edit/upload_image_ajax" ?>",
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
 * @input com_file, card_image, data
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
    // check_count_image_btn()
}

/*
 * unlink_old_image
 * unlink image
 * @input com_file, card_image, data
 * @output -
 * @author Acharaporn pornpattanasap 62160344
 * @Create Date 2564-09-27
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
    // check_count_image_btn()
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
        url: "<?php echo site_url() . "Entrepreneur/Manage_event/Event_edit/uplink_image_ajax" ?>",
        method: "POST",
        data: {
            arr_image: arr_image
        },
        success: function(data) {
            console.log(data);
            location.replace(
                "<?php echo site_url() . "Entrepreneur/Manage_event/Event_list/show_list_event" ?>")
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
    $('#modal_edit').modal();

    $('#submit').click(function() {
        $('#form_edit_eve').submit();
    });
}
</script>