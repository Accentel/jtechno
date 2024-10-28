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
return 'Total Invoice Amount in Words - '.strtoupper($rettxt).' RUPEES ONLY '; 

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
$yk="select * from qot_bill where quet_num='$qtno'";
$resultk=$db->query($yk) or die(mysql_error());
$row1k=$resultk->fetch_assoc();
$invnum=$row1k['inv_num'];
$speriod=$row1k['speriod'];

$yk1="select * from add_qot where quet_num='$qtno'";
$resultk1=$db->query($yk1) or die(mysql_error());
$row1k1=$resultk1->fetch_assoc();
$pono=$row1k1['ro_no'];
$storecode=$row1k1['store_code'];

$yk12="select * from dpr where store_code='$storecode'";
$resultk12=$db->query($yk12) or die(mysql_error());
$row1k12=$resultk12->fetch_assoc();
$ship_name=$row1k12['ship_name'];
$ship_state=$row1k12['ship_state'];
$ship_gst=$row1k12['ship_gst'];
$ship_ddress=$row1k12['ship_ddress'];
$state_code=$row1k12['state_code'];
$address=$row1k12['address'];
$gst_in=$row1k12['gst_in'];
$company_name=$row1k12['company_name'];


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
 $objPHPExcel->getActiveSheet()->mergeCells('A6:K6');
 $objPHPExcel->getActiveSheet()->getStyle("A6:K6")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('0000FF');
 $objPHPExcel->getActiveSheet()->getStyle("A6:K6")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
 $objPHPExcel->getActiveSheet()->setCellValue('A6', 'ORIGINAL FOR RECEIPT');
 $objPHPExcel->getActiveSheet()->getStyle("A6:K6")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->mergeCells('A8:K8');
 $objPHPExcel->getActiveSheet()->getStyle("A8:K8")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('C0C0C0');
 $objPHPExcel->getActiveSheet()->getStyle("A8:K8")->getFont()->setBold(true)->getColor()->setRGB('000000');
 $objPHPExcel->getActiveSheet()->setCellValue('A8', 'TAX INVOICE');
 $objPHPExcel->getActiveSheet()->getStyle("A8:K8")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 
 
 
 $objPHPExcel->getActiveSheet()->SetCellValue('A9', 'Incoice No');
 $objPHPExcel->getActiveSheet()->mergeCells('B9:E9');
 $objPHPExcel->getActiveSheet()->SetCellValue('B9', $invnum,'UTF-8');
  $objPHPExcel->getActiveSheet()->SetCellValue('F9', 'State');
 $objPHPExcel->getActiveSheet()->SetCellValue('G9', 'AP','UTF-8');
 
 $objPHPExcel->getActiveSheet()->SetCellValue('A10', 'Po No');
 $objPHPExcel->getActiveSheet()->mergeCells('B10:E10');
 $objPHPExcel->getActiveSheet()->getStyle("B10:E10")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
 $objPHPExcel->getActiveSheet()->SetCellValue('B10', $pono,'UTF-8');
  
 
 $objPHPExcel->getActiveSheet()->SetCellValue('A11', 'Date');
 $objPHPExcel->getActiveSheet()->SetCellValue('B11', date('d-m-Y'),'UTF-8');
  $objPHPExcel->getActiveSheet()->SetCellValue('F11', 'State Code');
 $objPHPExcel->getActiveSheet()->SetCellValue('G11', '37','UTF-8');
 
 
 $objPHPExcel->getActiveSheet()->mergeCells('A12:E12');
 $objPHPExcel->getActiveSheet()->getStyle("A12:E12")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('0000FF');
 $objPHPExcel->getActiveSheet()->getStyle("A12:E12")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
 $objPHPExcel->getActiveSheet()->setCellValue('A12', 'SERVICE PROVIDER DETAILS');
 $objPHPExcel->getActiveSheet()->getStyle("A12:E12")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 
 $objPHPExcel->getActiveSheet()->mergeCells('F12:K12');
 $objPHPExcel->getActiveSheet()->getStyle("F12:K12")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('0000FF');
 $objPHPExcel->getActiveSheet()->getStyle("F12:K12")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
 $objPHPExcel->getActiveSheet()->setCellValue('F12', 'SERVICE RECIPENT DETAILS');
 $objPHPExcel->getActiveSheet()->getStyle("F12:K12")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 
 $objPHPExcel->getActiveSheet()->SetCellValue('A13', 'Name');
 $objPHPExcel->getActiveSheet()->mergeCells('B13:E13');
 $objPHPExcel->getActiveSheet()->SetCellValue('B13', ': M/s JYTOHI INFRA SERVICE','UTF-8');
 $objPHPExcel->getActiveSheet()->mergeCells('G13:K13');
  $objPHPExcel->getActiveSheet()->SetCellValue('F13', 'Name');
 $objPHPExcel->getActiveSheet()->SetCellValue('G13', $ship_name,'UTF-8');
 
 $objPHPExcel->getActiveSheet()->SetCellValue('A14', 'Address');
 $objPHPExcel->getActiveSheet()->mergeCells('B14:E14');
 $objPHPExcel->getActiveSheet()->SetCellValue('B14', ': D.NO.54-20/2-7A, BHARTHI NAGAR, 8TH LINE,','UTF-8');
  $objPHPExcel->getActiveSheet()->SetCellValue('F14', 'Address');
  $objPHPExcel->getActiveSheet()->mergeCells('G14:K14');
 $objPHPExcel->getActiveSheet()->SetCellValue('G14', ':C 51 Yard,Plot No. 9, IDA Park, APIIC,','UTF-8');
 
 
 $objPHPExcel->getActiveSheet()->SetCellValue('A15', '');
 $objPHPExcel->getActiveSheet()->mergeCells('B15:E15');
 $objPHPExcel->getActiveSheet()->SetCellValue('B15', ' VIJAYAWADA, KRISHNA DISTRICT,','UTF-8');
  $objPHPExcel->getActiveSheet()->SetCellValue('F15', '');
  $objPHPExcel->getActiveSheet()->mergeCells('G15:K15');
 $objPHPExcel->getActiveSheet()->SetCellValue('G15', 'Road No. 8, Vakalpudi,Thammavaram Village,','UTF-8');
 
 $objPHPExcel->getActiveSheet()->SetCellValue('A16', '');
 $objPHPExcel->getActiveSheet()->mergeCells('B16:E16');
 $objPHPExcel->getActiveSheet()->SetCellValue('B16', 'ANDHRA PRADESH - 520 008','UTF-8');
  $objPHPExcel->getActiveSheet()->SetCellValue('F16', '');
  $objPHPExcel->getActiveSheet()->mergeCells('G16:K16');
 $objPHPExcel->getActiveSheet()->SetCellValue('G16', 'Kakinada,Andhra Pradesh-533005.','UTF-8');
 
 
 
   $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(12);
 $objPHPExcel->getActiveSheet()->SetCellValue('A17', 'Pan No');
 $objPHPExcel->getActiveSheet()->SetCellValue('B17', ': APSPS9687Q','UTF-8');
   $objPHPExcel->getActiveSheet()->SetCellValue('F17', 'GSTIN/UIN');
 $objPHPExcel->getActiveSheet()->SetCellValue('G17', $ship_gst,'UTF-8');
   $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(12);
 $objPHPExcel->getActiveSheet()->SetCellValue('A18', 'GSTIN/UIN');
 $objPHPExcel->getActiveSheet()->SetCellValue('B18',':37APSPS9687Q1Z3','UTF-8');
