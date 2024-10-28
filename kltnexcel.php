<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('dbconnection/connection2.php'); 
include('PHPExcel-1.8/Classes/PHPExcel.php');
include 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php';
 //$tsname=$_GET['user'];
$datatable="register";
$y="SELECT * FROM ".$datatable."    ORDER BY id desc";    

$objPHPExcel	=	new	PHPExcel();
$objPHPExcel->getActiveSheet()->mergeCells('A1:AC1');
 $objPHPExcel->getActiveSheet()->getStyle("A1:AC1")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('0000FF');
 $objPHPExcel->getActiveSheet()->getStyle("A1:AC1")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
 $objPHPExcel->getActiveSheet()->setCellValue('A1', 'JYOTHI FACILITY MANAGEMENT PVT.LTD EMPLOYEES');
 $objPHPExcel->getActiveSheet()->getStyle("A1:AC1")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->SetCellValue('A3', 'SNo');
$objPHPExcel->getActiveSheet()->SetCellValue('B3', 'Name');
$objPHPExcel->getActiveSheet()->SetCellValue('C3', 'Mobile No');
$objPHPExcel->getActiveSheet()->SetCellValue('D3', 'Email');
$objPHPExcel->getActiveSheet()->SetCellValue('E3', 'Category');
$objPHPExcel->getActiveSheet()->SetCellValue('F3', 'State');
$objPHPExcel->getActiveSheet()->SetCellValue('G3', 'Password');
$objPHPExcel->getActiveSheet()->SetCellValue('H3', 'Date');
$objPHPExcel->getActiveSheet()->SetCellValue('I3', 'Time');
$objPHPExcel->getActiveSheet()->SetCellValue('J3', 'Logged IN');
$objPHPExcel->getActiveSheet()->SetCellValue('K3', 'Designation');
$objPHPExcel->getActiveSheet()->SetCellValue('L3', 'Location');
$objPHPExcel->getActiveSheet()->SetCellValue('M3', 'Bank Name');
$objPHPExcel->getActiveSheet()->SetCellValue('N3', 'PF No Name');
$objPHPExcel->getActiveSheet()->SetCellValue('O3', 'PF UAN');
$objPHPExcel->getActiveSheet()->SetCellValue('P3', 'Esi Number');
$objPHPExcel->getActiveSheet()->SetCellValue('Q3', 'Ac NO');
$objPHPExcel->getActiveSheet()->SetCellValue('R3', 'Absents');
$objPHPExcel->getActiveSheet()->SetCellValue('S3', 'Basic');
$objPHPExcel->getActiveSheet()->SetCellValue('T3', 'Others');
$objPHPExcel->getActiveSheet()->SetCellValue('U3', 'Take Home');
$objPHPExcel->getActiveSheet()->SetCellValue('V3', 'Daf');
$objPHPExcel->getActiveSheet()->SetCellValue('W3', 'Level1');
$objPHPExcel->getActiveSheet()->SetCellValue('X3', 'Level2');
$objPHPExcel->getActiveSheet()->SetCellValue('Y3', 'Level3');
$objPHPExcel->getActiveSheet()->SetCellValue('Z3', 'Level4');
$objPHPExcel->getActiveSheet()->SetCellValue('AA3', 'Level5');
$objPHPExcel->getActiveSheet()->SetCellValue('AB3', 'Level6');
$objPHPExcel->getActiveSheet()->SetCellValue('AC3', 'Level7');
$objPHPExcel->getActiveSheet()->getStyle("A3:AC3")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('0000FF');
       // $objPHPExcel->getActiveSheet()->getRowDimension('6')->setRowHeight(30);
       $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(22);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(12);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(16);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(13);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(12);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(14);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(13);
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(13);
        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(22);
        $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
 
$objPHPExcel->getActiveSheet()->getStyle("A3:AC3")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$result			=	mysqli_query($link1,$y) or die(mysqli_error($link1));
$i=1;
$rowCount	=	4;
while($row	=	mysqli_fetch_assoc($result)){
	$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, mb_strtoupper($i,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, mb_strtoupper(trim(addslashes($row['name'])),'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, mb_strtoupper(trim($row['phoneno']),'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, mb_strtoupper(trim($row['email']),'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, mb_strtoupper(trim($row['category']),'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, mb_strtoupper(trim($row['state']),'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, mb_strtoupper(trim($row['password']),'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, mb_strtoupper(date('d-m-Y',strtotime($row['date'])),'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, mb_strtoupper(trim($row['time']),'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, mb_strtoupper(trim($row['loggedin']),'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, mb_strtoupper(trim($row['designation']),'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, mb_strtoupper(trim($row['location']),'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, mb_strtoupper(trim($row['bank_name']),'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('N'.$rowCount, mb_strtoupper(trim($row['pfnumber']),'UTF-8'));
	
	$objPHPExcel->getActiveSheet()->SetCellValue('O'.$rowCount, mb_strtoupper(trim($row['pfuan']),'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('P'.$rowCount, mb_strtoupper(trim($row['esinumber']),'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('Q'.$rowCount, mb_strtoupper(trim($row['acno']),'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('R'.$rowCount, mb_strtoupper(trim($row['absents']),'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('S'.$rowCount, mb_strtoupper(trim($row['basic']),'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('T'.$rowCount, mb_strtoupper(trim($row['others']),'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('U'.$rowCount, mb_strtoupper(trim($row['takehome']),'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('V'.$rowCount, mb_strtoupper(trim($row['daf']),'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('W'.$rowCount, mb_strtoupper(trim($row['level1']),'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('X'.$rowCount, mb_strtoupper(trim($row['level2']),'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('Y'.$rowCount, mb_strtoupper(trim($row['level3']),'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('Z'.$rowCount, mb_strtoupper(trim($row['level4']),'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AA'.$rowCount, mb_strtoupper(trim($row['level5']),'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AB'.$rowCount, mb_strtoupper(trim($row['level6']),'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AC'.$rowCount, mb_strtoupper(trim($row['level7']),'UTF-8'));
	$rowCount++;
$i++; }
$objWriter	=	new PHPExcel_Writer_Excel2007($objPHPExcel);
header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="kltnemployeeslist.xlsx"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
$objWriter->save('php://output');
?>