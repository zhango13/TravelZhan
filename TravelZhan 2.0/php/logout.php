<?php
session_start();
session_destroy();
echo '<script type="text/javascript">
   alert("You have been successfully logged out!");
   window.location = "login.php";
</script>';
?>
