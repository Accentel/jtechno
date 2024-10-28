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
<style>
.frmSearch {border: 1px solid #a8d4b1;background-color: #c6f7d0;margin: 2px 0px;padding:40px;border-radius:4px;}
#country-list{float:left;list-style:none;margin-top:-3px;padding:0;width:190px;position: absolute;}
#country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}
</style>
    <?php include'template/headerfile.php'; ?>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
	 <script src="js/jquery.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script> 

    <style>
        strong{
            color:red;
        }
    </style>
    <script>
	function s2(i){
	    var curval= document.getElementById("pname"+i).value;
	$.ajax({          
        	type: "GET",
        	url: "getdescriptionauto.php",
        	data:{keyword: curval, id: i},
        	success: function(data){
        		$("#suggesstion-box"+i).show();
			$("#suggesstion-box"+i).html(data);
			$("#pname"+i).css("background","#FFF");
        	}
	});
}
	function selectCountry(val,i) {
document.getElementById("pname"+i).value=val;
$("#suggesstion-box"+i).hide();
}
	</script>
	
	<script>
	
	function deleteRow()
   {	
var rr=document.getElementById("rows1").value

if(rr!=0){
   // var oRow = rr.parentNode.parentNode;
    document.getElementById("dynamic-table1").deleteRow(rr);  
	var row=document.getElementById("rows1").value
	document.getElementById("rows").value=row-1;
total();
	}
	else{
	alert('Please Select Atleast One Row');
	return false;
	}
   }
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
function showUser(str,id)
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
	//document.getElementById("serv_num"+id).value=strar[1];	
	//document.getElementById("hsn"+id).value=strar[2];
    document.getElementById("gst"+id).value=strar[3];
	//document.getElementById("addr").value=strar[4];	
	//document.getElementById("uom"+id).value=strar[4];
	document.getElementById("price"+id).value=strar[5];
	//document.getElementById("serv_amt"+id).value=strar[6];
	
	
    }
  }
xmlhttp.open("GET","get_items.php?q="+str,true);
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
  //var serv_amt=document.getElementById('serv_amt'+id).value;
 
 
 bal=(parseFloat(amt)*parseFloat(sgst))/100;
 alert(sgst);
 // ser=(parseFloat(amt)*parseFloat(serv_amt))/100;
 document.getElementById('sgstamt'+id).value=bal;
//  document.getElementById('serv_amnt'+id).value=ser;
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
                                <a href="qot_list"> Accessories</a>
                            </li>
                            <li>
                                <a href=""> Add Accessories</a>
                            </li>
                           
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    <div class="page-content">
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                            <h1 align="center">
                                Add Accessories

                            </h1>
                        </div>
                        
                        <?php
						 $a="select `count` as cnt from qutcount where state='AP' ";
						$ssq=mysqli_query($link,$a);
						 $r=mysqli_fetch_array($ssq);
						$cnt1=$r['cnt'];
						
						 $cnt=  21220000+1+$cnt1;
						
						?>
                        
                        
                        <!-- PAGE CONTENT BEGINS -->
<div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="row">
                                    <div class="col-xs-12">
                                       
 <form name="frm" method="post" action="qot_suc.php" enctype="multipart/form-data">
 <input type="hidden" name="id" value="<?php echo $id?>">
  <input type="hidden" name="ses" value="<?php echo $name;?>">
                                            <table class="table table-striped table-bordered table-hover">
                                                
											<tr>
											
											  <td align="right">Supplier Name</td>
											     <td><input  type="text"   class="form-control" value=""  name="qt_no1" id="qt_no1"></td></td>
											    <td align="right">Invoice Date</td>
												<td><input type="date" value="<?php echo date('Y-m-d');?>"  required name="inv_date" id="inv_date" class="form-control"></td>
											</tr>
											  <tr><td align="right">Invoice No</td><td align="left">
											
											 <input id="invno" class="form-control" name="invno" >
											</td>
											<td align="right">Address</td><td align="left">
											
											 <input id="add" class="form-control" name="add" >
											</td>
											  
                                        
                                        </tr>
											
                                   
                                        
									
                                        
                                        </table>
                                        <?php  $tt=$r['total_amnt'];
										$tt1=$r['total_sgst'];
										
										?>
                                        
                                        <div class="table-header">
                                         Items  List
                                        </div>
                                        
                                        <?php 
										?>

                                      
                                        <div>
                <div align="right">

