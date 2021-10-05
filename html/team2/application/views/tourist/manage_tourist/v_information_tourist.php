<style>
.subtext {
    white-space: nowrap;
    width: 30%;
    overflow: hidden;
    text-overflow: ellipsis;
}
</style>

<div class="bg-gray">
    <div class="container py-5" style="border-radius: 25px; padding-bottom: 4% !important">
        <ul class="breadcrumb">
            <li><a href="<?php echo site_url() . 'Tourist/Auth/Landing_page_tourist'; ?>" style="color: green;">หน้าหลัก</a></li>
            <li>ข้อมูลส่วนตัว</li>
        </ul>

        <section>
            <div class="container">
                <h2>ข้อมูลส่วนตัว</h2>
                <div class="row">
                    <div class="col">
                        <div class="profile-pic-div">
                            <?php if ($this->session->userdata("tus_img_path") == '') { ?>
                            <img src="<?php echo base_url() . 'assets/templete/picture/' ?>/./person.jpg" id="photo">
                            <?php } else { ?>
                            <img src="<?php echo base_url() . 'profilepicture_tourist/' . $this->session->userdata('tus_img_path'); ?>">
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col">
                        <h3><?php echo $arr_tus[0]->tus_firstname; ?> <?php echo $arr_tus[0]->tus_lastname; ?></h3>
                        <h3>คะแนนของฉัน</h3>
                        <h1 style="display:inline; color: #239d58;"><?php echo $arr_tus[0]->tus_score; ?></h1>
                        <h3 style="display:inline;"> แต้ม</h3>
                    </div>
                    <div class="col"></div>
                    <div class="col">
                        <p style="border: 2px solid; width: 350px; height: 250px;"></p>
                        <h3 style="text-align: center;">Drop Carbon Hero</h3>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="header-break">
                โปรโมชันของฉัน
            </div>
            <div class="container">
                <div class="card">
                    <div class="row">
                        <div class="col">
                            <!-- <p style="border: 2px solid; width: 250px; height: 200px; margin-top: 16px;">#</p> -->
                            <img src="<?php echo base_url() . 'image_promotions/' . $tou_pro[0]->pro_img_path; ?>" style="border: 2px solid; width: 250px; height: 200px; margin-top: 16px;" id="img_01">
                        </div>
                        <div class="col">
                            <p style="margin: 100px 30px; font-size: 28px;" class="subtext"><?php echo $tou_pro[0]->pro_description ?></p>
                        </div>
                        <div class="col"></div>
                        <div class="col">
                            <button class="btn btn-success" style="margin: 100px 30px;">ใช้</button>
                        </div>
                    </div>
                </div>
                <p class="align-center"><a href="#">ดูเพิ่มเติม</a></p>
            </div>
        </section>

        <section>
            <div class="header-break">
                รางวัลของฉัน
            </div>

            <div class="container">
                <div class="card">
                    <div class="row">
                        <div class="col">
                            <p style="border: 2px solid; width: 250px; height: 200px; margin-top: 16px;"></p>
                        </div>
                        <div class="col">
                            <p style="margin-top: 90px; margin-left: 30px; font-size: 28px;">ชื่อของรางวัล</p>
                            <p style="margin-left: 30px; font-size: 28px; display:inline; color: #239d58;">500</p>
                            <p style="display:inline; font-size: 28px;"> แต้ม</p>
                        </div>
                        <div class="col"></div>
                        <div class="col">
                            <button class="btn btn-success" style="margin: 100px 30px;">แลก</button>
                        </div>
                    </div>
                </div>
                <p class="align-center"><a href="#">ดูเพิ่มเติม</a></p>
            </div>
        </section>

        <section>
            <div class="header-break">
                ประวัติการเข้าร่วมกิจกรรม
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <a href="#">
                                <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./activity1.jpg" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <a href="#">
                                    <h2>เก็บขยะริมหาด</h2>
                                </a>
                                <p class="card-text">จากปัญหาสิ่งแวดล้อมชายฝั่งทะเลในปัจจุบัน ได้เกิดปัญหาขยะซึ่งเป็นมลพิษทางทะเลส่งผล...</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <a href="#">
                                <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./activity2.jpg" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <a href="#">
                                    <h2>ปลูกป่าชายเลน</h2>
                                </a>
                                <p class="card-text">จากการทำงานร่วมกันกับกลุ่มอนุรักษ์ต่างๆในประเทศไทย โดยเฉพาะกลุ่มอนุรักษ์ใน จ.ชลบุรี...</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <div class="card">
                            <a href="#">
                                <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./activity3.jpg" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <a href="#">
                                    <h2>วิ่งชมธรรมชาติ</h2>
                                </a>
                                <p class="card-text">ขอเชิญนักวิ่งมาสัมผัสกับธรรมชาติ สูดอากาศโอโซนให้เต็มปอดและทิวทัศน์อันสวยงามของ...</p>
                            </div>
                        </div>
                    </div>
                </div>
                <p style="float : right;"><a href="<?php echo base_url() . 'Tourist/Event_tourist/Tourist_event/show_event_list_tourist' ?>">ดูเพิ่มเติม <span class="material-icons">arrow_right_alt</span></a></p>
            </div>
        </section>
    </div>
</div>