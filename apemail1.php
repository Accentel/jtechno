<?php //include('config.php');
session_start();
include('dbconnection/connection.php');
if($_SESSION['user'])
{
$name=$_SESSION['user'];
//include('org1.php');


include'dbfiles/org.php';
include'dbfiles/iqry_emp.php';
?>
<!DOCTYPE html>
<html lang="en">
    <?php include'template/headerfile.php'; ?>
    <script src="//cdn.ckeditor.com/4.5.10/full/ckeditor.js"></script>
	 <link rel="stylesheet" href="assets/css/bootstrap-datepicker3.min.css" />
    <style>
        strong{
            color:red;
        }
    </style>
	<script>
   
        function ConfirmDialog() {
  var x=confirm("Are you sure to delete record?")
  if (x) {
    return true;
  } else {
    return false;
  }
    }
    </script>
    <body class="no-skin">
        <?php include'template/logo.php'; ?>

        <div class="main-container ace-save-state" id="main-container">
            <script type="text/javascript">
                try {
                    ace.settings.loadState('main-container')
                } catch (e) {
                }
            </script>

            <div id="sidebar" class="sidebar                  responsive                    ace-save-state">
                <script type="text/javascript">
                    try {
                        ace.settings.loadState('sidebar')} catch (e) {
                    }
                </script>

                <!-- /.sidebar-shortcuts -->
                <?php include'template/sidemenu.php' ?>
                <!-- /.nav-list -->

                <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                    <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
                </div>
            </div>

            <div class="main-content">
                <div class="main-content-inner">
                    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                        <ul class="breadcrumb">
                            <li>
                                <i class="ace-icon fa fa-home home-icon"></i>
                                <a href="#">Home</a>
                            </li>
								<li>
                                <i class="ace-icon fa fa-cog home-icon"></i>
                                <a href="#">Settings</a>
                            </li>
                            <li>
                                <a href="#">Compose Mail</a>
                            </li>
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    <div class="page-content">
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                            <h1 align="center">
                               Compose Mail

                            </h1>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                               <div class="box box-info">
								<div class="box-header with-border">
								  <h3 class="box-title">Compose Mail</h3>
								</div>
                               <?php
                               $id=$_REQUEST['qt'];
                               
                               $mm=mysqli_query($link,"select * from add_qot where id='$id'") or die(mysqli_error($link));
                               $mm1=mysqli_fetch_array($mm);
                               $qtno=$mm1['quet_num'];
                               $faltno=$mm1['falt_no'];
                               $scode=$mm1['store_code'];
                               $sub=$qtno."  | ".$faltno." | Store Code ".$scode;
                               $qtpdf=$qtno.".pdf";
                               ?>
                                <form class="form-horizontal" enctype="multipart/form-data" method="post" action="apsendmail.php">
              <div class="box-body">
			  	 <!-- /Employee Photo-->
                <div class="form-group">			
                  <label for="lblempfile" class="col-sm-2 control-label">To:</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" required id="to" name="to">
                  </div>
				  
                </div>	
                <div class="form-group">			
                  <label for="lblempfile" class="col-sm-2 control-label">CC:</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" required id="cc" name="cc">
                  </div>
				  
                </div>	
                <div class="form-group">			
                  <label for="lblempfile" class="col-sm-2 control-label">Bcc:</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" required id="bcc" name="bcc">
                    <input type="hidden" class="form-control" required id="qpdf" name="qpdf" value="<?php echo $qtpdf; ?>">
                  </div>
				  
                </div>	
				 <!-- /Employee Name< -->
				<div class="form-group">
                  <label for="lblempnm" class="col-sm-2 control-label" >Subject</label>

                  <div class="col-sm-8">
                  
                <input type="text" class="form-control pull-right" required id="subject" name="subject" value="<?php echo $sub ?>">
				 <input type="hidden" class="form-control pull-right"   id="user" name="user" value="<?php echo $name; ?>">
                  </div>
				  	 <!-- /Admission Date -->
				 	
              </div>
					 <!-- /Admission No -->
				
				
					 <!-- /Roll.No -->
			<div class="form-group">
                  <label for="lblempmt" class="col-sm-2 control-label" >Message Body</label>

                  <div class="col-sm-8">
                  
                <textarea  class="form-control pull-right ckeditor" required  id="message" rows="5" name="message" placeholder="Enter Message">Dear Sir,
                </textarea>
                  </div>
				  	 <!-- /Medium -->
				  
                </div>				
					
				
				
				<div class="form-group">
				
				<label for="lblempnt" class="col-sm-2 control-label">File View</label>

                     <div class="col-sm-8">
                  
                <a href="<?php echo $qtpdf ?>" target="_blank">View File</a>
                  </div>
				</div>
			 		  
			  <div class="form-group">
                                        <div class="col-md-offset-4 col-md-8">
                                            <button class="btn btn-info" type="submit" name="submit" id="submit">
                                                <i class="ace-icon fa fa-save bigger-110"></i>
                                                Send
                                            </button>

                                            
                                           <a href="qot_list.php"><button class="btn btn-danger" type="button" name="button" id="Close">
                                                <i class="ace-icon fa fa-close bigger-110"></i>
                                                Close
                                            </button></a>
                                        </div>
                                    </div>
									<br/>
              <!-- /.box-body -->
              
              <!-- /.box-footer -->
            </form>
								</div>
                            </div>
                        </div>
                        <!-- PAGE CONTENT BEGINS -->

                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
					
					
									
					
					
					
				
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->

    <?php include('template/footer.php'); ?>

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
    </a>
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->
<script src="assets/js/jquery-2.1.4.min.js"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
<script type="text/javascript">
                    if ('ontouchstart' in document.documentElement)
                        document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
</script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery-ui.custom.min.js"></script>

<script src="assets/js/bootstrap-datepicker.min.js"></script>
<script src="assets/js/bootstrap-timepicker.min.js"></script>



<!-- ace scripts -->
<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>
<script>
                    $(document).ready(function () {

                        $("#success-alert").hide();
                        $("#success-alert").fadeTo(1000, 500).slideUp(500, function () {
                            $("#success-alert").alert('close');
                            window.location.href=window.location.href;
                        });
                        //$( '#validation-form' ).reset();


                        $('.date-picker').datepicker({
                            autoclose: true,
                            todayHighlight: true
                        })
                                //show datepicker when clicking on the icon
                                .next().on(ace.click_event, function () {
                            $(this).prev().focus();
                        });

                       

                        //to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
                       


                       



                      


                    });


</script>		<!-- inline scripts related to this page -->
</body>
<?php mysqli_close($link); ?>
</html>
<?php 

}else
{
session_destroy();

session_unset();

header('Location:index.php?authentication failed');

}

?>