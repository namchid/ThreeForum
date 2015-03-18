<?php

echo "<header>ThreeForum</header>";

echo "<div id='cssmenu'>";
echo "<ul>";
   echo "<li class='has-sub'><a href='profile.php'><span>My Profile</span></a>";
        echo "<ul>";
                echo "<li><a href='index.php'>"; include("logout_insert.php"); echo "</a></li>";
        echo "</ul>";

   echo "</li>";
   echo "<li><a href='forum.php'><span>Forum</span></a>";
   echo "</li>";
   echo "<li class='active last'><a href='about.php'><span class='current'>About ThreeForum</span></a></li>";
echo "</ul>";
echo "</div>";


?> 
