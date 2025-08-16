<?PHP
	
			
			include '../config/mysql.php';
			include '../config/connect.php';	
			include '../config/thai_date.php';
//$timexx = "2558-02-01 15:00:00";
//$timego = thai9($_POST['value']);
//$timego = thai10($timexx);


//echo $timexx."<br>";
//echo $timego."<br>";
//echo $pk."<br>";

$startUpdate = $mysql->queryResult(
 "
	UPDATE `car` SET 
			`timeback` = %s 

	 WHERE 
	`car`.`id` = %s 
	
    ",
    array(
		
		//$timego,
		thai10($_POST['value']),
		$_POST['pk'],

		
    )
);

	?>