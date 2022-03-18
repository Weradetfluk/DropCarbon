<!-- 
/*
* v_reward_history
* Display reward using history page
* @input -
* @output list promotion
* @author Thanisorn thumsawanit 62160088
* @Create Date 2564-03-10
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
        <li class="colorchange">ดูประวัติการใช้งานของรางวัล</li>
    </ul>
    <div class="row text-left py-3">
        <div class="m-auto">
            <h1 class="h1" style="padding-bottom: 2%">ประวัติการใช้งานของรางวัล</h1>
        </div>
    </div>
    <div>
    </div>
        <section>
                <?php if (empty($tou_pro[0]->tou_pro_status)) { ?>
                    <h4 align="center">ไม่มีประวัติการใช้งานของรางวัล</h4>
                <?php } else{ ?>
            <div class='row py-3'>  
                <?php for ($i = 0; $i < count($tou_pro); $i++) { ?>
            <div class='col-12 col-sm-6 col-md-4 col-lg-4 py-2'>
                <div class='card card-custom' style='height: 30rem;' id='card'>
                    <img src="<?php echo base_url() . 'image_promotions/' . $tou_pro[$i]->pro_img_path; ?>" class='card-img-top' style='height: 300px; object-fit: cover;' alt='...'>
                        <div class='card-body' align='center'>
                    <h3 class="text-decoration-none text-dark"><?php echo $tou_pro[$i]->pro_name; ?></h3>
                </div>    
                    </div>
                </div>
                <?php } ?>
                </div>
            <?php } ?>
    </section>
</div>
<script>
    
</script>