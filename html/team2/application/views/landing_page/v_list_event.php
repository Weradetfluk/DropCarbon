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
    ul.breadcrumb {
        padding: 10px 16px;
        list-style: none;
    }

    ul.breadcrumb li {
        display: inline;
        font-size: 18px;
    }

    ul.breadcrumb li+li:before {
        padding: 8px;
        color: black;
        content: ">";
    }

    ul.breadcrumb li a {
        color: #0275d8;
        text-decoration: none;
    }

    ul.breadcrumb li a:hover {
        color: #01447e;
        text-decoration: underline;
    }
</style>
<title>List Event</title>
<div class="bg-white">
    <section>
        <div class="container py-5">
        <ul class="breadcrumb">
            <?php if($this->session->userdata("tourist_id")){?>
                <li><a href="<?php echo base_url().'Tourist/Auth/Landing_page_tourist'?>" style="color: green;">หน้าหลัก</a></li>
            <?php }?>
            <?php if(!$this->session->userdata("tourist_id")){?>
                <li><a href="<?php echo base_url() ?>" style="color: green;">หน้าหลัก</a></li>
            <?php }?>
            <li>ดูรายการกิจกรรม</li>
        </ul> 
           <div class="row text-left py-3">
                <div class="m-auto">
                    <h1 class="h1" style="padding-bottom: 2%">กิจกรรมทั้งหมด</h1>
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
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-custom">ค้นหา</button>
                    </div>
                </div>
            </form>


            <div class="row">
                <?php for ($i = 0; $i < count($event); $i++) { ?>
                    <div class="col-12 col-md-4 mb-4">
                        <div class="card h-100" id="card">
                            <a href="<?php echo base_url() . 'Landing_page/Landing_page/show_event_detail/' . $event[$i]->eve_id; ?>">
                                <img src="<?php echo base_url() . 'image_event/' . $event[$i]->eve_img_path; ?>" class="card-img-top" style="height: 300px;" alt="...">
                                <!-- รูปที่ 1 -->
                                <div class="card-body" align="center">
                                    <h3 class="text-decoration-none text-dark"><?php echo $event[$i]->eve_name ?></h3>
                                    <p class="card-text"><?php echo iconv_substr($event[$i]->eve_description, 0, 120, "UTF-8") . "..."; ?></p>
                                </div>
                                <!-- ชื่อของรูปที่ 1 -->
                            </a>
                        </div>
                    </div>
                    <!-- กิจกรรมที่ 1 -->
                <?php } ?>
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