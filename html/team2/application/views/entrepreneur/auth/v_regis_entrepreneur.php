<!-- 
/*
* v_login_entrepreneur
* Display form register entrepreneur
* @input ent_firstname, ent_lastname, ent_tel, ent_id_card, ent_email, file[], ent_username, ent_password
* @output form register entrepreneur
* @author Priyarat Bumrungkit 62160156
* @Create Date 2564-07-18
*/ 
-->

<style crossorigin='anonymous'>
    .w3-btn {
        width: 150px;
    }

    input,
    select {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    label {
        font-size: 14px;
        line-height: 1.42857;
        color: #aaa;
        font-weight: 400;
        padding-left: 15px;
    }

    .label {
        padding-left: unset;
    }

    .form-control {
        border: 0px;
        border-radius: 0px;
    }

    input {
        border: 0px;
        border-bottom: 1px solid;
        border-bottom-color: #ced2d7;
    }

    input:hover #next_btn {
        background-color: #448855;
    }

    a {
        text-decoration: none;
    }

    ul.breadcrumb {
        padding: 10px 16px;
        list-style: none;
    }

    ul.breadcrumb li {
        display: inline;
        font-size: 18px;
    }

    ul.breadcrumb li+li:before {
        padding: 8px;
        color: black;
        content: ">";
    }

    ul.breadcrumb li a {
        color: #0275d8;
        text-decoration: none;
    }

    ul.breadcrumb li a:hover {
        color: #01447e;
        text-decoration: underline;
    }

    #next_btn {
        float: right;
    }

    .profile-pic-div {
        height: 200px;
        margin: auto;
        width: 200px;
        position: relative;
        border-radius: 50%;
        overflow: hidden;
        border: 1px solid gray;
    }

    .profile-pic-div img {
        height: 200px;
    }

    #photo {
        height: 100%;
        width: 100%;
    }

    #file {
        display: none;
    }

    #uploadBtn {
        height: 40px;
        width: 100%;
        position: absolute;
        bottom: -4%;
        left: 45%;
        transform: translate(-50%);
        text-align: center;
        background: rgba(0, 0, 0, 0.7);
        color: wheat;
        line-height: 30px;
        font-size: 15px;
        font-family: sans-serif;
        cursor: pointer;
        padding-top: 10px;
    }

    .bg {
        /* The image used */
        background-image: url("<?php echo base_url() . 'assets/templete/picture' ?>/./cool-background.png");

        /* Full height */
        height: 100%;

        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }


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
<title>ลงทะเบียนสำหรับผู้ประกอบการ</title>
<!-- Form Register -->
<div class="bg" style="padding-top: 3%;">
    <div class="container py-5" style="background-color: white; border-radius: 25px; padding-right: 1.5%; padding-left: 1.5%;">
        <ul class="breadcrumb">
            <li><a href="<?php echo base_url() ?>" style="color: green;">หน้าหลัก</a></li>
            <li><a href="<?php echo base_url() . 'Landing_page/Select_register'; ?>" style="color: green;">สมัครสมาชิก</a></li>
            <li>สมัครสมาชิกสำหรับผู้ประกอบการ</li>
        </ul>
        <h1 class="h1" style="text-align: center; padding-top: 1%; padding-bottom: 1%;">ลงทะเบียนสำหรับผู้ประกอบการ</h1>
        <form class="container py-3" method='POST' id="form_regis_ent" action="<?php echo base_url() . 'Entrepreneur/Auth/Register_entrepreneur/insert_ent'; ?>" enctype="multipart/form-data">
            <b style="font-size: 30px; text-align: center;">โปรดกรอกข้อมูลของคุณ</b><br><br>
            <div>
                <!--กรอกข้อมูลการลงทะเบียน-->
                <div class="row">
                    <!--กรอกข้อมูลบุคคล-->
                    <div class="form-group col-md-2 mb-3"  style="margin-top: -10px;">
                        <label for="prefix" class="label">คำนำหน้า</label><br>
                        <select class="form-control mt-1" name="ent_pre_id" id="prefix" style="margin-top: -12px !important; " required>
                            <?php for ($i = 0; $i < count($arr_prefix); $i++) { ?>

                                <option value="<?php echo $i + 1 ?>"><?php echo $arr_prefix[$i]->pre_name ?></option>

                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        <label for="ent_firstname">ชื่อ</label>
                        <input type="text" class="form-control mt-1" id="ent_firstname" name="ent_firstname" placeholder="ชื่อ" required>
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="ent_lastname">นามสกุล</label>
                        <input type="text" class="form-control mt-1" id="ent_lastname" name="ent_lastname" placeholder="นามสกุล" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="ent_tel">เบอร์โทรศัพท์</label>
                        <input type="text" class="form-control mt-1" id="ent_tel" onkeyup="auto_tap(this); check_phone_number_ajax();" name="ent_tel" maxlength="12" minlength="12" placeholder="088-XXX-XXXX" required>
                        <span id="tel_available" style="color: red;"></span>
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="ent_id_card">หมายเลขบัตรประชาชน</label>
                        <input type="text" class="form-control mt-1" id="ent_id_card" onkeyup="auto_tap_id_card(this); check_id_card_ajax();" name="ent_id_card" maxlength="17" minlength="17" placeholder="หมายเลขบัตรประชาชน" required>
                        
                        <span id="id_card_available" style="color: red;"></span>
                        <!--<span class="error text-danger"></span>-->
                    </div>
                </div>
                <!--สิ้นสุดการกรอกข้อมูลส่วนบุคคล-->

                <!--กรอกข้อมูลอีเมล-->
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="ent_email">อีเมล</label>
                        <input type="email" class="form-control mt-1" id="ent_email" name="ent_email" onblur="check_email_ajax()" placeholder="example@email.com" required>
                        <span id="emailavailable" style="color: red;"></span>
                    </div>

                    <!-- <div class="form-group col-md-6 mb-3">
                        <label for="idcard">วันเกิด</label>
                        <input type="date" class="form-control mt-1" id="ent_birthdate" name="ent_birthdate" placeholder="วันเกิด" required>
                    </div> -->
                </div>
                <!--สิ้นสุดการกรอกข้อมูลอีเมล-->

                <div class="row">
                    <!--กรอกข้อมูลวันเกิด-->
                    <div class="form-group col-md-2 mb-2">
                        <label for="ent_birth_date">วันเกิด</label>
                        <select name="ent_birth_date" id="ent_birth_date" class="form-control mt-1">
                            <!-- วันเกิด -->
                        </select>
                    </div>
                    <div class="form-group col-md-2 mb-2">
                        <label for="ent_birth_month">เดือนเกิด</label>
                        <select name="ent_birth_month" id="ent_birth_month" class="form-control mt-1" onblur="check_date_by_month()">
                            <?php 
                            $arr_month = array(
                                "0"=>"มกราคม",
                                "1"=>"มกราคม",
                                "2"=>"กุมภาพันธ์",
                                "3"=>"มีนาคม",
                                "4"=>"เมษายน",
                                "5"=>"พฤษภาคม",
                                "6"=>"มิถุนายน",
                                "7"=>"กรกฎาคม",
                                "8"=>"สิงหาคม",
                                "9"=>"กันยายน",
                                "10"=>"ตุลาคม",
                                "11"=>"พฤศจิกายน",
                                "12"=>"ธันวาคม"
                                );
                            echo '<option value="0">ดด</option>';
                            for($i = 1; $i < 13; $i++){
                                echo '<option value="'.$i.'">'.$arr_month[$i].'</option>';
                            }?>
                        </select>
                    </div>
                    <div class="form-group col-md-2 mb-2">
                        <label for="ent_birth_year">ปีเกิด</label>
                        <select name="ent_birth_year" id="ent_birth_year" class="form-control mt-1" onblur="check_date_by_month()">
                            <?php 
                            echo '<option value="0">ปป</option>';
                            for($i = $year_now-100; $i <= $year_now; $i++){
                                echo '<option value="'.$i.'">'.$i.'</option>';
                            }?>
                        </select>
                    </div>
                </div><br>
                <!--สิ้นสุดการกรอกข้อมูลวันเกิด-->
                
                <div class="form-group">
                    เอกสารยืนยันตัวตน (เช่น รูปถ่ายบัตรประชาชน หรือ เอกสารเชิงพาณิชย์) <br><span style="color: red; font-size: 13px;">*เลือกไฟล์ได้เฉพาะ PDF, JPEG, PNG, JPG และขนาดไฟล์ไม่เกิน 3000 KB</span>
                </div>
                <input class="d-none" id="document_ent" type="file" accept="application/pdf, image/*" onchange="upload_file_ajax()" name="document_ent[]" multiple>
                <button type="button" class="btn btn-info" style="color: white; border-radius: 7px;" onclick="document.getElementById('document_ent').click();">เพิ่มเอกสาร</button>
                <div class="card-body d-flex flex-wrap justify-content-start" id="card_file"></div>
                <div id="arr_del_img_new"></div>
                <br><br>
                
                <!--สร้างบัญชีผู้ใช้-->
                <b style="font-size: 30px;">สร้างบัญชีผู้ใช้</b><br><br>

                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="ent_username">ชื่อผู้ใช้</label>
                        <input type="text" class="form-control mt-1" id="ent_username" name="ent_username" minlength="4" onblur="check_username_ajax()" placeholder="ชื่อผู้ใช้" required>
                        <span id="usernameavailable" style="color: red;"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="ent_password">รหัสผ่าน</label>
                        <input type="password" class="form-control mt-1" id="pass" name="ent_password" minlength="8" placeholder="รหัสผ่าน" onkeyup="confirm_password()" required>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="confirm">ยืนยันรหัสผ่าน</label>
                        <input type="password" class="form-control mt-1" id="confirm" name="cfp" placeholder="ยืนยันรหัสผ่าน" onkeyup="confirm_password()" required><br>
                        <div id="errorpassword" class="text-danger"></div>
                    </div>
                </div>
                <div style="text-align: right;">
                    <button type="button" value="submit" id="btn_sub" class="btn btn-success" style="color: white; font-size: 18px;" onclick="confirm_register()">บันทึก</button>
                    <a class="btn btn-secondary" style="color: white; background-color: #777777; font-size: 18px !important;" onclick="unlink_image_go_back()">ยกเลิก</a>
                </div>

                <!-- modal comfirm register -->
                <div class="modal fade" tabindex="-1" role="dialog" id="modal_regis">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" style="font-family: 'Prompt', sans-serif !important;">เงื่อนไข</h5>
                            </div>
                            <div class="modal-body">
                                <p>
                                    ข้อกำหนดและเงื่อนไขการใช้บริการ<br>

                                    1. การบันทึกและการเปิดเผยข้อมูล<br>
                                    1.1 ผู้ขอใช้บริการรับรองว่ารูปภาพ ชื่อ สัญลักษณ์ เครื่องหมายและ/หรือข้อมูลใด ๆ ของผู้ขอใช้บริการที่นำมาตั้งค่าเพื่อแสดงหรือดำเนินการใด ๆ
                                    ในการใช้บริการ เป็นทรัพย์สินทางปัญญาของผู้ขอใช้บริการ และ/หรือผู้ขอใช้บริการมีสิทธิโดยชอบในการนำมาใช้เพื่อการดังกล่าว และหากเกิดความเสียหายใด ๆ
                                    แก่ระบบ อันเนื่องมาจากการนำรูปภาพ ชื่อ สัญลักษณ์ เครื่องหมายและ/หรือข้อมูลใด ๆ ดังกล่าวมาใช้กับการใช้บริการ ผู้ขอใช้บริการตกลงชดใช้ค่าเสียหายที่เกิดขึ้นแก่ Drop Carbon ทั้งสิ้น<br>
                                    1.2 ข้อมูลส่วนบุคคลที่ท่านได้ให้หรือใช้ผ่านการประมวลผล ของเครื่องคอมพิวเตอร์ ที่ควบคุมการทำงานเว็บไซต์ของ Drop Carbon ทั้งหมดนั้น
                                    ท่านยอมรับและตกลงว่าเป็นสิทธิและกรรมสิทธิ์ของ Drop Carbon ซึ่งจะให้ความคุ้มครองความลับ ดังกล่าวอย่างดีที่สุด <br>

                                    2. ข้อตกลงทั่วไป<br>
                                    2.1 ผู้ขอใช้บริการรับรองและรับประกันว่าตนได้อ่าน และรับทราบถึงเนื้อหาของนโยบายคุ้มครองข้อมูลส่วนบุคคลของ Drop Carbon
                                </p>
                                <br>
                                <input type="checkbox" id="agree" onclick="check_box_agree()"> ข้าพเจ้าขอรับรองว่าข้อมูลดังกล่าวมาข้างต้นนั้นเป็นความจริง และยอมรับข้อตกลงในการใช้บริการ Drop Carbon System
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
<br><br><br>
<script>
    /*
     * @author Suwapat Saowarod 62160340
     */
    $(document).ready(function() {
        check_btn_submit();
        check_box_agree();
        check_date_by_month();
    });

    
    var count_file = 0;
    var check_phone_number = 0;
    var check_email = 0;
    var check_id_card = 0;
    var check_username = 1;
    var check_password = 0;


    /*
     * confirm_password
     * alert confirm_password not match passwords
     * @input password
     * @output -
     * @author Priyarat Bumrungkit 62160156
     * @Create Date 2564-10-25
     * @update Date 2564-10-26
     */
    function confirm_password() {
        if ($('#pass').val() != $('#confirm').val() && $('#confirm').val() == null || $('#confirm').val() == "") {
            $('#errorpassword').text('');
            //$('#next_btn').prop('disabled', true);
            check_password = 1;
            check_btn_submit();
        } else if ($('#pass').val() != $('#confirm').val()) {
            $('#errorpassword').text('รหัสผ่านไม่ตรงกัน');
            //$('#next_btn').prop('disabled', true);
            check_password = 1;
            check_btn_submit();
        } else {
            $('#errorpassword').text('');
            //$('#next_btn').prop('disabled', false);
            check_password = 0;
            check_btn_submit();
        }
    }

    /*
     * check_username_ajax
     * check username in database
     * @input ent_username
     * @output -
     * @author Suwapat Saowarod 62160340
     * @Create Date 2564-08-18
     * @Update -
     */
    function check_username_ajax() {
        let ent_username = $('#ent_username').val();
        $.ajax({
            url: '<?php echo base_url('Entrepreneur/Auth/Register_entrepreneur/check_username_entrepreneur_ajax'); ?>',
            type: "POST",
            data: {
                ent_username: ent_username
            },
            success: function(data) {
                console.log(data);
                if (data == 1) {
                    $('#usernameavailable').html("ชื่อนี้ถูกใช้เเล้ว");
                    check_username = 1;
                    check_btn_submit();
                    // $('#next_btn').prop('disabled', true);
                } else {
                    $('#usernameavailable').html("");
                    check_username = 0;
                    check_btn_submit();
                    // $('#next_btn').prop('disabled', false);
                }
            }
        });
    }

    /*
     * check_btn_submit
     * check button submit
     * @input 
     * @output -
     * @author Suwapat Saowarod 62160340
     * @Create Date 2564-09-10
     * @Update -
     */
    function check_btn_submit() {
        if (check_phone_number == 1 || check_password == 1 || check_username == 1 || count_file < 1) {
            $('#btn_sub').prop('disabled', true);
        } else {
            $('#btn_sub').prop('disabled', false);
        }
    }

    $(document).ready(function() {
        $('#ent_id_card').on('keyup', function() {
            if ($.trim($(this).val()) != '' && $(this).val().length == 13) {
                card_id = $(this).val().replace(/-/g, "");
                var result = check_id_card_number(card_id);
                if (result === false) {
                    var id_alert = "เลขบัตรผิด";

                    /*document.getElementByClassName("error").innerHTML = id_alert;*/
                    $('span.error').removeClass('true').text(id_alert);

                } else {
                    $('span.error').addClass('true').text('');
                }
            } else {
                $('span.error').removeClass('true').text('');
            }
        })
    });

    /*
     * check_id_card_number
     * check id card number
     * @input card_id
     * @output -
     * @author Priyarat Bumrungkit 62160156
     * @Create Date 2564-09-10
     * @Update -
     */
    function check_id_card_number(card_id) {
        if (!is_numeric(card_id)) return false;
        if (card_id.substring(0, 1) == 0) return false;
        if (card_id.length != 13) return false;
        for (i = 0, sum = 0; i < 12; i++)
            sum += parseFloat(card_id.charAt(i)) * (13 - i);
        if ((11 - sum % 11) % 10 != parseFloat(card_id.charAt(12))) return false;
        return true;
    }

    /*
     * is_numeric
     * 
     * @input input_card
     * @output -
     * @author Priyarat Bumrungkit 62160156
     * @Create Date 2564-09-10
     * @Update -
     */
    function is_numeric(input_card) {
        var pattern_card = /^-?(0|INF|(0[1-7][0-7]*)|(0x[0-9a-fA-F]+)|((0|[1-9][0-9]*|(?=[\.,]))([\.,][0-9]+)?([eE]-?\d+)?))$/;
        return (pattern_card.test(input_card));
    }

    /*
     * upload_file_ajax
     * upload file for entrepreneur
     * @input com_file, count_file
     * @output -
     * @author Suwapat Saowarod 62160340
     * @Create Date 2564-09-23
     * @Update -
     */
    function upload_file_ajax() {
        var files = $('#document_ent')[0].files;
        var form_data = new FormData();
        var count_for_file = 0;
        console.log(count_file);
        for (let i = 0; i < files.length; i++) {
            var name = files[i].name;
            var extension = name.split('.').pop().toLowerCase();
            form_data.append("document_ent[]", files[i]);
            count_file += 1;
            count_for_file += 1;
        }

        $.ajax({
            url: "<?php echo base_url() . "Entrepreneur/Auth/Register_entrepreneur/upload_file_ajax" ?>",
            method: "POST",
            dataType: "JSON",
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                if (data.search("error") == -1) {
                    document.getElementById('card_file').innerHTML += data;
                    $('#document_ent').val('');
                    check_btn_submit()
                } else {
                    swal('เพิ่มรูปไม่สำเร็จ', 'ไฟล์ ' + name + ' มีขนาดใหญ่เกินไป', 'error');
                    $('#document_ent').val('');
                    count_file -= count_for_file;
                    check_btn_submit()
                }
            },
            error: function() {
                console.log('fail');
                swal('เพิ่มรูปไม่สำเร็จ', 'ไฟล์ ' + name + ' มีขนาดใหญ่เกินไป', 'error');
                $('#document_ent').val('');
                count_file -= count_for_file;
                check_btn_submit()
            }
        });
    }

    /*
     * unlink_image_go_back
     * uplink image when cancel register entrepreneur
     * @input new_img
     * @output -
     * @author Suwapat Saowarod 62160340
     * @Create Date 2564-09-24
     * @Update 2564-09-09
     */
    function unlink_image_go_back() {
        // ดึงค่าของ input ที่มี name ชื่อ new_img[] มาใส่ตัวแปร arr_image
        var arr_file = $("input[name='new_img[]']").map(function() {
            return $(this).val();
        }).get();
        // console.log(arr_file);
        $.ajax({
            url: "<?php echo base_url() . "Entrepreneur/Auth/Register_entrepreneur/uplink_image_ajax" ?>",
            method: "POST",
            data: {
                arr_file: arr_file
            },
            success: function(data) {
                // console.log(data);
                location.replace("<?php echo base_url() . "Landing_page/Select_register" ?>")
            }
        })
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
        count_file -= 1;
        check_btn_submit()
    }

    /*
     * confirm_register
     * confirm register entrepreneur
     * @input modal_regis, submit
     * @output modal comfirm register entrepreneur
     * @author Suwapat Saowarod 62160340
     * @Create Date 2564-09-24
     * @Update -
     */
    function confirm_register() {
        console.log(1);
        $('#modal_regis').modal();
        check_box_agree();
        $('#submit').click(function() {
            $('#form_regis_ent').submit();
        });
    }

    /*
     * check_box_agree
     * check checkbox agree register
     * @input agree
     * @output modal comfirm register entrepreneur
     * @author Suwapat Saowarod 62160340
     * @Create Date 2564-09-24
     * @Update -
     */
    function check_box_agree() {
        let check_box = document.getElementById('agree').checked;
        console.log(check_box);
        if (!check_box) {
            $('#submit').prop('disabled', true);
        } else {
            $('#submit').prop('disabled', false);
        }
    }
    
    /*
    * check_tel
    * Check tel format
    * @input ent_tel 
    * @output ent_tel 
    * @author Priyarat Bumrungkit 62160156
   * @Create Date 2564-10-22
    * @Update Date -
    */
    function check_tel() {
        var tel = document.getElementById("ent_tel").value;
        var patt = '[0]{1}[0-9]{2}-[0-9]{3}-[0-9]{4}';
        if (!tel.match(patt)) {
            document.getElementById("error").innerHTML = "**";
        }
    }

    /*
    * check_email_ajax
    * check duplicate email in database
    * @input tus_email 
    * @output email validation
    * @author Priyarat Bumrungkit 62160156
    * @Create Date 2564-10-25
    * @Update Date -
    */
    function check_email_ajax() {
        let ent_email = $('#ent_email').val();
        $.ajax({
            url: '<?php echo base_url('Entrepreneur/Auth/Register_entrepreneur/check_email_entrepreneur_ajax'); ?>',
            type: "POST",
            data: {
                ent_email: ent_email

            },
            success: function(data) {
                console.log(data);
                if (data == 1) {
                    $('#emailavailable').html("อีเมลนี้ได้ใช้ทำการลงทะเบียนแล้ว");
                    //$('#next_btn').prop('disabled', true);
                    check_email = 1;
                    check_btn_submit();

                } else {
                    $('#emailavailable').html("");
                    //$('#next_btn').prop('disabled', false);
                    check_email = 0;
                    check_btn_submit();
                }
            }
        });

    }

    /*
    * auto_tab 
    * auto input - in number phone
    * @input obj 
    * @output -
    * @author Thanchanok Thongjumroon 62160089
    * @Create Date 2564-10-07
    * @Update Date 2564-10-09
    */
    function auto_tap(obj) {

        var pattern = new String("___-___-____"); // 080-123-4567
        var pattern_ex = new String("-"); //ใช้เครื่องหมาย - ในการแบ่ง
        var return_text = new String("");
        var obj_l = obj.value.length;
        var obj_l2 = obj_l - 1;
        for (i = 0; i < pattern.length; i++) {
            if (obj_l2 == i && pattern.charAt(i + 1) == pattern_ex) {
                return_text += obj.value + pattern_ex;
                obj.value = return_text;
            }
        }
        if (obj_l >= pattern.length) {
            obj.value = obj.value.substr(0, pattern.length);
        }
    }   

   /*
    * auto_tap_id_card
    * auto input - in card id
    * @input obj 
    * @output -
    * @author Thanchanok Thongjumroon 62160089
    * @Create Date 2564-10-26
    * @Update Date -
    */
    function auto_tap_id_card(obj) {

        var pattern = new String("_-____-_____-_-__");
        var pattern_ex = new String("-");
        var return_text = new String("");
        var obj_l = obj.value.length;
        var obj_l2 = obj_l - 1;
        for (i = 0; i < pattern.length; i++) {
            if (obj_l2 == i && pattern.charAt(i + 1) == pattern_ex) {
                return_text += obj.value + pattern_ex;
                obj.value = return_text;
            }
        }
        if (obj_l >= pattern.length) {
            obj.value = obj.value.substr(0, pattern.length);
        }
    }

    /*
    * check_phone_number_ajax
    * check duplicate number in database 
    * @input ent_tel
    * @output -
    * @author Thanchanok Thongjumroon 62160089
    * @Create Date 2564-10-25
    * @Update Date -
    */
    function check_phone_number_ajax() {
        //console.log("use");
        let ent_tel = $('#ent_tel').val();
        $.ajax({
            url: '<?php echo base_url('Entrepreneur/Auth/Register_entrepreneur/check_phone_number_entrepreneur_ajax'); ?>',
            type: "POST",
            data: {
                ent_tel: ent_tel
            },
            success: function(data) {
                //console.log(data);
                if (data == 1) {
                    
                    $('#tel_available').html("เบอร์โทรศัพท์นี้ได้ใช้ทำการลงทะเบียนแล้ว");
                    //$('#next_btn').prop('disabled', true);
                    check_phone_number = 1;
                    check_btn_submit();

                } else {
                    $('#tel_available').html("");
                    //$('#next_btn').prop('disabled', false);
                    check_phone_number = 0;
                    check_btn_submit();
                }
            }
        });
    }

    /*
    * check_id_card_ajax
    * check duplicate id_card in database
    * @input ent_id_card
    * @outputid_card validation-
    * @author Priyarat Bumrungkit 62160156
    * @Create Date 2564-10-26
    * @Update Date -
    */
    function check_id_card_ajax() {
        let ent_id_card = $('#ent_id_card').val();
        $.ajax({
            url: '<?php echo base_url('Entrepreneur/Auth/Register_entrepreneur/check_id_card_entrepreneur_ajax'); ?>',
            type: "POST",
            data: {
                ent_id_card: ent_id_card
            },
            success: function(data) {
                if (data == 1) {
                    
                    $('#id_card_available').html("หมายเลขบัตรประชาชนนี้ได้ใช้ทำการลงทะเบียนแล้ว");
                    //$('#next_btn').prop('disabled', true);
                    check_id_card = 1;
                    check_btn_submit();

                } else {
                    $('#id_card_available').html("");
                    //$('#next_btn').prop('disabled', false);
                    check_id_card = 0;
                    check_btn_submit();
                }
            }
        });
    }

    /*
     * check_date_by_month
     * check birth date by birth month
     * @input ent_birth_month, ent_birth_year
     * @output ent_birth_date
     * @author Suwapat Saowarod 62160340
     * @Create Date 2565-01-16
     * @Update - 
     */
    function check_date_by_month(){
        let birth_month = $('#ent_birth_month').val();
        let birth_year = $('#ent_birth_year').val();
        let html_code = '';
        let count_date;
        if(birth_month == 0 || birth_month == 1 || birth_month == 3 || birth_month == 5 || birth_month == 7 || birth_month == 8 || birth_month == 10 || birth_month == 12){
            count_date = 31;
        }else if(birth_month == 4 || birth_month == 6 || birth_month == 9 || birth_month == 11){
            count_date = 30;
        }else{
            let mod_4, mod_100, mod_400;
            // เช็คว่ามี 28 หรือ 29 วัน อัลกอลิทึม
            mod_4 = birth_year % 4;
            mod_100 = birth_year % 100;
            mod_400 = birth_year % 400;
            if(mod_4 == 0 && mod_100 == 0 && mod_400 == 0 && birth_year > 0){
                count_date = 28;
            }else{
                count_date = 29;
            }
        }
        html_code += '<option value="'+0+'">วว</option>';
        for(let i = 1; i <= count_date; i++){
            if($('#ent_birth_date').val() == i){
                html_code += '<option value="'+i+'" selected>'+ i +'</option>';
            }else{
                html_code += '<option value="'+i+'">'+ i +'</option>';
            }  
        }
        $('#ent_birth_date').html(html_code);
    }

</script>