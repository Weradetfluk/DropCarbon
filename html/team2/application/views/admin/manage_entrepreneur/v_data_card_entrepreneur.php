<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">content_copy</i>
                        </div>
                        <p class="card-category">รออนุมัติ</p>
                        <h3 class="card-title" id="consider">

                        </h3>
                    </div>

                </div>
            </div>
            <div class="col-sm-3">
                <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">done</i>
                        </div>
                        <p class="card-category">อนุมัติ</p>
                        <h3 class="card-title" id="approve">
                         
                        </h3>
                    </div>

                </div>
            </div>
            <div class="col-sm-3">
                <div class="card card-stats">
                    <div class="card-header card-header-danger card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">clear</i>
                        </div>
                        <p class="card-category">ปฏิเสธ</p>
                        <h3 class="card-title" id="reject">
                        
                        </h3>
                    </div>

                </div>
            </div>
            <div class="col-sm-3">
                <div class="card card-stats">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">info_outline</i>
                        </div>
                        <p class="card-category">ถูกบล็อค</p>
                        <h3 class="card-title" id="block">
                        
                        </h3>
                    </div>

                </div>
            </div>
        </div>







        <script>
            $(document).ready(function() {
                get_data_card_entrepreneur()
            });

            function get_data_card_entrepreneur() {
                $.ajax({
                    type: 'post',
                    url: '<?php echo base_url('Admin/Manage_entrepreneur/Admin_approval_entrepreneur/get_data_card_entrepreneur_ajax'); ?>',
                    dataType: "JSON",
                    success: function(json_data) {
                        console.log(json_data);

                        $("#consider").text(json_data[0].consider);
                        
                        $("#approve").text(json_data[0].approve);
                        
                        $("#reject").text(json_data[0].reject);
                        
                        $("#block").text(json_data[0].blocked);
               
                    },
                    error: function() {
                        alert('ajax ass user error working');
                    }
                });
             

            }
        </script>