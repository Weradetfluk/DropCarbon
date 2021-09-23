<!-- Make by : Naaka Punparich 62160082 -->
<style>
    .carousel-indicators {
        bottom: 65px;
    }

    @media screen and (max-width: 1000px) {
        .carousel-indicators {
            bottom: 25px;
        }
    }
</style>

<title>Landing Page</title>

<div class="page">
    <!-- carousel slide-->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="<?php echo base_url() . 'assets/templete/template_site' ?>/images/slider-4-slide-1-1920x678.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="<?php echo base_url() . 'assets/templete/template_site' ?>/images/slider-4-slide-2-1920x678.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="<?php echo base_url() . 'assets/templete/template_site' ?>/images/slider-4-slide-3-1920x678.jpg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- Section Box Categories-->
    <section class="section section-lg section-top-1 bg-gray-4">
        <div class="container offset-negative-1">
            <div class="box-categories cta-box-wrap">
                <div class="box-categories-content">
                    <div class="row justify-content-center">
                        <div class="col-md-4 wow fadeInDown col-9" data-wow-delay=".2s">
                            <ul class="list-marked-2 box-categories-list">
                                <li><a href="#"><img src="<?php echo base_url() . 'assets/templete/template_site' ?>/images/cta-1-368x420.jpg" alt="" width="368" height="420" /></a>
                                    <h5 class="box-categories-title">ชื่อสถานที่</h5>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4 wow fadeInDown col-9" data-wow-delay=".2s">
                            <ul class="list-marked-2 box-categories-list">
                                <li><a href="#"><img src="<?php echo base_url() . 'assets/templete/template_site' ?>/images/cta-2-368x420.jpg" alt="" width="368" height="420" /></a>
                                    <h5 class="box-categories-title">ชื่อสถานที่</h5>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4 wow fadeInDown col-9" data-wow-delay=".2s">
                            <ul class="list-marked-2 box-categories-list">
                                <li><a href="#"><img src="<?php echo base_url() . 'assets/templete/template_site' ?>/images/cta-3-368x420.jpg" alt="" width="368" height="420" /></a>
                                    <h5 class="box-categories-title">ชื่อสถานที่</h5>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><a class="link-classic wow fadeInUp" href="<?php echo base_url() . 'Landing_page/Landing_page/show_company_list' ?>">ดูเพิ่มเติม<span></span></a>
            <!-- Owl Carousel-->
        </div>
    </section>
    <!--	Our Services-->
    <section class="section section-sm">
        <div class="container">
            <h3>เที่ยว Low Carbon แบบ Drop Carbon</h3>
            <div class="row row-30">
                <div class="col-sm-6 col-lg-4">
                    <article class="box-icon-classic">
                        <div class="unit box-icon-classic-body flex-column flex-md-row text-md-left flex-lg-column text-lg-center flex-xl-row text-xl-left">
                            <div class="unit-left">
                                <div class="box-icon-classic-icon fl-bigmug-line-equalization3"></div>
                            </div>
                            <div class="unit-body">
                                <h5 class="box-icon-classic-title"><a href="#">ท่องเที่ยวอย่างไม่เร่งรีบ</a></h5>
                                <p class="box-icon-classic-text">
                                     ด้วยพาหนะที่เป็นมิตรกับสิ่งแวดล้อม
                                     เช่นปั่นจักรยาน
                                     ลดการปล่อยคาร์บอน</p>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <article class="box-icon-classic">
                        <div class="unit box-icon-classic-body flex-column flex-md-row text-md-left flex-lg-column text-lg-center flex-xl-row text-xl-left">
                            <div class="unit-left">
                                <div class="box-icon-classic-icon fl-bigmug-line-circular220"></div>
                            </div>
                            <div class="unit-body">
                                <h5 class="box-icon-classic-title"><a href="#">Drop Carbon Hero</a></h5>
                                <p class="box-icon-classic-text">เพื่อเชิดชูเกียรติในการเป็นนักท่องเที่ยวที่มี
                                    คุณภาพและเป็นตัวอย่างที่ดีให้กับนักท่องเที่ยวท่านอื่นๆ</p>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <article class="box-icon-classic">
                        <div class="unit box-icon-classic-body flex-column flex-md-row text-md-left flex-lg-column text-lg-center flex-xl-row text-xl-left">
                            <div class="unit-left">
                                <div class="box-icon-classic-icon fl-bigmug-line-favourites5"></div>
                            </div>
                            <div class="unit-body">
                                <h5 class="box-icon-classic-title"><a href="#">พักโรงแรมสีเขียว</a></h5>
                                <p class="box-icon-classic-text">นอนหลับสบาย แถมยังได้ช่วยกระจายรายได้ให้กับคนในท้องถิ่นได้อีกด้วย</p>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <article class="box-icon-classic">
                        <div class="unit box-icon-classic-body flex-column flex-md-row text-md-left flex-lg-column text-lg-center flex-xl-row text-xl-left">
                            <div class="unit-left">
                                <div class="box-icon-classic-icon fl-bigmug-line-headphones32"></div>
                            </div>
                            <div class="unit-body">
                                <h5 class="box-icon-classic-title"><a href="#">ทำตัวเป็นนักเดินทาง</a></h5>
                                <p class="box-icon-classic-text">ดื่มด่ำกับศิลปวัฒนธรรม
                                    หาโอกาสเรียนรู้ทักษะงานฝีมือ
                                    ที่ทรงคุณค่า สร้างมิตรภาพ
                                    กับชุมชน</p>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <article class="box-icon-classic">
                        <div class="unit box-icon-classic-body flex-column flex-md-row text-md-left flex-lg-column text-lg-center flex-xl-row text-xl-left">
                            <div class="unit-left">
                                <div class="box-icon-classic-icon fl-bigmug-line-hot67"></div>
                            </div>
                            <div class="unit-body">
                                <h5 class="box-icon-classic-title"><a href="#">กิจกรรมที่หลากหลาย</a></h5>
                                <p class="box-icon-classic-text">ความสนุกที่จะเติมเต็มให้ทริปนี้
                                เป็นหนึ่งในทริปที่แสนประทับใจๆ และได้แชร์ประสบการณ์การท่องเที่ยว</p>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <article class="box-icon-classic">
                        <div class="unit box-icon-classic-body flex-column flex-md-row text-md-left flex-lg-column text-lg-center flex-xl-row text-xl-left">
                            <div class="unit-left">
                                <div class="box-icon-classic-icon fl-bigmug-line-wallet26"></div>
                            </div>
                            <div class="unit-body">
                                <h5 class="box-icon-classic-title"><a href="#">สำหรับผู้ประกอบการ</a></h5>
                                <p class="box-icon-classic-text">สามารถประชาสัมพันธ์การท่องเที่ยวของท่าน ในแบบ Low Carbon</p>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
    <!-- Hot tours-->
    <section class="section section-sm bg-default">
        <div class="container">
            <h3 class="oh-desktop"><span class="d-inline-block wow slideInDown">กิจกรรมยอดนิยม</span></h3>
            <div class="row row-sm row-40 row-md-50">
                <div class="col-sm-6 col-md-12 wow fadeInRight">
                    <!-- Product Big-->
                    <article class="product-big">
                        <div class="unit flex-column flex-md-row align-items-md-stretch">
                            <div class="unit-left"><a class="product-big-figure" href="#"><img src="<?php echo base_url() . 'assets/templete/template_site' ?>/images/product-big-1-600x366.jpg" alt="" width="600" height="366" /></a></div>
                            <div class="unit-body">
                                <div class="product-big-body" style="padding-left: 75px">
                                    <h5 class="product-big-title"><a href="#">ชื่อกิจกรรม</a></h5>
                                    <div class="group-sm group-middle justify-content-start">
                                        <a class="product-big-reviews" href="#">4 เช็คอิน</a>
                                    </div>
                                    <p class="product-big-text">รายละเอียดของกิจกรรม...</p><a class="button button-black-outline button-ujarak" href="#">ดูเพิ่มเติม</a>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-sm-6 col-md-12 wow fadeInLeft">
                    <!-- Product Big-->
                    <article class="product-big">
                        <div class="unit flex-column flex-md-row align-items-md-stretch">
                            <div class="unit-left"><a class="product-big-figure" href="#"><img src="<?php echo base_url() . 'assets/templete/template_site' ?>/images/product-big-2-600x366.jpg" alt="" width="600" height="366" /></a></div>
                            <div class="unit-body">
                                <div class="product-big-body" style="padding-left: 75px">
                                    <h5 class="product-big-title"><a href="#">ชื่อกิจกรรม</a></h5>
                                    <div class="group-sm group-middle justify-content-start">
                                        <a class="product-big-reviews" href="#">5 เช็คอิน</a>
                                    </div>
                                    <p class="product-big-text">รายละเอียดของกิจกรรม...</p><a class="button button-black-outline button-ujarak" href="#">ดูเพิ่มเติม</a>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            <a class="button button-black-outline button-ujarak" style="float: right;" href="<?php echo base_url() . 'Landing_page/Landing_page/show_event_list' ?>">ดูทั้งหมด</a>
        </div>
    </section>
    <!-- Different People-->
    <section class="section section-sm">
        <div class="container">
            <h3 class="title-block find-car oh"><span class="d-inline-block wow slideInUp">Drop Carbon HERO</span></h3>
            <p> นักท่องเที่ยวที่มีคุณภาพและเป็นตัวอย่างที่ดีให้กับนักท่องเที่ยวท่านอื่นๆ</p><br>

            <div class="row row-30 justify-content-center box-ordered">
                <div class="col-sm-6 col-md-5 col-lg-3">
                    <!-- Team Modern-->
                    <article class="team-modern">
                        <div class="team-modern-header"><a class="team-modern-figure" href="#"><img class="img-circles" src="<?php echo base_url() . 'assets/templete/template_site' ?>/images/user-1-118x118.jpg" alt="" width="118" height="118" /></a>
                            <svg x="0px" y="0px" width="270px" height="70px" viewbox="0 0 270 70" enable-background="new 0 0 270 70" xml:space="preserve">
                                <g>
                                    <path fill="#161616" d="M202.085,0C193.477,28.912,166.708,50,135,50S76.523,28.912,67.915,0H0v70h270V0H202.085z"></path>
                                </g>
                            </svg>
                        </div>
                        <div class="team-modern-caption">
                            <h6 class="team-modern-name"><a href="#">Diana Robinson</a></h6>
                            <p class="team-modern-status">อันดับที่ 1</p>
                        </div>
                    </article>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-3">
                    <!-- Team Modern-->
                    <article class="team-modern">
                        <div class="team-modern-header"><a class="team-modern-figure" href="#"><img class="img-circles" src="<?php echo base_url() . 'assets/templete/template_site' ?>/images/user-2-118x118.jpg" alt="" width="118" height="118" /></a>
                            <svg x="0px" y="0px" width="270px" height="70px" viewbox="0 0 270 70" enable-background="new 0 0 270 70" xml:space="preserve">
                                <g>
                                    <path fill="#161616" d="M202.085,0C193.477,28.912,166.708,50,135,50S76.523,28.912,67.915,0H0v70h270V0H202.085z"></path>
                                </g>
                            </svg>
                        </div>
                        <div class="team-modern-caption">
                            <h6 class="team-modern-name"><a href="#">Peter McMillan</a></h6>
                            <p class="team-modern-status">อันดับที่ 2</p>
                        </div>
                    </article>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-3">
                    <!-- Team Modern-->
                    <article class="team-modern">
                        <div class="team-modern-header"><a class="team-modern-figure" href="#"><img class="img-circles" src="<?php echo base_url() . 'assets/templete/template_site' ?>/images/user-3-118x118.jpg" alt="" width="118" height="118" /></a>
                            <svg x="0px" y="0px" width="270px" height="70px" viewbox="0 0 270 70" enable-background="new 0 0 270 70" xml:space="preserve">
                                <g>
                                    <path fill="#161616" d="M202.085,0C193.477,28.912,166.708,50,135,50S76.523,28.912,67.915,0H0v70h270V0H202.085z"></path>
                                </g>
                            </svg>
                        </div>
                        <div class="team-modern-caption">
                            <h6 class="team-modern-name"><a href="#">Jill Peterson</a></h6>
                            <p class="team-modern-status">อันดับที่ 3</p>
                        </div>
                    </article>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-3">
                    <!-- Team Modern-->
                    <article class="team-modern">
                        <div class="team-modern-header"><a class="team-modern-figure" href="#"><img class="img-circles" src="<?php echo base_url() . 'assets/templete/template_site' ?>/images/user-4-118x118.jpg" alt="" width="118" height="118" /></a>
                            <svg x="0px" y="0px" width="270px" height="70px" viewbox="0 0 270 70" enable-background="new 0 0 270 70" xml:space="preserve">
                                <g>
                                    <path fill="#161616" d="M202.085,0C193.477,28.912,166.708,50,135,50S76.523,28.912,67.915,0H0v70h270V0H202.085z"></path>
                                </g>
                            </svg>
                        </div>
                        <div class="team-modern-caption">
                            <h6 class="team-modern-name"><a href="#">James Smith</a></h6>
                            <p class="team-modern-status">อันดับที่ 4</p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
    <!-- Section Subscribe-->
    <section class="section bg-default text-center offset-top-50">
        <div class="parallax-container" data-parallax-img="<?php echo base_url() . 'assets/templete/template_site' ?>/images/parallax-1-1920x850.jpg">
            <div class="parallax-content section-xl section-inset-custom-1 context-dark bg-overlay-2-21">
                <div class="container" style=" padding: 100px 0px">
                    <h2 class="heading-2 oh font-weight-normal wow slideInDown"><span class="d-block font-weight-semi-bold"></span><span class="d-block font-weight-light"></span></h2>
                    <p class="text-width-medium text-spacing-75 wow fadeInLeft" data-wow-delay=".1s"></p>
                </div>
            </div>
        </div>
    </section>
    <!--	Instagrram wondertour-->
    <section class="section section-sm section-top-0 section-fluid section-relative bg-gray-4">
        <div class="container-fluid">
            <h6 class="gallery-title">คลังรูปภาพ</h6>
            <!-- Owl Carousel-->
            <div class="owl-carousel owl-classic owl-dots-secondary" data-items="1" data-sm-items="2" data-md-items="3" data-lg-items="4" data-xl-items="5" data-xxl-items="6" data-stage-padding="15" data-xxl-stage-padding="0" data-margin="30" data-autoplay="true" data-nav="true" data-dots="true">
                <!-- Thumbnail Classic-->
                <!-- Thumbnail Classic-->
                <article class="thumbnail thumbnail-mary">
                    <div class="thumbnail-mary-figure"><img src="<?php echo base_url() . 'assets/templete/template_site' ?>/images/gallery-image-4-270x195.jpg" alt="" width="270" height="195" />
                    </div>
                    <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="<?php echo base_url() . 'Landing_page/Landing_page/show_company_list' ?>" alt="" width="270" height="195" /></a>
                    </div>
                </article>
                <!-- Thumbnail Classic-->
                <article class="thumbnail thumbnail-mary">
                    <div class="thumbnail-mary-figure"><img src="<?php echo base_url() . 'assets/templete/template_site' ?>/images/gallery-image-5-270x195.jpg" alt="" width="270" height="195" />
                    </div>
                    <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="#" alt="" width="270" height="195" /></a>
                    </div>
                </article>
                <!-- Thumbnail Classic-->
                <article class="thumbnail thumbnail-mary">
                    <div class="thumbnail-mary-figure"><img src="<?php echo base_url() . 'assets/templete/template_site' ?>/images/gallery-image-6-270x195.jpg" alt="" width="270" height="195" />
                    </div>
                    <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="#" alt="" width="270" height="195" /></a>
                    </div>
                </article>
                <!-- Thumbnail Classic-->
                <article class="thumbnail thumbnail-mary">
                    <div class="thumbnail-mary-figure"><img src="<?php echo base_url() . 'assets/templete/template_site' ?>/images/gallery-image-7-270x195.jpg" alt="" width="270" height="195" />
                    </div>
                    <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="#" alt="" width="270" height="195" /></a>
                    </div>
                </article>
            </div>
        </div>
    </section>
</div>
<!-- Global Mailform Output-->
<div class="snackbars" id="form-output-global"></div>
<!-- Javascript-->
<script src="<?php echo base_url() . 'assets/templete/template_site' ?>/js/core.min.js"></script>
<script src="<?php echo base_url() . 'assets/templete/template_site' ?>/js/script.js"></script>

<script>
    $(document).ready(function() {

        $(document).on('click', '.myButton', function() {
            $('.myButton').removeClass("active");
            $(this).addClass("active");
        });

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
</script>