$objPHPExcel->getActiveSheet()->SetCellValue('F18', 'State ');
 $objPHPExcel->getActiveSheet()->SetCellValue('G18', 'Andhra Pradesh','UTF-8');
 
 $objPHPExcel->getActiveSheet()->SetCellValue('A19', 'State');
 $objPHPExcel->getActiveSheet()->SetCellValue('B19', 'Andhra Pradesh','UTF-8');
 $objPHPExcel->getActiveSheet()->SetCellValue('D19', 'State Code');
 $objPHPExcel->getActiveSheet()->SetCellValue('E19', '37','UTF-8');
 
 $objPHPExcel->getActiveSheet()->SetCellValue('F19', 'State Code');
 $objPHPExcel->getActiveSheet()->SetCellValue('G19', '37','UTF-8');
 $objPHPExcel->getActiveSheet()->SetCellValue('J19', 'State Code');
 $objPHPExcel->getActiveSheet()->SetCellValue('K19', '37','UTF-8');
 
 $objPHPExcel->getActiveSheet()->SetCellValue('A20', 'Period of Service');
 $objPHPExcel->getActiveSheet()->SetCellValue('B20', $speriod,'UTF-8');
 
 
 $objPHPExcel->getActiveSheet()->getStyle("A21:K21")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('0000FF');
 
 $objPHPExcel->getActiveSheet()->getStyle("A21:K21")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('0000FF');
 $objPHPExcel->getActiveSheet()->getStyle("A21:K21")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
 $objPHPExcel->getActiveSheet()->SetCellValue('A21', 'SNo');
 $objPHPExcel->getActiveSheet()->mergeCells('B21:F21');
