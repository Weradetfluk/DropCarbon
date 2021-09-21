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

    input {
        border: 0px !important;
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

    .selected {
        border: 0px;
        border-bottom: 1px solid;
        border-bottom-color: #ced2d7;
        display: block;
        width: 100%;
        padding: .375rem .375rem;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
    }

    .bg {
        /* The image used */
        background-image: url("<?php echo base_url() . 'assets/templete/picture' ?>/./cool-background.png");

        /* Full height */
        height: 100%;

        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>

<title>แก้ไขข้อมูลส่วนตัว</title>
<!-- title -->

<div class="bg">
    <div class="container py-5" style="background-color: white; border-radius: 25px; padding-right: 1.5%; padding-left: 1.5%;">
        <ul class="breadcrumb">
            <li><a href="<?php echo site_url() . 'Tourist/Auth/Landing_page_tourist'; ?>" style="color: green;">หน้าหลัก</a></li>
            <li>แก้ไขข้อมูลส่วนตัว</li>
        </ul>
        <!-- path -->

        <h1 class="h1" style="text-align: center; padding-top: 1%; padding-bottom: 1%;" class="font-w-500">แก้ไขข้อมูลส่วนตัว</h1>
        <!-- แก้ไขข้อมูลส่วนตัว -->

        <form id="verifyForm" class="container py-3" method='POST' action='<?php echo site_url() . 'Tourist/Manage_tourist/Tourist_edit/update_tourist'; ?>' style="margin:0;" enctype="multipart/form-data">
            <div class="profile-pic-div">
                <?php if ($this->session->userdata("tus_img_path") == '') { ?>
                    <img src="<?php echo base_url() . 'assets/templete/picture/' ?>/./person.jpg" id="photo">
                <?php } else { ?>
                    <img src="<?php echo base_url() . 'profilepicture_tourist/' . $this->session->userdata('tus_img_path'); ?>">
                <?php } ?>
                <input type="file" id="file" name="tourist_img" accept="image/*">
                <label for="file" id="uploadBtn">Choose Photo</label>
            </div><br>
            <!-- profile pictuce -->

            <input type="hidden" name="tus_id" value='<?php echo $arr_tus[0]->tus_id; ?>'>

            <b style="font-size: 30px; text-align: center;">ข้อมูลของคุณ</b>
            <div class="row">
                <div class="form-group col-md-2 mb-3">
                    <label for="prefix" style="margin-bottom: 4px;">คำนำหน้า</label><br>
                    <select class="selected" name="tus_pre_id" id="prefix" required>
                        <?php for ($i = 0; $i < count($arr_prefix); $i++) { ?>
                            <?php if ($arr_tus[0]->tus_pre_id - 1 == $i) { ?>
                                <option value="<?php echo $i + 1 ?>" selected><?php echo $arr_prefix[$i]->pre_name; ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $i + 1 ?>"><?php echo $arr_prefix[$i]->pre_name; ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-md-4 mb-3">
                    <label for="tus_firstname">ชื่อ</label>
                    <input type="text" class="form-control mt-1" placeholder="ชื่อ" name='tus_firstname' value='<?php echo $arr_tus[0]->tus_firstname; ?>' required>
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label for="tus_lastname">นามสกุล</label>
                    <input type="text" class="form-control mt-1" placeholder="นามสกุล" name='tus_lastname' value='<?php echo $arr_tus[0]->tus_lastname; ?>' required>
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

            <div class="row">
                <div class="form-group col-md-6 mb-3">
                    <label for="tus_email" style="color:black">อีเมล</label>
                    <input type="text" class="form-control" placeholder="E-mail" name='tus_email' value="<?php echo $arr_tus[0]->tus_email; ?>" required>
                </div><br>
            </div>
            <!-- อีเมล -->

            <a id="next_btn" class="btn btn-secondary" style="color: white; background-color: #777777;" href="<?php echo site_url() . 'Tourist/Auth/Landing_page_tourist'; ?>">ยกเลิก</a>
            <!-- ปุ่มยกเลิก -->
            <button type="submit" id="verify" class="btn btn-success" style="color: white; margin-right: 1%; float:right; font-size: 18px;">บันทึก</button>
            <!-- ปุ่มบันทึก -->


        </form>
        <!-- form -->
    </div>
    <!-- พื้นหลัง -->



    <script>
        /*
         * @author Naaka punparich 62160082
         */

        $(document).ready(function() {
            let error = "<?php echo $this->session->userdata("error_register_tourist"); ?>";
            if (error == 'fail') {
                swal("ล้มเหลว", "รูปภาพที่คุณอัพโหลดมีขนาดใหญ่เกินไป", "error");
                <?php echo $this->session->unset_userdata("error_register_tourist"); ?>
            }
        });

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