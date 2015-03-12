

<?php 
  $dbhost = 'localhost';
  $dbuser = 'bpauls';
  $dbpass = '0742985';
  $dbname = 'bpauls';

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if (mysqli_connect_errno())
  echo "Failed to connect to MySQL: " . mysqli_connect_error();

?>

