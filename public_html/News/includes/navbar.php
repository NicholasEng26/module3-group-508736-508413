<?php 
session_start();
?>

<nav>
    <ul>
        <li><a class="active" href="login.php">Login</a></li>
        <li><a href="home.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <img src="media/moon-6507b5466a9592.52260930.png" id="darkmode_icon">
        <?php if ($_SESSION["LoggedIn"]){
        echo "<li><a href=\"profile.php\">Profile</a></li>";
        echo "<li><a href=\"logout.php\">LogOut</a></li>"; }
    ?>
    </ul>
</nav>