<?php
// Include TCPDF library
require_once('tcpdf/tcpdf.php');

// Create TCPDF object
$pdf = new TCPDF();

// Set document information
$pdf->SetCreator('Your Name');
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Demo PDF for Digital Signature');
$pdf->SetSubject('Digital Signature Test');
$pdf->SetKeywords('TCPDF, PDF, Digital Signature');

// Add content to your PDF
$pdf->AddPage();
$pdf->SetFont('helvetica', '', 12);
$pdf->Write(5, 'This is a demo PDF for digital signature.');

// Set digital signature
$certificatePath = 'C:/xampp/apache/conf/ssl.crt/certificate.crt'; // Replace with your certificate path
$privateKeyPath = 'C:/xampp/apache/conf/ssl.key/private.key'; // Replace with your private key path

$pdf->setSignature($certificatePath, $privateKeyPath, 'signature_field_name', '', 2, []);

// Output the PDF
$pdf->Output('demo_signed_document.pdf', 'D');
?>