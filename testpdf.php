<?php
// Require the mPDF library
require_once __DIR__ . '/vendor/autoload.php'; // Adjust the path as needed

// Create new mPDF instance
$mpdf = new \Mpdf\Mpdf();

// Your HTML content to be converted to PDF
$html = '<h1>Hello, World!</h1>
         <p>This is a sample PDF generated using mPDF in PHP version 8.</p>';

// Add HTML content to mPDF
$mpdf->WriteHTML($html);

// Output PDF to browser
$mpdf->Output('sample.pdf', 'D');
?>