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
        <?php if ($this->session->userdata("tourist_id")) { ?>
        <li><a href="<?php echo base_url() . 'Tourist/Auth/Landing_page_tourist' ?>" style="color: green;">หน้าหลัก</a></li>
        <?php } ?>
        <?php if (!$this->session->userdata("tourist_id")) { ?>
        <li><a href="<?php echo base_url() ?>" style="color: green;">ข้อมูลส่วนตัว</a></li>
        <?php } ?>
        <li class="colorchange">รางวัลของคุณ</li>
    </ul>
    <div class="row text-left py-3">
        <div class="m-auto">
            <h1 class="h1" style="padding-bottom: 2%">รางวัลของคุณ</h1>
        </div>
    </div>