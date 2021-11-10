<!-- 
/*
* v_reset_password_tourist
* Display from reset password tourist
* @input -
* @output from reset password tourist
* @author Chutipon Thermsirisuksin 62160081
* @Create Date 2564-09-17
*/ 
-->
<?php
$warning = $warning ?? ''; //check world warnning == username หรือ password incorrect
?>
<title>Reset Password</title>

<nav class="navbar navbar-expand-lg navbar-absolute fixed-top bg-light ">
    <a href="" class="navbar-brand">
        <img src="<?php echo base_url() . 'assets/templete/picture/./Logo-web.png' ?>" style="max-width:400px; height: 50px; margin-top: -10px;">
    </a>
</nav>
<div class="page-header header-filter" style="background-image: url('<?php echo base_url() . 'assets/templete' ?>/picture/login-img.jpeg');   background-repeat: no-repeat;   background-size: cover;">
    <div class="container" style="margin-top: 200px; ">
        <div class="row">
            <div class="col-lg-5 col-md-6 ml-auto mr-auto">
                <div class="card card-login">
                    <form method="POST" action="">
                        <div class="card-header text-center" style="background-color: #5F9EA0;">
                            <h4 class="card-title text-white" style="font-family: 'Prompt', sans-serif !important;">เปลี่ยนรหัสผ่านของนักท่องเที่ยว</h4>
                        </div>

                        <div class="card-body">
                            <span class="bmd-form-group">
                                <div class="input-group" style="padding: 10px;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">face</i>
                                        </span>
                                    </div>
                                    <input type="password" class="form-control" placeholder="รหัสผ่าน" name="tourist_password" id="tourist_password" required>
                                </div>
                            </span>
                            <span class="bmd-form-group">
                                <div class="input-group" style="padding: 10px;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">lock_outline</i>
                                        </span>
                                    </div>
                                    <input type="password" class="form-control" placeholder="ยืนยันรหัสผ่าน" name="tourist_password" id="tourist_password_confirm" required>
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
                                        <input type="hidden" class="form-control" placeholder="ยืนยันรหัสผ่าน" id="token" value="<?php echo $token ?>">
                                        <button type="submit" class="btn btn-success" data-loading-text="Processing" id="reset_pass" name="signin">เสร็จสิ้น</button>
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
    confirm_password();
    $("#tourist_password_confirm").on('keyup', function() {
        confirm_password();
    }); // Event Keyup

    $("#reset_pass").on('click', function() {
        let password = $('#tourist_password').val(); // ค่าที่ป้อนเข้าไปใน ช่อง input
        let token = $('#token').val(); // ค่าที่ป้อนเข้าไปใน ช่อง input
        reset_password(password, token);
    }); // Event Keyup


}); // Jqurey




/*
 * confirm_password
 * confirm_password in value
 * @input 
 * @output -
 * @author Chutipon Thermsirisuksin 62160081
 * @Create Date 2564-08-12
 * @Update -
 */
function confirm_password() {
    if ($('#tourist_password').val() != $('#tourist_password_confirm').val()) {
        $('#err_text').text('รหัสผ่านไม่ตรงกัน');
        $('#reset_pass').prop('disabled', true);
    } else if ($('#tourist_password').val() == '' || $('#tourist_password_confirm').val() == '') {
        $('#reset_pass').prop('disabled', true);
    } else {
        $('#err_text').text('');
        $('#reset_pass').prop('disabled', false);
    }

}



/*
 * reset_password
 * reset password in database
 * @input 
 * @output -
 * @author Chutipon Thermsirisuksin 62160081
 * @Create Date 2564-08-12
 * @Update -
 */
function reset_password(password, token) {
    $.ajax({
        type: "POST",
        url: '<?php echo site_url() . 'Tourist/Auth/Login_tourist/update_password_ajax'; ?>',
        data: {
            password: password,
            token: token
        },
        success: function() {
            window.location = "<?php echo site_url() . 'Tourist/Auth/Login_tourist/'; ?>";
        },
        error: function() {
            alert('เปลี่ยนรหัสผ่านไม่สำเร็จ กรุณาลองใหม่อีกครั้ง');
        }


    });
}
</script>