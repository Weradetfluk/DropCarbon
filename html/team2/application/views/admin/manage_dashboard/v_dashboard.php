<!-- 
/*
* v_dashboard.php
* Display dashboard
* @input -
* @output Display dashboard in admin menu
* @author weradet nopsombun 62160110
* @Create Date 2564-08-08
*/ 
-->
<style>
.custom-card {
    box-shadow: 0 .15rem 1.75rem 0 rgba(58, 59, 69, .15);
}
</style>
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col">
                <h3 class="text-dark custom-h4-card-table" style="margin-top : 0 auto;">แผงควบคุมผู้ดูแลระบบ</h3>
            </div>
        </div>


        <!-- ส่วนของการ์ดด้านบน -->
        <div class="row">
            <div class="col-lg-3 col-md-6">

                <!-- การ์ดสมาชิกนักท่องเที่ยว -->
                <div class="card" class="custom-card">
                    <div class="card-body border-left-yellow">
                        <div class="row">
                            <div class="col">
                                <p class="card-title text-title">สมาชิกนักท่องเที่ยว</p>
                                <h2 class="card-text text-amount" id="tourist_number"></h2>
                            </div>
                            <div class="col-auto">
                                <div class="icon-shape icon-area">
                                    <i class="material-icons custom-icon">person</i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <!-- การ์ดสมาชิกผู้ประกอบการ -->
                <div class="card" class="custom-card">
                    <div class="card-body border-left-green">
                        <div class="row">
                            <div class="col">
                                <p class="card-title text-title">ผู้ประกอบการ</p>
                                <h2 class="card-text" id="entrepreneur_number"></h2>

                            </div>
                            <div class="col-auto">
                                <div class="icon-shape bg-success">
                                    <i class="material-icons custom-icon">account_box</i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">

                <!-- การ์ดสถานที่ท่องเที่ยว -->
                <div class="card" class="custom-card">
                    <div class="card-body border-left-red">
                        <div class="row">
                            <div class="col">
                                <p class="card-title text-title">สถานที่</p>
                                <h2 class="card-text text-amount" id="company_number"></h2>
                            </div>
                            <div class="col-auto">
                                <div class="icon-shape bg-danger">
                                    <i class="material-icons custom-icon">store</i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">

                <!-- การ์ดกิจกรรม -->
                <div class="card">
                    <div class="card-body border-left-purple" class="custom-card">
                        <div class="row">
                            <div class="col">
                                <p class="card-title text-title">กิจกรรม</p>
                                <h3 class="card-text text-amount" id="event_number"></h3>
                            </div>
                            <div class="col-auto">
                                <div class="icon-shape icon-purple">
                                    <i class="material-icons custom-icon">calendar_today</i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: -30px;">
            <div class="col-sm">

                <!-- การ์ดโปรโมชั่น -->
                <div class="card">
                    <div class="card-body border-left-yellow">
                        <div class="row">
                            <div class="col">
                                <p class="card-title text-title">โปรโมชัน</p>
                                <h2 class="card-text text-amount" id="promotion_number"></h2>
                            </div>
                            <div class="col-auto">
                                <div class="icon-shape icon-area">
                                    <i class="material-icons custom-icon">point_of_sale</i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm">



                <!-- การ์ดกิจกรรมผู้ดูแลระบบ -->
                <div class="card">
                    <div class="card-body border-left-green">
                        <div class="row">
                            <div class="col">
                                <p class="card-title text-title">กิจกรรมผู้ดูระบบ</p>
                                <h3 class="card-text" id="event_admin_number">3 กิจกรรม</h3>

                            </div>
                            <div class="col-auto">
                                <div class="icon-shape bg-success">
                                    <i class="material-icons custom-icon">event_note</i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm">

                <!-- การ์ดโปรแกรมผู้ดูแลระบบ -->
                <div class="card">
                    <div class="card-body border-left-red">
                        <div class="row">
                            <div class="col">
                                <p class="card-title text-title">โปรโมชันผู้ดูแลระบบ</p>
                                <h3 class="card-text text-amount" id="pro_admin_number">3 โปรโมชัน</h3>
                            </div>
                            <div class="col-auto">
                                <div class="icon-shape bg-danger">
                                    <i class="material-icons custom-icon">receipt</i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- fiter -->
        <div class="card">
            <div class="card-header custom-header-tab">
                <h5 class="text-white">ค้นหา</h5>
            </div>



            <div class="card-body">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm">
                            <h5>แสดง</h5>
                        </div>
                        <div class="col-sm">
                            <input class="form-check-input" type="checkbox" value="" checked id="event_checkbox">
                            <label class="form-check-label" for="defaultCheck1">
                                ประเภทของกิจกรรม
                            </label>
                        </div>
                        <div class="col-sm">
                            <input class="form-check-input" type="checkbox" value="" id="checkin_checkbox">
                            <label class="form-check-label" for="defaultCheck1">
                                การเช็คอินกิจกรรม
                            </label>
                        </div>
                        <div class="col-sm">
                            <input class="form-check-input" type="checkbox" value="" id="register_checkbox">
                            <label class="form-check-label" for="defaultCheck1">
                                การสมัครบัญชีผู้ใช้
                            </label>
                        </div>
                        <div class="col-sm">
                            <input class="form-check-input" type="checkbox" value="" id="promotion_checkbox">
                            <label class="form-check-label" for="defaultCheck1">
                                โปรโมชันยอดนิยม
                            </label>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-2">
                            <h5>วันที่</h5>
                        </div>
                        <div class="col-sm">
                            <input type="text" id="date" class="form-control" value="<?php echo get_date_mouth() . '-01 - ' . get_date_today() ?>">
                        </div>
                    </div>
                    <hr>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <button type="button" style="float: right;" id="submit" class="btn btn-success">ค้นหา</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- กราฟประเภทกิจกรรมที่คนสนใจมากที่สุด (ภายในเป็นกิจกรรมของแต่ละประเภท) -->

        <div class="row">
            <div class="col">
                <div class="card" id="card_event">
                    <div class="card-header custom-header-tab text-center">
                        <h5 class="text-white">ประเภทกิจกรรมที่คนสนใจมากที่สุด</h5>
                    </div>
                    <!-- Tab1 -->
                    <div class="card-body">
                        <div class="card-body">
                            <div class="chart_event" id="event">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- กราฟเปอร์เซ็นความนิยิม ของประเภทที่คนสนใจมากที่สุด -->
            <div class="col">
                <div class="card" id="card_event_pie">
                    <div class="card-header custom-header-tab text-center">
                        <h5 class="text-white">เปอร์เซ็นความนิยมของประเภทกิจกรรม</h5>
                    </div>
                    <!-- Tab1 -->
                    <div class="card-body">
                        <div class="card-body">
                            <div class="chart_event_pie" id="chart_event_pie">

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <!-- การเช็คอินกิจกรรม -->
        <div class="card" id="card_checkin">
            <div class="card-header custom-header-tab text-center">
                <h5 class="text-white">การเช็คอินกิจกรรม</h5>
            </div>
            <!-- Tab1 -->
            <div class="card-body">
                <div class="card-body">
                    <div class="chart_checkin" id="checkin">

                    </div>
                </div>
            </div>
        </div>



        <!-- กราฟสมัครีบัญชีผู้ใช้ -->
        <div class="card" id="card_regis">
            <div class="card-header custom-header-tab text-center">
                <h5 class="text-white">การสมัครสมาชิกผู้ใช้</h5>
            </div>
            <!-- Tab1 -->
            <div class="card-body">
                <div class="card-body">
                    <div class="chart_regis" id="chart_regis">

                    </div>
                </div>
            </div>
        </div>



        <!-- กราฟโปรโมชัน -->
        <div class="row">
            <div class="col">
                <div class="card" id="card_promotion_add">
                    <div class="card-header custom-header-tab text-center">
                        <h5 class="text-white">โปรโมชันที่เพิ่มเข้ามาของผู้ดูแลระบบและผู้ประกอบการ</h5>
                    </div>
                    <!-- Tab1 -->
                    <div class="card-body">
                        <div class="card-body">
                            <div class="chart_promotion_add" id="chart_promotion_add">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col">
                <div class="card" id="card_promotion_use">
                    <div class="card-header custom-header-tab text-center">
                        <h5 class="text-white">โปรโมชันที่ใช้งานแต่ละวัน</h5>
                    </div>
                    <!-- Tab1 -->
                    <div class="card-body">
                        <div class="card-body">
                            <div class="chart_promotion_use" id="chart_promotion_use">

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <script>
        var date_first = ""; //วันเริ่มต้น
        var date_secon = ""; // วันสิ้นสุด
        date_secon = $('#date').val().substring(13, 23); //ตัดสตริงเอาแค่วันสิ้นสุด
        date_first = $('#date').val().substring(0, 10); //ตัดสตริงเอาแค่วันเริ่มต้น

        // var clear;

        //ซ่อนทุกกราฟ
        card_checkin.style.display = 'none';
        card_regis.style.display = 'none';
        card_promotion_add.style.display = 'none';
        card_promotion_use.style.display = 'none';

        //เมื่อ Jqurey ทำงาน
        $(document).ready(function() {

            get_data_card_dashboard(); // เรียกข้อมูลบนการ์ด
            get_data_dashboard_event_cat(); //เรียกข้อมูลกราฟประเภทกิจกรรมที่นิยมที่สุด
            get_data_dashboard_event_percent(); //เรียกข้อมูลกราฟประเภทกิจกรรมที่นิยมที่สุด (Pie chart Percent)

            $('#date').daterangepicker({
                //date picker
                opens: 'left',
                cancelButtonClasses: "cancel",
                autoUpdateInput: false,
                applyButtonClasses: "button-apply",
                locale: {
                    format: "YYYY-MM-DD",
                    cancelLabel: 'Clear'
                }
            }, function(start, end) {
                //ใส่ format
                date_first = start.format('YYYY-MM-DD');
                date_secon = end.format('YYYY-MM-DD');
            });


            $('#date').on('apply.daterangepicker', function(ev, picker) {
                //คลิกเลือกวัน ให้ใช้ค่าใหม่
                if ($('#date').val() == '' && date_first == "" && date_secon == "") {
                    date_first = clear.substring(0, 10);
                    date_secon = clear.substring(13, 23);
                    $('#date').val(date_first + ' - ' + date_secon);
                } else {
                    $('#date').val(date_first + ' - ' + date_secon);
                }
            });
            //event click hide
            $("#event_checkbox").click(function() {
                //คลิก checkbox การ์ดกิจกรรม

                if ($('#event_checkbox').is(':checked')) {

                    $("#card_event").slideDown(); //ซ่อนกราฟ

                } else {
                    get_data_dashboard_event_cat(); // เรียกฟังก์ชัน
                    get_data_dashboard_event_percent()

                    $("#card_event").slideUp();
                }
            });

            $("#submit").click(function() {
                //คลิก filter
                date_secon = $('#date').val().substring(13, 23);
                date_first = $('#date').val().substring(0, 10);
                get_data_dashboard_event_cat();
                get_data_dashboard_event_percent()
            });

            //checkin click hide
            $("#checkin_checkbox").click(function() {

                if ($('#checkin_checkbox').is(':checked')) {
                    // console.log("OK");
                    get_data_checkin();
                    $("#card_checkin").slideDown()
                } else {
                    $("#card_checkin").slideUp();
                }
            });

            //register card chart click hide
            $("#register_checkbox").click(function() {

                if ($('#register_checkbox').is(':checked')) {
                    // console.log("OK");
                    get_data_register();
                    $("#card_regis").slideDown()
                } else {
                    $("#card_regis").slideUp();
                }
            });

            //register card chart click hide
            $("#promotion_checkbox").click(function() {

                if ($('#promotion_checkbox').is(':checked')) {
                    console.log("OK");
                    $("#card_promotion_add").slideDown();
                    $("#card_promotion_use").slideDown();
                } else {
                    $("#card_promotion_add").slideUp();
                    $("#card_promotion_use").slideUp();
                }
            });

        });



        /*
         * get_data_dashboard_event_cat 
         *  request ไปที่ server เพื่อนำข้อมูลจาก data base มาสร้างกราฟ (ประเภทกิจกรรมที่
         * คนสนใจที่สุด)
         *@input -
         *@output chart 
         *@author Weradet Nopsombun 62160110
         *@Create Date 2564-12-10
         *@update Date -
         */
        function get_data_dashboard_event_cat() {
            $.ajax({
                type: 'post',
                //path ตาม ที่ php เลย
                url: '<?php echo base_url('Admin/Manage_dashboard/Admin_view_dashboard/get_data_chart_event_cat'); ?>',
                dataType: 'json',
                data: {
                    date_first: date_first + " 00:00:00", //ตอนนี้ใน database คือมีแค่ date time เลยต่อ String
                    date_secon: date_secon + "  23:59:59"
                },
                success: function() {

                },
                error: function() {
                    alert('ajax get data user error working');
                }
            }).then(function(json_data) {
                create_chart_evet_cat(json_data['arr_data_dashboard']) // สร้าง chart ตามฟังก์ชัน
            });
        }



        /*
         * get_data_dashboard_event_percent 
         *  request ไปที่ server เพื่อนำข้อมูลจาก data base มาสร้างกราฟ (ประเภทกิจกรรมที่
         * คนสนใจที่สุด Pie chart)
         *@input -
         *@output chart 
         *@author Weradet Nopsombun 62160110
         *@Create Date 2564-12-10
         *@update Date -
         */
        function get_data_dashboard_event_percent() {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url('Admin/Manage_dashboard/Admin_view_dashboard/get_data_chart_event_per'); ?>',
                dataType: 'json',
                data: {
                    date_first: date_first + " 00:00:00",
                    date_secon: date_secon + "  23:00:00"
                },
                success: function() {

                },
                error: function() {
                    alert('ajax get data user error working');
                }
            }).then(function(json_data) {
                create_chart_evet_per(json_data['arr_data_dashboard']);
            });
        }


        /*
         * get_data_checkin 
         * request ไปที่ server เพื่อนำข้อมูลจาก data base มาสร้างกราฟ 
         *@input -
         *@output chart 
         *@author Naaka Punparich 62160082
         *@Create Date 2564-12-25
         *@update Date -
         */
        function get_data_checkin() {
            // console.log("Checkin");
            $.ajax({
                type: 'post',
                url: '<?php echo base_url('Admin/Manage_dashboard/Admin_view_dashboard/get_data_chart_checkin'); ?>',
                dataType: 'json',
                data: {
                    date_first: date_first + " 00:00:00",
                    date_secon: date_secon + "  23:00:00"
                },
                success: function() {

                },
                error: function() {
                    alert('ajax get data user error working');
                }
            }).then(function(json_data) {
                create_chart_checkin(json_data['arr_data_checkin']);
            });
        }

        /*
         * create_chart_checkin 
         * request ไปที่ server เพื่อนำข้อมูลจาก data base มาสร้างกราฟ 
         *@input -
         *@output chart 
         *@author Naaka Punparich 62160082
         *@Create Date 2564-12-25
         *@update Date -
         */
        function create_chart_checkin(arr_data_checkin) {

            var obj_data_date_checkin = []; // วิธีการเดียวกัน
            arr_data_checkin.forEach((row, index) => {
                obj_data_date_checkin.push(
                    row['date_checkin'],
                );
            });

            var obj_data_count_checkin = []; // วิธีการเดียวกัน
            arr_data_checkin.forEach((row, index) => {
                obj_data_count_checkin.push(
                    parseInt(row['count_checkin']),
                );
            });
            // console.log(obj_data_date_checkin);
            // console.log(obj_data_count_checkin);

            // Chart
            Highcharts.chart('checkin', {

                title: {
                    text: 'การเช็คอินกิจกรรมในแต่ละวัน'
                },

                subtitle: {
                    text: 'Source: thesolarfoundation.com'
                },

                yAxis: {
                    title: {
                        text: 'จำนวนการเช็คอิน (คน)'
                    }
                },

                xAxis: {
                    accessibility: {
                        rangeDescription: 'วันที่'
                    },
                    categories: obj_data_date_checkin,
                },

                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle'
                },

                plotOptions: {
                    series: {
                        label: {
                            connectorAllowed: false
                        },

                    }
                },

                series: [{
                    name: 'การเช็คอิน',
                    data: obj_data_count_checkin,
                }, ],

                responsive: {
                    rules: [{
                        condition: {
                            maxWidth: 500
                        },
                        chartOptions: {
                            legend: {
                                layout: 'horizontal',
                                align: 'center',
                                verticalAlign: 'bottom'
                            }
                        }
                    }]
                }

            });
        }

        /*
         * get_data_register 
         * request ไปที่ server เพื่อนำข้อมูลจาก data base มาสร้างกราฟ 
         *@input -
         *@output chart 
         *@author Naaka Punparich 62160082
         *@Create Date 2564-12-25
         *@update Date -
         */
        function get_data_register() {
            console.log("Register");
            $.ajax({
                type: 'post',
                url: '<?php echo base_url('Admin/Manage_dashboard/Admin_view_dashboard/get_data_chart_register'); ?>',
                dataType: 'json',
                data: {
                    date_first: date_first + " 00:00:00",
                    date_secon: date_secon + "  23:00:00"
                },
                success: function() {

                },
                error: function() {
                    alert('ajax get data user error working');
                }
            }).then(function(json_data) {
                create_chart_register(json_data['arr_data_register']);
            });
        }

        /*
         * create_chart_register 
         * request ไปที่ server เพื่อนำข้อมูลจาก data base มาสร้างกราฟ 
         *@input -
         *@output chart 
         *@author Naaka Punparich 62160082
         *@Create Date 2564-12-25
         *@update Date -
         */
        function create_chart_register(arr_data_register) {

            var obj_data_date_register_ent = []; // วิธีการเดียวกัน
            arr_data_register.forEach((row, index) => {
                obj_data_date_register_ent.push(
                    row['date_register_ent'],
                );
            });

            var obj_data_count_register_ent = []; // วิธีการเดียวกัน
            arr_data_register.forEach((row, index) => {
                obj_data_count_register_ent.push(
                    parseInt(row['count_register_ent']),
                );
            });

            var obj_data_date_register_tour = []; // วิธีการเดียวกัน
            arr_data_register.forEach((row, index) => {
                obj_data_date_register_tour.push(
                    row['date_register_tour'],
                );
            });

            var obj_data_count_register_tour = []; // วิธีการเดียวกัน
            arr_data_register.forEach((row, index) => {
                obj_data_count_register_tour.push(
                    parseInt(row['count_register_tour']),
                );
            });

            // console.log(obj_data_date_register_ent);
            // console.log(obj_data_count_register_ent);
            console.log(obj_data_date_register_tour);
            console.log(obj_data_count_register_tour);

            // Chart
            Highcharts.chart('chart_regis', {

                title: {
                    text: 'การสมัครบัญชีผู้ใช้'
                },

                subtitle: {
                    text: 'Source: thesolarfoundation.com'
                },

                yAxis: {
                    title: {
                        text: 'จำนวนการสมัคร (คน)'
                    }
                },

                xAxis: {
                    accessibility: {
                        rangeDescription: 'เดือน'
                    },
                    categories: obj_data_date_register_ent,


                },

                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle'
                },

                plotOptions: {
                    series: {
                        label: {
                            connectorAllowed: false
                        },

                    }
                },

                series: [{
                        name: 'ผู้ประกอบการ',
                        data: obj_data_count_register_ent
                    },
                    {
                        name: 'นักท่องเที่ยว',
                        // data: obj_data_count_register_tour
                        data: [1]
                    },
                ],
                responsive: {
                    rules: [{
                        condition: {
                            maxWidth: 500
                        },
                        chartOptions: {
                            legend: {
                                layout: 'horizontal',
                                align: 'center',
                                verticalAlign: 'bottom'
                            }
                        }
                    }]
                }

            });
        }

        /*
         * create_chart_evet_cat 
         *  สร้างกราฟ และ ดุึงข้อมูล มาทำ กราฟ ซ้อน
         *@input -
         *@output chart 
         *@author Weradet Nopsombun 62160110
         *@Create Date 2564-12-10
         *@update Date -
         */
        function create_chart_evet_cat(arr_json_data) {

            var obj_data_eve_cat = []; // อาเรย์ข้อมูลที่ สร้าง Barchart  ประเภทกิจกรรม
            var obj_data_eve = [
                [] //รูปแบบ อาเรย์ Two dimentions สำหรับ drill down
            ];


            arr_json_data.forEach((row, index) => {
                // นำ Array Json มาใส่ใน obj_data_eve_cat
                obj_data_eve_cat.push({
                    name: row['eve_cat_name'],
                    y: parseInt(row['chekin_number']), // str to int
                    drilldown: row['eve_cat_id']
                });

                // จะได้ bar chart
            });
            // request ข้อมูล กิจกรรมที่้เกี่ยวข้อง กับ ประเภทนั้นๆ
            $.ajax({
                type: 'post',
                url: '<?php echo base_url('Admin/Manage_dashboard/Admin_view_dashboard/get_data_chart_event'); ?>',
                dataType: 'json',
                data: {
                    date_first: date_first + " 00:00:00",
                    date_secon: date_secon + "  23:00:00"
                },
                success: function() {

                },
                error: function() {
                    alert('ajax get data user error woefefrking');
                }
            }).then(function(json_data) {

                //วนลูปตามข้อมูลที่มี
                json_data.forEach((row, index) => {
                    let obj_event = []; // สร้าง อาเรย์ย่อย สำหรับกิจกรรมข้างในประเภท

                    /*
                    ตัวอย่างข้อมมูลที่ดึงออกมมา
                        [0] = { 
                            'ประเภท'
                            'ไอดี'
                            data : {
                                [0] = {ชื่อกิจกรรม, จำนวนการเช็คอิน}
                            }
                        } 
                    */
                    row['data'].forEach((row_event, index) => {
                        obj_event.push([
                            row_event['eve_name'],
                            parseInt(row_event['checkin'])
                        ]);
                    });

                    obj_data_eve.push({
                        name: row['name'], // ชื่อประเภท
                        id: row['id'], // ไอดี
                        data: obj_event // กิจกรรมของประเภทนั้นๆ มาจาก aRRAY  ย่อย
                    });
                })
            });

            // Create the chart
            Highcharts.chart('event', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'ประเภทของกิจกรรมที่นิยมมากที่สุด'
                },
                subtitle: {
                    text: 'คลิกที่บาร์เพื่อดูกิจกรรม'
                },
                accessibility: {
                    announceNewData: {
                        enabled: true
                    }
                },
                xAxis: {
                    type: 'category'
                },
                yAxis: {
                    title: {
                        text: 'จำนวนการเช็คอินกิจกรรม'
                    }

                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true
                        }
                    }
                },

                tooltip: {
                    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> of total<br/>'
                },
                series: [{
                    name: "กิจกรรม",
                    colorByPoint: true,
                    data: obj_data_eve_cat,
                }],
                drilldown: {
                    breadcrumbs: {
                        position: {
                            align: 'right'
                        }
                    },
                    series: obj_data_eve,

                }

            });

        }



        /*
         * create_chart_evet_per 
         *  สร้างกราฟ (Pie chart) ประเภทกิจกรรมที่นิยมที่สุด
         *@input -
         *@output chart 
         *@author Weradet Nopsombun 62160110
         *@Create Date 2564-12-10
         *@update Date -
         */
        function create_chart_evet_per(arr_data_eve_cat_per) {

            var obj_data_eve_cat_per = []; // วิธีการเดียวกัน
            arr_data_eve_cat_per.forEach((row, index) => {
                obj_data_eve_cat_per.push({
                    name: row['eve_cat_name'],
                    y: parseInt(row['chekin_number']) // str to int
                });
            });


            Highcharts.chart('chart_event_pie', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'ข้อมูลประเภทกิจกรรมที่ยอดนิยมที่สุด (คิดเป็นเปอร์เซ็น)'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                        }
                    }
                },
                series: [{
                    name: 'Brands',
                    colorByPoint: true,
                    data: obj_data_eve_cat_per,
                }]
            });
        }


        /*
         * get_data_card_dashboard
         * get data dashboard <- number of people
         * @input
         * @output -
         * @author Weradet Nopsombun 62160110
         * @Create Date 2564-12-09
         * @Update Date -
         */
        function get_data_card_dashboard() {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url('Admin/Manage_dashboard/Admin_view_dashboard/get_data_card_dashboard'); ?>',
                dataType: 'JSON',
                success: function(json_data) {

                    console.log(json_data)

                    $("#tourist_number").html(json_data[0].tou +
                        " <span style='font-size: 16px;'>คน</span>");

                    $("#entrepreneur_number").html(json_data[0].ent +
                        " <span style='font-size: 16px;'>คน</span>");

                    $("#company_number").html(json_data[0].com +
                        " <span style='font-size: 16px;'>สถานที่</span>");

                    $("#event_number").html(json_data[0].eve +
                        " <span style='font-size: 16px;'>กิจกรรม</span>");

                    $("#promotion_number").html(json_data[0].pro +
                        " <span style='font-size: 16px;'>โปรโมชัน</span>");

                },
                error: function() {
                    alert('ajax get data user error working');
                }
            });
        }



        Highcharts.chart('chart_promotion_add', {
            chart: {
                style: {
                    fontFamily: 'Prompt',
                },
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie',
            },
            title: {
                text: 'ร้อยละข้อมูลการเพิ่มโปรโมชันของผู้ดูแลระบบและผู้ประกอบการ'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b style="color:black; text-decoration: none !important;" >{point.name}: {point.percentage:.1f} %</b>',
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'ร้อยละ',
                data: [{
                    name: 'ผู้ประกอบการ',
                    y: 55,
                    drilldown: 'data 1',
                }, {
                    name: 'ผู้ดูแลระบบ',
                    y: 45,
                    // drilldown: 'data 1'
                }, ]
            }],
            drilldown: {
                series: [{
                    name: 'ร้อยละ',
                    id: 'data 1',
                    data: [
                        ['วีรเดช นพสมบูรณ์', 24.13],
                        ['สุวพัฒน์ เสาวรส', 17.2],
                        ['ชุติพนธ์ เติมสิริสุขสิน', 8.11],
                        ['ณเอก ปุณย์ปริชญ์', 5.33],
                        ['ธนิสร ธรรมสวนิต', 1.06],
                    ]
                }, ]
            }
        });


        Highcharts.chart('chart_promotion_use', {
            chart: {
                type: 'column',
                style: {
                    fontFamily: 'Prompt',
                },
            },
            title: {
                text: 'จำนวนการใช้งานโปรโมชันของนักท่องเที่ยวในแต่ละวัน'
            },
            subtitle: {
                // text: 'Source: WorldClimate.com'
            },
            xAxis: {
                categories: [
                    '03/12/64',
                    '04/12/64',
                    '05/12/64',
                    '06/12/64',
                    '07/12/64',
                    '08/12/64',
                    '09/12/64',
                    '10/12/64',
                    '11/12/64',
                    '12/12/64',
                    '13/12/64',
                    '14/12/64'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'จำนวน (ครั้ง)'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y} ครั้ง</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.1,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'โปรโมชันของผู้ดูแลระบบ',
                data: [49, 71, 106, 129, 144, 176, 135, 148, 216, 194, 95, 54]

            }, {
                name: 'โปรโมชันของผู้ประกอบการ',
                data: [83, 78, 98, 93, 106, 84, 105, 104, 91, 83, 106, 92]
            }]
        });
        </script>