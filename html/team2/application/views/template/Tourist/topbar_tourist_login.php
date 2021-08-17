<!-- Make by : Naaka Punparich 62160082 -->

<!-- Open topbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow">
    <div class="container d-flex justify-content-between align-items-center">

        <a class="navbar-brand text-success logo h1 align-self-center" href="<?php echo site_url() . 'Landing_page_tourist/Landing_page_tourist'; ?>">
            Logo
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
            <div class="flex-fill">
                <ul class="nav d-flex justify-content-end mx-lg-auto ">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url() . 'Tourist/Event_tourist/Tourist_event/show_tourist_eventlist' ?>">กิจกรรมของคุณ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">My reward</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Point</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link " data-bs-toggle="dropdown" aria-expanded="false" href="#"><i class="far fa-user-circle"></i> <?php echo $this->session->userdata("Tourist_name"); ?></a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php echo base_url() . 'Tourist/Manage_tourist/tourist_edit/show_edit_tourist' ?>">แก้ไขข้อมูลส่วนตัว</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo base_url() . 'Tourist/Auth/Login_tourist/logout' ?>">ออกจากระบบ</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- Close topbar -->