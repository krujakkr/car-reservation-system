<?php
if($_POST){
    require '../config/mysql.php';
    require '../config/connect.php';
    $mysql = new MySQL_Connection("$host","$user","$pw","$dbname");
    $mysql->charset = 'utf8';

    $username = trim($_POST['username']); // ลบช่องว่าง
    $password = trim($_POST['password']); // ลบช่องว่าง
    
    echo "Username ที่ป้อน: '$username'<br>";
    echo "Password ที่ป้อน: '$password'<br>";

    // ใช้ LIMIT 1 เพื่อหลีกเลี่ยงปัญหาข้อมูลซ้ำ
    $user = $mysql->queryResult(
        "SELECT * FROM `adminpr` WHERE TRIM(`uadmin`) = %s[username] LIMIT 1",
        array('username' => $username)
    );

    $total = $user->numRows;
    echo "จำนวนผู้ใช้ที่พบ: $total<br>";
    
    if($total >= 1){
        $rs = $user->fetch();
        $db_password = trim($rs['padmin']); // ลบช่องว่างในฐานข้อมูลด้วย
        
        echo "Password ในฐานข้อมูล: '$db_password'<br>";
        echo "เปรียบเทียบ: '" . $password . "' === '" . $db_password . "'<br>";
        
        if($password === $db_password){
            echo "รหัสผ่านตรงกัน! กำลังเข้าสู่ระบบ...<br>";
            $_SESSION['idadmin'] = $rs['idadmin'];
            $_SESSION['uname'] = $rs['uname'];
            $_SESSION['login'] = "true";
            
            // ใช้ JavaScript redirect เพื่อป้องกันปัญหา header
            echo "<script>window.location.href='main.php?menu=add';</script>";
            exit();
        } else {
            echo "รหัสผ่านไม่ตรงกัน!<br>";
        }
    } else {
        echo "ไม่พบผู้ใช้นี้<br>";
    }
    
    $mysql->close();
}
?>