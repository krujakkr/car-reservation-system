<?php
if (!isset($_SESSION['login'])) {
  echo("<script>");
            echo("window.location='out.php';");
   echo("</script>"); 
     exit;
}
//echo date("Y");
?>