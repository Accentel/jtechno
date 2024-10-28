<?php //include('config.php');
session_start();
include('dbconnection/connection.php');
if($_SESSION['user'])
{
 $name=$_SESSION['user'];
//include('org1.php');


include'dbfiles/org.php';
//include'dbfiles/iqry_acyear.php';
?>
<!DOCTYPE html>
<html lang="en">
    <?php include'template/headerfile.php'; ?>
    <style>
        strong{
            color:red;
        }
    </style>
	<script>
   
        function ConfirmDialog() {
  var x=confirm("Are you sure to delete record?")
  if (x) {
    return true;
  } else {
    return false;
  }
    }
    </script>
	
	<script>
function showHint22(str)
{

if (str.length==0)
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
	var show=xmlhttp.responseText;
	var strar=show.split(":");
	//document.getElementById("supname").value=strar[2];
	
	//document.getElementById("state").value=strar[1];
	
	//document.getElementById("city").value=strar[2];	
	document.getElementById("store_name").value=strar[1];	
	document.getElementById("state").value=strar[2];
    document.getElementById("state_code").value=strar[3];
	//document.getElementById("addr").value=strar[4];	
	document.getElementById("gst_in").value=strar[4];
	document.getElementById("store_type").value=strar[5];
	
	document.getElementById("supervisor").value=strar[6];
	document.getElementById("cordinator").value=strar[7];
	document.getElementById("afm").value=strar[8];
	document.getElementById("company").value=strar[9];
    }
  }
xmlhttp.open("GET","get-apdata3.php?q="+str,true);
xmlhttp.send();
}
</script>
	
	
	<script>
 $(document).on('keyup', '.txt1', function(){
 var id=$(this).attr('data-row');
 
 var qty=document.getElementById('qty'+id).value;
 var price=document.getElementById('price'+id).value;
 
 
 bal=parseFloat(qty)*parseFloat(price);
 document.getElementById('amnt'+id).value=bal;
 calculateTotal1();
 calculateTotal1k();
 calculateTotal1kk();
 calculateTotal1kv();
 
 });
 
 
 $(document).on('keyup', '.txt20', function(){
 var id=$(this).attr('data-row');
 
 var amt=document.getElementById('amnt'+id).value;
 var sgst=document.getElementById('sgst'+id).value;
  var serv_amt=document.getElementById('serv_amt'+id).value;
 
 
 bal=(parseFloat(amt)*parseFloat(sgst))/100;
 alert(sgst);
  ser=(parseFloat(amt)*parseFloat(serv_amt))/100;
 document.getElementById('sgstamt'+id).value=bal;
  document.getElementById('serv_amnt'+id).value=ser;
 calculateTotal2();
 
 });
 
 $(document).on('keyup', '.txt21', function(){
 var id=$(this).attr('data-row');
 
 var amt=document.getElementById('amnt'+id).value;
 var cgst=document.getElementById('sgst'+id).value;
 
 
 bal=(parseFloat(amt)*parseFloat(cgst))/100;
 document.getElementById('cgstamt'+id).value=bal;
 calculateTotal3();
 
 });
 
 
 function calculateTotal1(){
	subTotal = 0 ; total = 0; 
	$('.txt').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#tot').val( subTotal.toFixed(2) );
	//$('#bamount').val( subTotal.toFixed(2) );
}
 
 
 function calculateTotal1kv(){
	subTotal = 0 ; total = 0; 
	$('.txt7').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#tot_serv').val( subTotal.toFixed(2) );
	//$('#bamount').val( subTotal.toFixed(2) );
}
 
  function calculateTotal1k(){
	subTotal = 0 ; total = 0; 
	$('.txt4').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#tot_gst').val( subTotal.toFixed(2) );
	//$('#bamount').val( subTotal.toFixed(2) );
}
 function calculateTotal1kk(){
	subTotal = 0 ; total = 0; 
	$('.txt5').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#net').val( subTotal.toFixed(2) );
	//$('#bamount').val( subTotal.toFixed(2) );
}
 
 function calculateTotal2(){
	subTotal = 0 ; total = 0; 
	$('.txt50').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#sgsttotal').val( subTotal.toFixed(2) );
	//$('#bamount').val( subTotal.toFixed(2) );
}
 function calculateTotal3(){
	subTotal = 0 ; total = 0; 
	$('.txt51').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#cgsttotal').val( subTotal.toFixed(2) );
	//$('#bamount').val( subTotal.toFixed(2) );
}
 
 </script>
	
	
    <body class="no-skin">
        <?php include'template/logo.php'; ?>

        <div class="main-container ace-save-state" id="main-container">
            <script type="text/javascript">
                try {
                    ace.settings.loadState('main-container')
                } catch (e) {
                }
            </script>

            <div id="sidebar" class="sidebar                  responsive                    ace-save-state">
                <script type="text/javascript">
                    try {
                        ace.settings.loadState('sidebar')} catch (e) {
                    }
                </script>

                <!-- /.sidebar-shortcuts -->
                <?php include'template/sidemenu.php' ?>
                <!-- /.nav-list -->

                <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                    <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
                </div>
            </div>
         

            <div class="main-content">
                <div class="main-content-inner">
                    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                        <ul class="breadcrumb">
                            <li>
                                <i class="ace-icon fa fa-home home-icon"></i>
                                <a href="#">Home</a>
                            </li>
								<li>
                                <i class="ace-icon fa fa-cog home-icon"></i>
                                <a href="#">Settings</a>
                            </li>
                            <li>
                                <a href="bill_list.php"> Quotations List</a>
                            </li>
                            <li>
                                <a href="">Edit Quotations</a>
                            </li>
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    <div class="page-content">
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                            <h1 align="center">
                                Edit Quotations

                            </h1>
                        </div>
                        
                        <?php  $id=$_GET['id'];
						$sq=mysqli_query($link,"select * from add_qot where id='$id'");
						$r=mysqli_fetch_array($sq);
						
						?>
                        
                        
                        <!-- PAGE CONTENT BEGINS -->
