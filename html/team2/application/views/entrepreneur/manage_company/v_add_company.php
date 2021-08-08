
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2)">
                    <div class="card-body">
                        <div class="card-header card-header-primary"><center>เพิ่มสถานที่</center> </div>
                            <!-- form add company -->
                            <form action="<?php echo site_url().'Entrepreneur/Manage_company/Company_add/add_company/'?>" method="POST" enctype="multipart/form-data">
                                <br>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="com_name">ชื่อสถานที่</label>
                                            <input type="text" id="com_name" name="com_name" class="form-control"  placeholder="ใส่ชื่อสถานที่" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="com_description">เบอร์ติดต่อสถานที่</label>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <input type="text" id="com_tel" name="com_tel" class="form-control" placeholder="ใส่เบอร์ติดต่อสถานที่" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="com_description">รายละเอียดสถานที่</label>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <input type="text" id="com_description" name="com_description" class="form-control"  placeholder="ใส่รายละเอียดของสถานที่" required>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="com_file">รูปภาพประกอบสถานที่</label>
                                </div>
                                <input type="file" id="com_file" name="com_file[]" multiple required><br><br>

                                <div class="row">
                                    <div class="col-lg-1.5">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                    <div class="col-lg-2">
                                        <a class="btn btn-secondary" href="<?php echo site_url().'Entrepreneur/Manage_company/Company_list/show_list_company';?>">ยกเลิก</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>