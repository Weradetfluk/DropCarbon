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
<!-- Form Register -->
<div class="bg" style="padding-top: 3%; padding-bottom: 3%; background-image: url('<?php echo base_url() . 'assets/templete/picture' ?>/./cool-background.png');">
    <div class="container py-5" style="background-color: white; border-radius: 25px;  padding-right: 1.5%; padding-left: 1.5%;">

        <?php if ($this->session->userdata("tourist_id") == '') { ?>

            <ul class="breadcrumb">
                <li><a href="<?php echo base_url() ?>" style="color: green;">หน้าหลัก</a></li>
                <li><a href="<?php echo base_url() . 'Landing_page/Select_register'; ?>" style="color: green;">สมัครสมาชิก</a></li>
                <li>สมัครสมาชิกสำหรับนักท่องเที่ยว</li>
            </ul>
            <h1 class="h1 font-w-500" style="text-align: center; padding-top: 1%; padding-bottom: 1%;">ลงทะเบียนสำหรับนักท่องเที่ยว</h1>
            <form class="container py-3 form-regis" method='POST' action='<?php echo base_url('Tourist/Auth/Register_tourist/insert_tourist') ?>' enctype="multipart/form-data">
                <div class="profile-pic-div">
                    <?php if ($this->session->userdata("tus_img_path") == '') { ?>
                        <img src="<?php echo base_url() . 'assets/templete/picture/' ?>/./person.jpg" id="photo">
                    <?php } else { ?>
                        <img src="<?php echo base_url() . 'profilepicture_tourist/' . $this->session->userdata('tus_img_path'); ?>">
                    <?php } ?>
                    <input type="file" id="file" name="tourist_img" accept="image/*">
                    <label for="file" id="uploadBtn">เลือกรูปภาพ</label>
                </div><br>
                <!-- profile pictuce -->

                <b style="font-size: 30px; text-align: center; padding-bottom: 5%; ">โปรดกรอกข้อมูลของคุณ</b>
                <br><br>
                <div class="row">
                    <div class="form-group col-md-2 mb-3" style="margin-top: -10px;">
                        <label for="prefix" class="label">คำนำหน้า</label><br>
                        <select class="form-control mt-1" name="tus_pre_id" id="prefix" style="margin-top: -15px !important; " required>
                            <?php for ($i = 0; $i < count($arr_prefix); $i++) { ?>

                                <option value="<?php echo $i + 1 ?>"><?php echo $arr_prefix[$i]->pre_name ?></option>

                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        <label for="inputname">ชื่อ</label>
                        <input type="text" class="form-control mt-1" id="tus_firstname" name="tus_firstname" placeholder="ชื่อ" required>
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputlastname">นามสกุล</label>
                        <input type="text" class="form-control mt-1" id="tus_lastname" name="tus_lastname" placeholder="นามสกุล" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="tell">เบอร์โทร</label>
                        <input type="text" class="form-control mt-1" id="tus_tel" name="tus_tel" onblur="check_phone_number_ajax()" maxlength="10" minlength="10" placeholder="088-XXX-XXXX" maxlength="10" required>
                        <span id="phonenumberavailable" style="color: red;"></span>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="idcard">วันเกิด</label>
                        <input type="date" class="form-control mt-1" id="tus_birthdate" name="tus_birthdate" placeholder="วันเกิด" required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputemail">อีเมล</label>
                        <input type="email" class="form-control mt-1" id="tus_email" name="tus_email" onblur="check_email_ajax()" placeholder="example@email.com" required>
                        <span id="emailavailable" style="color: red;"></span>
                    </div>
                </div>

                <br>

                <b style="font-size: 30px;">สร้างบัญชีผู้ใช้</b>
                <br><br>
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="username">ชื่อผู้ใช้</label>
                        <input type="text" class="form-control mt-1" id="tus_username" name="tus_username" minlength="4" onblur="check_username_ajax()" placeholder="ชื่อผู้ใช้" required>
                        <span id="usernameavailable" style="color: red;"></span>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="password">รหัสผ่าน</label>
                        <input type="password" class="form-control mt-1" id="pass" name="tus_password" minlength="8" placeholder="รหัสผ่าน" onkeyup="confirmpassword()" required>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="password">ยืนยันรหัสผ่าน</label>
                        <input type="password" class="form-control mt-1" id="confirm" name="cfp" placeholder="ยืนยันรหัสผ่าน" onkeyup="confirmpassword()" required><br>
                        <div id="errorpassword" class="text-danger">

                        </div>
                    </div>
                </div>
                <a id="cancel" class="btn btn-secondary" style="color: white; background-color: #777777; font-size: 18px; float: right;" href="<?php echo base_url() . 'Landing_page/Register/Select_register'; ?>">ยกเลิก</a>
                <button type="submit" id="next_btn" class="btn btn-success" style="margin-right: 10px; color: white; font-size: 18px; float: right;">บันทึก</button>

            </form>

        <?php } else { ?>

            <ul class="breadcrumb">
                <li><a href="<?php echo site_url() . 'Tourist/Auth/Landing_page_tourist'; ?>" style="color: green;">หน้าหลัก</a></li>
                <li>แก้ไขข้อมูลส่วนตัว</li>
            </ul>
            <!-- path -->

            <h1 class="h1" style="text-align: center; padding-top: 1%; padding-bottom: 1%;" class="font-w-500">แก้ไขข้อมูลส่วนตัว</h1>
            <!-- แก้ไขข้อมูลส่วนตัว -->

            <form id="verifyForm" class="container py-3" method='POST' action='<?php echo site_url() . 'Tourist/Manage_tourist/Tourist_manage/update_tourist'; ?>' style="margin:0;" enctype="multipart/form-data">
                <div class="profile-pic-div">
                    <?php if ($this->session->userdata("tus_img_path") == '') { ?>
                        <img src="<?php echo base_url() . 'assets/templete/picture/' ?>/./person.jpg" id="photo">
                    <?php } else { ?>
                        <img src="<?php echo base_url() . 'profilepicture_tourist/' . $this->session->userdata('tus_img_path'); ?>">
                    <?php } ?>
                    <input type="file" id="file" name="tourist_img" accept="image/*">
                    <label for="file" id="uploadBtn">เลือกรูปภาพ</label>
                </div><br>
                <!-- profile pictuce -->

                <input type="hidden" name="tus_id" value='<?php echo $arr_tus[0]->tus_id; ?>'>

                <b style="font-size: 30px; text-align: center; padding-bottom: 5%; ">โปรดกรอกข้อมูลของคุณ</b>
                <br><br>
                <div class="row">
                    <div class="form-group col-md-2 mb-3" style="margin-top: -6px;">
                        <label for="prefix" class="label">คำนำหน้า</label><br>
                        <select class="form-control mt-1" name="tus_pre_id" id="prefix" style="margin-top: -15px !important; " required>
                            <?php for ($i = 0; $i < count($arr_prefix); $i++) { ?>

                                <option value="<?php echo $i + 1 ?>"><?php echo $arr_prefix[$i]->pre_name ?></option>

                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        <label for="tus_firstname">ชื่อ</label>
                        <input type="text" class="form-control mt-1" placeholder="ชื่อ" name='tus_firstname' value='<?php echo $arr_tus[0]->tus_firstname; ?>' required>
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="tus_lastname">นามสกุล</label>
                        <input type="text" class="form-control mt-1" placeholder="นามสกุล" name='tus_lastname' value='<?php echo $arr_tus[0]->tus_lastname; ?>' required>
                    </div>
                </div>
                <!-- ชื่อจริง-นามสกุล -->

                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="tus_tel" style="color:black">เบอร์โทรศัพท์</label>
                        <input type="text" class="form-control" placeholder="หมายเลขโทรศัพท์" name='tus_tel' value="<?php echo $arr_tus[0]->tus_tel; ?>" required>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="tus_birthdate" style="color:black">วันเกิด</label>
                        <input type="date" class="form-control" placeholder="birthdate" name='tus_birthdate' value="<?php echo $arr_tus[0]->tus_birthdate; ?>" required>
                    </div>
                </div>
                <!-- เบอร์ วันเกิด -->

                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="tus_email" style="color:black">อีเมล</label>
                        <input type="text" class="form-control" placeholder="E-mail" name='tus_email' value="<?php echo $arr_tus[0]->tus_email; ?>" required>
                    </div><br>
                </div>
                <!-- อีเมล -->

                <a id="cancel" class="btn btn-secondary" style="color: white; background-color: #777777; font-size: 18px; float: right;" href="<?php echo site_url() . 'Tourist/Auth/Landing_page_tourist'; ?>">ยกเลิก</a>
                <!-- ปุ่มยกเลิก -->
                <button type="submit" id="next_btn" class="btn btn-success" style="margin-right: 10px; color: white; font-size: 18px; float: right;">บันทึก</button>
                <!-- ปุ่มบันทึก -->
            </form>
            <!-- form -->

        <?php } ?>

    </div>
</div>
<script>
    /*
     * datepicker
     * @author Thanisorn thumsawanit 62160088
     *@Create Date 2564-09-20
     *@update -
     */

    /*
     * @author Thanisorn thumsawanit 62160088
     */
    $(document).ready(function() {
        let error = "<?php echo $this->session->userdata("error_register_tourist"); ?>";
        if (error == 'fail') {
            swal("ล้มเหลว", "รูปภาพที่คุณอัพโหลดมีขนาดใหญ่เกินไป", "error");
            <?php echo $this->session->unset_userdata("error_register_tourist"); ?>
        }
        check_btn_submit();
    });
    var check_phone_number = 0;
    var check_email = 0;
    var check_username = 0;
    var check_password = 0;

    /*
     * 
     * confirmpassword
     * alert confirmpassword not match passwords
     *@input password
     *@parameter -
     *output  checkconfirmpassword
     *@author Thanisorn thumsawanit 62160088
     *@Create Date 2564-07-31
     *@update Date 2564-09-20
     */
    function confirmpassword() {
        if ($('#pass').val() != $('#confirm').val()) {
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
     * check_btn_submit
     * check button submit
     * @input 
     * @output -
     * @author Thanisorn thumsawanit 62160088
     * @Create Date 2564-09-20
     * @Update -
     */
    function check_btn_submit() {
        if (check_phone_number == 1 || check_email == 1 || check_password == 1 || check_username == 1) {
            $('#next_btn').prop('disabled', true);
        } else {
            $('#next_btn').prop('disabled', false);
        }
    }

    /*
     * 
     * check_username_ajax
     * check duplicate username in database
     *@input tus_username
     *@parameter -
     *output  username validation
     *@author Thanisorn thumsawanit 62160088
     *@Create Date 2564-08-10
     * @Update Date 2564-09-20
     */

    function check_username_ajax() {
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
                    $('#usernameavailable').html("ชื่อผู้ใช้นี้มีผู้ใช้อื่นแล้ว");
                    //$('#next_btn').prop('disabled', true);
                    check_username = 1;
                    check_btn_submit();
                } else {
                    $('#usernameavailable').html("");
                    //$('#next_btn').prop('disabled', false);
                    check_username = 0;
                    check_btn_submit();
                }
            }
        });

    }

    /*
     * 
     * check_email_ajax
     * check duplicate email in database
     *@input tus_email
     *@parameter -
     *output  email validation
     *@author Thanisorn thumsawanit 62160088
     *@Create Date 2564-09-13
     * @Update Date 2564-09-20
     */
    function check_email_ajax() {
        let tus_email = $('#tus_email').val();
        $.ajax({
            url: '<?php echo base_url('Tourist/Auth/Register_tourist/check_email_tourist_ajax'); ?>',
            type: "POST",
            data: {
                tus_email: tus_email

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
     * 
     * check_phone_number_ajax
     * check duplicate phone number in database
     *@input tus_tel
     *@parameter -
     *output  phone number validation
     *@author Thanisorn thumsawanit 62160088
     *@Create Date 2564-09-20
     * @Update Date 2564-09-20
     */
    function check_phone_number_ajax() {
        let tus_tel = $('#tus_tel').val();
        $.ajax({
            url: '<?php echo base_url('Tourist/Auth/Register_tourist/check_phone_number_tourist_ajax'); ?>',
            type: "POST",
            data: {
                tus_tel: tus_tel

            },
            success: function(data) {
                console.log(data);
                if (data == 1) {
                    $('#phonenumberavailable').html("เบอร์โทรศัพท์นี้ได้ใช้ทำการลงทะเบียนแล้ว");
                    //$('#next_btn').prop('disabled', true);
                    check_phone_number = 1;
                    check_btn_submit();

                } else {
                    $('#phonenumberavailable').html("");
                    //$('#next_btn').prop('disabled', false);
                    check_phone_number = 0;
                    check_btn_submit();
                }
            }
        });

    }

    /*
     * @author Naaka punparich 62160082
     */
    const imgDiv = document.querySelector('.profile-pic-div');
    const img = document.querySelector('#photo');
    const file = document.querySelector('#file');
    const uploadBtn = document.querySelector('#uploadBtn');

    imgDiv.addEventListener('mouseenter', function() {
        uploadBtn.style.display = "block";
    });

    imgDiv.addEventListener('mouseleave', function() {
        uploadBtn.style.display = "none";
    });

    file.addEventListener('change', function() {

        const choosedFile = this.files[0];

        if (choosedFile) {

            const reader = new FileReader();

            reader.addEventListener('load', function() {
                img.setAttribute('src', reader.result);
            });

            reader.readAsDataURL(choosedFile);
        }
    });
</script>