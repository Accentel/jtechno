<?php
include_once("../db/Crud.php");
$crud = new Crud();

$q=$_GET["q"];
//$itype=$_GET['itype'];

	 $sql="SELECT  * FROM patientregister WHERE registerno = '$q'";
	//$result = mysql_query($sql);
	$rsd=$crud->getData($sql);
	foreach($rsd  as $key=>$r){
	//$cname = $rs['registerno'];
	
	 $patientname=  $r['patientname'];
	 $age=  $r['age'];
	 $gender=  $r['gender'];
	 $doctorname=  $r['doctorname'];
	 $phoneno=  $r['phoneno'];
	 $pat_type=  $r['pat_type'];
	  $date=$r['date'];
	 
//	echo "$cname\n";
}
	//$row = mysql_fetch_array($result);
	//$amount=$row['amount'];
	
	echo ":" . $patientname;
	echo ":" . $age;
	echo ":" . $gender;
	echo ":" . trim($date);
	//echo ":" . $doctorname;
	//echo ":" . $phoneno;
	//echo ":" . $pat_type;
	
	




	
	
	
	

?>	

