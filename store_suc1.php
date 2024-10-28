<?php //include('config.php');


if(isset($_POST['submit'])){
	include('dbconnection/connection1.php');
$state=$_POST['state'];	
$city=$_POST['city'];	
$format_type=$_POST['format_type'];
$store_code=$_POST['store_code'];	
$store_name=$_POST['store_name'];
$comp_name=$_POST['comp_name'];
$gst_in=$_POST['gst_in'];
$state_code=$_POST['state_code'];
$addr=$_POST['addr'];
$cordinator=$_POST['cordinator'];
$afm=$_POST['afm'];
$super=$_POST['super'];
$ship_name=$_POST['ship_name'];
$ship_state=$_POST['ship_state'];
$ship_gst=$_POST['ship_gst'];
$addr1=$_POST['addr1'];
	
	$sq=mysqli_query($link,"INSERT INTO `dpr`( `state`, `city`, `format_type`, `store_code`, `store_name`, `company_name`,gst_in,state_code,address,superwisor,coordinator,
	afm,ship_ddress,ship_name,ship_state,ship_gst)
	 VALUES ( '$state', '$city', '$format_type', '$store_code', '$store_name', '$comp_name','$gst_in',
	 '$state_code','$addr','$super','$cordinator','$afm','$addr1','$ship_name','$ship_state','$ship_gst')");
	
	//if($sq){
	//print "<script>";
	//print "alert('Sucessfully Saved');";
	//print "self.location='store_list.php';";
	//print "</script>";

//}
}
if(isset($_POST['submit'])){
	include('dbconnection/connection.php');
$state=$_POST['state'];	
$city=$_POST['city'];	
$format_type=$_POST['format_type'];
$store_code=$_POST['store_code'];	
$store_name=$_POST['store_name'];
$comp_name=$_POST['comp_name'];
$gst_in=$_POST['gst_in'];
$state_code=$_POST['state_code'];
$addr=$_POST['addr'];
$cordinator=$_POST['cordinator'];
$afm=$_POST['afm'];
$super=$_POST['super'];
$ship_name=$_POST['ship_name'];
$ship_state=$_POST['ship_state'];
$ship_gst=$_POST['ship_gst'];
$addr1=$_POST['addr1'];
	
	$sq=mysqli_query($link,"INSERT INTO `dpr`( `state`, `city`, `format_type`, `store_code`, `store_name`, `company_name`,gst_in,state_code,address,superwisor,coordinator,
	afm,ship_ddress,ship_name,ship_state,ship_gst)
	 VALUES ( '$state', '$city', '$format_type', '$store_code', '$store_name', '$comp_name','$gst_in',
	 '$state_code','$addr','$super','$cordinator','$afm','$addr1','$ship_name','$ship_state','$ship_gst')");
	
	if($sq){
	print "<script>";
	print "alert('Sucessfully Saved');";
	print "self.location='store_list.php';";
	print "</script>";

}
}





if(isset($_POST['update'])){
	include('dbconnection/connection1.php');
	$id=$_POST['id'];
$state=$_POST['state'];	
$city=$_POST['city'];	
$format_type=$_POST['format_type'];
$store_code=$_POST['store_code'];	
$store_name=$_POST['store_name'];
$comp_name=$_POST['comp_name'];
$gst_in=$_POST['gst_in'];
$state_code=$_POST['state_code'];
$addr=$_POST['addr'];
$cordinator=$_POST['cordinator'];
$afm=$_POST['afm'];
$super=$_POST['super'];
$ship_name=$_POST['ship_name'];
$ship_state=$_POST['ship_state'];
$ship_gst=$_POST['ship_gst'];
$addr1=$_POST['addr1'];
  $a="update  `dpr` set `state`='$state', `city`='$city', `format_type`='$format_type',
	 `store_code`='$store_code', `store_name`='$store_name', `company_name`='$comp_name',address='$addr',state_code='$state_code',gst_in='$gst_in',
	 superwisor='$super',coordinator='$cordinator',afm='$afm',
	 ship_ddress='$addr1',ship_name='$ship_name',ship_state='$ship_state',ship_gst='$ship_gst' where id='$id'";
	
	$sq=mysqli_query($link,$a);
	
	if($sq){
	print "<script>";
	print "alert('Sucessfully Updated');";
	print "self.location='store_suc1.php?id=$id&state=$state&city=$city&format_type=$format_type&store_code=$store_code&store_name=$store_name';";
	print "</script>";
	}

//mysqli_close($link);





	/*include('dbconnection/connection2.php');
	$id=$_POST['id'];
$state=$_POST['state'];	
$city=$_POST['city'];	
$format_type=$_POST['format_type'];
$store_code=$_POST['store_code'];	
$store_name=$_POST['store_name'];
$comp_name=$_POST['comp_name'];
$gst_in=$_POST['gst_in'];
$state_code=$_POST['state_code'];
$addr=$_POST['addr'];
$cordinator=$_POST['cordinator'];
$afm=$_POST['afm'];
$super=$_POST['super'];
$ship_name=$_POST['ship_name'];
$ship_state=$_POST['ship_state'];
$ship_gst=$_POST['ship_gst'];
$addr1=$_POST['addr1'];
 echo $a1="update  `dpr` set `state`='$state', `city`='$city', `format_type`='$format_type',
	 `store_code`='$store_code', `store_name`='$store_name', `company_name`='$comp_name',address='$addr',state_code='$state_code',gst_in='$gst_in',
	 superwisor='$super',coordinator='$cordinator',afm='$afm',
	 ship_ddress='$addr1',ship_name='$ship_name',ship_state='$ship_state',ship_gst='$ship_gst' where id='$id'";

	$sq1=mysqli_query($con,$a1) or die(mysqli_error($con));;
		exit;
	if($sq1){
	print "<script>";
	print "alert('Sucessfully Updated');";
	print "self.location='store_list.php';";
	print "</script>";
	}*/


}

?>
