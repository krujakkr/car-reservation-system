<?php
// ใช้ config เดียวกับระบบ
require '../config/mysql.php';
require '../config/connect.php';
$mysql = new MySQL_Connection("$host","$user","$pw","$dbname");
$mysql->charset = 'utf8';

// รายการพนักงานขับรถ
$drivers = array(
    'ภิญโญ' => 'a',
    'มนต์ชัย' => 'b', 
    'สายชล' => 'c',
    'วิสุทธิ์' => 'd'
);

// กำหนดให้แสดงเฉพาะปี 2025
$years = array('2025');

// คำนวณสถิติรวมเฉพาะปี 2025
$total_trips = array();
foreach($drivers as $driver_name => $driver_key) {
    $total_result = $mysql->queryResult(
        "SELECT COUNT(*) as total FROM car WHERE driver = %s AND driver != '' AND timego LIKE '2025%'",
        array($driver_name)
    );
    $total_row = $total_result->fetch();
    $total_trips[$driver_name] = $total_row['total'] ? $total_row['total'] : 0;
}
?>

<div class="alert alert-info">
    <strong>ข้อมูลสถิติพนักงานขับรถ:</strong> แสดงจำนวนครั้งการขับรถปี 2025
</div>

<!-- แสดงสถิติรวม -->
<div class="row" style="margin-bottom: 20px;">
    <?php foreach($drivers as $driver_name => $driver_key): ?>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-<?php 
            $colors = ['primary', 'green', 'yellow', 'red'];
            echo $colors[array_search($driver_key, array_values($drivers))];
        ?>">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $total_trips[$driver_name]; ?></div>
                        <div><?php echo $driver_name; ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
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
                
                // ดึงข้อมูลการขับรถของแต่ละคนในปีนั้น
                $driver_usage = array();
                foreach($drivers as $driver_name => $driver_key) {
                    $count_result = $mysql->queryResult(
                        "SELECT COUNT(*) as count_usage FROM car WHERE driver = %s AND timego LIKE %s AND driver != ''",
                        array($driver_name, $year.'%')
                    );
                    $count_row = $count_result->fetch();
                    $driver_usage[$driver_key] = $count_row['count_usage'] ? $count_row['count_usage'] : 0;
                }
                
                // แสดงข้อมูลในรูปแบบ JSON
                $data_parts = array();
                foreach($driver_usage as $key => $value) {
                    $data_parts[] = "$key: $value";
                }
                echo "    " . implode(",\n    ", $data_parts) . "\n";
                echo "},\n";
            }
            ?>
        ],
        xkey: 'y',
        ykeys: ['a', 'b', 'c', 'd'],
        labels: ['ภิญโญ', 'มนต์ชัย', 'สายชล', 'วิสุทธิ์'],
        hideHover: 'auto',
        resize: true,
        barColors: ['#337ab7', '#5cb85c', '#f0ad4e', '#d9534f'],
        xLabelAngle: 45,
        gridTextSize: 12,
        gridTextFamily: 'Arial',
        gridTextWeight: 'normal',
        hoverCallback: function (index, options, content, row) {
            return '<div class="morris-hover-row-label">' + row.y + '</div>' +
                   '<div class="morris-hover-point">' + content + ' ครั้ง</div>';
        }
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
.huge {
    font-size: 40px;
}
.panel-green {
    border-color: #5cb85c;
}
.panel-green > .panel-heading {
    border-color: #5cb85c;
    color: white;
    background-color: #5cb85c;
}
.panel-yellow {
    border-color: #f0ad4e;
}
.panel-yellow > .panel-heading {
    border-color: #f0ad4e;
    color: white;
    background-color: #f0ad4e;
}
.panel-red {
    border-color: #d9534f;
}
.panel-red > .panel-heading {
    border-color: #d9534f;
    color: white;
    background-color: #d9534f;
}
</style>

<?php
$mysql->close();
?>