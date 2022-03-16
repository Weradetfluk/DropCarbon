<!-- 
/*
* v_information_tourist
* Display information tourist
* @input arr_tus, tou_pro
* @output information tourist
* @author Chutipon Thermsirisuksin 62160081
* @Create Date 2564-10-05
*/ 
-->
<style>
    @media all and (max-width: 1920px) {
        .change_width {
            width: 350px;
            height: 250px;
        }
    }

    @media all and (max-width: 400px) {
        .change_width {
            width: 314px;
            height: 250px;
        }
    }

    @media all and (max-width: 360px) {
        .change_width {
            width: 300px;
            height: 250px;
        }
    }

    a:hover {
        color: white !important;
    }

    .profile-pic-div {
        width: 245px;
        height: 240px;
    }

    .color-label {
        color: #AAAAAA !important;
    }

    .field-icon {
        float: right;
        margin-left: -25px;
        margin-top: -25px;
        position: relative;
        z-index: 2;
    }

    .container {
        padding-top: 50px;
        margin: auto;
    }

    @media all and (max-width: 991px) {
        .change_width_col {
            display: flex;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px;
            flex: none;
            max-width: none;
            margin: 1%;
        }

        .fix_row_name {
            padding-left: 5%;
        }
    }

    @media all and (max-width: 767px) {
        .fix_row_name {
            padding-left: unset;
            margin-left: -13px;
        }
    }
</style>

