<div class="container py-5 section-com">
    <ul class="breadcrumb">
        <?php if ($this->session->userdata("tourist_id")) { ?>
            <li><a href="<?php echo base_url() . 'Tourist/Auth/Landing_page_tourist' ?>" style="color: green;">หน้าหลัก</a></li>
        <?php } ?>
        <?php if (!$this->session->userdata("tourist_id")) { ?>
            <li><a href="<?php echo base_url() ?>" style="color: green;">หน้าหลัก</a></li>
        <?php } ?>
        <li class="colorchange">ดูรายการสถานที่</li>
    </ul>
    <div class="row text-left py-3">
        <div class="m-auto">
            <h1 class="h1" style="padding-bottom: 2%">สถานที่ทั้งหมด</h1>
        </div>
    </div>
    <!-- กิจกรรมทั้งหมด -->
    <?php
    $value_search = isset($_POST["value_search"]) ? $_POST["value_search"] : "";
    ?>
    <form action="<?= site_url() ?>Landing_page/Landing_page/show_company_list" class="" method="post">
        <div class="row justify-content-md-center" style="margin: 0px 0px 30px 0px;">
            <div class="col-md-4">
                <input type="text" value="<?= $value_search ?>" id="search_box" name="value_search" class="form-control form-control-custom" placeholder="ค้นหาสถานที่">
            </div>
            <div class="col-md-2">
                <!-- <select class="form-control form-control-custom" name="txt_category"> -->
                <select name="com_cat_id" id="com_cat_id" class="form-control form-control-custom">
                    <option value="">เลือกทั้งหมด</option>
                    <?php for ($i = 0; $i < count($com_cat); $i++) { ?>
                        <?php $selected = $_POST["com_cat_id"] == $com_cat[$i]->com_cat_id ? "selected" : ""; ?>
                        <option value="<?php echo $com_cat[$i]->com_cat_id ?>" <?= $selected ?>>
                            <?php echo $com_cat[$i]->com_cat_name; ?></option>
                    <?php } ?>
                </select>
                <!-- </select> -->
            </div>
            <div class="col-sm-3">
                <button type="submit" class="btn btn-custom">ค้นหา</button>
            </div>
        </div>
    </form>


    <div class="row py-3">
        <?php for ($i = 0; $i < count($company); $i++) { ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                <a href="<?php echo base_url() . 'Landing_page/Landing_page/show_company_detail/' . $company[$i]->com_id; ?>">
                    <div class="card" id="card" style="max-height: 30rem;">
                        <img src="<?php echo base_url() . 'image_company/' . $company[$i]->com_img_path; ?>" class="card-img-top" style="max-height: 300px;" alt="...">
                        <!-- รูปที่ 1 -->
                        <div class="card-body" align="center">
                            <h3 class="text-decoration-none text-dark"><?php echo $company[$i]->com_name ?></h3>
                            <p class="card-tex text-dark">
                                <?php echo iconv_substr($company[$i]->com_description, 0, 60, "UTF-8") . "..."; ?>
                            </p>
                        </div>
                        <!-- ชื่อของรูปที่ 1 -->
                    </div>
                </a>
            </div>
        <?php } ?>
    </div>
    <!-- กิจกรรมที่ 1 -->
</div>