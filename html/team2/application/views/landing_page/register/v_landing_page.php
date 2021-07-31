<!-- Start   : 21:07 29.07.2564 -->
<!-- Make by : Naaka Punparich 62160082 -->
<!DOCTYPE html>
<html lang="en">

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

    img {
        width: 100%;
    }

    #padding {
        padding-right: 2%;
    }

    .myButton1 {
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        background: linear-gradient(to bottom, #ffffff 5%, #f6f6f6 100%);
        background-color: #ffffff;
        border-radius: 6px;
        border: 1px solid #dcdcdc;
        display: inline-block;
        cursor: pointer;
        color: #666666;
        font-family: Arial;
        font-size: 15px;
        font-weight: bold;
        padding: 6px 24px;
        text-decoration: none;
        text-shadow: 0px 1px 0px #ffffff;
    }

    .myButton1:hover {
        background: linear-gradient(to bottom, #f6f6f6 5%, #ffffff 100%);
        background-color: #f6f6f6;
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        transform: scale(1.05);
    }

    .myButton1:active {
        position: relative;
        top: 1px;
    }

    .myButton {
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        background: linear-gradient(to bottom, #ffffff 5%, #f6f6f6 100%);
        background-color: #ffffff;
        border-radius: 6px;
        border: 1px solid #dcdcdc;
        display: inline-block;
        cursor: pointer;
        color: #666666;
        font-family: Arial;
        font-size: 15px;
        font-weight: bold;
        padding: 6px 24px;
        text-decoration: none;
        text-shadow: 0px 1px 0px #ffffff;
    }

    .myButton:hover {
        background: linear-gradient(to bottom, #f6f6f6 5%, #ffffff 100%);
        background-color: #f6f6f6;
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        transform: scale(1.2);
    }

    .myButton:active {
        position: relative;
        top: 1px;
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
                    <img class="img-fluid" src="<?php echo base_url() . 'assets/templete/picture' ?>/./banner2.jpg" alt="">
                </div>
            </div>
            <div class="carousel-item">
                <div class="row">
                    <!-- Picture Banner -->
                    <img class="img-fluid" src="<?php echo base_url() . 'assets/templete/picture' ?>/./banner3.jpg" alt="">
                </div>
            </div>
            <div class="carousel-item">
                <div class="row">
                    <!-- Picture Banner -->
                    <img class="img-fluid" src="<?php echo base_url() . 'assets/templete/picture' ?>/./banner1.jpg" alt="">
                </div>
            </div>
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- End Banner -->


    <section class="bg-light">
        <!-- Start hot event -->
        <div class="container py-5">
            <div class="row text-left py-3">
                <div class="m-auto">
                    <h1 class="h1" style="padding-bottom: 1%">กิจกรรมล่าสุด</h1>
                </div>
            </div>
            <div class="container">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation" id="padding">
                        <button class="myButton" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">10 ม.ค. 64</button>
                    </li>
                    <li class="nav-item" role="presentation" id="padding">
                        <button class="myButton" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">11 ม.ค. 64</button>
                    </li>
                    <li class="nav-item" role="presentation" id="padding">
                        <button class="myButton" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">12 ม.ค. 64</button>
                    </li>
                </ul>
                <div class="card" id="card1" style="padding-top: 3%; padding-left: 2%">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <div class="row py-3">
                                <div class="col">
                                </div>
                                <div class="col-md-auto" style="padding-right: 3%;">
                                    <a type="button" class="myButton1" href="#">อ่านต่อ</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <div class="row py-3">
                                <div class="col">
                                </div>
                                <div class="col-md-auto" style="padding-right: 3%;">
                                    <a type="button" class="myButton1" href="#">อ่านต่อ</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                            <div class="row py-3">
                                <div class="col">
                                </div>
                                <div class="col-md-auto" style="padding-right: 3%;">
                                    <a type="button" class="myButton1" href="#">อ่านต่อ</a>
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
                            <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./gym.jpg" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <a href="#" class="h2 text-decoration-none text-dark">ออกกำลังกาย</a>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt in culpa qui officia deserunt.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100" id="card">
                        <a href="#">
                            <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./manrun.jpg" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <a href="#" class="h2 text-decoration-none text-dark">วิ่งออกกำลังกาย</a>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt in culpa qui officia deserunt.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100" id="card">
                        <a href="#">
                            <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./swimmer.jpg" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <a href="#" class="h2 text-decoration-none text-dark">ว่ายน้ำ</a>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt in culpa qui officia deserunt.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row py-3">
                <div class="col">

                </div>
                <div class="col-md-auto">
                    <a type="button" class="myButton1" href="#">ดูทั้งหมด</a>
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
            <div class="row" >
                <div class="col-xl-7 col-lg-6">
                    <div class="card card-h-100" id="card">
                        <a href="#">
                            <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./bangsaen.jpg" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <a href="#" class="h2 text-decoration-none text-dark">บางแสน</a>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-mg-4 mg-4">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card widget-flat" id="card">
                                <a href="#">
                                    <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./bangkok.jpg" class="card-img-top" alt="...">
                                </a>
                                <div class="card-body">
                                    <a href="#" class="h2 text-decoration-none text-dark">กรุงเทพ</a>
                                    <p class="card-text">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card widget-flat" id="card">
                                <a href="#">
                                    <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./bangkok.jpg" class="card-img-top" alt="...">
                                </a>
                                <div class="card-body">
                                    <a href="#" class="h2 text-decoration-none text-dark">กรุงเทพ</a>
                                    <p class="card-text">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 6%;">
                        <div class="col-lg-6">
                            <div class="card widget-flat" id="card">
                                <a href="#">
                                    <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./bangsaen.jpg" class="card-img-top" alt="...">
                                </a>
                                <div class="card-body">
                                    <a href="#" class="h2 text-decoration-none text-dark">บางแสน</a>
                                    <p class="card-text">
                                        Lorem ipsum dolor sit amet.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card widget-flat" id="card">
                                <a href="#">
                                    <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./pattaya.jpg" class="card-img-top" alt="...">
                                </a>
                                <div class="card-body">
                                    <a href="#" class="h2 text-decoration-none text-dark">พัทยา</a>
                                    <p class="card-text">
                                        Lorem ipsum dolor sit amet.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row py-3" >
                <div class="col">

                </div>
                <div class="col-md-auto" style="padding-bottom: 3%; padding-top: 1%;">
                    <a type="button" class="myButton1" href="#">ดูทั้งหมด</a>
                </div>
            </div>
        </div>
        <!-- End hot place -->
    </section>
</body>

</html>