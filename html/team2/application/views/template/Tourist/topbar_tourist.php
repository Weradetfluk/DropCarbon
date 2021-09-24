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
        <a class="navbar-brand" href="<?php echo base_url() . 'Landing_page/Landing_page'; ?>">
            <img src="<?php echo base_url() . 'assets/templete/picture/./Logo-web.png' ?>" style="max-width:400px; height: 50px; margin-top: -10px; margin-left: -40px;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

        <!-- topbar right -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="flex-fill">
                <ul class="nav d-flex justify-content-end mx-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url() . 'Landing_page/Select_login' ?>"><i class="fas fa-user"></i> เข้าสู่ระบบ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url() . 'Landing_page/Select_register' ?>"><i class="fas fa-user-plus"></i> สมัครสมาชิก</a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</nav>
<!-- Close topbar -->