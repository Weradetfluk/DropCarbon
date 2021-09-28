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
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body border-left-yellow">
                        <div class="row">
                            <div class="col">
                                <p class="card-title text-title">รออนุมัติ</p>
                                <h2 class="card-text text-amount" id="consider_ent"></h2>
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
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body border-left-green">
                        <div class="row">
                            <div class="col">
                                <p class="card-title text-title">อนุมัติแล้ว</p>
                                <h2 class="card-text" id="approve_ent"></h2>

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
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body border-left-red">
                        <div class="row">
                            <div class="col">
                                <p class="card-title text-title">ถูกปฏิเสธ</p>
                                <h2 class="card-text text-amount" id="reject_ent"></h2>
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
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body border-left-purple">
                        <div class="row">
                            <div class="col">
                                <p class="card-title text-title">ถูกบล็อค</p>
                                <h2 class="card-text text-amount" id="block_ent"></h2>
                            </div>
                            <div class="col-auto">
                                <div class="icon-shape icon-purple">
                                <i class="material-icons custom-icon">block</i>
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
                    url: '<?php echo base_url('Admin/Manage_entrepreneur/Admin_approval_entrepreneur/get_data_card_entrepreneur_ajax'); ?>',
                    dataType: 'JSON',
                    success: function(json_data) {

                        console.log(json_data);

                        $("#consider_ent").html(json_data[0].ent_consider + " <span style='font-size: 16px;'>คน</span>");

                        $("#approve_ent").html(json_data[0].ent_approve  + " <span style='font-size: 16px;'>คน</span>");

                        $("#reject_ent").html(json_data[0].ent_reject  + " <span style='font-size: 16px;'>คน</span>");

                        $("#block_ent").html(json_data[0].ent_blocked  + " <span style='font-size: 16px;'>คน</span>");

                    },
                    error: function() {
                        alert('ajax get data user error working');
                    }
                });
            }
        </script>