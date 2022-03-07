
<!-- 
/*
* v_login_admin
* Display form login
* @input -
* @output  form login
* @author weradet nopsombun 62160110
* @Create Date 2564-07-17
*/ 
-->
<?php
$warning = $warning ?? ''; //check world warnning == username หรือ password incorrect
?>
<!-- navbar -->

<nav class="navbar navbar-expand-lg navbar-absolute fixed-top bg-light ">
    <a href="<?php echo site_url()?>" class="navbar-brand">
        <img src="<?php echo base_url() . 'assets/templete/picture/./Logo-web.png' ?>" style="max-width:400px; height: 50px; margin-top: -10px;">
    </a>
</nav>




<div class="page-header header-filter" style="background-image: url('<?php echo base_url() . 'assets/templete' ?>/picture/login-img.jpeg');   background-repeat: no-repeat;   background-size: cover;">
    <div class="container" style="margin-top: 200px; ">
        <div class="row">
            <div class="col-lg-5 col-md-6 ml-auto mr-auto">
                <div class="card card-login">
                    <form class="form" action="<?php echo site_url() . 'Admin/Auth/Login_admin/input_login_form'; ?>" method="POST">
                        <div class="card-header text-center" style="background-color: #5F9EA0;">
                            <h4 class="card-title text-white" style="font-family: 'Prompt', sans-serif !important;">ลงชื่อเข้าใช้ของผู้ดูแลระบบ</h4>

                        </div>

                        <div class="card-body">
                            <span class="bmd-form-group">
                                <div class="input-group" style="padding: 10px;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">face</i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="ชื่อผู้ใช้" name="username" required>
                                </div>
                            </span>
                            <div class="input-group" style="padding: 10px;">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">lock_outline</i>
                                    </span>
                                </div>
                                <input type="password" class="form-control" placeholder="รหัสผ่าน" name="password" required>
                            </div></span>
                            <span style="color: red; margin-left: 30px;">
                                <?php
                                if ($warning != NULL) {
                                    echo $warning;
                                }
                                ?>
                            </span>
                        </div>
                        <div class="footer" style="text-align: center;">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <button type="submit" class="btn btn-success" id="signin" name="signin">เข้าสู่ระบบ</button>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col">
                                        <a href="<?php echo site_url() . 'Admin/Auth/Login_admin/forgot_password_page'; ?>" style="color: #5F9EA0;">ลืมรหัสผ่านใช่หรือไม่</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>