$objPHPExcel->getActiveSheet()->SetCellValue('B21', 'Description of Product / Service');
$objPHPExcel->getActiveSheet()->SetCellValue('G21', 'SAC CODE');
$objPHPExcel->getActiveSheet()->SetCellValue('H21', 'UOM');
$objPHPExcel->getActiveSheet()->SetCellValue('I21', 'Qty');
$objPHPExcel->getActiveSheet()->SetCellValue('J21', 'Rate');
$objPHPExcel->getActiveSheet()->SetCellValue('K21', 'Amount (Rs.)');

$y="select * from add_qot where quet_num='$qtno'";
$result=$db->query($y) or die(mysql_error());
$row1=$result->fetch_assoc();
$id1=$row1['id'];
$totamt=$row1['tot_base'];
$totgst=$row1['tot_gst'];
$cgst=$totgst/2;
$totinv=$totamt+$totgst;

$y1="select * from add_qot1 where id1='$id1'";
$result1	=	$db->query($y1) or die(mysql_error());
$i=1;
$rowCount	=	22;
while($row	=	$result1->fetch_assoc()){
    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, mb_strtoupper($i,'UTF-8'));
    $objPHPExcel->getActiveSheet()->mergeCells("B".$rowCount.":F".$rowCount);
	$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, mb_strtoupper($row['desc1'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, mb_strtoupper($row['hsn'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, mb_strtoupper($row['uom'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, mb_strtoupper($row['qty'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, mb_strtoupper($row['rate'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, mb_strtoupper($row['base_amt'],'UTF-8'));
 $rowCount++;
$i++;
    
}
 $ty=$rowCount+1;
 
 $objPHPExcel->getActiveSheet()->mergeCells("A".$ty.":I".$ty);
 $objPHPExcel->getActiveSheet()->getStyle("A".$ty.":I".$ty)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('0000FF');
 $objPHPExcel->getActiveSheet()->getStyle("A".$ty.":I".$ty)->getFont()->setBold(true)->getColor()->setRGB('ffffff');
 $objPHPExcel->getActiveSheet()->setCellValue('A'.$ty, 'Total Taxable Value');
 $objPHPExcel->getActiveSheet()->getStyle("A".$ty.":I".$ty)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
 $objPHPExcel->getActiveSheet()->setCellValue('J'.$ty, '0.00');
 $objPHPExcel->getActiveSheet()->setCellValue('K'.$ty, $totamt);
 
  $ty1=$ty+1;
 
  $objPHPExcel->getActiveSheet()->mergeCells("A".$ty1.":I".$ty1);
 $objPHPExcel->getActiveSheet()->getStyle("A".$ty1.":I".$ty1)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('0000FF');
 $objPHPExcel->getActiveSheet()->getStyle("A".$ty1.":I".$ty1)->getFont()->setBold(true)->getColor()->setRGB('ffffff');
 $objPHPExcel->getActiveSheet()->setCellValue('A'.$ty1, 'IGST Amt(In Rs)');
 $objPHPExcel->getActiveSheet()->getStyle("A".$ty1.":E".$ty1)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
 $objPHPExcel->getActiveSheet()->setCellValue('J'.$ty1, '0.00');
 $objPHPExcel->getActiveSheet()->setCellValue('K'.$ty1, '0.00');
 
 $ty2=$ty1+1;
 
  $objPHPExcel->getActiveSheet()->mergeCells("A".$ty2.":I".$ty2);
 $objPHPExcel->getActiveSheet()->getStyle("A".$ty2.":I".$ty2)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('0000FF');
 $objPHPExcel->getActiveSheet()->getStyle("A".$ty2.":I".$ty2)->getFont()->setBold(true)->getColor()->setRGB('ffffff');
 $objPHPExcel->getActiveSheet()->setCellValue('A'.$ty2, 'CGST Amt(In Rs)');
 $objPHPExcel->getActiveSheet()->getStyle("A".$ty2.":I".$ty2)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
 $objPHPExcel->getActiveSheet()->setCellValue('J'.$ty2, '0.00');
 $objPHPExcel->getActiveSheet()->setCellValue('K'.$ty2, $cgst);
 $ty3=$ty2+1;
 
  $objPHPExcel->getActiveSheet()->mergeCells("A".$ty3.":I".$ty3);
 $objPHPExcel->getActiveSheet()->getStyle("A".$ty3.":I".$ty3)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('0000FF');
 $objPHPExcel->getActiveSheet()->getStyle("A".$ty3.":I".$ty3)->getFont()->setBold(true)->getColor()->setRGB('ffffff');
 $objPHPExcel->getActiveSheet()->setCellValue('A'.$ty3, 'SGST/UGST Amt(In Rs)');
 $objPHPExcel->getActiveSheet()->getStyle("A".$ty3.":I".$ty3)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
 $objPHPExcel->getActiveSheet()->setCellValue('J'.$ty3, '0.00');
 $objPHPExcel->getActiveSheet()->setCellValue('K'.$ty3, $cgst);
 $ty4=$ty3+1;
 
  $objPHPExcel->getActiveSheet()->mergeCells("A".$ty4.":I".$ty4);
 $objPHPExcel->getActiveSheet()->getStyle("A".$ty4.":I".$ty4)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('0000FF');
 $objPHPExcel->getActiveSheet()->getStyle("A".$ty4.":I".$ty4)->getFont()->setBold(true)->getColor()->setRGB('ffffff');
 $objPHPExcel->getActiveSheet()->setCellValue('A'.$ty4, ' Total GST Amt(In Rs)');
 $objPHPExcel->getActiveSheet()->getStyle("A".$ty4.":I".$ty4)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
 $objPHPExcel->getActiveSheet()->setCellValue('J'.$ty4, '0.00');
 $objPHPExcel->getActiveSheet()->setCellValue('K'.$ty4, $totgst);
 
 $ty5=$ty4+1;
 
  $objPHPExcel->getActiveSheet()->mergeCells("A".$ty5.":I".$ty5);
 $objPHPExcel->getActiveSheet()->getStyle("A".$ty5.":I".$ty5)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('0000FF');
 $objPHPExcel->getActiveSheet()->getStyle("A".$ty5.":I".$ty5)->getFont()->setBold(true)->getColor()->setRGB('ffffff');
 $objPHPExcel->getActiveSheet()->setCellValue('A'.$ty5, ' Total Invoice Value(In Rs)');
 $objPHPExcel->getActiveSheet()->getStyle("A".$ty5.":I".$ty5)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
 $objPHPExcel->getActiveSheet()->setCellValue('J'.$ty5, '0.00');
 $objPHPExcel->getActiveSheet()->setCellValue('K'.$ty5, round($totinv));

 $ty6=$ty5+1;
 $objPHPExcel->getActiveSheet()->mergeCells("A".$ty6.":K".$ty6);
 $objPHPExcel->getActiveSheet()->getStyle("A".$ty6.":K".$ty6)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('0000FF');
 $objPHPExcel->getActiveSheet()->getStyle("A".$ty6.":K".$ty6)->getFont()->setBold(true)->getColor()->setRGB('ffffff');
 $objPHPExcel->getActiveSheet()->setCellValue('A'.$ty6, numberTowords2(round($totinv)));

 $objPHPExcel->getActiveSheet()->getStyle("A".$ty6.":K".$ty6)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
$ty7=$ty6+1;
  $styleArray = array(
  'borders' => array(
    'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN
    )
  )
);
$styleArray1 = array(
  'borders' => array(
    'bordertop' => array(
      'style' => PHPExcel_Style_Border::BORDER_THICK
    )
  )
);

$border_style= array('borders' => array(
    'right' => array('style' => PHPExcel_Style_Border::BORDER_THICK),
     'left' => array('style' => PHPExcel_Style_Border::BORDER_THICK),
     'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
     'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
    )
    );

$objPHPExcel->getActiveSheet()->mergeCells("A".$ty7.":C".$ty7);
 $objPHPExcel->getActiveSheet()->getStyle("A".$ty7.":C".$ty7)->applyFromArray($styleArray);
 $objPHPExcel->getActiveSheet()->setCellValue('A'.$ty7, 'BANK DETAILS','UTF-8');
 $objPHPExcel->getActiveSheet()->getStyle("A".$ty7.":C".$ty7)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->getActiveSheet()->mergeCells("D".$ty7.":G".$ty7);
$objPHPExcel->getActiveSheet()->getStyle("D".$ty7.":G".$ty7)->applyFromArray($styleArray);
  $objPHPExcel->getActiveSheet()->mergeCells("H".$ty7.":K".$ty7);
  $objPHPExcel->getActiveSheet()->getStyle("H".$ty7.":K".$ty7)->applyFromArray($styleArray);
 $objPHPExcel->getActiveSheet()->setCellValue('H'.$ty7, 'Certified that the particulars given above are true and correct.','UTF-8');
 $ty8=$ty7+1;
  $objPHPExcel->getActiveSheet()->getStyle("A".$ty8.":C".$ty8)->applyFromArray($styleArray);
 $objPHPExcel->getActiveSheet()->mergeCells("A".$ty8.":C".$ty8);
 $objPHPExcel->getActiveSheet()->setCellValue('A'.$ty8, 'Acc No.37491250000023','UTF-8');
 $objPHPExcel->getActiveSheet()->mergeCells("D".$ty8.":G".$ty8);
$objPHPExcel->getActiveSheet()->getStyle("D".$ty8.":G".$ty8)->applyFromArray($styleArray);
  $objPHPExcel->getActiveSheet()->mergeCells("H".$ty8.":K".$ty8);
  $objPHPExcel->getActiveSheet()->getStyle("H".$ty8.":K".$ty8)->applyFromArray($styleArray);
 $ty9=$ty8+1;
 $objPHPExcel->getActiveSheet()->mergeCells("A".$ty9.":C".$ty9);
  $objPHPExcel->getActiveSheet()->getStyle("A".$ty9.":C".$ty9)->applyFromArray($styleArray);
 $objPHPExcel->getActiveSheet()->setCellValue('A'.$ty9, 'Bank Name: Syndicate Bank','UTF-8');
 $objPHPExcel->getActiveSheet()->mergeCells("D".$ty9.":G".$ty9);
$objPHPExcel->getActiveSheet()->getStyle("D".$ty9.":G".$ty9)->applyFromArray($styleArray);
  $objPHPExcel->getActiveSheet()->mergeCells("H".$ty9.":K".$ty9);
  $objPHPExcel->getActiveSheet()->getStyle("H".$ty9.":K".$ty9)->applyFromArray($styleArray);
 
 $ty10=$ty9+1;
 $objPHPExcel->getActiveSheet()->getStyle("A".$ty10.":C".$ty10)->applyFromArray($styleArray);
 $objPHPExcel->getActiveSheet()->mergeCells("A".$ty10.":C".$ty10);
 $objPHPExcel->getActiveSheet()->setCellValue('A'.$ty10, 'Branch Name: Bharathi Nagar','UTF-8');
 $objPHPExcel->getActiveSheet()->mergeCells("D".$ty10.":G".$ty10);
$objPHPExcel->getActiveSheet()->getStyle("D".$ty10.":G".$ty10)->applyFromArray($styleArray);
  $objPHPExcel->getActiveSheet()->mergeCells("H".$ty10.":K".$ty10);
  $objPHPExcel->getActiveSheet()->getStyle("H".$ty10.":K".$ty10)->applyFromArray($styleArray);
 $ty11=$ty10+1;
 $objPHPExcel->getActiveSheet()->getStyle("A".$ty11.":C".$ty11)->applyFromArray($styleArray);
 $objPHPExcel->getActiveSheet()->mergeCells("A".$ty11.":C".$ty11);
 $objPHPExcel->getActiveSheet()->setCellValue('A'.$ty11, 'IFSC: SYNB0003749','UTF-8');
 $objPHPExcel->getActiveSheet()->mergeCells("D".$ty11.":G".$ty11);
$objPHPExcel->getActiveSheet()->getStyle("D".$ty11.":G".$ty11)->applyFromArray($styleArray);
  $objPHPExcel->getActiveSheet()->mergeCells("H".$ty11.":K".$ty11);
  $objPHPExcel->getActiveSheet()->getStyle("H".$ty11.":K".$ty11)->applyFromArray($styleArray);
 
header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="apinvoice'.$qtno.'.xlsx"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache
//$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007'); 

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter      = new PHPExcel_Writer_Excel2007($objPHPExcel);
//$objWriter->save('test.xlsx');
$objWriter->save('php://output');

 

?>