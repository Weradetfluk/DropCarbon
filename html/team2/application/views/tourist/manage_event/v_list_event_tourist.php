<!-- Make by : Naaka Punparich 62160082 -->
<div class="bg-white">
    <section>
        <div class="container py-5">
            <ul class="breadcrumb">
                <?php if ($this->session->userdata("tourist_id")) { ?>
                <li><a href="<?php echo base_url() . 'Tourist/Auth/Landing_page_tourist' ?>" style="color: green;">หน้าหลัก</a></li>
                <?php } ?>
                <?php if (!$this->session->userdata("tourist_id")) { ?>
                <li><a href="<?php echo base_url() ?>" style="color: green;">หน้าหลัก</a></li>
                <?php } ?>
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
                        <input type="text" class="form-control form-control-custom" name="txt_event" placeholder="ค้นหาสถานที่">
                    </div>
                    <div class="col-md-2">
                        <select class="form-control form-control-custom" name="txt_category">
                            <option value="" selected>หมวดหมู่</option>
                            <option value="1">หมวดหมู่ 1</option>
                            <option value="2">หมวดหมู่ 2</option>
                            <option value="3">หมวดหมู่ 3</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-custom">ค้นหา</button>
                    </div>
                </div>
            </form>

            <!-- <?php echo count($event); ?> -->
            <div class="row">
                <?php for ($i = 0; $i < count($checkin); $i++) { ?>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100" id="card">
                        <a href="<?php echo base_url() . 'Landing_page/Landing_page/show_event_detail/' . $checkin[$i]->eve_id; ?>">
                            <img src="<?php echo base_url() . 'image_event/' . $checkin[$i]->eve_img_path; ?>" class="card-img-top" style="height: 300px;" alt="...">
                            <!-- รูปที่ 1 -->
                            <div class="card-body" align="center">
                                <h3 class="text-decoration-none text-dark"><?php echo $checkin[$i]->eve_name ?></h3>
                                <p class="card-text"><?php echo iconv_substr($checkin[$i]->eve_description, 0, 120, "UTF-8") . "..."; ?></p>
                            </div>
                            <!-- ชื่อของรูปที่ 1 -->
                        </a>
                    </div>
                </div>

                <!-- กิจกรรมที่ 1 -->
                <?php } ?>
            </div>





        </div>
    </section>
</div>