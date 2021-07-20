<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        b {
            padding-left: 3em
        }

        div.con {
            padding-left: 5em
        }
    </style>
</head>

<body>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2)">
                        <div class="card-header card-header-primary">
                            <center style="font-weight: bold; font-size: 18px;">แก้ไขข้อมูลของผู้ประกอบการ</center>
                        </div>
                        <div class="card-body">
                            <form method='POST' action="<?php echo  site_url('Dcs_register/Etp_input/insert_etp') ?>">
                                <div class="w3-row">
                                    <b style="font-size: 30px;">ข้อมูลของคุณ</b><br><br>
                                    <div class="w3-container w3-twothird con">
                                        <div class="w3-col s1">
                                            &nbsp;
                                        </div>
                                        <div>
                                            <input type="radio" name="ent_pre_id" value=1>&nbsp;นาย
                                            <input type="radio" name="ent_pre_id" value=2>&nbsp;นาง
                                            <input type="radio" name="ent_pre_id" value=3>&nbsp;นางสาว
                                        </div><br>

                                        <div class="w3-row">
                                            <div class="w3-col s1">
                                                &nbsp;
                                            </div>
                                            <div class="w3-col s3">
                                                ชื่อ:<br>
                                                <input type='text' name='etp_fname' required>
                                            </div>
                                            <div class="w3-col s3">
                                                นามสกุล:<br>
                                                <input type='text' name='etp_lastname' required> <br><br>
                                            </div>

                                        </div>

                                        <div class="w3-row">
                                            <div class="w3-col s1">
                                                &nbsp;
                                            </div>
                                            <div class="w3-col s3">
                                                เบอร์โทร:<br>
                                                <input type='text' name='ent_tel' required>
                                            </div>
                                            <div class="w3-col s3">
                                                บัตรประชาชน:<br>
                                                <input type='text' name='ent_id_card' required> <br><br>
                                            </div>
                                        </div>

                                        <div class="w3-row">
                                            <div class="w3-col s1">
                                                &nbsp;
                                            </div>
                                            <div class="w3-col s2">
                                                อีเมล:<br>
                                                <input type='text' name='ent_email' required> <br><br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w3-container w3-third">
                                        <div class="w3-col s2 ">
                                            <img src="http://localhost/DropCarbonSystem/img/3.jpg" width="200px" height="200px">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <b style="font-size: 30px;">สร้างรหัสผ่าน</b><br><br>
                                <div class="w3-container w3-twothird con">
                                    <div class="w3-row">
                                        <div class="w3-col s1">
                                            &nbsp;
                                        </div>
                                        <div class="w3-col s3">
                                            ชื่อผู้ใช้:<br>
                                            <input type='text' name='ent_username' required> <br><br>
                                        </div>
                                    </div>

                                    <div class="w3-row">
                                        <div class="w3-col s1">
                                            &nbsp;
                                        </div>
                                        <div class="w3-col s3">
                                            รหัสผ่าน:<br>
                                            <input type='password' id="pass" name='ent_password' required>
                                        </div>
                                        <div class="w3-col s3">
                                            ยืนยันรหัสผ่าน:<br>
                                            <input type='password' id="confirm" name='cfp' oninput="confirmpassword();" required> <br><br>
                                            <div id="errorpassword" class="text-danger"></div>
                                        </div>

                                    </div>
                                    <div class="w3-row">
                                        <div class="w3-col s1">
                                            &nbsp;
                                        </div>
                                        <input type='submit' id="next" value='บันทึก'>
                                        <div><br></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>