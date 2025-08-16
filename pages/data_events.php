<?php
header("Content-type:application/json; charset=UTF-8");          
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false);    
include("db_connect.php"); // เรียกใช้งานไฟล์เชื่อมต่อกับฐานข้อมูล
$mysqli = connect(); // เชื่อมต่อกับฐานข้อมูล    

    //$q="SELECT * FROM tbl_event WHERE date(event_start)>='".$_GET['start']."'  ";  
    //$q.=" AND date(event_end)<='".$_GET['end']."' ORDER by event_id";  

    
	$q="SELECT * FROM car WHERE date(timego)>='".$_GET['start']."'  ";  
    $q.=" AND date(timeback)<='".$_GET['end']."' ORDER by id";  
	
	$result = $mysqli->query($q);
	
	while($rs=$result->fetch_object()){

			if($rs->typecar == "40-0770"){
				$color = "#31B0D5";
			}

			if($rs->typecar == "นค7118"){
				$color = "#EC971F";
			}

			if($rs->typecar == "รถเช่า"){
				$color = "#D9534F";
			}

			if($rs->typecar == "นง625"){
				$color = "#449D44";
			}
			
			if($rs->typecar == "ผบ8461"){
				$color = "#BA55D3";
			}
			


        $json_data[]=array(  
            "id"=>$rs->id,
            "title"=>$rs->name.",".$rs->locate.",".$rs->driver.",".$rs->typecar,
            "start"=>$rs->timego,
            "end"=>$rs->timeback,
			"url"=>"show2.php?id=".$rs->id,
			"color"=>$color,
				
            //"url"=>$rs->event_url,
            //"allDay"=>($rs->event_allDay==true)?true:false      
            // กำหนด event object property อื่นๆ ที่ต้องการ
        );    
		//$json= array_push($json, $json_data);
    }  

$json= json_encode($json_data);  

if(isset($_GET['callback']) && $_GET['callback']!=""){  
echo $_GET['callback']."(".$json.");";      
}else{  
echo $json;  
}  
?>  