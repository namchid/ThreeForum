<?php
$dbhost = 'localhost';
//  $dbhost = '131.194.63.21';
  $dbuser = 'bpauls';
  $dbpass = '0742985';
  $dbname = 'bpauls';

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die("Error in connect: " . mysqli_error($conn);
$connect = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die("Error in connect: " . mysqli_error($connect));

if (mysqli_connect_errno())
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
?>