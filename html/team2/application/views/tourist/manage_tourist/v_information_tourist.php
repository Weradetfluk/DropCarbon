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
                            <a href="<?php echo site_url() . 'Tourist/Auth/Register_tourist/show_regis_tourist'; ?>">
                                <button class="btn btn-warning" style="border-color: #ff9800; padding: 10px 24px;">
                                    <span class="material-icons">edit</span> แก้ไขข้อมูลส่วนตัว
                                </button>
                            </a>

                        </div>
                        <div class="row">

                            <!-- ชื่อ-นามสกุล -->
                            <h3><?php echo $arr_tus[0]->tus_firstname; ?> <?php echo $arr_tus[0]->tus_lastname; ?></h3>

                        </div>
                        <div class="row">

                            <!-- คะแนนของฉัน -->
                            <h3>คะแนนของฉัน</h3>
                            <h1 style="display:inline; color: #239d58; padding: 0px 10px;"><?php echo $arr_tus[0]->tus_score; ?></h1>
                            <h3 style="display:inline;">แต้ม</h3>

                        </div>
                        <div class="row" style="border: 2px solid; padding: 10px 24px;">

                            <!-- อีกกี่แต้มถึงจะอัพ -->
                            <p style="margin-left: auto; margin-right: auto;font-size: 22px;padding-top: 12px;">
                                <?php
                                $score = 0;
                                if ($arr_tus[0]->tus_score < 25) {
                                    $score += 25 - $arr_tus[0]->tus_score;
                                    echo "ต้องการอีก $score แต้ม ";
                                } else if ($arr_tus[0]->tus_score > 25 && $arr_tus[0]->tus_score <= 50) {
                                    $score += 50 - $arr_tus[0]->tus_score;
                                    echo "ต้องการอีก $score แต้ม ";
                                } else if ($arr_tus[0]->tus_score > 50 && $arr_tus[0]->tus_score <= 75) {
                                    $score += 75 - $arr_tus[0]->tus_score;
                                    echo "ต้องการอีก $score แต้ม ";
                                } else if ($arr_tus[0]->tus_score > 75 && $arr_tus[0]->tus_score <= 100) {
                                    $score += 100 - $arr_tus[0]->tus_score;
                                } else {
                                    echo ".";
                                } ?>
                            </p>
                            <p style="margin-left: auto; margin-right: auto;font-size: 22px;">
                                <?php
                                $score = 0;
                                if ($arr_tus[0]->tus_score < 25) {
                                    $score += 25 - $arr_tus[0]->tus_score;
                                    echo "เพื่อปลดล็อค ระดับ Silver";
                                } else if ($arr_tus[0]->tus_score > 25 && $arr_tus[0]->tus_score <= 50) {
                                    $score += 50 - $arr_tus[0]->tus_score;
                                    echo "เพื่อปลดล็อค ระดับ Gold";
                                } else if ($arr_tus[0]->tus_score > 50 && $arr_tus[0]->tus_score <= 75) {
                                    $score += 75 - $arr_tus[0]->tus_score;
                                    echo "เพื่อปลดล็อค ระดับ Platinum";
                                } else if ($arr_tus[0]->tus_score > 75 && $arr_tus[0]->tus_score <= 100) {
                                    $score += 100 - $arr_tus[0]->tus_score;
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
                            if ($arr_tus[0]->tus_score < 25) {
                                echo "สิทธิพิเศษของคุณในระดับ Bronze";
                            } else if ($arr_tus[0]->tus_score > 25 && $arr_tus[0]->tus_score <= 50) {
                                echo "สิทธิพิเศษของคุณในระดับ Silver";
                            } else if ($arr_tus[0]->tus_score > 50 && $arr_tus[0]->tus_score <= 75) {
                                echo "สิทธิพิเศษของคุณในระดับ Gold";
                            } else if ($arr_tus[0]->tus_score > 75 && $arr_tus[0]->tus_score <= 100) {
                                echo "สิทธิพิเศษของคุณในระดับ Platinum";
                            } else {
                                echo ".";
                            } ?>
                        </p>
                        <p style="text-align: center;font-size: 22px;">
                            <?php
                            if ($arr_tus[0]->tus_score < 25) {
                                echo "ส่วนลดการใช้คะแนน  5%";
                            } else if ($arr_tus[0]->tus_score > 25 && $arr_tus[0]->tus_score <= 50) {
                                echo "ส่วนลดการใช้คะแนน 7%";
                            } else if ($arr_tus[0]->tus_score > 50 && $arr_tus[0]->tus_score <= 75) {
                                echo "ส่วนลดการใช้คะแนน 9%";
                            } else if ($arr_tus[0]->tus_score > 75 && $arr_tus[0]->tus_score <= 100) {
                                echo "ส่วนลดการใช้คะแนน 11%";
                            } else {
                                echo ".";
                            } ?>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- <section>
            <div class="header-break">
                    รางวัลของฉัน
            </div>
            <?php if (empty($tou_pro[0]->tou_pro_id)) { ?>
            <h4 align="center">ไม่มีข้อมูลโปรโมชันของคุณ</h4>
            <?php } else { ?>

            <div class="container">
                <div class="card">
                    <div class="row">
                        <div class="col">
                            <img src="<?php echo base_url() . 'image_promotions/' . $tou_pro[0]->pro_img_path; ?>" style="border: 2px solid; width: 250px; height: 200px; margin-top: 16px;" id="img_01">
                        </div>
                        <div class="col-7">
                            <p style="margin: 100px 30px; font-size: 28px;"><?php echo substr($tou_pro[0]->pro_description, 0, 100) . "..."; ?></p>
                        </div>
                        <div class="col" style="margin: 100px 30px;">
                            <button class="btn btn-success">ใช้</button>
                        </div>
                    </div>
                </div>
                <p class="align-center"><a href="#">ดูเพิ่มเติม</a></p>
            </div>
            <?php } ?>
        </section> -->

        <section>
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
                                <p style="display:inline; font-size: 28px;"> แต้ม</p>
                            </div>
                            <div class="col"></div>
                            <div class="col">
                                <button class="btn btn-success" style="margin: 100px 30px;">แลก</button>
                            </div>
                        </div>
                    </div>
                    <p class="align-center"><a href="#">ดูเพิ่มเติม</a></p>
                </div>
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