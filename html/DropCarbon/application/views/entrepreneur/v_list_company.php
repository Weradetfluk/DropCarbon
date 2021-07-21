<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                      <div class="card-header" style="background-color: #8fbacb; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2)">
                        <center><h4 class="card-title text-white">ตารางจัดการสถานที่</h4></center>
                      </div>
                      <br>
                      
                    <div class="card-body">
                      <div >
                        <a class="btn btn-success" style="float: right;" href="<?php echo site_url().'Entrepreneur/Company_add/show_add_company'?>">เพิ่มสถานที่</a>
                      </div>
                      <div class="table-responsive" id="data_entre">
                        <table class="table table-hover table-striped ">
                          <thead class="bg-secondary text-white">
                            <tr>
                              <th>ID</th>
                              <th>Name</th>
                              <th>Description</th>
                              <th>ดำเนินการ</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php for($i = 0; $i < count($arr_company); $i++){?>
                              <tr>
                                <td><?php echo $arr_company[$i]->com_id;?></td>
                                <td><?php echo $arr_company[$i]->com_name;?></td>
                                <td><?php echo $arr_company[$i]->com_description;?></td>
                                <td>
                                  <a class="btn btn-warning" href="<?php echo site_url().'Entrepreneur/Company_edit/show_edit_company/'.$arr_company[$i]->com_id;?>"><i class="fas fa-pen"></i></a>
                                  <button class="btn btn-danger" onclick="confirm_delete('<?php echo $arr_company[$i]->com_name?>', <?php echo $arr_company[$i]->com_id?>)"><i class="fas fa-trash-alt"></i></button>
                                </td>
                              </tr>
                            <?php }?>
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

  function confirm_delete(com_name_con, com_id_con) {
    $('#com_name_confirm').text(com_name_con);
    $('#modal_delete').modal();
    
    $('#delete_btn').click(function() {
      delete_company(com_id_con) 
    });

  }

  function delete_company(com_id_con) {    
    $.ajax({
      type: "POST",
      data: {com_id: com_id_con},
      url: '<?php echo site_url().'Entrepreneur/Company_edit/delete_company/'?>',
      success: function() {
        swal({
          title: "ลบสถานที่",
          text: "คุณได้ทำการลบสถานที่เสร็จสิ้น",
          type: "success"},
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