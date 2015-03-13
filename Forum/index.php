<!DOCTYPE html>
<html lang"en">
<head>
	<meta charset="UTF-8">
	<title>Matrix</title>
	<link rel="stylesheet" type="text/css" href="resources/styles/index-styles.css">
	<link href='http://fonts.googleapis.com/css?family=Monoton' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Cutive+Mono' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
	<script src="resources/scripts/matrix.js" type="text/javascript"></script>
	<script type="text/javascript" src="resources/scripts/loadForm.js"></script>
	<script type="text/javascript" src="resources/scripts/loginForum.js"></script>
	<script type="text/javascript" src="resources/scripts/newUser.js"></script>
</head>
<body>
	<form id="user-form">
		<fieldset>
			<p id="forum-title">ThreeForum</p>
			<div id="form-container">"</div>
		</fieldset>
	</form>
	<ul id="form-selector">
		<li>
			<button id="login" onclick="loadLoginForm()">Log in</button>
		</li>
		<li>
			<button id="new-user" onclick="loadNewUserForm()">New User</button>
		</li>
	</ul>
	<canvas id="c"></canvas>
</body>
</html>
