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

<style>
    .card-custom {
        border-radius: 10px;
        border: 1px solid rgba(0, 0, 0, .05);
        background-color: #fff;
        margin-bottom: 30px;
        box-shadow: 0 .15rem 1.75rem 0 rgba(58, 59, 69, .15);
        height: 120px;
    }
    .border-left-yellow {border-left: 4px solid #fba004;}
    .border-left-green {border-left: 4px solid #4caf50;}
    .border-left-red {border-left: 4px solid #f44336;}
    .border-left-purple {border-left: 4px solid #8e24aa;}
    .text-title {color: #8898aa;font-weight: 500;font-size: 14px;}
    .icon-shape {
        border-radius: 50%;
        color: #fff;
        width: 80px;
        height: 80px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 25px;
        box-shadow: 0 0 2rem 0 rgba(136, 152, 170, .15) !important;
    }

    .icon-area {
        background: #fba004;
    }
    .icon-purple{
        background: #8e24aa;
    }

    .custom-icon{
        font-size: 40px;
    }
</style>

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
                                <h2 class="card-text text-amount" id="approve_ent"></h2>
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

                        $("#consider_ent").text(json_data[0].ent_consider);

                        $("#approve_ent").text(json_data[0].ent_approve);

                        $("#reject_ent").text(json_data[0].ent_reject);

                        $("#block_ent").text(json_data[0].ent_blocked);

                    },
                    error: function() {
                        alert('ajax get data user error working');
                    }
                });
            }
        </script>