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
				$store_name = isset($Row[0]) ? $Row[0] : '';
		        $city= isset($Row[1]) ? $Row[1] : '';
				$format_type= isset($Row[2]) ? $Row[2] : '';
		        $store_code= isset($Row[3]) ? $Row[3] : '';
				$state = isset($Row[4]) ? $Row[4] : '';
				$cordinator = isset($Row[5]) ? $Row[5] : '';
				$afm = isset($Row[6]) ? $Row[6] : '';
				$super_wisor = isset($Row[7]) ? $Row[7] : '';
				$bpname = isset($Row[8]) ? $Row[8] : '';
				$bpaddress = isset($Row[9]) ? $Row[9] : '';
				$bpstate = isset($Row[10]) ? $Row[10] : '';
				$bpgst = isset($Row[11]) ? $Row[11] : '';
				$spname=isset($Row[12]) ? $Row[12] : '';
				$spaddress=isset($Row[13]) ? $Row[13] : '';
				$spstate=isset($Row[14]) ? $Row[14] : '';
				$spgst=isset($Row[15]) ? $Row[15] : '';
				$statecode=isset($Row[16]) ? $Row[16] : '';
			
				$html.="<td>".$i."</td>";
				$html.="<td>".$store_code."</td>";
				$html.="<td>".$store_name."</td>";
				$html.="</tr>";
	// $query="insert into dpr(`state`, `city`, `format_type`, 
	//`store_code`, `store_name`, `company_name`,  `superwisor`, 
	//`coordinator`, `afm`, `state_code`, `gst_in`, `address`,ship_ddress)
	//values('$state','$city','$format_type','$store_code','$store_name','$comp_name','$super_wisor',
	//'$cordinator','$afm','$state_code','$gst','$addr','$addr1')";
				 $q="select * from dpr where store_code='$store_code'";
				
				$p=mysqli_query($link,$q) or die(mysqli_error($link));
				//$p=$link->query($q);
				
				$r=mysqli_fetch_array($p);
			
				$store_code1=$r['store_code']."<br/>";
				$store_name1=$r['store_name']."<br/>";
				$city1=$r['city']."<br/>";
				
					if( ($store_code1!= $store_code) and  ($store_name1!= $store_name ) and ($city1!= $city ) ){	
				
						if($store_name!="Store Name")	{	
				$query = "insert into dpr(`store_name`, `city`, `format_type`,`store_code`, `state`, `coordinator`,  `afm`,`superwisor`,company_name,address,gst_in,ship_name,ship_ddress,ship_state,ship_gst,state_code)
							values('".$store_name."','".$city."','".$format_type."','".$store_code."','".$state."','".$cordinator."','".$afm."','".$super_wisor."','".$bpname."','".$bpaddress."','".$bpgst."','".$spname."','".$spaddress."','".$spstate."','".$spgst."','".$statecode."')";     
    
	 //$res=mysql_query($ten_ins) or die(mysql_error());
			$q=$link->query($query);
						}else{}
				
					}else{
						
						$m="update dpr set  store_name ='".addslashes($store_name)."' ,city='$city',  format_type='$format_type',
						state='$state',coordinator='$cordinator',afm='$afm',superwisor='$super_wisor',company_name='$bpname',address='$bpaddress',gst_in='$bpgst',ship_name='$spname',ship_ddress='$spaddress',ship_state='$spstate',ship_gst='$spgst',state_code='$statecode'  where store_code='$store_code'";
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
			print "self.location='store_list.php';";
			print "</script>";
		
	}else { 
		die("<br/>Sorry, File type is not allowed. Only Excel file."); 
	}

}

?>