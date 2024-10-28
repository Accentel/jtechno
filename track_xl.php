<?php
//require_once("config.php");
//header("Content-Type: application/vnd.ms-excel");
//header("Content-disposition: attachment; filename=marks_report_printexcel".date('d-m-Y').".xls");

header('Content-type: application/vnd.ms-excel');


header("Content-Disposition: attachment; filename=TRACKER DOWNLOAD".date('d-m-Y').".xls");
header('Cache-Control: max-age=0');

  ?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>JYOTHI BILLING</title>

</head>
<body>
<table border="1"><tr style="background-color:#CCC">
<td>State</td>
<td>Quote Number</td><td>Supervisor</td><td>Coordinator</td><td>AFM</td><td>Store Name</td><td>Store Code</td>



<td>City</td><td>Store Type</td><td>Company Name</td><td>Quote Date</td><td>Call No.</td><td>Call Date</td>
<td>Call Description</td>

<td>Quote Status</td>
<td>Type of Work</td>
<td>Sub Type</td>
<td>RO/WO/PO No.</td><td>PO Type 416/417</td><td>RO/WO/PO  Date</td><td>RO/WO/PO Month</td>
<td>RO Amount Without Mngmt</td><td>Management</td><td>GST</td><td>Invoice Total</td>
<td>Invested</td><td>Amount Date</td><td>to Whoom</td><td>Invoice Number</td><td>Invoice Date</td><td>Invoice Submitted Date</td>
<td>Service Period</td><td>Invoice Submitted Month</td><td>Invoice Status</td><td>28% Base Amount</td>
<td>18% Base Amount</td><td>12% Base Amount</td><td>5% Base Amount</td><td>0% Amount</td><td>Total Base Amount</td>
<td>28% GST</td><td>18% GST</td><td>12% GST</td><td>5% GST</td><td>Total GST Amount</td><td>Net Amount</td></tr>

