<!DOCTYPE html>
<html lang="en">
<style>
    .w3-btn {
        width: 150px;
    }

    input,
    select {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    input:hover #next_btn {
        background-color: #448855;
    }

    a {
        text-decoration: none;
    }

    ul.breadcrumb {
        padding: 10px 16px;
        list-style: none;
        background-color: #eee;
    }

    ul.breadcrumb li {
        display: inline;
        font-size: 18px;
    }

    ul.breadcrumb li+li:before {
        padding: 8px;
        color: black;
        content: ">";
    }

    ul.breadcrumb li a {
        color: #0275d8;
        text-decoration: none;
    }

    ul.breadcrumb li a:hover {
        color: #01447e;
        text-decoration: underline;
    }
</style>
<title>แก้ไขข้อมูลส่วนตัว</title>
<!-- Form Register -->
<div class="wrapper" style="height: 90.4%">
    <div class="container py-5" style="background-color: white; border-radius: 25px; padding-right: 1.5%; padding-left: 1.5%;">
        <ul class="breadcrumb">
            <li><a href="#" style="color: green;">หน้าหลัก</a></li>
            <li>แก้ไขข้อมูลส่วนตัว</li>
        </ul>
        <h1 class="h1" style="text-align: center; padding-top: 1%; padding-bottom: 1%;">แก้ไขข้อมูลส่วนตัว</h1>
        <form class="container py-3" method='POST' action='<?php echo site_url() . 'Tourist/Manage_tourist/Tourist_edit/update_tourist'; ?>' style="margin:0;">
            <b style="font-size: 30px; text-align: center;">ข้อมูลของคุณ</b><br><br>
            <div>
                <?php
                $checked_prefix_1 = '';
                $checked_prefix_2 = '';
                $checked_prefix_3 = '';

                if ($this->session->userdata("pre_id") == "1") {
                    $checked_prefix_1 = 'checked';
                } else if ($this->session->userdata("pre_id") == "2") {
                    $checked_prefix_2 = 'checked';
                } else {
                    $checked_prefix_3 = 'checked';
                }
                ?>

                <input type="radio" name="tus_pre_id" value=1 <?php echo $checked_prefix_1 ?>>
                <label style="color:black">นาย</label>
                <input type="radio" name="tus_pre_id" value=2 <?php echo $checked_prefix_2 ?>>
                <label style="color:black">นาง</label>
                <input type="radio" name="tus_pre_id" value=3 <?php echo $checked_prefix_3 ?>>
                <label style="color:black">นางสาว</label>
            </div><br>
            <div class="row">
                <div class="form-group col-md-6 mb-3">
                    <label for="tus_firstname" style="color:black">ชื่อจริง</label>
                    <input type="text" class="form-control" placeholder="ชื่อภาษาไทย" name='tus_firstname' value='<?php echo $arr_tus[0]->tus_firstname; ?>' required>
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label for="tus_lastname" style="color:black">นามสกุล</label>
                    <input type="text" class="form-control" placeholder="นามสกุลภาษาไทย" name='tus_lastname' value='<?php echo $arr_tus[0]->tus_lastname; ?>' required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 mb-3">
                    <label for="tus_tel" style="color:black">เบอร์โทรศัพท์</label>
                    <input type="text" class="form-control" placeholder="หมายเลขโทรศัพท์" name='tus_tel' value="<?php echo $arr_tus[0]->tus_tel; ?>" required>
                </div>

                <div class="form-group col-md-6 mb-3">
                    <label for="tus_birthdate" style="color:black">วันเกิด</label>
                    <input type="date" class="form-control" placeholder="birthdate" name='tus_birthdate' value="<?php echo $arr_tus[0]->tus_birthdate; ?>" required>
                </div>
            </div>

            <div class="form-group col-md-6 mb-3">
                <label for="tus_email" style="color:black">อีเมล</label>
                <input type="text" class="form-control" placeholder="E-mail" name='tus_email' value="<?php echo $arr_tus[0]->tus_email; ?>" required>
            </div>
            <br>
            <!-- รูปโปรไฟล์ :
                <input type="file" name="myfile" required> -->
            <!-- <br><br> -->

            <input type="submit" id="next_btn" class="btn btn-success" style="color: white;" value="บันทึก"></input>
            <a id="next_btn" class="btn btn-danger" href="<?php echo site_url() . 'Entrepreneur/Manage_company/Company_list/show_list_company'; ?>">ยกเลิก
            </a>

        </form>
    </div>
    <ul class="bg-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>

</html>