<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once "connection.php";
$username = $_GET["username"];
$password = $_GET["password"];

$loginQuery = 'SELECT * FROM users WHERE user_name ='.'"'.$username.'"'.'&& user_pass ='.'"'.$password.'"';


//$test_query = 'SELECT * FROM users WHERE user_name = "hitmonlee" && user_pass = "kickingfiend"';

//echo $loginQuery;
$ret = mysqli_query($conn, $loginQuery);
while($ret_row = mysqli_fetch_array($ret)){
    $user_id = $ret_row['user_id'];
}


if($user_id != "-1") {
    $_SESSION['user_id'] = $user_id;
    echo "good";
}
else 
  echo "bad";
?>
