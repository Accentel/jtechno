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
	document.getElementById("store_code").value=strar[1];	
	document.getElementById("state").value=strar[2];
    document.getElementById("state_code").value=strar[3];
	document.getElementById("addr").value=strar[4];	
	document.getElementById("gst_in").value=strar[5];
	//document.getElementById("seeking_opt").value=strar[6];
	//document.getElementById("po_no").value=strar[7];
	//document.getElementById("allcoation_date").value=strar[8];
	//document.getElementById("last").value=strar[11];
    }
  }
xmlhttp.open("GET","get-apdata2.php?q="+str,true);
xmlhttp.send();
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
                                <a href="bill_list.php"> Billing List</a>
                            </li>
                            <li>
                                <a href="">Edit Billing</a>
                            </li>
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    <div class="page-content">
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                            <h1 align="center">
                                Edit Billing

                            </h1>
                        </div>
                        
                        <?php $id=$_GET['id'];
						$sq=mysqli_query($link,"select * from add_bill1 where id='$id'");
						$r=mysqli_fetch_array($sq);
						
						?>
                        
                        
                        <!-- PAGE CONTENT BEGINS -->
<div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="row">
                                    <div class="col-xs-12">
                                       
 <form name="frm" method="post" action="apbill_suc.php">
 <input type="hidden" name="id" value="<?php echo $id?>">
                                            <table class="table table-striped table-bordered table-hover">
                                           <input type="hidden" name="id" value="<?php echo $id?>">
                                            <table class="table table-striped table-bordered table-hover">
											  <tr><td align="right">Invoice No</td><td align="left">
											  <input  type="text" required  class="form-control" name="inv_no" value="<?php echo $r['inv_no'];?>" id="inv_no"></td>
                                        <td align="right">Invoice Date</td><td><input type="date" required name="inv_date"  value="<?php echo $r['date'];?>" id="inv_date" class="form-control"></td>
                                        </tr>
											
                                            <tr><td align="right">Store Name</td><td align="left">
											 <input id=\"store_name\" list=\"city1\" class="form-control" name="store_name" value="<?php echo $r['store_name'];?>" onblur="showHint22(this.value)" >
<datalist id=\"city1\" >

<?php 
include_once('dbconnection/connection1.php');
$sql="select distinct store_name from dpr ";  // Query to collect records
$r1=mysqli_query($link,$sql) or die(mysql_error());
while ($row=mysqli_fetch_array($r1)) {
echo  "<option value=\"$row[store_name]\"/>"; // Format for adding options 
}
////  End of data collection from table /// 

echo "</datalist>";
include_once('dbconnection/connection.php');
?></td>
<td align="right">Store Code</td><td align="left">
											<input type="text" class="form-control"  value="<?php echo $r['store_code'];?>" id="store_code" name="store_code">
											</td></tr>
                                        
                                        <tr><td align="right">State</td><td align="left"><input  type="text" value="<?php echo $r['state'];?>"  class="form-control" name="state" id="state"></td>
                                        <td align="right">State Code</td><td><input type="text" required name="state_code" value="<?php echo $r['state_code'];?>" id="state_code" class="form-control"></td>
                                        </tr>
                                        
                                         <tr><td align="right">Address</td><td align="left">
										 <textarea name="addr" class="form-control" id="addr" ><?php echo $r['addr'];?></textarea></td>
                                        <td align="right">GSTIN/UIN</td><td><input type="text" name="gst_in" value="<?php echo $r['gst_in'];?>" id="gst_in" required class="form-control"></td>
                                        </tr>
                                        
                                        </table>
                                        <?php  $tt=$r['total_amnt'];
										$tt1=$r['total_sgst'];
										
										?>
                                        
                                        <div class="table-header">
                                         Items  List
                                        </div>
                                        
                                        <?php 
										
										$aa="select * from add_bill where id1='$id'";
$t=mysqli_query($link,$aa) or die(mysqli_error($link));?>

                                        <!-- div.table-responsive -->

                                        <!-- div.dataTables_borderWrap -->
                                        <div>
                                       
                                      
                                          
                                            
                                            
                                            <table id="dynamic-table1" class="table table-striped table-bordered table-hover">
 <tr>
                                             <th>#</th>
                                              
														
													
														  <th> Description</th>
                                                       
                                                      
                                                        <th>HSN<br/> /SAN Code</th>
                                                       
                                                        <th>GST</th>
                                                          <th>UOM</th>
                                                           <th>QTY</th>
                                                        <th>RATE</th>
                                                   
                                                      <th>AMOUNT</th>
													      <th>GST AMOUNT</th>
                                                        <!--<th>HSN</th>
                                                        <th>SAC</th>
                                                        <th>Item Category</th>--></tr>
                                              
											<?php   $id=count($_POST['id']);
											 $id1=$_GET['id'];
											 $aa="select * from add_bill where id1='$id1'";
												$sq=mysqli_query($link,$aa);
												$i=1;
												while($rs1=mysqli_fetch_array($sq)){
												
													?>
                                                    <tr>
                                                    <td><?php echo $i?></td>
                                             
                                                        <td class="hidden-480">
														<input type="hidden" name="id1[]" value="<?php echo $rs1['id']; ?>">
														
														<?php echo $rs1['product_name']; ?>
                                                        <input type="hidden" name="product[]" 
                                                        value="<?php echo $rs1['product_name']; ?>">
                                                        </td>
                                                        <td class="hidden-480"><?php echo $rs1['hsnno']; ?>
                                                         <input type="hidden" name="hsn[]" 
                                                        value="<?php echo $rs1['hsnno']; ?>">
                                                        </td>
                                                        <td><input type="text" name="gst[]" readonly value="<?php echo $rs1['gst']; ?>" class=" txt2"  class="txt" id="gst<?php echo $i?>" /></td>
                                                       <td class="hidden-480"><?php echo $rs1['uom']; ?>
                                                         <input type="hidden" name="uom[]" 
                                                        value="<?php echo $rs1['uom']; ?>">
                                                        </td>
                                                        
                                                         <td><input type="text" name="qty[]" value="<?php echo $rs1['qty'];?>" class=" txt2" id="qty<?php echo $i?>" onkeyup='val(this.value,<?php echo $i?>)' /></td>
                                                        <td class="hidden-480">
                                                        <input type="text" name="price[]" readonly id="price<?php echo $i?>" 
                                                        value="<?php echo $rs1['price']; ?>" class="txt1 kkk txt" onkeyup='val(this.value,<?php echo $i?>)' />
                                                        </td>
														 <td><input type="text" name="amnt[]" readonly value="<?php echo $rs1['total_price'];?>" readonly class="txt7" id="amnt<?php echo $i?>" /></td>
                                                       
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
										<input style="width:60px;" type="text"  placeholder="Total Amount" readonly name="tot" class="txt6" value="<?php echo $tt;?>" id="tot" />+
                                       
									</td>
                                        <td colspan="1">
										<input style="width:60px;" type="text" readonly placeholder="Total Gst" name="tot_gst" class="txt6" value="<?php echo $r['total_gst'];?>" id="tot_gst" />=
									
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
