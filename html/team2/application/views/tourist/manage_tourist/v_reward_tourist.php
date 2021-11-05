<!-- 
/*
* v_reward_tourist
* Display reward tourist
* @input arr_tus
* @output reward tourist
* @author Thanisorn thumsawanit 62160088
* @Create Date 2564-10-09
*/ 
-->
<style>
    .absolute {
        position: absolute;
        top: 70px;
        right: 80px;
    }

    .absolute2 {
        position: absolute;
        top: 10px;
        right: 80px;
    }

    #bgc {
        background-color: lightblue;
    }
</style>

<div class="container py-5">
    <ul class="breadcrumb">
        <li><a href="<?php echo site_url() . 'Tourist/Auth/Landing_page_tourist'; ?>" style="color: green;">หน้าหลัก</a></li>
        <li>ระดับ Rank ของฉัน</li>
    </ul>
</div>

<div class="container">
    <div class="row">
        <div class="col">
            <div style="border: 2px solid; border-radius: 25px;">
                <h2 style=" text-align: center;">ระดับ bronze </h2>
                <div class="profile-pic-div">
                    <?php if ($this->session->userdata("tus_img_path") == '') { ?>
                        <img src="<?php echo base_url() . 'assets/templete/picture/' ?>/./person.jpg" id="photo">
                    <?php } else { ?>
                        <img src="<?php echo base_url() . 'profilepicture_tourist/' . $this->session->userdata('tus_img_path'); ?>">
                    <?php } ?>
                </div>
                <h3 style=" text-align: center;"><?php echo $arr_tus[0]->tus_firstname; ?> <?php echo $arr_tus[0]->tus_lastname; ?></h3>
            </div>
        </div>
        <div class="col">
            <div style="margin-left: 50px; margin-right: 50px; margin-top: 30px; padding: 45px; border: 2px solid; border-radius: 25px;">
                <span style="text-align: center; vertical-align: sub; display: block; margin-left: auto; margin-right: auto; width: 50%; font-size: 60px;" class="material-icons">emoji_events</span>
                <h3 style="text-align: center;"><span style="vertical-align: sub; font-size: 40px;" class="material-icons">lock</span> ปลดล็อคระดับ gold</h3><br>
                <div style="text-align: center;">
                    <h3 style="display:inline; color: #239d58;"><?php echo $arr_tus[0]->tus_score; ?>/1000 point</h3>
                </div>
            </div>
        </div>
    </div>
    <!--/row-->
    <div class="row">
        <div class="col">
            <br>
            <!-- Nav pills -->
            <ul class="nav nav-pills" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="pill" href="#home">Rank</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#menu1">Bronze</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#menu2">Silver</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#menu3">Gold</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#menu4">Platinum</a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div id="home" class="container tab-pane active"><br>
                    <h3>Rank</h3>
                    <p>ระดับ Rank จะมีความแตกต่างของสิทธิพิเศษในแต่ละระดับ</p>
                </div>
                <div id="menu1" class="container tab-pane fade"><br>
                    <h3>Bronze</h3>
                    <p>สิทธิพิเศษของระดับ Bronze</p>
                </div>
                <div id="menu2" class="container tab-pane fade"><br>
                    <h3>Silver</h3>
                    <p>สิทธิพิเศษของระดับ Silver</p>
                </div>
                <div id="menu3" class="container tab-pane fade"><br>
                    <h3>Gold</h3>
                    <p>สิทธิพิเศษของระดับ Gold</p>
                </div>
                <div id="menu4" class="container tab-pane fade"><br>
                    <h3>Platinum</h3>
                    <p>สิทธิพิเศษของระดับ Platinum</p>
                </div>
            </div>
        </div>
        <div class="col">
            <h3 style="text-align: center;"> <img style="vertical-align: sub;" src="<?php echo base_url() . 'assets/templete/picture/gift-box.png' ?>" width="40px"> วิธีการรับสิทธิพิเศษ</h3><br>
            <div style="margin-left: auto; margin-right: auto; padding: 20px 20px; border: 2px solid; border-radius: 15px;">
                <div class="row">
                    <div class="col">
                        <img style="vertical-align: sub; display: block;   margin-left: auto;   margin-right: auto;" src="<?php echo base_url() . 'assets/templete/picture/Logo-only-new.png' ?>" width="70px">
                        <p style="text-align: center;">เข้าร่วมกิจกรรม<br>low carbon<br>หรือท่องเที่ยวในสถานที่ที่เกี่ยวข้อง</p>
                    </div>
                    <div class="col">
                        <span style="text-align: center; vertical-align: sub; display: block;   margin-left: auto;   margin-right: auto; width: 50%; font-size: 60px;" class="material-icons">lock</span>
                        <p style="text-align: center;">ปลดล็อคระดับ Rank <br>เพื่อสิทธิพิเศษที่มากกว่า</p>
                    </div>
                    <div class="col">
                        <img style="vertical-align: sub; display: block;   margin-left: auto;   margin-right: auto;" src="<?php echo base_url() . 'assets/templete/picture/gift-box.png' ?>" width="60px">
                        <p style="text-align: center;"> รับสิทธิพิเศษสำหรับคุณ</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
