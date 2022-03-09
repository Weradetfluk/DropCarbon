 <!-- 
/*
* v_checkin_event
* Display checkin page
* @input -
* @output checkin page
* @author weradet nopsombun 62160110
* @Create Date 2564-10-12
*/ 
-->
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
                 <div class="col text-center" style="text-align: center; display: none;" id="check_in">
                     <div class="icon-shape bg-success" style="margin-left: auto; margin-right: auto;">
                         <i class="material-icons custom-icon">room</i>
                     </div>
                 </div>
                 <div class="col text-center" style="text-align: center; display: none;" id="check_out">
                     <div class="icon-shape bg-success" style="margin-left: auto; margin-right: auto;">
                         <i class="material-icons custom-icon">check</i>
                     </div>
                 </div>

             </div>
             <div class="row">
                 <div class="col">
                     <h2 class="text-center py-2" style="display: none;" id="checkout_header">เช็คเอาต์แล้ว</h2>
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

             <div class="row">
                 <div class="col text-center">
                     <a href="<?php echo base_url() . 'Tourist/Checkin_event/Checkin_event/show_page_checkin'  ?>" class="btn btn-primary">ตกลง</a>
                 </div>
             </div>
         </div>
     </section>
 </div>




 <script>
     $(document).ready(function() {
         get_location();
     });
     /*
      *get_location
      *get user location
      *@input eve_id 
      *@output -
      *@author Weradet Nopsombun 62160110
      *@Create Date 2564-09-26
      */
     function get_location() {
         navigator.geolocation.getCurrentPosition((position) => {
             let user_lat = position.coords.latitude; // my lat position
             let user_lon = position.coords.longitude; // my lon position 
             <?php
                if (isset($_SESSION['eve_id'])) { // มี seesion ที่มีจาก QR Code ไหม
                    echo "let eve_id = " . $_SESSION['eve_id'] . ";"; // ให้ number
                    echo "get_data_event_ajax(user_lat, user_lon, eve_id);"; // call function js 
                } else {
                    echo "window.location.href = '" . base_url('') . "';"; // ไม่มี ก็เด้ง ไปหน้า Landing page 
                }
                ?>
            //    console.log(eve_id + " "  + eve_point + " " + eve_lat + " " + eve_lon);
         });
     }
     /*
      *get_data_event_ajax
      *get data event with session QR CODE
      *@input eve_id 
      *@output -
      *@author Weradet Nopsombun 62160110
      *@Create Date 2564-10-13
      */
     function get_data_event_ajax(user_lat, user_lon, number_event) {
         $.ajax({
             type: 'post',
             dataType: 'JSON',
             url: "<?php echo base_url('Tourist/Checkin_event/Checkin_event/load_data_checkin_ajax/') ?>" +
                 number_event,
             success: function(json_data) {
                 if ((user_lat == json_data['arr_event'][0]['eve_lat']) && (user_lon == json_data['arr_event'][0]
                         ['eve_lon'])) {
                     // กรณีที่เดียวกัน
                     checkin_or_check_out(json_data['arr_event'][0]['eve_id'], json_data['arr_event'][0][
                         'eve_name'
                     ], json_data['arr_event'][0]['eve_point']);
                     get_point_and_show
                         (); // เรียกใช้ ฟังก์ชัน  update piont ใน Javascript_tourist เพื่อ แสดง คะแนนล่าสุด
                 } else {
                     //ต้องคำนวณระยะห่าง
                     let distance = cal_distance(user_lat, user_lon, json_data['arr_event'][0]['eve_lat'],
                         json_data['arr_event'][0]['eve_lon']);
                     if (distance < 0.5) {
                         //ระยะห่าง ต่ำกว่า 500m
                         checkin_or_check_out(json_data['arr_event'][0]['eve_id'], json_data['arr_event'][0][
                             'eve_name'
                         ], json_data['arr_event'][0]['eve_point']); // call function checkin 
                         get_point_and_show
                             (); // เรียกใช้ ฟังก์ชัน  update piont ใน Javascript_tourist เพื่อ แสดง คะแนนล่าสุด
                     } else {
                         //กรณี Error
                         err_shape.style.display = 'block';
                         err_header.style.display = 'block';
                         err_detail.style.display = 'block';
                         //unset session QR
                         <?php unset($_SESSION['eve_id']); ?>
                     }
                 }
             },
             error: function() {
                 alert('ajax get data error');
             }
         });
     }
     /*
      *cal_distance
      *calcuate distance with userlat,lon and event lat,lon
      *@input eve_id 
      *@output -
      *@author Weradet Nopsombun 62160110
      *@Create Date 2564-10-13
      */
     function cal_distance(user_lat, user_lon, eve_lat, eve_lon) {
         //ref. http://thabot47.blogspot.com/2010/12/blog-post.html
         var R = 6371; // km //รัศมีโลก หน่วย km
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
     /*
      *to_rad
      *return to rad 
      *@input value 
      *@output -
      *@author Weradet Nopsombun 62160110
      *@Create Date 2564-10-13
      */
     function to_rad(value) {
         return value * Math.PI / 180;
     }
     /*
      *checkin_or_check_out
      *checkin and checkout  
      *@input eve_id 
      *@output -
      *@author Weradet Nopsombun 62160110
      *@Create Date 2564-10-13
      */
     function checkin_or_check_out(eve_id, eve_name, eve_point) {
         $.ajax({
             type: 'post',
             dataType: 'JSON',
             data: {
                 eve_id: eve_id,
                 eve_point: eve_point
             },
             url: '<?php echo base_url('Tourist/Checkin_event/Checkin_event/checkin_or_checkout_event') ?>',

             success: function(json_data) {

                 let format_date = format_date_time(json_data['date_now']);

                 if (json_data['json_message'] == "check-in") {

                     //check in show
                     check_in.style.display = 'block';
                     checkin_header.style.display = 'block';

                     document.getElementById("eve_name").textContent = eve_name;
                     document.getElementById("time_checkin").textContent = format_date + " " + json_data[
                         'time_now'];
                 } else {
                     //check out show 
                     check_out.style.display = 'block';
                     checkout_header.style.display = 'block';
                     document.getElementById("eve_name").textContent = eve_name;
                     document.getElementById("time_checkin").textContent = format_date + " " + json_data[
                         'time_now'];
                 }
             },
             error: function() {
                 alert('ajax get data error');
             }
         });
     }
     /*
      *format_date_time
      *format date and time  
      *@input eve_id 
      *@output -
      *@author Weradet Nopsombun 62160110
      *@Create Date 2564-10-13
      */
     function format_date_time(old_date) {
         let month_name = ["มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน",
             "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
         ];

         let year = old_date.substr(0, old_date.indexOf("-"));

         let year_thai = parseInt(year) + 543;
         let month = old_date.substr(old_date.indexOf("-") + 1, 2);
         let day = old_date.substr(old_date.indexOf("-") + 4, 2);

         // console.log(old_date_sub);

         let format = day + " " + month_name[month - 1] + " " + year_thai;
         console.log(format);

         return format;
     }
 </script>