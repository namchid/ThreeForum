<?php
/** * User: Hayden H */
/*
$server = "localhost";
$database = "threeforum";
$username = "root";
$password = "112358mysql";

$connect = mysqli_connect($server,$username,$password,$database)   or die("Error in connect: " . mysqli_error($connect));
*/
?>

<?php
include_once("functions.php");
include_once("connect.php");

$topic_id ="";
$topic_id = $_POST['topic_id'];
$postsperpage = 10;
$page = "1";
$page = $_POST['page'];
(int)$numpages = 1;
$startinglimit = ((int)$page -1) * (int)$postsperpage ;
?>
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
	<link rel="stylesheet" type="text/css" href="resources/styles/new-topic-form-styles.css">
	<link rel="stylesheet" type="text/css" href="resources/styles/post-styles.css">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
        <script type="text/javascript" src="resources/scripts/setUpNavigation-forum.js"></script>
        <script type="text/javascript" src="resources/scripts/posts.js"></script>
	<script type="text/javascript" src="resources/scripts/inner-matrix.js"></script>
</head>
<body>
	<div id="navBar"></div>
	<div id="mainContainer">
		<div class="subtitle">The Horrors of Debugging PHP</div>
		<ul class="breadcrumb">
			<li><a href="forum.php">Forum</a></li>
			<li><a href="forum-2.php">Category</a></li>
			<li><a>Posts</a></li> 
		</ul>
        <?php

        $countquery =' SELECT count(*) AS cnt FROM posts WHERE topic_id = "'.$topic_id.'" ORDER BY post_id ASC ;';
        $countresult = mysqli_query($connect, $countquery);
        $realcount = "0";
        while($countrow = mysqli_fetch_array($countresult)) {
            $realcount = $countrow['cnt'];
        }
        (int)$numpages = (int)$realcount / (int)$postsperpage;
        $numpages %= 1; $numpages+=1;
        $countresult->close();


        $pagenames = array("page","topic_id");
        $pagevals = array("1",     $topic_id);
        echo'<div id="pageNav">
			    <ul>
			    	<li>page '.$page.' of '.$numpages.'</li> ';
                    for ($i =1; $i <= $numpages; $i++){
                        echo'<li class="page" value="'.$i.'" title ="'.$i.'"><a class="current" href="#">'.($i).'</a></li>';
                    }
		    echo'	</ul>
		    </div>
        ';
        EchoForm("posts.php","pagesForm",$pagenames,$pagevals);
        ?>

		<div id="posts">
			<table id="posts-table">
                <?php

                $postquery = ' SELECT * FROM posts WHERE topic_id = "'.$topic_id.'" ORDER BY post_id ASC  LIMIT '.$startinglimit.', '.$postsperpage.' ;';
                $postresult = mysqli_query($connect,$postquery);
                $postcount = 1;
                while($row = mysqli_fetch_array($postresult)) {

                    $userquery = ' SELECT * FROM users WHERE user_id = "'.$row['user_id'].'" ;';
                    $userresult = mysqli_query($connect,$userquery);
                    $username = "";
                    while($user = mysqli_fetch_array($userresult)) {
                        if($user['user_name'] != "")
                            $username = $user['user_name'];
                    }
                    $userresult->close();
                    echo '
                    <tr>
					<td class="user">
						<img src="resources/images/aang.png" class="user-image">
					</td>
					<td class="message-body">
						'.$row['post_content'].'
					</td>
					<td class="post-num">#'.((int)$postcount * (int)$page).'</td>
		    		</tr>
			    	<tr>
					<td colspan="3" class="edit-post">
                       <span class="username-field">'.$username.'</span>
                       <span class="edit" onclick="updatePostLabel()">edit post</span>
                    </td>

			    	</tr>
                    ';
                    $postcount +=1;
                }
                $postresult->close();
                ?>

			</table>
		</div>
		<h3 id="new-post-label">New Post</h3>
		<div id="post-form-area">
                	<form action="" method="post" id="post-form">
                        	<textarea rows="3" type="text" name="new-post" id="new-topic-post" form="post-form" placeholder="say something"></textarea>
                		<button type="submit" name="submit-topic" class="submit-post-button">No Takebacks, OK?</button>
			</form>
		</div>
        </div>
	<canvas id="c"></canvas>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function () {
        $('#pageNav li.page').click(function (event){
            document.getElementById("pageNav").value = this.value;
            if(this.value <= 0)
               $("#pageVal").val( this.title);

            document.getElementById('pagesForm').submit();
        });
    });
</script>

<?php
