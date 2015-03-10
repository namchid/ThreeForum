<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Forum</title>
	<link href='http://fonts.googleapis.com/css?family=Monoton' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Cutive+Mono' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Audiowide' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="resources/styles/forum-styles.css">
	<link href="resources/styles/styles.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
	<script type="text/javascript" src="resources/scripts/setUpNavigation-forum.js"></script>
        <script type="text/javascript" src="resources/scripts/inner-matrix.js"></script>
	<!--<script type="text/javascript" src="resources/scripts/animateForumMainPage.js"></script> -->
</head>
<body>
	<div id="navBar"></div>
	<div id="mainContainer">
	<!-- todo: remove things below later-->


        <div class="subtitle">Forum Boards</div>
		<ul class="breadcrumb">
			<li><a>Forum</a></li>
		</ul>
        <?php
        include("forum_insert.php");
        ?>

        <!--
		<h2>Technology</h2>
			<div>
				<a class="category" href="forum-2.php">Coding Challenges</a>
			</div>
			<div>
				<a class="category" href="">Web Application Design</a>
			</div>
			<div>
				<a class="category" href="">Why Apple > Windows</a>
			</div>
		<h2>Entertainment</h2>
			<div>
				<a class="category" href="">Good old fashioned board games</a>
			</div>
			<div>
				<a class="category" href="">Electronic ones</a>
			</div>
		<h2>Random</h2>
			<div>
				<a class="category" href="">Pictures of cats</a>
	        </div>
    -->
	<canvas id="c" z-index="-2"></canvas>
</div>
</body>
</html>
