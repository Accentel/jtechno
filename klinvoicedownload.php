<?php 
function numberTowords2($number)
{
   
   $no = floor($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'one', '2' => 'two',
    '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
    '7' => 'seven', '8' => 'eight', '9' => 'nine',
    '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
    '13' => 'thirteen', '14' => 'fourteen',
    '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
    '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
    '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
    '60' => 'sixty', '70' => 'seventy',
    '80' => 'eighty', '90' => 'ninety');
   $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';
  return 'Total Invoice Amount in Words - '.strtoupper($result).' RUPEES ONLY ';
}
function numberTowords($num)
{ 
$ones = array( 
1 => "one", 
2 => "two", 
3 => "three", 
4 => "four", 
5 => "five", 
6 => "six", 
7 => "seven", 
8 => "eight", 
9 => "nine", 
10 => "ten", 
11 => "eleven", 
12 => "twelve", 
13 => "thirteen", 
14 => "fourteen", 
15 => "fifteen", 
16 => "sixteen", 
17 => "seventeen", 
18 => "eighteen", 
19 => "nineteen" 
); 
$tens = array( 
1 => "ten",
2 => "twenty", 
3 => "thirty", 
4 => "forty", 
5 => "fifty", 
6 => "sixty", 
7 => "seventy", 
8 => "eighty", 
9 => "ninety" 
); 
$hundreds = array( 
"hundred", 
"thousand", 
"million", 
"billion", 
"trillion", 
"quadrillion" 
); //limit t quadrillion 
$num = number_format($num,2,".",","); 
$num_arr = explode(".",$num); 
$wholenum = $num_arr[0]; 
$decnum = $num_arr[1]; 
$whole_arr = array_reverse(explode(",",$wholenum)); 
krsort($whole_arr); 
$rettxt = ""; 
foreach($whole_arr as $key => $i){ 
if($i < 20){ 
$rettxt .= $ones[$i]; 
}elseif($i < 100){ 
$rettxt .= $tens[substr($i,0,1)]; 
$rettxt .= " ".$ones[substr($i,1,1)]; 
}else{ 
$rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0]; 
$rettxt .= " ".$tens[substr($i,1,1)]; 
$rettxt .= " ".$ones[substr($i,2,1)]; 
} 
if($key > 0){ 
$rettxt .= " ".$hundreds[$key]." "; 
} 
} 
if($decnum > 0){ 
$rettxt .= " and "; 
if($decnum < 20){ 
$rettxt .= $ones[$decnum]; 
}elseif($decnum < 100){ 
$rettxt .= $tens[substr($decnum,0,1)]; 
$rettxt .= " ".$ones[substr($decnum,1,1)]; 
} 
} 
return 'Total Invoice Amount in Words - '.strtoupper($rettxt).' RUPEES ONLY'; 
} 

extract($_POST);
if(isset($convert))
{
echo "<p align='center' style='color:blue'>".numberTowords2("$num")."</p>";
}

?>
<?php
include_once('config.php'); 
include('PHPExcel-1.8/Classes/PHPExcel.php');
include 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php';
//require_once 'PHPExcel.php';
//$objPHPExcel = new PHPExcel();
$qtno=$_GET['id'];
$yk="select * from klqot_bill where quet_num='$qtno'";
$resultk=$db->query($yk) or die(mysql_error());
$row1k=$resultk->fetch_assoc();
$invnum=$row1k['inv_num'];


$objPHPExcel = new PHPExcel();
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Hello');
$objPHPExcel->getActiveSheet()->SetCellValue('B2', 'world!');
$objPHPExcel->getActiveSheet()->SetCellValue('D2', 'world!');
$objPHPExcel->getActiveSheet()->setTitle('MyTest');

$gdImage = imagecreatefromjpeg('images/apjyothi.jpg');

