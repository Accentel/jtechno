<?php

require 'vendor/autoload.php'; // Include the Composer autoloader

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Create a new spreadsheet
$spreadsheet = new Spreadsheet();

// Set the active sheet to the first sheet
$sheet = $spreadsheet->getActiveSheet();

// Add some data to the sheet
$sheet->setCellValue('A1', 'Hello');
$sheet->setCellValue('B1', 'World!');

// Create a writer for Xlsx
$writer = new Xlsx($spreadsheet);

// Set headers for download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="hello_world.xlsx"');
header('Cache-Control: max-age=0');

// Save the spreadsheet to php://output (output to browser)
$writer->save('php://output');

// Exit script to prevent any additional output
exit;
?>
