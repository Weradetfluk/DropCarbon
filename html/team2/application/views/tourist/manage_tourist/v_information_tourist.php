<style>
    .radius {
        border-top-left-radius: 25px;
        border-top-right-radius: 25px;
        border-bottom-left-radius: 25px;
        border-bottom-right-radius: 25px;
    }
</style>
<div class="bg-gray">
    <div class="container py-5" style="border-radius: 25px; padding-bottom: 4% !important">
        <ul class="breadcrumb">
            <li><a href="<?php echo site_url() . 'Tourist/Auth/Landing_page_tourist'; ?>" style="color: green;">หน้าหลัก</a></li>
            <li>ข้อมูลส่วนตัว</li>
        </ul>

        <section style="border: 2px solid; width: 1410px; height: 500px;" class="radius">
            <div class="container">
                <h2 class="container"> &nbsp; &nbsp;ข้อมูลส่วนตัว</h2>
                <div class="row">
                    <div class="col">
                        <div class="profile-pic-div">
                            <?php if ($this->session->userdata("tus_img_path") == '') { ?>
                                <img src="<?php echo base_url() . 'assets/templete/picture/' ?>/./person.jpg" id="photo">
                            <?php } else { ?>
                                <img src="<?php echo base_url() . 'profilepicture_tourist/' . $this->session->userdata('tus_img_path'); ?>">
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col">
                        <h3><?php echo $arr_tus[0]->tus_firstname; ?> <?php echo $arr_tus[0]->tus_lastname; ?></h3>
                        <h3>คะแนนของฉัน</h3>
                        <h1 style="display:inline; color: #239d58;"><?php echo $arr_tus[0]->tus_score; ?></h1>
                        <h3 style="display:inline;">แต้ม</h3>
                    </div>
                    <div class="col"></div>
                    <div class="col" style="margin-right: 30px;">
                        <p style="border: 2px solid; width: 350px; height: 250px;"></p>
                        <h3 style="text-align: center;">Drop Carbon Hero</h3>
                    </div>
                </div>
            </div>
        </section>

        <!-- <section>
            <div class="header-break">
                โปรโมชันของฉัน
            </div>
            <?php if (empty($tou_pro[0]->tou_pro_id)) { ?>
            <h4 align="center">ไม่มีข้อมูลโปรโมชันของคุณ</h4>
            <?php } else { ?>

            <div class="container">
                <div class="card">
                    <div class="row">
                        <div class="col">
                            <img src="<?php echo base_url() . 'image_promotions/' . $tou_pro[0]->pro_img_path; ?>" style="border: 2px solid; width: 250px; height: 200px; margin-top: 16px;" id="img_01">
                        </div>
                        <div class="col-7">
                            <p style="margin: 100px 30px; font-size: 28px;"><?php echo substr($tou_pro[0]->pro_description, 0, 100) . "..."; ?></p>
                        </div>
                        <div class="col" style="margin: 100px 30px;">
                            <button class="btn btn-success">ใช้</button>
                        </div>
                    </div>
                </div>
                <p class="align-center"><a href="#">ดูเพิ่มเติม</a></p>
            </div>
            <?php } ?>
        </section> -->

        <section>
            <div class="header-break">
                รางวัลของฉัน
            </div>
            <?php if (empty($rw_pro[0]->ret_rew_id)) { ?>
                <h4 align="center">ไม่มีข้อมูลรางวัลของคุณ</h4>
            <?php } else { ?>
                <div class="container">
                    <div class="card">
                        <div class="row">
                            <div class="col">
                                <img src="<?php echo base_url() . 'image_reward/' . $rw_pro[0]->rew_img_path; ?>" style="border: 2px solid; width: 250px; height: 200px; margin-top: 16px;" id="img_01">
                            </div>
                            <div class="col">
                                <p style="margin-top: 90px; margin-left: 30px; font-size: 28px;"><?php echo $rw_pro[0]->rew_name; ?></p>
                                <p style="margin-left: 30px; font-size: 28px; display:inline; color: #239d58;">500</p>
                                <!-- แต้มยังไม่รู้ว่าเอาจากตารางไหนใน Database -->
                                <p style="display:inline; font-size: 28px;"> แต้ม</p>
                            </div>
                            <div class="col"></div>
                            <div class="col">
                                <button class="btn btn-success" style="margin: 100px 30px;">แลก</button>
                            </div>
                        </div>
                    </div>
                    <p class="align-center"><a href="#">ดูเพิ่มเติม</a></p>
                </div>
            <?php } ?>
        </section>

        <section>
            <div class="header-break">
                ประวัติการเข้าร่วมกิจกรรม
            </div>

            <div class="container">
                <div class="row">
                    <?php for ($i = 0; $i < count($checkin); $i++) { ?>
                        <?php if (count($checkin) < 3) { ?>




                            <div class="col-md-4">
                                <div class="card">
                                    <a href="<?php echo base_url() . 'Landing_page/Landing_page/show_event_detail/' . $checkin[$i]->eve_id; ?>">
                                        <img src="<?php echo base_url() . 'image_event/' . $checkin[$i]->eve_img_path; ?>" class="card-img-top" style="height: 300px;" alt="...">
                                    </a>
                                    <div class="card-body">
                                        <a href="#">
                                            <h3 class="text-decoration-none text-dark"><?php echo $checkin[$i]->eve_name ?></h3>
                                        </a>
                                        <p class="card-text"><?php echo iconv_substr($checkin[$i]->eve_description, 0, 120, "UTF-8") . "..."; ?></p>
                                    </div>
                                </div>
                            </div>




                            <!-- <div class="col-12 col-md-4 mb-4">
                        <div class="card h-100" id="card">
                            <a href="<?php echo base_url() . 'Landing_page/Landing_page/show_event_detail/' . $checkin[$i]->eve_id; ?>">
                                <img src="<?php echo base_url() . 'image_event/' . $checkin[$i]->eve_img_path; ?>" class="card-img-top" style="height: 300px;" alt="...">
                                <div class="card-body" align="center">
                                    <h3 class="text-decoration-none text-dark"><?php echo $checkin[$i]->eve_name ?></h3>
                                    <p class="card-text"><?php echo iconv_substr($checkin[$i]->eve_description, 0, 120, "UTF-8") . "..."; ?></p>
                                </div>
                            </a>
                        </div>
                    </div> -->
                        <?php } ?>
                    <?php } ?>

                </div>
                <?php if (count($checkin) > 3) { ?>
                    <p style="float : right;"><a href="<?php echo base_url() . 'Tourist/Event_tourist/Tourist_event/show_event_list_tourist' ?>">ดูเพิ่มเติม <span class="material-icons">arrow_right_alt</span></a></p>
                <?php } ?>
            </div>
        </section>
    </div>
</div>

<script>
    $(document).ready(function() {
        getLocation();
    });



    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        }
    }

    function showPosition(position) {
        // x.innerHTML = "Latitude: " + position.coords.latitude +
        //     "<br>Longitude: " + position.coords.longitude;
        let user_lat = position.coords.latitude;
        let user_lon = position.coords.longitude;

        <?php
        if (isset($_SESSION['number_event'])) {
            echo "get_data_event_ajax(user_lat, user_lon);";
        }
        ?>
    }


    function get_data_event_ajax(user_lat, user_lon) {

        $.ajax({
            type: 'post',
            dataType: 'JSON',
            url: '<?php echo base_url('Tourist/Checkin_event/Checkin_event/load_data_checkin_ajax/') . $_SESSION['number_event']; ?>',

            success: function(json_data) {
                console.log(json_data['arr_event'][0]['eve_lat']);
                <?php
                // unset($_SESSION['QR_confirm']);
                unset($_SESSION['number_event']);
                ?>

                if ((user_lat == json_data['arr_event'][0]['eve_lat']) && (user_lon == json_data['arr_event'][0]['eve_lon'])) {
                       console.log("OK");
                }else{
                    let distance = cal_distance(user_lat, user_lon, json_data['arr_event'][0]['eve_lat'], json_data['arr_event'][0]['eve_lon']);
                    
                    if(distance < 0.5){
                        console.log("ok");    
                    }else{

                    }
                }

            },
            error: function() {
                alert('ajax get data error');
            }
        });

    }



    function cal_distance(user_lat, user_lon, eve_lat, eve_lon){
        var R = 6371; // km
      var duser_lat = to_rad(eve_lat-user_lat);
      var duser_lon = to_rad(eve_lon-user_lon);
      var user_lat = to_rad(user_lat);
      var user_lon = to_rad(user_lon);

      var a = Math.sin(duser_lat/2) * Math.sin(duser_lat/2) +
        Math.sin(duser_lon/2) * Math.sin(duser_lon/2) * Math.cos(user_lat) * Math.cos(eve_lat); 
      var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
      var distance = R * c;
      return distance;
    }

    function to_rad(value) 
    {
        return value * Math.PI / 180;
    }



    
    function checkin_or_check_out(){
        $.ajax({
            type: 'post',
            dataType: 'JSON',
            url: '<?php echo base_url('Tourist/Checkin_event/Checkin_event/load_data_checkin_ajax/') . $_SESSION['number_event']; ?>',

            success: function(json_data) {
                console.log(json_data['arr_event'][0]['eve_lat']);
                <?php
                // unset($_SESSION['QR_confirm']);
                unset($_SESSION['number_event']);
                ?>

                if ((user_lat == json_data['arr_event'][0]['eve_lat']) && (user_lon == json_data['arr_event'][0]['eve_lon'])) {
                       console.log("OK");
                }else{
                    let distance = cal_distance(user_lat, user_lon, json_data['arr_event'][0]['eve_lat'], json_data['arr_event'][0]['eve_lon']);
                    
                    if(distance < 0.5){
                        console.log("ok");    
                    }else{

                    }
                }

            },
            error: function() {
                alert('ajax get data error');
            }
        });
    }
</script>