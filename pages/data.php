<?php
// ใช้ config เดียวกับระบบ
require '../config/mysql.php';
require '../config/connect.php';
$mysql = new MySQL_Connection("$host","$user","$pw","$dbname");
$mysql->charset = 'utf8';

// รายการรถทั้งหมด
$cars = array(
    '40-0770' => 'a',
    'นค7118' => 'b', 
    'นง625' => 'c',
    'ผบ8461' => 'd',
    'รถเช่า' => 'e'
);

// กำหนดให้แสดงเฉพาะปี 2025
$years = array('2025');
?>

<div class="alert alert-info">
    <strong>ข้อมูลสถิติ:</strong> แสดงการใช้รถยนต์ปี 2025
</div>

<script>
$(document).ready(function() {
    // ตรวจสอบว่า Morris library โหลดแล้วหรือไม่
    if (typeof Morris === 'undefined') {
        $('#morris-bar-chart').html('<div class="alert alert-danger">กรุณาโหลด Morris.js library</div>');
        return;
    }

    Morris.Bar({
        element: 'morris-bar-chart',
        data: [
            <?php
            foreach($years as $year) {
                echo "{\n";
                echo "    y: '$year',\n";
                
                // ดึงข้อมูลการใช้รถแต่ละประเภทในปีนั้น
                $car_usage = array();
                foreach($cars as $car_name => $car_key) {
                    $count_result = $mysql->queryResult(
                        "SELECT COUNT(*) as count_usage FROM car WHERE typecar = %s AND timego LIKE %s",
                        array($car_name, $year.'%')
                    );
                    $count_row = $count_result->fetch();
                    $car_usage[$car_key] = $count_row['count_usage'] ? $count_row['count_usage'] : 0;
                }
                
                // แสดงข้อมูลในรูปแบบ JSON
                $data_parts = array();
                foreach($car_usage as $key => $value) {
                    $data_parts[] = "$key: $value";
                }
                echo "    " . implode(",\n    ", $data_parts) . "\n";
                echo "},\n";
            }
            ?>
        ],
        xkey: 'y',
        ykeys: ['a', 'b', 'c', 'd', 'e'],
        labels: ['40-0770', 'นค7118', 'นง625', 'ผบ8461', 'รถเช่า'],
        hideHover: 'auto',
        resize: true,
        barColors: ['#337ab7', '#5cb85c', '#f0ad4e', '#d9534f', '#5bc0de'],
        xLabelAngle: 45,
        gridTextSize: 12,
        gridTextFamily: 'Arial',
        gridTextWeight: 'normal'
    });
});
</script>

<style>
#morris-bar-chart {
    height: 400px;
}
.morris-hover {
    font-family: Arial, sans-serif;
}
</style>

<?php
$mysql->close();
?>