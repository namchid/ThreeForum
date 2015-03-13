<?php
/**
 * User: Hayden H
 * Date: 3/13/2015
 */
if (session_status() != PHP_SESSION_NONE) {
    session_destroy();
}
?>
<script type="text/javascript">
    $(document).ready(function () {
        window.location = "../../index.php";
    });
</script>