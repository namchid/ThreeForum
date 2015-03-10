<!DOCTYPE html>
<html>
<head lang="en">
	<title>Add New Topic</title>
        <link href='http://fonts.googleapis.com/css?family=Monoton' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Cutive+Mono' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Audiowide' rel='stylesheet' type='text/css'> 
        <link rel="stylesheet" type="text/css" href="resources/styles/forum-styles.css">
	<link rel="stylesheet" type="text/css" href="resources/styles/new-topic-form-styles.css">
        <link href="resources/styles/styles.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
        <script type="text/javascript" src="resources/scripts/setUpNavigation-forum.js"></script>
        <script type="text/javascript" src="resources/scripts/forum-2.js"></script>
        <script type="text/javascript" src="resources/scripts/inner-matrix.js"></script>
</head>
<body>
	<div id="navBar"></div>
	<div id="mainContainer">
		<div id="topic-form-area">
			<form action="forum-2.php" method="post" id="topic-form"> <!-- todo: send back to the right forum, passed in as post variable -->
				<div class="subtitle">Create New Topic</div>
				<br>
				<input type="text" name="new-topic-title" placeholder="Topic Title" id="new-topic-title" autofocus>
				<br>
				<textarea rows="10" name="new-topic-post" id="new-topic-post" form="topic-form" placeholder="your post"></textarea>
				<br>
				<button type="submit" name="submit-topic" class="submit-post-button">Create new topic</button>  	
			</form>
		</div>
	</div>
	<canvas id="c" z-index="-2"></canvas>
</body>
</html>
