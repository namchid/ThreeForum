<?php
include_once("functions.php");
include_once("connect.php");
$user_id = "";
$user_id = $_POST["user_id"];
$recent_limit = 10;
?>
<?php
$user_email = $user_name = $user_date = "-1";
$query_user = 'SELECT * FROM users where user_id ="'.$user_id.'";';
$result_user = mysqli_query($connect, $query_user);
while($row_user = mysqli_fetch_array($result_user)){
    $user_email = $row_user['user_email'];
    $user_date = $row_user['user_email'];
    $user_name = $row_user['user_name'];
}
$result_user->close();
$num_posts = -1;
$query_post_count = 'SELECT count(*) AS cnt FROM posts WHERE user_id = "'.$user_id.'";' ;
$result_post_count = mysqli_query($connect, $query_post_count);
while($row_post_count = mysqli_fetch_array($result_post_count)){
    $num_posts = $row_post_count['cnt'];
}
$result_post_count->close();
$last_post_date = $last_topic = "-1";
$query_last_post = 'SELECT * FROM posts WHERE user_id ="'.$user_id.'" ORDER BY post_id DESC LIMIT 1 ;' ;
$result_last_post = mysqli_query($connect, $query_last_post);
while($row_last_post = mysqli_fetch_array($result_last_post)){
    $last_post_date = $row_last_post['post_date'];
    $last_topic = $row_last_post['topic_id'];
}
$result_last_post->close();
$last_temp = explode("-", $last_post_date);
$last_year = (int)$last_temp[0];
$last_month = (int)$last_temp[1];
$last_day = (int)explode(" ", $last_temp[2])[0];
$current_year = (int)date("Y");
$current_day = (int)date("d");
$current_month = (int)date("m");
$last_post = "";
if($current_day - $last_day)
    $last_post = (int)($current_day - $last_day) . ' day(s) ' .$last_post;
if($current_month - $last_month)
    $last_post = $last_post .' '. (int)($current_month - $last_month) .' month(s)';
if($current_year - $last_year)
    $last_post = $last_post .' '. (int)($current_year - $last_year) .' year(s)' ;
if($current_day-$last_day || $current_month-$last_month || $current_year-$last_year) {
    $last_post = $last_post . " ago";
    $last_post = $last_month. ' - '.$last_day.' - '.$last_year ;
}
else
    $last_post = "today";
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
    <link rel="stylesheet" type="text/css" href="resources/styles/profile-styles.css">
    <link href="resources/styles/styles.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
    <script type="text/javascript" src="resources/scripts/setUpNavigation-profile.js"></script>
    <script type="text/javascript" src="resources/scripts/inner-matrix.js"></script>
    <script type="text/javascript" src="resources/scripts/profile.js"></script>
</head>
<body>
<div id="navBar"></div>
<div id="mainContainer">
    <div class="subtitle"><?php echo $user_name; ?></div>
    <div id="profile-area">
        <div id="left-panel">
            <div>
                <img src="resources/images/aang.png">
            </div>
            <div id="stats-area">
                <table id="user-stats-table">
                    <tr>
                        <td class="col-one">Email:</td>
                        <td><?php echo $user_date; ?></td>
                    </tr>
                    <tr>
                        <td class="col-one">Total Posts:</td>
                        <td><?php echo $num_posts; ?></td>
                    </tr>
                    <tr>
                        <td class="col-one">Last Post:</td>
                        <td><?php echo $last_post ; ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <div id="right-panel">
            <div id="about-user-area">
                <h4>
                    About
                    <img class="edit-icon" src="resources/images/pencil54.png" title="edit" onclick="">
                </h4>
                Lorem ipsum
            </div>
            <div id="post-history">
                <h4>Recent Posts</h4>
                <?php
                EchoForm("posts.php", "jumpToTopic", array("topic_id","page"), array("x", "1"));
                $query_recent_posts = 'SELECT * FROM topics t INNER JOIN posts p ON t.topic_id = p.topic_id  WHERE p.user_id ='.$user_id.' ORDER BY p.post_id DESC LIMIT '.$recent_limit.' ;      ';
                $result_recent_posts = mysqli_query($connect, $query_recent_posts);
                while($row_recent = mysqli_fetch_array($result_recent_posts)){
                    echo '<div class ="history">
                               '.$user_name.' posted in <a href="#" class = "jump_to_topic" title="'.$row_recent['topic_id'].'" > '.$row_recent['topic_subject'].'  </a> </div> ';
                }
                $result_recent_posts->close();
                ?>
            </div>
        </div>
    </div>
</div>
<canvas id="c"></canvas>
</body>
</html>

<script type="text/javascript">
    $(document).ready(function () {
        $('a.jump_to_topic').click(function (event){
            var topic_id = this.title;
            $('#topic_id').val(topic_id);
            document.getElementById('jumpToTopic').submit();
        });
    });
</script>