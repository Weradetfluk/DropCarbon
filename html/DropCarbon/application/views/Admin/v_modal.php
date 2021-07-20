
      <!-- warnning reject  -->
      <div class="modal" tabindex="-1" role="dialog" id="Rejectmodal">
             <div class="modal-dialog" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title">คุณต้องการปฏิเสธ ?</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <div class="modal-body">
                         <p>กรุณาระบุเหตุผล</p>
                         <form action="<?php echo base_url() . 'Admin/Admin_approval/reject_entrepreneur'; ?>" method="POST">
                             <input type="hidden" id="email" name="email">
                             <input type="hidden" id="ent_id" name="ent_id">
                             <textarea class="form-control" style="min-width: 100%" id="admin_reason" name="admin_reason"></textarea>
                     </div>
                     <div class="modal-footer">
                         <button type="submit" class="btn btn-success" id="reject">ยืนยัน</button>
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
