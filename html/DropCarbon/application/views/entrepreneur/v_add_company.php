
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2)">
                    <div class="card-body">
                        <div class="card-header card-header-primary"><center>เพิ่มสถานที่</center> </div>
                            <!-- form add company -->
                            <form action="<?php echo site_url().'Entrepreneur/Company_add/add_company/'?>" method="POST">
                                <br>
                                <div class="form-group">
                                    <label for="com_name">ชื่อสถานที่</label>
                                    <input type="text" id="com_name" name="com_name" class="form-control" style="width: 300px" placeholder="ใส่ชื่อสถานที่" required>
                                </div>
                                <div class="form-group">
                                    <label for="com_description">รายละเอียดสถานที่</label>
                                    <input type="text" id="com_description" name="com_description" class="form-control" style="width: 900px" placeholder="ใส่รายละเอียดของสถานที่" required>
                                </div>
                                <button type="submit" class="btn btn-success">Submit</button>
                                <a class="btn btn-secondary" href="<?php echo site_url().'Entrepreneur/Company_list/show_list_company';?>">ยกเลิก</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>