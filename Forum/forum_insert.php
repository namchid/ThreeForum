<?php
/** * User: Hayden H */
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

<form method="post" id="toCategory" action="category.php">

    <?php
    echoHiddenInput("cat_name", "x");
    echoHiddenInput("cat_id","x");
    echoHiddenInput("board_id","x");
    echoHiddenInput("board_name","x");
    echoHiddenInput("myPage","1");

    echo '</form>';

    $query = 'SELECT * FROM boards ORDER BY board_id ASC;';
    //or die("Error in the consult.." . mysqli_error($link));

    $result = mysqli_query($connect, $query);

    while($row = mysqli_fetch_array($result)) {
        //echo $row[0].'<br/>';
        echo '<h2>'.$row['board_name'].'</h2>';
        $subquery = 'SELECT * FROM categories WHERE board_id = "'.$row['board_id'].'";';
        $subresult = mysqli_query($connect, $subquery);
        while($subrow = mysqli_fetch_array($subresult)) {
                echo '<div>	<a class="category" href="#" title="'.$subrow['cat_id'].'~'.$subrow['cat_name'].'~'.$row['board_id'].'~'.$row['board_name'].'">'.$subrow['cat_name'].'</a>	</div> ';
            }
        $subresult->close();
    }
    $result->close();
    ?>

<?php
mysqli_close($connect);
?>

<script type="text/javascript">
$(document).ready(function () {
    $('a.category').click(function (event){

         var str_split = event.target.title.split("~");
         var cat_id = str_split[0];
         var cat_name = str_split[1];
         var board_id = str_split[2];
         var board_name = str_split[3];
        // $.post('category.php', {'cat_name':cat_name, 'cat_id':cat_id, 'board_id':board_id, 'board_name':board_name }, setcontent ) ;
         console.log("should have just posted, str_split[1] = " + str_split[1]);
        $('#cat_id').val(cat_id);
        $('#cat_name').val(cat_name);
        $('#board_name').val(board_name);
        $('#board_id').val(board_id);
         document.getElementById('toCategory').submit();

    });
});
</script>