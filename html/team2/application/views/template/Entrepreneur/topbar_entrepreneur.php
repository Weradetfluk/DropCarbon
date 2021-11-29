<?php 
 if (!$this->session->has_userdata("entrepreneur_name")) {
     $path = site_url() . "Entrepreneur/Auth/Login_entrepreneur";
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
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="" id="navbar_dropdown_profile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <?php echo $this->session->userdata("entrepreneur_name"); ?>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar_dropdown_profile">
                  <button class="dropdown-item" onclick="location.href='<?php echo site_url().'Entrepreneur/Manage_entrepreneur/Entrepreneur_edit/show_edit_entrepreneur'?>'">แก้ไขข้อมูลส่วนตัว</button>
                  <div class="dropdown-divider"></div>
                  <button class="dropdown-item" onclick="location.href='<?php echo base_url() . 'Entrepreneur/Auth/Login_entrepreneur/logout'?>'">ออกจากระบบ</button>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>


    <div class="sidebar" data-color="green" data-image="<?php echo base_url().'assets/templete/material-dashboard-master'?>/assets/img/sidebar-1.jpg">
   
      <div class="sidebar-wrapper" style="margin-top: 70px;">
        <ul class="nav">
          <li class="nav-item  <?php if ($_SESSION['tab_number_entrepreneur'] == 1) echo "active"; ?>">
            <a class="nav-link <?php if ($_SESSION['tab_number_entrepreneur'] == 1) echo "custom-a"; ?>" href="<?php echo site_url().'Entrepreneur/Manage_company/Company_list/show_list_company';?>">
              <h5 class="h5-topbar"><i class="material-icons">store</i> จัดการสถานที่</h5>
            </a>
          </li>
          <li class="nav-item <?php if ($_SESSION['tab_number_entrepreneur'] == 2) echo "active"; ?>">
            <a class="nav-link <?php if ($_SESSION['tab_number_entrepreneur'] == 2) echo "custom-a"; ?>" href="<?php echo site_url().'Entrepreneur/Manage_event/Event_list/show_list_event';?>">
              <i class="material-icons">calendar_today</i>
              <h5 class="h5-topbar">จัดการกิจกรรม</h5>
            </a>
          </li>
          <li class="nav-item  <?php if ($_SESSION['tab_number_entrepreneur'] == 3) echo "active"; ?>">
            <a class="nav-link <?php if ($_SESSION['tab_number_entrepreneur'] == 3) echo "custom-a"; ?>" href="<?php echo site_url().'Entrepreneur/Manage_promotion/Promotion_list/show_list_promotion';?>">
              <i class="material-icons">point_of_sale</i>
              <h5 class="h5-topbar">จัดการโปรโมชัน</h5>
            </a>
          </li>
          <li class="nav-item  <?php if ($_SESSION['tab_number_entrepreneur'] == 4) echo "active"; ?>" >
            <a class="nav-link <?php if ($_SESSION['tab_number_entrepreneur'] == 4) echo "custom-a"; ?>" href="<?php echo site_url().'Entrepreneur/Manage_entrepreneur/Entrepreneur_edit/show_edit_entrepreneur'?>">
              <i class="material-icons">manage_accounts</i>
              <h5 class="h5-topbar">แก้ไขข้อมูลส่วนตัว</h5>
            </a>
          </li>     
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url() . 'Entrepreneur/Auth/Login_entrepreneur/logout'?>">
              <i class="material-icons">logout</i>
              <h5 class="h5-topbar">ออกจากระบบ</h5>
            </a>
          </li>   
        </ul>
      </div>
    </div>
    <div class="main-panel">
      



