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
		$uploadFilePath = 'supload/'.basename($_FILES['file']['name']);
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
		        $srtype = isset($Row[0]) ? $Row[0] : '';
				$indusid = isset($Row[1]) ? $Row[1] : '';
				$customer = isset($Row[2]) ? $Row[2] : '';
				$custsiteid = isset($Row[3]) ? $Row[3] : '';
				$sitename = isset($Row[4]) ? $Row[4] : '';
				$district = isset($Row[5]) ? $Row[5] : '';
				$towertype = isset($Row[6]) ? $Row[6] : '';
				
				$html.="<td>".$i."</td>";
				$html.="<td>".$srtype."</td>";
				$html.="<td>".$indusid."</td>";
				$html.="<td>".$customer."</td>";
				$html.="<td>".$custsiteid."</td>";
				$html.="<td>".$sitename."</td>";
				$html.="<td>".$district."</td>";
				$html.="<td>".$towertype."</td>";
				$html.="</tr>";
				
			
				 $q="select * from sites where indusid='$indusid' ";
				
				$p=mysqli_query($link,$q) or die(mysqli_error($link));
				//$p=$link->query($q);
				
				$r=mysqli_fetch_array($p);
				 $customer1=addslashes($r['customer'])."<br/>";
				$custsiteid1=$r['cust_site_id']."<br/>";
				$sitename1=$r['sitename']."<br/>";
				$district1=$r['district']."<br/>";
				$towertype1=$r['towertype'];
				$srtype1=$r['srtype'];
				$indusid1=$r['indusid'];
			
					if( ($indusid1!= $indusid)  ){	
				
						if($indusid!="Indus ID")	{	
				$query = "insert into sites(`customer`,`cust_site_id`,`sitename`,`district`,`towertype`,`srtype`,`indusid`)
							values('".$customer."','".$custsiteid."','".$sitename."','".$district."','".$towertype."','".$srtype."','".$indusid."')";     
    
	 //$res=mysql_query($ten_ins) or die(mysql_error());
			$q=$link->query($query);
						}else{}
				
					}else{
						
						$m="update sites set  customer='$district',  cust_site_id='$state',sitename='$seeking_id', district='$po_num',towertype='$allocation_date2',srtype='$comp_date'  where indusid='$indus_id1' ";
					//$rt=mysqli_query($link,$m) or die(mysqli_error($link));
					$q=$link->query($m);
						
				
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
			print "self.location='site_list.php';";
			print "</script>";
		}
	}else { 
		die("<br/>Sorry, File type is not allowed. Only Excel file."); 
	}

}

?>