<?php
require_once('vendor/autoload.php'); // If using Composer

// To display errors
ini_set('display_errors', 1);
error_reporting(E_ALL);


try {
    // Create a new PDF document
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

    // Set document information
    $pdf->SetCreator('Creator Name');
    $pdf->SetAuthor('Author Name');
    $pdf->SetTitle('Document Title');
    $pdf->SetSubject('Document Subject');
    $pdf->SetKeywords('Keywords');

    // Add a page
    $pdf->AddPage();

    // Set font
    $pdf->SetFont('times', '', 12);

    // Add content to the PDF
    $pdf->Write(0, 'Hello, World!');

    // Set certificate file and password
    $certificate = 'file://' . __DIR__ . '/set/mykey.pem';
    $password = 'your_certificate_password'; // If your certificate requires a password

    // Set additional signature information
    $info = array(
        'Name' => 'Signer Name',
        'Location' => 'Location',
        'Reason' => 'Reason for signing',
        'ContactInfo' => 'Contact Information',
    );

    // Add the digital signature to the PDF
    $pdf->setSignature($certificate, $certificate, $password, '', 2, $info);

    // Output the PDF as a file or stream
    $pdf->Output(__DIR__ . '/signed_document.pdf', 'I');

    echo 'PDF with signature generated successfully!';
} catch (Exception $e) {
    echo 'Caught exception: ', $e->getMessage(), "\n";
}
?>
