<!DOCTYPE HTML>
<html>
<head lang="en">
	<meta charset="utf-8">
	<title>Sub-Forum</title>
	<link href='http://fonts.googleapis.com/css?family=Monoton' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Cutive+Mono' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Audiowide' rel='stylesheet' type='text/css'>	
	<link rel="stylesheet" type="text/css" href="resources/styles/forum-styles.css">
        <link href="resources/styles/styles.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
        <script type="text/javascript" src="resources/scripts/setUpNavigation-forum.js"></script>
	<script type="text/javascript" src="resources/scripts/forum-2.js"></script>
	<script type="text/javascript" src="resources/scripts/inner-matrix.js"></script>
</head>
<body>
	<div id="navBar"></div>
	<div id="mainContainer">
	<!-- todo: remove things below later into a php file -->
		<div class="subtitle">Coding Challenges</div>
		<ul class="breadcrumb">
			<li><a href="forum.php">Forum</a></li>
			<li><a>Category: Technology</a></li>
		</ul>
		<div id="pageNav">
			<ul>
				<li>page 1 of 3</li>
				<li><a class="current" href="">1</a></li>
				<li><a>2</a></li>
				<li><a>3</a></li>
			</ul>
		</div>
		<table id="forum-2-table">
			<tr>
				<th class="topic-title">Title</th>
				<th class="topic-start-date">Start Date</th>
				<th class="topic-replies">Replies</th>
				<th class="topic-views">Views</th>
				<th class="topic-last">Last Message</th>
			</tr>
                        <tr class="topic">
                                <td class="topic-title"><a href="https://www.google.com">The Horrors of Debugging PHP</a></td>
                                <td class="topic-start-date">3/9/15</td>
                                <td class="topic-replies">2</td>
                                <td class="topic-views">10</td>
                                <td class="topic-last">her_majesty</td>
                        </tr>
                        <tr class="topic">
                                <td class="topic-title"><a href="https://www.google.com">The Horrors of Debugging PHP</a></td>
                                <td class="topic-start-date">3/9/15</td>
                                <td class="topic-replies">2</td>
                                <td class="topic-views">10</td>
                                <td class="topic-last">her_majesty</td>
                        </tr>
		</table>
<!--
		<div class="topics">
			<ul>
				<li>
					<div><a class="topic-title">The Horrors of Debugging PHP</a></div>
					<div><a class="sub">3/9/2015</a></div>
				</li>
				<li>
					<div>Replies: 2</div>
					<div class="sub">Views: 10</div>
				</li>
				<li>
					<div>her_highness</div>
					<div>a moment ago</div>
				</li>
			</ul>
		</div>
	</div> -->
	<canvas id="c" z-index="-2"></canvas>
</body>
</html>
