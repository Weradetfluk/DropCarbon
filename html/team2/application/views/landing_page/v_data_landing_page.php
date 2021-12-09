<?php
$servername = "db";
$username = "team2";
$password = "team2@2021";
$dbname = "team2";

$db = mysqli_connect($servername, $username, $password, $dbname);

if (!$db) {
    die("connection failed" . mysqli_connect_error());
}

$sql_tou = "SELECT * FROM dcs_tourist";
$arr_tou = $db->query($sql_tou);

$sql_ent = "SELECT * FROM dcs_entrepreneur";
$arr_ent = $db->query($sql_ent);

$sql_eve = "SELECT * FROM dcs_event";
$arr_eve = $db->query($sql_eve);

$sql_com = "SELECT * FROM dcs_company";
$arr_com = $db->query($sql_com);

echo "<div class=\"row\" style=\"text-align : center;\">";
    echo "<div class=\"col\">";
        echo "<div class=\"counter-classic-number\">";
            echo "<span class=\"counter\">" . $arr_tou->num_rows . "</span>";
        echo "</div>";
        echo "<div class=\"counter-classic-title\">สมาชิก</div>";
    echo "</div>";
    echo "<div class=\"col\">";
        echo "<div class=\"counter-classic-number\">";
            echo "<span class=\"counter\">" . $arr_ent->num_rows . "</span>";
        echo "</div>";
        echo "<div class=\"counter-classic-title\">ผู้ประกอบการ</div>";
    echo "</div>";
    echo "<div class=\"col\">";
        echo "<div class=\"counter-classic-number\">";
            echo "<span class=\"counter\">" . $arr_eve->num_rows . "</span>";
        echo "</div>";
        echo "<div class=\"counter-classic-title\">กิจกรรม</div>";
    echo "</div>";
    echo "<div class=\"col\">";
        echo "<div class=\"counter-classic-number\">";
            echo "<span class=\"counter\">" . $arr_com->num_rows . "</span>";
        echo "</div>";
        echo "<div class=\"counter-classic-title\">สถานที่ท่องเที่ยว</div>";
    echo "</div>";
echo "</div>";

?>