<!-- 
/*
* v_data_card_promo
* Display data card of number
* @input -
* @output number of card in data promo
* @author Nantasiri Saiwaew 62160093
* @Create Date 2564-09-30
*/ 
-->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg col-md-6">
                <div class="card">
                    <div class="card-body border-left-yellow">
                        <div class="row">
                            <div class="col">
                                <p class="card-title text-title">รออนุมัติ</p>
                                <h2 class="card-text text-amount" id="consider_pro"></h2>
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
                                <p class="card-title text-title">โปรโมชันที่ยังไม่สิ้นสุด</p>
                                <h2 class="card-text text-amount" id="not_over_pro"></h2>
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
                                <p class="card-title text-title">โปรโมชันที่สิ้นสุด</p>
                                <h2 class="card-text" id="over_pro"></h2>

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
                                <h2 class="card-text text-amount" id="reject_pro"></h2>
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
                get_data_card_promo()
            });
            /*
             * get_data_card_promo
             * get data consider, approve, rejected
             * @input
             * @output -
             * @author Weradet Nopsombun 62160110
             * @Create Date 2564-09-30
             * @Update Date -
             */
            function get_data_card_promo() {
                $.ajax({
                    type: 'post',
                    url: '<?php echo base_url('Admin/Manage_promotions/Admin_approval_promotions/get_data_card_promo_ajax'); ?>',
                    dataType: 'JSON',
                    success: function(json_data) {

                        $("#consider_pro").html(json_data[0].pro_consider + " <span style='font-size: 16px;'>โปรโมชัน</span>");

                        $("#not_over_pro").html(json_data[0].pro_not_over  + " <span style='font-size: 16px;'>โปรโมชัน</span>");

                        $("#over_pro").html(json_data[0].pro_over  + " <span style='font-size: 16px;'>โปรโมชัน</span>");

                        $("#reject_pro").html(json_data[0].pro_reject  + " <span style='font-size: 16px;'>โปรโมชัน</span>");

                    },
                    error: function() {
                        alert('ajax get data user error working');
                    }
                });
            }
        </script>