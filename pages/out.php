<?php
session_start();
session_destroy();
 echo("<script>");
        echo("window.top.location.href='index.php?menu=home';");
echo("</script>"); 

?>