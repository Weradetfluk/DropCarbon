<!-- 
/*
* v_landing_page
* Display landing page
* @input arr_eve, arr_com, arr_pro 
* @output landing page
* @author Naaka punparich 62160082
* @Create Date 2564-07-17
*/ 
-->
<!-- แบนเนอร์ -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"></div>

<!-- กิจกรรมยอดนิยม -->
<section class="bg-white">
    <div class="container" data-aos="fade-down">
        <!-- หัวข้อ -->
        <div class="header-break">
            กิจกรรมยอดนิยม
        </div>

        <div class="row">
            <!-- แสดงกิจกรรม 3 กิจกรรม -->
            <?php for ($i = 0; $i < count($arr_eve); $i++) {  ?>
                <div class="col-md-4">
                    <a href="<?php echo base_url() . 'Landing_page/Landing_page/show_event_detail/' . $arr_eve[$i]->eve_id; ?>">
                        <div class="card card-custom" id="card">
                            <div class="card-img-wrapper">
                                <!-- รูปกิจกรรม -->
                                <img src="<?php echo base_url() . 'image_event/' . $arr_eve[$i]->eve_img_path; ?>" class="card-img-top" style="object-fit: cover;">
                            </div>
                            <div class="card-body" style="margin-top: 50px;">

                                <div class="col">

                                    <!-- ชื่อกิจกรรม -->
                                    <h2><?php echo iconv_substr($arr_eve[$i]->eve_name, 0, 9, "UTF-8") . "..."; ?></h2>

                                </div>

                                <div class="col">

                                    <!-- ลดคาร์บอน -->
                                    <p style="display:inline; font-size: 16px; color: #008000"><b>ลดคาร์บอน
                                            <?php echo $arr_eve[$i]->eve_drop_carbon; ?> กก./ปี</b></p>

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
                                    <p class="start-end-date">
                                        <?php echo substr($arr_eve[$i]->eve_start_date, 8, 2) . " " . $start_month . " " . $start_yesr; ?>
                                        -
                                        <?php echo substr($arr_eve[$i]->eve_end_date, 8, 2) . " " . $end_month . " " . $end_yesr; ?>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>

        <!-- ดูเพิ่มเติม -->
        <a class="float-right" href="<?php echo base_url() . 'Landing_page/Landing_page/show_event_list' ?>">ดูเพิ่มเติม</a>

    </div>

</section>

<!-- สถานที่ยอดนิยม -->
<section class="bg-gray">
    <div class="container">

        <!-- หัวข้อ -->
        <div class="header-break" data-aos="fade-down">
            สถานที่ยอดนิยม
        </div>

        <div class="row">

            <!-- รูปใหญ่ -->
            <div class="col-xl-7 col-lg-6">
                <a href="<?php echo base_url() . 'Landing_page/Landing_page/show_company_detail/' . $arr_com[0]->com_id; ?>">
                    <div class="card card-custom" style="height: 50rem;" id="card" data-aos="fade-right">

                        <!-- รูป -->
                        <img src="<?php echo base_url() . 'image_company/' . $arr_com[0]->com_img_path; ?>" style="height: 550px; weight: 810;" class="card-img-top">

                        <div class="card-body">

                            <!-- ชื่อสถานที่ -->
                            <h2><?php echo $arr_com[0]->com_name ?></h2>

                            <!-- รายละเอียดสถานที่ -->
                            <p class="card-text">
                                <?php echo iconv_substr($arr_com[0]->com_description, 0, 300, "UTF-8") . "..."; ?></p>

                        </div>
                    </div>
                </a>
            </div>

            <!-- รูปเล็ก -->
            <div class="col-xl-5 col-mg-4 mg-4">
                <div class="row">
                    <!-- แสดงสถานที่ 4 สถานที่ -->
                    <?php for ($i = 0; $i < count($arr_com) - 1; $i++) {  ?>
                        <div class="col-lg-6">
                            <a href="<?php echo base_url() . 'Landing_page/Landing_page/show_company_detail/' . $arr_com[$i + 1]->com_id; ?>">
                                <div class="card card-custom" style="height: 23rem;" id="card" data-aos="fade-down">

                                    <!-- รูป -->
                                    <img src="<?php echo base_url() . 'image_company/' . $arr_com[$i + 1]->com_img_path; ?>" style="height: 200px; weight: 270;" class="card-img-top">

                                    <div class="card-body">

                                        <!-- ชื่อสถานที่ -->
                                        <h3><?php echo iconv_substr($arr_com[$i + 1]->com_name, 0, 20, "UTF-8") . "..."; ?>
                                        </h3>

                                        <!-- รายละเอียดสถานที่ -->
                                        <p class="card-text">
                                            <?php echo iconv_substr($arr_com[$i + 1]->com_description, 0, 35, "UTF-8") . "..."; ?>
                                        </p>

                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <!-- ดูเพิ่มเติม -->
        <a data-aos="fade-left" class="float-right" href="<?php echo base_url() . 'Landing_page/Landing_page/show_company_list' ?>">ดูเพิ่มเติม</a>

    </div>
</section>

<!-- จุดเด่น -->
<section class="bg-white">
    <div class="container">

        <!-- รายละเอียด -->
        <div class="row" style="margin:1.5%; font-size: 18px;" data-aos="fade-up">
            การท่องเที่ยวแบบลดคาร์บอน เป็นกิจกรรมการท่องเที่ยวที่เป็นทางเลือกในการลดคาร์บอนให้น้อยลง
            ซึ่งจะทำให้นักท่องเที่ยวได้รับประสบการณ์เกี่ยวกับการช่วยลดคาร์บอน
            Drop Carbon จะพาสมาชิก และนักท่องเที่ยวทุกท่านได้มีส่วนร่วมกับกิจกรรมที่ช่วยลดคาร์บอน ไม่ว่าจะเป็นบริการต่าง
            ๆ ในพื้นที่จังหวัดชลบุรี
            ซึ่งจะช่วยสร้างรายได้ให้ชุมชน และลดโลกร้อนไปด้วยกัน
        </div>

        <!-- บอร์ดแสดงจำนวน -->
        <div id="pros" class="pros"></div>
        <!-- <div class="row" style="text-align : center;" data-aos="fade-up">
            <div class="col">
                <div class="counter-classic-number">
                    <span class="counter">
                        <?php echo count($arr_tou); ?>
                    </span>
                </div>
                <div class="counter-classic-title">สมาชิก</div>
            </div>
            <div class="col">
                <div class="counter-classic-number">
                    <span class="counter">
                        <?php echo count($arr_ent); ?>
                    </span>
                </div>
                <div class="counter-classic-title">ผู้ประกอบการ</div>
            </div>
            <div class="col">
                <div class="counter-classic-number">
                    <span class="counter">
                        <?php echo count($arr_eve); ?>
                    </span>
                </div>
                <div class="counter-classic-title">กิจกรรม</div>
            </div>
            <div class="col">
                <div class="counter-classic-number">
                    <span class="counter">
                        <?php echo count($arr_com); ?>
                    </span>
                </div>
                <div class="counter-classic-title">สถานที่ท่องเที่ยว</div>
            </div>
        </div> -->
    </div>
</section>

<!-- โปรโมชันและรางวัล -->
<section class="bg-gray">
    <div class="container">
        <!-- หัวข้อ -->
        <div class="header-break" data-aos="fade-down">
            โปรโมชันและรางวัล
        </div>
        <div class="row">

            <!-- แสดงโปรโมชันและรางวัล 4 อัน-->
            <?php for ($i = 0; $i < count($arr_pro); $i++) {  ?>
                <div class="col-md-3" align="center">
                    <a href="<?php echo base_url() . 'Landing_page/Landing_page/show_promotions_detail/' . $arr_pro[$i]->pro_id; ?>">
                        <div class="card card-custom" data-aos="fade-right" style="height: 23rem;">

                            <!-- รูป -->
                            <img src="<?php echo base_url() . 'image_promotions/' . $arr_pro[$i]->pro_img_path; ?>" style="height: 200px; weight: 270; object-fit: cover;" class="card-img-top">

                            <div class="card-body">

                                <!-- ชื่อ -->
                                <h3><?php echo iconv_substr($arr_pro[$i]->pro_name, 0, 20, "UTF-8") . "..."; ?></h3>

                                <!-- รายละเอียด -->
                                <p class="card-text">
                                    <?php echo iconv_substr($arr_pro[$i]->pro_description, 0, 35, "UTF-8") . "..."; ?></p>
                                    <?php if($arr_pro[$i]->pro_cat_id == 2){?>
                                    <p class="text-decoration-none" style="display:inline; font-size: 16px; color: #008000">ใช้คะแนน <?php echo $arr_pro[$i]-> pro_point ?> คะแนน</p>
                                    <?php }?>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>

        <!-- ดูเพิ่มเติม -->
        <a data-aos="fade-left" class="float-right" href="<?php echo base_url() . 'Landing_page/Landing_page/show_promotions_list' ?>">ดูเพิ่มเติม</a>

    </div>
</section>

<script>
    $(document).ready(function() {


        get_data_banner();
        get_data_pros();

        function get_data_banner() {
            $.ajax({
                method: "POST",
                url: '<?php echo site_url() . "Admin/Manage_banner/Admin_manage_banner/get_banner_list_ajax" ?>',
                dataType: 'JSON',
                success: function(json_data) {

                    create_banner(json_data['data_banner_json']);

                },
                error: function() {
                    alert('ajax Not working');
                }
            });
        }

        function get_data_pros() {
            $.ajax({
                method: "POST",
                url: '<?php echo site_url() . "DCS_controller/get_data_pros" ?>',
                dataType: 'JSON',
                success: function(json_data) {

                    create_pros(json_data['arr_data_pros']);

                },
                error: function() {
                    alert('ajax Not working in pros');
                }
            });
        }

        let error_regis_entrepreneur = '<?php echo $this->session->userdata("error_register_entrepreneur"); ?>';
        let error_register_tourist = "<?php echo $this->session->userdata("error_register_tourist"); ?>";
        if (error_regis_entrepreneur == "success") {
            swal("สำเร็จ", "คุณทำการลงทะเบียนสำเร็จ ขณะนี้กำลังรอการอนุมัติ", "success");
            <?php echo $this->session->unset_userdata("error_register_entrepreneur"); ?>
        }
        if (error_register_tourist == "success") {
            swal("สำเร็จ", "การลงทะเบียนของคุณเสร็จสิ้น", "success");
            <?php echo $this->session->unset_userdata("error_register_tourist"); ?>
        }
        if (error_register_tourist == "edit_success") {
            swal("สำเร็จ", "การแก้ไขข้อมูลของคุณเสร็จสิ้น", "success");
            <?php echo $this->session->unset_userdata("error_register_tourist"); ?>
        }
    });

    function create_banner(arr_banner) {
        let html_code = '';

        html_code += '<ol class="carousel-indicators">';

        for (let i = 0; i < arr_banner.length; i++) {
            if (i === 0) {
                html_code += '<li data-target="#carouselExampleIndicators" data-slide-to="' + i + '" class="active"></li>';
            } else {
                html_code += '<li data-target="#carouselExampleIndicators" data-slide-to="data-slide-to="' + i + '"></li>';
            }
        }
        html_code += '</ol>';
        html_code += '<div class="carousel-inner" style="max-height: 678px; !important">'

        if (arr_banner.length != 0) {
            arr_banner.forEach((row_ban, index_ban) => {

                if (index_ban == 0) {
                    html_code += '<div class="carousel-item active" >';
                    html_code += ' <img class="d-block w-100 h-100"  style="object-fit: cover;   " src="' +
                        ' <?php echo base_url() . 'banner/' ?>' + (row_ban['ban_path']) +
                        '"   alt="Image" height="678px"  alt="First slide">';
                    html_code += '</div>';
                } else {
                    html_code += '<div class="carousel-item">';
                    html_code += ' <img class="d-block w-100 h-100"  style=" object-fit: cover;  " src="' +
                        ' <?php echo base_url() . 'banner/' ?>' + (row_ban['ban_path']) +
                        '"   alt="Image"  height="678px"  alt="First slide">';
                    html_code += '</div>';
                }
            });

        } else {
            html_code += '<div class="carousel-item active">';
            html_code += '<img class="d-block w-100 h-100" src="https://via.placeholder.com/1920x678"  alt="First slide"';
            html_code += '</div>';
        }
        html_code += '</div>';
        html_code += '<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">';
        html_code += '<span class="material-icons" style="color: black;">arrow_back</span>';
        html_code += '<span class="sr-only">Previous</span>';
        html_code += '</a>';
        html_code += '<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">';
        html_code += '<span class="material-icons" style="color: black;">arrow_forward</span>';
        html_code += ' <span class="sr-only">Next</span>';
        html_code += '</a>';

        $('#carouselExampleIndicators').html(html_code);
    }

    function create_pros(arr_pros) {
        let html_code = '';

        // เช็คข้อมูลใน Array
        console.log(arr_pros);

        html_code += '<div class="row" style="text-align : center;" data-aos="fade-up">';
        html_code += '<div class="col">';
        html_code += '<div class="counter-classic-number">';
        html_code += '<span class="counter">';
        html_code += arr_pros[0].tou;
        html_code += '</span>';
        html_code += '</div>';
        html_code += '<div class="counter-classic-title">สมาชิก</div>';
        html_code += '</div>';
        html_code += '<div class="col">';
        html_code += '<div class="counter-classic-number">';
        html_code += '<span class="counter">';
        html_code += arr_pros[0].ent;
        html_code += '</span>';
        html_code += '</div>';
        html_code += '<div class="counter-classic-title">ผู้ประกอบการ</div>';
        html_code += '</div>';
        html_code += '<div class="col">';
        html_code += '<div class="counter-classic-number">';
        html_code += '<span class="counter">';
        html_code += arr_pros[0].eve;
        html_code += '</span>';
        html_code += '</div>';
        html_code += '<div class="counter-classic-title">กิจกรรม</div>';
        html_code += '</div>';
        html_code += '<div class="col">';
        html_code += '<div class="counter-classic-number">';
        html_code += '<span class="counter">';
        html_code += arr_pros[0].com;
        html_code += '</span>';
        html_code += '</div>';
        html_code += '<div class="counter-classic-title">สถานที่ท่องเที่ยว</div>';
        html_code += '</div>';
        html_code += '</div>';

        $('#pros').html(html_code);
    }
</script>