<?php
require 'vendor/autoload.php'; // Include PhpSpreadsheet autoload file

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$link = mysqli_connect("localhost", "a16673ai_payamath", "Payamath@2016", "a16673ai_jfm2324") or die("unable to connect to database");
session_start();

$name = $_SESSION['user'];

ini_set('display_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['filter'])) {
    $fromdate = $_POST['fromdate'];
    $todate = $_POST['todate'];
}

$y = "SELECT * FROM request WHERE datecheck BETWEEN '$fromdate' AND '$todate' ORDER BY id DESC";

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->mergeCells('A1:K1');
$sheet->getStyle("A1:K1")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('800000');
$sheet->getStyle("A1:K1")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$sheet->setCellValue('A1', 'JTECHNO');
$sheet->getStyle("A1:K1")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->mergeCells('A4:K4');
$sheet->getStyle("A4:K4")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('800000');
$sheet->getStyle("A4:K4")->getFont()->setBold(true)->getColor()->setRGB('ffffff');

$sheet->setCellValue('A4', 'EMPLOYEE ACTIVITY REPORT');
$sheet->getStyle("A4:K4")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->setCellValue('C5', 'FROM DATE:');
$sheet->setCellValue('E5', 'TO DATE:');
$sheet->setCellValue('D5', $fromdate);
$sheet->setCellValue('F5', $todate);
$sheet->setCellValue('A6', 'S No.');
$sheet->setCellValue('B6', 'Emp ID');
$sheet->setCellValue('C6', 'Emp Name');
$sheet->setCellValue('D6', 'Store ID');
$sheet->setCellValue('E6', 'Store Name');
$sheet->setCellValue('F6', 'Check-IN Location');
$sheet->setCellValue('G6', 'Check-IN Time');
$sheet->setCellValue('H6', 'Check-IN Date');
$sheet->setCellValue('I6', 'Check-OUT Location');
$sheet->setCellValue('J6', 'Check-OUT Time');
$sheet->setCellValue('K6', 'Check-OUT Date');
$sheet->getStyle("A6:K6")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('800000');
// $sheet->getRowDimension('A')->setRowHeight(9);
$sheet->getColumnDimension('B')->setWidth(16);
$sheet->getColumnDimension('C')->setWidth(12);
$sheet->getColumnDimension('D')->setWidth(21);
$sheet->getColumnDimension('E')->setWidth(20);
$sheet->getColumnDimension('F')->setWidth(20);
$sheet->getColumnDimension('G')->setWidth(14);
$sheet->getColumnDimension('H')->setWidth(15);
$sheet->getColumnDimension('I')->setWidth(20);
$sheet->getColumnDimension('J')->setWidth(14);
$sheet->getColumnDimension('K')->setWidth(15);

$sheet->getStyle("A6:K6")->getFont()->setBold(true)->getColor()->setRGB('ffffff');

$link = mysqli_connect("localhost", "a16673ai_payamath", "Payamath@2016", "a16673ai_jfm2324") or die("unable to connect to database");

$result = mysqli_query($link, $y) or die(mysqli_error($link)); // Changed $db to $link
$i = 1;
$rowCount = 7;

while ($row = mysqli_fetch_assoc($result)) { // Changed $result->fetch_assoc() to mysqli_fetch_assoc($result)
    $sheet->setCellValue('A' . $rowCount, mb_strtoupper($i, 'UTF-8'));
    $sheet->setCellValue('B' . $rowCount, mb_strtoupper($row['empid'], 'UTF-8'));
    $sheet->setCellValue('C' . $rowCount, mb_strtoupper($row['uploadby'], 'UTF-8'));
    $sheet->setCellValue('D' . $rowCount, mb_strtoupper($row['indid'], 'UTF-8'));
    $sheet->setCellValue('E' . $rowCount, mb_strtoupper($row['sname'], 'UTF-8'));
    $sheet->setCellValue('F' . $rowCount, mb_strtoupper($row['loc'], 'UTF-8'));
    $sheet->setCellValue('G' . $rowCount, mb_strtoupper($row['time'], 'UTF-8'));
    $sheet->setCellValue('H' . $rowCount, mb_strtoupper($row['date'], 'UTF-8'));
    $sheet->setCellValue('I' . $rowCount, mb_strtoupper($row['checkoutloc'], 'UTF-8'));
    $sheet->setCellValue('J' . $rowCount, mb_strtoupper($row['checkoutime'], 'UTF-8'));
    $sheet->setCellValue('K' . $rowCount, mb_strtoupper($row['checkoutdate'], 'UTF-8'));
    $rowCount++;
    $i++;
}

$writer = new Xlsx($spreadsheet);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="emp_report.xlsx"');
header('Cache-Control: max-age=0');

$writer->save('php://output');
?>
