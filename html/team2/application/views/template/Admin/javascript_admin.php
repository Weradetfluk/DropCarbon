<!--   Core JS Files   -->
<script src="<?php echo base_url() . 'assets/templete/material-dashboard-master' ?>/assets/js/core/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() . 'assets/templete/material-dashboard-master' ?>/assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() . 'assets/templete/material-dashboard-master' ?>/assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() . 'assets/templete/material-dashboard-master' ?>/assets/js/plugins/perfect-scrollbar.jquery.min.js">
</script>
<!-- Chartist JS -->
<script src="<?php echo base_url() . 'assets/templete/material-dashboard-master' ?>/assets/js/plugins/chartist.min.js">
</script>
<!--  Notifications Plugin    -->
<script src="<?php echo base_url() . 'assets/templete/material-dashboard-master' ?>/assets/js/plugins/bootstrap-notify.js">
</script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="<?php echo base_url() . 'assets/templete/material-dashboard-master' ?>/assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
<!-- Sweet alert -->
<script src="<?php echo base_url() . 'assets/plugin/sweetalert/sweetalert.min.js' ?>"></script>
<!-- openstreet map -->
<!-- <script src="https://www.openlayers.org/api/OpenLayers.js"></script> -->
<script src="<?php echo base_url() . 'assets/plugin/Openlayer/lib/OpenLayers.js' ?>"></script>

<script src="<?php echo base_url() . 'assets/plugin/daterangepicker/daterangepicker.js' ?>" type="text/javascript">
</script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>


