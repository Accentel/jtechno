<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

include_once('config.php');

$tsname = $_GET['user'];
if (($tsname == 'admin') || ($tsname == 'durgarao') || ($tsname == 'accounts') || ($tsname == 'sumanthpotluri') || ($tsname == 'knbilling') || ($tsname == 'naiduys')) {
    $y = "SELECT distinct quet_num,user FROM `knrequest_amnt` where  status='Amount Transferred' and bill_status='' or docr_status='Cancel'    ";
} else {
    $y = "SELECT distinct quet_num,user FROM `knrequest_amnt` where  status='Amount Transferred'  and bill_status=''   and user='$tsname' or docr_status='Cancel'  ";
}

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->mergeCells('A1:R1');
$sheet->getStyle("A1:R1")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setRGB('800000');
$sheet->getStyle("A1:R1")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$sheet->setCellValue('A1', 'JTECHNO ASSOCIATES FACILITY MANAGEMENT PVT.LTD');
$sheet->getStyle("A1:R1")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->mergeCells('A4:R4');
$sheet->getStyle("A4:R4")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setRGB('800000');
$sheet->getStyle("A4:R4")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$sheet->setCellValue('A4', 'KARNATAKA DOCUMENT REQUIRED LIST');
$sheet->getStyle("A4:R4")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->setCellValue('A6', 'SNo');
$sheet->setCellValue('B6', 'Quotation No');
$sheet->setCellValue('C6', 'Supervisor');
$sheet->setCellValue('D6', 'Coordinator');
$sheet->setCellValue('E6', 'AFM');
$sheet->setCellValue('F6', 'Store Name');
$sheet->setCellValue('G6', 'Store Code');
$sheet->setCellValue('H6', 'Store Type');
$sheet->setCellValue('I6', 'Ro Num');
$sheet->setCellValue('J6', 'Ro Date');
$sheet->setCellValue('K6', 'Fault Description');
$sheet->setCellValue('L6', 'Ro Amount');
$sheet->setCellValue('M6', 'Service Fee');
$sheet->setCellValue('N6', 'Gst Amount');
$sheet->setCellValue('O6', 'Total Amount');
$sheet->setCellValue('P6', 'Whom To be Invest');
$sheet->setCellValue('Q6', 'Transfer Amount');
$sheet->setCellValue('R6', 'Amount Transferred Date');
$sheet->setCellValue('S6', 'User');
$sheet->getStyle("A6:R6")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setRGB('800000');
$sheet->getColumnDimension('B')->setWidth(19);
$sheet->getColumnDimension('C')->setWidth(16);
$sheet->getColumnDimension('D')->setWidth(20);
$sheet->getColumnDimension('E')->setWidth(23);
$sheet->getColumnDimension('F')->setWidth(10);
$sheet->getColumnDimension('G')->setWidth(20);
$sheet->getColumnDimension('H')->setWidth(15);
$sheet->getColumnDimension('I')->setWidth(12);
$sheet->getColumnDimension('J')->setWidth(22);
$sheet->getColumnDimension('K')->setWidth(12);
$sheet->getColumnDimension('L')->setWidth(12);
$sheet->getColumnDimension('M')->setWidth(13);
$sheet->getColumnDimension('N')->setWidth(13);
$sheet->getColumnDimension('O')->setWidth(13);
$sheet->getColumnDimension('P')->setWidth(13);
$sheet->getColumnDimension('Q')->setWidth(22);
$sheet->getColumnDimension('R')->setWidth(22);
$sheet->getColumnDimension('S')->setWidth(22);
$sheet->getStyle("A6:R6")->getFont()->setBold(true)->getColor()->setRGB('ffffff');

$result = $db->query($y) or die(mysqli_error());
$i = 1;
$rowCount = 7;

