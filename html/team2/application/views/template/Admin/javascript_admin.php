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

<script>
    var btnContainer = document.getElementById("active_menu");

    // Get all buttons with class="btn" inside the container
    var item = btnContainer.getElementsByClassName("nav-item ");

    // Loop through the buttons and add the active class to the current/clicked button
    for (var i = 0; i < item.length; i++) {
        item[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("active");

            current[0].className = current[0].className.replace(" active", "");

            this.className += " active";
        });
    }
</script>