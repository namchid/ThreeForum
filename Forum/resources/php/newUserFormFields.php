<?php
	echo '<form name="newUserForm" action="" method="post">';
	echo '<input type="text" id="email" name="email" placeholder="email" class="input-fields">';
        echo '<br>';
        echo '<input type="text" id="username" name="username" placeholder="username" class="input-fields">';
        echo '<br>';
        echo '<input type="password" id="password1" name="password1" placeholder="password" class="input-fields">';
        echo '<br>';
        echo '<input type="password" id="password2" name="password2" placeholder="re-enter password" class="input-fields">';
        echo '<button id="submit-button" onclick="addUser()">join the dark side.</button>';
	echo '</form>';
?>