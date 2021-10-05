<!-- Make by : Chutipon Thermsirisuksin 62160081 -->
<div class="container py-5">
    <ul class="breadcrumb">
        <?php if ($this->session->userdata("tourist_id")) { ?>
        <li><a href="<?php echo base_url() . 'Tourist/Auth/Landing_page_tourist' ?>" style="color: green;">หน้าหลัก</a></li>
        <?php } ?>
        <?php if (!$this->session->userdata("tourist_id")) { ?>
        <li><a href="<?php echo base_url() ?>" style="color: green;">หน้าหลัก</a></li>
        <?php } ?>
        <li class="colorchange">ดูรายการโปรโมชัน</li>
    </ul>
    <div class="row text-left py-3">
        <div class="m-auto">
            <h1 class="h1" style="padding-bottom: 2%">โปรโมชันทั้งหมด</h1>
        </div>
    </div>
    <!-- โปรโมชันทั้งหมด -->

    <form action="" method="post">
        <div class="row justify-content-md-center" style="margin: 0px 0px 30px 0px;">
            <div class="col-md-4">
                <input type="text" class="form-control form-control-custom" name="txt_event" placeholder="ค้นหาโปรโมชัน">
            </div>
            <div class="col-md-2">
                <select class="form-control form-control-custom" name="pro_cat_id" id="pro_cat_id">
                    <option value="">เลือกทั้งหมด</option>
                    <?php for ($i = 0; $i < count($pro_cat); $i++) { ?>
                    <?php $selected = $_POST["pro_cat_id"] == $pro_cat[$i]->pro_cat_id ? "selected" : ""; ?>
                    <option value="<?php echo $pro_cat[$i]->pro_cat_id ?>" <?= $selected ?>>
                        <?php echo $pro_cat[$i]->pro_cat_name; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-sm-3">
                <button type="submit" class="btn btn-custom">ค้นหา</button>
            </div>
        </div>
    </form>

    <div class="row">
        <?php for ($i = 0; $i < count($promotions); $i++) { ?>
        <div class="col-12 col-sm-6 col-md-4 col-lg-4">
            <a href="<?php echo base_url() . 'Landing_page/Landing_page/show_promotions_detail/' . $promotions[$i]->pro_id; ?>">
                <div class="card" id="card" style="max-height: 30rem;">
                    <img src="<?php echo base_url() . 'image_promotions/' . $promotions[$i]->pro_img_path; ?>" class="card-img-top" style="max-height: 300px;" alt="...">
                    <!-- รูปที่ 1 -->
                    <div class="card-body" align="center">
                        <h3 class="text-decoration-none text-dark"><?php echo $promotions[$i]->pro_name ?></h3>
                        <p class="card-tex text-dark">
                            <?php echo iconv_substr($promotions[$i]->pro_description, 0, 60, "UTF-8") . "..."; ?>
                        </p>
                        <button class="btn btn-success" style="margin: 0px 30px;">แลก</button>
                    </div>
                    <!-- ชื่อของรูปที่ 1 -->
                </div>
            </a>
        </div>
        <!-- กิจกรรมที่ 1 -->
        <?php } ?>
    </div>
</div>