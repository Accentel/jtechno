<?php
require('fpdf/fpdf.php');
include('dbconnection/connection.php');
$bid=$_GET['id'];

$pdf=new FPDF( 'P', 'mm', 'A4' );

$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true, 15);

$pdf->AddPage();
$reportval=$_REQUEST['report'];

$text="Qutation download";
?>



<table border='1' style="width:90%" align="center"  cellpadding="0" cellspacing='0'>
        
      
        <tr><td colspan="8" style="text-align:center;font-size:18px;border:0px;"><b>QUOTATION</b><br /></td></td></tr>
        </table>
  <?php $id=$_GET['id'];
$sq=mysqli_query($link,"select * from add_qot where id='$id'");
$r=mysqli_fetch_array($sq);
$store_code=$r['store_code'];

$ssq1=mysqli_query($link,"select * from dpr where store_code='$store_code'");
$r1=mysqli_fetch_array($ssq1);

?>



<div style="border:0px solid #000;">
 <table >
		  
		  <tr>
            <td>
		<b>	Name of Vendor :<br/>
			Vendor Address  :<br/>
		
			Vendor State  :<br/>
			Vendor GSTIN :<br />
		Vendor State Code :<br />
			</td>
			<td>
			<b> JYOTHI INFRA SERVICE<br/>
			H.No.8-3-673, Flat No.302, Sai Datta Residency, Shardha Nagar , Yellareddy Guda, Hyderabad, TS-500073.<br/>
			<?php echo $r1['state'];?> STATE<br/>
			36APSPS9687Q1Z5<br/>
			<?php echo $r1['state_code'];?></b>
			</td>
			</tr>
		  
		
          </table>
			
</div>
</td></tr>
<tr><td colspan="14">



<table width="800"  style="border:1px solid #000;" align="left">
<tr><td ><b>Quotation Date:</b><?php $d=$r['inv_date']; echo date('d-m-Y', strtotime($d));?></td>

<td ><b>Quotation Number:</b><?php echo $r['quet_num'];?></tr>


<tr><td ><b>FM Fault No:</b><?php echo $r['falt_no'];?></td>
<td ><b>FM Fault date :</b><?php $d1=$r['falt_date']; echo date('d-m-Y', strtotime($d1));?></tr>

<br></table>
</td></tr>
<tr><td colspan="14">
<table width="800"  style="border:1px solid #000;" align="left">

<tr><td colspan="2"><b>Fault Description:</b>Door closer & Cylindrical locks required for the Mens & Womens wash rooms</td></tr>
</table>
</td></tr>

<tr><td colspan="14">

	  <table  >
<tr>
<td   >




<table  width="500" ><tr>
<td><b>Bill to Party</b><hr /></td></tr>



</table>
<div style="height:10px;" ></div>
<div style="border:1px solid #000;">
 <table >
		  
		  <tr>
            <td>
		<b>	Name:<br/>
			Address:<br/>
			<br/>
		
			State:<br/>
			GSTN<br/></b>
			</td>
			<td>
			<b>M/s RELIANCE CORPORATE IT PARK LTD.<br/>
			6- 3- 1090 / B,4,LAKE SHORE TOWERS,<br/>RAJBHAVAN ROAD,SOMAJIGUDA,<br/>
			HYDERABAD,500082.<br/>
			TELANGANA STATE<br/>
			36AABCD7169H1ZH</b>
			</td>
			</tr>
		  
		
          </table>
			
</div>
</td>
<td width="20"></td>

			
		<td >

<table  width="500" ><tr>
<td><b>Ship to Party</b><hr /></td></tr>



</table>
<div style="height:10px;" ></div>
<div style="border:1px solid #000;">
 <table >
		  
		  
		  <tr>
            <td>
		<b>	Name:<br/>
			Address:<br/>
			<br/>
		
			State:<br/>
			GSTN<br/></b>
			</td>
			<td>
			<b>M/S Reliance Digital.<br/>
			Suchithra Digital, <br/>
			Store Code-8661.<br/><br/>
			TELANGANA STATE<br/>
			36AABCD7169H1ZH</b>
			</td>
			</tr>
		  

          </table>
			
</div>
</td>	
			
			
			
			
			
			
			
			
			
			
			</tr>
			
		<!--	<tr><td><b>Service Period: <?php echo $mnth;?>'<?php echo $y;?></b></td></tr>-->
          </table>
		  </div>

</td>
</tr>




        
       

<table border='1' style="width:100%" align="center"  cellpadding="0" cellspacing='0'>   
        <tr>
