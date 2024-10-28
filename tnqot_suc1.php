<?php //include('config.php');
include('dbconnection/connection.php');
if(isset($_POST['update'])){
	  $id=$_POST['ids'];
	    $qt_no=$_POST['qt_no']; 
    $inv_date=$_POST['inv_date'];
	$store_code=$_POST['store_code'];
	
	$ses=$_POST['ses'];
	$tot=$_POST['tot'];
	$tot_serv=$_POST['tot_serv'];
	$tot_gst=$_POST['tot_gst'];
	$net=round($_POST['net']);
	$date=date('Y-m-d');
	 $ids=$_POST['ids'];
	   
	$falt_no=$_POST['falt_no'];
	$falt_date=$_POST['falt_date'];
$falt_desc=$_POST['falt_desc'];
//$ro_no=$_POST['ro_no'];
//$ro_date=$_POST['ro_date'];
//$po_no=$_POST['po_no'];
//$po_date=$_POST['po_date'];
//$po_type=$_POST['po_type'];
$type_of_work=$_POST['type_of_work'];
$sub_type=$_POST['sub_type'];
$ses=$_POST['ses'];

//$adv_amnt=$_POST['adv_amnt'];
//$adv_amnt1=$_POST['adv_amnt1'];
//$adv_amnt2=$_POST['adv_amnt2'];
//$adv_date=$_POST['adv_date'];
//$adv_date1=$_POST['adv_date1'];
//$adv_date2=$_POST['adv_date2'];
//$ac_num=$_POST['ac_num'];
//$ac_name=$_POST['ac_name'];
//$ifsc=$_POST['ifsc'];
$img1=$_POST['img1'];
$img2=$_POST['img2'];
$img3=$_POST['img3'];
$img4=$_POST['img4'];
$img5=$_POST['img5'];
$img6=$_POST['img6'];

//$ac_det1=$_POST['ac_det1'];
//$ac_det2=$_POST['ac_det2'];
//$ac_det3=$_POST['ac_det3'];
//$bal=$_POST['bal'];
//$gst_type=$_POST['gst_type'];
										
										
	$iname = $_FILES['image']['name'];
			 if($iname!= ""){
	$code = md5(rand());
	 $iname =$code. $_FILES['image']['name'];
	$tmp = $_FILES['image']['tmp_name'];
	 $dir = "upload";
		       $destination =  $dir . '/' . $iname;
		         move_uploaded_file($tmp, $destination);
	 $iname1 =$code. $_FILES['image']['name'];
	$iname1 = ($iname1);
	}else{
	 $iname1 = ($img1);
	}									
			
 $iname2 = $_FILES['imagea']['name'];
			 if($iname2!= ""){
	$code1 = md5(rand());
	 $iname2 =$code1. $_FILES['imagea']['name'];
	$tmp = $_FILES['imagea']['tmp_name'];
	 $dir = "upload";
		       $destination =  $dir . '/' . $iname2;
		         move_uploaded_file($tmp, $destination);
	 $iname3 =$code1. $_FILES['imagea']['name'];
	$iname3 = ($iname3);
	}else{
	 $iname3 = ($img2);
	}			


	
	 $iname4 = $_FILES['imageb']['name'];
			 if($iname4!= ""){
	$code2 = md5(rand());
	 $iname4 =$code2. $_FILES['imageb']['name'];
	$tmp = $_FILES['imageb']['tmp_name'];
	 $dir2 = "upload";
		       $destination =  $dir2 . '/' . $iname4;
		         move_uploaded_file($tmp, $destination);
	 $iname5 =$code2. $_FILES['imageb']['name'];
	$iname5 = ($iname5);
	}else{
	 $iname5 = ($img3);
	}





$iname10 = $_FILES['image4']['name'];
			 if($iname10!= ""){
	$code = md5(rand());
	 $iname10 =$code. $_FILES['image4']['name'];
	$tmp = $_FILES['image4']['tmp_name'];
	 $dir = "upload";
		       $destination =  $dir . '/' . $iname10;
		         move_uploaded_file($tmp, $destination);
	 $iname20 =$code. $_FILES['image4']['name'];
	$iname20 = ($iname20);
	}else{
	 $iname20 = ($img4);
	}									
			
 $iname11 = $_FILES['image5']['name'];
			 if($iname11!= ""){
	$code1 = md5(rand());
	 $iname11 =$code1. $_FILES['image5']['name'];
	$tmp = $_FILES['image5']['tmp_name'];
	 $dir = "upload";
		       $destination =  $dir . '/' . $iname11;
		         move_uploaded_file($tmp, $destination);
	 $iname21 =$code1. $_FILES['image5']['name'];
	$iname21 = ($iname21);
	}else{
	 $iname21 = ($img5);
	}			


	
	 $iname12 = $_FILES['image6']['name'];
			 if($iname12!= ""){
	$code2 = md5(rand());
	 $iname12 =$code2. $_FILES['image6']['name'];
	$tmp = $_FILES['image6']['tmp_name'];
	 $dir2 = "upload";
		       $destination =  $dir2 . '/' . $iname12;
		         move_uploaded_file($tmp, $destination);
	 $iname22 =$code2. $_FILES['image6']['name'];
	$iname22 = ($iname22);
	}else{
	 $iname22 = ($img6);
	}


		    $v="update add_tnqot set  img1='$iname1',img2='$iname3',img3='$iname5',img4='$iname20',img5='$iname21',img6='$iname22'	  where id='$id' ";
	$sq=mysqli_query($link,$v) or die(mysqli_error($link));
	if($sq){
	print "<script>";
	print "alert('Sucessfully Updated');";
	print "self.location='tnqot_list.php';";
	print "</script>";

}
}



?>
