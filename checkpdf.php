<?php 

    error_reporting(E_ALL);
ini_set('display_errors', 1);
  
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML('Hello World');
$mpdf->Output('demo.pdf','D');
?>