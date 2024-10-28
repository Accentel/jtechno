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
    $id=trim($_POST['id']);
    $no = trim($_POST['no']);
    $tcname = trim($_POST['tcname']);
    $tname = trim($_POST['tname']);
	$tprice = trim(addslashes($_POST['tprice']));

   $user=trim($_POST['user']);
   $id=trim($_POST['id']);


 //$res = mysqli_query($link, "insert into acyear(year,user) values('$acyear','$user')") or die("could not connected" . mysqli_error());
 //if the form variables are not empty then update data into database
   
       $sql = "update tool set tcname='$tcname',tname='$tname',tprice='$tprice' where id='$id'";
    $res = mysqli_query($link, $sql) or die("could not connected" . mysqli_error($link));

    if ($res) {

//if it is successfully update then display alert box in form
       print "<script>";
        print "alert('Successfully Uploaded ');";
        print "self.location='addtool.php';";
        print "</script>";
    }
    
    /*
		if(isset($_POST['submit'])){
		$no = trim($_POST['no']);
    $tname = trim($_POST['tname']);
	$tprice = trim(addslashes($_POST['tprice']));
	
	$user=trim($_POST['user']);
   $id=trim($_POST['id1']);

		
		$q=mysqli_query($link,"update tool set tname='$tname',tprice='$tprice' where id='$id'")  or die(mysqli_error($link));
		if($q){
		echo '<script type="text/javascript">
          window.location.href="addtool.php";
      </script>';
		}*/
		
   
            
   

}else{
	
	$id=$_GET['id'];
	
	$sql = "select * from ac_det where id='$id'";
    $res = mysqli_query($link, $sql) or die("could not connected" . mysqli_error($link));
$t=mysqli_fetch_array($res);
	$acyear=$t['name'];
	$id1=$t['id'];
	$ac_no=$t['ac_no'];

	$ifsc=$t['ifsc'];
	
}


//form input validations 
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
	
    $data = htmlspecialchars($data);
    return $data;
}

