<?php
include 'chk_session.php';
?>


    
<script>
$.fn.editable.defaults.mode = 'popup';//inline
    $(document).ready(function() {
		
		var currentYear = (new Date).getFullYear();
		//alert(currentYear);
      $('#dataTables1').dataTable({
		   responsive: true,
          "order": [[ 1, "desc" ]],
		  
		  "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
			  
			  
				$('#dataTables1 .name-service a').editable({
					type: 'text',
					title: 'แก้ไข-ชื่อผู้ขอใช้'
					});
				

				$('#dataTables1 .start-time a').editable({
        		type: 'combodate',
				title: 'แก้ไข-เวลาเริ่มใช้รถ',
				template : 'ปี-YYYY เดือน-MM วัน-DD HH:mm:ss',
				format: 'YYYY-MM-DD HH:mm:ss',    
        		viewformat: 'YYYY-MM-DD HH:mm:ss',    
				combodate: {
                minYear: '<?php echo date("Y")-2; ?>',
				maxYear: '<?php echo date("Y")+2; ?>',
				 minuteStep: 10
           		}
        		});
				
				$('#dataTables1 .end-time a').editable({
        		type: 'combodate',
				title: 'แก้ไข-เวลาเริ่มสิ้นสุดรถ',
				template : 'ปี-YYYY เดือน-MM วัน-DD HH:mm:ss',
				format: 'YYYY-MM-DD HH:mm:ss',    
        		viewformat: 'YYYY-MM-DD HH:mm:ss',    
				combodate: {
                minYear: '<?php echo date("Y")-2; ?>',
				maxYear: '<?php echo date("Y")+2; ?>',
				 minuteStep: 10
           		}
        		});	
				
				$('#dataTables1 .locate a').editable({
					type: 'textarea',
					title: 'แก้ไข-สถานที่'
        		});	
				
				$('#dataTables1 .driver a').editable({
					type: 'select',
    				title: 'พขร',
					source: [
    					{value: 'มนต์ชัย', text: 'มนต์ชัย'},
    					{value: 'สายชล', text: 'สายชล'},
						{value: 'ภิญโญ', text: 'ภิญโญ'},
						{value: 'วิสุทธิ์', text: 'วิสุทธิ์'},
						{value: 'เช่า', text: 'เช่า'}
    ]
        		});	
				
				$('#dataTables1 .typecar a').editable({
					type: 'select',
    				title: 'ประเภทรถ',
					source: [
    					{value: 'นง625', text: 'นง625'},
    					{value: 'นค7118', text: 'นค7118'},
						{value: '40-0770', text: '40-0770'},
						{value: 'ผบ8461', text: 'ผบ8461'},
						{value: 'รถเช่า', text: 'รถเช่า'}
    ]
        		});					
				
		
		}
			  
			  
      	    });
      	  });
		  
  </script>

 <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-header alert alert-info"><i class="fa fa-car fa-fw"></i> แก้ไขข้อมูลการขอใช้รถยนต์</h3>
                </div>
                <!-- /.col-lg-12 -->
          </div>

<div class="row">
                    <div class="col-lg-12">
					
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default"> 
 <div class="panel-heading">
                            รายละเอียด
                        </div>
 <?php
	include("../config/thai_date.php");
	include("db_connect.php"); // เรียกใช้งานไฟล์เชื่อมต่อกับฐานข้อมูล
	$mysqli = connect(); // เชื่อมต่อกับฐานข้อมูล    
	$sql="SET CHARACTER SET UTF8";
	query($sql);
	//$sql="SELECT * FROM car ORDER BY id DESC";  
	$sql="SELECT * FROM car ORDER BY id DESC LIMIT 120";
    $result = $mysqli->query($sql);

		 ?>
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables1">
                                    <thead>
                                        <tr>
                                        	
                                            <th width="18%" >ผู้ขอใช้</th>
                                            <th width="11%">เริ่ม</th>
                                            <th width="11%">สิ้นสุด</th>
                                            <th width="40%">สถานที่</th>
                                            <th width="10%">พขร.</th>
                                             <th width="10%">ประเภทร</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    while($rs=$result->fetch_object()){
										?>
                                        <tr>
   
                          
<td class="name-service">
      <a href="#" id="name-service<?php echo $rs->id ; ?>" data-url="edit-name.php" data-pk="<?php echo $rs->id ; ?>" data-value="<?php echo $rs->name; ?>" data-name="name-service"><?php echo $rs->name; ?><br>ref : (<?php echo $rs->id; ?>)</a>
	</td>
                                                
                                                                                        
<td class="start-time">
      <a href="#" id="start-time<?php echo $rs->id ; ?>" data-url="edit-start.php" data-pk="<?php echo $rs->id ; ?>" data-value="<?php echo $rs->timego; ?>" data-name="start-time"><?php echo $rs->timego; ?></a> <!-- echo thai7($rs->timego); -->
	</td>
    
    <td class="end-time">
      <a href="#" id="end-time<?php echo $rs->id ; ?>" data-url="edit-end.php" data-pk="<?php echo $rs->id ; ?>" data-value="<?php echo $rs->timeback; ?>" data-name="end-time"><?php echo $rs->timeback; ?></a>
	</td>

      <td class="locate">
      <a href="#" id="locate_tt<?php echo $rs->id ; ?>" data-url="edit-locate.php" data-pk="<?php echo $rs->id ; ?>" data-value="<?php echo $rs->locate; ?>" data-name="locate_tt"><?php echo $rs->locate; ?></a>
	</td>
    
         <td class="driver">
      <a href="#" id="driver<?php echo $rs->id ; ?>" data-url="edit-driver.php" data-pk="<?php echo $rs->id ; ?>" data-value="<?php echo $rs->driver; ?>" data-name="driver"><?php echo $rs->driver; ?></a>
	</td>
    
             <td class="typecar">
      <a href="#" id="typecar<?php echo $rs->id ; ?>" data-url="edit-typecar.php" data-pk="<?php echo $rs->id ; ?>" data-value="<?php echo $rs->typecar; ?>" data-name="typecar"><?php echo $rs->typecar; ?></a>
	</td>
 
                                        </tr>
                                    <?php
									}
									?>
                     
                          
                                   
                                    </tbody>
                                </table>
								
                            </div>
                          
                    
                    
                    
    </div>
                  
                </div> 
                    </div></div></div></div>
