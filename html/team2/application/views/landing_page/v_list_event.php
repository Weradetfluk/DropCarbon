<!-- 
/*
* v_list_event
* Display list event
* @input eve_cat, event 
* @output list event
* @author Naaka punparich 62160082
* @Create Date 2564-09-23
*/ 
-->

<div class="container py-5">

    <!-- Nav ว่าตอนนี้อยู่ที่ตรงไหนของเว็บ -->
    <ul class="breadcrumb">

        <!-- เข้าสู่ระบบแล้ว -->
        <?php if ($this->session->userdata("tourist_id")) { ?>
            <li><a href="<?php echo base_url() . 'Tourist/Auth/Landing_page_tourist' ?>" style="color: green;">หน้าหลัก</a></li>
        <?php } ?>

        <!-- ยังไม่ได้เข้าสู่ระบบ -->
        <?php if (!$this->session->userdata("tourist_id")) { ?>
            <li><a href="<?php echo base_url() ?>" style="color: green;">หน้าหลัก</a></li>
        <?php } ?>

        <li class="colorchange">ดูรายการกิจกรรม</li>
    </ul>

    <!-- หัวข้อ -->
    <div class="row text-left py-3">
        <div class="m-auto">
            <h1 class="h1" style="padding-bottom: 2%">กิจกรรมทั้งหมด</h1>
        </div>
    </div>

    <!-- ค้นหา / หมวดหมู่ / ปุ่มค้นหา-->
    <form action="" method="post">
        <div class="row justify-content-md-center" style="margin: 0px 0px 30px 0px;">

            <!-- ช่องค้นหา -->
            <div class="col-md-4">
                <input type="text" class="form-control form-control-custom" name="txt_event" placeholder="ค้นหาสถานที่">
            </div>

            <!-- เลือกหมวดหมู่ -->
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

            <!-- ปุ่มค้นหา -->
            <div class="col-sm-3">
                <button type="submit" class="btn btn-custom">ค้นหา</button>
            </div>

        </div>
    </form>

    <!-- แสดงกิจกรรมตามจำนวนที่มี -->
    <div class="row py-3">
        <?php for ($i = 0; $i < count($event); $i++) { ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-4 py-2">
                <a href="<?php echo base_url() . 'Landing_page/Landing_page/show_event_detail/' . $event[$i]->eve_id; ?>">
                    <div class="card card-custom" style="height: 31rem;" id="card">

                        <!-- รูป -->
                        <img src="<?php echo base_url() . 'image_event/' . $event[$i]->eve_img_path; ?>" class="card-img-top" style="height: 300px; object-fit: cover;" alt="...">

                        <div class="card-body">

                            <!-- ชื่อกิจกรรม -->
                            <h2 class="text-decoration-none text-dark"><?php echo $event[$i]->eve_name ?></h2>

                            <p class="card-tex text-dark">
                                <!-- รายละเอียดกิจกรรม -->
                                <?php echo iconv_substr($arr_eve[$i]->eve_description, 0, 60, "UTF-8") . "..."; ?>
                            </p>

                            <!-- ลดคาร์บอน -->
                            <p style="display:inline; font-size: 16px; color: #008000"><b>ลดคาร์บอนได้ <?php echo $arr_eve_cat[$i]->eve_drop_carbon; ?> กรัม</b></p>

                            <!-- เวลาเริ่ม/จบกิจกรรม -->
                            <?php
                            if (substr($arr_eve[$i]->eve_start_date, 5, 2) == "01") {
                                $start_month = "ม.ค.";
                            } else if (substr($arr_eve[$i]->eve_start_date, 5, 2) == "02") {
                                $start_month = "ก.พ.";
                            } else if (substr($arr_eve[$i]->eve_start_date, 5, 2) == "03") {
                                $start_month = "มี.ค.";
                            } else if (substr($arr_eve[$i]->eve_start_date, 5, 2) == "04") {
                                $start_month = "เม.ย.";
                            } else if (substr($arr_eve[$i]->eve_start_date, 5, 2) == "05") {
                                $start_month = "พ.ค.";
                            } else if (substr($arr_eve[$i]->eve_start_date, 5, 2) == "06") {
                                $start_month = "มิ.ย.";
                            } else if (substr($arr_eve[$i]->eve_start_date, 5, 2) == "07") {
                                $start_month = "ก.ค.";
                            } else if (substr($arr_eve[$i]->eve_start_date, 5, 2) == "08") {
                                $start_month = "ส.ค.";
                            } else if (substr($arr_eve[$i]->eve_start_date, 5, 2) == "09") {
                                $start_month = "ก.ย.";
                            } else if (substr($arr_eve[$i]->eve_start_date, 5, 2) == "10") {
                                $start_month = "ต.ค.";
                            } else if (substr($arr_eve[$i]->eve_start_date, 5, 2) == "11") {
                                $start_month = "พ.ย.";
                            } else if (substr($arr_eve[$i]->eve_start_date, 5, 2) == "12") {
                                $start_month = "ธ.ค.";
                            }

                            if (substr($arr_eve[$i]->eve_end_date, 5, 2) == "01") {
                                $end_month = "ม.ค.";
                            } else if (substr($arr_eve[$i]->eve_end_date, 5, 2) == "02") {
                                $end_month = "ก.พ.";
                            } else if (substr($arr_eve[$i]->eve_end_date, 5, 2) == "03") {
                                $end_month = "มี.ค.";
                            } else if (substr($arr_eve[$i]->eve_end_date, 5, 2) == "04") {
                                $end_month = "เม.ย.";
                            } else if (substr($arr_eve[$i]->eve_end_date, 5, 2) == "05") {
                                $end_month = "พ.ค.";
                            } else if (substr($arr_eve[$i]->eve_end_date, 5, 2) == "06") {
                                $end_month = "มิ.ย.";
                            } else if (substr($arr_eve[$i]->eve_end_date, 5, 2) == "07") {
                                $end_month = "ก.ค.";
                            } else if (substr($arr_eve[$i]->eve_end_date, 5, 2) == "08") {
                                $end_month = "ส.ค.";
                            } else if (substr($arr_eve[$i]->eve_end_date, 5, 2) == "09") {
                                $end_month = "ก.ย.";
                            } else if (substr($arr_eve[$i]->eve_end_date, 5, 2) == "10") {
                                $end_month = "ต.ค.";
                            } else if (substr($arr_eve[$i]->eve_end_date, 5, 2) == "11") {
                                $end_month = "พ.ย.";
                            } else if (substr($arr_eve[$i]->eve_end_date, 5, 2) == "12") {
                                $end_month = "ธ.ค.";
                            }

                            $start_yesr = substr($arr_eve[$i]->eve_start_date, 0, 4);
                            $start_yesr = intval($start_yesr) + 543;
                            $end_yesr = substr($arr_eve[$i]->eve_end_date, 0, 4);
                            $end_yesr = intval($end_yesr) + 543;
                            ?>
                            <p style="display:inline; font-size: 16px; float: right;"><?php echo substr($arr_eve[$i]->eve_start_date, 8, 2) . " " . $start_month . " " . $start_yesr; ?> - <?php echo substr($arr_eve[$i]->eve_end_date, 8, 2) . " " . $end_month . " " . $end_yesr; ?></p>

                        </div>
                    </div>
                </a>
            </div>
        <?php } ?>
    </div>
</div>