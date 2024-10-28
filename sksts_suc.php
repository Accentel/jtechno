<?php
include('dbconnection/connection2.php');
if(isset($_POST['update'])){
$name=$_POST['name'];	
$mobile=$_POST['mobile'];	
$email=$_POST['email'];
$category=$_POST['category'];	
$state=$_POST['state'];
$password=$_POST['password'];
$date=$_POST['date'];
$time=$_POST['time'];
$loggedin=$_POST['loggedin'];
$designation=$_POST['designation'];
$location=$_POST['location'];
$bank=$_POST['bank'];
$pfno=$_POST['pfno'];
$id=$_POST['id'];
$pfuan=$_POST['pfuan'];
$esinumber=$_POST['esinumber'];
$acno=$_POST['acno'];

$absents=$_POST['absents'];
$basic=$_POST['basic'];
$others=$_POST['others'];
$takehome=$_POST['takehome'];
$daf=$_POST['daf'];
$level1=$_POST['level1'];
$level2=$_POST['level2'];
$level3=$_POST['level3'];


$level4=$_POST['level4'];
$level5=$_POST['level5'];
$level6=$_POST['level6'];
$level7=$_POST['level7'];
$level8=$_POST['level8'];


	$sql="update register set name='$name',phoneno='$mobile',email='$email',category='$category',state='$state',password='$password',
	date='$date',time='$time',loggedin='$loggedin',designation='$designation',location='$location',bank_name='$bank',pfnumber='$pfno' ,
	pfuan='$pfuan',esinumber='$esinumber',acno='$acno',absents='$absents',basic='$basic',others='$others',takehome='$takehome',daf='$daf',
	level1='$level1',level2='$level2',level3='$level3',level4='$level4',level5='$level5',level6='$level6',level7='$level7',level8='$level8'
	where id='$id'";
	$r=mysqli_query($link3,$sql) or die(mysqli_error($link3));
	if($r){
	    
	   print "<script>";

			print "alert('Successfully Updated ');";

			print "self.location='addkstn.php';";

			print "</script>"; 
	    
	}
}
	 ?>