<script src="<?php echo base_url() . 'assets/plugin/Chart/highcharts.js' ?>"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
    $(document).ready(function() {
        //show innformation
        $("#help_information").click(function() {
            // let arr_min_point = [1, 20, 30, 40];
            // let arr_max_point = [19, 29, 39, 49];
            if ($('#infor_eve_cat').is(":hidden")) {
                $.ajax({
                    url: '<?php echo base_url('Admin/Manage_event/Admin_approval_event/get_data_category'); ?>',
                    method: "POST",
                    dataType: "JSON",
                    success: function(json_data) {
                        html_code = '';
                        html_code += '<table class="table">';
                        html_code += '<thead class="text-white" style="text-align: center;">';
                        html_code += '<tr>';
                        html_code += '<th><p>ชื่อประเภท</p></th>';
                        html_code += '<th><p>ลดคาร์บอน (ต่อปี)</p></th>';
                        html_code += '<th><p>ช่วงคะแนน</p></th>';
                        html_code += '</tr>';
                        html_code += ' </thead>';
                        html_code += ' <tbody>';
                        json_data['data_eve_cat'].forEach((row_evecat, index_eve_cat) => {
                            html_code += '<tr>';
                            html_code += '<td>' + '<p>' + json_data['data_eve_cat'][
                                index_eve_cat
                            ]['eve_cat_name'] + '</p>' + '</td>';
                            html_code += '<td class="text-center">' + '<p>' + json_data[
                                    'data_eve_cat'][index_eve_cat]['eve_drop_carbon'] +
                                'kg' + '</p>' + '</td>';
                            html_code += '<td class="text-center">' + '<p>' +
                            json_data[
                                    'data_eve_cat'][index_eve_cat]['eve_min_score'] + '-' +  json_data[
                                    'data_eve_cat'][index_eve_cat]['eve_max_score'] + '</p>' + '</td>';
                            html_code += '</tr>';
                        });
                        $('#infor_eve_cat').html(html_code);
                    }
                });
            }
            $("#infor_eve_cat").slideToggle("slow");
        });
    });
    /*
     * confirm_approve
     * open modal id = Aprovemodal 
     * @input 
     * @output modal to confirm approve modal
     * @author Weradet Nopsombun 62160110
     * @Create Date 2564-07-27
     * @Update -
     */
    function view_data(ent_id) {
        $.ajax({
            type: "POST",
            dataType: 'JSON',
            data: {
                ent_id: ent_id
            },
            url: '<?php echo base_url('Admin/Manage_entrepreneur/Admin_approval_entrepreneur/get_entrepreneur_by_id_ajax'); ?>',
            success: function(data_detail) {
                $('#data_modal').modal();
                $('#ent_name').val(data_detail['arr_data'][0]['ent_firstname'] + " " + data_detail['arr_data'][
                    0
                ]['ent_lastname']);
                $('#ent_tel').val(data_detail['arr_data'][0]['ent_tel']);
                $('#ent_id_card').val(data_detail['arr_data'][0]['ent_id_card']);
                $('#ent_email').val(data_detail['arr_data'][0]['ent_email']);
                // $('#ent_birthdate').val(data_detail['arr_data'][0]['ent_birthdate']);

                let regis_date = data_detail['arr_data'][0]['ent_regis_date'];
                let ent_birthdate = data_detail['arr_data'][0]['ent_birthdate'];

                console.log(ent_birthdate)

                let regis_date_time = regis_date.substr(regis_date.indexOf(" "));

                let regis_format = format_date_time(regis_date);
                let ent_birthdate_format = format_date(ent_birthdate);

                $('#ent_birthdate').val(ent_birthdate_format);
                $('#ent_regis_date').val(regis_format + " " + regis_date_time);
                $('#ent_id').val(ent_id);

                console.log(data_detail['arr_file']);
                var html_code = '';
                let i = 1;
                data_detail['arr_file'].forEach((row_file, index_file) => {
                    html_code += '<button type="button" id="download' + i + '" class="btn btn-primary"'
                    html_code += 'onclick="doc_download(\'' + row_file['doc_path'] + '\')"' +
                        'value ="';
                    html_code += row_file['doc_path'] + '">' + row_file['doc_name'] + '</button>';
                    i += 1;
                });

                // $(document).on("click", ".btn", function() {
                //     doc_download($(this).attr("value"));
                // });
                $('#file_dowload').html(html_code);
            },
            error: function() {
                alert('ajax error working');
            }
        });
    }

    /*
     * format_date_time
     * format 27 กันยายน 2564
     * @input  old_date
     * @output modal to confirm approve modal
     * @author Weradet Nopsombun 62160110
     * @Create Date 2564-09-27
     * @Update -
     */
    function format_date_time(old_date) {
        let month_name = ["มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน",
            "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
        ];
        let old_date_sub = old_date.substr(0, old_date.indexOf(" "));
        let year = old_date_sub.substr(0, old_date_sub.indexOf("-"));
        let year_thai = parseInt(year) + 543;
        let month = old_date_sub.substr(old_date_sub.indexOf("-") + 1, 2);
        let day = old_date_sub.substr(old_date_sub.indexOf("-") + 4, 2);
        // console.log(old_date_sub);
        let format = day + " " + month_name[month - 1] + " " + year_thai;
        console.log(format);
        return format;
    }


    /*
     * doc_download
     * link 
     * @input 
     * @output table approve and consider
     * @author Weradet Nopsombun
     * @Create Date 2564-07-17
     * @Update -
     */
    function doc_download(name_path) {
        var link = document.createElement("a");
        link.setAttribute('download', name_path);
        link.href = "<?php echo base_url() ?>" + "./document_file_entrepreneur/" + name_path;
        document.body.appendChild(link);
        link.click();
        link.remove();
    }


    /*
     * send_mail_ajax
     * link 
     * @input 
     * @output table approve and consider
     * @author Weradet Nopsombun
     * @Create Date 2564-09-19
     * @Update -
     */
    function send_mail_ajax(content, user_email, subject, content_h1) {
        $.ajax({
            type: "POST",
            data: {
                content: content,
                user_email: user_email,
                subject: subject,
                content_h1: content_h1
            },
            url: '<?php echo base_url('DCS_controller/send_email_admin_ajax'); ?>',
            success: function() {

            },
            error: function() {
                alert('ajax ไม่สามารถส่งอีเมลได้');
            }
        });


    }

    /*
     * -
     * dropdown event menu sidebar 
     * @input 
     * @output event sub menu
     * @author Nantasiri Saiwaew
     * @Create Date 2564-09-19
     * @Update -
     */
    $(document).ready(function() {
        $('#eve_menu').click(function() {
            $(this).next('#eve_sub_menu').slideToggle();
        });
    });

    /*
     * -
     * dropdown promotions menu sidebar 
     * @input 
     * @output promotions sub menu
     * @author Nantasiri Saiwaew
     * @Create Date 2564-09-19
     * @Update -
     */
    $(document).ready(function() {
        $('#pro_menu').click(function() {
            $(this).next('#pro_sub_menu').slideToggle();
        });
    });


      /*
     * load_data
     * load_data
     * @input 
     * @output  table data entrepreneur
     * @author Weradet Nopsombun 62160110 
     * @Create Date 2564-07-27
     * @Update -
     */
    function load_data(status, page, query = '') {
        console.log(query);
        $.ajax({
            url: '<?php echo base_url('Admin/Manage_entrepreneur/Admin_approval_entrepreneur/show_data_ajax2/'); ?>' +
            status,
            method: "POST",
            dataType: "JSON",
            data: {
                page: page,
                query: query
            },
            success: function(json_data) {
                // $('#data_ent').html(data);

                create_table_entrepreneur(status, json_data, json_data['paganition']);
            }
        });
    }


    /*
    * create_table_entrepreneur
    * get all data entrepreneur and show table
    * @input number_status, query paganition
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2565-03-10
    * @Update Date -
    */

