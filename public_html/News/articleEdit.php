<?php
    include 'includes/header.php';
    session_start();
    if(!($_SESSION['LoggedIn'])){
        header("Location: home.php");
    }

    $articleid = $_GET['articleidVal'];
    $owner = $_GET['ownerVal'];
    $content = $_GET['contentVal'];
    $image = $_GET['imageVal'];
    $title = $_GET['titleVal'];
    $summary = $_GET['summaryVal'];
    $url = $_GET['urlVal'];

    echo($content);
    if($_SESSION['currUser'] != $owner){
        header("Location: home.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article Edit Page</title>
</head>
<body>
    <form action= "articleEditProcessor.php" method = "GET">
        <label for="owner">Author: <?php echo($owner);?></label><br> 
        <input type="text" readonly="readonly" id="owner" name="ownerChangedVal" value=<?php echo($owner); ?>> <br>
        <input type="hidden" id="article_id" name="articleidChangedVal" value= "<?php echo($articleid); ?>"> <br>
        <label for="title">Title: </label><br>
        <input type="text" id="title" name="titleChangedVal" value= "<?php echo($title); ?>"> <br>
        <label for="summary">Short Description: </label><br>
        <input type="text" id="summary" name="summaryChangedVal" value= "<?php echo($summary); ?>"> <br>
        <label for="content">Story Content: </label> <br>
        <textarea id="content" name="contentChangedVal" required><?php echo ($content);?></textarea> <br>
        <label for="image">Image URL: </label><br>
        <input type="text" id="image" name="imageChangedVal" value= "<?php echo($image); ?>"> <br>
        <label for="url">External URL: </label><br>
        <input type="text" id="url" name="urlChangedVal" value= "<?php echo($url); ?>"> <br>
        <input type="submit" value="Make Changes" <?php if(!$_SESSION["LoggedIn"]){echo("disabled");}?>>
    </form>
</body>
</html>