<div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="row">
                                    <div class="col-xs-12">
                                       
<form name="frm" method="post" action="qot_suc.php">
 <input type="hidden" name="id" value="<?php echo $id?>">
  <input type="hidden" name="ses" value="<?php echo $name;?>">
                                            <table class="table table-striped table-bordered table-hover">
											
											  <tr><td align="right">QuoteNumber</td><td align="left">
											  <input  type="text" readonly  class="form-control" value="<?php echo $r['quet_num'];?>"  name="qt_no" id="qt_no"></td>
                                        <td align="right">Quote Date</td><td><input type="date" value="<?php echo $r['inv_date'];?>"   name="inv_date" id="inv_date" class="form-control"></td>
                                        </tr>
											
                                            <tr>
											
											<td align="right">Store Code</td><td align="left">
											
											 <input id=\"store_code\" list=\"city1\" class="form-control" name="store_code" value="<?php echo $str=$r['store_code'];?>" onblur="showHint22(this.value)" >
<datalist id=\"city1\" >

<?php 
include_once('dbconnection/connection1.php');
$sql="select distinct store_code from dpr ";  // Query to collect records
$r1=mysqli_query($link,$sql) or die(mysql_error());
while ($row=mysqli_fetch_array($r1)) {
echo  "<option value=\"$row[store_code]\"/>"; // Format for adding options 
}
////  End of data collection from table /// 

echo "</datalist>";
include_once('dbconnection/connection.php');
?>
											</td>
											
	<?php 
	include_once('dbconnection/connection1.php');
	echo $a="select * from dpr where store_code='$str'";
	$ssq=mysqli_query($link,$a);
	$r2=mysqli_fetch_array($ssq);
	?>										<td align="right">Store Name</td><td align="left">
											<input type="text" class="form-control"  value="<?php echo $r2['store_name'];?>" id="store_name" name="store_name">
											
											</td>
