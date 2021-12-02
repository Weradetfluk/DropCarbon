/
<!-- 
/*
* v_list_promotion
* Display list promotion
* @input pro_cat, promotions 
* @output list promotion
* @author Chutipon Thermsirisuksin 62160081
* @Create Date 2564-10-02
*/ 
-->

<style>
.card-custom {
    border-radius: 20px;
}

.card-img-top {
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
    height: 300px;
    object-fit: cover;
}
</style>
<div class="container py-5 section-com">
    <ul class="breadcrumb">
        <?php if ($this->session->userdata("tourist_id")) { ?>
        <li><a href="<?php echo base_url() . 'Tourist/Auth/Landing_page_tourist' ?>" style="color: green;">หน้าหลัก</a></li>
        <?php } ?>
        <?php if (!$this->session->userdata("tourist_id")) { ?>
        <li><a href="<?php echo base_url() ?>" style="color: green;">หน้าหลัก</a></li>
        <?php } ?>
        <li class="colorchange">ดูรายการโปรโมชันและรางวัล</li>
    </ul>
    <div class="row text-left py-3">
        <div class="m-auto">
            <h1 class="h1" style="padding-bottom: 2%">โปรโมชันและรางวัล</h1>
        </div>
    </div>
    <!-- โปรโมชันทั้งหมด -->
    <?php
    $value_search = isset($_POST["value_search"]) ? $_POST["value_search"] : "";
    ?>
    <form action="<?= site_url() ?>Landing_page/Landing_page/show_promotions_list" class="" method="post">
        <div class="row justify-content-md-center" style="margin: 0px 0px 30px 0px;">
            <div class="col-md-4">
                <input type="text" value="<?= $value_search ?>" id="search_box" name="value_search" class="form-control form-control-custom" placeholder="ค้นหา">
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


    <div class="row py-3">
        <?php for ($i = 0; $i < count($promotions); $i++) { ?>
        <div class="col-12 col-sm-6 col-md-4 col-lg-4 py-2">
            <a href="<?php echo base_url() . 'Landing_page/Landing_page/show_promotions_detail/' . $promotions[$i]->pro_id; ?>">
                <div class="card card-custom" style="height: 30rem;" id="card">
                    <img src="<?php echo base_url() . 'image_promotions/' . $promotions[$i]->pro_img_path; ?>" class="card-img-top" style="height: 300px; object-fit: cover;" alt="...">
                    <!-- รูปที่ 1 -->
                    <div class="card-body" align="center">
                        <h3 class="text-decoration-none text-dark"><?php echo $promotions[$i]->pro_name ?></h3>
                        <p class="card-tex text-dark">
                            <?php echo iconv_substr($promotions[$i]->pro_description, 0, 60, "UTF-8") . "..."; ?>
                        </p>
                    </div>
                    <!-- ชื่อของรูปที่ 1 -->
                </div>
            </a>
        </div>
        <?php } ?>
    </div>
</div>