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
                                <a href="#">Indus Billing </a>
                            </li>
                            <li>
                                <a href="#">Add Allocation </a>
                            </li>
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    <div class="page-content">	
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                            <h1 align="center">
                                Add Allocation

                            </h1>
                        </div>
                        
                         <script>
                         function postate(str){
                             
                             if(str=="yes"){
                                 //alert(str);
                                 document.getElementById('preceived').style.display="";
                                 document.getElementById('preceived1').style.display="";
                             }else{
                                  document.getElementById('preceived').style.display="none";
                                  document.getElementById('preceived1').style.display="none";
                             }
                         }
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
	
	document.getElementById("customer").value=strar[1];	
	document.getElementById("custid").value=strar[2];
    document.getElementById("sitename").value=strar[3];
	
	document.getElementById("district").value=strar[4];
	document.getElementById("towertype").value=strar[5];
	
	document.getElementById("srtype").value=strar[6];

    }
  }
xmlhttp.open("GET","get-indusid.php?q="+str,true);
xmlhttp.send();
}
</script>
                     <?php
                     if(isset($_POST['submit'])){
                         $id=$_POST['id'];
                            $indusid=$_POST['indusid'];
                            $allocationdetails=$_POST['allocationdetails'];
                            $prno=$_POST['prno'];
                            $prvalue=$_POST['prvalue'];
                            $postatus=$_POST['postatus'];
                            $received=$_POST['received'];
                            $pono=$_POST['pono'];
                            $qry=mysqli_query($link,"update  allocations set indusid='$indusid',allocationdetails='$allocationdetails',prno='$prno',prvalue='$prvalue',received='$received',pono='$pono' where id='$id'");
                            if($qry){
                                print "<script>";
                            	print "alert('Successfully Updated ');";
                            	print "self.location='wp_list.php';";
                            	print "</script>";
                            }
                 
                            }else{
                                $id=$_REQUEST['id'];
                                $t=mysqli_query($link,"select * from allocations where id='$id'") or die(mysqli_error($link));
                                $t1=mysqli_fetch_array($t);
                                $postatus=$t1['received'];
                                $indusid=$t1['indusid'];
                                $mu=mysqli_query($link,"select * from sites where indusid='$indusid'") or die(mysqli_error($link));
                                $p1=mysqli_fetch_array($mu);
                            }
                     
                     ?>   
                        
                        <!-- PAGE CONTENT BEGINS -->
<div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="row">
                                    <div class="col-xs-12">
                                       
 <form name="frm" method="post" id="register-form" action="">
                                            <table class="table table-striped table-bordered table-hover">
                                            <tr> <td align="right">Indus Id </td><td>
										
										 <input id=\"store_code\" list=\"city1\" value="<?php echo $indusid ?>" required class="form-control" name="indusid" onChange="showHint22(this.value)" >
<datalist id=\"city1\" >

<?php 

$sql="select distinct indusid from sites  ";  // Query to collect records
$r1=mysqli_query($link,$sql) or die(mysql_error());
while ($row=mysqli_fetch_array($r1)) {
echo  "<option value=\"$row[indusid]\"/>"; // Format for adding options 
}
////  End of data collection from table /// 

echo "</datalist>";
										 
		?>								 
										 
										 </td>
                                           <td align="right">Customer</td><td>
                                          <input type="text" name="customer" id="customer" value="<?php echo $p1['customer'] ?>" required class="form-control">
                                        
                                       </td></tr>
                                        
                                        <tr>
                                         <td align="right">Customer Site Id</td><td>
                                        <input type="text" name="custid" id="custid" required class="form-control" value="<?php echo $p1['cust_site_id'] ?>">
                                        
                                       </td>
                                        <td align="right">Site Name</td><td>
                                        <input type="text" name="sitename" id="sitename" required class="form-control" value="<?php echo $p1['sitename'] ?>">
                                        
                                       </td>
                                      
                                        </tr>
										  <tr>
                                         <td align="right">District</td><td>
                                        <input type="text" name="district" id="district" required class="form-control" value="<?php echo $p1['district'] ?>">
                                        
                                       </td>
                                        <td align="right">Tower Type</td><td>
									<input type="text" name="towertype" id="towertype" required class="form-control" value="<?php echo $p1['towertype'] ?>">
                                       <!-- <input type="text" name="comp_name" id="comp_name" required class="form-control">
                                        -->
                                       </td>
                                      
                                        </tr>
                                      
										
										
										
										 <tr>
                                         <td align="right">SR Type</td><td>
                                        <input type="text" name="srtype" id="srtype"  class="form-control" value="<?php echo $p1['srtype'] ?>">
                                          <input type="hidden" name="id" id="id"  class="form-control" value="<?php echo $t1['id'] ?>">
                                       </td>
                                        
                                      <td align="right">Allocation Details</td><td>
                                        <textarea  name="allocationdetails" id="allocationdetails"  class="form-control"><?php echo $t1['allocationdetails'] ?></textarea>
                                        
                                       </td>
                                        </tr>
										
                                     <tr>
                                         <td align="right">Pr No</td><td>
                                        <input type="text" name="prno" id="prno"  class="form-control" value="<?php echo $t1['prno'] ?>">
                                        
                                       </td>
                                        
                                      <td align="right">PR Value</td><td>
                                        <input type="text"  name="prvalue" id="prvalue"  class="form-control" value="<?php echo $t1['prvalue'] ?>"/>
                                        
                                       </td>
                                        </tr>
									
                                         <tr>
                                         
                                        
                                      <td align="right">Po Status Received</td><td>
                                        <select   name="received" id="received"  class="form-control" onchange="postate(this.value)">
                                            <option value="">Select</option>
                                            <option value="yes" <?php if($postatus=="yes"){ echo 'selected';} ?>>Yes</option>
                                            <option value="no" <?php if($postatus=="no"){ echo 'selected';} ?>>No</option>
                                            </select>
                                        
                                       </td>
                                       <td align="right" id="preceived" style="display:none;">Po No</td>
                                       <td id="preceived1" style="display:none;"><input type="text" name="pono" id="pono" value="<?php echo $t1['pono'] ?>"  class="form-control"></td>
                                       </tr>
                                        
                                        </table>
                                        
                                    
                                        <div class="form-group">
                                        <div class="col-md-offset-4 col-md-8">
                                            <button class="btn btn-info" type="submit" name="submit" id="submit">
                                                <i class="ace-icon fa fa-save bigger-110"></i>
                                                Save
                                            </button>

                                            
											&nbsp; &nbsp; &nbsp;
                                           <a href="dashboard.php"><button class="btn btn-danger" type="button" name="button" id="Close">
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
