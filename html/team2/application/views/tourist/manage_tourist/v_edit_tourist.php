<div class="bg" style="padding-top: 3%; padding-bottom: 3%; background-image: url('<?php echo base_url() . 'assets/templete/picture' ?>/./cool-background.png');">
    <div class="container py-5" style="background-color: white; border-radius: 25px; padding-right: 1.5%; padding-left: 1.5%;  padding-bottom: 4% !important">
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
                <label for="file" id="uploadBtn">เลือกรูปภาพ</label>
            </div><br>
            <!-- profile pictuce -->

            <input type="hidden" name="tus_id" value='<?php echo $arr_tus[0]->tus_id; ?>'>

            <b style="font-size: 30px; text-align: center; padding-bottom: 5%; ">โปรดกรอกข้อมูลของคุณ</b>
            <br><br>
            <div class="row">
                <div class="form-group col-md-2 mb-3" style="margin-top: -30px;">
                    <label for="prefix" class="label">คำนำหน้า</label><br>
                    <select class="form-control mt-1" name="tus_pre_id" id="prefix" style="margin-top: -15px !important; " required>
                        <?php for ($i = 0; $i < count($arr_prefix); $i++) { ?>

                            <option value="<?php echo $i + 1 ?>"><?php echo $arr_prefix[$i]->pre_name ?></option>

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

            <a id="cancel" class="btn btn-secondary" style="color: white; background-color: #777777; font-size: 18px; float: right;" href="<?php echo site_url() . 'Tourist/Auth/Landing_page_tourist'; ?>">ยกเลิก</a>
            <!-- ปุ่มยกเลิก -->
            <button type="submit" id="next_btn" class="btn btn-success" style="margin-right: 10px; color: white; font-size: 18px; float: right;">บันทึก</button>
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