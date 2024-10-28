<?php
// Include the PhpSpreadsheet classes
// include_once('config.php'); 
require 'vendor/autoload.php';

// $host = 'localhost';
// $username = 'a16673ai_payamath';
// $password = 'Payamath@2016';
// $database = 'a16673ai_jfm2324';

// Create a database connection
// $link = new mysqli($host, $username, $password, $database);
// if ($link->connect_error) {
//     die("Connection failed: " . $link->connect_error);


use PhpOffice\PhpSpreadsheet\Spreadsheet; // nufa
use PhpOffice\PhpSpreadsheet\Writer\Xlsx; // nufa
use PhpOffice\PhpSpreadsheet\Style\Fill; // In PhpSpreadsheet, the fill styles are managed using this class, 
use PhpOffice\PhpSpreadsheet\Style\Alignment; // In PhpSpreadsheet, alignment and other styling features are handled using this classes and methods
// use PhpOffice\PhpSpreadsheet\Style\Font;
// use PhpOffice\PhpSpreadsheet\Style\Border;
// use PhpOffice\PhpSpreadsheet\Style\Color;
// use PhpOffice\PhpSpreadsheet\IOFactory;

// Create a new Spreadsheet object
//$spreadsheet = new Spreadsheet();
$objPHPExcel = new Spreadsheet();

$objPHPExcel	=	new	Spreadsheet();
$objPHPExcel->getActiveSheet()->mergeCells('A1:O1');
 $objPHPExcel->getActiveSheet()->getStyle("A1:O1")->getFill()->setFillType(Fill::FILL_SOLID) 
        ->getStartColor()->setRGB('800000'); //changed
 $objPHPExcel->getActiveSheet()->getStyle("A1:O1")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
 $objPHPExcel->getActiveSheet()->setCellValue('A1', 'JTECHNO ASSOCIATES FACILITY MANAGEMENT PVT.LTD');
 $objPHPExcel->getActiveSheet()->getStyle("A1:O1")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER); // changed
 $objPHPExcel->getActiveSheet()->mergeCells('A4:O4');
 $objPHPExcel->getActiveSheet()->getStyle("A4:O4")->getFill()->setFillType(Fill::FILL_SOLID)
        ->getStartColor()->setRGB('800000');
        $objPHPExcel->getActiveSheet()->getStyle("A4:O4")->getFont()->setBold(true)->getColor()->setRGB('ffffff');

 $objPHPExcel->getActiveSheet()->setCellValue('A4', 'KARNATAKA QUOTATION LIST');
 $objPHPExcel->getActiveSheet()->getStyle("A4:O4")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->SetCellValue('A6', 'SNo');
$objPHPExcel->getActiveSheet()->SetCellValue('B6', 'Quotation No');
$objPHPExcel->getActiveSheet()->SetCellValue('C6', 'Store Code');
$objPHPExcel->getActiveSheet()->SetCellValue('D6', 'Store Name');
$objPHPExcel->getActiveSheet()->SetCellValue('E6', 'Coordinator Name');
$objPHPExcel->getActiveSheet()->SetCellValue('F6', 'Supervisor');
$objPHPExcel->getActiveSheet()->SetCellValue('G6', 'Fault');
$objPHPExcel->getActiveSheet()->SetCellValue('H6', 'City');
$objPHPExcel->getActiveSheet()->SetCellValue('I6', 'Date');
$objPHPExcel->getActiveSheet()->SetCellValue('J6', 'Ro Amount');
$objPHPExcel->getActiveSheet()->SetCellValue('K6', 'Service Amount');
$objPHPExcel->getActiveSheet()->SetCellValue('L6', 'Gst Amount');
$objPHPExcel->getActiveSheet()->SetCellValue('M6', 'Total Amount');
$objPHPExcel->getActiveSheet()->SetCellValue('N6', 'Status');
$objPHPExcel->getActiveSheet()->SetCellValue('O6', 'User');
$objPHPExcel->getActiveSheet()->getStyle("A6:O6")->getFill()->setFillType(Fill::FILL_SOLID)
        ->getStartColor()->setRGB('800000');
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
        $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
 
$objPHPExcel->getActiveSheet()->getStyle("A6:O6")->getFont()->setBold(true)->getColor()->setRGB('ffffff');


// $host = 'localhost';
// $username = 'a16673ai_payamath';
// $password = 'Payamath@2016';
// $database = 'a16673ai_jfm2324';

// // Create a database connection
// $link = new mysqli($host, $username, $password, $database);
// if ($link->connect_error) {
//     die("Connection failed: " . $link->connect_error);
// }

// $query = "SELECT store_name,city,net FROM dpr";
// $result = $link->query($query);

// Populate spreadsheet with database results
// $row = 7; // Start from row 2 (row 1 is for headers)
// while ($row_data = $result->fetch_assoc()) {
//     $sheet->setCellValue('A' . $row, $row_data['store_name']);
//     $sheet->setCellValue('B' . $row, $row_data['city']);
//     $sheet->setCellValue('C' . $row, $row_data['status']);
//     $row++;
// }









// Create a new worksheet
$sheet = $objPHPExcel->getActiveSheet();

// Set cell values
// $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Hello')
//       ->setCellValue('B1', 'PhpSpreadsheet')
//       ->setCellValue('A2', 'This is a sample')
//       ->setCellValue('B2', 'Excel spreadsheet');

// // Set column widths
// $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
// $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);

// Create a new Xlsx Writer
$writer = new Xlsx($objPHPExcel);

// Set the appropriate headers for file download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="sample.xlsx"');
header('Cache-Control: max-age=0');

// Save the spreadsheet to the output
$writer->save('php://output');


?>