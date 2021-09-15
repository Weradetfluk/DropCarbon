<!-- Make by : Naaka Punparich 62160082 -->

<style>
    .container-fluid {
        margin-top: 8px;
        margin-left: 20px;
    }

    #buttonfix {
        width: unset;
        box-shadow: unset;
    }

    @media screen and (max-width: 400px) {
        .container-fluid {
            margin-left: 1px;
        }
    }
</style>



<!-- Open topbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow">
    <div class="container-fluid">
        <!-- topbar left -->
        <a class="navbar-brand" href="<?php echo site_url() . 'Landing_page/Register/Landing_page'; ?>">
            <img src="<?php echo base_url() . 'assets/templete/picture/./Logo-web.png' ?>" style="max-width:400px; height: 50px; margin-top: -10px; margin-left: -40px;">
        </a>

        <button id="buttonfix" class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- topbar right -->
        <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
            <div class="flex-fill">
                <ul class="nav d-flex justify-content-end mx-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url() . 'Landing_page/Register/Select_login' ?>"><i class="fas fa-user"></i> เข้าสู่ระบบ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url() . 'Landing_page/Register/Select_register' ?>"><i class="fas fa-user-plus"></i> สมัครสมาชิก</a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</nav>
<!-- Close topbar -->