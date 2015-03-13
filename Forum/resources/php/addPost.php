<h2> anything?</h2>
<?php echo 'wut.';
include ("../../connect.php");
include("connect.php");
include_once("../../functions.php");

$input = $_POST["formatted_input"];
$topic_id = $_POST["topic_id_post"];
$user_id = $_POST["user_id_post"];
$page = $_POST['page_post'];
$post_id = $_POST['post_id'];

//echo $input;
//echo $topic_id;

$user_id =1;
if(is_numeric($_SESSION['user_id_post']))
    $user_id = $_SESSION['user_id_post'];

console.log($user_id);

$input = trim($input);
$input = mysqli_real_escape_string($connect,$input);
//echo $input;

if($post_id != "-1"){
    $query_update = ' UPDATE posts SET post_content = "'.$input.'" WHERE post_id = '.$post_id .' ;';
    if(mysqli_query($connect, $query_update)){
        echo "record successfully updated";
    } else{
        echo "Error in the update" ;
    }
}
elseif($input != ""){
    $add_query = "INSERT INTO posts (post_content, topic_id, user_id) VALUES ("."'".$input."',".$topic_id.",".$user_id.");";
    if(mysqli_query($connect, $add_query)){
        echo "New record created successfully";
    } else{
        echo "Error in the add" ;
    }
}
EchoForm("../../posts.php","backToPosts", array("page","topic_id"), array($page,$topic_id));

?>

<script type="text/javascript">
    window.onload = function () {
        document.getElementById('backToPosts').submit();
    };
</script>