<?php
include 'chk_session.php';
?>
<div class="row">
<div class="col-lg-12">

<?php
require '../config/mysql.php';
require '../config/connect.php';
require '../config/thai_date.php';
$mysql=new MySQL_Connection("$host","$user","$pw","$dbname");
$mysql->charset = 'utf8';

// ตรวจสอบว่ามีข้อมูลหรือไม่ก่อนใช้ array_filter
$typecar = isset($_POST['typecar']) && is_array($_POST['typecar']) ? array_filter($_POST['typecar']) : array();
$driver = isset($_POST['driver']) && is_array($_POST['driver']) ? array_filter($_POST['driver']) : array();
$insert_success = false;
$insert_count = 0;

// Debug information (แสดงเฉพาะเมื่อต้องการ debug)
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

echo '<div class="alert alert-info">';
echo '<strong>กำลังประมวลผล...</strong><br>';
echo "วันที่ไป: " . $_POST['date-start'] . " --> " . thai9($_POST['date-start']) . "<br>";
echo "วันที่กลับ: " . $_POST['date-end'] . " --> " . thai9($_POST['date-end']) . "<br>";
echo '</div>';

try {
    for($i = 0; $i < count($typecar); $i++){
        $timego = thai9($_POST['date-start']);
        $timeback = thai9($_POST['date-end']);

        $result = $mysql->query(
            "INSERT IGNORE INTO `car`
            (`name`, `object`, `locate`, `timego`, `timeback`, `typecar`, `driver`)
            VALUES
            (%s, %s, %s, %s, %s, %s, %s)",
            array(
                $_POST['name'],
                $_POST['object'],
                $_POST['locatetion'],
                $timego,
                $timeback,
                isset($_POST['typecar'][$i]) ? $_POST['typecar'][$i] : '',
                isset($driver[$i]) ? $driver[$i] : '',
            )
        );
        
        if($result) {
            $insert_count++;
        }
    }
    
    if($insert_count > 0) {
        $insert_success = true;
    }
    
} catch (Exception $e) {
    echo '<div class="alert alert-danger">
            <strong>เกิดข้อผิดพลาด!</strong> ' . $e->getMessage() . '
          </div>';
}

$mysql->close();

// แสดงผลลัพธ์
if($insert_success) {
    echo '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4><i class="fa fa-check-circle"></i> สำเร็จ!</h4>
            <p><strong>บันทึกข้อมูลการจองรถเรียบร้อยแล้ว</strong></p>
            <hr>
            <p>จำนวนรายการที่บันทึก: <strong>' . $insert_count . '</strong> รายการ<br>
            ผู้จอง: <strong>' . $_POST['name'] . '</strong><br>
            วัตถุประสงค์: <strong>' . $_POST['object'] . '</strong><br>
            สถานที่: <strong>' . $_POST['locatetion'] . '</strong></p>
          </div>';
    
    echo '<div class="text-center" style="margin-top: 20px;">
            <a href="main.php?menu=add" class="btn btn-primary">
                <i class="fa fa-plus"></i> เพิ่มข้อมูลใหม่
            </a>
            <a href="main.php?menu=tables" class="btn btn-info">
                <i class="fa fa-table"></i> ดูข้อมูลทั้งหมด
            </a>
            <a href="main.php?menu=home" class="btn btn-success">
                <i class="fa fa-calendar"></i> ดูปฏิทิน
            </a>
          </div>';
          
    // เปลี่ยนหน้าอัตโนมัติหลัง 3 วินาที (ถ้าต้องการ)
    echo '<script>
            setTimeout(function() {
                // window.location.href = "main.php?menu=home";
            }, 3000);
          </script>';
} else {
    echo '<div class="alert alert-warning">
            <strong>คำเตือน!</strong> ไม่มีข้อมูลใดถูกบันทึก กรุณาตรวจสอบข้อมูลและลองใหม่อีกครั้ง
          </div>';
          
    echo '<div class="text-center" style="margin-top: 20px;">
            <a href="javascript:history.back()" class="btn btn-default">
                <i class="fa fa-arrow-left"></i> กลับไปแก้ไขข้อมูล
            </a>
          </div>';
}
?>

</div>
</div>