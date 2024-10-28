<?php 
ob_start();?>
<!DOCTYPE HTML>
<html>
  
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 


<title>JYOTHI BILLING</title>
 <script type="text/javascript">
            function printt()
            {
                document.getElementById("prt").style.display="none";
                document.getElementById("cls").style.display="none";
            window.print();
            }
            function closs()
            {
                window.close();
            }
        </script>
<link rel="stylesheet" href="http://mission2cr.org/admin/qot.css1">		
</head>
<body>
    <div class="page">
<?php
ob_start();
include('dbconnection/connection.php');
 $id=$_GET['id'];
$sq=mysqli_query($link,"select * from add_qot2 where id='$id'");
$r=mysqli_fetch_array($sq);
 $store_code=$r['store_code'];
$quet_num=$r['quet_num'];


/*header('Content-type: application/vnd.ms-excel');


header("Content-Disposition: attachment; filename=TS Summary sheet Miscellenious ".$quet_num." ".date('d-m-Y').".xls");
header('Cache-Control: max-age=0');
*/
  ?>

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
	
	
	
	
	
	
	
	
	
	 <table border='0' style="width:100%"  cellpadding="0" cellspacing='0'>
        
          <!--   <tr><td colspan="2">
         <img src="http://softdemo.in/jyothi/images/exel_logo.jpg" style="width:100%;height:120px;"/>
          
      </td></tr>
      <tr><td colspan="2"><hr /></td></tr>-->
        <tr >
		<td  style="width:15%"><b>Annexure - 16</b></td>
		<td style="width:85%; " align="left" ><b style="margin-left:100px;">(Tentative format - Corrected will be given before commencement of work)</b></td></tr>
		
		<tr >
		<td  style="width:15%"><b></b></td>
		<td style="width:85%" align="left"><b style="margin-left:250px;"><u>Summary sheet for Miscellenious Repair Work</u></b></td></tr>
		<tr><td><br /></td></tr></table>
		    <table border='0' style="width:100%"  cellpadding="0" cellspacing='0'>
		<tr >
		<td  style="width:15%"><b>Vendor Name :</b></td>
		<td style="width:85%" align="left"><b style=" border-bottom: 1px solid;
    width: 80%;
    display: block;">JYOTHI FACILITY MANAGEMENT PVT.LTD</b></td></tr>
		<tr >
		<td  style="width:15%"><b>Period :</b></td>
		<td style="width:85%" align="left"><b style=" border-bottom: 1px solid;
    width: 80%;
    display: block;"><?php
if(date('m') >= 03) {
   $d = date('Y-m-d', strtotime('+1 years'));
   echo   date('Y') .'-'.date('Y', strtotime($d));
} else {
  $d = date('Y-m-d', strtotime('-1 years'));
  echo   date('Y', strtotime($d)).'-'.date('Y');
}
?></b></td></tr>
<tr >
		<td  style="width:15%"><b>State :</b></td>
		<td style="width:85%" align="left"><b style=" border-bottom: 1px solid;
    width: 80%;
    display: block;">TELANGANA STATE</b></td></tr>

<tr >
		<td  style="width:15%"><b>Format :</b></td>
		<td style="width:85%" align="left"><b style=" border-bottom: 1px solid;
    width: 80%;
    display: block;"><?php echo $format_type;?></b></td></tr>


		</table>
		<?php
$id=$_GET['id'];
$sq=mysqli_query($link,"select * from add_qot2 where id='$id'");
$r=mysqli_fetch_array($sq);
$store_code=$r['store_code'];
include('dbconnection/connection.php');
$bid=$_GET['id'];
$loc=$_GET['loc'];
 $a="select * from dpr where store_code='$store_code'";
$ssq1=mysqli_query($link,$a);
$r1=mysqli_fetch_array($ssq1);
 $state_code=$r1['state_code'];
 $company_name1=$r1['company_name'];
 $addr1=$r1['ship_ddress'];
 $state1=$r1['state'];
 $gst_in1=$r1['gst_in'];
 $ship_name=$r1['ship_name'];
 $ship_state=$r1['ship_state'];
 $ship_gst=$r1['ship_gst'];
 $city=$r1['city'];