</tr>
                                        
                                        <tr><td align="right">State</td><td align="left"><input  type="text" value="<?php echo $r2['state'];?>"  class="form-control" name="state" id="state"></td>
                                        <td align="right">State Code</td><td><input type="text"  name="state_code" value="<?php echo $r2['state_code'];?>" id="state_code" class="form-control"></td>
                                        </tr>
                                        
										
										 <tr><td align="right">Store Type</td><td align="left">
										 <input  type="text" value="<?php echo $r2['format_type'];?>"  class="form-control" name="store_type" id="store_type"></td>
                                        <td align="right">Company Name</td><td>
										<input type="text" required name="company" id="company" value="<?php echo $r2['company_name'];?>" class="form-control"></td>
                                        </tr>
										
										
										 <tr><td align="right">Supervisor</td><td align="left">
										 <input  type="text"   class="form-control"  value="<?php echo $r2['superwisor'];?>" name="supervisor" id="supervisor"></td>
                                        <td align="right">Coordinator</td><td>
										<input type="text" required name="cordinator" id="cordinator" value="<?php echo $r2['coordinator'];?>" class="form-control"></td>
                                        </tr>
										
                                         <tr><td align="right">AFM</td><td align="left">
										<input type="text" required name="afm" id="afm" value="<?php echo $r2['afm'];?>" class="form-control"></td>
                                        <td align="right">GSTIN/UIN</td><td><input type="text" name="gst_in" id="gst_in" value="<?php echo $r2['gst_in'];?>" required class="form-control"></td>
                                        </tr>
										
										   <tr><td align="right">FM Fault No</td><td align="left">
										<input type="text" required name="falt_no" id="falt_no" value="<?php echo $r['falt_no'];?>" class="form-control"></td>
                                        <td align="right">FM Fault date</td><td><input type="date" name="falt_date" 
										id="falt_date" required class="form-control" value="<?php echo $r['falt_date'];?>"></td>
                                        </tr>
										
										   <tr><td align="right">Fault Description</td><td align="left">
										<textarea  required name="falt_desc" id="falt_no" class="form-control"><?php echo $r['falt_desc'];?></textarea></td>
                                        <td align="right"></td><td></td>
                                        </tr>
                                        
                                        </table>
                                        <?php  $tt=$r['total_amnt'];
										$tt1=$r['total_sgst'];
										
										?>
                                        
                                        <div class="table-header">
                                         Items  List
                                        </div>
                                        
                                        <?php 
										
										$aa="select * from add_qot1 where id1='$id'";
$t=mysqli_query($link,$aa) or die(mysqli_error($link));?>

                                        <!-- div.table-responsive -->

                                        <!-- div.dataTables_borderWrap -->
                                        <div>
                                       
                                      
                                          
                                            
                                           <div align="right">
	
