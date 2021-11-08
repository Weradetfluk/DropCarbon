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
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"></div>

<section class="bg-white">
    <div class="container" data-aos="fade-down">
        <div class="header-break">
            กิจกรรมยอดนิยม
        </div>
        <div class="row">
            <?php for ($i = 0; $i < count($arr_eve); $i++) {  ?>
                <div class="col-md-4">
                    <a href="<?php echo base_url() . 'Landing_page/Landing_page/show_event_detail/' . $arr_eve[$i]->eve_id; ?>">
                        <div class="card card-custom">
                            <img src="<?php echo base_url() . 'image_event/' . $arr_eve[$i]->eve_img_path; ?>"  class="card-img-top">
                            <div class="card-body">
                                <h2> <?php echo iconv_substr($arr_eve[$i]->eve_name, 0, 20, "UTF-8") . "..."; ?></h2>
                                <p class="card-tex text-dark">
                                    <?php echo iconv_substr($arr_eve[$i]->eve_description, 0, 60, "UTF-8") . "..."; ?>
                                </p>
                                <p style="display:inline; font-size: 16px; color: #008000"><b>ลดคาร์บอนได้ <?php echo $arr_eve[$i]->eve_drop_carbon; ?> กรัม</b></p>
                                <p style="display:inline; font-size: 16px; float: right;"><?php echo $arr_eve[$i]->eve_start_date; ?> - <?php echo $arr_eve[$i]->eve_end_date; ?></p>

                            </div>
                        </div>
                    </a>
                </div>

            <?php } ?>
        </div>
        <a class="float-right" href="<?php echo base_url() . 'Landing_page/Landing_page/show_event_list' ?>">ดูเพิ่มเติม</a>
    </div>
</section>

<section class="bg-gray">
    <div class="container">
        <div class="header-break" data-aos="fade-down">
            สถานที่ยอดนิยม
        </div>
        <div class="row">
            <div class="col-xl-7 col-lg-6">
                <a href="<?php echo base_url() . 'Landing_page/Landing_page/show_company_detail/' . $arr_com[0]->com_id; ?>">
                    <div class="card card-custom" style="height: 50rem;" data-aos="fade-right">
                        <img src="<?php echo base_url() . 'image_company/' . $arr_com[0]->com_img_path; ?>" style="height: 550px; weight: 810;" class="card-img-top">
                        <div class="card-body">

                            <h2><?php echo $arr_com[0]->com_name ?></h2>
                            <p class="card-text"> <?php echo iconv_substr($arr_com[0]->com_description, 0, 300, "UTF-8") . "..."; ?></p>

                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-5 col-mg-4 mg-4">
                <div class="row">
                    <?php for ($i = 0; $i < count($arr_com) - 1; $i++) {  ?>
                        <div class="col-lg-6">
                            <a href="<?php echo base_url() . 'Landing_page/Landing_page/show_company_detail/' . $arr_com[$i + 1]->com_id; ?>">
                                <div class="card card-custom" style="height: 23rem;" id="card" data-aos="fade-down">
                                    <img src="<?php echo base_url() . 'image_company/' . $arr_com[$i + 1]->com_img_path; ?>" style="height: 200px; weight: 270;" class="card-img-top">
                                    <div class="card-body">
                                        <h3><?php echo iconv_substr($arr_com[$i + 1]->com_name, 0, 20, "UTF-8") . "..."; ?></h3>
                                        <p class="card-text"> <?php echo iconv_substr($arr_com[$i + 1]->com_description, 0, 35, "UTF-8") . "..."; ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <a data-aos="fade-left" class="float-right" href="<?php echo base_url() . 'Landing_page/Landing_page/show_company_list' ?>">ดูเพิ่มเติม</a>
    </div>
</section>
<section class="bg-white">
    <div class="container">
        <div class="header-break" data-aos="fade-down">
            จุดเด่น
        </div>
        <div class="row" style="margin:1.5% 0" data-aos="fade-up">
            การท่องเที่ยวแบบลดคาร์บอน เป็นกิจกรรมการท่องเที่ยวที่เป็นทางเลือกในการลดคาร์บอนให้น้อยลง
            ซึ่งจะทำให้นักท่องเที่ยวได้รับประสบการณ์เกี่ยวกับการช่วยลดคาร์บอน
            Drop Carbon จะพาสมาชิก และนักท่องเที่ยวทุกท่านได้มีส่วนร่วมกับกิจกรรมที่ช่วยลดคาร์บอน ไม่ว่าจะเป็นบริการต่าง ๆ ในพื้นที่จังหวัดชลบุรี
            ซึ่งจะช่วยสร้างรายได้ให้ชุมชน และลดโลกร้อนไปด้วยกัน
        </div>
        <div class="row-max-100">
            <div class="row row-50 justify-content-center">
                <div class="col-sm-6 col-md-5 col-lg-3">
                    <div class="counter-classic" data-aos="fade-up">
                        <div class="counter-classic-number"><span class="counter">12</span>
                        </div>
                        <div class="counter-classic-title">สมาชิก</div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-3">
                    <div class="counter-classic" data-aos="fade-up">
                        <div class="counter-classic-number"><span class="counter">194</span>
                        </div>
                        <div class="counter-classic-title">ผู้ประกอบการ</div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-3">
                    <div class="counter-classic" data-aos="fade-up">
                        <div class="counter-classic-number"><span class="counter">20</span>
                        </div>
                        <div class="counter-classic-title">กิจกรรม</div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-3">
                    <div class="counter-classic" data-aos="fade-up">
                        <div class="counter-classic-number"><span class="counter">25</span>
                        </div>
                        <div class="counter-classic-title">สถานที่ท่องเที่ยว</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-gray">
    <div class="container">
        <div class="header-break" data-aos="fade-down">
            โปรโมชัน
        </div>
        <div class="row">
            <?php for ($i = 0; $i < count($arr_pro); $i++) {  ?>
                <div class="col-md-3">
                    <div class="card card-custom" data-aos="fade-right" style="height: 23rem;">
                        <img src="<?php echo base_url() . 'image_promotions/' . $arr_pro[$i]->pro_img_path; ?>"" style=" height: 200px; weight: 270; object-fit: cover;" class="card-img-top">
                        <div class="card-body">
                            <h3><?php echo iconv_substr($arr_pro[$i]->pro_name, 0, 20, "UTF-8") . "..."; ?></h3>
                            <p class="card-text"> <?php echo iconv_substr($arr_pro[$i]->pro_description, 0, 35, "UTF-8") . "..."; ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <a data-aos="fade-left" class="float-right" href="<?php echo base_url() . 'Landing_page/Landing_page/show_promotions_list' ?>">ดูเพิ่มเติม</a>
    </div>
</section>

<script>
    $(document).ready(function() {


        get_data_banner();

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
                    html_code += ' <img class="d-block w-100 h-100"  style="object-fit: cover;   " src="' + ' <?php echo base_url() . 'banner/' ?>' + (row_ban['ban_path']) + '"   alt="Image" height="678px"  alt="First slide">';
                    html_code += '</div>';
                } else {
                    html_code += '<div class="carousel-item">';
                    html_code += ' <img class="d-block w-100 h-100"  style=" object-fit: cover;  " src="' + ' <?php echo base_url() . 'banner/' ?>' + (row_ban['ban_path']) + '"   alt="Image"  height="678px"  alt="First slide">';
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
</script>