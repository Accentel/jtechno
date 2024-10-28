<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//  $sql1 = "select * from organization where id='1'";
//     $res1 = mysqli_query($link, $sql1) or die(mysql_error($link));
//     $r = mysqli_fetch_assoc($res1);
     
//     if(($stn=="TN") or ($stn=="KL") ){
//         $schoolname = "JS Technical Services";
//     }else{
//         $schoolname = $r['org_name'];
//     }
// function OpenCon()
// {
// define("dbhost","localhost");
// define("dbuser","a16673ai_payamath");
// define("dbpass","Payamath@2016");
// define("db","a16673ai_jfm2324");
// $link = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $link -> error);
 
// return $link;
// }

// function CloseCon($link)
// {
// $link -> close();
// } 

$sql1 = "SELECT * FROM organization WHERE id = '1'";
$res1 = mysqli_query($link, $sql1) or mysqli_connect_error($link);
$r = mysqli_fetch_assoc($res1);

if (($stn === "TN") || ($stn === "KL")) {
    $schoolname = "JS Technical Services";
} else {
    $schoolname = $r['org_name'];
}
	
	
	?>
	
    