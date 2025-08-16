<?php
$host="localhost";//
$user="root";//
$pw="";//
$dbname="cars";//cars
//date_default_timezone_set("Asia/Bangkok");
$mysql=new MySQL_Connection("$host","$user","$pw","$dbname");
$mysql->charset = 'utf8';

?>

