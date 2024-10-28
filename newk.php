<?php
// Include the TCPDF library
require_once('tcpdf/tcpdf.php');

// Create a new TCPDF object
$pdf = new TCPDF();

// Set document information
$pdf->SetCreator('Your Name');
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Document Title');
$pdf->SetSubject('Document Subject');

// Set certificate file and private key for digital signature
$pdf->setSignature('certificate.crt', 'private.key', 'password', '', 1, array());

// Add a page to the PDF
$pdf->AddPage();

// Add content to the PDF (example text)
$pdf->SetFont('helvetica', '', 12);
$pdf->Write(0, 'This is an example of a digitally signed PDF.');

// Save the PDF file
$pdf->Output('signed_document.pdf', 'F');
