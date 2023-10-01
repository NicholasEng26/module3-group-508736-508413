<?php
    include 'includes/header.php';
    session_start();
    $_SESSION["LoggedIn"] = false;
?>

<section id="login">
    <h3>Please login here</h3>
    <form action ="auth.php" method = "GET">
        <label for = "userName">User Name:</label><br>
        <input type = "text" id = "userName" name="userNameInput"/><br>
        <label for = "password">Password:</label><br>
        <input type = "password" id = "password" name="passwordInput"/><br>
        <button type="submit" name="submit">Login</button>
    </form> <br> <br>
</section>

<section id="registration">
    <p>Don't have an account? Please register a new one</p>
    <form action ="regCheck.php" method = "GET">
        <label for = "userName">User Name:</label><br>
        <input type = "text" id = "userName" name="userNameInput"/><br>
        <label for = "password">Password:</label><br>
        <input type = "password" id = "password" name="passwordInput"/><br>
        <label for = "password2">Confirm Password:</label><br>
        <input type = "password" id = "password2" name="passwordInput2"/><br>
        <button type="submit" name="submit">Register</button>
    </form>
</section>

<?php
    include 'includes/footer.php';
?>