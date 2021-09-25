<!-- 
/*
* v_login_entrepreneur
* Display form login entrepreneur
* @input username, password
* @output form login entrepreneur
* @author Suwapat Saowarod 62160340
* @Create Date 2021-07-19
*/ 
-->

<?php
$warning = $warning ?? ''; //check world warnning == username หรือ password incorrect
?>

<!-- navbar -->

<nav class="navbar navbar-expand-lg navbar-absolute fixed-top bg-light ">
    <a href="<?php echo site_url(); ?>" class="navbar-brand">
        <img src="<?php echo base_url() . 'assets/templete/picture/./Logo-web.png' ?>" style="max-width:400px; height: 50px; margin-top: -10px;">
    </a>
</nav>

<div class="page-header header-filter" style="background-image: url('<?php echo base_url() . 'assets/templete' ?>/picture/login-img.jpeg');   background-repeat: no-repeat;   background-size: cover;">
    <div class="container" style="margin-top: 200px; ">
        <div class="row">
            <div class="col-lg-5 col-md-6 ml-auto mr-auto">
                <div class="card card-login">
                    <form action="<?php echo site_url() . 'Entrepreneur/Auth/Login_entrepreneur/input_login_form'; ?>" method="POST">
                        <div class="card-header text-center" style="background-color: #5F9EA0;">
                            <h4 class="card-title text-white" style="font-family: 'Prompt', sans-serif !important;">ลงชื่อเข้าใช้ผู้ประกอบการ</h4>
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
                            <span class="bmd-form-group">
                                <div class="input-group" style="padding: 10px;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">lock_outline</i>
                                        </span>
                                    </div>
                                    <input type="password" class="form-control" placeholder="รหัสผ่าน" name="password" required>
                                </div>
                            </span>
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
                                        <a href="<?php echo site_url() . 'Entrepreneur/Auth/Login_entrepreneur/forgot_password_page'; ?>" style="color: #5F9EA0;">ลืมรหัสผ่าน</a>
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

<script>
$(document).ready(function() {
    let warning_login = '<?php echo $this->session->userdata("login_entrepreneur"); ?>';
    if (warning_login == 'warning') {
        swal("ล็อกอินไม่สำเร็จ", "เนื่องจากคุณกำลังรอการอนุมัติจากผู้ดูเเลระบบ", "warning");
        <?php echo $this->session->unset_userdata("login_entrepreneur"); ?>
    }
    let reset_pass = '<?php echo $this->session->userdata("reset_pass_entrepreneur"); ?>';
    if (reset_pass == "success") {
        swal("สำเร็จ", "คุณทำการเปลี่ยนรหัสผ่านสำเร็จ", "success");
        <?php echo $this->session->unset_userdata("reset_pass_entrepreneur"); ?>
    }
});
</script>