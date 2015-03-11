<?php

echo "<header>ThreeForum</header>";

echo "<div id='cssmenu'>";
echo "<ul>";
   echo "<li class='active has-sub'><a href='profile.php'><span class='current'>My Profile</span></a>";
        echo "<ul>";
                echo "<li><a href='index.php'><span>Logout</span></a></li>";
        echo "</ul>";

   echo "</li>";
   echo "<li><a href='forum.php'><span>Forum</span></a>";
   echo "</li>";
   echo "<li class='last'><a href='about.php'><span>About ThreeForum</span></a></li>";
echo "</ul>";
echo "</div>";

?>
