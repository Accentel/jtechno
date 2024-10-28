<?php //include('config.php');
        ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
include('dbconnection/connection3.php');
require('library/php-excel-reader/excel_reader2.php');
require('library/SpreadsheetReader.php');
//require('db_config.php');
if(isset($_POST['submit'])){
	$mimes = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.oasis.opendocument.spreadsheet'];
	if(in_array($_FILES["file"]["type"],$mimes)){

		
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
				$name = isset($Row[1]) ? $Row[1] : '';
				$mobile = isset($Row[2]) ? $Row[2] : '';
				$email = isset($Row[3]) ? $Row[3] : '';
				$category = isset($Row[4]) ? $Row[4] : '';
				$state = isset($Row[5]) ? $Row[5] : '';
				$password = isset($Row[6]) ? $Row[6] : '';
				$date = isset($Row[7]) ? $Row[7] : '';
				$time = isset($Row[8]) ? $Row[8] : '';
				$loggedin = isset($Row[9]) ? $Row[9] : '';
				$designation = isset($Row[10]) ? $Row[10] : '';
				$location = isset($Row[11]) ? $Row[11] : '';
				$bank = isset($Row[12]) ? $Row[12] : '';
				$pf = isset($Row[13]) ? $Row[13] : '';
				
				$pfuan = isset($Row[14]) ? $Row[14] : '';
				$esi = isset($Row[15]) ? $Row[15] : '';
				$acno = isset($Row[16]) ? $Row[16] : '';
				$absents = isset($Row[17]) ? $Row[17] : '';
				$basic = isset($Row[18]) ? $Row[18] : '';
				$others = isset($Row[19]) ? $Row[19] : '';
				$thome = isset($Row[20]) ? $Row[20] : '';
				$daf = isset($Row[21]) ? $Row[21] : '';
				$level1 = isset($Row[22]) ? $Row[22] : '';
				$level2 = isset($Row[23]) ? $Row[23] : '';
				$level3 = isset($Row[24]) ? $Row[24] : '';
				$level4 = isset($Row[25]) ? $Row[25] : '';
				$level5 = isset($Row[26]) ? $Row[26] : '';
				$level6 = isset($Row[27]) ? $Row[27] : '';
				$level7= isset($Row[28]) ? $Row[28] : '';
				$date1=date('Y-m-d',strtotime($date));
				
			    $html.="<td>".$i."</td>";
				$html.="<td>".$sno."</td>";
				$html.="<td>".$name."</td>";
				$html.="<td>".$mobile."</td>";
				$html.="<td>".$email."</td>";
				$html.="<td>".$level1."</td>";
				$html.="<td>".$level2."</td>";
				$html.="<td>".$level3."</td>";
				$html.="<td>".$level4."</td>";
				$html.="<td>".$level5."</td>";
				$html.="<td>".$level6."</td>";
				$html.="<td>".$level7."</td>";
				$html.="</tr>";

				 $q="select * from register where email='$email' ";
				
				$p=mysqli_query($link4,$q) or die(mysqli_error($link4));
				//$p=$link->query($q);
				
				$r=mysqli_fetch_array($p);
				 $email1=addslashes($r['email']);
			
				
				
				
				
				if(($email=='Email') or ($email=='')){
				    
				}elseif($email==$email1){
				    $m="update register set name='$name',phoneno='$mobile',category='$category',state='$state',password='$password',
	date='$date1',time='$time',loggedin='$loggedin',designation='$designation',location='$location',bank_name='$bank',pfnumber='$pf' ,
	pfuan='$pfuan',esinumber='$esi',acno='$acno',absents='$absents',basic='$basic',others='$others',takehome='$thome',daf='$daf',
	level1='$level1',level2='$level2',level3='$level3',level4='$level4',level5='$level5',level6='$level6',level7='$level7'
	where email='$email'  ";
					//$rt=mysqli_query($link,$m) or die(mysqli_error($link));
					//	$link->query($m);
							
				$res=mysqli_query($link4,$m) or die(mysqli_error($link4));
							}else{
							//$query = "insert into items(title,description) values('".$title."','".$description."')";
	 $query = "insert into register(name,phoneno,email,category,state,password,date,time,loggedin,designation,location,bank_name,pfnumber,pfuan,esinumber,acno,absents,basic,others,takehome,daf,level1,level2,level3,level4,level5,level6,level7)
							values('$name','$mobile','".addslashes($email)."','$category','$state','$password','$date1','$time','$loggedin','$designation','$location','$bank','$pf','$pfuan','$esi','$acno','$absents','$basic','$others','$thome','$daf','$level1','$level2','$level3','$level4','$level5','$level6','$level7')";     
    
	 $res=mysqli_query($link4,$query) or die(mysqli_error($link4));
				//$link->query($query);
				}
		
		}

		$html.="</table>";
		}		
		
	echo $html;
//exit;
		echo "<br />Data Inserted in dababase";
			print "<script>";
            print "alert('Successfully Registred ');";
			print "self.location='addapts.php';";
			print "</script>";

	}else { 
		die("<br/>Sorry, File type is not allowed. Only Excel file."); 
	}

}

?>