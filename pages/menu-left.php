<?php
 if(isset($_GET['menu'])) {
    $menu = $_GET['menu'];
} else {
    $menu = '';
}
switch ($menu) {
	case "home":
			$src_page = 'home.php';
			break;	

	case "main":
			$src_page = 'main.php';
			break;	

	case "tables":
			$src_page = 'tables.php';
			break;	

	case "report-car":
			$src_page = 'report-car.php';
			break;	

	case "report-driver":
			$src_page = 'report-driver.php';
			break;	
						
											
	case "add":
			$src_page = 'cars-form.php';
			break;	
						
	case "edit":
			$src_page = 'cars-edit.php';
			break;	

	case "insert":
			$src_page = 'cars-insert.php';
			break;	

	case "delete":
			$src_page = 'cars-del.php';
			break;				
				
	default:
			$src_page = 'home.php';
			}
		
		
?>