while ($row = $result->fetch_assoc()) {
    $qtno = $row['quet_num'];
    $a = "select store_code,ro_no,ro_date,falt_desc,id,tot_base,tot_ser,tot_gst,net from add_knqot where quet_num='$qtno'";
    $result1 = $db->query($a) or die(mysqli_error());
    $row1 = $result1->fetch_assoc();
    $str_code = $row1['store_code'];
    $ds = "select * from dpr where store_code='$str_code'";
    $result2 = $db->query($ds) or die(mysqli_error());
    $row2 = $result2->fetch_assoc();

    $sheet->setCellValue('A' . $rowCount, mb_strtoupper($i, 'UTF-8'));
    $sheet->setCellValue('B' . $rowCount, mb_strtoupper($qtno, 'UTF-8'));
    $sheet->setCellValue('C' . $rowCount, mb_strtoupper($row2['superwisor'], 'UTF-8'));
    $sheet->setCellValue('D' . $rowCount, mb_strtoupper($row2['coordinator'], 'UTF-8'));
    $sheet->setCellValue('E' . $rowCount, mb_strtoupper($row2['afm'], 'UTF-8'));
    $sheet->setCellValue('F' . $rowCount, mb_strtoupper($row2['store_name'], 'UTF-8'));
    $sheet->setCellValue('G' . $rowCount, mb_strtoupper($str_code, 'UTF-8'));
    $sheet->setCellValue('H' . $rowCount, mb_strtoupper($row2['format_type'], 'UTF-8'));
    $sheet->setCellValue('I' . $rowCount, mb_strtoupper($row1['ro_no'], 'UTF-8'));
    $sheet->setCellValue('J' . $rowCount, mb_strtoupper(date('d-m-Y', strtotime($row1['ro_date'])), 'UTF-8'));
    $sheet->setCellValue('K' . $rowCount, mb_strtoupper($row1['falt_desc'], 'UTF-8'));
    $sheet->setCellValue('L' . $rowCount, mb_strtoupper($row1['tot_base'], 'UTF-8'));
    $sheet->setCellValue('M' . $rowCount, mb_strtoupper($row1['tot_ser'], 'UTF-8'));
    $sheet->setCellValue('N' . $rowCount, mb_strtoupper($row1['tot_gst'], 'UTF-8'));
    $sheet->setCellValue('O' . $rowCount, mb_strtoupper($row1['net'], 'UTF-8'));

    $ac = $row['ac_det'];
    $yt = "select approve_amnt,ac_det,transfer_date from knrequest_amnt where quet_num='$qtno' and  confirm='Yes'";
    $result4 = $db->query($yt) or die(mysqli_error());
    $array = '';
    while ($row4 = $result4->fetch_assoc()) {
        $at = $row4['approve_amnt'];
        $sc = $row4['ac_det'];
        $rdate = date('d-m-Y', strtotime($row4['transfer_date']));
        $array .= $sc . "-" . $at . "(" . $rdate . "),";
    }
    $sheet->setCellValue('P' . $rowCount, $array);

    $a10 = "select sum(approve_amnt) as req_amnt from knrequest_amnt where quet_num='$qtno' and  confirm='Yes' ";
    $result10 = $db->query($a10) or die(mysqli_error());
    $row3 = $result10->fetch_assoc();
    $sheet->setCellValue('Q' . $rowCount, mb_strtoupper($row3['req_amnt'], 'UTF-8'));

    $a11 = "select transfer_date from knrequest_amnt where quet_num='$qtno' and  confirm='Yes' order by id desc limit 1 ";
    $result11 = $db->query($a11) or die(mysqli_error());
    $row4 = $result11->fetch_assoc();
    $sheet->setCellValue('R' . $rowCount, mb_strtoupper($row4['transfer_date'], 'UTF-8'));
    $sheet->setCellValue('S' . $rowCount, mb_strtoupper($row['user'], 'UTF-8'));
    $rowCount++;
    $i++;
}

$writer = new Xlsx($spreadsheet);

$dt = date('d-m-Y');
header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="kndocument' . $dt . '.xlsx"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache
$writer->save('php://output');
?>
