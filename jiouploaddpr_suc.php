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
		        $sno = isset($Row[0]) ? $Row[0] : '';
				 $state = isset($Row[1]) ? $Row[1] : '';
				
				 $city = isset($Row[2]) ? ($Row[2]): '';
				$format = isset($Row[3]) ? $Row[3] : '';
				$scode = isset($Row[4]) ? $Row[4] : '';
				$sname = isset($Row[5]) ? $Row[5] : '';
				$cname = isset($Row[6]) ? $Row[6] : '';
				
			$html.="<td>".$i."</td>";
				 $html.="<td>".$sno."</td>";
				$html.="<td>".$state."</td>";
				$html.="<td>".$city."</td>";
				$html.="<td>".$format."</td>";
					$html.="<td>".$scode."</td>";
				$html.="<td>".$sname."</td>";
				$html.="<td>".$cname."</td>";
				
				$html.="</tr>";

				 $q="select * from dpr where store_code='$scode' ";
				
				$p=mysqli_query($link,$q) or die(mysqli_error($link));
				//$p=$link->query($q);
				
				$r=mysqli_fetch_array($p);
				 
				$scode1=$r['store_code']."<br/>";
				
				
				
				
				if( ($scode1!= $scode) ){
					//echo 'hi';
				///if($gst!='Rate'){
								//$query = "insert into items(title,description) values('".$title."','".$description."')";
	 $query = "insert into dpr(sno,state,city,format_type,store_code,store_name,company_name)
							values('".$sno."','".addslashes($state)."','".$city."','".$format."','".addslashes($scode)."','".addslashes($sname)."','".addslashes($cname)."')";     
    
	 //$res=mysql_query($ten_ins) or die(mysql_error());
				$link->query($query);
				
						//	}	else{}
						
				}else{
					$m="update dpr set  sno='".addslashes($sno)."', state='$state', city='$city',format_type='$format',store_name='$sname',company_name='$cname'  where store_code='".addslashes($scode)."' ";
					//$rt=mysqli_query($link,$m) or die(mysqli_error($link));
						$link->query($m);
							
				
				
				}
				
				
				
	        }

		}

		$html.="</table>";
		
		
	//	echo $html;

		echo "<br />Data Inserted in dababase";
			print "<script>";
            print "alert('Successfully Registred ');";
			print "self.location='jiouploaddpr.php';";
			print "</script>";

	}else { 
		die("<br/>Sorry, File type is not allowed. Only Excel file."); 
	}

}

?>