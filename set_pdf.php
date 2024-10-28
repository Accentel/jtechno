<?php

require_once('eng.php');
require_once('tcpdf/tcpdf.php');

// Create a new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information and other settings
// ...

// Set certificate file paths
$privateKeyPath = 'set/private.key'; // Update with your private key path
$certificatePath = 'set/certificate.crt'; // Update with your certificate path
$certificatePassword = 'password'; // Replace 'your_password' with your actual password

// Additional information for the signature
$info = [
    'Name' => 'Your Name',
    'Location' => 'Your Location',
    'Reason' => 'Testing PDF',
    'ContactInfo' => 'http://www.example.com',
];

// Set document signature
$success = $pdf->setSignature($certificatePath, $privateKeyPath, $certificatePassword, '', 2, $info);

// Check if the signature was set successfully
if ($success) {
    // Add a page to the PDF
    $pdf->AddPage();

    // Print a line of text
    $text = 'This is a digitally signed document using a custom certificate.';
    $pdf->writeHTML($text, true, 0, true, 0);

    // Set appearance for the signature
    // Set the content for the appearance
    $appearance = 'Digitally signed by Your Name ' . date('Y-m-d H:i:s');

    // Define the position and display the appearance text
    $pdf->Text(180, 60, $appearance);

    // Output the PDF document
    $pdf->Output('signed_pdf321.pdf', 'I'); // 'I' to send to the browser for inline display
} else {
    echo 'Failed to set the signature.';
}
?>
