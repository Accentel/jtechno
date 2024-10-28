<?php
require 'vendor/autoload.php';
include_once('config.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$tsname = $_GET['user'];

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->mergeCells('A1:AF1');
$sheet->getStyle("A1:AF1")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setRGB('800000');
$sheet->getStyle("A1:AF1")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$sheet->setCellValue('A1', 'JTECHNO ASSOCIATES FACILITY MANAGEMENT PVT.LTD');
$sheet->getStyle("A1:AF1")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->mergeCells('A4:AF4');
$sheet->getStyle("A4:AF4")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setRGB('800000');
$sheet->getStyle("A4:AF4")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$sheet->setCellValue('A4', 'KARNATAKA QUOTATION LIST');
$sheet->getStyle("A4:AF4")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

$sheet->setCellValue('A6', 'SNo');
$sheet->setCellValue('B6', 'Quotation No');
$sheet->setCellValue('C6', 'Store Code');
$sheet->setCellValue('D6', 'Store Name');
$sheet->setCellValue('E6', 'Coordinator Name');
$sheet->setCellValue('F6', 'Supervisor');
$sheet->setCellValue('G6', 'City');
$sheet->setCellValue('H6', 'Date');
$sheet->setCellValue('I6', 'Store Type');
$sheet->setCellValue('J6', 'Company Name');
$sheet->setCellValue('K6', 'Afm');
$sheet->setCellValue('L6', 'Fault No');
$sheet->setCellValue('M6', 'Fault Date');
$sheet->setCellValue('N6', 'Fault Desc');
$sheet->setCellValue('O6', 'RO No');
$sheet->setCellValue('P6', 'RO Date');
$sheet->setCellValue('Q6', 'Description');
$sheet->setCellValue('R6', 'Service Id');
$sheet->setCellValue('S6', 'Brand/Make');
$sheet->setCellValue('T6', 'Model');
$sheet->setCellValue('U6', 'Hsn/San Code');
$sheet->setCellValue('V6', 'Gst');
$sheet->setCellValue('W6', 'Uom');
$sheet->setCellValue('X6', 'Rate');
$sheet->setCellValue('Y6', 'Qty');
$sheet->setCellValue('Z6', 'Base Amount');
$sheet->setCellValue('AA6', 'Service Amount');
$sheet->setCellValue('AB6', 'Gst Amount');
$sheet->setCellValue('AC6', 'RO Amount');
$sheet->setCellValue('AD6', 'GST Amount');
$sheet->setCellValue('AE6', 'Service Amount');
$sheet->setCellValue('AF6', 'Total');
$sheet->getStyle("A6:AF6")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setRGB('800000');
$sheet->getStyle("A6:AF6")->getFont()->setBold(true)->getColor()->setRGB('ffffff');

$y = "SELECT * FROM add_knqot1 ORDER BY id desc";
$result = $db->query($y) or die(mysqli_error($db));
$rowCount = 7;
$i = 1;
while ($row10 = $result->fetch_assoc()) {
    $id1 = $row10['id1'];
    $id2 = $row10['id'];
    $y10 = "SELECT * FROM add_knqot where id='$id1'";
    $result10 = $db->query($y10) or die(mysqli_error($db));
    $row = $result10->fetch_assoc();
    $sheet->setCellValue('A' . $rowCount, mb_strtoupper($i, 'UTF-8'));
    $sheet->setCellValue('B' . $rowCount, mb_strtoupper($row['quet_num'], 'UTF-8'));
    $sheet->setCellValue('C' . $rowCount, mb_strtoupper($scode = $row['store_code'], 'UTF-8'));
	$ds = "select * from dpr where store_code='$scode'";
	$result1 = $db->query($ds) or die(mysqli_error($db));
	$row1 = $result1->fetch_assoc();
	$sheet->setCellValue('D' . $rowCount, mb_strtoupper($row1['store_name'], 'UTF-8'));
	$sheet->setCellValue('E' . $rowCount, mb_strtoupper($row1['coordinator'], 'UTF-8'));
	$sheet->setCellValue('F' . $rowCount, mb_strtoupper($row1['superwisor'], 'UTF-8'));
	$sheet->setCellValue('G' . $rowCount, mb_strtoupper($row1['city'], 'UTF-8'));
	$sheet->setCellValue('H' . $rowCount, mb_strtoupper(date('d-m-Y', strtotime($row['inv_date'])), 'UTF-8'));
	$sheet->setCellValue('I' . $rowCount, mb_strtoupper($row1['format_type'], 'UTF-8'));
	$sheet->setCellValue('J' . $rowCount, mb_strtoupper($row1['company_name'], 'UTF-8'));
	$sheet->setCellValue('K' . $rowCount, mb_strtoupper($row1['afm'], 'UTF-8'));
	$sheet->setCellValue('L' . $rowCount, mb_strtoupper($row['falt_no'], 'UTF-8'));
	$sheet->setCellValue('M' . $rowCount, mb_strtoupper(date('d-m-Y', strtotime($row['falt_date'])), 'UTF-8'));
	$sheet->setCellValue('N' . $rowCount, mb_strtoupper($row['falt_desc'], 'UTF-8'));
	$sheet->setCellValue('O' . $rowCount, mb_strtoupper($row['ro_no'], 'UTF-8'));
	$sheet->setCellValue('P' . $rowCount, mb_strtoupper($row['ro_date'], 'UTF-8'));
	
	$ds1 = "select * from add_knqot1 where id1='$id1' and id='$id2'";
	$result2 = $db->query($ds1) or die(mysqli_error($db));
	$row2 = $result2->fetch_assoc();
	
	$sheet->setCellValue('Q' . $rowCount, mb_strtoupper($row2['desc1'], 'UTF-8'));
	$sheet->setCellValue('R' . $rowCount, mb_strtoupper($row2['serv_code'], 'UTF-8'));
	$sheet->setCellValue('S' . $rowCount, mb_strtoupper($row2['brand'], 'UTF-8'));
	$sheet->setCellValue('T' . $rowCount, mb_strtoupper($row2['model'], 'UTF-8'));
	$sheet->setCellValue('U' . $rowCount, mb_strtoupper($row2['hsn'], 'UTF-8'));
	$sheet->setCellValue('V' . $rowCount, mb_strtoupper($row2['gst'], 'UTF-8'));
	$sheet->setCellValue('W' . $rowCount, mb_strtoupper($row2['uom'], 'UTF-8'));
	$sheet->setCellValue('X' . $rowCount, mb_strtoupper($row2['rate'], 'UTF-8'));
	$sheet->setCellValue('Y' . $rowCount, mb_strtoupper($row2['qty'], 'UTF-8'));
	$sheet->setCellValue('Z' . $rowCount, mb_strtoupper($row2['base_amt'], 'UTF-8'));
	$sheet->setCellValue('AA' . $rowCount, mb_strtoupper($row2['serv_amt'], 'UTF-8'));
	$sheet->setCellValue('AB' . $rowCount, mb_strtoupper($row2['gst_amnt'], 'UTF-8'));
	$sheet->setCellValue('AC' . $rowCount, mb_strtoupper($row['tot_base'], 'UTF-8'));
	$sheet->setCellValue('AD' . $rowCount, mb_strtoupper($row['tot_ser'], 'UTF-8'));
	$sheet->setCellValue('AE' . $rowCount, mb_strtoupper($row['tot_gst'], 'UTF-8'));
	$sheet->setCellValue('AF' . $rowCount, mb_strtoupper($row['net'], 'UTF-8'));
	
    // ... Populate other cell values ...

    $rowCount++;
    $i++;
}

$writer = new Xlsx($spreadsheet);
$filename = 'knquotationsdetailslist.xlsx';
$writer->save($filename);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="' . $filename . '"');
header('Cache-Control: max-age=0');
$writer->save('php://output');
?>
