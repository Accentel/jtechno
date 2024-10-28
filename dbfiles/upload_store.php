<?php //include('config.php');
include('dbconnection/connection1.php');
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
		       /* $state = isset($Row[1]) ? $Row[1] : '';
				$city = isset($Row[2]) ? $Row[2] : '';
				$format_type = isset($Row[3]) ? $Row[3] : '';
				$store_code = isset($Row[4]) ? $Row[4] : '';
				$store_name = isset($Row[5]) ? $Row[5] : '';
				$comp_name = isset($Row[6]) ? $Row[6] : '';
				$super_wisor = isset($Row[7]) ? $Row[7] : '';
				$cordinator = isset($Row[8]) ? $Row[8] : '';
				$afm = isset($Row[9]) ? $Row[9] : '';
				$gst = isset($Row[10]) ? $Row[10] : '';
				$state_code = isset($Row[11]) ? $Row[11] : '';
				$addr=isset($Row[12]) ? $Row[12] : '';
				$addr1=isset($Row[13]) ? $Row[13] : '';*/
				
				$store_code = isset($Row[0]) ? $Row[0] : '';
				
				//$store_name1 = isset($Row[1]) ? $Row[1] : '';
				//$state = isset($Row[2]) ? $Row[2] : '';
				//$gst = isset($Row[3]) ? $Row[3] : '';
				
				
	// $query="insert into dpr(`state`, `city`, `format_type`, 
	//`store_code`, `store_name`, `company_name`,  `superwisor`, 
	//`coordinator`, `afm`, `state_code`, `gst_in`, `address`,ship_ddress)
	//values('$state','$city','$format_type','$store_code','$store_name','$comp_name','$super_wisor',
	//'$cordinator','$afm','$state_code','$gst','$addr','$addr1')";
				
					
				echo $query = "insert into compnay  (`name`) values ('$store_code')";     
    
	 $q=mysqli_query($link,$query) or die(mysql_error());
			//$q=$link->query($query);
					
				
					
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
			print "self.location='store_list.php';";
			print "</script>";
		
	}else { 
		die("<br/>Sorry, File type is not allowed. Only Excel file."); 
	}

}

?>