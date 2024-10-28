<?php include('dbconnection/connection.php'); ?>
<html>
    
    <head></head>
    <body>
        
        <select name="qot" id="qot" style="width:400px;">
            <option value="">Select</option>
            <?php 
	$u=mysqli_query($link,"select * from ritems order by id asc") or die(mysqli_error($link));
	while($u1=mysqli_fetch_array($u)){
	?>
	<option value="<?php echo $u1['mdescription'];  ?>"><?php echo $u1['mdescription'];  ?></option>
	
	<?php }?>
        </select>
    </body>
</html>