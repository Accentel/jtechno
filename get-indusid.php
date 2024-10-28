<?php
include('dbconnection/connection.php');
?>

<?php
$q=$_GET["q"];

echo  $sql="SELECT *  FROM sites WHERE indusid = '$q'";

$result = mysqli_query($link,$sql);


while($row = mysqli_fetch_array($result))
  {
   echo ":" . $row['customer'];
   echo ":" . $row['cust_site_id'];
   echo ":" . $row['sitename'];
   echo ":" . $row['district'];
   echo ":" . $row['towertype'];
   echo ":" . $row['srtype'];
	
  }

?>     