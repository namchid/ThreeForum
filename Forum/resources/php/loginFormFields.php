<?php
include_once ("connection.php");
?>


<?php
	echo '<form name=loginform action="" method="post">';
	echo '<input type="text" id="username" name="username" placeholder="username" class="input-fields">';
	echo '<form action="forum.php" method="post">';
	echo '<input type="text" name="username" placeholder="username" class="input-fields">';
        echo '<br>';
    echo '<input type="password" id="password" name="password" placeholder="password" class="input-fields">';
    echo '<br>';
    echo '<button id="submit-button" onclick="checkLogin()">login</button>';
    echo '</form>';
?>
