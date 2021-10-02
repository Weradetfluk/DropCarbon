<!-- 
/*
* v_data_card_entrepreneur
* Display data card of number
* @input -
* @output number of card in data entrepreneur
* @author weradet nopsombun 62160110
* @Create Date 2564-08-08
*/ 
-->
<div class="content">
    <div class="container-fluid">
        <div class="row row-cols-5">
            <div class="col">
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
            <div class="col">
                <div class="card">
                    <div class="card-body border-left-yellow">
                        <div class="row">
                            <div class="col">
                                <p class="card-title text-title">รอกำหนดคะแนน</p>
                                <h2 class="card-text text-amount" id="no_score_eve"></h2>
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
            <div class="col">
                <div class="card">
                    <div class="card-body border-left-yellow">
                        <div class="row">
                            <div class="col">
                                <p class="card-title text-title">กิจกรรมที่ยังไม่สิ้นสุด</p>
                                <h2 class="card-text text-amount" id="not_over_eve"></h2>
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
            <div class="col">
                <div class="card">
                    <div class="card-body border-left-green">
                        <div class="row">
                            <div class="col">
                                <p class="card-title text-title">กิจกรรมที่สิ้นสุด</p>
                                <h2 class="card-text" id="over_eve"></h2>

                            </div>
                            <div class="col-auto">
                                <div class="icon-shape bg-success">
                                    <i class="material-icons custom-icon">check</i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
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

                        $("#no_score_eve").html(json_data[0].eve_no_score  + " <span style='font-size: 16px;'>กิจกรรม</span>");

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