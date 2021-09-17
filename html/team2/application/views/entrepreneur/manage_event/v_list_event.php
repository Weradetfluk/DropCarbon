<!-- 
/*
* v_list_event
* Display data event by entrepreneur
* @input arr_event
* @output form add company
* @author Suwapat Saowarod 62160340
* @Create Date 2564-07-18
*/ 
-->
<div class="content">
    <div class="card">
        <div class="card-body">
            <div class="card-body">
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
                        <?php for($i = 0; $i < count($arr_event); $i++){?>
                            <tr>
                                <td><?php echo $i+1;?></td>
                                <td style="text-align: left;"><?php echo $arr_event[$i]->eve_name;?></td>
                                <td style="text-align: left;"><?php echo $arr_event[$i]->eve_description;?></td>
                                <td style="text-align: left;"><?php echo $arr_event[$i]->com_name;?></td>
                                <td>
                                    <a class="btn btn-warning" style="font-size:10px; padding:12px;" href="#">
                                        <span class="material-icons">edit</span>
                                    </a>
                                    <button class="btn btn-danger" style="font-size:10px; padding:12px;">
                                        <span class="material-icons">clear</span>
                                    </button>
                                    <a class="btn btn-info" style="font-size:10px; padding:12px;" href="#">
                                        <span class="material-icons">search</span>
                                    </a>
                                </td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
