<?php
session_start();
/**
 * User: Hayden H
 */
/*
$server = "localhost";
$database = "threeforum";
$username = "root";
$password = "112358mysql";

$connect = mysqli_connect($server,$username,$password,$database)   or die("Error in connect: " . mysqli_error($connect));
*/
include_once("connect.php");
include_once("functions.php");
?>


<?php
$cat_name = $cat_id = $board_id = $board_name = "";

$cat_name = $_POST['cat_name'];
$cat_id = $_POST['cat_id'];
$board_id = $_POST['board_id'];
$board_name = $_POST['board_name'];
$page = $_POST['myPage'];

$topics_per_page = 10;
$starting_limit = ((int)$page -1) * (int)$topics_per_page ;
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

    <?php

    $countquery =' SELECT count(*) AS cnt FROM topics WHERE cat_id = "'.$cat_id.'" ORDER BY topic_id ASC ;';
    $countresult = mysqli_query($connect, $countquery);
    $realcount = "0";
    while($countrow = mysqli_fetch_array($countresult)) {
    $realcount = $countrow['cnt'];
    }
    (int)$numpages = (int)$realcount / (int)$topics_per_page;
    if($numpages > intval($numpages))
        $numpages= intval($numpages +1);
    $countresult->close();


    $pagenames = array("myPage","cat_name", "cat_id", "board_id","board_name");
    $pagevals = array("1",      $cat_name,  $cat_id,  $board_id, $board_name);
    echo'<div id="pageNav">
        <ul>
            <li>page '.$page.' of '.$numpages.'</li> ';
            for ($i =1; $i <= $numpages; $i++){
            echo'<li class="page" value="'.$i.'" title ="'.$i.'"><a class="current" href="#">'.($i).'</a></li>';
            }
            echo'	</ul>
    </div>
    ';
    EchoForm("category.php","pagesForm",$pagenames,$pagevals);

    ?>

    <table id="forum-2-table">
        <tr>
            <th class="topic-title">Title</th>
            <th class="topic-start-date">Start Date</th>
            <th class="topic-replies">Replies</th>
            <th class="topic-views">Views</th>
            <th class="topic-last">Last Message</th>
        </tr>
        <?php
            $query = 'SELECT * FROM topics WHERE cat_id ="'.$cat_id.'" LIMIT '.$starting_limit.', '.$topics_per_page.' ;';
            //or die("Error in the consult.." . mysqli_error($link));

            $result = mysqli_query($connect, $query);

            $topic_id = "";
            while($row = mysqli_fetch_array($result)) {
                $topic_id = $row['topic_id'];

                echo ' <tr class="topic" title="'.$row['topic_id'].'" >
                    <td class="topic-title"><a href="#">'.$row['topic_subject'].'</a></td>
                    <td class="topic-start-date">'.$row['topic_date'].'</td>
                ';

                $countquery = ' SELECT count(*) AS cnt FROM posts  WHERE topic_id= "'.$row['topic_id'].'";';
                $countresult = mysqli_query($connect, $countquery);
                $count = -1;
                while($countrow = mysqli_fetch_array($countresult)) {
                    $count = (int)$countrow['cnt'] - 1;
                }
                $countresult->close();

                echo ' <td class="topic-replies">'.$count.'</td>   ';
                echo'  <td class="topic-views">TO-DO!!!</td> ';

                $lastquery = 'SELECT * FROM users WHERE users.user_id =
                    (SELECT user_id FROM posts WHERE posts.topic_id ='.$row['topic_id'].' ORDER BY posts.post_id DESC LIMIT 1)
                    ;';

                $lastresult = mysqli_query($connect, $lastquery);
                $last = "fail...";
                while($lastrow = mysqli_fetch_array($lastresult)){
                    $last = $lastrow['user_name'];
                }
                $lastresult->close();

                echo ' <td class="topic-last">'.$last.'</td>';
                echo ' </tr> ';
            }
        $result->close();
        echo '</table>';
        echo '    <form method="post" id="toTopic" action="posts.php">' ;
        echoHiddenInput("topic_id", "-1");
        echoHiddenInput("page", "1");
        echo ' </form>';
        ?>
    <canvas id="c" z-index="-2"></canvas>

</div>
</body>
</html>


<?php
mysqli_close($connect);
?>

<script type="text/javascript">
    $(document).ready(function () {
        $('tr.topic').click(function (event){
            var topic_id = this.title;
            $('#topic_id').val(topic_id);
           // alert("topic ="+topic_id+ "  #topic_id's val = "+$('#topic_id').val()+ "   this.title= "+this.title);
            document.getElementById('toTopic').submit();
        });
        $('#pageNav li.page').click(function (event){
            var clickedPage = this.value;
            $('#myPage').val(clickedPage);
            document.getElementById('pagesForm').submit();
        });
    });
</script>
