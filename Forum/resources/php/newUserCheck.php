<?php

include_once "connection.php";

$email = $_GET["email"];
$username = $_GET["username"];
$password = $_GET["password1"];
$user_id = "-1";

$add_query = "INSERT INTO users (user_name, user_pass, user_email, user_level) 
              VALUES ("."'".$username."',"."'".$password."',"."'".$email."',"."3)";


mysqli_query($conn, $add_query);

$loginQuery = 'SELECT * FROM users WHERE user_name ='.'"'.$username.'"'.'&& user_pass ='.'"'.$password.'"';


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

//$_SESSION['user_id'] = $user_id;
if($retRows == 1)
  echo $user_id;
else 
  echo "bad";


?>