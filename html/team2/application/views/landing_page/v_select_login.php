<!-- 
/*
* v_regis
* Display select register page
* @input - 
* @output form register tourist or entrepreneur
* @author Thanisorn thumsawanit 62160088
* @Create Date 2561-07-31
*/ 
-->
<div class="bg" style="background-image: url('<?php echo base_url() . 'assets/templete/picture' ?>/./BG.jpg'); height: 900px;">
    <div class="container py-5">

        <ul class="breadcrumb">
            <li><a href="<?php echo site_url(); ?>" style="color: green;">หน้าหลัก</a></li>
            <li>เข้าสู่ระบบ</li>
        </ul>

        <h2 align="center" class="h2-style">เข้าสู่ระบบ</h2>
        <div class="row">
            <div class="col">
                <div class="card" id="card2">
                    <a href=" <?php echo site_url() . 'Tourist/Auth/Login_tourist'; ?>">
                        <div class="py-3 services-icon-wap shadow">
                            <div class="h1 text-success text-center">
                                <img class="img-height" src="<?php echo base_url() . 'assets/templete/picture' ?>/./Tourist.png">
                                <h1 class="h2 mt-4 text-center">สำหรับนักท่องเที่ยว</h1>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="card" id="card2">
                    <a href=" <?php echo site_url() . 'Entrepreneur/Auth/Login_entrepreneur'; ?>">
                        <div class="py-3 services-icon-wap shadow">
                            <div class="h1 text-success text-center">
                                <img class="img-height" src="<?php echo base_url() . 'assets/templete/picture' ?>/./Entrepreneur.png">
                                <h1 class="h2 mt-4 text-center">สำหรับผู้ประกอบการ</h1>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>