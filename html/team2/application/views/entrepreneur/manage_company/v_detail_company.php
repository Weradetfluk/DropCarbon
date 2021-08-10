<style>
/* Set the size of the div element that contains the map */
#map {
    height: 400px;
    /* The height is 400 pixels */
    width: 100%;
    /* The width is the width of the web page */
}
</style>

<body>

    <div class="container">
        <div class="w3-container">
            <br>


            <?php
            // echo $mhis->com_id;
            if ($mhis->com_id == 1) {
                echo '<h5 class="text" style=" font-size: 30px; line-height: 30pt; font-family:Pridi;text-align: right;"> <b>' . '<b>' . $mhis->com_name . '</b>' . '</b>' . '</h5>';
            } else if ($mhis->com_id == 2) {
                echo '<h5 class="text" style=" font-size: 30px; line-height: 30pt; font-family:Pridi; margin-right: 150px;"><b>' . '<b>' . $mhis->com_name . '</b>' . '</b>' . '</h5>';
            } else {
                echo '<h5 class="text"style="font-size: 30px;  line-height: 30pt; font-family:Pridi; text-align: right;"><b>' . '<b>' . $mhis->com_name . '</b>' . '</b>' . '</h5>';
            }
            ?>

            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt"
                viewBox="0 0 16 16">
                <path
                    d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z">
                </path>
                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
            </svg> ชลบุรี
            <br>
            แชร์
            <a href="https://www.twitter.com/">
                <img src="<?php echo base_url() . 'assets/templete/picture/twitter.png' ?>" width="1.5%">
            </a>
            <a href="https://www.instagram.com/">
                <img src="<?php echo base_url() . 'assets/templete/picture/instagram.png' ?>" width="1.5%">
            </a>
            <a href="https://www.facebook.com/">
                <img src="<?php echo base_url() . 'assets/templete/picture/facebook.png' ?>" width="1.5%">
            </a>

            <center>
                <hr width="100%" size="5" color="#cccccc">
                <img src="<?php echo base_url() . 'assets/templete/picture/pattaya.jpg' ?>" width="40%">
                <br>
            </center>
            <br>

            <img src="<?php echo base_url() . 'assets/templete/picture/detail.png' ?>" width="3%">
            <h5 style="font-size: 20px; font-weight: bold">รายละเอียด</h5>
            <hr width="100%" size="10" color="#cccccc">

            <?php
            // echo $mhis->com_id;
            if ($mhis->com_id == 1) {
                echo '<h5 class="text" style=" font-size: 15px; line-height: 18pt; font-family:Pridi;text-align: right;"> <b>' . '<b>' . $mhis->com_description . '</b>' . '</b>' . '</h5>';
            } else if ($mhis->com_id == 2) {
                echo '<h5 class="text" style=" font-size: 15px; line-height: 18pt; font-family:Pridi; margin-right: 150px;"><b>' . '<b>' . $mhis->com_description . '</b>' . '</b>' . '</h5>';
            } else {
                echo '<h5 class="text"style="font-size: 15px;  line-height: 18pt; font-family:Pridi; text-align: right;"><b>' . '<b>' . $mhis->com_description . '</b>' . '</b>' . '</h5>';
            }
            ?>



            <img src="<?php echo base_url() . 'assets/templete/picture/focus.png' ?>" width="3%">
            <h5 style="font-size: 20px; font-weight: bold">จุดเด่น</h5>
            <hr width="100%" size="5" color="#cccccc">



            <img src="<?php echo base_url() . 'assets/templete/picture/location.png' ?>" width="3%">
            <h5 style="font-size: 20px; font-weight: bold">ตำแหน่งสถานที่</h5>
            <hr width="100%" size="5" color="#cccccc">
            <div class="col">
                <div id="googleMap" style="width: 100%; height: 400px; position: relative; overflow: hidden;">
                    <div
                        style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);">
                        <div class="gm-err-container">
                            <div class="gm-err-content">
                                <div class="gm-err-icon"><img
                                        src="https://maps.gstatic.com/mapfiles/api-3/images/icon_error.png"
                                        draggable="false" style="user-select: none;"></div>
                                <div class="gm-err-title">Oops! Something went wrong.</div>
                                <div class="gm-err-message">This page didn't load Google Maps correctly. See the
                                    JavaScript console for technical details.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <script>
    function initMap() {
        // The location of Uluru
        const uluru = {
            lat: -25.344,
            lng: 131.036
        };
        // The map, centered at Uluru
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 4,
            center: uluru,
        });
        // The marker, positioned at Uluru
        const marker = new google.maps.Marker({
            position: uluru,
            map: map,
        });
    }
    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&libraries=&v=weekly&channel=2"
        async></script>


    </div>
    </div>

    <body>