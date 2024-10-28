<?php

/* =========================================================================================== */
#### insert,edit,update operations for add Employee Details and  display form validations ####
#### Author	: 	K Srinivasa Rao						####

/* =========================================================================================== */
//to insert data into testdetails table.if the is no errrors in form then insert data into database. 
//include '../dbconnection/connection.php';



//to update data into testdetails table.if the is no errrors in form then insert data into database. 
if (isset($_POST['submit'])) {
    //reading form data
    $sno = trim($_POST['sno']);
    $state = trim(addslashes($_POST['state']));
   $user=trim($_POST['user']);
   $id1=trim($_POST['id1']);
   $city=trim(test_input($_POST['city']));
   $ftype=trim(test_input($_POST['ftype']));
   $scode=trim(test_input(addslashes($_POST['scode'])));
   $sname=trim(test_input(addslashes($_POST['sname'])));
   $cname=trim(test_input(addslashes($_POST['cname'])));

 
    $sql="update dpr set sno='$sno',state='$state',city='$city',format_type='$ftype',store_code='$scode',store_name='$sname',company_name='$cname',user= '$user' where id='$id1'";
	$res = mysqli_query($link, $sql) or die("could not connected" . mysqli_error($link));

    if ($res) {

//if it is successfully update then display alert box in form
       print "<script>";
        print "alert('Successfully Uploaded ');";
        print "self.location='jiouploaddpr.php';";
        print "</script>";
    }
   
            
   

}else{
	$id=$_GET['id'];
	$k=mysqli_query($link,"select * from dpr where id='$id'");
	$k1=mysqli_fetch_array($k);
	
	
}
	



//form input validations 
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

