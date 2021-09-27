<!-- Make by : Naaka Punparich 62160082 -->

<style>
#card1 {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    transition: 0.3s;
}

#card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    transition: 0.3s;
}

#card:hover {
    box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    transform: scale(1.05);
}

#padding {
    padding-right: 2%;
}

.buttonIN {
    padding: 15px 25px;
    font-size: 24px;
    text-align: center;
    cursor: pointer;
    outline: none;
    color: #fff;
    background-color: #42a0ff;
    border: none;
    border-radius: 15px;
    box-shadow: 0 9px #999;
}

.buttonIN:hover {
    background-color: #007af4;
}

.buttonIN:active {
    background-color: #007af4;
    box-shadow: 0 5px #666;
    transform: translateY(4px);
}

.buttonOUT {
    padding: 15px 25px;
    font-size: 24px;
    text-align: center;
    cursor: pointer;
    outline: none;
    color: #fff;
    background-color: #ff3c3c;
    border: none;
    border-radius: 15px;
    box-shadow: 0 9px #999;
}

.buttonOUT:hover {
    background-color: #d90000;
}

.buttonOUT:active {
    background-color: #d90000;
    box-shadow: 0 5px #666;
    transform: translateY(4px);
}

.buttonSUC {
    padding: 15px 25px;
    font-size: 24px;
    text-align: center;
    cursor: pointer;
    outline: none;
    color: #fff;
    background-color: #04AA6D;
    border: none;
    border-radius: 15px;
}

.form-control-custom {
    min-height: 43px;
    appearance: menulist;
}

.btn-custom {
    background-color: #4169E1;
    color: #ffffff;
    min-height: 43px;
    padding: 0px 30px;
}

.btn-custom:hover {
    background-color: #6495ED;
    color: #ffffff;
    -webkit-transition: background-color 200ms linear;
    -ms-transition: background-color 200ms linear;
    transition: background-color 200ms linear;
}

.pagination {
    margin: 30px auto;
}

.link-custom {
    font-size: 22px !important;
    color: #212529;
    padding: 10px 20px;
    text-decoration: none;
}

.link-custom:hover {
    color: #4169E1;
    text-decoration: none;
}

ul.breadcrumb {
    padding: 10px 16px;
    list-style: none;
}

ul.breadcrumb li {
    display: inline;
    font-size: 18px;
}

ul.breadcrumb li+li:before {
    padding: 8px;
    color: black;
    content: ">";
}

ul.breadcrumb li a {
    color: #0275d8;
    text-decoration: none;
}

ul.breadcrumb li a:hover {
    color: #01447e;
    text-decoration: underline;
}
</style>
<title>List Company</title>
<div class="bg-white">
    <section>
        <div class="container py-5">
            <ul class="breadcrumb">
                <?php if ($this->session->userdata("tourist_id")) { ?>
                <li><a href="<?php echo base_url() . 'Tourist/Auth/Landing_page_tourist' ?>"
                        style="color: green;">หน้าหลัก</a></li>
                <?php } ?>
                <?php if (!$this->session->userdata("tourist_id")) { ?>
                <li><a href="<?php echo base_url() ?>" style="color: green;">หน้าหลัก</a></li>
                <?php } ?>
                <li>ดูรายการสถานที่</li>
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
            <form action="<?= site_url() ?>Landing_page/Landing_page/show_company_list"
                class="form-inline custom-form-search" method="post">
                <div class="row justify-content-md-center" style="margin: 0px 0px 30px 0px;">
                    <div class="col-md-4">
                        <input type="text" value="<?= $value_search ?>" id="search_box" name="value_search"
                            class="form-control form-control-custom custom-search" placeholder="ค้นหาสถานที่">
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


            <div class="row">

                <?php for ($i = 0; $i < count($company); $i++) { ?>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100" id="card">
                        <a
                            href="<?php echo base_url() . 'Landing_page/Landing_page/show_company_detail/' . $company[$i]->com_id; ?>">
                            <img src="<?php echo base_url() . 'image_company/' . $company[$i]->com_img_path; ?>"
                                class="card-img-top" style="height: 300px;" alt="...">
                            <!-- รูปที่ 1 -->
                            <div class="card-body" align="center">
                                <h3 class="text-decoration-none text-dark"><?php echo $company[$i]->com_name ?></h3>
                                <p class="card-text">
                                    <?php echo iconv_substr($company[$i]->com_description, 0, 120, "UTF-8") . "..."; ?>
                                </p>
                            </div>
                            <!-- ชื่อของรูปที่ 1 -->
                        </a>
                    </div>
                </div>
                <!-- กิจกรรมที่ 1 -->
                <?php } ?>

            </div>






        </div>


</div>
</section>
</div>