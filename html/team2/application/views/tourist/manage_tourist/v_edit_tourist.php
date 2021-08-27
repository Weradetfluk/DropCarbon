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

    #next_btn {
        float: right;
    }

    .profile-pic-div {
        height: 200px;
        margin: auto;
        width: 200px;
        position: relative;
        border-radius: 50%;
        overflow: hidden;
        border: 1px solid gray;
    }

    .profile-pic-div img {
        height: 200px;
    }

    #photo {
        height: 100%;
        width: 100%;
    }

    #file {
        display: none;
    }

    #uploadBtn {
        height: 40px;
        width: 100%;
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translate(-50%);
        text-align: center;
        background: rgba(0, 0, 0, 0.7);
        color: wheat;
        line-height: 30px;
        font-size: 15px;
        font-family: sans-serif;
        cursor: pointer;
    }

    @media screen and (min-width: 1000px) and (max-width: 1500px) {
        .wrapper {
            width: 100%;
            padding: 15px 15px 940px;
        }

        .h1 {
            font-size: 36px !important;
        }
    }

    @media screen and (max-width: 600px) {
        .wrapper {
            width: 100%;
            padding: 15px 15px 1100px;
        }

        .h1 {
            font-size: 36px !important;
        }
    }
</style>

<title>แก้ไขข้อมูลส่วนตัว</title>
<!-- title -->

<div class="wrapper" style="height: 110%">
    <div class="container py-5" style="background-color: white; border-radius: 25px; padding-right: 1.5%; padding-left: 1.5%;">
        <ul class="breadcrumb">
            <li><a href="<?php echo site_url() . 'Tourist/Auth/Landing_page_tourist'; ?>" style="color: green;">หน้าหลัก</a></li>
            <li>แก้ไขข้อมูลส่วนตัว</li>
        </ul>
        <!-- path -->

        <h1 class="h1" style="text-align: center; padding-top: 1%; padding-bottom: 1%;">แก้ไขข้อมูลส่วนตัว</h1>
        <!-- แก้ไขข้อมูลส่วนตัว -->

        <form id="verifyForm" class="container py-3" method='POST' action='<?php echo site_url() . 'Tourist/Manage_tourist/Tourist_edit/update_tourist'; ?>' style="margin:0;" enctype="multipart/form-data">
            <div class="profile-pic-div">
                <?php if ($this->session->userdata("tus_img_path") == '') { ?>
                    <img src="<?php echo base_url() . 'assets/templete/picture/' ?>/./person.jpg" id="photo">
                <?php } else { ?>
                    <img src= "<?php echo base_url().'profilepicture_tourist/'.$this->session->userdata('tus_img_path'); ?>" id="photo">
                <?php } ?>
                <input type="file" id="file" name="tourist_img" accept="image/*" >
                <label for="file" id="uploadBtn">Choose Photo</label>
            </div><br>
            <!-- profile pictuce -->

            <input type="hidden" name="tus_id" value='<?php echo $arr_tus[0]->tus_id; ?>'>

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
            <!-- เพศ -->

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
            <!-- ชื่อจริง-นามสกุล -->

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
            <!-- เบอร์ วันเกิด -->

            <div class="form-group col-md-6 mb-3">
                <label for="tus_email" style="color:black">อีเมล</label>
                <input type="text" class="form-control" placeholder="E-mail" name='tus_email' value="<?php echo $arr_tus[0]->tus_email; ?>" required>
            </div><br>
            <!-- อีเมล -->

            <a id="next_btn" class="btn btn-danger" href="<?php echo site_url() . 'Tourist/Auth/Landing_page_tourist'; ?>">ยกเลิก</a>
            <!-- ปุ่มยกเลิก -->
            <button type="button" id="verify" class="btn btn-success" style="color: white; margin-right: 1%; float:right; font-size: 18px;">ยืนยัน</button>
            <!-- ปุ่มบันทึก -->


        </form>
        <!-- form -->


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
    <!-- สร้างสีเหลี่ยม  -->

</div>
<!-- พื้นหลัง -->

<script>
    /*
     * @author Naaka punparich 62160082
     */

    jQuery(document).ready(function() {
        jQuery('button#verify').on('click', function(event) {
            event.preventDefault();
            swal({
                title: "แก้ไขข้อมูลของคุณ",
                text: "คุณได้ทำการแก้ไขข้อมูลส่วนตัวเสร็จสิ้น!",
                type: "success",
                showCancelButton: false,
                buttonsStyling: true,
                confirmButtonText: "OK",
                // cancelButtonText: "cancel",
            }, function(isConfirm) {
                if (isConfirm) {
                    jQuery("#verifyForm").submit();
                }
            });
        });
    });
    // sweet alert

    const imgDiv = document.querySelector('.profile-pic-div');
    const img = document.querySelector('#photo');
    const file = document.querySelector('#file');
    const uploadBtn = document.querySelector('#uploadBtn');

    imgDiv.addEventListener('mouseenter', function() {
        uploadBtn.style.display = "block";
    });

    imgDiv.addEventListener('mouseleave', function() {
        uploadBtn.style.display = "none";
    });

    file.addEventListener('change', function() {

        const choosedFile = this.files[0];

        if (choosedFile) {

            const reader = new FileReader();

            reader.addEventListener('load', function() {
                img.setAttribute('src', reader.result);
            });

            reader.readAsDataURL(choosedFile);
        }
    });
    // responsive change picture
</script>