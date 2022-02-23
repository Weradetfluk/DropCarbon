<!-- 
/*
* v_list_promotion
* Display list promotion
* @input pro_cat, promotions 
* @output list promotion
* @author Chutipon Thermsirisuksin 62160081
* @Create Date 2564-10-02
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
        <li class="colorchange">ดูรายการโปรโมชันและรางวัล</li>
    </ul>
    <div class="row text-left py-3">
        <div class="m-auto">
            <h1 class="h1" style="padding-bottom: 2%">โปรโมชันและรางวัล</h1>
        </div>
    </div>
    <!-- โปรโมชันทั้งหมด -->
    <?php
    $value_search = isset($_POST["value_search"]) ? $_POST["value_search"] : "";
    ?>
    <form action="<?= site_url() ?>Landing_page/Landing_page/show_promotions_list" class="" method="post">
        <div class="row justify-content-md-center" style="margin: 0px 0px 30px 0px;">
            <div class="col-md-4">
                <input type="text" value="<?= $value_search ?>" id="search_box" name="value_search" class="form-control form-control-custom" placeholder="ค้นหา">
            </div>
            <div class="col-md-2">
                <select class="form-control form-control-custom" name="pro_cat_id" id="pro_cat_id">
                    <option value="">เลือกทั้งหมด</option>
                    <?php for ($i = 0; $i < count($pro_cat); $i++) { ?>
                    <?php $selected = $_POST["pro_cat_id"] == $pro_cat[$i]->pro_cat_id ? "selected" : ""; ?>
                    <option value="<?php echo $pro_cat[$i]->pro_cat_id ?>" <?= $selected ?>>
                        <?php echo $pro_cat[$i]->pro_cat_name; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-custom">ค้นหา</button>
            </div>
        </div>
    </form>

    <?php if($this->session->has_userdata("tourist_id")){?>
    <div class="row">
        <div class="col"> 
            <input type="checkbox" id="exchangeable" onclick="check_pro_exchangeable(1)"> แสดงของรางวัลที่เเลกได้เท่านั้น
        </div> 
    </div>
    <?php }?>
    <div class="row py-3" id="loop_promotions">
        <input type="hidden" id="tus_score" value="<?php echo $this->session->userdata("tus_score")?>">
    </div>
</div>
<script>
    var tus_score = $("#tus_score").val();
    $(document).ready(function() {
        let session_tus_id = '<?php echo $this->session->userdata("tourist_id")?>';
        check_pro_exchangeable(session_tus_id);
    });
    /* check_pro_exchangeable
    * check promotion exchangeable
    * @input -
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2565-01-14
    * @Update -
    */
    function check_pro_exchangeable(session_tus_id){
        let arr_promotion = <?php echo json_encode($promotions)?>;
        let html = '';
        if(session_tus_id){
            let check_box = document.getElementById('exchangeable').checked;
            if(check_box){
                for(let i = 0; i < arr_promotion.length; i++){
                    if(arr_promotion[i].pro_point <= tus_score && arr_promotion[i].pro_cat_id == 2){
                        console.log(1.1);
                        html += "<div class='col-12 col-sm-6 col-md-4 col-lg-4 py-2'>";
                        html += "<a href='<?php echo base_url() . 'Landing_page/Landing_page/show_promotions_detail/'?>" + arr_promotion[i].pro_id + "'>";
                        html += "<div class='card card-custom' style='height: 30rem;' id='card'>";
                        html += "<img src='<?php echo base_url() . 'image_promotions/'?>" + arr_promotion[i].pro_img_path + "' class='card-img-top' style='height: 300px; object-fit: cover;' alt='...'>";
                        html += "<div class='card-body' align='center'>";
                        html += "<h3 class='text-decoration-none text-dark'>" + arr_promotion[i].pro_name + "</h3>";
                        html += "<p class='card-tex text-dark'>";
                        html += "</p>";
                        html += "<p class='text-decoration-none' style='display:inline; font-size: 16px; color: #008000'> คะแนนที่ใช้แลก </p>";
                        html += "<p class='text-decoration-none' style='display:inline; font-size: 16px; color: #008000'>" + arr_promotion[i].pro_point +  "คะแนน</p>";
                        html += "</div>";
                        html += "</div>";
                        html += "</div>";
                    }
                }
            }else{
                for(let i = 0; i < arr_promotion.length; i++){
                    html += "<div class='col-12 col-sm-6 col-md-4 col-lg-4 py-2'>";
                    html += "<a href='<?php echo base_url() . 'Landing_page/Landing_page/show_promotions_detail/'?>" + arr_promotion[i].pro_id + "'>";
                    html += "<div class='card card-custom' style='height: 30rem;' id='card'>";
                    html += "<img src='<?php echo base_url() . 'image_promotions/'?>" + arr_promotion[i].pro_img_path + "' class='card-img-top' style='height: 300px; object-fit: cover;' alt='...'>";
                    html += "<div class='card-body' align='center'>";
                    html += "<h3 class='text-decoration-none text-dark'>" + arr_promotion[i].pro_name + "</h3>";
                    html += "<p class='card-tex text-dark'>";
                    html += "</p>";
                    if(arr_promotion[i].pro_cat_id == 2){
                        html += "<p class='text-decoration-none' style='display:inline; font-size: 16px; color: #008000'> คะแนนที่ใช้แลก </p>";
                        html += "<p class='text-decoration-none' style='display:inline; font-size: 16px; color: #008000'>" + arr_promotion[i].pro_point +  "คะแนน</p>";
                    }
                    html += "</div>";
                    html += "</div>";
                    html += "</div>";
                }
            }
        }else{
            for(let i = 0; i < arr_promotion.length; i++){
                html += "<div class='col-12 col-sm-6 col-md-4 col-lg-4 py-2'>";
                html += "<a href='<?php echo base_url() . 'Landing_page/Landing_page/show_promotions_detail/'?>" + arr_promotion[i].pro_id + "'>";
                html += "<div class='card card-custom' style='height: 30rem;' id='card'>";
                html += "<img src='<?php echo base_url() . 'image_promotions/'?>" + arr_promotion[i].pro_img_path + "' class='card-img-top' style='height: 300px; object-fit: cover;' alt='...'>";
                html += "<div class='card-body' align='center'>";
                html += "<h3 class='text-decoration-none text-dark'>" + arr_promotion[i].pro_name + "</h3>";
                html += "<p class='card-tex text-dark'>";
                html += "</p>";
                if(arr_promotion[i].pro_cat_id == 2){
                    html += "<p class='text-decoration-none' style='display:inline; font-size: 16px; color: #008000'> คะแนนที่ใช้แลก </p>";
                    html += "<p class='text-decoration-none' style='display:inline; font-size: 16px; color: #008000'>" + arr_promotion[i].pro_point +  "คะแนน</p>";
                }
                html += "</div>";
                html += "</div>";
                html += "</div>";
            }
        }
        
        $('#loop_promotions').html(html);
    }
</script>