<?php
$warning = $warning ?? ''; //check world warnning == username หรือ password incorrect
?>


 <!-- navbar -->

<nav class="navbar" style="color: #81b14f;">
        <div class="container">
            <a class="navbar-brand" href="javascript:;">DropCarbon for Admin</a>
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

                        <form action="<?php echo site_url() . 'Admin/Auth/Login_admin/input_login_form'; ?>" method="POST">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                    </span>
                                </div>
                                <input type="text" class="form-control" placeholder="ชื่อผู้ใช้" name="username">
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                    </span>
                                </div>
                                <input type="password" class="form-control" placeholder="รหัสผ่าน" name="password">
                            </div>              
                                <span style="color: red; margin-left: 30px;" >
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