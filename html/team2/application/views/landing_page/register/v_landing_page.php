<!-- Make by : Naaka Punparich 62160082 -->
<!-- เริ่ม CSS -->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Chonburi&display=swap');

    p {
        padding-bottom: 1%;
    }

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
        padding-bottom: 1.3%;
    }

    .myButton1 {
        background-color: #ffffff;
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

    .myButton1:active {
        position: relative;
        top: 1px;
    }

    .myButton {
        background-color: #ffffff;
        border: 0px solid #dcdcdc;
        display: inline-block;
        cursor: pointer;
        color: #666666;
        font-family: Arial;
        font-size: 16px;
        font-weight: bold;
        padding: 6px 24px;
        text-decoration: none;
    }

    .myButton:hover {
        color: #0080c0;
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
<!-- สิ้นสุด CSS -->

<body>
    <!-- เริ่ม Banner -->
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <!-- ตัวหมุนรูปของ Banner -->
        <ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row">
                    <!-- รูปที่ 1 ของ Banner  -->
                    <img class="img-fluid" src="<?php echo base_url() . 'assets/templete/picture' ?>/./banner7.jpg" alt="">
                </div>
            </div>
            <div class="carousel-item">
                <div class="row">
                    <!-- รูปที่ 2 ของ Banner -->
                    <img class="img-fluid" src="<?php echo base_url() . 'assets/templete/picture' ?>/./banner6.jpg" alt="">
                </div>
            </div>
            <div class="carousel-item">
                <div class="row">
                    <!-- รูปที่ 3 ของ Banner -->
                    <img class="img-fluid" src="<?php echo base_url() . 'assets/templete/picture' ?>/./banner5.jpg" alt="">
                </div>
            </div>
        </div>

        <!-- ปุ่มเลื่อนซ้ายของ Banner -->
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>

        <!-- ปุ่มเลื่อนขวาของ Banner -->
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- สิ้นสุด Banner -->

    <!-- เริ่มสีพื้นหลัง bg-white -->
    <section class="bg-white">

        <!-- เริ่มกิจกรรมล่าสุด -->
        <div class="container py-5">

            <!-- หัวข้อ กิจกรรมล่าสุด -->
            <h1 class="h1" style="padding-bottom: 1%; padding-top: 1%;">กิจกรรมล่าสุด</h1>

            <!-- ตัวเปลี่ยนข่าวสารของ กิจกรรมล่าสุด -->
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="myButton active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">10 ก.ค. 64</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="myButton" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">11 ก.ค. 64</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="myButton" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">12 ก.ค. 64</button>
                </li>
            </ul>

            <!-- กล่องข้อความข่าวสารของ กิจกรรมล่าสุด -->
            <div class="card" id="card1" style="padding-top: 3%; padding-left: 2%">

                <!-- ตัวกำหนดขนาดกล่องให้พอดีกับข้อความ -->
                <div class="tab-content" id="pills-tabContent">

                    <!-- ตัวกล่องข้อความข่าวสารที่ 1 -->
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <p>ระบบแนะนำการท่องเที่ยวเชิงอนุรักษ์สิ่งแวดล้อม (Drop Carbon System) เป็นระบบแนะนำการท่องเที่ยวแบบออนไลน์</p>
                        <div class="col-md-auto" align="right" id="padding">
                            <a type="button" class="myButton1" href="#">อ่านต่อ >></a>
                        </div>
                    </div>

                    <!-- ตัวกล่องข้อความข่าวสารที่ 2 -->
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <p>อำเภอเมืองชลบุรีจึงได้มีการริเริ่มแนวคิดหนึ่งคือการท่องเที่ยวแบบ Low carbon Tourism ซึ่งเป็นกิจกรรมท่องเที่ยวที่เป็นทางเลือกในการช่วยลดคาร์บอนให้น้อยลง </p>
                        <div class="col-md-auto" align="right" id="padding">
                            <a type="button" class="myButton1" href="#">อ่านต่อ >></a>
                        </div>
                    </div>

                    <!-- ตัวกล่องข้อความข่าวสารที่ 3 -->
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <p>ระบบแนะนำการท่องเที่ยวเชิงอนุรักษ์สิ่งแวดล้อม (Drop Carbon System) </p>
                        <div class="col-md-auto" align="right" id="padding">
                            <a type="button" class="myButton1" href="#">อ่านต่อ >></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- สิ้นสุดกิจกรรมล่าสุด -->

        <!-- เริ่มกิจรรกมทั้งหมด -->
        <div class="container py-3">

            <!-- หัวข้อ กิจกรรมทั้งหมด -->
            <h1 class="h1" style="padding-bottom: 2%">กิจกรรมทั้งหมด</h1>
            <div class="row">
                <!-- ตัวกำหนดขนาดของการ์ดที่ 1 -->
                <div class="col-12 col-md-4 mb-4">

                    <!-- การ์ดที่ 1 -->
                    <div class="card" id="card">

                        <!-- รูปในการ์ดที่ 1 -->
                        <a href="<?php echo site_url() . 'Tourist/Event_tourist/Tourist_event/show_detailevent_tourist'; ?>">
                            <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./activity1.jpg" class="card-img-top" alt="...">
                        </a>
                        <!-- ข้อความในการ์ดที่ 1 -->
                        <div class="card-body">
                            <a href="<?php echo site_url() . 'Tourist/Event_tourist/Tourist_event/show_detailevent_tourist'; ?>" class="h2 text-decoration-none text-dark">เก็บขยะริมหาด</a>
                            <p class="card-text">จากปัญหาสิ่งแวดล้อมชายฝั่งทะเลในปัจจุบัน ได้เกิดปัญหาขยะซึ่งเป็นมลพิษทางทะเลส่งผลกระทบต่อ...</p>
                        </div>

                    </div>
                </div>

                <!-- ตัวกำหนดขนาดของการ์ดที่ 2 -->
                <div class="col-12 col-md-4 mb-4">

                    <!-- การ์ดที่ 2 -->
                    <div class="card" id="card">

                        <!-- รูปในการ์ดที่ 2 -->
                        <a href="<?php echo site_url() . 'Tourist/Event_tourist/Tourist_event/show_detailevent_tourist'; ?>">
                            <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./activity2.jpg" class="card-img-top" alt="...">
                        </a>
                        <!-- ข้อความในการ์ดที่ 2 -->
                        <div class="card-body">
                            <a href="<?php echo site_url() . 'Tourist/Event_tourist/Tourist_event/show_detailevent_tourist'; ?>" class="h2 text-decoration-none text-dark">ปลูกป่าชายเลน</a>
                            <p class="card-text">จากการทำงานร่วมกันกับกลุ่มอนุรักษ์ต่างๆในประเทศไทย โดยเฉพาะกลุ่มอนุรักษ์ใน จ.ชลบุรี...</p>
                        </div>

                    </div>
                </div>

                <!-- ตัวกำหนดขนาดของการ์ดที่ 3 -->
                <div class="col-12 col-md-4 mb-4">

                    <!-- การ์ดที่ 3 -->
                    <div class="card" id="card">

                        <!-- รูปในการ์ดที่ 3 -->
                        <a href="<?php echo site_url() . 'Tourist/Event_tourist/Tourist_event/show_detailevent_tourist'; ?>">
                            <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./activity3.jpg" class="card-img-top" alt="...">
                        </a>
                        <!-- ข้อความในการ์ดที่ 3 -->
                        <div class="card-body">
                            <a href="<?php echo site_url() . 'Tourist/Event_tourist/Tourist_event/show_detailevent_tourist'; ?>" class="h2 text-decoration-none text-dark">วิ่งชมธรรมชาติ</a>
                            <p class="card-text">ขอเชิญนักวิ่งมาสัมผัสกับธรรมชาติ สูดอากาศโอโซนให้เต็มปอดและทิวทัศน์อันสวยงามของเทือกเขา...</p>
                        </div>

                    </div>
                </div>
            </div>

            <!-- ปุ่มดูทั้งหมด -->
            <div class="col-md-auto" align="right">
                <a type="button" class="myButtonSeeAll" href="<?php echo site_url() . 'Tourist/Event_tourist/Tourist_event/show_tourist_eventlist'; ?>">ดูทั้งหมด >></a>
            </div>

        </div>
        <!-- สิ้นสุดกิจรรกมทั้งหมด -->

        <!-- เริ่มสถานที่ยอดนิยม -->
        <div class="container py-2">
            <!-- หัวข้อ สถานที่ยอดนิยม -->
            <h1 class="h1" style="padding-bottom: 2%">สถานที่ยอดนิยม</h1>
            <div class="row">
                <!-- ตัวกำหนดขนาดของการ์ดที่ 1 -->
                <div class="col-xl-7 col-lg-6">

                    <!-- การ์ดที่ 1 -->
                    <div class="card card-h-100" id="card">

                        <!-- รูปในการ์ดที่ 1 -->
                        <a href="">
                            <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./bangsaen2.jpg" class="card-img-top" alt="...">
                        </a>
                        <!-- ข้อความในการ์ดที่ 1 -->
                        <div class="card-body">
                            <a href="" class="h2 text-decoration-none text-dark">บางแสน</a>
                            <p class="card-text">หาดบางแสนเป็นสถานที่ท่องเที่ยวที่เป็นที่รู้จักและนิยมมาอย่างยาวนานของนักท่องเที่ยว ด้วยความที่อยู่ใกล้กรุงเทพมหานคร ด้วยการเดินทางรถยนต์ใช้เวลาเพียงชั่วโมงเศษมีความยาวประมาณ...</p>
                        </div>

                    </div>
                </div>

                <!-- ตัวแบ่ง Row -->
                <div class="col-xl-5 col-mg-4 mg-4">
                    <div class="row">
                        <!-- ตัวกำหนดขนาดของการ์ดที่ 2 -->
                        <div class="col-lg-6">

                            <!-- การ์ดที่ 2 -->
                            <div class="card widget-flat" id="card">

                                <!-- รูปในการ์ดที่ 2 -->
                                <a href="#">
                                    <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./cejan.jpg" class="card-img-top" alt="...">
                                </a>
                                <!-- ข้อความในการ์ดที่ 2 -->
                                <div class="card-body">
                                    <a href="#" class="h2 text-decoration-none text-dark">เขาชีจรรย์</a>
                                    <p class="card-text">เขาชีจรรย์เป็นเขาหินปูนในนาจอมเทียนที่กลายเป็นสถานที่สำคัญของพัทยาเนื่องจากมี...</p>
                                </div>

                            </div>
                        </div>

                        <!-- ตัวกำหนดขนาดของการ์ดที่ 3 -->
                        <div class="col-lg-6">

                            <!-- การ์ดที่ 3 -->
                            <div class="card widget-flat" id="card">

                                <!-- รูปในการ์ดที่ 3 -->
                                <a href="#">
                                    <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./bangmong.jpg" class="card-img-top" alt="...">
                                </a>
                                <!-- ข้อความในการ์ดที่ 3 -->
                                <div class="card-body">
                                    <a href="#" class="h2 text-decoration-none text-dark">บางละมง</a>
                                    <p class="card-text">อำเภอบางละมุง เป็นเมืองท่องเที่ยวที่มีความสำคัญของจังหวัดชลบุรี ซึ่งรู้จักกันใน...</p>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 6%;">
                        <!-- ตัวกำหนดขนาดของการ์ดที่ 4 -->
                        <div class="col-lg-6">

                            <!-- การ์ดที่ 4 -->
                            <div class="card widget-flat" id="card">

                                <!-- รูปในการ์ดที่ 4 -->
                                <a href="#">
                                    <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./kaolan.jpg" class="card-img-top" alt="...">
                                </a>
                                <!-- ข้อความในการ์ดที่ 4 -->
                                <div class="card-body">
                                    <a href="#" class="h2 text-decoration-none text-dark">เกาะล้าน</a>
                                    <p class="card-text">เกาะล้าน ตั้งอยู่ในเขตอำเภอบางละมุง จังหวัดชลบุรี...</p>
                                </div>

                            </div>
                        </div>

                        <!-- ตัวกำหนดขนาดของการ์ดที่ 5 -->
                        <div class="col-lg-6">

                            <!-- การ์ดที่ 5 -->
                            <div class="card widget-flat" id="card">

                                <!-- รูปในการ์ดที่ 5 -->
                                <a href="#">
                                    <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./pattaya.jpg" class="card-img-top" alt="...">
                                </a>
                                <!-- ข้อความในการ์ดที่ 5 -->
                                <div class="card-body">
                                    <a href="#" class="h2 text-decoration-none text-dark">พัทยา</a>
                                    <p class="card-text">พัทยามีชายหาดสวยงามเป็นที่รู้จักในหมู่นักท่องเที่ยว...</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ปุ่มดูทั้งหมด -->
            <div class="col-md-auto py-4" align="right">
                <a type="button" class="myButtonSeeAll" href="#">ดูทั้งหมด >></a>
            </div>
        </div>
        <!-- สิ้นสุดสถานที่ยอดนิยม -->
    </section>
    <!-- สิ้นสุดสีพื้นหลัง bg-light -->
</body>

<script>
    $(document).ready(function() {

        $(document).on('click', '.myButton', function() {
            $('.myButton').removeClass("active");
            $(this).addClass("active");
        });

        let error_regis_entrepreneur = '<?php echo $this->session->userdata("error_register_entrepreneur"); ?>';
        if (error_regis_entrepreneur == "success") {
            swal("สำเร็จ", "คุณทำการลงทำเบียนสำเร็จ ขณะนี้กำลังรอการอนุมัติ", "success");
            <?php echo $this->session->unset_userdata("error_register_entrepreneur"); ?>
        }
    });
</script>