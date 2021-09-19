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
    .selected {
        border: 1px solid #e8e8e8;
        display: block;
        width: 100%;
        padding: .375rem .375rem;
        border-radius: .25rem;
        color: #212529;
        background-color: #fff;
        background-clip: padding-box;
    }
</style>
<title>ลงทะเบียนสำหรับผู้ประกอบการ</title>
<!-- Form Register -->
<div class="wrapper">
    <div class="container py-5" style="background-color: white; border-radius: 25px; padding-right: 1.5%; padding-left: 1.5%;">
        <ul class="breadcrumb">
            <li><a href="<?php echo site_url() . 'DCS_controller/output_Landing_page'; ?>" style="color: green;">หน้าหลัก</a></li>
            <li><a href="<?php echo site_url() . 'Landing_page/Register/Select_register'; ?>" style="color: green;">สมัครสมาชิก</a></li>
            <li>สมัครสมาชิกสำหรับผู้ประกอบการ</li>
        </ul>
        <h1 class="h1" style="text-align: center; padding-top: 1%; padding-bottom: 1%;">ลงทะเบียนสำหรับผู้ประกอบการ</h1>
        <form class="container py-3" method='POST' action="<?php echo site_url() . 'Entrepreneur/Auth/Register_entrepreneur/insert_ent'; ?>" enctype="multipart/form-data">
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
                    <label for="ent_tel">เบอร์โทร</label>
                    <input type="text" class="form-control mt-1" id="ent_tel" name="ent_tel" maxlength="10" minlength="10"placeholder="เบอร์โทร" required>
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label for="ent_id_card">บัตรประชาชน</label>
                    <input type="text" class="form-control mt-1" id="ent_id_card" name="ent_id_card" maxlength="13" minlength="13" placeholder="บัตรประชาชน" required>
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

            เอกสารจดทะเบียนเชิงพาณิชย์ :
            <input type="file" name="document_ent[]" multiple required>
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
                <button type="submit" id="btn_sub" class="btn btn-success" style="color: white; font-size: 18px;">บันทึก</button>
                <a class="btn btn-secondary" href="<?php echo site_url() . 'Landing_page/Register/Select_register'; ?>" style="color: white; background-color: #777777;">ยกเลิก</a>
            </div>
            

        </form>
    </div>
    <ul class="bg-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>
<br><br><br>
<script>
    
    /*
     * @author Suwapat Saowarod 62160340
     */
    $(document).ready(function() {
        let error = "<?php echo $this->session->userdata("error_register_entrepreneur"); ?>";
        if (error == 'fail') {
            swal("ล้มเหลว", "คุณทำการลงทะเบียนล้มเหลวเนื่องจากขนาดไฟล์ภาพใหญ่เกินไป", "error");
            <?php echo $this->session->unset_userdata("error_register_entrepreneur"); ?>
        }
        check_btn_submit();
    });

    var check_username = 0;
    var check_password = 0;

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
                    check_name = 1;
                    check_btn_submit();
                    // $('#next_btn').prop('disabled', true);
                } else {
                    $('#usernameavailable').html("");
                    check_name = 0;
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
    function check_btn_submit(){
        if (check_password == 1 || check_name == 1) {
            $('#btn_sub').prop('disabled', true);
        } else {
            $('#btn_sub').prop('disabled', false);
        }
    }

</script>