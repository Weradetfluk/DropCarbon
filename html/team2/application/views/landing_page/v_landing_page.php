<!-- carousel slide banner-->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"></div>

<section class="bg-white">
    <div class="container" data-aos="fade-down">
        <div class="header-break">
            กิจกรรมยอดนิยม
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <?php if (count($arr_image_eve) < 1 || count($arr_image_eve) == 0) { ?>
                        <a href="#">
                            <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./activity1.jpg" style="height: 300px; weight: 450;" class="card-img-top" alt="...">
                        </a>
                    <?php } else { ?>
                        <a href="#">
                            <img src="<?php echo base_url() . 'image_event/' . $arr_image_eve[0]->eve_img_path; ?>" style="height: 300px; weight: 450;" class="card-img-top">
                        </a>
                    <?php } ?>
                    <div class="card-body">
                        <?php if (count($arr_eve) < 1 || count($arr_eve) == 0) { ?>
                            <a href="#">
                                <h2>เก็บขยะริมหาด</h2>
                            </a>
                            <p class="card-text">จากปัญหาสิ่งแวดล้อมชายฝั่งทะเลในปัจจุบัน ได้เกิดปัญหาขยะซึ่งเป็นมลพิษทางทะเลส่งผล...</p>
                            <br>
                            <p style="display:inline; font-size: 16px; color: #008000"><b>ลดคาร์บอนได้ 0.6 กรัม</b></p>
                            <p style="display:inline; font-size: 16px; float: right;">15 มิ.ย. 2564 - 30 มิ.ย. 2564</p>
                        <?php } else { ?>
                            <a href="#">
                                <h2><?php echo $arr_eve[0]->eve_name; ?></h2>
                            </a>
                            <p class="card-tex text-dark">
                                <?php echo iconv_substr($arr_eve[0]->eve_description, 0, 60, "UTF-8") . "..."; ?>
                            </p>
                            <br>
                            <p style="display:inline; font-size: 16px; color: #008000"><b>ลดคาร์บอนได้ 0.6 กรัม</b></p>
                            <p style="display:inline; font-size: 16px; float: right;"><?php echo $arr_eve[0]->eve_start_date; ?> - <?php echo $arr_eve[0]->eve_end_date; ?></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <?php if (count($arr_image_eve) < 2 || count($arr_image_eve) == 0) { ?>
                        <a href="#">
                            <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./activity2.jpg" style="height: 300px; weight: 450;" class="card-img-top" alt="...">

                        </a>
                    <?php } else { ?>
                        <a href="#">
                            <img src="<?php echo base_url() . 'image_event/' . $arr_image_eve[1]->eve_img_path; ?>" style="height: 300px; weight: 450;" class="card-img-top" alt="...">
                        </a>
                    <?php } ?>
                    <div class="card-body">
                        <?php if (count($arr_eve) < 2 || count($arr_eve) == 0) { ?>
                            <a href="#">
                                <h2>ปลูกป่าชายเลน</h2>
                            </a>
                            <p class="card-text">จากการทำงานร่วมกันกับกลุ่มอนุรักษ์ต่างๆในประเทศไทย โดยเฉพาะกลุ่มอนุรักษ์ใน จ.ชลบุรี...</p>
                            <br>
                            <p style="display:inline; font-size: 16px; color: #008000"><b>ลดคาร์บอนได้ 0.6 กรัม</b></p>
                            <p style="display:inline; font-size: 16px; float: right;">15 มิ.ย. 2564 - 30 มิ.ย. 2564</p>
                        <?php } else { ?>
                            <a href="#">
                                <h2><?php echo $arr_eve[1]->eve_name; ?></h2>
                            </a>
                            <p class="card-tex text-dark">
                                <?php echo iconv_substr($arr_eve[1]->eve_description, 0, 60, "UTF-8") . "..."; ?>
                            </p>
                            <br>
                            <p style="display:inline; font-size: 16px; color: #008000"><b>ลดคาร์บอนได้ 0.6 กรัม</b></p>
                            <p style="display:inline; font-size: 16px; float: right;"><?php echo $arr_eve[1]->eve_start_date; ?> - <?php echo $arr_eve[1]->eve_end_date; ?></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ">
                <div class="card">
                    <?php if (count($arr_image_eve) < 3 || count($arr_image_eve) == 0) { ?>
                        <a href="#">
                            <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./activity3.jpg" style="height: 300px; weight: 450;" class="card-img-top" alt="...">
                        </a>
                    <?php } else { ?>
                        <a href="#">
                            <img src="<?php echo base_url() . 'image_event/' . $arr_image_eve[2]->eve_img_path; ?>" style="height: 300px; weight: 450;" class="card-img-top" alt="...">
                        </a>
                    <?php } ?>
                    <div class="card-body">
                        <?php if (count($arr_eve) < 3 || count($arr_eve) == 0) { ?>
                            <a href="#">
                                <h2>วิ่งชมธรรมชาติ</h2>
                            </a>
                            <p class="card-text">ขอเชิญนักวิ่งมาสัมผัสกับธรรมชาติ สูดอากาศโอโซนให้เต็มปอดและทิวทัศน์อันสวยงามของ...</p>
                            <br>
                            <p style="display:inline; font-size: 16px; color: #008000"><b>ลดคาร์บอนได้ 0.6 กรัม</b></p>
                            <p style="display:inline; font-size: 16px; float: right;">15 มิ.ย. 2564 - 30 มิ.ย. 2564</p>
                        <?php } else { ?>
                            <a href="#">
                                <h2><?php echo $arr_eve[2]->eve_name; ?></h2>
                            </a>
                            <p class="card-tex text-dark">
                                <?php echo iconv_substr($arr_eve[2]->eve_description, 0, 60, "UTF-8") . "..."; ?>
                            </p>
                            <br>
                            <p style="display:inline; font-size: 16px; color: #008000"><b>ลดคาร์บอนได้ 0.6 กรัม</b></p>
                            <p style="display:inline; font-size: 16px; float: right;"><?php echo $arr_eve[2]->eve_start_date; ?> - <?php echo $arr_eve[2]->eve_end_date; ?></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
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
                <div class="card" data-aos="fade-right">
                    <?php if (count($arr_image_com) < 1 || count($arr_image_com) == 0) { ?>
                        <a href="#">
                            <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./bangsaen2.jpg" style="height: 550px; weight: 810;" class="card-img-top" alt="...">
                        </a>
                    <?php } else { ?>
                        <a href="#">
                            <img src="<?php echo base_url() . 'image_company/' . $arr_image_com[0]->com_img_path; ?>" style="height: 550px; weight: 810;" class="card-img-top">
                        </a>
                    <?php } ?>
                    <div class="card-body">
                        <?php if (count($arr_com) < 1 || count($arr_com) == 0) { ?>
                            <a href="" class="h2">บางแสน</a>
                            <p class="card-text">หาดบางแสนเป็นสถานที่ท่องเที่ยวที่เป็นที่รู้จักและนิยมมาอย่างยาวนานของนักท่องเที่ยว ด้วยความที่อยู่ใกล้กรุงเทพมหานคร ด้วยการเดินทางรถยนต์ใช้เวลาเพียงชั่วโมงเศษมีความยาวประมาณ...</p>
                        <?php } else { ?>
                            <a href="" class="h2"><?php echo $arr_com[0]->com_name ?></a>
                            <p class="card-text"><?php echo substr($arr_com[0]->com_description, 0, 440) ?> ...</p>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-mg-4 mg-4">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card" data-aos="fade-down">
                            <?php if (count($arr_image_com) != 2 || count($arr_image_com) == 0) { ?>
                                <a href="#">
                                    <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./jan.jpg" style="height: 200px; weight: 270;" class="card-img-top" alt="...">
                                </a>
                            <?php } else { ?>
                                <a href="#">
                                    <img src="<?php echo base_url() . 'image_company/' . $arr_image_com[1]->com_img_path; ?>" style="height: 200px; weight: 270;" class="card-img-top">
                                </a>
                            <?php } ?>
                            <div class="card-body">
                                <?php if (count($arr_com) < 2 || count($arr_com) == 0) { ?>
                                    <a href="#" class="h2">เขาชีจรรย์</a>
                                    <p class="card-text">เขาชีจรรย์เป็นเขาหินปูนในนาจอมเทียนที่มีความ...</p>
                                <?php } else { ?>
                                    <a href="" class="h2"><?php echo $arr_com[1]->com_name ?></a>
                                    <p class="card-text"><?php echo substr($arr_com[1]->com_description, 0, 150) ?> ...</p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card" data-aos="fade-left">
                            <?php if (count($arr_image_com) < 3 || count($arr_image_com) == 0) { ?>
                                <a href="#">
                                    <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./bangmong.jpg" style="height: 200px; weight: 270;" class="card-img-top" alt="...">
                                </a>
                            <?php } else { ?>
                                <a href="#">
                                    <img src="<?php echo base_url() . 'image_company/' . $arr_image_com[2]->com_img_path; ?>" style="height: 200px; weight: 270;" class="card-img-top">
                                </a>
                            <?php } ?>
                            <div class="card-body">
                                <?php if (count($arr_com) < 3 || count($arr_com) == 0) { ?>
                                    <a href="#" class="h2">บางละมุง</a>
                                    <p class="card-text">อำเภอบางละมุง เป็นเมืองท่องเที่ยวที่มีความ...</p>
                                <?php } else { ?>
                                    <a href="" class="h2"><?php echo $arr_com[2]->com_name ?></a>
                                    <p class="card-text"><?php echo substr($arr_com[2]->com_description, 0, 150) ?></p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: -40px;">
                    <div class="col-lg-6">
                        <div class="card" data-aos="fade-right">
                            <?php if (count($arr_image_com) < 4 || count($arr_image_com) == 0) { ?>
                                <a href="#">
                                    <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./kaolan.jpg" style="height: 200px; weight: 270;" class="card-img-top" alt="...">
                                </a>
                            <?php } else { ?>
                                <a href="#">
                                    <img src="<?php echo base_url() . 'image_company/' . $arr_image_com[3]->com_img_path; ?>" style="height: 200px; weight: 270;" class="card-img-top">
                                </a>
                            <?php } ?>
                            <div class="card-body">
                                <?php if (count($arr_com) < 4 || count($arr_com) == 0) { ?>
                                    <a href="#" class="h2">เกาะล้าน</a>
                                    <p class="card-text">เกาะล้าน ตั้งอยู่ในเขตอำเภอบางละมุง จังหวัดชลบุรี...</p>
                                <?php } else { ?>
                                    <a href="" class="h2"><?php echo $arr_com[3]->com_name ?></a>
                                    <p class="card-text"><?php echo substr($arr_com[3]->com_description, 0, 150) ?></p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card" data-aos="fade-up">
                            <?php if (count($arr_image_com) < 5 || count($arr_image_com) == 0) { ?>
                                <a href="#">
                                    <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./pattaya.jpg" style="height: 200px; weight: 270;" class="card-img-top" alt="...">
                                </a>
                            <?php } else { ?>
                                <a href="#">
                                    <img src="<?php echo base_url() . 'image_company/' . $arr_image_com[4]->com_img_path; ?>" style="height: 200px; weight: 270;" class="card-img-top">
                                </a>
                            <?php } ?>
                            <div class="card-body">
                                <?php if (count($arr_com) < 5 || count($arr_com) == 0) { ?>
                                    <a href="#" class="h2">พัทยา</a>
                                    <p class="card-text">พัทยามีชายหาดสวยงามเป็นที่รู้จักในหมู่นักท่องเที่ยว...</p>
                                <?php } else { ?>
                                    <a href="" class="h2"><?php echo $arr_com[4]->com_name ?></a>
                                    <p class="card-text"><?php echo substr($arr_com[4]->com_description, 0, 150) ?></p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
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
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
            industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
            and scrambled it to make a type specimen book. It has survived not only five centuries, but also the
            leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
            with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
            publishing software like Aldus PageMaker including versions of Lorem Ipsum.
        </div>
        <div class="row-max-100">
            <div class="row row-50 justify-content-center">
                <div class="col-sm-6 col-md-5 col-lg-3">
                    <div class="counter-classic" data-aos="fade-up">
                        <div class="counter-classic-number"><span class="counter">12</span>
                        </div>
                        <div class="counter-classic-title">Members</div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-3">
                    <div class="counter-classic" data-aos="fade-up">
                        <div class="counter-classic-number"><span class="counter">194</span>
                        </div>
                        <div class="counter-classic-title">Partners</div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-3">
                    <div class="counter-classic" data-aos="fade-up">
                        <div class="counter-classic-number"><span class="counter">2</span><span class="symbol">k</span>
                        </div>
                        <div class="counter-classic-title">Travelers</div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-3">
                    <div class="counter-classic" data-aos="fade-up">
                        <div class="counter-classic-number"><span class="counter">25</span>
                        </div>
                        <div class="counter-classic-title">Team members</div>
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
            <div class="col-md-3">
                <div class="card" data-aos="fade-right">
                    <a href="#">
                        <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./activity1.jpg" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <a href="#">
                            <h3>เก็บขยะริมหาด</h3>
                        </a>
                        <p class="card-text">จากปัญหาสิ่งแวดล้อมชายฝั่งทะเลในปัจจุบัน ได้เกิดปัญหาขยะซึ่งเป็นมลพิษทางทะเลส่งผล...</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card" data-aos="fade-right">
                    <a href="#">
                        <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./activity2.jpg" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <a href="#">
                            <h3>ปลูกป่าชายเลน</h3>
                        </a>
                        <p class="card-text">จากการทำงานร่วมกันกับกลุ่มอนุรักษ์ต่างๆในประเทศไทย โดยเฉพาะกลุ่มอนุรักษ์ใน จ.ชลบุรี...</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 ">
                <div class="card" data-aos="fade-left">
                    <a href="#">
                        <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./activity3.jpg" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <a href="#">
                            <h3>วิ่งชมธรรมชาติ</h3>
                        </a>
                        <p class="card-text">ขอเชิญนักวิ่งมาสัมผัสกับธรรมชาติ สูดอากาศโอโซนให้เต็มปอดและทิวทัศน์อันสวยงามของ...</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 ">
                <div class="card" data-aos="fade-left">
                    <a href="#">
                        <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./activity3.jpg" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <a href="#">
                            <h3>วิ่งชมธรรมชาติ</h3>
                        </a>
                        <p class="card-text">ขอเชิญนักวิ่งมาสัมผัสกับธรรมชาติ สูดอากาศโอโซนให้เต็มปอดและทิวทัศน์อันสวยงามของ...</p>
                    </div>
                </div>
            </div>
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