<button type="button" class='btn btn-success addmore'>+</button>
<button type="button" class='btn btn-danger delete'>-</button>
	</div>
                                            <div class="table-responsive">
                                            <table id="dynamic-table1" class="table table-striped table-bordered table-hover">
 
														<th>C</th>
														<th>ID</th>
													
														  <th> Description</th>
                                                       <!--<th> Service Id</th>
                                                 <th> Brand/Make</th>
														 <th> Model</th>
                                                        <th>HSN<br/> /SAN Code</th>-->
                                                       
                                                        <th>GST</th>
                                                          <!--<th>UOM</th>-->
                                                        <th>RATE</th>
                                                           <th>QTY</th>
                                                       
														  <th>BASE AMOUNT</th>
                                                       <!--<th>SERVICE FEE(6%)</th>-->
													    <th>GST AMOUNT</th>
                                                      <!--<th>Serv AMOUNT</th>-->
                                                     
														</tr>
														<tbody>
                                                        <!--<th>HSN</th>
                                                        <th>SAC</th>
                                                        <th>Item Category</th>-->
                                              
											
                                                        
                                                    
                                                    
                                        <tr>
										
									
										<td colspan="11" align="right"><strong>NET AMOUNT</strong></td>
										<td>
										<input style="width:90px;" type="text"  placeholder="Total Amount" readonly name="tot" class="txt5" value="<?php echo $tt;?>" id="tot" />+
                                       
									</td>
									<!--<td><input style="width:60px;" type="text" readonly placeholder="Total Serv" name="tot_serv" class="txt5" value="<?php echo $r['total_sgst'];?>" id="tot_serv" />+
									</td>-->
                                        <td colspan="1">
										
										<input style="width:60px;" type="text" readonly placeholder="Total Gst" name="tot_gst" class="txt5" value="<?php echo $r['total_sgst'];?>" id="tot_gst" />=
									
										 <input type="hidden" name="tot1" id="tot1" value="<?php echo $tt1?>" />
                                        </td>
											
										<td colspan=""><input style="width:60px;" type="text" placeholder="Total Net Amount" readonly name="net" value="<?php echo $r['total_cgst'];?>" id="net" /></td>
										</tr>
										</tbody>
                                        </table>
                                        </div>
                                        <div class="form-group">
                                        <div class="col-md-offset-4 col-md-8">
                                          
                                        
                                            <button class="btn btn-info" type="submit" name="submit" id="submit">
                                                <i class="ace-icon fa fa-save bigger-110"></i>
                                                Save
                                            </button>
										
										
			

                                            
											&nbsp; &nbsp; &nbsp;
                                           <a href="qot_list.php"><button class="btn btn-danger" type="button" name="button" id="Close">
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
   data +="<td><input type='hidden' name='id1[]'  id='id1"+i+"' style='width:200px;' data-row='"+i+"' value='<?php echo $id ?>'><input type='hidden' name='id5[]' id='id5"+i+"' style='width:200px;' data-row='"+i+"' value=''><input data-row='"+i+"' type='text' name='sno[]' id='sno"+i+"' style='width:200px;' value=''></td>";          
   	 
//data +="<td><input type='text' name='pname[]'  id='pname"+i+"' data-row='"+i+"' style='width:150px;' class='form-control pname"+i+"' onkeyup='s2("+i+")' onclick='showUser(this.value,"+i+")'> <div id='suggesstion-box"+i+"'></div>";
//data +="</td>";
	
//data +="<td><input type='text' name='serv_num[]' data-row='"+i+"' value='' style='width:60px;'  class='' id='serv_num"+i+"' /> </td>";          
  //data +="<td><input type='text' name='brand[]' required  value='' style='width:50px;'  id='brand"+i+"' />	   </td>";
	   //data +="<td> <input type='text' name='model[]' required  data-row='"+i+"'  value='' style='width:60px;' class=''   id='model"+i+"' /></td>";          
 
	  //data +="<td><input type='text' name='hsn[]'  value='' style='width:50px;'  id='hsn"+i+"' />	   </td>";
	   data +="<td> <input type='text' name='gst[]'  data-row='"+i+"'  value='' style='width:60px;' class='txt20'   id='gst"+i+"' /></td>";          
     
    //data +="<td><input type='text' name='uom[]'  id='uom"+i+"' value='' style='width:70px;' data-row='"+i+"'></td>";
	data +="<td><input type='text' name='price[]'  data-row='"+i+"' id='price"+i+"' style='width:70px;' value=''   /></td>";
	 data +="<td><input type='text' name='qty[]'  data-row='"+i+"' onkeyup='qval(this.value,"+i+")' value='' style='width:60px;' class='txt1' id='qty"+i+"'  /> </td>"; 
	 

