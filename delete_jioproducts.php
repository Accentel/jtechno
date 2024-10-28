<?php
include('dbconnection/connection.php');
$id=$_GET['id'];
$qry="delete from jioproducts where id='$id'";
 $rs= mysqli_query($link, $qry) or die(mysqli_error($link));
if($rs){
	print "<script>";
	print "alert('Record Deleted Sucessfully');";
	print "self.location='jiouploadproducts.php';";
	print "</script>";
	
}
mysqli_close($link);
?>