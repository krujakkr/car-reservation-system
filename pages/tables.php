     <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header alert btn-info"><i class="fa fa-car fa-fw"></i> ตารางการขอใช้รถยนต์</h3>
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

	include("db_connect.php"); // เรียกใช้งานไฟล์เชื่อมต่อกับฐานข้อมูล
	$mysqli = connect(); // เชื่อมต่อกับฐานข้อมูล    
	$sql="SELECT * FROM car ORDER BY id DESC LIMIT 120";  
    $result = $mysqli->query($sql);

		 ?>
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
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
                                            <td><?php echo $rs->name; ?> </td>
                                            <td><?php echo $rs->timego; ?></td>
                                            <td><?php echo $rs->timeback; ?></td>
                                            <td class="center"><?php echo $rs->locate; ?></td>
                                            <td class="center"><?php echo $rs->driver; ?> </td>
                                            <td class="center"><?php echo $rs->typecar; ?></td>
                                        </tr>
                                    <?php
									}
									?>
                     
                          
                                   
                                    </tbody>
                                </table>
								
                            </div>
                            <!-- /.table-responsive -->
                    
                    
                    
    </div>
                    <!-- /.panel .chat-panel -->
                </div>
                    </div></div>