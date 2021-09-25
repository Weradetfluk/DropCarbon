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
        <a class="navbar-brand" href="<?php echo site_url() . 'Tourist/Auth/Landing_page_tourist'; ?>">
            <img src="<?php echo base_url() . 'assets/templete/picture/./Logo-web.png' ?>" style="max-width:400px; height: 50px; margin-top: -10px; margin-left: -40px;">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

        <!-- topbar right -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent"" id="templatemo_main_nav">
            <div class="flex-fill">
                <ul class="nav d-flex justify-content-end mx-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url() . 'Tourist/Event_tourist/Tourist_event/show_event_list_tourist' ?>"><i class="fas fa-th-list"></i> กิจกรรมของฉัน</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-archive"></i> รางวัลของฉัน</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa-money"></i> คะแนน</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-user-circle"></i> <?php echo $this->session->userdata("Tourist_name"); ?></a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
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