$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
$objDrawing->setName('Sample image');
$objDrawing->setWidth(350);
$objDrawing->setWidth(90);
$objDrawing->setDescription('TEST');
$objDrawing->setImageResource($gdImage);
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
 $objPHPExcel->getActiveSheet()->mergeCells('A6:N6');
 $objPHPExcel->getActiveSheet()->getStyle("A6:N6")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('0000FF');
 $objPHPExcel->getActiveSheet()->getStyle("A6:N6")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
 $objPHPExcel->getActiveSheet()->setCellValue('A6', 'ORIGINAL FOR RECEIPT');
 $objPHPExcel->getActiveSheet()->getStyle("A6:N6")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->mergeCells('A8:N8');
 $objPHPExcel->getActiveSheet()->getStyle("A8:N8")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('0000FF');
 $objPHPExcel->getActiveSheet()->getStyle("A8:N8")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
 $objPHPExcel->getActiveSheet()->setCellValue('A8', 'TAX INVOICE');
 $objPHPExcel->getActiveSheet()->getStyle("A8:N8")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 
 
 
 $objPHPExcel->getActiveSheet()->SetCellValue('A9', 'Incoice No');
 $objPHPExcel->getActiveSheet()->SetCellValue('B9', $invnum,'UTF-8');
  $objPHPExcel->getActiveSheet()->SetCellValue('H9', 'State');
 $objPHPExcel->getActiveSheet()->SetCellValue('I9', 'Kerala','UTF-8');
 
 $objPHPExcel->getActiveSheet()->SetCellValue('A10', 'Po No');
 $objPHPExcel->getActiveSheet()->SetCellValue('B10', 'test','UTF-8');
  
 
 $objPHPExcel->getActiveSheet()->SetCellValue('A11', 'Date');
 $objPHPExcel->getActiveSheet()->SetCellValue('B11', 'test','UTF-8');
  $objPHPExcel->getActiveSheet()->SetCellValue('H11', 'State Code');
 $objPHPExcel->getActiveSheet()->SetCellValue('I11', '32','UTF-8');
 
 
 $objPHPExcel->getActiveSheet()->mergeCells('A12:G12');
 $objPHPExcel->getActiveSheet()->getStyle("A12:G12")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('0000FF');
 $objPHPExcel->getActiveSheet()->getStyle("A12:G12")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
 $objPHPExcel->getActiveSheet()->setCellValue('A12', 'SERVICE PROVIDER DETAILS');
 $objPHPExcel->getActiveSheet()->getStyle("A12:N12")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 
 $objPHPExcel->getActiveSheet()->mergeCells('H12:N12');
 $objPHPExcel->getActiveSheet()->getStyle("H12:N12")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('0000FF');
 $objPHPExcel->getActiveSheet()->getStyle("H12:N12")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
 $objPHPExcel->getActiveSheet()->setCellValue('H12', 'SERVICE RECIPENT DETAILS');
 $objPHPExcel->getActiveSheet()->getStyle("H12:N12")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 
 $objPHPExcel->getActiveSheet()->SetCellValue('A13', 'Name');
 $objPHPExcel->getActiveSheet()->SetCellValue('B13', 'test','UTF-8');
  $objPHPExcel->getActiveSheet()->SetCellValue('H13', 'Name');
 $objPHPExcel->getActiveSheet()->SetCellValue('I13', 'test','UTF-8');
 
 $objPHPExcel->getActiveSheet()->SetCellValue('A14', 'Address');
 $objPHPExcel->getActiveSheet()->SetCellValue('B14', 'test','UTF-8');
  $objPHPExcel->getActiveSheet()->SetCellValue('H14', 'Address');
 $objPHPExcel->getActiveSheet()->SetCellValue('I14', 'test','UTF-8');
 
 $objPHPExcel->getActiveSheet()->SetCellValue('A15', 'Pan No');
 $objPHPExcel->getActiveSheet()->SetCellValue('B15', 'test','UTF-8');
  $objPHPExcel->getActiveSheet()->SetCellValue('H15', 'Pan No');
 $objPHPExcel->getActiveSheet()->SetCellValue('I15', 'test','UTF-8');
 
 $objPHPExcel->getActiveSheet()->SetCellValue('A16', 'GSTIN/UIN');
 $objPHPExcel->getActiveSheet()->SetCellValue('B16', 'test','UTF-8');
 $objPHPExcel->getActiveSheet()->SetCellValue('H16', 'GSTIN/UIN');
 $objPHPExcel->getActiveSheet()->SetCellValue('I16', 'test','UTF-8');
 
 $objPHPExcel->getActiveSheet()->SetCellValue('A17', 'State');
 $objPHPExcel->getActiveSheet()->SetCellValue('B17', 'test','UTF-8');
 $objPHPExcel->getActiveSheet()->SetCellValue('F17', 'State Code');
 $objPHPExcel->getActiveSheet()->SetCellValue('G17', 'test','UTF-8');
 
 $objPHPExcel->getActiveSheet()->SetCellValue('H17', 'State');
 $objPHPExcel->getActiveSheet()->SetCellValue('I17', 'test','UTF-8');
 $objPHPExcel->getActiveSheet()->SetCellValue('M17', 'State Code');
 $objPHPExcel->getActiveSheet()->SetCellValue('N17', 'test','UTF-8');
 
 $objPHPExcel->getActiveSheet()->SetCellValue('A18', 'Period of Service');
 $objPHPExcel->getActiveSheet()->SetCellValue('B18', 'test','UTF-8');
 
 
 $objPHPExcel->getActiveSheet()->getStyle("A19:N19")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('0000FF');
 
 $objPHPExcel->getActiveSheet()->getStyle("A19:N19")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('0000FF');
 $objPHPExcel->getActiveSheet()->getStyle("A19:N19")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
 $objPHPExcel->getActiveSheet()->SetCellValue('A19', 'SNo');
