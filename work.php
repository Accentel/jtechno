<?php //include('config.php');
session_start();
include('dbconnection/connection.php');
if($_SESSION['user'])
{
$name=$_SESSION['user'];
//include('org1.php');
$y=mysqli_query($link,"select * from employee where emp_name='$name'");
$y1=mysqli_fetch_array($y);
$email=$y1['emp_email'];

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
                                <a href="#"> Reports List</a>
                            </li>
                            <li>
                                <a href="#">Work to be started</a>
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
                                        Work to be started
                                        </div>

                                        <!-- div.table-responsive -->

                                        <!-- div.dataTables_borderWrap -->
                                        <div>
                                        <div style="height:15px;"></div>
										<form method="post" action="" class="form-horizontal">
										
										<div class="form-group">
				
				
						<div class="col-sm-1"></div>
                     <div class="col-sm-4">
                  
              <input type="text" class="form-control pull-right" id="myInput" name="search" placeholder="Search By Quotation Name No  " onkeyup="myFunction()">
             </div> <!-- <div class="col-sm-4"><select name="search1" class="form-control" >
<option value="">Select </option>  
<option value="AP">AP</option>
<option value="TS">TS</option>
</select> 
<!--
<select name="search" class="form-control" >
<option value="">Select </option>
<option value="work to be started">work to be started</option>
<option value="Document Required">Document Required</option>
<option value="To be raise invoice">To be raise invoice</option>
<option value="Payment Pending">Payment Pending</option>
<option value="Not required">Not required</option>
<option value="GST Bills Pending">GST Bills Pending</option>

</select>
				 </div>
				   <div class="col-sm-3">
                  
               <button class="btn btn-info" type="submit" name="bsearch" id="bsearch">
                                                <i class="ace-icon fa fa-search bigger-110"></i>
                                                Search
                                            </button>
                  </div>-->
				</div>
										
										</form>
                                  
                                        
                                            <table id="myTable" class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <!--<th class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>-->
                                                        <th>S No</th>
													<th>State</th>
													 <th>Quotation No </th>
													<th>Store Code</th>
													<th>Store Name</th>
													<th>Coordinator</th>
													<th>Super Wisor</th>
                                                       
                                                     
                                                        
                                                        <!--<th>Amount Transferred Date</th>-->
                                                        <th>Status</th>
                                                       
                                                      
                                                          <th>Edit</th>
														
                                                          
                                                        
                                                      
                                                      
                                                    </tr>
                                                </thead>

                                                <tbody>
												
												
												<?php 
											if(isset($_POST['bsearch'])){
												 $bsearch=$_POST['search'];
												 $bsearch1=$_POST['search1'];
												 $st=substr("$bsearch",0,6);
												
												if($bsearch!='' and $bsearch1!='' and $bsearch1=='AP' ){
													$ssq=mysqli_query($link,"select * from add_qot where status='work to be started' and  quet_num='$bsearch'");
											
												}
												else if($bsearch=='' and $bsearch1!='' and $bsearch1=='AP' ){
													 $a="select * from add_qot where status='work to be started' ";
													$ssq=mysqli_query($link,$a);
											
												} else if($bsearch!='' and $bsearch1=='' and $st=='QJISAP'  ){
													$ssq=mysqli_query($link,"select * from add_qot where status='work to be started' and quet_num='$bsearch' ");
											
												}
												else if($bsearch!='' and $bsearch1!='' and $bsearch1=='TS' ){
													$ssq=mysqli_query($link,"select * from add_qot2 where status='work to be started' and  quet_num='$bsearch'");
											
												}
												else if($bsearch=='' and $bsearch1!='' and $bsearch1=='TS' ){
													$ssq=mysqli_query($link,"select * from add_qot2 where status='work to be started' ");
											
												} else if($bsearch!='' and $bsearch1==''  and $st=='QJISTG'){
													$ssq=mysqli_query($link,"select * from add_qot2 where status='work to be started' and quet_num='$bsearch' ");
											
												}
										
												
												
												//echo $a="select * from add_qot where status='work to be started' ";
													//$ssq=mysqli_query($link,$a);
												
												
		
											//$t=mysqli_query($link,$ssq) or die(mysqli_error($link));
											$i=1;
											while($rs1=mysqli_fetch_array($ssq)){
											
													
													
													 $store_code=$rs1['store_code'];
													
                                                    ?>
                                                    <tr>
                                                        
<!--<td class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</td>-->
                                                        <td><?php echo $i; ?></td>
                                                       <td><?php if($bsearch1!=''){ echo $bsearch1; } else  if($st=='QJISAP'){ echo 'AP'; } else  if($st=='QJISTG'){ echo 'TS'; } ?></td>
													    <td class="hidden-480"><?php echo $q=$rs1['quet_num']; ?></td>
                                                      <?php 
													  
													  $reww=mysqli_query($link,"select * from dpr where store_code='$store_code'");
													  $r3=mysqli_fetch_array($reww);
													  ?>
													   <td><?php echo $rs1['store_code']; ?> </td>
													    <td><?php echo $r3['store_name']; ?> </td>
													 <td><?php echo $r3['coordinator']; ?> </td>
                                                    <td><?php echo $r3['superwisor']; ?> </td>
												   
												    
                                                       
                                                      
                                                       <!-- <td class="hidden-480">
											
<?php
														$d=$rs1['transfer_date'];
if($d!=''){ 

echo date('d-m-Y', strtotime($d)); }?></td>-->
                                                        
                                                        <td class="hidden-480"><?php //echo $r1['tot_base'] ?>
														work to be started
														</td>
                                                          


														  
                                                        <td class="hidden-480"><a href="work_edit.php?id=<?php echo $q; ?>&id1=<?php echo $r1['id'];?>">
                                                        <img src="images/edit.gif"></a></td>
														
                                                       
														
														
													
														
                                                    </tr>
												
												
												
												
												
												
												
                                <?php $i++; } }else { ?>
												
												
												
												
												<?php 
												 $y="select * from add_qot where status='work to be started'     ";
										
											$t=mysqli_query($link,$y) or die(mysqli_error($link));
											$i=1;
											while($rs1=mysqli_fetch_array($t)){
											
													
													
													$store_code=$rs1['store_code'];
													
                                                    ?>
                                                    <tr>
                                                        
<!--<td class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</td>-->
                                                        <td><?php echo $i; ?></td>
                                                       <td>AP</td>
													    <td class="hidden-480"><?php echo $q=$rs1['quet_num']; ?></td>
                                                      <?php 
													  
													  $reww=mysqli_query($link,"select * from dpr where store_code='$store_code'");
													  $r3=mysqli_fetch_array($reww);
													  ?>
													   <td><?php echo $rs1['store_code']; ?> </td>
													    <td><?php echo $r3['store_name']; ?> </td>
													 <td><?php echo $r3['coordinator']; ?> </td>
                                                    <td><?php echo $r3['superwisor']; ?> </td>
												   
												    
                                                       
                                                      
                                                       <!-- <td class="hidden-480">
											
<?php
														$d=$rs1['transfer_date'];
if($d!=''){ 

echo date('d-m-Y', strtotime($d)); }?></td>-->
                                                        
                                                        <td class="hidden-480"><?php //echo $r1['tot_base'] ?>
														work to be started
														</td>
                                                          


														  
                                                        <td class="hidden-480"><a href="work_edit.php?id=<?php echo $q; ?>&id1=<?php echo $r1['id'];?>">
                                                        <img src="images/edit.gif"></a></td>
														
                                                       
														
														
													
														
                                                    </tr>
												
												
												
												
												
												
												
											<?php $k=$i++; } ?>
											
											
											<?php 
											//if(isset($_POST['bsearch'])){
											//	$bsearch=$_POST['search'];
											 //$y="SELECT distinct quet_num,state,transfer_date FROM `request_amnt`  where status='Amount Transferred' and bill_status='' and  quet_num like  '%$bsearch%'  ";
											
											//$ssq=mysqli_query($link,"select * from add_qot where status='work to be started' quet_num='$bsearch'");
											
											
											//} else {
													  $y="select * from add_qot2 where status='work to be started'     ";
											//}
											$t=mysqli_query($link,$y) or die(mysqli_error($link));
											$j=$k+1;
											while($rs1=mysqli_fetch_array($t)){
											
													
													
													$store_code=$rs1['store_code'];
													
                                                    ?>
                                                    <tr>
                                                        
<!--<td class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</td>-->
                                                        <td><?php echo $j; ?></td>
                                                       <td>TS</td>
													    <td class="hidden-480"><?php echo $q=$rs1['quet_num']; ?></td>
                                                      <?php 
													  
													  $reww=mysqli_query($link,"select * from dpr where store_code='$store_code'");
													  $r3=mysqli_fetch_array($reww);
													  ?>
													   <td><?php echo $rs1['store_code']; ?> </td>
													    <td><?php echo $r3['store_name']; ?> </td>
													 <td><?php echo $r3['coordinator']; ?> </td>
                                                    <td><?php echo $r3['superwisor']; ?> </td>
												   
												    
                                                       
                                                      
                                                       <!-- <td class="hidden-480">
											
<?php
														$d=$rs1['transfer_date'];
if($d!=''){ 

echo date('d-m-Y', strtotime($d)); }?></td>-->
                                                        
                                                        <td class="hidden-480"><?php //echo $r1['tot_base'] ?>
														work to be started
														</td>
                                                          


														  
                                                        <td class="hidden-480"><a href="work_edit.php?id=<?php echo $q; ?>&id1=<?php echo $r1['id'];?>">
                                                        <img src="images/edit.gif"></a></td>
														
                                                       
														
														
													
														
                                                    </tr>
											<?php $kf=$j++; } } ?>
											
                                                    
                                                </tbody>
                                            </table>
											
											<div align="center">		
<?php 
$sql = "SELECT COUNT(id) AS total FROM ".$datatable;
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$total_pages = ceil($row["total"] / $results_per_page); // calculate total pages with results
  



echo "<ul class='pagination'>";
echo "<li><a href='work.php?page=".($page-1)."' class='button'>Previous</a></li>"; 

echo "<li><a>".$page."</></li>";

echo "<li><a href='work.php?page=".($page+1)."' class='button'>NEXT</a></li>";
echo "</ul>";
?>
												
</div>
											
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
                                            jQuery(function ($) {
                                                //initiate dataTables plugin
                                                var myTable =
                                                        $('#dynamic-table')
                                                        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
                                                        .DataTable({
                                                            bAutoWidth: false,
                                                            "aoColumns": [
                                                                {"bSortable": false},
                                                                 null,null,null,null,null,null,null,null,null,null,null,
                                                                {"bSortable": false}
                                                            ],
                                                            "aaSorting": [],

                                                            


                                                            select: {
                                                                style: 'multi'
                                                            }
                                                        });



                                                $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';

                                                new $.fn.dataTable.Buttons(myTable, {
                                                    buttons: [
                                                        {
                                                            "extend": "colvis",
                                                            "text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
                                                            "className": "btn btn-white btn-primary btn-bold",
                                                            columns: ':not(:first):not(:last)'
                                                        },
                                                        {
                                                            "extend": "copy",
                                                            "text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
                                                            "className": "btn btn-white btn-primary btn-bold"
                                                        },
                                                        {
                                                            "extend": "csv",
                                                            "text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
                                                            "className": "btn btn-white btn-primary btn-bold"
                                                        },
                                                        {
                                                            "extend": "excel",
                                                            "text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
                                                            "className": "btn btn-white btn-primary btn-bold"
                                                        },
                                                        {
                                                            "extend": "pdf",
                                                            "text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
                                                            "className": "btn btn-white btn-primary btn-bold"
                                                        },
                                                        {
                                                            "extend": "print",
                                                            "text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
                                                            "className": "btn btn-white btn-primary btn-bold",
                                                            autoPrint: false,
                                                            message: 'This print was produced using the Print button for DataTables'
                                                        }
                                                    ]
                                                });
                                                myTable.buttons().container().appendTo($('.tableTools-container'));

                                                //style the message box
                                                var defaultCopyAction = myTable.button(1).action();
                                                myTable.button(1).action(function (e, dt, button, config) {
                                                    defaultCopyAction(e, dt, button, config);
                                                    $('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
                                                });


                                                var defaultColvisAction = myTable.button(0).action();
                                                myTable.button(0).action(function (e, dt, button, config) {

                                                    defaultColvisAction(e, dt, button, config);


                                                    if ($('.dt-button-collection > .dropdown-menu').length == 0) {
                                                        $('.dt-button-collection')
                                                                .wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
                                                                .find('a').attr('href', '#').wrap("<li />")
                                                    }
                                                    $('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
                                                });

                                                ////

                                                setTimeout(function () {
                                                    $($('.tableTools-container')).find('a.dt-button').each(function () {
                                                        var div = $(this).find(' > div').first();
                                                        if (div.length == 1)
                                                            div.tooltip({container: 'body', title: div.parent().text()});
                                                        else
                                                            $(this).tooltip({container: 'body', title: $(this).text()});
                                                    });
                                                }, 500);





                                                myTable.on('select', function (e, dt, type, index) {
                                                    if (type === 'row') {
                                                        $(myTable.row(index).node()).find('input:checkbox').prop('checked', true);
                                                    }
                                                });
                                                myTable.on('deselect', function (e, dt, type, index) {
                                                    if (type === 'row') {
                                                        $(myTable.row(index).node()).find('input:checkbox').prop('checked', false);
                                                    }
                                                });




                                                /////////////////////////////////
                                                //table checkboxes
                                                $('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);

                                                //select/deselect all rows according to table header checkbox
                                                $('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function () {
                                                    var th_checked = this.checked;//checkbox inside "TH" table header

                                                    $('#dynamic-table').find('tbody > tr').each(function () {
                                                        var row = this;
                                                        if (th_checked)
                                                            myTable.row(row).select();
                                                        else
                                                            myTable.row(row).deselect();
                                                    });
                                                });

                                                //select/deselect a row when the checkbox is checked/unchecked
                                                $('#dynamic-table').on('click', 'td input[type=checkbox]', function () {
                                                    var row = $(this).closest('tr').get(0);
                                                    if (this.checked)
                                                        myTable.row(row).deselect();
                                                    else
                                                        myTable.row(row).select();
                                                });



                                                $(document).on('click', '#dynamic-table .dropdown-toggle', function (e) {
                                                    e.stopImmediatePropagation();
                                                    e.stopPropagation();
                                                    e.preventDefault();
                                                });



                                                //And for the first simple table, which doesn't have TableTools or dataTables
                                                //select/deselect all rows according to table header checkbox
                                                

                                                //select/deselect a row when the checkbox is checked/unchecked
                                                



                                                /********************************/
                                                //add tooltip for small view action buttons in dropdown menu
                                              

                                                //tooltip placement on right or left
                                                


                                                /***************/
                                               





                                                /**
                                                 //add horizontal scrollbars to a simple table
                                                 $('#simple-table').css({'width':'2000px', 'max-width': 'none'}).wrap('<div style="width: 1000px;" />').parent().ace_scroll(
                                                 {
                                                 horizontal: true,
                                                 styleClass: 'scroll-top scroll-dark scroll-visible',//show the scrollbars on top(default is bottom)
                                                 size: 2000,
                                                 mouseWheelLock: true
                                                 }
                                                 ).css('padding-top', '12px');
                                                 */


                                            })
                                            function myFunction() {
      // Declare variables
      var input, filter, table, tr, td, i, occurrence;

      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");

      // Loop through all table rows, and hide those who don't match the search query
     for (i = 1; i < tr.length; i++) {
         occurrence = false; // Only reset to false once per row.
         td = tr[i].getElementsByTagName("td");
         for(var j=0; j< td.length; j++){                
             currentTd = td[j];
             if (currentTd ) {
                 if (currentTd.innerHTML.toUpperCase().indexOf(filter) > -1) {
                     tr[i].style.display = "";
                     occurrence = true;
                 }
             }
         }
         if(!occurrence){
             tr[i].style.display = "none";
         }
     }
   }
        </script><!-- inline scripts related to this page -->
        <?php mysqli_close($link); ?>
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