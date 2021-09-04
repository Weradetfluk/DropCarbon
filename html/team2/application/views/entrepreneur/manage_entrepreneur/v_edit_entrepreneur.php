<!-- 
/*
* v_edit_entrepreneur
* Display form edit entrepreneur
* @input ent_pre_id, ent_firstname, ent_lastname, ent_tel, ent_email
* @output form edit entrepreneur
* @author Thanchanok Thongjumroon 62160089
* @Create Date 2564-07-24
*/ 
-->

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2)">
                    <div class="card-header card-header-info">
                        <center style="font-weight: bold; font-size: 150%;">แก้ไขข้อมูลของผู้ประกอบการ</center>
                    </div>
                    <div class="card-body">
                        <b>ข้อมูลของคุณ</b><br><br>
                        <form action="<?php echo site_url() . 'Entrepreneur/Manage_entrepreneur/Entrepreneur_edit/update_entrepreneur'; ?>" method="POST">
                            <div class="w3-row">
                                <div class="w3-container w3-twothird con">
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

                                        <input type="radio" name="ent_pre_id" value=1 <?php echo $checked_prefix_1 ?>>
                                        <label style="color:black">นาย</label>
                                        <input type="radio" name="ent_pre_id" value=2 <?php echo $checked_prefix_2 ?>>
                                        <label style="color:black">นาง</label>
                                        <input type="radio" name="ent_pre_id" value=3 <?php echo $checked_prefix_3 ?>>
                                        <label style="color:black">นางสาว</label>
                                    </div><br>

                                    <form>
                                        <!-- กรอกชื่อ -->
                                        <div class="row">
                                            <div class="col-4">
                                                <label for="ent_firstname" style="color:black">ชื่อจริง</label>
                                                <input type="text" class="form-control" placeholder="ชื่อภาษาไทย" name='ent_firstname' value='<?php echo $arr_ent[0]->ent_firstname; ?>' required>
                                            </div>

                                            <!-- กรอกนามสกุล -->
                                            <div class="col-4">
                                                <label for="ent_lastname" style="color:black">นามสกุล</label>
                                                <input type="text" class="form-control" placeholder="นามสกุลภาษาไทย" name='ent_lastname' value='<?php echo $arr_ent[0]->ent_lastname; ?>' required>
                                            </div>
                                        </div>
                                        <br>

                                        <!-- กรอกเบอร์โทรศัพท์ -->
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="ent_tel" style="color:black">เบอร์โทรศัพท์</label>
                                                <input type="text" class="form-control" placeholder="หมายเลขโทรศัพท์" name='ent_tel' value="<?php echo $arr_ent[0]->ent_tel; ?>" required>
                                            </div>
                                        </div>
                                        <br>

                                        <!-- กรอกหมายเลขบัตรประชาชน -->
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="ent_id_card" style="color:black">เลขบัตรประชาชน</label>
                                                <input type="text" class="form-control" placeholder="หมายเลขบัตรประชาชน" name='ent_id_card' value="<?php echo $arr_ent[0]->ent_id_card; ?>" disabled>
                                            </div>
                                        </div>
                                        <br>

                                        <!-- กรอกอีเมล -->
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="ent_email" style="color:black">อีเมล</label>
                                                <input type="text" class="form-control" placeholder="E-mail" name='ent_email' value="<?php echo $arr_ent[0]->ent_email; ?>" required>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                                <br>


                                <div style="text-align: right;">
                                    <input type="submit" class="btn btn-success" value="บันทึก"></input>
                                    <a class="btn btn-secondary" style="color: white; background-color: #777777;" href="<?php echo site_url() . 'Entrepreneur/Manage_company/Company_list/show_list_company'; ?>">ยกเลิก
                                    </a>
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
    });
</script>