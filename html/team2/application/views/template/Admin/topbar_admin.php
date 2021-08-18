<?php

// check session

if (!$this->session->has_userdata("username")) {
  $path = site_url() . "Admin/Auth/Login_admin";
  header("Location: " . $path);
  exit();
}

if (!isset($_SESSION['tab_number'])) {
  $_SESSION['tab_number'] = 1;
}

?>



<style>
  .table-responsive::-webkit-scrollbar {
    -webkit-appearance: none;
  }

  .table-responsive::-webkit-scrollbar:vertical {
    width: 12px;
  }

  .table-responsive::-webkit-scrollbar:horizontal {
    height: 12px;
  }

  .table-responsive::-webkit-scrollbar-thumb {
    background-color: rgba(0, 0, 0, .5);
    border-radius: 10px;
    border: 2px solid #ffffff;
  }

  .table-responsive::-webkit-scrollbar-track {
    border-radius: 10px;
    background-color: #ffffff;
  }

  .navbar {
    background-color: red;
  }
</style>

<!--  side bar -->





<div class="wrapper ">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-absolute fixed-top bg-light">
    <div class="container-fluid">

      <a href="#" class="navbar-brand">
        <img src="<?php echo base_url() . 'assets/templete/picture/./2-3.png' ?>" style="max-width:300px; height: 150px; margin-top: -60px;">
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
        <li class="nav-item  <?php if ($_SESSION['tab_number'] == 1) echo "active"; ?>" onclick="change_tab_number(1);" id="home">
          <a class="nav-link" href="<?php echo base_url() . 'Admin/Manage_company/Admin_approval_company/show_data_consider' ?> " onclick="change_tab_number(1);">
            <i class="material-icons">dashboard</i>
            <p>จัดการสถานที่</p>
          </a>
        </li>
        <li class="nav-item  <?php if ($_SESSION['tab_number'] == 2) echo "active"; ?>" onclick="change_tab_number(2);">
          <a class="nav-link" href="#">
            <i class="material-icons">library_books</i>
            <p>จัดการกิจกรรม</p>
          </a>
        </li>
        <li class="nav-item  <?php if ($_SESSION['tab_number'] == 3) echo "active"; ?>" onclick="change_tab_number(3);">
          <a class="nav-link" href="<?php echo base_url() . 'Admin/Manage_entrepreneur/Admin_approval_entrepreneur/show_data_consider' ?> "onclick="change_tab_number(3);">
            <i class="material-icons">content_paste</i>
            <p>จัดการผู้ประกอบการ</p>
          </a>
        </li>

        <li class="nav-item  <?php if ($_SESSION['tab_number'] == 4) echo "active"; ?> " onclick="change_tab_number(4);">
          <a class="nav-link" href="<?php echo base_url() . 'Admin/Manage_tourist/Admin_list_tourist/show_data_tourist' ?> ">
            <i class="material-icons">content_paste</i>
            <p>จัดการนักท่องเที่ยว</p>
          </a>
        </li>
        <li class="nav-item  <?php if ($_SESSION['tab_number'] == 5) echo "active"; ?>" onclick="change_tab_number(5);">
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


    <script>
      function change_tab_number(tab_val) {
        $.ajax({
          url: '../../../DCS_controller/change_tab_number_ajax',
          method: 'POST',
          data: {
            tab: tab_val
          }
        });
      }

     
    </script>