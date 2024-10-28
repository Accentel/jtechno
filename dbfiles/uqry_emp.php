<?php

/* =========================================================================================== */
#### insert,edit,update operations for add Employee Details and  display form validations ####
#### Author	: 	K Srinivasa Rao						####

/* =========================================================================================== */
//to insert data into testdetails table.if the is no errrors in form then insert data into database. 
include '../dbconnection/connection.php';



//to update data into testdetails table.if the is no errrors in form then insert data into database. 
if (isset($_POST['submit'])) {
    //reading form data
    $emp_name = trim($_POST['empname']);
    $dob = trim($_POST['dob']);
    $gender = trim($_POST['gender']);
    $maritalstatus = trim($_POST['maritalstatus']);
    $contactno = trim($_POST['conno']);
    $alternateno = trim($_POST['aconno']);
    $adharcardno = trim($_POST['adhar']);
    $address = trim($_POST['address']);
    $city = trim($_POST['city']);
    $state = trim($_POST['state']);
    $qualification = trim($_POST['qua']);
    $experience = trim($_POST['exp']);
    $DOJ = trim($_POST['doj']);
    $designation = trim($_POST['des']);
    $ESI_NO = trim($_POST['esi']);
    $PFNO = trim($_POST['pf']);
    $strcd = trim($_POST['strcd']);
    //$photo= trim($_POST['img1']);
    $iname=$_FILES['empfile']['name'];
   if($iname!= ""){
				// echo "hi";
				 
	$code = md5(rand());
	 //$date=date("Y");
	echo $iname =$date."-".$_FILES['empfile']['name'];
	$tmp = $_FILES['empfile']['tmp_name'];
	
	 $dir = "photos";
		       $destination =  $dir . '/' . $iname;
		         move_uploaded_file($tmp, $destination);
	//move_uploaded_file($tmp,"../staff/" . $code.$_FILES["sfile"]["name"]);
	 $fileName15 =$date."-".$_FILES['empfile']['name'];
	//$iname = $code.$_FILES["sfile"]["name"];
	$fileName15 = ($fileName15);
	}else{
	 $fileName15 = ($image1);
	}
	$emp_email = trim(addslashes($_POST['email']));
	$username = trim(addslashes($_POST['uname']));
	$password = trim(addslashes($_POST['pwd']));
   $user=trim($_POST['user']);
   $id=trim($_POST['id']);
   

 //$res = mysqli_query($link, "insert into acyear(year,user) values('$acyear','$user')") or die("could not connected" . mysqli_error());
 //if the form variables are not empty then update data into database
   
    echo   $sql = "update employee set emp_name='$emp_name',DOB ='$dob',gender='$gender',maritalstatus='$maritalstatus',contactno='$contactno',alternateno='$alternateno',
       adharcardno='$adharcardno',address='$address',city='$city',strcd='$strcd',state='$state',qualification='$qualification',experience='$experience',DOJ='$DOJ',
       designation='$designation',ESI_NO='$ESI_NO',PFNO='$PFNO',photo='$fileName15',emp_email='$emp_email',username='$username',password='$password'
       where empid='$id'";
    $res = mysqli_query($link, $sql) or die("could not connected" . mysqli_error($link));

    if ($res) {

//if it is successfully update then display alert box in form
       print "<script>";
        print "alert('Successfully Uploaded ');";
        print "self.location='addemployee.php';";
        print "</script>";
    }
   
            
   

}else{
	
	$id=$_GET['id'];
	
	$sql = "select * from employee where empid='$id'";
    $res = mysqli_query($link, $sql) or die("could not connected" . mysqli_error($link));
$t=mysqli_fetch_array($res);
	$acyear=$t['lname'];
	$id1=$t['empid'];
	$emp_email=$t['emp_email'];
	$emp_name=$t['emp_name'];
	$username=$t['username'];
	$password=$t['password'];
	
}


//form input validations 
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
	
    $data = htmlspecialchars($data);
    return $data;
}

