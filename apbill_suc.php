<?php //include('config.php');

include('dbconnection/connection.php');


if(isset($_POST['submit'])){
    
    $store_name=$_POST['store_name']; 
    $state=$_POST['state'];
	$state_code=$_POST['state_code'];
	$addr=$_POST['addr'];
	$ses=$_POST['ses'];
	$gst_in=$_POST['gst_in'];
	$tot=$_POST['tot'];
	$tot_gst=$_POST['tot_gst'];
	$net=$_POST['net'];
	$date=$_POST['inv_date'];
	$store_code=$_POST['store_code'];
$inv_no=$_POST['inv_no'];

	$t=mysqli_query($link,"select * from employee where username='$ses'") or die(mysqli_error($link));
	$tr=mysqli_fetch_array($t);
	 $empemail=$tr['emp_email'];
	 $a="INSERT INTO `add_bill1`(`date`, `store_name`, `store_code`, `state`, `state_code`, `addr`, `gst_in`, 
	`total_amnt`, `net`, `total_gst`, `user`,inv_no)
	 VALUES ('$date','$store_name','$store_code','$state','$state_code','$addr','$gst_in','$tot','$net','$tot_gst','$ses','$inv_no')";
	$sq=mysqli_query($link,$a);
	echo  $sno=mysqli_insert_id($link);
	
	
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
$query = "INSERT INTO add_bill ( `product_name`, `hsnno`, `gst`, `uom`, `qty`, `gst_amnt`, `price`, `total_price`,`date`,`id1`,item_id) 
	VALUES 
 ('".addslashes($pname)."','$hsn','$gst','$uom','$qty','$gst_amnt','$price','$amnt','$date','$sno','$id')";
 $res=mysqli_query($link,$query) or die(mysqli_error($link));
}
     
}
	}
	  
	if($res){
	   
	print "<script>";
	print "alert('Sucessfully Saved');";
	print "self.location='bill_list.php';";
	print "</script>";

}
}




if(isset($_POST['update'])){
	 $id=$_POST['id'];
	 $store_name=$_POST['store_name']; 
     $state=$_POST['state'];
	$state_code=$_POST['state_code'];
	$addr=$_POST['addr'];
	$ses=$_POST['ses'];
	$gst_in=$_POST['gst_in'];
	$tot=$_POST['tot'];
	$tot_gst=$_POST['tot_gst'];
	$net=$_POST['net'];
	$date=$_POST['inv_date'];
	$store_code=$_POST['store_code'];
	$inv_no=$_POST['inv_no'];
	//if($bar_code!=''){
		 $v="update `add_bill1` set 
	
	
	 `store_name`='$store_name', `store_code`='$store_code', `state`='$state', `state_code`='$state_code',
	 `addr`='$addr', `gst_in`='$gst_in', 
	`total_amnt`='$tot', `net`='$net', `total_gst`='$tot_gst', `user`='$ses',inv_no='$inv_no' where id='$id' ";
	
	$sq=mysqli_query($link,$v) or die(mysqli_error($link));
	

	//exit;
 	$cnt = count($_POST['item_id1']);
	if ($cnt > 0 && $cnt == $cnt) {

for ($i=0; $i<$cnt; $i++) {
if( $_POST['item_id1'][$i]!='' ){
$pname=$_POST['pname'][$i];
$hsn=$_POST['hsn'][$i];
$gst=$_POST['gst'][$i];
$uom=$_POST['uom'][$i];
$qty=$_POST['qty'][$i];
$price=$_POST['price'][$i];
$gst_amnt=$_POST['gst_amnt'][$i];
$amnt=$_POST['amnt'][$i];
$id=$_POST['item_id1'][$i];
   

	   $query = "update add_bill set   `qty`='$qty', `gst_amnt`='$gst_amnt',  `total_price`='$amnt' where id='$id'";
	  
	  
	  
 $res=mysqli_query($link,$query) or die(mysqli_error($link));
  
}
     
}
	}
	//exit;
	if($res){
	print "<script>";
	print "alert('Sucessfully Updated');";
	print "self.location='bill_list.php';";
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
