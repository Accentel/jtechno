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
                
                 <script src="js/jquery.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>

<script>
  
  // When the browser is ready...
  $(function() {
  
    // Setup form validation on the #register-form element
    $("#register-form").validate({
    
        // Specify the validation rules
        rules: {
            req_ref: {
					   required: true,
					
					   remote: "emailcheck.php?data=req_ref"
					},
			
			
				  
				   
		
            
        },
        
       
        messages: {
            req_ref: { 	  required: "<strong style='color:#FF0000;font-size:14px;'>Please enter Request Number</strong>",
							<!--minlength:"<strong style='color:#FF0000;font-size:14px;'>Mobile Number must have minimum  10 letters</strong>",-->
					       remote: "<strong style='color:#FF0000;font-size:14px;'>Request Number Allready Entered </strong>"
				  },
			
			
			
			
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  
  </script>
  <script type="text/javascript">
function report()
{
   		

	  window.open('list.php','mywindow1','width=1020,height=700,toolbar=no,menubar=no,scrollbars=yes')

	
}
</script>

       <script type="text/javascript" src="jquery-1.11.0.min.js"></script>
     <script>
function addRow()
   {
	  var count=document.getElementById("rows1").value
   var newRow = document.getElementById("TABLE1");
   var Row = newRow.rows.length;
   var row = newRow.insertRow(Row);
   var index=row.rowIndex;

	
	oCell = document.createElement("TD");
    oCell.innerHTML = "<div align='center' ><input  type='text' name='hsn[]'  id='hsn1"+Row+"'class='form-control  ' size='8' style='text-align:right'    data-row='"+Row+"' > </div>"; 
    row.appendChild(oCell);
	oCell = document.createElement("TD");
    oCell.innerHTML = "<div align='center' ><input  type='text' name='artical[]'  id='artical1"+Row+"'class='form-control  ' size='8' style='text-align:right'    data-row='"+Row+"' > </div>"; 
    row.appendChild(oCell);
oCell = document.createElement("TD");
    oCell.innerHTML = "<div align='center' ><input  type='text' name='desc[]'  id='desc1"+Row+"'class='form-control  ' size='8' style='text-align:right'    data-row='"+Row+"' > </div>"; 
    row.appendChild(oCell);
	
	oCell = document.createElement("TD");
    oCell.innerHTML = "<div align='center' ><input  type='text' name='qty[]'  id='qty1"+Row+"'class='form-control  ' size='8' style='text-align:right'    data-row='"+Row+"' > </div>"; 
    row.appendChild(oCell);
	
    oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' name='uom[]'  id='uom1"+Row+"'class='form-control changesNo2 txt2 ' size='8' style='text-align:right'  value='0'  data-row='"+Row+"' > </div>"; 
     row.appendChild(oCell);
	 
	 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' name='amountk[]' id='amountk1"+Row+"'class='form-control changesNo2 txt2' size='8' style='text-align:right'  data-row='"+Row+"'  value='0' > </div>"; 
     row.appendChild(oCell);
	  oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' name='tot[]'  id='total1"+Row+"'class='form-control tet4 tet6  '  data-row='"+Row+"' size='8' style='text-align:right'   > </div>"; 
     row.appendChild(oCell);
	 
	 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' name='service[]'  id='service1"+Row+"'class='form-control tet5 tet6  '  data-row='"+Row+"' size='8' style='text-align:right'   > </div>"; 
     row.appendChild(oCell);
	 
	 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' name='gst[]'  id='gst1"+Row+"'class='form-control tet7 tet6  '  data-row='"+Row+"' size='8' style='text-align:right'   > </div>"; 
     row.appendChild(oCell);

	  //oCell = document.createElement("TD");
	 	// oCell.innerHTML = ""; 
     //row.appendChild(oCell);

     document.getElementById("rows1").value=Row;

   }

 function deleteRow()
   {	
var rr=document.getElementById("rows1").value

if(rr!=0){
   // var oRow = rr.parentNode.parentNode;
    document.getElementById("TABLE1").deleteRow(rr);  
	var row=document.getElementById("rows1").value
	document.getElementById("rows").value=row-1;
total();
	}
	else{
	alert('Please Select Atleast One Row');
	return false;
	}
   }
   
   
   </script>     
<script>
$(document).on('keyup ','.changesNo2',function(){
	
	id = $(this).attr('data-row');
	
	//alert(id);
	days1 = $('#uom1'+id).val();
	//alert(days1);
	amount1 = $('#amountk1'+id).val();
		//alert(amount10);
		ds=(parseFloat(days1)*parseFloat(amount1)).toFixed(2);
		
	mm= $('#total1'+id).val(ds);
	ser=(ds*8/100).toFixed(2);
	gst=(ds*18/100).toFixed(2);
	
	//alert(ser);
var tt=document.getElementById("total1"+id).value;
var stax=document.getElementById("service1"+id).value;
document.getElementById("service1"+id).value=ser;
document.getElementById("gst1"+id).value=gst;
	//alert(ser);
	tamount11 = $('#tdramount').val();
	//alert(tamount11);
	var dtot=document.getElementById("tdramount").value;
	var tx=document.getElementById("tot_tax").value;
	//var tot=document.getElementById("tot").value;
	
//alert(dtot);
var nn=eval(dtot)+eval(tt);
var nn1=eval(tx)+eval(stax);
//alert(nn);
//document.getElementById("tdramount").value=eval(nn);

	//calculateTotal();
	//calculateTotal22();
	
});

$(document).on('keyup ','.tet4',function(){
	
	id = $(this).attr('data-row');
	//alert(id);
	days = $('#days'+id).val();
	
	cost = $('#charge'+id).val();
		
	$amnt= $('#amount'+id).val( (parseFloat(days)*parseFloat(cost)).toFixed(2) );

	calculateTotal3();
	
	});
	
	function calculateTotal3(){
	subTotal = 0 ; total = 0; 
	$('.tet4').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#tdramount').val(subTotal.toFixed(2) );
	t=$('#tdramount').val();

	//$('#tot').val(subTotal.toFixed(2));
	
	
}



$(document).on('keyup ','.tet5',function(){
	
	id = $(this).attr('data-row');
	//alert(id);
	days = $('#days'+id).val();
	
	cost = $('#charge'+id).val();
		
	$amnt= $('#amount'+id).val( (parseFloat(days)*parseFloat(cost)*8/100).toFixed(2) );

	calculateTotal4();
	
	});
	
	function calculateTotal4(){
	subTotal = 0 ; total = 0; 
	$('.tet5').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#tot_tax').val(subTotal.toFixed(2) );
	t=$('#tot_tax').val();

	//$('#tot').val(subTotal.toFixed(2));
	
	
}

$(document).on('keyup ','.tet7',function(){
	
	id = $(this).attr('data-row');
	//alert(id);
	days = $('#days'+id).val();
	
	cost = $('#charge'+id).val();
		
	$amnt= $('#amount'+id).val( (parseFloat(days)*parseFloat(cost)*18/100).toFixed(2) );

	calculateTotal5();
	
	});
	
	function calculateTotal5(){
	subTotal = 0 ; total = 0; 
	$('.tet7').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#tot_gst').val(subTotal.toFixed(2) );
	t=$('#tot_gst').val();

	$('#tot_gst1').val((subTotal/2).toFixed(2));
	$('#tot_gst2').val((subTotal/2).toFixed(2));
	
	
}


$(document).on('keyup ','.tet8',function(){
	
	id = $(this).attr('data-row');
	//alert(id);
	days = $('#days'+id).val();
	
	cost = $('#charge'+id).val();
		
	$amnt= $('#amount'+id).val( (parseFloat(days)*parseFloat(cost)).toFixed(2) );

	calculateTotal8();
	
	});
	
	function calculateTotal8(){
	subTotal = 0 ; total = 0; 
	$('.tet8').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#tot').val(subTotal.toFixed(2) );
	t=$('#tot').val();

	$('#txtTot1').val(subTotal.toFixed(2));
	
	
}

</script>  


 <!--tot_gst-->
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
                                <a href="#">ADD QUOTATION</a>
                            </li>
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    <div class="page-content">	
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                            <h1 align="center">
                                Add Quotation

                            </h1>
                        </div>
                        
                          <script>
  function showUser(str)
{

if (str=="")

  {

  document.getElementById("state").innerHTML="";

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

	document.getElementById("city").innerHTML=show;
    }

  }

xmlhttp.open("GET","get-data.php?q="+str,true);

xmlhttp.send();

}

</script>
                        
                        
                        <!-- PAGE CONTENT BEGINS -->
<div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="row">
                                    <div class="col-xs-12">
                                       
 <form name="frm" method="post" id="register-form" action="reffer_suc.php">
                                            <table class="table table-striped table-bordered table-hover">
                                            <tr> <td align="right">Name of Vendor </td><td>
											<input type="text" name="vendor_name" id="vendor_name" required class="form-control"></td>
                                           <td align="right">Vendor State</td><td>
                                         
                                         <select name="state" class="form-control" onChange="showUser(this.value)" required>
                                         <option value="">Select State</option>
                                         <?php $sq=mysqli_query($link,"select * from location_states where cname='India'");
										 while($r=mysqli_fetch_array($sq)){?>
                                         <option value="<?php echo $r['state'];?>"><?php echo $r['state'];?></option>
                                         <?php }?>
										 </select>
                                       </td></tr>
                                        
                                        <tr>
                                         <td align="right">Vendor GSTIN</td><td>
                                        <input type="text" name="vendor_gst" id="vendor_gst" required class="form-control">
                                        
                                       </td>
                                        <td align="right">Vendor State Code</td><td>
                                        <input type="text" name="state_code" id="state_code" required class="form-control">
                                        
                                       </td>
                                      
                                        </tr>
										 <tr> <td align="right">Vendor Address </td><td colspan="3">
											<textarea name="vendor_addr" class="form-control" placeholder="Vendor Address"></textarea></td>
                                            </tr>
										
										 <tr>
                                         <td align="right">Quotation Date</td><td>
                                        <input type="date" name="qut_date" id="qut_date" required class="form-control">
                                        
                                       </td>
                                        <td align="right">Quotation Number</td><td>
                                        <input type="text" name="qut_num" id="qut_num" required class="form-control">
                                        
                                       </td>
                                      
                                        </tr>
                                          <tr>
                                         <td align="right">FM Fault No</td><td>
                                       <input type="text" name="fault_num" id="fault_num" required class="form-control">
                                        
                                       </td>
                                        <td align="right">FM Fault date</td><td>
                                       
										 <input type="date" name="fault_date" id="fault_date" required class="form-control">
                                        
                                       </td>
                                      
                                        </tr>
										<tr> <td align="right">Fault Description </td><td colspan="3">
											<textarea name="fault_desc" class="form-control" placeholder="Fault Description"></textarea></td>
                                            </tr>
										
                                         <tr>
                                         <td align="right">FM Fault No</td><td>
                                       <input type="text" name="fault_num" id="fault_num" required class="form-control">
                                        
                                       </td>
                                        <td align="right">FM Fault date</td><td>
                                       
										 <input type="date" name="fault_date" id="fault_date" required class="form-control">
                                        
                                       </td>
                                      
                                        </tr>
										
										
										
										<tr><td colspan="4" align="center"><b style="color:red;">Bill to Party</b></td></tr>
										 <tr>
                                         <td align="right">Name</td><td>
                                       <input type="text" name="bill_name" id="bill_name"  class="form-control">
                                        
                                       </td>
                                        <td align="right">Address</td><td>
                                       
										 <textarea name="bill_addr" class="form-control" placeholder="Bill Party Address"></textarea></td>
                                            
                                        
                                       </td>
                                      
                                        </tr>
										 <tr>
                                         <td align="right">State</td><td>
                                       <select name="state" class="form-control" onChange="showUser(this.value)" required>
                                         <option value="">Select State</option>
                                         <?php $sq=mysqli_query($link,"select * from location_states where cname='India'");
										 while($r=mysqli_fetch_array($sq)){?>
                                         <option value="<?php echo $r['state'];?>"><?php echo $r['state'];?></option>
                                         <?php }?>
										 </select> 
                                       </td>
                                        <td align="right">GSTN</td><td>
                                       
										 <input type="text" name="gstn" id="gstn" required class="form-control">
                                        
                                       </td>
                                      
                                        </tr>
										<tr><td colspan="4" align="center"><b style="color:red;">Ship to Party</b></td></tr>
										 <tr>
                                         <td align="right">Name</td><td>
                                       <input type="text" name="ship_name" id="bill_name"  class="form-control">
                                        
                                       </td>
                                        <td align="right">Address</td><td>
                                       
										 <textarea name="ship_addr" class="form-control" placeholder="Ship Party Address"></textarea></td>
                                            
                                        
                                       </td>
                                      
                                        </tr>
										 <tr>
                                         <td align="right">State</td><td>
                                       <select name="ship_state" class="form-control" onChange="showUser(this.value)" required>
                                         <option value="">Select State</option>
                                         <?php $sq=mysqli_query($link,"select * from location_states where cname='India'");
										 while($r=mysqli_fetch_array($sq)){?>
                                         <option value="<?php echo $r['state'];?>"><?php echo $r['state'];?></option>
                                         <?php }?>
										 </select> 
                                       </td>
                                        <td align="right">GSTN</td><td>
                                       
										 <input type="text" name="ship_gstn" id="ship_gstn" required class="form-control">
                                        
                                       </td>
                                      
                                        </tr>
                                        </table>
                                        
                                    <fieldset style="border:1px solid;">
											
								 <table width="100%" id="TABLE1" border="0">
 <thead>
 <tr><td colspan="4"><br /></td></tr>
  <tr align="center" style="">

  <th class="TH1"></th>
   <th class="TH1"></th>
    <th class="TH1"></th>
 <th class="TH1"> </th>
  
<th class="THH1"><input name="new" type="button" class="butnbg1" value="  +  " onclick="javascript:addRow()">&nbsp; <input name="new2" type="button" class="butnbg1" value="  -  " onclick="javascript:deleteRow()"></th>

 </tr>
 
 <tr align="center" style="background-color:#000; color:#FFF;">

  
   <th class="TH1">HSN/SAC Code</th>
    <th class="TH1">Article/ Service Codes</th>
 <th class="TH1">Description of Material/Service </th>
  <th class="TH1">Qty</th>
    <th class="TH1">UOM</th>
 <th class="TH1">Rate (In Rs) </th>
 <th class="TH1">Base Amount (In Rs)</th>
    <th class="TH1">Service Fee -8% (In Rs)</th>
 <th class="TH1">GST Rate (18 %) </th>
 </tr>
 
  
			
		<br />	
		 
	
		
 <input type="hidden" name="rows1" id="rows1" value="0" onclick="javasript:noitems()"/>	
</thead></table>
<table width="100%"  border="0">
 <thead>
<tbody>
<tr>
	
		
		<th  align="center" colspan="6" style="width:66%"> <b>Total</b> </th><th style="width:12%">
		<input type="text" name="tot_doct_amnt" id="tdramount" placeholder=" Total  Amount" class="form-control tet8" value="0" />
                                               
		</th><th style="width:13%">
		<input type="text" name="tot_tax" id="tot_tax" placeholder=" Total Tax Amount" class="form-control tet8" value="0" />
                                               
		</th><th style="width:9%">
		<input type="text" name="tot_gst" id="tot_gst" placeholder=" Total Gst Amount" class="form-control tet8" value="0" />
        
		</th>
		
		</tr>
		<tr>
	
		
		<th  align="center" colspan="8" style="width:66%"> <b>SGST/UGST Amt (In Rs)</b> </th>
		<th style="width:9%">
		<input type="text" name="sgst" id="tot_gst1" placeholder="SGST/UGST Amt (In Rs)" class="form-control" value="0" />
        
		</th>
		
		</tr>
		<tr>
	
		
		<th  align="center" colspan="8" style="width:66%"> <b>SGST Amt (In Rs)</b> </th>
		<th style="width:9%">
		<input type="text" name="cgst" id="tot_gst2" placeholder="CGST/UGST Amt (In Rs)" class="form-control" value="0" />
        
		</th>
		
		</tr>
		<tr>
	
		
		<th  align="center" colspan="8" style="width:66%"> <b>IGST Amt (In Rs)</b> </th>
		<th style="width:9%">
		<input type="text" name="igst" id="igst" placeholder="IGST/UGST Amt (In Rs)" class="form-control" value="0" />
        
		</th>
		
		</tr>
		
		<tr>
	
		
		<th  align="center" colspan="8" style="width:66%"> <b>Total Amt (In Rs)</b> </th>
		<th style="width:9%">
		<input type="text" name="tot" id="tot" placeholder="Total Amt (In Rs)" class="form-control" value="0" />
        
		</th>
		
		</tr>
		</tbody></thead></table>
			</fieldset>								
									  
                                  
                                         
										
                                          
                                            
                                            
                                            
                                        
                                        <div class="form-group">
                                        <div class="col-md-offset-4 col-md-8">
                                            <button class="btn btn-info" type="submit" name="submit" id="submit">
                                                <i class="ace-icon fa fa-save bigger-110"></i>
                                                Save
                                            </button>

                                            
											&nbsp; &nbsp; &nbsp;
                                           <a href="reffer_list.php"><button class="btn btn-danger" type="button" name="button" id="Close">
                                                <i class="ace-icon fa fa-close bigger-110"></i>
                                                Close
                                            </button></a>
                                        </div>
                                    </div>
                                        </form>
                                        </div></div></div></div></div></div></div>
                                        
                                        
                                        <!--<script src="assets/js/jquery-2.1.4.min.js"></script>-->

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
        <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script> 
        <script src="assets/js/ace-elements.min.js"></script>
        <script src="assets/js/ace.min.js"></script>

        <!-- ace scripts -->
       <!-- <script src="assets/js/ace-elements.min.js"></script>
        <script src="assets/js/ace.min.js"></script>-->
                                        
                                    <!--<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>   
                                    <script src="assets/js/jquery-2.1.4.min.js"></script>-->  
                                      <script type="text/javascript">

function val(str,id)
{
cal=0;

var price=document.getElementById("price"+id).value;
var qty=document.getElementById("qty"+id).value;
var sgst=document.getElementById("sgst"+id).value;
var cgst=document.getElementById("cgst"+id).value;
var gst=Math.abs(sgst)+Math.abs(cgst);
cal=eval(price)*eval(qty);
document.getElementById("amnt"+id).value=Math.abs(cal);	

cal1=eval(price)*eval(qty)*eval(gst)/100;
document.getElementById("gst_amnt"+id).value=Math.abs(cal1);



}</script>
<script>
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
