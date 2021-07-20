<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2)">
                    <div class="card-header card-header-primary"><center>แก้ไขสถานที่</center> </div>
                        <div class="card-body">
                            <form action="<?php echo site_url().'Entrepreneur/Company_edit/edit_company/'?>" method="POST">
                                <div class="form-group">
                                    <label for="com_name">ชื่อสถานที่</label>
                                    <input type="text" id="com_name" name="com_name" class="form-control" style="width: 300px" placeholder="ใส่ชื่อสถานที่" value="<?php echo $arr_company[0]->com_name;?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="com_description">รายละเอียดสถานที่</label>
                                    <input type="text" id="com_description" name="com_description" class="form-control" style="width: 900px" placeholder="ใส่รายละเอียดของสถานที่" value="<?php echo $arr_company[0]->com_description;?>" required>
                                </div>
                                <input type="hidden" name="com_id" value="<?php echo $arr_company[0]->com_id;?>">
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