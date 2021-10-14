<style>
    .icon-shape {
        border-radius: 50%;
        color: #fff;
        width: 200px;
        height: 200px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 25px;
        box-shadow: 0 0 2rem 0 rgba(136, 152, 170, .15) !important;
        text-align: center;
    }

    .icon-area {
        background: #fba004;
    }

    .custom-icon {
        font-size: 100px !important;
    }
</style>


<div class="bg-white">
    <section>
        <div class="container py-5">
            <div class="row">
                <div class="col text-center" style="text-align: center; display: none;" id="err_shape">
                    <div class="icon-shape icon-area" style="margin-left: auto; margin-right: auto;">
                        <i class="material-icons custom-icon">cancel</i>
                    </div>
                </div>
                <div class="col text-center" style="text-align: center; display: none;">
                    <div class="icon-shape bg-success" style="margin-left: auto; margin-right: auto;">
                        <i class="material-icons custom-icon">room</i>
                    </div>
                </div>
                <div class="col text-center" style="text-align: center; display: none;">
                    <div class="icon-shape bg-success" style="margin-left: auto; margin-right: auto;">
                        <i class="material-icons custom-icon">check</i>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col">
                    <h2 class="text-center py-2" style="display: none;">เช็คเอาท์แล้ว</h2>
                    <h2 class="text-center py-2" style="display: none;" id="checkin_header">เช็คอินแล้ว</h2>
                    <h2 class="text-center py-2" style="display: none;" id="err_header">ไม่สามารถเช็คอินได้</h2>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h3 class="text-center" id="eve_name"></h3>
                    <h3 class="text-center" id="err_detail" style="display: none;">มีข้อผิดพลาดกิดขึ้น</h3>
                    <p class="text-center" id="time_checkin"></p>
                </div>
            </div>



        </div>
    </section>
</div>




<script>
    $(document).ready(function() {
        get_location();

    });

    function get_location() {
        navigator.geolocation.getCurrentPosition((position) => {
            let user_lat = position.coords.latitude;
            let user_lon = position.coords.longitude;
            <?php
            if (isset($_SESSION['number_event'])) {
                echo "let number_event = " . $_SESSION['number_event'] . ";";
                echo "get_data_event_ajax(user_lat, user_lon, number_event);";
            } else {
                echo "window.location.href = 'http://www.google.com';";
            }
            ?>
        });
    }

    function get_data_event_ajax(user_lat, user_lon, number_event) {
        $.ajax({
            type: 'post',
            dataType: 'JSON',
            url: "<?php echo base_url('Tourist/Checkin_event/Checkin_event/load_data_checkin_ajax/') ?>" + number_event,
            success: function(json_data) {
                console.log(json_data);


                if ((user_lat == json_data['arr_event'][0]['eve_lat']) && (user_lon == json_data['arr_event'][0]['eve_lon'])) {
                    // กรณีที่เดียวกัน
                    console.log("OK");
                } else {
                    //ต้องคำนวณระยะห่าง
                    let distance = cal_distance(user_lat, user_lon, json_data['arr_event'][0]['eve_lat'], json_data['arr_event'][0]['eve_lon']);

                    if (distance < 0.5) {
                        //ระยะห่าง ต่ำกว่า 500m
                        console.log("ok");
                        checkin_or_check_out(json_data['arr_event'][0]['eve_id'], json_data['arr_event'][0]['eve_name'])
                    } else {
                        //กรณี Error
                        err_shape.style.display = 'block';
                        err_header.style.display = 'block';
                        err_detail.style.display = 'block';
                    }
                }
            },
            error: function() {
                alert('ajax get data error');
            }
        });

    }



    function cal_distance(user_lat, user_lon, eve_lat, eve_lon) {
        var R = 6371; // km
        var duser_lat = to_rad(eve_lat - user_lat);
        var duser_lon = to_rad(eve_lon - user_lon);
        var user_lat = to_rad(user_lat);
        var user_lon = to_rad(user_lon);

        var a = Math.sin(duser_lat / 2) * Math.sin(duser_lat / 2) +
            Math.sin(duser_lon / 2) * Math.sin(duser_lon / 2) * Math.cos(user_lat) * Math.cos(eve_lat);
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
        var distance = R * c;
        return distance;
    }

    function to_rad(value) {
        return value * Math.PI / 180;
    }




    function checkin_or_check_out(eve_id, eve_name) {
        //   alert(eve_id + eve_name);
        $.ajax({
            type: 'post',
            dataType: 'JSON',
            data: {
                eve_id: eve_id
            },
            url: '<?php echo base_url('Tourist/Checkin_event/Checkin_event/checkin_or_checkout_event') ?>',

            success: function(json_data) {

               console.log(json_data);

            },
            error: function() {
                alert('ajax get data error');
            }
        });
    }
</script>