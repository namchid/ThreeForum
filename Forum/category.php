<?php
/**
 * User: Hayden H
 */
$server = "localhost";
$database = "threeforum";
$username = "root";
$password = "112358mysql";

$connect = mysqli_connect($server,$username,$password,$database)   or die("Error in connect: " . mysqli_error($connect));
?>


<?php
$cat_name = $cat_id = $board_id = $baord_name = "";

$cat_name = $_POST['cat_name'];
$cat_id = $_POST['cat_id'];
$board_id = $_POST['board_id'];
$board_name = $_POST['board_name'];

?>
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
    <div class="subtitle"><?php echo $cat_name;   ?></div>
    <ul class="breadcrumb">
        <li><a href="forum.php">Forum</a></li>
        <li><a>Category: <?php echo $board_name ?></a></li>
    </ul>
    <div id="pageNav">
        <ul>
            <li>page 1 of 3</li>
            <li><a class="current" href="#">1</a></li>
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
        <?php
            $query = 'SELECT * FROM topics WHERE cat_id ="'.$cat_id.'";';
            //or die("Error in the consult.." . mysqli_error($link));

            $result = mysqli_query($connect, $query);

            $topic_id = "";
            while($row = mysqli_fetch_array($result)) {
                $topic_id = $row['topic_id'];

                echo ' <tr class="topic">
                    <td class="topic-title"><a href="#">'.$row['topic_subject'].'</a></td>
                    <td class="topic-start-date">'.$row['topic_date'].'</td>
                ';

                $countquery = ' SELECT count(*) AS cnt FROM threeforum.posts  WHERE topic_id= "'.$row['topic_id'].'";';
                $countresult = mysqli_query($connect, $countquery);
                $count = -1;
                while($countrow = mysqli_fetch_array($countresult)) {
                    $count = $countrow['cnt'];
                }

                echo ' <td class="topic-replies">'.$count.'</td>   ';
                echo'  <td class="topic-views">TopID=?'.$topic_id.'</td> ';

                $lastquery = 'SELECT * FROM users WHERE users.user_id =
                    (SELECT user_id FROM posts WHERE posts.topic_id ='.$row['topic_id'].' ORDER BY posts.post_id DESC LIMIT 1)
                    ;';

                $lastresult = mysqli_query($connect, $lastquery);
                $last = "fail...";
                while($lastrow = mysqli_fetch_array($lastresult)){
                    $last = $lastrow['user_name'];
                }

                echo ' <td class="topic-last">'.$last.'</td>';
                echo ' </tr> ';
            }
        ?>

    </table>
    </div>
</body>
</html>
<?php
mysqli_close($connect);
?>