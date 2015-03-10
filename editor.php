<?php 
session_start();


?>
<html>
<head></head>

<body>
<?php

if (isset($_POST["formatted_input"]) == true) 
 echo $_POST["formatted_input"];
else 
 echo "Nothing to see here!";
?>
</body>
</html>
