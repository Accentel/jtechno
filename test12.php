
<?php include('dbconnection/connection.php');
$k=mysqli_query($link,"select id from klrequest_amnt where quet_num='$id'") or die(mysqli_error($link));
while($k1=mysqli_fetch_array($k)){
$klarray[]=$k1['id'];
}
?>
<input type="text" value="<?php echo $klarray[0]; ?>" />
<input type="text" value="<?php echo $klarray[1]; ?>" />
<input type="text" value="<?php echo $klarray[2]; ?>" />
