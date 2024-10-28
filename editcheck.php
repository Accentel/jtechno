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
	 <script src="js/jquery.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>
    <style>
        strong{
            color:red;
        }
    </style>
    <style>
    .frmSearch {
        border: 1px solid #a8d4b1;
        background-color: #c6f7d0;
        margin: 2px 0px;
        padding: 40px;
        border-radius: 4px;
    }

    #country-list {
        float: left;
        list-style: none;
        margin-top: -3px;
        padding: 0;
        width: 190px;
        position: absolute;
    }

    #country-list li {
        padding: 10px;
        background: #f0f0f0;
        border-bottom: #bbb9b9 1px solid;
    }

    #country-list li:hover {
        background: #ece3d2;
        cursor: pointer;
    }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script>
	function s2(i){
	    var curval= document.getElementById("pname"+i).value;
	    alert(i);
	$.ajax({          
        	type: "GET",
        	url: "getkndescriptionauto.php",
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

function showUser(str,id)
{
 $.ajax({
     url: 'get_knitems.php', //This is the current doc
     type: "POST",
     dataType:'text', // add json datatype to get json
     data: ({q: str}),
     success: function(data){
         var strar=data.split(":");
	//document.getElementById("supname").value=strar[2];
	
	//document.getElementById("state").value=strar[1];
	
	//document.getElementById("city").value=strar[2];	
	document.getElementById("serv_num"+id).value=strar[1];	
	document.getElementById("hsn"+id).value=strar[2];
    document.getElementById("gst"+id).value=strar[3];
	//document.getElementById("addr").value=strar[4];	
	document.getElementById("uom"+id).value=strar[4];
	document.getElementById("price"+id).value=strar[5];
	document.getElementById("serv_amt"+id).value=strar[6];
	document.getElementById("product_code"+id).value=strar[7];
	
     }
});
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
	document.getElementById("site_name").value=strar[1];	
	document.getElementById("district").value=strar[2];
    document.getElementById("state").value=strar[3];
	document.getElementById("indus_id").value=strar[4];	
	document.getElementById("seeking_id").value=strar[5];
	document.getElementById("seeking_opt").value=strar[6];
	document.getElementById("po_no").value=strar[7];
	document.getElementById("allcoation_date").value=strar[8];
    }
  }
xmlhttp.open("GET","get-apdata3.php?q="+str,true);
xmlhttp.send();
}
</script>
<script>
function myFunction() {
	var adv=document.getElementById('adv_amnt').value;
	//alert(adv);
	var adv1=document.getElementById('adv_amnt1').value;
	var adv2=document.getElementById('adv_amnt2').value;
	var p=parseFloat(adv)+parseFloat(adv1)+parseFloat(adv2);
	var tot=document.getElementById('tot').value;
	if(tot < p){
alert('your advance amount is greater than total amount');
$("#submit").prop('disabled',true);
	}else{
		$("#submit").prop('disabled',false);
		
	}
}
</script>	
	
	
	
	
	
<script>
 $(document).on('keyup', '.txt1', function(){
 var id=$(this).attr('data-row');
 
 var qty=document.getElementById('qty'+id).value;
 var price=document.getElementById('price'+id).value;
 
 //alert(price);
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
 //alert(sgst);
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
 
 
 function qval(str,id)
{
cal=0;
cal1=0;
cal12=0;
//alert(id);
var price=document.getElementById("price"+id).value;
var qty=document.getElementById("qty"+id).value;
var gst=document.getElementById("gst"+id).value;
var serv_amt=document.getElementById("serv_amt"+id).value;
//var serv_amtk=document.getElementById("serv_amnt"+id).value;
//alert(serv_amtk);

//var cgst=document.getElementById("cgst"+id).value;
//var gst=Math.abs(sgst)+Math.abs(cgst);
cal=eval(price)*eval(qty);
document.getElementById("amnt"+id).value=cal;

//alert(cal);
//document.getElementById("amnt"+id).value+document.getElementById("serv_amtk"+id).value=Math.abs(cal);	
cal12=eval(price)*eval(qty)*eval(serv_amt)/100;
//alert(cal12);
calk=(cal)+(cal12);
//alert(calk);
cal1=eval(calk)*eval(gst)/100;	






//document.getElementById("gst_amnt"+id).value=cal1;
//alert(cal12);
document.getElementById("serv_amnt"+id).value=Math.abs(cal12);	
//document.getElementById("serv_amnt"+id).value=cal12;


document.getElementById("gst_amnt"+id).value=Math.abs(cal1);	

calculateTotal1();
 calculateTotal1k();
 calculateTotal1kk();
 calculateTotal1kv();

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
                                <a href="#">KN Quotations</a>
                            </li>
                            <li>
                                <a href="knqot_list.php"> KN Quotations List</a>
                            </li>
                            <li>
                                <a href="">Edit KN Quotations</a>
                            </li>
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    <div class="page-content">
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                            <h1 align="center">
                                Edit KN Quotations

                            </h1>
                        </div>
                        
                      
                        
                 <?php  $id=$_GET['id'];
						$sq=mysqli_query($link,"select * from add_knqot where id='$id'");
						$r=mysqli_fetch_array($sq);
						$rono=$r['ro_no'];
						?>             <!-- PAGE CONTENT BEGINS -->
<div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="row">
                                    <div class="col-xs-12">
                                       
 <form name="frm" method="post" action="knqot_suc.php" enctype="multipart/form-data">
 <input type="hidden" name="ids" value="<?php echo $id?>">
  <input type="hidden" name="ses" value="<?php echo $name;?>">
                                            <table class="table table-striped table-bordered table-hover">
											
											  <tr><td align="right">QuoteNumber</td><td align="left">
											  <input  type="text"  class="form-control" value="<?php echo $r['quet_num'];?>"  name="qt_no" id="qt_no"></td>
                                        <td align="right">Quote Date</td><td><input type="text" value="<?php echo $r['inv_date'];?>" <?php if($rono!=''){ echo 'readonly'; }else { echo '';} ?>   name="inv_date" id="inv_date" class="form-control"></td>
                                        </tr>
											
                                            <tr>
											
											<td align="right">Store Code</td><td align="left">
											
											 <input id=\"store_code\" list=\"city1\"  <?php if($rono!=''){ echo 'readonly'; }else { echo '';} ?> class="form-control" name="store_code" value="<?php echo $str=$r['store_code'];?>" onblur="showHint22(this.value)" >
<datalist id=\"city1\" >

<?php 
include_once('dbconnection/connection1.php');
$sql="select distinct store_code from dpr where state='KN' ";  // Query to collect records
$r1=mysqli_query($link,$sql) or die(mysqli_error($link));
while ($row=mysqli_fetch_array($r1)) {
echo  "<option value=\"$row[store_code]\"/>"; // Format for adding options 
}
////  End of data collection from table /// 

echo "</datalist>";
include_once('dbconnection/connection.php');
$a="select * from dpr where store_code='$str'";
	$ssq=mysqli_query($link,$a);
	$r2=mysqli_fetch_array($ssq);
?>
											</td>
											
										<td align="right">Store Name</td><td align="left">
											<input type="text" class="form-control"  value="<?php echo $r2['store_name'];?>" id="store_name" name="store_name" <?php if($rono!=''){ echo 'readonly'; }else { echo '';} ?>>
											
											</td>
</tr>
                                        
                                        <tr><td align="right">State</td><td align="left"><input <?php if($rono!=''){ echo 'readonly'; }else { echo '';} ?>  type="text" value="<?php echo $r2['state'];?>"  class="form-control" name="state" id="state"></td>
                                        <td align="right">State Code</td><td><input type="text"  name="state_code" value="<?php echo $r2['state_code'];?>" id="state_code" <?php if($rono!=''){ echo 'readonly'; }else { echo '';} ?> class="form-control"></td>
                                        </tr>
                                        
										
										 <tr><td align="right">Store Type</td><td align="left">
										 <input  type="text" value="<?php echo $r2['format_type'];?>"  class="form-control" name="store_type" id="store_type" <?php if($rono!=''){ echo 'readonly'; }else { echo '';} ?>></td>
                                        <td align="right">Company Name</td><td>
										<input type="text" required name="company" id="company" value="<?php echo $r2['company_name'];?>" <?php if($rono!=''){ echo 'readonly'; }else { echo '';} ?> class="form-control"></td>
                                        </tr>
										
										
										 <tr><td align="right">Supervisor</td><td align="left">
										 <input  type="text"   class="form-control"  value="<?php echo $r2['superwisor'];?>" <?php if($rono!=''){ echo 'readonly'; }else { echo '';} ?> name="supervisor" id="supervisor"></td>
                                        <td align="right">Coordinator</td><td>
										<input type="text" required name="cordinator" id="cordinator" value="<?php echo $r2['coordinator'];?>" class="form-control" <?php if($rono!=''){ echo 'readonly'; }else { echo '';} ?>></td>
                                        </tr>
										
                                         <tr><td align="right">AFM</td><td align="left">
										<input type="text" required name="afm" id="afm" value="<?php echo $r2['afm'];?>" class="form-control" <?php if($rono!=''){ echo 'readonly'; }else { echo '';} ?>></td>
                                        <td align="right">GSTIN/UIN</td><td><input type="text" name="gst_in" id="gst_in" value="<?php echo $r2['gst_in'];?>" <?php if($rono!=''){ echo 'readonly'; }else { echo '';} ?>  class="form-control"></td>
                                        </tr>
										
										   <tr><td align="right">FM Fault No</td><td align="left">
										<input type="text" required name="falt_no" id="falt_no" value="<?php echo $r['falt_no'];?>" class="form-control"></td>
                                        <td align="right">FM Fault date</td><td><input type="text" name="falt_date" 
										id="falt_date" required class="form-control" value="<?php echo $r['falt_date'];?>"   <?php if($rono!=''){ echo 'readonly'; }else { echo '';} ?>    ></td>
                                        </tr>
										
										   <tr><td align="right">Fault Description</td><td align="left">
										<textarea  required name="falt_desc" id="falt_no" class="form-control" <?php if($rono!=''){ echo 'readonly'; }else { echo '';} ?>><?php echo $r['falt_desc'];?></textarea></td>
										<td align="right">Format Type</td><td align="left">
										<input type="text" required name="frm_type" id="frm_type" class="form-control" value="<?php echo $r['frm_type'];?>" /></td>
                                        
                                        
                                       
                                        </tr>
										 <tr><td align="right">Type of Work</td><td align="left">
										<input type="text" <?php if($rono!=''){ echo 'readonly'; }else { echo '';} ?> name="type_of_work" 
										id="type_of_work"  class="form-control" value="<?php echo $r['type_of_work'];?>"></td>	
                                        <td align="right">Sub Type</td><td><input type="text" name="sub_type" 
										id="sub_type" <?php if($rono!=''){ echo 'readonly'; }else { echo '';} ?>  class="form-control" value="<?php echo $r['sub_type'];?>"></td>
                                        </tr>
                                        <tr><td colspan="2"><b>Before Images</b></td></tr>
										<tr>
                                        <td align="right">Image1 </td><td>
										<input type="file" name="image">
										<input type="hidden" name="img1" value="<?php echo $r['img1'];?>">
										<input type="hidden" name="img2" value="<?php echo $r['img2'];?>">
										<input type="hidden" name="img3" value="<?php echo $r['img3'];?>">
											<input type="hidden" name="img4" value="<?php echo $r['img4'];?>">
										<input type="hidden" name="img5" value="<?php echo $r['img5'];?>">
										<input type="hidden" name="img6" value="<?php echo $r['img6'];?>">
										
										<img src="<?php echo $r['img1'];?>" onclick="window.open('knqut_image.php?id=<?php echo $r['img1'];?>','mywindow','width=700,height=500,toolbar=no,menubar=no,scrollbars=yes')" style="width:50px; height:50px;">
										</td>
										<td align="right">Image2</td><td align="left">
										<input type="file" name="imagea">
										<img src="<?php echo $r['img2'];?>" onclick="window.open('knqut_image.php?id=<?php echo $r['img2'];?>','mywindow','width=700,height=500,toolbar=no,menubar=no,scrollbars=yes')" style="width:50px; height:50px;"></td>
                                        </tr>
										<tr>	
                                        <td align="right">Image3 </td><td>
										<input type="file" name="imageb">
										<img src="<?php echo $r['img3'];?>" onclick="window.open('knqut_image.php?id=<?php echo $r['img3'];?>','mywindow','width=700,height=500,toolbar=no,menubar=no,scrollbars=yes')" style="width:50px; height:50px;">
										</td>
                                        </tr>
                                    <tr><td colspan="2"><b>After Images</b></td></tr>
                                    	<tr>
                                        <td align="right">Image4 </td><td>
										<input type="file" name="image4">
									
										
										<img src="<?php echo $r['img4'];?>" onclick="window.open('knqut_image.php?id=<?php echo $r['img4'];?>','mywindow','width=700,height=500,toolbar=no,menubar=no,scrollbars=yes')" style="width:50px; height:50px;">
										</td>
										<td align="right">Image5</td><td align="left">
										<input type="file" name="image5">
										<img src="<?php echo $r['img5'];?>" onclick="window.open('knqut_image.php?id=<?php echo $r['img5'];?>','mywindow','width=700,height=500,toolbar=no,menubar=no,scrollbars=yes')" style="width:50px; height:50px;"></td>
                                        </tr>
										<tr>	
                                        <td align="right">Image6 </td><td>
										<input type="file" name="image6">
										<img src="<?php echo $r['img6'];?>" onclick="window.open('knqut_image.php?id=<?php echo $r['img6'];?>','mywindow','width=700,height=500,toolbar=no,menubar=no,scrollbars=yes')" style="width:50px; height:50px;">
										</td>
                                        </tr>
                                        
                                    
                                    
                                    
                                        </table>
                                        <?php  $tt=$r['total_amnt'];
										$tt1=$r['total_sgst'];
											$tft=$r['total_amnt']+$r['total_gst'];
										?>
									
                                        
                                        <div class="table-header">
                                         Items  List
                                        </div>
                                        
                                     
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
														<th>Sno</th>
                                                       <td>Code</td>
                                                        <th> Description</th>
                                                        <th>Primary<br/> UOM Code</th>
                                                        <th>Qunty</th>
                                                        <th>List Price<br/> Per Unit</th>
                                                          <th>SGST</th>
                                                           <th>CGST</th>
                                                        <th>Taxable Amount</th>
                                                       
                                                      <th>HSN</th>
                                                        <th>SAC</th>
                                                        <th>SGST Amount</th>
														 <th>GST Amount</th>
														</tr>
														<tbody>
                                                        <!--<th>HSN</th>
                                                        <th>SAC</th>
                                                        <th>Item Category</th>-->
                                              
											<?php   //$id=count($_POST['id']);
											 $aa="select * from add_goabill where id1='$id'";
											/* $aa="select b.id,a.item_desc,a.item_code,a.primary_uom,b.qty,b.price
											 ,b.tax_amnt,b.gst_amnt,b.sgst,b.cgst
 from add_bill b,products a where b.service_no='$service_no' and b.item_code=a.item_code";*/
												$sq=mysqli_query($link,$aa);
												$i=1;
												while($rs1=mysqli_fetch_array($sq)){
												
													?>
                                                    <tr>
													<td>	</td>
													<td><?php echo $i;?> <input type="hidden" name="cnt" id="cnt" value="<?php echo $cnt; ?>"></td>
                                                    <td width="20px;">
							<input type="text" name="sno[]" style="width:30px;" value="<?php echo $rs1['sno']; ?>">
							<input type="hidden" name="id1[]" style="width:30px;" value="<?php echo $rs1['id1']; ?>">
							<input type="hidden" name="id5[]" style="width:30px;" value="<?php echo $rs1['id']; ?>">
													
													</td>
													<td class="hidden-480"><input type="text" name="item_code[]" style="width:100px;" value="<?php echo $rs1['item_code']; ?>"></td>
                                                        <td class="hidden-480">
														
                            <input type="text" name="item_desc[]" style="width:100px;" value="<?php echo $rs1['item_desc']; ?>">
                                                        </td>
                                                        
                                                        <td class="hidden-480">
							<input type="text" name="uom[]" value="<?php echo $rs1['uom']; ?>" style="width:70px;">
														</td>
                                                        
                                                        <td>
							<input type="text" name="qty[]" value="<?php echo $rs1['qty']; ?>" style="width:60px;" data-row="<?php echo $i?>" class="" id="qty<?php echo $i?>" onkeyup='val(this.value,<?php echo $i?>)' /> 
														</td>
                                                        <td class="hidden-480">
                            <input type="text" name="price[]" id="price<?php echo $i?>" style="width:70px;" data-row="<?php echo $i?>" value="<?php echo $rs1['price']; ?>" class="txt1" onkeyup='val(this.value,<?php echo $i?>)' />
                                                        </td>
                                                       <td>
						<input type="text" name="sgst[]" value="<?php echo $rs1['sgst']; ?>" style="width:60px;" class="txt20"  data-row="<?php echo $i?>"  id="sgst<?php echo $i?>" />
														</td>
														<td>
						<input type="text" name="cgst[]" value="<?php echo $rs1['cgst']; ?>" style="width:60px;" class="txt21" data-row="<?php echo $i?>"    id="cgst<?php echo $i?>" />
														</td>
                                                        
                                                        <td>
						<input type="text" name="amnt[]" value="<?php echo $rs1['tax_amnt']; ?>" style="width:60px;" readonly class="txt" data-row="<?php echo $i?>" id="amnt<?php echo $i?>" />
														</td>
                                                       <td>
						<input type="text" name="hsn[]" value="<?php echo $rs1['hsnno']; ?>" style="width:50px;" class="" id="hsn<?php echo $i?>" />	   
													   </td>
                                                         <td>
						<input type="text" name="sac[]" value="<?php echo $rs1['sacno']; ?>" style="width:50px;" class="" id="sac<?php echo $i?>" />   
													   </td>
                                                        <td>
						<input type="text" name="sgstamt[]" value="<?php echo $rs1['sgstamount']; ?>" readonly style="width:60px;" class="txt50" id="sgstamt<?php echo $i?>" />   
													   </td>
                                                        <td>
						<input type="text" name="cgstamt[]" value="<?php echo $rs1['cgstamount']; ?>" style="width:60px;" readonly class="txt51" id="cgstamt<?php echo $i?>" />   
													   </td>
                                                       <?php /*?>  <input type="hidden" name="gst[]" readonly  value="<?php echo $rs1['cgst']; ?>" id="gst<?php echo $i?>" /><?php */?>
                                                      
                                                      

                                                      
                                                      
                                                     
                                                        </tr>
                                                        
                                                    
                                                    <?php 
													
											$i++;
											}
											 //$id=$_POST['id'];
											
									?>
                                        <tr><td colspan="10" align="right"><strong>Total Amount</strong></td>
                                        <td colspan="1"><strong><input style="width:60px;" type="text" readonly name="tot" value="<?php echo $tt;?>" id="tot" />
                                        <input type="hidden" name="tot1" id="tot1" value="<?php echo $tt1?>" />
                                        </strong></td>
										<td colspan="2"></td>
										<td colspan=""><input style="width:60px;" type="text" readonly name="totsgst" value="<?php echo $r['total_sgst'];?>" id="sgsttotal" /></td>
										
										<td colspan=""><input style="width:60px;" type="text" readonly name="totcgst" value="<?php echo $r['total_cgst'];?>" id="cgsttotal" /></td>
										</tr>
											<tr><td colspan="10" align="right"><strong>Total Fianl Amount</strong></td>
                                        <td colspan="1" ><strong><input style="width:70px;"  type="text" readonly name="tft" value="<?php echo $tft;?>" id="tft" />
                                      
                                        </strong></td>
										
										</tr>
										</tbody>
                                        </table>
                                        </div>
                                        <div class="form-group">
                                        <div class="col-md-offset-4 col-md-8">
                                          
                                        
                                            <button class="btn btn-info" type="submit" name="update" id="submit">
                                                <i class="ace-icon fa fa-save bigger-110"></i>
                                                Update
                                            </button>

                                            
											&nbsp; &nbsp; &nbsp;
                                           <a href="goabill_list.php"><button class="btn btn-danger" type="button" name="button" id="Close">
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
var i=100;

$(".addmore").on('click',function(){
    i++; 
	var data ="<tr>";
    data +="<td><input type='checkbox' class='case'/></td>";
	data +="<td>"+i+"</td>"; 
    data +="<td><input type='hidden' name='id1[]' id='id1"+i+"' style='width:30px;' data-row='"+i+"' value='<?php echo $id ?>'><input type='hidden' name='id5[]' id='id5"+i+"' style='width:30px;' data-row='"+i+"' value=''><input data-row='"+i+"' type='text' name='sno[]' id='sno"+i+"' style='width:30px;' value=''></td>";          
    data +="<td><input type='text' name='item_code[]' style='width:100px;' data-row='"+i+"' value=''></td>";
	data +="<td> <input type='text' name='item_desc[]' style='width:100px;' data-row='"+i+"' value=''></td>";          
    data +="<td><input type='text' name='uom[]' id='uom"+i+"' value='' style='width:70px;' data-row='"+i+"'></td>";
	data +="<td><input type='text' name='qty[]'  data-row='"+i+"' value='' style='width:60px;' class=' ' id='qty"+i+"' onkeyup='val(this.value)' /> </td>"; 
	data +="<td><input type='text' name='price[]' data-row='"+i+"' id='price"+i+"' style='width:70px;' value='' class='txt1 ' onkeyup='val(this.value,"+i+")' /></td>";
    data +="<td> <input type='text' name='sgst[]' data-row='"+i+"'  value='' style='width:60px;' class='txt20'   id='sgst"+i+"' /></td>";          
    data +="<td><input type='text' name='cgst[]' data-row='"+i+"' value='' style='width:60px;' class='txt21'    id='cgst"+i+"' /></td>";
   
   data +="<td><input type='text' name='amnt[]' data-row='"+i+"' value='' style='width:60px;' readonly class='txt' id='amnt"+i+"' /> </td>";          
    data +="<td><input type='text' name='hsn[]' value='' style='width:50px;'  id='hsn' />	   </td>";
	data +="<td> <input type='text' name='sac[]' value='' style='width:50px;'  id='sac' />   </td>";          
    data +="<td><input type='text' name='sgstamt[]' data-row='"+i+"' value='' readonly style='width:60px;' class='txt50'  id='sgstamt"+i+"' /></td>";
   data +="<td><input type='text' name='cgstamt[]' data-row='"+i+"' value='' style='width:60px;' readonly  class='txt51' id='cgstamt"+i+"' /></td>";
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

$(".delete").on('click', function() {
	$('.case:checkbox:checked').parents("tr").remove();
	$('#check_all').prop("checked", false); 
	calculateTotal1();
	calculateTotal2();
	calculateTotal3();
});

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