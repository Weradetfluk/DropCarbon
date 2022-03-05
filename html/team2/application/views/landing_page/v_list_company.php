<!-- 
/*
* v_list_company
* Display list company
* @input - 
* @output list company
* @author Jutamas Thaptong 62160079
* @Create Date 2564-09-14
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

    <!-- Nav ว่าตอนนี้อยู่ที่ตรงไหนของเว็บ -->
    <ul class="breadcrumb">
        <li><a href="<?php echo base_url() ?>" style="color: green;">หน้าหลัก</a></li>
        <li class="colorchange">ดูรายการสถานที่</li>
    </ul>

    <!-- หัวข้อ -->
    <div class="row text-left py-3">
        <div class="m-auto">
            <h1 class="h1" style="padding-bottom: 2%">สถานที่ทั้งหมด</h1>
        </div>
    </div>

    <!-- ค้นหา / หมวดหมู่ / ปุ่มค้นหา-->
    <?php
    $value_search = isset($_POST["value_search"]) ? $_POST["value_search"] : "";
    ?>
    <form action="<?= site_url() ?>Landing_page/Landing_page/show_company_list" class="" method="post">
        <div class="row justify-content-md-center" style="margin: 0px 0px 30px 0px;">

            <!-- ช่องค้นหาสถานที่ท่องเที่ยว -->
            <div class="col-md-4">
                <input type="text" value="<?= $value_search ?>" id="search_box" name="value_search"
                    class="form-control form-control-custom" placeholder="ค้นหาสถานที่">
            </div>

            <div class="col-md-2">
                <!-- เลือกหมวดหมู่สถานที่ -->
                <select name="com_cat_id" id="com_cat_id" class="form-control form-control-custom">
                    <option value="">เลือกทั้งหมด</option>

                    <!-- แสดงหมวดหมู่สถานที่ -->
                    <?php for ($i = 0; $i < count($com_cat); $i++) { ?>
                    <?php $selected = $_POST["com_cat_id"] == $com_cat[$i]->com_cat_id ? "selected" : ""; ?>
                    <option value="<?php echo $com_cat[$i]->com_cat_id ?>" <?= $selected ?>>
                        <?php echo $com_cat[$i]->com_cat_name; ?></option>
                    <?php } ?>
                </select>
                <!-- </select> -->
            </div>
            <!-- ปุ่มค้นหา -->
            <div class="col-sm-3">
                <button type="submit" class="btn btn-custom">ค้นหา</button>
            </div>
        </div>
    </form>

    <div class="container">
        <!-- แสดงการ์ดสถานที่ตามจำนวนที่มีโดย 1 แถว จะมีจำนวน 3 การ์ด -->
        <div class="row py-3">
            <?php for ($i = 0; $i < count($company); $i++) { ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-4 py-2">
                <a
                    href="<?php echo base_url() . 'Landing_page/Landing_page/show_company_detail/' . $company[$i]->com_id; ?>">
                    <div class="card card-custom" style="height: 30rem;" id="card">
                        <!-- แสดงรูปภาพสถานที่ -->
                        <img src="<?php echo base_url() . 'image_company/' . $company[$i]->com_img_path; ?>"
                            class="card-img-top" style="height: 300px; object-fit: cover;" alt="...">

                        <div class="card-body" align="center">
                            <!-- แสดงชื่อสถานที่ -->
                            <h3 class="text-decoration-none text-dark"><?php echo $company[$i]->com_name ?></h3>
                            <p class="card-tex text-dark">
                                <!-- แสดงรายละเอียดสถานที่ -->
                                <?php echo iconv_substr($company[$i]->com_description, 0, 60, "UTF-8") . "..."; ?>
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            <?php } ?>
        </div>
    </div>

</div>