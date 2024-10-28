<!DOCTYPE html>
<html>
<head>
<title>Print Invoice</title>
<style>
*
{
margin:0;
padding:0;
font-family:Arial;
font-size:10pt;
color:#000;
}
body
{
width:100%;
font-family:Arial;
font-size:10pt;
margin:0;
padding:0;
}

p
{
margin:0;
padding:0;
}

#wrapper
{
width:180mm;
margin:0 15mm;
}

.page
{
height:297mm;
width:210mm;
page-break-after:always;
}

table
{
border-left: 1px solid #ccc;
border-top: 1px solid #ccc;

border-spacing:0;
border-collapse: collapse;

}

table td
{
border-right: 1px solid #ccc;
border-bottom: 1px solid #ccc;
padding: 2mm;
}

table.heading
{
height:50mm;
}

h1.heading
{
font-size:14pt;
color:#000;
font-weight:normal;
}

h2.heading
{
font-size:9pt;
color:#000;
font-weight:normal;
}

hr
{
color:#ccc;
background:#ccc;
}

#invoice_body
{
height: 149mm;
}

#invoice_body , #invoice_total
{
width:100%;
}
#invoice_body table , #invoice_total table
{
width:100%;
border-left: 1px solid #ccc;
border-top: 1px solid #ccc;

border-spacing:0;
border-collapse: collapse;

margin-top:5mm;
}

#invoice_body table td , #invoice_total table td
{
text-align:center;
font-size:9pt;
border-right: 1px solid #ccc;
border-bottom: 1px solid #ccc;
padding:2mm 0;
}

#invoice_body table td.mono , #invoice_total table td.mono
{
font-family:monospace;
text-align:right;
padding-right:3mm;
font-size:10pt;
}

#footer
{
width:180mm;
margin:0 15mm;
padding-bottom:3mm;
}
#footer table
{
width:100%;
border-left: 1px solid #ccc;
border-top: 1px solid #ccc;

background:#eee;

border-spacing:0;
border-collapse: collapse;
}
#footer table td
{
width:25%;
text-align:center;
font-size:9pt;
border-right: 1px solid #ccc;
border-bottom: 1px solid #ccc;
}
</style>
</head>
<body>
<div id="wrapper">
<?php 

include('dbconnection/connection.php');
$id=$_GET['id'];
$sq=mysqli_query($link,"select * from add_qot where id='$id'");
$r=mysqli_fetch_array($sq);
$store_code=$r['store_code'];

$ssq1=mysqli_query($link,"select * from dpr where store_code='$store_code'");
$r1=mysqli_fetch_array($ssq1);
?> 
<p style="text-align:center; font-weight:bold; padding-top:5mm;">QUOTATION</p>
<br />
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

<div id="content">

<div id="invoice_body">
<table>
<tr style="background:#eee;">
<td style="width:8%;"><b>Sl. No.</b></td>
<td><b>Product</b></td>
<td style="width:15%;"><b>Quantity</b></td>
<td style="width:15%;"><b>Rate</b></td>
<td style="width:15%;"><b>Total</b></td>
</tr>
</table>

<table>
<tr>
<td style="width:8%;">1</td>
<td style="text-align:left; padding-left:10px;">Software Development<br />Description : Upgradation of telecrm</td>
<td class="mono" style="width:15%;">1</td><td style="width:15%;" class="mono">157.00</td>
<td style="width:15%;" class="mono">157.00</td>
</tr>
<tr>
<td colspan="3"></td>
<td></td>
<td></td>
</tr>

<tr>
<td colspan="3"></td>
<td>Total :</td>
<td class="mono">157.00</td>
</tr>
</table>
</div>
<div id="invoice_total">
Total Amount :
<table>
<tr>
<td style="text-align:left; padding-left:10px;">One Hundred And Fifty Seven only</td>
<td style="width:15%;">USD</td>
<td style="width:15%;" class="mono">157.00</td>
</tr>
</table>
</div>
<br />
<hr />
<br />

<table style="width:100%; height:35mm;">
<tr>
<td style="width:65%;" valign="top">
Payment Information :<br />
Please make cheque payments payable to : <br />
<b>ABC Corp</b>
<br /><br />
The Invoice is payable within 7 days of issue.<br /><br />
</td>
<td>
<div id="box">
E &amp; O.E.<br />
For ABC Corp<br /><br /><br /><br />
Authorised Signatory
</div>
</td>
</tr>
</table>
</div>

<br />

</div>

<htmlpagefooter name="footer">
<hr />
<div id="footer">
<table>
<tr><td>Software Solutions</td><td>Mobile Solutions</td><td>Web Solutions</td></tr>
</table>
</div>
</htmlpagefooter>
<sethtmlpagefooter name="footer" value="on" />

</body>
</html>
[/html]