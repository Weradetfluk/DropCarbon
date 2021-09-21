<style>
    .fa {
        text-align: center;
        text-decoration: none;
        margin: 5px 2px;
        position: relative;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        line-height: 36px;
    }

    .fa:hover {
        opacity: 0.7;
    }

    .fa-fa-facebook {
        background: #3B5998;
        color: white;
    }

    .fa-fa-twitter {
        background: #55ACEE;
        color: white;
    }

    .fa-fa-instagram {
        background: radial-gradient(circle at 33% 100%, #fed373 4%, #f15245 30%, #d92e7f 62%, #9b36b7 85%, #515ecf);
        color: white;
    }

    #card1 {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
    }

    #card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
    }

    .card-horizontal {
        display: flex;
        flex: 1 1 auto;
    }

    .carousel-item {
        position: relative;
    }

    .carousel-item img {
        position: absolute;   
        top: 50%;
        transform: translateY(-50%);
    }

</style>
<title>Detail Company</title>
<div class="bg-white">
    <section>

        <div class="container py-5">
            <div class="row text-left py-3">
                <div class="m-auto">
                <h1 class="h1" style="padding-bottom: 2%"><?php echo $company[0]->com_name ?></h1>
                </div>
                <!-- ชื่อกิจกรรม -->

                <div>
                    แชร์
                    <a href="#" class="fa fa-fa-facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="fa fa-fa-twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="fa fa-fa-instagram"><i class="fab fa-instagram"></i></a>
                    <hr>
                </div>
                <!-- แชร์ -->

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-h-100" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                        <div class="card-horizontal">
                            <div class="col-6" style="margin: 20px auto;">
                            <img src="<?php echo base_url() . 'image_company/' . $company[0]->com_img_path; ?>" class="card-img-top" alt="...">
                            </div>
                            <!-- รูป -->

                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="padding-top: 5%;">
                <div class="col">
                    <h4>&#9679; รายละเอียด</h4>
                    <hr>
                    <div class="col" style="padding-left: 2%">
                        <div style="padding-left: 2%;padding-top: 2%;padding-bottom: 2%"><?php echo $company[0]->com_description ?>
                        </div>
                    </div>
                    <!-- รายละเอียด -->

                </div>
        
            </div>
            <div class="row" style="padding-top: 5%;">
                <div class="col">
                    <h2>ตำแหน่งสถานที่</h2>
                    <div class="card" style="padding-left: 2%; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                        <h3 style="padding-top: 2%; ">ชื่อสถานที่</h3>
                        <!-- ชื่อสถานที่ -->

                        <hr>
                        <div class="row">
                            <div class="col">
                                <h5>&#9679; ที่อยู่</h5>
                                <hr>
                                <div class="row" style="padding-left: 2%; padding-bottom: 5%;">
                                    การท่องเที่ยวแห่งประเทศไทย 1600 ถ.เพชรบุรีตัดใหม่ แขวงมักกะสัน เขตราชเทวี กรุงเทพฯ 10400
                                </div>
                                <div class="row" style="padding-left: 2%; padding-bottom: 3%;">
                                    <p><i class="fa fa-phone"></i>+66 12345678</p>
                                </div>
                                <div class="row" style="padding-left: 2%; padding-bottom: 5%;">
                                    <p><i class="fa fa-calendar"></i>เวลาทำการ เปิดแล้ว</p>
                                </div>
                            </div>
                            <div class="col" style="padding-right: 2%; padding-bottom: 1%;">
                                <a href="#">
                                    <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./bangsaen.jpg" class="card-img-left" alt="...">
                                </a>
                            </div>
                        </div>
                        <!-- ข้อมูลของสถานที่ -->

                    </div>
                    <!-- ตำแหน่ง -->

                </div>
            </div>
        </div>
    </section>
</div>