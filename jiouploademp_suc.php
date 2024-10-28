<?php //include('config.php');

include('dbconnection/connection.php');

require('library/php-excel-reader/excel_reader2.php');
require('library/SpreadsheetReader.php');
//require('db_config.php');
	
if(isset($_POST['submit'])){
	echo 'hi';

	$mimes = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.oasis.opendocument.spreadsheet'];
	if(in_array($_FILES["file"]["type"],$mimes)){

		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		  //$lname=$_POST['lname'];
		$uploadFilePath = 'upload/'.basename($_FILES['file']['name']);
		move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);

		$Reader = new SpreadsheetReader($uploadFilePath);

		$totalSheet = count($Reader->sheets());

		 "You have total ".$totalSheet." sheets".

		$html="<table border='1'>";
		$html.="<tr><th>Title</th><th>Description</th></tr>";

		/* For Loop for all sheets */
		for($i=0;$i<$totalSheet;$i++){

			$Reader->ChangeSheet($i);
			foreach ($Reader as $Row)
	        {
	        	$html.="<tr>";
				/* Check If sheet not emprt */
		        $empname = isset($Row[0]) ? $Row[0] : '';
				 $desg = isset($Row[1]) ? $Row[1] : '';
				
			echo 	 $empid = isset($Row[2]) ? ($Row[2]): '';
			echo "<br/>";
				$location = isset($Row[3]) ? $Row[3] : '';
				$bankname = isset($Row[4]) ? $Row[4] : '';
				$pfnumber = isset($Row[5]) ? $Row[5] : '';
				$pfuan = isset($Row[6]) ? $Row[6] : '';
					$esino = isset($Row[7]) ? $Row[7] : '';
					$acno = isset($Row[8]) ? $Row[8] : '';
					$absent = isset($Row[9]) ? $Row[9] : '';
					$basic = isset($Row[10]) ? $Row[10] : '';
					$other = isset($Row[11]) ? $Row[11] : '';
					$takehome = isset($Row[12]) ? $Row[12] : '';
					
				
			$html.="<td>".$i."</td>";
				 $html.="<td>".$empname."</td>";
				$html.="<td>".$desg."</td>";
				$html.="<td>".$empid."</td>";
				$html.="<td>".$location."</td>";
					$html.="<td>".$bankname."</td>";
				$html.="<td>".$pfnumber."</td>";
				$html.="<td>".$pfuan."</td>";
				$html.="<td>".$esino."</td>";
				$html.="<td>".$acno."</td>";
				$html.="<td>".$absent."</td>";
				$html.="<td>".$basic."</td>";
				$html.="<td>".$other."</td>";
				$html.="<td>".$takehome."</td>";
				
				$html.="</tr>";

				 $q="select * from register where email='$empid' ";
				
				$p=mysqli_query($link,$q) or die(mysqli_error($link));
				//$p=$link->query($q);
				
				$r=mysqli_fetch_array($p);
				 
			echo	$empid1=$r['email']."<br/>";
				
				
				
				
				if( ($empid1 == $empid) ){
					
				
						//	}	else{}
						
				}else{
				
						echo	$m="update register set  designation='".addslashes($desg)."', location='$location', bank_name='$bankname',pfnumber='$pfnumber',pfuan='$pfuan',esinumber='$esino',acno='$acno',absents='$absent',basic='$basic',others='$other',takehome='$takehome'  where email='".addslashes($empid)."' ";
					
						$link->query($m);	
				
				
				}
				
				
				
	        }

		}

		$html.="</table>";
		
		
		//echo $html;
exit;
		echo "<br />Data Inserted in dababase";
			print "<script>";
            print "alert('Successfully Registred ');";
			print "self.location='emplist.php';";
			print "</script>";

	}else { 
		die("<br/>Sorry, File type is not allowed. Only Excel file."); 
	}

}

?>