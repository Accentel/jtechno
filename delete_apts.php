<?php
include('dbconnection/connection3.php');
$id=$_GET['id'];
$qry="delete from register where id='$id'";
 $rs= mysqli_query($link4, $qry) or die(mysqli_error($link4));
if($rs){
	print "<script>";
	print "alert('Record Deleted Sucessfully');";
	print "self.location='addapts.php';";
	print "</script>";
	
}
mysqli_close($link4);
?>