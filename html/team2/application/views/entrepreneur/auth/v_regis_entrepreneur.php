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
    }

    .form-control {
        border: 0px;
        border-bottom: 1px solid;
        border-bottom-color: #ced2d7;
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
        bottom: 0;
        left: 50%;
        transform: translate(-50%);
        text-align: center;
        background: rgba(0, 0, 0, 0.7);
        color: wheat;
        line-height: 30px;
        font-size: 15px;
        font-family: sans-serif;
        cursor: pointer;
    }

    .selected {
        border: 0px;
        border-bottom: 1px solid;
        border-bottom-color: #ced2d7;
        display: block;
        width: 100%;
        padding: .375rem .375rem;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
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

    .breadcrumb {
        background-color: #e9ecef;
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
<div class="bg">
    <div class="container py-5" style="background-color: white; border-radius: 25px; padding-right: 1.5%; padding-left: 1.5%;">
        <ul class="breadcrumb">
            <li><a href="<?php echo base_url() ?>" style="color: green;">หน้าหลัก</a></li>
            <li><a href="<?php echo base_url() . 'Landing_page/Select_register'; ?>" style="color: green;">สมัครสมาชิก</a></li>
            <li>สมัครสมาชิกสำหรับผู้ประกอบการ</li>
        </ul>
        <h1 class="h1" style="text-align: center; padding-top: 1%; padding-bottom: 1%;">ลงทะเบียนสำหรับผู้ประกอบการ</h1>
        <form class="container py-3" method='POST' id="form_regis_ent" action="<?php echo base_url() . 'Entrepreneur/Auth/Register_entrepreneur/insert_ent'; ?>" enctype="multipart/form-data">
            <b style="font-size: 30px; text-align: center;">โปรดกรอกข้อมูลของคุณ</b><br><br>

            <!-- <input type="radio" id="ent_pre_id1" name="ent_pre_id" value=1 required>&nbsp;นาย
                <input type="radio" id="ent_pre_id2" name="ent_pre_id" value=2 required>&nbsp;นาง
                <input type="radio" id="ent_pre_id3" name="ent_pre_id" value=3 required>&nbsp;นางสาว -->
            <div>
                <div class="row">
                    <div class="form-group col-md-2 mb-3">
                        <label for="prefix" style="margin-bottom: 4px;">คำนำหน้า</label><br>
                        <select class="selected" name="ent_pre_id" id="prefix" required>
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
                        <input type="text" class="form-control mt-1" id="ent_tel" name="ent_tel" maxlength="10" minlength="10" placeholder="088-XXX-XXXX" required>
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="ent_id_card">หมายเลขบัตรประชาชน</label>
                        <input type="text" class="form-control mt-1" id="ent_id_card" name="ent_id_card" maxlength="13" minlength="13" placeholder="หมายเลขบัตรประชาชน" required>
                        <span class="error text-danger"></span>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="ent_email">อีเมล</label>
                        <input type="email" class="form-control mt-1" id="ent_email" name="ent_email" placeholder="example@email.com" required>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="idcard">วันเกิด</label>
                        <input type="date" class="form-control mt-1" id="ent_birthdate" name="ent_birthdate" placeholder="วันเกิด" required>
                    </div>
                </div>

                <div class="form-group">
                    เอกสารยืนยันตัวตน (เช่น รูปถ่ายบัตรประชาชน หรือ เอกสารเชิงพาณิชย์) <br><span style="color: red; font-size: 13px;">*เลือกไฟล์ได้เฉพาะ PDF, JPEG, PNG, JPG และขนาดไฟล์ไม่เกิน 3000 KB</span>
                </div>
                <input class="d-none" id="document_ent" type="file" accept="application/pdf, image/*" onchange="upload_file_ajax()" name="document_ent[]" multiple>
                <button type="button" class="btn btn-info" style="color: white; border-radius: 7px;" onclick="document.getElementById('document_ent').click();">เพิ่มเอกสาร</button>
                <div class="card-body d-flex flex-wrap justify-content-start" id="card_file"></div>
                <div id="arr_del_img_new"></div>
                <br><br>

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
                    <a class="btn btn-secondary" style="color: white; background-color: #777777;" onclick="unlink_image_go_back()">ยกเลิก</a>
                </div>

                <!-- modal comfirm register -->
                <div class="modal fade" tabindex="-1" role="dialog" id="modal_regis">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" style="font-family: 'Prompt', sans-serif !important;">คุณเเน่ใจหรือไม่ ?</h5>
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
                                <input type="checkbox" id="agree" onchange="check_box_agree()">  ข้าพเจ้าขอรับรองว่าข้อมูลดังกล่าวมาข้างต้นนั้นเป็นความจริง และยอมรับข้อตกลงในการใช้บริการ Drop Carbon System
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
    });

    var check_username = 1;
    var check_password = 1;
    var count_file = 0;

    /*
     * confirmpassword
     * check password with confirm_password
     * @input pass, confirm 
     * @output -
     * @author Thanisorn thumsawanit 62160088
     * @Create Date 2564-07-20
     * @Update -
     */
    function confirm_password() {
        if ($('#pass').val() != $('#confirm').val()) {
            $('#errorpassword').text('รหัสผ่านไม่ตรงกัน');
            check_password = 1;
            check_btn_submit();
            // $('#next_btn').prop('disabled', true);
        } else {
            $('#errorpassword').text('');
            check_password = 0;
            check_btn_submit();
            // $('#next_btn').prop('disabled', false);
        }
    }

    /*
     * check_username
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
        if (check_password == 1 || check_username == 1 || count_file < 1) {
            $('#btn_sub').prop('disabled', true);
        } else {
            $('#btn_sub').prop('disabled', false);
        }
    }

    /*
     * check_id_card_number
     * @input 
     * @output -
     * @author Priyarat Bumrungkit 62160156
     * @Create Date 2564-09-20
     * @Update -
     */
    $(document).ready(function() {
        $('#ent_id_card').on('keyup', function() {
            if ($.trim($(this).val()) != '' && $(this).val().length == 13) {
                id = $(this).val().replace(/-/g, "");
                var result = check_id_card_number(id);
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

    function check_id_card_number(id) {
        if (!is_numeric(id)) return false;
        if (id.substring(0, 1) == 0) return false;
        if (id.length != 13) return false;
        for (i = 0, sum = 0; i < 12; i++)
            sum += parseFloat(id.charAt(i)) * (13 - i);
        if ((11 - sum % 11) % 10 != parseFloat(id.charAt(12))) return false;
        return true;
    }

    function is_numeric(input) {
        var RE = /^-?(0|INF|(0[1-7][0-7]*)|(0x[0-9a-fA-F]+)|((0|[1-9][0-9]*|(?=[\.,]))([\.,][0-9]+)?([eE]-?\d+)?))$/;
        return (RE.test(input));
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
    function check_box_agree(){
        let check_box =  document.getElementById('agree').checked;
        console.log(check_box);
        if(!check_box){
            $('#submit').prop('disabled', true);
        }else{
            $('#submit').prop('disabled', false);
        }
    }
</script>