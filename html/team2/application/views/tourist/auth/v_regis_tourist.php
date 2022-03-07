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
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url() ?>" style="color: green;">หน้าหลัก</a></li>
                <li><a href="<?php echo base_url() . 'Landing_page/Select_register'; ?>" style="color: green;">สมัครสมาชิก</a></li>
                <li>สมัครสมาชิกสำหรับนักท่องเที่ยว</li>
            </ul>
            <h1 class="h1 font-w-500" style="text-align: center; padding-top: 1%; padding-bottom: 1%;">ลงทะเบียนสำหรับนักท่องเที่ยว</h1>
            <form class="container py-3 form-regis" method='POST' action='<?php echo base_url('Tourist/Auth/Register_tourist/insert_tourist') ?>' enctype="multipart/form-data">
                <div class="profile-pic-div">
                    <?php if ($this->session->userdata("tus_img_path") == '') { ?>
                        <img src="<?php echo base_url() . 'assets/templete/picture/' ?>/./person.jpg" id="photo" onclick="document.getElementById('file').click();">
                    <?php } else { ?>
                        <img src="<?php echo base_url() . 'profilepicture_tourist/' . $this->session->userdata('tus_img_path'); ?>">
                    <?php } ?>
                    <input type="file" id="file" name="tourist_img" accept="image/*">
                    <label for="file" id="upload_Btn">เลือกรูปภาพ</label>
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
                        <label for="tus_firstname">ชื่อ</label>
                        <input type="text" class="form-control mt-1" id="tus_firstname" name="tus_firstname" placeholder="ชื่อ" required>
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="tus_lastname">นามสกุล</label>
                        <input type="text" class="form-control mt-1" id="tus_lastname" name="tus_lastname" placeholder="นามสกุล" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="tus_tel">เบอร์โทร</label>
                        <input type="text" class="form-control mt-1" id="tus_tel" name="tus_tel" onblur="check_phone_number_ajax()" maxlength="10" minlength="10" placeholder="088-XXX-XXXX" required>
                        <span id="phonenumber_available" style="color: red;"></span>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="tus_email">อีเมล</label>
                        <input type="email" class="form-control mt-1" id="tus_email" name="tus_email" onblur="check_email_ajax()" placeholder="example@email.com" required>
                        <span id="emailav_ailable" style="color: red;"></span>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-2 mb2">
                        <label for="tus_birth_date">วันเกิด</label>
                        <select name="tus_birth_date" id="tus_birth_date" class="form-control mt-1">
                            <!-- วันเกิด -->
                        </select>
                    </div>
                    <div class="form-group col-md-3 mb3">
                        <label for="tus_birth_month">เดือนเกิด</label>
                        <select name="tus_birth_month" id="tus_birth_month" class="form-control mt-1" onblur="check_date_by_month()">
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
                    <div class="form-group col-md-2 mb2">
                        <label for="tus_birth_year">ปีเกิด</label>
                        <select name="tus_birth_year" id="tus_birth_year" class="form-control mt-1" onblur="check_date_by_month()">
                            <?php 
                            echo '<option value="0">ปป</option>';
                            for($i = $year_now-100; $i <= $year_now; $i++){
                                echo '<option value="'.$i.'">'.$i.'</option>';
                            }?>
                        </select>
                    </div>
                </div>
                <br>

                <b style="font-size: 30px;">สร้างบัญชีผู้ใช้</b>
                <br><br>
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="tus_username">ชื่อผู้ใช้</label>
                        <input type="text" class="form-control mt-1" id="tus_username" name="tus_username" minlength="4" onblur="check_username_ajax()" placeholder="ชื่อผู้ใช้" required>
                        <span id="usernameav_ailable" style="color: red;"></span>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="tus_password">รหัสผ่าน</label>
                        <input type="password" class="form-control mt-1" id="pass" name="tus_password" minlength="8" placeholder="รหัสผ่าน" onkeyup="confirm_password()" required>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="password">ยืนยันรหัสผ่าน</label>
                        <input type="password" class="form-control mt-1" id="confirm" name="cfp" placeholder="ยืนยันรหัสผ่าน" onkeyup="confirm_password()" required><br>
                        <div id="invalid_password" class="text-danger">

                        </div>
                    </div>
                </div>
                <a id="cancel" class="btn btn-secondary" style="color: white; background-color: #777777; font-size: 18px; float: right;" href="<?php echo base_url() . 'Landing_page/Select_register'; ?>">ยกเลิก</a>
                <button type="submit" id="confirm_btn" class="btn btn-success" style="margin-right: 10px; color: white; font-size: 18px; float: right;">บันทึก</button>

            </form>
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
        check_date_by_month();
    });
    var check_phone_number = 0;
    var check_email = 0;
    var check_username = 0;
    var check_password = 0;

    /*
     * 
     * confirm_password
     * alert confirm_password not match passwords
     *@input password
     *@parameter -
     *output  checkconfirm_password
     *@author Thanisorn thumsawanit 62160088
     *@Create Date 2564-07-31
     *@update Date 2564-09-20
     */
    function confirm_password() {
        if ($('#pass').val() != $('#confirm').val() && $('#confirm').val() == null || $('#confirm').val() == "") {
            $('#invalid_password').text('');
            check_password = 1;
            check_btn_submit();
        } else if ($('#pass').val() != $('#confirm').val()) {
            $('#invalid_password').text('รหัสผ่านไม่ตรงกัน');
            check_password = 1;
            check_btn_submit();
        } else {
            $('#invalid_password').text('');
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
            $('#confirm_btn').prop('disabled', true);
        } else {
            $('#confirm_btn').prop('disabled', false);
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
                    $('#usernameav_ailable').html("ชื่อผู้ใช้นี้มีผู้ใช้อื่นแล้ว");           
                    check_username = 1;
                    check_btn_submit();
                } else {
                    $('#usernameav_ailable').html("");
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
                    $('#emailav_ailable').html("อีเมลนี้ได้ใช้ทำการลงทะเบียนแล้ว");
                    check_email = 1;
                    check_btn_submit();

                } else {
                    $('#emailav_ailable').html("");
                    check_email = 0;
                    check_btn_submit();
                }
            }
        });

    }

    /*
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
                    $('#phonenumber_available').html("เบอร์โทรศัพท์นี้ได้ใช้ทำการลงทะเบียนแล้ว");
                    check_phone_number = 1;
                    check_btn_submit();
                } else {
                    $('#phonenumber_available').html("");
                    check_phone_number = 0;
                    check_btn_submit();
                }
            }
        });

    }

    /*
     * check_date_by_month
     * check birth date by birth month
     * @input tus_birth_month, tus_birth_year
     * @output tus_birth_date
     * @author Suwapat Saowarod 62160340
     * @Create Date 2565-01-15
     * @Update - 
     */
    function check_date_by_month(){
        let birth_month = $('#tus_birth_month').val();
        let birth_year = $('#tus_birth_year').val();
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
            if($('#tus_birth_date').val() == i){
                html_code += '<option value="'+i+'" selected>'+ i +'</option>';
            }else{
                html_code += '<option value="'+i+'">'+ i +'</option>';
            }
        }
        $('#tus_birth_date').html(html_code);
    }

    /*
     * @author Naaka punparich 62160082
     */
    const img_div = document.querySelector('.profile-pic-div');
    const img = document.querySelector('#photo');
    const file = document.querySelector('#file');
    const upload_btn = document.querySelector('#upload_Btn');

    img_div.addEventListener('mouseenter', function() {
        upload_btn.style.display = "block";
    });

    img_div.addEventListener('mouseleave', function() {
        upload_btn.style.display = "none";
    });

    file.addEventListener('change', function() {

        const choosed_file = this.files[0];

        if (choosed_file) {

            const reader = new FileReader();

            reader.addEventListener('load', function() {
                img.setAttribute('src', reader.result);
            });

            reader.readAsDataURL(choosed_file);
        }
    });
</script>