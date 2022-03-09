<!-- 
/*
* v_list_event
* Display data event by entrepreneur
* @input arr_event
* @output data event
* @author Suwapat Saowarod 62160340
* @Create Date 2564-09-16
*/ 
-->
<script type="text/javascript" src="<?php echo base_url('assets/plugin/QRCODE/qrcode.js') ?>"></script>
<div class="content">
    <div class="row">
        <div class="col">
            <h3 id="name_table"
                style="margin : 0 auto !important;padding-left: 3px !important;padding-bottom: 10px; float:left; font-family: 'Prompt', sans-serif !important;">
            </h3>
        </div>
        <div class="col">
            <button class="btn btn-info" style="margin-top: 2px; float:right; border-radius: 5px;"
            onclick="location.href='<?php echo base_url() . 'Entrepreneur/Manage_event/Event_add/show_add_event' ?>'">เพิ่มกิจกรรม</button>
        </div>
    </div>
    <div class="card card-nav-tabs custom-card-tab">
        <div class="card-header custom-header-tab">
            <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                    <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                            <a class="nav-link <?php if ($_SESSION['tab_number_event'] == 1) echo "active"; ?>"
                                href="#tab_all" data-toggle="tab" onclick="change_tab_number_ajax(1)">
                                <h5 class="h5-card-header">ทั้งหมด</h5>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($_SESSION['tab_number_event'] == 2) echo "active"; ?>"
                                href="#tab_pending" data-toggle="tab" onclick="change_tab_number_ajax(2)">
                                <h5 class="h5-card-header">รออนุมัติ</h5>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($_SESSION['tab_number_event'] == 3) echo "active"; ?>"
                                href="#tab_approved_start" data-toggle="tab" onclick="change_tab_number_ajax(3)">
                                <h5 class="h5-card-header">ยังไม่สิ้นสุด</h5>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($_SESSION['tab_number_event'] == 4) echo "active"; ?>"
                                href="#tab_approved_end" data-toggle="tab" onclick="change_tab_number_ajax(4)">
                                <h5 class="h5-card-header">สิ้นสุดแล้ว</h5>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($_SESSION['tab_number_event'] == 5) echo "active"; ?>"
                                href="#tab_reject" data-toggle="tab" onclick="change_tab_number_ajax(5)">
                                <h5 class="h5-card-header">ถูกปฏิเสธ</h5>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="tab-content">

                <!-- tab show all event -->
                <div class="tab-pane <?php if ($_SESSION['tab_number_event'] == 1) echo "active"; ?>" id="tab_all">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped" style="text-align: center;">
                                        <thead class="text-white"
                                            style="background-color: #e4a487; text-align: center;">
                                            <tr>
                                                <th class="res-hide">ลำดับ</th>
                                                <th>ชื่อกิจกรรม</th>
                                                <th class="res-hide">เวลาดำเนินการ</th>
                                                <th>สถานะกิจกรรม</th>
                                                <th>ดำเนินการ</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            <?php if (sizeof($arr_event) == 0) {
                                                echo "<td colspan = '5'>";
                                                echo "ไม่มีข้อมูลในตารางนี้";
                                                echo "</td>";
                                            } else {
                                                for ($i = 0; $i < count($arr_event); $i++) { ?>
                                            <tr>
                                                <td class="res-hide"><?php echo $i + 1; ?></td>
                                                <td style="text-align: left;"><?php echo $arr_event[$i]->eve_name; ?></td>
                                                <td class="res-hide" style="text-align: left;">
                                                    <?php echo to_format_abbreviation($arr_event[$i]->eve_start_date).' - '. to_format_abbreviation($arr_event[$i]->eve_end_date); ?>
                                                </td>
                                                <?php if ($arr_event[$i]->eve_status != 3) { ?>
                                                    <?php if ($arr_event[$i]->eve_status == 1) { ?>
                                                        <td style="color: #fba004;">รออนุมัติ</td>
                                                        <td>
                                                            <button class="btn btn-info" style="font-size:10px; padding:12px;"
                                                                onclick="location.href='<?php echo base_url() . 'Entrepreneur/Manage_event/Event_detail/show_detail_event/' . $arr_event[$i]->eve_id; ?>'" title="ดูรายละเอียดกิจกรรม">
                                                                <span class="material-icons">search</span>
                                                            </button>
                                                            <button class="btn btn-warning"
                                                                style="font-size:10px; padding:12px;"
                                                                onclick="location.href='<?php echo base_url() . 'Entrepreneur/Manage_event/Event_edit/show_edit_event/' . $arr_event[$i]->eve_id; ?>'" title="แก้ไขข้อมูลกิจกรรม">
                                                                <span class="material-icons">edit</span>
                                                            </button>
                                                            <button class="btn btn-danger" style="font-size:10px; padding:12px;"
                                                                onclick="confirm_delete('<?php echo $arr_event[$i]->eve_name ?>', <?php echo $arr_event[$i]->eve_id ?>)" title="ลบกิจกรรม">
                                                                <span class="material-icons">delete</span>
                                                            </button>
                                                        </td>
                                                    <?php } ?>
                                                    <?php if ($arr_event[$i]->eve_status == 2) { ?>
                                                        <?php if ($arr_event[$i]->eve_end_date > $date_now && $arr_event[$i]->eve_start_date <= $date_now) { ?>
                                                            <td style="color: #669900;">ยังไม่สิ้นสุด</td>
                                                            <td>
                                                                <button class="btn btn-info" style="font-size:10px; padding:12px;"
                                                                    onclick="location.href='<?php echo base_url() . 'Entrepreneur/Manage_event/Event_detail/show_detail_event/' . $arr_event[$i]->eve_id; ?>'" title="ดูรายละเอียดกิจกรรม">
                                                                    <span class="material-icons">search</span>
                                                                </button>
                                                                <button class="btn btn-warning"
                                                                    style="font-size:10px; padding:12px;"
                                                                    onclick="location.href='<?php echo base_url() . 'Entrepreneur/Manage_event/Event_edit/show_edit_event/' . $arr_event[$i]->eve_id; ?>'" title="แก้ไขข้อมูลกิจกรรม">
                                                                    <span class="material-icons">edit</span>
                                                                </button>
                                                                <button class="btn btn-danger" style="font-size:10px; padding:12px;"
                                                                    onclick="confirm_delete('<?php echo $arr_event[$i]->eve_name ?>', <?php echo $arr_event[$i]->eve_id ?>)" title="ลบกิจกรรม">
                                                                    <span class="material-icons">delete</span>
                                                                </button>
                                                                <button class="btn btn-success"
                                                                    style="font-size:10px; padding:12px;"
                                                                    onclick="make_qr_code(<?php echo $arr_event[$i]->eve_id ?>, '<?php echo $arr_event[$i]->eve_name ?>', '<?php echo $arr_event[$i]->eve_start_date?>', '<?php echo $arr_event[$i]->eve_end_date?>')" title="สร้าง QR Code กิจกรรม">
                                                                    <span class="material-icons">qr_code</span>
                                                                </button>
                                                            </td>
                                                        <?php } ?>
                                                        <?php if ($arr_event[$i]->eve_end_date <= $date_now && $arr_event[$i]->eve_start_date <= $date_now) { ?>
                                                            <td style="color: red;">สิ้นสุด</td>
                                                            <td>
                                                                <button class="btn btn-info" style="font-size:10px; padding:12px;"
                                                                    onclick="location.href='<?php echo base_url() . 'Entrepreneur/Manage_event/Event_detail/show_detail_event/' . $arr_event[$i]->eve_id; ?>'">
                                                                    <span class="material-icons">search</span>
                                                                </button>
                                                                <button class="btn btn-warning"
                                                                    style="font-size:10px; padding:12px;"
                                                                    onclick="location.href='<?php echo base_url() . 'Entrepreneur/Manage_event/Event_edit/show_edit_event/' . $arr_event[$i]->eve_id; ?>'" title="แก้ไขข้อมูลกิจกรรม">
                                                                    <span class="material-icons">edit</span>
                                                                </button>
                                                                <button class="btn btn-danger" style="font-size:10px; padding:12px;"
                                                                    onclick="confirm_delete('<?php echo $arr_event[$i]->eve_name ?>', <?php echo $arr_event[$i]->eve_id ?>)" title="ลบกิจกรรม">
                                                                    <span class="material-icons">delete</span>
                                                                </button>
                                                            </td>
                                                        <?php } ?>
                                                        <?php if ($arr_event[$i]->eve_start_date > $date_now) { ?>
                                                            <td style="color: #669900;">อนุมัติ</td>
                                                            <td>
                                                                <button class="btn btn-info" style="font-size:10px; padding:12px;"
                                                                    onclick="location.href='<?php echo base_url() . 'Entrepreneur/Manage_event/Event_detail/show_detail_event/' . $arr_event[$i]->eve_id; ?>'" title="ดูรายละเอียดกิจกรรม">
                                                                    <span class="material-icons">search</span>
                                                                </button>
                                                                <button class="btn btn-warning"
                                                                    style="font-size:10px; padding:12px;"
                                                                    onclick="location.href='<?php echo base_url() . 'Entrepreneur/Manage_event/Event_edit/show_edit_event/' . $arr_event[$i]->eve_id; ?>'" title="แก้ไขข้อมูลกิจกรรม">
                                                                    <span class="material-icons">edit</span>
                                                                </button>
                                                                <button class="btn btn-danger" style="font-size:10px; padding:12px;"
                                                                    onclick="confirm_delete('<?php echo $arr_event[$i]->eve_name ?>', <?php echo $arr_event[$i]->eve_id ?>)" title="ลบกิจกรรม">
                                                                    <span class="material-icons">delete</span>
                                                                </button>
                                                            </td>
                                                        <?php } ?>
                                                    <?php } ?>
                                                    
                                                <?php } ?>
                                                <?php if ($arr_event[$i]->eve_status == 3) { ?>
                                                <td style="color: red;">ปฏิเสธ</td>
                                                <td>
                                                    <button class="btn btn-info" style="font-size:10px; padding:12px;"
                                                        onclick="location.href='<?php echo base_url() . 'Entrepreneur/Manage_event/Event_edit/show_edit_event/' . $arr_event[$i]->eve_id; ?>'" title="ดูรายละเอียดกิจกรรม">
                                                        <span class="material-icons">search</span>
                                                    </button>
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

                <!-- tab show pending event -->
                <div class="tab-pane <?php if ($_SESSION['tab_number_event'] == 2) echo "active"; ?>" id="tab_pending">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped" style="text-align: center;">
                                        <thead class="text-white"
                                            style="background-color: #e4a487; text-align: center;">
                                            <tr>
                                                <th class="res-hide">ลำดับ</th>
                                                <th>ชื่อกิจกรรม</th>
                                                <th class="res-hide">เวลาดำเนินการ</th>
                                                <th>สถานะกิจกรรม</th>
                                                <th>ดำเนินการ</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            <?php
                                            $count_pending = 0;
                                            for ($i = 0; $i < count($arr_event); $i++) {
                                                if ($arr_event[$i]->eve_status == 1) {
                                                    $count_pending++;
                                                }
                                            }
                                            if (sizeof($arr_event) == 0 || $count_pending == 0) {
                                                echo "<td colspan = '5'>";
                                                echo "ไม่มีข้อมูลในตารางนี้";
                                                echo "</td>";
                                            } else {
                                                $count_i = 0;
                                                for ($i = 0; $i < count($arr_event); $i++) {
                                                    if ($arr_event[$i]->eve_status == 1) {
                                                        $count_i++ ?>
                                                    <tr>
                                                        <td class="res-hide"><?php echo $count_i; ?></td>
                                                        <td style="text-align: left;"><?php echo $arr_event[$i]->eve_name; ?>
                                                        </td>
                                                        <td class="res-hide" style="text-align: left;">
                                                            <?php echo to_format_abbreviation($arr_event[$i]->eve_start_date).' - '. to_format_abbreviation($arr_event[$i]->eve_end_date); ?>
                                                        </td>
                                                        <td style="color: #fba004;">รออนุมัติ</td>
                                                        <td>
                                                            <button class="btn btn-info" style="font-size:10px; padding:12px;"
                                                                onclick="location.href='<?php echo base_url() . 'Entrepreneur/Manage_event/Event_detail/show_detail_event/' . $arr_event[$i]->eve_id; ?>'" title="ดูรายละเอียดกิจกรรม">
                                                                <span class="material-icons">search</span>
                                                            </button>
                                                            <button class="btn btn-warning"
                                                                style="font-size:10px; padding:12px;"
                                                                onclick="location.href='<?php echo base_url() . 'Entrepreneur/Manage_event/Event_edit/show_edit_event/' . $arr_event[$i]->eve_id; ?>'" title="แก้ไขข้อมูลกิจกรรม">
                                                                <span class="material-icons">edit</span>
                                                            </button>
                                                            <button class="btn btn-danger" style="font-size:10px; padding:12px;"
                                                                onclick="confirm_delete('<?php echo $arr_event[$i]->eve_name ?>', <?php echo $arr_event[$i]->eve_id ?>)" title="ลบกิจกรรม">
                                                                <span class="material-icons">delete</span>
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

                <!-- tab show start event -->
                <div class="tab-pane <?php if ($_SESSION['tab_number_event'] == 3) echo "active"; ?>"
                    id="tab_approved_start">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped" style="text-align: center;">
                                        <thead class="text-white"
                                            style="background-color: #e4a487; text-align: center;">
                                            <tr>
                                                <th class="res-hide">ลำดับ</th>
                                                <th>ชื่อกิจกรรม</th>
                                                <th class="res-hide">เวลาดำเนินการ</th>
                                                <th>สถานะกิจกรรม</th>
                                                <th>ดำเนินการ</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            <?php
                                            $count_approved_start = 0;
                                            for ($i = 0; $i < count($arr_event); $i++) {
                                                if ($arr_event[$i]->eve_status == 2 && ($arr_event[$i]->eve_end_date > $date_now && $arr_event[$i]->eve_start_date <= $date_now || $arr_event[$i]->eve_start_date > $date_now)) {
                                                    $count_approved_start++;
                                                }
                                            }
                                            if (sizeof($arr_event) == 0 || $count_approved_start == 0) {
                                                echo "<td colspan = '5'>";
                                                echo "ไม่มีข้อมูลในตารางนี้";
                                                echo "</td>";
                                            } else {
                                                $count_i = 0;
                                                for ($i = 0; $i < count($arr_event); $i++) {
                                                    if ($arr_event[$i]->eve_status == 2 && ($arr_event[$i]->eve_end_date > $date_now && $arr_event[$i]->eve_start_date <= $date_now || $arr_event[$i]->eve_start_date > $date_now)) {
                                                        $count_i++; ?>
                                            <tr>
                                                <td class="res-hide"><?php echo $count_i; ?></td>
                                                <td style="text-align: left;"><?php echo $arr_event[$i]->eve_name; ?>
                                                </td>
                                                <td class="res-hide" style="text-align: left;">
                                                    <?php echo to_format_abbreviation($arr_event[$i]->eve_start_date).' - '. to_format_abbreviation($arr_event[$i]->eve_end_date); ?>
                                                </td>
                                                <?php if ($arr_event[$i]->eve_start_date <= $date_now && $arr_event[$i]->eve_end_date > $date_now) { ?>
                                                <td style="color: #669900;">ยังไม่สิ้นสุด</td>
                                                <?php } ?>
                                                <?php if ($arr_event[$i]->eve_start_date > $date_now) { ?>
                                                <td style="color: #669900;">อนุมัติ</td>
                                                <?php } ?>
                                                <td>
                                                    <button class="btn btn-info" style="font-size:10px; padding:12px;"
                                                        onclick="location.href='<?php echo base_url() . 'Entrepreneur/Manage_event/Event_detail/show_detail_event/' . $arr_event[$i]->eve_id; ?>'" title="ดูรายละเอียดกิจกรรม">
                                                        <span class="material-icons">search</span>
                                                    </button>
                                                    <button class="btn btn-warning"
                                                        style="font-size:10px; padding:12px;"
                                                        onclick="location.href='<?php echo base_url() . 'Entrepreneur/Manage_event/Event_edit/show_edit_event/' . $arr_event[$i]->eve_id; ?>'" title="แก้ไขข้อมูลกิจกรรม">
                                                        <span class="material-icons">edit</span>
                                                    </button>
                                                    <button class="btn btn-danger" style="font-size:10px; padding:12px;"
                                                        onclick="confirm_delete('<?php echo $arr_event[$i]->eve_name ?>', <?php echo $arr_event[$i]->eve_id ?>)" title="ลบกิจกรรม">
                                                        <span class="material-icons">delete</span>
                                                    </button>
                                                    <button class="btn btn-success"
                                                        style="font-size:10px; padding:12px;"
                                                        onclick="make_qr_code(<?php echo $arr_event[$i]->eve_id ?>, '<?php echo $arr_event[$i]->eve_name ?>', '<?php echo $arr_event[$i]->eve_start_date?>', '<?php echo $arr_event[$i]->eve_end_date?>')" title="สร้าง QR Code กิจกรรม">
                                                        <span class="material-icons">qr_code</span>
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

                <!-- tab show end event -->
                <div class="tab-pane <?php if ($_SESSION['tab_number_event'] == 4) echo "active"; ?>"
                    id="tab_approved_end">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped" style="text-align: center;">
                                        <thead class="text-white"
                                            style="background-color: #e4a487; text-align: center;">
                                            <tr>
                                                <th class="res-hide">ลำดับ</th>
                                                <th>ชื่อกิจกรรม</th>
                                                <th class="res-hide">เวลาดำเนินการ</th>
                                                <th>สถานะกิจกรรม</th>
                                                <th>ดำเนินการ</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            <?php
                                            $count_approved_end = 0;
                                            for ($i = 0; $i < count($arr_event); $i++) {
                                                if ($arr_event[$i]->eve_status == 2 && $arr_event[$i]->eve_end_date <= $date_now && $arr_event[$i]->eve_start_date <= $date_now) {
                                                    $count_approved_end++;
                                                }
                                            }
                                            if (sizeof($arr_event) == 0 || $count_approved_end == 0) {
                                                echo "<td colspan = '5'>";
                                                echo "ไม่มีข้อมูลในตารางนี้";
                                                echo "</td>";
                                            } else {
                                                $count_i = 0;
                                                for ($i = 0; $i < count($arr_event); $i++) {
                                                    if ($arr_event[$i]->eve_status == 2 && $arr_event[$i]->eve_end_date <= $date_now && $arr_event[$i]->eve_start_date <= $date_now) {
                                                        $count_i++; ?>
                                            <tr>
                                                <td class="res-hide"><?php echo $count_i; ?></td>
                                                <td style="text-align: left;"><?php echo $arr_event[$i]->eve_name; ?>
                                                </td>
                                                <td class="res-hide" style="text-align: left;">
                                                    <?php echo to_format_abbreviation($arr_event[$i]->eve_start_date).' - '. to_format_abbreviation($arr_event[$i]->eve_end_date); ?>
                                                </td>
                                                <?php if ($arr_event[$i]->eve_end_date <= $date_now && $arr_event[$i]->eve_start_date <= $date_now) { ?>
                                                <td style="color: red;">สิ้นสุด</td>
                                                <?php } ?>
                                                <td>
                                                    <button class="btn btn-info" style="font-size:10px; padding:12px;"
                                                        onclick="location.href='<?php echo base_url() . 'Entrepreneur/Manage_event/Event_detail/show_detail_event/' . $arr_event[$i]->eve_id; ?>'" title="ดูรายละเอียดกิจกรรม">
                                                        <span class="material-icons">search</span>
                                                    </button>
                                                    <button class="btn btn-warning"
                                                        style="font-size:10px; padding:12px;"
                                                        onclick="location.href='<?php echo base_url() . 'Entrepreneur/Manage_event/Event_edit/show_edit_event/' . $arr_event[$i]->eve_id; ?>'" title="แก้ไขข้อมูลกิจกรรม">
                                                        <span class="material-icons">edit</span>
                                                    </button>
                                                    <button class="btn btn-danger" style="font-size:10px; padding:12px;"
                                                        onclick="confirm_delete('<?php echo $arr_event[$i]->eve_name ?>', <?php echo $arr_event[$i]->eve_id ?>)" title="ลบกิจกรรม">
                                                        <span class="material-icons">delete</span>
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

                <!-- tab show reject event -->
                <div class="tab-pane <?php if ($_SESSION['tab_number_event'] == 5) echo "active"; ?>" id="tab_reject">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped" style="text-align: center;">
                                        <thead class="text-white"
                                            style="background-color: #e4a487; text-align: center;">
                                            <tr>
                                                <th class="res-hide">ลำดับ</th>
                                                <th>ชื่อกิจกรรม</th>
                                                <th class="res-hide">เวลาดำเนินการ</th>
                                                <th>สถานะกิจกรรม</th>
                                                <th>ดำเนินการ</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            <?php
                                            $count_reject = 0;
                                            for ($i = 0; $i < count($arr_event); $i++) {
                                                if ($arr_event[$i]->eve_status == 3) {
                                                    $count_reject++;
                                                }
                                            }
                                            if (sizeof($arr_event) == 0 || $count_reject == 0) {
                                                echo "<td colspan = '5'>";
                                                echo "ไม่มีข้อมูลในตารางนี้";
                                                echo "</td>";
                                            } else {
                                                $count_i = 0;
                                                for ($i = 0; $i < count($arr_event); $i++) {
                                                    if ($arr_event[$i]->eve_status == 3) {
                                                        $count_i++; ?>
                                            <tr>
                                                <td class="res-hide"><?php echo $count_i; ?></td>
                                                <td style="text-align: left;"><?php echo $arr_event[$i]->eve_name; ?>
                                                </td>
                                                <td class="res-hide" style="text-align: left;">
                                                    <?php echo to_format_abbreviation($arr_event[$i]->eve_start_date).' - '. to_format_abbreviation($arr_event[$i]->eve_end_date); ?>
                                                </td>
                                                <td style="color: red;">ปฏิเสธ</td>
                                                <td>
                                                    <button class="btn btn-info" style="font-size:10px; padding:12px;"
                                                        onclick="location.href='<?php echo base_url() . 'Entrepreneur/Manage_event/Event_detail/show_detail_event/' . $arr_event[$i]->eve_id; ?>'" title="ดูรายละเอียดกิจกรรม">
                                                        <span class="material-icons">search</span>
                                                    </button>

                                                    <!-- clear -->
                                                    <button class="btn btn-danger" style="font-size:10px; padding:12px;"
                                                        onclick="confirm_delete('<?php echo $arr_event[$i]->eve_name ?>', <?php echo $arr_event[$i]->eve_id ?>)" title="ลบกิจกรรม">
                                                        <span class="material-icons">delete</span>
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

<!-- modal delete event  -->
<div class="modal" tabindex="-1" role="dialog" id="modal_delete">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-family: 'Prompt', sans-serif !important;">แจ้งเตือน</h5>
            </div>
            <div class="modal-body">
                <p>คุณต้องการที่จะลบ <span id="eve_name_confirm"></span> ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="delete_btn" data-dismiss="modal">ยืนยัน</button>
                <button type="button" class="btn btn-secondary" style="color: white; background-color: #777777;"
                    data-dismiss="modal">ยกเลิก</button>
            </div>
        </div>
    </div>
</div>


<!-- modal qr-code event  -->
<div class="modal" tabindex="-1" role="dialog" id="modal_qrcode">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="col-12" style="text-align: center;"><span id="name_qr"></span></h3>
            </div>
            <div class="modal-body">
                <center><div id="qr_code" style="width:100%; height:100%;"></div></center><br>
                <h5><img src="<?php echo base_url() . 'assets/templete/picture/promotion_icon.png' ?>" width="30px"> ระยะเวลา : <span id="event_time"></h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" style="color: white;" data-dismiss="modal">เสร็จสิ้น</button>
            </div>
        </div>
    </div>
</div>


<script>
/*
 * @author Suwapat Saowarod 62160340
 */
$(document).ready(function() {
    var error = '<?php echo $this->session->userdata("error_add_event"); ?>';
    if (error == 'success') {
        swal("เพิ่มกิจกรรมสำเร็จ", "กรุณารอการอนุมัติจากผู้ดูเเลระบบภายใน 1 วัน", "success");
        <?php echo $this->session->unset_userdata("error_add_event"); ?>;
    }
    var error = '<?php echo $this->session->userdata("error_edit_event"); ?>';
    if (error == 'success') {
        swal("แก้ไขกิจกรรมสำเร็จ", "กรุณารอการอนุมัติจากผู้ดูเเลระบบภายใน 1 วัน", "success");
        <?php echo $this->session->unset_userdata("error_edit_event"); ?>;
    }
    check_name_table(<?php echo $_SESSION['tab_number_event'] ?>);
});

var qrcode = new QRCode(document.getElementById("qr_code"), {
    width: 250,
    height: 250 
});
/*
 * make_qr_code
 * make qr code event
 * @input eve_id, eve_name
 * @output -
 * @author Weradet Nopsombun 62160110
 * @Create Date 2564-10-12
 * @Update -
 */
function make_qr_code(eve_id, eve_name, eve_start, eve_end) {
    let url = "https://www.informatics.buu.ac.th/team2/Tourist/Checkin_event/Checkin_event/check_login_before_check_in/";
    qrcode.makeCode( url + eve_id);
    $('#name_qr').html(eve_name);
    $('#modal_qrcode').modal();
    event_time = format_date(eve_start);
    event_time += ' - ';
    event_time += format_date(eve_end);
    $('#event_time').html(event_time);
}
/*
 * change_tab_number_ajax
 * change tab session tab_number_event
 * @input tab_event
 * @output -
 * @author Suwapat Saowarod 62160340
 * @Create Date 2564-09-17
 * @Update 2564-09-16
 */
function change_tab_number_ajax(tab_event) {
    $.ajax({
        url: '<?php echo base_url('Entrepreneur/Manage_event/Event_list/change_tab_event_ajax/') ?>',
        method: 'POST',
        dataType: 'JSON',
        data: {
            tab_event: tab_event
        },
        success: function(data) {
            check_name_table(data);
        }
    });
}

/*
 * check_name_table
 * check name table
 * @input tab_event
 * @output -
 * @author Suwapat Saowarod 62160340
 * @Create Date 2564-09-17
 * @Update -
 */
function check_name_table(tab_event) {
    if (tab_event == 1) {
        $('#name_table').html('กิจกรรมทั้งหมด');
    } else if (tab_event == 2) {
        $('#name_table').html('กิจกรรมที่รออนุมัติ');
    } else if (tab_event == 3) {
        $('#name_table').html('กิจกรรมที่ยังไม่สิ้นสุด');
    } else if (tab_event == 4) {
        $('#name_table').html('กิจกรรมที่สิ้นสุดเเล้ว');
    } else if (tab_event == 5) {
        $('#name_table').html('กิจกรรมที่ถูกปฏิเสธ');
    }
}

/*
 * confirm_delete
 * confirm delete event
 * @input eve_name_con,eve_id_con
 * @output modal comfirm delete event
 * @author Thanchanok Thonhjumroon 62160089
 * @Create Date 2564-09-25
 */
function confirm_delete(eve_name_con, eve_id_con) {
    $('#eve_name_confirm').text(eve_name_con);
    $('#modal_delete').modal();

    // button
    $('#delete_btn').click(function() {
        delete_event(eve_id_con)
    });
}

/*
 * delete_event
 * confirm delete event
 * @input eve_id_con
 * @output delete event
 * @author Thanchanok Thongjumroon 62160089
 * @Create Date 2564-09-24
 * @Update Date 2564-09-25
 */
function delete_event(eve_id_con) {

    $.ajax({
        type: "POST",
        data: {
            eve_id: eve_id_con
        },
        url: '<?php echo base_url() . 'Entrepreneur/Manage_event/Event_edit/delete_event' ?>',
        success: function() {
            swal({
                    title: "ลบกิจกรรม",
                    text: "คุณได้ทำการลบกิจกรรมเสร็จสิ้น",
                    type: "success"
                },
                function() {
                    location.reload();
                })

        },
        error: function() {
            alert('ajax error working');
        }
    });

}
</script>