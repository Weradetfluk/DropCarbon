]=[+]4re<!-- 
/*
* v_list_event
* Display list event
* @input eve_cat, event 
* @output list event
* @author Naaka punparich 62160082
* @Create Date 2564-09-23
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
<div class="container py-5">
    <ul class="breadcrumb">
        <?php if ($this->session->userdata("tourist_id")) { ?>
            <li><a href="<?php echo base_url() . 'Tourist/Auth/Landing_page_tourist' ?>" style="color: green;">หน้าหลัก</a></li>
        <?php } ?>
        <?php if (!$this->session->userdata("tourist_id")) { ?>
            <li><a href="<?php echo base_url() ?>" style="color: green;">หน้าหลัก</a></li>
        <?php } ?>
        <li class="colorchange">ดูรายการกิจกรรม</li>
    </ul>
    <div class="row text-left py-3">
        <div class="m-auto">
            <h1 class="h1" style="padding-bottom: 2%">กิจกรรมทั้งหมด</h1>
        </div>
    </div>
    <!-- กิจกรรมทั้งหมด -->

    <form action="" method="post">
        <div class="row justify-content-md-center" style="margin: 0px 0px 30px 0px;">
            <div class="col-md-4">
                <input type="text" class="form-control form-control-custom" name="txt_event" placeholder="ค้นหาสถานที่">
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

    <div class="row py-3">
        <?php for ($i = 0; $i < count($event); $i++) { ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-4 py-2">
                <a href="<?php echo base_url() . 'Landing_page/Landing_page/show_event_detail/' . $event[$i]->eve_id; ?>">
                    <div class="card card-custom" style="height: 35rem;" id="card">
                        <img src="<?php echo base_url() . 'image_event/' . $event[$i]->eve_img_path; ?>" class="card-img-top" style="height: 300px; object-fit: cover;" alt="...">
                        <!-- รูปที่ 1 -->
                        <div class="card-body">
                            <a href="#">
                                <h2 class="text-decoration-none text-dark"><?php echo $event[$i]->eve_name ?></h2>
                            </a>
                            <p class="card-tex text-dark">
                                <?php echo iconv_substr($arr_eve[$i]->eve_description, 0, 60, "UTF-8") . "..."; ?>
                            </p>
                            <p style="display:inline; font-size: 16px; color: #008000"><b>ลดคาร์บอนได้ <?php echo $arr_eve_cat[$i]->eve_drop_carbon; ?> กรัม</b></p>
                            <p style="display:inline; font-size: 16px; float: right;"><?php echo $arr_eve[$i]->eve_start_date; ?> - <?php echo $arr_eve[$i]->eve_end_date; ?></p>
                        </div>
                        <!-- ชื่อของรูปที่ 1 -->
                    </div>
                </a>
            </div>
            <!-- กิจกรรมที่ 1 -->
        <?php } ?>
    </div>
</div>