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
                                <h3 class="card-text text-amount" id="consider_ent">30 คน</h3>
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
                                <h3 class="card-text" id="approve_ent">10 คน</h3>

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
                                <h3 class="card-text text-amount" id="reject_ent">10 สถานที่</h3>
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
                                <h3 class="card-text text-amount" id="block_ent">10 กิจกรรม</h3>
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
                                <h3 class="card-text text-amount" id="consider_ent">10 โปรโมชัน</h3>
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
                                <h3 class="card-text" id="approve_ent">10 กิจกรรม</h3>

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
                                <h3 class="card-text text-amount" id="reject_ent">10 โปรโมชัน</h3>
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
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-2">
                            <h5>วันที่</h5>
                        </div>
                        <div class="col-sm">
                            <input type="date" id="eve_start_date" name="eve_start_date" class="form-control" required>
                        </div>
                        <p>ถึง</p>
                        <div class="col-sm">
                            <input type="date" id="eve_start_date" name="eve_start_date" class="form-control" required>
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


        <script>
            $(document).ready(function() {


                //checkbox hide
                //event click hide
                $("#event_checkbox").click(function() {

                    if ($('#event_checkbox').is(':checked')) {
                        console.log("OK");
                        $("#card_event").slideDown()
                    } else {
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
                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
                },
                series: [{
                    name: "กิจกรรม",
                    colorByPoint: true,
                    data: [{
                            name: "ตัวช่วยลดคาร์บอน",
                            y: 62,
                            drilldown: "Chrome"
                        },
                        {
                            name: "การเดินทาง",
                            y: 10,
                            drilldown: "Firefox"
                        },
                        {
                            name: "การจัดการน้ำและไฟฟ้า",
                            y: 7,
                            drilldown: "Internet Explorer"
                        }
                    ]
                }],
                drilldown: {
                    series: [{
                            name: "Chrome",
                            id: "Chrome",
                            data: [
                                [
                                    "เก็บขยะหาดวอน",
                                    20
                                ],
                                [
                                    "เก็บขยะรอบอ่าวแสมสาร",
                                    32
                                ],
                                [
                                    "ลดการใช้น้ำ",
                                    10
                                ]
                            ]
                        },
                        {
                            name: "Firefox",
                            id: "Firefox",
                            data: [
                                [
                                    "ปั่นจักรยานยชมวิวเขาสามมุข",
                                    10
                                ]
                            ]
                        },
                        {
                            name: "Internet Explorer",
                            id: "Internet Explorer",
                            data: [
                                [
                                    "v11.0",
                                    6.2
                                ],
                                [
                                    "v10.0",
                                    0.29
                                ],
                                [
                                    "v9.0",
                                    0.27
                                ],
                                [
                                    "v8.0",
                                    0.47
                                ]
                            ]
                        },
                        {
                            name: "Safari",
                            id: "Safari",
                            data: [
                                [
                                    "v11.0",
                                    3.39
                                ],
                                [
                                    "v10.1",
                                    0.96
                                ],
                                [
                                    "v10.0",
                                    0.36
                                ],
                                [
                                    "v9.1",
                                    0.54
                                ],
                                [
                                    "v9.0",
                                    0.13
                                ],
                                [
                                    "v5.1",
                                    0.2
                                ]
                            ]
                        },
                        {
                            name: "Edge",
                            id: "Edge",
                            data: [
                                [
                                    "v16",
                                    2.6
                                ],
                                [
                                    "v15",
                                    0.92
                                ],
                                [
                                    "v14",
                                    0.4
                                ],
                                [
                                    "v13",
                                    0.1
                                ]
                            ]
                        },
                        {
                            name: "Opera",
                            id: "Opera",
                            data: [
                                [
                                    "v50.0",
                                    0.96
                                ],
                                [
                                    "v49.0",
                                    0.82
                                ],
                                [
                                    "v12.1",
                                    0.14
                                ]
                            ]
                        }
                    ]
                }
            });




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
                    categories: [ '03/12/64','04/12/64','05/12/64'
                    ]

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
                    categories: [ '03/12/64','04/12/64','05/12/64'
                    ]

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
        </script>