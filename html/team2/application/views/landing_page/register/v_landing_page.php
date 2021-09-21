<!-- Make by : Naaka Punparich 62160082 -->
<title>Landing Page</title>

<div class="page">
    <!-- Swiper-->
    <section class="section swiper-container swiper-slider swiper-slider-corporate swiper-pagination-style-2" data-loop="true" data-autoplay="5000" data-simulate-touch="true" data-nav="false" data-direction="vertical">
        <div class="swiper-wrapper text-left">
            <div class="swiper-slide context-dark" data-slide-bg="<?php echo base_url() . 'assets/templete/template_site' ?>/images/slider-4-slide-1-1920x678.jpg">
                <div class="swiper-slide-caption section-md">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10">
                                <h6 class="text-uppercase" data-caption-animate="fadeInRight" data-caption-delay="0"></h6>
                                <h2 class="oh font-weight-light" data-caption-animate="slideInUp" data-caption-delay="100"><span></span><span class="font-weight-bold"> </span></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide context-dark" data-slide-bg="<?php echo base_url() . 'assets/templete/template_site' ?>/images/slider-4-slide-2-1920x678.jpg">
                <div class="swiper-slide-caption section-md">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10">
                                <h6 class="text-uppercase" data-caption-animate="fadeInRight" data-caption-delay="0"></h6>
                                <h2 class="oh font-weight-light" data-caption-animate="slideInUp" data-caption-delay="100"><span></span><span class="font-weight-bold"></span></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide context-dark" data-slide-bg="<?php echo base_url() . 'assets/templete/template_site' ?>/images/slider-4-slide-3-1920x678.jpg">
                <div class="swiper-slide-caption section-md">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10">
                                <h6 class="text-uppercase" data-caption-animate="fadeInRight" data-caption-delay="0"></h6>
                                <h2 class="oh font-weight-light" data-caption-animate="slideInUp" data-caption-delay="100"><span></span><span class="font-weight-bold"></span></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Swiper Pagination-->
        <div class="swiper-pagination"></div>
    </section>
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
            </div><a class="link-classic wow fadeInUp" href="#">ดูเพิ่มเติม<span></span></a>
            <!-- Owl Carousel-->
        </div>

    </div>
    <!-- สิ้นสุดกิจรรกมทั้งหมด -->

    <!-- เริ่มสถานที่ยอดนิยม -->
    <div class="container py-2">
        <!-- หัวข้อ สถานที่ยอดนิยม -->
        <h1>สถานที่ยอดนิยม</h1>
        <div class="row">
            <!-- ตัวกำหนดขนาดของการ์ดที่ 1 -->
            <div class="col-xl-7 col-lg-6">

                <!-- การ์ดที่ 1 -->
                <div class="card card-h-100" id="card">

                    <!-- รูปในการ์ดที่ 1 -->
                    <a href="<?php echo site_url() . 'Tourist/Event_tourist/Tourist_company/show_tourist_company_detail/'. $arr_com[0]->com_id; ?>">
                        <?php if (count($arr_image_com) == 0) { ?>
                            <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./bangsaen2.jpg" class="card-img-top" alt="...">
                        <?php } else { ?>
                            <img src="<?php echo base_url() . 'image_company/' . $arr_image_com[0]->com_img_path; ?>" class="card-img-top" alt="...">
                        <?php } ?>
                    </a>
                    <!-- ข้อความในการ์ดที่ 1 -->
                    <div class="card-body">
                        <?php if (count($arr_com) == 0) { ?>
                            <a href="" class="h2 text-decoration-none text-dark">บางแสน</a>
                            <p class="card-text">หาดบางแสนเป็นสถานที่ท่องเที่ยวที่เป็นที่รู้จักและนิยมมาอย่างยาวนานของนักท่องเที่ยว ด้วยความที่อยู่ใกล้กรุงเทพมหานคร ด้วยการเดินทางรถยนต์ใช้เวลาเพียงชั่วโมงเศษมีความยาวประมาณ...</p>
                        <?php } else { ?>
                            <a href="" class="h2 text-decoration-none text-dark"><?php echo $arr_com[0]->com_name ?></a>
                            <p class="card-text"><?php echo $arr_com[0]->com_description ?></p>
                        <?php } ?>
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
                            <a href="<?php echo site_url() . 'Tourist/Event_tourist/Tourist_company/show_tourist_company_detail'; ?>">
                                <?php if (count($arr_image_com) <= 1) { ?>
                                    <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./cejan.jpg" class="card-img-top" alt="...">
                                <?php } else { ?>
                                    <img src="<?php echo base_url() . 'image_company/' . $arr_image_com[1]->com_img_path; ?>" class="card-img-top" alt="...">
                                <?php } ?>
                            </a>
                            <!-- ข้อความในการ์ดที่ 2 -->
                            <div class="card-body">
                                <?php if (count($arr_com) <= 1) { ?>
                                    <a href="#" class="h2 text-decoration-none text-dark">เขาชีจรรย์</a>
                                    <p class="card-text">เขาชีจรรย์เป็นเขาหินปูนในนาจอมเทียนที่กลายเป็นสถานที่สำคัญของพัทยาเนื่องจากมี...</p>
                                <?php } else { ?>
                                    <a href="" class="h2 text-decoration-none text-dark"><?php echo $arr_com[1]->com_name ?></a>
                                    <p class="card-text"><?php echo $arr_com[1]->com_description ?></p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <!-- ตัวกำหนดขนาดของการ์ดที่ 3 -->
                    <div class="col-lg-6">

                        <!-- การ์ดที่ 3 -->
                        <div class="card widget-flat" id="card">

                            <!-- รูปในการ์ดที่ 3 -->
                            <a href="<?php echo site_url() . 'Tourist/Event_tourist/Tourist_company/show_tourist_company_detail'; ?>">
                                <?php if (count($arr_image_com) <= 2) { ?>
                                    <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./bangmong.jpg" class="card-img-top" alt="...">
                                <?php } else { ?>
                                    <img src="<?php echo base_url() . 'image_company/' . $arr_image_com[2]->com_img_path; ?>" class="card-img-top" alt="...">
                                <?php } ?>
                            </a>
                            <!-- ข้อความในการ์ดที่ 3 -->
                            <div class="card-body">
                                <?php if (count($arr_com) <= 2) { ?>
                                    <a href="#" class="h2 text-decoration-none text-dark">บางละมุง</a>
                                    <p class="card-text">อำเภอบางละมุง เป็นเมืองท่องเที่ยวที่มีความสำคัญของจังหวัดชลบุรี ซึ่งรู้จักกันใน...</p>
                                <?php } else { ?>
                                    <a href="" class="h2 text-decoration-none text-dark"><?php echo $arr_com[2]->com_name ?></a>
                                    <p class="card-text"><?php echo $arr_com[2]->com_description ?></p>
                                <?php } ?>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="row" style="padding-top: 6%;">
                    <!-- ตัวกำหนดขนาดของการ์ดที่ 4 -->
                    <div class="col-lg-6">

                        <!-- การ์ดที่ 4 -->
                        <div class="card widget-flat" id="card">

                            <!-- รูปในการ์ดที่ 4 -->
                            <a href="<?php echo site_url() . 'Tourist/Event_tourist/Tourist_company/show_tourist_company_detail'; ?>">
                                <?php if (count($arr_image_com) <= 3) { ?>
                                    <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./kaolan.jpg" class="card-img-top" alt="...">
                                <?php } else { ?>
                                    <img src="<?php echo base_url() . 'image_company/' . $arr_image_com[3]->com_img_path; ?>" class="card-img-top" alt="...">
                                <?php } ?>
                            </a>
                            <!-- ข้อความในการ์ดที่ 4 -->
                            <div class="card-body">
                                <?php if (count($arr_com) <= 3) { ?>
                                    <a href="#" class="h2 text-decoration-none text-dark">เกาะล้าน</a>
                                    <p class="card-text">เกาะล้าน ตั้งอยู่ในเขตอำเภอบางละมุง จังหวัดชลบุรี...</p>
                                <?php } else { ?>
                                    <a href="" class="h2 text-decoration-none text-dark"><?php echo $arr_com[3]->com_name ?></a>
                                    <p class="card-text"><?php echo $arr_com[3]->com_description ?></p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <!-- ตัวกำหนดขนาดของการ์ดที่ 5 -->
                    <div class="col-lg-6">

                        <!-- การ์ดที่ 5 -->
                        <div class="card widget-flat" id="card">

                            <!-- รูปในการ์ดที่ 5 -->
                            <a href="<?php echo site_url() . 'Tourist/Event_tourist/Tourist_company/show_tourist_company_detail'; ?>">
                                <?php if (count($arr_image_com) <= 4) { ?>
                                    <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./pattaya.jpg" class="card-img-top" alt="...">
                                <?php } else { ?>
                                    <img src="<?php echo base_url() . 'image_company/' . $arr_image_com[4]->com_img_path; ?>" class="card-img-top" alt="...">
                                <?php } ?>
                            </a>
                            <!-- ข้อความในการ์ดที่ 5 -->
                            <div class="card-body">
                                <?php if (count($arr_com) <= 4) { ?>
                                    <a href="#" class="h2 text-decoration-none text-dark">พัทยา</a>
                                    <p class="card-text">พัทยามีชายหาดสวยงามเป็นที่รู้จักในหมู่นักท่องเที่ยว...</p>
                                <?php } else { ?>
                                    <a href="" class="h2 text-decoration-none text-dark"><?php echo $arr_com[4]->com_name ?></a>
                                    <p class="card-text"><?php echo $arr_com[4]->com_description ?></p>
                                <?php } ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ปุ่มดูทั้งหมด -->
        <div class="col-md-auto py-4" align="right">
        <a type="button" class="myButtonSeeAll" href="<?php echo site_url() . 'Tourist/Event_tourist/Tourist_company/show_tourist_company_list'; ?>">ดูทั้งหมด >></a>
        </div>
    </div>
    <!-- สิ้นสุดสถานที่ยอดนิยม -->
</section>
<!-- สิ้นสุดสีพื้นหลัง bg-light -->

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