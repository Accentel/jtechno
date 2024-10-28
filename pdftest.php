<?php
require_once('tcpdf/tcpdf.php');

class CustomPDF extends TCPDF {
    public function addDigitalSignature($privateKeyPath, $certificatePath) {
        // Read the private key and certificate files
        $privateKey = openssl_get_privatekey(file_get_contents($privateKeyPath));
        $certificate = file_get_contents($certificatePath);

        // Get the document content for signing
        $dataToSign = $this->getBuffer();

        // Create the signature
        $signature = '';
        openssl_sign($dataToSign, $signature, $privateKey, OPENSSL_ALGO_SHA256);

        // Set additional signature information
        $info = array(
            'Name' => 'Syed Ali',
            'Location' => 'Hyderabad',
            'Reason' => 'Demo',
            'ContactInfo' => '1234567891',
        );

        // Add the signature to the PDF
        $this->setSignature($signature, $certificate, 'password', '', 2, $info);

        // Free the key from memory
        openssl_free_key($privateKey);
    }
}

try {
    // Create new CustomPDF document
    $pdf = new CustomPDF('P', 'mm', 'A4', true, 'UTF-8', false);

    // Set document information
    $pdf->SetCreator('Omer');
    $pdf->SetAuthor('Ali');
    $pdf->SetTitle('Jtechno');
    $pdf->SetSubject('Quotation');
    $pdf->SetKeywords('Quotation');

    // Add a page
    $pdf->AddPage();

    // Set font
    $pdf->SetFont('times', '', 12);

    // Add content to the PDF
    $pdf->Write(0, 'Hello, World!');

    // Set the paths to your private key and certificate
    $privateKeyPath = 'file://' . __DIR__ . '/your_private_key.key';
    $certificatePath = 'file://' . __DIR__ . '/your_signed_certificate.crt';

    // Add the digital signature
    $pdf->addDigitalSignature($privateKeyPath, $certificatePath);

    // Output the PDF as a file
    $outputPath = __DIR__ . '/nghyv.pdf';
    $pdf->Output($outputPath, 'F');

    echo 'PDF with signature generated successfully!';
} catch (Exception $e) {
    echo 'Caught exception: ', $e->getMessage(), "\n";
}
?>