<th style="width:5px;">SNo</th>
<th style="width:120px;">HSN/ SAC Codes</th>
<th style="width:75px;">Article/ Service Codes</th>
<th  style="width:200px;"  colspan="2">Description of Material/Service</th>
<th style="width:60px;" colspan="1">QTY</th>
<th style="width:60px;" colspan="1">UOM</th>
<th style="width:80px;">RATE</th>


<th style="width:120px;" colspan="1">Base Amount</th>
<th style="width:120px;" colspan="1">Service
Fee -6% (In Rs)</th>

<th style="width:120px; border-right-color: #000 !important;">GST Rate (18 %)</th>


</tr>



<?php
$bid=$r['id'];

	 $aa="select * from add_qot1 where  id1='$bid' ";
 
$t=mysqli_query($link,$aa) or die(mysqli_error($link));
$i=1;
$gst_amnt1=0;
$tx=0;
while($t1=mysqli_fetch_array($t)){
	
	?>
	<tr>
	<th style="width:5px;"><?php echo $i; ?></th>
	<th style="width:120px;">
	<?php 

	echo $t1['hsn'];
	?>
	</th>
	<th style="width:120px;">
	<?php 

	echo $t1['serv_code'];
	?>
	</th>
	<th colspan="2" style="width:200px;"><?php echo '<b>'.$t1['desc1'].'</b>'; ?></th>
		<th style="width:60px;" colspan="1"><?php echo $t1['qty']; ?></th>
		<th style="width:60px;" colspan="1"> <?php echo $t1['uom']; ?></th>
		<th style="width:80px;"><?php echo $t1['rate']; ?></th>
		
		<th style="width:120px;" colspan="1"><?php echo $bas=$t1['base_amt']; ?></th>
				<th style="width:120px;" colspan="1"><?php echo $ser=$t1['serv_amt']; ?></th>
	
	
	
	

	<th style="width:120px; border-right-color: #000 !important;">
	<?php echo $tax=number_format((float)$t1['gst_amnt'],1, '.', ''); ?></th>
	
	
	
	
	</tr>
	
	
	
	
<?php 

$gst_amnt=$t1['gst_amnt'];
$gst_amnt1=$gst_amnt+$gst_amnt1;


$tt_amt=$t1['total_price'];
$tt_amt1=$tt_amt+$tt_amt1;


$tx=$t1['tax_amnt'];
 $tx1=$tax+$tx1;
$total_price=$t1['total_price'];

 $gst_amnt2=$gst_amnt+$gst_amnt2;
$bas1=$bas+$bas1;
$ser1=$ser+$ser1;


$i++; }

 ?>
 
 <tr>
	<th  colspan="8"> Total Amount</th>
	
	
	
	<th style="width:120px;"><?php echo $bas1;?></th>
	

		<th style="width:120px;"><?php echo $ser1;?></th>
	
	<th style="width:120px;"><?php echo $tx1;?></th>
	</tr>



 <tr>
	<th  colspan="10"> SGST/UGST Amt (In Rs)</th>
	
	
	
	
	
	<th style="width:120px;"><?php echo $tx1/2;?></th>
	</tr>
<tr>
	<th  colspan="10"> CGST Amt (In Rs)</th>
	
	
	
	
	
	<th style="width:120px;"><?php echo $tx1/2;?></th>
	</tr>
 <tr>
	<th  colspan="10"> IGST Amt (In Rs)</th>
	
	
	
	
	
	<th style="width:120px;">0</th>
	</tr>
	<tr>
	<th  colspan="10"> Total GST  (In Rs)</th>
	
	
	
	
	
	<th style="width:120px;"><?php echo $tx1;?></th>
	</tr>
		<tr>
	<th  colspan="10"> Total Amount (In Rs)</th>
	
	
	
	
	
	<th style="width:120px;"><?php echo $tamt=$tx1+$ser1+$bas1;?></th>
	</tr>
	
 
 

 
 
 
 
 <tr>
	<th  colspan="11"> Total Invoice Amount in Words
	
	
	
	
	

		
		
		<?php
     $tmt=round($tamt);
      
     
     $number = round($tmt);
   $no = round($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'one', '2' => 'two',
    '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
    '7' => 'seven', '8' => 'eight', '9' => 'nine',
    '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
    '13' => 'thirteen', '14' => 'fourteen',
    '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
    '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
    '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
    '60' => 'sixty', '70' => 'seventy',
    '80' => 'eighty', '90' => 'ninety');
   $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';
  echo  "- ".strtoupper($result) .  $points . " RUPEES ONLY";
 ?> 
 
		
		<?php //echo $taxx1+$tx1;?></th>
	
	
	</tr>

      </tbody>
    </table></td></tr></table>
	<?php 

$pdf->Output(); 	
 ?>	