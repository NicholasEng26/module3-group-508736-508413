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
        <li> <div class="search-container">
            <form action="search.php" method="post">
                <input type="text" class="search-input" name="search_query" placeholder="Looking for an article?">
                <input type="image" src="https://cdn-icons-png.flaticon.com/512/8742/8742891.png" width="25px" height="25px" alt="submit">
            </form>
            </div>
        </li>
        <img src="https://i.imgur.com/xDrnTNb.png" id="darkmode_icon">
    </ul>
</nav>