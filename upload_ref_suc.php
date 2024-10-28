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
		  $lname=$_POST['lname'];
		$uploadFilePath = 'upload/'.basename($_FILES['file']['name']);
		move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);

		$Reader = new SpreadsheetReader($uploadFilePath);

		$totalSheet = count($Reader->sheets());

		echo "You have total ".$totalSheet." sheets".

		$html="<table border='1'>";
		$html.="<tr><th>Title</th><th>Description</th></tr>";

		/* For Loop for all sheets */
		for($i=0;$i<$totalSheet;$i++){

			$Reader->ChangeSheet($i);
			foreach ($Reader as $Row)
	        {
	        	$html.="<tr>";
				/* Check If sheet not emprt */
		        $scode = isset($Row[0]) ? $Row[0] : '';
				$supervisor = isset($Row[1]) ? $Row[1] : '';
				
				$html.="<td>".$i."</td>";
				$html.="<td>".$scode."</td>";
				$html.="<td>".$supervisor."</td>";
				
				$html.="</tr>";
				
				
				
				 
				//$p=$link->query($q);
				
				
					
						
						$m="update dpr set  superwisor ='".addslashes($supervisor)."'   where store_code='$scode' ";
					//$rt=mysqli_query($link,$m) or die(mysqli_error($link));
					//$q=$link->query($m);
					$q=mysqli_query($link,$m) or die(mysqli_error($link));
						
				
					
		        }

		}

		$html.="</table>";
		 $html;
		//exit;
		//echo "<br />Data Inserted in dababase";
		if($q){
		print "<script>";
			print "alert('Successfully Registred ');";
			print "self.location='addrefferno.php';";
			print "</script>";
		}
	}else { 
		die("<br/>Sorry, File type is not allowed. Only Excel file."); 
	}

}

?>