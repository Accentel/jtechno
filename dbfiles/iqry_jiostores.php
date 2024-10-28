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
   //$id=trim($_POST['id']);
   $city=trim(test_input($_POST['city']));
   $ftype=trim(test_input($_POST['ftype']));
   $scode=trim(test_input(addslashes($_POST['scode'])));
   $sname=trim(test_input(addslashes($_POST['sname'])));
   $cname=trim(test_input(addslashes($_POST['cname'])));

 
    $sql="insert into dpr(sno,state,city,format_type,store_code,store_name,company_name,user)values('$sno','$state','$city','$ftype','$scode','$sname','$cname','$user')";
	$res = mysqli_query($link, $sql) or die("could not connected" . mysqli_error($link));

    if ($res) {

//if it is successfully update then display alert box in form
       print "<script>";
        print "alert('Successfully Uploaded ');";
        print "self.location='jiouploaddpr.php';";
        print "</script>";
    }
   
            
   

}
	



//form input validations 
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

