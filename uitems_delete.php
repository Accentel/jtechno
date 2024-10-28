<?php //include('config.php');
session_start();
include('dbconnection/connection.php');
$id=$_GET['id'];




$sql=mysqli_query($link,"delete from ritems where id='$id'") or die(mysqli_error($link));
if($sql){
	print "<script>";
	print "alert('Sucessfully Deleted');";
	print "self.location='uploaditems_list.php';";
	print "</script>";
	}
?>