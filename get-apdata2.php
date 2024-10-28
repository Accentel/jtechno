<?php
include('dbconnection/connection1.php');
?>

<?php
$q=$_GET["q"];

 $sql="SELECT *  FROM dpr WHERE store_name = '$q'";

$result = mysqli_query($link,$sql);


while($row = mysqli_fetch_array($result))
  {
 // echo ":" . $row['SUPPL_NAME'];
  //echo ":" . $row['state'];
  
   //echo ":" . $row['city'];
   echo ":" . $row['store_code'];
   echo ":" . $row['state'];
      echo ":" . $row['state_code'];
	  
	    echo ":" . $row['address'];
   echo ":" . $row['gst_in'];
   echo ":" . $row['seeking_opt'];
   echo ":" . $row['company_name'];
    echo ":" . $row['superwisor'];
	 echo ":" . $row['coordinator'];
  
  echo ":" .trim($row['afm']);
  //$d1= date("Y-m-d", strtotime($d));
	  //echo ":" . $d1;
  //echo "</tr>";
  }

?>     