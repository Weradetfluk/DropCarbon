<!-- 
/*
* v_data_card_entrepreneur
* Display data card of number
* @input -
* @output number of card in data event
* @author weradet nopsombun 62160110
* @Create Date 2564-08-08
*/ 
-->
<div class="content">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-lg col-md-6">
                <div class="card">
                    <div class="card-body border-left-yellow">
                        <div class="row">
                            <div class="col">
                                <p class="card-title text-title">รออนุมัติ</p>
                                <h2 class="card-text text-amount" id="consider_eve"></h2>
                            </div>
                            <div class="col-auto">
                                <div class="icon-shape icon-area">
                                    <i class="material-icons custom-icon">hourglass_bottom</i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="col-lg col-md-6">
                <div class="card">
                    <div class="card-body border-left-orange">
                        <div class="row">
                            <div class="col">
                                <p class="card-title text-title">ยังไม่สิ้นสุด</p>
                                <h2 class="card-text text-amount" id="not_over_eve"></h2>
                            </div>
                            <div class="col-auto">
                                <div class="icon-shape icon-orange">
                                    <i class="material-icons custom-icon">access_time</i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg col-md-6">
                <div class="card">
                    <div class="card-body border-left-green">
                        <div class="row">
                            <div class="col">
                                <p class="card-title text-title">สิ้นสุดแล้ว</p>
                                <h2 class="card-text" id="over_eve"></h2>

                            </div>
                            <div class="col-auto">
                                <div class="icon-shape bg-success">
                                    <i class="material-icons custom-icon">timer_off</i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg col-md-6">
                <div class="card">
                    <div class="card-body border-left-red">
                        <div class="row">
                            <div class="col">
                                <p class="card-title text-title">ถูกปฏิเสธ</p>
                                <h2 class="card-text text-amount" id="reject_eve"></h2>
                            </div>
                            <div class="col-auto">
                                <div class="icon-shape bg-danger">
                                    <i class="material-icons custom-icon">thumb_down_alt</i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script>
            $(document).ready(function() {
                get_data_card_entrepreneur()
            });
            /*
             * get_data_card_entrepreneur
             * get data consider, approve, rejected, block <- number of people
             * @input
             * @output -
             * @author Weradet Nopsombun 62160110
             * @Create Date 2564-07-17
             * @Update Date -
             */
            function get_data_card_entrepreneur() {
                $.ajax({
                    type: 'post',
                    url: '<?php echo base_url('Admin/Manage_event/Admin_approval_event/get_data_card_event_ajax'); ?>',
                    dataType: 'JSON',
                    success: function(json_data) {

                        $("#consider_eve").html(json_data[0].eve_consider + " <span style='font-size: 16px;'>กิจกรรม</span>");

                        $("#not_over_eve").html(json_data[0].eve_not_over  + " <span style='font-size: 16px;'>กิจกรรม</span>");

                        $("#over_eve").html(json_data[0].eve_over  + " <span style='font-size: 16px;'>กิจกรรม</span>");

                        $("#reject_eve").html(json_data[0].eve_reject  + " <span style='font-size: 16px;'>กิจกรรม</span>");

                    },
                    error: function() {
                        alert('ajax get data user error working');
                    }
                });
            }
        </script>