<?php 
include('dbconnection/connection.php');
if(isset($_POST['submit'])){
	$from_date=$_POST['from_date'];
	$to_date=$_POST['to_date'];
	$type=$_POST['emp'];
	
	
}
if($type=='AP'){
	 $a="select * from add_qot where inv_date between '$from_date' and '$to_date'";
$sq=mysqli_query($link,$a);
} else if($type=='TS') {
$sq=mysqli_query($link,"select * from add_qot2 where inv_date between '$from_date' and '$to_date'");
}
while($r=mysqli_fetch_array($sq)){?>
<tr>
<?php  $str=$r['store_code'];?>


<?php $ssq=mysqli_query($link,"select * from dpr where store_code='$str'");
$i=1;
$r1=mysqli_fetch_array($ssq);?>
<td><?php echo $type;?></td>
<td><?php

$id1=$r['id'];
 echo $qtn=$r['quet_num'];?></td>
	<td><?php echo $r1['superwisor'];?></td>

	<td><?php echo $r1['coordinator'];?></td>
	<td><?php echo $r1['afm'];?></td>
	<td><?php echo $r1['store_name'];?></td>
	<td><?php echo $str=$r['store_code'];?></td>
	
	<td><?php echo $r1['city'];?></td>
	<td><?php echo $r1['format_type'];?></td>
	<td><?php echo $r1['company_name'];?></td>


	<td><?php  $d=$r['inv_date']; echo date('d/m/Y', strtotime($d));?></td>
		<td><?php echo $r['falt_no'];?></td>
		<td><?php  $d=$r['falt_date']; echo date('d/m/Y', strtotime($d));?></td>
		<td><?php echo $r['falt_desc'];?></td>
	
	<td><?php echo $r['status'];?></td>
	
<td><?php echo $r['type_of_work'];?></td><td><?php echo $r['sub_type'];?></td>
		<td><?php echo $r['ro_no'];?>/<?php echo $r['po_no'];?></td>
		<td><?php echo $r['po_type'];?></td>
			<td><?php  $d1=$r['ro_date']; if($d1!='0000-00-00'){  echo date('d/m/Y', strtotime($d1)); } ?>  
			<?php  $d2=$r['po_date'];
if($d2!='0000-00-00'){
echo date('m/d/Y', strtotime($d2)); }?></td>
			<td><?php  $d1=$r['ro_date']; 
			if($d1!='0000-00-00'){ 
			echo date("M'y", strtotime($d1)); } ?>  <?php  $d2=$r['po_date'];
if($d2!='0000-00-00'){
echo date("M'y", strtotime($d2)); }?></td>
			<td><?php echo $r['tot_base'];?></td>
			<td><?php echo $r['tot_ser'];?></td>
			<td><?php echo $r['tot_gst'];?></td>
			<td><?php echo $r['net'];?></td>
			
			<td><?php echo $adv_amnt=$r['adv_amnt']+$r['adv_amnt1']+$r['adv_amnt2'];?></td>
			<td>
			<?php $adv_date=$r['adv_date']; $adv_date1=$r['adv_date1']; $adv_date2=$r['adv_date2'];
			if($adv_date2!='0000-00-00'){ echo  date('d/m/Y', strtotime($adv_date2)); }
			else if($adv_date2=='0000-00-00' and $adv_date1!='0000-00-00'){ echo  date('d/m/Y', strtotime($adv_date1)); }
			else if($adv_date2=='0000-00-00' and $adv_date1=='0000-00-00'and $adv_date!='0000-00-00'){ echo  date('d/m/Y', strtotime($adv_date)); }
			?>
			</td><td><?php echo $r['ac_name'];?></td><td><?php echo $r['invoice_no'];?></td>
			<td><?php  $d1x=$r['invoice_date']; if($d1x!='0000-00-00'){  echo date('d/m/Y', strtotime($d1x)); } ?> 
			</td><td><?php  $d12=$r['inv_sub_date']; if($d12!='0000-00-00'){  echo date('d/m/Y', strtotime($d12)); } ?></td>
<td> <?php   $d12x=$r['inv_date'];
			if($d!='0000-00-00'){ 
			echo date("M'y", strtotime($d12x)); } ?></td><td><?php  
			if($d12!='0000-00-00'){ 
			echo date("M'y", strtotime($d12)); } ?> </td>
			<td><?php  $sts=$r['invoice_status']; if($sts!=''){ echo $sts; } else { echo "Un Paid" ;} ?></td>
			<td>
			<?php 
			 $ssa="select sum(base_amt) as amt,sum(gst_amnt) as gamt from add_qot1 where id1='$id1' and gst='28.00'";
			$qs=mysqli_query($link,$ssa);
			$r2=mysqli_fetch_array($qs);
			echo $amt28=$r2['amt'];
			$gamt28=$r2['gamt'];
			?>
			</td>
<td>
<?php 
			$qs=mysqli_query($link,"select sum(base_amt) as amt,sum(gst_amnt) as gamt from add_qot1 where id1='$id1' and gst='18.00'");
			$r2=mysqli_fetch_array($qs);
			echo $amt18=$r2['amt'];
			$gamt18=$r2['gamt'];
			?>
</td><td><?php 
			$qs=mysqli_query($link,"select sum(base_amt) as amt,sum(gst_amnt) as gamt from add_qot1 where id1='$id1' and gst='12.00'");
			$r2=mysqli_fetch_array($qs);
			echo $amt12=$r2['amt'];
			$gamt12=$r2['gamt'];
			?></td><td>
			<?php 
			$qs=mysqli_query($link,"select sum(base_amt) as amt,sum(gst_amnt) as gamt from add_qot1 where  id1='$id1' and gst='5.00'");
			$r2=mysqli_fetch_array($qs);
			echo $amt5=$r2['amt'];
			$gamt5=$r2['gamt'];
			?>
			
			</td><td>
			<?php 
			$qs=mysqli_query($link,"select sum(base_amt) as amt,sum(gst_amnt) as gamt from add_qot1 where id1='$id1' and gst='0.00'");
			$r2=mysqli_fetch_array($qs);
			echo $amt0=$r2['amt'];
			$gamt0=$r2['gamt'];
			?>
			</td>
			<td><?php echo $sum=$amt28+$amt18+$amt12+$amt5+$amt0?></td>
			<td><?php echo $gamt28;?></td>
			<td><?php echo $gamt18;?></td>
			<td><?php echo $gamt12;?></td>
			<td><?php echo $gamt5;?></td>
			<td><?php echo $gmt=$gamt28+$gamt18+$gamt12+$gamt5;?></td>
			<td><?php echo $sum+$gmt;?></td>
	</tr>
<?php $i++;}?>




