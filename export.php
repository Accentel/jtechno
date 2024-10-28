<?php include_once('config.php'); 
include('PHPExcel-1.8/Classes/PHPExcel.php');
include 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php';
$objPHPExcel	=	new	PHPExcel();
$result			=	$db->query("SELECT * FROM add_qot") or die(mysql_error());

$objPHPExcel->setActiveSheetIndex(0);

$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'SNo');
$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Qutation No');
$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Store Code');

$objPHPExcel->getActiveSheet()->getStyle("A1:C1")->getFont()->setBold(true);
$i=1;
$rowCount	=	2;
while($row	=	$result->fetch_assoc()){
	$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, mb_strtoupper($i,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, mb_strtoupper($row['quet_num'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, mb_strtoupper($row['store_code'],'UTF-8'));
	$rowCount++;
}


$objWriter	=	new PHPExcel_Writer_Excel2007($objPHPExcel);


header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="apqot.xlsx"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
$objWriter->save('php://output');
?>