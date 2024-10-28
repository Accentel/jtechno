<?php
include('dbconnection/connection.php');
if($_GET['data']=='service_no'){
   $value=unique_name($_GET['service_no']);
}



function unique_name($service_no=''){
	    $query="select count(quet_num) from add_qot where `quet_num`='$service_no'";
	   $response=mysqli_query($link,$query);
	   $result=mysqli_fetch_array($response);
	  //$result=1;
	   if($result[0]>0){
		  echo 'false';
	   }
	   else{
		   
		  echo 'true';
	   }

}


	







?>