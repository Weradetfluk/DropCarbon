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
</style>

<div class="bg-gray">
    <div class="container py-5" style="border-radius: 25px; padding-bottom: 4% !important">
        <ul class="breadcrumb">

            <!-- Nav bar -->
            <li><a href="<?php echo site_url() . 'Tourist/Auth/Landing_page_tourist'; ?>" style="color: green;">หน้าหลัก</a></li>
            <li>ข้อมูลส่วนตัว</li>

        </ul>

        <section>
            <div class="container radius" style="border: 2px solid;">
                <div class="row py-5">
                    <div class="col">
                        <div class="row">

                            <!-- หัวข้อ -->
                            <h2 style="margin-left: auto; margin-right: auto; padding-bottom: 30px;">ข้อมูลส่วนตัว</h2>

                        </div>
                        <div class="row">

                            <!-- รูปโปรไฟล์ -->
                            <div class="profile-pic-div">
                                <?php if ($this->session->userdata("tus_img_path") == '') { ?>
                                    <img src="<?php echo base_url() . 'assets/templete/picture/' ?>/./person.jpg" id="photo">
                                <?php } else { ?>
                                    <img src="<?php echo base_url() . 'profilepicture_tourist/' . $this->session->userdata('tus_img_path'); ?>">
                                <?php } ?>
                            </div>

                        </div>
                    </div>
                    <div class="col py-5" style="margin-right: 18%;padding-left: 22px;">
                        <div class="row">

                            <!-- ปุ่มแก้ไขข้อมูลส่วนตัว -->
                            <button class="btn btn-warning" style="border-color: #ff9800; padding: 10px 24px;" data-toggle="modal" data-target="#exampleModal">
                                <span class="material-icons">edit</span> แก้ไขข้อมูลส่วนตัว
                            </button>

                        </div>
                        <div class="row">

                            <!-- ชื่อ-นามสกุล -->
                            <h3><?php echo $arr_tus[0]->tus_firstname; ?> <?php echo $arr_tus[0]->tus_lastname; ?></h3>

                        </div>
                        <div class="row">

                            <!-- คะแนนสูงสุดของฉัน -->
                            <h3>คะแนนสูงสุดของฉัน</h3>
                            <h1 style="display:inline; color: #239d58; padding: 0px 10px;"><?php echo $arr_tus[0]->tus_cur_score; ?></h1>
                            <h3 style="display:inline;">แต้ม</h3>

                        </div>
                        <div class="row" style="border: 2px solid; padding: 10px 24px;">

                            <!-- อีกกี่แต้มถึงจะอัพ -->
                            <p style="margin-left: auto; margin-right: auto;font-size: 22px;padding-top: 12px;">
                                <?php
                                $score = 0;
                                if ($arr_tus[0]->tus_cur_score < 25) {
                                    $score += 25 - $arr_tus[0]->tus_cur_score;
                                    echo "ต้องการอีก $score แต้ม ";
                                } else if ($arr_tus[0]->tus_cur_score > 25 && $arr_tus[0]->tus_cur_score <= 50) {
                                    $score += 50 - $arr_tus[0]->tus_cur_score;
                                    echo "ต้องการอีก $score แต้ม ";
                                } else if ($arr_tus[0]->tus_cur_score > 50 && $arr_tus[0]->tus_cur_score <= 75) {
                                    $score += 75 - $arr_tus[0]->tus_cur_score;
                                    echo "ต้องการอีก $score แต้ม ";
                                } else if ($arr_tus[0]->tus_cur_score > 75 && $arr_tus[0]->tus_cur_score < 100) {
                                    $score += 100 - $arr_tus[0]->tus_cur_score;
                                    echo "ต้องการอีก $score แต้ม ";
                                } else if ($arr_tus[0]->tus_cur_score >= 100) {
                                    $score += 100 - $arr_tus[0]->tus_cur_score;
                                    echo "Dropcarbon Hero";
                                }else {
                                    echo ".";
                                } ?>
                            </p>
                            <p style="margin-left: auto; margin-right: auto;font-size: 22px;">
                                <?php
                                $score = 0;
                                if ($arr_tus[0]->tus_cur_score < 25) {
                                    $score += 25 - $arr_tus[0]->tus_cur_score;
                                    echo "เพื่อปลดล็อค ระดับ Silver";
                                } else if ($arr_tus[0]->tus_cur_score > 25 && $arr_tus[0]->tus_cur_score <= 50) {
                                    $score += 50 - $arr_tus[0]->tus_cur_score;
                                    echo "เพื่อปลดล็อค ระดับ Gold";
                                } else if ($arr_tus[0]->tus_cur_score > 50 && $arr_tus[0]->tus_cur_score <= 75) {
                                    $score += 75 - $arr_tus[0]->tus_cur_score;
                                    echo "เพื่อปลดล็อค ระดับ Platinum";
                                } else if ( $arr_tus[0]->tus_cur_score < 100) {
                                    $score += 100 - $arr_tus[0]->tus_cur_score;
                                    echo "เพื่อปลดล็อค ระดับ Dropcarbon Hero";
                                } else if ( $arr_tus[0]->tus_cur_score >= 100) {
                                    $score += 100 - $arr_tus[0]->tus_cur_score;
                                    echo "Dropcarbon Hero";
                                } else {
                                    echo ".";
                                } ?>
                            </p>

                        </div>
                    </div>
                    <div class="col py-5" style="margin-left: auto; margin-right: auto;">
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
                            }else if ($arr_tus[0]->tus_cur_score > 75 && $arr_tus[0]->tus_cur_score <= 100) {
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
                            }else if ($arr_tus[0]->tus_cur_score >= 100) {
                                echo "ส่วนลดการใช้คะแนน 13%";
                            } else {
                                echo ".";
                            } ?>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="header-break">
                    รางวัลของฉัน
            </div>
            <?php if (empty($tou_pro[0]->tou_pro_id)) { ?>
            <h4 align="center">ไม่มีข้อมูลรางวัลของคุณ</h4>
            <?php } else { ?>
            <div class="container">
                <div class="card">
                    <div class="row">
                        <div class="col">
                            <img src="<?php echo base_url() . 'image_promotions/' . $tou_pro[0]->pro_img_path; ?>" style="border: 2px solid; width: 250px; height: 200px; margin-top: 35px;" id="img_01">
                        </div>
                        <div class="col-7">
                            <p style="margin: 100px 30px; font-size: 28px;"><?php echo $tou_pro[0]->pro_name; ?><br><br><?php echo substr($tou_pro[0]->pro_description, 0, 100) . "..."; ?></p>
                            <!-- <p style="margin: 10px 10px; font-size: 20px;"><?php echo substr($tou_pro[0]->pro_description, 0, 100) . "..."; ?></p> -->
                        </div>
                        <div class="col" style="margin: 100px 30px;">
                        <button type="submit"class="btn btn-success" onclick="confirm_use_reward(<?php echo $tou_pro[0]->tou_id ?>)">ใช้</button>
                    </div>
                    </div>
                </div>
                    <p data-aos="fade-left" class="float-right"><a href="<?php echo base_url() . 'Landing_page/Landing_page/show_reward_list' ?>">ดูเพิ่มเติม</a></p>
            </div>
            <?php } ?>
        </section>

        <!-- <section>
            <div class="header-break">
                รางวัลของฉัน
            </div>
            <?php if (empty($rw_pro[0]->ret_rew_id)) { ?>
                <h4 align="center">ไม่มีข้อมูลรางวัลของคุณ</h4>
            <?php } else { ?>
                <div class="container">
                    <div class="card">
                        <div class="row">
                            <div class="col">
                                <img src="<?php echo base_url() . 'image_reward/' . $rw_pro[0]->rew_img_path; ?>" style="border: 2px solid; width: 250px; height: 200px; margin-top: 16px;" id="img_01">
                            </div>
                            <div class="col">
                                <p style="margin-top: 90px; margin-left: 30px; font-size: 28px;"><?php echo $rw_pro[0]->rew_name; ?></p>
                                <p style="margin-left: 30px; font-size: 28px; display:inline; color: #239d58;">500</p>
                                <!-- แต้มยังไม่รู้ว่าเอาจากตารางไหนใน Database -->
                                
                            <!-- </div>
                        </div>
                    </div>
                    <p class="align-center"><a href="#">ดูเพิ่มเติม</a></p>
                </div>
            <?php } ?> -->
        <!-- </section> -->

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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="container py-5" style="background-color: white; border-radius: 25px;  padding-right: 1.5%; padding-left: 1.5%; margin-top: 5%;">

        <h1 class="h1" style="text-align: center; padding-bottom: 1%;" class="font-w-500">แก้ไขข้อมูลส่วนตัว</h1>
        <!-- แก้ไขข้อมูลส่วนตัว -->

        <form id="verifyForm" class="container py-3" method='POST' action='<?php echo site_url() . 'Tourist/Manage_tourist/Tourist_manage/update_tourist'; ?>' style="margin:0;" enctype="multipart/form-data">
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

            <a class="btn btn-secondary" style="color: white; background-color: #777777; font-size: 18px; float: right;" href="<?php echo base_url() . 'Tourist/Manage_tourist/Tourist_manage/show_information_tourist' ?>">ยกเลิก</a>
            <!-- ปุ่มยกเลิก -->
            <button type="submit" id="confirm_btn" class="btn btn-success" style="margin-right: 10px; color: white; font-size: 18px; float: right;">บันทึก</button>
            <!-- ปุ่มบันทึก -->
        </form>
        <!-- form -->
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
                <button type="button" class="btn btn-secondary" style="color: white; background-color: #777777;"
                    data-dismiss="modal">ยกเลิก</button>
            </div>
        </div>
    </div>
</div>

<script>
    /*
     * @author Naaka punparich 62160082
     */
    const imgDiv = document.querySelector('.profile-pic-div');
    const img = document.querySelector('#photo');
    const file = document.querySelector('#file');
    const upload_Btn = document.querySelector('#upload_Btn');

    imgDiv.addEventListener('mouseenter', function() {
        upload_Btn.style.display = "block";
    });

    imgDiv.addEventListener('mouseleave', function() {
        upload_Btn.style.display = "none";
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

    $(document).ready(function() {
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