<?php
include "connection.php";
?>


<?php
	echo '<form name=loginform action="" method="post">';
	echo '<input type="text" id="username" name="username" placeholder="username" class="input-fields">';
        echo '<br>';
	echo '<input type="password" id="password" name="password" placeholder="password" class="input-fields">';
        echo '<br>';
        echo '<button id="submit-button" onclick="checkLogin()">login</button>';
	echo '</form>';
?>