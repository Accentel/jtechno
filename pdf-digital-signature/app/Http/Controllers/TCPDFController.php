<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class TCPDFController extends Controller
{
    public function downloadPdf(Request $request)
    {
        $certificate = 'file://' . base_path('storage/app/public/certificate/ali.crt');
        
        // Information for the signature
        $info = [
            'Name' => 'Syed Omer Ali',
            'Location' => 'Your Location',
            'Reason' => 'Digital Signature',
            'ContactInfo' => 'Your Contact Info',
        ];
        
        // Set the signature
        PDF::setSignature($certificate, $certificate, 'tcpdfdemo', '', 2, $info);
        
        // Set other PDF properties
        PDF::SetFont('helvetica', '', 12);
        PDF::SetCreator('Syed Ali');
        PDF::SetTitle('Proj');
        PDF::SetAuthor('Ali');
        PDF::SetSubject('Generated PDF');
        PDF::AddPage();
        
        // Your HTML content
        $html = '<div>
            <h1>Jtechno Check</h1>
            Testing PDF signature on 26th Dec 
        </div>';
        
        // Add HTML to the PDF
        PDF::writeHTML($html, true, false, true, false, '');
        
        // Set appearance of the signature
        $appearance = [
            'Name' => 'Syed Omer Ali', // Name for the signature
            'Date' => date('Y-m-d H:i:s'), // Current timestamp
            'FontName' => 'times', // Font family for appearance
            'FontSize' => 12, // Font size for appearance
            'Position' => ['x' => 5, 'y' => 75], // Position of the appearance
        ];
        PDF::setSignatureAppearance(5, 75, 40, 15, $appearance);
        
        // Output the PDF file
        PDF::Output(public_path('Jtechno-digital-signed-pdf-tested-on-26th-dec 5th test.pdf'), 'F');
        
        echo "PDF Successfully Created and Signed";
    }
}


?>