<?php
 $m=date('m');
if($m > '03'){
$currentDate = date("Y-m-d");
 $dateOneYearAdded = strtotime(date("Y-m-d", strtotime($currentDate)) . " +1 year");
$ny=date('Y', $dateOneYearAdded)."<br>";
$nyd= date('Y')."-".$ny;
}else{
     $currentDate = date("Y-m-d");
 $dateOneYearAdded = strtotime(date("Y-m-d", strtotime($currentDate)) . " -1 year");
 $ny=date('Y', $dateOneYearAdded);
 $nyd= $ny."-".date('Y');
}

echo $nyd;

?>