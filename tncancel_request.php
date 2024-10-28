<?php 
include('dbconnection/connection.php');
$id=$_GET['id'];
											
											$transfer='0.00';
											
											
												$confirm="Cancel";
											
											 // $dd="update klrequest_amnt set confirm='$confirm',approve_amnt='$transfer',gstamt='0.00',req_amnt='0.00',req_date='0000-00-00',transfer='0.00',ac_det='',gsttype='',
											  //status='Cancel' where quet_num='$id'";
											  	$dd="delete from tnrequest_amnt where quet_num='$id'";
											$ssq=mysqli_query($link,$dd) or die(mysqli_error($link));
											
											//exit;
											 $dd1="update add_tnqot set adv_amnt='0.00',adv_amnt1='0.00',adv_amnt2='0.00',adv_date='0000-00-00',adv_date1='0000-00-00',adv_date2='0000-00-00',
											 ac_det1='',ac_det2='',ac_det3='', gst_type='',bal='',status='work to be started', gst_type1='', gst_type2='',gst_amount='0.00',gst_amount1='0.00',gst_amount2='0.00',bal='' where quet_num='$id'";
											$ssq1=mysqli_query($link,$dd1);
											
											print "<script>";
			print "alert('Amount Approved Cancel');";
			print "self.location='tnreq_list.php';";
			print "</script>";
										?>
									