<?php
$warning = $warning ?? ''; //check world warnning == username หรือ password incorrect
?>



<!-- navbar -->

<nav class="navbar navbar-expand-lg navbar-absolute fixed-top bg-light ">
        <a href="" class="navbar-brand">
        <img src="<?php echo base_url() . 'assets/templete/picture/./2-3.png' ?>"  style="max-width:300px; height: 150px; margin-top: -60px;">
        </a>
</nav>




<div class="page-header header-filter bg-light" >
    <div class="container" style="margin-top: 200px; ">
        <div class="row">
            <div class="col-lg-5 col-md-6 ml-auto mr-auto">
                <div class="card card-login">
                    <form class="form" action="<?php echo site_url() . 'Admin/Auth/Login_admin/input_login_form'; ?>" method="POST">
                        <div class="card-header text-center" style="background-color: #5F9EA0;">
                            <h4 class="card-title text-white">ลงชื่อเข้าใช้</h4>
                          
                        </div>

                        <div class="card-body">
                            <span class="bmd-form-group">
                                <div class="input-group" style="padding: 10px;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">face</i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="ชื่อผู้ใช้" name="username">
                                </div>
                            </span>
                            <div class="input-group" style="padding: 10px;">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">lock_outline</i>
                                    </span>
                                </div>
                                <input type="password" class="form-control" placeholder="รหัสผ่าน" name="password">
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