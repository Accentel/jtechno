<?php
define("HOST_NAME1", "conceptgrammarschool.com");
define("USER1", "conceptg_abdul");
define("PASSWORD1", "tolichowki");
define("DB1", "conceptg_jstechnical");
$link3=mysqli_connect(HOST_NAME1,USER1,PASSWORD1,DB1);
$link1=mysqli_connect(HOST_NAME1,USER1,PASSWORD1,DB1);

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
error_reporting(0);
?>

                  