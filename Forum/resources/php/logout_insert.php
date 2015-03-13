<?php
/**
 * User: Hayden H
 * Date: 3/13/2015
 */

echo ' <span id ="Logout" >Logout</span>';
?>

<script type="text/javascript">
    $(document).ready(function () {
        $('#Logout').click(function (event){
            window.location = "resources/php/logout_helper.php";
        });
    });
</script>
