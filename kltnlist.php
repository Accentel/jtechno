<?php
include('dbconnection/connection2.php');
?>
<table>
    <tr>
    <td>SNo</td>
<td>Name</td>
<td>Mobile No</td>
<td>Email</td>
<td>Category</td>
<td>State</td>
<td>Password</td>
<td>Date</td>
<td>Time</td>
<td>Logged IN</td>
<td>Designation</td>
<td>Location</td>
<td>Bank Name</td>
<td>PF No Name</td>
<td>PF UAN</td>
<td>Esi Number</td>
<td>Ac NO</td>
<td>Absents</td>
<td>Basic</td>
<td>Others</td>
<td>Take Home</td>
<td>Daf</td>
<td>Level1</td>
<td>Level2</td>
<td>Level3</td>
<td>Level4</td>
<td>Level5</td>
<td>Level6</td>
<td>Level7</td>
</tr>
<?php
$datatable="register";
$y="SELECT * FROM ".$datatable."    ORDER BY id desc";  
$result			=	mysqli_query($link1,$y) or die(mysqli_error($link1));
$i=1;
while($row	=	mysqli_fetch_assoc($result)){
?>
<tr>
<td><?php echo $i?> </td>
	<td><?php echo $row['name']?> </td>
	<td><?php echo $row['phoneno']?> </td>
	<td><?php echo $row['email']?> </td>
	<td><?php echo $row['category']?> </td>
	<td><?php echo $row['state']?> </td>
	<td><?php echo $row['password']?> </td>
	<td><?php echo date('d-m-Y',strtotime($row['date'])) ?> </td>
	<td><?php echo $row['time']?> </td>
	<td><?php echo $row['loggedin']?> </td>
	<td><?php echo $row['designation']?> </td>
	<td><?php echo $row['location']?> </td>
	<td><?php echo $row['bank_name']?> </td>
	<td><?php echo $row['pfnumber']?> </td>
	
	<td><?php echo $row['pfuan']?> </td>
	<td><?php echo $row['esinumber']?> </td>
	<td><?php echo $row['acno']?> </td>
	<td><?php echo $row['absents']?> </td>
	<td><?php echo $row['basic']?> </td>
    <td><?php echo $row['others']?> </td>
	<td><?php echo $row['takehome']?> </td>
	<td><?php echo $row['daf']?> </td>
	<td><?php echo $row['level1']?> </td>
	<td><?php echo $row['level2']?> </td>
	<td><?php echo $row['level3']?> </td>
	<td><?php echo $row['level4']?> </td>
	<td><?php echo $row['level5']?> </td>
	<td><?php echo $row['level6']?> </td>
	<td><?php echo $row['level7']?> </td>
	</tr>
<?php $i++; } ?>
</table>