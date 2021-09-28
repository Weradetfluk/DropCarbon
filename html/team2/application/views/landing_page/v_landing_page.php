<style>
    a {
        color: #000;
    }

    .button {
        position: relative;
        overflow: hidden;
        display: inline-block;
        min-width: 200px;
        padding: 17px 33px 15px;
        font-size: 16px;
        line-height: 1.34;
        border: 2px solid;
        font-weight: 500;
        letter-spacing: normal;
        white-space: nowrap;
        text-overflow: ellipsis;
        text-align: center;
        cursor: pointer;
        vertical-align: middle;
        user-select: none;
        transition: 250ms all ease-in-out;
    }

    .button:hover {
        background-color: #01b3a7;
        color: #000;
    }

    .card-two {
        border: 8px solid #f4f4f4 ;
        border-radius: unset;
        margin-bottom: 30px;
        margin-top: 30px;
        color: #333;
        background: #fff;
        width: 100%;
        box-shadow: 0 2px 2px 0 rgb(0 0 0 / 14%), 0 3px 1px -2px rgb(0 0 0 / 20%), 0 1px 5px 0 rgb(0 0 0 / 12%);
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        font-size: .875rem;
        transition: 300ms all ease-in-out;
    }

    .card-two:hover {
        margin-bottom: 30px;
        margin-top: 30px;
        color: #333;
        background: #fff;
        width: 100%;
        box-shadow: 0 2px 2px 0 rgb(0 0 0 / 14%), 0 3px 1px -2px rgb(0 0 0 / 20%), 0 1px 5px 0 rgb(0 0 0 / 12%);
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        font-size: .875rem;
        border: 8px solid #fff ;
        border-radius: unset;
        transition: 350ms all ease-in-out;
        transform: scale(1.02);
    }

    .card {
        transition: 300ms all ease-in-out;
    }

    .card:hover {
        transition: 350ms all ease-in-out;
        transform: scale(1.05);
    }
</style>

<!-- Make by : Naaka Punparich 62160082 -->
<title>Landing Page</title>

<!-- carousel slide-->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"></div>
<div style="background-color: #f7f7f7; padding-bottom: 30px;">
    <div class="container">
        <!-- หัวข้อ กิจกรรมทั้งหมด -->
        <h2 style="padding-top : 40px; text-align: center;">กิจกรรมยอดนิยม</h2>
        <div class="row">
            <!-- ตัวกำหนดขนาดของการ์ดที่ 1 -->
            <div class="col-md-4">
                <!-- การ์ดที่ 1 -->
                <div class="card" id="card">
                    <!-- รูปในการ์ดที่ 1 -->
                    <a href="#">
                        <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./activity1.jpg" class="card-img-top" alt="...">
                    </a>
                    <!-- ข้อความในการ์ดที่ 1 -->
                    <div class="card-body">
                        <a href="#" class="h2">เก็บขยะริมหาด</a>
                        <p class="card-text">จากปัญหาสิ่งแวดล้อมชายฝั่งทะเลในปัจจุบัน ได้เกิดปัญหาขยะซึ่งเป็นมลพิษทางทะเลส่งผล...</p>
                    </div>
                </div>
            </div>
            <!-- ตัวกำหนดขนาดของการ์ดที่ 2 -->
            <div class="col-md-4">
                <!-- การ์ดที่ 2 -->
                <div class="card" id="card">
                    <!-- รูปในการ์ดที่ 2 -->
                    <a href="#">
                        <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./activity2.jpg" class="card-img-top" alt="...">
                    </a>
                    <!-- ข้อความในการ์ดที่ 2 -->
                    <div class="card-body">
                        <a href="#" class="h2 text-decoration-none text-dark">ปลูกป่าชายเลน</a>
                        <p class="card-text">จากการทำงานร่วมกันกับกลุ่มอนุรักษ์ต่างๆในประเทศไทย โดยเฉพาะกลุ่มอนุรักษ์ใน จ.ชลบุรี...</p>
                    </div>
                </div>
            </div>
            <!-- ตัวกำหนดขนาดของการ์ดที่ 3 -->
            <div class="col-md-4 ">
                <!-- การ์ดที่ 3 -->
                <div class="card" id="card">
                    <!-- รูปในการ์ดที่ 3 -->
                    <a href="#">
                        <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./activity3.jpg" class="card-img-top" alt="...">
                    </a>
                    <!-- ข้อความในการ์ดที่ 3 -->
                    <div class="card-body">
                        <a href="#" class="h2 text-decoration-none text-dark">วิ่งชมธรรมชาติ</a>
                        <p class="card-text">ขอเชิญนักวิ่งมาสัมผัสกับธรรมชาติ สูดอากาศโอโซนให้เต็มปอดและทิวทัศน์อันสวยงามของ...</p>
                    </div>
                </div>
            </div>
        </div>
        <p style="text-align: center;"><a href="<?php echo base_url() . 'Landing_page/Landing_page/show_event_list' ?>">ดูเพิ่มเติม <span class="material-icons">arrow_right_alt</span></a></p>
        <!-- Owl Carousel-->
    </div>
