<?php
include 'chk_session.php';
?>


    
<script>

    $(document).ready(function() {
		
		var currentYear = (new Date).getFullYear();
		//alert(currentYear);
      $('#dataTables1').dataTable({
		   responsive: true,
          "order": [[ 1, "desc" ]],
		 			  
			  
      	    });
      	  });
		  
  </script>

 <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-header alert alert-info"><i class="fa fa-car fa-fw"></i> ลบข้อมูลการขอใช้รถยนต์</h3>
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
	//$sql="SELECT * FROM car ORDER BY id DESC ";  
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
                                            <th width="20%">ลบข้อมูล</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    while($rs=$result->fetch_object()){
										?>
                                        <tr>
   
                          
<td>
     <?php echo $rs->name; ?><br>ref : (<?php echo $rs->id; ?>)
	</td>
                                                
                                                                                        
<td>
     <?php echo $rs->timego; ?>
	</td>
    
    <td>
      <?php echo $rs->timeback; ?>
	</td>

      <td>
      <?php echo $rs->locate; ?>
	</td>
    
<td align="center">
      <a href="del-record.php?id=<?php echo $rs->id ; ?>">   ลบ  </a>
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