data +="<td><input type='text' name='amnt[]' data-row='"+i+"' value='' style='width:60px;'  class='txt tx6' id='amnt"+i+"' /> </td>";          
     // data +="<td><input type='text' name='serv_amnt[]' data-row='"+i+"' value='' style='width:60px;' class='txt7 '   id='serv_amnt"+i+"' /> </td>";          
   
   data +="<td><input type='text' name='gst_amnt[]' data-row='"+i+"' value='' style='width:60px;' class='txt4 ' readonly  id='gst_amnt"+i+"' /> </td>";          
   //data +="<td><input type='text' name='serv_amt[]' data-row='"+i+"'  style='width:60px;'  class='' id='serv_amt"+i+"' value='6'/> </td>";   
   	data +="<td><input type='hidden' name='id[]' data-row='"+i+"' value='' style='width:60px;' readonly class='' id='id"+i+"' /> </td>";          
   	//data +="<td><input type='hidden' name='cap[]' data-row='"+i+"' value='' style='width:60px;' readonly class='' id='cap"+i+"' /> </td>";          
   	       
   //	data +="<td><input type='hidden' name='serv_code[]' data-row='"+i+"' value='' style='width:60px;' readonly class='' id='serv_code"+i+"' /> </td>";          
   	
	 
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
<!--<script>
$(document).ready(function(){
$(".txt1").each(function(){
$(this).keyup(function(){
calculateSum();
});
});
});
function calculateSum(){
var sum=0;
$(".txt").each(function(){
if(!isNaN(this.value)&&this.value.length!=0){
sum+=parseFloat(this.value);
}});
$("#tot").val(sum.toFixed(2));

}
</script> 

<script>
$(document).ready(function(){
$(".txt2").each(function(){
$(this).keyup(function(){
calculateSum1();
});
});
});
function calculateSum1(){
var sum=0;
$(".txt3").each(function(){
if(!isNaN(this.value)&&this.value.length!=0){
sum+=parseFloat(this.value);
}});
$("#tot1").val(sum.toFixed(2));

}
</script> 

<script>
$(document).ready(function(){
$(".txt4").each(function(){
$(this).keyup(function(){
calculateSumk();
});
});
});
function calculateSumk(){
var sum=0;
$(".txt4").each(function(){
if(!isNaN(this.value)&&this.value.length!=0){
sum+=parseFloat(this.value);
}});
$("#tot_gst").val(sum.toFixed(2));

}
</script> -->
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
		<script type="text/javascript">

function val(str,id)
{
cal=0;
cal1=0;
cal12=0;
//alert(id);
var price=document.getElementById("price"+id).value;
var qty=document.getElementById("qty"+id).value;
var gst=document.getElementById("gst"+id).value;
//var serv_amt=document.getElementById("serv_code"+id).value;
//var serv_amtk=document.getElementById("serv_amnt"+id).value;
//alert(serv_amtk);

//var cgst=document.getElementById("cgst"+id).value;
//var gst=Math.abs(sgst)+Math.abs(cgst);
cal=eval(price)*eval(qty);
//alert(cal);
//document.getElementById("amnt"+id).value+document.getElementById("serv_amtk"+id).value=Math.abs(cal);	
cal12=eval(price)*eval(qty)/100;
//alert(cal12);
calk=(cal);
//alert(calk);
cal1=eval(calk)*eval(gst)/100;	






document.getElementById("gst_amnt"+id).value=cal1;
//alert(cal12);
//document.getElementById("serv_amnt"+id).value;	
//document.getElementById("serv_amnt"+id).value=cal12;


document.getElementById("gst_amnt"+id).value;	



}

function qval(str,id)
{
cal=0;
cal1=0;
cal12=0;
//alert(id);
var price=document.getElementById("price"+id).value;
var qty=document.getElementById("qty"+id).value;
var gst=document.getElementById("gst"+id).value;
//var serv_amt=document.getElementById("serv_amt"+id).value;
//var serv_amtk=document.getElementById("serv_amnt"+id).value;
//alert(serv_amtk);

//var cgst=document.getElementById("cgst"+id).value;
//var gst=Math.abs(sgst)+Math.abs(cgst);
cal=eval(price)*eval(qty);
document.getElementById("amnt"+id).value=cal;

//alert(cal);
//document.getElementById("amnt"+id).value+document.getElementById("serv_amtk"+id).value=Math.abs(cal);	
cal12=eval(price)*eval(qty)/100;
//alert(cal12);
calk=(cal);
//alert(calk);
cal1=eval(calk)*eval(gst)/100;
document.getElementById("gst_amnt"+id).value=cal1;
//alert(cal12);
//document.getElementById("serv_amnt"+id).value=Math.abs(cal12);	
//document.getElementById("serv_amnt"+id).value=cal12;


document.getElementById("gst_amnt"+id).value;	

calculateTotal1();
 calculateTotal1k();
 calculateTotal1kk();
 calculateTotal1kv();

}



</script>



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
