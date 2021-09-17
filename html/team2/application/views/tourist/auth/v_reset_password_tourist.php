<?php
$warning = $warning ?? ''; //check world warnning == username หรือ password incorrect
?>
<title>Login Tourist</title>
<div class="body">
    <div class="container-1">
        <div class="" style="">
            <h4 class="card-title" style="color: black;">เปลี่ยนรหัสผ่านของนักท่องเที่ยว</h4>
        </div>
        <form method="post" action="">
            <div class="inputs">
                <input type="password" class="input" placeholder="รหัสผ่าน" name="tourist_password" id="tourist_password" required><br>
                <input type="password" class="input" placeholder="ยืนยันรหัสผ่าน" name="tourist_password" id="tourist_password_confirm">
                <span style="color: red; margin-left: 10px;">
                    <?php
                    if ($warning != NULL) {
                        echo $warning;
                    }
                    ?>
                </span>
                <input type="hidden" class="form-control" placeholder="ยืนยันรหัสผ่าน" id="token" value="<?php echo $token ?>">
                <button type="submit" class="button" id="reset_pass" data-loading-text="Processing" name="signin">เสร็จสิ้น</button>
            </div>
        </form>
    </div>

</div>

<script>
$(document).ready(function() {

    $("#tourist_password_confirm").on('keyup', function() {
        confirmpassword();
    }); // Event Keyup

    $("#reset_pass").on('click', function() {
        let password = $('#tourist_password').val(); // ค่าที่ป้อนเข้าไปใน ช่อง input
        let token = $('#token').val(); // ค่าที่ป้อนเข้าไปใน ช่อง input
        reset_password(password, token);
    }); // Event Keyup


}); // Jqurey




/*
 * confirmpassword
 * confirmpassword in value
 * @input 
 * @output -
 * @author Weradet Nopsombun 62160110 
 * @Create Date 2564-08-12
 * @Update -
 */
function confirmpassword() {
    if ($('#tourist_password').val() != $('#tourist_password_confirm').val()) {
        $('#err_text').text('รหัสผ่านไม่ตรงกัน');
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
 * @author Weradet Nopsombun 62160110 
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

            swal({
                title: "เปลี่ยนรหัสผ่านสำเร็จ",
                text: 'เปลี่ยนรหัสผ่านเสร็จสิ้น',
                type: "success",
                timer: 3000
            }, function() {
                window.location = "<?php echo site_url() . 'Tourist/Auth/Login_tourist/'; ?>";
            })


        },
        error: function() {
            alert('reset Not working');
        }


    });
}
</script>