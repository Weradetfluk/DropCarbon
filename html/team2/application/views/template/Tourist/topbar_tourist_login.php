<!-- Make by : Naaka Punparich 62160082 -->

<!-- Open topbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow">
    <div class="container-fluid" style="margin-bottom: -2%;">

        <a class="navbar-brand" href="<?php echo site_url() . 'Landing_page_tourist/Landing_page_tourist'; ?>">
            <img src="<?php echo base_url() . 'assets/templete/picture/./2-3.png' ?>" style="max-width:300px; height: 150px; margin-top: -45px;">
        </a>

        <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
            <div class="flex-fill">
                <ul class="nav d-flex justify-content-end mx-lg-auto " style="margin-top: -40px;">
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