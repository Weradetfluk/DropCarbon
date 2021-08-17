<?php
$warning = $warning ?? ''; //check world warnning == username หรือ password incorrect
?>

<div class="container-1">
    <div class="brand-logo">
        <img src="<?php echo base_url() . 'assets/templete/picture' ?>/./Logo-only.png">
    </div>
    <div class="brand-title">DropCarbonSystem</div>
    <form method="post" action="<?php echo site_url() . 'Tourist/Auth/Login_tourist/input_login_form'; ?>">
        <div class="inputs">
            <label>USERNAME</label>
            <input type="text" placeholder="ชื่อผู้ใช้" name="username">
            <label>PASSWORD</label>
            <input type="password" placeholder="รหัสผ่าน" name="password">
            <span style="color: red; margin-left: 10px;">
                <?php
                if ($warning != NULL) {
                    echo $warning;
                }
                ?>
            </span>
            <button type="submit" id="submit" name="signin">เข้าสู่ระบบ</button>
            <a href="" id="forgetID">ลืมรหัสผ่าน?</a>
        </div>
    </form>
</div>