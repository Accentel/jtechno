<?php


ob_start(); 

require_once('tcpdf/tcpdf.php');

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

    // Set certificate file
    $certificate = 'file://' . __DIR__ . '/cssl/test.crt';
        // $certificate = 'file://C:/xampp/htdocs/jtechno/cssl/certificate.crt';


    // Set additional signature information
    $info = array(
        'Name' => 'Signer Name',
        'Location' => 'Location',
        'Reason' => 'Reason for signing',
        'ContactInfo' => 'Contact Information',
    );

    // Add the digital signature to the PDF
    $pdf->setSignature($certificate, $certificate, '', '', 2, $info);

    // Output the PDF as a file or stream
    $pdf->Output(__DIR__ . '/new.pdf', 'D');

    echo 'PDF with signature generated successfully!';
} catch (Exception $e) {
    echo 'Caught exception: ', $e->getMessage(), "\n";
}


ob_end_clean();

?>