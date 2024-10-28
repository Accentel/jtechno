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
		        $hsn = isset($Row[0]) ? $Row[0] : '';
				 $material = isset($Row[1]) ? $Row[1] : '';
				
				 $gst = isset($Row[2]) ? str_replace('?',' ',($Row[2])): '';
				$price = isset($Row[3]) ? $Row[3] : '';
				$uom = isset($Row[4]) ? $Row[4] : '';
				$material2=addslashes($material);
			$html.="<td>".$i."</td>";
				 $html.="<td>".$hsn."</td>";
				$html.="<td>".$material."</td>";
				$html.="<td>".$gst."</td>";
				$html.="<td>".$price."</td>";
				$html.="<td>".$uom."</td>";
				
				$html.="</tr>";

				 $q="select * from jioproducts where material='$material'  and gst='$gst' ";
				
				$p=mysqli_query($link,$q) or die(mysqli_error($link));
				//$p=$link->query($q);
				
				$r=mysqli_fetch_array($p);
				 $material1=addslashes($r['material'])."<br/>";
				$gst1=$r['gst']."<br/>";
				$rate1=$r['rate']."<br/>";
				
				
				
				/*if( ($material1!= $material) and ($gst1!= $gst) and ($rate1!=$price)){
					//echo 'hi';
				if($gst!='Rate'){*/
								//$query = "insert into items(title,description) values('".$title."','".$description."')";
	 $query = "insert into jioproducts(hsn,material,gst,rate,uom)
							values('".$hsn."','".($material2)."','".$gst."','".$price."','".addslashes($uom)."')";     
    
	 //$res=mysql_query($ten_ins) or die(mysql_error());
				$link->query($query);
				
							/*}	else{}*/
						
				/*}else{
					$m="update jioproducts set  uom='".addslashes($primary_uom)."', rate='$price', hsn='$hsn'  where material='".addslashes($material)."' and gst='$gst' ";
					//$rt=mysqli_query($link,$m) or die(mysqli_error($link));
						$link->query($m);
							
				
				
				}*/
				
				
				
	        }

		}

		$html.="</table>";
		
		
	//	echo $html;

		echo "<br />Data Inserted in dababase";
			print "<script>";
            print "alert('Successfully Registred ');";
			print "self.location='jiouploadproducts.php';";
			print "</script>";

	}else { 
		die("<br/>Sorry, File type is not allowed. Only Excel file."); 
	}

}

?>