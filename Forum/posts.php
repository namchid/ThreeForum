<?php
/** * User: Hayden H */
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
$user_id = 1;
if(is_numeric($_SESSION['user_id']))
    $user_id = $_SESSION['user_id'];
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
        <script type="text/javascript" src="resources/scripts/addPost.js"></script>
        <script type="text/javascript" src="resources/tinymce/js/tinymce/tinymce.min.js"></script>
        <script type="text/javascript">
            tinymce.init({
                selector: "textarea",
                plugins: [
                    "advlist autolink lists link image charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });
        </script>
    </head>
    <body>
    <div id="navBar"></div>
    <div id="mainContainer">
        <?php
        $topic_name = "n/a";
        $query_topic_name = 'SELECT * FROM topics WHERE topic_id = '.$topic_id.' ;';
        $result_topic_name = mysqli_query($connect, $query_topic_name);
        while($row_topic_name = mysqli_fetch_array($result_topic_name)) {
            $topic_name = $row_topic_name['topic_subject'];
        }
        $result_topic_name->close();
        $board_id = $board_name = $cat_name = $cat_id = "X";
        $query_cat_board = ' SELECT c.*, b.* FROM topics t
                        INNER JOIN categories c ON t.cat_id = c.cat_id
                        INNER JOIN boards b ON c.board_id = b.board_id
                        WHERE t.topic_id = '.$topic_id.';';
        $result_cat_board = mysqli_query($connect, $query_cat_board);
        while($row_cb = mysqli_fetch_array($result_cat_board)){
            $board_id = $row_cb['board_id'];
            $board_name = $row_cb['board_name'];
            $cat_name = $row_cb['cat_name'];
            $cat_id = $row_cb['cat_id'];
        }
        ?>

        <div class="subtitle"><?php echo $topic_name ?></div>
        <ul class="breadcrumb">
            <li><a href="forum.php">Forum</a></li>
            <li><a href="#" class="toCategory">Category</a></li>
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
        if($numpages > intval($numpages))
            $numpages= intval($numpages +1);
        $countresult->close();
        $pagenames = array("page","topic_id");
        $pagevals = array( $page,  $topic_id);

        echo'<div id="pageNav" title ="'.$realcount.'" data-last_page="'.$numpages.'">
			    <ul>
			    	<li id="currentPageNum" title="'.$page.'">page '.$page.' of '.$numpages.'</li> ';
        for ($i =1; $i <= $numpages; $i++){
            echo'<li class="page" value="'.$i.'" title ="'.$i.'"><a class="current" href="#">'.($i).'</a></li>';
        }
        echo'	</ul>
		    </div>
        ';

        EchoForm("posts.php","pagesForm",$pagenames,$pagevals);
        EchoForm("profile.php","profileForm", array("user_id"), array("x"));
        EchoForm("category.php","categoryForm", array("cat_id","cat_name","board_id","board_name","myPage"), array($cat_id, $cat_name, $board_id, $board_name,"1"));

        ?>
        <div id="hiddenPost" style ="display:none;"><h2>shouldn't see this</h2>  </div>
        <div id="posts">
                <?php
                $postquery = ' SELECT * FROM posts WHERE topic_id = "'.$topic_id.'" ORDER BY post_id ASC  LIMIT '.$startinglimit.', '.$postsperpage.' ;';
                $postresult = mysqli_query($connect,$postquery);
                $postcount = 1;
                while($row = mysqli_fetch_array($postresult)) {
                    $userquery = ' SELECT * FROM users WHERE user_id = "'.$row['user_id'].'" ;';
                    $userresult = mysqli_query($connect,$userquery);
                    $username =  "";
                    while($user = mysqli_fetch_array($userresult)) {
                        if($user['user_name'] != "")
                            $username = $user['user_name'];
                    }
                    $userresult->close();
                    echo '
                    <table class="posts-table">
			<tr>
					<td class="message-body"> ';
					echo '<div class = "row1">';
					echo	 $row['post_content'] .'</div>';
					echo '</td>
					<td class="post-num"><div class="row1">#'.((int)$postcount + ((int)$page - 1) * $postsperpage).'</div></td>
		    		</tr>
			    	<tr>
					<td colspan="2" class="edit-post">
                       <span class="username-field" title="'.$row['user_id'].'">'.$username.'</span>';
                    if($user_id == $row['user_id'])
                       echo '<span class="edit" data-post_id ="'.$row['post_id'].'" onclick="updatePostLabel()">edit post</span> ';
                    else
                        echo '<span class="" onclick=""> </span> ';
                    echo '
                    </td>
			    	</tr>
                    ';
                    $postcount +=1;
		    echo '<table>';
                }
                $postresult->close();
                ?>
        </div>
        <h3 id="new-post-label">New Post</h3>
        <div id="post-form-area">
            <form action="resources/php/addPost.php" method="post" id="post-form">
                <?php
                    echoHiddenInput("topic_id_post",$topic_id);
                    echoHiddenInput("user_id_post",$user_id);
                    echoHiddenInput("formatted_input","   ");
                    echoHiddenInput("page_post",$page);
                ?>
                <textarea rows="3" type="text" name="new-post" id="new-topic-post" form="post-form" placeholder="say something"></textarea>
                <button name="submit-topic" class="submit-post-button" id="post_submit_bttn" data-post_id="-1">No Takebacks, OK?</button>
            </form>
        </div>
    </div>
    <canvas id="c"></canvas>
    </body>
    </html>
    <script type="text/javascript">
        var add_mode = true;

        $(document).ready(function () {
            $('#pageNav li.page').click(function (event){
                document.getElementById("page").value = this.value;
                if(this.value <= 0)
                    $("#pageVal").val( this.title);
                document.getElementById('pagesForm').submit();
            });
            $('*.username-field').click(function (event){
                var userid = event.target.title;
                $('#user_id').val(userid);
                document.getElementById('profileForm').submit();
            });
            $('*.toCategory').click(function (event){
                document.getElementById('categoryForm').submit();
            });
            $('span.edit').click(function (event) {
                add_mode = !add_mode;
                var post_id = $(event.target).attr('data-post_id') ;
                $("#post_submit_bttn").attr('data-post_id', post_id);
            });

            $('#post_submit_bttn').click(function(event){
                event.preventDefault();

                var user_id = $('user_id_post').val();
                user_id = 1;
                var post_val = $('#topic_id_post').val();
                var page = $('#currentPageNum').attr("title") ;
                var t = event.target;
                var post_id =  $(t).attr("data-post_id");
                if(add_mode)
                    post_id = "-1";

                // console.log("pageNum passed: "+ page)
                var input= document.getElementById("formatted_input").value = tinymce.activeEditor.getContent();
                $.post('resources/php/addPost.php', { 'topic_id_post': post_val, 'user_id_post': user_id, 'formatted_input':input,'page_post': page,
                                                        'add_mode':add_mode, post_id:post_id }, setcontent);
                //document.getElementById('post-form').submit();
            });
            function setcontent(data) {
              //  $('#hiddenPost').html(data);
                var post_title = $('#pageNav').attr("title");
                var post_count = post_title;
                var page_int = parseInt( $("#page").val() );
                var last_page = parseInt( $("#pageNav").attr("data-last_page"));

                var page_pass = page_int;
                if(post_count % 10 == 0){
                    page_pass = last_page +1 ;
                }
                else if(page_int < last_page){
                    page_pass = last_page;
                }
                if(!add_mode) {
                    page_pass = page_int;
                }

                $("#page").val( page_pass);
                document.getElementById('pagesForm').submit();
            }

        });
    </script>

<?php
