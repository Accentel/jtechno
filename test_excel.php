<?php
require 'vendor/autoload.php'; // Include PhpSpreadsheet autoload

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Create a new Spreadsheet object
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Set cell values
$sheet->setCellValue('A1', 'Hello');
$sheet->setCellValue('B1', 'World');

// Set cell styling
$sheet->getStyle('A1:B1')->getFont()->setBold(true);
$sheet->getStyle('A1:B1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

// Save the spreadsheet to a file
$writer = new Xlsx($spreadsheet);
$writer->save('hello_world.xlsx');

echo "Excel file created successfully!";
?>