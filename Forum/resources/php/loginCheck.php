
<?php  
include "connection.php";
$username = $_GET["username"];
$password = $_GET["password"];

$loginQuery = 'SELECT * FROM users WHERE user_name ='.'"'.$username.'"'.'&& user_pass ='.'"'.$password.'"';


$test_query = 'SELECT * FROM users WHERE user_name = "hitmonlee" && user_pass = "kickingfiend"';

//echo $loginQuery;
$ret = mysqli_query($conn, $loginQuery);
$retRows = mysqli_num_rows($ret);
if($retRows == 1)
  echo "good";
else 
  echo "bad";
?>