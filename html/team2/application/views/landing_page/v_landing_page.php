
<title>Drop Carbon</title>

<script>
    $(document).ready(function() {


        get_data_banner();

        function get_data_banner() {
            $.ajax({
                method: "POST",
                url: '<?php echo site_url() . "Admin/Manage_banner/Admin_manage_banner/get_banner_list_ajax" ?>',
                dataType: 'JSON',
                success: function(json_data) {

                    create_banner(json_data['data_banner_json']);

                },
                error: function() {
                    alert('ajax Not working');
                }
            });
        }

        let error_regis_entrepreneur = '<?php echo $this->session->userdata("error_register_entrepreneur"); ?>';
        let error_register_tourist = "<?php echo $this->session->userdata("error_register_tourist"); ?>";
        if (error_regis_entrepreneur == "success") {
            swal("สำเร็จ", "คุณทำการลงทะเบียนสำเร็จ ขณะนี้กำลังรอการอนุมัติ", "success");
            <?php echo $this->session->unset_userdata("error_register_entrepreneur"); ?>
        }
        if (error_register_tourist == "success") {
            swal("สำเร็จ", "การลงทะเบียนของคุณเสร็จสิ้น", "success");
            <?php echo $this->session->unset_userdata("error_register_tourist"); ?>
        }
    });

    function create_banner(arr_banner) {
        let html_code = '';

        html_code += '<ol class="carousel-indicators">';

        for (let i = 0; i < arr_banner.length; i++) {
            if (i === 0) {
                html_code += '<li data-target="#carouselExampleIndicators" data-slide-to="' + i + '" class="active"></li>';
            } else {
                html_code += '<li data-target="#carouselExampleIndicators" data-slide-to="data-slide-to="' + i + '"></li>';
            }
        }
        html_code += '</ol>';
        html_code += '<div class="carousel-inner" style="max-height: 678px; !important">'




        if (arr_banner.length != 0) {
            arr_banner.forEach((row_ban, index_ban) => {


                if (index_ban == 0) {
                    html_code += '<div class="carousel-item active" >';
                    html_code += ' <img class="d-block w-100 h-100"  style="object-fit: cover;   " src="' + ' <?php echo base_url() . 'banner/' ?>' + (row_ban['ban_path']) + '"   alt="Image" height="678px"  alt="First slide">';
                    html_code += '</div>';
                } else {
                    html_code += '<div class="carousel-item">';
                    html_code += ' <img class="d-block w-100 h-100"  style=" object-fit: cover;  " src="' + ' <?php echo base_url() . 'banner/' ?>' + (row_ban['ban_path']) + '"   alt="Image"  height="678px"  alt="First slide">';
                    html_code += '</div>';
                }
            });

        } else {
            html_code += '<div class="carousel-item active">';
            html_code += '<img class="d-block w-100 h-100" src="https://via.placeholder.com/1920x678"  alt="First slide"';
            html_code += '</div>';
        }
        html_code += '</div>';
        html_code += '<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">';
        html_code += '<span class="material-icons" style="color: black;">arrow_back</span>';
        html_code += '<span class="sr-only">Previous</span>';
        html_code += '</a>';
        html_code += '<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">';
        html_code += '<span class="material-icons" style="color: black;">arrow_forward</span>';
        html_code += ' <span class="sr-only">Next</span>';
        html_code += '</a>';

        $('#carouselExampleIndicators').html(html_code);
    }
</script>