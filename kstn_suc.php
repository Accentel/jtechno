<?php //include('config.php');
//include('dbconnection/connection.php');
//include('config.php');
define("HOST_NAME", "conceptgrammarschool.com");
define("USER", "conceptg_abdul");
define("PASSWORD", "tolichowki");
define("DB", "conceptg_jstechnical");
$link=mysqli_connect(HOST_NAME,USER,PASSWORD,DB);
//$link2=mysqli_connect(HOST_NAME,USER,PASSWORD,DB);

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
error_reporting(0);


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
				 $empid = isset($Row[1]) ? $Row[1] : '';
				$state = isset($Row[2]) ? $Row[2] : '';
				// $item_desc = isset($Row[2]) ? str_replace('?',' ',utf8_decode($Row[2])): '';
				$phoneno = isset($Row[3]) ? $Row[3] : '';
				$l1 = isset($Row[4]) ? $Row[4] : '';
				$l2 = isset($Row[5]) ? $Row[5] : '';
				$l3 = isset($Row[6]) ? $Row[6] : '';
				$l5 = isset($Row[7]) ? $Row[7] : '';
				$l4 = isset($Row[8]) ? $Row[8] : '';
				$l6 = isset($Row[9]) ? $Row[9] : '';
				$l7 = isset($Row[10]) ? $Row[10] : '';
				$l8 = isset($Row[11]) ? $Row[11] : '';
				$city = isset($Row[12]) ? $Row[12] : '';
				$desg = isset($Row[13]) ? $Row[13] : '';
				$date=date('Y-m-d');
				$time=date('H:i:s ');
				$loggedin='nactive';
				$category='Others';
			    $html.="<td>".$i."</td>";
				$html.="<td>".$sno."</td>";
				$html.="<td>".$empid."</td>";
				$html.="<td>".$state."</td>";
				$html.="<td>".$phoneno."</td>";
				$html.="<td>".$l1."</td>";
				$html.="<td>".$l2."</td>";
				$html.="<td>".$l3."</td>";
				$html.="<td>".$l4."</td>";
				$html.="<td>".$l5."</td>";
				$html.="<td>".$l6."</td>";
				$html.="<td>".$l7."</td>";
				$html.="</tr>";

				 $q="select * from register where email='$empid' ";
				
				$p=mysqli_query($link,$q) or die(mysqli_error($link));
				//$p=$link->query($q);
				
				$r=mysqli_fetch_array($p);
				 $email1=addslashes($r['email']);
			
				
				
				if( ($email1!= $empid) ){
					//echo 'hi';
				if(($empid!='ID Card') or ($empid!='')){
								//$query = "insert into items(title,description) values('".$title."','".$description."')";
	 $query = "insert into register(name,phoneno,email,category,state,password,date,time,loggedin,designation,location,level1,level2,level3,level4,level5,level6,level7,level8)
							values('".$l1."','".$phoneno."','".addslashes($empid)."','".$category."','".$state."','".$empid."','".$date."','".$time."','".$loggedin."','".$desg."','".$city."','".$l1."','".$l2."','".$l3."','".$l4."','".$l5."','".$l6."','".$l7."','".$l8."')";     
    
	 //$res=mysql_query($ten_ins) or die(mysql_error());
				$link->query($query);
				
							}	else{}
						
				}else{
					$m="update register set  name ='".addslashes($l1)."' ,phoneno='$phoneno', category='$category',state='$state', password='$empid',date='$date',time='$time', loggedin='$loggedin',designation='$desg', location='$city' ,level1='$l1',level2='$l2',level3='$l3',level4='$l4',level5='$l5',level6='$l6',level7='$l7',level8='$l8'   where email='$l1'  ";
					//$rt=mysqli_query($link,$m) or die(mysqli_error($link));
						$link->query($m);
							
				
				
				}
				
				
				
	        }

		}

		$html.="</table>";
		
		
	//echo $html;
//exit;
		echo "<br />Data Inserted in dababase";
			print "<script>";
            print "alert('Successfully Registred ');";
			print "self.location='addkstn.php';";
			print "</script>";

	}else { 
		die("<br/>Sorry, File type is not allowed. Only Excel file."); 
	}

}

?>