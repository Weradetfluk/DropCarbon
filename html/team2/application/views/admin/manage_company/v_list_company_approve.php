<!-- 
/*
* v_list_company_approve
* Display approved company table
* @input -
* @output approved company list
* @author Kasama Donwong 62160074
* @Create Date 2561-08-08
*/ 
-->

<!-- main content -->

<div class="content">
    <div class="container-fluid">

        <div class="card card-nav-tabs" style="border-radius: 25px;">
            <div class="card-header" style="background-color: #5F9EA0; border-radius: 10px;">
                <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                        <ul class="nav nav-tabs" data-tabs="tabs">
                            <li class="nav-item">
                                <a class="nav-link" href=" <?php echo base_url() . 'Admin/Manage_company/Admin_approval_company/show_data_consider' ?> ">ยังไม่ได้รับอนุมัติ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="<?php echo base_url() . 'Admin/Manage_company/Admin_approval_company/show_data_approve' ?> ">อนุมัติแล้ว</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url() . 'Admin/Manage_company/Admin_approval_company/show_data_reject' ?>">สถานที่ที่ถูกปฏิเสธ</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


            <!-- Tab1 -->
            <div class="card-body ">
                <div class="tab-content">
                    <div class="tab-pane active" id="consider">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header" style="background-color: #60839f; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); border-radius: 10px;">
                                        <div class="row">
                                            <div class="col py-2">
                                                <h4 class="card-title text-white ">ตารางแสดงข้อมูลสถานที่ที่ได้รับอนุมัติแล้ว</h4>
                                            </div>
                                            <div class="col">
                                                <form class="form-inline" action="<?php echo base_url() . 'Admin/Manage_entrepreneur/Admin_approval_entrepreneur/show_data_consider'; ?>" method="POST" style="width: 200px; float:right;">

                                                    <div class="input-group ">

                                                        <input type="text" value="" name="value_search" class="form-control" placeholder="  ค้นหาชื่อได้ที่นี่..." style="background-color:white; border-radius: 10px;">
                                                        <button type="submit" name="search" class="btn btn-white btn-round btn-just-icon" value="">
                                                            <i class="material-icons">search</i>
                                                        </button>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive" id="data_entre_consider">
                                            <!-- table approve ajax  -->
                                            <table class="table" style="text-align: center;" id="entre_tale_approve">
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
                                                    if (sizeof($arr_company_approve) == 0) {
                                                        echo "<td colspan = '5'>";
                                                        echo "ไม่มีข้อมูลในตารางนี้";
                                                        echo "</td>";
                                                    } else {

                                                        for ($i = 0; $i < count($arr_company_approve); $i++) { ?>
                                                            <tr>
                                                                <!-- column ลำดับ -->
                                                                <td style='text-align: center;'>
                                                                    <?php echo ($i + 1); ?>
                                                                </td>

                                                                <!-- column ชื่อ-สกุล -->
                                                                <td>
                                                                    <?php echo $arr_company_approve[$i]->com_name; ?>
                                                                </td>


                                                                <!-- column เบอร์โทร -->
                                                                <td>
                                                                    <?php echo $arr_company_approve[$i]->ent_firstname . " " . $arr_company_approve[$i]->ent_lastname; ?>
                                                                </td>

                                                                <!-- column Email -->
                                                                <td>
                                                                    <?php echo $arr_company_approve[$i]->ent_email; ?>
                                                                </td>


                                                                <!-- column ดำเนินการ -->
                                                                <td style='text-align: center;'>
                                                                    <button class="btn btn-info" style="font-size:10px; padding:12px;">
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
                                        <p><?php echo $link_approve; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>