<!-- 
/*
* v_list_event
* Display data event by entrepreneur
* @input arr_event
* @output form add company
* @author Suwapat Saowarod 62160340
* @Create Date 2564-09-16
*/ 
-->
<div class="content">
    <div class="row">
        <div class="col">
            <h3 id="name_table"
                style="margin : 0 auto !important;padding-left: 3px !important;padding-bottom: 10px; float:left; font-family: 'Prompt', sans-serif !important;">
            </h3>
        </div>
        <div class="col">
            <a class="btn btn-info" style="margin-top: 2px; float:right; border-radius: 5px;" href="<?php echo base_url().'Entrepreneur/Manage_event/Event_add/show_add_event'?>">เพิ่มกิจกรรม</a>
        </div>
    </div>
    <div class="card card-nav-tabs custom-card-tab">
        <div class="card-header custom-header-tab">
            <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                    <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                            <a class="nav-link <?php if ($_SESSION['tab_number_event'] == 1) echo "active"; ?>"
                                href="#tab_all" data-toggle="tab" onclick="change_tab_number_ajax(1)"><h5 class="h5-card-header">ทั้งหมด</h5></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($_SESSION['tab_number_event'] == 2) echo "active"; ?>"
                                href="#tab_pending" data-toggle="tab" onclick="change_tab_number_ajax(2)"><h5 class="h5-card-header">รออนุมัติ</h5></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($_SESSION['tab_number_event'] == 3) echo "active"; ?>"
                                href="#tab_approved" data-toggle="tab"
                                onclick="change_tab_number_ajax(3)"><h5 class="h5-card-header">อนุมัติเเล้ว</h5></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($_SESSION['tab_number_event'] == 4) echo "active"; ?>"
                                href="#tab_reject" data-toggle="tab" onclick="change_tab_number_ajax(4)"><h5 class="h5-card-header">ถูกปฏิเสธ</h5></a>
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
                                                <th>ลำดับ</th>
                                                <th>ชื่อกิจกรรม</th>
                                                <th>รายละเอียดกิจกรรม</th>
                                                <th>ของสถานที่</th>
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
                                                <td><?php echo $i + 1; ?></td>
                                                <td style="text-align: left;"><?php echo $arr_event[$i]->eve_name; ?>
                                                </td>
                                                <?php if (iconv_strlen($arr_event[$i]->eve_description, 'UTF-8') > 60) { ?>
                                                <td style="text-align: left;">
                                                    <?php echo iconv_substr($arr_event[$i]->eve_description, 0, 60, "UTF-8") . "..."; ?>
                                                </td>
                                                <?php } ?>
                                                <?php if (iconv_strlen($arr_event[$i]->eve_description, 'UTF-8') <= 60) { ?>
                                                <td style="text-align: left;">
                                                    <?php echo $arr_event[$i]->eve_description; ?></td>
                                                <?php } ?>
                                                <td style="text-align: left;"><?php echo $arr_event[$i]->com_name; ?>
                                                </td>
                                                <td>
                                                    <a class="btn btn-info" style="font-size:10px; padding:12px;"
                                                        href="<?php echo base_url() . 'Entrepreneur/Manage_event/Event_detail/show_detail_event/' . $arr_event[$i]->eve_id; ?>">
                                                        <span class="material-icons">search</span>
                                                    </a>
                                                    <a class="btn btn-warning" style="font-size:10px; padding:12px;"
                                                        href="<?php echo base_url() . 'Entrepreneur/Manage_event/Event_edit/show_edit_event/' . $arr_event[$i]->eve_id; ?>">
                                                        <span class="material-icons">edit</span>
                                                    </a>
                                                    <button class="btn btn-danger" style="font-size:10px; padding:12px;"
                                                        onclick="confirm_delete('<?php echo $arr_event[$i]->eve_name ?>', <?php echo $arr_event[$i]->eve_id ?>)">
                                                        <span class="material-icons">clear</span>
                                                    </button>
                                                </td>
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
                                                <td><?php echo $count_i; ?></td>
                                                <td style="text-align: left;"><?php echo $arr_event[$i]->eve_name; ?>
                                                </td>
                                                <?php if (iconv_strlen($arr_event[$i]->eve_description, 'UTF-8') > 60) { ?>
                                                <td style="text-align: left;">
                                                    <?php echo iconv_substr($arr_event[$i]->eve_description, 0, 60, "UTF-8") . "..."; ?>
                                                </td>
                                                <?php } ?>
                                                <?php if (iconv_strlen($arr_event[$i]->eve_description, 'UTF-8') <= 60) { ?>
                                                <td style="text-align: left;">
                                                    <?php echo $arr_event[$i]->eve_description; ?></td>
                                                <?php } ?>
                                                <td style="text-align: left;"><?php echo $arr_event[$i]->com_name; ?>
                                                </td>
                                                <td>
                                                    <a class="btn btn-info" style="font-size:10px; padding:12px;"
                                                        href="<?php echo base_url() . 'Entrepreneur/Manage_event/Event_detail/show_detail_event/' . $arr_event[$i]->eve_id; ?>">
                                                        <span class="material-icons">search</span>
                                                    </a>
                                                    <a class="btn btn-warning" style="font-size:10px; padding:12px;"
                                                        href="<?php echo base_url() . '/Entrepreneur/Manage_Event/Event_edit/show_edit_event/' . $arr_event[$i]->eve_id; ?>">
                                                        <span class="material-icons">edit</span>
                                                    </a>
                                                    <button class="btn btn-danger" style="font-size:10px; padding:12px;"
                                                        onclick="confirm_delete('<?php echo $arr_event[$i]->eve_name ?>', <?php echo $arr_event[$i]->eve_id ?>)">
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

                <!-- tab show approved event -->
                <div class="tab-pane <?php if ($_SESSION['tab_number_event'] == 3) echo "active"; ?>" id="tab_approved">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped" style="text-align: center;">
                                        <thead class="text-white"
                                            style="background-color: #e4a487; text-align: center;">
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
                                            $count_approved = 0;
                                            for ($i = 0; $i < count($arr_event); $i++) {
                                                if ($arr_event[$i]->eve_status == 2) {
                                                    $count_approved++;
                                                }
                                            }
                                            if (sizeof($arr_event) == 0 || $count_approved == 0) {
                                                echo "<td colspan = '5'>";
                                                echo "ไม่มีข้อมูลในตารางนี้";
                                                echo "</td>";
                                            } else {
                                                $count_i = 0;
                                                for ($i = 0; $i < count($arr_event); $i++) {
                                                    if ($arr_event[$i]->eve_status == 2) {
                                                        $count_i++; ?>
                                            <tr>
                                                <td><?php echo $count_i; ?></td>
                                                <td style="text-align: left;"><?php echo $arr_event[$i]->eve_name; ?>
                                                </td>
                                                <?php if (iconv_strlen($arr_event[$i]->eve_description, 'UTF-8') > 60) { ?>
                                                <td style="text-align: left;">
                                                    <?php echo iconv_substr($arr_event[$i]->eve_description, 0, 60, "UTF-8") . "..."; ?>
                                                </td>
                                                <?php } ?>
                                                <?php if (iconv_strlen($arr_event[$i]->eve_description, 'UTF-8') <= 60) { ?>
                                                <td style="text-align: left;">
                                                    <?php echo $arr_event[$i]->eve_description; ?></td>
                                                <?php } ?>
                                                <td style="text-align: left;"><?php echo $arr_event[$i]->com_name; ?>
                                                </td>
                                                <td>
                                                    <a class="btn btn-info" style="font-size:10px; padding:12px;"
                                                        href="<?php echo base_url() . 'Entrepreneur/Manage_event/Event_detail/show_detail_event/' . $arr_event[$i]->eve_id; ?>">
                                                        <span class="material-icons">search</span>
                                                    </a>
                                                    <a class="btn btn-warning" style="font-size:10px; padding:12px;"
                                                        href="<?php echo base_url() . '/Entrepreneur/Manage_Event/Event_edit/show_edit_event/' . $arr_event[$i]->eve_id; ?>">
                                                        <span class="material-icons">edit</span>
                                                    </a>
                                                    <button class="btn btn-danger" style="font-size:10px; padding:12px;"
                                                        onclick="confirm_delete('<?php echo $arr_event[$i]->eve_name ?>', <?php echo $arr_event[$i]->eve_id ?>)">
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

                <!-- tab show reject event -->
                <div class="tab-pane <?php if ($_SESSION['tab_number_event'] == 4) echo "active"; ?>" id="tab_reject">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped" style="text-align: center;">
                                        <thead class="text-white"
                                            style="background-color: #e4a487; text-align: center;">
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
                                                <td><?php echo $count_i; ?></td>
                                                <td style="text-align: left;"><?php echo $arr_event[$i]->eve_name; ?>
                                                </td>
                                                <?php if (iconv_strlen($arr_event[$i]->eve_description, 'UTF-8') > 60) { ?>
                                                <td style="text-align: left;">
                                                    <?php echo iconv_substr($arr_event[$i]->eve_description, 0, 60, "UTF-8") . "..."; ?>
                                                </td>
                                                <?php } ?>
                                                <?php if (iconv_strlen($arr_event[$i]->eve_description, 'UTF-8') <= 60) { ?>
                                                <td style="text-align: left;">
                                                    <?php echo $arr_event[$i]->eve_description; ?></td>
                                                <?php } ?>
                                                <td style="text-align: left;"><?php echo $arr_event[$i]->com_name; ?>
                                                </td>
                                                <td>
                                                    <a class="btn btn-info" style="font-size:10px; padding:12px;"
                                                        href="<?php echo base_url() . 'Entrepreneur/Manage_event/Event_detail/show_detail_event/' . $arr_event[$i]->eve_id; ?>">
                                                        <span class="material-icons">search</span>
                                                    </a>

                                                    <!-- clear -->
                                                    <button class="btn btn-danger" style="font-size:10px; padding:12px;"
                                                        onclick="confirm_delete('<?php echo $arr_event[$i]->eve_name ?>', <?php echo $arr_event[$i]->eve_id ?>)">
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

<!-- modal delete event  -->
<div class="modal" tabindex="-1" role="dialog" id="modal_delete">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-family: 'Prompt', sans-serif !important;">คุณเเน่ใจหรือไม่ ?</h5>
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

<script>
/*
 * @author Suwapat Saowarod 62160340
 */
$(document).ready(function() {
    var error = '<?php echo $this->session->userdata("error_add_event");?>';
    if(error == 'success'){
        swal("สำเร็จ", "คุณทำการเพิ่มกิจกรรมสำเร็จ", "success");
        <?php echo $this->session->unset_userdata("error_add_event");?>;
    }
    var error = '<?php echo $this->session->userdata("error_edit_event");?>';
    if(error == 'success'){
        swal("สำเร็จ", "คุณทำการแก้ไขกิจกรรมสำเร็จ", "success");
        <?php echo $this->session->unset_userdata("error_edit_event");?>;
    }
    check_name_table(<?php echo $_SESSION['tab_number_event'] ?>);
});

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
        url: '<?php echo site_url('Entrepreneur/Manage_event/Event_list/change_tab_event_ajax/') ?>',
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
        $('#name_table').html('กิจกรรมที่อนุมัติเเล้ว');
    } else if (tab_event == 4) {
        $('#name_table').html('กิจกรรมที่ถูกปฏิเสธ');
    }
}

/*
 * confirm_delete
 * confirm delete event
 * @input com_name_con,com_id_con
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
 * @input com_id_con
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
        url: '<?php echo site_url() . 'Entrepreneur/Manage_event/Event_list/delete_event/' ?>',
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