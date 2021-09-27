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
                            <input type="hidden" name="eve_com_id" value="<?php echo $arr_eve[0]->com_id; ?>">
                            <input type="hidden" name="eve_id" value="<?php echo $arr_eve[0]->eve_id; ?>">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="eve_name">ชื่อกิจกรรม</label>
                                    <input type="text" id="eve_name" name="eve_name" class="form-control"
                                        style="width: 300px" placeholder="ใส่ชื่อกิจกรรม"
                                        value="<?php echo $arr_eve[0]->eve_name; ?>" onkeyup="check_name_event_ajax()"
                                        required>
                                    <span class="text-danger" id="error_eve_name"></span>
                                </div>
                                <div class="col-lg-3">
                                    <label for="eve_cat_id">หมวดหมู่</label>
                                    <select name="eve_cat_id" id="eve_cat_id" class="form-control">
                                        <?php for ($i = 0; $i < count($arr_eve_cat); $i++) { ?>
                                        <?php if ($i + 1 == $arr_eve[0]->eve_cat_id) { ?>
                                        <option value="<?php echo $i + 1 ?>" selected="selected">
                                            <?php echo $arr_eve_cat[$i]->eve_cat_name; ?></option>
                                        <?php } ?>
                                        <?php if ($i + 1 != $arr_eve[0]->eve_cat_id) { ?>
                                        <option value="<?php echo $i + 1 ?>">
                                            <?php echo $arr_eve_cat[$i]->eve_cat_name; ?></option>
                                        <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div><br>

                            <!-- Text input -->
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="com_name">ชื่อสถานที่</label>
                                    <select name="eve_com_id" id="eve_com_id" class="form-control">
                                        <?php for ($i = 0; $i < count($arr_eve_com); $i++) { ?>
                                        <?php if ($i + 1 == $arr_eve[0]->eve_com_id) { ?>
                                        <option value="<?php echo $i + 1 ?>" onkeyup="check_name_event_ajax()" required
                                            selected="selected">
                                            <?php echo $arr_eve_com[$i]->com_name; ?></option>
                                        <?php } ?>
                                        <?php if ($i + 1 != $arr_eve_com[0]->eve_com_id) { ?>
                                        <option value="<?php echo $i + 1 ?>" onkeyup="check_name_event_ajax()" required>
                                            <?php echo $arr_eve_com[$i]->com_name; ?></option>
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
                                        required><?php echo $arr_eve[0]->eve_description; ?> </textarea>
                                </div>
                            </div><br>


                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="eve_start" style="color:black">วันที่เริ่มกิจกรรม</label>
                                    <input type="date" name="eve_start_date"
                                        value="<?php echo $arr_eve[0]->eve_start_date; ?>" required>
                                </div>
                            </div><br>

                            <div class="form-group">
                                <label for="eve_end" style="color:black">วันที่เสร็จสิ้นกิจกรรม</label>
                                <input type="date" name="eve_end_date" value="<?php echo $arr_eve[0]->eve_end_date; ?>"
                                    required>
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
                                <?php for ($i = 0; $i < count($arr_image); $i++) { ?>
                                <?php $arr_path = explode('.', $arr_image[$i]->eve_img_path) ?>
                                <div id="<?php echo $arr_path[0] . '.' . $arr_path[1] ?>">
                                    <div class="image_container d-flex justify-content-center position-relative"
                                        style="border-radius: 7px; width: 200px; height:200px">
                                        <img src="<?php echo base_url() . 'image_event/' . $arr_image[$i]->eve_img_path; ?>"
                                            alt="Image">
                                        <span class="position-absolute" style="font-size: 25px;"
                                            onclick="unlink_old_image('<?php echo $arr_image[$i]->eve_img_path ?>')">&times;</span>
                                        <input type="text" value="<?php echo $arr_image[$i]->eve_img_path ?>"
                                            name="old_img[]" hidden>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <div id="arr_del_img_new"></div>
                            <div id="arr_del_img_old"></div><br>
                            <!-- ส้นสุดเลือกรูปภาพกิจกรรม -->

                            <!-- Submit button -->
                            <input type="hidden" name="com_id" id="com_id" value="<?php echo $arr_eve[0]->eve_id; ?>">
                            <div style="text-align: right;">
                                <button type="button" value="Submit" class="btn btn-success" id="btn_sub"
                                    onclick="confirm_edit('<?php echo $arr_eve[0]->eve_name; ?>')">บันทึก</button>
                                <a class="btn btn-secondary" style="color: white; background-color: #777777;"
                                    href="<?php echo site_url() . 'Entrepreneur/Manage_event/Event_list/show_list_event'; ?>">ยกเลิก
                                </a>
                            </div>

                            <div class="modal fade" tabindex="-1" role="dialog" id="modal_edit">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"
                                                style="font-family: 'Prompt', sans-serif !important;">
                                                คุณเเน่ใจหรือไม่ ?</h5>
                                        </div>
                                        <div class="modal-body">
                                            <p>คุณต้องการที่แก้ไขกิจกรรม <span id="eve_name_confirm"></span> ?</p>
                                            <br>
                                            <p style="color: red;">***หากทำการแก้ไขข้อมูล กิจกรรม<span
                                                    id="eve_name_confirm">
                                                    จะกลับสู่สถานะรออนุมัติ</span>***</p>
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
var count_image = <?= count($arr_image) ?>;
var check_btn_name = 0;
/*
 * check_name_event_ajax
 * check name event by ajax
 * @input eve_name
 * @output -
 * @author Acharaporn pornpattanasp
 * @Create Date 2564-09-04
 * @Update -
 */
function check_name_event_ajax() {
    var eve_name = $('#eve_name').val();
    var eve_id = $('#eve_id').val();
    $.ajax({
        url: "<?php echo site_url() . "Entrepreneur/Manage_Event/Event_edit/check_name_event_ajax" ?>",
        method: "POST",
        dataType: "JSON",
        data: {
            eve_name: eve_name,
            eve_id: eve_id
        },
        success: function(data) {
            // console.log(data);
            if (data == 1) {
                console.log(1);
                $('#error_eve_name').html('ชื่อกิจกรรมนี้ได้ถูกใช้งานเเล้ว');
                check_btn_name = 1;
                check_count_image_btn();
                // $('#btn_sub').prop('disabled', true);
            } else if (data == 2) {
                console.log(2);
                $('#error_eve_name').html('');
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
 * @input eve_file
 * @output -
 * @author Acharaporn pornpattanasap
 * @Create Date 2564-09-09
 * @Update -
 */

function upload_image_ajax() {
    // console.log("mm");
    var images = $('#eve_file')[0].files;
    var form_data = new FormData();
    var count_for_img = 0;

    for (let i = 0; i < images.length; i++) {
        var name = images[i].name;
        var extension = name.split('.').pop().toLowerCase();
        form_data.append("eve_file[]", images[i]);
        count_image += 1;
        count_for_img += 1;
    }
    console.log(form_data);
    console.log(images);
    $.ajax({
        url: "<?php echo site_url() . "Entrepreneur/Manage_event/Event_edit/upload_image_ajax" ?>",
        method: "POST",
        dataType: "JSON",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
            // console.log(data);
            // if (data.search("error") == -1) {
            //     // $('#card_image').before(data);
            //     document.getElementById('card_image').innerHTML += data;
            //     $('#eve_file').val('');
            //     check_count_image_btn()
            //     console.log(count_image);
            // } else {
            //     swal('เพิ่มรูปไม่สำเร็จ', 'ไฟล์ ' + name + ' มีขนาดใหญ่เกินไป', 'error');
            //     $('#eve_file').val('');
            //     count_image -= count_for_img;
            //     check_count_image_btn()
            // }
            console.log(data);
        },
        error: function() {
            console.log('fail');
            swal('เพิ่มรูปไม่สำเร็จ', 'ไฟล์ ' + name + ' มีขนาดใหญ่เกินไป', 'error');
            $('#eve_file').val('');
            count_image -= count_for_img;
            check_count_image_btn()
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
    check_count_image_btn()
}

/*
 * unlink_old_image
 * unlink image
 * @input eve_file, card_image, data
 * @output -
 * @author Suwapat Saowarod 62160340
 * @Create Date 2564-09-09
 * @Update -
 */
function unlink_old_image(img_path) {
    let html = '';
    html += '<input name="del_old_img[]" value="' + img_path + '" hidden>';
    document.getElementById('arr_del_img_old').innerHTML += html;

    let file_name = eve_img_path.split('.');
    // console.log('#'+file_name[0]+'.'+file_name[1]);
    document.getElementById(file_name[0] + '.' + file_name[1]).style = "display:none";
    count_image -= 1;
    console.log(count_image);
    check_count_image_btn()
}

/*
 * check_count_image
 * check count image to disable btn submit
 * @input -
 * @output -
 * @author Acharaporn pornpattanasap 62160344
 * @Create Date 2564-08-28
 * @Update 2564-09-27
 */
function check_count_image_btn() {
    if (count_image == 0 || check_btn_name == 1) {
        $('#btn_sub').prop('disabled', true);
    } else {
        $('#btn_sub').prop('disabled', false);
    }
}

/*
 * confirm_edit
 * confirm delete event
 * @input eve_name_con, eve_id_con
 * @output modal comfirm delete comepany
 * @author Acharaporn pornpattanasap 62160344
 * @Create Date 2564-09-27
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