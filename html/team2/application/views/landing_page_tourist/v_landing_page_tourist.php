<!-- Start   : 23:50 02.08.2564 -->
<!-- Make by : Jutamas Thaptong 62160079 -->
<?php error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">


<!-- Open topbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow">
    <div class="container d-flex justify-content-between align-items-center">

        <a class="navbar-brand text-success logo h1 align-self-center" href="#">
            Logo
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
            data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between"
            id="templatemo_main_nav">
            <div class="flex-fill">
                <ul class="nav d-flex justify-content-end mx-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">กิจกรรมของคุณ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">My reward</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><?= $point ?> point</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-person"></i>User Name</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- Close topbar -->

<script>
$(document).ready(function() {

    $(document).on('click', '.myButton', function() {
        $('.myButton').removeClass("active");
        $(this).addClass("active");
    });

});
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Chonburi&display=swap');

h1,
h2,
h3,
h4,
h5,
h6 {
    font-family: "Chonburi" !important;
    text-transform: capitalize;
    color: #4682B4;
    ;
}

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

img {
    width: 100%;
}

#padding {
    padding-right: 2%;
}

.myButton1 {
    /* box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2); */
    /* background: linear-gradient(to bottom, #ffffff 5%, #f6f6f6 100%); */
    background-color: #ffffff;
    /* border-radius: 6px; */
    border: 1px solid #dcdcdc;
    display: inline-block;
    cursor: pointer;
    color: #DC143C;
    font-family: Arial;
    font-size: 15px;
    font-weight: bold;
    padding: 6px 24px;
    text-decoration: none;
    text-shadow: 0px 1px 0px #ffffff;
}

/* .myButton1:hover { 
    background: linear-gradient(to bottom, #f6f6f6 5%, #ffffff 100%);
    background-color: #f6f6f6;
    box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    transform: scale(1.05);
} */

.myButton1:active {
    position: relative;
    top: 1px;
}

.myButton {
    /* box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2); */
    /* background: linear-gradient(to bottom, #ffffff 5%, #f6f6f6 100%); */
    background-color: #ffffff;
    /* border-radius: 6px; */
    border: 0px solid #dcdcdc;
    display: inline-block;
    cursor: pointer;
    color: #666666;
    font-family: Arial;
    font-size: 16px;
    font-weight: bold;
    padding: 6px 24px;
    text-decoration: none;
    /* text-shadow: 0px 1px 0px #ffffff; */
}

.myButton:hover {
    /* background: linear-gradient(to bottom, #f6f6f6 5%, #ffffff 100%); */
    /* background-color: #f6f6f6; */
    /* box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2); */
    color: #0080c0;
    /* transform: scale(1.2); */
}

.myButton:active {
    position: relative;
    top: 1px;
    box-shadow: inset 0 -5px 0 #fed602;
}

.nav-item>.active {
    box-shadow: inset 0 -5px 0 #fed602;
}

.myButton:focus {
    outline: -webkit-focus-ring-color auto 0px;
}

