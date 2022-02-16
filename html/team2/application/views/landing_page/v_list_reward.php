<!-- 
/*
* v_list_reward
* Display list reward
* @input  reward 
* @output list reward
* @author Thanisorn thumsawanit 62160088
* @Create Date 2565-01-03
*/ 
-->

<style>
.card-custom {
    border-radius: 20px;
}

.card-img-top {
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
    height: 300px;
    object-fit: cover;
}
</style>

<div class="container py-5 section-com">
    <ul class="breadcrumb">
        <li><a href="<?php echo base_url()?>" style="color: green;">หน้าหลัก</a></li>
        <li><a href="<?php echo base_url() . 'Tourist/Manage_tourist/Tourist_manage/show_information_tourist'?>" style="color: green;">ข้อมูลส่วนตัว</a></li>
        <li class="colorchange">รางวัลของคุณ</li>
    </ul>
    <div class="row text-left py-3">
        <div class="m-auto">
            <h1 class="h1" style="padding-bottom: 2%">รางวัลของคุณ</h1>
        </div>
    </div>

    <section>
            <div>
            </div>
            <?php if (empty($tou_pro[0]->tou_pro_id)) { ?>
            <h4 align="center">ไม่มีข้อมูลรางวัลของคุณ</h4>
            <?php } else { ?>
                <?php for ($i = 0; $i < count($tou_pro); $i++) { ?>
            <div class="container">
                <div class="card">
                    <div class="row">
                        <div class="col">
                            <img src="<?php echo base_url() . 'image_promotions/' . $tou_pro[$i]->pro_img_path; ?>" style="border: 2px solid; width: 250px; height: 200px; margin-top: 35px; margin-left: 35px;" id="img_01">
                        </div>
                        <div class="col-7">
                            <p style="margin: 100px 30px; font-size: 28px;"><?php echo $tou_pro[$i]->pro_name; ?><br><br><?php echo substr($tou_pro[$i]->pro_description, 0, 100) . "..."; ?></p>
                            <!-- <p style="margin: 10px 10px; font-size: 20px;"><?php echo substr($tou_pro[$i]->pro_description, 0, 100) . "..."; ?></p> -->
                        </div>
                        <div class="col" style="margin: 100px 30px;">
                        <button type="submit"class="btn btn-primary btn-lg" onclick="confirm_use_reward(<?php echo $tou_pro[$i]->tou_id ?>)">ใช้</button>
                    </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <?php } ?> 
        </section>
<!-- modal use reward  -->
<div class="modal" tabindex="-1" role="dialog" id="modal_use">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-family: 'Prompt', sans-serif !important;">แจ้งเตือน</h5>
            </div>
            <div class="modal-body">
                <p>คุณต้องการที่จะใช้รางวัลนี้หรือไม่ <span id="use"></span> ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="use_btn" data-dismiss="modal">ยืนยัน</button>
                <button type="button" class="btn btn-secondary" style="color: white; background-color: #777777;"
                    data-dismiss="modal">ยกเลิก</button>
            </div>
        </div>
    </div>
</div>

<script>
/*
 * confirm_use
 * confirm use reward
 * @input tou_id
 * @output modal comfirm use reward
 * @author Thanisorn thumsawanit 62160088
 * @Create Date 2565-01-04
 */
function confirm_use_reward(tou_id) {
    $('#use').text();
    $('#modal_use').modal();

    // button
    $('#use_btn').click(function() {
        use_reward_ajax(tou_id)
    });
}

/*
 * use_reward_ajax
 * use_reward
 * @input tou_id
 * @output use_reward
 * @author Thanisorn thumsawanit 62160088
 * @Create Date 2565-01-04
 */
function use_reward_ajax(tou_id) {
    console.log(tou_id);
    $.ajax({
        type: "POST",
        data: {
            tou_id: tou_id
        },
        url: '<?php echo site_url() . 'Tourist/Manage_tourist/Tourist_manage/use_reward_ajax/' ?>',
        success: function() {
            swal({
                    title: "ใช้ของรางวัล",
                    text: "คุณได้ทำการใช้ของรางวัลเสร็จสิ้น",
                    type: "success"
                },
                function() {
                    location.reload();
                })

        },
        error: function() {
            alert('ajax error working');
        }
    });

}
</script>