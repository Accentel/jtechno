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
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

include('dbconnection/connection.php');
$result = array();
$finalresults=array();
// ... (other parts of the code)

$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("qot_brk.xlsx");
$id = $_GET['id'];
$sq = mysqli_query($link, "select * from add_knqot where quet_num='$id'");
$r = mysqli_fetch_array($sq);
$store_code = $r['store_code'];
$quet_num = $r['quet_num'];
$falt_date = date('d-m-Y', strtotime($r['falt_date']));
$falt_no = $r['falt_no'];
$falt_desc = $r['falt_desc'];
$rono = $r['ro_no'];
$rodate = $r['ro_date'];
$bid = $r['id'];
$a = "select * from dpr where store_code='$store_code'";
$ssq1 = mysqli_query($link, $a);
$r1 = mysqli_fetch_array($ssq1);
$state_code = $r1['state_code'];
$company_name1 = $r1['company_name'];
$addr1 = $r1['ship_ddress'];
$state1 = $r1['state'];
$statefull = $r1['state'];
$gst_in1 = $r1['gst_in'];
$ship_name = $r1['ship_name'];
$ship_state = $r1['ship_state'];
$ship_gst = $r1['ship_gst'];
$store_name = $r1['store_name'];
$store_type = $r1['format_type'];
$city = $r1['city'];
if ($statefull == 'TG') {
    $statefull = 'Telangana';
} else if ($statefull == 'AP') {
    $statefull = 'Andhra Pradesh';
}
$sqy = mysqli_query($link, "select * from organization where id='1'");
$r2y = mysqli_fetch_array($sqy);
$vendor_name1 = $r2y['vendor_name'];
$ap_address = $r2y['kn_address'];
$gstno = $r2y['kn_gst'];

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('B1', $vendor_name1);
$sheet->setCellValue('B2', $statefull);
$sheet->setCellValue('J1', $r1['company_name']);
// ... (other parts of the code)
include_once('dbconnection/connection.php');
// ... (other parts of the code)

$t = mysqli_query($link, $aa) or die(mysqli_error($link));
$i = 1;
$gst_amnt1 = 0;
$tx = 0;
while ($rows = mysqli_fetch_assoc($t)) {
    $result[] = $rows;
}
$finalrowvalue = 0;
$rowCount = 20;

$t = mysqli_query($link, $aa) or die(mysqli_error($link));
$rowCount = 5;
while ($rk = mysqli_fetch_array($t)) {
    $sheet->setCellValue('A' . $rowCount, $rk['sno']);
    $sheet->setCellValue('B' . $rowCount, $store_name);
    $sheet->setCellValue('C' . $rowCount, $store_code);
    $sheet->setCellValue('D' . $rowCount, $store_type);
    $sheet->setCellValue('E' . $rowCount, $city);
    $sheet->setCellValue('F' . $rowCount, $falt_desc);
    $sheet->setCellValue('G' . $rowCount, $rono);
    $sheet->setCellValue('H' . $rowCount, $rodate);

    $sheet->setCellValue('J' . $rowCount, $rk['hsn']);
    $sheet->setCellValue('L' . $rowCount, $rk['desc1']);
    $sheet->setCellValue('N' . $rowCount, $rk['uom']);
    $sheet->setCellValue('O' . $rowCount, $rk['qty']);
    $sheet->setCellValue('M' . $rowCount, $rk['rate']);
    $sheet->setCellValue('P' . $rowCount, $rk['base_amt']);
    $rowCount++;
}

$noofrecords = sizeof($result);
foreach ($result as $key => $values) {
    $finalrowvalue = $rowCount;
    $column = 'A';
    foreach ($values as $value) {
        $column++;
    }
    $rowCount++;
}

$objWorksheet = $spreadsheet->getActiveSheet();
$row_id = 20 + $noofrecords; // deleted row id
$number_rows = 51 - $noofrecords; // number of rows count 

$writer = new Xlsx($spreadsheet);
$filename = $quet_num . "_breakup.xlsx";
$writer->save($filename);

// Output headers so that the file is downloaded
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header("Content-Disposition: attachment;filename=" . $filename);
header('Cache-Control: max-age=0');
readfile($filename);
unlink($filename); // Delete the file after it has been downloaded
?>
