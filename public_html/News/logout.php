<?php
session_start();
unset($_SESSION['currUser']);
unset($_SESSION['LoggedIn']);
session_destroy();
header("location:login.php")

?>