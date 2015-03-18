<?php
/**
 * User: Hayden H
 * Date: 3/13/2015
 */
if (session_status() != PHP_SESSION_NONE) {
    session_destroy();
}
?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        window.location = "../../index.php";
    });
</script>
