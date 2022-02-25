<!-- 
/*
* v_list_company
* Display list company by entrepreneur
* @input -
* @output table list company
* @author Suwapat Saowarod 62160340
* @Create Date 2564-07-18
*/ 
-->
<div class="content">
  <div class="row">
    <div class="col">
      <h3 id="name_table" style="margin : 0 auto !important;padding-left: 3px !important;padding-bottom: 10px; float:left; font-family: 'Prompt', sans-serif !important;"></h3>
    </div>
    <div class="col">
      <button class="btn btn-info" style="margin-top: 2px; float:right; border-radius: 5px;" onclick="location.href='<?php echo site_url() . 'Entrepreneur/Manage_company/Company_add/show_add_company' ?>'">เพิ่มสถานที่</button>
    </div>
  </div>

  <div class="card card-nav-tabs custom-card-tab">
    <div class="card-header custom-header-tab">
      <div class="nav-tabs-navigation">
        <div class="nav-tabs-wrapper">
          <ul class="nav nav-tabs" data-tabs="tabs">
            <li class="nav-item">
              <a class="nav-link <?php if ($_SESSION['tab_number_company'] == 1) echo "active"; ?>" href="#tab_all" data-toggle="tab" onclick="change_tab_number_ajax(1)">
                <h5 class="h5-card-header">ทั้งหมด</h5>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if ($_SESSION['tab_number_company'] == 2) echo "active"; ?>" href="#tab_pending" data-toggle="tab" onclick="change_tab_number_ajax(2)">
                <h5 class="h5-card-header">รออนุมัติ</h5>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if ($_SESSION['tab_number_company'] == 3) echo "active"; ?>" href="#tab_approved" data-toggle="tab" onclick="change_tab_number_ajax(3)">
                <h5 class="h5-card-header">อนุมัติเเล้ว</h5>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if ($_SESSION['tab_number_company'] == 4) echo "active"; ?>" href="#tab_reject" data-toggle="tab" onclick="change_tab_number_ajax(4)">
                <h5 class="h5-card-header">ถูกปฏิเสธ</h5>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="tab-content">

        <!-- tab show all company -->
        <div class="tab-pane <?php if ($_SESSION['tab_number_company'] == 1) echo "active"; ?>" id="tab_all">
          <div class="row">
            <div class="col-md-12">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover table-striped " style="text-align: center;">
                    <thead class="text-white" style="background-color: #e4a487; text-align: center;">
                      <tr>
                        <th class="res-hide">ลำดับ</th>
                        <th>ชื่อสถานที่</th>
                        <th>สถานะ</th>
                        <th>ดำเนินการ</th>
                      </tr>
                    </thead>
                    <tbody class="list">
                      <?php if (sizeof($arr_company) == 0) {
                        echo "<td colspan = '4'>";
                        echo "ไม่มีข้อมูลในตารางนี้";
                        echo "</td>";
                      } else {
                        for ($i = 0; $i < count($arr_company); $i++) { ?>
                          <tr>
                            <td class="res-hide"><?php echo $i + 1; ?></td>
                            <td style="text-align: left;"><?php echo $arr_company[$i]->com_name; ?></td>

                            <?php if ($arr_company[$i]->com_status == 1) { ?>
                              <td style="color: #fba004;">รออนุมัติ</td>
                              <td style='text-align: center;'>
                                <button class="btn btn-info" style="font-size:10px; padding:12px;" onclick="location.href='<?php echo site_url() . 'Entrepreneur/Manage_company/Company_detail/show_detail_company/' . $arr_company[$i]->com_id; ?>'" title="ดูรายละเอียดสถานที่">
                                  <span class="material-icons">search</span>
                                </button>
                                <button class="btn btn-warning" style="font-size:10px; padding:12px;" onclick="location.href='<?php echo site_url() . 'Entrepreneur/Manage_company/Company_edit/show_edit_company/' . $arr_company[$i]->com_id; ?>'" title="แก้ไขข้อมูลสถานที่">
                                  <span class="material-icons">edit</span>
                                </button>
                                <button class="btn btn-danger" style="font-size:10px; padding:12px;" onclick="confirm_delete('<?php echo $arr_company[$i]->com_name ?>', <?php echo $arr_company[$i]->com_id ?>)" title="ลบสถานที่">
                                  <span class="material-icons">delete</span>
                                </button>
                              </td>
                            <?php } ?>
                            <?php if ($arr_company[$i]->com_status == 2) { ?>
                              <td style="color: #669900;">อนุมัติ</td>
                              <td style='text-align: center;'>
                                <button class="btn btn-info" style="font-size:10px; padding:12px;" onclick="location.href='<?php echo site_url() . 'Entrepreneur/Manage_company/Company_detail/show_detail_company/' . $arr_company[$i]->com_id; ?>'" title="ดูรายละเอียดสถานที่">
                                  <span class="material-icons">search</span>
                                </button>
                                <button class="btn btn-warning" style="font-size:10px; padding:12px;" onclick="location.href='<?php echo site_url() . 'Entrepreneur/Manage_company/Company_edit/show_edit_company/' . $arr_company[$i]->com_id; ?>'" title="แก้ไขข้อมูลสถานที่">
                                  <span class="material-icons">edit</span>
                                </button>
                                <button class="btn btn-danger" style="font-size:10px; padding:12px;" onclick="confirm_delete('<?php echo $arr_company[$i]->com_name ?>', <?php echo $arr_company[$i]->com_id ?>)" title="ลบสถานที่">
                                  <span class="material-icons">delete</span>
                                </button>
                              </td>
                            <?php } ?>
                            <?php if ($arr_company[$i]->com_status == 3) { ?>
                              <td style="color: red;">ปฏิเสธ</td>
                              <td style='text-align: center;'>
                                <button class="btn btn-info" style="font-size:10px; padding:12px;" onclick="location.href='<?php echo site_url() . 'Entrepreneur/Manage_company/Company_detail/show_detail_company/' . $arr_company[$i]->com_id; ?>'" title="ดูรายละเอียดสถานที่">
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

        <!-- tab show pending company -->
        <div class="tab-pane <?php if ($_SESSION['tab_number_company'] == 2) echo "active"; ?>" id="tab_pending">
          <div class="row">
            <div class="col-md-12">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover table-striped " style="text-align: center;">
                    <thead class="text-white" style="background-color: #e4a487; text-align: center;">
                      <tr>
                        <th class="res-hide">ลำดับ</th>
                        <th>ชื่อสถานที่</th>
                        <th>สถานะ</th>
                        <th>ดำเนินการ</th>
                      </tr>
                    </thead>
                    <tbody class="list">
                      <?php
                      $count_pending = 0;
                      for ($i = 0; $i < count($arr_company); $i++) {
                        if ($arr_company[$i]->com_status == 1) {
                          $count_pending++;
                        }
                      }

                      if (sizeof($arr_company) == 0 || $count_pending == 0) {
                        echo "<td colspan = '4'>";
                        echo "ไม่มีข้อมูลในตารางนี้";
                        echo "</td>";
                      } else {
                        $count_pending = 0;
                        for ($i = 0; $i < count($arr_company); $i++) {
                          if ($arr_company[$i]->com_status == 1) { ?>
                            <tr>
                              <td class="res-hide"><?php echo $count_pending + 1; ?></td>
                              <td style="text-align: left;"><?php echo $arr_company[$i]->com_name; ?></td>

                              <?php if ($arr_company[$i]->com_status == 1) { ?>
                                <td style="color: #fba004;">รออนุมัติ</td>
                              <?php } ?>
                              <?php if ($arr_company[$i]->com_status == 2) { ?>
                                <td style="color: #669900;">อนุมัติ</td>
                              <?php } ?>
                              <?php if ($arr_company[$i]->com_status == 3) { ?>
                                <td style="color: red;">ปฏิเสธ</td>
                              <?php } ?>

                              <td style='text-align: center;'>
                                <button class="btn btn-info" style="font-size:10px; padding:12px;" onclick="location.href='<?php echo site_url() . 'Entrepreneur/Manage_company/Company_detail/show_detail_company/' . $arr_company[$i]->com_id; ?>'" title="ดูรายละเอียดสถานที่">
                                  <span class="material-icons">search</span>
                                </button>
                                <button class="btn btn-warning" style="font-size:10px; padding:12px;" onclick="location.href='<?php echo site_url() . 'Entrepreneur/Manage_company/Company_edit/show_edit_company/' . $arr_company[$i]->com_id; ?>'" title="แก้ไขข้อมูลสถานที่">
                                  <span class="material-icons">edit</span>
                                </button>
                                <button class="btn btn-danger" style="font-size:10px; padding:12px;" onclick="confirm_delete('<?php echo $arr_company[$i]->com_name ?>', <?php echo $arr_company[$i]->com_id ?>)" title="ลบสถานที่">
                                  <span class="material-icons">delete</span>
                                </button>
                              </td>
                            </tr>
                            <?php $count_pending++; ?>
                          <?php } ?>
                        <?php } ?>
                        <?php $count_pending = 0; ?>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- tab show approved company -->
        <div class="tab-pane <?php if ($_SESSION['tab_number_company'] == 3) echo "active"; ?>" id="tab_approved">
          <div class="row">
            <div class="col-md-12">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover table-striped " style="text-align: center;">
                    <thead class="text-white" style="background-color: #e4a487; text-align: center;">
                      <tr>
                        <th class="res-hide">ลำดับ</th>
                        <th>ชื่อสถานที่</th>
                        <th>สถานะ</th>
                        <th>ดำเนินการ</th>
                      </tr>
                    </thead>
                    <tbody class="list">
                      <?php
                      $count_approved = 0;
                      for ($i = 0; $i < count($arr_company); $i++) {
                        if ($arr_company[$i]->com_status == 2) {
                          $count_approved++;
                        }
                      }

                      if (sizeof($arr_company) == 0 || $count_approved == 0) {
                        echo "<td colspan = '4'>";
                        echo "ไม่มีข้อมูลในตารางนี้";
                        echo "</td>";
                      } else {
                        $count_approved = 0;
                        for ($i = 0; $i < count($arr_company); $i++) {
                          if ($arr_company[$i]->com_status == 2) { ?>
                            <tr>
                              <td class="res-hide"><?php echo $count_approved + 1; ?></td>
                              <td style="text-align: left;"><?php echo $arr_company[$i]->com_name; ?></td>

                              <?php if ($arr_company[$i]->com_status == 1) { ?>
                                <td style="color: #fba004;">รออนุมัติ</td>
                              <?php } ?>
                              <?php if ($arr_company[$i]->com_status == 2) { ?>
                                <td style="color: #669900;">อนุมัติ</td>
                              <?php } ?>
                              <?php if ($arr_company[$i]->com_status == 3) { ?>
                                <td style="color: red;">ปฏิเสธ</td>
                              <?php } ?>

                              <td style='text-align: center;'>
                                <button class="btn btn-info" style="font-size:10px; padding:12px;" onclick="location.href='<?php echo site_url() . 'Entrepreneur/Manage_company/Company_detail/show_detail_company/' . $arr_company[$i]->com_id; ?>'" title="ดูรายละเอียดสถานที่">
                                  <span class="material-icons">search</span>
                                </button>
                                <button class="btn btn-warning" style="font-size:10px; padding:12px;" onclick="location.href='<?php echo site_url() . 'Entrepreneur/Manage_company/Company_edit/show_edit_company/' . $arr_company[$i]->com_id; ?>'" title="แก้ไขข้อมูลสถานที่">
                                  <span class="material-icons">edit</span>
                                </button>
                                <button class="btn btn-danger" style="font-size:10px; padding:12px;" onclick="confirm_delete('<?php echo $arr_company[$i]->com_name ?>', <?php echo $arr_company[$i]->com_id ?>)" title="ลบสถานที่">
                                  <span class="material-icons">delete</span>
                                </button>
                              </td>
                            </tr>
                            <?php $count_approved++; ?>
                          <?php } ?>
                        <?php } ?>
                        <?php $count_approved = 0; ?>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- tab show reject company -->
        <div class="tab-pane <?php if ($_SESSION['tab_number_company'] == 4) echo "active"; ?>" id="tab_reject">
          <div class="row">
            <div class="col-md-12">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover table-striped " style="text-align: center;">
                    <thead class="text-white" style="background-color: #e4a487; text-align: center;">
                      <tr>
                        <th class="res-hide">ลำดับ</th>
                        <th>ชื่อสถานที่</th>
                        <th>สถานะ</th>
                        <th>ดำเนินการ</th>
                      </tr>
                    </thead>
                    <tbody class="list">
                      <?php
                      $count_reject = 0;
                      for ($i = 0; $i < count($arr_company); $i++) {
                        if ($arr_company[$i]->com_status == 3) {
                          $count_reject++;
                        }
                      }

                      if (sizeof($arr_company) == 0 || $count_reject == 0) {
                        echo "<td colspan = '4'>";
                        echo "ไม่มีข้อมูลในตารางนี้";
                        echo "</td>";
                      } else {
                        $count_reject = 0;
                        for ($i = 0; $i < count($arr_company); $i++) {
                          if ($arr_company[$i]->com_status == 3) { ?>
                            <tr>
                              <td class="res-hide"><?php echo $count_reject + 1; ?></td>
                              <td style="text-align: left;"><?php echo $arr_company[$i]->com_name; ?></td>

                              <?php if ($arr_company[$i]->com_status == 1) { ?>
                                <td style="color: #fba004;">รออนุมัติ</td>
                              <?php } ?>
                              <?php if ($arr_company[$i]->com_status == 2) { ?>
                                <td style="color: #669900;">อนุมัติ</td>
                              <?php } ?>
                              <?php if ($arr_company[$i]->com_status == 3) { ?>
                                <td style="color: red;">ปฏิเสธ</td>
                              <?php } ?>

                              <td style='text-align: center;'>
                                <button class="btn btn-info" style="font-size:10px; padding:12px;" onclick="location.href='<?php echo site_url() . 'Entrepreneur/Manage_company/Company_detail/show_detail_company/' . $arr_company[$i]->com_id; ?>'" title="ดูรายละเอียดสถานที่">
                                  <span class="material-icons">search</span>
                                </button>
                              </td>
                            </tr>
                            <?php $count_reject++; ?>
                          <?php } ?>
                        <?php } ?>
                        <?php $count_reject = 0; ?>
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

<!-- modal delete company  -->
<div class="modal" tabindex="-1" role="dialog" id="modal_delete">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="font-family: 'Prompt', sans-serif !important;">แจ้งเตือน</h5>
      </div>
      <div class="modal-body">
        <p>คุณต้องการที่จะลบ <span id="com_name_confirm"></span> ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="delete_btn" data-dismiss="modal">ยืนยัน</button>
        <button type="button" class="btn btn-secondary" style="color: white; background-color: #777777;" data-dismiss="modal">ยกเลิก</button>
      </div>
    </div>
  </div>
</div>

<script>
  /*
   * @author Suwapat Saowarod 62160340
   */
  $(document).ready(function() {
    let error_add = '<?php echo $this->session->userdata("error_add_company"); ?>';
    if (error_add == "success") {
      swal("เพิ่มสถานที่สำเร็จ", "กรุณารอการอนุมัติจากผู้ดูเเลระบบภายใน 1 วัน", "success");
      <?php echo $this->session->unset_userdata("error_add_company"); ?>
    }
    let error_edit = '<?php echo $this->session->userdata("error_edit_company"); ?>';
    if (error_edit == "success") {
      swal("แก้ไขสถานที่สำเร็จ", "กรุณารอการอนุมัติจากผู้ดูเเลระบบภายใน 1 วัน", "success");
      <?php echo $this->session->unset_userdata("error_edit_company"); ?>
    }
    check_name_table(<?php echo $_SESSION['tab_number_company'] ?>);
  });

  /*
   * confirm_delete
   * confirm delete company
   * @input com_name_con, com_id_con
   * @output modal comfirm delete comepany
   * @author Suwapat Saowarod 62160340
   * @Create Date 2564-07-19
   * @Update -
   */
  function confirm_delete(com_name_con, com_id_con) {
    $('#com_name_confirm').text(com_name_con);
    $('#modal_delete').modal();

    $('#delete_btn').click(function() {
      delete_company(com_id_con)
    });
  }

  /*
   * delete_company
   * confirm delete company
   * @input com_id_con
   * @output delete comepany
   * @author Suwapat Saowarod 62160340
   * @Create Date 2564-07-19
   * @Update -
   */
  function delete_company(com_id_con) {
    $.ajax({
      type: "POST",
      data: {
        com_id: com_id_con
      },
      url: '<?php echo site_url() . 'Entrepreneur/Manage_company/Company_edit/delete_company/' ?>',
      success: function() {
        swal({
            title: "ลบสถานที่",
            text: "คุณได้ทำการลบสถานที่เสร็จสิ้น",
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

  /*
   * change_tab_number_ajax
   * change tab session tab_number_company
   * @input tab_company
   * @output -
   * @author Suwapat Saowarod 62160340
   * @Create Date 2564-09-14
   * @Update 2564-09-16
   */
  function change_tab_number_ajax(tab_company) {
    $.ajax({
      url: '<?php echo site_url('Entrepreneur/Manage_company/Company_list/change_tab_company_ajax/') ?>',
      method: 'POST',
      dataType: 'JSON',
      data: {
        tab_company: tab_company
      },
      success: function(data) {
        check_name_table(data);
      }
    });
  }

  /*
   * check_name_table
   * check name table
   * @input tab_company
   * @output -
   * @author Suwapat Saowarod 62160340
   * @Create Date 2564-09-16
   * @Update -
   */
  function check_name_table(tab_company) {
    if (tab_company == 1) {
      $('#name_table').html('สถานที่ทั้งหมด');
    } else if (tab_company == 2) {
      $('#name_table').html('สถานที่ที่รออนุมัติ');
    } else if (tab_company == 3) {
      $('#name_table').html('สถานที่ที่อนุมัติเเล้ว');
    } else if (tab_company == 4) {
      $('#name_table').html('สถานที่ที่ถูกปฏิเสธ');
    }
  }
</script>