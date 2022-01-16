<!-- 
/*
* v_edit_entrepreneur.php
* Display form edit entrepreneur
* @input ent_pre_id, ent_firstname, ent_lastname, ent_tel, ent_email, ent_password
* @output form edit entrepreneur
* @author Thanchanok Thongjumroon 62160089
* @Create Date 2564-07-24
* @Update Date 2564-09-19
*/ 
-->
<style crossorigin='anonymous'>
.s1 {
    background: no-repeat bottom, 50% calc(100% - 1px);
    background-size: 0 100%, 100% 100%;
    border: 0;
    height: 36px;
    /* transition: background 0s ease-out; */
    padding-left: 0;
    padding-right: 0;
    border-radius: 0;
    font-size: 14px;
    display: block;
    width: 100%;
    padding: .4375rem 0;
    font-size: 1rem;
    line-height: 1.5;
    color: #495057;
    background-color: transparent;
    background-clip: padding-box;
    border: 1px solid #d2d2d2;
    box-shadow: none;
}
</style>
<div class="content">
    <div class="container py-5"
        style="background-color: white; border-radius: 25px; padding-right: 1.5%; padding-left: 1.5%;">

        </ul>
        <div class="row">
            <div class="col-md-12">
                <!-- <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2)"> -->
                <h1 class="h1"
                    style="color:#990000; text-align: center; padding-top: 1%; padding-bottom: 1%; font-size: 250%">
                    แก้ไขข้อมูลผู้ประกอบการ </h1>
                <!-- <div class="card-header card-header-info">
                        <center style="font-weight: bold; font-size: 150%;">แก้ไขข้อมูลผู้ประกอบการ</center>
                    </div> -->
                <div class="card-body">
                    <b
                        style="font-size: 30px; text-align: center; color:#1C1C1C">โปรดกรอกข้อมูลที่ต้องการแก้ไข</b><br><br>
                    <!-- <b>ข้อมูลของคุณ</b><br><br> -->
                    <form
                        action="<?php echo site_url() . 'Entrepreneur/Manage_entrepreneur/Entrepreneur_edit/update_entrepreneur'; ?>"
                        method="POST">
                        <div class="w3-row">
                            <div class="w3-container w3-twothird con">
                                <form>
                                    <!-- กรอกชื่อ -->
                                    <div class="row">
                                        <div class="col-md-2 mb-3">
                                            <label for="prefix"
                                                style="color:#000000; margin-bottom: 4px;">คำนำหน้า</label><br>
                                            <select class="s1" name="ent_pre_id" id="prefix" required>
                                                <?php for ($i = 0; $i < count($arr_prefix); $i++) { ?>
                                                <?php if ($arr_ent[0]->ent_pre_id - 1 == $i) { ?>
                                                <option value="<?php echo $i + 1 ?>" selected>
                                                    <?php echo $arr_prefix[$i]->pre_name; ?></option>
                                                <?php } else { ?>
                                                <option value="<?php echo $i + 1 ?>">
                                                    <?php echo $arr_prefix[$i]->pre_name; ?></option>
                                                <?php } ?>
                                                <?php } ?>
                                            </select>
                                        </div>


                                        <div class="col-5">
                                            <label for="ent_firstname" style="color:black">ชื่อจริง</label>
                                            <input type="text" class="form-control" placeholder="ชื่อภาษาไทย"
                                                name='ent_firstname' value='<?php echo $arr_ent[0]->ent_firstname; ?>'
                                                required>
                                        </div>
                                        <!-- กรอกนามสกุล -->
                                        <div class="col-5">
                                            <label for="ent_lastname" style="color:black">นามสกุล</label>
                                            <input type="text" class="form-control" placeholder="นามสกุลภาษาไทย"
                                                name='ent_lastname' value='<?php echo $arr_ent[0]->ent_lastname; ?>'
                                                required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- กรอกเบอร์โทรศัพท์ -->
                                        <div class="col-6">
                                            <label for="ent_tel" style="color:black">เบอร์โทรศัพท์</label>

                                            <input type="tel" id="ent_tel" class="form-control"
                                                placeholder="000-000-0000" name='ent_tel' onblur="check_tel()"
                                                value="<?php echo $arr_ent[0]->ent_tel; ?>"
                                                pattern="[0]{1}[0-9]{2}-[0-9]{3}-[0-9]{4}" required>
                                            <p id="error" style="color: red;"></p>
                                        </div>

                                        <div class="col-6">
                                            <label for="ent_id_card" style="color:black">หมายเลขบัตรประชาชน</label>
                                            <label for="ent_id_card"
                                                style="font-size:12px; color:#FF0000">*ไม่สามารถแก้ไขหมายเลขบัตรประชาชนได้</label>
                                            <input type="text" class="form-control" placeholder="หมายเลขบัตรประชาชน"
                                                name='ent_id_card' value="<?php echo $arr_ent[0]->ent_id_card; ?>"
                                                disabled>
                                        </div>
                                        <!-- กรอกวันเกิด
                                        <div class="col-5">
                                            <label for="ent_bd" style="color:black">วันเกิด</label>
                                            <input type="date" class="form-control" name="ent_birthdate"
                                                value="<?php echo $arr_ent[0]->ent_birthdate; ?>" required>
                                        </div> -->
                                    </div>

                                    <!-- กรอกอีเมล -->
                                    <div class="row">
                                        <div class="col-md-6  mb-3">
                                            <label for="ent_email" style="color:black">อีเมล</label>
                                            <input type="text" class="form-control" placeholder="example@email.com"
                                                name='ent_email' value="<?php echo $arr_ent[0]->ent_email; ?>" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-1 mb-1">
                                            <label for="ent_birth_date" style="color:black">วันเกิด</label>
                                            <select name="ent_birth_date" id="ent_birth_date" class="form-control mt-1">
                                                <!-- วันเกิด -->
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="ent_birth_month" style="color:black">เดือนเกิด</label>
                                            <select name="ent_birth_month" id="ent_birth_month" class="form-control mt-1" onblur="check_date_by_month('not have old date')">
                                                <?php 
                                                $ent_birth_month_old = intval(substr($arr_ent[0]->ent_birthdate, 5, 2));
                                                $arr_month = array(
                                                    "0"=>"มกราคม",
                                                    "1"=>"มกราคม",
                                                    "2"=>"กุมภาพันธ์",
                                                    "3"=>"มีนาคม",
                                                    "4"=>"เมษายน",
                                                    "5"=>"พฤษภาคม",
                                                    "6"=>"มิถุนายน",
                                                    "7"=>"กรกฎาคม",
                                                    "8"=>"สิงหาคม",
                                                    "9"=>"กันยายน",
                                                    "10"=>"ตุลาคม",
                                                    "11"=>"พฤศจิกายน",
                                                    "12"=>"ธันวาคม"
                                                    );
                                                echo '<option value="0">ดด</option>';
                                                for($i = 1; $i < 13; $i++){
                                                    if($i == $ent_birth_month_old){
                                                        echo '<option value="'.$i.'" selected>'.$arr_month[$i].'</option>';
                                                    }else{
                                                        echo '<option value="'.$i.'">'.$arr_month[$i].'</option>';
                                                    }
                                                }?>
                                            </select>
                                        </div>
                                        <div class="col-md-2 mb-2">
                                            <label for="ent_birth_year" style="color:black">ปีเกิด</label>
                                            <select name="ent_birth_year" id="ent_birth_year" class="form-control mt-1" onblur="check_date_by_month('not have old date')">
                                                <?php
                                                $ent_birth_year_old = intval(substr($arr_ent[0]->ent_birthdate, 0, 4));
                                                echo '<option value="0">ปป</option>';
                                                for($i = $year_now-100; $i <= $year_now; $i++){
                                                    if($i == $ent_birth_year_old){
                                                        echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                                    }else{
                                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                                    }
                                                }?>
                                            </select>
                                        </div>
                                    </div>
                                    <br><br>
                                    <!-- แก้ไขรหัสผ่าน -->
                                    <b
                                        style="font-size: 30px; text-align: center; color:#1C1C1C">แก้ไขรหัสผ่าน</b><br><br>
                                    <div class="row">

                                        <!-- รหัสผ่าน -->
                                        <div class="col-6">
                                            <label for="ent_password" style="color:black">รหัสผ่าน</label>
                                            <input type="password" class="form-control" name='ent_password'
                                                value="<?php echo $arr_ent[0]->ent_password?>" required>
                                        </div>

                                        <!-- แก้ไขรหัสผ่าน -->
                                        <div class="col-6">
                                            <label for="ent_password" style="color:black">ยืนยันรหัสผ่าน</label>
                                            <input type="password" class="form-control"
                                                value="<?php echo $arr_ent[0]->ent_password ?>" required>
                                        </div>


                                    </div>
                                </form>
                            </div>
                            <br>
                            <div style="text-align: right;">
                                <input type="submit" class="btn btn-success" value="บันทึก"></input>
                                <button class="btn btn-secondary" style="color: white; background-color: #777777;"
                                onclick="location.href='<?php echo site_url() . 'Entrepreneur/Manage_company/Company_list/show_list_company'; ?>'">ยกเลิก
                                </button>
                            </div>
                            <br>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
