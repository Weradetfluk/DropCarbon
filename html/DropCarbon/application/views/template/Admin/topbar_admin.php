<?php 
 if (!$this->session->has_userdata("username")) {
     $path = site_url() . "Admin/Login_admin";
     header("Location: " . $path);
     exit();
 }
 ?>
 

<div class="wrapper ">
    <div class="sidebar" data-image="<?php echo base_url().'assets/templete/material-dashboard-master'?>/assets/img/sidebar-1.jpg">
    <div class="logo text-center text-white" style="background-color: #60839f;">
          ผู้ดูแลระบบ
        </a></div>
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
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="material-icons">content_paste</i>
              <p>จัดการผู้ประกอบการ</p>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="material-icons">library_books</i>
              <p>จัดการนักท่องเที่ยว</p>
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
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">DropCarbonSystem</a>
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
                  <?php echo $this->session->userdata("Admin_name"); ?>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">     
                  <a class="dropdown-item"  href="<?php echo base_url() . 'AdminLogin/Login_admin/logout' ?>">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>