<button type="button" class='btn btn-success addmore'>+</button>
<button type="button" class='btn btn-danger delete'>-</button>
	</div>
                                            <div class="table-responsive">
                                            <table id="dynamic-table1" class="table table-striped table-bordered table-hover">
 
                                             <tr>
														<th>C</th>
														<th>ID</th>
													
														  <th> Description</th>
                                                       <th> Service Id</th>
                                                 
                                                        <th>HSN<br/> /SAN Code</th>
                                                       
                                                        <th>GST</th>
                                                          <th>UOM</th>
                                                           <th>QTY</th>
                                                        <th>RATE</th>
														  <th>BASE AMOUNT</th>
                                                       <th>SERVICE FEE(6%)</th>
													    <th>GST AMOUNT(18%)</th>
                                                    
                                                     
														</tr>
                                              
											<?php   $id=count($_POST['id']);
											 $id1=$_GET['id'];
											 $aa="select * from add_qot1 where id1='$id1'";
												$sq=mysqli_query($link,$aa);
												$i=1;
												while($rs1=mysqli_fetch_array($sq)){
												
													?>
                                                    <tr>
                                                    <td><?php echo $i?></td>
                                             
                                                        <td class="hidden-480">
														<input type="hidden" name="id1[]" value="<?php echo $rs1['id']; ?>">
														
														<?php echo $rs1['desc1']; ?>
                                                        <input type="hidden" name="product[]" 
                                                        value="<?php echo $rs1['desc1']; ?>">
                                                        </td>
                                                        <td class="hidden-480"><?php echo $rs1['hsn']; ?>
                                                         <input type="hidden" name="hsn[]" 
                                                        value="<?php echo $rs1['hsn']; ?>">
                                                        </td>
                                                        <td><?php echo $rs1['gst']; ?><input type="hidden" name="gst[]" readonly value="<?php echo $rs1['gst']; ?>"  class="txt txt2" id="gst<?php echo $i?>" /></td>
                                                       <td class="hidden-480"><?php echo $rs1['uom']; ?>
                                                         <input type="hidden" name="uom[]" 
                                                        value="<?php echo $rs1['uom']; ?>">
                                                        </td>
                                                        
                                                         <td><input type="text" name="qty[]" readonly value="<?php echo $rs1['qty'];?>" class=" txt2" id="qty<?php echo $i?>" onkeyup='val(this.value,<?php echo $i?>)' /></td>
                                                        <td class="hidden-480"><?php echo $rs1['rate']; ?>
                                                        <input type="hidden" name="price[]" readonly id="price<?php echo $i?>" 
                                                        value="<?php echo $rs1['rate']; ?>" class="txt1 kkk txt" onkeyup='val(this.value,<?php echo $i?>)' />
                                                        </td>
														 <td><input type="text" name="amnt[]" readonly value="<?php echo $rs1['base_amt'];?>" readonly class="txt7" id="amnt<?php echo $i?>" /></td>
                                                      
 <td><input type="text" name="serv_amnt[]" readonly value="<?php echo $rs1['serv_amt'];?>" readonly class="txt7" id="serv_amnt<?php echo $i?>" /></td>
                                                      
													  
                                                         <td><input type="text" name="gst_amnt[]" readonly value="<?php echo $rs1['gst_amnt']; ?>" id="gst_amnt<?php echo $i?>" class="txt4"    id="gst<?php echo $i?>" /></td>
                                                        
														
											<input type="hidden" name="item_id1[]" readonly value="<?php echo $rs1['id']; ?>"    />
                                                        
                                                        <!-- <input type="hidden" name="gst[]" readonly  value="<?php echo $rs1['sgst']; ?>" id="gst<?php echo $i?>" />-->
                                                      
                                                      
                                                      
                                                      <!--  <td class="hidden-480"><?php echo $rs1['hsn']; ?></td>
                                                        <td class="hidden-480"><?php echo $rs1['sac']; ?></td>
                                                        <td class="hidden-480"><?php echo $rs1['item_category']; ?></td>-->
                                                        </tr>
                                                        
                                                    
                                                    <?php 
													
											$i++;
											}
											 $id=$_POST['id'];
											
									?>
                                        <!--<tr><td colspan="6" align="right"><strong>Total Amount</strong></td>
                                        <td colspan="1"><strong><input type="text" readonly name="tot" value="<?php echo $tt;?>" id="tot" />
                                        <input type="hidden" name="tot1" id="tot1" value="<?php echo $tt1?>" />
                                        </strong></td></tr>
										
										
										 <tr>-->
										<tr>
									
										<td colspan="7" align="right"><strong>TOTAL AMOUNT</strong></td>
										<td>
										<input style="width:60px;" type="text"  placeholder="Total Amount" readonly name="tot" class="txt6" value="<?php echo $r['tot_base'];?>" id="tot" />+
                                       
									</td>
                                        <td colspan="1">
										<input style="width:60px;" type="text" readonly placeholder="Total Gst" name="tot_gst" class="txt6" value="<?php echo $r['tot_gst'];?>" id="tot_gst" />=
									
										 <input type="hidden" name="tot1" id="tot1" value="<?php echo $tt1?>" />
                                        </td>
											</tr>
										
										<tr>
									
										<td colspan="7" align="right"><strong>NET AMOUNT</strong></td>
										
											
										<td colspan="2"><input style="width:60px;" type="text" placeholder="Total Net Amount" readonly name="net" value="<?php echo $r['net'];?>" id="net" /></td>
										</tr>
                                        </table>
                                        
                                        <div class="form-group">
                                        <div class="col-md-offset-4 col-md-8">
                                          
                                          
                                            <button class="btn btn-info" type="submit" name="update" id="submit">
                                                <i class="ace-icon fa fa-save bigger-110"></i>
                                                Update
                                            </button>

                                            
											&nbsp; &nbsp; &nbsp;
                                           <a href="bill_list.php"><button class="btn btn-danger" type="button" name="button" id="Close">
                                                <i class="ace-icon fa fa-close bigger-110"></i>
                                                Close
                                            </button></a>
                                        </div>
                                    </div>
                                        </form>
                                        </div></div></div></div></div></div></div>
                                  <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>   
                                    <script src="assets/js/jquery-2.1.4.min.js"></script>  
                                      <script type="text/javascript">
