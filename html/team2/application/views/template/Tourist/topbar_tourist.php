<!-- Make by : Naaka Punparich 62160082 -->
<nav class="nav-bottom-shadow">
    <ul class="menu">
        <li class="logo">
            <a class="a" href="<?php echo site_url() . 'Landing_page/Landing_page'; ?>">
                <img src="<?php echo base_url() . 'assets/templete/picture/./Logo-web.png' ?>" style="max-width:400px; height: 50px; margin-top: -4px; margin-left: -70px;">
            </a>
        </li>
        <li class="item">
            <a class="a" href="<?php echo base_url() . 'Landing_page/Select_login' ?>">
                <h4 class="h4"><i class="material-icons">person</i> เข้าสู่ระบบ</h4>
            </a>
        </li>
        <li class="item">
            <a class="a" href="<?php echo base_url() . 'Landing_page/Select_register' ?>">
                <h4 class="h4"><i class="material-icons">person_add_alt_1</i> สมัครสมาชิก</h4>
            </a>
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