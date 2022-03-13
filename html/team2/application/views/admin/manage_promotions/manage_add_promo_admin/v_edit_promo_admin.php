<!-- 
/*
* v_edit_promotion
* Display form edti promotion by entrepreneur
* @input arr_category
* @output form add promotion
* @author Kasama Donwong 62160074
* @Create Date 2564-12-24
*/ 
-->
<!-- ส่วนการทำงานหลัก -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2)">
                    <div class="card-header" style="background-color: #8fbacb; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2)">
                        <center>
                            <h4 class="card-title text-white" style="font-family: 'Prompt', sans-serif !important;">
                                แก้ไขโปรโมชัน</h4>
                        </center>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo base_url() . 'Admin/Manage_promotions/Admin_edit_promotions/edit_promotion' ?>" id="form_edit_pro" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <!-- ส่วนการแก้ไขชื่อ -->
                                <div class="col-lg-6">
                                    <label for="pro_name">ชื่อโปรโมชัน</label>
                                    <input type="text" id="pro_name" name="pro_name" class="form-control" placeholder="กรอกชื่อกิจกรรม" value="<?php echo $arr_promotion[0]->pro_name ?>" required>
                                    <span class="text-danger" id="error_pro_name"></span>
                                </div>
                                <!-- ส่วนการแก้ไขหมวดหมู่ -->
                                <div class="col-lg-3">
                                    <label for="pro_cat_id">หมวดหมู่</label>
                                    <select name="pro_cat_id" id="pro_cat_id" class="form-control" onchange="check_category()" required>
                                        <?php if (count($arr_category) != 0) { ?>
                                            <?php for ($i = 0; $i < count($arr_category); $i++) { ?>
                                                <?php if ($arr_category[$i]->pro_cat_id == $arr_promotion[0]->pro_cat_id) { ?>
                                                    <option value="<?php echo $i + 1 ?>" selected="selected">
                                                        <?php echo $arr_category[$i]->pro_cat_name; ?></option>
                                                <?php } ?>
                                                <?php if ($arr_category[$i]->pro_cat_id != $arr_promotion[0]->pro_cat_id) { ?>
                                                    <option value="<?php echo $i + 1 ?>">
                                                        <?php echo $arr_category[$i]->pro_cat_name; ?></option>
                                                <?php } ?>
                                            <?php } ?>
                                        <?php } ?>
                                        <?php if (count($arr_category) == 0) { ?>
                                            <option value="0">ไม่มีหมวดหหมู่</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div><br>
                            <!-- ส่วนการแก้ไขสถานที่ -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="pro_com_id">ชื่อสถานที่</label><span style="color: red;"> (จำเป็นต้องมีสถานที่ที่ได้รับการอนุมัติก่อน)</span>
                                    <select name="pro_com_id" id="pro_com_id" class="form-control" required>
                                        <?php if (count($arr_company) != 0) { ?>
                                            <?php for ($i = 0; $i < count($arr_company); $i++) { ?>
                                                <?php if ($arr_company[$i]->com_id == $arr_promotion[0]->pro_com_id) { ?>
                                                    <option value="<?php echo $arr_company[$i]->com_id ?>" selected="selected">
                                                        <?php echo $arr_company[$i]->com_name; ?></option>
                                                <?php } ?>
                                                <?php if ($arr_company[$i]->com_id != $arr_promotion[0]->pro_com_id) { ?>
                                                    <option value="<?php echo $arr_company[$i]->com_id ?>">
                                                        <?php echo $arr_company[$i]->com_name; ?></option>
                                                <?php } ?>
                                            <?php } ?>
                                        <?php } ?>
                                        <?php if (count($arr_company) == 0) { ?>
                                            <option value="0">ไม่มีสถานที่</option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <!-- ส่วนการแก้ไขคะแนนโปรโมชัน -->
                                <div class="col-lg-4" id="div-point">
                                    <label for="pro_point">คะเเนนโปรโมชัน</label>
                                    <input type="number" name="pro_point" id="pro_point" class="form-control" placeholder="กรอกคะเเนนที่ใช้เเลกโปรโมชัน" value="<?php echo $arr_promotion[0]->pro_point ?>" required>
                                </div>
                            </div><br>
                            <!-- ส่วนการแก้ไขรายละเอียดโปรโมชัน -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="pro_description">รายละเอียดโปรโมชัน</label>
                                    <textarea id="pro_description" name="pro_description" class="form-control" style="border:solid 0.2px #B3B3E9; text-indent: 10px; padding: 0px 10px 0px 10px;" rows="5" placeholder="กรอกรายละเอียดของโปรโมชัน" required><?php echo $arr_promotion[0]->pro_description ?></textarea>
                                </div>
                            </div><br>
                            <!-- ส่วนการแก้ไขวันที่เริ่มและสิ้นสุดโปรโมชัน -->
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="pro_start_date">วันที่เริ่มโปรโมชัน</label>
                                    <input type="date" id="pro_start_date" name="pro_start_date" class="form-control" min="<?php echo $date_now ?>" value="<?php echo $arr_promotion[0]->pro_start_date ?>" required>
                                </div>
                                <div class="col-lg-2"></div>
                                <div class="col-lg-4">
                                    <label for="pro_end_date">วันที่เสร็จสิ้นโปรโมชัน</label>
                                    <input type="date" id="pro_end_date" name="pro_end_date" class="form-control" min="<?php echo $date_now ?>" value="<?php echo $arr_promotion[0]->pro_end_date ?>" required>
                                </div>
                            </div><br>
                            <!-- ส่วนการแก้ไขรูปภาพโปรโมชัน -->
                            <div class="form-group">
                                <label for="pro_file">รูปภาพประกอบโปรโมชัน <br><span style="color: red; font-size: 13px;">(ต้องมีรูปภาพอย่างน้อย 1 ภาพ
                                        และขนาดรูปไม่เกิน 3000 KB)</span></label>
                            </div>
                            <input class="d-none" type="file" id="pro_file" name="pro_file[]" accept="image/*" onchange="upload_image_ajax()" multiple>
                            <button type="button" class="btn btn-info" onclick="document.getElementById('pro_file').click();">เพิ่มรูปภาพ</button>
                            <div class="card-body d-flex flex-wrap justify-content-start" id="card_image">
                                <?php for ($i = 0; $i < count($arr_promotion); $i++) { ?>
                                    <?php $arr_path = explode('.', $arr_promotion[$i]->pro_img_path) ?>
                                    <div id="<?php echo $arr_path[0] . '.' . $arr_path[1] ?>">
                                        <div class="image_container d-flex justify-content-center position-relative" style="border-radius: 7px; width: 200px; height:200px">
                                            <img src="<?php echo base_url() . 'image_promotions/' . $arr_promotion[$i]->pro_img_path; ?>" alt="Image">
                                            <span class="position-absolute" style="font-size: 25px;" onclick="unlink_old_image('<?php echo $arr_promotion[$i]->pro_img_path ?>')">&times;</span>
                                            <input type="text" value="<?php echo $arr_promotion[$i]->pro_img_path ?>" name="old_img[]" hidden>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div id="arr_del_img_new"></div>
                            <div id="arr_del_img_old"></div><br>
                            <!-- แสดงชื่อผู้แก้ไขกิจกรรม -->
                            <div class="row">
                                <div class="col-lg-2">
                                    <label>ผู้แก้ไขกิจกรรม</label>
                                    <input type="text" id="admin_id" class="form-control" value="<?php echo $arr_admin ?>" disabled>
                                </div>
                            </div>
                            <!-- ไอดีโปรโมชัน -->
                            <input type="hidden" name="pro_id" id="pro_id" value="<?php echo $arr_promotion[0]->pro_id; ?>">
                            <div style="text-align: right;">
                                <!-- ปุ่มบันทึก -->
                                <button type="button" id="btn_sub" class="btn btn-success" onclick="confirm_edit('<?php echo $arr_promotion[0]->pro_name ?>')">บันทึก</button>
                                <!-- ปุ่มยกเลิก -->
                                <a class="btn btn-secondary" style="color: white; background-color: #777777;" onclick="unlink_image_go_back()">ยกเลิก</a>
                            </div>

                            <!--  หน้าต่างแสดงผลซ้อนยืนยันการเแก้ไขโปรโมชัน  -->
                            <div class="modal fade" tabindex="-1" role="dialog" id="modal_edit">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" style="font-family: 'Prompt', sans-serif !important;">แจ้งเตือน
                                            </h5>
                                        </div>
                                        <div class="modal-body">
                                            <p>คุณต้องการที่แก้ไขข้อมูลโปรโมชัน <span id="pro_name_confirm"></span> ?
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <!-- ปุ่มยืนยันการแก้ไข -->
                                            <a href="#" id="submit" class="btn btn-success success">ยืนยัน</a>
                                            <!-- ปุ่มยกเลิกการแก้ไข -->
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
    var count_image = <?= count($arr_promotion) ?>;
    /*
     * @author Suwapat Saowarod 62160340
     */
    $(document).ready(function() {
        check_count_image_btn();
        check_category();
    });

    /*
     * upload_image_ajax
     * upload image for promotion
     * @input pro_file, card_image, data
     * @output -
     * @author Suwapat Saowarod 62160340
     * @Create Date 2564-10-03
     * @Update -
     */
    function upload_image_ajax() {
        var images = $('#pro_file')[0].files;
        var form_data = new FormData();
        var count_for_img = 0;
        // console.log(count_image);
        for (let i = 0; i < images.length; i++) {
            var name = images[i].name;
            var extension = name.split('.').pop().toLowerCase();
            form_data.append("pro_file[]", images[i]);
            count_image += 1;
            count_for_img += 1;
        }
        // console.log(form_data);
        $.ajax({
            url: "<?php echo base_url() . "Entrepreneur/Manage_promotion/Promotion_add/upload_image_ajax" ?>",
            method: "POST",
            dataType: "JSON",
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                if (data.search("error") == -1) {
                    document.getElementById('card_image').innerHTML += data;
                    $('#pro_file').val('');
                    check_count_image_btn()
                    // console.log(count_image);
                } else {
                    swal('เพิ่มรูปไม่สำเร็จ', 'ไฟล์ ' + name + ' มีขนาดใหญ่เกินไป', 'error');
                    $('#pro_file').val('');
                    count_image -= count_for_img;
                    check_count_image_btn()
                }
            },
            error: function() {
                console.log('fail');
                swal('เพิ่มรูปไม่สำเร็จ', 'ไฟล์ ' + name + ' มีขนาดใหญ่เกินไป', 'error');
                $('#pro_file').val('');
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
     * @Create Date 2564-10-03
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
     * check_count_image_btn
     * check count image to disable btn submit
     * @input -
     * @output -
     * @author Suwapat Saowarod 62160340
     * @Create Date 2564-10-02
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
     * unlink_image_go_back
     * uplink image when cancel edit promotion
     * @input new_img
     * @output -
     * @author Suwapat Saowarod 62160340
     * @Create Date 2564-10-02
     * @Update 
     */
    function unlink_image_go_back() {
        // ดึงค่าของ input ที่มี name ชื่อ new_img[] มาใส่ตัวแปร arr_image
        var arr_image = $("input[name='new_img[]']").map(function() {
            return $(this).val();
        }).get();
        // console.log(arr_image);
        $.ajax({
            url: "<?php echo base_url() . "Entrepreneur/Manage_promotion/Promotion_add/uplink_image_ajax" ?>",
            method: "POST",
            data: {
                arr_image: arr_image
            },
            success: function(data) {
                // console.log(data);
                location.replace(
                    "<?php echo base_url() . "Admin/Manage_promotions/Admin_list_promotions/show_data_promotions_list" ?>"
                )
            }
        })
    }

    /*
     * confirm_edit
     * confirm delete company
     * @input com_name_con, com_id_con
     * @output modal comfirm delete comepany
     * @author Suwapat Saowarod 62160340
     * @Create Date 2564-10-03
     * @Update -
     */
    function confirm_edit(pro_name_con) {
        $('#pro_name_confirm').text(pro_name_con);
        $('#pro_name_confirm2').text(pro_name_con);
        $('#modal_edit').modal();

        $('#submit').click(function() {
            $('#form_edit_pro').submit();
        });
    }

    /*
     * check_category
     * check category promotion
     * @input pro_cat_id
     * @output -
     * @author Suwapat Saowarod 62160340
     * @Create Date 2564-10-13
     * @Update 
     */
    function check_category() {
        let pro_cat_id = $('#pro_cat_id').val();
        if (pro_cat_id == 1) {
            $('#div-point').hide();
            $('#pro_point').prop('required', false);
        } else {
            $('#div-point').show();
            $('#pro_point').prop('required', true);
        }
    }
</script>