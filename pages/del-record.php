<?PHP
	 if(isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = '';
}
	include("db_connect.php"); // เรียกใช้งานไฟล์เชื่อมต่อกับฐานข้อมูล
	$mysqli = connect(); // เชื่อมต่อกับฐานข้อมูล    
	{delete("car","id=".$id);  }
	

		echo("<script>");
        echo("window.top.location.href='main.php?menu=delete';");
		echo("</script>"); 

	?>
