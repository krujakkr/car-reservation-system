<?php
include 'chk_session.php';
?>
<script>
jQuery(function($) {

$('form').on('click',':checkbox',function(){
	
	if($(this).prop('checked') == true){	
		var rent = $(this).attr('rel');
		var rel = "input:checkbox[rel='"+$(this).attr("rel")+"']";
		var id =  "input:checkbox[id='"+$(this).attr("id")+"']";
				
		if(rent ==5){
		//alert(rent);
		$(rel).prop("checked",true);
		}else{
		
		$(rel).prop("checked",false);
		$(id).prop("checked",false);
		$(this).prop("checked",true);
	}
	}
	
	if($(this).prop('checked') == false){	
		var rent = $(this).attr('rel');
		var rel = "input:checkbox[rel='"+$(this).attr("rel")+"']";
		if(rent ==5){
		//alert(rent);
		$(rel).prop("checked",false);
		}
	}
	
	
});

});
  </script>

            
  <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-header alert alert-warning"><i class="fa fa-car fa-fw"></i> บันทึกข้อมูลขอใช้รถยนต์</h4>
                </div>
                <!-- /.col-lg-12 -->
          </div>

    <form role="form" name="ss01" id="ss01" class="form-group" method="post" action="?menu=insert">          

            <div class="row">
                <div class="col-lg-12">
                        <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                             
                                <div class="col-lg-12">
   
                                  
                                  <div class="row">     
      									
                                        <div class="col-lg-4">
										<div class="form-group">      
                                            <label>ผู้ขอใช้</label>
                                            <input class="form-control input-sm" type="text" name="name" required>
                                              </div></div>	
                                              
                                              <div class="col-lg-4">
											<div class="form-group">   
                                       	<label>เพื่อใช้ในการ</label>
                                            <input class="form-control input-sm" type="text" name="object" required>
    										   </div></div>	                                          
 										</div>
	
 											<div class="row">                                           
                                              <div class="col-lg-8">
											<div class="form-group">
                                            <label>สถานที่ในการเดินทาง</label>
                                            <input class="form-control input-sm" type="text" name="locatetion" required    />
                                              </div></div>	  </div>

									<div class="row">     
      									<div class="col-lg-4">
										<div class="form-group">
                                       	<label>เริ่มขอใช้รถ</label>
				<div class="input-group date" id="datetimepicker1">
                    <input name="date-start" class="form-control input-sm"  type="text" required />
					 <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
		
				<script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker({
				locale: 'th',	
					format: 'L'
				});
	             });
        </script>
		</div>
		</div>
   
      									<div class="col-lg-4">
										<div class="form-group">
                                       	<label>สิ้นสุดขอใช้รถ</label>
				<div class='input-group date' id='datetimepicker2'>
                    <input name="date-end" class="form-control input-sm" type="text" required />
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
      
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker2').datetimepicker({
				locale: 'th',	
					format: 'L'
				});
				 
            });
        </script>
		</div>
		</div>
</div>                                                               
                                    
                                    
                                    <div class="row">  
                                    
                                    <div class="col-lg-8">
									<div class="form-group">
                            
 <table class="table table-striped table-hover" width="850px">
     <tr>
     <th colspan="2" align="center">ประเภทรถ</th>
      <th colspan="8" align="center">พนักงานขับรถ</th>
      </tr>
 
<tr style="background-color:#ec971F;">
<td width="30">
<input name="typecar[]"  type="checkbox" value="นค7118" >
</td> 
<td width="220">
รถตู้ : นค7118 
</td>
<td width="30">
<input type="checkbox" name="driver[]" value="มนต์ชัย" id="1" rel="1">  
</td>
<td width="120">
มนต์ชัย 
</td>
<td width="30">
<input type="checkbox" name="driver[]" value="สายชล" id="2" rel="1" > 
</td>
<td width="120">
สายชล
</td>
<td width="30">
<input type="checkbox" name="driver[]" value="ภิญโญ"  id="3" rel="1"> 
</td>											
<td width="120">
ภิญโญ
</td>											
<td width="30">
<input type="checkbox" name="driver[]" value="วิสุทธิ์" id="4" rel="1"> 
</td>
<td width="120">
 วิสุทธิ์
