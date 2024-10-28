<?php //include('config.php');
session_start();
$stn="dashboard";
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
                                <a href="#">Employee</a>
                            </li>
                            <li>
                                <a href="#">Assign User</a>
                            </li>
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    <div class="page-content">	
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                            <h1 align="center">
                                Assign User

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
                                    <div class="col-xs-6">
                                       
 <form name="frm" method="post" id="register-form" action="" enctype="multipart/form-data">
                     
                                            <table class="table table-striped table-bordered table-hover">
                                                
                                               
										 
                                                
                                            <tr>
                                                 <td align="right">Current User</td>
                                                 <td>
                                            <select name="cuser" id="cuser" required  class="form-control">
                                        <option value="">Select User Name</option>
                                        <?php
                                        $u=mysqli_query($link,"select * from admin_login") or die(mysqli_error($link));
                                        while($u1=mysqli_fetch_array($u)){ 
                                        ?>
                                        
                                        <option value="<?php echo $u1['user'] ?>"><?php echo $u1['user'] ?></option>
                                        <?php }?>
                                        </select>
										 </td>
										 </tr>
										
                                        
                                      
                                      
										 <tr>
                                         <td align="right">AssignUser </td><td>
                                        <select name="auser" id="auser" required  class="form-control">
                                        <option value="">Select User Name</option>
                                        <?php
                                        $u=mysqli_query($link,"select * from admin_login") or die(mysqli_error($link));
                                        while($u1=mysqli_fetch_array($u)){ 
                                        ?>
                                        
                                        <option value="<?php echo $u1['user'] ?>"><?php echo $u1['user'] ?></option>
                                        <?php }?>
                                        </select>
                                        
                                       </td>
                                     
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
                                        
                                        <?php 
                                        if(isset($_POST['submit'])){
                                            $auser=$_POST['auser'];
                                            $cuser=$_POST['cuser'];
                                         
                                              $t="update add_qot set ses='$auser' where ses='$cuser'";
                                                $a=mysqli_query($link,$t) or die(mysqli_error($link));
                                               
                                               $t1="update qot_bill set user='$auser' where user='$cuser'";
                                            $a1=mysqli_query($link,$t1) or die(mysqli_error($link));
                                               
                                                 $t2="update request_amnt set user='$auser' where user='$cuser'";
                                            $a2=mysqli_query($link,$t2) or die(mysqli_error($link));
                                               
                                                $t3="update payment set user='$auser' where user='$cuser'";
                                            $a3=mysqli_query($link,$t3) or die(mysqli_error($link));
                                               
                                        $t4="update add_tgqot set ses='$auser' where ses='$cuser'";
                                                $a4=mysqli_query($link,$t4) or die(mysqli_error($link));
                                                
                                              $t5="update tgqot_bill set user='$auser' where user='$cuser'";
                                            $a5=mysqli_query($link,$t5) or die(mysqli_error($link));
                                                
                                                 $t6="update tgrequest_amnt set user='$auser' where user='$cuser'";
                                            $a6=mysqli_query($link,$t6) or die(mysqli_error($link));
                                                
                                                $t7="update tgpayment set user='$auser' where user='$cuser'";
                                            $a7=mysqli_query($link,$t7) or die(mysqli_error($link));
                                                
                                         
                                               $t8="update add_klqot set ses='$auser' where ses='$cuser'";
                                                $a8=mysqli_query($link,$t8) or die(mysqli_error($link));
                                               
                                              $t9="update klqot_bill set user='$auser' where user='$cuser'";
                                            $a9=mysqli_query($link,$t9) or die(mysqli_error($link));
                                               
                                            $t10="update klrequest_amnt set user='$auser' where user='$cuser'";
                                            $a10=mysqli_query($link,$t10) or die(mysqli_error($link));
                                                
                                                $t11="update klpayment set user='$auser' where user='$cuser'";
                                            $a11=mysqli_query($link,$t11) or die(mysqli_error($link));
                                                
                                          
                                               $t12="update add_tnqot set ses='$auser' where ses='$cuser'";
                                                $a12=mysqli_query($link,$t12) or die(mysqli_error($link));
                                                
                                              $t13="update tnqot_bill set user='$auser' where user='$cuser'";
                                            $a13=mysqli_query($link,$t13) or die(mysqli_error($link));
                                               
                                                 $t14="update tnrequest_amnt set user='$auser' where user='$cuser'";
                                            $a14=mysqli_query($link,$t14) or die(mysqli_error($link));
                                                
                                                echo $t15="update tnpayment set user='$auser' where user='$cuser'";
                                            $a15=mysqli_query($link,$t15) or die(mysqli_error($link));
                                               
                                          
                                          
	
	
	
	                                        
	                                            print "<script>";
                                                print "alert('Successfully Uploaded ');";
                                                print "self.location='assignusernames.php';";
                                                print "</script>";
	                                    
	
	
	
                                        }
                                        
                                        ?>
                                        
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
