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
<style>
    .s1 {
        background: no-repeat bottom,50% calc(100% - 1px);
        background-size: 0 100%,100% 100%;
        border: 0;
        height: 36px;
        transition: background 0s ease-out;
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
                                    <form>
                                        <!-- กรอกชื่อ -->
                                        <div class="row">   
                                            <div class="col-1">                                   
                                            <label for="prefix" style="color:black">คำนำหน้า</label><br>
                                                <select class="s1" name="ent_pre_id" id="prefix" required>
                                                    <?php for ($i = 0; $i < count($arr_prefix); $i++) { ?>
                                                        <?php if ($arr_ent[0]->ent_pre_id-1 == $i) { ?>
                                                            <option value="<?php echo $i + 1 ?>" selected><?php echo $arr_prefix[$i]->pre_name; ?></option>
                                                        <?php } else { ?>
                                                            <option value="<?php echo $i + 1 ?>"><?php echo $arr_prefix[$i]->pre_name; ?></option>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </select>
                                            </div>                            
                                            <div class="col-5">                                   
                                                <label for="ent_firstname" style="color:black">ชื่อจริง</label>
                                                <input type="text" class="form-control" placeholder="ชื่อภาษาไทย" name='ent_firstname' value='<?php echo $arr_ent[0]->ent_firstname; ?>' required>
                                            </div>
                                            <!-- กรอกนามสกุล -->
                                            <div class="col-5">
                                                <label for="ent_lastname" style="color:black">นามสกุล</label>
                                                <input type="text" class="form-control" placeholder="นามสกุลภาษาไทย" name='ent_lastname' value='<?php echo $arr_ent[0]->ent_lastname; ?>' required>
                                            </div>
                                        </div>
                                        <br>

                                        
                                        <div class="row">
                                            <!-- กรอกเบอร์โทรศัพท์ -->
                                            <div class="col-6">
                                                <label for="ent_tel" style="color:black">เบอร์โทรศัพท์</label>
                                                <input type="text" class="form-control" placeholder="หมายเลขโทรศัพท์" name='ent_tel' value="<?php echo $arr_ent[0]->ent_tel; ?>" required>
                                            </div>
                                            <!-- กรอกวันเกิด -->
                                            <div class="col-5">
                                                <label for="ent_bd" style="color:black">วันเกิด</label>                           
                                                <input type="date" class="form-control" name="ent_birthdate" value="<?php echo $arr_ent[0]->ent_birthdate; ?>" required>
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
                                                <input type="text" class="form-control" placeholder="example@email.com" name='ent_email' value="<?php echo $arr_ent[0]->ent_email; ?>" required>
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