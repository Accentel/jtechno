<?php
include('dbconnection/connection2.php');
$id=$_GET['id'];
$qry="delete from register where id='$id'";
 $rs= mysqli_query($link3, $qry) or die(mysqli_error($link3));
if($rs){
	print "<script>";
	print "alert('Record Deleted Sucessfully');";
	print "self.location='addkstn.php';";
	print "</script>";
	
}
mysqli_close($link4);
?>