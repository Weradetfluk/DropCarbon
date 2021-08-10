<?php 
//  if (!$this->session->has_userdata("username")) {
//      $path = site_url() . "AdminLogin/Login_admin";
//      header("Location: " . $path);
//      exit();
//  }
 ?>
 

<div class="wrapper ">
    <div class="sidebar" data-image="<?php echo base_url().'assets/templete/material-dashboard-master'?>/assets/img/sidebar-1.jpg">
    <div class="logo text-center text-white " style="background-color: #5F9EA0; height: 82px;">
      <h5 style=" margin-top:10px;">DropCarbonSystem</h5>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item  ">
            <a class="nav-link" href="#">
              <i class="material-icons">dashboard</i>
              <p>จัดการสถานที่</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="#">
              <i class="material-icons">person</i>
              <p>จัดการกิจกรรม</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="#">
              <i class="material-icons">bubble_chart</i>
              <p>จัดการโปรโมชัน</p>
            </a>
          </li>        
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top bg-light">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">Drop Carbon System</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <?php echo $this->session->userdata("Entrepreneur_name"); ?>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="<?php echo site_url().'Entrepreneur/Manage_entrepreneur/Entrepreneur_edit/show_edit_entrepreneur'?>">แก้ไขข้อมูลส่วนตัว</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="<?php echo base_url() . 'Entrepreneur/Auth/Login_entrepreneur' ?>">ออกจากระบบ</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>



