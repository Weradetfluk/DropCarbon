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

</style>
<title>Detail Event</title>
<div class="bg-white">
    <section>
        <div class="container py-5">
            <div class="row text-left py-3">
                <div class="m-auto">
                    <h1 class="h1" style="padding-bottom: 2%">ชื่อกิจกรรม</h1>
                </div>
                <!-- ชื่อกิจกรรม -->

                <div style="padding-bottom: 2%;">
                    <i class='fas fa-map-marker-alt' style='font-size: 24px; '></i>
                    จังหวัด
                </div>
                <!-- จังหวัด -->

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
                    <div class="card card-h-100" id="card">
                        <div class="card-horizontal">
                            <div class="col-9 ">
                                <a href="#">
                                    <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./bangsaen.jpg" class="card-img-left" alt="...">
                                </a>
                            </div>
                            <!-- รูป -->

                            <div class="col-3 ">
                                <div class="card-body ">
                                    <a href="#" class="h2 text-decoration-none text-dark">บางแสน</a>
                                    <p class="card-text">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    </p>
                                </div>
                            </div>
                            <!-- คำอธิบายรูป -->

                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="padding-top: 5%;">
                <div class="col">
                    <h4>&#9679; รายละเอียด</h4>
                    <hr>
                    <div class="col" style="padding-left: 2%">
                        <div style="padding-left: 2%;padding-top: 2%;padding-bottom: 2%">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </div>
                    </div>
                    <!-- รายละเอียด -->

                </div>
            </div>
            <div class="row" style="padding-top: 5%;">
                <div class="col">
                    <h4>&#9679; จุดเด่น</h4>
                    <hr>
                    <div class="col" style="padding-left: 2%">
                        <div style="padding-left: 2%;padding-top: 2%;padding-bottom: 2%">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </div>
                    </div>
                    <!-- จุดเด่น -->

                </div>
            </div>
            <div class="row" style="padding-top: 5%;">
                <div class="col">
                    <h2>ตำแหน่งสถานที่</h2>
                    <div class="card" id="card" style="padding-left: 2%;">
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