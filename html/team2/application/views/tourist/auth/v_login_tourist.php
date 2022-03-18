<!-- 
/*
* v_login_tourist
* Display from login tourist
* @input -
* @output from login tourist
* @author Jutamas Thaptong 62160079
* @Create Date 2564-08-05
*/ 
-->

<?php
//check world warnning == username หรือ password incorrect
$warning = $warning ?? '';
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
                    <form action="<?php echo site_url() . 'Tourist/Auth/Login_tourist/input_login_form'; ?>" method="POST">
                        <div class="card-header text-center" style="background-color: #5F9EA0;">
                            <h4 class="card-title text-white" style="font-family: 'Prompt', sans-serif !important;">ลงชื่อเข้าใช้นักท่องเที่ยว</h4>
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
                                        <button type="submit" class="btn btn-success" id="signin" name="signin">เข้าสู่ระบบ</button><br><br>
                                        <a href="<?php echo site_url() . 'Tourist/Auth/Login_tourist/forgot_password_page'; ?>" style="color: #5F9EA0;">ลืมรหัสผ่าน</a>
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
        let reset_pass = '<?php echo $this->session->userdata("reset_pass_tourist"); ?>';
        //ประกาศตัวแปร reset_pass
        if (reset_pass == "success") {
            swal("สำเร็จ", "คุณทำการเปลี่ยนรหัสผ่านสำเร็จ", "success");
            <?php echo $this->session->unset_userdata("reset_pass_tourist"); ?>
        }
    });
</script>