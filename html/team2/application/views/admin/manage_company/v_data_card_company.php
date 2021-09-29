<!-- 
/*
* v_data_card_company
* Display data card of number
* @input -
* @output number of card in data company
* @author Kasama Donwong 62160074
* @Create Date 2564-08-25
*/ 
-->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body border-left-yellow">
                        <div class="row">
                            <div class="col">
                                <p class="card-title text-title">รออนุมัติ</p>
                                <h2 class="card-text text-amount" id="consider_com"></h2>
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
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body border-left-green">
                        <div class="row">
                            <div class="col">
                                <p class="card-title text-title">อนุมัติแล้ว</p>
                                <h2 class="card-text" id="approve_com"></h2>

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
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body border-left-red">
                        <div class="row">
                            <div class="col">
                                <p class="card-title text-title">ถูกปฏิเสธ</p>
                                <h2 class="card-text text-amount" id="reject_com"></h2>
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
                get_data_card_company();
            });


            /*
             * get_data_card_company
             * get data consider, approve, rejected <- number of people
             * @input
             * @output -
             * @author Kasama Donwong
             * @Create Date 2564-08-25
             * @Update Date -
             */
            function get_data_card_company() {
                $.ajax({
                    type: 'post',
                    url: '<?php echo base_url('Admin/Manage_company/Admin_approval_company/get_data_card_company_ajax'); ?>',
                    dataType: 'JSON',
                    success: function(json_data_com) {


                        $("#consider_com").html(json_data_com[0].consider + " <span style='font-size: 16px;'>สถานที่</span>");

                        $("#approve_com").html(json_data_com[0].approve + " <span style='font-size: 16px;'>สถานที่</span>");

                        $("#reject_com").html(json_data_com[0].reject + " <span style='font-size: 16px;'>สถานที่</span>");

                    },
                    error: function() {
                        alert('ajax ass user error working');
                    }
                });


            }
        </script>