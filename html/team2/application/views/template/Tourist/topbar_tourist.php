<!-- Make by : Naaka Punparich 62160082 -->

<style>
    nav {
        background: #fff;
        padding: 0px 10px;
        position: fixed;
        width: 100%;
        z-index: 999;
        margin-top: -3%;
    }

    ul {
        list-style-type: none;
        margin-bottom: 0rem;
    }

    .h4 {
        padding-top: 10px;
    }

    .a {
        color: black;
        text-decoration: none !important;
    }

    a:hover {
        text-decoration: underline;
    }

    .logo a:hover {
        text-decoration: none;
    }

    .menu li {
        font-size: 16px;
        padding: 15px 5px;
        white-space: nowrap;
    }

    .logo a,
    .toggle a {
        font-size: 20px;
    }

    /* Mobile Menu */

    .menu {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
    }

    .toggle {
        order: 1;
    }

    .item {
        width: 100%;
        text-align: center;
        order: 2;
        display: none;
    }

    .item.active {
        display: block;
    }

    /* Tablet Menu */

    @media all and (min-width: 768px) {
        .menu {
            justify-content: center;
        }

        .logo {
            flex: 1;
        }

        .toggle {
            flex: 1;
            text-align: center;
            order: 2;
        }
    }

    /* Desktop Menu */

    @media all and (min-width: 900px) {
        .item {
            display: block;
            width: auto;
        }

        .toggle {
            display: none;
        }

        .logo {
            order: 0;
        }

        .item {
            order: 1;
        }

        .menu li {
            padding: 15px 10px;
        }
    }
</style>

<nav>
    <ul class="menu">
        <li class="logo">
            <a class="a" href="<?php echo site_url() . 'Landing_page/Landing_page'; ?>">
                <img src="<?php echo base_url() . 'assets/templete/picture/./Logo-web.png' ?>" style="max-width:400px; height: 50px; margin-top: -4px; margin-left: -70px;">
            </a>
        </li>
        <li class="item active">
            <a class="a" href="<?php echo base_url() . 'Landing_page/Select_login' ?>">
                <h4 class="h4"><i class="material-icons">person</i> เข้าสู่ระบบ</h4>
            </a>
        </li>
        <li class="item active">
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