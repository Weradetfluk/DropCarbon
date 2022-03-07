<!-- 
/*
* v_list_event_tourist
* Display list event tourist
* @input checkin
* @output list event tourist
* @author Chutipon Thermsirisuksin 62160081
* @author Weradet Nopsombun 62160110
* @Create Date 2564-09-27
* @Create Date 2564-12-30
*/ 
-->
<!-- Make by : Naaka Punparich 62160082 -->
<div class="bg-white">
    <section>
        <div class="container py-5">
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url()?>" style="color: green;">หน้าหลัก</a></li>
                <li>ดูรายการกิจกรรมของฉัน</li>
            </ul>
            <div class="row text-left py-3">
                <div class="m-auto">
                    <h1 class="h1" style="padding-bottom: 2%">กิจกรรมของฉัน</h1>
                </div>
            </div>
            <!-- กิจกรรมทั้งหมด -->

            <form action="" method="post">
                <div class="row justify-content-md-center" style="margin: 0px 0px 30px 0px;">
                    <div class="col-md-4">
                        <input type="text" class="form-control form-control-custom" name="txt_event"
                            placeholder="ค้นหากิจกรรม">
                    </div>
                    <div class="col-md-2">
                        <select class="form-control form-control-custom" name="eve_cat_id" id="eve_cat_id">
                            <option value="">เลือกทั้งหมด</option>
                            <?php for ($i = 0; $i < count($eve_cat); $i++) { ?>
                            <?php $selected = $_POST["eve_cat_id"] == $eve_cat[$i]->eve_cat_id ? "selected" : ""; ?>
                            <option value="<?php echo $eve_cat[$i]->eve_cat_id ?>" <?= $selected ?>>
                                <?php echo $eve_cat[$i]->eve_cat_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-custom">ค้นหา</button>
                    </div>
                </div>
            </form>

            <div class="row">
                <?php for ($i = 0; $i < count($checkin); $i++) { ?>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100" id="card">
                        <a
                            href="<?php echo base_url() . 'Landing_page/Landing_page/show_event_detail/' . $checkin[$i]->eve_id; ?>">
                            <img src="<?php echo base_url() . 'image_event/' . $checkin[$i]->eve_img_path; ?>"
                                class="card-img-top" style="height: 300px;" alt="...">
                            <!-- รูปที่ 1 -->
                            <div class="card-body" align="center">
                                <h3 class="text-decoration-none text-dark"><?php echo $checkin[$i]->eve_name ?></h3>
                                <!-- ชื่อของรูปที่ 1 -->
                                <?php
                                    if ($checkin[$i]->che_status == 1) { ?>
                                <h3 style="color: green;">กำลังเช็คอิน</h3>
                                <?php } else { ?>
                                <h3 style="color: green;">เช็คเอาต์แล้ว</h3>

                                <?php } ?>
                            </div>
                            <div class="container text-center">
                                <?php if ($checkin[$i]->che_status == 1) { ?>
                                <span>เช็คอินเมื่อ : <?php echo $time_format_checkin[$i] ?> </span>
                                <?php } else { ?>
                                <span>เช็คอินเมื่อ : <?php echo $time_format_checkin[$i] ?> </span> <br>
                                <span>เช็คเอาต์เมื่อ : <?php echo $time_format_checkout[$i] ?> </span>
                                <?php } ?>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- กิจกรรมที่ 1 -->
                <?php } ?>
            </div>
        </div>
    </section>
</div>