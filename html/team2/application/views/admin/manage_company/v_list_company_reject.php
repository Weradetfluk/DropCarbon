<!-- main content -->

<div class="content">
    <div class="container-fluid">

        <div class="card card-nav-tabs">
            <div class="card-header" style="background-color: #5F9EA0">
                <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                        <ul class="nav nav-tabs" data-tabs="tabs">
                            <li class="nav-item">
                                <a class="nav-link" href=" <?php echo base_url() . 'Admin/Manage_company/Admin_approval_company/show_data_consider' ?> ">ยังไม่ได้รับอนุมัติ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url() . 'Admin/Manage_company/Admin_approval_company/show_data_approve' ?> ">อนุมัติแล้ว</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="<?php echo base_url() . 'Admin/Manage_company/Admin_approval_company/show_data_reject' ?>">สถานที่ที่ถูกปฏิเสธ</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


            <!-- Tab1 -->
            <div class="card-body ">
                <div class="tab-content">
                    <div class="tab-pane active" id="reject">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header" style="background-color: #60839f; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2)">
                                        <center>
                                            <h4 class="card-title text-white">ตารางแสดงข้อมูลสถานที่ที่ถูกปฏิเสธ</h4>
                                        </center>
                                    </div>
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-sm-3">
                                                <form class="navbar-form">
                                                    <div class="input-group no-border has-success">
                                                        <input type="text" value="" class="form-control" placeholder="ค้นหาชื่อได้ที่นี่...">
                                                        <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                                            <i class="material-icons">search</i>

                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="table-responsive" id="data_entre_reject">

                                            <!-- table approve ajax  -->
                                            <table class="table" style="text-align: center;" id="entre_tale_reject">
                                                <thead class="text-white" style="background-color: #e4a487; text-align: center;">
                                                    <tr>
                                                        <th style="text-align: center;font-size: 16px;">ลำดับ</th>
                                                        <th style="text-align: center;font-size: 16px;">ชื่อสถานที่</th>
                                                        <th style="text-align: center;font-size: 16px;">ชื่อผู้ประกอบการ</th>
                                                        <th style="text-align: center;font-size: 16px;">อีเมล</th>
                                                        <th style="text-align: center;font-size: 16px;">ดำเนินการ</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list">
                                                    <?php
                                                    if (sizeof($arr_company_reject) == 0) {
                                                        echo "<td colspan = '5'>";
                                                        echo "ไม่มีข้อมูลในตารางนี้";
                                                        echo "</td>";
                                                    } else {

                                                        for ($i = 0; $i < count($arr_company_reject); $i++) { ?>
                                                            <tr>
                                                                <!-- column ลำดับ -->
                                                                <td style='text-align: center;'>
                                                                    <?php echo ($i + 1); ?>
                                                                </td>

                                                                <!-- column ชื่อ-สกุล -->
                                                                <td>
                                                                    <?php echo $arr_company_reject[$i]->com_name; ?>
                                                                </td>


                                                                <!-- column เบอร์โทร -->
                                                                <td>
                                                                    <?php echo $arr_company_reject[$i]->ent_firstname . " " . $arr_company_reject[$i]->ent_lastname; ?>
                                                                </td>

                                                                <!-- column Email -->
                                                                <td>
                                                                    <?php echo $arr_company_reject[$i]->ent_email; ?>
                                                                </td>


                                                                <!-- column ดำเนินการ -->
                                                                <td style='text-align: center;'>
                                                                    <button class="btn btn-info" style="font-size:10px;">
                                                                        <i class="material-icons">
                                                                            search
                                                                        </i>
                                                                    </button>

                                                                </td>



                                                            </tr>

                                                        <?php } ?>
                                                    <?php } ?>

                                                </tbody>
                                            </table>
                                        </div>

                                        <p><?php echo $link_reject; ?></p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" role="dialog" id="datamodal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">รายละเอียด</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>

                            <div class="form-group">
                                <label>เหตุผลที่ปฏิเสธ</label>
                                <input type="text" id="enr_admin_reason" class="form-control" disabled>
                            </div>


                            <div class="form-group">
                                <label>ผู้ปฏิเสธ</label>
                                <input type="text" class="form-control" id="adm_name" disabled>
                            </div>




                    </div>


                    </form>


                </div>
            </div>
        </div>



        <script>
            function view_data_detail_reject(com_id) {

                $.ajax({
                    type: "POST",
                    dataType: 'JSON',
                    data: {
                        com_id: com_id
                    },
                    url: '<?php echo base_url('Admin/Manage_company/Admin_approval_company/get_company_by_id_ajax'); ?>',
                    success: function(data_detail) {
                        $('#datamodal').modal();
                        console.log(data_detail);
                        $('#enr_admin_reason').val(data_detail[0]['enr_admin_reason']);
                        $('#adm_name').val(data_detail[0]['adm_name']);
                    },
                    error: function() {
                        alert('ajax error working');
                    }
                });
            }
        </script>