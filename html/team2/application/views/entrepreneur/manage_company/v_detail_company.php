<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background-color: #8fbacb; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2)">
                        <center><h4 class="card-title text-white"><?php echo $mhis->com_name;?></h4></center>
                    </div>
            <br>
            <div class="card-body">
                <div class="col">
                    <a href="https://www.twitter.com/">
                        <img src="<?php echo base_url() . 'assets/templete/picture/twitter.png' ?>" width="15px">
                    </a>
                    <a href="https://www.instagram.com/">
                        <img src="<?php echo base_url() . 'assets/templete/picture/instagram.png' ?>" width="15px">
                    </a>    
                    <a href="https://www.facebook.com/">
                        <img src="<?php echo base_url() . 'assets/templete/picture/facebook.png' ?>" width="15px">
                    </a>
                </div>

            <center>
                <hr width="100%" size="5" color="#cccccc">
                <img src="<?php echo base_url() . 'assets/templete/picture/pattaya.jpg' ?>" width="40%">
                <br>
            </center>
            <br>

            <img src="<?php echo base_url() . 'assets/templete/picture/detail.png' ?>" width="3%">
            <h5 style="font-size: 20px; font-weight: bold">รายละเอียด</h5>
            <hr width="100%" size="10" color="#cccccc">
            <?php echo '<h5 class="text"style="font-size: 15px;  line-height: 18pt; font-family:Pridi;"><b>' . '<b>' . $mhis->com_description . '</b>' . '</b>' . '</h5>';?>

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
    </div>
</div>
</div>
</div>