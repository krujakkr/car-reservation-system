<?PHP
session_start();
include 'menu-left.php';
	?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ปฏิทินการใช้รถยนต์ คณะศึกษาศาสตร์ มหาวิทยาลัยบูรพา</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

	<!-- Date -->
	 <link href="css/bootstrap-datetimepicker.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
	<!--fancybox -->
      <link rel="stylesheet" href="../fancy/jquery.fancybox.css" type="text/css" media="screen" />

	<!-- Optionally add helpers - button, thumbnail and/or media -->
	<link rel="stylesheet" href="../fancy/helpers/jquery.fancybox-buttons.css" type="text/css" media="screen" />

	<!-- fullcalendar -->
	<link href='../fullcalendar.css' rel='stylesheet' />
	<link href='../fullcalendar.print.css' rel='stylesheet' media='print' />
 
 
 <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>


    <!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>
 <script src='../lib/moment.min.js'></script>
<script src='../fullcalendar.min.js'></script>
<script src='../lang/th.js'></script>
<script  src="../fancy/jquery.fancybox.pack.js"></script>
<script  src="../fancy/helpers/jquery.fancybox-thumbs.js"></script>   
 <script  src="../fancy/helpers/jquery.fancybox-buttons.js"></script>
 
			<script src="js/moment-with-locales.js"></script>
			<script src="src/bootstrap-datetimepicker.js"></script>
 
 
<script type="text/javascript">
jQuery( document ).ready(function() {   
      var currentLangCode = 'th';
      $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },          
            eventLimit: true, // allow "more" link when too many events
            defaultDate: new Date(),
            lang: currentLangCode,
			timezone: 'Asia/Bangkok',
            events: {
            url: 'data_events.php',
         	},  
            loading: function(bool) {
                $('#loading').toggle(bool);
            },
			
			eventClick: function(event) {
    if (event.url) {
      $.fancybox({
        		'href' : event.url,
        		'type' : 'iframe',
				'autoScale'     	: false,
				'openEffect' : 'elastic',
        		'openSpeed'  : 'fast',
                'closeEffect' : 'elastic',
        		'closeSpeed'  : 'fast',
				'closeBtn'  : true,
				onClosed	:	function() {
					parent.location.reload(true); 
				},
				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					},
					
					overlay : {
            				css : {
                				'background' : 'rgba(49, 176, 213, 0.7)'
           			 }
       				 }
				}
            });
      return false;
    }
  },
			
		
        });
    });
</script>


    
        <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true,
				 "order": [[ 1, "desc" ]]
        });
    });
    </script>
<style>
	#calendar {
		max-width: 900px;
		margin: 0 auto;
	}

</style>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">ปฏิทินการใช้รถยนต์ คณะศึกษาศาสตร์ มหาวิทยาลัยบูรพา - ทดลองใช้</a>
            </div>
            <!-- /.navbar-header -->

                    <!-- /.dropdown-user -->
              
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation" >
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu"  style="font-size:16px;">
				   
					<li>
                            <a href="http://www.edu.buu.ac.th" target="new"><i class="fa fa-home fa-fw"></i> คณะศึกษาศาสตร์</a>
                        </li>
                          <li class="btn-danger divider" style="height:3px;"></li>  
                         <li>
                            <a href="?menu=home" <?php if($menu == "home"){echo 'class="active alert-danger"';} ?>>
											<i class="fa fa-calendar fa-fw"></i> ข้อมูลแบบปฏิทิน</a>
                        </li>
                        <li>
                            <a href="?menu=tables" <?php if($menu == "tables"){echo 'class="active alert-danger"';} ?>><i class="fa fa-table fa-fw"></i> ข้อมูลแบบตาราง</a>
                        </li>
                        <li class="btn-danger divider" style="height:3px;"></li>  
              
						  <li>
                            <a href="#" target="new"><i class="fa fa-cab fa-fw"></i> สีแทนประเภทรถ</a>
                        </li>
                     
					  <li> <a href="#"><button class="btn btn-info"> รถบัส 40-0770 </button></a></li>
					 <li> <a href="#"><button class="btn btn-warning"> รถตู้ นค 7118 </button></a></li>
					 <li> <a href="#"><button class="btn btn-danger"> รถเช่า </button></a></li>
					 <li> <a href="#"><button class="btn btn-success"> รถตู้ นง 625 </button></a></li>
					 <li> <a href="#"><button class="btn btn-pickup"> กระบะ ผบ 8461 </button></a></li>

 <li class="btn-danger divider" style="height:3px;"></li>  
   
  
   
   <li class="sidebar-search">
                            <div class="input-group custom-search-form">
								  <form role="form" action="?menu=home#chkuser" method="post" name="login">
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i>
                                            </span>
                                            <input type="text" class="form-control" name="username" placeholder="Username" required>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"></i>
                                            </span>
                                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                                        </div>
                                        <p>
                                        <button type="submit" class="btn btn-success btn-sm">Log In</button>
                                        </p>
                                  
                                    </form>
                            </div>
                      </li>
						   <a id="chkuser"></a>
						    <?php
						
						include 'chkuser.php';
						?>
                         <li class="btn-danger divider" style="height:3px;"></li>  

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

      <div id="page-wrapper">

		   <?php 
		   	include $src_page;	
		  ?>



                    
        </div></div>          </div>
                    <!-- /.panel .chat-panel -->
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

   

</body>

</html>
