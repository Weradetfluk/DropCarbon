<!-- Make by : Naaka Punparich 62160082 -->

<!-- Open topbar -->

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-absolute fixed-top bg-light" style="position: sticky;">
    <div class="container-fluid">

        <a href="<?php echo site_url() . 'Landing_page/Landing_page'; ?>" class="navbar-brand">
            <img src="<?php echo base_url() . 'assets/templete/picture/./Logo-web.png' ?>" style="max-width:400px; height: 50px; margin-top: -10px; margin-left: -40px;">
        </a>

        <!-- nav with responesive -->

        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav nav-moblie-menu">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() . 'Landing_page/Select_login' ?>"><h4><i class="material-icons">person</i> เข้าสู่ระบบ</h4></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() . 'Landing_page/Select_register' ?>"><h4><i class="material-icons">person_add_alt_1</i> สมัครสมาชิก</h4></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Close topbar -->