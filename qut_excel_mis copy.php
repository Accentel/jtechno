<?php
include('dbconnection/connection.php');
 $id=$_GET['id'];
$sq=mysqli_query($link,"select * from add_qot where id='$id'");
$r=mysqli_fetch_array($sq);
 $store_code=$r['store_code'];
$quet_num=$r['quet_num'];


header('Content-type: application/vnd.ms-excel');


header("Content-Disposition: attachment; filename=AP Summary sheet Miscellenious ".$quet_num." ".date('d-m-Y').".xls");
header('Cache-Control: max-age=0');

  ?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>JYOTHI BILLING</title>

</head>
<body>
  
<?php //include('config.php');
include('dbconnection/connection.php');
$bid=$_GET['id'];
$loc=$_GET['loc'];
$q=mysqli_query($link,"select * from add_bill1 where id='$bid'") or die(mysqli_error($link));
$r=mysqli_fetch_array($q);
 $service_no=$r['service_no'];
$invdate1=$r['date'];

$invdate = date('d-M-y', strtotime( $invdate1 ));



	$mnth=date('M', strtotime( $date ));
	$y=date('y', strtotime( $date ));
	 $a="select * from dpr where store_code='$store_code'";
$ssq1=mysqli_query($link,$a);
$r1=mysqli_fetch_array($ssq1);
 $format_type=$r1['format_type'];

?>



<style>
.underline{
    border-bottom: 1px solid;
    width: 100%;
    display: block;
}
</style>

   <header>
   
   
   
   <!-- style="width:100%;height:120px;"-->
      <!-- <img src="jyothi.jpg" style="width:100%;height:120px;"/>-->
    </header>
    <table border='0'  cellpadding="0" cellspacing='0'>
        
       
        <tr >
		<td colspan="5"><b>Annexure - 16</b></td>
		<td colspan="9" align="center"><b>(Tentative format - Corrected will be given before commencement of work)</b></td></tr>
		<tr><td><br /></td></tr>
		<tr >
		<td colspan="6"></td>
		<td colspan="8" align="center" ><b><u>Summary sheet for Miscellenious Repair Work</u></b></td></tr>
		<tr><td><br /></td></tr>
		
		
		
		
		
		
		<tr><td colspan="3"><b>Vendor Name :</td>
		
		<td colspan="3" style=" border-bottom: 1px solid;
    width: 50%;
    display: block;"><b  >JYOTHI FACILITY MANAGEMENT PVT.LTD</b></td>
		<td colspan="8"></td>
		</tr>
		<tr><td colspan="3"><b>Period :</td>
		<td colspan="3" style=" border-bottom: 1px solid;
    width: 50%;
    display: block;"><b class="underline"><?php
if(date('m') >= 03) {
   $d = date('Y-m-d', strtotime('+1 years'));
   echo   date('Y') .'-'.date('Y', strtotime($d));
} else {
  $d = date('Y-m-d', strtotime('-1 years'));
  echo   date('Y', strtotime($d)).'-'.date('Y');
}
?></b></td>
<td colspan="8"></td>
</tr>
		
	<tr><td colspan="3"><b>State :</td> 
	<td colspan="3" style=" border-bottom: 1px solid;
    width: 50%;
    display: block;"><b class="underline">ANDHRA PRADESH STATE</b></td>
		<td colspan="8"></td>
		</tr>	
		<tr><td colspan="3"><b>Format :</td> 
		<td colspan="3"  style=" border-bottom: 1px solid;
    width: 50%;
    display: block;"><b class="underline"><?php echo $format_type;?></b></td>
		<td colspan="8"></td>
		</tr>	
		
		
        <tr><td colspan="14">
		<br>
  </td></tr>

</table>





<table border="1">

    <tr style="background-color:#eeece1;">
<th style="width:5px;">SNo</th>
<th style="width:120px;">City / Town</th>
<th style="width:75px;">Store SAP code</th>
<th  style="width:75px;"  colspan="1">Falt No</th>
<th style="width:60px;" colspan="1">Date of fault</th>
<th style="width:200px;" colspan="1">Nature of job in brief</th>
<th style="width:80px;">Bill No.</th>


<th style="width:120px;" colspan="1">Bill Date</th>
<th style="width:120px;" colspan="1">Amount</th>

<th style="width:120px; border-right-color: #000 !important;">Service Fee</th>
<th style="width:120px;" colspan="1">GST Value</th>
<th style="width:120px;" colspan="1">Total Bill Amount (Rs)</th>


</tr>
<tr><td>1</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
<tr><td>2</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
<tr><td>3</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
<tr><td>4</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
<tr><td>5</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
<tr><td>6</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
<tr><td>7</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
<tr><td>8</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
<tr><td>9</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
<tr><td>10</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>

    
    </table>
    <table  style=" width:100%;" >
	<tr><td><br><br></td></tr>
	
	<tr><td colspan="1" style="width:200px;">Vondor's representative</td>
	<td   style="width:200px;" >
	<span class="underline">&nbsp;<span>

	
	</td>
	<style>
	#picture {
    border: 1px solid #333333;
    border-radius: 100%;
	width:15%;
}</style>
	<td   style="width:200px;"></td> <td  style="width:200px;"> &nbsp;</td><td   style="width:200px;"> &nbsp;</td>
		<td  style="width:200px;">Checked by FM : </td>
		<td  style=" border-bottom: 1px solid;
    width: 200px;
    display: block;" >	<span class="underline">&nbsp;<span></td>
	</tr>
	
	
	<tr><td colspan="1"></td>
	<td >
	
	
	Name & Sign</td> <td  > &nbsp;</td>
	<td ><span >RBL Seal</span></td><td  > &nbsp;</td>
	<td  ></td>
		<td >Name & Sign of FM Representative</td>
	</tr>
	
	
	
	
	<tr><td colspan="1"></td>
	<td >
	
	
	</td> <td  > &nbsp;</td>
	<td ><span </span></td><td  > &nbsp;</td>
	<td  >Store Personnel :</td>
		<td   style=" border-bottom: 1px solid;
    width: 50%;
    display: block;"><span class="underline">&nbsp;<span></td>
	</tr>
	<tr><td colspan="1"></td>
	<td >
	
	
</td> <td  > &nbsp;</td>
	<td ></td><td  > &nbsp;</td>
	<td  ></td>
		<td >Name & Sign of Store Manager</td>
	</tr>
	</table>

</div>
</body>
</html>