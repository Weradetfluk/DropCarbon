<?php
$warning = $warning ?? ''; //check world warnning == username หรือ password incorrect
?>
<title>Login Tourist</title>
<div class="body">
    <div class="container-1">
        <div class="" style="">
            <h4 class="card-title" style="color: black;">ลืมรหัสผ่านของนักท่องเที่ยว</h4>
        </div>
        <form method="post" action="">
            <div class="inputs">
                <input class="input" type="email" placeholder="อีเมลของคุณ" name="tourist_email" id="tourist_email" required>
                <span style="color: red; margin-left: 10px;">
                    <?php
                    if ($warning != NULL) {
                        echo $warning;
                    }
                    ?>
                </span>
                <button type="submit" class="button" id="forgot_pass" data-loading-text="Processing" name="signin">ส่งอีเมล</button>
            </div>
        </form>
    </div>

</div>

<script>
$(document).ready(function() {

    $("#forgot_pass").on('click', function() {
        var existing_HTML = $("#forgot_pass").html() //store exiting button HTML
        let user_email = $('#tourist_email').val(); // ค่าที่ป้อนเข้าไปใน ช่อง input
        $(this).prop("disabled", true);
        $(this).html(
            '<span class="material-icons">cached</span> Loading...'
        );
        check_email_user(user_email, existing_HTML);

    });

}); // Jqurey

/*
 * check_email_user
 * check e-mail in database using ajax
 * @input user_email
 * @output -
 * @author Weradet Nopsombun 62160110 
 * @Create Date 2564-08-12
 * @Update -
 */
function check_email_user(user_email, existing_HTML) {
    $.ajax({

        type: "POST",
        url: '<?php echo site_url() . 'Tourist/Auth/Login_tourist/check_email_tourist'; ?>',
        data: {
            user_email: user_email
        },
        success: function(json_res) { //respone to alert
            if (json_res == 1) {

                swal({
                    title: "ระบบได้จัดส่งส่งอีเมลของท่านเรียบร้อยแล้ว",
                    text: 'โปรดตรวจสอบอีเมลของท่าน',
                    type: "success",
                }, function() {

                    //go to login page
                    window.location = "<?php echo site_url() . 'Tourist/Auth/Login_tourist/'; ?>";
                })

            } else {
                $("#forgot_pass").html(existing_HTML).prop('disabled', false) //show original HTML and enable

                swal({

                    title: "ไม่พบอีเมลของท่านในระบบ",
                    text: 'ไม่พบอีเมลในระบบ กรุณากรอกใหม่',
                    type: "warning",

                })
            }
        },
        error: function() {
            alert('check email Not working');
        }
    });
}
</script>