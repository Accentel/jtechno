<?php //include('config.php');

include('dbconnection/connection.php');


if(isset($_POST['submit'])){
    
    $qt_no=$_POST['qt_no']; 
	//echo $qt_no="QJISTG19201534";
	$ssq=mysqli_query($link,"select * from  add_qot2  where quet_num='$qt_no'");
	$r1=mysqli_fetch_array($ssq);
	  $qtr=$r1['quet_num'];
	if($qt_no==$qtr){
		//print "<script>";
	//print "alert('Already Quotation Registerd');";
	//print "self.location='add_qot1.php';";
	//print "</script>";
	
	$sqq=mysqli_query($link,"select max(id) as ids from add_qot2 ");
	$rr=mysqli_fetch_array($sqq);
	 $idd=$rr['ids'];
	
	 $qt_nox=19201488+1+$idd;
	 $qt_no="QJISTG$qt_nox";  
	}
	else {
	  $qt_no=$qt_no;	
	}

	
    $inv_date=$_POST['inv_date'];
	$store_code=$_POST['store_code'];
	
	$ses=$_POST['ses'];
	$tot=$_POST['tot'];
	$tot_serv=$_POST['tot_serv'];
	$tot_gst=$_POST['tot_gst'];
	$net=round($_POST['net']);
	$date=date('Y-m-d');
	
	   
	$falt_no=$_POST['falt_no'];
	$falt_date=$_POST['falt_date'];
$falt_desc=$_POST['falt_desc'];

	$t=mysqli_query($link,"select * from employee where username='$ses'") or die(mysqli_error($link));
	$tr=mysqli_fetch_array($t);
	 $empemail=$tr['emp_email'];
	  $a="INSERT INTO `add_qot2`(`store_code`, `inv_date`, `quet_num`, `tot_base`, `tot_ser`, `tot_gst`, `net`,  `ses`,falt_no,falt_date,falt_desc,status)
	 VALUES ('$store_code','$inv_date','$qt_no','$tot','$tot_serv','$tot_gst','$net','$ses','$falt_no','$falt_date','$falt_desc','Ro Required')";
	$sq=mysqli_query($link,$a);
	 $sno=mysqli_insert_id($link);
	
	
	$cnt = count($_POST['pname']);
	if ($cnt > 0 && $cnt == $cnt) {

for ($i=0; $i<$cnt; $i++) {
if( $_POST['pname'][$i]!='' ){
$pname=$_POST['pname'][$i];
$hsn=$_POST['hsn'][$i];
$gst=$_POST['gst'][$i];
$uom=$_POST['uom'][$i];
$qty=$_POST['qty'][$i];
$price=$_POST['price'][$i];
$gst_amnt=$_POST['gst_amnt'][$i];
$amnt=$_POST['amnt'][$i];
$id=$_POST['id'][$i];
$serv_amnt=$_POST['serv_amnt'][$i];
$cap=$_POST['cap'][$i];
$serv_amt=$_POST['serv_amt'][$i];
$serv_amt=$_POST['serv_amt'][$i];
$serv_code=$_POST['serv_num'][$i];
$serv_codex=$_POST['serv_code'][$i];

$query = "INSERT INTO add_qot3 ( `desc1`, `hsn`, `gst`, `uom`, `qty`, `gst_amnt`, `rate`, `base_amt`,`date`,`id1`,item_id,serv_fee,cap,serv_amt,serv_code,serv_cap) 
	VALUES 
 ('".addslashes($pname)."','$hsn','$gst','$uom','$qty','$gst_amnt','$price','$amnt','$date','$sno','$id','$serv_amt','$cap','$serv_amnt','$serv_code','$serv_codex')";
 $res=mysqli_query($link,$query) or die(mysqli_error($link));
}
     
}
	}
	  
	if($res){
	   
	print "<script>";
	print "alert('Sucessfully Saved');";
	print "self.location='qot_list1.php';";
	print "</script>";

}
}





if(isset($_POST['update'])){
	 $id=$_POST['id'];
	 $qt_no=$_POST['qt_no']; 
    $inv_date=$_POST['inv_date'];
	$store_code=$_POST['store_code'];
	
	//if($bar_code!=''){
		 $v="update `add_qot` set 
	`store_code`='$store_code', `inv_date`='$inv_date', `quet_num`='$qt_no'
	
	  where id='$id' ";
	
	$sq=mysqli_query($link,$v) or die(mysqli_error($link));
	

	//exit;
 	//$cnt = count($_POST['item_id1']);
	//if ($cnt > 0 && $cnt == $cnt) {

//for ($i=0; $i<$cnt; $i++) {
//if( $_POST['item_id1'][$i]!='' ){
//$pname=$_POST['pname'][$i];
//$hsn=$_POST['hsn'][$i];
//$gst=$_POST['gst'][$i];
//$uom=$_POST['uom'][$i];
//$qty=$_POST['qty'][$i];
//$price=$_POST['price'][$i];
//$gst_amnt=$_POST['gst_amnt'][$i];
//$amnt=$_POST['amnt'][$i];
//$id=$_POST['item_id1'][$i];
   

	//   $query = "update add_bill set   `qty`='$qty', `gst_amnt`='$gst_amnt',  `total_price`='$amnt' where id='$id'";
	  
	  
	  
 //$res=mysqli_query($link,$query) or die(mysqli_error($link));
  
//}
     
//}
	//}
	//exit;
	if($sq){
	print "<script>";
	print "alert('Sucessfully Updated');";
	print "self.location='qot_list.php';";
	print "</script>";

}
}



if(isset($_POST['update1'])){
$id=$_POST['id'];
$bar_code=$_POST['bar_code'];
	//$date=date('Y-m-d');
	$sub_date=$_POST['sub_date'];
	$payment_doc_date=$_POST['payment_doc_date'];
	$payment_doc_no=$_POST['payment_doc_no'];
$v="update `add_apbill1` set qr_code='$bar_code',bill_submit_date='$sub_date',`payment_doc_date`='$payment_doc_date',`payment_doc_no`='$payment_doc_no' where id='$id'";
$res=mysqli_query($link,$v) or die(mysqli_error($link));

if($res){
	print "<script>";
	print "alert('Sucessfully Updated');";
	print "self.location='andhrabill_list.php';";
	print "</script>";
	
	
}


}










?>
