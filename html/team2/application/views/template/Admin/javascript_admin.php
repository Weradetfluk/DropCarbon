<!--   Core JS Files   -->
<script src="<?php echo base_url() . 'assets/templete/material-dashboard-master' ?>/assets/js/core/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() . 'assets/templete/material-dashboard-master' ?>/assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() . 'assets/templete/material-dashboard-master' ?>/assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() . 'assets/templete/material-dashboard-master' ?>/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>

<!-- Chartist JS -->
<script src="<?php echo base_url() . 'assets/templete/material-dashboard-master' ?>/assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="<?php echo base_url() . 'assets/templete/material-dashboard-master' ?>/assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="<?php echo base_url() . 'assets/templete/material-dashboard-master' ?>/assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
<!-- Sweet alert -->
<script src="<?php echo base_url() . 'assets/plugin/sweetalert/sweetalert.min.js' ?>"></script>


<!-- openstreet map -->
<!-- <script src="https://www.openlayers.org/api/OpenLayers.js"></script> -->
<script src="<?php echo base_url() . 'assets/plugin/Openlayer/lib/OpenLayers.js' ?>"></script>



<script>
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
                $('#ent_name').val(data_detail['arr_data'][0]['ent_firstname'] + " " + data_detail['arr_data'][0]['ent_lastname']);
                $('#ent_tel').val(data_detail['arr_data'][0]['ent_tel']);
                $('#ent_id_card').val(data_detail['arr_data'][0]['ent_id_card']);
                $('#ent_email').val(data_detail['arr_data'][0]['ent_email']);
                // $('#ent_birthdate').val(data_detail['arr_data'][0]['ent_birthdate']);

                let regis_date = data_detail['arr_data'][0]['ent_regis_date'];
                let ent_birthdate = data_detail['arr_data'][0]['ent_birthdate'];

                console.log(ent_birthdate)      

                let regis_date_time = regis_date.substr(regis_date.indexOf(" "));

                let regis_format =  format_date_time(regis_date);
                let ent_birthdate_format = format_date(ent_birthdate);

                $('#ent_birthdate').val(ent_birthdate_format);
                $('#ent_regis_date').val(regis_format + " " + regis_date_time);
                $('#ent_id').val(ent_id);

                console.log(data_detail['arr_file']);
                var html_code = '';
                let i = 1;
                data_detail['arr_file'].forEach((row_file, index_file) => {
                    html_code += '<button type="button" id="download' + i + '" class="btn btn-primary"'
                    html_code += 'onclick="doc_download(\'' + row_file['doc_path'] + '\')"' + 'value ="';
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
                let day   = old_date_sub.substr(old_date_sub.indexOf("-") + 4, 2);

               // console.log(old_date_sub);

                let format =  day + " " + month_name[month - 1] + " " + year_thai;
                console.log(format);

                return  format;
    }


     /*
     * format_date
     * open modal 
     * @input 
     * @output modal to confirm approve modal
     * @author Weradet Nopsombun 62160110
     * @Create Date 2564-09-27
     * @Update old_date
     */
    function format_date(old_date) {
        let month_name = ["มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน",
                    "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
                ];
                let year = old_date.substr(0, old_date.indexOf("-"));

                let year_thai = parseInt(year) + 543;
                let month = old_date.substr(old_date.indexOf("-") + 1, 2);
                let day   = old_date.substr(old_date.indexOf("-") + 4, 2);

               // console.log(old_date_sub);

                let format =  day + " " + month_name[month - 1] + " " + year_thai;
                console.log(format);

                return  format;
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
</script>