<?php
$warning = $warning ?? ''; //check world warnning == username หรือ password incorrect
?>
<title>Login Tourist</title>
<div class="body">
    <div class="container-1">
        <div class="brand-logo">
            <i class="fas fa-9x fa-user-circle" style="color: #59ab6e;"></i>
        </div>
        <form method="post" action="<?php echo site_url() . 'Tourist/Auth/Login_tourist/input_login_form'; ?>">
            <div class="inputs">
                <label class="label">USERNAME</label>
                <input class="input" type="text" placeholder="ชื่อผู้ใช้" name="username" required>
                <label class="label">PASSWORD</label>
                <input class="input" type="password" placeholder="รหัสผ่าน" name="password" required>
                <span style="color: red; margin-left: 10px;">
                    <?php
                    if ($warning != NULL) {
                        echo $warning;
                    }
                    ?>
                </span>
                <button type="submit" class="button" name="signin">เข้าสู่ระบบ</button>
                <a href="" id="forgetID">ลืมรหัสผ่าน?</a>
            </div>
        </form>
    </div>

</div>