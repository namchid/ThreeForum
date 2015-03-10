<?php
/**
 * User: Hayden H
 * Date: 2/22/2015
 * Time: 11:21 AM
 */
$server = "localhost";
$database = "threeforum";
$username = "root";
$password = "112358mysql";

$connect = mysqli_connect($server,$username,$password,$database)   or die("Error in connect: " . mysqli_error($connect));
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>hayden's index, WiP</title>
</head>
<body>
<h1> DB test </h1>
<br/>

<?php
$query = 'SELECT * FROM categories ORDER BY cat_id ASC;';
    //or die("Error in the consult.." . mysqli_error($link));

$result = mysqli_query($connect, $query);

while($row = mysqli_fetch_array($result)) {
    //echo $row[0].'<br/>';
    echo '<div> <p>'.$row['cat_id'].'</p><p>'.$row['cat_name'].'</p><p>'.$row['cat_description'].
    '</div>';
}


mysqli_close($connect);
?>
</body>
</html>
