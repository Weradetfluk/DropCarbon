<!-- Make by : Naaka Punparich 62160082 -->

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

    .form-control-custom {
        min-height: 43px;
    }

    .btn-custom {
        background-color: #4169E1;
        color: #ffffff;
        min-height: 43px;
        padding: 0px 30px;
    }

    .btn-custom:hover {
        background-color: #6495ED;
        color: #ffffff;
        -webkit-transition: background-color 200ms linear;
        -ms-transition: background-color 200ms linear;
        transition: background-color 200ms linear;
    }

    .pagination {
        margin: 30px auto;
    }
    
    .link-custom {
        font-size: 22px !important;
        color: #212529;
        padding: 10px 20px;
        text-decoration: none;
    }

    .link-custom:hover {
        color: #4169E1;
        text-decoration: none;
    }

    
</style>
<title>List Company</title>
<div class="bg-white">
    <section>
        <div class="container py-5">
            <div class="row text-left py-3">
                <div class="m-auto">
                    <h1 class="h1" style="padding-bottom: 2%">สถานที่ทั้งหมด</h1>
                </div>
            </div>
            <!-- กิจกรรมทั้งหมด -->

            <form action="" method="post">
                <div class="row justify-content-md-center" style="margin: 0px 0px 30px 0px;">
                    <div class="col-md-4">
                        <input type="text" class="form-control form-control-custom" name="txt_event" placeholder="ค้นหาสถานที่">
                    </div>
                    <div class="col-md-2">
                        <select class="form-control form-control-custom" name="txt_category">
                            <option value="" selected>หมวดหมู่</option>
                            <option value="1">หมวดหมู่ 1</option>
                            <option value="2">หมวดหมู่ 2</option>
                            <option value="3">หมวดหมู่ 3</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-custom">ค้นหา</button>
                    </div>
                </div>
            </form>
                    

            <div class="row">
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100" id="card">
                    <a href="<?php echo site_url() . 'Tourist/Event_tourist/Tourist_company/show_tourist_company_detail'; ?>">
                            <?php if (count($image) == 0) { ?>
                            <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./bangsaen2.jpg" class="card-img-top" alt="...">
                        <?php } else { ?>
                            <img src="<?php echo base_url() . 'image_company/' . $image[0]->com_img_path; ?>" class="card-img-top" alt="...">
                        <?php } ?>
                    
                        </a>
                        <!-- รูปที่ 1 -->

                        <div class="card-body" align="center">
                        <?php if (count($company) == 0) { ?>

                    <a href="" class="h2 text-decoration-none text-dark">บางแสน</a>
                    <p class="card-text">หาดบางแสนเป็นสถานที่ท่องเที่ยวที่เป็นที่รู้จักและนิยมมาอย่างยาวนานของนักท่องเที่ยว ด้วยความที่อยู่ใกล้กรุงเทพมหานคร ด้วยการเดินทางรถยนต์ใช้เวลาเพียงชั่วโมงเศษมีความยาวประมาณ...</p>
                    <?php } else { ?>
                    <a href="<?php echo site_url() . 'Tourist/Event_tourist/Tourist_company/show_tourist_company_detail/'. $company[0]->com_id; ?>" class="h2 text-decoration-none text-dark"><?php echo $company[0]->com_name ?></a>
                    <p class="card-text"><?php echo $company[0]->com_description ?></p>
                    <?php } ?>
                        </div>
                        <!-- ชื่อของรูปที่ 1 -->

                    </div>
                </div>
                <!-- กิจกรรมที่ 1 -->

                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100" id="card">
                    <a href="<?php echo site_url() . 'Tourist/Event_tourist/Tourist_company/show_tourist_company_detail'; ?>">
                                <?php if (count($image) <= 1) { ?>
                                    <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./mun.jpg" class="card-img-top" alt="...">
                                <?php } else { ?>
                                    <img src="<?php echo base_url() . 'image_company/' . $image[1]->com_img_path; ?>" class="card-img-top" alt="...">
                                <?php } ?>
                        </a>
                        <!-- รูปที่ 2 -->

                        <div class="card-body" align="center">
                                <?php if (count($company) <= 1) { ?>
                                    <a href="#" class="h2 text-decoration-none text-dark">เขาชีจรรย์</a>
                                    <p class="card-text">เขาชีจรรย์เป็นเขาหินปูนในนาจอมเทียนที่กลายเป็นสถานที่สำคัญของพัทยาเนื่องจากมี...</p>
                                <?php } else { ?>
                                    <a href="<?php echo site_url() . 'Tourist/Event_tourist/Tourist_company/show_tourist_company_detail/'. $company[1]->com_id; ?>" class="h2 text-decoration-none text-dark"><?php echo $company[1]->com_name ?></a>
                                    <p class="card-text"><?php echo $company[1]->com_description ?></p>
                                <?php } ?>
                            </div>                    
                        <!-- ชื่อของรูปที่ 2 -->

                    </div>
                </div>
                <!-- กิจกรรมที่ 2 -->

                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100" id="card">
                    <a href="<?php echo site_url() . 'Tourist/Event_tourist/Tourist_company/show_tourist_company_detail'; ?>">
                    <?php if (count($image) <= 2) { ?>
                                    <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./jan.jpg" class="card-img-top" alt="...">
                                <?php } else { ?>
                                    <img src="<?php echo base_url() . 'image_company/' . $image[2]->com_img_path; ?>" class="card-img-top" alt="...">
                                <?php } ?>
                        </a>
                        <!-- รูปที่ 2 -->

                        <div class="card-body" align="center">
                                <?php if (count($company) <= 2) { ?>
                                    <a href="#" class="h2 text-decoration-none text-dark">เขาชีจรรย์</a>
                                    <p class="card-text">เขาชีจรรย์เป็นเขาหินปูนในนาจอมเทียนที่กลายเป็นสถานที่สำคัญของพัทยาเนื่องจากมี...</p>
                                <?php } else { ?>
                                    <a href="<?php echo site_url() . 'Tourist/Event_tourist/Tourist_company/show_tourist_company_detail/'. $company[2]->com_id; ?>" class="h2 text-decoration-none text-dark"><?php echo $company[2]->com_name ?></a>
                                    <p class="card-text"><?php echo $company[2]->com_description ?></p>
                                <?php } ?>
                            </div>           
                        <!-- ชื่อของรูปที่ 3 -->

                    </div>
                </div>
                <!-- กิจกรรมที่ 3 -->

            </div>
            <div class="row" style="padding-top: 3%;">
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100" id="card">
                    <a href="<?php echo site_url() . 'Tourist/Event_tourist/Tourist_company/show_tourist_company_detail'; ?>">
                    <?php if (count($image) <= 3) { ?>
                                    <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./bangmong.jpg" class="card-img-top" alt="...">
                                <?php } else { ?>
                                    <img src="<?php echo base_url() . 'image_company/' . $image[3]->com_img_path; ?>" class="card-img-top" alt="...">
                                <?php } ?>
                        </a>
                        <!-- รูปที่ 2 -->

                        <div class="card-body" align="center">
                                <?php if (count($company) <= 3) { ?>
                                    <a href="#" class="h2 text-decoration-none text-dark">บางละมุง</a>
                                    <p class="card-text">อำเภอบางละมุง เป็นเมืองท่องเที่ยวที่มีความสำคัญของจังหวัดชลบุรี ซึ่งรู้จักกันใน...</p>
                                <?php } else { ?>
                                    <a href="<?php echo site_url() . 'Tourist/Event_tourist/Tourist_company/show_tourist_company_detail/'. $company[3]->com_id; ?>" class="h2 text-decoration-none text-dark"><?php echo $company[3]->com_name ?></a>
                                    <p class="card-text"><?php echo $company[3]->com_description ?></p>
                                <?php } ?>
                            </div>           
                        <!-- ชื่อของรูปที่ 4 -->

                    </div>
                </div>
                <!-- กิจกรรมที่ 4 -->

                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100" id="card">
                    <a href="<?php echo site_url() . 'Tourist/Event_tourist/Tourist_company/show_tourist_company_detail'; ?>">
                    <?php if (count($image) <= 4) { ?>
                                    <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./kaolan.jpg" class="card-img-top" alt="...">
                                <?php } else { ?>
                                    <img src="<?php echo base_url() . 'image_company/' . $image[4]->com_img_path; ?>" class="card-img-top" alt="...">
                                <?php } ?>
                        </a>
                        <!-- รูปที่ 2 -->

                        <div class="card-body" align="center">
                                <?php if (count($company) <= 4) { ?>
                                    <a href="#" class="h2 text-decoration-none text-dark">เกาะล้าน</a>
                                    <p class="card-text">เกาะล้าน ตั้งอยู่ในเขตอำเภอบางละมุง จังหวัดชลบุรี...</p>
                                <?php } else { ?>
                                    <a href="<?php echo site_url() . 'Tourist/Event_tourist/Tourist_company/show_tourist_company_detail/'. $company[4]->com_id; ?>" class="h2 text-decoration-none text-dark"><?php echo $company[4]->com_name ?></a>
                                    <p class="card-text"><?php echo $company[4]->com_description ?></p>
                                <?php } ?>
                            </div>    
                        <!-- ชื่อของรูปที่ 5 -->

                    </div>
                </div>
                <!-- กิจกรรมที่ 5 -->

                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100" id="card">
                    <a href="<?php echo site_url() . 'Tourist/Event_tourist/Tourist_company/show_tourist_company_detail'; ?>">
                    <?php if (count($image) <= 5) { ?>
                                    <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./pattaya.jpg" class="card-img-top" alt="...">
                                <?php } else { ?>
                                    <img src="<?php echo base_url() . 'image_company/' . $image[5]->com_img_path; ?>" class="card-img-top" alt="...">
                                <?php } ?>
                        </a>
                        <!-- รูปที่ 2 -->

                        <div class="card-body" align="center">
                                <?php if (count($company) <= 5) { ?>
                                    <a href="#" class="h2 text-decoration-none text-dark">พัทยา</a>
                                    <p class="card-text">พัทยามีชายหาดสวยงามเป็นที่รู้จักในหมู่นักท่องเที่ยว...</p>
                                <?php } else { ?>
                                    <a href="<?php echo site_url() . 'Tourist/Event_tourist/Tourist_company/show_tourist_company_detail/'. $company[5]->com_id; ?>" class="h2 text-decoration-none text-dark"><?php echo $company[5]->com_name ?></a>
                                    <p class="card-text"><?php echo $company[5]->com_description ?></p>
                                <?php } ?>
                            </div>    
                        <!-- ชื่อของรูปที่ 6 -->

                    </div>
                </div>
                <!-- กิจกรรมที่ 6 -->

            </div>
            <div class="row" style="padding-top: 3%;">
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100" id="card">
                    <a href="<?php echo site_url() . 'Tourist/Event_tourist/Tourist_company/show_tourist_company_detail'; ?>">
                    <?php if (count($image) <= 6) { ?>
                                    <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./ang.jpg" class="card-img-top" alt="...">
                                <?php } else { ?>
                                    <img src="<?php echo base_url() . 'image_company/' . $image[6]->com_img_path; ?>" class="card-img-top" alt="...">
                                <?php } ?>
                        </a>
                        <!-- รูปที่ 2 -->

                        <div class="card-body" align="center">
                                <?php if (count($company) <= 6) { ?>
                                    <a href="#" class="h2 text-decoration-none text-dark">ศาลเจ้านาจา</a>
                                    <p class="card-text">ศาลเจ้านาจา หรือศาลเจ้าหน่าจาซาไท่จื้อ ตั้งอยู่ที่อ่างศิลา...</p>
                                <?php } else { ?>
                                    <a href="<?php echo site_url() . 'Tourist/Event_tourist/Tourist_company/show_tourist_company_detail/'. $company[6]->com_id; ?>" class="h2 text-decoration-none text-dark"><?php echo $company[6]->com_name ?></a>
                                    <p class="card-text"><?php echo $company[6]->com_description ?></p>
                                <?php } ?>
                            </div>    
                        <!-- ชื่อของรูปที่ 4 -->

                    </div>
                </div>
                <!-- กิจกรรมที่ 4 -->

                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100" id="card">
                    <a href="<?php echo site_url() . 'Tourist/Event_tourist/Tourist_company/show_tourist_company_detail'; ?>">
                    <?php if (count($image) <= 7) { ?>
                                    <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./kere.jpg" class="card-img-top" alt="...">
                                <?php } else { ?>
                                    <img src="<?php echo base_url() . 'image_company/' . $image[7]->com_img_path; ?>" class="card-img-top" alt="...">
                                <?php } ?>
                        </a>
                        <!-- รูปที่ 2 -->

                        <div class="card-body" align="center">
                                <?php if (count($company) <= 7) { ?>
                                    <a href="#" class="h2 text-decoration-none text-dark">แกรนด์แคนยอนคีรี</a>
                                    <p class="card-text">แกรนด์แคนยอนคีรี ตั้งอยู่ที่อำเภอเมืองชลบุรี แถวแยกคีรี...</p>
                                <?php } else { ?>
                                    <a href="<?php echo site_url() . 'Tourist/Event_tourist/Tourist_company/show_tourist_company_detail/'. $company[7]->com_id; ?>" class="h2 text-decoration-none text-dark"><?php echo $company[7]->com_name ?></a>
                                    <p class="card-text"><?php echo $company[7]->com_description ?></p>
                                <?php } ?>
                            </div>    
                        <!-- ชื่อของรูปที่ 5 -->

                    </div>
                </div>
                <!-- กิจกรรมที่ 5 -->

                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100" id="card">
                    <a href="<?php echo site_url() . 'Tourist/Event_tourist/Tourist_company/show_tourist_company_detail'; ?>">
                    <?php if (count($image) <= 8) { ?>
                                    <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./mook.jpg" class="card-img-top" alt="...">
                                <?php } else { ?>
                                    <img src="<?php echo base_url() . 'image_company/' . $image[8]->com_img_path; ?>" class="card-img-top" alt="...">
                                <?php } ?>
                        </a>
                        <!-- รูปที่ 2 -->

                        <div class="card-body" align="center">
                                <?php if (count($company) <= 8) { ?>
                                    <a href="#" class="h2 text-decoration-none text-dark">เขาสามมุข</a>
                                    <p class="card-text"> เป็นจุดท่องเที่ยวที่มีชื่อเสียงควบคู่กับหาดบางแสน เป็นทั้งที่ตั้งของศาลเจ้าแม่สามมุขอันศักดิ์สิทธิ์...</p>
                                <?php } else { ?>
                                    <a href="<?php echo site_url() . 'Tourist/Event_tourist/Tourist_company/show_tourist_company_detail/'. $company[8]->com_id; ?>" class="h2 text-decoration-none text-dark"><?php echo $company[8]->com_name ?></a>
                                    <p class="card-text"><?php echo $company[8]->com_description ?></p>
                                <?php } ?>
                            </div> 
                        <!-- ชื่อของรูปที่ 6 -->

                    </div>
                </div>
                <!-- กิจกรรมที่ 6 -->
               
            </div>

            <div class="row justify-content-md-center">
                <div class="col-md-6"> 
                    <ul class="pagination justify-content-center">

                        <!-- Previous -->
                        <li class="page-item">
                            <a class="link-custom" href="#"> <i class="fas fa-angle-double-left"></i> </a>
                        </li>
                        <li class="page-item">
                            <a class="link-custom" href="#"> <i class="fas fa-angle-left"></i> </a>
                        </li>
                        <!-- เลขหน้าที่มี -->
                        <li class="page-item"><a class="link-custom" href="#">1</a></li>
                        <li class="page-item"><a class="link-custom" href="#">2</a></li>
                        <li class="page-item"><a class="link-custom" href="#">3</a></li>

                        <!-- Next -->
                        <li class="page-item">
                            <a class="link-custom" href="#"> <i class="fas fa-angle-right"></i> </a>
                        </li>
                        <li class="page-item">
                            <a class="link-custom" href="#"> <i class="fas fa-angle-double-right"></i> </a>
                        </li>

                    </ul>
                </div>
                
            </div>
                

        </div>
    </section>
</div>