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
                <div class="card">
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
                <div class="card">
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
                <div class="card">
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
                <div class="card">
                    <div class="card-body border-left-purple">
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
            <!-- Tab1 -->
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
                            <input class="form-check-input" type="checkbox" value="" checked id="checkin_checkbox">
                            <label class="form-check-label" for="defaultCheck1">
                                การเช็คอินกิจกรรม
                            </label>
                        </div>
                        <div class="col-sm">
                            <input class="form-check-input" type="checkbox" value="" checked id="register_checkbox">
                            <label class="form-check-label" for="defaultCheck1">
                                การสมัครบัญชีผู้ใช้
                            </label>
                        </div>
                        <div class="col-sm">
                            <input class="form-check-input" type="checkbox" value="" checked id="register_checkbox">
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
                        <button type="button" class="btn" style="float: right;">รีเซ็ต</button>
                        <button type="button" style="float: right;" class="btn btn-success">ค้นหา</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- กราฟประเภทกิจกรรมที่คนสนใจมากที่สุด -->

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




        <div class="card" id="card_regis">
            <div class="card-header custom-header-tab text-center">
                <h5 class="text-white">การสมัครสมาชิกผู้ใช้ในแต่ละเดือน</h5>
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
                        <h5 class="text-white">โปรโมชันที่เพิ่มเข้ามาและโปรโมชันที่หมดอายุ</h5>
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
                        <h5 class="text-white">โปรโมชันที่ใช้งานแต่ละเดือน</h5>
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
        var date_first = "";
        var date_secon = "";
        date_secon = $('#date').val().substring(13, 23);
        date_first = $('#date').val().substring(0, 10);
        var clear;
        $(document).ready(function() {

            get_data_card_dashboard();
            get_data_dashboard_event_cat();
            get_data_dashboard_event_percent();


            $('#date').daterangepicker({
                opens: 'left',
                cancelButtonClasses: "cancel",
                autoUpdateInput: false,
                applyButtonClasses: "button-apply",
                locale: {
                    format: "YYYY-MM-DD",
                    cancelLabel: 'Clear'
                }
            }, function(start, end) {
                date_first = start.format('YYYY-MM-DD');
                date_secon = end.format('YYYY-MM-DD');
            });

            $('#date').on('apply.daterangepicker', function(ev, picker) {
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

                if ($('#event_checkbox').is(':checked')) {

                    $("#card_event").slideDown()
                } else {
                    get_data_dashboard_event();

                    $("#card_event").slideUp();
                }
            });


            //checkin click hide
            $("#checkin_checkbox").click(function() {

                if ($('#checkin_checkbox').is(':checked')) {
                    console.log("OK");
                    $("#card_checkin").slideDown()
                } else {
                    $("#card_checkin").slideUp();
                }
            });

            //register card chart click hide
            $("#register_checkbox").click(function() {

                if ($('#register_checkbox').is(':checked')) {
                    console.log("OK");
                    $("#card_regis").slideDown()
                } else {
                    $("#card_regis").slideUp();
                }
            });

        });




        function get_data_dashboard_event_cat() {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url('Admin/Manage_dashboard/Admin_view_dashboard/get_data_chart_event_cat'); ?>',
                dataType: 'json',
                success: function() {

                },
                error: function() {
                    alert('ajax get data user error working');
                }
            }).then(function(json_data) {
                create_chart_evet_cat(json_data['arr_data_dashboard']) // line 391
            });
        }

        function get_data_dashboard_event_percent() {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url('Admin/Manage_dashboard/Admin_view_dashboard/get_data_chart_event_per'); ?>',
                dataType: 'json',
                success: function() {

                },
                error: function() {
                    alert('ajax get data user error working');
                }
            }).then(function(json_data) {
                create_chart_evet_per(json_data['arr_data_dashboard'])
                console.log(json_data['arr_data_dashboard'])
            });
        }




        function create_chart_evet_cat(arr_json_data) {

            var obj_data_eve_cat = [];

            arr_json_data.forEach((row, index) => {
                obj_data_eve_cat.push({
                    name: row['eve_cat_name'],
                    y: parseInt(row['chekin_number']) // str to int
                });
            });

            console.log(obj_data_eve_cat);
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
                }]

            });
        }




        function create_chart_evet_per(arr_data_eve_cat_per) {

            var obj_data_eve_cat_per = [];
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
                    text: 'Browser market shares in January, 2018'
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

                    $("#tourist_number").html(json_data[0].tou + " <span style='font-size: 16px;'>คน</span>");

                    $("#entrepreneur_number").html(json_data[0].ent + " <span style='font-size: 16px;'>คน</span>");

                    $("#company_number").html(json_data[0].com + " <span style='font-size: 16px;'>สถานที่</span>");

                    $("#event_number").html(json_data[0].eve + " <span style='font-size: 16px;'>กิจกรรม</span>");

                    $("#promotion_number").html(json_data[0].pro + " <span style='font-size: 16px;'>โปรโมชัน</span>");

                },
                error: function() {
                    alert('ajax get data user error working');
                }
            });
        }





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
                categories: ['03/12/64', '04/12/64', '05/12/64']

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
                data: [10, 40, 10]
            }],

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
                categories: ['03/12/64', '04/12/64', '05/12/64']

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
                    data: [10, 0, 10]
                },
                {
                    name: 'นักท่องเที่ยว',
                    data: [5, 15, 10],

                }
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

        Highcharts.chart('chart_promotion_add', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'ร้อยละโปรโมชันที่เพิ่มและหมดอายุ'
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
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                    }
                }
            },
            series: [{
                name: 'ร้อยละ',
                colorByPoint: true,
                data: [{
                    name: 'โปรโมชันที่เพิ่ม',
                    y: 61,
                    sliced: true,
                    selected: true
                }, {
                    name: 'โปรโมชันที่หมดอายุ',
                    y: 11,
                }, ]
            }]
        });


        Highcharts.chart('chart_promotion_use', {

            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'ร้อยละโปรโมชันที่ใช้งาน'
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
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                    }
                }
            },
            series: [{
                name: 'ร้อยละ',
                colorByPoint: true,
                data: [{
                    name: '01/12/64',
                    y: 45,
                }, {
                    name: '02/12/64',
                    y: 65,
                }, {
                    name: '03/12/64',
                    y: 32,
                }, {
                    name: '04/12/64',
                    y: 11,
                }, {
                    name: '05/12/64',
                    y: 60,
                }, {
                    name: '06/12/64',
                    y: 5,
                }, {
                    name: '07/12/64',
                    y: 32,
                }, {
                    name: '08/12/64',
                    y: 47,
                }, {
                    name: '09/12/64',
                    y: 80,
                }, {
                    name: '10/12/64',
                    y: 1,
                }, {
                    name: '11/12/64',
                    y: 3,
                }, {
                    name: '12/12/64',
                    y: 2,
                }, ]
            }]

        });
        </script>