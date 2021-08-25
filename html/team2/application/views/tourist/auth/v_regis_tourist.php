<!-- 
/*
* v_regis_tourist
* Display Form Register tourist page
* @input - tus_pre_id,tus_firstname,tus_lastname,tus_tel,tus_email,tus_username,tus_password,tourist_img
* @output form register tourist
* @author Thanisorn thumsawanit 62160088
* @Create Date 2561-07-31
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
        background-color: #eee;
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
</style>
<title>ลงทะเบียนสำหรับนักท่องเที่ยว</title>
<!-- Form Register -->
<div class="wrapper">
    <div class="container py-5" style="background-color: white; border-radius: 25px;  padding-right: 1.5%; padding-left: 1.5%;">
        <ul class="breadcrumb">
            <li><a href="<?php echo site_url() . 'DCS_controller/output_Landing_page'; ?>" style="color: green;">หน้าหลัก</a></li>
            <li><a href="<?php echo site_url() . 'Landing_page/Register/Select_register'; ?>" style="color: green;">สมัครสมาชิก</a></li>
            <li>สมัครสมาชิกสำหรับนักท่องเที่ยว</li>
        </ul>
        <h1 class="h1" style="text-align: center; padding-top: 1%; padding-bottom: 1%;">ลงทะเบียนสำหรับนักท่องเที่ยว</h1>
        <form class="container py-3 form-regis" method='POST' action='<?php echo site_url('Tourist/Auth/Register_tourist/insert_tourist') ?>' enctype="multipart/form-data">
            <b style="font-size: 30px; text-align: center;">โปรดกรอกข้อมูลของคุณ</b><br><br>
            <div>
                <input type="radio" id="tus_pre_id1" name="tus_pre_id" value=1>&nbsp;นาย
                <input type="radio" id="tus_pre_id2" name="tus_pre_id" value=2>&nbsp;นาง
                <input type="radio" id="tus_pre_id3" name="tus_pre_id" value=3>&nbsp;นางสาว
            </div><br>
            <div class="row">
                <div class="form-group col-md-6 mb-3">
                    <label for="inputname">ชื่อ</label>
                    <input type="text" class="form-control mt-1" id="tus_firstname" name="tus_firstname" placeholder="ชื่อ" required>
                    <span id="pfatf"></span>
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label for="inputlastname">นามสกุล</label>
                    <input type="text" class="form-control mt-1" id="tus_lastname" name="tus_lastname" placeholder="นามสกุล" required>
                    <span id="pfatf"></span>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 mb-3">
                    <label for="tell">เบอร์โทร</label>
                    <input type="text" class="form-control mt-1" id="tus_tel" name="tus_tel" placeholder="เบอร์โทร" required>
                </div>

                <div class="form-group col-md-6 mb-3">
                    <label for="idcard">วันเกิด</label>
                    <input type="date" class="form-control mt-1" id="tus_birthdate" name="tus_birthdate" placeholder="วันเกิด" required>
                </div>
            </div>

            <div class="form-group col-md-6 mb-3">
                <label for="inputemail">อีเมล</label>
                <input type="email" class="form-control mt-1" id="tus_email" name="tus_email" placeholder="อีเมล" required>
            </div>
            <br>
            รูปโปรไฟล์ :
            <input type="file" id ="tourist_img" name="tourist_img" accept="image/*" required>
            <br><br>

            <b style="font-size: 30px;">สร้างบัญชีผู้ใช้</b><br><br>
            <div class="form-group col-md-6 mb-3">
                <label for="username">ชื่อผู้ใช้</label>
                <input type="text" class="form-control mt-1" id="tus_username" name="tus_username" onblur="check_username()" placeholder="ชื่อผู้ใช้" required>
                <span id="usernameavailable"></span>
            </div>
            <div class="row">
                <div class="form-group col-md-6 mb-3">
                    <label for="password">รหัสผ่าน</label>
                    <input type="password" class="form-control mt-1" id="pass" name="tus_password" placeholder="รหัสผ่าน" onkeyup="confirmpassword()" required>
                </div>

                <div class="form-group col-md-6 mb-3">
                    <label for="password">ยืนยันรหัสผ่าน</label>
                    <input type="password" class="form-control mt-1" id="confirm" name="cfp" placeholder="ยืนยันรหัสผ่าน" onkeyup="confirmpassword()" required><br>
                    <div id="errorpassword" class="text-danger">

                    </div>
                </div>
            </div>
            <a id ="cancel"class="btn btn-secondary" style="color: white; background-color: #777777; font-size: 18px; float: right;" href="<?php echo site_url() . 'Tourist/Auth/Register_tourist/show_regis_tourist'; ?>">ยกเลิก</a>
            <button type="submit" id="next_btn" class="btn btn-success" style="margin-right: 10px; color: white; font-size: 18px; float: right;">ถัดไป</button>
            

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
<script>
    /*
     * @author Thanisorn thumsawanit 62160088
     */
    $(document).ready(function() {
        let error = "<?php echo $this->session->userdata("error_register_tourist"); ?>";
        if (error == 'fail') {
            swal("ล้มเหลว", "รูปภาพที่คุณอัพโหลดมีขนาดใหญ่เกินไป", "error");
            <?php echo $this->session->unset_userdata("error_register_tourist"); ?>
        }
    });
    /*
     * 
     * confirmpassword
     * alert confirmpassword not match passwords
     *@input password
     *@parameter -
     *output  checkconfirmpassword
     *@author Thanisorn thumsawanit 62160088
     *@Create Date 2564-07-31
     *@update Date 2564-07-31
     */
    function confirmpassword() {
        if ($('#pass').val() != $('#confirm').val()) {
            $('#errorpassword').text('รหัสผ่านไม่ตรงกัน');
            $('#next_btn').prop('disabled', true);
        } else {
            $('#errorpassword').text('');
            $('#next_btn').prop('disabled', false);
        }
    }

    /*
     * 
     * check_username
     * check duplicate username in database
     *@input tus_username
     *@parameter -
     *output  username validation
     *@author Thanisorn thumsawanit 62160088
     *@Create Date 2564-08-10
     */

    function check_username() {
        let tus_username = $('#tus_username').val();
        $.ajax({
            url: '<?php echo base_url('Tourist/Auth/Register_tourist/check_username_tourist_ajax'); ?>',
            type: "POST",
            data: {
                tus_username: tus_username

            },
            success: function(data) {
                console.log(data);
                if (data == 1) {
                    $("#usernameavailable").css({
                        "color": "red"
                    });

                    $('#usernameavailable').html("username not available");
                    $('#next_btn').prop('disabled', true);
                } else {
                    $('#usernameavailable').html("");
                    $('#next_btn').prop('disabled', false);
                }
            }
        });

    }
</script>