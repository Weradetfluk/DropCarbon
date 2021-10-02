<!-- 
/*
* v_list_promotion
* Display data promotion by entrepreneur
* @input arr_promotion
* @output data promotions
* @author Suwapat Saowarod 62160340
* @Create Date 2564-10-02
*/ 
-->
<div class="content">
    <div class="row">
        <div class="col">
            <h3 id="name_table" style="margin : 0 auto !important;padding-left: 3px !important;padding-bottom: 10px; float:left; font-family: 'Prompt', sans-serif !important;">
            </h3>
        </div>
        <div class="col">
            <a class="btn btn-info" style="margin-top: 2px; float:right; border-radius: 5px;" href="<?php echo base_url() . 'Entrepreneur/Manage_promotion/Promotion_add/show_add_promotion' ?>">เพิ่มโปรโมชัน</a>
        </div>
    </div>
    <div class="card card-nav-tabs custom-card-tab">
        <div class="card-header custom-header-tab">
            <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                    <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                            <a class="nav-link <?php if ($_SESSION['tab_number_promotion'] == 1) echo "active"; ?>" href="#tab_all" data-toggle="tab" onclick="change_tab_number_ajax(1)">
                                <h5 class="h5-card-header">ทั้งหมด</h5>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($_SESSION['tab_number_promotion'] == 2) echo "active"; ?>" href="#tab_pending" data-toggle="tab" onclick="change_tab_number_ajax(2)">
                                <h5 class="h5-card-header">รออนุมัติ</h5>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($_SESSION['tab_number_promotion'] == 3) echo "active"; ?>" href="#tab_approved_strat" data-toggle="tab" onclick="change_tab_number_ajax(3)">
                                <h5 class="h5-card-header">ยังไม่สิ้นสุด</h5>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($_SESSION['tab_number_promotion'] == 4) echo "active"; ?>" href="#tab_approved_end" data-toggle="tab" onclick="change_tab_number_ajax(4)">
                                <h5 class="h5-card-header">สิ้นสุดแล้ว</h5>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($_SESSION['tab_number_promotion'] == 5) echo "active"; ?>" href="#tab_reject" data-toggle="tab" onclick="change_tab_number_ajax(5)">
                                <h5 class="h5-card-header">ถูกปฏิเสธ</h5>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="tab-content">

                <!-- tab show all promotion -->
                <div class="tab-pane <?php if ($_SESSION['tab_number_promotion'] == 1) echo "active"; ?>" id="tab_all">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped" style="text-align: center;">
                                        <thead class="text-white" style="background-color: #e4a487; text-align: center;">
                                            <tr>
                                                <th>ลำดับ</th>
                                                <th>ชื่อโปรโมชัน</th>
                                                <th>รายละเอียดโปรโมชัน</th>
                                                <th>ของสถานที่</th>
                                                <th>สถานะโปรโมชัน</th>
                                                <th>ดำเนินการ</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            <?php if (sizeof($arr_promotion) == 0) {
                                                echo "<td colspan = '5'>";
                                                echo "ไม่มีข้อมูลในตารางนี้";
                                                echo "</td>";
                                            } else {
                                                for ($i = 0; $i < count($arr_promotion); $i++) { ?>
                                                    <tr>
                                                        <td><?php echo $i + 1; ?></td>
                                                        <td style="text-align: left;"><?php echo $arr_promotion[$i]->pro_name; ?>
                                                        </td>
                                                        <?php if (iconv_strlen($arr_promotion[$i]->pro_description, 'UTF-8') > 60) { ?>
                                                            <td style="text-align: left;">
                                                                <?php echo iconv_substr($arr_promotion[$i]->pro_description, 0, 60, "UTF-8") . "..."; ?>
                                                            </td>
                                                        <?php } ?>
                                                        <?php if (iconv_strlen($arr_promotion[$i]->pro_description, 'UTF-8') <= 60) { ?>
                                                            <td style="text-align: left;">
                                                                <?php echo $arr_promotion[$i]->pro_description; ?></td>
                                                        <?php } ?>
                                                        <td style="text-align: left;"><?php echo $arr_promotion[$i]->com_name; ?>
                                                        </td>
                                                        <?php if ($arr_promotion[$i]->pro_status == 1) { ?>
                                                            <td style="color: #fba004;">รออนุมัติ</td>
                                                            <td>
                                                                <a class="btn btn-info" style="font-size:10px; padding:12px;" href="">
                                                                    <span class="material-icons">search</span>
                                                                </a>
                                                                <a class="btn btn-warning" style="font-size:10px; padding:12px;" href="">
                                                                    <span class="material-icons">edit</span>
                                                                </a>
                                                                <button class="btn btn-danger" style="font-size:10px; padding:12px;" onclick="">
                                                                    <span class="material-icons">clear</span>
                                                                </button>
                                                            </td>
                                                        <?php } ?>
                                                        <?php if ($arr_promotion[$i]->pro_status == 2) { ?>
                                                            <?php if ($arr_promotion[$i]->pro_end_date > $date_now && $arr_promotion[$i]->pro_start_date <= $date_now) { ?>
                                                                <td style="color: #669900;">ยังไม่สิ้นสุด</td>
                                                            <?php } ?>
                                                            <?php if ($arr_promotion[$i]->pro_end_date <= $date_now && $arr_promotion[$i]->pro_start_date <= $date_now) { ?>
                                                                <td style="color: red;">สิ้นสุด</td>
                                                            <?php } ?>
                                                            <?php if ($arr_promotion[$i]->pro_start_date > $date_now) { ?>
                                                                <td style="color: #669900;">อนุมัติ</td>
                                                            <?php } ?>
                                                            <td>
                                                                <a class="btn btn-info" style="font-size:10px; padding:12px;" href="">
                                                                    <span class="material-icons">search</span>
                                                                </a>
                                                                <a class="btn btn-warning" style="font-size:10px; padding:12px;" href="">
                                                                    <span class="material-icons">edit</span>
                                                                </a>
                                                                <button class="btn btn-danger" style="font-size:10px; padding:12px;" onclick="">
                                                                    <span class="material-icons">clear</span>
                                                                </button>
                                                            </td>
                                                        <?php } ?>
                                                        <?php if ($arr_promotion[$i]->pro_status == 3) { ?>
                                                            <td style="color: red;">ปฏิเสธ</td>
                                                            <td>
                                                                <a class="btn btn-info" style="font-size:10px; padding:12px;" href="">
                                                                    <span class="material-icons">search</span>
                                                                </a>
                                                            </td>
                                                        <?php } ?>
                                                    </tr>
                                                <?php } ?>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- tab show pending promotion -->
                <div class="tab-pane <?php if ($_SESSION['tab_number_promotion'] == 2) echo "active"; ?>" id="tab_pending">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped" style="text-align: center;">
                                        <thead class="text-white" style="background-color: #e4a487; text-align: center;">
                                            <tr>
                                                <th>ลำดับ</th>
                                                <th>ชื่อกิจกรรม</th>
                                                <th>รายละเอียดกิจกรรม</th>
                                                <th>ของสถานที่</th>
                                                <th>ดำเนินการ</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            <?php
                                            $count_pending = 0;
                                            for ($i = 0; $i < count($arr_promotion); $i++) {
                                                if ($arr_promotion[$i]->pro_status == 1) {
                                                    $count_pending++;
                                                }
                                            }
                                            if (sizeof($arr_promotion) == 0 || $count_pending == 0) {
                                                echo "<td colspan = '5'>";
                                                echo "ไม่มีข้อมูลในตารางนี้";
                                                echo "</td>";
                                            } else {
                                                $count_i = 0;
                                                for ($i = 0; $i < count($arr_promotion); $i++) {
                                                    if ($arr_promotion[$i]->pro_status == 1) {
                                                        $count_i++ ?>
                                                        <tr>
                                                            <td><?php echo $count_i; ?></td>
                                                            <td style="text-align: left;"><?php echo $arr_promotion[$i]->pro_name; ?>
                                                            </td>
                                                            <?php if (iconv_strlen($arr_promotion[$i]->pro_description, 'UTF-8') > 60) { ?>
                                                                <td style="text-align: left;">
                                                                    <?php echo iconv_substr($arr_promotion[$i]->pro_description, 0, 60, "UTF-8") . "..."; ?>
                                                                </td>
                                                            <?php } ?>
                                                            <?php if (iconv_strlen($arr_promotion[$i]->pro_description, 'UTF-8') <= 60) { ?>
                                                                <td style="text-align: left;">
                                                                    <?php echo $arr_promotion[$i]->pro_description; ?></td>
                                                            <?php } ?>
                                                            <td style="text-align: left;"><?php echo $arr_promotion[$i]->com_name; ?>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-info" style="font-size:10px; padding:12px;" href="">
                                                                    <span class="material-icons">search</span>
                                                                </a>
                                                                <a class="btn btn-warning" style="font-size:10px; padding:12px;" href="">
                                                                    <span class="material-icons">edit</span>
                                                                </a>
                                                                <button class="btn btn-danger" style="font-size:10px; padding:12px;" onclick="">
                                                                    <span class="material-icons">clear</span>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                <?php } ?>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- tab show start promotion -->
                <div class="tab-pane <?php if ($_SESSION['tab_number_promotion'] == 3) echo "active"; ?>" id="tab_approved_strat">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped" style="text-align: center;">
                                        <thead class="text-white" style="background-color: #e4a487; text-align: center;">
                                            <tr>
                                                <th>ลำดับ</th>
                                                <th>ชื่อกิจกรรม</th>
                                                <th>รายละเอียดกิจกรรม</th>
                                                <th>ของสถานที่</th>
                                                <th>สถานะโปรโมชัน</th>
                                                <th>ดำเนินการ</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            <?php
                                            $count_approved_start = 0;
                                            for ($i = 0; $i < count($arr_promotion); $i++) {
                                                if ($arr_promotion[$i]->pro_status == 2 && $arr_promotion[$i]->pro_end_date > $date_now && $arr_promotion[$i]->pro_start_date <= $date_now || $arr_promotion[$i]->pro_start_date > $date_now) {
                                                    $count_approved_start++;
                                                }
                                            }
                                            if (sizeof($arr_promotion) == 0 || $count_approved_start == 0) {
                                                echo "<td colspan = '5'>";
                                                echo "ไม่มีข้อมูลในตารางนี้";
                                                echo "</td>";
                                            } else {
                                                $count_i = 0;
                                                for ($i = 0; $i < count($arr_promotion); $i++) {
                                                    if ($arr_promotion[$i]->pro_status == 2 && $arr_promotion[$i]->pro_end_date > $date_now && $arr_promotion[$i]->pro_start_date <= $date_now || $arr_promotion[$i]->pro_start_date > $date_now) {
                                                        $count_i++ ?>
                                                        <tr>
                                                            <td><?php echo $count_i; ?></td>
                                                            <td style="text-align: left;"><?php echo $arr_promotion[$i]->pro_name; ?>
                                                            </td>
                                                            <?php if (iconv_strlen($arr_promotion[$i]->pro_description, 'UTF-8') > 60) { ?>
                                                                <td style="text-align: left;">
                                                                    <?php echo iconv_substr($arr_promotion[$i]->pro_description, 0, 60, "UTF-8") . "..."; ?>
                                                                </td>
                                                            <?php } ?>
                                                            <?php if (iconv_strlen($arr_promotion[$i]->pro_description, 'UTF-8') <= 60) { ?>
                                                                <td style="text-align: left;">
                                                                    <?php echo $arr_promotion[$i]->pro_description; ?></td>
                                                            <?php } ?>
                                                            <td style="text-align: left;"><?php echo $arr_promotion[$i]->com_name; ?>
                                                            </td>
                                                            <?php if ($arr_promotion[$i]->pro_end_date > $date_now && $arr_promotion[$i]->pro_start_date <= $date_now) { ?>
                                                                <td style="color: #669900;">ยังไม่สิ้นสุด</td>
                                                            <?php } ?>
                                                            <?php if ($arr_promotion[$i]->pro_start_date > $date_now) { ?>
                                                                <td style="color: #669900;">อนุมัติ</td>
                                                            <?php } ?>
                                                            <td>
                                                                <a class="btn btn-info" style="font-size:10px; padding:12px;" href="">
                                                                    <span class="material-icons">search</span>
                                                                </a>
                                                                <a class="btn btn-warning" style="font-size:10px; padding:12px;" href="">
                                                                    <span class="material-icons">edit</span>
                                                                </a>
                                                                <button class="btn btn-danger" style="font-size:10px; padding:12px;" onclick="">
                                                                    <span class="material-icons">clear</span>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                <?php } ?>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- tab show end promotion -->
                <div class="tab-pane <?php if ($_SESSION['tab_number_promotion'] == 4) echo "active"; ?>" id="tab_approved_end">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped" style="text-align: center;">
                                        <thead class="text-white" style="background-color: #e4a487; text-align: center;">
                                            <tr>
                                                <th>ลำดับ</th>
                                                <th>ชื่อกิจกรรม</th>
                                                <th>รายละเอียดกิจกรรม</th>
                                                <th>ของสถานที่</th>
                                                <th>สถานะโปรโมชัน</th>
                                                <th>ดำเนินการ</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            <?php
                                            $count_approved_end = 0;
                                            for ($i = 0; $i < count($arr_promotion); $i++) {
                                                if ($arr_promotion[$i]->pro_status == 2 && $arr_promotion[$i]->pro_end_date <= $date_now && $arr_promotion[$i]->pro_start_date <= $date_now) {
                                                    $count_approved_end++;
                                                }
                                            }
                                            if (sizeof($arr_promotion) == 0 || $count_approved_end == 0) {
                                                echo "<td colspan = '5'>";
                                                echo "ไม่มีข้อมูลในตารางนี้";
                                                echo "</td>";
                                            } else {
                                                $count_i = 0;
                                                for ($i = 0; $i < count($arr_promotion); $i++) {
                                                    if ($arr_promotion[$i]->pro_status == 2 && $arr_promotion[$i]->pro_end_date <= $date_now && $arr_promotion[$i]->pro_start_date <= $date_now) {
                                                        $count_i++ ?>
                                                        <tr>
                                                            <td><?php echo $count_i; ?></td>
                                                            <td style="text-align: left;"><?php echo $arr_promotion[$i]->pro_name; ?>
                                                            </td>
                                                            <?php if (iconv_strlen($arr_promotion[$i]->pro_description, 'UTF-8') > 60) { ?>
                                                                <td style="text-align: left;">
                                                                    <?php echo iconv_substr($arr_promotion[$i]->pro_description, 0, 60, "UTF-8") . "..."; ?>
                                                                </td>
                                                            <?php } ?>
                                                            <?php if (iconv_strlen($arr_promotion[$i]->pro_description, 'UTF-8') <= 60) { ?>
                                                                <td style="text-align: left;">
                                                                    <?php echo $arr_promotion[$i]->pro_description; ?></td>
                                                            <?php } ?>
                                                            <td style="text-align: left;"><?php echo $arr_promotion[$i]->com_name; ?>
                                                            </td>
                                                            <td style="color: red;">สิ้นสุด</td>
                                                            <td>
                                                                <a class="btn btn-info" style="font-size:10px; padding:12px;" href="">
                                                                    <span class="material-icons">search</span>
                                                                </a>
                                                                <a class="btn btn-warning" style="font-size:10px; padding:12px;" href="">
                                                                    <span class="material-icons">edit</span>
                                                                </a>
                                                                <button class="btn btn-danger" style="font-size:10px; padding:12px;" onclick="">
                                                                    <span class="material-icons">clear</span>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                <?php } ?>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        check_name_table(<?php echo $_SESSION['tab_number_promotion'] ?>);
    });
    /*
     * change_tab_number_ajax
     * change tab session tab_number_promotion
     * @input tab_promotion
     * @output -
     * @author Suwapat Saowarod 62160340
     * @Create Date 2564-10-02
     * @Update -
     */
    function change_tab_number_ajax(tab_promotion) {
        $.ajax({
            url: '<?php echo site_url('Entrepreneur/Manage_promotion/Promotion_list/change_tab_promotion_ajax') ?>',
            method: 'POST',
            dataType: 'JSON',
            data: {
                tab_promotion: tab_promotion
            },
            success: function(data) {
                check_name_table(data);
            }
        });
    }

    /*
     * check_name_table
     * check name table
     * @input tab_promotion
     * @output -
     * @author Suwapat Saowarod 62160340
     * @Create Date 2564-10-02
     * @Update -
     */
    function check_name_table(tab_promotion) {
        if (tab_promotion == 1) {
            $('#name_table').html('โปรโมชันทั้งหมด');
        } else if (tab_promotion == 2) {
            $('#name_table').html('โปรโมชันรออนุมัติ');
        } else if (tab_promotion == 3) {
            $('#name_table').html('โปรโมชันที่ยังไม่สิ้นสุด');
        } else if (tab_promotion == 4) {
            $('#name_table').html('โปรโมชันสิ้นสุดแล้ว');
        } else if (tab_promotion == 5) {
            $('#name_table').html('โปรโมชันที่ถูกปฏิเสธ');
        }
    }
</script>