<?php //include('config.php');
session_start();
//include('dbconnection/connection.php');
if($_SESSION['user'])
{
$name=$_SESSION['user'];
//include('org1.php');
//$y=mysqli_query($link,"select * from employee where emp_name='$name'");
//$y1=mysqli_fetch_array($y);
//$email=$y1['emp_email'];

//include'dbfiles/org.php';
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
                                <a href="#">Quotations List</a>
                            </li>
                          
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    
                        <!-- PAGE CONTENT BEGINS -->
<div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="row">
                                    <div class="col-xs-12">
									<!--<a href="addbill.php"><button type="button" class="btn-success btn-sm ">Add New</button></a>-->
                                       

                                        
                                        <div class="table-header">
                                        Quotations List
                                        </div>

                                        <!-- div.table-responsive -->
<div style="height:15px; margin-bottom:20px;">
<!--<button class="btn btn-info" type="submit" name="bsearch" onclick="javascript:location.href='add_qot1.php'" id="bsearch">
                                               
                                                Add New
        <br />                                    </button>-->
 </div>
 <form method="post" action="" class="form-horizontal">
										
							<div class="form-group">
				
				
						
                     <div class="col-sm-6">
                  
                <input type="text" class="form-control pull-right" id="search" required name="search" placeholder="Search By Quotation No  or FM Fault No or status">
                  </div>
				   <div class="col-sm-3">
                  
               <button class="btn btn-info" type="submit" name="bsearch" id="bsearch">
                                                <i class="ace-icon fa fa-search bigger-110"></i>
                                                Search
                                            </button>
                  </div>
				  <!--<div class="col-sm-2"><b><a href="qut_tg_excel.php" class="btn btn-primary btn-xs">XL Download</a></b></div>
				    <div class="col-sm-1"><b>
					 <a onclick="window.open('qut_tg_print.php','mywindow','width=700,height=500,toolbar=no,menubar=no,scrollbars=yes')"
												   class="btn btn-primary btn-xs">
					
					
					Print</a></b></div>-->
				</div>
										
										</form>	
										
										 <!--<form method="post" action="" class="form-horizontal">
										
										<div class="form-group">
				
				
						<div class="col-sm-1"></div>
                    <div class="col-sm-8">
                  
                <input type="text" class="form-control pull-right" id="search" name="search" placeholder="Search By Service No or date(yyyy-mm-dd) ">
                  </div>
				   <div class="col-sm-3">
                  
               <button class="btn btn-info" type="submit" name="bsearch" id="bsearch">
                                                <i class="ace-icon fa fa-search bigger-110"></i>
                                                Search
                                            </button>
                  </div>
				</div>
										
										</form>-->
                                        <!-- div.dataTables_borderWrap -->
                                        <div>
                                        
                                  
                                        
                                            <table id="sample-table1" class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <!--<th class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>-->
                                                        <th>S No</th>
                                                        
                                                         
                                                        <th>Quotation No</th>
                                                         <th>Store Code</th>
                                                        <th>Store Name</th>
														
														<th>Coordinator Name</th>
                                                        <th>Super Wisor</th>
                                                         <th>City</th>
														  <th>Date</th>
														  <th>Status</th>
                                                        <th>Bill of Supply</th>
															 <th>Miscllenious</th>
													 <!--<th>Edit</th>
													 <th>Email</th>
														     <th>Print</th> <th>Quotation</th>
														 <th>Pdf Download</th>-->
                                                        
                                                      
                                                      
                                                    </tr>
                                                    <?php 
 $c="select * from employee where username='$name'";
$y=mysqli_query($link,$c);
$y1=mysqli_fetch_array($y);
  $email=$y1['emp_name'];

//include'dbfiles/org.php';
//include'dbfiles/iqry_acyear.php';
   $a="select * from dpr where superwisor='$email'";
$ssq=mysqli_query($link,$a);
$r1=mysqli_fetch_array($ssq);
$store_codeh=$r1['store_code'];
?>
													<form name="frm" method="post" >
													  <tr>
                                                        <!--<th class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>-->
                                                        <th></th>
                                                        
                                                        <th></th>
                                                        <th><input id=\"store_code\" list=\"city23\" name="store_code" class="form-control" placeholder="Store Code" >
<datalist id=\"city23\" >

<?php  
$sql="SELECT distinct store_code FROM add_qot2";
  // Query to collect records
$r=mysqli_query($link,$sql) or die(mysqli_error());
while ($row=mysqli_fetch_array($r)) {
echo  "<option value=\"$row[store_code]\"/>"; // Format for adding options 
}
////  End of data collection from table /// 

echo "</datalist>";?></datalist></th>
                                                        <th><input id=\"store_name\" list=\"city24\" name="store_name" class="form-control" placeholder="Store Name" >
<datalist id=\"city24\" >

<?php  
$sql="SELECT distinct a.store_name FROM add_qot2 b,dpr a where b.store_code=a.store_code";
  // Query to collect records
$r=mysqli_query($link,$sql) or die(mysqli_error());
while ($row=mysqli_fetch_array($r)) {
echo  "<option value=\"$row[store_name]\"/>"; // Format for adding options 
}
////  End of data collection from table /// 

echo "</datalist>";?></datalist></th>
														
														<th><input id=\"coordinator\" list=\"city25\" name="coordinator" class="form-control" placeholder="Coordinator Name" >
<datalist id=\"city25\" >

<?php  
$sql="SELECT distinct a.coordinator FROM add_qot2 b,dpr a where b.store_code=a.store_code";
  // Query to collect records
$r=mysqli_query($link,$sql) or die(mysqli_error());
while ($row=mysqli_fetch_array($r)) {
echo  "<option value=\"$row[coordinator]\"/>"; // Format for adding options 
}
////  End of data collection from table /// 

echo "</datalist>";?></datalist></th>
                                                       <th><input id=\"superwisor\" list=\"city26\" name="superwisor" class="form-control" placeholder="superwisor Name" >
<datalist id=\"city26\" >

<?php  
$sql="SELECT distinct a.superwisor FROM add_qot2 b,dpr a where b.store_code=a.store_code";
  // Query to collect records
$r=mysqli_query($link,$sql) or die(mysqli_error());
while ($row=mysqli_fetch_array($r)) {
echo  "<option value=\"$row[superwisor]\"/>"; // Format for adding options 
}
////  End of data collection from table /// 

echo "</datalist>";?></datalist></th>
                                                        <th><input id=\"city\" list=\"city27\" name="city" class="form-control" placeholder="City Name" >
<datalist id=\"city27\" >

<?php  
$sql="SELECT distinct a.city FROM add_qot2 b,dpr a where b.store_code=a.store_code";
  // Query to collect records
$r=mysqli_query($link,$sql) or die(mysqli_error());
while ($row=mysqli_fetch_array($r)) {
echo  "<option value=\"$row[city]\"/>"; // Format for adding options 
}
////  End of data collection from table /// 

echo "</datalist>";?></datalist></th>
														  <th></th>
														<th><input id=\"status\" list=\"city28\" name="status" class="form-control" placeholder="Status" >
<datalist id=\"city28\" >

<?php  
$sql="SELECT distinct status FROM add_qot2 ";
  // Query to collect records
$r=mysqli_query($link,$sql) or die(mysqli_error());
while ($row=mysqli_fetch_array($r)) {
echo  "<option value=\"$row[status]\"/>"; // Format for adding options 
}
////  End of data collection from table /// 

echo "</datalist>";?></datalist></th>
                                                    
                                                        
													 <th><input type="submit" value="Submit" name="submitkk" class="btn btn-primary" ></th>
														 <th>   <input type="reset" value="Reset" name="submit1" class="btn btn-danger"  onclick="javascript:location.href='qot_list4.php'"> </th>
			<!--
style="width:16px; font-size:8px; height:16px; background-image:url(images/Filter.png); background-repeat:no-repeat; margin-top:5px;"

			
<input type="reset" value="" name="submit1" class="" 
style="width:16px; font-size:8px; height:16px; background-image:url(images/FilterNone.gif); background-repeat:no-repeat;
 margin-top:5px;" onclick="javascript:location.href='qot_list1.php'">--> </th>
															

															<!--<th></th><th></th>
														 <th></th>
                                                         <th></th>
                                                       <th></th>-->
                                                      
                                                    </tr></form>
                                                </thead>

                                                <tbody>
												
											<?php 
											include('dbconnection/connection.php');
											
											
										$datatable="add_qot2";
										$results_per_page = 30;
										if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
$start_from = ($page-1) * $results_per_page;
											
												if(isset($_POST['bsearch'])){
												$bsearch=$_POST['search'];
											// $y="select a.store_name,a.city,b.quet_num,b.store_code,b.inv_date,b.id
											 //from add_qot b,dpr a where a.store_code=b.store_code order by b.id desc ";
											 $y="select * from add_qot2 where quet_num like '%$bsearch%'  or falt_no like '%$bsearch%'  or status like '%$bsearch%'order by id desc";
											 
											 	$t=mysqli_query($link,$y) or die(mysqli_error($link));
										$i=$start_from;
													$start=1;
											while($rs1=mysqli_fetch_array($t)){
											
																						
                                                    ?>
												
												<tr>

                                                        <td><?php echo $i+$start; ?></td>
                                                       
                                                      
                                                        <td ><?php echo $rs1['quet_num']; ?></td>
                                                        <td ><?php echo $store_code=$rs1['store_code'];
														include('dbconnection/connection1.php');
$ssq1=mysqli_query($link,"select * from dpr where store_code='$store_code'");
$r1=mysqli_fetch_array($ssq1);

														?></td>
                                                       
                                                        <td ><?php echo $r1['store_name']; ?></td>
                                                        
														
														<td ><?php echo $r1['coordinator']; ?></td>
                                                        <td ><?php echo $r1['superwisor']; ?></td>
                                                        <td ><?php echo $r1['city']; ?></td>
                                                        <td ><?php  $d= $rs1['inv_date']; echo date('d-m-Y', strtotime($d)); ?></td>
                                                        	<td ><?php echo $rs1['status']; ?></td>
                                                     <td ><!--<a href="qut_excel_bill1.php?id=<?php echo $rs1['id']; ?>">
                                                        <img src="images/xl.jpg" width="20" height="20"></a>-->
														 <a href="qot_pdf6.php?id=<?php echo $rs1['id'];?>"
												   class=""><img src="images/pdf_icon.gif" width="30" height="30"></a>
														</td>
                                                       </td>
  <td ><a href="qut_excel_misk.php?id=<?php echo $rs1['id']; ?>">
                                                        <img src="images/pdf_icon.gif" width="30" height="30"></a></td>
													
														 
                                                    </tr>
                                                    <?php $i++; }
											 
											 
												} else if(isset($_POST['submitkk'])){
													
													$store_code=$_POST['store_code'];
													$store_name=$_POST['store_name'];
													$coordinator=$_POST['coordinator'];
													$superwisor=$_POST['superwisor'];
													$city=$_POST['city'];
													$status=$_POST['status'];
												  $y="select  a.quet_num,a.store_code,a.inv_date,a.status,a.id from add_qot2 a,dpr b where
												
												
											(('$store_code' <> ' ' and locate('$store_code', a.store_code) <> 0) or ('$store_code' = ' '  and 1 = 1) ) and
											(('$store_name' <> ' ' and locate('$store_name', b.store_name) <> 0) or ('$store_name' = ' '  and 1 = 1) ) and
											(('$coordinator' <> ' ' and locate('$coordinator', b.coordinator) <> 0) or ('$coordinator' = ' '  and 1 = 1) ) and
											(('$city' <> ' ' and locate('$city', b.city) <> 0) or ('$city' = ' '  and 1 = 1) ) and
											(('$status' <> ' ' and locate('$status', a.status) <> 0) or ('$status' = ' '  and 1 = 1) ) and a.store_code=b.store_code";
											
											
											
											
												$t=mysqli_query($link,$y) or die(mysqli_error($link));
										$i=$start_from;
													$start=1;
											while($rs1=mysqli_fetch_array($t)){
											
																						
                                                    ?>
												
												<tr>

                                                        <td><?php echo $i+$start; ?></td>
                                                       
                                                      
                                                        <td ><?php echo $rs1['quet_num']; ?></td>
                                                        <td ><?php echo $store_code=$rs1['store_code'];
														include('dbconnection/connection1.php');
$ssq1=mysqli_query($link,"select * from dpr where store_code='$store_code'");
$r1=mysqli_fetch_array($ssq1);

														?></td>
                                                       
                                                        <td ><?php echo $r1['store_name']; ?></td>
                                                        
														
														<td ><?php echo $r1['coordinator']; ?></td>
                                                        <td ><?php echo $r1['superwisor']; ?></td>
                                                        <td ><?php echo $r1['city']; ?></td>
                                                        <td ><?php  $d= $rs1['inv_date']; echo date('d-m-Y', strtotime($d)); ?></td>
                                                        	<td ><?php echo $rs1['status']; ?></td>
                                                     <td ><!--<a href="qut_excel_bill1.php?id=<?php echo $rs1['id']; ?>">
                                                        <img src="images/xl.jpg" width="20" height="20"></a>-->
														 <a href="qot_pdf6.php?id=<?php echo $rs1['id'];?>"
												   class=""><img src="images/pdf_icon.gif" width="30" height="30"></a>
														</td>
                                                       </td>
  <td ><a href="qut_excel_misk.php?id=<?php echo $rs1['id']; ?>">
                                                        <img src="images/pdf_icon.gif" width="30" height="30"></a></td>
													
														 
                                                    </tr>
                                                    <?php $i++; }  }
													
													
												
											
											
												
												
												else if($bsearch=='') {
													   $af="select * from dpr where superwisor='$email'";
$ssqe=mysqli_query($link,$af);
while($rtt1=mysqli_fetch_array($ssqe)){
 $store_codeh=$rtt1['store_code'];
												
													 $y="SELECT * FROM ".$datatable." where store_code='$store_codeh'   ORDER BY id desc LIMIT $start_from, ".$results_per_page;
													 
										
											 
											$t=mysqli_query($link,$y) or die(mysqli_error($link));
										$i=$start_from;
										
													$start=1;
											while($rs1=mysqli_fetch_array($t)){
											
																						
                                                    ?>
												
												<tr>
                                                        
<!--<td class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</td>-->
                                                        <td><?php echo $i+$start; ?></td>
                                                       
                                                      
                                                        <td ><?php echo $rs1['quet_num']; ?></td>
                                                        <td ><?php echo $store_code=$rs1['store_code'];
														include('dbconnection/connection1.php');
$ssq1=mysqli_query($link,"select * from dpr where store_code='$store_code'");
$r1=mysqli_fetch_array($ssq1);

														?></td>
                                                       
                                                        <td ><?php echo $r1['store_name']; ?></td>
                                                        
														
														<td ><?php echo $r1['coordinator']; ?></td>
                                                        <td ><?php echo $r1['superwisor']; ?></td>
                                                        <td ><?php echo $r1['city']; ?></td>
                                                        <td ><?php  $d= $rs1['inv_date']; echo date('d-m-Y', strtotime($d)); ?></td>
                                                        	<td ><?php echo $rs1['status']; ?></td>
                                                     <td ><!--<a href="qut_excel_bill1.php?id=<?php echo $rs1['id']; ?>">
                                                        <img src="images/xl.jpg" width="20" height="20"></a>-->
														 <a href="qot_pdf6.php?id=<?php echo $rs1['id'];?>"
												   class=""><img src="images/pdf_icon.gif" width="30" height="30"></a>
														</td>
                                                       </td>
  <td ><a href="qut_excel_misk.php?id=<?php echo $rs1['id']; ?>">
                                                        <img src="images/pdf_icon.gif" width="30" height="30"></a></td>
														
														 
                                                    </tr>
												<?php $i++; } }}
													
													
													?>
                                                    
                                                    
                                                </tbody>
                                            </table>
											
											
											<div align="center">		
<?php 
$sql = "SELECT COUNT(id) AS total FROM ".$datatable;
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$total_pages = ceil($row["total"] / $results_per_page); // calculate total pages with results
  



echo "<ul class='pagination'>";
echo "<li><a href='qot_list4.php?page=".($page-1)."' class='button'>Previous</a></li>"; 

echo "<li><a>".$page."</></li>";

echo "<li><a href='qot_list4.php?page=".($page+1)."' class='button'>NEXT</a></li>";
echo "</ul>";
?>
												
</div>
											<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> 
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/paging.js"></script> 
<script type="text/javascript">
            $(document).ready(function() {
                $('#sample-table1').paging({limit:10});
            });
        </script>
        <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>-->
											
											
											
											
                                        </div>
                                    </div>
                                </div>
                                <!-- PAGE CONTENT ENDS -->
                            </div><!-- /.col -->
                        </div>
                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->

    <?php include('template/footer.php'); ?>

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
    </a>
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->

        
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