<?php //include('config.php');
include('dbconnection/connection.php');
require('library/php-excel-reader/excel_reader2.php');
require('library/SpreadsheetReader.php');
//require('db_config.php');
	
if(isset($_POST['submit'])){

	$mimes = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.oasis.opendocument.spreadsheet'];
	if(in_array($_FILES["file"]["type"],$mimes)){

		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		ini_set('max_execution_time', 300);
		error_reporting(E_ALL);
		 // $lname=$_POST['lname'];
		//$uploadFilePath = 'upload/'.basename($_FILES['file']['name']);
		//move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);

		//$Reader = new SpreadsheetReader($uploadFilePath);

		//$totalSheet = count($Reader->sheets());

		//echo "You have total ".$totalSheet." sheets".
		
				$uploadFilePath = 'upload/'.basename($_FILES['file']['name']);
		move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);

		$Reader = new SpreadsheetReader($uploadFilePath);
echo $totalSheet = count($Reader->sheets());
		$html="<table border='1'>";
		$html.="<tr><th>Title</th><th>Description</th></tr>";

		/* For Loop for all sheets */
		for($i=0;$i<$totalSheet;$i++){

			$Reader->ChangeSheet($i);
			foreach ($Reader as $Row)
	        {
	        	$html.="<tr>";
				/* Check If sheet not emprt */
				$service_code= isset($Row[0]) ? $Row[0] : '';
		        $hsncode= isset($Row[1]) ? $Row[1] : '';
				$mdescription= isset($Row[2]) ? $Row[2] : '';
		        $umo= isset($Row[3]) ? $Row[3] : '';
				$urate = isset($Row[4]) ? $Row[4] : '';
				$gst='18';
				$cap='yes';
				$service_fee='0';
			
				$html.="<td>".$i."</td>";
				$html.="<td>".$service_code."</td>";
				$html.="<td>".$mdescription."</td>";
				$html.="</tr>";
	// $query="insert into dpr(`state`, `city`, `format_type`, 
	//`store_code`, `store_name`, `company_name`,  `superwisor`, 
	//`coordinator`, `afm`, `state_code`, `gst_in`, `address`,ship_ddress)
	//values('$state','$city','$format_type','$store_code','$store_name','$comp_name','$super_wisor',
	//'$cordinator','$afm','$state_code','$gst','$addr','$addr1')";
				 $q="select * from titems where service_code='$service_code'";
				
				$p=mysqli_query($link,$q) or die(mysqli_error($link));
				//$p=$link->query($q);
				
				$r=mysqli_fetch_array($p);
			
				$service_code1=$r['service_code']."<br/>";
				
				
					if( ($service_code1!= $service_code)  ){	
				
						if($store_name!="Article Code")	{	
				$query = "insert into titems(`service_code`, `hsncode`, `mdescription`,`umo`, `urate`, `gst`,  `cap`,`service_fee`)
							values('".$service_code."','".$hsncode."','".addslashes($mdescription)."','".$umo."','".$urate."','".$gst."','".$cap."','".$service_fee."')";     
    
	 //$res=mysql_query($ten_ins) or die(mysql_error());
			$q=$link->query($query);
						}else{}
				
					}else{
						
						$m="update titems set   hsncode='$hsncode',  mdescription='addslashes($mdescription)',
						umo='$umo',urate='$urate',gst='$gst',cap='$cap',service_fee='$service_fee'  where service_code='$service_code'";
					//$rt=mysqli_query($link,$m) or die(mysqli_error($link));
					$q=$link->query($m);
						
				
					}
					
			
					
				
					
		        }

		}
	}
		$html.="</table>";
		 $html;
		//exit;
		//echo "<br />Data Inserted in dababase";
		if($q){
		print "<script>";
			print "alert('Successfully Registred ');";
			print "self.location='tnuploaditems_list.php';";
			print "</script>";
		
	}else { 
		die("<br/>Sorry, File type is not allowed. Only Excel file."); 
	}

}

?>