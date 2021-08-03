<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'>
    body {
        background-color: #56ae6c;
    }
    .w3-btn {
        width:150px;
    }
    
input, select {
    -webkit-box-sizing: border-box;
       -moz-box-sizing: border-box;
            box-sizing: border-box;
}
</style>
    <br><br><br>
    <!-- Form Register -->
    <div class="container py-5" style="background-color: white; border-radius: 25px;">
        <br>
        <h1 class="h1" style="text-align: center;">ลงทะเบียนสำหรับผู้ประกอบการ</h1>
        <br>
        <form class="container py-5" method='POST' action='<?php echo site_url('Entrepreneur/Auth/Register_entrepreneur/insert_ent') ?>' enctype="multipart/form-data">
            <b style="font-size: 30px; text-align: center;">โปรดกรอกข้อมูลของคุณ</b><br><br>
            <div>
                <input type="radio" id ="ent_pre_id1" name="ent_pre_id" value=1>&nbsp;นาย
                <input type="radio" id ="ent_pre_id2" name="ent_pre_id" value=2>&nbsp;นาง
                <input type="radio" id ="ent_pre_id3" name="ent_pre_id" value=3>&nbsp;นางสาว
            </div><br>
            <div class="row">
            <div class="form-group col-md-6 mb-3">
                <label for="inputname">ชื่อ</label>
                <input type="text" class="form-control mt-1" id="ent_firstname" name="ent_firstname" placeholder="ชื่อ" required>
            </div>
            <div class="form-group col-md-6 mb-3">
                <label for="inputlastname">นามสกุล</label>
                <input type="text" class="form-control mt-1" id="ent_lastname" name="ent_lastname" placeholder="นามสกุล" required>
            </div>
            </div>
            <div class="row">
            <div class="form-group col-md-6 mb-3">
                <label for="tell">เบอร์โทร</label>
                <input type="text" class="form-control mt-1" id="ent_tel" name="ent_tel" placeholder="เบอร์โทร" required>
            </div>
            <div class="form-group col-md-6 mb-3">
                <label for="idcard">บัตรประชาชน</label>
                <input type="text" class="form-control mt-1" id="ent_id_card" name="ent_id_card" placeholder="บัตรประชาชน" required>
            </div>
            </div>
            
            <div class="row">
                <div class="form-group col-md-6 mb-3">
                    <label for="inputemail">อีเมล</label>
                    <input type="email" class="form-control mt-1" id="ent_email" name="ent_email" placeholder="อีเมล" required>
                </div>
            </div>

            เอกสารจดทะเบียนเชิงพาณิชย์ :
            <input type="file" name="myfile[]" multiple required>
            <br><br>

            <b style="font-size: 30px;">สร้างบัญชีผู้ใช้</b><br><br>

            <div class="row">
                <div class="form-group col-md-6 mb-3">
                    <label for="username">ชื่อผู้ใช้</label>
                    <input type="text" class="form-control mt-1" id="ent_username" name="ent_username" placeholder="ชื่อผู้ใช้" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 mb-3">
                    <label for="password">รหัสผ่าน</label>
                    <input type="password" class="form-control mt-1" id="pass" name="ent_password" placeholder="รหัสผ่าน" onkeyup="confirmpassword()" required>
                </div>

                <div class="form-group col-md-6 mb-3">
                    <label for="password">ยืนยันรหัสผ่าน</label>
                    <input type="password" class="form-control mt-1" id="confirm" name="cfp" placeholder="ยืนยันรหัสผ่าน" onkeyup="confirmpassword()" required><br>
                    <div id="errorpassword" class="text-danger"></div>
                </div>
            </div>
            <p><button type="submit" id ="next_btn" class="w3-button w3-round-large btn btn-success btn-lg px-3" style="color: white;">ยืนยันการลงทะเบียน</button></p>
            
        </form>
    </div>
    <br><br><br>
    <script>
        /*
        * 
        * confirmpassword
        *@input password
        *@parameter -
        *output  checkconfirmpassword
        *@author Thanisorn thumsawanit 62160088
        *@Create Date 2564-07-20
        *@update Date 2564-07-20
        */
        function confirmpassword(){
            if($('#pass').val()!=$('#confirm').val()){
                $('#errorpassword').text('รหัสผ่านไม่ตรงกัน');
                $('#next_btn').prop('disabled', true);
            }else{
                $('#errorpassword').text('');
                $('#next_btn').prop('disabled', false);
            }
        }
    </script>  
</body>

</html>
