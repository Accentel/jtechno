<?php
include('dbconnection/connection1.php');
require('vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Xls;
use PhpOffice\PhpSpreadsheet\Reader\Csv;

$state=$_GET['state'];
if(isset($_POST['submit'])){
    $mimes = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.oasis.opendocument.spreadsheet','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

    if(in_array($_FILES["file"]["type"],$mimes)){

        if($state=='AP'){
            $qottable ='add_qot';
        }
        elseif($state=='TG'){
            $qottable ='add_tgqot';
        }
        elseif($state=='TN'){
            $qottable ='add_tngqot';
        }
        elseif($state=='KL'){
            $qottable ='add_klqot';
        }
        else if($state=='KN'){
            $qottable ='add_knqot';
        }
        elseif($state=='OD'){
            $qottable ='add_odqot';
        }

        $uploadFilePath = 'upload/'.basename($_FILES['file']['name']);
        move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);

        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $spreadsheet = $reader->load($uploadFilePath);
        $worksheet = $spreadsheet->getActiveSheet();

        foreach ($worksheet->getRowIterator() as $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(FALSE);
            $data = [];
            foreach ($cellIterator as $cell) {
                $data[] = $cell->getValue();
            }
            $qutno = isset($data[1]) ? $data[1] : '';
            $potype = isset($data[2]) ? $data[2] : '';
            $ponum = isset($data[3]) ? $data[3] : '';
            $ronum = isset($data[5]) ? $data[5] : '';
            $rodate = isset($data[6]) ? $data[6] : '';
            $podate = isset($data[7]) ? $data[7] : '';

            $status = '';
            if($ronum!=''){
                $status='work to be started';

            } else if($ponum!=''){
                $status='work to be started';
            } else {
                $status='Ro Required';
            }

            if( ($qutno!= '') and  ($ponum!= '' ) and ($ronum!= '' ) ){
                $m = "UPDATE " .$qottable." SET po_type='$potype',
                    po_no='$ponum',ro_no='$ronum',ro_date='$rodate',po_date='$podate',status='$status' WHERE  quet_num='$qutno' AND status='Ro Required'";
                $link->query($m);
            }
        }

        print "<script>";
        print "alert('Successfully Uploaded');";
        print "self.location='roqot_list.php?state=$state';";
        print "</script>";

    }
    else{
        die("<script>
        alert('Sorry!, You have to upload only excel file');
        self.location='bulk_ro_update.php?state=$state';
        </script>");
    }

}
?>