</div>


<!-- Hot tours-->
<div class="container">
    <h2 style="padding-top : 40px;">สถานที่ยอดนิยม</h2>
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
                            <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./jan.jpg" class="card-img-top" alt="...">
                        </a>
                        <!-- ข้อความในการ์ดที่ 2 -->
                        <div class="card-body">
                            <a href="#" class="h2 text-decoration-none text-dark">เขาชีจรรย์</a>
                            <p class="card-text">เขาชีจรรย์เป็นเขาหินปูนในนาจอมเทียน...</p>
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
                            <p class="card-text">อำเภอบางละมุง เป็นเมืองท่องเที่ยวที่มีความ...</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: -32.5px;">
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
    <a class="button" style="float: right;" href="<?php echo base_url() . 'Landing_page/Landing_page/show_company_list' ?>">ดูทั้งหมด</a>
</div>

<!--	Our Services-->
<div class="container" style="margin-top: 40px; margin-bottom: 40px;">
    <h2 style="padding-top : 80px; text-align: center;">เที่ยว Low Carbon แบบ Drop Carbon</h2>
    <div class="row row-30">
        <div class="col-sm-6 col-lg-4">
            <div class="card-two">
                <div class="box-icon-classic-body">
                    <div class="card-body">
                        <h3 class="box-icon-classic-title"><a href="#">ท่องเที่ยวอย่างไม่เร่งรีบ</a></h3>
                        <p class="box-icon-classic-text">
                            ด้วยพาหนะที่เป็นมิตรกับสิ่งแวดล้อมเช่นปั่นจักรยานลดการปล่อยคาร์บอน
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="card-two">
                <div class="text-xl-left">
                    <div class="card-body">
                        <h3 class="box-icon-classic-title"><a href="#">Drop Carbon Hero</a></h3>
                        <p class="box-icon-classic-text">
                            เพื่อเชิดชูเกียรติในการเป็นนักท่องเที่ยวที่มีคุณภาพและเป็นตัวอย่างที่ดีให้กับนักท่องเที่ยวท่านอื่นๆ
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="card-two">
                <div class="box-icon-classic-body">
                    <div class="card-body">
                        <h3 class="box-icon-classic-title"><a href="#">พักโรงแรมสีเขียว</a></h3>
                        <p class="box-icon-classic-text">
                            นอนหลับสบาย แถมยังได้ช่วยกระจายรายได้ให้กับคนในท้องถิ่นได้อีกด้วย
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="card-two">
                <div class="box-icon-classic-body">
                    <div class="card-body">
                        <h3 class="box-icon-classic-title"><a href="#">ทำตัวเป็นนักเดินทาง</a></h3>
                        <p class="box-icon-classic-text">
                            ดื่มด่ำกับศิลปวัฒนธรรมหาโอกาสเรียนรู้ทักษะงานฝีมือที่ทรงคุณค่า สร้างมิตรภาพกับชุมชน
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="card-two">
                <div class="box-icon-classic-body">
                    <div class="card-body">
                        <h3 class="box-icon-classic-title"><a href="#">กิจกรรมที่หลากหลาย</a></h3>
                        <p class="box-icon-classic-text">ความสนุกที่จะเติมเต็มให้ทริปนี้
                            เป็นหนึ่งในทริปที่น่าประทับใจๆ และได้แชร์ประสบการณ์การท่องเที่ยว
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="card-two">
                <div class="box-icon-classic-body">
                    <div class="card-body">
                        <h3 class="box-icon-classic-title"><a href="#">สำหรับผู้ประกอบการ</a></h3>
                        <p class="box-icon-classic-text">สามารถประชาสัมพันธ์การท่องเที่ยวของท่าน ในแบบ Low Carbon</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Global Mailform Output-->
<div class="snackbars" id="form-output-global"></div>

<!-- Javascript-->
<script src="<?php echo base_url() . 'assets/templete/template_site' ?>/js/script.js"></script>

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