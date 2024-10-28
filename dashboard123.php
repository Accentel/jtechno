<?php //include('config.php');
ob_start();
$stn="dashboard";
include('dbconnection/connection.php');
session_start();
//echo $_SESSION['user'];
if($_SESSION['user'])
{
$name=$_SESSION['user'];
$tsname=$_SESSION['user'];
//include('org1.php');


//include'dbfiles/org.php'
?>

<!DOCTYPE html>
<html lang="en">
	<?php include'template/headerfile.php'; ?>

<style>
    table{
        font-family:Times;
        font-size:14px;
    }
    th{
        background-color:#0073b7;
    }
</style>
	<body class="no-skin">
		<?php include'template/logo.php'; ?>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
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
								<a href="#">Dashboard</a>
							</li>
							<!--<li class="active">Blank Page</li>-->
						</ul><!-- /.breadcrumb -->

						<!-- /.nav-search -->
					</div>

					<div class="page-content">
						<!-- /.ace-settings-container -->

						<div class="row">
							<div class="col-xs-12">
							    <h2>Summery</h2>
								<!-- PAGE CONTENT BEGINS -->
                                <div class="col-xs-12"  style="margin-bottom:10px;">
                                    	<table class="table">
								  <tr>
								  <th>S No</th>
								  <th>Particulars</th>
								  <th>AP</th>
								  <th>TS</th>
								   <th>TN</th>
								   <th>TL</th>
								  <th>KN</th>
								 
								  </tr>
								  <tr>
								  <td>1</td>
								  <td>RO Requried</td>
								   <td><?php if($amnt>=1){ echo $amnt; } else { echo  "0"; }?></td>
								    
								   <td><?php if($prcancel>=1){ echo $prcancel; } else { echo  "0"; }?></td>
								 
								   <td><?php echo $amnt-$prcancel;?></td>
								  </tr>	

								  <tr>
								  <td>2</td>
								  <td>Work to be Started</td>
								   <td><?php if($ip_amt2>=1) { echo $ip_amt2; } else { echo  "0"; }?></td>
								   <td><?php  echo  "0"; ?></td>
								   <td><?php if($ip_amt2>=1) { echo $ip_amt2; } else { echo  "0"; }?></td>
								  </tr>	

									<tr>
								  <td>3</td>
								  <td>Request Amount</td>
								   <td><?php if($adv>=1) { echo $adv; } else { echo  "0"; }?></td>
								   <td><?php  echo  "0"; ?></td>
								   <td><?php if($adv>=1) { echo $adv; } else { echo  "0"; }?></td>
								  </tr>	
									<tr>
								  <td>4</td>
								  <td>Approved Amount</td>
								   <td><?php if($today_lab_amt>=1){  echo $today_lab_amt; } else { echo  "0"; }?></td>
								   <td><?php if($today_lab_reamt>=1){  echo $today_lab_reamt; } else { echo  "0"; }?></td>
								   <td><?php echo $today_lab_amt-$today_lab_reamt; ?></td>
								  </tr>		
<tr>
								  <td>5</td>
								  <td>Work in Progress</td>
								  
								   <td><?php if($dcareamt>=1){  echo $dcareamt; } else { echo  "0"; }?></td>
								   <td><?php if($sdcareamt>=1){  echo $sdcareamt; } else { echo  "0"; }?></td>
								   <td><?php  echo $dcareamt-$sdcareamt; ?></td>
								  </tr>	

<tr>
								  <td>6</td>
								  <td>Document Requried</td>
								  
								   <td><?php if($lab_amnt_proc>=1){  echo $lab_amnt_proc; } else { echo  "0"; }?></td>
								   <td><?php if($plab_amnt_proc>=1){  echo $plab_amnt_proc; } else { echo  "0"; }?></td>
								   <td><?php  echo $lab_amnt_proc-$plab_amnt_proc;?></td>
								  </tr>	


								  
								  <tr>
								  <td>7</td>
								  <td>To Be Raise Invoice</td>
								   <td><?php if($final2>=1) { echo $final2; } else { echo  "0"; }?></td>
								    <td><?php   echo  "0"; ?></td>
									 <td><?php if($final2>=1) { echo $final2; } else { echo  "0"; }?></td>
								  </tr>

<tr>
								  <td>8</td>
								  <td>Raised Invoice</td>
								   <td><?php if($sale>=1) { echo $sale; } else { echo  "0"; }?></td>
								    <td><?php if($sr_amtt>=1) { echo $sr_amtt; } else { echo  "0"; }?></td>
									 <td><?php  echo $sale-$sr_amtt; ?></td>
								  </tr>
								  

<tr>
								  <td>9</td>
								  <td>Payment Pending Invoice</td>
								   <td><?php $tam= $amnt+$adv+$today_lab_amt+$sale+$ip_amt2+$lab_amnt_proc+$final2+$dcareamt-$sr_amtt;
										if($tam>=1) { echo $tam;} else { echo  "0"; }

										?></td>
										 <td><?php $ctam= $prcancel+$today_lab_reamt+$sdcareamt+$plab_amnt_proc+$sr_amtt;
										if($ctam>=1) { echo $ctam;} else { echo  "0"; }

										?></td>
										 <td><?php echo $tam-$ctam; ?></td>
								  </tr>	
								  <tr>
								  <td>10</td>
								  <td>Payment Received</td>
								   <td><?php $tam= $amnt+$adv+$today_lab_amt+$sale+$ip_amt2+$lab_amnt_proc+$final2+$dcareamt-$sr_amtt;
										if($tam>=1) { echo $tam;} else { echo  "0"; }

										?></td>
										 <td><?php $ctam= $prcancel+$today_lab_reamt+$sdcareamt+$plab_amnt_proc+$sr_amtt;
										if($ctam>=1) { echo $ctam;} else { echo  "0"; }

										?></td>
										 <td><?php echo $tam-$ctam; ?></td>
								  </tr>									  
								  </table>

						</div>
                           <hr/>
						<h2>TS </h2>  
						
                                
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
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
	</body>
</html>
<?php 

}else
{
session_destroy();

session_unset();

header('Location:index.php?authentication failed');

}

?>