</td>
</tr>

<tr style="background-color:#449D44;">
<td width="30">
<input name="typecar[]"  type="checkbox" value="นง625" >
</td> 
<td width="220">
รถตู้ : นง625 
</td>
<td width="30">
<input type="checkbox" name="driver[]" value="มนต์ชัย" id="1" rel="2">  
</td>
<td width="120">
มนต์ชัย 
</td>
<td width="30">
<input type="checkbox" name="driver[]" value="สายชล"  id="2" rel="2"> 
</td>
<td width="120">
สายชล
</td>
<td width="30">
<input type="checkbox" name="driver[]" value="ภิญโญ" id="3" rel="2"> 
</td>											
<td width="120">
ภิญโญ
</td>											
<td width="30">
<input type="checkbox" name="driver[]" value="วิสุทธิ์" id="4" rel="2"> 
</td>
<td width="120">
 วิสุทธิ์
</td>
</tr>

<tr style="background-color:#31B0D5;">
<td width="30">
<input name="typecar[]"  type="checkbox" value="40-0770" >
</td> 
<td width="220">
รถบัส : 40-0770
</td>
<td width="30">
<input type="checkbox" name="driver[]" value="มนต์ชัย" id="1" rel="3">  
</td>
<td width="120">
มนต์ชัย 
</td>
<td width="30">
<input type="checkbox" name="driver[]" value="สายชล"  id="2"  rel="3"> 
</td>
<td width="120">
สายชล
</td>
<td width="30">
<input type="checkbox" name="driver[]" value="ภิญโญ" id="3" rel="3"> 
</td>											
<td width="120">
ภิญโญ
</td>											
<td width="30">
<input type="checkbox" name="driver[]" value="วิสุทธิ์" id="4" rel="3"> 
</td>
<td width="120">
 วิสุทธิ์
</td>
</tr>  

<tr style="background-color:#BA55D3;">
<td width="30">
<input name="typecar[]"  type="checkbox" value="ผบ8461" >
</td> 
<td width="220">
รถกระบะ : ผบ8461
</td>
<td width="30">
<input type="checkbox" name="driver[]" value="มนต์ชัย" id="1" rel="4">  
</td>
<td width="120">
มนต์ชัย 
</td>
<td width="30">
<input type="checkbox" name="driver[]" value="สายชล"  id="2" rel="4"> 
</td>
<td width="120">
สายชล
</td>
<td width="30">
<input type="checkbox" name="driver[]" value="ภิญโญ" id="3" rel="4"> 
</td>											
<td width="120">
ภิญโญ
</td>											
<td width="30">
<input type="checkbox" name="driver[]" value="วิสุทธิ์" id="4" rel="4"> 
</td>
<td width="120">
 วิสุทธิ์
</td>
</tr>  

<tr style="background-color:#D9534F;">
<td width="30">
<input name="typecar[]"  type="checkbox" value="รถเช่า" rel="5">
</td> 
<td width="220">
รถเช่า
</td>
<td><input type="checkbox" name="driver[]" value="รถเช่า"  rel="5"></td>
<td colspan="7">ไม่ระบุ : ถ้าใช้รถเช่ากรุณาติ๊ก ไม่ระบุด้วยครับ</td>
</tr>  
</table>           
          
                                      </div></div>
                                                    
                                      
                                      
                                       <div class="col-lg-8">
										<div class="form-group">
						<button type="submit" class="btn btn-success" id="btnConfirm" >ยืนยัน</button>
						<button type="reset" class="btn btn-default">Reset</button>
                                      </div>
                                      </div>                                      
                                      
                                        </div>
      							</div></div></div></div></div></div>




  </form>


