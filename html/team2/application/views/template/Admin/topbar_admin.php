<?php

// check session

if (!$this->session->has_userdata("Admin_name")) {
  $path = site_url() . "Admin/Auth/Login_admin";
  header("Location: " . $path);
  exit();
}


?>




<div class="wrapper ">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-absolute fixed-top bg-light" style="position: fixed;">
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
            <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="material-icons">person</i>
              <?php echo $this->session->userdata("Admin_name"); ?>
              <p class="d-lg-none d-md-block">
                Account
              </p>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
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
        <li class="nav-item  <?php if ($_SESSION['tab_number'] == 1) echo "active"; ?>" id="home">
          <a class="nav-link" href="<?php echo base_url() . 'Admin/Manage_company/Admin_approval_company' ?>">
            <i class="material-icons">dashboard</i>
            <p>จัดการสถานที่</p>
          </a>
        </li>
        <li class="nav-item  <?php if ($_SESSION['tab_number'] == 2) echo "active"; ?>">
          <a class="nav-link" href="#">
            <i class="material-icons">library_books</i>
            <p>จัดการกิจกรรม</p>
          </a>
        </li>
        <li class="nav-item   <?php if ($_SESSION['tab_number'] == 3) echo "active"; ?>" id="ent_menu">
          <a class="nav-link" href="<?php echo base_url() . 'Admin/Manage_entrepreneur/Admin_approval_entrepreneur/show_data_consider' ?>">
            <i class="material-icons">content_paste</i>
            <p>จัดการผู้ประกอบการ</p>
          </a>
        </li>

        <li class="nav-item  <?php if ($_SESSION['tab_number'] == 4) echo "active"; ?>">
          <a class="nav-link" href="<?php echo base_url() . 'Admin/Manage_tourist/Admin_list_tourist/show_data_tourist' ?> ">
            <i class="material-icons">content_paste</i>
            <p>จัดการนักท่องเที่ยว</p>
          </a>
        </li>
        <li class="nav-item  <?php if ($_SESSION['tab_number'] == 5) echo "active"; ?>">
          <a class="nav-link" href="#">
            <i class="material-icons">bubble_chart</i>
            <p>จัดการโปรโมชัน</p>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="<?php echo base_url() . 'Admin/Auth/Login_admin/logout' ?>">
            <i class="material-icons">person</i>
            <p>ออกจากระบบ</p>
          </a>
        </li>
      </ul>
    </div>
  </div>
  <div class="main-panel">

