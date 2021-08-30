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
            <div class="col-sm-4">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">content_copy</i>
                        </div>
                        <p class="card-category">รออนุมัติ</p>
                        <h3 class="card-title" id="consider_com">

                        </h3>
                    </div>

                </div>
            </div>
            <div class="col-sm-4">
                <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon header-green">
                        <div class="card-icon">
                            <i class="material-icons">done</i>
                        </div>
                        <p class="card-category">อนุมัติ</p>
                        <h3 class="card-title" id="approve_com">

                        </h3>
                    </div>

                </div>
            </div>
            <div class="col-sm-4">
                <div class="card card-stats">
                    <div class="card-header card-header-danger card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">clear</i>
                        </div>
                        <p class="card-category">ปฏิเสธ</p>
                        <h3 class="card-title" id="reject_com">

                        </h3>
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
                          

                            $("#consider_com").text(json_data_com[0].consider);

                            $("#approve_com").text(json_data_com[0].approve);

                            $("#reject_com").text(json_data_com[0].reject);

                        },
                        error: function() {
                            alert('ajax ass user error working');
                        }
                    });


                }
            </script>