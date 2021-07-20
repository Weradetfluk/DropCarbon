<?php
$warning = $warning ?? ''; //check world warnning == username หรือ password incorrect
?>
<nav class="navbar" style="color: #81b14f;">
    <div class="container">
        <a class="navbar-brand" href="javascript:;">DropCarbon for Entrepreneur</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">

            </ul>
        </div>
    </div>
</nav>
<div class="content">
    <div class="container-fluid" style="margin-top: 100px;">
        <div class="container">
            <div class="row">

                <div class="col-lg-5 col-md-6 ml-auto mr-auto">
                    <div class="card card-login">
                        <div class="card-header text-center card-header-success">
                            <h4 class="card-title">ลงชื่อเข้าใช้</h4>
                            <div class="social-line">

                            </div>
                        </div>
                        <div class="card-body">
                            <!-- form login  -->

                            <form action="<?php echo site_url() . 'Login/Login_entrepreneur/input_login_form'; ?>" method="POST">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        </span>
                                    </div class="form-group">
                                    <label for="username">ชื่อผู้ใช้งาน</label>
                                    <input type="text" class="form-control" class="form-control" id="username" placeholder="ชื่อผู้ใช้" name="username">
                                </div>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"></span>
                                    </div>
                                    <label for="password">รหัสผ่าน</label>
                                    <input type="password" class="form-control" id="password" placeholder="รหัสผ่าน" name="password">
                                </div>
                                <span style="color: red; margin-left: 30px;">
                                    <?php
                                    if ($warning != NULL) {
                                        echo $warning;
                                    }
                                    ?>
                                </span>

                        </div>
                            <div class="card-footer">
                                <button type="submit" style="margin-left: 150px;" class="btn btn-success" id="signin" name="signin">เข้าสู่ระบบ</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>