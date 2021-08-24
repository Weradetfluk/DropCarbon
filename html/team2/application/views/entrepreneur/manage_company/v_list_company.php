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
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card" style="border-radius: 25px;">
          <div class="card-header" style="background-color: #60839f; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); border-radius: 15px;">
            <div class="row">
              <div class="col">
                <h4 class="card-title text-white" style="margin-top: 15px; ">ตารางจัดการสถานที่</h4>
              </div>
              <div class="col">
                <a class="btn btn-success" style="float: right;" href="<?php echo site_url() . 'Entrepreneur/Manage_company/Company_add/show_add_company' ?>">เพิ่มสถานที่</a>
              </div>
            </div>
          </div>
          <br>

          <div class="card-body">
            <div class="table-responsive" id="data_entre">
              <table class="table table-hover table-striped " style="text-align: center;">
                <thead class="text-white" style="background-color: #e4a487; text-align: center;">
                  <tr>
                    <th>ลำดับ</th>
                    <th>ชื่อสถานที่</th>
                    <th>รายละเอียด</th>
                    <th>สถานะ</th>
                    <th>ดำเนินการ</th>
                  </tr>
                </thead>
                <tbody class="list">
                  <?php if (sizeof($arr_company) == 0) {
                    echo "<td colspan = '5'>";
                    echo "ไม่มีข้อมูลในตารางนี้";
                    echo "</td>";
                  } else {
                    for ($i = 0; $i < count($arr_company); $i++) { ?>
                      <tr>
                        <td><?php echo $i + 1; ?></td>
                        <td><?php echo $arr_company[$i]->com_name; ?></td>
                        <?php if (iconv_strlen($arr_company[$i]->com_description, 'UTF-8') > 40) { ?>
                          <td><?php echo iconv_substr($arr_company[$i]->com_description, 0, 40, "UTF-8") . "..."; ?></td>
                        <?php } ?>
                        <?php if (iconv_strlen($arr_company[$i]->com_description, "UTF-8") <= 40) { ?>
                          <td><?php echo $arr_company[$i]->com_description; ?></td>
                        <?php } ?>

                        <!-- <td><?php echo $arr_company[$i]->com_description; ?></td> -->

                        <?php if ($arr_company[$i]->com_status == 1) { ?>
                          <td style="color: #CCCC00;">รออนุมัติ</td>
                        <?php } ?>
                        <?php if ($arr_company[$i]->com_status == 2) { ?>
                          <td style="color: #669900;">อนุมัติ</td>
                        <?php } ?>
                        <?php if ($arr_company[$i]->com_status == 3) { ?>
                          <td style="color: red;">ปฏิเสธ</td>
                        <?php } ?>

                        <td style='text-align: center;'>
                          <a class="btn btn-warning" style="font-size:10px; padding:12px;" href="<?php echo site_url() . 'Entrepreneur/Manage_company/Company_edit/show_edit_company/' . $arr_company[$i]->com_id; ?>">
                            <span class="material-icons">edit</span>
                          </a>
                          <button class="btn btn-danger" style="font-size:10px; padding:12px;" onclick="confirm_delete('<?php echo $arr_company[$i]->com_name ?>', <?php echo $arr_company[$i]->com_id ?>)">
                            <span class="material-icons">clear</span>
                          </button>
                          <a class="btn btn-info" style="font-size:10px; padding:12px;" href="<?php echo site_url() . 'Entrepreneur/Manage_company/Company_detail/show_detail_company/' . $arr_company[$i]->com_id; ?>">
                            <span class="material-icons">search</span>
                          </a>
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
  </div>
</div>

<!-- modal delete company  -->
<div class="modal" tabindex="-1" role="dialog" id="modal_delete">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">คุณเเน่ใจหรือไม่ ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>คุณต้องการที่จะลบ <span id="com_name_confirm"></span> ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="delete_btn" data-dismiss="modal">ยืนยัน</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
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
      swal("สำเร็จ", "คุณทำการเพิ่มสถานที่สำเร็จ", "success");
      <?php echo $this->session->unset_userdata("error_add_company"); ?>
    }
    let error_edit = '<?php echo $this->session->userdata("error_edit_company"); ?>';
    if (error_edit == "success") {
      swal("สำเร็จ", "คุณทำการแก้ไขสถานที่สำเร็จ", "success");
      <?php echo $this->session->unset_userdata("error_edit_company"); ?>
    }
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
</script>