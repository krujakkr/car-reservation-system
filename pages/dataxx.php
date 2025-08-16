<?php
include("db_connect.php"); // เรียกใช้งานไฟล์เชื่อมต่อกับฐานข้อมูล
	$mysqli = connect(); // เชื่อมต่อกับฐานข้อมูล  
	//นับทั้งปี  
	$sql="SELECT * FROM `car` WHERE `driver` LIKE 'มนชัยต์' ORDER BY `typecar` ASC";  
    $result = $mysqli->query($sql);
	//$total = $result->row;
	
	while($rs=$result->fetch_object()){
	//echo $rs ->timeResult." - ";
	echo $rs ->driver."<br>";
	
	
	$data = array(
	"driver"=>'มนต์ชัย'

);
	update("car",$data,"id=".$rs ->id) ; 
	
	
	}



?>