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
                                โปรโมชัน
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
                <div class="card" id="card_promotion_end">
                    <div class="card-header custom-header-tab text-center">
                        <h5 class="text-white">โปรโมชันที่หมดอายุ</h5>
                    </div>
                    <!-- Tab1 -->
                    <div class="card-body">
                        <div class="card-body">
                            <div class="chart_promotion_end" id="chart_promotion_end">

                            </div>
                        </div>
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
    card_promotion_end.style.display = 'none';

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
                $("#card_event_pie").slideDown();

            } else {
                get_data_dashboard_event_cat(); // เรียกฟังก์ชัน
                get_data_dashboard_event_percent()

                $("#card_event").slideUp();
                $("#card_event_pie").slideUp();
            }
        });

        $("#submit").click(function() {
            //คลิก filter
            date_secon = $('#date').val().substring(13, 23);
            date_first = $('#date').val().substring(0, 10);
            get_data_dashboard_event_cat();
            get_data_dashboard_event_percent();
            get_data_checkin();
            get_data_register();
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
                // console.log("OK");
                get_data_promotion();
                get_data_promotion_end();
                $("#card_promotion_add").slideDown();
                $("#card_promotion_end").slideDown();
            } else {
                $("#card_promotion_add").slideUp();
                $("#card_promotion_end").slideUp();
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
            url: '<?php echo base_url('Admin/Manage_dashboard/Admin_view_dashboard/get_data_chart_event_cat_ajax'); ?>',
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
            url: '<?php echo base_url('Admin/Manage_dashboard/Admin_view_dashboard/get_data_chart_event_per_ajax'); ?>',
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
        console.log(date_first);
        console.log(date_secon);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url('Admin/Manage_dashboard/Admin_view_dashboard/get_data_chart_checkin_ajax'); ?>',
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
            console.log(json_data);
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

            // subtitle: {
            //     text: 'Source: thesolarfoundation.com'
            // },

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
        // console.log("Register");
        $.ajax({
            type: 'post',
            url: '<?php echo base_url('Admin/Manage_dashboard/Admin_view_dashboard/get_data_chart_register_ajax'); ?>',
            dataType: 'json',
            data: {
                date_first: date_first + " 00:00:00",
                date_secon: date_secon + "  23:00:00"
            },
            success: function() {},
            error: function() {
                alert('ajax get data user error working');
            }
        }).then(function(json_data) {
            create_chart_register(json_data);
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
        // console.log('arr_data_register : ' + arr_data_register);
        var date_end_str = date_secon.substr(0, 10);
        var date_start_str = date_first.substr(0, 10);
        var date_end = new Date(date_end_str);
        var date_start = new Date(date_start_str);
        const diff_time = Math.abs(date_end.getTime() - date_start.getTime());
        const diff_days = Math.ceil(diff_time / (1000 * 60 * 60 * 24));
        var date_between = []; //วันแรกถึงวันสุดท้าย
        const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var date_count = date_start;
        for (let i = 0; i <= diff_days; i++) {
            if (i != 0) {
                date_count.setDate(date_count.getDate() + 1);
            }
            date_between.push([String(date_count.getDate()).padStart(2, '0'), months[date_count.getMonth()], date_count.getFullYear()].join(' '));
        }
        // console.log(date_between);


        var obj_data_date_register_ent = []; // วิธีการเดียวกัน
        arr_data_register['arr_data_register_ent'].forEach((row, index) => {
            obj_data_date_register_ent.push(
                row['date_register_ent'],
            );
        });
        // console.log("obj_data_date_register_ent : "+obj_data_date_register_ent);
        var obj_data_count_register_ent = []; // วิธีการเดียวกัน
        arr_data_register['arr_data_register_ent'].forEach((row, index) => {
            obj_data_count_register_ent.push(
                parseInt(row['count_register_ent']),
            );
        });

        var obj_data_date_register_tour = []; // วิธีการเดียวกัน
        arr_data_register['arr_data_register_tour'].forEach((row, index) => {
            obj_data_date_register_tour.push(
                row['date_register_tour'],
            );
        });
        // console.log("obj_data_date_register_tour : "+obj_data_date_register_tour);

        var obj_data_count_register_tour = []; // วิธีการเดียวกัน
        arr_data_register['arr_data_register_tour'].forEach((row, index) => {
            obj_data_count_register_tour.push(
                parseInt(row['count_register_tour']),
            );
        });

        var arr_data_count_ent = [];
        var arr_data_count_tou = [];
        for (let i = 0; i <= diff_days; i++) {
            for (let j = 0; j < obj_data_date_register_ent.length; j++) {
                if (date_between[i] == obj_data_date_register_ent[j]) {
                    arr_data_count_ent[i] = obj_data_count_register_ent[j];
                    // console.log(arr_data_count_ent[1]);
                } else if (arr_data_count_ent[i] == null || arr_data_count_ent[i] == '') {
                    arr_data_count_ent[i] = 0;
                }
            }
            for (let j = 0; j < obj_data_date_register_tour.length; j++) {
                if (date_between[i] == obj_data_date_register_tour[j]) {
                    arr_data_count_tou[i] = obj_data_count_register_tour[j];
                } else if (arr_data_count_tou[i] == null || arr_data_count_tou[i] == '') {
                    arr_data_count_tou[i] = 0;
                }
            }
        }

        // Chart
        Highcharts.chart('chart_regis', {

            title: {
                text: 'การสมัครบัญชีผู้ใช้'
            },

            // subtitle: {
            //     text: 'Source: thesolarfoundation.com'
            // },

            yAxis: {
                allowDecimals: false,
                min: 0,
                title: {
                    text: 'จำนวนการสมัคร (คน)'
                }
            },

            xAxis: {
                accessibility: {
                    rangeDescription: 'วันที่'
                },
                categories: date_between,


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
                    data: arr_data_count_ent
                },
                {
                    name: 'นักท่องเที่ยว',
                    data: arr_data_count_tou
                    // data: [1]
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
            url: '<?php echo base_url('Admin/Manage_dashboard/Admin_view_dashboard/get_data_chart_event_ajax'); ?>',
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
                allowDecimals: false,
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
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> จากทั้งหมด<br/>'
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
        // console.log('arr_data_eve_cat_per : ' +arr_data_eve_cat_per);
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
                pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>'
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
                        format: '<b>{point.name}</b>: {point.percentage:.2f} %'
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
            url: '<?php echo base_url('Admin/Manage_dashboard/Admin_view_dashboard/get_data_card_dashboard_ajax'); ?>',
            dataType: 'JSON',
            success: function(json_data) {

                // console.log(json_data)

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

    /*
     * get_data_promotion
     * get data promotion all 
     *@input 
     *@output chart 
     *@author Chutipon Thermsirisuksin 62160081
     *@Create Date 2565-03-08
     *@update Date -
     */
    function get_data_promotion() {
        // console.log('promotion');
        $.ajax({
            type: 'post',
            url: '<?php echo base_url('Admin/Manage_dashboard/Admin_view_dashboard/get_data_chart_promotion_add_ajax'); ?>',
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
            create_chart_promotion(json_data);
            // console.log(json_data);
        });

    }

    /*
     * create_chart_promotion
     * create chart promotion
     *@input -
     *@output chart 
     *@author Chutipon Thermsirisuksin 62160081
     *@Create Date 2565-03-08
     *@update Date -
     */
    function create_chart_promotion(arr_data_promotion) {

        //ประกาศตัวแปรที่เก็บข้อมูลการเพิ่มโปรโมชันของผู้ประกอบการ
        var obj_data_promotion_ent = []; // วิธีการเดียวกัน
        arr_data_promotion['arr_data_promotion_ent'].forEach((row, index) => {
            obj_data_promotion_ent.push({
                name: row['name'],
                y: parseInt(row['per'])
            });
        });
        // console.log('******************');
        // console.log(obj_data_promotion_ent);


        //ประกาศตัวแปรที่เก็บข้อมูลการเพิ่มโปรโมชันของผู้ดูแลระบบ
        var obj_data_promotion_adm = []; // วิธีการเดียวกัน
        arr_data_promotion['arr_data_result_promotion_ent'].forEach((row, index) => {
            obj_data_promotion_adm.push({
                name: 'ผู้ประกอบการ',
                drilldown: 'data 1',
                y: parseInt(row['per']),

            });
        });

        arr_data_promotion['arr_data_promotion_adm'].forEach((row, index) => {
            obj_data_promotion_adm.push({
                name: 'ผู้ดูแลระบบ',
                y: parseInt(row['per']),
            });
        });
        // console.log(obj_data_promotion_adm);



        // Chart
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
                pointFormat: '{series.name}: <b>{point.percentage:.0f}</b>'
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
                        format: '<b style="color:black; text-decoration: none !important;" >{point.name}: {point.percentage:.0f} %</b>',
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'ร้อยละ',
                data: obj_data_promotion_adm,
            }],
            drilldown: {
                series: [{
                    name: 'ร้อยละ',
                    id: 'data 1',
                    data: obj_data_promotion_ent,
                }, ]
            }
        });
    }



    /*
     * get_data_promotion_end
     * get data promotion end all 
     *@input 
     *@output chart 
     *@author Chutipon Thermsirisuksin 62160081
     *@Create Date 2565-03-17
     *@update Date -
     */
    function get_data_promotion_end() {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url('Admin/Manage_dashboard/Admin_view_dashboard/get_data_chart_promotion_end_ajax'); ?>',
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
            create_chart_promotion_end(json_data);
            // console.log(json_data);
        });

    }

    function create_chart_promotion_end(arr_data_promotion_end) {

        //ประกาศตัวแปรที่เก็บข้อมูลโปรโมชันที่หมดอายุของผู้ประกอบการ
        var obj_data_promotion_end_ent = []; // วิธีการเดียวกัน
        arr_data_promotion_end['arr_data_promotion_end_ent'].forEach((row, index) => {
            obj_data_promotion_end_ent.push(
                row['end_date'],
            );
        });

        //ประกาศตัวแปรที่เก็บข้อมูลโปรโมชันที่หมดอายุของผู้ดูแลระบบ
        var obj_data_promotion_end_adm = []; // วิธีการเดียวกัน
        arr_data_promotion_end['arr_data_promotion_end_adm'].forEach((row, index) => {
            obj_data_promotion_end_adm.push(
                row['end_date'],
            );
        });

        //ประกาศตัวแปรที่เก็บข้อมูล รวมโปรโมชันที่หมดอายุของผู้ประกอบการ
        var obj_data_count_promotion_end_ent = []; // วิธีการเดียวกัน
        arr_data_promotion_end['arr_data_promotion_end_ent'].forEach((row, index) => {
            obj_data_count_promotion_end_ent.push(
                parseInt(row['count_pro_end']),
            );
        });

        //ประกาศตัวแปรที่เก็บข้อมูล รวมโปรโมชันที่หมดอายุของผู้ดูแลระบบ
        var obj_data_count_promotion_end_adm = []; // วิธีการเดียวกัน
        arr_data_promotion_end['arr_data_promotion_end_adm'].forEach((row, index) => {
            obj_data_count_promotion_end_adm.push(
                parseInt(row['count_pro_end']),
            );
        });

        // series ent
        var series_data_ent = [];
        for (var i = 0; i < obj_data_promotion_end_ent.length; i++) {
            series_data_ent.push({
                name: obj_data_promotion_end_ent[i],
                y: obj_data_count_promotion_end_ent[i],
                drilldown: 'ent' + i,
            });
        }

        // series adm
        var series_data_adm = [];
        for (var i = 0; i < obj_data_promotion_end_adm.length; i++) {
            series_data_adm.push({
                name: obj_data_promotion_end_adm[i],
                y: obj_data_count_promotion_end_adm[i],
                drilldown: 'adm' + i,
            });
        }


        Highcharts.chart('chart_promotion_end', {
            chart: {
                type: 'column',
                style: {
                    fontFamily: 'Prompt',
                },
            },

            title: {
                text: 'โปรโมชันและรางวัลที่หมดอายุ'
            },

            xAxis: {
                type: 'category',
            },

            yAxis: {
                allowDecimals: false,
                min: 0,
                title: {
                    text: 'จำนวน'
                }
            },

            plotOptions: {

            },
            series: [{
                name: 'ผู้ประกอบการ',
                data: series_data_ent,
            }, {
                name: 'ผู้ดูแลระบบ',
                data: series_data_adm,
            }],
        });
    }
</script>