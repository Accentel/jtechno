<?php
//include('config.php');
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
// $link=mysqli_connect(HOST_NAME,USER,PASSWORD,DB);
// if (mysqli_connect_errno())
//   {
//   echo "Failed to connect to MySQL: " . mysqli_connect_error();
//   }
// error_reporting(0);
//include('config.php');
define("HOST_NAME","localhost");
define("USER","root");
define("PASSWORD","");
define("DB","a16673ai_jfm2324");
$link=mysqli_connect(HOST_NAME,USER,PASSWORD,DB);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
error_reporting(0);
?>