$(".delete").on('click', function() {
	$('.case:checkbox:checked').parents("tr").remove();
	$('#check_all').prop("checked", false); 
	calculateTotal1();
	calculateTotal2();
	calculateTotal3();
});
var i=100;

$(".addmore").on('click',function(){
    i++; 
	var data ="<tr>";
    data +="<td><input type='checkbox' class='case'/></td>";
	data +="<td>"+i+"</td>"; 
   // data +="<td><input type='hidden' name='id1[]'  id='id1"+i+"' style='width:30px;' data-row='"+i+"' value='<?php echo $id ?>'><input type='hidden' name='id5[]' id='id5"+i+"' style='width:30px;' data-row='"+i+"' value=''><input data-row='"+i+"' type='text' name='sno[]' id='sno"+i+"' style='width:30px;' value=''></td>";          
   	 data +="<td>"+i+"</td>"; 
data +="<td><input type='text' name='pname[]' id='pname"+i+"' style='width:100px;' data-row='"+i+"' value=''  onclick=window.open('Drug_itemcode_pop1.php?rowid="+i+"','mywindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no')></td>";
data +="<td><input type='text' name='serv_num[]' data-row='"+i+"' value='' style='width:60px;'  class='' id='serv_num"+i+"' /> </td>";          
  
	  data +="<td><input type='text' name='hsn[]' readonly value='' style='width:50px;'  id='hsn"+i+"' />	   </td>";
	   data +="<td> <input type='text' name='gst[]' readonly data-row='"+i+"'  value='' style='width:60px;' class='txt20'   id='gst"+i+"' /></td>";          
     
    data +="<td><input type='text' name='uom[]' readonly id='uom"+i+"' value='' style='width:70px;' data-row='"+i+"'></td>";
	 data +="<td><input type='text' name='qty[]'  data-row='"+i+"' value='' style='width:60px;' class=' ' id='qty"+i+"' onkeyup='val(this.value)' /> </td>"; 
	 
	data +="<td><input type='text' name='price[]' readonly data-row='"+i+"' id='price"+i+"' style='width:70px;' value='' class='txt1 ' onkeyup='val(this.value,"+i+")' /></td>";
data +="<td><input type='text' name='amnt[]' data-row='"+i+"' value='' style='width:60px;' readonly class='txt tx6' id='amnt"+i+"' /> </td>";          
      data +="<td><input type='text' name='serv_amnt[]' data-row='"+i+"' value='' style='width:60px;' class='txt7 ' readonly  id='serv_amnt"+i+"' /> </td>";          
   
   data +="<td><input type='text' name='gst_amnt[]' data-row='"+i+"' value='' style='width:60px;' class='txt4 ' readonly  id='gst_amnt"+i+"' /> </td>";          
   
   	data +="<td><input type='hidden' name='id[]' data-row='"+i+"' value='' style='width:60px;' readonly class='' id='id"+i+"' /> </td>";          
   	data +="<td><input type='hidden' name='cap[]' data-row='"+i+"' value='' style='width:60px;' readonly class='' id='cap"+i+"' /> </td>";          
   	data +="<td><input type='hidden' name='serv_amt[]' data-row='"+i+"' value='' style='width:60px;' readonly class='' id='serv_amt"+i+"' /> </td>";          
   	data +="<td><input type='hidden' name='serv_code[]' data-row='"+i+"' value='' style='width:60px;' readonly class='' id='serv_code"+i+"' /> </td>";          
   	
	 
	data +="</tr>";
	$('#dynamic-table1 ').append(data).find('#dynamic-table1>tbody>tr:nth-child(2)');
	

	});
