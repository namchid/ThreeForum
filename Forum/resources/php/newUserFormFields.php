<?php
	echo '<form action="forum.php" method="post">';
	echo '<input type="text" name="email" placeholder="email" class="input-fields">';
        echo '<br>';
        echo '<input type="text" name="username" placeholder="username" class="input-fields">';
        echo '<br>';
        echo '<input type="password" name="password1" placeholder="password" class="input-fields">';
        echo '<br>';
        echo '<input type="password" name="password2" placeholder="re-enter password" class="input-fields">';
        echo '<button type="submit" id="submit-button">join the dark side.</button>';
	echo '</form>';
?>
