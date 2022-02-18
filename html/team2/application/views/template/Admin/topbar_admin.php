<?php

// check session

if (!$this->session->has_userdata("admin_name")) {
    $path = site_url() . "Admin/Auth/Login_admin";
    header("Location: " . $path);
    exit();
}

if (!isset($_SESSION['tab_number'])) {
    $_SESSION['tab_number'] = 1;
}

?>


<style>
    ul {
        list-style-type: none;
    }
</style>

<div class="wrapper ">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-absolute bg-light" style="position: fixed;">
        <div class="container-fluid">

            <a href="#" class="navbar-brand">
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
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="javascript:;" id="navbar_dropdown_profile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">person</i>
                            <?php echo $this->session->userdata("admin_name"); ?>

                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar_dropdown_profile">
                            <a class="dropdown-item" href="<?php echo base_url() . 'Admin/Auth/Login_admin/logout' ?>">ออกจากระบบ</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- side bar admin -->

    <div class="sidebar" data-color="green" data-image="<?php echo base_url() . 'assets/templete/material-dashboard-master' ?>/assets/img/sidebar-1.jpg">
        <div class="sidebar-wrapper" style="margin-top: 70px;">
            <ul class="nav" id="active_menu">
                <li class="nav-item <?php if ($_SESSION['tab_number'] == 1) echo "active"; ?>">
                    <a class="nav-link <?php if ($_SESSION['tab_number'] == 1) echo "custom-a"; ?>" href="<?php echo base_url() . 'Admin/Manage_dashboard/Admin_view_dashboard' ?>">
                        <i class="material-icons">dashboard</i>
                        <h5 class="h5-topbar">dashboard</h5>
                    </a>
                </li>
                <li class="nav-item <?php if ($_SESSION['tab_number'] == 2) echo "active custom-a"; ?>">
                    <a class="nav-link  <?php if ($_SESSION['tab_number'] == 2) echo "custom-a"; ?>" href="<?php echo base_url() . 'Admin/Manage_banner/Admin_manage_banner' ?>">
                        <i class="material-icons">view_list</i>
                        <h5 class="h5-topbar">จัดการแบนเนอร์</h5>
                    </a>
                </li>
                <li class="nav-item  <?php if ($_SESSION['tab_number'] == 3) echo "active custom-a"; ?>" id="home">
                    <a class="nav-link  <?php if ($_SESSION['tab_number'] == 3) echo "custom-a"; ?>" href="<?php echo base_url() . 'Admin/Manage_company/Admin_approval_company' ?>">
                        <i class="material-icons">store</i>
                        <h5 class="h5-topbar">จัดการสถานที่</h5>
                    </a>
                </li>

                <!-- Drop down list event menu -->
                <li class="nav-item event_menu <?php if ($_SESSION['tab_number'] == 4 || $_SESSION['tab_number'] == 8) echo "active custom-a"; ?>">
                    <a class="nav-link  <?php if ($_SESSION['tab_number'] == 4 || $_SESSION['tab_number'] == 8) echo "active custom-a"; ?>" href="#" id="eve_menu">
                        <i class="material-icons">calendar_today</i>
                        <h5 class="h5-topbar">จัดการกิจกรรม<i class="material-icons dropdown_sub_menu">expand_more</i>
                        </h5>

                    </a>

                    <ul class="event_sub_menu" id="eve_sub_menu">
                        <li class="nav-item  <?php if ($_SESSION['tab_number'] == 4) echo "active custom-a"; ?>">
                            <a class="nav-link  <?php if ($_SESSION['tab_number'] == 4) echo "custom-a"; ?>" href="<?php echo base_url() . 'Admin/Manage_event/Admin_approval_event/show_data_consider' ?>">
                                <i class="material-icons">calendar_today</i>
                                <h5 class="h5-topbar">อนุมัติกิจกรรม</h5>
                            </a>
                        </li>

                        <li class="nav-item  <?php if ($_SESSION['tab_number'] == 8) echo "active custom-a"; ?>">
                            <a class="nav-link  <?php if ($_SESSION['tab_number'] == 8) echo "custom-a"; ?>" href="<?php echo base_url() . 'Admin/Manage_event/Admin_list_event/show_data_event_list' ?>">
                                <i class="material-icons">calendar_today</i>
                                <h5 class="h5-topbar">เพิ่ม-ลบ กิจกรรม</h5>
                            </a>
                        </li>
                    </ul>

                </li>

                <!-- End Drop down list event menu -->


                <!-- Drop down list promotions menu -->
                <li class="nav-item <?php if ($_SESSION['tab_number'] == 7 || $_SESSION['tab_number'] == 9) echo "active custom-a"; ?>">
                    <a class="nav-link <?php if ($_SESSION['tab_number'] == 7 || $_SESSION['tab_number'] == 9) echo "active custom-a"; ?>" href="#" id="pro_menu">
                        <i class="material-icons">point_of_sale</i>
                        <h5 class="h5-topbar">จัดการโปรโมชัน<i class="material-icons dropdown_sub_menu">expand_more</i>
                        </h5>
                    </a>

                    <ul class="promo_sub_menu" id="pro_sub_menu">
                        <li class="nav-item  <?php if ($_SESSION['tab_number'] == 7) echo "active custom-a"; ?>">
                            <a class="nav-link  <?php if ($_SESSION['tab_number'] == 7) echo "custom-a"; ?>" href="<?php echo base_url() . 'Admin/Manage_promotions/Admin_approval_promotions/show_data_consider' ?> ">
                                <i class="material-icons">point_of_sale</i>
                                <h5 class="h5-topbar">อนุมัติโปรโมชัน</h5>
                            </a>
                        </li>

                        <li class="nav-item  <?php if ($_SESSION['tab_number'] == 9) echo "active custom-a"; ?>">
                            <a class="nav-link  <?php if ($_SESSION['tab_number'] == 9) echo "custom-a"; ?>" href="<?php echo base_url() . 'Admin/Manage_promotions/Admin_list_promotions/show_data_promotions_list' ?>">
                                <i class="material-icons">calendar_today</i>
                                <h5 class="h5-topbar">เพิ่ม-ลบ โปรโมชัน</h5>
                            </a>
                        </li>
                    </ul>
                </li>
                <hr>

                <!-- End Drop down list promotions menu -->

                <li class="nav-item   <?php if ($_SESSION['tab_number'] == 5) echo "active custom-a"; ?>" id="ent_menu">
                    <a class="nav-link  <?php if ($_SESSION['tab_number'] == 5) echo "custom-a"; ?>" href="<?php echo base_url() . 'Admin/Manage_entrepreneur/Admin_approval_entrepreneur' ?>">
                        <i class="material-icons">assignment_ind</i>
                        <h5 class="h5-topbar">จัดการผู้ประกอบการ</h5>
                    </a>
                </li>


                <li class="nav-item  <?php if ($_SESSION['tab_number'] == 6) echo "active custom-a"; ?>" id="tus_menu">
                    <a class="nav-link  <?php if ($_SESSION['tab_number'] == 6) echo "custom-a"; ?>" href="<?php echo base_url() . 'Admin/Manage_tourist/Admin_list_tourist/show_data_tourist' ?> ">
                        <i class="material-icons">perm_identity</i>
                        <h5 class="h5-topbar">จัดการนักท่องเที่ยว</h5>
                    </a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link" href="<?php echo base_url() . 'Admin/Auth/Login_admin/logout' ?>">
                        <i class="material-icons">logout</i>
                        <h5 class="h5-topbar">ออกจากระบบ</h5>
                    </a>
                </li>
            </ul>
        </div>
    </div>


    <style>
        .sidebar .nav .dropdown_sub_menu {
            position: absolute;
            right: 0;
        }

        .sidebar .nav .event_sub_menu {
            display: none;
        }

        .sidebar .nav .promo_sub_menu {
            display: none;
        }
    </style>

    <div class="main-panel">