$(document).ready(function() {
    let error = "<?php echo $this->session->userdata("error_edit_entrepreneur"); ?>";
    if (error == 'success') {
        swal("สำเร็จ", "คุณทำแก้ไขข้อมูลสำเร็จ", "success");
        <?php echo $this->session->unset_userdata("error_edit_entrepreneur"); ?>
    }
    let birth_date_old = '<?php echo json_decode(intval(substr($arr_ent[0]->ent_birthdate, 8)))?>';
    check_date_by_month(birth_date_old);
});

/*
 * check_tel
 * Check tel format
 * @input ent_tel 
 * @output ent_tel 
 * @author Thanchanok Thongjumroon 62160089
 * @Create Date 2564-09-23
 * @Update Date 2564-09-25
 */
function check_tel() {
    var tel = document.getElementById("ent_tel").value;
    var patt = '[0]{1}[0-9]{2}-[0-9]{3}-[0-9]{4}';
    if (!tel.match(patt)) {
        document.getElementById("error").innerHTML = "**";
    }
}

/*
* check_date_by_month
* check birth date by birth month
* @input ent_birth_month, ent_birth_year
* @output ent_birth_date
* @author Suwapat Saowarod 62160340
* @Create Date 2565-01-1ุ6
* @Update - 
*/
function check_date_by_month(birth_date_old){
    let birth_month = $('#ent_birth_month').val();
    let birth_year = $('#ent_birth_year').val();
    let html_code = '';
    let count_date;
    if(birth_month == 0 || birth_month == 1 || birth_month == 3 || birth_month == 5 || birth_month == 7 || birth_month == 8 || birth_month == 10 || birth_month == 12){
        count_date = 31;
    }else if(birth_month == 4 || birth_month == 6 || birth_month == 9 || birth_month == 11){
        count_date = 30;
    }else{
        let mod_4, mod_100, mod_400;
        // เช็คว่ามี 28 หรือ 29 วัน อัลกอลิทึม
        mod_4 = birth_year % 4;
        mod_100 = birth_year % 100;
        mod_400 = birth_year % 400;
        if(mod_4 == 0 && mod_100 == 0 && mod_400 == 0 && birth_year > 0){
            count_date = 28;
        }else{
            count_date = 29;
        }
    }
    html_code += '<option value="'+0+'">วว</option>';
    for(let i = 1; i <= count_date; i++){
        if(birth_date_old == 'not have old date'){
            if($('#ent_birth_date').val() == i){
                html_code += '<option value="'+i+'" selected>'+ i +'</option>';
            }else{
                html_code += '<option value="'+i+'">'+ i +'</option>';
            }
        }else{
            if(birth_date_old == i){
                html_code += '<option value="'+i+'" selected>'+ i +'</option>';
            }else{
                html_code += '<option value="'+i+'">'+ i +'</option>';
            }
        }
    }
    $('#ent_birth_date').html(html_code);
}
</script>