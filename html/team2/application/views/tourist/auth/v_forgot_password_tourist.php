<!-- 
/*
* v_forgot_password_tourist
* Display form email for check email
* @input -
* @output form email for check in database
* @author Chutipon Thermsirisuksin 62160081
* @Create Date 2564-08-08
*/ 
-->
<?php
//check world warnning == username หรือ password incorrect
$warning = $warning ?? '';
?>
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
                    <form action="<?php echo site_url() . 'Tourist/Auth/Login_tourist/input_login_form'; ?>" method="POST">
                        <div class="card-header text-center" style="background-color: #5F9EA0;">
                            <h4 class="card-title text-white" style="font-family: 'Prompt', sans-serif !important;">ลืมรหัสผ่านนักท่องเที่ยว</h4>
                        </div>

                        <div class="card-body">
                            <span class="bmd-form-group">
                                <div class="input-group" style="padding: 10px;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">face</i>
                                        </span>
                                    </div>
                                    <input type="email" class="form-control" placeholder="อีเมลของคุณ" name="tourist_email" id="tourist_email" required>
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
                        <div class="header" style="text-align: center;">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <button type="submit" class="btn btn-success" id="forgot_pass" data-loading-text="Processing" name="signin">ส่งอีเมล</button>
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
 * @author Chutipon Thermsirisuksin 62160081 
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