function create_table_entrepreneur(number_status, arr_data, paganition)
  {
//สร้างตารางข้อมูลของผู้ประกอบการ
    console.log(arr_data + " " + number_status);
    let output = '';
    output += '<table class="table" style="text-align: center;" id="entre_tale">';
    output += '<thead class="text-white custom-thead">';
    output += '<tr class="custom-tr-header-table">';
    output += '<th class="th-custom res-hide">ลำดับ</th>';
    output += '<th class="th-custom ">ชื่อ-นามสกุล</th>';
    output += '<th class="th-custom ">เบอร์โทร</th>';
    output += '<th class="th-custom res-hide">อีเมล</th>';
    output += '<th class="th-custom ">ดำเนินการ</th>';
    output += '</tr>';
    output += '</thead>';
    output += '<tbody class="list">';

      if (arr_data['arr_entrepreneur'] != null ) {
        arr_data['arr_entrepreneur'].forEach((row_ent, index_ent) => {
        output += '<tr>';
        output += '<td class="res-hide">' + (index_ent+1) + '</td>';
        output += '<td style="text-align: left;">';
        output += row_ent['ent_firstname']  + " " +   (row_ent['ent_lastname']);
        output += '</td>';
        output += '<td>';
        output += (row_ent['ent_tel']);
        output += '</td>';
        output += '<td class="res-hide" style="text-align: left;">';
        output += (row_ent['ent_email']);
        output +=  '</td>';
          if (number_status == 1) {
            // ต่อสตริง
            output += '<td style="text-align: center;">';
            output += '<button class="btn btn-info custom-btn-table" title="ดูรายละเอียด" onclick="view_data(\'' +  row_ent['ent_id'] + '\')">';
            output += '<i class="material-icons">search</i>';
            output += '</button>';
            output += '<button class="btn btn-success custom-btn-table" id="accept" title="อนุมัติ" onclick="confirm_approve(\'' + row_ent['ent_id'] + '\',\'' + row_ent['ent_firstname'] + " " +  row_ent['ent_lastname'] +  '\',\'' + row_ent['ent_email'] + '\')">';
            output += '<i class="material-icons">done</i></button>';
            output += '<button class="btn btn-danger custom-btn-table" id="reject" title="ปฏิเสธ" onclick="confirm_reject(\''  + row_ent['ent_id'] + '\',\'' + row_ent['ent_email'] + '\',\'' + row_ent['ent_firstname'] + " " + row_ent['ent_lastname'] + '\')">';
            output += '<i class="material-icons">clear</i></button>';
          } else if (number_status == 2) {
  
            output += '<td style="text-align: center;">';
            output += '<button class="btn btn-info custom-btn-table" title="ดูราายละเอียด" onclick="view_data(\'' +  row_ent['ent_id'] + '\')">';
            output += '<i class="material-icons">search</i></button>'; 
            output += '<button class="btn btn-danger custom-btn-table" title="ระงับ" id="accept" onclick="confirm_block(\'' + row_ent['ent_id'] + '\',\'' + row_ent['ent_firstname'] + " " + row_ent['ent_lastname'] +  '\',\'' + row_ent['ent_email'] + '\')">';
            output += '<i class="material-icons"><span class="material-icons-outlined">highlight_off</span></i></button>';
          } else if (number_status == 3) {
     
            output += '<td style="text-align: center;">';
            output +=  '<button class="btn btn-info" id="accept" style="font-size:10px; padding:12px;" title="ดูข้อมูลปฏิเสธ" onclick="view_data_detail_reject(\'' + row_ent['ent_id'] + '\')">';
            output +=  '<i class="material-icons"><span class="material-icons-outlined">search</span></i></button>';
          } else if (number_status == 4) {
            output += '<td style="text-align: center;">';
            output += '<button class="btn btn-warning custom-btn-table" id="accept" title="ยกเลิกการระงับ" onclick="confirm_unblock(\'' + row_ent['ent_id'] + '\',\''+ row_ent['ent_firstname'] + " " + row_ent['ent_lastname'] +  '\',\'' + row_ent['ent_email'] + '\')">';
            output +=  '<i class="material-icons"><span class="material-icons-outlined">cached</span></i></button>';
          }
          output += '</td></tr>';
        });   
        output += '</table><br>';
        output += '<div class="container-fluid" style="align: center;   position: relative;">';
        output += '<ul class="pagination w-50" id="pagination">';
        if(paganition){
            output += paganition;
            }
    }else{
        console.log("Test");
        output += '<tr>';
        output += '<td>';
        output += 'ไม่มีข้อมมูล';
        output += '</td>';
        output += '</tr>';
        output += '</table><br>';
    }
    $('#data_ent').html(output);
  }
</script>