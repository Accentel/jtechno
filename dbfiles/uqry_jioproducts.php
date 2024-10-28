<?php

/* =========================================================================================== */
#### insert,edit,update operations for add Employee Details and  display form validations ####
#### Author	: 	K Srinivasa Rao						####

/* =========================================================================================== */
//to insert data into testdetails table.if the is no errrors in form then insert data into database. 
//include '../dbconnection/connection.php';



//to update data into testdetails table.if the is no errrors in form then insert data into database. 
if (isset($_POST['update'])) {
    //reading form data
    $hsn = trim($_POST['hsn']);
    $material = trim(addslashes($_POST['material']));
   $user=trim($_POST['user']);
   $id=trim($_POST['id']);
   $price_unit=trim(test_input($_POST['price_unit']));
   $gst=trim(test_input($_POST['gst']));
   $uom=trim(test_input(addslashes($_POST['uom'])));

 //$res = mysqli_query($link, "insert into acyear(year,user) values('$acyear','$user')") or die("could not connected" . mysqli_error());
 //if the form variables are not empty then update data into database
   
       $sql = "update jioproducts set hsn='$hsn',material='$material',gst='$gst',rate='$price_unit',uom='$uom',user='$user' where id='$id'";
    $res = mysqli_query($link, $sql) or die("could not connected" . mysqli_error($link));

    if ($res) {

//if it is successfully update then display alert box in form
       print "<script>";
        print "alert('Successfully Uploaded ');";
        print "self.location='jiouploadproducts.php';";
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

