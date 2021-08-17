<!-- navbar -->

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
                            <h4 class="card-title text-white">เปลี่ยนรหัสผ่าน</h4>

                        </div>

                        <div class="card-body">
                            <span class="bmd-form-group">
                                <div class="input-group" style="padding: 10px;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">face</i>
                                        </span>
                                    </div>
                                    <input type="password" class="form-control" placeholder="รหัสผ่าน" name="admin_password" id="admin_password">
                                </div>
                            </span>

                            <span class="bmd-form-group">
                                <div class="input-group" style="padding: 10px;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">face</i>
                                        </span>
                                    </div>
                                    <input type="password" class="form-control" placeholder="ยืนยันรหัสผ่าน" name="admin_password" id="admin_password_confirm">

                                </div>
                            </span>
                            <input type="hidden" class="form-control" placeholder="ยืนยันรหัสผ่าน" id="token" value="<?php echo $token ?>">
                        </div>
                        <div class="footer" style="text-align: center;">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <button type="button" class="btn btn-success" id="resetpass" name="signin">เสร็จสิ้น</button>
                                    </div>
                                </div>
                                <span id="err_text"></span>
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

        $("#admin_password_confirm").on('keyup', function() {
            confirmpassword();
        }); // Event Keyup

        $("#resetpass").on('click', function() {
            let password = $('#admin_password').val(); // ค่าที่ป้อนเข้าไปใน ช่อง input
            let token = $('#token').val(); // ค่าที่ป้อนเข้าไปใน ช่อง input
            console.log(password + " " + token);
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
        if ($('#admin_password').val() != $('#admin_password_confirm').val()) {
            $('#err_text').text('รหัสผ่านไม่ตรงกัน');
            $('#resetpass').prop('disabled', true);
        } else {
            $('#err_text').text('');
            $('#resetpass').prop('disabled', false);
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
            url: '<?php echo site_url() . 'Admin/Auth/Login_admin/update_password_ajax'; ?>',
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
                    window.location = "<?php echo site_url() . 'Admin/Auth/Login_admin/'; ?>";
                })


            },
            error: function() {
                alert('reset Not working');
            }


        });
    }
</script>