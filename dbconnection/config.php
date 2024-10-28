<?php
define("HOST_NAME","localhost");
define("USER","ospsgw8u_admin");
define("PASSWORD","Accentel@2023");
define("DB","ospsgw8u_jtechno");
$link=mysqli_connect(HOST_NAME,USER,PASSWORD,DB);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
error_reporting(0);
?>