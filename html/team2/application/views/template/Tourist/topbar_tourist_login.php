<!-- Make by : Naaka Punparich 62160082 -->

<!-- Open topbar -->

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-absolute fixed-top bg-light" style="position: fixed;">
    <div class="container-fluid">

        <a href="<?php echo site_url() . 'Tourist/Auth/Landing_page_tourist'; ?>" class="navbar-brand">
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
                    <a class="nav-link" href="#"><span class="material-icons">monetization_on</span> คะแนน</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">person</i>
                        <?php echo $this->session->userdata("Tourist_name"); ?>
                        <p class="d-lg-none d-md-block">
                            Account
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                    <a class="dropdown-item" href="<?php echo base_url() . 'Tourist/Manage_tourist/Tourist_manage/show_information_tourist' ?>"><span class="material-icons">person</span> ข้อมูลส่วนตัว</a>
                        <a class="dropdown-item" href="<?php echo base_url() . 'Tourist/Manage_tourist/Tourist_manage/show_edit_tourist' ?>"><span class="material-icons">manage_accounts</span> แก้ไขข้อมูลส่วนตัว</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo base_url() . 'Tourist/Auth/Login_tourist/logout' ?>"><span class="material-icons">logout</span> ออกจากระบบ</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Close topbar -->