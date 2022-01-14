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
</style>

<div class="bg-gray">
    <div class="container py-5" style="border-radius: 25px; padding-bottom: 4% !important">
        <ul class="breadcrumb">

            <!-- Nav bar -->
            <li><a href="<?php echo site_url() . 'Tourist/Auth/Landing_page_tourist'; ?>" style="color: green;">หน้าหลัก</a></li>
            <li>ข้อมูลส่วนตัว</li>

        </ul>

        <section>
            <form id="verifyForm" class="container py-3" method='POST' action='<?php echo site_url() . 'Tourist/Manage_tourist/Tourist_manage/update_tourist'; ?>' style="margin:0;" enctype="multipart/form-data">
                <div class="container radius" style="border: 2px solid;">
                    <div class="row py-3">
                        <div class="col">
                            <div class="row" style="margin-top: 75px;">

                                <!-- รูปโปรไฟล์ -->
                                <div class="profile-pic-div">
                                    <?php if ($this->session->userdata("tus_img_path") == '') { ?>
                                    <img src="<?php echo base_url() . 'assets/templete/picture/' ?>/./person.jpg" id="photo" onclick="document.getElementById('file').click();">
                                    <?php } else { ?>
                                    <img src="<?php echo base_url() . 'profilepicture_tourist/' . $this->session->userdata('tus_img_path'); ?>">
                                    <?php } ?>
                                    <input type="file" id="file" name="tourist_img" accept="image/*" disabled>
                                    <label for="file" id="upload_btn" style="visibility: hidden;">เลือกรูปภาพ</label>
                                </div>

                                <input type="hidden" name="tus_id" value='<?php echo $arr_tus[0]->tus_id; ?>'>

                            </div>
                        </div>

                        <div class="col-6" style="padding-left: 22px;">
                            <div class="row">
                                <!-- หัวข้อ -->
                                <h2 style="margin-left: auto; margin-right: auto; padding-bottom: 30px;">ข้อมูลส่วนตัว</h2>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-2 mb-3" style="margin-top: -6px;">
                                    <label for="prefix" class="label">คำนำหน้า</label><br>
                                    <select class="form-control mt-1" name="tus_pre_id" id="visible" style="margin-top: -15px !important; " required disabled>
                                        <?php for ($i = 0; $i < count($arr_prefix); $i++) { ?>
                                        <?php if ($i + 1 == $arr_tus[0]->tus_pre_id) { ?>
                                        <option value="<?php echo $i + 1 ?>" selected><?php echo $arr_prefix[$i]->pre_name ?></option>

                                        <?php } else { ?>
                                        <option value="<?php echo $i + 1 ?>"><?php echo $arr_prefix[$i]->pre_name ?></option>
                                        <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4 mb-3">

                                    <label for="tus_firstname">ชื่อ</label>
                                    <input type="text" class="form-control mt-1" placeholder="ชื่อ" name='tus_firstname' id="visible" value='<?php echo $arr_tus[0]->tus_firstname; ?>' required disabled>
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label for="tus_lastname">นามสกุล</label>
                                    <input type="text" class="form-control mt-1" placeholder="นามสกุล" name='tus_lastname' id="visible" value='<?php echo $arr_tus[0]->tus_lastname; ?>' required disabled>
                                </div>
                            </div>
                            <!-- ชื่อจริง-นามสกุล -->

                            <div class="row">
                                <div class="form-group col-md-6 mb-3">
                                    <label for="tus_tel" style="color:black">เบอร์โทรศัพท์</label>
                                    <input type="text" class="form-control" placeholder="หมายเลขโทรศัพท์" name='tus_tel' id="visible" value="<?php echo $arr_tus[0]->tus_tel; ?>" required disabled>
                                </div>

                                <div class="form-group col-md-6 mb-3">
                                    <label for="tus_birthdate" style="color:black">วันเกิด</label>
                                    <input type="date" class="form-control" placeholder="birthdate" name='tus_birthdate' id="visible" value="<?php echo $arr_tus[0]->tus_birthdate; ?>" required disabled>
                                </div>
                            </div>
                            <!-- เบอร์ วันเกิด -->

                            <div class="row">
                                <div class="form-group col-md-6 mb-3">
                                    <label for="tus_email" style="color:black">อีเมล</label>
                                    <input type="text" class="form-control" placeholder="E-mail" name='tus_email' id="visible" value="<?php echo $arr_tus[0]->tus_email; ?>" required disabled>
                                </div>
                                <!-- อีเมล -->

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

                        <div class="col" style="margin-left: auto; margin-right: auto; margin-top: 75px;">
                            <p class="change_width" style="margin-left: auto; margin-right: auto;border: 2px solid;"></p>
                            <p style="text-align: center;font-size: 22px;">
                                <?php
                                if ($arr_tus[0]->tus_cur_score < 25) {
                                    echo "สิทธิพิเศษของคุณในระดับ Bronze";
                                } else if ($arr_tus[0]->tus_cur_score > 25 && $arr_tus[0]->tus_cur_score <= 50) {
                                    echo "สิทธิพิเศษของคุณในระดับ Silver";
                                } else if ($arr_tus[0]->tus_cur_score > 50 && $arr_tus[0]->tus_cur_score <= 75) {
                                    echo "สิทธิพิเศษของคุณในระดับ Gold";
                                } else if ($arr_tus[0]->tus_cur_score > 75 && $arr_tus[0]->tus_cur_score <= 100) {
                                    echo "สิทธิพิเศษของคุณในระดับ Platinum";
                                } else if ($arr_tus[0]->tus_cur_score > 75 && $arr_tus[0]->tus_cur_score <= 100) {
                                    echo "สิทธิพิเศษของคุณในระดับ Dropcarbon Hero";
                                } else {
                                    echo ".";
                                } ?>
                            </p>
                            <p style="text-align: center;font-size: 22px;">
                                <?php
                                if ($arr_tus[0]->tus_cur_score < 25) {
                                    echo "ส่วนลดการใช้คะแนน  5%";
                                } else if ($arr_tus[0]->tus_cur_score > 25 && $arr_tus[0]->tus_cur_score <= 50) {
                                    echo "ส่วนลดการใช้คะแนน 7%";
                                } else if ($arr_tus[0]->tus_cur_score > 50 && $arr_tus[0]->tus_cur_score <= 75) {
                                    echo "ส่วนลดการใช้คะแนน 9%";
                                } else if ($arr_tus[0]->tus_cur_score > 75 && $arr_tus[0]->tus_cur_score < 100) {
                                    echo "ส่วนลดการใช้คะแนน 11%";
                                } else if ($arr_tus[0]->tus_cur_score >= 100) {
                                    echo "ส่วนลดการใช้คะแนน 13%";
                                } else {
                                    echo ".";
                                } ?>
                            </p>

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
                                    echo "ต้องการอีก $score แต้ม เพื่อปลดล็อค ระดับ Platinum";
                                } else if ($arr_tus[0]->tus_cur_score > 75 && $arr_tus[0]->tus_cur_score < 100) {
                                    $score += 100 - $arr_tus[0]->tus_cur_score;
                                    echo "ต้องการอีก $score แต้ม เพื่อปลดล็อค ระดับ Dropcarbon Hero";
                                } else if ($arr_tus[0]->tus_cur_score >= 100) {
                                    $score += 100 - $arr_tus[0]->tus_cur_score;
                                    echo "Dropcarbon Hero";
                                } else {
                                    echo ".";
                                } ?>
                            </p>
                        </div>
                    </div>
                </div>
            </form>
            <!-- form -->
        </section>

        <section>
            <div class="header-break">
                    รางวัลของฉัน
            </div>
            <?php if (empty($tou_pro[0]->tou_pro_id)) { ?>
            <h4 align="center">ไม่มีข้อมูลรางวัลของคุณ</h4>
            <?php } else { ?>
                <?php if (count($tou_pro) > 3) { 
                    $count_tou_pro = 3;
                 }else{
                    $count_tou_pro = count($tou_pro);
                 } ?>
                <?php for ($i = 0; $i < $count_tou_pro; $i++) { ?>
                    <div class="container">
                        <div class="card" style="width: 100%">
                            <div class="row">
                                <div class="col">
                                    <img src="<?php echo base_url() . 'image_promotions/' . $tou_pro[$i]->pro_img_path; ?>" style="margin-left: 35px; border: 2px solid; width: 250px; height: 200px; margin-top: 35px;" id="img_01">
                                </div>
                                <div class="col-7">
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
                
            <p data-aos="fade-left" class="float-right"><a href="<?php echo base_url() . 'Landing_page/Landing_page/show_reward_list' ?>">ดูเพิ่มเติม</a></p>
            <?php } ?>
        </section>

        <section>
            <div class="header-break">
                ประวัติการเข้าร่วมกิจกรรม
            </div>

            <div class="container">
                <div class="row">
                    <?php for ($i = 0; $i < count($checkin); $i++) { ?>
                        <?php if (count($checkin) < 3) { ?>
                        <div class="col-md-4">
                            <div class="card">
                                <a href="<?php echo base_url() . 'Landing_page/Landing_page/show_event_detail/' . $checkin[$i]->eve_id; ?>">
                                    <img src="<?php echo base_url() . 'image_event/' . $checkin[$i]->eve_img_path; ?>" class="card-img-top" style="height: 300px;" alt="...">
                                </a>
                                <div class="card-body">
                                    <a href="#">
                                        <h3 class="text-decoration-none text-dark"><?php echo $checkin[$i]->eve_name ?></h3>
                                    </a>
                                    <p class="card-text"><?php echo iconv_substr($checkin[$i]->eve_description, 0, 120, "UTF-8") . "..."; ?></p>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="col-12 col-md-4 mb-4">
                            <div class="card h-100" id="card">
                                <a href="<?php echo base_url() . 'Landing_page/Landing_page/show_event_detail/' . $checkin[$i]->eve_id; ?>">
                                    <img src="<?php echo base_url() . 'image_event/' . $checkin[$i]->eve_img_path; ?>" class="card-img-top" style="height: 300px;" alt="...">
                                    <div class="card-body" align="center">
                                        <h3 class="text-decoration-none text-dark"><?php echo $checkin[$i]->eve_name ?></h3>
                                        <p class="card-text"><?php echo iconv_substr($checkin[$i]->eve_description, 0, 120, "UTF-8") . "..."; ?></p>
                                    </div>
                                </a>
                            </div>
                        </div> -->
                        <?php } ?>
                    <?php } ?>

                </div>
                <?php if (count($checkin) > 3) { ?>
                <p style="float : right;"><a href="<?php echo base_url() . 'Tourist/Event_tourist/Tourist_event/show_event_list_tourist' ?>">ดูเพิ่มเติม <span class="material-icons">arrow_right_alt</span></a></p>
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
const imgDiv = document.querySelector('.profile-pic-div');
const img = document.querySelector('#photo');
const file = document.querySelector('#file');
const upload_btn = document.querySelector('#upload_btn');

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

$(document).ready(function() {
    let exchange_promotion = "<?php echo $this->session->userdata("exchange_promotion"); ?>";
    if (exchange_promotion == "exchange_success") {
        swal("สำเร็จ", "แลกของรางวัลเสร็จสิ้น", "success");
        <?php echo $this->session->unset_userdata("exchange_promotion"); ?>
    }
    let error_register_tourist = "<?php echo $this->session->userdata("error_register_tourist"); ?>";
    if (error_register_tourist == "edit_success") {
        swal("สำเร็จ", "การแก้ไขข้อมูลของคุณเสร็จสิ้น", "success");
        <?php echo $this->session->unset_userdata("error_register_tourist"); ?>
    } else if (error_register_tourist == "fail") {
        swal("สำเร็จ", "การแก้ไขข้อมูลของคุณไม่สำเสร็จ", "unsuccess");
        <?php echo $this->session->unset_userdata("error_register_tourist"); ?>
    }
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
    document.getElementById("visible").disabled = false;
    $("input[type=file]").prop("disabled", false);
    $("input[id=visible]").prop("disabled", false);
}

function disabled_text() {
    // change css
    document.getElementById('upload_btn').style.cssText = 'visibility: hidden;';
    document.getElementById('edit_information').style.cssText = 'font-size: 18px; border-color: #ff9800; padding: 10px 24px; width: 235px; height: 40px;';
    document.getElementById('confirm_btn').style.cssText = ' height: 40px; margin-right: 10px; color: white; font-size: 18px; display: none;';
    document.getElementById('cancel').style.cssText = ' height: 40px; color: white; background-color: #777777; font-size: 18px; display: none;';

    // change js
    document.getElementById("visible").disabled = true;
    $("input[type=file]").prop("disabled", true);
    $("input[id=visible]").prop("disabled", true);
}
</script>