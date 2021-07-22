<!DOCTYPE html>
<html lang="en">

<style>
    body {
        background-color: white;
    }
</style>
    <!-- Form Register -->
    <div class="container py-5">
        <br><br>
        </h1><h1 class="h1">ลงทะเบียนสำหรับผู้ประกอบการ</h1>
        <br>
        <form class="container py-5" method='POST' action='<?php echo site_url('Entrepreneur/Auth/Register_entrepreneur/insert_ent') ?>'>
            <b style="font-size: 30px;">ข้อมูลของคุณ</b><br><br>
            <div>
                <input type="radio" id ="ent_pre_id1" name="ent_pre_id" value=1>&nbsp;นาย
                <input type="radio" id ="ent_pre_id2" name="ent_pre_id" value=2>&nbsp;นาง
                <input type="radio" id ="ent_pre_id3" name="ent_pre_id" value=3>&nbsp;นางสาว
            </div><br>
            <div class="row">
            <div class="form-group col-md-6 mb-3">
                <label for="inputname">ชื่อ</label>
                <input type="text" class="form-control mt-1" id="ent_fname" name="ent_fname" placeholder="ชื่อ" required>
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
            <div class="form-group col-md-6 mb-3">
                        <label for="inputemail">อีเมล</label>
                        <input type="email" class="form-control mt-1" id="ent_email" name="ent_email" placeholder="อีเมล" required>
                    </div>

            เอกสารจดทะเบียนเชิงพาณิชย์ :
            <input type="file" id="myfile" id="myfile" name="myfile" multiple><br><br>

            <b style="font-size: 30px;">สร้างรหัสผ่าน</b><br><br>

            <div class="form-group col-md-6 mb-3">
                <label for="username">ชื่อผู้ใช้</label>
                <input type="text" class="form-control mt-1" id="ent_username" name="ent_username" placeholder="ชื่อผู้ใช้" required>
            </div>
            <div class="row">
            <div class="form-group col-md-6 mb-3">
                <label for="password">รหัสผ่าน</label>
                <input type="password" class="form-control mt-1" id="pass" name="ent_password" placeholder="รหัสผ่าน" onkeyup="confirmpassword()" required>
            </div>

            <div class="form-group col-md-6 mb-3">
                <label for="password">ยืนยันรหัสผ่าน</label>
                <input type="password" class="form-control mt-1" id="confirm" name="cfp" placeholder="ยืนยันรหัสผ่าน" onkeyup="confirmpassword()" required><br>
                <div id="errorpassword" class="text-danger">

                </div>
            </div>
            </div>
            <button type="submit" id ="next_btn" class="btn btn-success btn-lg px-3">ถัดไป</button>
            
        </form>
    </div>
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
