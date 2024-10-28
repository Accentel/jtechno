<?php
include('dbconnection/connection.php');
 //$id=$_GET['id'];

 


header('Content-type: application/vnd.ms-excel');


header("Content-Disposition: attachment; filename=".$quet_num." ".$city." ".QUOTATION.".xls");
header('Cache-Control: max-age=0');


  ?>

<!DOCTYPE HTML>
<html>
<head>
    <style>
            .page
            {
                font-size:      10px;
            }
        </style>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>JYOTHI BILLING</title>

</head>
<body>
    <div class="page" >





   <header>
   
   
   
   <!-- style="width:100%;height:120px;"-->
      <!-- <img src="jyothi.jpg" style="width:100%;height:120px;"/>-->
    </header>
    <table border='1'  cellpadding="0" cellspacing='0'>
        
        <tr class="noBorder" ><th   colspan="9" style="padding-top:20px;border-right:none !important;font-size:18px;">JYOTHI FACILITY MANAGEMENT PVT.LTD</th></tr>
 <tr><td colspan="9">      
<hr></td></tr>
        <tr style="background-color:#eeece1; "><td colspan="9" style="text-align:center;font-size:18px;border:0px; background-color:#eeece1; "><b>AP QUOTATIONS LIST</b></td></tr>
        <tr><td colspan="9"><fieldset style="    border-right: 1px groove;    border-left: 0px;    border-top: 0px;
    border-bottom: 0px;">
  <?php include('dbconnection/connection.php');

?>    


    <tr style="background-color:#eeece1;">
    <th >SNo</th>
                                                     <th>Description</th>
                                                        

</tr>



<?php
include_once('dbconnection/connection.php');
$bid=$r['id'];

	 $aa="select * from ritems order by id asc ";
 
$t=mysqli_query($link,$aa) or die(mysqli_error($link));
$i=1;
$gst_amnt1=0;
$tx=0;
while($rs1=mysqli_fetch_array($t)){
	
	?>
	<tr>
	<th ><?php echo $rs1['id']; ?></th>
	 <td class="hidden-480"><?php echo $rs1['mdescription']; ?></td>
                                                        
	</tr>
	
<?php $i++;}?>

    </tbody>
    </table>
    
<footer>
 <!--<div class="footer">Page: <span class="pagenum"></span></div>-->
 <!--<span class="pagenum"></span>-->
    
  <!-- <div>Regd.Office : Farha Villa, D.No.8-1-22/1/J/1, 7 Tombs Road, Tolichowki, Hyderabad - 500 008. T.S.</div>             
    <div>Email : ospsinfo@ospsindia.com, ospshyd@yahoo.com, Website:www.ospsindia.com</div>
<div>CIN:U64203TG2004PTC042772</div>-->


    </footer>
</div>
</body>
</html>