$objPHPExcel->getActiveSheet()->SetCellValue('B19', 'Description of Product / Service');
$objPHPExcel->getActiveSheet()->SetCellValue('C19', 'SAC CODE');
$objPHPExcel->getActiveSheet()->SetCellValue('D19', 'UOM');
$objPHPExcel->getActiveSheet()->SetCellValue('E19', 'Qty');
$objPHPExcel->getActiveSheet()->SetCellValue('F19', 'Rate');
$objPHPExcel->getActiveSheet()->SetCellValue('G19', 'Amount (Rs.)');

$y="select * from add_klqot where quet_num='$qtno'";
$result=$db->query($y) or die(mysql_error());
$row1=$result->fetch_assoc();
$id1=$row1['id'];
$totamt=$row1['tot_base'];
$totgst=$row1['tot_gst'];
$cgst=$totgst/2;
$totinv=$totamt+$totgst;

$y1="select * from add_klqot1 where id1='$id1'";
$result1	=	$db->query($y1) or die(mysql_error());
$i=1;
$rowCount	=	20;
while($row	=	$result1->fetch_assoc()){
    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, mb_strtoupper($i,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, mb_strtoupper($row['desc1'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, mb_strtoupper($row['hsn'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, mb_strtoupper($row['uom'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, mb_strtoupper($row['qty'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, mb_strtoupper($row['rate'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, mb_strtoupper($row['base_amt'],'UTF-8'));
 $rowCount++;
$i++;
    
}
 $ty=$rowCount+1;
 
 $objPHPExcel->getActiveSheet()->mergeCells("A".$ty.":E".$ty);
 $objPHPExcel->getActiveSheet()->getStyle("A".$ty.":E".$ty)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('0000FF');
 $objPHPExcel->getActiveSheet()->getStyle("A".$ty.":E".$ty)->getFont()->setBold(true)->getColor()->setRGB('ffffff');
 $objPHPExcel->getActiveSheet()->setCellValue('A'.$ty, 'Total Taxable Value');
 $objPHPExcel->getActiveSheet()->getStyle("A".$ty.":E".$ty)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
 $objPHPExcel->getActiveSheet()->setCellValue('F'.$ty, '0.00');
 $objPHPExcel->getActiveSheet()->setCellValue('G'.$ty, $totamt);
 
  $ty1=$ty+1;
 
  $objPHPExcel->getActiveSheet()->mergeCells("A".$ty1.":E".$ty1);
 $objPHPExcel->getActiveSheet()->getStyle("A".$ty1.":E".$ty1)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('0000FF');
 $objPHPExcel->getActiveSheet()->getStyle("A".$ty1.":E".$ty1)->getFont()->setBold(true)->getColor()->setRGB('ffffff');
 $objPHPExcel->getActiveSheet()->setCellValue('A'.$ty1, 'IGST Amt(In Rs)');
 $objPHPExcel->getActiveSheet()->getStyle("A".$ty1.":E".$ty1)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
 $objPHPExcel->getActiveSheet()->setCellValue('F'.$ty1, '0.00');
 $objPHPExcel->getActiveSheet()->setCellValue('G'.$ty1, '0.00');
 
 $ty2=$ty1+1;
 
  $objPHPExcel->getActiveSheet()->mergeCells("A".$ty2.":E".$ty2);
 $objPHPExcel->getActiveSheet()->getStyle("A".$ty2.":E".$ty2)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('0000FF');
 $objPHPExcel->getActiveSheet()->getStyle("A".$ty2.":E".$ty2)->getFont()->setBold(true)->getColor()->setRGB('ffffff');
 $objPHPExcel->getActiveSheet()->setCellValue('A'.$ty2, 'CGST Amt(In Rs)');
 $objPHPExcel->getActiveSheet()->getStyle("A".$ty2.":E".$ty2)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
 $objPHPExcel->getActiveSheet()->setCellValue('F'.$ty2, '0.00');
 $objPHPExcel->getActiveSheet()->setCellValue('G'.$ty2, $cgst);
 $ty3=$ty2+1;
 
  $objPHPExcel->getActiveSheet()->mergeCells("A".$ty3.":E".$ty3);
 $objPHPExcel->getActiveSheet()->getStyle("A".$ty3.":E".$ty3)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('0000FF');
 $objPHPExcel->getActiveSheet()->getStyle("A".$ty3.":E".$ty3)->getFont()->setBold(true)->getColor()->setRGB('ffffff');
 $objPHPExcel->getActiveSheet()->setCellValue('A'.$ty3, 'SGST/UGST Amt(In Rs)');
 $objPHPExcel->getActiveSheet()->getStyle("A".$ty3.":E".$ty3)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
 $objPHPExcel->getActiveSheet()->setCellValue('F'.$ty3, '0.00');
 $objPHPExcel->getActiveSheet()->setCellValue('G'.$ty3, $cgst);
 $ty4=$ty3+1;
 
  $objPHPExcel->getActiveSheet()->mergeCells("A".$ty4.":E".$ty4);
 $objPHPExcel->getActiveSheet()->getStyle("A".$ty4.":E".$ty4)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('0000FF');
 $objPHPExcel->getActiveSheet()->getStyle("A".$ty4.":E".$ty4)->getFont()->setBold(true)->getColor()->setRGB('ffffff');
 $objPHPExcel->getActiveSheet()->setCellValue('A'.$ty4, ' Total GST Amt(In Rs)');
 $objPHPExcel->getActiveSheet()->getStyle("A".$ty4.":E".$ty4)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
 $objPHPExcel->getActiveSheet()->setCellValue('F'.$ty4, '0.00');
 $objPHPExcel->getActiveSheet()->setCellValue('G'.$ty4, $totgst);
 
 $ty5=$ty4+1;
 
  $objPHPExcel->getActiveSheet()->mergeCells("A".$ty5.":E".$ty5);
 $objPHPExcel->getActiveSheet()->getStyle("A".$ty5.":E".$ty5)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('0000FF');
 $objPHPExcel->getActiveSheet()->getStyle("A".$ty5.":E".$ty5)->getFont()->setBold(true)->getColor()->setRGB('ffffff');
 $objPHPExcel->getActiveSheet()->setCellValue('A'.$ty5, ' Total Invoice Value(In Rs)');
 $objPHPExcel->getActiveSheet()->getStyle("A".$ty5.":E".$ty5)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
 $objPHPExcel->getActiveSheet()->setCellValue('F'.$ty5, '0.00');
 $objPHPExcel->getActiveSheet()->setCellValue('G'.$ty5, round($totinv));

 $ty6=$ty5+1;
 $objPHPExcel->getActiveSheet()->mergeCells("A".$ty6.":N".$ty6);
 $objPHPExcel->getActiveSheet()->getStyle("A".$ty6.":N".$ty6)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('0000FF');
 $objPHPExcel->getActiveSheet()->getStyle("A".$ty6.":N".$ty6)->getFont()->setBold(true)->getColor()->setRGB('ffffff');
 $objPHPExcel->getActiveSheet()->setCellValue('A'.$ty6, numberTowords2(round($totinv)));
 $objPHPExcel->getActiveSheet()->getStyle("A".$ty6.":N".$ty6)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
 
 $ty7=$ty6+1;
   
   
header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="klinvoice'.$qtno.'.xlsx"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache
//$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007'); 

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter      = new PHPExcel_Writer_Excel2007($objPHPExcel);
//$objWriter->save('test.xlsx');
$objWriter->save('php://output');

 

?>