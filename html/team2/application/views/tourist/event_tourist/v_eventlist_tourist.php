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

    .buttonIN {
        padding: 15px 25px;
        font-size: 24px;
        text-align: center;
        cursor: pointer;
        outline: none;
        color: #fff;
        background-color: #42a0ff;
        border: none;
        border-radius: 15px;
        box-shadow: 0 9px #999;
    }

    .buttonIN:hover {
        background-color: #007af4;
    }

    .buttonIN:active {
        background-color: #007af4;
        box-shadow: 0 5px #666;
        transform: translateY(4px);
    }

    .buttonOUT {
        padding: 15px 25px;
        font-size: 24px;
        text-align: center;
        cursor: pointer;
        outline: none;
        color: #fff;
        background-color: #ff3c3c;
        border: none;
        border-radius: 15px;
        box-shadow: 0 9px #999;
    }

    .buttonOUT:hover {
        background-color: #d90000;
    }

    .buttonOUT:active {
        background-color: #d90000;
        box-shadow: 0 5px #666;
        transform: translateY(4px);
    }

    .buttonSUC {
        padding: 15px 25px;
        font-size: 24px;
        text-align: center;
        cursor: pointer;
        outline: none;
        color: #fff;
        background-color: #04AA6D;
        border: none;
        border-radius: 15px;
    }
</style>

<body class="bg-white">
    <section>
        <!-- Start my event -->
        <div class="container py-5">
            <div class="row text-left py-3">
                <div class="m-auto">
                    <h1 class="h1" style="padding-bottom: 2%">กิจกรรมของฉัน</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100" id="card">
                        <a href="<?php echo base_url() . 'Tourist/Event_tourist/Tourist_event/show_detailevent_tourist' ?>">
                            <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./gym.jpg" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body" align="center">
                            <a href="#" class="h2 text-decoration-none text-dark">ออกกำลังกาย</a>
                        </div>
                        <div align="center">
                            <button class="buttonIN">Check in</button>
                        </div>
                        <div class="card-body"></div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100" id="card">
                        <a href="<?php echo base_url() . 'Tourist/Event_tourist/Tourist_event/show_detailevent_tourist' ?>">
                            <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./manrun.jpg" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body" align="center">
                            <a href="#" class="h2 text-decoration-none text-dark">วิ่งออกกำลังกาย</a>
                        </div>
                        <div align="center">
                            <button class="buttonOUT">Check out</button>
                        </div>
                        <div class="card-body"></div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100" id="card">
                        <a href="<?php echo base_url() . 'Tourist/Event_tourist/Tourist_event/show_detailevent_tourist' ?>">
                            <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./swimmer.jpg" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body" align="center">
                            <a href="#" class="h2 text-decoration-none text-dark">ว่ายน้ำ</a>
                        </div>
                        <div align="center">
                            <button class="buttonSUC" disabled>Success</button>
                        </div>
                        <div class="card-body"></div>
                    </div>
                </div>
            </div>
            <div class="row" style="padding-top: 3%;">
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100" id="card">
                        <a href="<?php echo base_url() . 'Tourist/Event_tourist/Tourist_event/show_detailevent_tourist' ?>">
                            <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./gym.jpg" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body" align="center">
                            <a href="#" class="h2 text-decoration-none text-dark">ออกกำลังกาย</a>
                        </div>
                        <div align="center">
                            <button class="buttonSUC" disabled>Success</button>
                        </div>
                        <div class="card-body"></div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100" id="card">
                        <a href="<?php echo base_url() . 'Tourist/Event_tourist/Tourist_event/show_detailevent_tourist' ?>">
                            <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./manrun.jpg" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body" align="center">
                            <a href="#" class="h2 text-decoration-none text-dark">วิ่งออกกำลังกาย</a>
                        </div>
                        <div align="center">
                            <button class="buttonSUC" disabled>Success</button>
                        </div>
                        <div class="card-body"></div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100" id="card">
                        <a href="<?php echo base_url() . 'Tourist/Event_tourist/Tourist_event/show_detailevent_tourist' ?>">
                            <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./swimmer.jpg" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body" align="center">
                            <a href="#" class="h2 text-decoration-none text-dark">ว่ายน้ำ</a>
                        </div>
                        <div align="center">
                            <button class="buttonSUC" disabled>Success</button>
                        </div>
                        <div class="card-body"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

