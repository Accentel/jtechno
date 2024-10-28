<?php
// Enable error reporting and display errors for debugging purposes
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('tcpdf/tcpdf.php');

// Set certificate file path
$certificatePath = 'final/certificate.crt';
$privateKeyPath = 'final/private_key.pem';
$certificatePassword = 'password'; // If the private key is password-protected

// Set additional information for the signature
$info = [
    'Name' => 'Your Name',
    'Location' => 'Location',
    'Reason' => 'Reason for signing',
    'ContactInfo' => 'Your contact information',
];

try {
    // Create a new PDF document with TCPDF
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // Set the document signature
    $success = $pdf->setSignature   

    // Check if the signature was set successfully
    if ($success) {
        // Add content to the PDF
        // ...

        // Output the PDF document
        $pdf->Output('set_sig_done.pdf', 'I'); // 'I' to send to the browser for inline display
    } else {
        // Display error message
        echo 'Failed to set the signature.';
    }
} catch (Exception $e) {
    // Handle exceptions
    echo 'Error: ' . $e->getMessage();
}
?>