<div class="bg-gray">
    <div class="container py-5" style="border-radius: 25px; padding-bottom: 4% !important">
        <ul class="breadcrumb">

            <!-- Nav bar -->
            <li><a href="<?php echo base_url() ?>" style="color: green;">หน้าหลัก</a></li>
            <li>ข้อมูลส่วนตัว</li>

        </ul>

        <section>
            <form id="verifyForm" class="container py-3" method='POST' action='<?php echo site_url() . 'Tourist/Manage_tourist/Tourist_manage/update_tourist'; ?>' style="margin:0;" enctype="multipart/form-data">
                <div class="container radius" style="border: 2px solid;">
                    <div class="row">
                        <!-- หัวข้อ -->
                        <h2 style="margin-left: auto; margin-right: auto;">ข้อมูลส่วนตัว</h2>
                    </div>
                    <div class="row py-3">
                        <div class="col">
                            <div class="row" style="margin-top: 5%;">

                                <!-- รูปโปรไฟล์ -->
                                <div class="profile-pic-div">
                                    <?php if ($this->session->userdata("tus_img_path") == '') { ?>
                                        <!-- ถ้าไม่มีรูป -->
                                        <img src="<?php echo base_url() . 'assets/templete/picture/' ?>/./person.jpg" id="photo" onclick="document.getElementById('file').click();">
                                    <?php } else { ?>
                                        <!-- ถ้ามีรูป -->
                                        <img src="<?php echo base_url() . 'profilepicture_tourist/' . $this->session->userdata('tus_img_path'); ?>">
                                    <?php } ?>
                                    <input type="file" id="file" name="tourist_img" accept="image/*" disabled>
                                    <label for="file" id="upload_btn" style="visibility: hidden;">เลือกรูปภาพ</label>
                                </div>

                                <input type="hidden" name="tus_id" value='<?php echo $arr_tus[0]->tus_id; ?>'>

                            </div>
                        </div>

                        <div class="col-6 change_width_col">
                            <div class="row">
                                <div class="form-group col-md-2 mb-3" style="margin-top: -6px;">
                                    <!-- ส่วนของคำนำหน้า -->
                                    <label for="prefix" class="label">คำนำหน้า</label><br>
                                    <select class="form-control mt-1" name="tus_pre_id" id="visible" style="margin-top: -15px !important; " required disabled>
                                        <?php for ($i = 0; $i < count($arr_prefix); $i++) { ?>
                                            <?php if ($i + 1 == $arr_tus[0]->tus_pre_id) { ?>
                                                <!-- ถ้าเลือกแล้ว -->
                                                <option value="<?php echo $i + 1 ?>" selected><?php echo $arr_prefix[$i]->pre_name ?></option>
                                            <?php } else { ?>
                                                <!-- ยังไม่ได้เลือก -->
                                                <option value="<?php echo $i + 1 ?>"><?php echo $arr_prefix[$i]->pre_name ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4 mb-3">
                                    <!-- ส่วนของชื่อ -->
                                    <label for="tus_firstname">ชื่อ</label>
                                    <input type="text" class="form-control mt-1" placeholder="ชื่อ" name='tus_firstname' id="visible" value='<?php echo $arr_tus[0]->tus_firstname; ?>' required disabled>
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <!-- ส่วนของนามสกุล -->
                                    <label for="tus_lastname">นามสกุล</label>
                                    <input type="text" class="form-control mt-1" placeholder="นามสกุล" name='tus_lastname' id="visible" value='<?php echo $arr_tus[0]->tus_lastname; ?>' required disabled>
                                </div>
                            </div>
                            <!-- ชื่อจริง-นามสกุล -->

                            <div class="row">
                                <div class="form-group col-md-6 mb-3">
                                    <!-- ส่วนของเบอร์โทรศัพท์ -->
                                    <label for="tus_tel" style="color:black" class="color-label">เบอร์โทรศัพท์</label>
                                    <input type="text" class="form-control" placeholder="หมายเลขโทรศัพท์" name='tus_tel' id="visible" value="<?php echo $arr_tus[0]->tus_tel; ?>" required disabled>
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <!-- ส่วนของอีเมล -->
                                    <label for="tus_email" style="color:black" class="color-label">อีเมล</label>
                                    <input type="text" class="form-control" placeholder="E-mail" name='tus_email' id="visible" value="<?php echo $arr_tus[0]->tus_email; ?>" required disabled>
                                </div>
                            </div>
                            <!-- เบอร์ อีเมล -->

                            <div class="row">
                                <div class="form-group col-md-4 mb-4">
                                    <!-- ส่วนของวันเกิด -->
                                    <label for="tus_birth_date" class="label">วันเกิด</label>
                                    <select name="tus_birth_date" id="tus_birth_date" class="form-control mt-1" style="margin-top: -15px !important;" disabled>
                                        <!-- วันเกิด -->
                                    </select>
                                </div>
                                <div class="form-group col-md-4 mb-4">
                                    <!-- ส่วนของเดือนเกิด -->
                                    <label for="tus_birth_month" class="label">เดือนเกิด</label>
                                    <select name="tus_birth_month" id="tus_birth_month" class="form-control mt-1" style="margin-top: -15px !important;" onblur="check_date_by_month('not have old date')" disabled>
                                        <?php
                                        $tus_birth_month_old = intval(substr($arr_tus[0]->tus_birthdate, 5, 2));
                                        $arr_month = array(
                                            "0" => "มกราคม",
                                            "1" => "มกราคม",
                                            "2" => "กุมภาพันธ์",
                                            "3" => "มีนาคม",
                                            "4" => "เมษายน",
                                            "5" => "พฤษภาคม",
                                            "6" => "มิถุนายน",
                                            "7" => "กรกฎาคม",
                                            "8" => "สิงหาคม",
                                            "9" => "กันยายน",
                                            "10" => "ตุลาคม",
                                            "11" => "พฤศจิกายน",
                                            "12" => "ธันวาคม"
                                        );
                                        echo '<option value="0">ดด</option>';
                                        for ($i = 1; $i < 13; $i++) {
                                            if ($i == $tus_birth_month_old) {
                                                echo '<option value="' . $i . '" selected>' . $arr_month[$i] . '</option>';
                                            } else {
                                                echo '<option value="' . $i . '">' . $arr_month[$i] . '</option>';
                                            }
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4 mb-4">
                                    <!-- ส่วนของปี -->
                                    <label for="tus_birth_year" class="label">ปีเกิด</label>
                                    <select name="tus_birth_year" id="tus_birth_year" class="form-control mt-1" style="margin-top: -15px !important;" onblur="check_date_by_month('not have old date')" disabled>
                                        <?php
                                        $tus_birth_year_old = intval(substr($arr_tus[0]->tus_birthdate, 0, 4));
                                        echo '<option value="0">ปป</option>';
                                        for ($i = $year_now - 100; $i <= $year_now; $i++) {
                                            if ($i == $tus_birth_year_old) {
                                                echo '<option value="' . $i . '" selected>' . $i . '</option>';
                                            } else {
                                                echo '<option value="' . $i . '">' . $i . '</option>';
                                            }
                                        } ?>
                                    </select>
                                </div>
                            </div>

                            <!-- ชื่อผู้ใช้ -->
                            <div class="row py-3 fix_row_name">
                                <div class="form-group col-md-6 mb-3">
                                    <!-- ส่วนของชื่อผู้ใช้ -->
                                    <label for="tus_username" style="color:black" class="color-label">ชื่อผู้ใช้</label>
                                    <input type="text" class="form-control" placeholder="username" name='tus_username' id="tus_username" value="<?php echo $arr_tus[0]->tus_username; ?>" required disabled>
                                </div>
                            </div>
                            <!-- ชื่อผู้ใช้ -->

                            <!-- รหัสผ่าน -->
                            <div class="row">
                                <div class="form-group col-md-6 mb-3">
                                    <!-- ส่วนของรหัสผ่าน -->
                                    <label for="tus_password" style="color:black" class="color-label ">รหัสผ่าน</label>
                                    <input type="password" class="form-control" placeholder="password" name='tus_password' id="tus_password" value="<?php echo $this->session->userdata("tus_password"); ?>" required disabled>
                                    <span id="toggle_pw" toggle="#visible" class="material-icons field-icon toggle_password">
                                        visibility
                                    </span>
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <!-- ส่วนของยืนยันรหัสผ่าน -->
                                    <label for="tus_password" style="color:black" class="color-label ">ยืนยันรหัสผ่าน</label>
                                    <input type="password" class="form-control" placeholder="password" name='tus_password' id="tus_password_cf" value="<?php echo $this->session->userdata("tus_password"); ?>" required disabled>
                                    <span id="toggle_pw_cf" toggle="#visible" class="material-icons field-icon toggle_password">
                                        visibility
                                    </span>
                                </div>
                            </div>
                            <!-- รหัสผ่าน -->

                            <div class="row">

                                <div class="col" style="margin-top:18px;">
                                    <!-- คะแนนสูงสุดของฉัน -->
                                    <p>คะแนนสูงสุดของฉัน <?php echo $arr_tus[0]->tus_cur_score; ?> คะแนน</p>
                                </div>

                                <!-- ปุ่ม -->
                                <div class="col">
                                    <button type="button" class="btn btn-warning" id="edit_information" style="border-color: #ff9800;font-size: 18px; padding: 10px 24px; width: 235px; height: 40px;" onclick="undisabled_text()">
                                        <span class="material-icons">edit</span> แก้ไขข้อมูลส่วนตัว
                                    </button>
                                    <!-- ปุ่มแก้ไขข้อมูล -->

                                    <button type="submit" id="confirm_btn" class="btn btn-success" style=" height: 40px; margin-right: 10px; color: white; font-size: 18px; display: none;">บันทึก</button>
                                    <!-- ปุ่มบันทึก -->

                                    <button type="button" class="btn btn-secondary" id="cancel" style=" height: 40px; color: white; background-color: #777777; font-size: 18px; display: none;" onclick="disabled_text()">ยกเลิก</button>
                                    <!-- ปุ่มยกเลิก -->
                                </div>
                                <!-- ปุ่ม -->
                            </div>

                        </div>

                        <div class="col" style="margin-left: auto; margin-right: auto;">
                            <p style="text-align: center;font-size: 22px;">
                                <?php
                                // ส่วนของรูป , สิทธิพิเศษของคุณในระดับ และ ส่วนลดการใช้คะแนน
                                if ($arr_tus[0]->tus_cur_score < 25) { ?>
                                    <img src="<?php echo base_url() . 'assets/templete/picture/' ?>/./bronze.jpg" class="change_width" style="margin-left: auto; margin-right: auto;border: 2px solid; width: 80%;" id="bronze"><br><br>
                                    <?php echo "สิทธิพิเศษของคุณในระดับ Bronze"; ?><br>
                                    <?php echo "ส่วนลดการใช้คะแนน  5%"; ?>
                                <?php } else if ($arr_tus[0]->tus_cur_score > 25 && $arr_tus[0]->tus_cur_score <= 50) { ?>
                                    <img src="<?php echo base_url() . 'assets/templete/picture/' ?>/./silver.jpg" class="change_width" style="margin-left: auto; margin-right: auto;border: 2px solid; width: 80%;" id="silver"><br><br>
                                    <?php echo "สิทธิพิเศษของคุณในระดับ Silver"; ?><br>
                                    <?php echo "ส่วนลดการใช้คะแนน  7%"; ?>
                                <?php } else if ($arr_tus[0]->tus_cur_score > 50 && $arr_tus[0]->tus_cur_score <= 75) { ?>
                                    <img src="<?php echo base_url() . 'assets/templete/picture/' ?>/./gold.jpg" class="change_width" style="margin-left: auto; margin-right: auto;border: 2px solid; width: 80%;" id="gold"><br><br>
                                    <?php echo "สิทธิพิเศษของคุณในระดับ Gold"; ?><br>
                                    <?php echo "ส่วนลดการใช้คะแนน  9%"; ?>
                                <?php } else if ($arr_tus[0]->tus_cur_score > 75 && $arr_tus[0]->tus_cur_score <= 100) { ?>
                                    <img src="<?php echo base_url() . 'assets/templete/picture/' ?>/./platinum.jpg" class="change_width" style="margin-left: auto; margin-right: auto;border: 2px solid; width: 80%;" id="DropcarbonHero"><br><br>
                                    <?php echo "สิทธิพิเศษของคุณในระดับ Dropcarbon Hero"; ?><br>
                                    <?php echo "ส่วนลดการใช้คะแนน  11%"; ?>
                                <?php } else if ($arr_tus[0]->tus_cur_score >= 100) { ?>
                                    <img src="<?php echo base_url() . 'assets/templete/picture/' ?>/./platinum.jpg" class="change_width" style="margin-left: auto; margin-right: auto;border: 2px solid; width: 80%;" id="DropcarbonHero"><br><br>
                                    <?php echo "สิทธิพิเศษของคุณในระดับ Dropcarbon Hero"; ?><br>
                                    <?php echo "ส่วนลดการใช้คะแนน  11%"; ?>
                                <?php } else { ?>
                                    <?php echo ""; ?>
                                <?php } ?>
                            </p>
                            <!-- แสดง logo rank สิทธิพิเศษ ส่วนลดการใช้คะแนนของแต่ละ rank-->
                            <!-- อีกกี่แต้มถึงจะอัพ -->
                            <p style="text-align: center; font-size: 16px;">
                                <?php
                                $score = 0;
                                if ($arr_tus[0]->tus_cur_score < 25) {
                                    $score += 25 - $arr_tus[0]->tus_cur_score;
                                    echo "ต้องการอีก $score แต้ม เพื่อปลดล็อค ระดับ Silver";
                                } else if ($arr_tus[0]->tus_cur_score > 25 && $arr_tus[0]->tus_cur_score <= 50) {
                                    $score += 50 - $arr_tus[0]->tus_cur_score;
                                    echo "ต้องการอีก $score แต้ม เพื่อปลดล็อค ระดับ Gold";
                                } else if ($arr_tus[0]->tus_cur_score > 50 && $arr_tus[0]->tus_cur_score <= 75) {
                                    $score += 75 - $arr_tus[0]->tus_cur_score;
                                    echo "ต้องการอีก $score แต้ม เพื่อปลดล็อค ระดับ Dropcarbon Hero";
                                } else {
                                    echo "";
                                } ?>
                            </p>
                        </div>
                    </div>
                </div>
            </form>
            <!-- form -->
        </section>

        <section>
            <!-- รางวัลของฉัน -->
            <div class="header-break">
                รางวัลของฉัน
            </div>
            <div>
                <p align="right">
                    <a class="btn btn-primary" href="<?php echo base_url() . 'Landing_page/Landing_page/show_reward_history' ?>">ประวัติการใช้งานของรางวัล <span class="material-icons">arrow_right_alt</span></a>
                </p>
            </div>
            <!-- ถ้าไม่มีรางวัลของฉัน -->
            <?php if (empty($tou_pro[0]->tou_pro_id)) { ?>
                <h4 align="center">ไม่มีข้อมูลรางวัลของคุณ</h4>
            <?php } else { ?>
                <?php if (count($tou_pro) > 3) {
                    $count_tou_pro = 3;
                } else {
                    $count_tou_pro = count($tou_pro);
                } ?>
                <?php for ($i = 0; $i < $count_tou_pro; $i++) { ?>
                    <div class="container">
                        <div class="card" style="width: 100%">
                            <div class="row">
                                <div class="col">
                                    <!-- แสดงรูป -->
                                    <img src="<?php echo base_url() . 'image_promotions/' . $tou_pro[$i]->pro_img_path; ?>" style="margin-left: 35px; border: 2px solid; width: 250px; height: 200px; margin-top: 35px; margin-left: 35px;" id="img_01">
                                </div>
                                <div class="col-7">
                                    <!-- แสดงชื่อ -->
                                    <p style="margin: 100px 30px; font-size: 28px;"><?php echo $tou_pro[$i]->pro_name; ?><br><br><?php echo substr($tou_pro[$i]->pro_description, 0, 100) . "..."; ?></p>
                                    <!-- <p style="margin: 10px 10px; font-size: 20px;"><?php echo substr($tou_pro[$i]->pro_description, 0, 100) . "..."; ?></p> -->
                                </div>
                                <div class="col" style="margin: 100px 30px;">
                                    <button type="submit" class="btn btn-primary btn-lg" onclick="confirm_use_reward(<?php echo $tou_pro[$i]->tou_id ?>)">ใช้</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <!-- ดูเพิ่มเติม -->
                <p data-aos="fade-left" class="float-right"><a href="<?php echo base_url() . 'Landing_page/Landing_page/show_reward_list' ?>">ดูเพิ่มเติม</a></p>
            <?php } ?>
        </section>
        <section>
            <!-- ประวัติการเข้าร่วมกิจกรรม -->
            <div class="header-break">
                ประวัติการเข้าร่วมกิจกรรม
            </div>

            <div class="container">
                <div class="row">
                    <?php if (count($checkin) <= 3) {
                        $count_checkin = count($checkin);
                    } else {
                        $count_checkin = 3;
                    } ?>
                    <?php for ($i = 0; $i < $count_checkin; $i++) { ?>
                        <div class="col-md-4">
                            <div class="card card-custom">
                                <!-- ส่วนของรูป -->
                                <a href="<?php echo base_url() . 'Landing_page/Landing_page/show_event_detail/' . $checkin[$i]->eve_id; ?>">
                                    <img src="<?php echo base_url() . 'image_event/' . $checkin[$i]->eve_img_path; ?>" class="card-img-top" style="height: 300px; weight: 270; object-fit: cover;" alt="...">
                                </a>
                                <div class="card-body">
                                    <!-- ส่วนของรูป -->
                                    <a href="#">
                                        <h3 class="text-decoration-none text-dark"><?php echo $checkin[$i]->eve_name ?></h3>
                                    </a>
                                    <!-- ส่วนของรายละเอียด -->
                                    <p class="card-text"><?php echo iconv_substr($checkin[$i]->eve_description, 0, 120, "UTF-8") . "..."; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!-- ดูเพิ่มเติม -->
                <?php if (count($checkin) > 3) { ?>
                    <p style="float : right;"><a href="<?php echo base_url() . 'Tourist/Checkin_event/Checkin_event/show_page_checkin' ?>">ดูเพิ่มเติม <span class="material-icons">arrow_right_alt</span></a></p>
                <?php } ?>
            </div>
        </section>
    </div>
</div>

<!-- modal use reward  -->
<div class="modal" tabindex="-1" role="dialog" id="modal_use">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-family: 'Prompt', sans-serif !important;">แจ้งเตือน</h5>
            </div>
            <div class="modal-body">
                <p>คุณต้องการที่จะใช้รางวัลนี้หรือไม่ <span id="use"></span> ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="use_btn" data-dismiss="modal">ยืนยัน</button>
                <button type="button" class="btn btn-secondary" style="color: white; background-color: #777777;" data-dismiss="modal">ยกเลิก</button>
            </div>
        </div>
    </div>
</div>

<script>
    /*
     * update picture realtime
     * @input -
     * @output -
     * @author Naaka punparich 62160082
     * @Create Date 2565-01-04
     */
    const img_div = document.querySelector('.profile-pic-div');
    const img = document.querySelector('#photo');
    const file = document.querySelector('#file');
    const upload_btn = document.querySelector('#upload_btn');

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

    $(document).ready(function() {
        let error_register_tourist = "<?php echo $this->session->userdata("error_register_tourist"); ?>";
        if (error_register_tourist == "edit_success") {
            swal("สำเร็จ", "การแก้ไขข้อมูลของคุณเสร็จสิ้น", "success");
            <?php echo $this->session->unset_userdata("error_register_tourist"); ?>
        } else if (error_register_tourist == "fail") {
            swal("สำเร็จ", "การแก้ไขข้อมูลของคุณไม่สำเสร็จ", "unsuccess");
            <?php echo $this->session->unset_userdata("error_register_tourist"); ?>
        }
        let exchange_promotion = "<?php echo $this->session->userdata("exchange_promotion"); ?>";
        if (exchange_promotion == "exchange_success") {
            swal("สำเร็จ", "แลกของรางวัลเสร็จสิ้น", "success");
            <?php echo $this->session->unset_userdata("exchange_promotion"); ?>
        }
        let birth_date_old = '<?php echo json_decode(intval(substr($arr_tus[0]->tus_birthdate, 8))) ?>';
        check_date_by_month(birth_date_old);
    });

    /*
     * confirm_use
     * confirm use reward
     * @input tou_id
     * @output modal comfirm use reward
     * @author Thanisorn thumsawanit 62160088
     * @Create Date 2565-01-04
     */
    function confirm_use_reward(tou_id) {
        $('#use').text();
        $('#modal_use').modal();

        // button
        $('#use_btn').click(function() {
            use_reward_ajax(tou_id)
        });
    }

    /*
     * use_reward_ajax
     * use_reward
     * @input tou_id
     * @output use_reward
     * @author Thanisorn thumsawanit 62160088
     * @Create Date 2565-01-04
     */
    function use_reward_ajax(tou_id) {
        console.log(tou_id);
        $.ajax({
            type: "POST",
            data: {
                tou_id: tou_id
            },
            url: '<?php echo site_url() . 'Tourist/Manage_tourist/Tourist_manage/use_reward_ajax/' ?>',
            success: function() {
                swal({
                        title: "ใช้ของรางวัล",
                        text: "คุณได้ทำการใช้ของรางวัลเสร็จสิ้น",
                        type: "success"
                    },
                    function() {
                        location.reload();
                    })

            },
            error: function() {
                alert('ajax error working');
            }
        });

    }
</script>

<script>
    /*
     * undisabled_text
     * @input -
     * @output -
     * @author Naaka punparich 62160082
     * @Create Date 2565-01-04
     */
    function undisabled_text() {
        // change css
        document.getElementById('upload_btn').style.cssText = 'visibility: visible;';
        document.getElementById('edit_information').style.cssText = 'font-size: 18px; border-color: #ff9800; padding: 10px 24px; width: 235px; height: 40px; display: none;';
        document.getElementById('confirm_btn').style.cssText = ' height: 40px; margin-right: 10px; color: white; font-size: 18px;';
        document.getElementById('cancel').style.cssText = ' height: 40px; color: white; background-color: #777777; font-size: 18px;';

        // change js
        document.getElementById('tus_birth_year').disabled = false;
        document.getElementById('tus_birth_month').disabled = false;
        document.getElementById('tus_birth_date').disabled = false;
        document.getElementById("visible").disabled = false;
        $("input[type=file]").prop("disabled", false);
        $("input[id=visible]").prop("disabled", false);
        $("input[id=tus_password]").prop("disabled", false);
        $("input[id=tus_password_cf]").prop("disabled", false);
        document.getElementById("toggle_pw").textContent = "visibility_off";
        document.getElementById("toggle_pw_cf").textContent = "visibility_off";
        $("#tus_password").attr('type', "text");
        $("#tus_password_cf").attr('type', "text");
    }

    /*
     * disabled_text
     * @input -
     * @output -
     * @author Naaka punparich 62160082
     * @Create Date 2565-01-04
     */
    function disabled_text() {
        // change css
        document.getElementById('upload_btn').style.cssText = 'visibility: hidden;';
        document.getElementById('edit_information').style.cssText = 'font-size: 18px; border-color: #ff9800; padding: 10px 24px; width: 235px; height: 40px;';
        document.getElementById('confirm_btn').style.cssText = ' height: 40px; margin-right: 10px; color: white; font-size: 18px; display: none;';
        document.getElementById('cancel').style.cssText = ' height: 40px; color: white; background-color: #777777; font-size: 18px; display: none;';

        // change js
        document.getElementById('tus_birth_year').disabled = true;
        document.getElementById('tus_birth_month').disabled = true;
        document.getElementById('tus_birth_date').disabled = true;
        document.getElementById("visible").disabled = true;
        $("input[type=file]").prop("disabled", true);
        $("input[id=visible]").prop("disabled", true);
        $("input[id=tus_password]").prop("disabled", true);
        $("input[id=tus_password_cf]").prop("disabled", true);
        document.getElementById("toggle_pw").textContent = "visibility";
        document.getElementById("toggle_pw_cf").textContent = "visibility";
        $("#tus_password").attr('type', "password");
        $("#tus_password_cf").attr('type', "password");

    }

    /*
     * check_date_by_month
     * check birth date by birth month
     * @input tus_birth_month, tus_birth_year
     * @output tus_birth_date
     * @author Suwapat Saowarod 62160340
     * @Create Date 2565-01-1ุ6
     * @Update - 
     */
    function check_date_by_month(birth_date_old) {
        let birth_month = $('#tus_birth_month').val();
        let birth_year = $('#tus_birth_year').val();
        let html_code = '';
        let count_date;
        if (birth_month == 0 || birth_month == 1 || birth_month == 3 || birth_month == 5 || birth_month == 7 || birth_month == 8 || birth_month == 10 || birth_month == 12) {
            count_date = 31;
        } else if (birth_month == 4 || birth_month == 6 || birth_month == 9 || birth_month == 11) {
            count_date = 30;
        } else {
            let mod_4, mod_100, mod_400;
            // เช็คว่ามี 28 หรือ 29 วัน อัลกอลิทึม
            mod_4 = birth_year % 4;
            mod_100 = birth_year % 100;
            mod_400 = birth_year % 400;
            if (mod_4 == 0 && mod_100 == 0 && mod_400 == 0 && birth_year > 0) {
                count_date = 28;
            } else {
                count_date = 29;
            }
        }
        html_code += '<option value="' + 0 + '">วว</option>';
        for (let i = 1; i <= count_date; i++) {
            if (birth_date_old == 'not have old date') {
                if ($('#tus_birth_date').val() == i) {
                    html_code += '<option value="' + i + '" selected>' + i + '</option>';
                } else {
                    html_code += '<option value="' + i + '">' + i + '</option>';
                }
            } else {
                if (birth_date_old == i) {
                    html_code += '<option value="' + i + '" selected>' + i + '</option>';
                } else {
                    html_code += '<option value="' + i + '">' + i + '</option>';
                }
            }
        }
        $('#tus_birth_date').html(html_code);
    }
</script>