function select_all() {
	$('input[class=case]:checkbox').each(function(){ 
		if($('input[class=check_all]:checkbox:checked').length == 0){ 
			$(this).prop("checked", false); 
		} else {
			$(this).prop("checked", true); 
		} 
	});
}
</script> 
                                      <script type="text/javascript">

function val(str,id)
{
cal=0;

var price=document.getElementById("price"+id).value;
var qty=document.getElementById("qty"+id).value;
var gst=document.getElementById("gst"+id).value;
//var cgst=document.getElementById("cgst"+id).value;
//var gst=Math.abs(sgst)+Math.abs(cgst);
cal=eval(price)*eval(qty);
document.getElementById("amnt"+id).value=Math.abs(cal);	

cal1=eval(price)*eval(qty)*eval(gst)/100;
document.getElementById("gst_amnt"+id).value=Math.abs(cal1);



}</script>




<script>
$(document).ready(function(){
$(".txt").each(function(){
$(this).keyup(function(){
calculateSum1();

});
});
});
function calculateSum1(){
var sum=0;
$(".txt4").each(function(){
if(!isNaN(this.value)&&this.value.length!=0){
sum+=parseFloat(this.value);
}});
$("#tot_gst").val(sum.toFixed(2));

}
</script> 



<script>
$(document).ready(function(){
$(".txt").each(function(){
$(this).keyup(function(){
calculateSum3();

});
});
});
function calculateSum3(){
var sum=0;
$(".txt7").each(function(){
if(!isNaN(this.value)&&this.value.length!=0){
sum+=parseFloat(this.value);
}});
$("#tot").val(sum.toFixed(2));

}
</script> 


<script>
$(document).ready(function(){
$(".kkk").each(function(){
$(this).keyup(function(){
calculateSum2();

});
});
});
function calculateSum2(){
var sum=0;
$(".txt6").each(function(){
	
if(!isNaN(this.value)&&this.value.length!=0){
sum+=parseFloat(this.value);
}});
//alert(sum);
$("#net").val(sum.toFixed(2));

}
</script> 
<script src="assets/js/jquery-2.1.4.min.js"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
<script type="text/javascript">
                            if ('ontouchstart' in document.documentElement)
                                document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
        </script>
        <script src="assets/js/bootstrap.min.js"></script>

        <!-- page specific plugin scripts -->
        <script src="assets/js/jquery.dataTables.min.js"></script>
        <script src="assets/js/jquery.dataTables.bootstrap.min.js"></script>
        <script src="assets/js/dataTables.buttons.min.js"></script>
        <script src="assets/js/buttons.flash.min.js"></script>
        <script src="assets/js/buttons.html5.min.js"></script>
        <script src="assets/js/buttons.print.min.js"></script>
        <script src="assets/js/buttons.colVis.min.js"></script>
        <script src="assets/js/dataTables.select.min.js"></script>

        <!-- ace scripts -->
        <script src="assets/js/ace-elements.min.js"></script>
        <script src="assets/js/ace.min.js"></script>
</body>
</html>
<?php 

}else
{
session_destroy();

session_unset();

header('Location:index.php?authentication failed');

}

?>
