<?php  

include_once "connection.php";
$username = $_GET["username"];
$password = $_GET["password"];



$loginQuery = 'SELECT * FROM users WHERE user_name ='.'"'.$username.'"'.'&& user_pass ='.'"'.$password.'"';


$test_query = 'SELECT * FROM users WHERE user_name = "hitmonlee" && user_pass = "kickingfiend"';

//echo $loginQuery;
$ret = mysqli_query($conn, $loginQuery);
$retRows = mysqli_num_rows($ret);

function validCred ($retRows,$ret) {
	if($retRows==1){
  			while($rowCheck = mysqli_fetch_assoc($ret)) {
                        $array = array();
       			$array[] = $rowCheck;
       }
   $user_id = $array[0]["user_id"];
   return $user_id; 
  }

}

$user_id = validCred($retRows, $ret);


$_SESSION['user_id'] = $user_id;
if($retRows == 1)
  echo $user_id;
else 
  echo "bad";
?>
