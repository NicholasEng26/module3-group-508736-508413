<?php 
session_start();
?>

<nav>
    <ul>
    <?php if (!$_SESSION["LoggedIn"]){
        echo "<li><a href=\"login.php\">Login</a></li>";
        }
    ?>
        <li><a href="home.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <?php if ($_SESSION["LoggedIn"]){
        echo "<li><a href=\"profile.php\">Profile</a></li>";
        echo "<li><a href=\"logout.php\">LogOut</a></li>"; }
    ?>
        <img src="https://i.imgur.com/xDrnTNb.png" id="darkmode_icon">
    </ul>
</nav>