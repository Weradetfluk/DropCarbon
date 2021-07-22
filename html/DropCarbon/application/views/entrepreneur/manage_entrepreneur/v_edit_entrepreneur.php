<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        b {
            padding-left: 2.5em;
            font-size: 30px;
        }

        div.con {
            padding-left: 5em;
        }

        input.box {
            width: 80%;
            border-radius: 4px;
            background-color: white;
            color: black;
            border: 2px solid #c8c8c8;
        }

        input.boxemail {
            width: 120%;
            border-radius: 4px;
            background-color: white;
            color: black;
            border: 2px solid #c8c8c8;
        }

        label {
            color: black;
        }

        div.w3-row {
            padding-left: 3em;
        }

        div.row1 {
            padding-left: 0em;
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
                            <center style="font-weight: bold; font-size: 150%;">แก้ไขข้อมูลของผู้ประกอบการ</center>
                        </div>
                        <div class="card-body">
                            <b>ข้อมูลของคุณ</b><br><br>
                            <form method='POST' action="<?php echo site_url('Dcs_register/Etp_input/insert_etp') ?>">
                                <div class="w3-row">
                                    <div class="w3-container w3-twothird con">
                                        <div>
                                            <?php
                                            $checked_prefix_1 = '';
                                            $checked_prefix_2 = '';
                                            $checked_prefix_3 = '';

                                            if ($this->session->userdata("pre_id") == "1") {
                                                $checked_prefix_1 = 'checked';
                                            } else if ($this->session->userdata("pre_id") == "2") {
                                                $checked_prefix_2 = 'checked';
                                            }else{
                                                $checked_prefix_3 = 'checked';
                                            }
                                            ?>

                                            <input type="radio" name="ent_pre_id" value=1 <?php echo $checked_prefix_1 ?>>
                                            <label style="font-size: 120%">นาย</label>
                                            <input type="radio" name="ent_pre_id" value=2 <?php echo $checked_prefix_2 ?>>
                                            <label style="font-size: 120%">นาง</label>
                                            <input type="radio" name="ent_pre_id" value=3 <?php echo $checked_prefix_3 ?>>
                                            <label style="font-size: 120%">นางสาว</label>
                                        </div><br>
                                        <div class="w3-row row1">
                                            <div class="w3-col s3">
                                                <?php
                                                $fname = $this->session->userdata("Entrepreneur_name");
                                                $lname = $this->session->userdata("Entrepreneur_name");
                                                ?>
                                                <label>ชื่อ:</label><br>
                                                <input type='text' class="box" name='ent_fname' value='<?php echo substr($fname, 0, strrpos($fname, ' ')); ?>'>
                                            </div>
                                            <div class="w3-col s3">
                                                <label>นามสกุล:</label><br>
                                                <input type='text' class="box" name='ent_lastname' value='<?php echo substr($lname, strrpos($lname, ' ')); ?>'> <br><br>
                                            </div>
                                        </div>
                                        <div class="w3-row row1">
                                            <div class="w3-col s3">
                                                <label>เบอร์โทร:</label><br>
                                                <input type='text' class="box" name='ent_tel' value="<?php echo $this->session->userdata("tel"); ?>">
                                            </div>
                                            <div class="w3-col s3">
                                                <label>บัตรประชาชน:</label><br>
                                                <input type='text' class="box" name='ent_id_card' value="<?php echo $this->session->userdata("card"); ?>"> <br><br>
                                            </div>
                                        </div>
                                        <div class="w3-row row1">
                                            <div class="w3-col s2">
                                                <label>อีเมล:</label><br>
                                                <input type='text' class="boxemail" name='ent_email' value="<?php echo $this->session->userdata("email"); ?>"> <br><br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w3-container w3-third">
                                        <div class="w3-col s2 ">
                                            <img src="http://localhost/DropCarbon/assets/templete/material-dashboard-master/assets/img/new_logo.png" width="200px" height="200px">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <b>สร้างรหัสผ่าน</b><br><br>
                                <div class="w3-container w3-twothird con">
                                    <div class="w3-row">
                                        <div class="w3-col s3">
                                            <label>ชื่อผู้ใช้:</label><br>
                                            <input type='text' class="box" name='ent_username' value="<?php echo $this->session->userdata("username"); ?>"> <br><br>
                                        </div>
                                    </div>
                                    <div class="w3-row">
                                        <div class="w3-col s3">
                                            <label>รหัสผ่าน:</label><br>
                                            <input type='password' class="box" id="pass" name='ent_password' value="<?php echo $this->session->userdata("password"); ?>">
                                        </div>
                                        <div class="w3-col s3">
                                            <label>ยืนยันรหัสผ่าน:</label><br>
                                            <input type='password' class="box" id="confirm" name='cfp' oninput="confirmpassword();" value="<?php echo $this->session->userdata("password"); ?>"> <br><br>
                                            <div id="errorpassword" class="text-danger"></div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="w3-row">
                                        <input type="submit" class="btn btn-success" value="บันทึก"></input>
                                        <a class="btn btn-danger"" href=" <?php echo site_url() . 'Entrepreneur/Company_list/show_list_company'; ?>">ยกเลิก</a>
                                    </div>
                                    <br>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>