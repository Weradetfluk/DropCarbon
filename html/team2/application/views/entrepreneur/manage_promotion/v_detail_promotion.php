<!-- 
/*
* v_detail_promotion
* Display data detail promotion by entrepreneur
* @input obj_promotiont, arr_image
* @output detail data promotion
* @author Priyarat Bumrungkit 62160156
* @Create Date 2564-10-01
*/ 
-->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background-color: #8fbacb; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2)">
                        <center>
                            <h2 class="card-title text-white" style="font-family: 'Prompt', sans-serif !important;"><?php echo $arr_promotion[0]->pro_name; ?></h2>
                        </center>
                    </div>
                    <br>
                    <div class="card-body">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators" style="bottom: 30px !important;">
                                <?php for ($i = 0; $i < count($arr_promotion); $i++) { ?>
                                    <?php if ($i == 0) { ?>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>" class="active"></li>
                                    <?php } ?>
                                    <?php if ($i != 0) { ?>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>"></li>
                                    <?php } ?>
                                <?php } ?>
                            </ol>
                            <div class="carousel-inner">
                                <hr width="100%" size="5" color="#cccccc">
                                <?php for ($i = 0; $i < count($arr_promotion); $i++) { ?>
                                    <?php if ($i == 0) { ?>
                                        <div class="carousel-item image-detail active">
                                            <img class="d-block w-100 image_banner" src="<?php echo base_url() . 'image_promotions/' . $arr_promotion[$i]->pro_img_path; ?>">
                                        </div>
                                    <?php } ?>
                                    <?php if ($i != 0) { ?>
                                        <div class="carousel-item image-detail">
                                            <img class="d-block w-100 image_banner" src="<?php echo base_url() . 'image_promotions/' . $arr_promotion[$i]->pro_img_path; ?>">
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                                <br>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>

                        <div class="container">
                            <h3 style="font-family: 'Prompt', sans-serif;"><span class="material-icons" style="font-size: 30px;">description</span>  รายละเอียดโปรโมชัน</h3>
                            <hr width="100%" size="10" color="#cccccc">
                            <p style="font-size: 18px; text-indent: 50px;"><?php echo $arr_promotion[0]->pro_description;?></p>
                           
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-5">
                                    <h3><span class="material-icons" style="font-size: 30px;">credit_score</span>  คะแนนโปรโมชัน</h3>
                                    <hr width="100%" size="10" color="#cccccc">
                                    <p style="font-size: 18px; text-indent: 50px;">คะแนนที่จะต้องใช้แลกโปรโมชัน: <?php echo $arr_promotion[0]->pro_point;?> คะเเนน</p>
                                </div>
                                <div class="col-2"></div>
                                <div class="col-5">
                                    <h3><span class="material-icons" style="font-size: 30px;">category</span>  ประเภท</h3>
                                    <hr width="100%" size="10" color="#cccccc">
                                    <p style="font-size: 18px; text-indent: 50px;">โปรโมชันนี้จัดอยู่ในประเภท: <?php echo $arr_promotion[0]->pro_cat_name;?></p>
                                </div>
                            </div>
                        </div><br><br>
                        <div class="container">
                            <h3><span class="material-icons" style="font-size: 30px;">location_city</span>  <?php echo $arr_promotion[0]->com_name;?></h3>
                            <hr width="100%" size="10" color="#cccccc">
                            <ul>
                                <li><h4>สถานที่ตั้ง: </h4></li>
                                <p style="font-size: 18px; text-indent: 50px;"><?php echo $arr_promotion[0]->com_location;?></p>
                                <li><h4>เบอร์โทรศัพท์: </h4></li>
                                <p style="font-size: 18px; text-indent: 50px;"><?php echo $arr_promotion[0]->com_tel;?></p><br>
                            </ul>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>

