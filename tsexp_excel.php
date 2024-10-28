    <?php 
    require 'vendor/autoload.php';

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    // include('dbconnection/connection.php');
    $link = mysqli_connect("localhost", "a16673ai_payamath", "Payamath@2016", "a16673ai_jfm2324") or die("unable to connect to database");
    

    $datatable = "emp";
    $y = "SELECT * FROM expenses where state='TS' ORDER BY id desc";    

    $objPHPExcel = new Spreadsheet();
    $sheet = $objPHPExcel->getActiveSheet();

    $sheet->mergeCells('A1:G1');
    $sheet->getStyle("A1:G1")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('0000FF');
    $sheet->getStyle("A1:G4")->getFont()->setBold(true)->getColor()->setRGB('FFFFFF');
    $sheet->setCellValue('A1', 'JTECHNO ASSOCIATES FACILITY MANAGEMENT PVT.LTD');
    $sheet->getStyle("A1:G1")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $sheet->mergeCells('A3:G3');
    $sheet->getStyle("A4:G4")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('0000FF');
    $sheet->getStyle("A4:G4")->getFont()->setBold(true)->getColor()->setRGB('FFFFFF');
    $sheet->setCellValue('D2', 'EXPENSES LIST');

    $sheet->setCellValue('A4', 'SNo');
    $sheet->setCellValue('B4', 'DATE');
    $sheet->setCellValue('C4', 'STATE');
    $sheet->setCellValue('D4', 'DESCRIPTION');
    $sheet->setCellValue('E4', 'AMOUNT');
    $sheet->setCellValue('F4', 'USER');
    $sheet->setCellValue('G4', 'STATUS');

    $sqy = mysqli_query($link, "SELECT * FROM expenses where state='TS' ORDER BY id desc");  

    $sheet->getStyle("A2:G2")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('0000FF');
    // $sheet->getRowDimension('A')->setRowHeight(30);
    $sheet->getColumnDimension('B')->setWidth(22);
    $sheet->getColumnDimension('C')->setWidth(30);
    $sheet->getColumnDimension('D')->setWidth(20);
    $sheet->getColumnDimension('E')->setWidth(15);
    $sheet->getColumnDimension('F')->setWidth(20);
    $sheet->getColumnDimension('G')->setWidth(16);

    $i = 1;
    $rowCount = 5;

    while ($row = mysqli_fetch_array($sqy)) {
        $sheet->setCellValue('A' . $rowCount, mb_strtoupper($i, 'UTF-8'));
        $sheet->setCellValue('B' . $rowCount, mb_strtoupper($row['edate'], 'UTF-8'));
        $sheet->setCellValue('C' . $rowCount, mb_strtoupper($row['state'], 'UTF-8'));
        $sheet->setCellValue('D' . $rowCount, mb_strtoupper($row['expdesc'], 'UTF-8'));
        $sheet->setCellValue('E' . $rowCount, mb_strtoupper($row['amount'], 'UTF-8'));
        $sheet->setCellValue('F' . $rowCount, mb_strtoupper($row['user'], 'UTF-8'));
        $sheet->setCellValue('G' . $rowCount, mb_strtoupper($row['status'], 'UTF-8'));

        $rowCount++;
        $i++; 
    }

    $writer = new Xlsx($objPHPExcel);
    $fileName = 'tsexpenses.xlsx';
    $writer->save($fileName);

    header('Content-Type: application/vnd.ms-excel'); //mime type
    header('Content-Disposition: attachment;filename="' . $fileName . '"'); //tell browser what's the file name
    header('Cache-Control: max-age=0'); //no cache
    $writer->save('php://output');
    ?>