?>
<table border="1" style="width:100%">

    <tr style="background-color:#eeece1;">
<th style="width:2%;">SNo</th>
<th style="width:10%;">City / Town</th>
<th style="width:10%;">Store SAP code</th>
<th  style="width:10%;"  colspan="1">Fault No</th>
<th style="width:10%;" colspan="1">Date of fault</th>
<th style="width:20%;" colspan="1">Nature of job in brief</th>
<th style="width:8%;">Bill No.</th>


<th style="width:10%;" colspan="1">Bill Date</th>
<th style="width:5%;" colspan="1">Amount</th>

<th style="width:5%; border-right-color: #000 !important;">Service Fee</th>
<th style="width:5%;" colspan="1">GST Value</th>
<th style="width:5%;" colspan="1">Total Bill Amount (Rs)</th>


</tr>
<tr><td>1</td><td><?php echo $city;?></td><td><?php echo $store_code;?></td>
<td><?php echo $r['falt_no'];?></td><td><?php $d1=$r['falt_date']; echo date('d-m-Y', strtotime($d1));?></td>
<td><?php echo $r['falt_desc'];?></td><td><?php echo $r['quet_num'];?></td><td></td>
<td><?php echo $r['tot_base'];?></td><td><?php echo $r['tot_ser'];?></td>
<td><?php echo $r['tot_gst'];?> </td><td><?php echo $r['net'];?></td></tr>


    
    </table>
	
	
	
	 <table  style=" width:100%;" >
	<tr><td><br><br></td></tr>
	
	<tr><td colspan="1" style="width:15%">Vondor's representative</td>
	<td   style="width:10%" >
	
<span  style="border-bottom: 1px solid;    width: 100%;    display: block;"></span>
	Name & Sign<p>
	
	</td>
	<style>
	#picture {
    border: 1px solid #333333;
    border-radius: 100%;
	width:150px;
	text-align:center;
	
}

</style><td style="width:5%"></td>
	<td  id="picture" style="width:15%" ><span   ><p style="height:100px;"> RRL Seal</p></span></td> <td style="width:5%"></td>
	
		<td  style="width:20%">Checked by FM : </td>
	<td  style="width:20%"><span style=" border-bottom: 1px solid;
   
    display: block;"></span>
		
		Name & Sign of FM Representative</td>
	</tr>
	<tr><td><br /><br /><br /><br /></td></tr>
	
	<tr><td colspan="1"></td>
	<td >
		

	
	
	
	</td> <td style="width:5%"></td><td > &nbsp;</td><td style="width:5%"></td>
	
	<td  >Store Personnel :</td>
		<td ><span style=" border-bottom: 1px solid;
   
    display: block;" ></span>Name & Sign of Store Manager</td>
	</tr>

	
	
	
	
	
	
	
	</table>
</div>
</body>
</html>
	 <?php 
        $body = ob_get_clean();

        $body = iconv("UTF-8","UTF-8//IGNORE",$body);

        include("mpdf/mpdf.php");
        $mpdf=new \mPDF('c','A4','','' , 0, 0, 0, 0, 0, 0); 

        //write html to PDF
        $mpdf->WriteHTML($body);
 
        //output pdf
        $mpdf->Output("$quet_num.pdf",'D'); 
		 fclose($mpdf);

        //save to server
        //$mpdf->Output("mydata.pdf",'F');
//if($mpdf){
//header('Location: index.html');

		//print "self.location='index.html';";


//if($mpdf){
//header('Location: edit_profile.php');
print "<script>";
			//print "alert('Successfully Updated');";
			print "self.location='qot_list4.php';";
			print "</script>";
			
		//	}



    


//if their are errors display them
if(isset($error)){
    foreach($error as $error){
        echo "<p style='color:#ff0000'>$error</p>";
    }
}?>
                         
<script type="text/javascript">   
function Redirect() 
{  
window.location="expected.php"; 
} 
document.write("You will be redirected to a new page in 5 seconds"); 
setTimeout('Redirect()', 5000);   
</script>
	
	
	
    