.myButtonSeeAll {
    /* box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2); */
    background: linear-gradient(to bottom, #ffffff 5%, #f6f6f6 100%);
    background-color: transparent;
    border-radius: 2px;
    border: 2px solid #004080;
    display: inline-block;
    cursor: pointer;
    color: #004080;
    font-family: Arial;
    font-size: 15px;
    font-weight: bold;
    padding: 6px 24px;
    text-decoration: none;
    text-shadow: 0px 1px 0px #ffffff;
}

.myButtonSeeAll:hover {
    background: linear-gradient(to bottom, #f6f6f6 5%, #ffffff 100%);
    background-color: #f6f6f6;
    box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    border: 2px solid #f6f6f6;
    color: #004080;
    transition: 0.5s;
}

.card-info .card-date {
    float: left;
    font-size: 17px;
}

.card-info .card-view {
    float: right;
    font-size: 14px;
}

.top-location {
    position: relative;
}

.top-location:hover {
    border: 5px solid #ffff00;
    transition: all .2s ease-out;
}

.top-location-overley {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 50%;
    background-image: linear-gradient(0deg, rgba(0, 0, 0, .75), transparent);
}

.top-location-name {
    position: absolute;
    bottom: 20px;
    left: 30px;
    z-index: 20;
    color: #fff;

}
</style>

<body>
    <!-- Start Banner -->
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row">
                    <!-- Picture Banner -->
                    <img class="img-fluid" src="<?php echo base_url() . 'assets/templete/picture' ?>/./banner7.jpg"
                        alt="">
                </div>
            </div>
            <div class="carousel-item">
                <div class="row">
                    <!-- Picture Banner -->
                    <img class="img-fluid" src="<?php echo base_url() . 'assets/templete/picture' ?>/./banner6.jpg"
                        alt="">
                </div>
            </div>
            <div class="carousel-item">
                <div class="row">
                    <!-- Picture Banner -->
                    <img class="img-fluid" src="<?php echo base_url() . 'assets/templete/picture' ?>/./banner5.jpg"
                        alt="">
                </div>
            </div>
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel"
            role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel"
            role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- End Banner -->

    <section class="bg-white">
        <!-- Start hot event -->
        <div class="container py-5">
            <div class="row text-left py-3">
                <div class="m-auto">
                    <h1 class="h1" style="padding-bottom: 1%">กิจกรรมล่าสุด</h1>
                </div>
            </div>
            <div class="container">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="myButton active" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true">10 ก.ค. 64</button>|
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="myButton" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false">11 ก.ค. 64</button>|
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="myButton" id="pills-contact-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                            aria-selected="false">12 ก.ค. 64</button>|
                    </li>
                </ul>
                <div class="card" id="card1" style="padding-top: 3%; padding-left: 2%">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <p>ระบบแนะนำการท่องเที่ยวเชิงอนุรักษ์สิ่งแวดล้อม (Drop Carbon System)
                                เป็นระบบแนะนำการท่องเที่ยวแบบออนไลน์</p>
                            <div class="row py-3">
                                <div class="col">
                                </div>
                                <div class="col-md-auto" style="padding-right: 3%;">
                                    <a type="button" class="myButton1" href="#">อ่านต่อ >></a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab">
                            <p>อำเภอเมืองชลบุรีจึงได้มีการริเริ่มแนวคิดหนึ่งคือการท่องเที่ยวแบบ Low carbon Tourism
                                ซึ่งเป็นกิจกรรมท่องเที่ยวที่เป็นทางเลือกในการช่วยลดคาร์บอนให้น้อยลง </p>
                            <div class="row py-3">
                                <div class="col">
                                </div>
                                <div class="col-md-auto" style="padding-right: 3%;">
                                    <a type="button" class="myButton1" href="#">อ่านต่อ >></a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                            aria-labelledby="pills-contact-tab">
                            <p>ระบบแนะนำการท่องเที่ยวเชิงอนุรักษ์สิ่งแวดล้อม (Drop Carbon System) </p>
                            <div class="row py-3">
                                <div class="col">
                                </div>
                                <div class="col-md-auto" style="padding-right: 3%;">
                                    <a type="button" class="myButton1" href="#">อ่านต่อ >></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End hot event -->
        <!-- Start all event -->
        <div class="container py-3">
            <div class="row text-left py-3">
                <div class="m-auto">
                    <h1 class="h1" style="padding-bottom: 2%">กิจกรรมทั้งหมด</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100" id="card">
                        <a href="#">
                            <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./activity1.jpg"
                                class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <a href="#" class="h2 text-decoration-none text-dark">เก็บขยะริมหาด</a>
                            <p class="card-text"> จากปัญหาสิ่งแวดล้อมชายฝั่งทะเลในปัจจุบัน
                                ได้เกิดปัญหาขยะซึ่งเป็นมลพิษทางทะเลส่งผลกระทบต่อ...</p>
                            <div class="card-info">
                                <span class="card-date">
                                    <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./location.png"
                                        style="width:15px;"> |
                                    <span class="text-secondary"><?= $location = "ชายหาดบางแสน " ?></span>
                                </span>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100" id="card">
                        <a href="#">
                            <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./activity2.jpg"
                                class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <a href="#" class="h2 text-decoration-none text-dark">ปลูกป่าชายเลน</a>
                            <p class="card-text">
                                จากการทำงานร่วมกันกับกลุ่มอนุรักษ์ต่างๆในประเทศไทย โดยเฉพาะกลุ่มอนุรักษ์ใน จ.ชลบุรี...
                            </p>
                            <div class="card-info">
                                <span class="card-date">
                                    <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./location.png"
                                        style="width:15px;"> |
                                    <span class="text-secondary"><?= $location = "ศูนย์อนุรักษ์ป่าชายเลน" ?></span>
                                </span>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100" id="card">
                        <a href="#">
                            <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./activity3.jpg"
                                class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <a href="#" class="h2 text-decoration-none text-dark">วิ่งชมธรรมชาติ</a>
                            <p class="card-text">
                                ขอเชิญนักวิ่งมาสัมผัสกับธรรมชาติ
                                สูดอากาศโอโซนให้เต็มปอดและทิวทัศน์อันสวยงามของเทือกเขา...
                            </p>
                            <div class="card-info">
                                <span class="card-date">
                                    <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./location.png"
                                        style="width:15px;"> |
                                    <span class="text-secondary"><?= $location = "เขาสามมุข" ?></span>
                                </span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row py-3">
                <div class="col">

                </div>
                <div class="col-md-auto">
                    <a type="button" class="myButtonSeeAll" href="#">ดูทั้งหมด >></a>
                </div>
            </div>
        </div>
        <!-- End all event -->
        <!-- Start hot place -->
        <div class="container py-2">
            <div class="row text-left py-3">
                <div class="m-auto">
                    <h1 class="h1" style="padding-bottom: 2%">สถานที่ยอดนิยม</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-7 col-lg-6">
                    <div class="card card-h-100" id="card">
                        <a href="#">
                            <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./bangsaen2.jpg"
                                class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <a href="#" class="h2 text-decoration-none text-dark">บางแสน</a>
                            <p class="card-text">
                                หาดบางแสนเป็นสถานที่ท่องเที่ยวที่เป็นที่รู้จักและนิยมมาอย่างยาวนานของนักท่องเที่ยว
                                ด้วยความที่อยู่ใกล้กรุงเทพมหานคร
                                ด้วยการเดินทางรถยนต์ใช้เวลาเพียงชั่วโมงเศษมีความยาวประมาณ...
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-mg-4 mg-4">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card widget-flat" id="card">
                                <a href="#">
                                    <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./cejan.jpg"
                                        class="card-img-top" alt="...">
                                </a>
                                <div class="card-body">
                                    <a href="#" class="h2 text-decoration-none text-dark">เขาชีจรรย์</a>
                                    <p class="card-text">
                                        เขาชีจรรย์เป็นเขาหินปูนในนาจอมเทียนที่กลายเป็นสถานที่สำคัญของพัทยาเนื่องจากมี...
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card widget-flat" id="card">
                                <a href="#">
                                    <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./bangmong.jpg"
                                        class="card-img-top" alt="...">
                                </a>
                                <div class="card-body">
                                    <a href="#" class="h2 text-decoration-none text-dark">บางละมง</a>
                                    <p class="card-text">
                                        อำเภอบางละมุง เป็นเมืองท่องเที่ยวที่มีความสำคัญของจังหวัดชลบุรี
                                        ซึ่งรู้จักกันใน...
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 6%;">
                        <div class="col-lg-6">
                            <div class="card widget-flat" id="card">
                                <a href="#">
                                    <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./kaolan.jpg"
                                        class="card-img-top" alt="...">
                                </a>
                                <div class="card-body">
                                    <a href="#" class="h2 text-decoration-none text-dark">เกาะล้าน</a>
                                    <p class="card-text">
                                        เกาะล้าน ตั้งอยู่ในเขตอำเภอบางละมุง จังหวัดชลบุรี...
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card widget-flat" id="card">
                                <a href="#">
                                    <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./pattaya.jpg"
                                        class="card-img-top" alt="...">
                                </a>
                                <div class="card-body">
                                    <a href="#" class="h2 text-decoration-none text-dark">พัทยา</a>
                                    <p class="card-text">
                                        พัทยามีชายหาดสวยงามเป็นที่รู้จักในหมู่นักท่องเที่ยว...
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row py-3">
                <div class="col">
                </div>
                <div class="col-md-auto">
                    <a type="button" class="myButtonSeeAll" href="#">ดูทั้งหมด >></a>
                </div>
            </div>
        </div>
        <!-- End hot place -->
    </section>
</body>


</html>