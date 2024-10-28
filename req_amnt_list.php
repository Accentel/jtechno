<?php 
include('dbconnection/connection.php');
$id=$_GET['id'];
$state=$_GET['state'];

if($state=='AP'){
	$qottable ='add_qot';
	$request_amnt ='request_amnt';
 
}
elseif($state=='TG'){
	$qottable ='add_tgqot';
	$request_amnt ='tgrequest_amnt';
}

elseif($state=='KL'){
	$qottable ='add_klqot';
	$request_amnt ='klrequest_amnt';
}
else if($state=='KN'){
  $qottable ='add_knqot';
  $request_amnt ='knrequest_amnt';
}
else if($state=='TN'){
	$qottable ='add_tnqot';
	$request_amnt ='tnrequest_amnt';
  }
elseif($state=='OD'){
  $qottable ='add_odqot';
  $request_amnt ='odrequest_amnt';

}	
$k=mysqli_query($link,"select * from ".$request_amnt." where quet_num='$id'") or die(mysqli_error($link));
while($k1=mysqli_fetch_array($k)){
    $id1=$k1['id'];
    $amt=$k1['req_amnt']+$k1['gstamt'];
    
    	$confirm="Yes";
							  $dd="update ".$request_amnt." set confirm='$confirm',approve_amnt='$amt' where id='$id1'";
											$ssq=mysqli_query($link,$dd);
}
	mysqli_query($link,"update ".$qottable ." set status='Approved Amount' where quet_num='$id'") or die(mysqli_error($link));
											print "<script>";
			print "alert('Amount Approved Successfully');";
			print "self.location='req_list.php?state=$state';";
			print "</script>";
										?>
									