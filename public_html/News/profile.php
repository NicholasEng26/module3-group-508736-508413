<?php 
session_start();
include 'includes/header.php';
if(!($_SESSION["LoggedIn"])){
    header("Location: login.php");
}else{
    $userName = $_SESSION["currUser"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
</head>
<body>
    <?php 
        echo"<h2>Hello, $userName</h2><br>";
    
    ?>
    <h3>Write New Story</h3>
    <form action = storyUpload.php><input type ="submit" value = "Go"></input></form>
    <h3>View/Edit/Delete Stories</h3>
    <form action = userStoryView.php><input type ="submit" value = "Go"></input></form>
    <!-- <h3>View/Edit/Delete Comments</h3>
    <form action = commentEdit.php><input type ="submit" value = "Go"></input></form> -->
</body>
</html>