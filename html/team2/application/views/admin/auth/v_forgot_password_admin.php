<!-- navbar -->


<style>


</style>
<nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg " style="color: #81b14f;">
    <h2 style="color: #66CC33; padding: 10px;">DCS</h2>
    </div>
</nav>


<div class="page-header header-filter" style="background-image: url(<?php echo base_url() . 'assets/templete/picture/./banner7.jpg' ?>);">

    <div class="container" style="margin-top: 200px; ">

        <div class="row">
            <div class="col-lg-5 col-md-6 ml-auto mr-auto">
                <div class="card card-login">
                    <form class="form" action="" method="POST">
                        <div class="card-header text-center" style="background-color: #5F9EA0;">
                            <h4 class="card-title text-white">ลืมรหัสผ่าน</h4>

                        </div>

                        <div class="card-body">
                            <span class="bmd-form-group">
                                <div class="input-group" style="padding: 10px;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">face</i>
                                        </span>
                                    </div>
                                    <input type="email" class="form-control" placeholder="อีเมลของคุณ" name="admin_email" id="admin_email">
                                </div>
                            </span>

                        </div>
                        <div class="footer" style="text-align: center;">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <button type="button" class="btn btn-success" id="forgotpass" data-loading-text="Processing" name="signin">ส่งอีเมล</button>
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

        $("#forgotpass").on('click', function() {
            var existingHTML =  $("#forgotpass").html() //store exiting button HTML
            let user_email = $('#admin_email').val(); // ค่าที่ป้อนเข้าไปใน ช่อง input
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="material-icons">cached</span>Loading...'
            );
            check_email_user(user_email, existingHTML);

        });

    }); // Jqurey




    /*
     * check_email_user
     * check e-mail in database using ajax
     * @input 
     * @output -
     * @author Weradet Nopsombun 62160110 
     * @Create Date 2564-08-12
     * @Update -
     */


    function check_email_user(user_email, existingHTML) {


        $.ajax({
            
            type: "POST",
            url: '<?php echo site_url() . 'Admin/Auth/Login_admin/check_email_admin'; ?>',
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
                        window.location = "<?php echo site_url() . 'Admin/Auth/Login_admin/'; ?>";
                    })

                } else {
                    $("#forgotpass").html(existingHTML).prop('disabled', false) //show original HTML and enable

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