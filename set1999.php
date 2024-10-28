<?php
//include_once("../db/connection.php");
include_once("dbconnection/connection.php");
//$crud = new Crud();

$q = strtolower($_GET["term"]);
if (!$q) return;
echo $rs="SELECT   mdescription  FROM   ritems WHERE mdescription LIKE '%$q%'"; 
 //$rsd=$crud->getData($rs);
$rsd = mysqli_query($link,$rs) or die(mysqli_error($link)) ;
//foreach($rsd  as $key=>$r){
	while($r=mysqli_fetch_array($rsd)){
	//$cname = $rs['registerno'];
	 $return_arr[] =  $r['mdescription'];
//	echo "$cname\n";
}
echo json_encode($return_arr);
//echo $return_arr;


?>