<?php if($type==''){
	
		 $a="select * from add_qot where inv_date between '$from_date' and '$to_date'";
$sq=mysqli_query($link,$a);


while($r=mysqli_fetch_array($sq)){?>
	

<tr>
<?php  $str=$r['store_code'];?>


<?php $ssq=mysqli_query($link,"select * from dpr where store_code='$str'");
$i=1;
$r1=mysqli_fetch_array($ssq);?>
<td>AP</td>

<td><?php
$id1=$r['id'];

 echo $r['quet_num'];?></td>
	<td><?php echo $r1['superwisor'];?></td>

	<td><?php echo $r1['coordinator'];?></td>
	<td><?php echo $r1['afm'];?></td>
	<td><?php echo $r1['store_name'];?></td>
	<td><?php echo $str=$r['store_code'];?></td>
	
	<td><?php echo $r1['city'];?></td>
	<td><?php echo $r1['format_type'];?></td>
	<td><?php echo $r1['company_name'];?></td>


	<td><?php  $d=$r['inv_date']; echo date('d/m/Y', strtotime($d));?></td>
		<td><?php echo $r['falt_no'];?></td>
		<td><?php  $d=$r['falt_date']; echo date('d/m/Y', strtotime($d));?></td>
		<td><?php echo $r['falt_desc'];?></td>
	
	<td><?php echo $r['status'];?></td>
	
<td><?php echo $r['type_of_work'];?></td><td><?php echo $r['sub_type'];?></td>
		<td><?php echo $r['ro_no'];?>/<?php echo $r['po_no'];?></td>
		<td><?php echo $r['po_type'];?></td>
			<td><?php  $d1=$r['ro_date']; if($d1!='0000-00-00'){  echo date('d/m/Y', strtotime($d1)); } ?>  
			<?php  $d2=$r['po_date'];
if($d2!='0000-00-00'){
echo date('m/d/Y', strtotime($d2)); }?></td>
			<td><?php  $d1=$r['ro_date']; 
			if($d1!='0000-00-00'){ 
			echo date("M'y", strtotime($d1)); } ?>  <?php  $d2=$r['po_date'];
if($d2!='0000-00-00'){
echo date("M'y", strtotime($d2)); }?></td>
			<td><?php echo $r['tot_base'];?></td>
			<td><?php echo $r['tot_ser'];?></td>
			<td><?php echo $r['tot_gst'];?></td>
			<td><?php echo $r['net'];?></td>
			
			<td><?php echo $adv_amnt=$r['adv_amnt']+$r['adv_amnt1']+$r['adv_amnt2'];?></td>
			<td>
			<?php $adv_date=$r['adv_date']; $adv_date1=$r['adv_date1']; $adv_date2=$r['adv_date2'];
			if($adv_date2!='0000-00-00'){ echo  date('d/m/Y', strtotime($adv_date2)); }
			else if($adv_date2=='0000-00-00' and $adv_date1!='0000-00-00'){ echo  date('d/m/Y', strtotime($adv_date1)); }
			else if($adv_date2=='0000-00-00' and $adv_date1=='0000-00-00'and $adv_date!='0000-00-00'){ echo  date('d/m/Y', strtotime($adv_date)); }
			?>
			</td><td><?php echo $r['ac_name'];?></td><td><?php echo $r['invoice_no'];?></td>
			<td><?php  $d1x=$r['invoice_date']; if($d1x!='0000-00-00'){  echo date('d/m/Y', strtotime($d1x)); } ?> 
			</td><td><?php  $d12=$r['inv_sub_date']; if($d12!='0000-00-00'){  echo date('d/m/Y', strtotime($d12)); } ?></td>
<td> <?php   $d12x=$r['inv_date'];
			if($d!='0000-00-00'){ 
			echo date("M'y", strtotime($d12x)); } ?></td><td><?php  
			if($d12!='0000-00-00'){ 
			echo date("M'y", strtotime($d12)); } ?> </td>
			<td><?php  $sts=$r['invoice_status']; if($sts!=''){ echo $sts; } else { echo "Un Paid" ;} ?></td>
			<td>
			<?php 
			 $ssa="select sum(base_amt) as amt,sum(gst_amnt) as gamt from add_qot1 where id1='$id1' and gst='28.00'";
			$qs=mysqli_query($link,$ssa);
			$r2=mysqli_fetch_array($qs);
			echo $amt28=$r2['amt'];
			$gamt28=$r2['gamt'];
			?>
			</td>
<td>
<?php 
			$qs=mysqli_query($link,"select sum(base_amt) as amt,sum(gst_amnt) as gamt from add_qot1 where id1='$id1' and gst='18.00'");
			$r2=mysqli_fetch_array($qs);
			echo $amt18=$r2['amt'];
			$gamt18=$r2['gamt'];
			?>
</td><td><?php 
			$qs=mysqli_query($link,"select sum(base_amt) as amt,sum(gst_amnt) as gamt from add_qot1 where id1='$id1' and gst='12.00'");
			$r2=mysqli_fetch_array($qs);
			echo $amt12=$r2['amt'];
			$gamt12=$r2['gamt'];
			?></td><td>
			<?php 
			$qs=mysqli_query($link,"select sum(base_amt) as amt,sum(gst_amnt) as gamt from add_qot1 where  id1='$id1' and gst='5.00'");
			$r2=mysqli_fetch_array($qs);
			echo $amt5=$r2['amt'];
			$gamt5=$r2['gamt'];
			?>
			
			</td><td>
			<?php 
			$qs=mysqli_query($link,"select sum(base_amt) as amt,sum(gst_amnt) as gamt from add_qot1 where id1='$id1' and gst='0.00'");
			$r2=mysqli_fetch_array($qs);
			echo $amt0=$r2['amt'];
			$gamt0=$r2['gamt'];
			?>
			</td>
			
			<td><?php echo $sum=$amt28+$amt18+$amt12+$amt5+$amt0?></td>
			<td><?php echo $gamt28;?></td>
			<td><?php echo $gamt18;?></td>
			<td><?php echo $gamt12;?></td>
			<td><?php echo $gamt5;?></td>
			<td><?php echo $gmt=$gamt28+$gamt18+$gamt12+$gamt5;?></td>
			<td><?php echo $sum+$gmt;?></td>
	</tr>
<?php $j=$i++;}?>
<?php 

$sq1=mysqli_query($link,"select * from add_qot2 where inv_date between '$from_date' and '$to_date'");
while($r=mysqli_fetch_array($sq1)){?>

<tr>
<?php  $str=$r['store_code'];?>


<?php $ssq=mysqli_query($link,"select * from dpr where store_code='$str'");
$k=$j;
$r1=mysqli_fetch_array($ssq);?>
<td>TS</td>
<td><?php 
$id1=$r['id'];
echo $r['quet_num'];?></td>
	<td><?php echo $r1['superwisor'];?></td>

	<td><?php echo $r1['coordinator'];?></td>
	<td><?php echo $r1['afm'];?></td>
	<td><?php echo $r1['store_name'];?></td>
	<td><?php echo $str=$r['store_code'];?></td>
	
	<td><?php echo $r1['city'];?></td>
	<td><?php echo $r1['format_type'];?></td>
	<td><?php echo $r1['company_name'];?></td>


	<td><?php  $d=$r['inv_date']; echo date('d/m/Y', strtotime($d));?></td>
		<td><?php echo $r['falt_no'];?></td>
		<td><?php  $d=$r['falt_date']; echo date('d/m/Y', strtotime($d));?></td>
		<td><?php echo $r['falt_desc'];?></td>
	
	<td><?php echo $r['status'];?></td>
	
<td><?php echo $r['type_of_work'];?></td><td><?php echo $r['sub_type'];?></td>
		<td><?php echo $r['ro_no'];?>/<?php echo $r['po_no'];?></td>
		<td><?php echo $r['po_type'];?></td>
			<td><?php  $d1=$r['ro_date']; if($d1!='0000-00-00'){  echo date('d/m/Y', strtotime($d1)); } ?>  
			<?php  $d2=$r['po_date'];
if($d2!='0000-00-00'){
echo date('m/d/Y', strtotime($d2)); }?></td>
			<td><?php  $d1=$r['ro_date']; 
			if($d1!='0000-00-00'){ 
			echo date("M'y", strtotime($d1)); } ?>  <?php  $d2=$r['po_date'];
if($d2!='0000-00-00'){
echo date("M'y", strtotime($d2)); }?></td>
			<td><?php echo $r['tot_base'];?></td>
			<td><?php echo $r['tot_ser'];?></td>
			<td><?php echo $r['tot_gst'];?></td>
			<td><?php echo $r['net'];?></td>
			
			<td><?php echo $adv_amnt=$r['adv_amnt']+$r['adv_amnt1']+$r['adv_amnt2'];?></td>
			<td>
			<?php $adv_date=$r['adv_date']; $adv_date1=$r['adv_date1']; $adv_date2=$r['adv_date2'];
			if($adv_date2!='0000-00-00'){ echo  date('d/m/Y', strtotime($adv_date2)); }
			else if($adv_date2=='0000-00-00' and $adv_date1!='0000-00-00'){ echo  date('d/m/Y', strtotime($adv_date1)); }
			else if($adv_date2=='0000-00-00' and $adv_date1=='0000-00-00'and $adv_date!='0000-00-00'){ echo  date('d/m/Y', strtotime($adv_date)); }
			?>
			</td><td><?php echo $r['ac_name'];?></td><td><?php echo $r['invoice_no'];?></td>
			<td><?php  $d1x=$r['invoice_date']; if($d1x!='0000-00-00'){  echo date('d/m/Y', strtotime($d1x)); } ?> 
			</td><td><?php  $d12=$r['inv_sub_date']; if($d12!='0000-00-00'){  echo date('d/m/Y', strtotime($d12)); } ?></td>
<td> <?php   $d12x=$r['inv_date'];
			if($d!='0000-00-00'){ 
			echo date("M'y", strtotime($d12x)); } ?></td><td><?php  
			if($d12!='0000-00-00'){ 
			echo date("M'y", strtotime($d12)); } ?> </td>
			<td><?php  $sts=$r['invoice_status']; if($sts!=''){ echo $sts; } else { echo "Un Paid" ;} ?></td>
			<td>
			<?php 
			$qs=mysqli_query($link,"select sum(base_amt) as amt,sum(gst_amnt) as gamt from add_qot3 where id1='$id1' and gst='28.00'");
			$r2=mysqli_fetch_array($qs);
			echo $amt28=$r2['amt'];
			$gamt28=$r2['gamt'];
			?>
			</td>
<td>
<?php 
			$qs=mysqli_query($link,"select sum(base_amt) as amt,sum(gst_amnt) as gamt from  add_qot3 where id1='$id1' and gst='18.00'");
			$r2=mysqli_fetch_array($qs);
			echo $amt18=$r2['amt'];
			$gamt18=$r2['gamt'];
			?>
</td><td><?php 
			$qs=mysqli_query($link,"select sum(base_amt) as amt,sum(gst_amnt) as gamt from add_qot3 where id1='$id1' and gst='12.00'");
			$r2=mysqli_fetch_array($qs);
			echo $amt12=$r2['amt'];
			$gamt12=$r2['gamt'];
			?></td><td>
			<?php 
			$qs=mysqli_query($link,"select sum(base_amt) as amt,sum(gst_amnt) as gamt from  add_qot3 where id1='$id1' and gst='5.00'");
			$r2=mysqli_fetch_array($qs);
			echo $amt5=$r2['amt'];
			$gamt5=$r2['gamt'];
			?>
			
			</td><td>
			<?php 
			$qs=mysqli_query($link,"select sum(base_amt) as amt,sum(gst_amnt) as gamt from add_qot3 where id1='$id1' and gst='0.00'");
			$r2=mysqli_fetch_array($qs);
			echo $amt0=$r2['amt'];
			$gamt0=$r2['gamt'];
			?>
			</td>
			
			<td><?php echo $sum=$amt28+$amt18+$amt12+$amt5+$amt0?></td>
			<td><?php echo $gamt28;?></td>
			<td><?php echo $gamt18;?></td>
			<td><?php echo $gamt12;?></td>
			<td><?php echo $gamt5;?></td>
			<td><?php echo $gmt=$gamt28+$gamt18+$gamt12+$gamt5;?></td>
			<td><?php echo $sum+$gmt;?></td>
	</tr>
<?php $k++;} }?>
	