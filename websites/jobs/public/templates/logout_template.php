<?php
session_start();
//session_unset();
session_destroy();
header('Location:home.php');
//echo '<script>window.location.href="indexe.php"</script>'; // When the preceding codes are executed and completed, the page is sent to indexe.php.

?>