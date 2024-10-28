<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

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
<style type="text/css">
    table { page-break-inside:auto;page-break-inside:auto;border-color:#fff;font-family: "Times New Roman", Times, serif;font-size:12px;  }
    tr    { page-break-inside:avoid; page-break-after:auto }
    thead { display:table-header-group }
    tfoot { display:table-footer-group }
    thead,tfoot{border:none !important;border-color:#fff;}
    
    tr.noBorder th {
  border:none !important;
  border-color:#fff;
}
#tds{
    
border:0;
}
table {
border-left:none !important;
border-top: none !important;
border-bottom: none !important;
border-right:none !important;
}
 .pageNumbering
{
display:block;
font-weight: normal;
font-size: 8pt;
color: #666666;
font-style: normal;
font-family: Arial, Helvetica;
text-decoration: none;
text-align: right; 
}
.pagenum:before { content: counter(page); }
footer {
  font-size: 24px;
  color: #f00;
  width:100%;
   text-align: center;
}
header {
  font-size: 9px;
  color: #f00;
  text-align: center;
}

@page {
  size: A4;
  margin: 11mm 9mm 11mm 5mm;
  
  @bottom {
	content: "Page " counter(page) " of " counter(pages)
    }
}

@media print {
  footer {
    position: fixed;
    bottom: 0;
	width:100%;
  }
header {
    position: fixed;
    top: 0;
  }
  .content-block, p {
    page-break-inside: avoid;
  }

  html, body {
    width: 210mm;
    height: 297mm;
  }
}
.pagenum:before { content: counter(page); }
</style>
</head>
<body>
    <div class="page">
<?php //include('config.php');
include('dbconnection/connection.php');
$bid=$_GET['id'];
$loc=$_GET['loc'];
$q=mysqli_query($link,"select * from add_bill1 where id='$bid'") or die(mysqli_error($link));
$r=mysqli_fetch_array($q);
 $service_no=$r['service_no'];
$invdate1=$r['date'];

$invdate = date('d-M-y', strtotime( $invdate1 ));


 $store_name=$r['store_name']; 
    $state=$r['state'];
	$state_code=$r['state_code'];
	$addr=$r['addr'];
	$ses=$r['ses'];
	$gst_in=$r['gst_in'];
	$tot=$r['tot'];
	$tot_gst=$r['tot_gst'];
	$net=$r['net'];
	$date=$r['date'];
	$store_code=$r['store_code'];
	$inv_no=$r['inv_no'];
	$mnth=date('M', strtotime( $date ));
	$y=date('y', strtotime( $date ));

?>





   <header>
   
   
   
   <!-- style="width:100%;height:120px;"-->
      <!-- <img src="jyothi.jpg" style="width:100%;height:120px;"/>-->
    </header>
    <table border='1'  cellpadding="0" cellspacing='0'>
        <thead>
            <tr class="noBorder" ><th   colspan="14"style="padding-top:120px;border-right:none !important;font-size:18px;"></th></tr>
        </thead>
        <tfoot>
            <tr class="noBorder " style="border-color:#fff;border-left-color:#fff;"><th class="noBorder " colspan="14" style="padding-top:80px;"></th></tr>
        </tfoot>
        <tbody>
        </tbody>
        <tr><td colspan="8" style="text-align:center;font-size:18px;border:0px;"><b>Tax Invoice</b></td></td></tr>
        <tr><td colspan="14"><fieldset style="    border-right: 1px groove;
    border-left: 0px;
    border-top: 0px;
    border-bottom: 0px;">
        <table  >
<tr>
<td >
<div style="border:1px solid #000;">

<table width="500" >
<tr>
<td><b>Invoice No:<br/>Invoice Date:</b></td>
<td><b><?php echo $inv_no; ?><br/><?php echo $invdate; ?></b></td>

</tr>

</table>

</div>
<table  width="500" >
<td><b>SUPPLIER ADDRESS</b></td>



</table>
<div style="height:10px;" ></div>
<div style="border:1px solid #000;">
 <table >
		  
		  <tr>
            <td>
		<b>	Name:<br/>
			Address:<br/>
			<br/>
			PAN No.:<br/>
			GSTIN/UIN:<br />
			State:<br/>
			State Code<br/></b>
			</td>
			<td>
			<b>M/s JYTOHI INFRA SERVICE<br/>
			D.No.HIG-237, Flat No.101, 6th Phase,<br/>
			KPHP Colony,Kukatpally,Hyderabad-500085<br/>
			APSPS9687Q<br/>
			36APSPS9687Q1Z5<br/>
			TELANGANA STATE<br />
			36 <br/></b>
			</td>
			</tr>
		  
		
          </table>
			
</div>
</td>
<td width="20"></td>

			
		<td >
<div style="border:1px solid #000;">

<table width="500" >
<tr>
<td><b>State:<br/>State Code:</b></td>
<td><b><?php echo $state; ?><br/><?php echo $state_code; ?></b></td>

</tr>

</table>

</div>
<table  width="500" >
<td><b>SHIPPING / BILLING ADDRESS</b></td>



</table>
<div style="height:10px;" ></div>
<div style="border:1px solid #000;">
 <table >
		  
		  <tr>
            <td>
		<b>	Name:<br/>
			Address:<br/>
			<br/>
			<br/>
			GSTIN/UIN:<br />
			State:<br/>
			State Code<br/></b>
			</td>
			<td>
			<b><?php echo $r['store_name'];?><br/>
			<?php echo $r['addr'];?><br/>
			<br/>
			<br/>
			<?php echo $r['gst_in'];?><br/>
			<?php echo $r['state'];?><br />
			<?php echo $r['state_code'];?> <br/></b>
			</td>
			</tr>
		  
		  

          </table>
			
</div>
</td>	
			
			
			
			
			
			
			
			
			
			
			</tr>
			
			<tr><td><b>Service Period: <?php echo $mnth;?>'<?php echo $y;?></b></td></tr>
          </table>
		  </div>

</td>
</tr>
<tr>
<td>

</td>



</tr>




        
        </td></tr>
        
        <tr>
<th style="width:5px;">SNo</th>
<!--<th style="width:75px;">Item Code</th>-->
<th  style="width:200px;"  colspan="1">Description of Product / Service</th>
<th style="width:120px;">HSN/ SAC Codes</th>
<th style="width:120px;" colspan="2">Tax Rate</th>
<th style="width:120px;" colspan="2">UOM</th>
<th style="width:120px;" colspan="2">QTY</th>
<th style="width:120px;">RATE</th>
<th style="width:120px; border-right-color: #000 !important;">Taxable Base Value (Rs.)</th>


</tr>



<?php
$bid=$r['id'];

	 $aa="select * from add_bill where  id1='$bid' ";
 
$t=mysqli_query($link,$aa) or die(mysqli_error($link));
$i=1;
$gst_amnt1=0;
$tx=0;
while($t1=mysqli_fetch_array($t)){
	
	?>
	<tr>
	<th style="width:5px;"><?php echo $i; ?></th>
	
	<th colspan="1" style="width:200px;"><?php echo '<b>'.$t1['product_name'].'</b>'; ?></th>
	<th style="width:120px;">
	<?php 

	echo $t1['hsnno'];
	?>
	</th>	
		<th style="width:120px;" colspan="2"><?php echo $t1['gst']; ?></th>
		<th style="width:120px;" colspan="2"> <?php echo $t1['uom']; ?></th>
		<th style="width:120px;" colspan="2"><?php echo $t1['qty']; ?></th>
	<th style="width:120px;"><?php echo $t1['price']; ?></th>
	
	

	<th style="width:120px; border-right-color: #000 !important;">
	<?php echo $tax=number_format((float)$t1['total_price'],1, '.', ''); ?></th>
	
	
	
	
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



$i++; }

 ?>
 
 <tr>
	<th  colspan="10">Sub Total</th>
	
	
	
	
	

		<th style="width:120px;"><?php echo $tx1;?></th>
	
	
	</tr>
<tr><td><br /></td></tr>
 
  <tr>
<th style="width:5px;">SNo</th>
<!--<th style="width:75px;">Item Code</th>-->
<th  style="width:105px; !important;"  colspan="1">HSN/SAC  Code</th>
<th style="width:80px;">Amount</th>
<th style="width:80px;" colspan="2">SGST</th>
<th style="width:80px;" colspan="2">CGST</th>
<th style="width:80px;" colspan="2">IGST</th>

<th style="width:80px; border-right-color: #000 !important;" colspan="2">Tax Amount</th>


</tr>
  <tr>
<th style="width:5px;"></th>
<!--<th style="width:75px;">Item Code</th>-->
<th    colspan="1"></th>
<th ></th>
<th >Rate(%)</th>
<th >Amount</th>
<th >Rate(%)</th>
<th >Amount</th>
<th >Rate(%)</th>
<th >Amount</th>

<th style=" border-right-color: #000 !important;" colspan="2"></th>


</tr>



<?php
$bid=$r['id'];

	 $aa="select * from add_bill where  id1='$bid' ";
 
$t=mysqli_query($link,$aa) or die(mysqli_error($link));
$i=1;
$gst_amnt1=0;
$tx=0;
while($t1=mysqli_fetch_array($t)){
	
	?>
	<tr>
	<th style="width:5px;"><?php echo $i; ?></th>
	
	<th colspan="1" ><?php 

	echo $t1['hsnno'];
	?></th>
	<th style="width:120px;">
	<?php echo $tax=number_format((float)$t1['total_price'],1, '.', ''); ?>
	</th>	
		<th ><?php echo $gst=$t1['gst']/2;
$row_amnt=$t1['total_price'];
		?></th>
		<th ><?php echo $tzx1=$row_amnt*$gst/100; ?></th>
		<th ><?php echo $gst=$t1['gst']/2;

		?></th>
		<th ><?php echo $tzx2=$row_amnt*$gst/100; ?></th>
	<th >0</th>
	<th >0</th>
	

	<th style="width:120px; border-right-color: #000 !important;" colspan="2">
	<?php echo $taxx=$tzx1+$tzx2; ?></th>
	
	
	
	
	</tr>
<?php
$taxx1=$taxx+$taxx1;
 }?> 
 
 
 
 <tr>
	<th  colspan="10"> Total Tax Value</th>
	
	
	
	
	

		<th style="width:120px;"><?php echo $taxx1;?></th>
	
	
	</tr>
<tr><td><br /></td></tr>
<tr>
	<th  colspan="10"> Total Invoice Value</th>
	
	
	
	
	

		<th style="width:120px;"><?php echo $tamt=$taxx1+$tx1;?></th>
	
	
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
 
 
        <!-- 500 more rows -->
     <tr>
			<th colspan="5" style="border-bottom-color: #000 !important;">
			
			
			
					Certified that the particulars given above are true and correct.
			
			</th>
        <th colspan="6" style="font-size:14px;  border-right-color: #000 !important; border-bottom-color: #000 !important;">For Jyothi Infra Service,
        <br/><br/>
	   <br/>  <br/>  <br/>
        Authorized Signatory
        
        </th>
 </tr>       
       
       
    </tbody>
    </table>
    <table align="center">
     <tr><td height="20px"></td></tr><tr>
    <td></td><td align="center"><input type="button" value="Print" id="prt" class="butt" onclick="printt()"/></td><td><input type="button" value="Close" id="cls" class="butt"  onclick="window.close();"/></td>
</tr></table>
<footer>
 <!--<div class="footer">Page: <span class="pagenum"></span></div>-->
 <!--<span class="pagenum"></span>-->
    <hr/>
  <!-- <div>Regd.Office : Farha Villa, D.No.8-1-22/1/J/1, 7 Tombs Road, Tolichowki, Hyderabad - 500 008. T.S.</div>             
    <div>Email : ospsinfo@ospsindia.com, ospshyd@yahoo.com, Website:www.ospsindia.com</div>
<div>CIN:U64203TG2004PTC042772</div>-->


    </footer>
</div>
</body>
</html>