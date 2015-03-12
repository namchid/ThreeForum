<?php

include "connection.php";

$email = $_GET["email"];
$username = $_GET["username"];
$password = $_GET["password1"];

$add_query = "INSERT INTO users (user_name, user_pass, user_email, user_level) 
              VALUES ("."'".$username."',"."'".$password."',"."'".$email."',"."3)";

if(mysqli_query($conn, $add_query))
  echo "good";
else 
  echo "bad";
?>