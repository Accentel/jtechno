<?php //include('config.php');
ob_start();
$stn="dashboard";
include('dbconnection/connection.php');
session_start();
 date_default_timezone_set('Asia/Kolkata');
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
							    <h1>Summary</h1>
								<!-- PAGE CONTENT BEGINS -->
                                <div class="col-xs-12"  style="margin-bottom:10px;">
                                
                           			
					<form name="form" method="post">
					<input type="hidden" name="sname" id="fdate" value="<?php echo date('Y-m-d');?>"> 
					<div class="row">
	                    <div class="col-md-3 col-xs-12 col-sm-6">
	                        <div class="analysis-box m-b-0 bg-yellow">
	                           <!-- <a href='book_appointment.php'><h3 class="text-white box-title">New Appointments <span class="pull-right">(ToDay)
								<i class="fa fa-caret-up"></i> <?php echo $cnt?></span></h3>-->
								<h3 class="text-white box-title">
								<input type="submit" style="font-weight: bold;" class="btn btn-info" value="RO Requried" >
						 <?php echo $cnt;?></h3>
								
								
	                            <div id="sparkline7"><canvas style="display: contents; width: 267px; height: 60px; vertical-align: top;"></canvas> 
	                            <table class="table">
	                                <th>7 Days</th>
	                                <th>AP</th>
	                                <th>TS</th>
	                                <th>TN</th>
	                                <th>KL</th>
	                                <th>KN</th>
	                                <th></th>
	                                <tr>
	                                <td><i class="fa fa-arrow-up" aria-hidden="true"></i> </td>
	                                 <td> <?php $k2=mysqli_query($link,"select * from add_qot where status='Ro Required' and (inv_date=curdate() or inv_date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY)") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k2)."</b>";
									?></td>
	                                <td><?php $k2=mysqli_query($link,"select * from add_tgqot where status='Ro Required' and (inv_date=curdate() or inv_date>= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY)") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k2)."</b>";
									?> </td>
	                                <td><?php $k2=mysqli_query($link,"select * from add_tnqot where status='Ro Required' and (inv_date=curdate() or inv_date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY)") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k2)."</b>";
									?> </td>
	                                <td> <?php $k2=mysqli_query($link,"select * from add_klqot where status='Ro Required' and (inv_date=curdate() or inv_date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY)") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k2)."</b>";
									?></td>
	                                <td><?php $k2=mysqli_query($link,"select * from add_knqot where status='Ro Required'and (inv_date=curdate() or inv_date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY)") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k2)."</b>";
									?></td>
	                                </tr>
	                                  <tr>
	                                <td><i class="fa fa-inr" aria-hidden="true"></i> </td>
	                                 <td></td>
	                                <td></td>
	                                <td></td>
	                                <td></td>
	                                <td></td>
	                                </tr>
	                               <tr>
	                                   <td><i class="fa fa-arrow-down" aria-hidden="true"></i></td>
	                               
	                                <td> <?php $k2=mysqli_query($link,"select * from add_qot where status='Ro Required' and inv_date < curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY
") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k2)."</b>";
									?></td>
	                                <td><?php $k2=mysqli_query($link,"select * from add_tgqot where status='Ro Required' and inv_date < curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY
") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k2)."</b>";
									?> </td>
	                                <td><?php $k2=mysqli_query($link,"select * from add_tnqot where status='Ro Required' and inv_date < curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY
") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k2)."</b>";
									?> </td>
	                                <td> <?php $k2=mysqli_query($link,"select * from add_klqot where status='Ro Required' and inv_date < curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY
") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k2)."</b>";
									?></td>
	                                <td><?php $k2=mysqli_query($link,"select * from add_knqot where status='Ro Required'and inv_date < curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY
") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k2)."</b>";
									?></td>
	                                
	                                </tr>
	                                 <tr>
	                                <td><i class="fa fa-inr" aria-hidden="true"></i> </td>
	                                 <td></td>
	                                <td></td>
	                                <td></td>
	                                <td></td>
	                                <td></td>
	                                </tr>     
	                            </table>
	                            </div>
								</a>
	                        </div>
	                    </div>
						<?php
					
  $a="SELECT * FROM `ip_pat_admit`
 where DIS_STATUS='ADMITTED' and ADMIT_DATE='$d' ";
					$sq=mysqli_query($link,$a);
					$i=1;
				$ip=mysqli_num_rows($sq);
						
					?>
						<?php
					
  $a="SELECT * FROM `phr_salent_mast` where  SAL_DATE='$d' ";
					$sq=mysqli_query($link,$a);
					$i=1;
				$phar=mysqli_num_rows($sq);
				
				$l="select * from bill where bdate='$d'";
				$lb=mysqli_query($link,$l);
				$lbc=mysqli_num_rows($lb);
				$d1="select * from daycarebill where bdate='$d'";
				$db=mysqli_query($link,$d1);
				$dbc=mysqli_num_rows($db);
				$p="select * from physiotherapybill where bdate='$d'";
				$pb=mysqli_query($link,$p);
				$pbc=mysqli_num_rows($pb);		
					?>
					
					
	                    <div class="col-md-3 col-xs-12 col-sm-6">
	                        <div class="analysis-box m-b-0 bg-red">
	                            <h3 class="text-white box-title">
								<input type="submit" class="btn btn-info" style="font-weight: bold;" value="Work to be Started" onclick="report2();">
							 
							  <?php echo $ip;?></h3>
								
							</span></h3>
	                            <div id="sparkline12"><canvas style="display: contents; width: 267px; height: 60px; vertical-align: top;"></canvas> 
	                         <table class="table">
	                                <th>7 Days</th>
	                                <th>AP</th>
	                                <th>TS</th>
	                                <th>TN</th>
	                                <th>KL</th>
	                                <th>KN</th>
	                                <th></th>
	                                <tr>
	                                <td><i class="fa fa-arrow-up" aria-hidden="true"></i> </td>
	                                <td> <?php $k3=mysqli_query($link,"select * from add_qot where status='work to be started' and (inv_date=curdate() or inv_date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY)") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k3)."</b>";
									?></td>
	                                <td><?php $k3=mysqli_query($link,"select * from add_tgqot where status='work to be started' and (inv_date=curdate() or inv_date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY)") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k3)."</b>";
									?> </td>
	                                <td><?php $k3=mysqli_query($link,"select * from add_tnqot where status='work to be started' and (inv_date=curdate() or inv_date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY)") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k3)."</b>";
									?> </td>
	                                <td> <?php $k3=mysqli_query($link,"select * from add_klqot where status='work to be started' and (inv_date=curdate() or inv_date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY)") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k3)."</b>";
									?></td>
	                                <td><?php $k3=mysqli_query($link,"select * from add_knqot where status='work to be started'and (inv_date=curdate() or inv_date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY)") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k3)."</b>";
									?></td>
	                                </tr>
	                                 <tr>
	                                <td><i class="fa fa-inr" aria-hidden="true"></i> </td>
	                                 <td></td>
	                                <td></td>
	                                <td></td>
	                                <td></td>
	                                <td></td>
	                                </tr>
	                               <tr>
	                                   <td><i class="fa fa-arrow-down" aria-hidden="true"></i></td>
	                             <td> <?php $k3=mysqli_query($link,"select * from add_qot where status='work to be started' and inv_date < curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY
AND inv_date < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k3)."</b>";
									?></td>
	                                <td><?php $k3=mysqli_query($link,"select * from add_tgqot where status='work to be started' and inv_date < curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY
AND inv_date < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k3)."</b>";
									?> </td>
	                                <td><?php $k3=mysqli_query($link,"select * from add_tnqot where status='work to be started' and inv_date < curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY
AND inv_date < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k3)."</b>";
									?> </td>
	                                <td> <?php $k3=mysqli_query($link,"select * from add_klqot where status='work to be started' and inv_date < curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY
AND inv_date < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k3)."</b>";
									?></td>
	                                <td><?php $k3=mysqli_query($link,"select * from add_knqot where status='work to be started' and inv_date < curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY
AND inv_date < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k3)."</b>";
									?></td>
	                                
	                                </tr>
	                                   <tr>
	                                <td><i class="fa fa-inr" aria-hidden="true"></i> </td>
	                                 <td></td>
	                                <td></td>
	                                <td></td>
	                                <td></td>
	                                <td></td>
	                                </tr>   
	                            </table></div>
	                        </div>
	                    </div>
						<div class="col-md-3 col-xs-12 col-sm-6">
	                        <div class="analysis-box m-b-0 bg-green">
	                            <h3 class="text-white box-title">
								  <input type="submit" class="btn btn-info" style="font-weight: bold;" value="Request Amount" onclick="report1();">
								
							 <?php echo $lbc;?></span></h3>
	                            <div id="sparkline6"><canvas style="display: contents; width: 267px; height: 60px; vertical-align: top;"></canvas> 
	                            <table class="table">
	                                <th>7 Days</th>
	                                <th>AP</th>
	                                <th>TS</th>
	                                <th>TN</th>
	                                <th>KL</th>
	                                <th>KN</th>
	                                <th></th>
	                                <tr>
	                                <td><i class="fa fa-arrow-up" aria-hidden="true"></i> </td>
	                                <td>	<?php $k4=mysqli_query($link,"select distinct quet_num from request_amnt where confirm='Pending' and (date=curdate() or date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY)") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k4)."</b>";
									?> </td>
	                                <td> <?php $k4=mysqli_query($link,"select distinct quet_num from tgrequest_amnt where confirm='Pending' and (date=curdate() or date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY)") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k4)."</b>";
									?> </td>
	                                <td><?php $k4=mysqli_query($link,"select distinct quet_num from tnrequest_amnt where confirm='Pending' and (date=curdate() or date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY)") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k4)."</b>";
									?>  </td>
	                                <td> <?php $k4=mysqli_query($link,"select distinct quet_num from klrequest_amnt where confirm='Pending' and (date=curdate() or date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY)") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k4)."</b>";
									?> </td>
	                                <td><?php $k4=mysqli_query($link,"select distinct quet_num from knrequest_amnt where confirm='Pending' and (date=curdate() or date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY)") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k4)."</b>";
									?> </td>
	                                </tr>
	                                 <tr>
	                                <td><i class="fa fa-inr" aria-hidden="true"></i> </td>
	                                 <td></td>
	                                <td></td>
	                                <td></td>
	                                <td></td>
	                                <td></td>
	                                </tr>
	                               <tr>
	                                   <td><i class="fa fa-arrow-down" aria-hidden="true"></i></td>
	                                 <td>	<?php $k4=mysqli_query($link,"select distinct quet_num from request_amnt where confirm='Pending' and  date < curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k4)."</b>";
									?> </td>
	                                <td> <?php $k4=mysqli_query($link,"select distinct quet_num from tgrequest_amnt where confirm='Pending' and date < curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k4)."</b>";
									?> </td>
	                                <td><?php $k4=mysqli_query($link,"select distinct quet_num from tnrequest_amnt where confirm='Pending' and date < curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k4)."</b>";
									?>  </td>
	                                <td> <?php $k4=mysqli_query($link,"select distinct quet_num from klrequest_amnt where confirm='Pending' and date < curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k4)."</b>";
									?> </td>
	                                <td><?php $k4=mysqli_query($link,"select distinct quet_num from knrequest_amnt where confirm='Pending' and date < curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k4)."</b>";
									?> </td>
	                                
	                                </tr>
	                                  <tr>
	                                <td><i class="fa fa-inr" aria-hidden="true"></i> </td>
	                                 <td></td>
	                                <td></td>
	                                <td></td>
	                                <td></td>
	                                <td></td>
	                                </tr>    
	                            </table></div>
	                        </div>
	                    </div>
	                    	<div class="col-md-3 col-xs-12 col-sm-6">
	                        <div class="analysis-box m-b-0 bg-blue">
	                            <h3 class="text-white box-title">
								  <input type="submit" class="btn btn-info" style="font-weight: bold;" value="Approved Amount" onclick="report1();">
								
							 <?php echo $lbc;?></span></h3>
	                            <div id="sparkline6"><canvas style="display: contents; width: 267px; height: 60px; vertical-align: top;"></canvas> 
	                        <table class="table">
	                                <th>7 Days</th>
	                                <th>AP</th>
	                                <th>TS</th>
	                                <th>TN</th>
	                                <th>KL</th>
	                                <th>KN</th>
	                                <th></th>
	                                <tr>
	                                <td><i class="fa fa-arrow-up" aria-hidden="true"></i> </td>
	                                <td> <?php $kt5=mysqli_query($link,"select * from request_amnt where confirm='Yes' and status='' and (date=curdate() or date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY)") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($kt5)."</b>";
									?></td>
	                                <td> <?php $kt5=mysqli_query($link,"select * from tgrequest_amnt where confirm='Yes' and status='' and (date=curdate() or date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY)") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($kt5)."</b>";
									?> </td>
	                                <td> <?php $kt5=mysqli_query($link,"select * from tnrequest_amnt where confirm='Yes' and status='' and (date=curdate() or date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY)") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($kt5)."</b>";
									?> </td>
	                                <td>  <?php $kt5=mysqli_query($link,"select * from klrequest_amnt where confirm='Yes' and status='' and (date=curdate() or date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY)") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($kt5)."</b>";
									?></td>
	                                <td> <?php $kt5=mysqli_query($link,"select * from knrequest_amnt where confirm='Yes' and status='' and (date=curdate() or date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY)") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($kt5)."</b>";
									?></td>
	                                </tr>
	                                 <tr>
	                                <td><i class="fa fa-inr" aria-hidden="true"></i> </td>
	                                 <td></td>
	                                <td></td>
	                                <td></td>
	                                <td></td>
	                                <td></td>
	                                </tr>
	                               <tr>
	                                   <td><i class="fa fa-arrow-down" aria-hidden="true"></i></td>
	                             <td> <?php $kt5=mysqli_query($link,"select * from request_amnt where confirm='Yes' and status='' and  date < curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($kt5)."</b>";
									?></td>
	                                <td> <?php $kt5=mysqli_query($link,"select * from tgrequest_amnt where confirm='Yes' and status='' and  date < curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($kt5)."</b>";
									?> </td>
	                                <td> <?php $kt5=mysqli_query($link,"select * from tnrequest_amnt where confirm='Yes' and status='' and  date < curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($kt5)."</b>";
									?> </td>
	                                <td>  <?php $kt5=mysqli_query($link,"select * from klrequest_amnt where confirm='Yes' and status='' and  date < curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($kt5)."</b>";
									?></td>
	                                <td> <?php $kt5=mysqli_query($link,"select * from knrequest_amnt where confirm='Yes' and status='' and  date < curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($kt5)."</b>";
									?></td>
	                                
	                                </tr>
	                                  <tr>
	                                <td><i class="fa fa-inr" aria-hidden="true"></i> </td>
	                                 <td></td>
	                                <td></td>
	                                <td></td>
	                                <td></td>
	                                <td></td>
	                                </tr>    
	                            </table></div>
	                        </div>
	                    </div>
	                    <div class="col-md-3 col-xs-12 col-sm-6">
	                        <div class="analysis-box m-b-0 bg-purple">
	                            <h3 class="text-white box-title">
								  <input type="submit" class="btn btn-info" style="font-weight: bold;" value="Work In Progress" onclick="report1();">
								
					<?php echo $lbc;?></span></h3>
	                            <div id="sparkline6"><canvas style="display: contents; width: 267px; height: 60px; vertical-align: top;"></canvas> 
	                         <table class="table">
	                                <th>7 Days</th>
	                                <th>AP</th>
	                                <th>TS</th>
	                                <th>TN</th>
	                                <th>KL</th>
	                                <th>KN</th>
	                                <th></th>
	                                <tr>
	                                    <td><i class="fa fa-arrow-up" aria-hidden="true"></i> </td>
	                                <td>	<?php $k6=mysqli_query($link,"select distinct quet_num from request_amnt where status='Amount Transferred'  and (date=curdate() or date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY) and bill_status='' or docr_status='Cancel'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k6)."</b>";
									?> </td>
	                                <td><?php $k6=mysqli_query($link,"select distinct quet_num from tgrequest_amnt where status='Amount Transferred' and (date=curdate() or date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY) and bill_status='' or docr_status='Cancel'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k6)."</b>";
									?> </td>
	                                <td><?php $k6=mysqli_query($link,"select distinct quet_num from tnrequest_amnt where status='Amount Transferred' and (date=curdate() or date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY) and bill_status='' or docr_status='Cancel'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k6)."</b>";
									?> </td>
	                                <td><?php $k6=mysqli_query($link,"select distinct quet_num from klrequest_amnt where status='Amount Transferred' and (date=curdate() or date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY) and bill_status='' or docr_status='Cancel'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k6)."</b>";
									?> </td>
	                                <td><?php $k6=mysqli_query($link,"select distinct quet_num from knrequest_amnt where status='Amount Transferred' and (date=curdate() or date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY) and bill_status='' or docr_status='Cancel'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k6)."</b>";
									?></td>
	                                </tr>
	                                 <tr>
	                                <td><i class="fa fa-inr" aria-hidden="true"></i> </td>
	                                 <td></td>
	                                <td></td>
	                                <td></td>
	                                <td></td>
	                                <td></td>
	                                </tr>
	                               <tr>
	                                   <td><i class="fa fa-arrow-down" aria-hidden="true"></i></td>
	                                <td>	<?php $k6=mysqli_query($link,"select distinct quet_num from request_amnt where status='Amount Transferred'  and  date < curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY and bill_status='' or docr_status='Cancel'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k6)."</b>";
									?> </td>
	                                <td><?php $k6=mysqli_query($link,"select distinct quet_num from tgrequest_amnt where status='Amount Transferred' and  date < curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY and bill_status='' or docr_status='Cancel'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k6)."</b>";
									?> </td>
	                                <td><?php $k6=mysqli_query($link,"select distinct quet_num from tnrequest_amnt where status='Amount Transferred' and  date < curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY and bill_status='' or docr_status='Cancel'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k6)."</b>";
									?> </td>
	                                <td><?php $k6=mysqli_query($link,"select distinct quet_num from klrequest_amnt where status='Amount Transferred' and  date < curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY and bill_status='' or docr_status='Cancel'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k6)."</b>";
									?> </td>
	                                <td><?php $k6=mysqli_query($link,"select distinct quet_num from knrequest_amnt where status='Amount Transferred' and  date < curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY and bill_status='' or docr_status='Cancel'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k6)."</b>";
									?></td>
	                                </tr>
	                                   <tr>
	                                <td><i class="fa fa-inr" aria-hidden="true"></i> </td>
	                                 <td></td>
	                                <td></td>
	                                <td></td>
	                                <td></td>
	                                <td></td>
	                                </tr>   
	                            </table></div>
	                        </div>
	                    </div>
	                    <div class="col-md-3 col-xs-12 col-sm-6">
	                        <div class="analysis-box m-b-0 bg-fuchsia">
	                            <h3 class="text-white box-title">
								  <input type="submit" class="btn btn-info" style="font-weight: bold;" value="Document Requried" onclick="report1();">
								
						 <?php echo $lbc;?></span></h3>
	                            <div id="sparkline6"><canvas style="display: contents; width: 267px; height: 60px; vertical-align: top;"></canvas> 
	                       <table class="table">
	                                <th>7 Days</th>
	                                <th>AP</th>
	                                <th>TS</th>
	                                <th>TN</th>
	                                <th>KL</th>
	                                <th>KN</th>
	                                <th></th>
	                                <tr>
	                                <td><i class="fa fa-arrow-up" aria-hidden="true"></i> </td>
	                                <td>	<?php $k6=mysqli_query($link,"select distinct quet_num from request_amnt where status='Amount Transferred'  and (date=curdate() or date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY) and bill_status='' or docr_status='Cancel'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k6)."</b>";
									?> </td>
	                                <td><?php $k6=mysqli_query($link,"select distinct quet_num from tgrequest_amnt where status='Amount Transferred' and (date=curdate() or date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY) and bill_status='' or docr_status='Cancel'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k6)."</b>";
									?> </td>
	                                <td><?php $k6=mysqli_query($link,"select distinct quet_num from tnrequest_amnt where status='Amount Transferred' and (date=curdate() or date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY) and bill_status='' or docr_status='Cancel'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k6)."</b>";
									?> </td>
	                                <td><?php $k6=mysqli_query($link,"select distinct quet_num from klrequest_amnt where status='Amount Transferred' and (date=curdate() or date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY) and bill_status='' or docr_status='Cancel'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k6)."</b>";
									?> </td>
	                                <td><?php $k6=mysqli_query($link,"select distinct quet_num from knrequest_amnt where status='Amount Transferred' and (date=curdate() or date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY) and bill_status='' or docr_status='Cancel'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k6)."</b>";
									?></td>
	                                </tr>
	                                 <tr>
	                                <td><i class="fa fa-inr" aria-hidden="true"></i> </td>
	                                 <td></td>
	                                <td></td>
	                                <td></td>
	                                <td></td>
	                                <td></td>
	                                </tr>
	                               <tr>
	                                   <td><i class="fa fa-arrow-down" aria-hidden="true"></i></td>
	                                <td>	<?php $k6=mysqli_query($link,"select distinct quet_num from request_amnt where status='Amount Transferred'  and  date < curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY and bill_status='' or docr_status='Cancel'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k6)."</b>";
									?> </td>
	                                <td><?php $k6=mysqli_query($link,"select distinct quet_num from tgrequest_amnt where status='Amount Transferred' and  date < curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY and bill_status='' or docr_status='Cancel'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k6)."</b>";
									?> </td>
	                                <td><?php $k6=mysqli_query($link,"select distinct quet_num from tnrequest_amnt where status='Amount Transferred' and  date < curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY and bill_status='' or docr_status='Cancel'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k6)."</b>";
									?> </td>
	                                <td><?php $k6=mysqli_query($link,"select distinct quet_num from klrequest_amnt where status='Amount Transferred' and  date < curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY and bill_status='' or docr_status='Cancel'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k6)."</b>";
									?> </td>
	                                <td><?php $k6=mysqli_query($link,"select distinct quet_num from knrequest_amnt where status='Amount Transferred' and  date < curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY and bill_status='' or docr_status='Cancel'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k6)."</b>";
									?></td>
	                                
	                                </tr>
	                                 <tr>
	                                <td><i class="fa fa-inr" aria-hidden="true"></i> </td>
	                                 <td></td>
	                                <td></td>
	                                <td></td>
	                                <td></td>
	                                <td></td>
	                                </tr>     
	                            </table></div>
	                        </div>
	                    </div>
	                    <div class="col-md-3 col-xs-12 col-sm-6">
	                        <div class="analysis-box m-b-0 bg-aqua">
	                            <h3 class="text-white box-title">
								  <input type="submit" class="btn btn-info" style="font-weight: bold;" value="To Be Raise Invoice" onclick="report1();">
								
							 <?php echo $lbc;?></span></h3>
	                            <div id="sparkline6"><canvas style="display: contents; width: 267px; height: 60px; vertical-align: top;"></canvas> 
	                            <table class="table">
	                                <th>7 Days</th>
	                                <th>AP</th>
	                                <th>TS</th>
	                                <th>TN</th>
	                                <th>KL</th>
	                                <th>KN</th>
	                                <th></th>
	                                <tr>
	                                <td><i class="fa fa-arrow-up" aria-hidden="true"></i> </td>
	                                <td><?php $k7=mysqli_query($link,"select * from qot_bill where status='payment pending' and (bill_date=curdate() or bill_date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY) ") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k7)."</b>";
									?> </td>
	                                <td><?php $k7=mysqli_query($link,"select * from tgqot_bill where status='payment pending' and (bill_date=curdate() or bill_date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY)  ") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k7)."</b>";
									?> </td>
	                                <td><?php $k7=mysqli_query($link,"select * from tnqot_bill where status='payment pending' and (bill_date=curdate() or bill_date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY)  ") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k7)."</b>";
									?> </td>
	                                <td><?php $k7=mysqli_query($link,"select * from klqot_bill where status='payment pending' and (bill_date=curdate() or bill_date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY)  ") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k7)."</b>";
									?> </td>
	                                <td><?php $k7=mysqli_query($link,"select * from knqot_bill where status='payment pending' and (bill_date=curdate() or bill_date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY) ") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k7)."</b>";
									?></td>
	                                </tr>
	                                 <tr>
	                                <td><i class="fa fa-inr" aria-hidden="true"></i> </td>
	                                 <td></td>
	                                <td></td>
	                                <td></td>
	                                <td></td>
	                                <td></td>
	                                </tr>
	                               <tr>
	                                   <td><i class="fa fa-arrow-down" aria-hidden="true"></i></td>
	                                <td><?php $k7=mysqli_query($link,"select * from qot_bill where status='payment pending' and (bill_date < curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY) ") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k7)."</b>";
									?> </td>
	                                <td><?php $k7=mysqli_query($link,"select * from tgqot_bill where status='payment pending' and ( bill_date < curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY)  ") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k7)."</b>";
									?> </td>
	                                <td><?php $k7=mysqli_query($link,"select * from tnqot_bill where status='payment pending' and ( bill_date < curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY)  ") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k7)."</b>";
									?> </td>
	                                <td><?php $k7=mysqli_query($link,"select * from klqot_bill where status='payment pending' and (bill_date < curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY)  ") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k7)."</b>";
									?> </td>
	                                <td><?php $k7=mysqli_query($link,"select * from knqot_bill where status='payment pending' and ( bill_date < curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY) ") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k7)."</b>";
									?></td>
	                                
	                                </tr>
	                                   <tr>
	                                <td><i class="fa fa-inr" aria-hidden="true"></i> </td>
	                                 <td></td>
	                                <td></td>
	                                <td></td>
	                                <td></td>
	                                <td></td>
	                                </tr>   
	                            </table></div>
	                        </div>
	                    </div>
	                    <div class="col-md-3 col-xs-12 col-sm-6">
	                        <div class="analysis-box m-b-0 bg-maroon">
	                            <h3 class="text-white box-title">
								  <input type="submit" class="btn btn-info"  style="font-weight: bold;"value="Raised Invoice" onclick="report1();">
								
							</i> <?php echo $lbc;?></span></h3>
	                            <div id="sparkline6"><canvas style="display: contents; width: 267px; height: 60px; vertical-align: top;"></canvas> 
	                            <table class="table">
	                                <th>7 Days</th>
	                                <th>AP</th>
	                                <th>TS</th>
	                                <th>TN</th>
	                                <th>KL</th>
	                                <th>KN</th>
	                                <th></th>
	                                <tr>
	                                <td><i class="fa fa-arrow-up" aria-hidden="true"></i> </td>
	                                <td>	<?php $k8=mysqli_query($link,"select * from qot_bill where status='RUn Paid' and (bill_date=curdate() or bill_date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY) ") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k8)."</b>";
									?> </td>
	                                <td><?php $k8=mysqli_query($link,"select * from tgqot_bill where status='RUn Paid' and (bill_date=curdate() or bill_date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY) ") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k8)."</b>";
									?> </td>
	                                <td><?php $k8=mysqli_query($link,"select * from tnqot_bill where status='RUn Paid' and (bill_date=curdate() or bill_date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY)") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k8)."</b>";
									?> </td>
	                                <td> <?php $k8=mysqli_query($link,"select * from klqot_bill where status='RUn Paid' and (bill_date=curdate() or bill_date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY)") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k8)."</b>";
									?></td>
	                                <td><?php $k8=mysqli_query($link,"select * from knqot_bill where status='RUn Paid' and (bill_date=curdate() or bill_date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY) ") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k8)."</b>";
									?></td>
	                                </tr>
	                                 <tr>
	                                <td><i class="fa fa-inr" aria-hidden="true"></i> </td>
	                                 <td></td>
	                                <td></td>
	                                <td></td>
	                                <td></td>
	                                <td></td>
	                                </tr>
	                               <tr>
	                                   <td><i class="fa fa-arrow-down" aria-hidden="true"></i></td>
	                                <td>	<?php $k8=mysqli_query($link,"select * from qot_bill where status='RUn Paid' and ( bill_date < curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY)") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k8)."</b>";
									?> </td>
	                                <td><?php $k8=mysqli_query($link,"select * from tgqot_bill where status='RUn Paid' and ( bill_date < curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY)") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k8)."</b>";
									?> </td>
	                                <td><?php $k8=mysqli_query($link,"select * from tnqot_bill where status='RUn Paid' and ( bill_date < curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY) ") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k8)."</b>";
									?> </td>
	                                <td> <?php $k8=mysqli_query($link,"select * from klqot_bill where status='RUn Paid' and ( bill_date < curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY) ") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k8)."</b>";
									?></td>
	                                <td><?php $k8=mysqli_query($link,"select * from knqot_bill where status='RUn Paid' and ( bill_date < curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY)  ") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k8)."</b>";
									?></td>
	                                
	                                </tr>
	                                   <tr>
	                                <td><i class="fa fa-inr" aria-hidden="true"></i> </td>
	                                 <td></td>
	                                <td></td>
	                                <td></td>
	                                <td></td>
	                                <td></td>
	                                </tr>   
	                            </table></div>
	                        </div>
	                    </div>
	                     <div class="col-md-3 col-xs-12 col-sm-6">
	                        <div class="analysis-box m-b-0 bg-navy">
	                            <h3 class="text-white box-title">
								  <input type="submit" class="btn btn-info" style="font-weight: bold;" value="Payment Pending Invoice" onclick="report1();">
								
							</i> <?php echo $lbc;?></span></h3>
	                            <div id="sparkline6"><canvas style="display: contents; width: 267px; height: 60px; vertical-align: top;"></canvas> 
	                      <table class="table">
	                                <th>7 Days</th>
	                                <th>AP</th>
	                                <th>TS</th>
	                                <th>TN</th>
	                                <th>KL</th>
	                                <th>KN</th>
	                                <th></th>
	                                <tr>
	                                <td><i class="fa fa-arrow-up" aria-hidden="true"></i> </td>
	                                <td><?php $k8=mysqli_query($link,"select * from qot_bill where status='Un Paid' and (bill_date=curdate() or bill_date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY) ") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k8)."</b>";
									?> </td>
	                                <td><?php $k8=mysqli_query($link,"select * from tgqot_bill where status='Un Paid' and (bill_date=curdate() or bill_date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY) ") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k8)."</b>";
									?> </td>
	                                <td><?php $k8=mysqli_query($link,"select * from tnqot_bill where status='Un Paid' and (bill_date=curdate() or bill_date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY) ") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k8)."</b>";
									?> </td>
	                                <td><?php $k8=mysqli_query($link,"select * from klqot_bill where status='Un Paid' and (bill_date=curdate() or bill_date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY) ") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k8)."</b>";
									?> </td>
	                                <td><?php $k8=mysqli_query($link,"select * from knqot_bill where status='Un Paid' and (bill_date=curdate() or bill_date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY) ") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k8)."</b>";
									?></td>
	                                </tr>
	                                 <tr>
	                                <td><i class="fa fa-inr" aria-hidden="true"></i> </td>
	                                 <td></td>
	                                <td></td>
	                                <td></td>
	                                <td></td>
	                                <td></td>
	                                </tr>
	                               <tr>
	                                   <td><i class="fa fa-arrow-down" aria-hidden="true"></i></td>
	                                <td><?php $k8=mysqli_query($link,"select * from qot_bill where status='Un Paid' and ( bill_date < curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY) ") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k8)."</b>";
									?> </td>
	                                <td><?php $k8=mysqli_query($link,"select * from tgqot_bill where status='Un Paid' and ( bill_date < curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY) ") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k8)."</b>";
									?> </td>
	                                <td><?php $k8=mysqli_query($link,"select * from tnqot_bill where status='Un Paid' and ( bill_date < curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY) ") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k8)."</b>";
									?> </td>
	                                <td><?php $k8=mysqli_query($link,"select * from klqot_bill where status='Un Paid' and ( bill_date < curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY) ") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k8)."</b>";
									?> </td>
	                                <td><?php $k8=mysqli_query($link,"select * from knqot_bill where status='Un Paid' and ( bill_date < curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY) ") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k8)."</b>";
									?></td>
	                                
	                                </tr>
	                                   <tr>
	                                <td><i class="fa fa-inr" aria-hidden="true"></i> </td>
	                                 <td></td>
	                                <td></td>
	                                <td></td>
	                                <td></td>
	                                <td></td>
	                                </tr>   
	                            </table></div>
	                        </div>
	                    </div>
	                     <div class="col-md-3 col-xs-12 col-sm-6">
	                        <div class="analysis-box m-b-0 bg-olive">
	                            <h3 class="text-white box-title">
								  <input type="submit" class="btn btn-info" style="font-weight: bold;" value="Payment Received" onclick="report1();">
								
	</i> <?php echo $lbc;?></span></h3>
	                            <div id="sparkline6"><canvas style="display: contents; width: 267px; height: 60px; vertical-align: top;"></canvas> 
	                        <table class="table">
	                                <th>7 Days</th>
	                                <th>AP</th>
	                                <th>TS</th>
	                                <th>TN</th>
	                                <th>KL</th>
	                                <th>KN</th>
	                                <th></th>
	                                <tr>
	                                <td><i class="fa fa-arrow-up" aria-hidden="true"></i> </td>
	                                <td>	<?php $k9=mysqli_query($link,"select * from payment where (recevied_date=curdate() or recevied_date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY)  ") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k9)."</b>";
									?> </td>
	                                <td><?php $k9=mysqli_query($link,"select * from tgpayment where (recevied_date=curdate() or recevied_date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY)   ") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k9)."</b>";
									?> </td>
	                                <td><?php $k9=mysqli_query($link,"select * from tnpayment where (recevied_date=curdate() or recevied_date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY)    ") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k9)."</b>";
									?> </td>
	                                <td> <?php $k9=mysqli_query($link,"select * from klpayment where (recevied_date=curdate() or recevied_date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY)   ") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k9)."</b>";
									?></td>
	                                <td><?php $k9=mysqli_query($link,"select * from knpayment where (recevied_date=curdate() or recevied_date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY)   ") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k9)."</b>";
									?></td>
	                                </tr>
	                                 <tr>
	                                <td><i class="fa fa-inr" aria-hidden="true"></i> </td>
	                                 <td></td>
	                                <td></td>
	                                <td></td>
	                                <td></td>
	                                <td></td>
	                                </tr>
	                               <tr>
	                                   <td><i class="fa fa-arrow-down" aria-hidden="true"></i></td>
	                                <td>	<?php $k9=mysqli_query($link,"select * from payment where (recevied_date < curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY)   ") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k9)."</b>";
									?> </td>
	                                <td><?php $k9=mysqli_query($link,"select * from tgpayment where (recevied_date < curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY)  ") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k9)."</b>";
									?> </td>
	                                <td><?php $k9=mysqli_query($link,"select * from tnpayment where (recevied_date < curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY)  ") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k9)."</b>";
									?> </td>
	                                <td> <?php $k9=mysqli_query($link,"select * from klpayment where (recevied_date < curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY)  ") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k9)."</b>";
									?></td>
	                                <td><?php $k9=mysqli_query($link,"select * from knpayment where (recevied_date < curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY)  ") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k9)."</b>";
									?></td>
	                                
	                                </tr>
	                                    <tr>
	                                <td><i class="fa fa-inr" aria-hidden="true"></i> </td>
	                                 <td></td>
	                                <td></td>
	                                <td></td>
	                                <td></td>
	                                <td></td>
	                                </tr>  
	                            </table></div>
	                        </div>
	                    </div>
						</form>
						</div>
                           <hr/>
						
						
                                
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