<!-- Make by : Naaka Punparich 62160082 -->
<?php

// check session

if (!$this->session->has_userdata("tus_score")) {
  $path = site_url() . "Tourist/Auth/Login_tourist";
  header("Location: " . $path);
  exit();
}

?>
<nav>
    <ul class="menu">
        <li class="logo">
            <a class="a" href="<?php echo site_url() . 'Tourist/Auth/Landing_page_tourist'; ?>">
                <img src="<?php echo base_url() . 'assets/templete/picture/./Logo-web.png' ?>" style="max-width:400px; height: 50px; margin-top: -4px; margin-left: -70px;">
            </a>
        </li>
        <li class="item">
            <a href="#">
                <h4 style="display: inline;"><?php echo $this->session->userdata("tus_score"); ?></h4> คะแนน
            </a>
        </li>
        <li class="item">
            <a class="nav-link" href="javascript;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons">person</i>
                <?php echo $this->session->userdata("Tourist_name"); ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                <a class="dropdown-item" href="<?php echo base_url() . 'Tourist/Manage_tourist/Tourist_manage/show_information_tourist' ?>"><span class="material-icons">person</span> ข้อมูลส่วนตัว</a>
                <a class="dropdown-item" href="<?php echo base_url() . 'Tourist/Manage_tourist/Tourist_manage/show_edit_tourist' ?>"><span class="material-icons">manage_accounts</span> แก้ไขข้อมูลส่วนตัว</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url() . 'Tourist/Auth/Login_tourist/logout' ?>"><span class="material-icons">logout</span> ออกจากระบบ</a>
            </div>
        </li>
        <li class="toggle">
            <a class="a" href="#">
                <span class="material-icons" style="color: #000;">
                    menu
                </span>
            </a>
        </li>
    </ul>
</nav>

<script>
    $(function() {
        $('.toggle').on("click", function() {
            if ($(".item").hasClass("active")) {
                $(".item").removeClass("active");
                $(this).find("a").html("<span class='material-icons' style='color: #000;'>menu</span>");
            } else {
                $(".item").addClass("active");
                $(this).find("a").html("<span class='material-icons' style='color: #000;'>close</span>");
            }
        });
    });
</script>