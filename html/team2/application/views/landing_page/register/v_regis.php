<!DOCTYPE html>
<html>

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    h2 {
        padding-top: 2%;
        padding-bottom: 5%;
        font-size: 70px;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.685);
        font-weight: bold;
    }

    #card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
    }

    #card:hover {
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        transform: scale(1.05);
    }

    a {
        text-decoration: none;
    }


    body,
    html {
        height: 100%;
        margin: 0;
    }

    .bg {
        /* The image used */
        background-image: url("<?php echo base_url() . 'assets/templete/picture' ?>/./BG.jpg");

        /* Full height */
        height: 90.4%;

        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    img {
        height: 250px;
    }

    #card:hover h1 {
        color: white;
    }

    ul.breadcrumb {
        padding: 10px 16px;
        list-style: none;
        background-color: #eee;
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

<body>
    <div class="bg">
        <div class="container py-5">

            <ul class="breadcrumb">
                <li><a href="<?php echo site_url() . 'Landing_page/Register/Landing_page'; ?>" style="color: green;">หน้าหลัก</a></li>
                <li>สมัครสมาชิก</li>
            </ul>

            <h2 align="center">Drop Carbon System</h2>
            <div class="row">
                <div class="col">
                    <div class="card" id="card">
                        <a href=" <?php echo site_url() . 'Tourist/Auth/Register_tourist/show_regis_tourist'; ?>">
                            <div class="py-3 services-icon-wap shadow">
                                <div class="h1 text-success text-center">
                                    <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./Tourist.png">
                                    <h1 class="h2 mt-4 text-center">สำหรับนักท่องเที่ยว</h1>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="card" id="card">
                        <a href=" <?php echo site_url() . 'Entrepreneur/Auth/Register_entrepreneur/show_regis_ent'; ?>">
                            <div class="py-3 services-icon-wap shadow">
                                <div class="h1 text-success text-center">
                                    <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./Entrepreneur.png">
                                    <h1 class="h2 mt-4 text-center">สำหรับผู้ประกอบการ</h1>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>